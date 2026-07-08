<?php



namespace App\Http\Controllers;



use App\Models\Profesional;
use App\Models\Contador;
use App\Models\ContadorLugarAtencion;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\Asistente;
use App\Models\AsistenteLugarAtencion;
use App\Models\ContratoProfesionalInstitucion;
use App\Models\ProfesionalConvenio;
use App\Models\LugarAtencion;
use App\Models\Bono;
use App\Models\HoraMedica;
use App\Models\Compras;
use App\Models\GastosInstitucionales;
use App\Models\RendicionCaja;
use App\Models\Instituciones;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class ContabilidadController extends Controller

{
   /**
    * Obtener datos básicos del contador para el sidebar
    */
   private function getContadorData(){
    $contador = Contador::where('id_usuario', Auth::user()->id)->first();

    if(!$contador) {
        return null;
    }

    $lugares_atencion = ContadorLugarAtencion::where('id_contador', $contador->id)
                                              ->where('estado', 1)
                                              ->with('LugarAtencion')
                                              ->get();

    return compact('contador', 'lugares_atencion');
   }

   public function index(Request $request){
    $contador = Contador::where('id_usuario', Auth::user()->id)->first();

    if(!$contador) {
        return redirect()->route('adm_cm.home')->with('error', 'No se encontró un contador asociado a este usuario');
    }

    $lugares_atencion = ContadorLugarAtencion::where('id_contador', $contador->id)
                                              ->where('estado', 1)
                                              ->with('LugarAtencion')
                                              ->get();

    // Si solo tiene un lugar, guardarlo automáticamente
    if($lugares_atencion->count() == 1) {
        session(['contador_lugar_atencion_id' => $lugares_atencion->first()->id_lugar_atencion]);
    }

    $lugar_atencion_actual = null;
    $mostrar_modal = false;

    // Si tiene múltiples lugares y no ha seleccionado uno, mostrar modal
    if($lugares_atencion->count() > 1) {
        $lugar_seleccionado_id = session('contador_lugar_atencion_id');

        if(!$lugar_seleccionado_id) {
            $mostrar_modal = true;
        } else {
            // Verificar que el lugar seleccionado aún existe y está activo
            $lugar_atencion_actual = $lugares_atencion->firstWhere('id_lugar_atencion', $lugar_seleccionado_id);
            if(!$lugar_atencion_actual) {
                session()->forget('contador_lugar_atencion_id');
                $mostrar_modal = true;
            }
        }
    } else if($lugares_atencion->count() == 1) {
        $lugar_atencion_actual = $lugares_atencion->first();
    }

    // Obtener estadísticas si hay un lugar seleccionado
    $dashboard_stats = [];
    $admin_professionals = [];

    if($lugar_atencion_actual && $lugar_atencion_actual->id_lugar_atencion) {
        $fecha = Carbon::now();
        $idLugarAtencion = (int) $lugar_atencion_actual->id_lugar_atencion;

        // Detectar columna de referencia en bonos
        $bonoReferenciaColumn = Schema::hasColumn('bonos', 'referencia') ? 'referencia' : 'id_referencia';

        // Obtener bonos del mes actual del lugar de atención
        $bonosBase = Bono::query()->whereIn('bonos.' . $bonoReferenciaColumn, function ($sub) use ($idLugarAtencion) {
            $sub->select('horas_medicas.id')
                ->from('horas_medicas');

            if (Schema::hasColumn('horas_medicas', 'id_lugar_atencion')) {
                $sub->where('horas_medicas.id_lugar_atencion', $idLugarAtencion);
            } else {
                $sub->join('fichas_atenciones', 'fichas_atenciones.id', '=', 'horas_medicas.id_ficha_atencion')
                    ->where('fichas_atenciones.id_lugar_atencion', $idLugarAtencion);
            }
        });

        $bonosMesBase = (clone $bonosBase)
            ->whereMonth('fecha_atencion', $fecha->month)
            ->whereYear('fecha_atencion', $fecha->year);

        // Calcular totales generales
        $total_mes = (clone $bonosMesBase)->sum('valor_atencion');
        $cant_bonos = (clone $bonosMesBase)->count();
        $total_rendido = (clone $bonosMesBase)->where('rendido', 1)->sum('valor_atencion');
        $total_pendiente = (clone $bonosMesBase)->where('rendido', 0)->sum('valor_atencion');

        // Estadísticas por profesional
        $bonos_profesionales = (clone $bonosMesBase)
            ->where('numero_sesiones', '0')
            ->whereIn('estado_consulta', [4, 6, 8])
            ->get(['id_profesional', 'valor_atencion', 'a_pagar', 'bonificacion']);

        $ids_profesionales_bonos = $bonos_profesionales
            ->pluck('id_profesional')
            ->filter()
            ->unique()
            ->values()
            ->all();

        $profesionales_lookup = Profesional::whereIn('id', $ids_profesionales_bonos)
            ->get(['id', 'nombre', 'apellido_uno', 'apellido_dos', 'rut'])
            ->keyBy('id');

        $admin_professionals = $bonos_profesionales
            ->groupBy('id_profesional')
            ->map(function ($items, $idProfesional) use ($profesionales_lookup) {
                $prof = $profesionales_lookup->get((int) $idProfesional);
                $nombreCompleto = $prof
                    ? trim(implode(' ', array_filter([$prof->nombre, $prof->apellido_uno, $prof->apellido_dos])))
                    : 'Profesional #' . $idProfesional;

                return [
                    'id' => (int) $idProfesional,
                    'nombre' => $nombreCompleto,
                    'rut' => $prof->rut ?? '-',
                    'cantidad_bonos' => (int) $items->count(),
                    'valor_total' => (int) $items->sum('valor_atencion'),
                    'a_pagar' => (int) $items->sum('a_pagar'),
                    'bonificacion' => (int) $items->sum('bonificacion'),
                    'a_cobrar' => (int) ($items->sum('valor_atencion') - $items->sum('a_pagar') - $items->sum('bonificacion')),
                ];
            })
            ->sortByDesc('a_cobrar')
            ->values()
            ->all();

        // Contar personal activo
        $responsables_count = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $idLugarAtencion)->count();

        $dashboard_stats = [
            'fecha' => $fecha->toDateString(),
            'total_mes' => (int) $total_mes,
            'cant_bonos_mes' => (int) $cant_bonos,
            'total_rendido' => (int) $total_rendido,
            'total_pendiente' => (int) $total_pendiente,
            'responsables_count' => (int) $responsables_count,
        ];
    }

    return view('app.adm_cm.contabilidad.escritorio_dashboard', compact('contador', 'lugares_atencion', 'lugar_atencion_actual', 'mostrar_modal', 'dashboard_stats', 'admin_professionals'));
   }

   public function cargarLugarAtencion($id){
    $contador = Contador::where('id_usuario', Auth::user()->id)->first();

    if(!$contador) {
        return redirect()->route('adm_cm.home')->with('error', 'No se encontró un contador asociado a este usuario');
    }

    // Verificar que el lugar de atención pertenece al contador y está activo
    $contador_lugar = ContadorLugarAtencion::where('id_contador', $contador->id)
                                          ->where('id_lugar_atencion', $id)
                                          ->where('estado', 1)
                                          ->with(['LugarAtencion', 'Profesional', 'Institucion'])
                                          ->first();

    if(!$contador_lugar) {
        return redirect()->route('contabilidad.home')->with('error', 'Lugar de atención no válido o inactivo');
    }

    // Guardar en sesión
    session(['contador_lugar_atencion_id' => $id]);

    // Redireccionar al dashboard con mensaje de éxito
    return redirect()->route('contabilidad.home')->with('success', 'Lugar de atención seleccionado: ' . $contador_lugar->LugarAtencion->nombre);
   }

   public function cambiarLugarAtencion(){
    session()->forget('contador_lugar_atencion_id');
    return redirect()->route('contabilidad.home');
   }

   public function libro(){
    $data = $this->getContadorData();
    return view('app.adm_cm.contabilidad.libro_facturacion', $data ?? []);
   }

   public function rrhh(){
    $data = $this->getContadorData();

    // Obtener lugar de atención actual
    $lugar_atencion_id = session('contador_lugar_atencion_id');

    if($lugar_atencion_id) {
        // Obtener lugar de atención con institución
        $lugar_atencion = LugarAtencion::find($lugar_atencion_id);
        $id_institucion = $lugar_atencion ? $lugar_atencion->id_institucion : null;

        // Obtener profesionales del lugar de atención
        $profesionales = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $lugar_atencion_id)
            ->where('estado', 1)
            ->with(['Profesionales.Especialidad', 'Profesionales.TipoEspecialidad', 'Profesionales.SubTipoEspecialidad'])
            ->get()
            ->map(function($pla) use ($id_institucion, $lugar_atencion_id) {
                $profesionales = $pla->Profesionales;
                if($profesionales) {
                    return $profesionales->map(function($prof) use ($id_institucion, $lugar_atencion_id) {
                        // Buscar contrato profesional por RUT
                        $contrato = null;
                        if($id_institucion && $prof->rut) {
                            $contrato = ContratoProfesionalInstitucion::where('rut', $prof->rut)
                                ->where('id_institucion', $id_institucion)
                                ->where('estado', 1)
                                ->first();
                        }

                        // Buscar convenio (siempre, no solo si no tiene contrato)
                        $convenio = null;
                        if($prof->id) {
                            $convenio = ProfesionalConvenio::where('id_profesional', $prof->id)
                                ->where('id_lugar_atencion', $lugar_atencion_id)
                                ->where('estado', 1)
                                ->first();
                        }

                        // Convertir a array y agregar información de contrato/convenio
                        $profArray = $prof->toArray();
                        $profArray['tiene_contrato'] = $contrato ? true : false;
                        $profArray['contrato_tipo'] = $contrato ? 'Contrato Institucional' : 'Convenio';
                        $profArray['contrato_detalle'] = $contrato ? $contrato->toArray() : null;
                        $profArray['convenio_detalle'] = $convenio ? $convenio->toArray() : null;

                        return $profArray;
                    });
                }
                return collect([]);
            })
            ->flatten(1)
            ->filter();

        // Obtener asistentes del lugar de atención
        $asistentes = AsistenteLugarAtencion::where('id_lugar_atencion', $lugar_atencion_id)
            ->where('estado', 1)
            ->with(['Asistentes.AsistenteTipo'])
            ->get()
            ->map(function($ala) use ($id_institucion) {
                $asistentes = $ala->Asistentes;
                if($asistentes) {
                    // Buscar contrato por RUT
                    $contrato = null;
                    if($id_institucion && $asistentes->rut) {
                        $contrato = ContratoProfesionalInstitucion::where('rut', $asistentes->rut)
                            ->where('id_institucion', $id_institucion)
                            ->where('estado', 1)
                            ->first();
                    }

                    // Convertir a array y agregar información de contrato
                    $asisArray = $asistentes->toArray();
                    $asisArray['tiene_contrato'] = $contrato ? true : false;
                    $asisArray['contrato_tipo'] = $contrato ? 'Contrato Institucional' : 'Convenio';
                    $asisArray['contrato_detalle'] = $contrato ? $contrato->toArray() : null;

                    return $asisArray;
                }
                return null;
            })
            ->filter();

        $data['profesionales'] = $profesionales;
        $data['asistentes'] = $asistentes;
    } else {
        $data['profesionales'] = collect([]);
        $data['asistentes'] = collect([]);
    }

    return view('app.adm_cm.contabilidad.recursos_humanos', $data ?? []);
   }

    public function ContadorSii (){
        $data = $this->getContadorData();
        return view('app.adm_cm.contabilidad.sii', $data ?? []);
    }

   public function remuneraciones(){
    $data = $this->getContadorData();
    return view('app.adm_cm.contabilidad.remuneraciones', $data ?? []);
   }

   public function ausencias(){
    $data = $this->getContadorData();
    return view('app.adm_cm.contabilidad.vacaciones_licencias', $data ?? []);
   }

   public function copagos(){
    $data = $this->getContadorData();
    return view('app.adm_cm.contabilidad.copagos_fonasa', $data ?? []);
   }

   public function documentos(){
    $data = $this->getContadorData();
    return view('app.adm_cm.contabilidad.documentos_laborales', $data ?? []);
   }

   public function movimientos(){
    $data = $this->getContadorData();

    // Obtener lugar de atención actual
    $lugar_atencion_id = session('contador_lugar_atencion_id');

    $movimientos_stats = [];
    $ultimos_movimientos = collect();
    $flujo_6_meses = [];
    $fecha_inicio_filtro = request('fecha_inicio');
    $fecha_fin_filtro = request('fecha_fin');
    $filtro_rango_activo = false;

    if($lugar_atencion_id) {
        // Obtener lugar de atención con institución
        $lugar_atencion = LugarAtencion::find($lugar_atencion_id);
        $id_institucion = $lugar_atencion ? $lugar_atencion->id_institucion : null;

        $fecha = Carbon::now();
        $fechaInicio = null;
        $fechaFin = null;

        // Procesar filtro de rango de fechas
        if (!empty($fecha_inicio_filtro) && !empty($fecha_fin_filtro)) {
            try {
                $fechaInicio = Carbon::parse($fecha_inicio_filtro)->startOfDay();
                $fechaFin = Carbon::parse($fecha_fin_filtro)->endOfDay();

                if ($fechaInicio->gt($fechaFin)) {
                    $tmp = $fechaInicio->copy();
                    $fechaInicio = $fechaFin->copy()->startOfDay();
                    $fechaFin = $tmp->copy()->endOfDay();
                }

                $filtro_rango_activo = true;
                $fecha_inicio_filtro = $fechaInicio->format('Y-m-d');
                $fecha_fin_filtro = $fechaFin->format('Y-m-d');
            } catch (\Throwable $e) {
                $fechaInicio = null;
                $fechaFin = null;
                $filtro_rango_activo = false;
            }
        }

        $idLugarAtencion = (int) $lugar_atencion_id;
        $bonoReferenciaColumn = Schema::hasColumn('bonos', 'referencia') ? 'referencia' : 'id_referencia';

        // Query base de bonos del lugar de atención
        $bonosBase = Bono::query()->whereIn('bonos.' . $bonoReferenciaColumn, function ($sub) use ($idLugarAtencion) {
            $sub->select('horas_medicas.id')
                ->from('horas_medicas');

            if (Schema::hasColumn('horas_medicas', 'id_lugar_atencion')) {
                $sub->where('horas_medicas.id_lugar_atencion', $idLugarAtencion);
            } else {
                $sub->join('fichas_atenciones', 'fichas_atenciones.id', '=', 'horas_medicas.id_ficha_atencion')
                    ->where('fichas_atenciones.id_lugar_atencion', $idLugarAtencion);
            }
        });

        // Aplicar filtro de periodo
        $bonosMesBase = (clone $bonosBase);
        if ($filtro_rango_activo) {
            $bonosMesBase->whereBetween('fecha_atencion', [$fechaInicio, $fechaFin]);
        } else {
            $bonosMesBase->whereMonth('fecha_atencion', $fecha->month)
                         ->whereYear('fecha_atencion', $fecha->year);
        }

        // Calcular ingresos del periodo
        $ingresos_periodo = (float) (clone $bonosMesBase)->sum('valor_atencion');
        $cant_bonos = (clone $bonosMesBase)->count();

        // Query de compras
        $comprasQuery = Compras::query();
        if (Schema::hasColumn('compras', 'id_institucion') && $id_institucion) {
            $comprasQuery->where(function ($query) use ($id_institucion, $idLugarAtencion) {
                $query->whereIn('id_institucion', [$id_institucion, $idLugarAtencion])
                      ->orWhere(function ($q) use ($id_institucion) {
                          $q->whereNull('id_institucion')
                            ->whereHas('proveedor', function ($proveedorQuery) use ($id_institucion) {
                                if (Schema::hasColumn('proveedores', 'id_institucion')) {
                                    $proveedorQuery->where('id_institucion', $id_institucion);
                                }
                            });
                      });
            });
        }

        // Aplicar filtro de periodo a compras
        $comprasMes = (clone $comprasQuery);
        if ($filtro_rango_activo) {
            if (Schema::hasColumn('compras', 'fecha_emision')) {
                $comprasMes->whereBetween('fecha_emision', [$fechaInicio, $fechaFin]);
            } elseif (Schema::hasColumn('compras', 'created_at')) {
                $comprasMes->whereBetween('created_at', [$fechaInicio, $fechaFin]);
            }
        } else {
            if (Schema::hasColumn('compras', 'fecha_emision')) {
                $comprasMes->whereMonth('fecha_emision', $fecha->month)
                           ->whereYear('fecha_emision', $fecha->year);
            } elseif (Schema::hasColumn('compras', 'created_at')) {
                $comprasMes->whereMonth('created_at', $fecha->month)
                           ->whereYear('created_at', $fecha->year);
            }
        }

        $comprasMes = $comprasMes->get(['id', 'numero_factura', 'fecha_emision', 'created_at', 'total_final']);
        $total_compras = (float) $comprasMes->sum(function ($compra) {
            return (float) ($compra->total_final ?? 0);
        });

        // Query de gastos institucionales
        $gastosQuery = GastosInstitucionales::query();
        if (Schema::hasColumn('gastos_institucionales', 'id_institucion') && $id_institucion) {
            $gastosQuery->where('id_institucion', $id_institucion);
        }

        // Aplicar filtro de periodo a gastos
        $gastosMes = (clone $gastosQuery);
        if ($filtro_rango_activo && Schema::hasColumn('gastos_institucionales', 'created_at')) {
            $gastosMes->whereBetween('created_at', [$fechaInicio, $fechaFin]);
        } else {
            $mesInt = (int) $fecha->month;
            $mesPadded = str_pad((string) $mesInt, 2, '0', STR_PAD_LEFT);
            $anioActual = (string) $fecha->year;
            $gastosMes->where(function ($query) use ($mesInt, $mesPadded, $anioActual) {
                $query->where(function ($q) use ($mesInt, $mesPadded, $anioActual) {
                    $q->whereIn('mes_pago', [(string) $mesInt, $mesPadded])
                      ->where('ano_pago', $anioActual);
                });
            });
        }

        $gastosMes = $gastosMes->get(['id', 'nombre', 'emisor', 'monto', 'created_at']);
        $total_gastos = (float) $gastosMes->sum(function ($gasto) {
            $monto = $gasto->monto ?? 0;
            // Normalizar monto (puede venir como string con formato)
            if (is_string($monto)) {
                $monto = preg_replace('/[^0-9.]/', '', $monto);
            }
            return (float) $monto;
        });

        // Calcular egresos totales
        $egresos_periodo = $total_compras + $total_gastos;

        // Construir últimos movimientos
        // Movimientos de bonos (ingresos)
        $movimientosBonos = (clone $bonosMesBase)
            ->with(['TipoBono:id,nombre,detalle', 'Paciente:id,nombres,apellido_uno,apellido_dos', 'Profesional:id,nombre,apellido_uno,apellido_dos'])
            ->orderByDesc('created_at')
            ->orderByDesc('fecha_atencion')
            ->limit(20)
            ->get(['id', 'numero_bono', 'fecha_atencion', 'created_at', 'glosa', 'valor_atencion', 'rendido', 'id_tipo_bono', 'id_paciente', 'id_profesional'])
            ->map(function ($bono) {
                $fechaMovimiento = !empty($bono->created_at) ? Carbon::parse($bono->created_at) : (!empty($bono->fecha_atencion) ? Carbon::parse($bono->fecha_atencion) : null);
                $pacienteNombre = trim(implode(' ', array_filter([
                    $bono->Paciente->nombres ?? null,
                    $bono->Paciente->apellido_uno ?? null,
                    $bono->Paciente->apellido_dos ?? null,
                ])));
                if (empty($pacienteNombre)) $pacienteNombre = 'Paciente #' . ($bono->id_paciente ?? '');

                $tipoBono = trim((string) ($bono->TipoBono->nombre ?? ''));
                $categoriaBono = !empty($tipoBono) ? $tipoBono : 'Bonos';

                return [
                    'date' => $fechaMovimiento ? $fechaMovimiento->format('Y-m-d') : null,
                    'time' => $fechaMovimiento ? $fechaMovimiento->format('H:i') : null,
                    'type' => 'ingreso',
                    'category' => $categoriaBono,
                    'description' => !empty($bono->glosa) ? $bono->glosa . ' · ' . $pacienteNombre : 'Bono #' . ($bono->numero_bono ?? $bono->id) . ' · ' . $pacienteNombre,
                    'amount' => (float) ($bono->valor_atencion ?? 0),
                    'status' => ((int) ($bono->rendido ?? 0) === 1) ? 'Rendido' : 'Pendiente',
                ];
            });

        // Movimientos de compras (egresos)
        $movimientosCompras = $comprasMes
            ->sortByDesc(function ($compra) {
                $fechaMovimiento = !empty($compra->fecha_emision) ? $compra->fecha_emision : $compra->created_at;
                return $fechaMovimiento ? Carbon::parse($fechaMovimiento)->timestamp : 0;
            })
            ->take(20)
            ->map(function ($compra) {
                $fechaMovimiento = !empty($compra->fecha_emision) ? Carbon::parse($compra->fecha_emision) : (!empty($compra->created_at) ? Carbon::parse($compra->created_at) : null);
                return [
                    'date' => $fechaMovimiento ? $fechaMovimiento->format('Y-m-d') : null,
                    'time' => $fechaMovimiento ? $fechaMovimiento->format('H:i') : null,
                    'type' => 'egreso',
                    'category' => 'Compras',
                    'description' => 'Factura #' . ($compra->numero_factura ?? $compra->id),
                    'amount' => (float) ($compra->total_final ?? 0),
                    'status' => 'Pagado',
                ];
            });

        // Movimientos de gastos (egresos)
        $movimientosGastos = $gastosMes
            ->sortByDesc(function ($gasto) {
                return $gasto->created_at ? Carbon::parse($gasto->created_at)->timestamp : 0;
            })
            ->take(20)
            ->map(function ($gasto) {
                $monto = $gasto->monto ?? 0;
                if (is_string($monto)) {
                    $monto = preg_replace('/[^0-9.]/', '', $monto);
                }
                return [
                    'date' => $gasto->created_at ? Carbon::parse($gasto->created_at)->format('Y-m-d') : null,
                    'time' => $gasto->created_at ? Carbon::parse($gasto->created_at)->format('H:i') : null,
                    'type' => 'egreso',
                    'category' => 'Gasto institucional',
                    'description' => $gasto->nombre ?? $gasto->emisor ?? ('Gasto #' . $gasto->id),
                    'amount' => (float) $monto,
                    'status' => 'Pagado',
                ];
            });

        // Combinar y ordenar todos los movimientos
        $ultimos_movimientos = collect()
            ->concat($movimientosBonos)
            ->concat($movimientosCompras)
            ->concat($movimientosGastos)
            ->filter(function ($item) {
                return !empty($item['date']);
            })
            ->sortByDesc(function ($item) {
                $date = (string) ($item['date'] ?? '');
                $time = (string) ($item['time'] ?? '00:00');
                return Carbon::parse(trim($date . ' ' . $time))->timestamp;
            })
            ->take(15)
            ->values();

        // Flujo de ingresos/egresos de los últimos 6 meses
        $mesesEtiquetas = [
            1 => 'Ene', 2 => 'Feb', 3 => 'Mar', 4 => 'Abr', 5 => 'May', 6 => 'Jun',
            7 => 'Jul', 8 => 'Ago', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dic',
        ];

        for ($i = 5; $i >= 0; $i--) {
            $mesCursor = $fecha->copy()->startOfMonth()->subMonths($i);
            $mesNumero = (int) $mesCursor->month;
            $mesNombre = $mesesEtiquetas[$mesNumero] ?? $mesCursor->format('M');

            // Ingresos del mes
            $ingresosMesCursor = (float) (clone $bonosBase)
                ->whereMonth('fecha_atencion', $mesCursor->month)
                ->whereYear('fecha_atencion', $mesCursor->year)
                ->sum('valor_atencion');

            // Compras del mes
            $comprasMesCursor = (clone $comprasQuery);
            if (Schema::hasColumn('compras', 'fecha_emision')) {
                $comprasMesCursor->whereMonth('fecha_emision', $mesCursor->month)
                                ->whereYear('fecha_emision', $mesCursor->year);
            } elseif (Schema::hasColumn('compras', 'created_at')) {
                $comprasMesCursor->whereMonth('created_at', $mesCursor->month)
                                ->whereYear('created_at', $mesCursor->year);
            }
            $comprasMesCursor = $comprasMesCursor->get(['total_final']);
            $totalComprasMesCursor = (float) $comprasMesCursor->sum('total_final');

            // Gastos del mes
            $mesCursorInt = (int) $mesCursor->month;
            $mesCursorPadded = str_pad((string) $mesCursorInt, 2, '0', STR_PAD_LEFT);
            $anioCursor = (string) $mesCursor->year;
            $gastosMesCursor = (clone $gastosQuery)
                ->where(function ($query) use ($mesCursorInt, $mesCursorPadded, $anioCursor) {
                    $query->whereIn('mes_pago', [(string) $mesCursorInt, $mesCursorPadded])
                          ->where('ano_pago', $anioCursor);
                })
                ->get(['monto']);
            $totalGastosMesCursor = (float) $gastosMesCursor->sum(function ($gasto) {
                $monto = $gasto->monto ?? 0;
                if (is_string($monto)) {
                    $monto = preg_replace('/[^0-9.]/', '', $monto);
                }
                return (float) $monto;
            });

            $flujo_6_meses[] = [
                'mes' => $mesNombre,
                'anio' => (int) $mesCursor->year,
                'ingresos' => (float) $ingresosMesCursor,
                'egresos' => (float) ($totalComprasMesCursor + $totalGastosMesCursor),
            ];
        }

        $movimientos_stats = [
            'fecha' => $fecha->toDateString(),
            'ingresos_periodo' => (float) $ingresos_periodo,
            'egresos_periodo' => (float) $egresos_periodo,
            'total_compras' => (float) $total_compras,
            'total_gastos' => (float) $total_gastos,
            'cant_bonos' => (int) $cant_bonos,
            'cant_compras' => (int) $comprasMes->count(),
            'cant_gastos' => (int) $gastosMes->count(),
            'saldo' => (float) ($ingresos_periodo - $egresos_periodo),
        ];
    }

    $data['movimientos_stats'] = $movimientos_stats;
    $data['ultimos_movimientos'] = $ultimos_movimientos;
    $data['flujo_6_meses'] = $flujo_6_meses;
    $data['fecha_inicio_filtro'] = $fecha_inicio_filtro;
    $data['fecha_fin_filtro'] = $fecha_fin_filtro;
    $data['filtro_rango_activo'] = $filtro_rango_activo;

    return view('app.adm_cm.contabilidad.ingresos_egresos', $data ?? []);
   }

    public function getRendicion(Request $request){

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $bonos = $profesional->Bonos()->get();



        foreach ($bonos as $b) {

            $paciente = $b->Paciente()->first();

            $b->PacienteNombre = $paciente->nombres .' '. $paciente->apellido_uno;

            $b->PacienteRut = $paciente->rut;

        }



        $data = [

            'bonos' => $bonos,

        ];

        return json_encode($data);

    }



    public function Rendicion(Request $request){

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $bonos = $profesional->Bonos()->get();



        foreach ($bonos as $b) {

            $b->rendido = true;

            $b->save();

        }



        $data = [

            'bonos' => 'Funciona',

        ];

        return json_encode($data);

    }

}

