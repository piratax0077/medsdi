<style>
/* Estilos para Timeline de Procedimientos */
.timeline-container {
    position: relative;
    max-height: 400px;
    overflow-y: auto;
    padding: 20px 0;
}
.timeline-item {
    position: relative;
    margin-bottom: 25px;
    padding-left: 50px;
}
.timeline-item:before {
    content: '';
    position: absolute;
    left: 19px;
    top: 30px;
    bottom: -25px;
    width: 2px;
    background: #e9ecef;
}
.timeline-item:last-child:before {
    display: none;
}
.timeline-marker {
    position: absolute;
    left: 0;
    top: 0;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
.timeline-content {
    background: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 15px;
    margin-left: 10px;
    position: relative;
}
.timeline-content:before {
    content: '';
    position: absolute;
    left: -8px;
    top: 15px;
    width: 0;
    height: 0;
    border-top: 8px solid transparent;
    border-bottom: 8px solid transparent;
    border-right: 8px solid #e9ecef;
}
.timeline-content:after {
    content: '';
    position: absolute;
    left: -7px;
    top: 15px;
    width: 0;
    height: 0;
    border-top: 8px solid transparent;
    border-bottom: 8px solid transparent;
    border-right: 8px solid #f8f9fa;
}
.alert-sm {
    padding: 8px 12px;
    font-size: 0.875rem;
}
</style>

<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_enfermera-tab" data-toggle="tab" href="#atencion_enfermera" role="tab" aria-controls="atencion_enfermera" aria-selected="true">Atención especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="ns-tab" data-toggle="tab" href="#ns" role="tab" aria-controls="ns" aria-selected="false">Control Niño Sano</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12">
                <form action="{{ route('fichaAtencion.registrar_ficha_enfermeria') }}" method="POST">
                    <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                    <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                    <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                    <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                    <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                    <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="id_responsable_fc" id="id_responsable_fc" value="{{ Auth::user()->id }}">

                    {{-- IDs alternativos para el sistema de curaciones --}}
                    <input type="hidden" id="id_ficha_atencion" value="{{ $id_ficha_atencion }}">
                    <input type="hidden" id="id_paciente" value="{{ $paciente->id }}">
                    <input type="hidden" id="id_profesional" value="{{ $profesional->id }}">

                    <input type="hidden" name="id_ficha_enfermeria" value="{{ $ficha_enfermeria->id ?? '' }}">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                    {{-- Campos ocultos para las curaciones (se llenan por JS antes del submit) --}}
                    <input type="hidden" name="curacion_plana_data" id="curacion_plana_data" value="">
                    <input type="hidden" name="curacion_lpp_data" id="curacion_lpp_data" value="">
                    <input type="hidden" name="curacion_pie_diabetico_data" id="curacion_pie_diabetico_data" value="">
                    <input type="hidden" name="curacion_quemados_data" id="curacion_quemados_data" value="">

                    {{-- Rutas para AJAX de curaciones --}}
                    <input type="hidden" id="route_guardar_curacion_registro" value="{{ route('enfermeria.guardar_curacion_registro') }}">
                    <input type="hidden" id="route_obtener_curaciones_registro" value="{{ route('enfermeria.obtener_curaciones_registro') }}">
                    <input type="hidden" id="route_obtener_curacion_registro_detalle" value="{{ route('enfermeria.obtener_curacion_registro_detalle', ['id' => '__ID__']) }}">
                    <input type="hidden" id="route_eliminar_curacion_registro" value="{{ route('enfermeria.eliminar_curacion_registro') }}">

                    @csrf
                    <div class="tab-content" id="orl-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_enfermera" role="tabpanel" aria-labelledby="atencion_enfermera-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <!--FORMULARIO / MENOR DE EDAD-->
                                        @include('atencion_medica.generales.seccion_menor')
                                        <!--MOTIVO CONSULTA-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="motivo-header">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                                                        Motivo de la consulta
                                                    </button>
                                                </div>
                                                <div id="motivo_c" class="collapse" aria-labelledby="motivo-header" data-parent="#motivo-header">
                                                    <div class="card-body-aten-a">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Motivo</label>
                                                                <select class="form-control form-control-sm" id="motivo-select" name="motivo">
                                                                    @php
                                                                        $motivoActual = old('motivo', $ficha_enfermeria->motivo ?? '');
                                                                        $opcionesMotivo = [
                                                                            'Seleccione',
                                                                            'Tratamiento inyectables',
                                                                            'Vacunas',
                                                                            'Curaciones herida',
                                                                            'Curaciones escaras',
                                                                            'Sueros',
                                                                            'Instalación o recambio de sondas',
                                                                            'Otra'
                                                                        ];
                                                                    @endphp
                                                                    @foreach($opcionesMotivo as $opcion)
                                                                        <option value="{{ $opcion }}" {{ $motivoActual == $opcion ? 'selected' : '' }}>{{ $opcion }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <label class="floating-label-activo-sm">Anamnesis</label>
                                                                <textarea class="caja-texto form-control form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="anamnesis" id="anamnesis">{{ old('anamnesis', $ficha_enfermeria->anamnesis ?? '') }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Formulario / Signos vitales y otros-->
                                        @php
                                            // Para enfermería, usar ficha_enfermeria si existe para cargar signos vitales
                                            if (isset($ficha_enfermeria) && $ficha_enfermeria) {
                                                $fichaAtencion = $ficha_enfermeria;
                                            }
                                        @endphp
                                        @include('general.secciones_ficha.signos_vitales')
                                        <!--Cierre: Formulario / Signos vitales y otros-->
                                        <!--CURACIONES PROCEDIMIENTOS-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="exam_esp">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                                        Curaciones y procedimientos
                                                    </button>
                                                </div>
                                                <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
                                                    <div class="card-body-aten-a">
                                                        <!-- Tabla de curaciones indicadas por médico -->
                                                        @include('atencion_otros_prof.secciones_especialidad.includes.enfermeria.tabla_curaciones_indicadas')

                                                        <!-- RESUMEN GENERAL DE TODAS LAS CURACIONES -->
                                                        @php
                                                            $todas_curaciones = [];

                                                            // Arrays de opciones para quemaduras valoración
                                                            $superficie_quemada = ['0'=>'No selec.', '1'=>'< 9%', '2'=>'9-18%', '3'=>'>18%', '4'=>'Otros'];
                                                            $tipo_quemadura = ['0'=>'No selec.', '1'=>'Solar', '2'=>'Por Líquidos', '3'=>'Vapores y gases', '4'=>'Sust. Químicas', '5'=>'Eléctricidad', '6'=>'Fuego directo', '11'=>'Otros'];

                                                            // Arrays de opciones para quemaduras curación
                                                            $toma_cultivo = ['0'=>'No selec.', '1'=>'No', '2'=>'Si', '3'=>'Observaciones'];
                                                            $tipo_debridamiento = ['0'=>'No selec.', '1'=>'Quirúrgico', '2'=>'Cortante', '3'=>'Enzimático', '4'=>'Autolítico', '5'=>'Osmótico', '6'=>'Larval', '7'=>'Mecánico', '8'=>'Otros'];
                                                            $duchoterapia = ['0'=>'No selec.', '1'=>'Si', '2'=>'No', '3'=>'Observaciones'];

                                                            // Arrays de opciones para pie diabético
                                                            $aspectos_pd = ['0'=>'No selec.','1'=>'Erimatoso','2'=>'Enrojecido','3'=>'Amarillo pálido','4'=>'Necrótico grisáceo','5'=>'Necrótico negruzco'];
                                                            $profundidad_pd = ['0'=>'No selec.','1'=>'Epidermis','2'=>'Dermis','3'=>'Subcutáneo','4'=>'Tendón/Músculo','5'=>'Hueso/Articulación'];

                                                            // Helper para obtener detalles según tipo de curación desde CuracionRegistro
                                                            function obtenerDetallesCuracion($curacion) {
                                                                $tipo = $curacion->tipo_curacion;
                                                                $datos_val = is_string($curacion->datos_valoracion)
                                                                    ? json_decode($curacion->datos_valoracion, true)
                                                                    : (array)$curacion->datos_valoracion;

                                                                $datos_cur = is_string($curacion->datos_curacion)
                                                                    ? json_decode($curacion->datos_curacion, true)
                                                                    : (array)$curacion->datos_curacion;

                                                                // Arrays de opciones locales
                                                                $superficie_quemada = ['0'=>'No selec.', '1'=>'< 9%', '2'=>'9-18%', '3'=>'>18%', '4'=>'Otros'];
                                                                $tipo_quemadura = ['0'=>'No selec.', '1'=>'Solar', '2'=>'Por Líquidos', '3'=>'Vapores y gases', '4'=>'Sust. Químicas', '5'=>'Eléctricidad', '6'=>'Fuego directo', '11'=>'Otros'];
                                                                $toma_cultivo = ['0'=>'No selec.', '1'=>'No', '2'=>'Si', '3'=>'Observaciones'];
                                                                $tipo_debridamiento = ['0'=>'No selec.', '1'=>'Quirúrgico', '2'=>'Cortante', '3'=>'Enzimático', '4'=>'Autolítico', '5'=>'Osmótico', '6'=>'Larval', '7'=>'Mecánico', '8'=>'Otros'];
                                                                $duchoterapia = ['0'=>'No selec.', '1'=>'Si', '2'=>'No', '3'=>'Observaciones'];
                                                                $aspectos_pd = ['0'=>'No selec.','1'=>'Erimatoso','2'=>'Enrojecido','3'=>'Amarillo pálido','4'=>'Necrótico grisáceo','5'=>'Necrótico negruzco'];
                                                                $profundidad_pd = ['0'=>'No selec.','1'=>'Epidermis','2'=>'Dermis','3'=>'Subcutáneo','4'=>'Tendón/Músculo','5'=>'Hueso/Articulación'];

                                                                switch($tipo) {
                                                                    case 'plana':
                                                                        return 'Tipo: ' . ($datos_val['tpo_les_curgen'] ?? 'N/A');
                                                                    case 'lpp':
                                                                        return 'Categoría: ' . ($datos_val['categoria_lpp'] ?? 'N/A');
                                                                    case 'pie_diabetico':
                                                                        $puntaje = $datos_val['ptos_tot_ev_diab'] ?? 'N/A';
                                                                        $aspecto = $aspectos_pd[$datos_val['aspecto_pie_diab'] ?? '0'] ?? 'N/A';
                                                                        $profund = $profundidad_pd[$datos_val['profundidad_curacion'] ?? '0'] ?? 'N/A';
                                                                        return 'P.Total: ' . $puntaje . ' | Aspecto: ' . $aspecto . ' | Profundidad: ' . $profund;
                                                                    case 'quemados':
                                                                        // Si hay datos de curación, mostrar esos
                                                                        if (!empty($datos_cur) && isset($datos_cur['cp_cult'])) {
                                                                            $cult = $toma_cultivo[$datos_cur['cp_cult'] ?? '0'] ?? 'N/A';
                                                                            $debrid = $tipo_debridamiento[$datos_cur['cp_td'] ?? '0'] ?? 'N/A';
                                                                            $ducho = $duchoterapia[$datos_cur['cp_duch'] ?? '0'] ?? 'N/A';
                                                                            return 'Cultivo: ' . $cult . ' | Debridamiento: ' . $debrid . ' | Ducho: ' . $ducho;
                                                                        }
                                                                        // Si solo hay valoración
                                                                        $sup = $superficie_quemada[$datos_val['qmsupqm'] ?? '0'] ?? 'N/A';
                                                                        $tq = $tipo_quemadura[$datos_val['qm_tq'] ?? '0'] ?? 'N/A';
                                                                        return 'Superficie: ' . $sup . ' | Tipo: ' . $tq;
                                                                    default:
                                                                        return 'Sin detalles';
                                                                }
                                                            }

                                                            function obtenerConfigTipo($tipo) {
                                                                $config = [
                                                                    'plana' => ['nombre' => 'Curación Plana', 'color' => 'info', 'icono' => 'fas fa-band-aid'],
                                                                    'lpp' => ['nombre' => 'Curación LPP', 'color' => 'warning', 'icono' => 'fas fa-heartbeat'],
                                                                    'pie_diabetico' => ['nombre' => 'Pie Diabético', 'color' => 'danger', 'icono' => 'fas fa-socks'],
                                                                    'quemados' => ['nombre' => 'Quemaduras', 'color' => 'success', 'icono' => 'fas fa-fire-alt'],
                                                                ];
                                                                return $config[$tipo] ?? ['nombre' => 'Curación', 'color' => 'secondary', 'icono' => 'fas fa-medkit'];
                                                            }

                                                            // Agregar curaciones planas
                                                            if(isset($curaciones_planas) && count($curaciones_planas) > 0) {
                                                                foreach($curaciones_planas as $cp) {
                                                                    $config = obtenerConfigTipo($cp->tipo_curacion);
                                                                    $todas_curaciones[] = [
                                                                        'tipo' => $config['nombre'],
                                                                        'fecha' => $cp->fecha_format ?? 'N/A',
                                                                        'hora' => $cp->hora ?? 'N/A',
                                                                        'responsable' => $cp->responsable ?? 'N/A',
                                                                        'detalles' => obtenerDetallesCuracion($cp),
                                                                        'observaciones' => $cp->observaciones ?? '',
                                                                        'color' => $config['color'],
                                                                        'icono' => $config['icono']
                                                                    ];
                                                                }
                                                            }

                                                            // Agregar curaciones LPP
                                                            if(isset($curaciones_lpp) && count($curaciones_lpp) > 0) {
                                                                foreach($curaciones_lpp as $lpp) {
                                                                    $config = obtenerConfigTipo($lpp->tipo_curacion);
                                                                    $todas_curaciones[] = [
                                                                        'tipo' => $config['nombre'],
                                                                        'fecha' => $lpp->fecha_format ?? 'N/A',
                                                                        'hora' => $lpp->hora ?? 'N/A',
                                                                        'responsable' => $lpp->responsable ?? 'N/A',
                                                                        'detalles' => obtenerDetallesCuracion($lpp),
                                                                        'observaciones' => $lpp->observaciones ?? '',
                                                                        'color' => $config['color'],
                                                                        'icono' => $config['icono']
                                                                    ];
                                                                }
                                                            }

                                                            // Agregar curaciones pie diabético
                                                            if(isset($curaciones_pie_diabetico) && count($curaciones_pie_diabetico) > 0) {
                                                                foreach($curaciones_pie_diabetico as $pd) {
                                                                    $config = obtenerConfigTipo($pd->tipo_curacion);
                                                                    $todas_curaciones[] = [
                                                                        'tipo' => $config['nombre'],
                                                                        'fecha' => $pd->fecha_format ?? 'N/A',
                                                                        'hora' => $pd->hora ?? 'N/A',
                                                                        'responsable' => $pd->responsable ?? 'N/A',
                                                                        'detalles' => obtenerDetallesCuracion($pd),
                                                                        'observaciones' => $pd->observaciones ?? '',
                                                                        'color' => $config['color'],
                                                                        'icono' => $config['icono']
                                                                    ];
                                                                }
                                                            }

                                                            // Agregar curaciones quemados
                                                            if(isset($curaciones_quemados) && count($curaciones_quemados) > 0) {
                                                                foreach($curaciones_quemados as $qm) {
                                                                    $config = obtenerConfigTipo($qm->tipo_curacion);
                                                                    $todas_curaciones[] = [
                                                                        'tipo' => $config['nombre'],
                                                                        'fecha' => $qm->fecha_format ?? 'N/A',
                                                                        'hora' => $qm->hora ?? 'N/A',
                                                                        'responsable' => $qm->responsable ?? 'N/A',
                                                                        'detalles' => obtenerDetallesCuracion($qm),
                                                                        'observaciones' => $qm->observaciones ?? '',
                                                                        'color' => $config['color'],
                                                                        'icono' => $config['icono']
                                                                    ];
                                                                }
                                                            }

                                                            // Ordenar por fecha descendente (más recientes primero)
                                                            usort($todas_curaciones, function($a, $b) {
                                                                return strcmp($b['fecha'] . ' ' . $b['hora'], $a['fecha'] . ' ' . $a['hora']);
                                                            });
                                                        @endphp

                                                            <div class="row mb-4 mt-3">
                                                                <div class="col-12">
                                                                    <div class="card border shadow-sm">
                                                                        <div class="card-header bg-light text-dark py-2 px-3">
                                                                            <h6 class="mb-0 font-weight-bold">
                                                                                <i class="fas fa-clipboard-list mr-2"></i>
                                                                                Resumen General de Curaciones Registradas ( <span id="contador_curaciones">{{ count($todas_curaciones) }}</span> )
                                                                            </h6>
                                                                        </div>
                                                                        <div class="card-body p-2">
                                                                            <div class="table-responsive">
                                                                                <table class="table table-sm table-hover table-bordered mb-0" id="tabla_resumen_curaciones">
                                                                                    <thead class="thead-light">
                                                                                        <tr>
                                                                                            <th class="text-center align-middle" style="width: 10%">Tipo</th>
                                                                                            <th class="text-center align-middle" style="width: 12%">Fecha/Hora</th>
                                                                                            <th class="align-middle" style="width: 15%">Responsable</th>
                                                                                            <th class="align-middle" style="width: 25%">Detalles</th>
                                                                                            <th class="align-middle">Observaciones</th>
                                                                                            <th class="align-middle">Acciones</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <div class="form-row" id="form-enf">
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                <div class="nav flex-column nav-pills mb-3" id="v-pills-tab-1"
                                                                    role="tablist" aria-orientation="vertical">
                                                                    <a class="nav-link-aten text-reset active" id="cur_plana-tab" data-toggle="tab" href="#cur_plana-1" role="tab" aria-controls="cur_plana-1" aria-selected="true">Cur. Planas</a>
                                                                    <a class="nav-link-aten text-reset" id="cur_lpp-tab" data-toggle="tab" href="#cur_lpp-1" role="tab" aria-controls="cur_lpp-1" aria-selected="false" onclick="$('#lpp_patasoc').select2();">Curación.LPP</a>
                                                                    <a class="nav-link-aten text-reset" id="cur_pd-tab" data-toggle="tab" href="#cur_pd-1" role="tab" aria-controls="cur_pd-1" aria-selected="false">Pie Diabético</a>
                                                                    <a class="nav-link-aten text-reset" id="cur_quem-tab" data-toggle="tab" href="#cur_quem-1" role="tab" aria-controls="cur_quem-1" aria-selected="false" onclick="$('#pat_propq').select2(); $('#med_quem').select2();">Quemados</a>
                                                                </div>

                                                                <!-- SECCIÓN DE GRÁFICOS DE EVOLUCIÓN DE CURACIONES -->
                                                                <div class="mt-4" id="seccion-graficos-curaciones">
                                                                    <h5 class="text-primary mb-4">📊 Evolución de Curación</h5>

                                                                    <!-- Gráfico Curación Plana -->
                                                                    <div class="card mb-4 grafico-curacion" id="grafico-curacion-plana">
                                                                        <div class="card-header bg-light text-dark">
                                                                            <h6 class="mb-0">Curación Plana - Evolución de Puntajes</h6>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                                                                <canvas id="chartPuntajesCuracion" width="400" height="200"></canvas>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Preparar datos para el gráfico de Curación Plana -->
                                                                    @php
                                                                        $fechasGrafico = [];
                                                                        $puntajesGrafico = [];
                                                                        $valoresGrafico = [];

                                                                        if(isset($curaciones_planas)) {
                                                                            foreach($curaciones_planas as $cp) {
                                                                                if($cp->etapa == 'valoracion') {
                                                                                    $datos_val = is_string($cp->datos_valoracion)
                                                                                        ? json_decode($cp->datos_valoracion, true)
                                                                                        : (array)$cp->datos_valoracion;

                                                                                    if(!empty($datos_val)) {
                                                                                        $fechasGrafico[] = $cp->fecha_format ?? 'N/A';
                                                                                        $puntajesGrafico[] = (int)($datos_val['ptos_tot_ev'] ?? 0);
                                                                                        $valoresGrafico[] = $datos_val['tpo_les_curgen'] ?? 'Sin valor';
                                                                                    }
                                                                                }else{
                                                                                    $datos_cur = is_string($cp->datos_curacion)
                                                                                        ? json_decode($cp->datos_curacion, true)
                                                                                        : (array)$cp->datos_curacion;

                                                                                    if(!empty($datos_cur) && isset($datos_cur['cp_cult'])) {
                                                                                        $fechasGrafico[] = $cp->fecha_format ?? 'N/A';
                                                                                        $puntajesGrafico[] = (int)($datos_cur['cp_cult'] ?? 0);
                                                                                        $valoresGrafico[] = 'Curación: ' . ($datos_cur['cp_cult'] ?? 'N/A');
                                                                                    }

                                                                                }
                                                                            }
                                                                        }
                                                                    @endphp

                                                                    <script>
                                                                        // Datos para el gráfico desde PHP
                                                                        window.fechasCuracionInicial = @json($fechasGrafico);
                                                                        window.puntajesCuracionInicial = @json($puntajesGrafico);
                                                                        window.valoresCuracion = @json($valoresGrafico);
                                                                        window.graficoCuracionPlanaInicializado = false;

                                                                        // Función para inicializar el gráfico de Curación Plana (lazy loading)
                                                                        window.inicializarGraficoCuracionPlana = function() {
                                                                            console.log('🔧 Intentando inicializar gráfico de Curación Plana...');
                                                                            console.log('Ya inicializado:', window.graficoCuracionPlanaInicializado);

                                                                            if (window.graficoCuracionPlanaInicializado) {
                                                                                console.log('✅ Gráfico ya estaba inicializado, saltando...');
                                                                                return;
                                                                            }

                                                                            const ctx = document.getElementById('chartPuntajesCuracion');
                                                                            if(!ctx) {
                                                                                console.error('❌ No se encontró el canvas chartPuntajesCuracion');
                                                                                return;
                                                                            }

                                                                            console.log('✅ Canvas encontrado, creando gráfico...');

                                                                            // Guardar instancia en variable global para poder actualizarla
                                                                            window.chartPuntajesCuracion = new Chart(ctx.getContext('2d'), {
                                                                                    type: 'line',
                                                                                    data: {
                                                                                        labels: window.fechasCuracionInicial || [],
                                                                                        datasets: [{
                                                                                            label: 'Puntaje Total Evaluación',
                                                                                            data: window.puntajesCuracionInicial || [],
                                                                                            borderColor: '#007bff',
                                                                                            backgroundColor: 'rgba(0, 123, 255, 0.1)',
                                                                                            borderWidth: 3,
                                                                                            fill: true,
                                                                                            tension: 0.4,
                                                                                            pointBackgroundColor: '#007bff',
                                                                                            pointBorderColor: '#0056b3',
                                                                                            pointRadius: 6,
                                                                                            pointHoverRadius: 8
                                                                                        }]
                                                                                    },
                                                                                    options: {
                                                                                        responsive: true,
                                                                                        maintainAspectRatio: false,
                                                                                        plugins: {
                                                                                            title: {
                                                                                                display: true,
                                                                                                text: 'Evolución del Estado de Curación - Puntajes por Fecha',
                                                                                                font: {
                                                                                                    size: 16,
                                                                                                    weight: 'bold'
                                                                                                }
                                                                                            },
                                                                                            legend: {
                                                                                                display: true,
                                                                                                position: 'top'
                                                                                            },
                                                                                            tooltip: {
                                                                                                callbacks: {
                                                                                                    title: function(context) {
                                                                                                        return 'Fecha: ' + context[0].label;
                                                                                                    },
                                                                                                    label: function(context) {
                                                                                                        const index = context.dataIndex;
                                                                                                        return [
                                                                                                            'Puntaje: ' + context.parsed.y + ' puntos',
                                                                                                            'Valoración: ' + (window.valoresCuracion ? window.valoresCuracion[index] : '')
                                                                                                        ];
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        },
                                                                                        scales: {
                                                                                            y: {
                                                                                                beginAtZero: true,
                                                                                                title: {
                                                                                                    display: true,
                                                                                                    text: 'Puntaje'
                                                                                                },
                                                                                                grid: {
                                                                                                    color: 'rgba(0, 0, 0, 0.1)'
                                                                                                }
                                                                                            },
                                                                                            x: {
                                                                                                title: {
                                                                                                    display: true,
                                                                                                    text: 'Fecha de Curación'
                                                                                                },
                                                                                                ticks: {
                                                                                                    maxRotation: 45,
                                                                                                    minRotation: 45
                                                                                                }
                                                                                            }
                                                                                        },
                                                                                        interaction: {
                                                                                            intersect: false,
                                                                                            mode: 'index'
                                                                                        }
                                                                                    }
                                                                            });

                                                                            // Ajustar altura del canvas
                                                                            ctx.style.height = '300px';

                                                                            window.graficoCuracionPlanaInicializado = true;
                                                                            console.log('✅ Gráfico de Curación Plana creado exitosamente');
                                                                        };

                                                                        // Inicializar al cargar la página (el tab Curación Plana está activo por defecto)
                                                                        document.addEventListener('DOMContentLoaded', function() {
                                                                            window.inicializarGraficoCuracionPlana();
                                                                        });
                                                                    </script>

                                                                    <!-- Gráfico Pie Diabético -->
                                                                    <div class="card mb-4 grafico-curacion" id="grafico-pie-diabetico" style="display: none;">
                                                                        <div class="card-header bg-light">
                                                                            <h6 class="mb-0 text-secondary">Pie Diabético - Evolución de Puntajes</h6>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                                                                <canvas id="chartPuntajesPieDiabetico" width="400" height="200"></canvas>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Preparar datos para el gráfico de Pie Diabético -->
                                                                    @php
                                                                        $fechasGraficoPD = [];
                                                                        $puntajesGraficoPD = [];

                                                                        if(isset($curaciones_pie_diabetico)) {
                                                                            foreach($curaciones_pie_diabetico as $pd) {
                                                                                if($pd->etapa == 'valoracion') {
                                                                                    $datos_val = is_string($pd->datos_valoracion)
                                                                                        ? json_decode($pd->datos_valoracion, true)
                                                                                        : (array)$pd->datos_valoracion;

                                                                                    if(!empty($datos_val)) {
                                                                                        $fechasGraficoPD[] = $pd->fecha_format ?? 'N/A';
                                                                                        $puntajesGraficoPD[] = (int)($datos_val['ptos_tot_ev_diab'] ?? 0);
                                                                                    }
                                                                                }else{
                                                                                    $datos_cur = is_string($pd->datos_curacion)
                                                                                        ? json_decode($pd->datos_curacion, true)
                                                                                        : (array)$pd->datos_curacion;

                                                                                    if(!empty($datos_cur) && isset($datos_cur['pd_cult'])) {
                                                                                        $fechasGraficoPD[] = $pd->fecha_format ?? 'N/A';
                                                                                        $puntajesGraficoPD[] = (int)($datos_cur['pd_cult'] ?? 0);
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    @endphp

                                                                    <script>
                                                                        // Datos para el gráfico de Pie Diabético desde PHP
                                                                        window.fechasPieDiabeticoInicial = @json($fechasGraficoPD);
                                                                        window.puntajesPieDiabeticoInicial = @json($puntajesGraficoPD);
                                                                        window.graficoPieDiabeticoInicializado = false;

                                                                        // Función para inicializar el gráfico de Pie Diabético (lazy loading)
                                                                        window.inicializarGraficoPieDiabetico = function() {
                                                                            console.log('🔧 Intentando inicializar gráfico de Pie Diabético...');
                                                                            console.log('Ya inicializado:', window.graficoPieDiabeticoInicializado);

                                                                            if (window.graficoPieDiabeticoInicializado) {
                                                                                console.log('✅ Gráfico ya estaba inicializado, saltando...');
                                                                                return;
                                                                            }

                                                                            const ctxPD = document.getElementById('chartPuntajesPieDiabetico');
                                                                            if (!ctxPD) {
                                                                                console.error('❌ No se encontró el canvas chartPuntajesPieDiabetico');
                                                                                return;
                                                                            }

                                                                            console.log('✅ Canvas encontrado, creando gráfico...');

                                                                            // Guardar instancia en variable global para poder actualizarla
                                                                            window.chartPuntajesPieDiabetico = new Chart(ctxPD.getContext('2d'), {
                                                                                type: 'line',
                                                                                data: {
                                                                                    labels: window.fechasPieDiabeticoInicial || [],
                                                                                    datasets: [{
                                                                                        label: 'Puntaje Total Evaluación',
                                                                                        data: window.puntajesPieDiabeticoInicial || [],
                                                                                        borderColor: '#dc3545',
                                                                                        backgroundColor: 'rgba(220, 53, 69, 0.1)',
                                                                                        borderWidth: 3,
                                                                                        fill: true,
                                                                                        tension: 0.4,
                                                                                        pointBackgroundColor: '#dc3545',
                                                                                        pointBorderColor: '#a71d2a',
                                                                                        pointRadius: 6,
                                                                                        pointHoverRadius: 8
                                                                                    }]
                                                                                },
                                                                                options: {
                                                                                    responsive: true,
                                                                                    maintainAspectRatio: false,
                                                                                    plugins: {
                                                                                        title: {
                                                                                            display: true,
                                                                                            text: 'Evolución del Estado de Pie Diabético - Puntajes por Fecha',
                                                                                            font: {
                                                                                                size: 16,
                                                                                                weight: 'bold'
                                                                                            }
                                                                                        },
                                                                                        legend: {
                                                                                            display: true,
                                                                                            position: 'top'
                                                                                        },
                                                                                        tooltip: {
                                                                                            callbacks: {
                                                                                                label: function(context) {
                                                                                                    return 'Puntaje: ' + context.parsed.y;
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    },
                                                                                    scales: {
                                                                                        y: {
                                                                                            beginAtZero: true,
                                                                                            title: {
                                                                                                display: true,
                                                                                                text: 'Puntaje'
                                                                                            }
                                                                                        },
                                                                                        x: {
                                                                                            title: {
                                                                                                display: true,
                                                                                                text: 'Fecha'
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            });

                                                                            // Ajustar altura del canvas
                                                                            ctxPD.style.height = '300px';

                                                                            window.graficoPieDiabeticoInicializado = true;
                                                                            console.log('✅ Gráfico de Pie Diabético creado exitosamente');
                                                                        };
                                                                    </script>

                                                                </div>
                                                                <!-- FIN SECCIÓN DE GRÁFICOS -->
                                                            </div>
                                                             <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
                                                                <div class="tab-content" id="v-pills-tabContent-1">
                                                                    <!--CURACION PLANA-->
                                                                    <div class="tab-pane fade show active" id="cur_plana-1" role="tabpanel" aria-labelledby="cur_plana-tab">
                                                                        <div class="form-row mb-2">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="t-aten">Curación Plana</h6>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Tabla de curaciones planas existentes -->
                                                                        <div class="form-row mx-2 mb-3" @if(!isset($curaciones_planas) || count($curaciones_planas) == 0) style="display: none;" @endif>
                                                                            <div class="col-sm-12">
                                                                                <h6 class="text-primary mb-2">Curaciones Registradas</h6>
                                                                                <div class="table-responsive">
                                                                                    <table class="table table-sm table-bordered" id="tabla_especifica_curaciones_registradas">
                                                                                        <thead class="thead-light">
                                                                                            <tr>
                                                                                                <th width="10%">Fecha</th>
                                                                                                <th width="10%">Responsable</th>
                                                                                                <th width="15%">Valoración / Curación</th>
                                                                                                <th width="20%">Datos Principales</th>
                                                                                                <th width="25%">Observaciones</th>
                                                                                                <th width="20%">Acciones</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @if(isset($curaciones_planas))
                                                                                                @foreach($curaciones_planas as $cp)
                                                                                                <tr id="cp_row_{{ $cp->id }}">
                                                                                                    <td>
                                                                                                        <small>{{ $cp->fecha ?? 'N/A' }}</small><br>
                                                                                                        <small class="text-muted">{{ $cp->hora ?? 'N/A' }}</small>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <small>{{ $cp->responsable ?? 'N/A' }}</small>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        @if($cp->etapa == "valoracion")
                                                                                                        @php
                                                                                                            $datos_val = is_string($cp->datos_valoracion)
                                                                                                                ? json_decode($cp->datos_valoracion, true)
                                                                                                                : (array)$cp->datos_valoracion;
                                                                                                        @endphp
                                                                                                        @if(!empty($datos_val))
                                                                                                            <small><strong>P.Total:</strong> {{ $datos_val['ptos_tot_ev'] ?? 'N/A' }}</small><br>
                                                                                                            <small><strong>Valoración:</strong> {{ $datos_val['tpo_les_curgen'] ?? 'N/A' }}</small>
                                                                                                        @else
                                                                                                            <small class="text-muted">Sin datos</small>
                                                                                                        @endif
                                                                                                        @else
                                                                                                            @php
                                                                                                                $datos_val = is_string($cp->datos_curacion)
                                                                                                                    ? json_decode($cp->datos_curacion, true)
                                                                                                                    : (array)$cp->datos_curacion;
                                                                                                            @endphp
                                                                                                            @if(!empty($datos_val))
                                                                                                                <small><strong>P.Total:</strong> {{ $datos_val['ptos_tot_ev'] ?? 'N/A' }}</small><br>
                                                                                                                <small><strong>Valoración:</strong> {{ $datos_val['tpo_les_curgen'] ?? 'N/A' }}</small>
                                                                                                            @else
                                                                                                                <small class="text-muted">Sin datos</small>
                                                                                                            @endif
                                                                                                        @endif
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        @if($cp->etapa == "valoracion")
                                                                                                        @if(!empty($datos_val))
                                                                                                            @php
                                                                                                                $aspectos = ['0'=>'No selec.','1'=>'Eritematoso','2'=>'Enrojecido','3'=>'Amarillo pálido','4'=>'Necrótico'];
                                                                                                                $profundidad = ['0'=>'No selec.','1'=>'0','2'=>'0-1 cm','3'=>'1-2 cm','4'=>'2-3 cm','5'=>'>3 cm'];
                                                                                                            @endphp
                                                                                                            <small><strong>Aspecto:</strong> {{ $aspectos[$datos_val['cp_asp'] ?? '0'] ?? 'N/A' }}</small><br>
                                                                                                            <small><strong>Profundidad:</strong> {{ $profundidad[$datos_val['cp_pro'] ?? '0'] ?? 'N/A' }}</small>
                                                                                                        @else
                                                                                                            <small class="text-muted">Sin datos</small>
                                                                                                        @endif
                                                                                                        @else
                                                                                                            @if(!empty($datos_val))
                                                                                                                @php
                                                                                                                    $toma_cultivo = ['0'=>'No selec.','1'=>'No','2'=>'Si','6'=>'Otro'];
                                                                                                                    $tipos_debridamiento = ['0'=>'No selec.','1'=>'Quirúrgico ','2'=>'Cortante','3'=>'Enzimático','4'=>'Autolítico','5'=>'Osmótico','6'=>'Larval','7'=>'Mecánico','8'=>'Otros'];
                                                                                                                @endphp
                                                                                                                <small><strong>Toma de cultivo:</strong> {{ $toma_cultivo[$datos_val['cp_cult_plana'] ?? '0'] ?? 'N/A' }}</small><br>
                                                                                                                <small><strong>Tipos de debridamiento:</strong> {{ $tipos_debridamiento[$datos_val['cp_td_plana'] ?? '0'] ?? 'N/A' }}</small>
                                                                                                            @else
                                                                                                                <small class="text-muted">Sin datos</small>
                                                                                                            @endif
                                                                                                        @endif
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <small>{{ $cp->observaciones ?? 'Sin observaciones' }}</small>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <button type="button" class="btn btn-sm btn-outline-info"
                                                                                                            onclick="verDetallesCuracionPlana({{ $cp->id }}, '{{ $cp->etapa ?? '' }}')"
                                                                                                            title="Ver detalles">
                                                                                                            <i class="fas fa-eye"></i>
                                                                                                        </button>
                                                                                                        @if($enfermera)
                                                                                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                                                                                            onclick="eliminarCuracionPlana({{ $cp->id }})"
                                                                                                            title="Eliminar">
                                                                                                            <i class="fas fa-trash"></i>
                                                                                                        </button>
                                                                                                        @endif
                                                                                                    </td>
                                                                                                </tr>
                                                                                                @endforeach
                                                                                            @endif
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                                                <ul class="nav nav-tabs-aten nav-fill mb-10"  id="enf_urgencia-1" role="tablist">
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link-aten text-reset active" id="val_hda-tab-1" data-toggle="tab" href="#val_hda-1" role="tab" aria-controls="val_hda-1" aria-selected="true">Valoración</a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link-aten text-reset" id="cur_hda-tab-1" data-toggle="tab" href="#cur_hda-1" role="tab"  aria-controls="cur_hda-1"  aria-selected="false">Curación</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-11">
                                                                                <div class="tab-content"  id="Curación de lesiones planas-1">
                                                                                    <div class="tab-pane fade show active"  id="val_hda-1" role="tabpanel"   aria-labelledby="val_hda-tab-1">

                                                                                        <div class="form-row">
                                                                                            <div  class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <div class="alert alert-warning"   role="alert">
                                                                                                    Si desea ocupar el item de  observaciones debe necesariamente  elegir otra opción para sumar el   puntaje.
                                                                                                </div>
                                                                                            </div>
                                                                                             <div  class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm t-red"  for="obs_cp_asp-1">Localización</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"  name="obs_cp_asp" id="obs_cp_asp-1"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div  class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm t-red" for="cp_asp-1">Aspecto</label>
                                                                                                    <select name="cp_asp"   id="cp_asp-1"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_asp-1','div_cp_asp-1','obs_cp_asp-1',6);actualizarTotal()">
                                                                                                        <option selected value="0">Seleccione</option>
                                                                                                        <option value="1">Eritematoso </option>
                                                                                                        <option value="2">Enrojecido</option>
                                                                                                        <option value="3">Amarillo pálido</option>
                                                                                                        <option value="4">Necrótico </option>
                                                                                                        <option value="6">Observaciones</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group"  id="div_cp_asp-1"   style="display:none;">
                                                                                                    <label class="floating-label-activo-sm t-red"  for="obs_cp_asp-1">Obs. (Describir)</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"  name="obs_cp_asp" id="obs_cp_asp-1"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                                                                                                <div class="form-group">
                                                                                                    <button type="button"  class="btn btn-outline-primary btn-sm btn-block"onclick="curac_hda();"> <i class="feather icon-plus"></i>Guía</button>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                                 <div class="form-group">
                                                                                                    <label  class="floating-label-activo-sm t-red"  for="cp_me">Mayor Extensión</label>
                                                                                                        <select name="cp_me"
                                                                                                        id="cp_me"
                                                                                                        class="form-control form-control-sm"
                                                                                                        onchange="evaluar_para_carga_detalle('cp_me','div_cp_me','obs_cp_me',5);actualizarTotal()">
                                                                                                         <option selected value="0">Seleccione</option>
                                                                                                        <option value="1" >0-1 cm</option>
                                                                                                        <option value="2">1-3 cm</option>
                                                                                                        <option value="3" >3-6 cm</option>
                                                                                                        <option value="4">6 cm</option>
                                                                                                        <option value="5">Observaciones</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group"
                                                                                                    id="div_cp_me"
                                                                                                    style="display:none;">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="obs_cp_pro">Obs.
                                                                                                        (Describir)</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                        name="obs_cp_me" id="obs_cp_me"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="cp_pro">Profundidad</label>
                                                                                                        <select name="cp_pro"
                                                                                                        id="cp_pro"
                                                                                                        class="form-control form-control-sm"
                                                                                                        onchange="evaluar_para_carga_detalle('cp_pro','div_cp_pro','obs_cp_pro1',6);actualizarTotal()">
                                                                                                        <option selected value="0">Seleccione</option>
                                                                                                        <option value="1">0</option>
                                                                                                        <option value="2">0-1 cm</option>
                                                                                                        <option value="3">1-2 cm</option>
                                                                                                        <option value="4">2-3 cm</option>
                                                                                                        <option value="5"> >3 cm</option>
                                                                                                        <option value="6">Otros</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group"
                                                                                                    id="div_cp_pro"
                                                                                                    style="display:none;">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="obs_cp_pro">Obs.
                                                                                                        <i>(Describir)</i></label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                        name="obs_cp_pro" id="obs_cp_pro"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div  class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="cp_ecant">Exudado-Cantidad</label>
                                                                                                        <select name="cp_ecant"
                                                                                                                id="cp_ecant"
                                                                                                                class="form-control form-control-sm"
                                                                                                                onchange="evaluar_para_carga_detalle('cp_ecant','div_cp_ecant','obs_cp_ecant',6);actualizarTotal()">
                                                                                                            <option selected value="0">Seleccione</option>
                                                                                                            <option value="1">Ausente</option>
                                                                                                            <option value="2">Escaso</option>
                                                                                                            <option value="3">Moderado</option>
                                                                                                            <option value="4">Abundante</option>
                                                                                                            <option value="6">Observaciones</option>
                                                                                                        </select>
                                                                                                </div>
                                                                                                <div class="form-group"
                                                                                                    id="div_cp_ecant"
                                                                                                    style="display:none;">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="obs_cp_ecant">Obs.
                                                                                                        (Describir)</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                        name="obs_cp_ecant" id="obs_cp_ecant"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="cp_ecal">Exudado-Calidad</label>
                                                                                                        <select name="cp_ecal"
                                                                                                                id="cp_ecal"
                                                                                                                class="form-control form-control-sm"
                                                                                                                onchange="evaluar_para_carga_detalle('cp_ecal','div_cp_ecal','obs_cp_ecal',6);actualizarTotal()">
                                                                                                            <option selected value="0">Seleccione</option>
                                                                                                            <option value="1">Sin exudado</option>
                                                                                                            <option value="2">Seroso</option>
                                                                                                            <option value="3">Turbio</option>
                                                                                                            <option value="4">Purulento</option>
                                                                                                            <option value="6">Observaciones</option>
                                                                                                        </select>
                                                                                                </div>
                                                                                                <div class="form-group"
                                                                                                    id="div_cp_ecal"
                                                                                                    style="display:none;">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="obs_cp_ecal">Obs.
                                                                                                        (Describir)</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                        name="obs_cp_ecal" id="obs_cp_ecal"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="cp_tn">Tejido
                                                                                                        esfacelado o necrótico</label>
                                                                                                        <select name="cp_tn"
                                                                                                                id="cp_tn"
                                                                                                                class="form-control form-control-sm"
                                                                                                                onchange="evaluar_para_carga_detalle('cp_tn','div_cp_tn','obs_cp_tn',6);actualizarTotal()">
                                                                                                            <option selected value="0">Seleccione</option>
                                                                                                            <option value="1">Ausente</option>
                                                                                                            <option value="2"> < 25 % </option>
                                                                                                            <option value="3">25 - 50 %</option>
                                                                                                            <option value="4">>50 - 75 %</option>
                                                                                                            <option value="5">>75 %</option>
                                                                                                            <option value="6">Observaciones</option>
                                                                                                        </select>
                                                                                                </div>
                                                                                                <div class="form-group" id="div_cp_tn"
                                                                                                    style="display:none;">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="obs_cp_tn">Obs.
                                                                                                        (Describir)</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                        name="obs_cp_tn" id="obs_cp_tn"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="cp_tg">Tejido
                                                                                                        granulatorio</label>
                                                                                                        <select name="cp_tg"
                                                                                                                id="cp_tg"
                                                                                                                class="form-control form-control-sm"
                                                                                                                onchange="evaluar_para_carga_detalle('cp_tg','div_cp_tg','obs_cp_tg',6);actualizarTotal()">
                                                                                                            <option selected value="0">Seleccione</option>
                                                                                                            <option value="1">100- 75 %</option>
                                                                                                            <option value="2">< 75 - 50 %</option>
                                                                                                            <option value="3">< 50 - 25 %</option>
                                                                                                            <option value="4">< 25 %</option>
                                                                                                            <option value="6">Observaciones</option>
                                                                                                        </select>
                                                                                                </div>
                                                                                                <div class="form-group" id="div_cp_tg"
                                                                                                    style="display:none;">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="obs_cp_tg">Obs.
                                                                                                        (Describir)</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                        name="obs_cp_tg" id="obs_cp_tg"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div  class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="cp_ed">Edema</label>
                                                                                                        <select name="cp_ed"
                                                                                                                id="cp_ed"
                                                                                                                class="form-control form-control-sm"
                                                                                                                onchange="evaluar_para_carga_detalle('cp_ed','div_cp_ed','obs_cp_ed',6);actualizarTotal()">
                                                                                                            <option selected value="0">Seleccione</option>
                                                                                                            <option value="1">Ausente</option>
                                                                                                            <option value="2">+</option>
                                                                                                            <option value="3">++</option>
                                                                                                            <option value="4">+++</option>
                                                                                                            <option value="6">Observaciones</option>
                                                                                                        </select>
                                                                                                </div>
                                                                                                <div class="form-group" id="div_cp_ed"  style="display:none;">
                                                                                                    <label  class="floating-label-activo-sm t-red"   for="obs_cp_ed">Obs. (Describir)</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                        name="obs_cp_ed" id="obs_cp_ed"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div  class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="cp_dol">Dolor</label>
                                                                                                        <select name="cp_dol"
                                                                                                                id="cp_dol"
                                                                                                                class="form-control form-control-sm"
                                                                                                                onchange="evaluar_para_carga_detalle('cp_dol','div_cp_dol','obs_cp_dol',6);actualizarTotal()">
                                                                                                            <option value="0">Seleccione</option>
                                                                                                            <option value="1">0 - 1</option>
                                                                                                            <option value="2">2 - 3</option>
                                                                                                            <option value="3">4 - 6</option>
                                                                                                            <option value="4">7 - 10</option>
                                                                                                            <option value="6">Observaciones</option>
                                                                                                        </select>
                                                                                                </div>
                                                                                                <div class="form-group"
                                                                                                    id="div_cp_dol"
                                                                                                    style="display:none;">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="obs_cp_dol">Obs.
                                                                                                        (Describir)</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                        name="obs_cp_dol" id="obs_cp_dol"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div  class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"  for="cp_pielc">Piel circundante</label>
                                                                                                        <select name="cp_pielc"
                                                                                                                id="cp_pielc"
                                                                                                                class="form-control form-control-sm"
                                                                                                                onchange="evaluar_para_carga_detalle('cp_pielc','div_cp_pielc','obs_cp_pielc',6);actualizarTotal()">
                                                                                                            <option selected value="0">Seleccione</option>
                                                                                                            <option value="1">Sana</option>
                                                                                                            <option value="2">Descamada</option>
                                                                                                            <option value="3">Erimatosa</option>
                                                                                                            <option value="4">Macerada</option>
                                                                                                            <option value="6">Observaciones</option>
                                                                                                        </select>
                                                                                                </div>
                                                                                                <div class="form-group" id="div_cp_pielc" style="display:none;">
                                                                                                    <label class="floating-label-activo-sm t-red"  for="obs_cp_pielc">Obs. (Describir)</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_pielc" id="obs_cp_pielc"></textarea>

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm t-red" for="bh_dren_1">P.Total</label>
                                                                                                    <input type="number" class="form-control form-control-sm" name="ptos_tot_ev" id="ptos_tot_ev">
                                                                                                        {{--  id="ptos_tot_ev" value="{{ $curacion_plana ? $curacion_plana->datos_curacion_plana->ptos_tot_ev : '' }}">  --}}
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"  for="tpo_les_curgen">Valoración</label>

                                                                                                    <input type="text"  class="form-control form-control-sm"  name="tpo_les_curgen" id="tpo_les_curgen">

                                                                                                        {{--  id="tpo_les_curgen" value="{{ $curacion_plana ? $curacion_plana->datos_curacion_plana->tpo_les_curgen : '' }}">  --}}
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-4 col-xxl-4">
                                                                                                <div class="form-group">
                                                                                                    <button type="button"  class="btn btn-outline-primary btn-sm  btn-block"onclick="cur_guia();"><i class="feather icon-plus"></i>Guía</button>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 col-xxl-4">
                                                                                                <div class="form-group">
                                                                                                    <label  class="floating-label-activo-sm" for="obs_cp_gral">Obs. Valoración Herida</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=5" onblur="this.rows=1;" name="obs_cp_gral" id="obs_cp_gral"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        @if(isset($enfermera))
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-12 text-right mb-3">
                                                                                                <button type="button" class="btn btn-success btn-sm" onclick="guardar_valoracion_plana()">
                                                                                                    <i class="fas fa-save"></i> Guardar Valoración
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                        @endif

                                                                                        <div class="form-row">
                                                                                            <div
                                                                                                class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm"
                                                                                                        for="obs_cur_plana">Obs.
                                                                                                        Curación Plana</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                        name="obs_cur_plana" id="obs_cur_plana"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="tab-pane fade show" id="cur_hda-1"
                                                                                        role="tabpanel" aria-labelledby="cur_hda-tab-1">

                                                                                         @include('atencion_otros_prof.secciones_especialidad.includes.enfermeria.curacion_plana')
                                                                                    </div>
                                                                                    <!--CURACIÓN Y VALORACIÓN-->
                                                                                    <div class="tab-pane d-none" id="curvalor-uno"
                                                                                        role="tabpanel" aria-labelledby="curvalor-uno-tab">
                                                                                         <div class="form-row">
                                                                                            <div class="col-12 mb-2">
                                                                                                <h6 class="tit-gen">Curación y valoración</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm" for="lesionpl">Ubicación de la lesión</label>
                                                                                                    <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row" id="lesionpl">
                                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <label class="floating-label-activo-sm">Descripción de la lesión</label>
                                                                                                <textarea class="form-control form-control-sm" rows="3" onfocus="this.rows=6" onblur="this.rows=3;" name="desc_lesion_plana" id="desc_lesion_plana"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--CURACION LPP-->
                                                                    <div class="tab-pane fade " id="cur_lpp-1" role="tabpanel" aria-labelledby="cur_lpp-tab">
                                                                        <div class="col-sm-12 col-md-12">
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten">Curación LPP</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <ul class="nav nav-tabs-aten nav-fill mb-3" id="enf_urgencia-3" role="tablist">
                                                                                        <li class="nav-item">
                                                                                            <a class="nav-link-aten text-reset active" id="val_lpp-tab" data-toggle="tab" href="#val_lpp" role="tab" aria-controls="val_lpp" aria-selected="true">Valoración</a>
                                                                                        </li>
                                                                                        <li class="nav-item">
                                                                                            <a class="nav-link-aten text-reset" id="cur1_lpp-tab" data-toggle="tab" href="#cur1_lpp" role="tab" aria-controls="cur1_lpp" aria-selected="false">Curación</a>
                                                                                        </li>
                                                                                        <li class="nav-item">
                                                                                            <a class="nav-link-aten text-reset" id="curidados_lpp-tab" data-toggle="tab" href="#curidados_lpp" role="tab" aria-controls="curidados_lpp" aria-selected="false">Cuidado y Prevensión</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-11">
                                                                                    <div class="tab-content" id="Curación de lesiones planas">
                                                                                        <div class="tab-pane fade show active" id="val_lpp" role="tabpanel" aria-labelledby="val_lpp-tab">

                                                                                           <div class="form-row">
                                                                                                <!-- LOCALIZACIÓN -->
                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="upp_local_eval">Localización</label>
                                                                                                        <select name="upp_local_eval" id="upp_local_eval" class="form-control form-control-sm"
                                                                                                            onchange="evaluar_para_carga_detalle('upp_local_eval','div_upp_local_eval','obs_upp_local_eval',15);">
                                                                                                            <option selected value="0">Seleccione</option>
                                                                                                            <option value="Cabeza">Cabeza</option>
                                                                                                            <option value="Frente">Frente</option>
                                                                                                            <option value="Oreja">Oreja</option>
                                                                                                            <option value="Mejilla">Mejilla</option>
                                                                                                            <option value="Omoplato">Omoplato</option>
                                                                                                            <option value="Costillas">Costillas</option>
                                                                                                            <option value="Pecho">Pecho</option>
                                                                                                            <option value="Sacro">Sacro</option>
                                                                                                            <option value="Trocanter">Trocanter</option>
                                                                                                            <option value="Genitales">Genitales</option>
                                                                                                            <option value="Rodilla">Rodilla</option>
                                                                                                            <option value="Cóndilos">Cóndilos</option>
                                                                                                            <option value="Dedos">Dedos</option>
                                                                                                            <option value="Talones">Talones</option>
                                                                                                            <option value="Maleolo">Maleolo</option>
                                                                                                            <option value="Otras">Otras</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_upp_local_eval" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm" for="obs_upp_local_eval">
                                                                                                            Otras <i>(Describir)</i>
                                                                                                        </label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1"
                                                                                                            onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                            name="obs_upp_local_eval" id="obs_upp_local_eval"></textarea>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <!-- GRADO -->
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-1">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="upp_gr_eval">Grado</label>
                                                                                                        <select name="upp_gr_eval" id="upp_gr_eval" class="form-control form-control-sm"
                                                                                                            onchange="calcularPuntajeUPP()">
                                                                                                            <option value="0">G-0</option>
                                                                                                            <option value="1">G-1</option>
                                                                                                            <option value="2">G-2</option>
                                                                                                            <option value="3">G-3</option>
                                                                                                            <option value="4">G-4</option>
                                                                                                            <option value="5">G-5</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <!-- DIÁMETRO -->
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="upp_diam_eval">Diámetro</label>
                                                                                                        <select name="upp_diam_eval" id="upp_diam_eval" class="form-control form-control-sm"
                                                                                                            onchange="calcularPuntajeUPP()">
                                                                                                            <option selected value="0">Seleccione</option>
                                                                                                            <option value="1">Menor de 1 cm.</option>
                                                                                                            <option value="2">Entre 1 y 2 cms.</option>
                                                                                                            <option value="3">Entre 2 y 3 cms.</option>
                                                                                                            <option value="4">Entre 3 y 4 cms.</option>
                                                                                                            <option value="5">Entre 5 y 6 cms.</option>
                                                                                                            <option value="6">Entre 7 y 8 cms.</option>
                                                                                                            <option value="7">Entre 9 y 10 cms.</option>
                                                                                                            <option value="8">Entre 11 y 12 cms.</option>
                                                                                                            <option value="9">Entre 12 y 15 cms.</option>
                                                                                                            <option value="10">Mayor de 15 cms.</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <!-- PROFUNDIDAD -->
                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="upp_prof_eval">Profundidad</label>
                                                                                                        <select name="upp_prof_eval" id="upp_prof_eval" class="form-control form-control-sm"
                                                                                                            onchange="evaluar_para_carga_detalle('upp_prof_eval','div_upp_prof_eval','obs_upp_prof_eval',11); calcularPuntajeUPP();">
                                                                                                            <option selected value="0">Seleccione</option>
                                                                                                            <option value="1">Epidermis</option>
                                                                                                            <option value="2">Dermis</option>
                                                                                                            <option value="3">Hipodermis</option>
                                                                                                            <option value="4">Otros</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_upp_prof_eval" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm" for="obs_upp_prof_eval">
                                                                                                            Otros <i>(Describir)</i>
                                                                                                        </label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1"
                                                                                                            onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                            name="obs_upp_prof_eval" id="obs_upp_prof_eval"></textarea>
                                                                                                    </div>
                                                                                                </div>



                                                                                            </div>
                                                                                            <!-- SEGUNDA FILA - INFECCIÓN Y PUNTAJE -->
                                                                                            <div class="form-row mt-2">

                                                                                                <!-- INFECCIÓN -->
                                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="upp_infeccion_eval">Infección</label>
                                                                                                        <select name="upp_infeccion_eval" id="upp_infeccion_eval"
                                                                                                            class="form-control form-control-sm"
                                                                                                            onchange="calcularPuntajeUPP()">
                                                                                                            <option value="0">Seleccione</option>
                                                                                                            <option value="0">Sin infección</option>
                                                                                                            <option value="2">Infección local</option>
                                                                                                            <option value="4">Infección sistémica</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="obs_orin"> Observaciones Patología Asociada</label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="obs_pa_eval_upp" id="obs_pa_eval_upp"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="obs_orin">Obs. Valoración LPP</label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="obs_val_eval_upp" id="obs_val_eval_upp"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                 <!-- PUNTAJE PUSH -->
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="upp_puntaje">
                                                                                                            Puntaje
                                                                                                        </label>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            id="upp_puntaje"
                                                                                                            name="upp_puntaje"
                                                                                                            class="form-control form-control-sm text-center font-weight-bold"
                                                                                                            readonly
                                                                                                            value="0"
                                                                                                            style="
                                                                                                                background-color: #f8f9fa;
                                                                                                                cursor: not-allowed;
                                                                                                                border-width: 2px;
                                                                                                                font-size: 1.1rem;
                                                                                                                transition: all 0.3s ease;
                                                                                                            "
                                                                                                        >
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <span
                                                                                                            id="upp_clasificacion"
                                                                                                            class="badge badge-pill w-100 p-2"
                                                                                                            style="
                                                                                                                font-size: 0.82rem;
                                                                                                                background-color: #28a745;
                                                                                                                color: white;
                                                                                                                transition: all 0.3s ease;
                                                                                                                display: block;
                                                                                                                text-align: center;
                                                                                                            "
                                                                                                        >
                                                                                                            ✅ Sin UPP
                                                                                                        </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            @if(isset($enfermera))
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 text-right mb-3">
                                                                                                    <button type="button" class="btn btn-success btn-sm" onclick="guardar_valoracion_lpp()">
                                                                                                        <i class="fas fa-save"></i> Guardar Valoración LPP
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>
                                                                                            @endif
                                                                                        </div>
                                                                                        <div class="tab-pane fade" id="cur1_lpp" role="tabpanel" aria-labelledby="cur1_lpp-tab">
                                                                                            @include('atencion_otros_prof.secciones_especialidad.includes.enfermeria.curacion_heridas')
                                                                                        </div>
                                                                                        <div class="tab-pane fade" id="curidados_lpp" role="tabpanel" aria-labelledby="curidados_lpp-tab">
                                                                                            <div class="form-row">
                                                                                                <div class="form-group col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <label class="floating-label-activo-sm" for="lpp_medprotliq">Seleccionar Medidas liquidas</label>
                                                                                                    <select class="form-control form-control-sm" name="lpp_medprotliq" id="lpp_medprotliq" multiple="multiple">
                                                                                                        <option value="1">Soluciones Locales Humectantes</option>
                                                                                                        <option value="2">Soluciones Locales Hidratantes</option>
                                                                                                        <option value="3">Soluciones Locales Hidratantes</option>
                                                                                                        <option value="4">AGEHO : LINOLEICO , PALMITICO </option>
                                                                                                        <option value="5">Otras(Agregar en Observaciones)</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <label class="floating-label-activo-sm" for="lpp_medproddesc">Dispositivos de descarga</label>
                                                                                                    <select class="form-control form-control-sm" name="lpp_medproddesc" id="lpp_medproddesc" multiple="multiple">
                                                                                                        <option value="1">Dispositivo de descarga local</option>
                                                                                                        <option value="2">Dispositivo de descarga General</option>
                                                                                                        <option value="3">Otras(Agregar en Observaciones)</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <label class="floating-label-activo-sm" for="lpp_medprevext">Seleccionar Medidas preventivas Externas</label>
                                                                                                    <select class="form-control form-control-sm" name="lpp_medprevext" id="lpp_medprevext" multiple="multiple">
                                                                                                        <option value="1">Colchón especial</option>
                                                                                                        <option value="2">Picarón</option>
                                                                                                        <option value="3">Movilización frecuente</option>
                                                                                                        <option value="3">Masajes</option>
                                                                                                        <option value="4">Otras (Añadrir  en Observaciones)</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="obs_med_prev_cuid"> Observaciones Med de prevención y cuidado</label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="obs_med_prev_cuid" id="obs_med_prev_cuid"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!--CURACIÓN Y VALORACIÓN-->
                                                                                        <div class="tab-pane d-none" id="curvalor-cuatro"
                                                                                            role="tabpanel" aria-labelledby="curvalor-cuatro-tab">
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="lesionpl">Ubicación de la lesión</label>
                                                                                                        <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row mb-3">
                                                                                                <div class="col-sm-12">
                                                                                                    <h6 class="tit-gen">Descripción de la lesión</h6>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Tejido necrótico (%)</label>
                                                                                                    <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Tejido esfacelado (%)</label>
                                                                                                    <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                                </div>
                                                                                                 <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Tejido granulatorio (%)</label>
                                                                                                    <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Signos de infección</label>
                                                                                                      <select name="signo_infeccion"   id="signo_infeccion"  class="form-control form-control-sm" >
                                                                                                        <option selected value="0">Seleccione</option>
                                                                                                        <option value="1">Si </option>
                                                                                                        <option value="2">No</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Extensión (cms)</label>
                                                                                                    <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Profundidad (cms)</label>
                                                                                                    <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Exudado cantidad</label>
                                                                                                      <select name="signo_infeccion"   id="signo_infeccion"  class="form-control form-control-sm" >
                                                                                                        <option selected value="0">Seleccione</option>
                                                                                                        <option value="1">Ninguno</option>
                                                                                                        <option value="2">Escaso</option>
                                                                                                        <option value="3">Moderado </option>
                                                                                                        <option value="4">Abundante</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Exudado calidad</label>
                                                                                                      <select name="signo_infeccion"   id="signo_infeccion"  class="form-control form-control-sm" >
                                                                                                        <option selected value="0">Seleccione</option>
                                                                                                        <option value="1">Seroso</option>
                                                                                                        <option value="2">Turbio</option>
                                                                                                        <option value="3">Purulento</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Piel circundante</label>
                                                                                                      <select name="signo_infeccion"   id="signo_infeccion"  class="form-control form-control-sm" >
                                                                                                        <option selected value="0">Seleccione</option>
                                                                                                        <option value="1">Sana</option>
                                                                                                        <option value="2">Pigmentada</option>
                                                                                                        <option value="3">Descamada </option>
                                                                                                        <option value="4">Eritematosa</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Calor local</label>
                                                                                                      <select name="signo_infeccion"   id="signo_infeccion"  class="form-control form-control-sm" >
                                                                                                        <option selected value="0">Seleccione</option>
                                                                                                        <option value="1">Si</option>
                                                                                                        <option value="2">No</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Carga bacteriana (VACAB)</label>
                                                                                                    <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Grado de úlcera</label>
                                                                                                    <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Limpieza de la herida y piel</label>
                                                                                                      <select name="signo_infeccion"   id="signo_infeccion"  class="form-control form-control-sm" >
                                                                                                        <option selected value="0">Seleccione</option>
                                                                                                        <option value="1">Prontosan / PHMB</option>
                                                                                                        <option value="2">Suero fisiológico</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Desbridamiento</label>
                                                                                                      <select name="signo_infeccion"   id="signo_infeccion"  class="form-control form-control-sm" >
                                                                                                        <option selected value="0">Seleccione</option>
                                                                                                        <option value="1">Mecánico</option>
                                                                                                        <option value="2">Autolítico</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Apósito primario</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_busqueda_receta" id="obs_busqueda_receta"></textarea>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Apósito secundario</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_busqueda_receta" id="obs_busqueda_receta"></textarea>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Apósito terciario</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_busqueda_receta" id="obs_busqueda_receta"></textarea>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Piel circundante</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_busqueda_receta" id="obs_busqueda_receta"></textarea>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                                                                    <label class="floating-label-activo-sm">Toma cultivo</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_busqueda_receta" id="obs_busqueda_receta"></textarea>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                                                                    <label class="floating-label-activo-sm">Próx. Curación</label>
                                                                                                   <input  type="date" class="form-control form-control-sm" name="prox_curacion" id="prox_curacion">
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                                                                                    <label class="floating-label-activo-sm">Enfermero/a Responsable</label><!--CARGAR NOMBRE AUTOMATICO SEGUN EL USUARIO-->
                                                                                                    <input  type="text" class="form-control form-control-sm" name="eu_responsable" id="eu_responsable">
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                                                                                    <label class="floating-label-activo-sm">Observaciones</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_lesion" id="obs_lesion"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12">
                                                                                                    <h6 class="tit-gen">Valoración de la piel</h6>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <table class="table table-bordered table-xs">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th scope="col"></th>
                                                                                                                <th scope="col">Cabeza</th>
                                                                                                                <th scope="col">Tronco</th>
                                                                                                                <th scope="col">Ex. Superiores</th>
                                                                                                                <th scope="col">Sacra</th>
                                                                                                                <th scope="col">Ex. Inferiores</th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <th scope="row">Temperatura</th>
                                                                                                                <td><input  type="text" class="form-control form-control-xxs" name="t_cabeza" id="t_cabeza"></td>
                                                                                                                <td><input  type="text" class="form-control form-control-xxs" name="t_tronco" id="t_tronco"></td>
                                                                                                                <td><input  type="text" class="form-control form-control-xxs" name="t_exsup" id="t_exsup"></td>
                                                                                                                <td><input  type="text" class="form-control form-control-xxs" name="t_sacra" id="t_sacra"></td>
                                                                                                                <td><input  type="text" class="form-control form-control-xxs" name="t_exinf" id="t_exinf"></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <th scope="row">Coloración</th>
                                                                                                                <td><input  type="text" class="form-control form-control-xs" name="col_cabeza" id="col_cabeza"></td>
                                                                                                                <td><input  type="text" class="form-control form-control-xs" name="col_tronco" id="col_tronco"></td>
                                                                                                                <td><input  type="text" class="form-control form-control-xs" name="col_exsup" id="col_exsup"></td>
                                                                                                                <td><input  type="text" class="form-control form-control-xs" name="col_sacra" id="col_sacra"></td>
                                                                                                                <td><input  type="text" class="form-control form-control-xs" name="col_exinf" id="col_exinf"></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <th scope="row">Hidratación</th>
                                                                                                                <td><input  type="text" class="form-control form-control-xxs" name="h_cabeza" id="h_cabeza"></td>
                                                                                                                <td><input  type="text" class="form-control form-control-xxs" name="h_tronco" id="t_tronco"></td>
                                                                                                                <td><input  type="text" class="form-control form-control-xxs" name="h_exsup" id="h_exsup"></td>
                                                                                                                <td><input  type="text" class="form-control form-control-xxs" name="h_sacra" id="h_sacra"></td>
                                                                                                                <td><input  type="text" class="form-control form-control-xxs" name="h_exinf" id="h_exinf"></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <th scope="row">Perfusión</th>
                                                                                                                <td><input  type="text" class="form-control form-control-xxs" name="p_cabeza" id="p_cabeza"></td>
                                                                                                                <td><input  type="text" class="form-control form-control-xxs" name="p_tronco" id="p_tronco"></td>
                                                                                                                <td><input  type="text" class="form-control form-control-xxs" name="p_exsup" id="p_exsup"></td>
                                                                                                                <td><input  type="text" class="form-control form-control-xxs" name="p_sacra" id="p_sacra"></td>
                                                                                                                <td><input  type="text" class="form-control form-control-xxs" name="p_exinf" id="p_exinf"></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <th scope="row">Obs/D.Invasivo</th>
                                                                                                                <td><input  type="text" class="form-control form-control-xxs" name="obsdinv_cabeza" id="obsdinv_cabeza"></td>
                                                                                                                <td><input  type="text" class="form-control form-control-xxs" name="obsdinv_tronco" id="obsdinv_tronco"></td>
                                                                                                                <td><input  type="text" class="form-control form-control-xxs" name="obsdinv_exsup" id="obsdinv_exsup"></td>
                                                                                                                <td><input  type="text" class="form-control form-control-xxs" name="obsdinv_sacra" id="obsdinv_sacra"></td>
                                                                                                                <td><input  type="text" class="form-control form-control-xxs" name="obsdinv_exinf" id="obsdinv_exinf"></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--PIE DIABÉTICO-->
                                                                    <div class="tab-pane fade" id="cur_pd-1" role="tabpanel" aria-labelledby="cur_pd-tab">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-7">
                                                                                    <div class="form-group">
                                                                                        <h6 class="t-aten">Curación Pie Diabético</h6>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Tabla de curaciones pie diabético existentes -->
                                                                            <div class="form-row mx-2 mb-3" @if(!isset($curaciones_pie_diabetico) || count($curaciones_pie_diabetico) == 0) style="display: none;" @endif>
                                                                                <div class="col-sm-12">
                                                                                    <div class="card border shadow-sm">
                                                                                        <div class="card-header bg-light py-2 px-3">
                                                                                            <h6 class="mb-0 text-dark">
                                                                                                <i class="fas fa-socks mr-2"></i>
                                                                                                Curaciones Pie Diabético Registradas ( <span id="contador_curaciones_pie_diabetico">{{ isset($curaciones_pie_diabetico) ? count($curaciones_pie_diabetico) : 0 }}</span> )
                                                                                            </h6>
                                                                                        </div>
                                                                                        <div class="card-body p-2">
                                                                                            <div class="table-responsive">
                                                                                                <table class="table table-sm table-hover table-bordered mb-0" id="tabla_curaciones_pie_diabetico">
                                                                                                    <thead class="thead-light">
                                                                                                        <tr>
                                                                                                            <th class="text-center align-middle">Fecha</th>
                                                                                                            <th class="text-center align-middle">Hora</th>
                                                                                                            <th class="align-middle">Responsable</th>
                                                                                                            <th class="align-middle">Valoración</th>
                                                                                                            <th class="align-middle">Datos Principales</th>
                                                                                                            <th class="align-middle">Observaciones</th>
                                                                                                            <th class="text-center align-middle">Acciones</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        @if(isset($curaciones_pie_diabetico))
                                                                                                        @foreach($curaciones_pie_diabetico as $pd)
                                                                                                        @php
                                                                                                            $datos_val = is_string($pd->datos_valoracion)
                                                                                                                ? json_decode($pd->datos_valoracion, true)
                                                                                                                : (array)$pd->datos_valoracion;
                                                                                                        @endphp
                                                                                                        <tr id="cur_pd_{{ $pd->id }}">
                                                                                                            <td class="text-center align-middle">
                                                                                                                <small>{{ $pd->fecha_format ?? 'N/A' }}</small>
                                                                                                            </td>
                                                                                                            <td class="text-center align-middle">
                                                                                                                <small class="text-muted">{{ $pd->hora ?? 'N/A' }}</small>
                                                                                                            </td>
                                                                                                            <td class="align-middle">
                                                                                                                <small>{{ $pd->responsable ?? 'N/A' }}</small>
                                                                                                            </td>
                                                                                                            <td class="align-middle">
                                                                                                                @if(!empty($datos_val))
                                                                                                                    <small><strong>P.Total:</strong> {{ $datos_val['ptos_tot_ev_diab'] ?? 'N/A' }}</small>
                                                                                                                @else
                                                                                                                    <small class="text-muted">Sin datos</small>
                                                                                                                @endif
                                                                                                            </td>
                                                                                                            <td class="align-middle">
                                                                                                                @if(!empty($datos_val))
                                                                                                                    @php
                                                                                                                        $aspectos_pd = ['0'=>'No selec.','1'=>'Erimatoso','2'=>'Enrojecido','3'=>'Amarillo pálido','4'=>'Necrótico grisáceo','5'=>'Necrótico negruzco'];
                                                                                                                        $profundidad_pd = ['0'=>'No selec.','1'=>'Epidermis','2'=>'Dermis','3'=>'Subcutáneo','4'=>'Tendón/Músculo','5'=>'Hueso/Articulación'];
                                                                                                                    @endphp
                                                                                                                    <small><strong>Aspecto:</strong> {{ $aspectos_pd[$datos_val['aspecto_pie_diab'] ?? '0'] ?? 'N/A' }}</small><br>
                                                                                                                    <small><strong>Profundidad:</strong> {{ $profundidad_pd[$datos_val['profundidad_curacion'] ?? '0'] ?? 'N/A' }}</small>
                                                                                                                @else
                                                                                                                    <small class="text-muted">Sin datos</small>
                                                                                                                @endif
                                                                                                            </td>
                                                                                                            <td class="align-middle">
                                                                                                                <small>{{ $pd->observaciones ?? 'Sin observaciones' }}</small>
                                                                                                            </td>
                                                                                                            <td class="text-center align-middle">
                                                                                                                <button type="button" class="btn btn-sm btn-outline-info"
                                                                                                                    onclick="verDetalleCuracionPieDiab({{ $pd->id }}, '{{ $pd->etapa ?? '' }}')"
                                                                                                                    title="Ver detalle">
                                                                                                                        <i class="fas fa-eye"></i>
                                                                                                                </button>
                                                                                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                                                                                    onclick="eliminarCuracionRegistro({{ $pd->id }},'{{ $pd->tipo_curacion ?? '' }}')"
                                                                                                                    title="Eliminar">
                                                                                                                     <i class="fas fa-trash-alt"></i>
                                                                                                                </button>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        @endforeach
                                                                                                        @endif
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <ul class="nav nav-tabs-aten nav-fill mb-3"
                                                                        id="enf_urgencia" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset active"
                                                                                id="val_pie-tab" data-toggle="tab"
                                                                                href="#val_pie" role="tab"
                                                                                                aria-controls="val_pie"
                                                                                                aria-selected="true">Valoración</a>
                                                                                        </li>
                                                                                        <li class="nav-item">
                                                                                            <a class="nav-link-aten text-reset"
                                                                                                id="curac_pie-tab" data-toggle="tab"
                                                                                                href="#curac_pie" role="tab"
                                                                                                aria-controls="curac_pie"
                                                                                                aria-selected="true" onclick="$('#pie_ant_curac_pie').select2(); $('#tpo_aposc_curac_pie').select2();">Curación</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="alert alert-warning" role="alert">
                                                                                        Si desea ocupar el item de observaciones debe
                                                                                        necesariamente elegir otra opción para sumar el
                                                                                        puntaje.
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-11">
                                                                                    <div class="tab-content" id="pie_diab">
                                                                                        <div class="tab-pane fade show active"
                                                                                            id="val_pie" role="tabpanel"
                                                                                            aria-labelledby="val_pie-tab">
                                                                                            <div class="form-row">
                                                                                                <div
                                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm t-red"
                                                                                                            for="aspecto_pie_diab">Aspecto</label>
                                                                                                        <select name="aspecto_pie_diab"
                                                                                                            id="aspecto_pie_diab"
                                                                                                            class="form-control form-control-sm"
                                                                                                            onchange="evaluar_para_carga_detalle('aspecto_pie_diab','div_aspecto_pie_diab','obs_aspecto_pie_diab',6); actualizarTotalPieDiabetico()">
                                                                                                            <option selected
                                                                                                                value="0">
                                                                                                                Seleccione </option>
                                                                                                            <option value="1">
                                                                                                                Erimatoso </option>
                                                                                                            <option value="2">
                                                                                                                Enrojecido</option>
                                                                                                            <option value="3">
                                                                                                                Amarillo pálido</option>
                                                                                                            <option value="4">
                                                                                                                Necrótico grisáceo
                                                                                                            </option>
                                                                                                            <option value="5">
                                                                                                                Necrótico negruzco
                                                                                                            </option>
                                                                                                            <option value="6">
                                                                                                                Observaciones</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group"
                                                                                                        id="div_aspecto_pie_diab"
                                                                                                        style="display:none;">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm t-red"
                                                                                                            for="obs_aspecto_pie_diab">Otras
                                                                                                            (Describir)</label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                            name="obs_aspecto_pie_diab" id="obs_aspecto_pie_diab"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                                    <div class="form-group">
                                                                                                        <button type="button"
                                                                                                            class="btn btn-outline-primary btn-sm  btn-block"onclick="p_diab();">
                                                                                                            <i
                                                                                                                class="feather icon-plus"></i>
                                                                                                            Guía</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm t-red"
                                                                                                            for="mayor_extension">Mayor
                                                                                                            Extensión</label>
                                                                                                        <select name="mayor_extension"
                                                                                                            id="mayor_extension"
                                                                                                            class="form-control form-control-sm"
                                                                                                            onchange="evaluar_para_carga_detalle('mayor_extension','div_mayor_extension','obs_mayor_extension',6);actualizarTotalPieDiabetico()">
                                                                                                            <option selected
                                                                                                                value="0">
                                                                                                                Seleccione </option>
                                                                                                            <option value="1">0-1
                                                                                                                cm</option>
                                                                                                            <option value="2">1-3
                                                                                                                cm</option>
                                                                                                            <option value="3">3-6
                                                                                                                cm</option>
                                                                                                            <option value="4">6-10
                                                                                                                cm</option>
                                                                                                            <option value="5">>10
                                                                                                                cm</option>
                                                                                                            <option value="6">
                                                                                                                Observaciones</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group"
                                                                                                        id="div_mayor_extension"
                                                                                                        style="display:none;">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm t-red"
                                                                                                            for="obs_mayor_extension">Otras
                                                                                                            (Describir)</label>
                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                            name="obs_mayor_extension" id="obs_mayor_extension"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm t-red"
                                                                                                            for="profundidad_curacion">Profundidad</label>
                                                                                                        <select name="profundidad_curacion"
                                                                                                            id="profundidad_curacion"
                                                                                                            class="form-control form-control-sm"
                                                                                                            onchange="evaluar_para_carga_detalle('profundidad_curacion','div_profundidad_curacion','obs_profundidad_curacion',6);actualizarTotalPieDiabetico()">
                                                                                                            <option selected
                                                                                                                value="1">
                                                                                                                Seleccione </option>
                                                                                                            <option value="1">0
                                                                                                            </option>
                                                                                                            <option value="2">0-1
                                                                                                                cm</option>
                                                                                                            <option value="3">1-2
                                                                                                                cm</option>
                                                                                                            <option value="4">2-3
                                                                                                                cm</option>
                                                                                                            <option value="5"> >3
                                                                                                                cm </option>
                                                                                                            <option value="6">
                                                                                                                Otros</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group"
                                                                                                        id="div_profundidad_curacion"
                                                                                                        style="display:none;">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm t-red"
                                                                                                            for="obs_profundidad_curacion">Otras
                                                                                                            (Describir)</label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                            name="obs_profundidad_curacion" id="obs_profundidad_curacion"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm t-red"
                                                                                                            for="exudado_cantidad_curacion">Exudado-Cantidad</label>
                                                                                                        <select name="exudado_cantidad_curacion"
                                                                                                            id="exudado_cantidad_curacion"
                                                                                                            class="form-control form-control-sm"
                                                                                                            onchange="evaluar_para_carga_detalle('exudado_cantidad_curacion','div_exudado_cantidad_curacion','obs_exudado_cantidad_curacion',11);actualizarTotalPieDiabetico()">
                                                                                                            <option selected
                                                                                                                value="0">
                                                                                                                Seleccione </option>
                                                                                                            <option value="1">
                                                                                                                Ausente</option>
                                                                                                            <option value="2">
                                                                                                                Escaso</option>
                                                                                                            <option value="3">
                                                                                                                Moderado</option>
                                                                                                            <option value="4">
                                                                                                                Abundante</option>
                                                                                                            <option value="5">Muy
                                                                                                                abundante</option>
                                                                                                            <option value="6">
                                                                                                                Otros</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group "
                                                                                                        id="div_exudado_cantidad_curacion"
                                                                                                        style="display:none;">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm t-red"
                                                                                                            for="obs_exudado_cantidad_curacion">Otras
                                                                                                            <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                            name="obs_exudado_cantidad_curacion" id="obs_exudado_cantidad_curacion"></textarea>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm"
                                                                                                            for="exudado_calidad_curacion">Exudado-Calidad</label>
                                                                                                        <select name="exudado_calidad_curacion"
                                                                                                            id="exudado_calidad_curacion"
                                                                                                            class="form-control form-control-sm"
                                                                                                            onchange="evaluar_para_carga_detalle('exudado_calidad_curacion','div_exudado_calidad_curacion','obs_exudado_calidad_curacion',6);actualizarTotalPieDiabetico()">
                                                                                                            <option selected
                                                                                                                value="1">
                                                                                                                Seleccione </option>
                                                                                                            <option value="1">Sin
                                                                                                                exudado </option>
                                                                                                            <option value="2">
                                                                                                                Seroso</option>
                                                                                                            <option value="3">
                                                                                                                Turbio</option>
                                                                                                            <option value="4">
                                                                                                                Purulento </option>
                                                                                                            <option value="5">
                                                                                                                Purulento gangrenoso
                                                                                                            </option>
                                                                                                            <option value="6">
                                                                                                                Otros</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group"
                                                                                                        id="div_exudado_calidad_curacion"
                                                                                                        style="display:none;">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm"
                                                                                                            for="obs_exudado_calidad_curacion">Otras
                                                                                                            (Describir)</label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                            name="obs_exudado_calidad_curacion" id="obs_exudado_calidad_curacion"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm"
                                                                                                            for="tejido_esf">Tejido
                                                                                                            esfacelado o
                                                                                                            necrótico</label>
                                                                                                        <select name="tejido_esf"
                                                                                                            id="tejido_esf"
                                                                                                            class="form-control form-control-sm"
                                                                                                            onchange="evaluar_para_carga_detalle('tejido_esf','div_tejido_esf','obs_tejido_esf',6);actualizarTotalPieDiabetico()">
                                                                                                            <option selected
                                                                                                                value="0">
                                                                                                                Seleccione </option>
                                                                                                            <option value="1">
                                                                                                                Ausente</option>
                                                                                                            <option value="2">
                                                                                                                < 25 %</option>
                                                                                                            <option value="3">25 -
                                                                                                                50 %</option>
                                                                                                            <option value="4">>50
                                                                                                                - 75 %</option>
                                                                                                            <option value="5">>75
                                                                                                                %</option>
                                                                                                            <option value="6">
                                                                                                                Otros</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group"
                                                                                                        id="div_tejido_esf"
                                                                                                        style="display:none;">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm t-red"
                                                                                                            for="obs_tejido_esf">Otras
                                                                                                            (Describir)</label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                            name="obs_tejido_esf" id="obs_tejido_esf"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm"
                                                                                                            for="tejido_granu">Tejido
                                                                                                            granulatorio</label>
                                                                                                        <select name="tejido_granu"
                                                                                                            id="tejido_granu"
                                                                                                            class="form-control form-control-sm"
                                                                                                            onchange="evaluar_para_carga_detalle('tejido_granu','div_tejido_granu','obs_tejido_granu',6);actualizarTotalPieDiabetico()">
                                                                                                            <option selected
                                                                                                                value="1">
                                                                                                                Seleccione </option>
                                                                                                            <option value="1">100
                                                                                                                % </option>
                                                                                                            <option value="2">99 -
                                                                                                                75 %</option>
                                                                                                            <option value="3">
                                                                                                                <75 - 50 %</option>
                                                                                                            <option value="4">
                                                                                                                <50 - 25 %</option>
                                                                                                            <option value="5">
                                                                                                                <25 %</option>
                                                                                                            <option value="6">
                                                                                                                Otros</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group"
                                                                                                        id="div_tejido_granu"
                                                                                                        style="display:none;">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm"
                                                                                                            for="obs_tejido_granu">Otras
                                                                                                            (Describir)</label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                            name="obs_tejido_granu" id="obs_tejido_granu"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm"
                                                                                                            for="edema_curacion">Edema</label>
                                                                                                        <select name="edema_curacion"
                                                                                                            id="edema_curacion"
                                                                                                            class="form-control form-control-sm"
                                                                                                            onchange="evaluar_para_carga_detalle('edema_curacion','div_edema_curacion','obs_edema_curacion',6);actualizarTotalPieDiabetico()">
                                                                                                            <option selected
                                                                                                                value="0">
                                                                                                                Seleccione </option>
                                                                                                            <option value="1">
                                                                                                                Ausente </option>
                                                                                                            <option value="2">+
                                                                                                            </option>
                                                                                                            <option value="3">++
                                                                                                            </option>
                                                                                                            <option value="4">+++
                                                                                                            </option>
                                                                                                            <option value="5">++++
                                                                                                            </option>
                                                                                                            <option value="6">
                                                                                                                Otros</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group "
                                                                                                        id="div_edema_curacion"
                                                                                                        style="display:none;">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm"
                                                                                                            for="obs_edema_curacion">Otras
                                                                                                            (Describir)</label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                            name="obs_edema_curacion" id="obs_edema_curacion"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm t-red"
                                                                                                            for="dolor_curacion">Dolor</label>
                                                                                                        <select name="dolor_curacion"
                                                                                                            id="dolor_curacion"
                                                                                                            class="form-control form-control-sm"
                                                                                                            onchange="evaluar_para_carga_detalle('dolor_curacion','div_dolor_curacion','obs_dolor_curacion',6);actualizarTotalPieDiabetico()">
                                                                                                            <option selected
                                                                                                                value="0">
                                                                                                                Seleccione </option>
                                                                                                            <option value="1">0 -
                                                                                                                1</option>
                                                                                                            <option value="2">2 -
                                                                                                                3</option>
                                                                                                            <option value="3">4 -
                                                                                                                6</option>
                                                                                                            <option value="4">7 -
                                                                                                                8</option>
                                                                                                            <option value="5">9 -
                                                                                                                10</option>
                                                                                                            <option value="6">
                                                                                                                Otros</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group"
                                                                                                        id="div_dolor_curacion"
                                                                                                        style="display:none;">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm"
                                                                                                            for="obs_dolor_curacion">Otras
                                                                                                            <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                            name="obs_dolor_curacion" id="obs_dolor_curacion"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm"
                                                                                                            for="piel_circun">Piel
                                                                                                            circundante</label>
                                                                                                        <select name="piel_circun"
                                                                                                            id="piel_circun"
                                                                                                            class="form-control form-control-sm"
                                                                                                            onchange="evaluar_para_carga_detalle('piel_circun','div_piel_circun','obs_piel_circun',6);actualizarTotalPieDiabetico()">
                                                                                                            <option selected
                                                                                                                value="0">
                                                                                                                Seleccione </option>
                                                                                                            <option value="1">
                                                                                                                Sana </option>
                                                                                                            <option value="2">
                                                                                                                Descamada</option>
                                                                                                            <option value="3">
                                                                                                                Erimatosa</option>
                                                                                                            <option value="4">
                                                                                                                Macerada</option>
                                                                                                            <option value="5">
                                                                                                                Gangrena</option>
                                                                                                            <option value="6">
                                                                                                                Otros</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group"
                                                                                                        id="div_piel_circun"
                                                                                                        style="display:none;">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm"
                                                                                                            for="obs_piel_circun">Otras
                                                                                                            (Describir)</label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                            name="obs_piel_circun" id="obs_piel_circun"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm"
                                                                                                            for="ptos_tot_ev_diab">P.Total</label>
                                                                                                        <input type="number"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="ptos_tot_ev_diab"
                                                                                                            id="ptos_tot_ev_diab">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-1">
                                                                                                    <button type="button"
                                                                                                        class="btn btn-outline-primary btn-sm  btn-block"onclick="g_pdiab();">
                                                                                                        <i
                                                                                                            class="feather icon-plus"></i>
                                                                                                        Guía</button>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <div class="form-group">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm"
                                                                                                            for="obs_orin">Obs.
                                                                                                            Curación Pie
                                                                                                            Diabético</label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=5" onblur="this.rows=3;"
                                                                                                            name="obs_orin" id="obs_orin"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div
                                                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <!--ANTECEDENTES RELEVANTES-->
                                                                                                    <div class="form-row">
                                                                                                        <div
                                                                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <h6
                                                                                                                class="t-aten mt-2 mb-2">
                                                                                                                ANTECEDENTES RELEVANTES
                                                                                                            </h6>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div
                                                                                                            class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                                            <label
                                                                                                                class="floating-label-activo-sm"
                                                                                                                for="pat_prop">Enfermedad
                                                                                                                actual</label>
                                                                                                            <select
                                                                                                                class="form-control form-control-sm"
                                                                                                                name="pat_prop"
                                                                                                                id="pat_prop"
                                                                                                                multiple="multiple">
                                                                                                                <option
                                                                                                                    value="1">
                                                                                                                    Hipertensión
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="2">
                                                                                                                    Diabetes</option>
                                                                                                                <option
                                                                                                                    value="3">
                                                                                                                    Hipercolesterolemia
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="4">
                                                                                                                    Hiperlipidemia
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="5">
                                                                                                                    Cancer</option>
                                                                                                                <option
                                                                                                                    value="6">
                                                                                                                    Obesidad</option>
                                                                                                                <option
                                                                                                                    value="7">
                                                                                                                    Hipertiroidismo
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="8">
                                                                                                                    Hipotiroidismo
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="9">
                                                                                                                    Cirugías</option>
                                                                                                                <option
                                                                                                                    value="10">
                                                                                                                    Inmunodepresión
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="11">
                                                                                                                    Tabaquismo</option>
                                                                                                                <option
                                                                                                                    value="12">
                                                                                                                    Insuficiencia venosa
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="13">
                                                                                                                    Insuficiencia
                                                                                                                    arterial</option>
                                                                                                                <option
                                                                                                                    value="14">
                                                                                                                    Sustancias Ilícitas
                                                                                                                </option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                                            <label
                                                                                                                class="floating-label-activo-sm"
                                                                                                                for="sint_act">Medicamentos
                                                                                                                / Tratamientos</label>
                                                                                                            <select
                                                                                                                class="form-control form-control-sm"
                                                                                                                name="sint_act"
                                                                                                                id="sint_act"
                                                                                                                multiple="multiple">
                                                                                                                <option
                                                                                                                    value="1">
                                                                                                                    Hipoglicemiantes
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="2">
                                                                                                                    Antibióticos
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="3">
                                                                                                                    Corticosteroides
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="4">
                                                                                                                    Tratamiento
                                                                                                                    Anticoagulante
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="5">
                                                                                                                    Otros</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-4">
                                                                                                            <label
                                                                                                                class="floating-label-activo-sm"
                                                                                                                for="ot_pat_act">Resultado
                                                                                                                de exámenes</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="2" onfocus="this.rows=4"
                                                                                                                onblur="this.rows=1;" name="ot_pat_act" id="ot_pat_act"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            @if(isset($enfermera))
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 text-right mb-3">
                                                                                                    <button type="button" class="btn btn-success btn-sm" onclick="guardar_valoracion_pie_diabetico()">
                                                                                                        <i class="fas fa-save"></i> Guardar Valoración Pie Diabético
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>
                                                                                            @endif
                                                                                        </div>
                                                                                        <div class="tab-pane fade show"
                                                                                            id="curac_pie" role="tabpanel"
                                                                                            aria-labelledby="curac_pie-tab">
                                                                                            <div class="form-row">
                                                                                                <div
                                                                                                    class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm t-red"
                                                                                                            for="cp_cult_curac_pie">Toma de
                                                                                                            Cultivo</label>
                                                                                                        <select name="cp_cult_curac_pie"
                                                                                                            id="cp_cult_curac_pie"
                                                                                                            class="form-control form-control-sm"
                                                                                                            onchange="evaluar_para_carga_detalle('cp_cult_curac_pie','div_cp_cult_curac_pie','obs_cp_cult_curac_pie',6);">
                                                                                                            <option selected
                                                                                                                value="0">
                                                                                                                Seleccione</option>
                                                                                                            <option value="1">No
                                                                                                            </option>
                                                                                                            <option value="2">Si
                                                                                                            </option>
                                                                                                            <option value="6">
                                                                                                                Observaciones</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group"
                                                                                                        id="div_cp_cult_curac_pie"
                                                                                                        style="display:none;">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm t-red"
                                                                                                            for="obs_cp_cult_curac_pie">Observaciones
                                                                                                            (Describir)</label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                            name="obs_cp_cult_curac_pie" id="obs_cp_cult_curac_pie"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm t-red"
                                                                                                            for="cp_td_curac_pie">Tipos de
                                                                                                            debridamiento</label>
                                                                                                        <select name="cp_td_curac_pie"
                                                                                                            id="cp_td_curac_pie"
                                                                                                            class="form-control form-control-sm"
                                                                                                            onchange="evaluar_para_carga_detalle('cp_td_curac_pie','div_cp_td_curac_pie','obs_cp_td_curac_pie',8);">
                                                                                                            <option selected
                                                                                                                value="0">
                                                                                                                Seleccione </option>
                                                                                                            <option value="1">
                                                                                                                Quirúrgico </option>
                                                                                                            <option value="2">
                                                                                                                Cortante</option>
                                                                                                            <option value="3">
                                                                                                                Enzimático</option>
                                                                                                            <option value="4">
                                                                                                                Autolítico</option>
                                                                                                            <option value="5">
                                                                                                                Osmótico</option>
                                                                                                            <option value="6">
                                                                                                                Larval</option>
                                                                                                            <option value="7">
                                                                                                                Mecánico</option>
                                                                                                            <option value="8">
                                                                                                                Otros</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group"
                                                                                                        id="div_cp_td_curac_pie"
                                                                                                        style="display:none;">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm t-red"
                                                                                                            for="obs_cp_td_curac_pie">Otras
                                                                                                            (Describir)</label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                            name="obs_cp_td_curac_pie" id="obs_cp_td_curac_pie"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm t-red"
                                                                                                            for="cp_duch_curac_pie">Duchoterapia</label>
                                                                                                        <select name="cp_duch_curac_pie"
                                                                                                            id="cp_duch_curac_pie"
                                                                                                            class="form-control form-control-sm"
                                                                                                            onchange="evaluar_para_carga_detalle('cp_duch_curac_pie','div_cp_duch_curac_pie','obs_cp_duch_curac_pie',3);">
                                                                                                            <option selected
                                                                                                                value="0">
                                                                                                                Seleccione</option>
                                                                                                            <option value="1">Si
                                                                                                            </option>
                                                                                                            <option value="2">No
                                                                                                            </option>
                                                                                                            <option value="3">
                                                                                                                Observaciones</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group"
                                                                                                        id="div_cp_duch_curac_pie"
                                                                                                        style="display:none;">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm t-red"
                                                                                                            for="obs_cp_duch_curac_pie">Observaciones
                                                                                                            (Describir)</label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                            name="obs_cp_duch_curac_pie" id="obs_cp_duch_curac_pie"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div
                                                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <div class="form-row mt-2">
                                                                                                        <div
                                                                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <h6 class="t-aten">Tipo de
                                                                                                                Antisépticos y
                                                                                                                materiales usados</h6>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div
                                                                                                            class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <label
                                                                                                                class="floating-label-activo-sm"
                                                                                                                for="pie_ant_curac_pie">Tipo de
                                                                                                                antisepticos</label>
                                                                                                            <select
                                                                                                                class="form-control form-control-sm"
                                                                                                                name="pie_ant_curac_pie"
                                                                                                                id="pie_ant_curac_pie"
                                                                                                                multiple="multiple">
                                                                                                                <option
                                                                                                                    value="1">
                                                                                                                    Solución fisiológica
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="2">
                                                                                                                    Bialcohol</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <label
                                                                                                                class="floating-label-activo-sm"
                                                                                                                for="tpo_aposc_curac_pie">Tipo
                                                                                                                de apósitos y
                                                                                                                materiales</label>
                                                                                                            <select
                                                                                                                class="form-control form-control-sm"
                                                                                                                name="tpo_aposc_curac_pie"
                                                                                                                id="tpo_aposc_curac_pie"
                                                                                                                multiple="multiple">
                                                                                                                <option
                                                                                                                    value="1">
                                                                                                                    Apósitos Pasivos
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="2">
                                                                                                                    Apósito Interactivo
                                                                                                                    (Espuma Hidrofílica)
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="3">
                                                                                                                    Apósito Bioactivo
                                                                                                                    (Alginato)</option>
                                                                                                                <option
                                                                                                                    value="4">
                                                                                                                    Apósitos Mixtos
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="5">
                                                                                                                    Vasocontrictores
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="6">
                                                                                                                    Otros</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div
                                                                                                            class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <label
                                                                                                                class="floating-label-activo-sm"
                                                                                                                for="antisep_curac_pie">Observaciones</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4"
                                                                                                                onblur="this.rows=1;" name="ot_pat_act_curac_pie" id="ot_pat_act_curac_pie"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            @if(isset($enfermera))
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 text-right mb-3">
                                                                                                    <button type="button" class="btn btn-success btn-sm" onclick="guardar_curacion_pie_diabetico()">
                                                                                                        <i class="fas fa-save"></i> Guardar Curación Pie Diabético
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>
                                                                                            @endif
                                                                                        </div>
                                                                                        <!--CURACIÓN Y VALORACIÓN-->
                                                                                        <div class="tab-pane d-none" id="curvalor-dos"
                                                                                            role="tabpanel" aria-labelledby="curvalor-dos-tab">
                                                                                             <div class="form-row">
                                                                                                <div class="col-12 mb-2">
                                                                                                    <h6 class="tit-gen">Curación y valoración</h6>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="lesionpl">Ubicación de la lesión</label>
                                                                                                        <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12">
                                                                                                    <h6 class="tit-gen">Descripción de la lesión</h6>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Tejido necrótico (%)</label>
                                                                                                    <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Tejido esfacelado (%)</label>
                                                                                                    <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                                </div>
                                                                                                 <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Tejido granulatorio (%)</label>
                                                                                                    <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Signos de infección</label>
                                                                                                      <select name="signo_infeccion"   id="signo_infeccion"  class="form-control form-control-sm" >
                                                                                                        <option selected value="0">Seleccione</option>
                                                                                                        <option value="1">Si </option>
                                                                                                        <option value="2">No</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Extensión (cms)</label>
                                                                                                    <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Profundidad (cms)</label>
                                                                                                    <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Exudado cantidad</label>
                                                                                                      <select name="signo_infeccion"   id="signo_infeccion"  class="form-control form-control-sm" >
                                                                                                        <option selected value="0">Seleccione</option>
                                                                                                        <option value="1">Ninguno</option>
                                                                                                        <option value="2">Escaso</option>
                                                                                                        <option value="3">Moderado </option>
                                                                                                        <option value="4">Abundante</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Exudado calidad</label>
                                                                                                      <select name="signo_infeccion"   id="signo_infeccion"  class="form-control form-control-sm" >
                                                                                                        <option selected value="0">Seleccione</option>
                                                                                                        <option value="1">Seroso</option>
                                                                                                        <option value="2">Turbio</option>
                                                                                                        <option value="3">Purulento</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Piel circundante</label>
                                                                                                      <select name="signo_infeccion"   id="signo_infeccion"  class="form-control form-control-sm" >
                                                                                                        <option selected value="0">Seleccione</option>
                                                                                                        <option value="1">Sana</option>
                                                                                                        <option value="2">Pigmentada</option>
                                                                                                        <option value="3">Descamada </option>
                                                                                                        <option value="4">Eritematosa</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Calor local</label>
                                                                                                      <select name="signo_infeccion"   id="signo_infeccion"  class="form-control form-control-sm" >
                                                                                                        <option selected value="0">Seleccione</option>
                                                                                                        <option value="1">Si</option>
                                                                                                        <option value="2">No</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Carga bacteriana (VACAB)</label>
                                                                                                    <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Grado de úlcera</label>
                                                                                                    <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Limpieza de la herida y piel</label>
                                                                                                      <select name="signo_infeccion"   id="signo_infeccion"  class="form-control form-control-sm" >
                                                                                                        <option selected value="0">Seleccione</option>
                                                                                                        <option value="1">Prontosan / PHMB</option>
                                                                                                        <option value="2">Suero fisiológico</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Desbridamiento</label>
                                                                                                      <select name="signo_infeccion"   id="signo_infeccion"  class="form-control form-control-sm" >
                                                                                                        <option selected value="0">Seleccione</option>
                                                                                                        <option value="1">Mecánico</option>
                                                                                                        <option value="2">Autolítico</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Apósito primario</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_busqueda_receta" id="obs_busqueda_receta"></textarea>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Apósito secundario</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_busqueda_receta" id="obs_busqueda_receta"></textarea>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Apósito terciario</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_busqueda_receta" id="obs_busqueda_receta"></textarea>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                    <label class="floating-label-activo-sm">Piel circundante</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_busqueda_receta" id="obs_busqueda_receta"></textarea>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                                                                    <label class="floating-label-activo-sm">Toma cultivo</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_busqueda_receta" id="obs_busqueda_receta"></textarea>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                                                                    <label class="floating-label-activo-sm">Próx. Curación</label>
                                                                                                   <input  type="date" class="form-control form-control-sm" name="prox_curacion" id="prox_curacion">
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                                                                                    <label class="floating-label-activo-sm">Enfermero/a Responsable</label><!--CARGAR NOMBRE AUTOMATICO SEGUN EL USUARIO-->
                                                                                                    <input  type="text" class="form-control form-control-sm" name="eu_responsable" id="eu_responsable">
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                                                                                    <label class="floating-label-activo-sm">Observaciones</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_lesion" id="obs_lesion"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            @if(isset($enfermera))
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 text-right mb-3">
                                                                                                    <button type="button" class="btn btn-success btn-sm" onclick="guardar_curacion_pie_diabetico()">
                                                                                                        <i class="fas fa-save"></i> Guardar Curación Pie Diabético
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     <!--QUEMADOS-->
                                                                    <div class="tab-pane fade" id="cur_quem-1" role="tabpanel" aria-labelledby="cur_quem-tab">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="t-aten">Curación Quemados</h6>
                                                                                <ul class="nav nav-tabs-aten nav-fill mb-2"
                                                                                    id="enf_urgencia" role="tablist">
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link-aten text-reset active"
                                                                                            id="val_quem-tab" data-toggle="tab"
                                                                                            href="#val_quem" role="tab"
                                                                                            aria-controls="val_quem"
                                                                                            aria-selected="true">Valoración</a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link-aten text-reset"
                                                                                            id="curac_quem-tab" data-toggle="tab"
                                                                                            href="#curac_quem" role="tab"
                                                                                            aria-controls="curac_quem"
                                                                                            aria-selected="true" onclick="$('#ants_qm').select2(); $('#tpo_aposqm').select2();">Curación</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="tab-content" id="quemados">
                                                                                    <div class="tab-pane fade show active" id="val_quem" role="tabpanel" aria-labelledby="val_quem-tab">
                                                                                        <div class="form-row">
                                                                                            <div
                                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="qmsupqm">Superficie
                                                                                                        quemada</label>
                                                                                                    <select name="qmsupqm"
                                                                                                        id="qmsupqm"
                                                                                                        class="form-control form-control-sm"
                                                                                                        onchange="evaluar_para_carga_detalle('qmsupqm','div_qmsupqm','obs_qmsupqm',4);">
                                                                                                        <option selected
                                                                                                            value="0">Seleccione
                                                                                                        </option>
                                                                                                        <option value="1">
                                                                                                            < 9% </option>
                                                                                                        <option value="2">9-18%
                                                                                                        </option>
                                                                                                        <option value="3"> >18%
                                                                                                        </option>
                                                                                                        <option value="4">Otros
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group"
                                                                                                    id="div_qmsupqm"
                                                                                                    style="display:none;">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="obs_qmsupqm">Otras
                                                                                                       (Describir)</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                        name="obs_qmsupqm" id="obs_qmsupqm"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                                <div class="form-group">
                                                                                                    <button type="button"
                                                                                                        class="btn btn-outline-primary btn-sm btn-block"onclick="quem();">
                                                                                                        <i
                                                                                                            class="feather icon-plus"></i>
                                                                                                        Guía</button>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="qmdr">Grado
                                                                                                        quemadura</label>
                                                                                                    <select name="qmdr"
                                                                                                        id="qmdr"
                                                                                                        class="form-control form-control-sm"
                                                                                                        onchange="evaluar_para_carga_detalle('qmdr','div_qmdr','obs_qmdr',11);">
                                                                                                        <option selected
                                                                                                            value="0">Seleccione
                                                                                                        </option>
                                                                                                        <option value="1">Primer
                                                                                                            grado</option>
                                                                                                        <option value="2">Segundo
                                                                                                            grado</option>
                                                                                                        <option value="3">Tercer
                                                                                                            grado</option>
                                                                                                        <option value="4">Mixta
                                                                                                        </option>
                                                                                                        <option value="11">
                                                                                                            Observaciones</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group"
                                                                                                    id="div_qmdr"
                                                                                                    style="display:none;">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="obs_qmdr">Observaciones
                                                                                                        (Describir)</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                        name="obs_qmdr" id="obs_qmdr"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="bh_dren_1">Infección</label>
                                                                                                    <select name="qm_presinf"
                                                                                                        id="qm_presinf"
                                                                                                        class="form-control form-control-sm"
                                                                                                        onchange="evaluar_para_carga_detalle('qm_presinf','div_qm_presinf','obs_qm_presinf',2);">
                                                                                                        <option selected
                                                                                                            value="0">Seleccione
                                                                                                        </option>
                                                                                                        <option value="1">No
                                                                                                        </option>
                                                                                                        <option value="2">Si
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group"
                                                                                                    id="div_qm_presinf"
                                                                                                    style="display:none;">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="obs_qm_presinf">Observaciones
                                                                                                        Infección
                                                                                                        (Describir)</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                        name="obs_qm_presinf" id="obs_qm_presinfr"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="qm_tq">Tipo
                                                                                                        quemadura</label>
                                                                                                    <select name="qm_tq"
                                                                                                        id="qm_tq"
                                                                                                        class="form-control form-control-sm"
                                                                                                        onchange="evaluar_para_carga_detalle('qm_tq','div_qm_tq','obs_qm_tq',11);">
                                                                                                        <option selected
                                                                                                            value="0">Seleccione
                                                                                                        </option>
                                                                                                        <option value="1">Solar
                                                                                                        </option>
                                                                                                        <option value="2">Por
                                                                                                            Liquidos</option>
                                                                                                        <option value="3">Vapores
                                                                                                            y gases</option>
                                                                                                        <option value="4">Sust.
                                                                                                            Químicas</option>
                                                                                                        <option value="5">
                                                                                                            Eléctricidad</option>
                                                                                                        <option value="6">Fuego
                                                                                                            directo</option>
                                                                                                        <option value="11">Otros
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group"
                                                                                                    id="div_qm_tq"
                                                                                                    style="display:none;">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="obs_qm_tq">Otra causa
                                                                                                        (Describir)</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                        name="obs_qm_tq" id="obs_qm_tq"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm"
                                                                                                        for="qm_tc">Tipo
                                                                                                        curación</label>
                                                                                                    <select name="qm_tc"
                                                                                                        id="qm_tc"
                                                                                                        class="form-control form-control-sm"
                                                                                                        onchange="evaluar_para_carga_detalle('qm_tc','div_qm_tc','obs_qm_tc',11);">
                                                                                                        <option selected
                                                                                                            value="0">Seleccione
                                                                                                        </option>
                                                                                                        <option value="1">Plana
                                                                                                            superficial</option>
                                                                                                        <option value="2">Con
                                                                                                            remoción de tejidos</option>
                                                                                                        <option value="3">Aseo
                                                                                                            quirúrgico</option>
                                                                                                        <option value="11">Otros
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group"
                                                                                                    id="div_qm_tc"
                                                                                                    style="display:none;">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm"
                                                                                                        for="obs_bh_dren_1">Observaciones
                                                                                                        (Describir)</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                        name="obs_qm_tc" id="obs_qm_tc"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div
                                                                                                class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <!--ANTECEDENTES RELEVANTES-->
                                                                                                <div class="form-row mt-2">
                                                                                                    <div
                                                                                                        class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                        <h6 class="t-aten">
                                                                                                            Antecedentes relevantes</h6>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div
                                                                                                        class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-6 col-xxl-4">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm"
                                                                                                            for="pat_propq">Enfermedad
                                                                                                            actual</label>
                                                                                                        <select
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="pat_propq"
                                                                                                            id="pat_propq"
                                                                                                            multiple="multiple">
                                                                                                            <option value="1">
                                                                                                                Hipertensión</option>
                                                                                                            <option value="2">
                                                                                                                Diabetes</option>
                                                                                                            <option value="3">
                                                                                                                Hipercolesterolemia
                                                                                                            </option>
                                                                                                            <option value="4">
                                                                                                                Hiperlipidemia</option>
                                                                                                            <option value="5">
                                                                                                                Cáncer</option>
                                                                                                            <option value="6">
                                                                                                                Obesidad</option>
                                                                                                            <option value="7">
                                                                                                                Hipertiroidismo</option>
                                                                                                            <option value="8">
                                                                                                                Hipotiroidismo</option>
                                                                                                            <option value="9">
                                                                                                                Cirugías</option>
                                                                                                            <option value="10">
                                                                                                                Inmunodepresión</option>
                                                                                                            <option value="11">
                                                                                                                Tabaquismo</option>
                                                                                                            <option value="12">
                                                                                                                Insuficiencia venosa
                                                                                                            </option>
                                                                                                            <option value="13">
                                                                                                                Insuficiencia arterial
                                                                                                            </option>
                                                                                                            <option value="14">
                                                                                                                Sustancias Ilícitas
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-4">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm"
                                                                                                            for="med_quem">Medicamentos
                                                                                                            / Tratamientos</label>
                                                                                                        <select
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="med_quem"
                                                                                                            id="med_quem"
                                                                                                            multiple="multiple">
                                                                                                            <option value="1">
                                                                                                                Hipoglicemiantes
                                                                                                            </option>
                                                                                                            <option value="2">
                                                                                                                Antibióticos</option>
                                                                                                            <option value="3">
                                                                                                                Corticosteroides
                                                                                                            </option>
                                                                                                            <option value="4">
                                                                                                                Tratamiento
                                                                                                                Anticoagulante</option>
                                                                                                            <option value="5">
                                                                                                                Otros</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-4">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm"
                                                                                                            for="ot_pat_act">Resultado
                                                                                                            de exámenes</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" rows="2" onfocus="this.rows=4"
                                                                                                            onblur="this.rows=1;" name="ot_pat_act" id="ot_pat_act"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                             <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <label class="floating-label-activo-sm">Observaciones al procedimiento</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Especialidad" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="bs_ex_orl" id="obs_ex_orl"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        @if(isset($enfermera))
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-12 text-right mb-3">
                                                                                                <button type="button" class="btn btn-success btn-sm" onclick="guardar_valoracion_quemados()">
                                                                                                    <i class="fas fa-save"></i> Guardar Valoración Quemados
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="tab-pane fade show" id="curac_quem"
                                                                                        role="tabpanel"
                                                                                        aria-labelledby="curac_quem-tab">
                                                                                        <div class="form-row">
                                                                                            <div
                                                                                                class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm"
                                                                                                        for="cp_cult_curac_quem">Toma de
                                                                                                        Cultivo</label>
                                                                                                    <select name="cp_cult_curac_quem"
                                                                                                        id="cp_cult_curac_quem"
                                                                                                        class="form-control form-control-sm"
                                                                                                        onchange="evaluar_para_carga_detalle('cp_cult_curac_quem','div_cp_cult_curac_quem','obs_cp_cult_curac_quem',3);">
                                                                                                        <option selected
                                                                                                            value="0">Seleccione
                                                                                                        </option>
                                                                                                        <option value="1">No
                                                                                                        </option>
                                                                                                        <option value="2">Si
                                                                                                        </option>
                                                                                                        <option value="3">
                                                                                                            Observaciones</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group"
                                                                                                    id="div_cp_cult_curac_quem"
                                                                                                    style="display:none;">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm"
                                                                                                        for="obs_cp_cult_curac_quem">Observaciones
                                                                                                        (Describir)</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                        name="obs_cp_cult_curac_quem" id="obs_cp_cult_curac_quem"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm"
                                                                                                        for="cp_td_curac_quem">Tipos de
                                                                                                        debridamiento</label>
                                                                                                    <select name="cp_td_curac_quem"
                                                                                                        id="cp_td_curac_quem"
                                                                                                        class="form-control form-control-sm"
                                                                                                        onchange="evaluar_para_carga_detalle('cp_td_curac_quem','div_cp_td_curac_quem','obs_cp_td_curac_quem',8);">
                                                                                                        <option selected
                                                                                                            value="0">Seleccione
                                                                                                        </option>
                                                                                                        <option value="1">
                                                                                                            Quirúrgico </option>
                                                                                                        <option value="2">
                                                                                                            Cortante</option>
                                                                                                        <option value="3">
                                                                                                            Enzimático</option>
                                                                                                        <option value="4">
                                                                                                            Autolítico</option>
                                                                                                        <option value="5">
                                                                                                            Osmótico</option>
                                                                                                        <option value="6">Larval
                                                                                                        </option>
                                                                                                        <option value="7">
                                                                                                            Mecánico</option>
                                                                                                        <option value="8">Otros
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group"
                                                                                                    id="div_cp_td_curac_quem"
                                                                                                    style="display:none;">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="obs_cp_td_curac_quem">Otras
                                                                                                        (Describir)</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                        name="obs_cp_td_curac_quem" id="obs_cp_td_curac_quem"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="cp_duch_curac_quem">Duchoterapia</label>
                                                                                                    <select name="cp_duch_curac_quem"
                                                                                                        id="cp_duch_curac_quem"
                                                                                                        class="form-control form-control-sm"
                                                                                                        onchange="evaluar_para_carga_detalle('cp_duch_curac_quem','div_cp_duch_curac_quem','obs_cp_duch_curac_quem',3);">
                                                                                                        <option selected
                                                                                                            value="0">Seleccione
                                                                                                        </option>
                                                                                                        <option value="1">Si
                                                                                                        </option>
                                                                                                        <option value="2">No
                                                                                                        </option>
                                                                                                        <option value="3">
                                                                                                            Observaciones</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group"
                                                                                                    id="div_cp_duch_curac_quem"
                                                                                                    style="display:none;">
                                                                                                    <label
                                                                                                        class="floating-label-activo-sm t-red"
                                                                                                        for="obs_cp_duch_curac_quem">Observaciones
                                                                                                        (Describir)</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                        name="obs_cp_duch_curac_quem" id="obs_cp_duch_curac_quem"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div
                                                                                                class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <div class="form-row mt-2">
                                                                                                    <div
                                                                                                        class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                        <h6 class="t-aten">Tipo de
                                                                                                            Antisépticos y materiales
                                                                                                            usados</h6>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div
                                                                                                        class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm"
                                                                                                            for="ants_qm">Tipo de
                                                                                                            antisepticos y
                                                                                                            cremas</label>
                                                                                                        <select
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="ants_qm"
                                                                                                            id="ants_qm"
                                                                                                            multiple="multiple">
                                                                                                            <option value="1">
                                                                                                                Solución fisiológica
                                                                                                            </option>
                                                                                                            <option value="2">
                                                                                                                Bialcohol</option>
                                                                                                            <option value="3">
                                                                                                                Sulfadiazina de
                                                                                                                plata(Platsul)</option>
                                                                                                            <option value="4">
                                                                                                                Otros</option>
                                                                                                        </select>
                                                                                                        <div class="form-group"
                                                                                                            style="margin-top:2%">
                                                                                                            <label
                                                                                                                class="floating-label-activo-sm"
                                                                                                                for="ot_qx_ac">Anote
                                                                                                                Otro Antiséptico o
                                                                                                                crema</label>
                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=3;"
                                                                                                                name="ot_qx_ac" id="ot_qx_ac"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                        <label
                                                                                                            class="floating-label-activo-sm"
                                                                                                            for="tpo_aposqm">Tipo de
                                                                                                            apósitos y
                                                                                                            materiales</label>
                                                                                                        <select
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="tpo_aposqm"
                                                                                                            id="tpo_aposqm"
                                                                                                            multiple="multiple">
                                                                                                            <option value="1">
                                                                                                                Apósitos Pasivos
                                                                                                            </option>
                                                                                                            <option value="2">
                                                                                                                Apósito
                                                                                                                Interactivo(Espuma
                                                                                                                Hidrofílica)</option>
                                                                                                            <option value="3">
                                                                                                                Apósito
                                                                                                                Bioactivo(Alginato)
                                                                                                            </option>
                                                                                                            <option value="4">
                                                                                                                Apósitos Mixtos</option>
                                                                                                            <option value="5">
                                                                                                                Vasocontrictores
                                                                                                            </option>
                                                                                                            <option value="6">
                                                                                                                Otros</option>
                                                                                                        </select>
                                                                                                        <div class="form-group"
                                                                                                            style="margin-top:2%">
                                                                                                            <label
                                                                                                                class="floating-label-activo-sm mt-10"
                                                                                                                for="ot_qx_apos">Anote
                                                                                                                Otro Tipo de
                                                                                                                apósitos</label>
                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=3;"
                                                                                                                name="ot_qx_apos" id="ot_qx_apos"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm"
                                                                                                                for="obs_gen_cur_qx">Observaciones Curación
                                                                                                                Quemados</label>
                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=3;"
                                                                                                                name="obs_gen_cur_qx" id="obs_gen_cur_qx"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                @if(isset($enfermera))
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12 text-right mb-3">
                                                                                                        <button type="button" class="btn btn-success btn-sm" onclick="guardar_curacion_quemados()">
                                                                                                            <i class="fas fa-save"></i> Guardar Curación Quemados
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!--CURACIÓN Y VALORACIÓN-->
                                                                                    <div class="tab-pane d-none" id="curvalor-tres"
                                                                                        role="tabpanel" aria-labelledby="curvalor-tres-tab">
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm" for="lesionpl">Ubicación de la lesión</label>
                                                                                                    <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12">
                                                                                                <h6 class="tit-gen">Descripción de la lesión</h6>
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                <label class="floating-label-activo-sm">Tejido necrótico (%)</label>
                                                                                                <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                <label class="floating-label-activo-sm">Tejido esfacelado (%)</label>
                                                                                                <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                            </div>
                                                                                             <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                <label class="floating-label-activo-sm">Tejido granulatorio (%)</label>
                                                                                                <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                <label class="floating-label-activo-sm">Signos de infección</label>
                                                                                                  <select name="signo_infeccion"   id="signo_infeccion"  class="form-control form-control-sm" >
                                                                                                    <option selected value="0">Seleccione</option>
                                                                                                    <option value="1">Si </option>
                                                                                                    <option value="2">No</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                <label class="floating-label-activo-sm">Extensión (cms)</label>
                                                                                                <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                <label class="floating-label-activo-sm">Profundidad (cms)</label>
                                                                                                <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                <label class="floating-label-activo-sm">Exudado cantidad</label>
                                                                                                  <select name="signo_infeccion"   id="signo_infeccion"  class="form-control form-control-sm" >
                                                                                                    <option selected value="0">Seleccione</option>
                                                                                                    <option value="1">Ninguno</option>
                                                                                                    <option value="2">Escaso</option>
                                                                                                    <option value="3">Moderado </option>
                                                                                                    <option value="4">Abundante</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                <label class="floating-label-activo-sm">Exudado calidad</label>
                                                                                                  <select name="signo_infeccion"   id="signo_infeccion"  class="form-control form-control-sm" >
                                                                                                    <option selected value="0">Seleccione</option>
                                                                                                    <option value="1">Seroso</option>
                                                                                                    <option value="2">Turbio</option>
                                                                                                    <option value="3">Purulento</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                <label class="floating-label-activo-sm">Piel circundante</label>
                                                                                                  <select name="signo_infeccion"   id="signo_infeccion"  class="form-control form-control-sm" >
                                                                                                    <option selected value="0">Seleccione</option>
                                                                                                    <option value="1">Sana</option>
                                                                                                    <option value="2">Pigmentada</option>
                                                                                                    <option value="3">Descamada </option>
                                                                                                    <option value="4">Eritematosa</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                <label class="floating-label-activo-sm">Calor local</label>
                                                                                                  <select name="signo_infeccion"   id="signo_infeccion"  class="form-control form-control-sm" >
                                                                                                    <option selected value="0">Seleccione</option>
                                                                                                    <option value="1">Si</option>
                                                                                                    <option value="2">No</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                <label class="floating-label-activo-sm">Carga bacteriana (VACAB)</label>
                                                                                                <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                <label class="floating-label-activo-sm">Grado de úlcera</label>
                                                                                                <input  type="text" class="form-control form-control-sm" name="ub_lesion" id="ub_lesion">
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                <label class="floating-label-activo-sm">Limpieza de la herida y piel</label>
                                                                                                  <select name="signo_infeccion"   id="signo_infeccion"  class="form-control form-control-sm" >
                                                                                                    <option selected value="0">Seleccione</option>
                                                                                                    <option value="1">Prontosan / PHMB</option>
                                                                                                    <option value="2">Suero fisiológico</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                <label class="floating-label-activo-sm">Desbridamiento</label>
                                                                                                  <select name="signo_infeccion"   id="signo_infeccion"  class="form-control form-control-sm" >
                                                                                                    <option selected value="0">Seleccione</option>
                                                                                                    <option value="1">Mecánico</option>
                                                                                                    <option value="2">Autolítico</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                <label class="floating-label-activo-sm">Apósito primario</label>
                                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_busqueda_receta" id="obs_busqueda_receta"></textarea>
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                <label class="floating-label-activo-sm">Apósito secundario</label>
                                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_busqueda_receta" id="obs_busqueda_receta"></textarea>
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                <label class="floating-label-activo-sm">Apósito terciario</label>
                                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_busqueda_receta" id="obs_busqueda_receta"></textarea>
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                                                                                <label class="floating-label-activo-sm">Piel circundante</label>
                                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_busqueda_receta" id="obs_busqueda_receta"></textarea>
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                                                                <label class="floating-label-activo-sm">Toma cultivo</label>
                                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_busqueda_receta" id="obs_busqueda_receta"></textarea>
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                                                                <label class="floating-label-activo-sm">Próx. Curación</label>
                                                                                               <input  type="date" class="form-control form-control-sm" name="prox_curacion" id="prox_curacion">
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                                                                                <label class="floating-label-activo-sm">Enfermero/a Responsable</label><!--CARGAR NOMBRE AUTOMATICO SEGUN EL USUARIO-->
                                                                                                <input  type="text" class="form-control form-control-sm" name="eu_responsable" id="eu_responsable">
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_lesion" id="obs_lesion"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--ADMINISTRACIÓN DE TRATAMIENTO INYECTABLE-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="exam_esp_gin">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_gin_c" aria-expanded="false" aria-controls="exam_esp_gin_c">
                                                        Administración de Tratamiento Inyectable
                                                    </button>
                                                </div>
                                                <div id="exam_esp_gin_c" class="collapse" aria-labelledby="exam_esp_gin" data-parent="#exam_esp_gin">
                                                    <div class="card-body-aten-a">
                                                        <div id="form-orl-adulto">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <ul class="nav nav-tabs-aten nav-fill mb-10" id="matron" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset active" id="inyec-gen_tab" data-toggle="tab" href="#inyec-gen" role="tab" aria-controls="inyec-gen" aria-selected="true">Tratamiento Inyectable</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="vac-tab" data-toggle="tab" href="#vac" role="tab" aria-controls="vac" aria-selected="false">Vacunas</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="tab-content" id="matron">
                                                                        <!--INYECTABLES-->
                                                                        <div class="tab-pane fade show active" id="inyec-gen" role="tabpanel" aria-labelledby="inyec-gen_tab">
                                                                            <div class="form-row mt-3">
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="nav flex-column nav-pills" id="v-pills-tab-2" role="tablist" aria-orientation="vertical">
                                                                                        <a class="nav-link-aten text-reset active " id="receta_gen-tab" data-toggle="tab" href="#receta_gen" role="tab" aria-controls="receta_gen" aria-selected="false">Receta Médica</a>
                                                                                        <a class="nav-link-aten text-reset" id="enf_inyect-tab" data-toggle="tab" href="#enf_inyect" role="tab" aria-controls="enf_inyect" aria-selected="false">Inyectable IM/IV</a>
                                                                                        <a class="nav-link-aten text-reset" id="enf_sueros-tab" data-toggle="tab" href="#enf_sueros" role="tab" aria-controls="enf_sueros" aria-selected="false">Control de sueros</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                                                    <div class="tab-content" id="v-pills-tabContent-2">
                                                                                        <div class="tab-pane fade show active" id="receta_gen" role="tabpanel" aria-labelledby="receta_gen-tab">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten d-inline my-2">Receta médica</h6>
                                                                                                    <span class="badge badge-sub d-inline">TRATAMIENTO INYECTABLE</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <div class="alert alert-info py-1 mt-2" role="alert"><i class="feather icon-file-text"></i>Adjuntar receta médica</div>
                                                                                                    <!-- [ Main Content ] start -->
                                                                                                    <div class="dropzone dz-clickable" id="receta-medica-inyectable-enfermeria" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                                    <div class="form-group mt-3">
                                                                                                            <label class="floating-label-activo-sm">Observaciones</label>
                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_busqueda_receta_externa" id="obs_busqueda_receta_externa"></textarea>
                                                                                                        </div>
                                                                                                    <!-- [ file-upload ] end -->
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                                                                                                        <button type="button" class="btn btn-info float-right" onclick="guardar_receta_medica_inyectable_externa();">
                                                                                                            <i class="feather icon-save"></i> Guardar Receta Médica
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                                                                                                    <div class="form-group">
                                                                                                        <input type="hidden" name="busc_receta" id="busc_receta" value="">
                                                                                                        <div class="switch switch-success d-inline m-r-10 mb-2">
                                                                                                            <input type="checkbox" onchange="biopsia('dermat');" id="busc_receta_check_enf" name="busc_receta_check_enf" value="">
                                                                                                            <label for="busc_receta_check_enf" class="cr"></label>
                                                                                                        </div>
                                                                                                        <label>Buscar Receta</label>

                                                                                                        <div class="form-group mt-3">
                                                                                                            <label class="floating-label-activo-sm">ID Receta SDI</label>
                                                                                                            <select class="form-control form-control-sm" id="id_receta_sdi_enf" name="id_receta_sdi_enf" onchange="cargar_receta_sdi_enfermeria();">
                                                                                                                <option value="">Seleccione receta del paciente</option>
                                                                                                                @if(isset($recetas_sdi_paciente) && count($recetas_sdi_paciente) > 0)
                                                                                                                    @foreach($recetas_sdi_paciente as $receta_sdi)
                                                                                                                        <option value="{{ $receta_sdi['id'] }}"
                                                                                                                                data-medicamentos='@json($receta_sdi['medicamentos'] ?? [])'
                                                                                                                                data-profesional="{{ $receta_sdi['profesional'] ?? 'No especificado' }}"
                                                                                                                                data-lugar-atencion="{{ $receta_sdi['lugar_atencion'] ?? 'No especificado' }}">
                                                                                                                            {{ $receta_sdi['label'] }}
                                                                                                                        </option>
                                                                                                                    @endforeach
                                                                                                                @endif
                                                                                                            </select>
                                                                                                            @if(!isset($recetas_sdi_paciente) || count($recetas_sdi_paciente) == 0)
                                                                                                                <small class="text-muted">Este paciente no tiene recetas disponibles para seleccionar.</small>
                                                                                                            @endif
                                                                                                            <div id="detalle_receta_sdi_enf" class="mt-2" style="display:none;"></div>
                                                                                                        </div>
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Observaciones</label>
                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_busqueda_receta_interna" id="obs_busqueda_receta_interna"></textarea>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                                                                                                            <button type="button" class="btn btn-info float-right" onclick="guardar_receta_medica_inyectable_interna();">
                                                                                                                <i class="feather icon-save"></i> Guardar Receta Médica
                                                                                                            </button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="tab-pane fade show" id="enf_inyect" role="tabpanel" aria-labelledby="enf_inyect-tab">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten my-2">Inyectable IM/IV</h6>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="form-group col-12">
                                                                                                    <label class="floating-label-activo">Comentarios del procedimiento</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" id="comentarios_inyectables_imiv" onfocus="this.rows=6" onblur="this.rows=3;"></textarea>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                                                                                    <button type="button" class="btn btn-info  float-right" onclick="guardar_inyectable_im_iv();">
                                                                                                        <i class="feather icon-save"></i> Guardar Inyectable IM/IV
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!--<div class="form-row">
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <label class="floating-label-activo-sm">Incidentes en procedimiento </label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_ex_oidos" id="obs_ex_oidos"></textarea>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <label class="floating-label-activo-sm"> Otras observaciones al procedimiento</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Especialidad" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="bs_ex_orl" id="obs_ex_orl-2"></textarea>
                                                                                                </div>

                                                                                            </div>-->
                                                                                        </div>
                                                                                        <div class="tab-pane fade show" id="enf_sueros" role="tabpanel" aria-labelledby="enf_sueros-tab">

                                                                                                <!--SUEROS-->
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                        <h6 class="t-aten my-2">Sueros</h6>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="form-group col-12">
                                                                                                        <label class="floating-label-activo">Comentarios del procedimiento</label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1" id="comentarios_sueros" onfocus="this.rows=6" onblur="this.rows=3;"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!--<div class="form-row">
                                                                                                    <div class="form-group col-md-6">
                                                                                                        <label class="floating-label-activo">Descripción</label>
                                                                                                        <textarea class="form-control form-control-sm" planceholder="Suero Tipo / hora de inicio / gotas/ min" rows="1" id="descripcion_sueros" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                                                                                    </div>
                                                                                                    <div class="form-group col-md-6">
                                                                                                        <label class="floating-label-activo-sm">Otros tratamientos parenterales</label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;" id="otros_tratamientos_sueros"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Observaciones examen y control</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen mamas" id="observaciones_examen_control_sueros" data-seccion="Mamas" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion-1"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Control de signos vitales durante el procedimiento</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen mamas" id="control_durante_procedimiento_sueros" data-seccion="Mamas" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion-2"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>-->
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                        <button type="button" class="btn btn-info float-right" onclick="guardar_control_sueros();">
                                                                                                            <i class="feather icon-save"></i> Guardar procedimiento sueros
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>

                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                                <!-- tabla para mostrar los tratamientos inyectables -->
                                                                                            <div class="table-responsive mt-3">
                                                                                                <table class="table table-sm table-hover table-striped">
                                                                                                    <thead class="thead-light">
                                                                                                        <tr>
                                                                                                            <th>Tipo</th>
                                                                                                            <th>Fecha</th>
                                                                                                            <th>Detalle</th>
                                                                                                            <th>Observaciones</th>
                                                                                                            <th>Imágenes</th>
                                                                                                            <th>Acciones</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody id="lista_tratamientos_inyectables_enfermeria">
                                                                                                        @if(isset($tratamientos_inyectables) && count($tratamientos_inyectables) > 0)
                                                                                                            @foreach($tratamientos_inyectables as $tratamiento)
                                                                                                            <tr id="tratamiento_iny{{ $tratamiento->id }}">
                                                                                                                <td>
                                                                                                                    <span class="badge badge-primary">{{ $tratamiento->tipo_nombre }}</span>
                                                                                                                </td>
                                                                                                                <td><small>{{ $tratamiento->created_at->format('d/m/Y H:i') }}</small></td>
                                                                                                                <td>
                                                                                                                    @if($tratamiento->tipo == 'receta_medica')
                                                                                                                        <strong>ID Receta:</strong> {{ $tratamiento->id_receta_sdi ?? 'N/A' }}<br>
                                                                                                                        <strong>Buscar:</strong> {{ $tratamiento->buscar_receta ? 'Sí' : 'No' }}
                                                                                                                    @elseif($tratamiento->tipo == 'inyectable_im_iv')
                                                                                                                        {{ Str::limit($tratamiento->incidentes_procedimiento ?? 'Sin incidentes', 50) }}
                                                                                                                    @elseif($tratamiento->tipo == 'control_sueros')
                                                                                                                        {{ Str::limit($tratamiento->descripcion_sueros ?? 'N/A', 50) }}
                                                                                                                    @endif
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    @if($tratamiento->tipo == 'receta_medica')
                                                                                                                        {{ Str::limit($tratamiento->observaciones_receta ?? '', 50) }}
                                                                                                                    @elseif($tratamiento->tipo == 'inyectable_im_iv')
                                                                                                                        {{ Str::limit($tratamiento->otras_observaciones_procedimiento ?? '', 50) }}
                                                                                                                    @elseif($tratamiento->tipo == 'control_sueros')
                                                                                                                        {{ Str::limit($tratamiento->observaciones_examen_control ?? '', 50) }}
                                                                                                                    @endif
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    @if($tratamiento->tipo == 'receta_medica' && $tratamiento->imagenes && count($tratamiento->imagenes) > 0)
                                                                                                                        <button type="button" class="btn btn-sm btn-info" onclick='ver_imagenes_tratamiento({{ $tratamiento->id }}, @json($tratamiento->imagenes))'>
                                                                                                                            <i class="feather icon-image"></i> ({{ count($tratamiento->imagenes) }})
                                                                                                                        </button>
                                                                                                                    @else
                                                                                                                        <span class="text-muted">-</span>
                                                                                                                    @endif
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <button type="button" class="btn btn-sm btn-danger" onclick="eliminar_tratamiento_inyectable({{ $tratamiento->id }});">
                                                                                                                        <i class="feather icon-trash-2"></i>
                                                                                                                    </button>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            @endforeach
                                                                                                        @else
                                                                                                            <tr>
                                                                                                                <td colspan="6" class="text-center text-muted py-3">
                                                                                                                    <i class="feather icon-inbox"></i> No hay tratamientos registrados
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        @endif
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--EXAMEN  CONTROL NATALIDAD-->
                                                                        @include('general.secciones_ficha.pediatria.vacunas_enfermeria')
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--CONTROL DOMICILIARIO-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="ctrl-domiciliario">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c_" aria-expanded="false" aria-controls="diagnostico_c">
                                                       Control Domiciliario
                                                    </button>
                                                </div>
                                                <div id="diagnostico_c_" class="collapse" aria-labelledby="ctrl-domiciliario" data-parent="#ctrl-domiciliario">
                                                    <div class="card-body-aten-a">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <ul class="nav nav-tabs-aten nav-fill mb-3" id="c_domic_enf" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset active" id="oral-cd-tab" data-toggle="tab" href="#oral-cd" role="tab" aria-controls="oral-cd"  aria-selected="true" onclick="$('#tabla_antecedentes_cronicos').DataTable();">Oral</a>
                                                                    </li>
                                                                    {{-- <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="suero-venosa-cd-tab" data-toggle="tab" href="#suero-venosa-cd" role="tab" aria-controls="suero-venosa-cd" aria-selected="false">Suero - Via venosa</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="inyect-cd-tab" data-toggle="tab" href="#inyect-cd" role="tab" aria-controls="inyect-cd" aria-selected="false">Inyectable</a>
                                                                    </li> --}}

                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="curacion-cd-tab" data-toggle="tab" href="#curacion-cd" role="tab" aria-controls="curacion-cd" aria-selected="false">Curaciones y otros procedimientos</a>
                                                                    </li>
                                                                    {{-- <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="ot-proc-cd-tab" data-toggle="tab" href="#ot-proc-cd" role="tab" aria-controls="ot-proc-cd" aria-selected="false">Otros procedimientos</a>
                                                                    </li> --}}
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="nutricion-cd-tab" data-toggle="tab" href="#nutricion-cd" role="tab" aria-controls="nutricion-cd" aria-selected="false">Nutrición</a>
                                                                    </li>
                                                                     <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="resumen-cd-tab" data-toggle="tab" href="#resumen-cd" role="tab" aria-controls="resumen-cd" aria-selected="false">Resumen</a>
                                                                    </li>
                                                                </ul>
                                                                <div class="tab-content" id="c_domic_enf">
                                                                    <!--TTOORAL-->
                                                                    <div class="tab-pane fade show active" id="oral-cd" role="tabpanel"
                                                                        aria-labelledby="oral-cd-tab">
                                                                        <form>
                                                                            <div class="form-row mb-2">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten d-inline">Tratamiento Oral</h6>
                                                                                    <button type="button" class="btn btn-info d-inline float-md-right btn-sm" onclick="oral_cd();"><i class="feather icon-plus"></i> Añadir tratamiento oral</button>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="table-responsive">
                                                                                        <table class="table w-100 f-12" id="tabla_medicamentos_enfermera_medicamentos">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th scope="col" class="hidden" hidden>id_tipo_control</th>
                                                                                                    <th scope="col" class="hidden" hidden>id_producto</th>
                                                                                                    <th scope="col">Medicamento</th>
                                                                                                    <th scope="col" class="hidden" hidden>Componente</th>
                                                                                                    <th scope="col" class="hidden" hidden>id_dosis</th>
                                                                                                    <th scope="col" class="hidden" hidden>id_posologia</th>
                                                                                                    <th scope="col">Dosis</th>
                                                                                                    <th scope="col">Frecuencia</th>
                                                                                                    <th scope="col" class="hidden" hidden>id_via_administracion</th>
                                                                                                    <th scope="col">Método Administración</th>
                                                                                                    <th scope="col" class="hidden" hidden>id_periodo</th>
                                                                                                    <th scope="col">Período TTO</th>
                                                                                                    <th scope="col" class="hidden" hidden>uso_cronico</th>
                                                                                                    <th scope="col" class="hidden" hidden>cantidad</th>
                                                                                                    <th scope="col">Cantidad a dispensar</th>
                                                                                                    <th scope="col">Observaciones</th>
                                                                                                    <th scope="col">Fecha-Hora</th>
                                                                                                    <th scope="col">Profesional</th>
                                                                                                    <th scope="col">Acciones</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @if(isset($tratamiento_activo) && count($tratamiento_activo) > 0)
                                                                                                    @foreach($tratamiento_activo as $tratamiento)
                                                                                                        @if(isset($tratamiento['detalle']) && count($tratamiento['detalle']) > 0)
                                                                                                            @foreach($tratamiento['detalle'] as $r)

                                                                                                                {{-- Determinar si está suspendido --}}
                                                                                                                @php $suspendido = isset($r['estado']) && $r['estado'] == 0; @endphp

                                                                                                                <tr id="enfermeria_row{{ $r['id'] }}"
                                                                                                                    class="{{ $suspendido ? 'table-secondary' : '' }}">

                                                                                                                    <td class="text-wrap hidden" hidden="hidden">{{ $r['id_tipo_control'] ?? '0' }}</td>
                                                                                                                    <td class="text-wrap hidden" hidden="hidden">{{ $r['id_producto'] ?? '0' }}</td>
                                                                                                                    <td class="text-wrap">
                                                                                                                        {{ $r['producto'] ?? '' }}
                                                                                                                        @if($suspendido)
                                                                                                                            <br><span class="badge badge-danger">Suspendido</span>
                                                                                                                        @endif
                                                                                                                    </td>
                                                                                                                    <td class="text-wrap hidden" hidden="hidden">{{ $r['farmaco'] ?? '' }}</td>
                                                                                                                    <td class="text-wrap hidden" hidden="hidden">{{ $r['id_presentacion'] ?? '0' }}</td>
                                                                                                                    <td class="text-wrap">{{ $r['presentacion'] ?? '' }}</td>
                                                                                                                    <td class="text-wrap hidden" hidden="hidden">{{ $r['id_receta_dosis'] ?? '0' }}</td>
                                                                                                                    <td class="text-wrap">{{ $r['posologia'] ?? '' }}</td>
                                                                                                                    <td class="text-wrap hidden" hidden="hidden">{{ $r['id_via_administracion'] ?? '0' }}</td>
                                                                                                                    <td class="text-wrap">{{ $r['via_administracion'] ?? '' }}</td>
                                                                                                                    <td class="text-wrap hidden" hidden="hidden">{{ $r['id_periodo'] ?? '0' }}</td>
                                                                                                                    <td class="text-wrap">{{ $r['periodo'] ?? '' }}</td>
                                                                                                                    <td class="text-wrap hidden" hidden="hidden">{{ $r['uso_cronico'] ?? '0' }}</td>
                                                                                                                    <td class="text-wrap hidden" hidden="hidden">{{ $r['cantidad'] ?? '0' }}</td>
                                                                                                                    <td class="text-wrap">{{ $r['cantidad_compra'] ?? '' }}</td>
                                                                                                                    <td class="text-wrap">{{ $r['comentario'] ?? '-' }}</td>

                                                                                                                    {{-- Fecha-Hora última administración --}}
                                                                                                                    <td class="text-wrap">
                                                                                                                        @if(!empty($r['ultima_administracion_fecha']) && !empty($r['ultima_administracion_hora']))
                                                                                                                            <span class="badge badge-success">
                                                                                                                                Última: {{ $r['ultima_administracion_fecha'] }} {{ $r['ultima_administracion_hora'] }}
                                                                                                                            </span>
                                                                                                                            @if(!empty($r['horas_desde_ultima_admin']))
                                                                                                                                <br><small class="text-muted">Hace {{ $r['horas_desde_ultima_admin'] }} horas</small>
                                                                                                                            @endif
                                                                                                                        @else
                                                                                                                            <span class="text-muted">Sin administraciones</span>
                                                                                                                        @endif

                                                                                                                        {{-- Badge suspendido en columna fecha también --}}
                                                                                                                        @if($suspendido)
                                                                                                                            <br><span class="badge badge-warning">Finalizado</span>
                                                                                                                        @endif
                                                                                                                    </td>

                                                                                                                    {{-- Profesional --}}
                                                                                                                    <td class="text-wrap" id="enfermeria_row_profesional_{{ $r['id'] }}">
                                                                                                                        {{ !empty($r['nombre_responsable']) ? $r['nombre_responsable'] : '-' }}
                                                                                                                    </td>

                                                                                                                    {{-- Acciones --}}
                                                                                                                    <td class="text-wrap text-center d-flex justify-content-center">
                                                                                                                        <button type="button"
                                                                                                                            class="btn btn-success btn-sm btn-icon"
                                                                                                                            onclick="administrar_medicamento_enf({{ $r['id'] }})"
                                                                                                                            id="btn_administrar_{{ $r['id'] }}"
                                                                                                                            {{ $suspendido ? 'disabled' : '' }}>
                                                                                                                            <i class="fas fa-syringe"></i>
                                                                                                                        </button>
{{--
                                                                                                                        <button type="button" class="btn btn-info btn-sm btn-icon mx-1 rounded-circle"
                                                                                                                        onclick="editar_observacion_medicamento_enfermeria({{ $r['id'] }});"
                                                                                                                        title="Editar observaciones" id="btn_observacion_{{ $r['id'] }}"
                                                                                                                        {{ $suspendido ? 'disabled' : '' }}>
                                                                                                                            <i class="fas fa-comment-dots"></i>
                                                                                                                        </button> --}}

                                                                                                                        <button type="button"
                                                                                                                            class="btn btn-danger btn-sm btn-icon ml-1"
                                                                                                                            onclick="finalizar_medicamento_enfermeria({{ $r['id'] }})"
                                                                                                                            id="btn_finalizar_{{ $r['id'] }}"
                                                                                                                            {{ $suspendido ? 'disabled' : '' }}>
                                                                                                                            <i class="fas fa-stop-circle"></i>
                                                                                                                        </button>
                                                                                                                    </td>
                                                                                                                </tr>

                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                @else
                                                                                                    <tr>
                                                                                                        <td colspan="19" class="text-center text-muted">
                                                                                                            <i class="fas fa-info-circle"></i> Sin medicamentos registrados
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                @endif
                                                                                            </tbody>
                                                                                        </table>

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            {{-- ==========================================--}}
{{-- ANTECEDENTES CRÓNICOS --}}
{{-- ==========================================--}}
<div class="form-row mt-4">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h6 class="font-weight-bold text-primary">
            <i class="fas fa-notes-medical"></i> Antecedentes Crónicos
        </h6>
        <div class="table-responsive">
            <table class="table w-100 f-12" id="tabla_antecedentes_cronicos">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Profesional</th>
                        <th scope="col">RUT Responsable</th>
                        <th scope="col">Comentario</th>
                        <th scope="col">Fecha Registro</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $antecedentes_cronicos = isset($antecedentes)
                            ? $antecedentes->where('id_tipo_antecedente', 1)
                            : collect();
                    @endphp

                    @if($antecedentes_cronicos->count() > 0)
                        @foreach($antecedentes_cronicos as $antecedente)
                            @php $data = $antecedente->antecedente_data; @endphp
                            @if(isset($data))
                                <tr>
                                    <td class="text-wrap">
                                        {{ !empty($data->nombre) ? $data->nombre : '-' }}
                                    </td>
                                    <td class="text-wrap">
                                        {{ !empty($data->fecha) ? \Carbon\Carbon::parse($data->fecha)->format('d-m-Y') : '-' }}
                                    </td>
                                    <td class="text-wrap">
                                        {{ !empty($data->profesional) ? $data->profesional : '-' }}
                                    </td>
                                    <td class="text-wrap">
                                        {{ !empty($data->rut_responsable) ? $data->rut_responsable : '-' }}
                                    </td>
                                    <td class="text-wrap">
                                        {{ !empty($data->comentario) ? $data->comentario : '-' }}
                                    </td>
                                    <td class="text-wrap">
                                        {{ !empty($data->fecha_regitro) ? $data->fecha_regitro : '-' }}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                <i class="fas fa-info-circle"></i> Sin antecedentes crónicos registrados
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

                                                                        </form>
                                                                    </div>
                                                                    <!--TTO SUERO - VIA VENOSA-->
                                                                    <div class="tab-pane fade show" id="suero-venosa-cd" role="tabpanel"
                                                                        aria-labelledby="suero-venosa-cd-tab">
                                                                        <form>
                                                                            <div class="form-row">

                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-xs f-12" id="tabla_tratamiento_suero_enfermera">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th scope="col">Medicamentos</th>
                                                                                                    <th scope="col">Hora Inicio</th>
                                                                                                    <th scope="col">Hora Término</th>
                                                                                                    <th scope="col">CC/Hora</th>
                                                                                                    <th scope="col">Sitio Punción</th>
                                                                                                    <th scope="col">Observaciones</th>
                                                                                                    <th scope="col">Fecha</th>
                                                                                                    <th scope="col">Acciones</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @if(isset($controles_domiciliarios) && count($controles_domiciliarios) > 0)
                                                                                                    @foreach($controles_domiciliarios as $suero)
                                                                                                        <tr>
                                                                                                            <td class="text-wrap">{{ $suero->medicamentos ?? 'N/A' }}</td>
                                                                                                            <td>{{ $suero->hora_inicio ? \Carbon\Carbon::parse($suero->hora_inicio)->format('H:i') : 'N/A' }}</td>
                                                                                                            <td>{{ $suero->hora_termino ? \Carbon\Carbon::parse($suero->hora_termino)->format('H:i') : 'N/A' }}</td>
                                                                                                            <td>{{ $suero->cc_hora ?? 'N/A' }}</td>
                                                                                                            <td class="text-wrap">{{ $suero->sitio_puncion ?? 'N/A' }}</td>
                                                                                                            <td class="text-wrap text-justify">{{ $suero->observaciones ?? 'Sin observaciones' }}</td>
                                                                                                            <td>{{ $suero->fecha ? \Carbon\Carbon::parse($suero->fecha)->format('d-m-Y') : 'N/A' }}</td>
                                                                                                            <td>
                                                                                                                <button type="button" class="btn btn-xxs btn-primary mr-1"
                                                                                                                    onclick="editar_suero_venoso({{ $suero->id }}, '{{ $suero->medicamentos }}', '{{ $suero->hora_inicio ? \Carbon\Carbon::parse($suero->hora_inicio)->format('H:i') : '' }}', '{{ $suero->hora_termino ? \Carbon\Carbon::parse($suero->hora_termino)->format('H:i') : '' }}', '{{ $suero->cc_hora }}', '{{ $suero->sitio_puncion }}', '{{ addslashes($suero->observaciones) }}', '{{ $suero->fecha ? \Carbon\Carbon::parse($suero->fecha)->format('Y-m-d') : '' }}')"
                                                                                                                    title="Editar">
                                                                                                                    <i class="fas fa-edit"></i>
                                                                                                                </button>
                                                                                                                <button type="button" class="btn btn-xxs btn-danger"
                                                                                                                    onclick="eliminar_registro({{ $suero->id }})"
                                                                                                                    title="Eliminar" disabled>
                                                                                                                    <i class="fas fa-trash"></i>
                                                                                                                </button>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    @endforeach
                                                                                                @else
                                                                                                    <tr>
                                                                                                        <td colspan="8" class="text-center">No hay tratamientos de suero registrados</td>
                                                                                                    </tr>
                                                                                                @endif
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <!--INYECTABLE-->
                                                                    <div class="tab-pane fade show" id="inyect-cd" role="tabpanel"
                                                                        aria-labelledby="inyect-cd-tab">
                                                                        <form>
                                                                            <div class="form-row">

                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-xs f-12" id="tabla_inyecciones_enfermera">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th scope="col">Medicamento y Dosis</th>
                                                                                                <th scope="col">Fecha-hora</th>
                                                                                                <th scope="col">Observaciones</th>
                                                                                                <th scope="col">Profesional</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            {{-- <tr>
                                                                                                <td class="text-wrap">Diclofenaco 75 mg (1 ampolla)</td>
                                                                                                <td class="text-wrap">11/09/2024 11:23</td>
                                                                                                <td class="text-wrap text-justify">Texto falsoLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                                                </td>
                                                                                                <td class="text-wrap">Nombre Apellido</td>
                                                                                            </tr> --}}
                                                                                        </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                      <!--NUTRICION -->
                                                                    <div class="tab-pane fade show" id="nutricion-cd" role="tabpanel" aria-labelledby="nutricion-cd-tab">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="tab-content" id="matron">
                                                                                    <!--NUTRICION-->
                                                                                    <div class="tab-pane fade show active" id="nutricion-comida" role="tabpanel" aria-labelledby="nutricion-comida-tab">
                                                                                        <div class="form-row">

                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="nav flex-column nav-pills" id="v-pills-tab-2" role="tablist" aria-orientation="vertical">
                                                                                                    <a class="nav-link-aten text-reset active " id="nutricion-proc-tab" data-toggle="tab" href="#nutricion-proc" role="tab" aria-controls="nutricion-proc" aria-selected="false">Procedimiento</a>
                                                                                                    <a class="nav-link-aten text-reset" id="evaluacion-nutricion-tab" data-toggle="tab" href="#evaluacion-nutricion" role="tab" aria-controls="evaluacion-nutricion" aria-selected="false">Evaluación nutricional</a>
                                                                                                    <a class="nav-link-aten text-reset" id="pauta-nutricion-tab" data-toggle="tab" href="#pauta-nutricion" role="tab" aria-controls="pauta-nutricion" aria-selected="false">Pauta nutricional</a>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                                                            <div class="tab-content" id="v-pills-tabContent-2">
                                                                                                <div class="tab-pane fade show active" id="nutricion-proc" role="tabpanel" aria-labelledby="nutricion-proc-tab">
                                                                                                    <div class="row mb-3">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                <h6 class="t-aten d-inline my-2">Procedimiento</h6>
                                                                                                                <span class="badge badge-sub d-inline">NUTRICIÓN</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                     <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-6">
                                                                                                            <div class="form-group mt-2">
                                                                                                                <label class="floating-label-activo">Tipo de alimentación</label>
                                                                                                                <select class="form-control form-control-sm">
                                                                                                                <option>Seleccione</option>
                                                                                                                <option>NUTRICIÓN VIA ORAL</option>
                                                                                                                <option>NUTRICIÓN VIA ENTERAL</option>
                                                                                                                <option>NUTRICIÓN PARENTERAL</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo" for="resumen_nutricion_parenteral">Comentarios del procedimiento</label>
                                                                                                                <textarea class="form-control" id="resumen_nutricion_parenteral" rows="4" onfocus="this.rows=6" onblur="this.rows=3;"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="tab-pane fade show" id="evaluacion-nutricion" role="tabpanel" aria-labelledby="evaluacion-nutricion-tab">
                                                                                                    <div class="row mb-3">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                <h6 class="t-aten d-inline my-2">Evaluación nutricional</h6>
                                                                                                                <span class="badge badge-sub d-inline">NUTRICIÓN</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            @if(isset($docs_nutricion_evaluacion) && count($docs_nutricion_evaluacion) > 0)
                                                                                                                @foreach($docs_nutricion_evaluacion as $doc)
                                                                                                                    <div class="card-lineal mb-2">
                                                                                                                        <div class="card-body">
                                                                                                                            <div class="d-flex align-items-center">
                                                                                                                                <i class="fas fa-file-pdf fa-2x text-danger mr-3"></i>
                                                                                                                                <div>
                                                                                                                                    <strong>{{ $doc->nombre_original }}</strong>
                                                                                                                                    <br>
                                                                                                                                    <small>
                                                                                                                                        Emitido por {{ $doc->Nutricionista ? $doc->Nutricionista->nombre . ' ' . $doc->Nutricionista->apellido_uno : 'N/A' }}
                                                                                                                                        <br>
                                                                                                                                        {{ $doc->created_at ? $doc->created_at->format('d-m-Y H:i') : 'N/A' }} hrs
                                                                                                                                    </small>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <hr>
                                                                                                                            <a href="{{ $doc->url }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                                                                                                <i class="feather icon-file-text"></i>
                                                                                                                                Ver documento
                                                                                                                            </a>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                @endforeach
                                                                                                            @else
                                                                                                                <div class="alert alert-info">
                                                                                                                    <i class="feather icon-info mr-2"></i>
                                                                                                                    No hay evaluaciones nutricionales adjuntas
                                                                                                                </div>
                                                                                                            @endif
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                             <div class="form-group">
                                                                                                                <label class="floating-label-activo" for="nutricionista_evaluacion">Nutricionista que emitió el documento</label>
                                                                                                                <select class="form-control form-control-sm" id="nutricionista_evaluacion" name="nutricionista_evaluacion">
                                                                                                                    <option value="">Seleccione nutricionista</option>
                                                                                                                    @foreach($nutricionistas as $nutricionista)
                                                                                                                        <option class="text-uppercase" value="{{ $nutricionista->id }}">{{ $nutricionista->nombre }} {{ $nutricionista->apellido_uno }}</option>
                                                                                                                    @endforeach
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <h6 class="my-2">Adjunte la evaluación nutricional (PDF, Word, Excel o imágenes - máx. 10MB).</h6>

                                                                                                            <input type="hidden" name="docs_nutricion_evaluacion" id="docs_nutricion_evaluacion" value="">
                                                                                                            <div class="dropzone dz-clickable" id="dz-nutricion-evaluacion" action="{{ route('profesional.archivo.carga') }}"></div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="tab-pane fade show" id="pauta-nutricion" role="tabpanel" aria-labelledby="pauta-nutricion-tab">
                                                                                                    <div class="row mb-3">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                <h6 class="t-aten d-inline my-2">Pauta nutricional</h6>
                                                                                                                <span class="badge badge-sub d-inline">NUTRICIÓN</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            @if(isset($docs_nutricion_pauta) && count($docs_nutricion_pauta) > 0)
                                                                                                                @foreach($docs_nutricion_pauta as $doc)
                                                                                                                    <div class="card-lineal mb-2">
                                                                                                                        <div class="card-body">
                                                                                                                            <div class="d-flex align-items-center">
                                                                                                                                <i class="fas fa-file-pdf fa-2x text-danger mr-3"></i>
                                                                                                                                <div>
                                                                                                                                    <strong>{{ $doc->nombre_original }}</strong>
                                                                                                                                    <br>
                                                                                                                                    <small>
                                                                                                                                        Emitido por {{ $doc->Nutricionista ? $doc->Nutricionista->nombre . ' ' . $doc->Nutricionista->apellido_uno : 'N/A' }}
                                                                                                                                        <br>
                                                                                                                                        {{ $doc->created_at ? $doc->created_at->format('d-m-Y H:i') : 'N/A' }} hrs
                                                                                                                                    </small>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <hr>
                                                                                                                            <a href="{{ $doc->url }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                                                                                                <i class="feather icon-file-text"></i>
                                                                                                                                Ver documento
                                                                                                                            </a>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                @endforeach
                                                                                                            @else
                                                                                                                <div class="alert alert-info">
                                                                                                                    <i class="feather icon-info mr-2"></i>
                                                                                                                    No hay pautas nutricionales adjuntas
                                                                                                                </div>
                                                                                                            @endif
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <h6 class="my-2">Adjunte la pauta nutricional (PDF, Word, Excel o imágenes - máx. 10MB).</h6>
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo" for="nutricionista_pauta">Nutricionista que emitió el documento</label>
                                                                                                                <select class="form-control form-control-sm" id="nutricionista_pauta" name="nutricionista_pauta">
                                                                                                                    <option value="">Seleccione nutricionista</option>
                                                                                                                    @foreach($nutricionistas as $nutricionista)
                                                                                                                        <option value="{{ $nutricionista->id }}">{{ $nutricionista->nombre }} {{ $nutricionista->apellido }}</option>
                                                                                                                    @endforeach
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <input type="hidden" name="docs_nutricion_pauta" id="docs_nutricion_pauta" value="">
                                                                                                            <div class="dropzone dz-clickable" id="dz-nutricion-pauta" action="{{ route('profesional.archivo.carga') }}"></div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--RESUMEN-->
                                                                    <div class="tab-pane fade show" id="resumen-cd" role="tabpanel" aria-labelledby="resumen-cd-tab">
                                                                        <div class="form-row mb-2">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten d-inline">Resumen de controles</h6>
                                                                                </div>
                                                                            </div>
                                                                        <!-- Gráficos de evolución -->
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <!-- Pills para separar los gráficos -->
                                                                                <ul class="nav nav-pills nav-fill mb-3" id="graficos-pills" role="tablist">
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link-aten text-reset active" id="presion-arterial-pill" data-toggle="pill" href="#grafico-presion" role="tab" aria-controls="grafico-presion" aria-selected="true">
                                                                                            <i class="fas fa-heartbeat mr-1"></i>Presión Arterial
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link-aten text-reset" id="control-peso-pill" data-toggle="pill" href="#grafico-peso" role="tab" aria-controls="grafico-peso" aria-selected="false">
                                                                                            <i class="fas fa-weight mr-1"></i>Control de Peso
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link-aten text-reset" id="procedimientos-pill" data-toggle="pill" href="#lista-procedimientos" role="tab" aria-controls="lista-procedimientos" aria-selected="false">
                                                                                            <i class="fas fa-procedures mr-1"></i>Procedimientos
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link-aten text-reset" id="tratamientos-pill" data-toggle="pill" href="#grafico-tratamientos" role="tab" aria-controls="grafico-tratamientos" onclick="actualizarTratamientos()" aria-selected="false">
                                                                                            <i class="fas fa-pills mr-1"></i>Tratamientos
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>

                                                                                <!-- Contenido de las pestañas -->
                                                                                <div class="tab-content" id="graficos-content">
                                                                                    <!-- Gráfico de Presión Arterial -->
                                                                                    <div class="tab-pane fade show active" id="grafico-presion" role="tabpanel" aria-labelledby="presion-arterial-pill">
                                                                                        <div class="card">

                                                                                            <div class="card-body">
                                                                                                <div class="chart-container" style="position: relative; height: 400px;">
                                                                                                    <canvas id="chartPresionArterial"></canvas>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Gráfico de Control de Peso -->
                                                                                    <div class="tab-pane fade" id="grafico-peso" role="tabpanel" aria-labelledby="control-peso-pill">
                                                                                        <div class="card">

                                                                                            <div class="card-body">
                                                                                                <div class="chart-container" style="position: relative; height: 400px;">
                                                                                                    <canvas id="chartControlPeso"></canvas>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Lista de Procedimientos -->
                                                                                    <div class="tab-pane fade" id="lista-procedimientos" role="tabpanel" aria-labelledby="procedimientos-pill">
                                                                                        <div class="card">
                                                                                            {{-- <div class="card-header">
                                                                                                <h6 class="mb-0"><i class="fas fa-procedures mr-2 text-success"></i>Historial de Procedimientos</h6>
                                                                                            </div> --}}
                                                                                            <div class="card-body">
                                                                                                @if(isset($resumen_procedimientos) && $resumen_procedimientos->count() > 0)
                                                                                                    <div class="timeline-container">
                                                                                                        @foreach($resumen_procedimientos as $proc)
                                                                                                            <div class="timeline-item">
                                                                                                                <div class="timeline-marker {{ $proc->color }}">
                                                                                                                    <i class="{{ $proc->icono }} text-white"></i>
                                                                                                                </div>
                                                                                                                <div class="timeline-content">
                                                                                                                    <div class="d-flex justify-content-between">
                                                                                                                        <h6 class="mb-1 font-weight-bold">{{ $proc->nombre }}</h6>
                                                                                                                        <div class="text-right">
                                                                                                                            @if($proc->estado == 1)
                                                                                                                                <span class="badge badge-success">Completado</span>
                                                                                                                            @else
                                                                                                                                <span class="badge badge-warning">Pendiente</span>
                                                                                                                            @endif
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="row mb-2">
                                                                                                                        <div class="col-md-6">
                                                                                                                            <small class="text-muted">
                                                                                                                                <i class="fas fa-calendar mr-1"></i>{{ $proc->fecha ?? 'Sin fecha' }}
                                                                                                                            </small>
                                                                                                                        </div>
                                                                                                                        <div class="col-md-6">
                                                                                                                            <small class="text-muted">
                                                                                                                                <i class="fas fa-clock mr-1"></i>{{ $proc->hora ?? 'Sin hora' }}
                                                                                                                            </small>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="mb-2">
                                                                                                                        <small class="text-muted">
                                                                                                                            <i class="fas fa-user mr-1"></i><strong>Responsable:</strong> {{ $proc->responsable ?? 'No especificado' }}
                                                                                                                        </small>
                                                                                                                    </div>
                                                                                                                    @if(!empty($proc->indicaciones))
                                                                                                                        <div class="alert alert-info alert-sm mt-2 mb-0">
                                                                                                                            <small><strong>Indicaciones:</strong> {{ $proc->indicaciones }}</small>
                                                                                                                        </div>
                                                                                                                    @endif
                                                                                                                    @if(!empty($proc->observaciones))
                                                                                                                        <div class="mt-2">
                                                                                                                            <small class="text-muted">
                                                                                                                                <strong>Observaciones:</strong>
                                                                                                                                {{ $proc->observaciones }}
                                                                                                                            </small>
                                                                                                                        </div>
                                                                                                                    @endif
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        @endforeach
                                                                                                    </div>
                                                                                                @else
                                                                                                    <div class="text-center py-4">
                                                                                                        <i class="fas fa-procedures fa-3x text-muted mb-3"></i>
                                                                                                        <h6 class="text-muted">No hay procedimientos ni curaciones registradas</h6>
                                                                                                        <p class="text-muted mb-0">Los registros realizados apareceran aqui</p>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Gráfico de Tratamientos -->
                                                                                    <div class="tab-pane fade" id="grafico-tratamientos" role="tabpanel" aria-labelledby="tratamientos-pill">
                                                                                        <div class="card">
                                                                                            <div class="card-header">
                                                                                                <h6 class="mb-0 text-primary bg-light"><i class="fas fa-pills mr-2 text-warning"></i>Análisis de Tratamientos Activos</h6>
                                                                                            </div>
                                                                                            <div class="card-body">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="chart-container" style="position: relative; height: 350px;">
                                                                                                            <canvas id="chartTratamientosEstado"></canvas>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="chart-container" style="position: relative; height: 350px;">
                                                                                                            <canvas id="chartTratamientosVia"></canvas>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Resumen de medicamentos -->
                                                                                                <div class="row mt-3">
                                                                                                    <div class="col-12">
                                                                                                        <h6 class="mb-3"><i class="fas fa-list mr-2"></i>Resumen de Medicamentos</h6>
                                                                                                        <div id="resumenMedicamentos" class="table-responsive">
                                                                                                            <!-- Se llenará con JavaScript -->
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Fin gráficos de evolución -->
                                                                    </div>
                                                                    <!--CURACIONES Y OTROS PROCEDIMIENTO-->
                                                                    <div class="tab-pane fade show" id="curacion-cd" role="tabpanel">
                                                                       <form>
                                                                            <div class="form-row mb-2">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten d-inline">Curaciones y otros procedimientos</h6>
                                                                                    <button type="button" role="button" class="btn btn-info d-inline float-md-right btn-sm" onclick="m_curacion_procedimiento();"><i class="feather icon-plus"></i> Añadir curación o procedimiento</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">

                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-xs f-12" id="tabla_curaciones_enfermera">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th class="align-middle">Fecha y Hora</th>
                                                                                                    <th class="align-middle">Procedimiento</th>
                                                                                                    <th class="align-middle">Alertas e incidencias</th>
                                                                                                    <th class="align-middle">Acción</th>
                                                                                                    <th class="align-middle">Materiales</th>
                                                                                                    <th class="align-middle">Acciones</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                {{-- @foreach($controles_domiciliarios as $curacion)
                                                                                                    @if($curacion->medicamentos == 'Curación')
                                                                                                        <tr>
                                                                                                            <td class="text-wrap">{{ $curacion->created_at ? \Carbon\Carbon::parse($curacion->created_at)->format('d-m-Y H:i') : 'N/A' }}</td>
                                                                                                            <td class="text-wrap text-justify">{{ $curacion->observaciones ?? 'Sin observaciones' }}</td>
                                                                                                            <td class="text-wrap">{{ Auth::user()->name ?? 'Profesional' }}</td>
                                                                                                            <td class="text-wrap">
                                                                                                                <button type="button" class="btn btn-icon btn-warning mr-1"
                                                                                                                    onclick="editar_curacion({{ $curacion->id }}, '{{ addslashes($curacion->observaciones) }}')"
                                                                                                                    title="Editar">
                                                                                                                    <i class="feather icon-edit"></i>
                                                                                                                </button>
                                                                                                                <button type="button" class="btn btn-icon btn-danger"
                                                                                                                    onclick="eliminar_registro({{ $curacion->id }})"
                                                                                                                    title="Eliminar">
                                                                                                                    <i class="feather icon-x"></i>
                                                                                                                </button>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    @endif
                                                                                                @endforeach --}}
                                                                                                @foreach($curaciones as $c)
                                                                                                    <tr id="curacion_row_{{ $c->id }}">
                                                                                                        <td>{{ $c->fecha }} {{ $c->hora }} <br> {{ $c->responsable }}</td>
                                                                                                            <td class="align-middle">{{ $c->datos_curacion->nombre_procedimiento ?? 'N/A' }}</td>
                                                                                                            <td class="align-middle">
                                                                                                                <input type="text" class="form-control form-control-sm"
                                                                                                                    id="vigilancia_curacion_servicio{{ $c->id }}"
                                                                                                                    value="{{ $c->otros }}"
                                                                                                                    @if($c->estado == 1) disabled @endif />
                                                                                                            </td>
                                                                                                            <td class="align-middle">
                                                                                                                <div class="switch switch-success d-inline">
                                                                                                                    <input type="checkbox" id="curaciones_servicio_listo{{ $c->id }}" onchange="cambiarTextoLabelCuracion({{ $c->id }})" @if($c->estado == 1) checked @endif>
                                                                                                                    <label for="curaciones_servicio_listo{{ $c->id }}" id="label_curacion_switch{{ $c->id }}" class="cr"></label>
                                                                                                                </div><br>
                                                                                                                <label for="" id="label_curacion_footer{{ $c->id }}" class="badge @if($c->estado == 1) badge-success @else badge-warning @endif">
                                                                                                                    @if($c->estado == 1) Finalizado @else Pendiente @endif
                                                                                                                </label>
                                                                                                            </td>
                                                                                                            <td class="align-middle">
                                                                                                                <button type="button" class="btn btn-primary-light-c btn-xxs" onclick="cargarInsumosCuracion({{ $c->id }})">
                                                                                                                    Insumos
                                                                                                                </button>
                                                                                                            </td>
                                                                                                        <td class="text-wrap">
                                                                                                            <button type="button" class="btn btn-icon btn-warning mr-1"
                                                                                                                onclick="editar_curacion({{ $c->id }})" title="Editar">
                                                                                                                <i class="feather icon-edit"></i>
                                                                                                            </button>
                                                                                                            <button type="button" class="btn btn-icon btn-danger"
                                                                                                                onclick="eliminar_registro({{ $c->id }})"
                                                                                                                title="Eliminar" disabled>
                                                                                                                <i class="feather icon-x"></i>
                                                                                                            </button>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                @endforeach
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <!--OTROS PROCEDIMIENTOS-->
                                                                    <div class="tab-pane fade show" id="ot-proc-cd" role="tabpanel"
                                                                        aria-labelledby="ot-proc-cd-tab">
                                                                        <form>
                                                                            <div class="form-row">

                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-xs f-12" id="tabla_otros_procedimientos_enfermera">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th scope="col">Día-Hora / Procedimiento</th>
                                                                                                    <th scope="col">Procedimiento</th>
                                                                                                    <th scope="col">Observaciones</th>
                                                                                                    <th scope="col">Profesional</th>
                                                                                                    <th scope="col">Acciones</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @foreach($procedimientos as $otro_procedimiento)
                                                                                                        <tr>
                                                                                                            <td class="text-wrap">{{ $otro_procedimiento->created_at ? \Carbon\Carbon::parse($otro_procedimiento->created_at)->format('d-m-Y H:i') : 'N/A' }}</td>
                                                                                                            <td class="text-wrap text-justify">{{ $otro_procedimiento->datos_procedimiento->nombre_procedimiento ?? 'Sin procedimiento' }}</td>
                                                                                                            <td class="text-wrap text-justify">{{ $otro_procedimiento->datos_procedimiento->observaciones ?? 'Sin observaciones' }}</td>
                                                                                                            <td class="text-wrap">{{ Auth::user()->name ?? 'Profesional' }}</td>
                                                                                                            <td class="text-wrap">
                                                                                                                <button type="button" class="btn btn-xxs btn-primary mr-1"
                                                                                                                    onclick="editar_otro_procedimiento({{ $otro_procedimiento->id }}, '{{ addslashes($otro_procedimiento->procedimiento) }}', '{{ addslashes($otro_procedimiento->observaciones) }}')"
                                                                                                                    title="Editar">
                                                                                                                    <i class="fas fa-edit"></i>
                                                                                                                </button>
                                                                                                                <button type="button" class="btn btn-xxs btn-danger"
                                                                                                                    onclick="eliminar_registro({{ $otro_procedimiento->id }})"
                                                                                                                    title="Eliminar" disabled>
                                                                                                                    <i class="fas fa-trash"></i>
                                                                                                                </button>
                                                                                                            </td>
                                                                                                        </tr>

                                                                                                @endforeach
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <!--<form>
                                                            <div class="fomr-row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <h6 class="t-aten">Oral</h6>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <table class="table table-xs f-12">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">Medicamento</th>
                                                                                <th scope="col">Fecha-Hora</th>
                                                                                <th scope="col">Observaciones</th>
                                                                                <th scope="col">Profesional</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="text-wrap">Diclofenaco 100mg</td>
                                                                                <td class="text-wrap">11/09/2024 23:33</td>
                                                                                <td class="text-wrap text-justify">Texto falsoLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                                </td>
                                                                                <td class="text-wrap">Nombre Apellido</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-wrap">Paracetamol 1gr</td>
                                                                                <td class="text-wrap">11/09/2024 20:15</td>
                                                                                <td class="text-wrap text-justify">Texto falso! Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                                </td>
                                                                                <td class="text-wrap">Nombre Apellido</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <h6 class="t-aten">Suero - Via venosa</h6>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <table class="table table-xs f-12">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">Tipo suero</th>
                                                                                <th scope="col">Hora inicio</th>
                                                                                <th scope="col">Hora término</th>
                                                                                <th scope="col">cc / hora</th>
                                                                                <th scope="col">Sitio Punción</th>
                                                                                <th scope="col">Comentarios</th>
                                                                                <th scope="col">Profesional</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="text-wrap">Suero fisiológico 500ml +300 ketoprofeno+3gr Metamizol</td>
                                                                                <td class="text-wrap">23:33</td>
                                                                                <td class="text-wrap">00:33</td>
                                                                                <td class="text-wrap">20 cc/hora</td>
                                                                                <td class="text-wrap">Extremidad superior izquierda</td>
                                                                                <td class="text-wrap text-justify">Texto falsoLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                                </td>
                                                                                <td class="text-wrap">Nombre Apellido</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <h6 class="t-aten">Inyectable</h6>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <table class="table table-xs f-12">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">Medicamento y Dosis</th>
                                                                                <th scope="col">Fecha-hora</th>
                                                                                <th scope="col">Comentarios</th>
                                                                                <th scope="col">Profesional</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="text-wrap">Diclofenaco 75 mg (1 ampolla)</td>
                                                                                <td class="text-wrap">11/09/2024 11:23</td>
                                                                                <td class="text-wrap text-justify">Texto falsoLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                                </td>
                                                                                <td class="text-wrap">Nombre Apellido</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <form>
                                                            <div class="form-row" hidden>
                                                                <h6 class="mb-3">I.- Responsable Tratamiento</h6>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <p class="font-italic mt-0 mb-0 text-black">
                                                                        @php
                                                                            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                                                            $fecha = \Carbon\Carbon::parse(now());
                                                                            $mes = $meses[($fecha->format('n')) - 1];
                                                                            $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y') ;

                                                                        @endphp
                                                                        {{ $fecha }}
                                                                    </p>
                                                                </div>

                                                                <div class="form-group col-md-6" hidden>
                                                                    <label class="floating-label">Clave Responsable</label>
                                                                    <input   type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <h6 class="my-3">I.- Oral</h6>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="rn">
                                                                            <label class="custom-control-label" for="rn">Med_1</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-2">
                                                                            <label class="custom-control-label" for="mes-2">Med_2</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-4">
                                                                            <label class="custom-control-label" for="mes-4">Med_3</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                            <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                            <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                            <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                            <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                            <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                            <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                        <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <h6 class="my-3">II.- SUEROS E INYECTABLES</h6>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label class="floating-label">Suero Tipo/ hora de inicio /gotas/min</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label class="floating-label">Otras tratamientos parenterales</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                                                </div>
                                                            </div>

                                                        </form>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  <!--ADMINISTRACIÓN DE TRATAMIENTO INYECTABLE-->
                        <div class="tab-pane fade" id="inyectables" role="tabpanel" aria-labelledby="inyectables-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Administración de tratamiento inyectable</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <!--FORMULARIO / MENOR DE EDAD-->
                                        @include('atencion_medica.generales.seccion_menor')
                                        <!--RECETA MÉDICA-->
                                        <div class="col-md-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="receta">
                                                    <button class="accor-closed btn card-act-open pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#receta_c" aria-expanded="false" aria-controls="receta_c">
                                                        Receta médica
                                                    </button>
                                                </div>
                                                <div id="receta_c" class="collapse" aria-labelledby="receta" data-parent="#receta">
                                                    <div class="card-body-aten-a">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Receta médica</label>
                                                                <select class="form-control form-control-sm" id="receta_iny" name="receta_iny"  onchange="evaluar_para_carga_detalle('receta_iny','div_receta_iny','imagenes_receta_iny',1);">
                                                                    <option>Seleccione</option>
                                                                    <option selected value="1">Si</option>
                                                                    <option selected value="2">No</option>
                                                                    <optgroup label="Advertencia">
                                                                        <option>Si no existe receta La responsabilidad es suya</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2" id="div_receta_iny" style="display:none">
                                                                <h6>Suba la imagen de la receta para su respaldo</h6>
                                                                <!-- [ Main Content ] start -->
                                                                <div class="dropzone" id="mis-imagenes" action="{{ route('profesional.imagen.carga') }}">
                                                                <!-- <div class="dropzone" id="mis-imagenes" action="{{ route('profesional.imagen.carga') }}" method="post"  > -->
                                                                </div>
                                                                <!-- [ file-upload ] end -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--PROCEDIMIENTO-->
                                        <div class="col-md-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="proced">
                                                    <button class="accor-closed btn card-act-open pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#proced_c" aria-expanded="false" aria-controls="proced_c">
                                                        Procedimiento
                                                    </button>
                                                </div>
                                                <div id="proced_c" class="collapse" aria-labelledby="proced" data-parent="#proced">
                                                    <div class="card">
                                                        <div class="card-body-aten-a">
                                                            <div id="form-enf">
                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <label class="floating-label-activo-sm">Incidentes en procedimiento </label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_ex_oidos" id="obs_ex_oidos"></textarea>
                                                                    </div>
                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <label class="floating-label-activo-sm"> Otras observaciones al procedimiento</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Especialidad" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="bs_ex_orl" id="obs_ex_orl"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div id="form-enf">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label-activo-sm">INCIDENTES EN PROCEDIMIENTO </label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oidos" id="obs_ex_oidos"></textarea>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12" style="margin-bottom: 0;">
                                                            <label class="floating-label-activo-sm"> Otras Observaciones al Procedimiento</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Especialidad" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="bs_ex_orl" id="obs_ex_orl"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>  --}}
                        <!--TERAPIAS DOMICILIARIAS-->
                        {{--  <div class="tab-pane fade" id="atencion_terap_enf_domicilio" role="tabpanel" aria-labelledby="atencion_terap_enf_domicilio-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Terapias domiciliarias</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <!--Formulario / Menor de edad-->
                                        @include('atencion_medica.generales.seccion_menor')
                                        <!--Cierre: Formulario / Menor de edad-->
                                        <!--Motivo consulta-->

                                        <!--EXAMEN ESPECIALIDAD ENFERMERA - PARAMETROS DE CONTROL-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card-a">
                                                <form>
                                                    <div class="form-row" hidden>
                                                        <h6 class="mb-3">I.- Responsable Tratamiento</h6>
                                                    </div>
                                                    <div class="form-row">
                                                        <!--<div class="form-group col-md-6">
                                                            <p class="font-italic mt-0 mb-0 text-black">
                                                                @php
                                                                    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                                                    $fecha = \Carbon\Carbon::parse(now());
                                                                    $mes = $meses[($fecha->format('n')) - 1];
                                                                    $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y') ;

                                                                @endphp
                                                                {{ $fecha }}
                                                            </p>
                                                        </div>-->

                                                        <div class="form-group col-md-6" hidden>
                                                            <label class="floating-label">Clave Responsable</label>
                                                            <input   type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <h6 class="my-3">I.- Oral</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="rn">
                                                                    <label class="custom-control-label" for="rn">Med_1</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label">Hora Tolerancia</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="mes-2">
                                                                    <label class="custom-control-label" for="mes-2">Med_2</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label">Hora Tolerancia</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="mes-4">
                                                                    <label class="custom-control-label" for="mes-4">Med_3</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label">Hora Tolerancia</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                    <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label">Hora Tolerancia</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                    <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label">Hora Tolerancia</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                    <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label">Hora Tolerancia</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                    <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label">Hora Tolerancia</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                    <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label">Hora Tolerancia</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                    <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label">Hora Tolerancia</label>
                                                                <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <h6 class="my-3">II.- SUEROS E INYECTABLES</h6>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label">Suero Tipo/ hora de inicio /gotas/min</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label">Otras tratamientos parenterales</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                                        </div>
                                                    </div>
                                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-info btn-sm">Guardar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  --}}
                        <!--ATENCIÓN NIÑO SANO ATENCIÓN VACUNAS-->
                        @include('general.secciones_ficha.pediatria.controlninosano')

                        {{--  div de botones  --}}
                        <!--GUARDAR O IMPRIMIR FICHA-->
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <input type="submit" class="btn btn-info btn-sm mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); recoger_datos_curaciones();" value="Guardar ficha y finalizar su consulta">
                                <input type="submit" class="btn btn-purple btn-sm mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); recoger_datos_curaciones();" value="Guardar ficha e ir a su agenda">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--MODALES DE EDICIÓN-->

<!-- Modal Editar Suero Venoso -->
<div class="modal fade" id="modal_editar_suero_venoso" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-dialog-centered">
            <div class="modal-header">
                <h5 class="modal-title">Editar Tratamiento Suero - Vía Venosa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_editar_suero_venoso">
                    <input type="hidden" id="edit_suero_id" name="id">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Medicamentos</label>
                            <textarea class="form-control form-control-sm" id="edit_suero_medicamentos" name="medicamentos" rows="2"></textarea>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Fecha</label>
                            <input type="date" class="form-control form-control-sm" id="edit_suero_fecha" name="fecha">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Hora Inicio</label>
                            <input type="time" class="form-control form-control-sm" id="edit_suero_hora_inicio" name="hora_inicio">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Hora Término</label>
                            <input type="time" class="form-control form-control-sm" id="edit_suero_hora_termino" name="hora_termino">
                        </div>
                        <div class="form-group col-md-3">
                            <label>CC/Hora</label>
                            <input type="text" class="form-control form-control-sm" id="edit_suero_cc_hora" name="cc_hora">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Sitio Punción</label>
                            <input type="text" class="form-control form-control-sm" id="edit_suero_sitio_puncion" name="sitio_puncion">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Observaciones</label>
                            <textarea class="form-control form-control-sm" id="edit_suero_observaciones" name="observaciones" rows="2"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="feather icon-x"></i>  Cancelar</button>
                <button type="button" class="btn btn-info" onclick="guardar_edicion_suero_venoso()"><i class="feather icon-save"></i>  Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Nutrición Parenteral -->
<div class="modal fade" id="modal_editar_nutricion_parenteral" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-dialog-centered">
            <div class="modal-header">
                <h5 class="modal-title">Editar Nutrición Parenteral</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_editar_nutricion_parenteral">
                    <input type="hidden" id="edit_nutricion_id" name="id">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Observaciones</label>
                            <textarea class="form-control form-control-sm" id="edit_nutricion_observaciones" name="observaciones" rows="4"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="feather icon-x"></i>  Cancelar</button>
                <button type="button" class="btn btn-info" onclick="guardar_edicion_nutricion_parenteral()"><i class="feather icon-save"></i> Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Curación -->
<div class="modal fade" id="modal_editar_curacion" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Alertas e Incidencias</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_editar_curacion">
                    <input type="hidden" id="edit_curacion_id" name="id">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="floating-label-activo-sm">Observaciones</label>
                            <textarea class="form-control form-control-sm" id="edit_curacion_observaciones" name="observaciones" rows="4"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                <button type="button" class="btn btn-info" onclick="guardar_edicion_curacion()"><i class="feather icon-save"></i> Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL CURACIONES Y OTROS PROCEDIMIENTOS -->
<div class="modal fade" id="curacion-otro-procedimiento" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Curaciones y otros Procedimiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_curacion_procedimiento();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="floating-label-activo">Procedimiento</label>
                            <select class="form-control form-control-sm" id="otro_procedimiento_procedimiento" name="procedimiento">
                                <option value="">Seleccione</option>
                                <option value="Curacion simple">Curacion simple</option>
                                <option value="Curacion avanzada">Curacion avanzada</option>
                                <option value="Cambio de aposito">Cambio de aposito</option>
                                <option value="Limpieza de herida">Limpieza de herida</option>
                                <option value="Retiro de puntos">Retiro de puntos</option>
                                <option value="Control de signos vitales">Control de signos vitales</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="floating-label-activo">Observaciones</label>
                            <textarea class="form-control form-control-sm" id="otro_procedimiento_observaciones" name="observaciones" rows="4"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" onclick="guardarCuracionProcedimiento()"><i class="feather icon-save"></i> Guardar curación o procedimiento</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Otro Procedimiento -->
<div class="modal fade" id="modal_editar_otro_procedimiento" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Otro Procedimiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_editar_otro_procedimiento">
                    <input type="hidden" id="edit_otro_procedimiento_id" name="id">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Procedimiento</label>
                            <textarea class="form-control form-control-sm" id="edit_otro_procedimiento_procedimiento" name="procedimiento" rows="2"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Observaciones</label>
                            <textarea class="form-control form-control-sm" id="edit_otro_procedimiento_observaciones" name="observaciones" rows="4"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                <button type="button" class="btn btn-info" onclick="guardar_edicion_otro_procedimiento()"><i class="feather icon-save"></i> Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Historial de Administraciones de Medicamento -->
<div class="modal fade" id="modal_historial_administraciones_medicamento" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Historial de administraciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fecha/Hora</th>
                                <th>Enfermera/Profesional</th>
                                <th>Observaciones</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_historial_administraciones_medicamento">
                            <tr>
                                <td colspan="4" class="text-center text-muted">Sin registros</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- modal detalle curacion -->
<div class="modal fade" id="modal_detalle_curacion" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalle de Curación o Procedimiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="detalle_curacion_contenido">
                    <!-- El contenido del detalle se cargará dinámicamente con JavaScript -->
                    <p class="text-center text-muted">Cargando detalles...</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>

@section('page-script-ficha-atencion')

{{-- JavaScript para curaciones registro --}}
<script src="{{ asset('js/curacion_registro.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#lpp_medprotliq').select2();
        $('#lpp_medproddesc').select2();
        $('#lpp_medprevext').select2();
        $('#tpo_cub').select2();

        actualizar_informacion_atencion();

        // Control de visualización de gráficos según tab seleccionado
        function mostrarGraficoSegunTab(tabId) {
            // Ocultar todos los gráficos
            $('.grafico-curacion').hide();

            // Mostrar el gráfico correspondiente según el tab
            switch(tabId) {
                case 'cur_plana-tab':
                    $('#grafico-curacion-plana').show();
                    break;
                case 'cur_pd-tab':
                    console.log('📊 Mostrando tab de Pie Diabético');
                    $('#grafico-pie-diabetico').show();

                    // Inicializar el gráfico si no se ha hecho antes
                    if (typeof window.inicializarGraficoPieDiabetico === 'function') {
                        window.inicializarGraficoPieDiabetico();
                    } else {
                        console.warn('⚠️ Función inicializarGraficoPieDiabetico no disponible');
                    }
                    break;
                case 'cur_lpp-tab':
                case 'cur_quem-tab':
                    // Estos tabs no tienen gráficos, no mostrar ninguno
                    break;
            }
        }

        // Detectar cambio de tab
        $('#v-pills-tab-1 > a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            let tabId = $(e.target).attr('id');
            mostrarGraficoSegunTab(tabId);
        });

        // Mostrar gráfico inicial (Curación Plana está activo por defecto)
        mostrarGraficoSegunTab('cur_plana-tab');
    });


    function actualizar_informacion_atencion(){
        let url = "{{ route('enfermeria.cargar_informacion_atencion') }}";

        $.ajax({
            url: url,
            type: 'GET',
            data:{
                    id_ficha_atencion: $('#id_fc').val(),
                    id_paciente: $('#id_paciente_fc').val(),
                    id_lugar_atencion: $('#id_lugar_atencion').val()
            }
        })
        .done(function(response) {
            console.log("Información de atención cargada:", response);
            // Aquí puedes actualizar el DOM con la información recibida
            let table = $('#tabla_resumen_curaciones tbody');
            let curaciones = response.data || [];

            // Limpiar la tabla antes de llenarla
            table.empty();
            curaciones.forEach(function(curacion) {
                let titulo = "";
                let detalle = "";
                let funcion_ver = "";
                if(curacion.tipo_curacion == 'plana') {
                    titulo = "Curación Plana "+(curacion.etapa ? `- Etapa: ${curacion.etapa}` : '');
                    funcion_ver = "verDetallesCuracionPlana";
                } else if(curacion.tipo_curacion == 'pie_diabetico') {
                    titulo = "Pie Diabético "+(curacion.etapa ? `- Etapa: ${curacion.etapa}` : '');
                    funcion_ver = "verDetalleCuracionPieDiab";
                } else if(curacion.tipo_curacion == 'quemados') {
                    titulo = "Quemadura "+(curacion.etapa ? `- Etapa: ${curacion.etapa}` : '');
                    funcion_ver = "verDetalleCuracionQuemados";
                } else if(curacion.tipo_curacion == 'lpp') {
                    titulo = "LPP "+(curacion.etapa ? `- Etapa: ${curacion.etapa}` : '');
                    funcion_ver = "verDetalleCuracionLPP";
                } else {
                    titulo = "Otro Procedimiento";
                    funcion_ver = "enConstruccion";
                }

                let row = `
                   <tr>
                        <td class="text-center align-middle">
                            <span class="badge badge-${curacion.color} d-inline-flex align-items-center" style="font-size: 0.75rem;">
                                <i class="${curacion.icono} mr-1"></i>
                                ${titulo}
                            </span>
                        </td>
                        <td class="text-center align-middle">
                            <small class="d-block font-weight-bold">${curacion.fecha || 'N/A'}</small>
                            <small class="text-muted">${curacion.hora || 'N/A'}</small>
                        </td>
                        <td class="align-middle">
                            <small>${curacion.responsable || 'N/A'}</small>
                        </td>
                        <td class="align-middle">
                            <small>${curacion.detalle || 'N/A'}</small>
                        </td>
                        <td class="align-middle">
                            <small>${curacion.observaciones || 'N/A'}</small>
                        </td>
                        <td class="text-center align-middle">
                            <button type="button" role="button" class="btn btn-sm btn-outline-info" onclick="${funcion_ver}(${curacion.id},'${curacion.etapa}')"><i class="feather icon-eye"></i></button>
                            <button type="button" role="button" class="btn btn-sm btn-outline-danger" onclick="eliminarCuracionRegistro(${curacion.id}, '${curacion.tipo_curacion}')"><i class="feather icon-trash-2"></i></button>
                        </td>
                    </tr>
                `;
                table.append(row);
                $('#contador_curaciones').text(curaciones.length);
            });

        })
        .fail(function(e) {
            console.log("Error al cargar información de atención:", e);
        });
    }


    function enviar_interconsulta_email()
        {
            let id_interconsulta = $('#id_interconsulta_email').val();

            if (!id_interconsulta) {
                swal({
                    title: "Información",
                    text: "La interconsulta aún no ha sido registrada. Por favor, haga clic en 'Guardar' primero.",
                    icon: "info",
                });
                return;
            }

            let url = "{{ route('ficha_medica.enviar_interconsulta_email') }}";

            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id_interconsulta: id_interconsulta
                },
            })
            .done(function(response) {
                if (response['estado'] == '1') {
                    swal({
                        title: "Éxito",
                        text: response['msj'],
                        icon: "success",
                    });
                } else {
                    swal({
                        title: "Error",
                        text: response['msj'],
                        icon: "error",
                    });
                }
            })
            .fail(function(e) {
                console.log("error");
                console.log(e);
                swal({
                    title: "Error",
                    text: "No se pudo enviar la interconsulta por email",
                    icon: "error",
                });
            });
        }
    function calcularIMC(idEvolucion = null) {
          var id = idEvolucion ? idEvolucion : '';
          var talla = $('#talla' + id).val();
          var peso = $('#peso' + id).val();
          console.log(talla);
          console.log(peso);
          if (talla == '' || peso == '') {
              return;
          }
          var height = talla / 100;
          var imc = peso / (height ** 2);
          $('#imc' + id).val(imc.toFixed(2));
      }

      function calcularPAM(idEvolucion = null) {
        var id = idEvolucion ? idEvolucion : '';
        var pas = $('#pas' + id).val();
        if (pas == '') {
            pas = 0;
        }
        var pad = $('#pad' + id).val();
        // if(pad == ''){
        //     pad = 0;
        // }
        // var pam = ((parseInt(pas) * 2) + parseInt(pad)) / 3;
        // $('#pam' + id).val(pam.toFixed(2));

        var resultado = ((parseInt(pad) * 2) + parseInt(pas));
        $('#pam' + id).val((parseInt(resultado) / 3).toFixed(2));
    }
    function cambiarTextoLabelCuracion(id){
        let url = "{{ route('enfermeria.cambiar_estado_curacion') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id_tratamiento: id,
                observaciones: $('#vigilancia_curacion_servicio'+id).val(),
                _token: '{{ csrf_token() }}'
            },
            success: function(response){
                console.log('Response completo:', response);
                console.log('Estado recibido:', response.estado);
                console.log('Mensaje recibido:', response.mensaje);

                if(response.mensaje == 'OK'){
                    // === ACTUALIZAR TABLA DE CURACIONES INDICADAS POR MÉDICO ===
                    let labelIndicadas = $('#label_curacion_'+id);
                    console.log('Label curación encontrada:', labelIndicadas.length > 0);
                    if(labelIndicadas.length > 0){
                        let spanBadge = labelIndicadas.find('span.badge');
                        if(response.estado == 1){
                            spanBadge.removeClass('badge-warning').addClass('badge-success');
                            spanBadge.text('Listo');
                        } else {
                            spanBadge.removeClass('badge-success').addClass('badge-warning');
                            spanBadge.text('Pendiente');
                        }
                    }

                    // === ACTUALIZAR TABLA DE CONTROL DOMICILIARIO ===
                    let labelDomiciliario = $('#label_curacion_footer'+id);
                    console.log('Label domiciliario encontrada:', labelDomiciliario.length > 0);
                    if(labelDomiciliario.length > 0){
                        if(response.estado == 1){
                            labelDomiciliario.text('Finalizado');
                            labelDomiciliario.removeClass('badge-warning').addClass('badge-success');
                        } else {
                            labelDomiciliario.text('Pendiente');
                            labelDomiciliario.removeClass('badge-success').addClass('badge-warning');
                        }
                    }

                    // === ACTUALIZAR CHECKBOX EN AMBAS TABLAS ===
                    let checkbox = $('#curaciones_servicio_listo'+id);
                    if(checkbox.length > 0){
                        checkbox.prop('checked', response.estado == 1);
                    }

                    // === HABILITAR/DESHABILITAR CAMPO DE VIGILANCIA ===
                    let campoVigilancia = $('#vigilancia_curacion_servicio'+id);
                    if(campoVigilancia.length > 0){
                        campoVigilancia.attr('disabled', response.estado == 1);
                    }

                    // Mensaje de éxito
                    swal({
                        title: "Actualizado",
                        text: "El estado de la curación ha sido actualizado correctamente",
                        icon: "success",
                        button: "Aceptar",
                        timer: 2000
                    });
                } else {
                    console.log('Error: mensaje no es OK');
                    swal({
                        title: "Error",
                        text: "Ocurrió un error al cambiar el estado del tratamiento",
                        icon: "error",
                        button: "Aceptar",
                    }).then((value) => {
                        // Volver el check a su estado anterior
                        $('#curaciones_servicio_listo'+id).prop('checked', !$('#curaciones_servicio_listo'+id).prop('checked'));
                    })
                }
            },
            error: function(xhr) {
                console.error('Error AJAX completo:', xhr);
                console.error('Status:', xhr.status);
                console.error('ResponseText:', xhr.responseText);
                swal({
                    title: "Error",
                    text: "Hubo un problema al cambiar el estado de la curación",
                    icon: "error",
                    button: "Aceptar",
                });
                // Volver el check a su estado anterior
                $('#curaciones_servicio_listo'+id).prop('checked', !$('#curaciones_servicio_listo'+id).prop('checked'));
            }
        });
    }
/**TTO DOMICILIARIO ORAL**/

  /* CURACION Y OTROS PROCEDIMIENTOS*/
  function m_curacion_procedimiento() {
    $('#curacion-otro-procedimiento').modal('show');
}

function cerrar_curacion_procedimiento() {
    $('#curacion-otro-procedimiento').modal ('hide');
  }

function guardarCuracionProcedimiento() {
    let procedimiento = $('#otro_procedimiento_procedimiento').val();
    let observaciones = $('#otro_procedimiento_observaciones').val();

    if ($.trim(procedimiento) == '') {
        swal({
            title: 'Error',
            text: 'Debe seleccionar un procedimiento.',
            icon: 'error',
            button: 'Aceptar'
        });
        return;
    }

    let data = {
        _token: CSRF_TOKEN,
        id_paciente: $('#id_paciente_fc').val(),
        id_ficha_atencion: $('#id_fc').val(),
        id_lugar_atencion: $('#id_lugar_atencion').val(),
        procedimiento: procedimiento,
        observaciones: observaciones
    };

    $.ajax({
        url: '{{ route("enfermeria.guardar_curacion_procedimiento") }}',
        type: 'POST',
        data: data,
        success: function(response) {
            if (response.estado == 1) {
                let proc = response.procedimiento || {};
                let cur = response.curacion || {};

                let filaProcedimiento = `
                    <tr id="procedimiento_row_${proc.id}">
                        <td class="text-wrap">${proc.fecha_hora || ''}</td>
                        <td class="text-wrap text-justify">${proc.nombre_procedimiento || ''}</td>
                        <td class="text-wrap text-justify">${proc.observaciones || '-'}</td>
                        <td class="text-wrap">${proc.responsable || ''}</td>
                        <td class="text-wrap">
                            <button type="button" class="btn btn-xxs btn-primary mr-1" onclick='editar_otro_procedimiento(${proc.id}, ${JSON.stringify(proc.nombre_procedimiento || '')}, ${JSON.stringify(proc.observaciones || '')})' title="Editar">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-xxs btn-danger" onclick='eliminar_registro(${proc.id})' title="Eliminar" disabled>
                                <i class="feather icon-x"></i>
                            </button>
                        </td>
                    </tr>`;

                let filaCuracion = `
                    <tr id="curacion_row_${cur.id}">
                        <td class="text-wrap">${cur.fecha || ''} ${cur.hora || ''} <br> ${cur.responsable || ''}</td>
                        <td class="align-middle">${cur.nombre_procedimiento || ''}</td>
                        <td class="align-middle">
                            <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${cur.id}" value="${(cur.otros || '').replace(/"/g, '&quot;')}" />
                        </td>
                        <td class="align-middle">
                            <div class="switch switch-success d-inline">
                                <input type="checkbox" id="curaciones_servicio_listo${cur.id}" onchange="cambiarTextoLabelCuracion(${cur.id})">
                                <label for="curaciones_servicio_listo${cur.id}" id="label_curacion_switch${cur.id}" class="cr"></label>
                            </div><br>
                            <label for="" id="label_curacion_footer${cur.id}" class="badge badge-warning">Pendiente</label>
                        </td>
                        <td class="align-middle">
                            <button type="button" class="btn btn-primary-light-c btn-xxs" onclick="cargarInsumosCuracion(${cur.id})">
                                Insumos
                            </button>
                        </td>
                        <td class="text-wrap">
                            <button type="button" class="btn btn-icon btn-warning mr-1" onclick="editar_curacion(${cur.id})" title="Editar">
                                <i class="feather icon-edit"></i>
                            </button>
                            <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_registro(${cur.id})" title="Eliminar" disabled>
                                <i class="feather icon-x"></i>
                            </button>
                        </td>
                    </tr>`;

                $('#tabla_otros_procedimientos_enfermera tbody').append(filaProcedimiento);
                $('#tabla_curaciones_enfermera tbody').append(filaCuracion);

                $('#otro_procedimiento_procedimiento').val('');
                $('#otro_procedimiento_observaciones').val('');
                $('#curacion-otro-procedimiento').modal('hide');

                swal({
                    title: 'Guardado',
                    text: response.mensaje || 'Curación o procedimiento guardado correctamente',
                    icon: 'success',
                    button: 'Aceptar'
                });
            } else {
                swal({
                    title: 'Error',
                    text: response.mensaje || 'No se pudo guardar la curación o procedimiento.',
                    icon: 'error',
                    button: 'Aceptar'
                });
            }
        },
        error: function(xhr) {
            let mensaje = 'No se pudo guardar la curación o procedimiento.';
            if (xhr.responseJSON && xhr.responseJSON.mensaje) {
                mensaje = xhr.responseJSON.mensaje;
            }

            swal({
                title: 'Error',
                text: mensaje,
                icon: 'error',
                button: 'Aceptar'
            });
        }
    });
}


 function oral_cd (){
        $('#modal_oral').modal('show');
    }
/** TTO DOMICILIARIO SUERO INTRAVENOSO **/
 function ven_suero_cd (){
        $('#modal_ven_suero_cd').modal('show');
    }
/** TTO DOMICILIARIO INYECTABLE **/
 function inyect_cd (){
        $('#modal_inyect_cd').modal('show');
    }
/** TTO DOMICILIARIO CURACIONES **/
     function curac_cd (){
            $('#m_curacion_cd').modal('show');
        }
/** TTO DOMICILIARIO NUT PARENTERAL **/
     function n_parenteral_cd (){
            $('#modal_n_parenteral_cd').modal('show');
        }
/** TTO DOMICILIARIO INFORME CURACIONES **/
function inf_curaciones_cd(){
    $('#modal_i_informe_cd').modal('show');
}

/** TTO DOMICILIARIO OTROS PROCEDIMIENTOS **/
 function otros_proced_cd (){
        $('#modal_otros_proced_cd').modal('show');
    }
</script>
<script>
        $(document).ready(function() {

            $('#hip-diag_spec').keyup(function(){
                if($.trim(this.value) != ''){
                    $('.btn_agregar_medicamento').removeAttr("disabled");
                    $('.btn_medicamento_pdf').removeAttr("disabled");
                    $('.btn_agregar_examen').removeAttr("disabled");
                    $('.btn_examenes_pdf').removeAttr("disabled");
                }
                else
                {
                    $('.btn_agregar_medicamento').attr('disabled','disabled');
                    $('.btn_medicamento_pdf').attr('disabled','disabled');
                    $('.btn_agregar_examen').attr('disabled','disabled');
                    $('.btn_examenes_pdf').attr('disabled','disabled');
                }
            });

            $("#descripcion_cie_esp").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getCie10') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#descripcion_cie_esp').val(ui.item.label); // display the selected text
                    $('#id_descripcion_cie_esp').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

            $('#medicamento_oral_cd').autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getArticulo') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.log('Medicamentos encontrados:', data.length);
                            if( data.length == 0 )
                            {
                                // Limpiar campos del modal oral_cd
                                $('#dosis_oral_cd').html('<option value="">-- Seleccionar --</option>');
                                $('#id_medicamento_oral_cd').val('');
                            }
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Guardar en los campos correctos del modal oral_cd
                    $('#medicamento_oral_cd').val(ui.item.label); // Nombre del medicamento
                    $('#id_medicamento_oral_cd').val(ui.item.value); // ID del medicamento

                    // Mostrar información de control si aplica
                    if(ui.item.control >= 1 && ui.item.control <= 5) {
                        console.warn('Medicamento controlado - Tipo:', ui.item.control);
                    }

                    // Llamar a getDosis_sdi() que ahora detecta el contexto automáticamente
                    getDosis_sdi();

                    return false;
                }
            });

            $("#lic_descripcion_cie").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getCie10') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#lic_descripcion_cie').val(ui.item.label); // display the selected text
                    $('#id_lic_descripcion_cie').val(ui.item.value); // save selected id to input
                    return false;
                }
            });
            $('#tabla_resumen_curaciones').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                },
                "paging": false,
                "searching": false,
                "info": false,
                "ordering": false,
                "autoWidth": false,
                "responsive": true
            });
        })

        function cargarIgual(input){

            let actual = $('#'+input);
            let equivalentes = $('#'+input).attr('data-input_igual').split(',');
            $.each(equivalentes, function( index, value ) {
                var equivalente = $('#'+value);
                equivalente.val(actual.val());
            });
            {{--
            let actual = $('#'+input);
            let equivalente = $('#'+$('#'+input).attr('data-input_igual'));

            equivalente.val(actual.val());
            --}}
        }

        function getFrecuencia_sdi() {
            // Detectar contexto: modal oral_cd o ficha dental
            let id_dosis = '';
            let selectFrecuencia = null;

            // Verificar si estamos en el modal oral_cd
            if($('#dosis_oral_cd').length > 0 && $('#dosis_oral_cd').val()) {
                id_dosis = $('#dosis_oral_cd').val();
                selectFrecuencia = $('#frecuencia_oral_cd');
                console.log('Contexto: Modal Oral CD - Buscando frecuencia para dosis:', id_dosis);
            }
            // Si no, usar campos de ficha dental
            else if($('#dosis_medicamento_ficha_dental').length > 0) {
                id_dosis = $('#dosis_medicamento_ficha_dental').val();
                selectFrecuencia = $('#frecuencia_medicamento_ficha_dental');
                console.log('Contexto: Ficha Dental - Buscando frecuencia para dosis:', id_dosis);
            }

            if(!id_dosis || !selectFrecuencia) {
                console.warn('No se pudo determinar la dosis o el select de frecuencia');
                return;
            }

            let url = "{{ route('dental.getFrecuencia') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    id_dosis: id_dosis,
                },
            })
            .done(function(data) {
                console.log('Frecuencias recibidas:', data);

                if (data != null) {
                    data = JSON.parse(data);

                    selectFrecuencia.find('option').remove();
                    selectFrecuencia.append('<option value="0">Seleccione</option>');
                    $(data).each(function(i, v) {
                        selectFrecuencia.append('<option value="' + v.id + '">' + v.indic + '</option>');
                    });

                    console.log('Se agregaron', data.length, 'opciones de frecuencia');
                } else {
                    console.warn('No se encontraron frecuencias');
                    selectFrecuencia.html('<option value="0">-- Sin frecuencias disponibles --</option>');
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.error('Error al cargar frecuencias:', jqXHR, ajaxOptions, thrownError);
                if(selectFrecuencia) {
                    selectFrecuencia.html('<option value="0">-- Error al cargar --</option>');
                }
            });
        };

       function validar_via_administracion_sdi() {
        // Detectar contexto: modal oral_cd o ficha dental
        let viaSelect, divOtraVia, inputOtraVia;

        if($('#via_administracion_oral_cd').length > 0) {
            // Contexto: Modal Oral CD
            viaSelect = $('#via_administracion_oral_cd');
            divOtraVia = $('#otra_via_div_oral_cd');
            inputOtraVia = $('#otra_via_oral_cd');
        } else {
            // Contexto: Ficha Dental
            viaSelect = $('#via_administracion_ficha_dental');
            divOtraVia = $('#div_observaciones_medicamento_ficha_dental');
            inputOtraVia = $('#observaciones_medicamento_ficha_dental');
        }

        if (viaSelect.val() == 11) {
            divOtraVia.show();
            inputOtraVia.removeAttr('disabled');
        } else {
            divOtraVia.hide();
            inputOtraVia.attr('disabled', 'disabled');
            inputOtraVia.val('');
        }
    }

    function validar_periodo_sdi() {
        // Detectar contexto: modal oral_cd o ficha dental
        let periodoSelect, divOtroPeriodo, inputOtroPeriodo;

        if($('#periodo_oral_cd').length > 0) {
            // Contexto: Modal Oral CD
            periodoSelect = $('#periodo_oral_cd');
            divOtroPeriodo = $('#div_otro_periodo_oral_cd');
            inputOtroPeriodo = $('#otro_periodo_oral_cd');
        } else {
            // Contexto: Ficha Dental
            periodoSelect = $('#periodo_ficha_dental');
            divOtroPeriodo = $('#div_observaciones_periodo_ficha_dental');
            inputOtroPeriodo = $('#observaciones_periodo_ficha_dental');
        }

        if (periodoSelect.val() == 11) {
            divOtroPeriodo.show();
            inputOtroPeriodo.removeAttr('disabled');
        } else {
            divOtroPeriodo.hide();
            inputOtroPeriodo.attr('disabled', 'disabled');
            inputOtroPeriodo.val('');
        }
    }

    function validar_cantidad_comprar_sdi() {
        // Detectar contexto: modal oral_cd o ficha dental
        let cantidadSelect, divOtraCantidad, inputOtraCantidad;

        if($('#cantidad_comprar_oral_cd').length > 0) {
            // Contexto: Modal Oral CD
            cantidadSelect = $('#cantidad_comprar_oral_cd');
            divOtraCantidad = $('#div_otra_cantidad_a_comprar');
            inputOtraCantidad = $('#otra_cantidad_a_comprar');
        } else {
            // Contexto: Ficha Dental
            cantidadSelect = $('#cantidad_comprar');
            divOtraCantidad = $('#div_otra_cantidad_a_comprar');
            inputOtraCantidad = $('#otra_cantidad_a_comprar');
        }

        if (cantidadSelect.val() == 999) {
            divOtraCantidad.show();
            inputOtraCantidad.removeAttr('disabled');
        } else {
            divOtraCantidad.hide();
            inputOtraCantidad.attr('disabled', 'disabled');
            inputOtraCantidad.val('');
        }
    }


      function getCantComp_sdi() {
          // Detectar contexto: modal oral_cd o ficha dental
          let cant_comp = '';
          let selectCantidad = null;
          let selectDosis = null;

          // Verificar si estamos en el modal oral_cd
          if($('#dosis_oral_cd').length > 0 && $('#dosis_oral_cd option:selected').length > 0) {
              selectDosis = $('#dosis_oral_cd option:selected');
              cant_comp = selectDosis.attr('data-cant_comp');
              selectCantidad = $('#cantidad_comprar_oral_cd');
              console.log('Contexto: Modal Oral CD - Cant comp:', cant_comp);
          }
          // Si no, usar campos de ficha dental
          else if($('#dosis_medicamento_ficha_dental').length > 0) {
              selectDosis = $('#dosis_medicamento_ficha_dental option:selected');
              cant_comp = selectDosis.attr('data-cant_comp');
              selectCantidad = $('#cantidad_comprar');
              console.log('Contexto: Ficha Dental - Cant comp:', cant_comp);
          }

          if(!cant_comp || !selectCantidad) {
              console.warn('No se pudo determinar cant_comp o el select de cantidad');
              return;
          }

          let url = "{{ route('presentacion.getCantComp') }}";
          $.ajax({
              url: url,
              type: "get",
              data: {
                  cant_comp: cant_comp,
              },
          })
          .done(function(data) {
              console.log('Cantidades recibidas:', data);

              if (data != null) {
                  data = JSON.parse(data);

                  selectCantidad.find('option').remove();
                  selectCantidad.append('<option value="0">Seleccione</option>');
                  $(data).each(function(i, v) {
                      selectCantidad.append('<option value="' + v.cantidad + '">' + v.cant + '</option>');
                  });
                  selectCantidad.append('<option value="999">Otra Cantidad</option>');

                  console.log('Se agregaron', data.length + 1, 'opciones de cantidad a comprar');
              } else {
                  console.warn('No se encontraron cantidades disponibles');
                  selectCantidad.html('<option value="0">-- Sin opciones disponibles --</option>');
              }
          })
          .fail(function(jqXHR, ajaxOptions, thrownError) {
              console.error('Error al cargar cantidades:', jqXHR, ajaxOptions, thrownError);
              if(selectCantidad) {
                  selectCantidad.html('<option value="0">-- Error al cargar --</option>');
              }
          });
      };

        function evaluar_para_carga_detalle(select, div, input, valor)
        {
            var valor_select = $('#'+select+'').val();
            if(valor_select == valor) $('#'+div+'').show();
            else {
                $('#'+div+'').hide();
                $('#'+input+'').val('');
            }
        }



        function cargarSeccion(div_destino)
        {
            {{--  var tipo = $('#'+select+'').val();  --}}
            $('#'+div_destino).html('');
            $('#form-otorrino').find('select,textarea').each(function(key, elemento){
                html ='';
                html +='<div class="row" style="margin-top:10px;">';
                if($(elemento).prop('nodeName') == 'SELECT')
                {
                    if($(elemento).val() == 0)
                        $(elemento).val(1)

                    html +='<div class="col-md-4">'+$(elemento).data('titulo')+'</div>';
                    html +='<div class="col-md-4">';
                    html +='    '+$('#'+$(elemento).attr('id')+' option:selected').text()+'';
                    html +='    <input type="hidden" name="modal_agregar_tipo_'+$(elemento).attr('id')+'" id="modal_agregar_tipo_'+$(elemento).attr('id')+'" value="'+$(elemento).val()+'">';
                    html +='</div>';
                }
                else if($(elemento).prop('nodeName') == 'TEXTAREA')
                {
                    html +='<div class="col-md-4">Detalle</div>';
                    html +='<div class="col-md-6">';
                    html +='    <textarea class="form-control caja-texto form-control-sm '+$(elemento).attr('id')+'_editar" style="display:none;" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="observaciones_'+$(elemento).attr('id')+'" id="observaciones_'+$(elemento).attr('id')+'">'+$(elemento).val()+'</textarea>';
                    html +='    <label class="'+$(elemento).attr('id')+'_mostrar" id="label_observacion_'+$(elemento).attr('id')+'">'+$(elemento).val()+'</label>';
                    html +='</div>';
                    html +='<div class="col-md-2">';
                    html +='    <button class="btn btn-sm btn-success '+$(elemento).attr('id')+'_mostrar"  onclick="cambiar_div(\''+$(elemento).attr('id')+'_editar'+'\',\''+$(elemento).attr('id')+'_mostrar'+'\',\'label_observacion_'+$(elemento).attr('id')+'\',\'observaciones_'+$(elemento).attr('id')+'\')">Editar</button>';
                    html +='    <button class="btn btn-sm btn-success '+$(elemento).attr('id')+'_editar" style="display:none;" onclick="cambiar_div(\''+$(elemento).attr('id')+'_mostrar'+'\',\''+$(elemento).attr('id')+'_editar'+'\',\'label_observacion_'+$(elemento).attr('id')+'\',\'observaciones_'+$(elemento).attr('id')+'\')">Guardar</button>';
                    html +='</div>';

                }
                html +='</div>';
                $('#'+div_destino).append(html);
            });
        }
        function cambiar_div(mostrar, ocultar, label, textarea){
            $('.'+mostrar).show();
            $('.'+ocultar).hide();
            $('#'+label).html( $('#'+textarea).val() );
        }

 /** MANEJO DE IMAGENES */

 var myDropzoneConsDermatoPre;
 Dropzone.options.misImagenesConsDermatoPre  = {
     init:function()
     {
         myDropzoneConsDermatoPre = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneConsDermatoPre, 'img_cons_dermato_pre');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneConsDermatoPre, 'img_cons_dermato_pre');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneConsDermatoPre, 'img_cons_dermato_pre');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneConsDermatoPost;
 Dropzone.options.misImagenesConsDermatoPost  = {
     init:function()
     {
         myDropzoneConsDermatoPost = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre un archivo al recuadro para subirlo",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneConsDermatoPost, 'img_cons_dermato_post');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneConsDermatoPost, 'img_cons_dermato_post');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneConsDermatoPost, 'img_cons_dermato_post');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneElimCicarPre;
 Dropzone.options.misImagenesElimCicarPre  = {
     init:function()
     {
         myDropzoneElimCicarPre = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneElimCicarPre, 'imagenes_elim_cicat_pre');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneElimCicarPre, 'imagenes_elim_cicat_pre');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneElimCicarPre, 'imagenes_elim_cicat_pre');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneElimCicatPost;
 Dropzone.options.misImagenesElimCicatPost  = {
     init:function()
     {
         myDropzoneElimCicatPost = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneElimCicatPost, 'imagenes_elim_cicat_post');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneElimCicatPost, 'imagenes_elim_cicat_post');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneElimCicatPost, 'imagenes_elim_cicat_post');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneProcPielDanadaImgPre;
 Dropzone.options.misImagenesProcPielDanadaImgPre  = {
     init:function()
     {
         myDropzoneProcPielDanadaImgPre = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneProcPielDanadaImgPre, 'proc_piel_danada_img_pre');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneProcPielDanadaImgPre, 'proc_piel_danada_img_pre');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneProcPielDanadaImgPre, 'proc_piel_danada_img_pre');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneProcPielDanadaImgPost;
 Dropzone.options.misImagenesProcPielDanadaImgPost  = {
     init:function()
     {
         myDropzoneProcPielDanadaImgPost = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre un archivo al recuadro para subirlo",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneProcPielDanadaImgPost, 'proc_piel_danada_img_post');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneProcPielDanadaImgPost, 'proc_piel_danada_img_post');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneProcPielDanadaImgPre, 'proc_piel_danada_img_post');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneImagenesExfoliacionPre;
 Dropzone.options.misImagenesImagenesExfoliacionPre  = {
     init:function()
     {
         myDropzoneImagenesExfoliacionPre = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre una archivo al recuadro para subirlo",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesExfoliacionPre, 'imagenes_exfoliacion_pre');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesExfoliacionPre, 'imagenes_exfoliacion_pre');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneImagenesExfoliacionPre, 'imagenes_exfoliacion_pre');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneImagenesExfoliacionPost;
 Dropzone.options.misImagenesImagenesExfoliacionPost  = {
     init:function()
     {
         myDropzoneImagenesExfoliacionPost = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre una archivo al recuadro para subirlo",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesExfoliacionPost, 'imagenes_exfoliacion_post');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesExfoliacionPost, 'imagenes_exfoliacion_post');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneImagenesExfoliacionPost, 'imagenes_exfoliacion_post');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneImagenesDermabrasPre;
 Dropzone.options.misImagenesImagenesDermabrasPre  = {
     init:function()
     {
         myDropzoneImagenesDermabrasPre = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre un archivo al recuadro para subirlo",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesDermabrasPre, 'imagenes_dermabras_pre');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesDermabrasPre, 'imagenes_dermabras_pre');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneImagenesDermabrasPre, 'imagenes_dermabras_pre');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneImagenesDermabrasPost;
 Dropzone.options.misImagenesImagenesDermabrasPost  = {
     init:function()
     {
         myDropzoneImagenesDermabrasPost = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre un archivo al recuadro para subirlo.",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesDermabrasPost, 'imagenes_dermabras_post');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesDermabrasPost, 'imagenes_dermabras_post');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneImagenesDermabrasPost, 'imagenes_dermabras_post');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneImagenesLaserPre;
 Dropzone.options.misImagenesImagenesLaserPre  = {
     init:function()
     {
         myDropzoneImagenesLaserPre = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre un archivo al recuadro para subirlo.",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesLaserPre, 'imagenes_laser_pre');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesLaserPre, 'imagenes_laser_pre');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneImagenesLaserPre, 'imagenes_laser_pre');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneImagenesLaserPost;
 Dropzone.options.misImagenesImagenesLaserPost  = {
     init:function()
     {
         myDropzoneImagenesLaserPost = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre un archivo al recuadro para subirlo.",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesLaserPost, 'imagenes_laser_post');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesLaserPost, 'imagenes_laser_post');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneImagenesLaserPost, 'imagenes_laser_post');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 // var myDropzone ;
 // Dropzone.options.misImagenes = {
 //     init:function()
 //     {
 //         myDropzone = this;
 //     },
 //     url: "{{ route('profesional.imagen.carga') }}",
 //     method: 'post',
 //     createImageThumbnails: true,
 //     addRemoveLinks: true,
 //     headers:{
 //         'X-CSRF-TOKEN' : CSRF_TOKEN,
 //         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
 //     },

 //     acceptedFiles: "image/*",
 //     maxFilesize: 4,
 //     maxFiles: 12,
 //     /** El texto utilizado antes de que se eliminen los archivos. */
 //     dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

 //     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
 //     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

 //     /**
 //      * El texto que se agregará antes del formulario alternativo.
 //      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
 //      * ser ignorado.
 //      */
 //     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

 //     /**
 //      * Si el tamaño del archivo es demasiado grande.
 //      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
 //      */
 //      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

 //     /** Si el archivo no coincide con el tipo de archivo. */
 //     dictInvalidFileType: "No puedes subir archivos de este tipo.",

 //     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
 //     dictCancelUpload: "Cancelar carga",

 //     /** El texto que se muestra si una carga se canceló manualmente */
 //     dictUploadCanceled: "Subida cancelada.",

 //     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
 //     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

 //     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
 //     dictRemoveFile: "Eliminar archivo",

 //     /**
 //      * Se muestra si `maxFiles` es st y se excede.
 //      */
 //     dictMaxFilesExceeded: "No puede cargar más archivos.",

 //     // accept(file, done) {
 //     //     console.log('-------------accept-----------------------');
 //     //     cargar_lista_imagenes();
 //     //     return done();
 //     // },
 //     success: function(file, response){
 //         // console.log('-------------success-----------------------');
 //         cargar_lista_imagenes();

 //         if (file.previewElement) {
 //             return file.previewElement.classList.add("dz-success");
 //         }
 //     },
 //     error(file, message) {
 //         // console.log('-------------error-----------------------');
 //         if (file.previewElement) {
 //             file.previewElement.classList.add("dz-error");
 //             if (typeof message !== "string" && message.error)
 //             {
 //                 message = message.error;
 //             }
 //             else
 //             {
 //                 message = message.message;
 //             }
 //             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
 //                 node.textContent = message;
 //             }
 //         }
 //     },
 //     removedfile(file) {
 //         // console.log('-------------removedfile-----------------------');
 //         cargar_lista_imagenes();
 //         if (file.previewElement != null && file.previewElement.parentNode != null) {
 //             file.previewElement.parentNode.removeChild(file.previewElement);
 //         }
 //         return this._updateMaxFilesReachedClass();
 //     },
 //     canceled: function canceled(file) {
 //         cargar_lista_imagenes();
 //         return this.emit("error", file, this.options.dictUploadCanceled);
 //     },
 // };



 var lista_imagenes = [];
 var lista_imagenes = {};
 function cargar_lista_imagenes(obj_dropzone, alias_examen)
 {
     // console.log('--------------cargar_lista_imagenes----------------------');
     lista_imagenes[alias_examen] = [];
     let temp  = obj_dropzone.getAcceptedFiles();
     $.each(temp, function( index, value )
     {
         if(value.status == "success")
         {
             if(value.xhr !== undefined)
             {
                 var img_temp = JSON.parse(value.xhr.response);
                 lista_imagenes[alias_examen][index] = [
                     url=img_temp.img.url,
                     nombre_origian= img_temp.img.original_file_name,
                     nombre_img = img_temp.img.nombre_img,
                     file_extension = img_temp.img.file_extension,
                 ];
                 $('#input_lista_imagenes').val('');
                 $('#input_lista_imagenes').val(JSON.stringify(lista_imagenes));
             }
         }
     });
 }

 /** MANEJO DE IMAGENES */
 var myDropzone_receta_medica;

 Dropzone.options.recetaMedicaInyectableEnfermeria = {
     init: function() {
         myDropzone_receta_medica = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers: {
         'X-CSRF-TOKEN': CSRF_TOKEN,
     },
     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     dictDefaultMessage: "Arrastre el archivo de la receta al recuadro para subirla",
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",
     dictFileTooBig: "El archivo es demasiado grande (MiB). Tamaño máximo: MiB.",
     dictInvalidFileType: "No puede cargar archivos de este tipo.",
     dictResponseError: "El servidor respondió con el código .",
     dictCancelUpload: "Cancelar carga",
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",
     dictRemoveFile: "Eliminar archivo",
     dictMaxFilesExceeded: "No puede cargar más archivos.",
     success: function(file, response) {
         cargar_lista_imagenes_receta(myDropzone_receta_medica, 'receta_medica_inyectable');
     },
     removedfile: function(file) {
         cargar_lista_imagenes_receta(myDropzone_receta_medica, 'receta_medica_inyectable');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function(file) {
         cargar_lista_imagenes_receta(myDropzone_receta_medica, 'receta_medica_inyectable');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var lista_imagenes_receta = {};
 function cargar_lista_imagenes_receta(obj_dropzone, alias_examen) {
     lista_imagenes_receta[alias_examen] = [];
     let temp = obj_dropzone.getAcceptedFiles();
     $.each(temp, function(index, value) {
         if (value.status == "success") {
             if (value.xhr !== undefined) {
                 var img_temp = JSON.parse(value.xhr.response);
                 lista_imagenes_receta[alias_examen][index] = [
                     url = img_temp.img.url,
                     nombre_original = img_temp.img.original_file_name,
                     nombre_img = img_temp.img.nombre_img,
                     file_extension = img_temp.img.file_extension,
                 ];
             }
         }
     });
 }

 /** DROPZONES DOCUMENTOS NUTRICIÓN (referencian al nutricionista emisor) */
 function configDropzoneNutricion(selectNutricionistaId, inputDocsId) {
     function actualizarDocsNutricion(dropzone) {
         var lista = [];
         var aceptados = dropzone.getAcceptedFiles();
         $.each(aceptados, function(index, value) {
             if (value.status == "success" && value.xhr !== undefined) {
                 var respuesta = JSON.parse(value.xhr.response);
                 // Soporte para respuesta de cargaArchivoTemp (archivo) o cargaImagenTemp (img)
                 var datos = respuesta.archivo || respuesta.img;
                 lista.push([
                     datos.url,
                     datos.original_file_name,
                     datos.nombre_archivo || datos.nombre_img,
                     datos.file_extension,
                     $('#' + selectNutricionistaId).val() || '',
                 ]);
             }
         });
         $('#' + inputDocsId).val(JSON.stringify(lista));
     }

     return {
         url: "{{ route('profesional.archivo.carga') }}",
         method: 'post',
         createImageThumbnails: false,
         addRemoveLinks: true,
         headers: {
             'X-CSRF-TOKEN': CSRF_TOKEN,
         },
         acceptedFiles: ".pdf,.doc,.docx,.xls,.xlsx,.csv,.jpg,.jpeg,.png,.gif,.bmp,.webp,.svg",
         maxFilesize: 10,
         maxFiles: 12,
         dictDefaultMessage: "Arrastre el documento al recuadro para subirlo (PDF, Word, Excel, imágenes)",
         dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",
         dictFileTooBig: "El archivo es demasiado grande (MiB). Tamaño máximo: MiB.",
         dictInvalidFileType: "No puede cargar archivos de este tipo. Formatos permitidos: PDF, Word, Excel, imágenes.",
         dictResponseError: "El servidor respondió con el código .",
         dictCancelUpload: "Cancelar carga",
         dictRemoveFile: "Eliminar archivo",
         dictMaxFilesExceeded: "No puede cargar más archivos.",
         init: function() {
             var dz = this;
             // Adjunta el nutricionista seleccionado al envío de cada archivo
             dz.on('sending', function(file, xhr, formData) {
                 formData.append('id_nutricionista', $('#' + selectNutricionistaId).val() || '');
             });
             dz.on('success', function(file, response) {
                 actualizarDocsNutricion(dz);
             });
             dz.on('removedfile', function(file) {
                 actualizarDocsNutricion(dz);
                 if (file.previewElement != null && file.previewElement.parentNode != null) {
                     file.previewElement.parentNode.removeChild(file.previewElement);
                 }
                 return this._updateMaxFilesReachedClass();
             });
             dz.on('canceled', function(file) {
                 actualizarDocsNutricion(dz);
             });
         },
     };
 }

 Dropzone.options.dzNutricionEvaluacion = configDropzoneNutricion('nutricionista_evaluacion', 'docs_nutricion_evaluacion');
 Dropzone.options.dzNutricionPauta = configDropzoneNutricion('nutricionista_pauta', 'docs_nutricion_pauta');

 /** FUNCIONES PARA GUARDAR TRATAMIENTO INYECTABLE */

 function cargar_receta_sdi_enfermeria() {
    let select = $('#id_receta_sdi_enf option:selected');
    let contenedor = $('#detalle_receta_sdi_enf');
    let recetaId = $('#id_receta_sdi_enf').val();

    if (!recetaId) {
        contenedor.hide().html('');
        return;
    }

    let medicamentosRaw = select.attr('data-medicamentos') || '[]';
    let profesional = select.attr('data-profesional') || 'No especificado';
    let lugarAtencion = select.attr('data-lugar-atencion') || 'No especificado';
    let medicamentos = [];

    try {
        medicamentos = JSON.parse(medicamentosRaw);
    } catch (e) {
        console.error('No se pudo parsear data-medicamentos', e);
        medicamentos = [];
    }

    if (!Array.isArray(medicamentos) || medicamentos.length === 0) {
        contenedor
            .html('<div class="alert alert-warning py-2 mb-0">La receta seleccionada no tiene medicamentos para mostrar.</div>')
            .show();
        return;
    }

    let filas = medicamentos.map(function(med, idx) {
        return `
            <tr>
                <td class="text-center">${idx + 1}</td>
                <td>${med.medicamento || '-'}</td>
                <td>${med.dosis || '-'}</td>
                <td>${med.frecuencia || '-'}</td>
                <td>${med.via || '-'}</td>
                <td>${med.periodo || '-'}</td>
                <td>${med.cantidad || '-'}</td>
                <td>${med.observacion || '-'}</td>
            </tr>
        `;
    }).join('');

    let html = `
        <div class="card border mb-3 shadow-sm">
            <div class="card-header bg-light border-bottom py-2 px-3">
                <h6 class="mb-0 text-secondary">
                    <i class="fas fa-prescription-bottle-alt mr-2"></i>Detalle informativo receta #${recetaId}
                </h6>
            </div>
            <div class="card-body p-3 bg-white">
                <div class="row mb-3 pb-2 border-bottom">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <small class="d-block text-muted text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">
                            <i class="fas fa-user-md mr-1"></i>Profesional
                        </small>
                        <span class="d-block text-dark" style="font-size: 0.95rem;">${profesional}</span>
                    </div>
                    <div class="col-md-6">
                        <small class="d-block text-muted text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">
                            <i class="fas fa-hospital mr-1"></i>Lugar de atención
                        </small>
                        <span class="d-block text-dark" style="font-size: 0.95rem;">${lugarAtencion}</span>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-bordered mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center align-middle" style="width: 40px;">#</th>
                                <th class="align-middle">Medicamento</th>
                                <th class="align-middle">Dosis</th>
                                <th class="align-middle">Frecuencia</th>
                                <th class="align-middle">Via</th>
                                <th class="align-middle">Periodo</th>
                                <th class="align-middle">Cantidad</th>
                                <th class="align-middle">Observación</th>
                            </tr>
                        </thead>
                        <tbody>${filas}</tbody>
                    </table>
                </div>
            </div>
        </div>
    `;

    contenedor.html(html).show();
 }

 // Función para guardar receta médica EXTERNA (con imágenes adjuntas)
 function guardar_receta_medica_inyectable_externa() {
    // Actualizar lista de imágenes desde el dropzone antes de validar
    if (myDropzone_receta_medica) {
        cargar_lista_imagenes_receta(myDropzone_receta_medica, 'receta_medica_inyectable');
        console.log('Dropzone inicializado:', myDropzone_receta_medica);
        console.log('Archivos aceptados:', myDropzone_receta_medica.getAcceptedFiles().length);
        console.log('Lista imágenes receta:', lista_imagenes_receta['receta_medica_inyectable']);
    } else {
        console.error('myDropzone_receta_medica NO está inicializado');
    }

    let valido = 1;
    let mensaje = '';

    // Validar que haya al menos una imagen adjunta usando el dropzone directamente
    if (!myDropzone_receta_medica || myDropzone_receta_medica.getAcceptedFiles().length == 0) {
        valido = 0;
        mensaje += 'Debe adjuntar al menos una imagen de la receta médica.\n';
    }

    if (valido == 0) {
        swal('Error', mensaje, 'error');
        return;
    }

    let formData = {
        _token: CSRF_TOKEN,
        ficha_atencion_id: $('#id_fc').val(),
        id_paciente: $('#id_paciente_fc').val(),
        id_receta_sdi: '', // No tiene ID de receta interna
        observaciones: $('#obs_busqueda_receta_externa').val(),
        buscar_receta: 0, // Es externa, no busca en el sistema
        imagenes: JSON.stringify(lista_imagenes_receta['receta_medica_inyectable'] || []),
    };

    $.ajax({
        url: '{{ route("enfermeria.guardar_receta_medica_inyectable") }}',
        type: 'POST',
        data: formData,
        success: function(response) {
            console.log(response);
            if (response.estado == 1) {
                swal('Guardado', 'La receta médica externa ha sido guardada correctamente.', 'success');

                // Agregar fila a la tabla dinámicamente usando los datos del backend
                if (response.tratamiento) {
                    agregarFilaTratamientoInyectable(response.tratamiento);
                }

                // Limpiar formulario y dropzone
                $('#obs_busqueda_receta_externa').val('');
                if (myDropzone_receta_medica) {
                    myDropzone_receta_medica.removeAllFiles();
                }
                lista_imagenes_receta['receta_medica_inyectable'] = [];

            } else {
                swal('Error', response.mensaje || 'Hubo un problema al guardar la receta médica externa.', 'error');
            }
        },
        error: function(xhr) {
            console.error(xhr);
            let errorMsg = 'Hubo un problema al guardar la receta médica externa.';
            if (xhr.responseJSON && xhr.responseJSON.mensaje) {
                errorMsg = xhr.responseJSON.mensaje;
            }
            swal('Error', errorMsg, 'error');
        }
    });
 }

 // Función para guardar receta médica INTERNA (seleccionando receta del paciente)
 function guardar_receta_medica_inyectable_interna() {
    let formData = {
        _token: CSRF_TOKEN,
        ficha_atencion_id: $('#id_fc').val(),
        id_receta_sdi: $('#id_receta_sdi_enf').val(),
        id_paciente: $('#id_paciente_fc').val(),
        observaciones: $('#obs_busqueda_receta_interna').val(),
        buscar_receta: $('#busc_receta_check_enf').is(':checked') ? 1 : 0,
        imagenes: JSON.stringify([]), // Las recetas internas no tienen imágenes adicionales
    };

    let valido = 1;
    let mensaje = '';

    if (formData.buscar_receta == 1 && formData.id_receta_sdi.trim() == '') {
        valido = 0;
        mensaje += 'Debe seleccionar una receta del paciente.\n';
    }
    if (valido == 0) {
        swal('Error', mensaje, 'error');
        return;
    }

    $.ajax({
        url: '{{ route("enfermeria.guardar_receta_medica_inyectable") }}',
        type: 'POST',
        data: formData,
        success: function(response) {
            console.log(response);
            if (response.estado == 1) {
                swal('Guardado', 'La receta médica del paciente ha sido referenciada correctamente.', 'success');

                // Agregar fila a la tabla dinámicamente usando los datos del backend
                if (response.tratamiento) {
                    agregarFilaTratamientoInyectable(response.tratamiento);
                }

                // Limpiar formulario
                $('#id_receta_sdi_enf').val('');
                $('#obs_busqueda_receta_interna').val('');
                $('#busc_receta_check_enf').prop('checked', false);

            } else {
                swal('Error', response.mensaje || 'Hubo un problema al guardar la referencia de receta médica.', 'error');
            }
        },
        error: function(xhr) {
            console.error(xhr);
            let errorMsg = 'Hubo un problema al guardar la referencia de receta médica.';
            if (xhr.responseJSON && xhr.responseJSON.mensaje) {
                errorMsg = xhr.responseJSON.mensaje;
            }
            swal('Error', errorMsg, 'error');
        }
    });
 }

 // Función legacy (mantener por compatibilidad pero ya no se usa)
 function guardar_receta_medica_inyectable() {
    let formData = {
        _token: CSRF_TOKEN,
        ficha_atencion_id: $('#id_fc').val(),
        id_receta_sdi: $('#id_receta_sdi_enf').val(),
        id_paciente: $('#id_paciente_fc').val(),
        observaciones: $('#obs_busqueda_receta').val(),
        buscar_receta: $('#busc_receta_check_enf').is(':checked') ? 1 : 0,
        imagenes: JSON.stringify(lista_imagenes_receta['receta_medica_inyectable'] || []),
    };

    let valido = 1;
    let mensaje = '';

    if (formData.buscar_receta == 1 && formData.id_receta_sdi.trim() == '') {
        valido = 0;
        mensaje += 'Debe seleccionar una receta del paciente.\n';
    }
    if (valido == 0) {
        swal('Error', mensaje, 'error');
        return;
    }

    $.ajax({
        url: '{{ route("enfermeria.guardar_receta_medica_inyectable") }}',
        type: 'POST',
        data: formData,
        success: function(response) {
            console.log(response);
            if (response.estado == 1) {
                swal('Guardado', 'La receta médica ha sido guardada correctamente.', 'success');

                // Agregar fila a la tabla dinámicamente usando los datos del backend
                if (response.tratamiento) {
                    agregarFilaTratamientoInyectable(response.tratamiento);
                }

                // Limpiar formulario y dropzone
                $('#id_receta_sdi_enf').val('');
                $('#obs_busqueda_receta').val('');
                $('#busc_receta_check_enf').prop('checked', false);
                if (myDropzone_receta_medica) {
                    myDropzone_receta_medica.removeAllFiles();
                }
                lista_imagenes_receta['receta_medica_inyectable'] = [];

            } else {
                swal('Error', response.mensaje || 'Hubo un problema al guardar la receta médica.', 'error');
            }
        },
        error: function(xhr) {
            console.error(xhr);
            let errorMsg = 'Hubo un problema al guardar la receta médica.';
            if (xhr.responseJSON && xhr.responseJSON.mensaje) {
                errorMsg = xhr.responseJSON.mensaje;
            }
            swal('Error', errorMsg, 'error');
        }
    });
 }

 function agregarFilaTratamientoInyectable(tratamiento) {
    // Verificar si la tabla está vacía (tiene el mensaje de "No hay tratamientos")
    let tbody = $('#lista_tratamientos_inyectables_enfermeria');
    let filaVacia = tbody.find('td[colspan="6"]');
    if (filaVacia.length > 0) {
        filaVacia.parent().remove();
    }

    // Construir HTML de imágenes
    let imagenesHtml = '<span class="text-muted">-</span>';
    if (tratamiento.imagenes && tratamiento.imagenes.length > 0) {
        imagenesHtml = `
            <button type="button" class="btn btn-sm btn-info" onclick='ver_imagenes_tratamiento(${tratamiento.id}, ${JSON.stringify(tratamiento.imagenes)})'>
                <i class="feather icon-image"></i> (${tratamiento.imagenes.length})
            </button>
        `;
    }

    // Construir detalle según tipo
    let detalleHtml = '';
    let observacionesHtml = '';

    if (tratamiento.tipo == 'receta_medica') {
        detalleHtml = `
            <strong>ID Receta:</strong> ${tratamiento.id_receta_sdi || 'N/A'}<br>
            <strong>Buscar:</strong> ${tratamiento.buscar_receta ? 'Sí' : 'No'}
        `;
        observacionesHtml = tratamiento.observaciones_receta || '';
    } else if (tratamiento.tipo == 'inyectable_im_iv') {
        detalleHtml = tratamiento.incidentes_procedimiento || 'Sin incidentes';
        observacionesHtml = tratamiento.otras_observaciones_procedimiento || '';
    } else if (tratamiento.tipo == 'control_sueros') {
        detalleHtml = tratamiento.descripcion_sueros || 'N/A';
        observacionesHtml = tratamiento.observaciones_examen_control || '';
    }

    // Crear la nueva fila
    let nuevaFila = `
        <tr id="tratamiento_iny${tratamiento.id}">
            <td>
                <span class="badge badge-primary">${tratamiento.tipo_nombre}</span>
            </td>
            <td><small>${tratamiento.created_at || new Date().toLocaleString('es-CL')}</small></td>
            <td>${detalleHtml}</td>
            <td>${observacionesHtml}</td>
            <td>${imagenesHtml}</td>
            <td>
                <button type="button" role="button" class="btn btn-sm btn-danger" onclick="eliminar_tratamiento_inyectable(${tratamiento.id});">
                    <i class="feather icon-trash-2"></i>
                </button>
            </td>
        </tr>
    `;

    // Agregar al inicio de la tabla
    tbody.prepend(nuevaFila);
 }

 function guardar_inyectable_im_iv() {
    let formData = {
        _token: CSRF_TOKEN,
        ficha_atencion_id: $('#id_fc').val(),
        id_paciente: $('#id_paciente').val(),
        incidentes_procedimiento: $('#obs_ex_oidos').val(),
        otras_observaciones: $('#obs_ex_orl-2').val(),
    };

    $.ajax({
        url: '{{ route("enfermeria.guardar_inyectable_im_iv") }}',
        type: 'POST',
        data: formData,
        success: function(response) {
            if (response.estado == 1) {
                swal('Guardado', 'El inyectable IM/IV ha sido guardado correctamente.', 'success');

                // Agregar fila a la tabla dinámicamente usando los datos del backend
                if (response.tratamiento) {
                    agregarFilaTratamientoInyectable(response.tratamiento);
                }

                // Limpiar formulario
                $('#obs_ex_oidos').val('');
                $('#obs_ex_orl-2').val('');

            } else {
                swal('Error', response.mensaje || 'Hubo un problema al guardar el inyectable IM/IV.', 'error');
            }
        },
        error: function(xhr) {
            console.error(xhr);
            let errorMsg = 'Hubo un problema al guardar el inyectable IM/IV.';
            if (xhr.responseJSON && xhr.responseJSON.mensaje) {
                errorMsg = xhr.responseJSON.mensaje;
            }
            swal('Error', errorMsg, 'error');
        }
    });
 }

 function guardar_control_sueros() {
    let formData = {
        _token: CSRF_TOKEN,
        ficha_atencion_id: $('#id_fc').val(),
        id_paciente: $('#id_paciente').val(),
        otras_tratamientos: $('#otros_tratamientos_sueros').val(),
        observaciones_examen: $('#observaciones_examen_control_sueros').val(),
        control_signos_vitales: $('#control_durante_procedimiento_sueros').val(),
    };

    // validaciones básicas
     let valido = 1;
     let mensaje = '';

        if (valido == 0) {
            swal('Error', mensaje, 'error');
            return;
        }

    $.ajax({
        url: '{{ route("enfermeria.guardar_control_sueros") }}',
        type: 'POST',
        data: formData,
        success: function(response) {
            if (response.estado == 1) {
                swal('Guardado', 'El control de sueros ha sido guardado correctamente.', 'success');

                // Agregar fila a la tabla dinámicamente usando los datos del backend
                if (response.tratamiento) {
                    agregarFilaTratamientoInyectable(response.tratamiento);
                }

                // Limpiar formulario
                $('#descripcion_sueros').val('');
                $('#otros_tratamientos_sueros').val('');
                $('#observaciones_examen_control_sueros').val('');
                $('#control_durante_procedimiento_sueros').val('');

            } else {
                swal('Error', response.mensaje || 'Hubo un problema al guardar el control de sueros.', 'error');
            }
        },
        error: function(xhr) {
            console.error(xhr);
            let errorMsg = 'Hubo un problema al guardar el control de sueros.';
            if (xhr.responseJSON && xhr.responseJSON.mensaje) {
                errorMsg = xhr.responseJSON.mensaje;
            }
            swal('Error', errorMsg, 'error');
        }
    });
 }

 /** FUNCIONES PARA TRATAMIENTOS INYECTABLES */

 function ver_imagenes_tratamiento(tratamiento_id, imagenes) {
    let html = '<div class="row" style="max-height: 500px; overflow-y: auto;">';

    imagenes.forEach(function(imagen, index) {
        let ruta = imagen[0]; // La ruta completa está en el primer elemento del array
        let nombre = imagen[1]; // El nombre está en el segundo elemento

        html += `
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="${ruta}" class="card-img-top" alt="${nombre}" style="max-height: 200px; object-fit: contain; cursor: pointer;" onclick="window.open('${ruta}', '_blank')">
                    <div class="card-body p-2">
                        <p class="card-text small mb-0 text-truncate" title="${nombre}">${nombre}</p>
                    </div>
                </div>
            </div>
        `;
    });

    html += '</div>';

    var wrapper = document.createElement('div');
    wrapper.innerHTML = html;

    swal({
        title: 'Imágenes del Tratamiento',
        content: wrapper,
        button: "Cerrar"
    });
 }

 function eliminar_tratamiento_inyectable(tratamiento_id) {
    swal({
        title: '¿Está seguro?',
        text: "Esta acción eliminará el tratamiento inyectable",
        icon: 'warning',
        buttons: {
            cancel: "Cancelar",
            confirm: {
                text: "Sí, eliminar",
                value: true
            }
        },
        dangerMode: true
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: '{{ route("enfermeria.eliminar_tratamiento_inyectable") }}',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    tratamiento_id: tratamiento_id
                },
                success: function(response) {
                    if (response.estado == 1) {
                        swal('Eliminado', 'El tratamiento ha sido eliminado correctamente.', 'success');

                        // Eliminar la fila de la tabla
                        let fila = $('#tratamiento_iny' + tratamiento_id);
                        fila.fadeOut(300, function() {
                            $(this).remove();

                            // Si no quedan filas, mostrar mensaje de tabla vacía
                            let tbody = $('#lista_tratamientos_inyectables_enfermeria');
                            if (tbody.find('tr').length === 0) {
                                tbody.html(`
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-3">
                                            <i class="feather icon-inbox"></i> No hay tratamientos registrados
                                        </td>
                                    </tr>
                                `);
                            }
                        });

                    } else {
                        swal('Error', response.mensaje || 'No se pudo eliminar el tratamiento.', 'error');
                    }
                },
                error: function(xhr) {
                    console.error(xhr);
                    let errorMsg = 'Hubo un problema al eliminar el tratamiento.';
                    if (xhr.responseJSON && xhr.responseJSON.mensaje) {
                        errorMsg = xhr.responseJSON.mensaje;
                    }
                    swal('Error', errorMsg, 'error');
                }
            });
        }
    });
 }

 /** FUNCIONES DE EDICIÓN DE TRATAMIENTOS DOMICILIARIOS */

 function editar_suero_venoso(id, medicamentos, hora_inicio, hora_termino, cc_hora, sitio_puncion, observaciones, fecha) {
    $('#edit_suero_id').val(id);
    $('#edit_suero_medicamentos').val(medicamentos);
    $('#edit_suero_hora_inicio').val(hora_inicio);
    $('#edit_suero_hora_termino').val(hora_termino);
    $('#edit_suero_cc_hora').val(cc_hora);
    $('#edit_suero_sitio_puncion').val(sitio_puncion);
    $('#edit_suero_observaciones').val(observaciones);
    $('#edit_suero_fecha').val(fecha);
    $('#modal_editar_suero_venoso').modal('show');
 }

 function guardar_edicion_suero_venoso() {
    let formData = {
        _token: CSRF_TOKEN,
        id: $('#edit_suero_id').val(),
        medicamentos: $('#edit_suero_medicamentos').val(),
        hora_inicio: $('#edit_suero_hora_inicio').val(),
        hora_termino: $('#edit_suero_hora_termino').val(),
        cc_hora: $('#edit_suero_cc_hora').val(),
        sitio_puncion: $('#edit_suero_sitio_puncion').val(),
        observaciones: $('#edit_suero_observaciones').val(),
        fecha: $('#edit_suero_fecha').val(),
        ficha_atencion_id: $('#id_fc').val()
    };

    $.ajax({
        url: '{{ route("enfermeria.actualizar_tratamiento_domiciliario") }}',
        type: 'POST',
        data: formData,
        success: function(response) {
            if (response.estado == 1) {
                $('#modal_editar_suero_venoso').modal('hide');
                swal('Actualizado', 'El tratamiento ha sido actualizado correctamente.', 'success');
                setTimeout(function() {
                    location.reload();
                }, 1500);
            } else {
                swal('Error', 'Hubo un problema al actualizar el tratamiento.', 'error');
            }
        },
        error: function(xhr) {
            swal('Error', 'Hubo un problema al actualizar el tratamiento.', 'error');
        }
    });
 }

 function editar_nutricion_parenteral(id, observaciones) {
    $('#edit_nutricion_id').val(id);
    $('#edit_nutricion_observaciones').val(observaciones);
    $('#modal_editar_nutricion_parenteral').modal('show');
 }

 function guardar_edicion_nutricion_parenteral() {
    let formData = {
        _token: CSRF_TOKEN,
        id: $('#edit_nutricion_id').val(),
        observaciones: $('#edit_nutricion_observaciones').val(),
        ficha_atencion_id: $('#id_fc').val()
    };

    $.ajax({
        url: '{{ route("enfermeria.actualizar_tratamiento_domiciliario") }}',
        type: 'POST',
        data: formData,
        success: function(response) {
            if (response.estado == 1) {
                $('#modal_editar_nutricion_parenteral').modal('hide');
                swal('Actualizado', 'La nutrición parenteral ha sido actualizada correctamente.', 'success');
                setTimeout(function() {
                    location.reload();
                }, 1500);
            } else {
                swal('Error', 'Hubo un problema al actualizar el registro.', 'error');
            }
        },
        error: function(xhr) {
            swal('Error', 'Hubo un problema al actualizar el registro.', 'error');
        }
    });
 }

 function editar_curacion(id) {
    $('#edit_curacion_id').val(id);
    // Recuperar las alertas e incidencias actuales desde el campo de la tabla
    let observacionesActuales = $('[id="vigilancia_curacion_servicio' + id + '"]').first().val() || '';
    $('#edit_curacion_observaciones').val(observacionesActuales);
    $('#modal_editar_curacion').modal('show');
 }

 function guardar_edicion_curacion() {
    let id = $('#edit_curacion_id').val();
    let observaciones = $('#edit_curacion_observaciones').val();
    let formData = {
        _token: CSRF_TOKEN,
        id_curacion: id,
        observaciones: observaciones
    };

    $.ajax({
        url: '{{ route("enfermeria.guardar_observaciones_curacion") }}',
        type: 'POST',
        data: formData,
        success: function(response) {
            if (response.mensaje == 'OK') {
                $('#modal_editar_curacion').modal('hide');
                // Actualizar dinámicamente el campo de alertas e incidencias en la(s) tabla(s)
                $('[id="vigilancia_curacion_servicio' + id + '"]').val(observaciones);
                swal('Actualizado', 'Las alertas e incidencias se han actualizado correctamente.', 'success');
            } else {
                swal('Error', 'Hubo un problema al actualizar el registro.', 'error');
            }
        },
        error: function(xhr) {
            swal('Error', 'Hubo un problema al actualizar el registro.', 'error');
        }
    });
 }

 function editar_otro_procedimiento(id, procedimiento, observaciones) {
    $('#edit_otro_procedimiento_id').val(id);
    $('#edit_otro_procedimiento_procedimiento').val(procedimiento);
    $('#edit_otro_procedimiento_observaciones').val(observaciones);
    $('#modal_editar_otro_procedimiento').modal('show');
 }

 function guardar_edicion_otro_procedimiento() {
    let formData = {
        _token: CSRF_TOKEN,
        id: $('#edit_otro_procedimiento_id').val(),
        procedimiento: $('#edit_otro_procedimiento_procedimiento').val(),
        observaciones: $('#edit_otro_procedimiento_observaciones').val(),
        ficha_atencion_id: $('#id_fc').val()
    };

    $.ajax({
        url: '{{ route("enfermeria.actualizar_tratamiento_domiciliario") }}',
        type: 'POST',
        data: formData,
        success: function(response) {
            if (response.estado == 1) {
                $('#modal_editar_otro_procedimiento').modal('hide');
                swal('Actualizado', 'El procedimiento ha sido actualizado correctamente.', 'success');
                setTimeout(function() {
                    location.reload();
                }, 1500);
            } else {
                swal('Error', 'Hubo un problema al actualizar el registro.', 'error');
            }
        },
        error: function(xhr) {
            swal('Error', 'Hubo un problema al actualizar el registro.', 'error');
        }
    });
 }

 function eliminar_registro(id){
        swal({
            title: "¿Estás seguro?",
            text: "Una vez eliminado, no podrá recuperar este registro!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                // El usuario confirmó la eliminación
                let url = "{{ route('enfermeria.eliminar_tratamiento_domiciliario') }}";
                let data = {
                    _token: CSRF_TOKEN,
                    id: id,
                    ficha_atencion_id: $('#id_fc').val(),
                };

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        console.log(response);
                        if (response.mensaje == 'OK') {
                            swal("¡El registro ha sido eliminado!", {
                                icon: "success",
                            }).then(() => {
                                // Recargar la página después de cerrar la alerta
                                location.reload();
                            });
                        } else {
                            swal("Error al eliminar el registro.", {
                                icon: "error",
                            });
                        }
                    },
                    error: function(xhr) {
                        swal("Error al eliminar el registro.", {
                            icon: "error",
                        });
                    }
                })

            }
        });
 }

// Gráfico de Presión Arterial
function inicializarGraficoPresionArterial() {
    // Usar datos reales de hipertensión del paciente
    const datosHipertension = @json($hipertension ?? []);

    // Verificar si hay datos
    if (!datosHipertension || datosHipertension.length === 0) {
        // Mostrar mensaje si no hay datos
        const ctx = document.getElementById('chartPresionArterial');
        if (ctx) {
            ctx.getContext('2d').font = "16px Arial";
            ctx.getContext('2d').textAlign = "center";
            ctx.getContext('2d').fillText("No hay datos de presión arterial disponibles", ctx.width/2, ctx.height/2);
        }
        return;
    }

    // Preparar datos para el gráfico
    const labels = [];
    const datosSistolica = [];
    const datosDiastolica = [];

    // Filtrar datos válidos y ordenar por fecha
    const datosOrdenados = datosHipertension
        .filter(item => item.sistolica !== null && item.diastolica !== null && item.sistolica > 0 && item.diastolica > 0)
        .sort((a, b) => new Date(a.created_at) - new Date(b.created_at));

    datosOrdenados.forEach(function(item, index) {
        // Formatear fecha
        const fecha = new Date(item.created_at);
        const fechaFormateada = fecha.toLocaleDateString('es-ES', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric'
        });
        labels.push(fechaFormateada);
        datosSistolica.push(parseInt(item.sistolica));
        datosDiastolica.push(parseInt(item.diastolica));
    });

    // Si no hay datos válidos después del filtro
    if (labels.length === 0) {
        const ctx = document.getElementById('chartPresionArterial');
        if (ctx) {
            ctx.getContext('2d').font = "16px Arial";
            ctx.getContext('2d').textAlign = "center";
            ctx.getContext('2d').fillText("No hay datos válidos de presión arterial", ctx.width/2, ctx.height/2);
        }
        return;
    }

    const ctx = document.getElementById('chartPresionArterial');
    if (ctx) {
        // Destruir gráfico anterior si existe
        if (window.chartPresion) {
            window.chartPresion.destroy();
        }

        window.chartPresion = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Presión Sistólica',
                    data: datosSistolica,
                    borderColor: '#dc3545',
                    backgroundColor: 'rgba(220, 53, 69, 0.1)',
                    borderWidth: 3,
                    fill: false,
                    tension: 0.4,
                    pointRadius: 5,
                    pointHoverRadius: 8
                },
                {
                    label: 'Presión Diastólica',
                    data: datosDiastolica,
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                    borderWidth: 3,
                    fill: false,
                    tension: 0.4,
                    pointRadius: 5,
                    pointHoverRadius: 8
                },
                {
                    label: 'Límite Normal Sistólica (140)',
                    data: labels.map(() => 140),
                    borderColor: '#28a745',
                    backgroundColor: 'transparent',
                    borderWidth: 2,
                    borderDash: [5, 5],
                    fill: false,
                    pointRadius: 0
                },
                {
                    label: 'Límite Normal Diastólica (90)',
                    data: labels.map(() => 90),
                    borderColor: '#17a2b8',
                    backgroundColor: 'transparent',
                    borderWidth: 2,
                    borderDash: [5, 5],
                    fill: false,
                    pointRadius: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: Math.max(...datosSistolica, ...datosDiastolica) + 20,
                        title: {
                            display: true,
                            text: 'Presión (mmHg)',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        },
                        grid: {
                            color: 'rgba(0,0,0,0.1)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Fecha',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        },
                        grid: {
                            color: 'rgba(0,0,0,0.1)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: {
                                size: 12
                            },
                            usePointStyle: true
                        }
                    },
                    title: {
                        display: true,
                        text: 'Evolución de la Presión Arterial del Paciente',
                        font: {
                            size: 18,
                            weight: 'bold'
                        },
                        padding: 20
                    },
                    tooltip: {
                        callbacks: {
                            title: function(tooltipItems) {
                                return 'Fecha: ' + tooltipItems[0].label;
                            },
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.parsed.y + ' mmHg';
                                return label;
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        });
    }
}

// Gráfico de Control de Peso
function inicializarGraficoControlPeso() {
    // Usar datos reales de control de peso del paciente
    const datosControlPeso = @json($control_peso ?? []);

    // Verificar si hay datos
    if (!datosControlPeso || datosControlPeso.length === 0) {
        const ctx = document.getElementById('chartControlPeso');
        if (ctx) {
            ctx.getContext('2d').font = "16px Arial";
            ctx.getContext('2d').textAlign = "center";
            ctx.getContext('2d').fillText("No hay datos de control de peso disponibles", ctx.width/2, ctx.height/2);
        }
        return;
    }

    // Preparar datos para el gráfico
    const labels = [];
    const datosPeso = [];
    const datosIdeal = [];
    const datosVariacion = [];

    // Filtrar datos válidos y ordenar por fecha
    const datosOrdenados = datosControlPeso
        .filter(item => item.peso !== null && item.peso > 0)
        .sort((a, b) => new Date(a.created_at) - new Date(b.created_at));

    datosOrdenados.forEach(function(item, index) {
        // Formatear fecha
        const fecha = new Date(item.created_at);
        const fechaFormateada = fecha.toLocaleDateString('es-ES', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric'
        });
        labels.push(fechaFormateada);
        datosPeso.push(parseFloat(item.peso));
        datosIdeal.push(parseFloat(item.ideal) || 0);
        datosVariacion.push(parseFloat(item.variacion) || 0);
    });

    // Si no hay datos válidos después del filtro
    if (labels.length === 0) {
        const ctx = document.getElementById('chartControlPeso');
        if (ctx) {
            ctx.getContext('2d').font = "16px Arial";
            ctx.getContext('2d').textAlign = "center";
            ctx.getContext('2d').fillText("No hay datos válidos de peso", ctx.width/2, ctx.height/2);
        }
        return;
    }

    const ctx = document.getElementById('chartControlPeso');
    if (ctx) {
        // Destruir gráfico anterior si existe
        if (window.chartPeso) {
            window.chartPeso.destroy();
        }

        window.chartPeso = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Peso Actual (kg)',
                    data: datosPeso,
                    borderColor: '#6c757d',
                    backgroundColor: 'rgba(108, 117, 125, 0.1)',
                    borderWidth: 3,
                    fill: false,
                    tension: 0.4,
                    pointRadius: 6,
                    pointHoverRadius: 8
                },
                {
                    label: 'Peso Ideal (kg)',
                    data: datosIdeal,
                    borderColor: '#28a745',
                    backgroundColor: 'rgba(40, 167, 69, 0.1)',
                    borderWidth: 2,
                    borderDash: [5, 5],
                    fill: false,
                    tension: 0.4,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: Math.max(...datosPeso, ...datosIdeal) + 10,
                        title: {
                            display: true,
                            text: 'Peso (kg)',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        },
                        grid: {
                            color: 'rgba(0,0,0,0.1)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Fecha',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        },
                        grid: {
                            color: 'rgba(0,0,0,0.1)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: {
                                size: 12
                            },
                            usePointStyle: true
                        }
                    },
                    title: {
                        display: true,
                        text: 'Evolución del Peso Corporal del Paciente',
                        font: {
                            size: 18,
                            weight: 'bold'
                        },
                        padding: 20
                    },
                    tooltip: {
                        callbacks: {
                            title: function(tooltipItems) {
                                return 'Fecha: ' + tooltipItems[0].label;
                            },
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.parsed.y + ' kg';

                                // Agregar información de variación en el tooltip del peso actual
                                if (context.dataset.label === 'Peso Actual (kg)') {
                                    const variacion = datosVariacion[context.dataIndex];
                                    if (variacion !== undefined && variacion !== null) {
                                        const signo = variacion > 0 ? '+' : '';
                                        label += ` (Variación: ${signo}${variacion} kg)`;
                                    }
                                }

                                return label;
                            },
                            afterLabel: function(context) {
                                // Mostrar información adicional para el peso actual
                                if (context.dataset.label === 'Peso Actual (kg)') {
                                    const pesoIdeal = datosIdeal[context.dataIndex];
                                    const pesoActual = context.parsed.y;
                                    if (pesoIdeal > 0) {
                                        const diferencia = pesoActual - pesoIdeal;
                                        const signo = diferencia > 0 ? '+' : '';
                                        return `Diferencia con ideal: ${signo}${diferencia.toFixed(1)} kg`;
                                    }
                                }
                                return null;
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        });
    }
}

// Inicializar gráfico cuando se haga clic en la pestaña
document.addEventListener('DOMContentLoaded', function() {
    // Escuchar cuando se activa la pestaña de resumen
    $('#n-parenteral-cd-tab').on('shown.bs.tab', function (e) {
        setTimeout(function() {
            // Inicializar el gráfico de presión arterial (pestaña activa por defecto)
            inicializarGraficoPresionArterial();
        }, 100);
    });

    // Escuchar cuando se activa la pill de presión arterial
    $('#presion-arterial-pill').on('shown.bs.tab', function (e) {
        setTimeout(function() {
            inicializarGraficoPresionArterial();
        }, 100);
    });

    // Escuchar cuando se activa la pill de control de peso
    $('#control-peso-pill').on('shown.bs.tab', function (e) {
        setTimeout(function() {
            inicializarGraficoControlPeso();
        }, 100);
    });

    // Escuchar cuando se activa la pill de procedimientos
    $('#procedimientos-pill').on('shown.bs.tab', function (e) {
        // Opcional: agregar efectos de animación o carga de datos adicionales
        $('.timeline-item').hide().fadeIn(300);
    });

    // Escuchar cuando se activa la pill de tratamientos
    $('#tratamientos-pill').on('shown.bs.tab', function (e) {
        setTimeout(function() {
            inicializarGraficosTratamientos();
        }, 100);
    });

    // Si ya estamos en la pestaña de resumen al cargar, inicializar el gráfico de presión arterial
    if ($('#n-parenteral-cd').hasClass('active')) {
        setTimeout(function() {
            inicializarGraficoPresionArterial();
        }, 500);
    }
});

// Gráficos de Tratamientos Activos
let datosTratamientos = @json($tratamiento_activo ?? []);

function inicializarGraficosTratamientos() {
    console.log('Inicializando gráficos de tratamientos...');
    console.log('datosTratamientos:', datosTratamientos);

    // Verificar si hay datos
    if (!datosTratamientos || datosTratamientos.length === 0) {
        console.log('No hay datos de tratamientos');
        mostrarMensajeNoTratamientos();
        return;
    }

    // Procesar datos para los gráficos
    let medicamentosTotal = 0;
    let medicamentosConAdministracion = 0;
    let viaAdministracion = {};
    let resumenMedicamentos = [];

    datosTratamientos.forEach(function(tratamiento) {
        if (tratamiento.detalle && tratamiento.detalle.length > 0) {
            tratamiento.detalle.forEach(function(medicamento) {
                medicamentosTotal++;
                resumenMedicamentos.push(medicamento);

                // Contar medicamentos que tienen al menos una administración registrada
                if (medicamento.ultima_administracion_fecha && medicamento.ultima_administracion_hora) {
                    medicamentosConAdministracion++;
                }

                // Contar por vía de administración
                const via = medicamento.via_administracion || 'No especificada';
                viaAdministracion[via] = (viaAdministracion[via] || 0) + 1;
            });
        }
    });

    console.log('Medicamentos total:', medicamentosTotal);
    console.log('Medicamentos con administración:', medicamentosConAdministracion);
    console.log('Vías de administración:', viaAdministracion);

    // Crear gráfico de estado (pie chart)
    crearGraficoEstadoTratamientos(medicamentosConAdministracion, medicamentosTotal - medicamentosConAdministracion);

    // Crear gráfico de vías de administración (doughnut chart)
    crearGraficoViasAdministracion(viaAdministracion);

    // Crear tabla resumen
    crearTablaResumenMedicamentos(resumenMedicamentos);
}

function crearGraficoEstadoTratamientos(administrados, pendientes) {
    const ctx = document.getElementById('chartTratamientosEstado');
    if (ctx) {
        if (window.chartTratamientosEstado && typeof window.chartTratamientosEstado.destroy === 'function') {
            window.chartTratamientosEstado.destroy();
        }

        window.chartTratamientosEstado = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Administrados', 'Pendientes'],
                datasets: [{
                    data: [administrados, pendientes],
                    backgroundColor: [
                        '#28a745',  // verde para administrados
                        '#ffc107'   // amarillo para pendientes
                    ],
                    borderColor: [
                        '#ffffff',
                        '#ffffff'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 12
                            },
                            usePointStyle: true,
                            padding: 15
                        }
                    },
                    title: {
                        display: true,
                        text: 'Estado de Medicamentos',
                        font: {
                            size: 16,
                            weight: 'bold'
                        },
                        padding: 20
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const total = administrados + pendientes;
                                const percentage = total > 0 ? ((context.parsed / total) * 100).toFixed(1) : 0;
                                return `${context.label}: ${context.parsed} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });
    }
}

function crearGraficoViasAdministracion(viaAdministracion) {
    const ctx = document.getElementById('chartTratamientosVia');
    if (ctx) {
        if (window.chartTratamientosVia && typeof window.chartTratamientosVia.destroy === 'function') {
            window.chartTratamientosVia.destroy();
        }

        const labels = Object.keys(viaAdministracion);
        const data = Object.values(viaAdministracion);
        const colors = [
            '#007bff', '#28a745', '#ffc107', '#dc3545',
            '#17a2b8', '#6c757d', '#fd7e14', '#e83e8c'
        ];

        window.chartTratamientosVia = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: colors.slice(0, labels.length),
                    borderColor: '#ffffff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 11
                            },
                            usePointStyle: true,
                            padding: 10
                        }
                    },
                    title: {
                        display: true,
                        text: 'Vías de Administración',
                        font: {
                            size: 16,
                            weight: 'bold'
                        },
                        padding: 20
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const total = data.reduce((a, b) => a + b, 0);
                                const percentage = total > 0 ? ((context.parsed / total) * 100).toFixed(1) : 0;
                                return `${context.label}: ${context.parsed} (${percentage}%)`;
                            }
                        }
                    }
                },
                cutout: '50%'
            }
        });
    }
}

function crearTablaResumenMedicamentos(medicamentos) {
    const contenedor = document.getElementById('resumenMedicamentos');
    if (!contenedor) return;

    if (medicamentos.length === 0) {
        contenedor.innerHTML = '<p class="text-center text-muted">No hay medicamentos en tratamiento activo.</p>';
        return;
    }

    let tabla = `
        <table class="table table-sm table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Medicamento</th>
                    <th>Posología</th>
                    <th>Vía</th>
                    <th>Período</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
    `;

    medicamentos.forEach(function(med) {
        // Determinar el estado basándose en la última administración
        let estadoClass, estadoTexto, fechaAdmin;

        if (med.ultima_administracion_fecha && med.ultima_administracion_hora) {
            // Tiene administraciones registradas
            const horasDesde = parseFloat(med.horas_desde_ultima_admin) || 0;
            estadoClass = 'badge-success';
            estadoTexto = 'Administrado';
            fechaAdmin = `Última: ${med.ultima_administracion_fecha} ${med.ultima_administracion_hora}`;

            // Agregar información de disponibilidad
            if (horasDesde < 6) {
                const horasRestantes = Math.ceil(6 - horasDesde);
                fechaAdmin += `<br><small class="text-warning"><i class="fas fa-clock"></i> Disponible en ${horasRestantes}h</small>`;
            } else {
                fechaAdmin += `<br><small class="text-success"><i class="fas fa-check-circle"></i> Disponible ahora</small>`;
            }
        } else {
            // No tiene administraciones
            estadoClass = 'badge-warning';
            estadoTexto = 'Pendiente';
            fechaAdmin = '<small class="text-muted">Sin administraciones</small>';
        }

        tabla += `
            <tr>
                <td>
                    <strong>${med.producto || 'Medicamento no especificado'}</strong>
                    <br><small class="text-muted">${med.farmaco || ''}</small>
                </td>
                <td>${med.posologia || 'No especificada'}</td>
                <td>${med.via_administracion || 'No especificada'}</td>
                <td>${med.periodo || 'No especificado'}</td>
                <td>
                    <span class="badge ${estadoClass}">${estadoTexto}</span>
                    <br><small class="text-muted">${fechaAdmin}</small>
                </td>
            </tr>
        `;
    });

    tabla += `
            </tbody>
        </table>
    `;

    contenedor.innerHTML = tabla;
}

function mostrarMensajeNoTratamientos() {
    const ctx1 = document.getElementById('chartTratamientosEstado');
    const ctx2 = document.getElementById('chartTratamientosVia');
    const contenedor = document.getElementById('resumenMedicamentos');

    if (ctx1) {
        ctx1.getContext('2d').font = "16px Arial";
        ctx1.getContext('2d').textAlign = "center";
        ctx1.getContext('2d').fillText("No hay tratamientos activos", ctx1.width/2, ctx1.height/2);
    }

    if (ctx2) {
        ctx2.getContext('2d').font = "16px Arial";
        ctx2.getContext('2d').textAlign = "center";
        ctx2.getContext('2d').fillText("No hay tratamientos activos", ctx2.width/2, ctx2.height/2);
    }

    if (contenedor) {
        contenedor.innerHTML = '<p class="text-center text-muted">No hay medicamentos en tratamiento activo.</p>';
    }
}

function escapeHtmlTexto(texto) {
    if (texto === null || texto === undefined) return '';
    return String(texto)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
}

function renderTablaTratamientosEnfermeria() {
    const tbody = $('#tabla_medicamentos_enfermera_medicamentos tbody');
    if (!tbody.length) return;

    let filas = '';

    (datosTratamientos || []).forEach(function(tratamiento) {
        const detalle = (tratamiento && tratamiento.detalle) ? tratamiento.detalle : [];
        detalle.forEach(function(r) {
            const id = r.id || 0;
            const tieneAdministracion = !!(r.ultima_administracion_fecha && r.ultima_administracion_hora);
            const puedeAdministrar = r.puede_administrar !== undefined ? r.puede_administrar : true;
            const horasDesde = r.horas_desde_ultima_admin || 0;

            // ✅ NUEVO: Verificar si está suspendido/finalizado
            const suspendido = r.estado === 0;

            // Badge de fecha-hora
            let badgeFecha = '';
            if (tieneAdministracion) {
                badgeFecha = `<span class="badge badge-success">Última: ${escapeHtmlTexto(r.ultima_administracion_fecha)} ${escapeHtmlTexto(r.ultima_administracion_hora)}</span>`;
                if (horasDesde) {
                    badgeFecha += `<br><small class="text-muted">Hace ${horasDesde} horas</small>`;
                }
            } else {
                badgeFecha = '<span class="text-muted">Sin administraciones</span>';
            }

            // ✅ NUEVO: Badge suspendido en columna fecha
            if (suspendido) {
                badgeFecha += '<br><span class="badge badge-warning">Finalizado</span>';
            }

            // Título botón administrar
            const btnTitle = (!puedeAdministrar && horasDesde < 6)
                ? 'Debe esperar más tiempo antes de administrar nuevamente'
                : 'Administrar medicamento';

            // ✅ NUEVO: Badge suspendido en nombre medicamento
            const badgeSuspendido = suspendido
                ? '<br><span class="badge badge-danger">Suspendido</span>'
                : '';

            // ✅ NUEVO: Clase de fila según estado
            const claseFila = suspendido ? 'table-secondary' : '';

            filas += `
                <tr id="enfermeria_row${id}" class="${claseFila}">
                    <td class="text-wrap hidden" hidden="hidden">${escapeHtmlTexto(r.id_tipo_control || '0')}</td>
                    <td class="text-wrap hidden" hidden="hidden">${escapeHtmlTexto(r.id_producto || '0')}</td>
                    <td class="text-wrap">
                        ${escapeHtmlTexto(r.producto || '')}
                        ${badgeSuspendido}
                    </td>
                    <td class="text-wrap hidden" hidden="hidden">${escapeHtmlTexto(r.farmaco || '')}</td>
                    <td class="text-wrap hidden" hidden="hidden">${escapeHtmlTexto(r.id_presentacion || '0')}</td>
                    <td class="text-wrap">${escapeHtmlTexto(r.presentacion || '')}</td>
                    <td class="text-wrap hidden" hidden="hidden">${escapeHtmlTexto(r.id_receta_dosis || '0')}</td>
                    <td class="text-wrap">${escapeHtmlTexto(r.posologia || '')}</td>
                    <td class="text-wrap hidden" hidden="hidden">${escapeHtmlTexto(r.id_via_administracion || '0')}</td>
                    <td class="text-wrap">${escapeHtmlTexto(r.via_administracion || '')}</td>
                    <td class="text-wrap hidden" hidden="hidden">${escapeHtmlTexto(r.id_periodo || '0')}</td>
                    <td class="text-wrap">${escapeHtmlTexto(r.periodo || '')}</td>
                    <td class="text-wrap hidden" hidden="hidden">${escapeHtmlTexto(r.uso_cronico || '0')}</td>
                    <td class="text-wrap hidden" hidden="hidden">${escapeHtmlTexto(r.cantidad || '0')}</td>
                    <td class="text-wrap">${escapeHtmlTexto(r.cantidad_compra || '')}</td>
                    <td class="text-wrap">${escapeHtmlTexto(r.comentario || '-')}</td>
                    <td class="text-wrap">${badgeFecha}</td>
                    <td class="text-wrap" id="enfermeria_row_profesional_${id}">
                        ${escapeHtmlTexto(r.nombre_responsable || '-')}
                    </td>
                    <td class="text-wrap text-center d-flex justify-content-center gap-1">

                        <button type="button"
                            class="btn btn-success btn-sm btn-icon rounded-circle"
                            onclick="administrar_medicamento_enf(${id})"
                            id="btn_administrar_${id}"
                            ${(suspendido || !puedeAdministrar) ? 'disabled' : ''}
                            title="${suspendido ? 'Medicamento suspendido' : btnTitle}">
                            <i class="fas fa-syringe"></i>
                        </button>

                        <button type="button"
                            class="btn btn-info btn-sm btn-icon rounded-circle"
                            onclick="editar_observacion_medicamento_enfermeria(${id});"
                            ${suspendido ? 'disabled' : ''}
                            title="${suspendido ? 'Medicamento suspendido' : 'Editar observaciones'}">
                            <i class="fas fa-comment-dots"></i>
                        </button>

                        <button type="button"
                            class="btn btn-danger btn-sm btn-icon rounded-circle"
                            onclick="finalizar_medicamento_enfermeria(${id});"
                            id="btn_finalizar_${id}"
                            ${suspendido ? 'disabled' : ''}
                            title="${suspendido ? 'Medicamento ya finalizado' : 'Finalizar tratamiento'}">
                            <i class="fas fa-stop-circle"></i>
                        </button>

                    </td>

                </tr>
            `;
        });
    });

    if (!filas) {
        filas = '<tr><td colspan="19" class="text-center text-muted">No hay medicamentos en tratamiento activo.</td></tr>';
    }

    tbody.html(filas);
}


function actualizarTratamientos(onComplete) {
    $.ajax({
        url: "{{ route('fichaAtencion.obtener_tratamientos_activos_enfermeria') }}",
        type: "POST",
        data: {
            _token: CSRF_TOKEN,
            id_paciente: $('#id_paciente_fc').val(),
        },
        success: function(resp) {
            console.log('Tratamientos actualizados:', resp);
            if (resp && resp.status === 'success') {
                datosTratamientos = resp.data || [];
                console.log('Datos de tratamientos:', datosTratamientos);
                inicializarGraficosTratamientos();
                renderTablaTratamientosEnfermeria();
            } else {
                console.warn('No se pudo actualizar tratamientos activos');
                inicializarGraficosTratamientos();
            }
            if (typeof onComplete === 'function') {
                onComplete(resp);
            }
        },
        error: function(xhr) {
            console.error('Error al actualizar tratamientos activos:', xhr);
            inicializarGraficosTratamientos();
            if (typeof onComplete === 'function') {
                onComplete(null);
            }
        }
    });
}

function getDosis_sdi() {
        // Detectar contexto automáticamente: modal oral_cd o ficha dental
        let id_medicamento = '';
        let selectDosis = null;

        // Verificar si estamos en el modal oral_cd
        if($('#id_medicamento_oral_cd').length > 0 && $('#id_medicamento_oral_cd').val()) {
            id_medicamento = $('#id_medicamento_oral_cd').val();
            selectDosis = $('#dosis_oral_cd');
            console.log('Contexto: Modal Oral CD - ID Medicamento:', id_medicamento);
        }
        // Si no, usar los campos de ficha dental
        else if($('#id_medicamento_ficha_dental').length > 0) {
            id_medicamento = $('#id_medicamento_ficha_dental').val();
            selectDosis = $('#dosis_medicamento_ficha_dental');
            console.log('Contexto: Ficha Dental - ID Medicamento:', id_medicamento);
        }

        if(!id_medicamento || !selectDosis) {
            console.warn('No se pudo determinar el ID del medicamento o el select de dosis');
            return;
        }

        let url = "{{ route('dosis.get') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                id_medicamento: id_medicamento,
            },
        })
        .done(function(data) {
            console.log('Dosis recibidas:', data);

            if (data != null) {
                data = JSON.parse(data);

                // Limpiar y poblar el select de dosis según el contexto
                selectDosis.find('option').remove();
                selectDosis.append('<option value="">-- Seleccionar --</option>');

                $(data).each(function(i, v) {
                    selectDosis.append('<option value="' + v.dosis + '" data-id="' + v.id +
                        '" data-cant_comp="' + v.cant_comp + '">' + v.present +
                        '</option>');
                });

                console.log('Se agregaron', data.length, 'opciones de dosis');
            } else {
                console.warn('No se encontraron dosis para este medicamento');
                selectDosis.html('<option value="">-- Sin dosis disponibles --</option>');
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.error('Error al cargar dosis:', jqXHR, ajaxOptions, thrownError);
            if(selectDosis) {
                selectDosis.html('<option value="">-- Error al cargar --</option>');
            }
        });
    };
function indicar_medicamento_sdi(id = null) {
    if (id !== null && id !== undefined) {
        console.log('indicar_medicamento_sdi - id:', id);
    }

        // Detectar si estamos en modal oral_cd o ficha dental
        let isOralCD = $('#medicamento_oral_cd').length > 0 && $('#modal_oral').hasClass('show');

        var nombre_medicamento_ficha_dental, farmaco, id_medicamento, id_tipo_control;
        var id_dosis_medicamento_ficha_dental, dosis_medicamento_ficha_dental;
        var id_frecuencia_medicamento_ficha_dental, frecuencia_medicamento_ficha_dental;
        var id_via_administracion_ficha_dental, via_administracion_ficha_dental;
        var observaciones_medicamento_ficha_dental;
        var periodo_ficha_dental = '', id_periodo_ficha_dental = '0';
        var cantidad_comprar = '', id_cantidad_comprar = '0';

        if (isOralCD) {
            // Datos del modal oral_cd
            console.log('Contexto: Modal Oral CD');
            nombre_medicamento_ficha_dental = $('#medicamento_oral_cd').val();
            farmaco = ''; // No tenemos componente en modal oral_cd
            id_medicamento = $('#id_medicamento_oral_cd').val();
            id_tipo_control = 1; // Tipo control para enfermería

            id_dosis_medicamento_ficha_dental = $('#dosis_oral_cd option:selected').data('id') || $('#dosis_oral_cd').val();
            dosis_medicamento_ficha_dental = $('#dosis_oral_cd option:selected').text();

            id_frecuencia_medicamento_ficha_dental = $('#frecuencia_oral_cd').val();
            frecuencia_medicamento_ficha_dental = $('#frecuencia_oral_cd option:selected').text();

            id_via_administracion_ficha_dental = $('#via_administracion_oral_cd').val();
            via_administracion_ficha_dental = $('#via_administracion_oral_cd option:selected').text();

            id_periodo_ficha_dental = $('#periodo_oral_cd').val();
            periodo_ficha_dental = $('#periodo_oral_cd option:selected').text();

            cantidad_comprar = $('#cantidad_comprar_oral_cd').val();

            observaciones_medicamento_ficha_dental = $('#obs_oral_cd').val();

        } else {
            // Datos de ficha dental (original)
            console.log('Contexto: Ficha Dental');
            nombre_medicamento_ficha_dental = $('#nombre_medicamento_ficha_dental').val();
            farmaco = $('#nombre_composicion_farmaco').html();
            id_medicamento = $('#id_medicamento_ficha_dental').val();
            id_tipo_control = $('#id_medicamento_tipo_control').val();

            id_dosis_medicamento_ficha_dental = $('#dosis_medicamento_ficha_dental').val();
            dosis_medicamento_ficha_dental = $('#dosis_medicamento_ficha_dental option:selected').text();

            id_frecuencia_medicamento_ficha_dental = $('#frecuencia_medicamento_ficha_dental').val();
            frecuencia_medicamento_ficha_dental = $('#frecuencia_medicamento_ficha_dental option:selected').text();

            id_via_administracion_ficha_dental = $('#via_administracion_ficha_dental').val();
            via_administracion_ficha_dental = $('#via_administracion_ficha_dental option:selected').text();

            observaciones_medicamento_ficha_dental = $('#observaciones_medicamento_ficha_dental').val();

        }


        var lista_med = [];
        const tablaLista = isOralCD ? '#tabla_medicamentos_enfermera_medicamentos' : '#tabla_medicamento_cirugia_sdi';
        $(tablaLista + ' tr').each(function(i, n) {
            if (i > 0) {
                var data = $(this).find("td");
                lista_med.push($.trim($(data[1]).text().split("\n").join("")));
            }
        });

        if ($.inArray(id_medicamento, lista_med) == -1) {
            var medicamento_uso_cronico = 0;
            if ($('#medicamento_uso_cronico').is(':checked'))
                medicamento_uso_cronico = 1;

            var valido = 0;
            var mensaje = '';

            if ($.trim(nombre_medicamento_ficha_dental) == '') {
                valido = 1;
                mensaje += 'Debe completar el campo Medicamento.\n';
            }

            if (isOralCD || $('#id_medicamento_ficha_dental').val() != '') {
                if ($.trim(dosis_medicamento_ficha_dental) == '' || dosis_medicamento_ficha_dental == 0 ||
                    dosis_medicamento_ficha_dental == 'Seleccione una opción' || dosis_medicamento_ficha_dental ==
                    'Seleccione' || dosis_medicamento_ficha_dental == 'Seleccione') {
                    valido = 1;
                    mensaje += 'Debe completar el campo Presentación.\n';
                }
                if ($.trim(frecuencia_medicamento_ficha_dental) == '' || frecuencia_medicamento_ficha_dental == 0 ||
                    frecuencia_medicamento_ficha_dental == 'Seleccione una opción' ||
                    frecuencia_medicamento_ficha_dental == 'Seleccione' || frecuencia_medicamento_ficha_dental ==
                    'Seleccione') {
                    valido = 1;
                    mensaje += 'Debe completar el campo Posología.\n';
                }
            }

            if ($.trim(via_administracion_ficha_dental) == '' || via_administracion_ficha_dental == 0 || $.trim(
                    via_administracion_ficha_dental) == 'Seleccione') {
                valido = 1;
                mensaje += 'Debe completar el campo Via de Administración.\n';
            } else if (id_via_administracion_ficha_dental == 11) {
                // Validar "otra vía" dependiendo del contexto
                let otraViaValue = isOralCD ? $('#otra_via_oral_cd').val() : observaciones_medicamento_ficha_dental;
                if ($.trim(otraViaValue) == '') {
                    valido = 1;
                    mensaje += 'Debe ingresar Otra Vía Administración\n';
                } else {
                    via_administracion_ficha_dental = otraViaValue;
                }
            }

            // Validar periodo si estamos en modal oral_cd
            if (isOralCD) {
                if ($.trim(periodo_ficha_dental) == '' || id_periodo_ficha_dental == 0 || $.trim(periodo_ficha_dental) == 'Seleccione') {
                    valido = 1;
                    mensaje += 'Debe completar el campo Periodo.\n';
                } else if (id_periodo_ficha_dental == 11) {
                    let otroPeriodo = $('#otro_periodo_oral_cd').val();
                    if ($.trim(otroPeriodo) == '') {
                        valido = 1;
                        mensaje += 'Debe ingresar Otro Periodo\n';
                    } else {
                        periodo_ficha_dental = otroPeriodo;
                    }
                }

                // Validar cantidad a comprar
                if ($.trim(cantidad_comprar) == '' || cantidad_comprar == 0 || $.trim(cantidad_comprar) == 'Seleccione') {
                    valido = 1;
                    mensaje += 'Debe completar el campo Cantidad a Comprar.\n';
                } else if (cantidad_comprar == '999') {
                    let otraCantidad = $('#otra_cantidad_a_comprar').val();
                    if ($.trim(otraCantidad) == '') {
                        valido = 1;
                        mensaje += 'Debe ingresar Cantidad a Comprar\n';
                    } else {
                        cantidad_comprar = otraCantidad;
                    }
                }
            }

            //  if($.trim(periodo_ficha_dental) == '' || periodo_ficha_dental == 0 || $.trim(periodo_ficha_dental) == 'Seleccione')
            // {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Periodo.\n';
            // }
            // else if($('#periodo_ficha_dental').val() == 11)
            // {
            //     if( $.trim(observaciones_periodo_ficha_dental) == '')
            //     {
            //         valido = 1;
            //         mensaje += 'Debe ingresar Otro Periodo\n';
            //     }
            //     else
            //     {
            //         periodo_ficha_dental = observaciones_periodo_ficha_dental;
            //     }
            // }

            // if($.trim(cantidad_comprar) == '' || cantidad_comprar == 0 || $.trim(cantidad_comprar) == 'Seleccione')
            // {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Cantidad a Comprar.\n';
            // }
            // else if($('#cantidad_comprar').val() == '999')
            // {
            //     if( $.trim(otra_cantidad_a_comprar) == '')
            //     {
            //         valido = 1;
            //         mensaje += 'Debe ingresar Cantidad a Comprar\n';
            //     }
            //     else
            //     {
            //         cantidad_comprar = otra_cantidad_a_comprar;
            //     }
            // }

            if (valido == 0) {
                $('.medicamentos_sin_registros').remove()

                var parametros = {
                    "id_tipo_control": id_tipo_control,
                    "id_medicamento": id_medicamento,
                    "nombre_medicamento_ficha_dental": nombre_medicamento_ficha_dental,
                    "farmaco": farmaco,
                    "id_dosis_medicamento_ficha_dental": id_dosis_medicamento_ficha_dental,
                    "dosis_medicamento_ficha_dental": dosis_medicamento_ficha_dental,
                    "id_frecuencia_medicamento_ficha_dental": id_frecuencia_medicamento_ficha_dental,
                    "frecuencia_medicamento_ficha_dental": frecuencia_medicamento_ficha_dental,
                    "id_via_administracion_ficha_dental": id_via_administracion_ficha_dental,
                    "via_administracion_ficha_dental": via_administracion_ficha_dental,
                    "observaciones_medicamento_ficha_dental": observaciones_medicamento_ficha_dental,
                    "medicamento_uso_cronico": medicamento_uso_cronico,
                    "id_periodo_ficha_dental": id_periodo_ficha_dental,
                    "periodo_ficha_dental": periodo_ficha_dental,
                    "cantidad_comprar": cantidad_comprar,
                    "isOralCD": isOralCD
                }

                agregarMedicamentoReceta(parametros, 1);

                // var i = $('#tabla_medicamento_cirugia_sdi tr').length; //contador para asignar id al boton que borrara la fila

                // var fila = '<tr class="tabla_medicamento_cirugia_sdi" id="row' + i + '">' +
                //                 '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_tipo_control + '</td>' +

                //                 '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_medicamento + '</td>' +
                //                 '<td class="text-center align-middle text-wrap">' + nombre_medicamento_ficha_dental + '</td>' +
                //                 '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + farmaco + '</td>' +

                //                 '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_dosis_medicamento_ficha_dental + '</td>' +
                //                 '<td class="text-center align-middle text-wrap">' + dosis_medicamento_ficha_dental + '</td>' +

                //                 '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_frecuencia_medicamento_ficha_dental + '</td>' +
                //                 '<td class="text-center align-middle text-wrap">' + frecuencia_medicamento_ficha_dental + '</td>' +

                //                 '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_via_administracion_ficha_dental + '</td>' +
                //                 '<td class="text-center align-middle text-wrap">' + via_administracion_ficha_dental + '</td>' +

                //                 '<td class="text-center align-middle text-wrap"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_medicamento_sdi(\'row' + i + '\');"><i class="fas fa-trash"></i></div></td>'+
                //             '</tr>';

                // i++;

                // $('#tabla_medicamento_cirugia_sdi tr:first').after(fila);

                /** enviando a table de medicamento faltante */
                //$("#adicionados").append(nFilas - 1);
                //$("#sub_tipo_examen").empty();
                //$("#nro_orden").disabled();

            } else {
                swal({
                    title: "Ingreso de medicamento(s).",
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }
        } else {
            swal({
                title: "Ingreso de medicamento(s).",
                text: 'El medicamento está Recetado',
                icon: "warning",
                // buttons: "Aceptar",
                //SuccessMode: true,
            });
        }
    }

     function agregarMedicamentoReceta(parametros, receta_am) {
        let url = "{{ route('fichaAtencion.guardar_medicamento_enfermeria') }}";
        let id_paciente = $('#id_paciente_fc').val();

        // Detectar si usamos dosis del modal oral_cd o ficha dental
        let selectedOption = parametros.isOralCD ? $('#dosis_oral_cd option:selected') : $('#dosis_medicamento_ficha_dental option:selected');
        let dataId = selectedOption.data('id') || parametros.id_dosis_medicamento_ficha_dental;

        var _token = CSRF_TOKEN;

        console.log('Enviando medicamento al backend (Recomendacion/RecomendacionDetalle):', parametros);

        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: _token,
                id_ficha_atencion: $('#id_fc').val(),
                id_tipo_control: parametros.id_tipo_control,
                id_medicamento: parametros.id_medicamento,
                nombre_medicamento: parametros.nombre_medicamento_ficha_dental,
                id_dosis: dataId,
                nombre_dosis: parametros.dosis_medicamento_ficha_dental,
                nombre_frecuencia: parametros.frecuencia_medicamento_ficha_dental,
                id_frecuencia: parametros.id_frecuencia_medicamento_ficha_dental,
                via_administracion: parametros.via_administracion_ficha_dental,
                id_via_administracion: parametros.id_via_administracion_ficha_dental,
                farmaco: parametros.farmaco,
                observaciones: parametros.observaciones_medicamento_ficha_dental,
                uso_cronico: parametros.medicamento_uso_cronico,
                id_paciente: id_paciente,
                id_profesional: $('#id_profesional_fc').val(),
                id_responsable: $('#id_profesional_fc').val(),
                id_periodo: parametros.id_periodo_ficha_dental,
                periodo: parametros.periodo_ficha_dental,
                cantidad_comprar: parametros.cantidad_comprar,
                cantidad: parametros.cantidad_comprar,
            },
            success: function(resp) {
                console.log('Respuesta del servidor (Recomendacion/RecomendacionDetalle):', resp);
                let mensaje = resp.status;
                if (mensaje == 'success') {
                    // Actualizar datosTratamientos y repintar tabla/gráficos
                    datosTratamientos = resp.data || [];
                    renderTablaTratamientosEnfermeria();
                    inicializarGraficosTratamientos();

                    // Limpiar tablas legacy (dental)
                    $('#tbody_tabla_medicamento_cirugia_sdi').empty();
                    $('#tbody_tabla_medicamento_manual').empty();
                    $('#tabla_tratamientos_servicio tbody').empty();

                    // Procesar para tablas legacy si existen
                    let medicamentos = resp.data;
                    medicamentos.forEach(tratamiento => {
                        if (!tratamiento.detalle) return;
                        tratamiento.detalle.forEach(medicamento => {
                            console.log('Procesando medicamento legacy:', medicamento);
                            let dosis = medicamento.presentacion || '';
                            let indicaciones = medicamento.posologia || '';

                            // Fila para tabla_medicamento_cirugia_sdi (legacy)
                            let fila = `<tr id="row${medicamento.id}">
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_tipo_control}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_producto}</td>
                                            <td class="text-center align-middle text-wrap">${medicamento.producto}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.farmaco || ''}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_presentacion || ''}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_receta_dosis || ''}</td>
                                            <td class="text-center align-middle text-wrap">${indicaciones}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_via_administracion}</td>
                                            <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                            <td class="text-center align-middle text-wrap"><div name="remove" id="${medicamento.id}" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_medicamento_sdi(${medicamento.id});"><i class="fas fa-trash"></i></div></td>
                                        </tr>`;

                            let fila_ = `<tr id="row${medicamento.id}">
                                            <td class="text-center align-middle text-wrap">${medicamento.created_at || ''}<br> ${medicamento.nombre_responsable || 'Sin responsable'}</td>
                                            <td class="text-center align-middle text-wrap">${medicamento.producto}</td>
                                            <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                        <td><input type="text" disabled></td>
                                        <td class="p-0">
                                            <div class="switch switch-success d-inline">
                                                <input type="checkbox" id="tratamiento_listo${medicamento.id}" disabled>
                                                <label for="tratamiento_listo${medicamento.id}" class="cr"></label>
                                            </div><br>
                                            <label>Pendiente</label>
                                        </td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos">Insumos</button>
                                        </td>
                                        <td> <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarObservaciones" onclick="dame_tratamiento(${medicamento.id})"><i class="fas fa-edit"> </i></button></td>
                                    </tr>`;

                            $('#tbody_tabla_medicamento_cirugia_sdi').append(fila);
                            $('#tbody_tabla_medicamento_manual').append(fila);
                            $('#tabla_tratamientos_servicio tbody').append(fila_);
                        });
                    });

                    swal({
                        title: "Medicamento Agregado",
                        text: "El medicamento se ha guardado correctamente en Recomendacion",
                        icon: "success",
                    });

                    // Si viene del modal oral_cd, cerrar modal y limpiar campos
                    if (parametros.isOralCD) {
                        $('#modal_oral').modal('hide');
                        $('#medicamento_oral_cd').val('');
                        $('#id_medicamento_oral_cd').val('');
                        $('#dosis_oral_cd').val('').html('<option value="">-- Seleccionar --</option>');
                        $('#frecuencia_oral_cd').val('');
                        $('#via_administracion_oral_cd').val('0');
                        $('#periodo_oral_cd').val('0');
                        $('#cantidad_comprar_oral_cd').val('').html('<option value="">-- Seleccionar --</option>');
                        $('#obs_oral_cd').val('');
                    }
                }
            },
            error: function(error) {
                console.error('Error al guardar medicamento:', error);
                swal({
                    title: "Error",
                    text: "No se pudo guardar el medicamento. Por favor, intente nuevamente.",
                    icon: "error",
                });
            }
        })
    }

    // Función para eliminar medicamento de tabla general (tabla_medicamento_cirugia_sdi)
    function eliminar_medicamento_sdi(id) {
        swal({
            title: "¿Está seguro?",
            text: "¿Desea eliminar este medicamento?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ route('detalle_receta.eliminar_registro_receta') }}",
                    type: "POST",
                    data: {
                        _token: CSRF_TOKEN,
                        id: id
                    },
                    success: function(resp) {
                        if (resp.status == 'success') {
                            $('#row' + id).remove();
                            $('#enfermeria_row' + id).remove();
                            swal("Eliminado", "El medicamento ha sido eliminado correctamente", "success");
                        } else {
                            swal("Error", "No se pudo eliminar el medicamento", "error");
                        }
                    },
                    error: function(error) {
                        console.error('Error al eliminar medicamento:', error);
                        swal("Error", "Ocurrió un error al eliminar el medicamento", "error");
                    }
                });
            }
        });
    }

    // Función para administrar medicamento de enfermería (marcar como administrado)
    function administrar_medicamento_enf(id) {
        swal({
            title: "Administrar Medicamento",
            text: "¿Confirma que ha administrado este medicamento al paciente?",
            icon: "info",
            buttons: {
                cancel: "Cancelar",
                confirm: "Confirmar Administración"
            },
        }).then((willAdminister) => {
            if (willAdminister) {
                $.ajax({
                    url: "{{ url('Ficha_Atencion/administrar_medicamento_enfermeria') }}",
                    type: "POST",
                    data: {
                        _token: CSRF_TOKEN,
                        id: id
                    },
                    success: function(resp) {
                        console.log('Respuesta de administrar medicamento:', resp);
                        if (resp.status == 'success') {
                            swal("Administrado", "El medicamento ha sido registrado como administrado", "success");

                            // Actualizar los tratamientos desde el servidor para obtener el estado actualizado
                            actualizarTratamientos();
                        } else {
                            swal("Error", resp.message || "No se pudo registrar la administración", "error");
                        }
                    },
                    error: function(error) {
                        console.error('Error al administrar medicamento:', error);
                        swal("Error", "Ocurrió un error al registrar la administración", "error");
                    }
                });
            }
        });
    }

    function ver_historial_administraciones_medicamento(id) {
        const tbody = $('#tbody_historial_administraciones_medicamento');
        tbody.html('<tr><td colspan="4" class="text-center text-muted">Cargando historial...</td></tr>');
        $('#modal_historial_administraciones_medicamento').modal('show');

        $.ajax({
            url: "{{ route('fichaAtencion.historial_administraciones_medicamento_enfermeria') }}",
            type: "POST",
            data: {
                _token: CSRF_TOKEN,
                id: id,
            },
            success: function(resp) {
                console.log('Historial de administraciones recibido:', resp);
                if (!resp || resp.status !== 'success') {
                    tbody.html('<tr><td colspan="4" class="text-center text-danger">No fue posible cargar el historial.</td></tr>');
                    return;
                }

                const registros = resp.data || [];
                if (registros.length === 0) {
                    tbody.html('<tr><td colspan="4" class="text-center text-muted">Este medicamento aun no tiene administraciones registradas.</td></tr>');
                    return;
                }

                let html = '';
                registros.forEach(function(item, index) {
                    html += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.fecha_hora_label || '-'}</td>
                            <td>${item.nombre_enfermera || 'Sin nombre'}</td>
                            <td>${item.observaciones || '-'}</td>
                        </tr>
                    `;
                });
                tbody.html(html);
            },
            error: function() {
                tbody.html('<tr><td colspan="4" class="text-center text-danger">Error al cargar el historial.</td></tr>');
            }
        });
    }

    // Función para editar observaciones de medicamento de enfermería
    function editar_observacion_medicamento_enfermeria(id) {
        swal({
            title: "Editar Observaciones",
            text: "Ingrese las nuevas observaciones:",
            content: "input",
            buttons: {
                cancel: "Cancelar",
                confirm: "Guardar"
            },
        }).then((observacion) => {
            if (observacion !== null) {
                $.ajax({
                    url: "{{ url('Ficha_Atencion/editar_observacion_medicamento_enfermeria') }}",
                    type: "POST",
                    data: {
                        _token: CSRF_TOKEN,
                        id: id,
                        observacion: observacion
                    },
                    success: function(resp) {
                        console.log('Respuesta al editar observación:', resp);
                        if (resp.status == 'success') {
                            // Actualizar la celda de observaciones
                            $('#enfermeria_row' + id + ' td:eq(15)').text(observacion || '-');
                            swal("Actualizado", "Las observaciones han sido actualizadas", "success");
                        } else {
                            swal("Error", "No se pudieron actualizar las observaciones", "error");
                        }
                    },
                    error: function(error) {
                        console.error('Error al editar observación:', error);
                        swal("Error", "Ocurrió un error al actualizar las observaciones", "error");
                    }
                });
            }
        });
    }

    // Función para eliminar medicamento de enfermería
    function eliminar_medicamento_enfermeria(id) {
        swal({
            title: "¿Está seguro?",
            text: "¿Desea eliminar este medicamento de la tabla de enfermería?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ url('Ficha_Atencion/eliminar_medicamento_enfermeria') }}",
                    type: "POST",
                    data: {
                        _token: CSRF_TOKEN,
                        id: id
                    },
                    success: function(resp) {
                        if (resp.status == 'success') {
                            $('#enfermeria_row' + id).remove();
                            swal("Eliminado", "El medicamento ha sido eliminado correctamente", "success");
                        } else {
                            swal("Error", "No se pudo eliminar el medicamento", "error");
                        }
                    },
                    error: function(error) {
                        console.error('Error al eliminar medicamento:', error);
                        swal("Error", "Ocurrió un error al eliminar el medicamento", "error");
                    }
                });
            }
        });
    }

    // Función para finalizar tratamiento de medicamento de enfermería
    function finalizar_medicamento_enfermeria(id) {
        swal({
            title: "Finalizar Tratamiento",
            text: "¿Desea finalizar este tratamiento? Esta acción marcará el medicamento como completado.",
            icon: "warning",
            buttons: {
                cancel: "Cancelar",
                confirm: "Finalizar Tratamiento"
            },
        }).then((willFinalize) => {
            if (willFinalize) {
                $.ajax({
                    url: "{{ url('Ficha_Atencion/finalizar_medicamento_enfermeria') }}",
                    type: "POST",
                    data: {
                        _token: CSRF_TOKEN,
                        id: id
                    },
                    success: function(resp) {
                        console.log('Respuesta al finalizar tratamiento:', resp);
                        if (resp.status == 'success') {
                            // Agregar indicador visual de finalizado
                            $('#enfermeria_row' + id).addClass('table-secondary');
                            $('#enfermeria_row' + id + ' td:eq(16)').append(
                                '<br><span class="badge badge-warning">Finalizado</span>'
                            );

                            // Deshabilitar todos los botones de acción
                            $('#enfermeria_row' + id + ' button').prop('disabled', true).addClass('disabled');

                            swal("Finalizado", "El tratamiento ha sido marcado como finalizado", "success");
                        } else {
                            swal("Error", "No se pudo finalizar el tratamiento", "error");
                        }
                    },
                    error: function(error) {
                        console.error('Error al finalizar tratamiento:', error);
                        swal("Error", "Ocurrió un error al finalizar el tratamiento", "error");
                    }
                });
            }
        });
    }


    // Recoger datos de todas las curaciones antes del submit del formulario
 function recoger_datos_curaciones() {

     // === CURACIÓN PLANA ===
     // Solo recoger si algún campo tiene valor
     var cp_asp = $('#cp_asp').val();
     var cp_me = $('#cp_me').val();
     var cp_pro = $('#cp_pro').val();
     if (cp_asp && cp_asp != '0' || cp_me && cp_me != '0' || cp_pro && cp_pro != '0') {
         var datos_curacion_plana = {
             cp_asp: cp_asp,
             cp_me: cp_me,
             cp_pro: $('#cp_pro').val(),
             cp_ecant: $('#cp_ecant').val(),
             cp_ecal: $('#cp_ecal').val(),
             cp_tn: $('#cp_tn').val(),
             cp_tg: $('#cp_tg').val(),
             cp_ed: $('#cp_ed').val(),
             cp_dol: $('#cp_dol').val(),
             cp_pielc: $('#cp_pielc').val(),
             cp_obs: $('#obs_cp_gral').val(),
             obs_cp_asp: $('#obs_cp_asp-1').val(),
             tpo_les_curgen: $('#tpo_les_curgen').val(),
             obs_cur_plana: $('#obs_cur_plana').val(),
             ptos_tot_ev: $('#ptos_tot_ev').val(),
         };
         $('#curacion_plana_data').val(JSON.stringify(datos_curacion_plana));
     }

     // === CURACIÓN LPP ===
     var upp_local = $('#upp_local_eval').val();
     var upp_gr = $('#upp_gr_eval').val();
     if (upp_local && upp_local != '0') {
         var datos_curacion_lpp = {
             upp_local_eval: upp_local,
             upp_gr_eval: upp_gr,
             upp_diam_eval: $('#upp_diam_eval').val(),
             upp_prof_eval: $('#upp_prof_eval').val(),
             obs_upp_prof_eval: $('#obs_upp_prof_eval').val(),
             upp_Infec_eval: $('#upp_Infec_eval').val(),
             obs_upp_Infec_eval: $('#obs_upp_Infec_eval').val(),
             lpp_patasoc: $('#lpp_patasoc').val(),
             obs_pa_eval_upp: $('#obs_pa_eval_upp').val(),
             obs_val_eval_upp: $('#obs_val_eval_upp').val(),
         };
         $('#curacion_lpp_data').val(JSON.stringify(datos_curacion_lpp));
     }

     // === PIE DIABÉTICO ===
     var aspecto_pie = $('#aspecto_pie_diab').val();
     var mayor_ext = $('#mayor_extension').val();
     if (aspecto_pie && aspecto_pie != '0' || mayor_ext && mayor_ext != '0') {
         var datos_valoracion_pie = {
             aspecto_pie_diab: aspecto_pie,
             mayor_extension: mayor_ext,
             profundidad_curacion: $('#profundidad_curacion').val(),
             exudado_cantidad_curacion: $('#exudado_cantidad_curacion').val(),
             exudado_calidad_curacion: $('#exudado_calidad_curacion').val(),
             tejido_esf: $('#tejido_esf').val(),
             tejido_granu: $('#tejido_granu').val(),
             edema_curacion: $('#edema_curacion').val(),
             dolor_curacion: $('#dolor_curacion').val(),
             piel_circun: $('#piel_circun').val(),
             ptos_tot_ev_diab: $('#ptos_tot_ev_diab').val(),
             obs_orin: $('#obs_orin').val(),
             pat_prop: $('#pat_prop').val(),
             sint_act: $('#sint_act').val(),
             ot_pat_act: $('#ot_pat_act').val(),
         };
         var datos_curacion_pie = {
             cp_cult: $('#cp_cult').val(),
             cp_td: $('#cp_td').val(),
             cp_duch: $('#cp_duch').val(),
             pie_ant: $('#pie_ant').val(),
             tpo_aposc: $('#tpo_aposc').val(),
         };
         $('#curacion_pie_diabetico_data').val(JSON.stringify({
             valoracion: datos_valoracion_pie,
             curacion: datos_curacion_pie,
         }));
     }

     // === QUEMADOS ===
     var qmsupqm = $('#qmsupqm').val();
     var qmdr = $('#qmdr').val();
     if (qmsupqm && qmsupqm != '0' || qmdr && qmdr != '0') {
         var datos_valoracion_quemados = {
             qmsupqm: qmsupqm,
             qmdr: qmdr,
             qm_presinf: $('#qm_presinf').val(),
             qm_tq: $('#qm_tq').val(),
             qm_tc: $('#qm_tc').val(),
             pat_propq: $('#pat_propq').val(),
             med_quem: $('#med_quem').val(),
             obs_ex_orl: $('#obs_ex_orl').val(),
         };
         var datos_curacion_quemados = {
             cp_cult: $('#curac_quem #cp_cult').val(),
             cp_td: $('#curac_quem #cp_td').val(),
             cp_duch: $('#curac_quem #cp_duch').val(),
             ants_qm: $('#ants_qm').val(),
             tpo_aposqm: $('#tpo_aposqm').val(),
             ot_qx_ac: $('#ot_qx_ac').val(),
             ot_qx_apos: $('#ot_qx_apos').val(),
             obs_gen_cur_qx: $('#obs_gen_cur_qx').val(),
         };
         $('#curacion_quemados_data').val(JSON.stringify({
             valoracion: datos_valoracion_quemados,
             curacion: datos_curacion_quemados,
         }));
     }
 }

 function obtener_contexto_curacion() {
        return {
            id_paciente: $('#id_paciente_fc').val(),
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            _token: "{{ csrf_token() }}"
        };
    }

    function leer_valor(scopes, selector) {
        for (var i = 0; i < scopes.length; i++) {
            var $el = $(scopes[i] + ' ' + selector).first();
            if ($el.length) {
                return $el.val();
            }
        }
        var $fallback = $(selector).first();
        return $fallback.length ? $fallback.val() : null;
    }

    function guardar_curacion_ajax(url, payload, titulo, mensajeOk) {
        $.ajax({
            url: url,
            type: 'POST',
            data: payload,
            success: function(resp) {
                if (resp.mensaje == 'OK') {
                    swal({
                        title: titulo,
                        text: mensajeOk,
                        icon: 'success',
                        button: 'Aceptar'
                    }).then(function() {
                        location.reload();
                    });
                    return;
                }

                swal({
                    title: titulo,
                    text: (resp.msj || resp.error || resp.mensaje || 'No se pudo guardar'),
                    icon: 'warning',
                    button: 'Aceptar'
                });
            },
            error: function(xhr) {
                var msg = 'Error al guardar';
                if (xhr && xhr.responseJSON && (xhr.responseJSON.msj || xhr.responseJSON.mensaje)) {
                    msg = xhr.responseJSON.msj || xhr.responseJSON.mensaje;
                }
                swal({
                    title: titulo,
                    text: msg,
                    icon: 'error',
                    button: 'Aceptar'
                });
            }
        });
    }

    function guardar_curacion_plana_servicio() {
        var cp_asp = $('#cp_asp').val();
        var cp_me = $('#cp_me').val();
        var cp_pro = $('#cp_pro').val();
        var cp_ecant = $('#cp_ecant').val();
        var cp_ecal = $('#cp_ecal').val();
        var cp_tn = $('#cp_tn').val();
        var cp_tg = $('#cp_tg').val();
        var cp_ed = $('#cp_ed').val();
        var cp_dol = $('#cp_dol').val();
        var cp_pielc = $('#cp_pielc').val();

        if (cp_asp == 0 || cp_me == 0 || cp_pro == 0 || cp_ecant == 0 || cp_ecal == 0 || cp_tn == 0 || cp_tg == 0 || cp_ed == 0 || cp_dol == 0 || cp_pielc == 0) {
            swal({
                title: 'Curación Plana',
                text: 'Debe ingresar todos los campos',
                icon: 'warning',
                button: 'Aceptar'
            });
            return;
        }

        var data = Object.assign({}, obtener_contexto_curacion(), {
            cp_asp: cp_asp,
            cp_me: cp_me,
            cp_pro: cp_pro,
            cp_ecant: cp_ecant,
            cp_ecal: cp_ecal,
            cp_tn: cp_tn,
            cp_tg: cp_tg,
            cp_ed: cp_ed,
            cp_dol: cp_dol,
            cp_pielc: cp_pielc,
            cp_obs: $('#obs_cp_gral').val(),
            tpo_les_curgen: $('#tpo_les_curgen').val(),
            obs_cur_plana: $('#obs_cur_plana').val(),
            ptos_tot_ev: $('#ptos_tot_ev').val(),
            observaciones: $('#obs_cur_plana').val()
        });

        guardar_curacion_ajax(
            "{{ route('enfermeria.guardar_curacion_plana_servicio') }}",
            data,
            'Curación Plana',
            'La curación plana ha sido guardada correctamente'
        );
    }

    // function guardar_curacion_lpp() {
    //     var patologias = $('#lpp_patasoc').val() || [];
    //     var data = Object.assign({}, obtener_contexto_curacion(), {
    //         upp_local_eval: $('#upp_local_eval').val(),
    //         upp_gr_eval: $('#upp_gr_eval').val(),
    //         upp_diam_eval: $('#upp_diam_eval').val(),
    //         upp_prof_eval: $('#upp_prof_eval').val(),
    //         upp_Infec_eval: $('#upp_Infec_eval').val(),
    //         obs_pa_eval_upp: $('#obs_pa_eval_upp').val(),
    //         patologias: patologias,
    //         cp_cult: leer_valor(['#cur_hda-1', '#cur_lpp-1'], '#cp_cult'),
    //         obs_cp_cult: leer_valor(['#cur_hda-1', '#cur_lpp-1'], '#obs_cp_cult'),
    //         cp_td: leer_valor(['#cur_hda-1', '#cur_lpp-1'], '#cp_td'),
    //         obs_cp_td: leer_valor(['#cur_hda-1', '#cur_lpp-1'], '#obs_cp_td'),
    //         cp_duch: leer_valor(['#cur_hda-1', '#cur_lpp-1'], '#cp_duch'),
    //         obs_cp_duch: leer_valor(['#cur_hda-1', '#cur_lpp-1'], '#obs_cp_duch'),
    //         desinf: leer_valor(['#cur_hda-1', '#cur_lpp-1'], '#desinf'),
    //         tpo_cub: leer_valor(['#cur_hda-1', '#cur_lpp-1'], '#tpo_cub'),
    //         obs_cur: leer_valor(['#cur_hda-1', '#cur_lpp-1'], '#obs_cur')
    //     });

    //     // if (!data.upp_local_eval || data.upp_local_eval === '0') {
    //     //     swal({
    //     //         title: 'Curación LPP',
    //     //         text: 'Debe seleccionar al menos la localización',
    //     //         icon: 'warning',
    //     //         button: 'Aceptar'
    //     //     });
    //     //     return;
    //     // }

    //     guardar_curacion_ajax(
    //         "{{ route('enfermeria.guardar_curacion_lpp_servicio') }}",
    //         data,
    //         'Curación LPP',
    //         'La curación LPP ha sido guardada correctamente'
    //     );
    // }

    // function guardar_curacion_pie_diabetico() {
    //     var data = Object.assign({}, obtener_contexto_curacion(), {
    //         datos_valoracion: {
    //             aspecto_pie_diab: $('#aspecto_pie_diab').val(),
    //             mayor_extension: $('#mayor_extension').val(),
    //             profundidad_curacion: $('#profundidad_curacion').val(),
    //             exudado_cantidad_curacion: $('#exudado_cantidad_curacion').val(),
    //             exudado_calidad_curacion: $('#exudado_calidad_curacion').val(),
    //             tejido_esf: $('#tejido_esf').val(),
    //             tejido_granu: $('#tejido_granu').val(),
    //             edema_curacion: $('#edema_curacion').val(),
    //             dolor_curacion: $('#dolor_curacion').val(),
    //             piel_circun: $('#piel_circun').val(),
    //             ptos_tot_ev_diab: $('#ptos_tot_ev_diab').val(),
    //             obs_orin: $('#obs_orin').val(),
    //             pat_prop: $('#pat_prop').val(),
    //             sint_act: $('#sint_act').val(),
    //             ot_pat_act: $('#ot_pat_act').val()
    //         },
    //         datos_curacion: {
    //             cp_cult: leer_valor(['#curac_pie', '#cur_pd-1'], '#cp_cult'),
    //             cp_td: leer_valor(['#curac_pie', '#cur_pd-1'], '#cp_td'),
    //             cp_duch: leer_valor(['#curac_pie', '#cur_pd-1'], '#cp_duch'),
    //             pie_ant: $('#pie_ant').val(),
    //             tpo_aposc: $('#tpo_aposc').val()
    //         },
    //         observaciones: $('#obs_orin').val()
    //     });

    //     guardar_curacion_ajax(
    //         "{{ route('enfermeria.guardar_curacion_pie_diabetico_servicio') }}",
    //         data,
    //         'Curación Pie Diabético',
    //         'La curación de pie diabético ha sido guardada correctamente'
    //     );
    // }

    // FUNCIÓN COMENTADA - Ahora se usa la versión de curacion_registro.js que actualiza dinámicamente
    // Función para guardar solo la valoración de pie diabético (pestaña Valoración)
    /*
    function guardar_valoracion_pie_diabetico() {
        var data = Object.assign({}, obtener_contexto_curacion(), {
            datos_valoracion: {
                aspecto_pie_diab: $('#aspecto_pie_diab').val(),
                mayor_extension: $('#mayor_extension').val(),
                profundidad_curacion: $('#profundidad_curacion').val(),
                exudado_cantidad_curacion: $('#exudado_cantidad_curacion').val(),
                exudado_calidad_curacion: $('#exudado_calidad_curacion').val(),
                tejido_esf: $('#tejido_esf').val(),
                tejido_granu: $('#tejido_granu').val(),
                edema_curacion: $('#edema_curacion').val(),
                dolor_curacion: $('#dolor_curacion').val(),
                piel_circun: $('#piel_circun').val(),
                ptos_tot_ev_diab: $('#ptos_tot_ev_diab').val(),
                obs_orin: $('#obs_orin').val(),
                pat_prop: $('#pat_prop').val(),
                sint_act: $('#sint_act').val(),
                ot_pat_act: $('#ot_pat_act').val()
            },
            datos_curacion: {},
            observaciones: $('#obs_orin').val()
        });

        guardar_curacion_ajax(
            "{{ route('enfermeria.guardar_curacion_pie_diabetico_servicio') }}",
            data,
            'Valoración Pie Diabético',
            'La valoración de pie diabético ha sido guardada correctamente'
        );
    }
    */

    function verDetalleCuracion (id){
        $('#modal_detalle_curacion .modal-body').html('<p class="text-center">Cargando detalle...</p>');
        $('#modal_detalle_curacion').modal('show');

        $.ajax({
            url: "{{ route('enfermeria.dame_curacion') }}",
            type: "get",
            data: {
                _token: CSRF_TOKEN,
                id: id
            },
            success: function(resp) {

                console.log('Detalle de curación recibido:', resp);

                if (resp.mensaje == 'OK') {

                    let data = resp.data || {};

                    const fila = (titulo, valor) => `
                        <tr>
                            <td width="35%">
                                <strong>${titulo}</strong>
                            </td>
                            <td>${valor ?? 'N/A'}</td>
                        </tr>
                    `;

                    // Traducir nombre tipo
                    let tipoTexto = {
                        plana:'Curación Plana',
                        pie_diabetico:'Pie Diabético',
                        quemados:'Quemadura',
                        lpp:'LPP'
                    };

                    // Traducciones amigables de campos
                    const labels = {

                        //LPP valoración
                        upp_local_eval:'Localización',
                        upp_gr_eval:'Grado',
                        upp_diam_eval:'Diámetro',
                        upp_prof_eval:'Profundidad',
                        upp_Infec_eval:'Infección',
                        upp_exud_eval:'Exudado',
                        upp_tej_nec_eval:'Tejido necrótico',
                        upp_tej_gra_eval:'Tejido granulatorio',
                        upp_epitel_eval:'Epitelización',
                        lpp_patasoc:'Patologías asociadas',
                        lpp_obs:'Observaciones',
                        lpp_puntaje_total:'Puntaje total',

                        //LPP curación
                        lpp_cultivo:'Cultivo',
                        lpp_td:'Tipo de debridamiento',
                        lpp_ducha:'Duchoterapia',
                        lpp_lavado:'Lavado',
                        lpp_secado:'Secado',
                        lpp_cobertura:'Cobertura',
                        lpp_fijacion:'Fijación'
                    };

                    let html = `

                    <div class="mb-3">

                        <span class="badge badge-${data.color || 'info'}">

                            <i class="${data.icono || 'fas fa-band-aid'} mr-1"></i>

                            ${tipoTexto[data.tipo_curacion] || 'Procedimiento'}

                        </span>

                        <span class="badge badge-secondary ml-2">

                            ${data.etapa || 'N/A'}

                        </span>

                    </div>

                    <table class="table table-bordered table-sm">

                        <tbody>

                            ${fila(
                                'Fecha',
                                `${data.fecha || '-'} ${data.hora || ''}`
                            )}

                            ${fila(
                                'Responsable',
                                data.responsable || '-'
                            )}

                            ${fila(
                                'Detalle',
                                data.detalle || '-'
                            )}

                            ${fila(
                                'Observaciones',
                                data.observaciones || '-'
                            )}

                        </tbody>

                    </table>

                    `;


                    //====================
                    // VALORACIÓN
                    //====================

                    if(data.etapa=='valoracion'){

                        html += `
                        <h6 class="mt-3 text-primary">

                            Datos de Valoración

                        </h6>

                        <table class="table table-bordered table-sm">

                            <tbody>
                        `;

                        Object.entries(
                            data.datos_valoracion || {}
                        ).forEach(([key,val])=>{

                            html += fila(
                                labels[key] || key,
                                val || 'N/A'
                            );

                        });

                        html += `
                            </tbody>
                        </table>
                        `;
                    }


                    //====================
                    // CURACIÓN
                    //====================

                    if(data.etapa=='curacion'){

                        html += `
                        <h6 class="mt-3 text-success">

                            Datos de Curación

                        </h6>

                        <table class="table table-bordered table-sm">

                            <tbody>
                        `;

                        Object.entries(
                            data.datos_curacion || {}
                        ).forEach(([key,val])=>{

                            // Ignorar observaciones auxiliares
                            if(key.startsWith('obs_')){
                                return;
                            }

                            html += fila(
                                labels[key] || key,
                                val || 'N/A'
                            );

                        });

                        html += `
                            </tbody>
                        </table>
                        `;
                    }

                    $('#modal_detalle_curacion .modal-body')
                        .html(html);

                } else {

                    $('#modal_detalle_curacion .modal-body')
                    .html(`
                        <p class="text-center text-danger">
                            No se pudo cargar el detalle
                        </p>
                    `);

                }

            },
            error: function() {
                $('#modal_detalle_curacion .modal-body').html('<p class="text-center text-danger">Error al cargar el detalle de la curación.</p>');
            }
        });
    }


(function() {

    // =============================================
    // TABLAS DE PUNTAJE PUSH
    // =============================================
    const PUNTAJE_DIAMETRO = {
        "Seleccione"        : 0,
        "Menor de 1 cm."    : 1,
        "Entre 1 y 2 cms."  : 2,
        "Entre 2 y 3 cms."  : 3,
        "Entre 3 y 4 cms."  : 4,
        "Entre 5 y 6 cms."  : 5,
        "Entre 7 y 8 cms."  : 6,
        "Entre 9 y 10 cms." : 7,
        "Entre 11 y 12 cms.": 8,
        "Entre 12 y 15 cms.": 9,
        "Mayor de 15 cms..": 10
    };

    const PUNTAJE_PROFUNDIDAD = {
        "0"          : 0,
        "Epidermis"  : 1,
        "Dermis"     : 2,
        "Hipodermis" : 3,
        "Otros"      : 4
    };

    const PUNTAJE_GRADO = {
        "G-0": 0,
        "G-1": 1,
        "G-2": 2,
        "G-3": 3,
        "G-4": 4,
        "G-5": 5
    };

    // =============================================
    // CLASIFICACIÓN POR PUNTAJE
    // =============================================
    function obtenerClasificacion(puntaje) {
        if (puntaje === 0) {
            return {
                texto: '✅ Sin UPP',
                color: '#28a745',   // Verde
                nivel: 'sin-upp'
            };
        } else if (puntaje <= 6) {
            return {
                texto: '⚠️ Leve',
                color: '#ffc107',   // Amarillo
                nivel: 'leve'
            };
        } else if (puntaje <= 12) {
            return {
                texto: '🔶 Moderado',
                color: '#fd7e14',   // Naranja
                nivel: 'moderado'
            };
        } else {
            return {
                texto: '🔴 Grave',
                color: '#dc3545',   // Rojo
                nivel: 'grave'
            };
        }
    }

    // =============================================
    // FUNCIÓN PRINCIPAL DE CÁLCULO
    // =============================================
   function calcularPuntajeUPP() {

    // ── Leer valores ────────────────────────────────────────────────
    const ptsGrado       = parseInt(document.getElementById('upp_gr_eval')?.value)        || 0;
    const ptsDiametro    = parseInt(document.getElementById('upp_diam_eval')?.value)       || 0;
    const ptsProfundidad = parseInt(document.getElementById('upp_prof_eval')?.value)       || 0;
    const ptsInfeccion   = parseInt(document.getElementById('upp_infeccion_eval')?.value)  || 0;

    // ── Total ───────────────────────────────────────────────────────
    const total = ptsGrado + ptsDiametro + ptsProfundidad + ptsInfeccion;

    // ── Clasificación ───────────────────────────────────────────────
    let clasificacion;

    if (total === 0) {
        clasificacion = { texto: '✅ Sin UPP',  color: '#28a745', colorTexto: '#fff' };
    } else if (total <= 7) {
        clasificacion = { texto: '⚠️ Leve',     color: '#ffc107', colorTexto: '#000' };
    } else if (total <= 14) {
        clasificacion = { texto: '🔶 Moderado', color: '#fd7e14', colorTexto: '#fff' };
    } else {
        clasificacion = { texto: '🔴 Grave',    color: '#dc3545', colorTexto: '#fff' };
    }

    // ── Actualizar Input Puntaje ────────────────────────────────────
    const inputPuntaje = document.getElementById('upp_puntaje');
    if (inputPuntaje) {
        inputPuntaje.value             = total;
        inputPuntaje.style.color       = clasificacion.color;
        inputPuntaje.style.borderColor = clasificacion.color;
    }

    // ── Actualizar Badge ────────────────────────────────────────────
    const badge = document.getElementById('upp_clasificacion');
    if (badge) {
        badge.textContent            = clasificacion.texto;
        badge.style.backgroundColor = clasificacion.color;
        badge.style.color           = clasificacion.colorTexto;
    }
}

// Calcular al cargar la página
document.addEventListener('DOMContentLoaded', calcularPuntajeUPP);


    // =============================================
    // INICIALIZAR EVENTOS
    // =============================================
    function inicializarEventos() {
        const selectores = [
            'upp_diam_eval',
            'upp_prof_eval',
            'upp_gr_eval'
        ];

        selectores.forEach(function(id) {
            const elemento = document.getElementById(id);
            if (elemento) {
                elemento.addEventListener('change', calcularPuntajeUPP);
            }
        });

        // Calcular al cargar la página
        calcularPuntajeUPP();
    }

    // Esperar a que el DOM esté listo
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', inicializarEventos);
    } else {
        inicializarEventos();
    }

})();


</script>
@endsection


