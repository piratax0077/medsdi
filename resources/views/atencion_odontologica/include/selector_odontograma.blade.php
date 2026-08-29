@php
    $selectorId = $id ?? ('selector_odontograma_'.$counter);
    $selectorInputId = $inputId ?? 'numero_pieza';
    $selectorMultiple = $multiple ?? false;
    $selectorCompacto = $compacto ?? false;
    $selectorSoloPendientes = $soloPendientes ?? false;
    $selectorAutoRefresh = $autoRefresh ?? true;
    $selectorMostrarMensajeVacio = $mostrarMensajeVacio ?? true;
    $selectorMostrarEstadoClinico = $mostrarEstadoClinico ?? false;
    $selectorCuatroFilas = $cuatroFilas ?? false;

    // Misma lectura clínica del odontograma adulto.
    // Mantener este bloque sincronizado con odontograma_adulto.blade.php.
    $normalizarEstadoSelector = static function ($valor) {
        $valor = \Illuminate\Support\Str::ascii(trim((string) $valor));
        return mb_strtolower($valor, 'UTF-8');
    };

    $resolverEstadoVisualSelector = static function ($registro) use ($normalizarEstadoSelector) {
        $estadoRegistro = (int) data_get($registro, 'estado', 0);

        if ($estadoRegistro === 3) {
            return null;
        }

        $tratamiento = $normalizarEstadoSelector(
            data_get($registro, 'tratamiento', data_get($registro, 'descripcion', ''))
        );
        $diagnostico = $normalizarEstadoSelector(
            data_get($registro, 'diagnostico', data_get($registro, 'diagnostico_descripcion', ''))
        );
        $texto = trim($diagnostico . ' ' . $tratamiento);

        $contiene = static function ($agujas) use ($texto) {
            foreach ((array) $agujas as $aguja) {
                if ($aguja !== '' && strpos($texto, $aguja) !== false) {
                    return true;
                }
            }
            return false;
        };

        if ($contiene(['implante', 'implantologia'])) return $estadoRegistro === 0 ? 'ausente' : 'implante';
        if ($contiene(['pulpectomia'])) return 'pulpectomia';
        if ($contiene(['pulpotomia'])) return 'pulpotomia';
        if ($contiene(['endodoncia', 'tratamiento de conducto', 'tratamiento conducto', 'conducto radicular'])) return 'endodoncia';
        if ($contiene(['corona en mal estado', 'corona mal estado', 'corona defectuosa'])) return 'corona_mal_estado';
        if ($contiene(['corona provisoria', 'corona provisional'])) return 'corona_provisoria';
        if ($contiene(['perno munon', 'perno y munon'])) return 'perno_munon';
        if ($contiene(['resto radicular', 'residuo radicular', 'remanente radicular'])) return 'residuo_radicular';
        if ($contiene(['protesis removible'])) return 'protesis_removible';
        if ($contiene(['ribbond'])) return 'ribbond';
        if ($contiene(['extraccion', 'exodoncia'])) return 'extraccion';
        if ($contiene(['impactado', 'incluido'])) return 'impactado';
        if ($contiene(['fractura', 'fracturado'])) return 'fractura';
        if ($contiene(['movilidad'])) return 'movilidad';
        if ($contiene(['abfraccion'])) return 'abfraccion';
        if ($contiene(['abrasion'])) return 'abrasion';
        if ($contiene(['atricion'])) return 'atricion';
        if ($contiene(['erosion'])) return 'erosion';
        if ($contiene(['obturacion'])) return 'obturacion';
        if ($contiene(['ortodoncia', 'ortodontico', 'ortodontica'])) return 'ortodoncia';
        if ($contiene(['sellante', 'sellado de fosas', 'sellado fosas'])) return 'sellante';
        if ($contiene(['surco'])) return 'surco';
        if ($contiene(['fluor', 'fluoracion', 'fluoruracion'])) return 'fluor';
        if ($contiene(['corona'])) return 'corona';
        if ($contiene(['carie'])) return 'carie';
        if ($contiene(['diente ausente', 'pieza ausente', 'ausencia dentaria'])) return 'ausente';
        if ($contiene(['diente sano', 'pieza sana'])) return 'normal';
        if ($contiene(['otro tratamiento', 'otro tto'])) return 'otro_tto';

        return null;
    };

    $selectorEstadosVisuales = [];
    if ($selectorMostrarEstadoClinico) {
        foreach (collect($historialPiezas ?? []) as $registro) {
            if ((int) data_get($registro, 'urgencia', 0) === 1) {
                continue;
            }

            $numeroRegistro = (string) data_get($registro, 'pieza', '');
            if ($numeroRegistro === '') {
                continue;
            }

            $nuevoEstado = $resolverEstadoVisualSelector($registro);
            if ($nuevoEstado !== null) {
                $selectorEstadosVisuales[$numeroRegistro] = $nuevoEstado;
            } elseif (!isset($selectorEstadosVisuales[$numeroRegistro])) {
                $selectorEstadosVisuales[$numeroRegistro] = 'normal';
            }
        }
    }

    /*
     * Estados que no deben quedar disponibles para volver a seleccionar.
     *
     * Convención actual:
     * 0 = Pendiente
     * 1 = Finalizado / Realizado
     * 2 = En proceso
     * 3 = Cancelado o estado terminal configurado por el módulo
     *
     * Se puede sobrescribir desde el include usando:
     * 'estadosBloqueados' => [1, 3]
     */
    $selectorEstadosBloqueados = collect($estadosBloqueados ?? [1, 3])
        ->map(fn ($estado) => (int) $estado)
        ->all();

    $selectorMapa = collect($piezasDisponibles ?? [])
        ->filter(function ($item) use ($selectorEstadosBloqueados) {
            $urgencia = is_object($item)
                ? ($item->urgencia ?? 0)
                : (is_array($item) ? ($item['urgencia'] ?? 0) : 0);
            if ((int) $urgencia === 1) {
                return false;
            }

            $estado = is_object($item)
                ? ($item->estado ?? null)
                : (is_array($item) ? ($item['estado'] ?? null) : null);

            // Si el elemento no trae estado, se conserva porque el backend
            // ya puede haber aplicado el filtro correspondiente.
            if ($estado === null || $estado === '') {
                return true;
            }

            return !in_array((int) $estado, $selectorEstadosBloqueados, true);
        })
        ->mapWithKeys(function ($item) {
            $numero = is_object($item)
                ? ($item->pieza ?? null)
                : (is_array($item) ? ($item['pieza'] ?? null) : $item);

            return $numero === null ? [] : [(string) $numero => $item];
        });
    $selectorIniciales = collect($piezasSeleccionadas ?? [])->map(fn ($pieza) => (string) $pieza)->all();
    $selectorPresupuestadas = collect($piezasPresupuesto ?? [])
        ->filter(fn ($item) => (int) data_get($item, 'urgencia', 0) === 0)
        ->map(fn ($item) => (string) data_get($item, 'pieza', $item))
        ->filter()->unique()->values()->all();
    $selectorFilas = $selectorCuatroFilas ? [
        ['1.8','1.7','1.6','1.5','1.4','1.3','1.2','1.1'],
        ['2.1','2.2','2.3','2.4','2.5','2.6','2.7','2.8'],
        ['4.8','4.7','4.6','4.5','4.4','4.3','4.2','4.1'],
        ['3.1','3.2','3.3','3.4','3.5','3.6','3.7','3.8'],
    ] : [
        ['1.8','1.7','1.6','1.5','1.4','1.3','1.2','1.1','2.1','2.2','2.3','2.4','2.5','2.6','2.7','2.8'],
        ['4.8','4.7','4.6','4.5','4.4','4.3','4.2','4.1','3.1','3.2','3.3','3.4','3.5','3.6','3.7','3.8'],
    ];
@endphp
<div class="selector-odontograma-generico {{ $selectorCompacto ? 'is-compacto' : '' }}" id="{{ $selectorId }}"
    data-input-id="{{ $selectorInputId }}"
    data-multiple="{{ $selectorMultiple ? 1 : 0 }}"
    data-solo-pendientes="{{ $selectorSoloPendientes ? 1 : 0 }}"
    data-auto-refresh="{{ $selectorAutoRefresh ? 1 : 0 }}"
    data-estados-bloqueados='@json($selectorEstadosBloqueados)'
    data-refresh-url="{{ route('profesional.selector_odontograma.piezas') }}">
    <div class="selector-odontograma-generico__titulo">
        <strong>{{ $titulo ?? 'Piezas disponibles' }}</strong>
        <small>{{ $ayuda ?? ($selectorMultiple ? 'Seleccione una o varias piezas' : 'Seleccione una pieza') }}</small>
    </div>
    <div class="selector-odontograma-generico__resumen" aria-live="polite">
        @forelse($selectorIniciales as $pieza)<span class="badge badge-primary">{{ $pieza }}</span>@empty<span class="text-muted">Ninguna pieza seleccionada</span>@endforelse
    </div>
    <div class="selector-odontograma-generico__scroll">
        @foreach($selectorFilas as $fila)
            <div class="selector-odontograma-generico__fila">
                @foreach($fila as $numero)
                    @php
                        $habilitada = $selectorMapa->has($numero);
                        $seleccionada = in_array($numero, $selectorIniciales, true);
                        $presupuestada = in_array($numero, $selectorPresupuestadas, true);
                        $item = $selectorMapa->get($numero);
                        $tratamiento = is_object($item) ? ($item->tratamiento ?? null) : (is_array($item) ? ($item['tratamiento'] ?? null) : null);
                        $estadoPago = is_object($item) ? ($item->color_pago ?? null) : (is_array($item) ? ($item['color_pago'] ?? null) : null);
                        $claseEstadoPago = in_array($estadoPago, ['ok', 'incompleto', 'error'], true) ? 'estado-pago-'.$estadoPago : '';
                        $codigoImagen = str_replace('.', '', $numero);
                        $estadoVisual = $selectorEstadosVisuales[$numero] ?? 'normal';
                        $imagenesPorEstado = [
                            'carie'              => "images/dental/dientes/carie/carie{$codigoImagen}.png",
                            'ausente'            => "images/dental/dientes/diente-ausente/dau{$codigoImagen}.png",
                            'extraccion'         => "images/dental/dientes/extraccion/porhacer/extraccion_{$codigoImagen}.png",
                            'fractura'           => "images/dental/dientes/fractura/fractura_{$codigoImagen}.png",
                            'impactado'          => "images/dental/dientes/impactado/impactado_{$codigoImagen}.png",
                            'endodoncia'         => "images/dental/dientes/endodoncia/endo{$codigoImagen}.png",
                            'pulpotomia'         => "images/dental/dientes/pulpotomia/pulpotomia{$codigoImagen}.png",
                            'pulpectomia'        => "images/dental/dientes/pulpectomia/pulpectomia_{$codigoImagen}.png",
                            'implante'           => "images/dental/dientes/implante/impl{$codigoImagen}.png",
                            'movilidad'          => "images/dental/dientes/movilidad/movilidad_{$codigoImagen}.png",
                            'perno_munon'        => "images/dental/dientes/perno-munon/hecho/perno_munon_{$codigoImagen}.png",
                            'corona'             => "images/dental/dientes/corona/hecho/corona_{$codigoImagen}.png",
                            'corona_provisoria'  => "images/dental/dientes/corona-provisoria/hecho/cp_hecho_{$codigoImagen}.png",
                            'corona_mal_estado'  => "images/dental/dientes/corona_mal_estado/c_malestado{$codigoImagen}.png",
                            'protesis_removible' => "images/dental/dientes/protesis-removible/p_removible{$codigoImagen}.png",
                            'residuo_radicular'  => "images/dental/dientes/residuo-radicular/hecho/rr_{$codigoImagen}.png",
                            'ribbond'            => "images/dental/dientes/ribbond/hecho/ribbond_{$codigoImagen}.png",
                            'sellante'           => "images/dental/dientes/sellante/sellante_{$codigoImagen}.png",
                            'surco'              => "images/dental/dientes/surco/surco_{$codigoImagen}.png",
                            'atricion'           => "images/dental/dientes/atricion/atricion{$codigoImagen}.png",
                            'abrasion'           => "images/dental/dientes/abrasion/abrasion{$codigoImagen}.png",
                            'abfraccion'         => "images/dental/dientes/abfraccion/abfraccion{$codigoImagen}.png",
                            'erosion'            => "images/dental/dientes/erosion/erosion{$codigoImagen}.png",
                            'obturacion'         => "images/dental/dientes/obturacion/obturacion{$codigoImagen}.png",
                            'ortodoncia'         => "images/dental/dientes/ortodoncia/ortodoncia{$codigoImagen}.png",
                            'fluor'              => "images/dental/dientes/fluor/fluor{$codigoImagen}.png",
                            'otro_tto'           => "images/dental/dientes/otro-tto/otro-tto{$codigoImagen}.png",
                        ];
                        $imagenPieza = $imagenesPorEstado[$estadoVisual]
                            ?? "images/dental/dientes/d{$codigoImagen}.png";
                    @endphp
                    <button type="button"
                        class="selector-odontograma-generico__pieza {{ $habilitada ? 'is-enabled' : '' }} {{ $presupuestada ? 'is-in-budget' : '' }} {{ $seleccionada ? 'is-selected' : '' }} {{ $claseEstadoPago }}"
                        data-selector-pieza="{{ $numero }}" aria-pressed="{{ $seleccionada ? 'true' : 'false' }}"
                        title="{{ $habilitada ? ($tratamiento ?: 'Pieza disponible') : 'Pieza no disponible' }}"
                        {{ $habilitada ? '' : 'disabled' }}>
                        <img src="{{ asset($imagenPieza) }}" alt="Pieza {{ $numero }}"
                            data-estado-clinico="{{ $estadoVisual }}">
                        <span>{{ $numero }}</span>
                    </button>
                @endforeach
            </div>
        @endforeach
    </div>
    @if($selectorMostrarMensajeVacio)
        <small
            class="text-warning d-block mt-2 selector-odontograma-generico__mensaje-vacio"
            style="{{ $selectorMapa->isEmpty() ? '' : 'display:none;' }}"
        >
            No existen piezas disponibles para esta sección.
        </small>
    @endif
</div>
<style>
    #{{ $selectorId }} .selector-odontograma-generico__titulo{display:flex;justify-content:space-between;gap:.75rem;margin-bottom:.4rem;color:#174ea6}#{{ $selectorId }} .selector-odontograma-generico__titulo small{color:#748397}#{{ $selectorId }} .selector-odontograma-generico__resumen{min-height:36px;padding:.4rem .55rem;margin-bottom:.55rem;border:1px solid #d7e1ec;border-radius:.5rem}#{{ $selectorId }} .badge{margin-right:.3rem}#{{ $selectorId }} .selector-odontograma-generico__scroll{overflow-x:auto;padding:.45rem;border:1px solid #dce5ef;border-radius:.65rem;background:#f7f9fc}#{{ $selectorId }} .selector-odontograma-generico__fila{display:grid;grid-template-columns:repeat({{ $selectorCuatroFilas ? 8 : 16 }},minmax(42px,1fr));gap:.25rem;min-width:{{ $selectorCuatroFilas ? 360 : 740 }}px}#{{ $selectorId }} .selector-odontograma-generico__fila+ .selector-odontograma-generico__fila{margin-top:.65rem}#{{ $selectorId }} .selector-odontograma-generico__pieza{min-height:67px;padding:.2rem;border:1px solid #ccd7e3;border-radius:.5rem;background:#edf1f5;color:#8793a1;opacity:.45}#{{ $selectorId }} .selector-odontograma-generico__pieza img{display:block;width:27px;height:36px;object-fit:contain;margin:auto;filter:grayscale(1)}#{{ $selectorId }} .selector-odontograma-generico__pieza.is-enabled{border-color:#73a5ff;background:#dbeafe;color:#174ea6;cursor:pointer;opacity:1}#{{ $selectorId }} .selector-odontograma-generico__pieza.is-enabled img{filter:none}#{{ $selectorId }} .selector-odontograma-generico__pieza.is-selected{border-color:#7434a4;background:#a460d1;color:#fff;box-shadow:0 0 0 2px rgba(116,52,164,.14)}#{{ $selectorId }}.is-compacto .selector-odontograma-generico__pieza{min-height:58px}#{{ $selectorId }}.is-compacto .selector-odontograma-generico__pieza img{height:29px}
</style>
<style>
    #{{ $selectorId }} .selector-odontograma-generico__pieza.is-in-budget{border-color:#22a06b;background:#dff5e8;color:#147a4b;box-shadow:inset 0 -5px 0 #22a06b,0 0 0 2px rgba(34,160,107,.16);opacity:1}
    #{{ $selectorId }} .selector-odontograma-generico__pieza.is-in-budget img{filter:none}
    #{{ $selectorId }} .selector-odontograma-generico__pieza.is-in-budget.is-selected{box-shadow:inset 0 -5px 0 #22a06b,0 0 0 2px rgba(116,52,164,.18)}
</style>
<script>
if (typeof window.actualizarEstadosClinicosSelectorOdontograma !== 'function') {
    window.actualizarEstadosClinicosSelectorOdontograma = function ($selector, registros) {
        if (!$selector || !$selector.length) return;

        const base = @json(asset('images/dental/dientes'));
        const estados = {};

        // Conservar primero el estado renderizado desde el historial completo.
        $selector.find('[data-selector-pieza]').each(function () {
            const pieza = String($(this).data('selector-pieza'));
            estados[pieza] = String($(this).find('img').attr('data-estado-clinico') || 'normal');
        });

        // Incorporar los cambios devueltos por la operacion actual sin borrar
        // condiciones registradas en otras especialidades odontologicas.
        (Array.isArray(registros) ? registros : []).forEach(function (registro) {
            if (!registro || Number(registro.urgencia) === 1) return;

            const pieza = String(registro.pieza || '');
            if (!pieza) return;

            // Estado 3 = cancelado: no debe alterar la imagen clínica vigente.
            if (Number(registro.estado) === 3) return;

            const normalizar = (valor) => String(valor || '')
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .toLowerCase()
                .trim();

            const tratamiento = normalizar(registro.tratamiento || registro.descripcion || '');
            const diagnostico = normalizar(registro.diagnostico || registro.diagnostico_descripcion || '');
            const texto = (diagnostico + ' ' + tratamiento).trim();
            const contiene = (...terminos) => terminos.some(termino => texto.indexOf(termino) !== -1);

            let nuevoEstado = null;

            if (contiene('implante', 'implantologia')) {
                nuevoEstado = Number(registro.estado) === 0 ? 'ausente' : 'implante';
            } else if (contiene('pulpectomia')) {
                nuevoEstado = 'pulpectomia';
            } else if (contiene('pulpotomia')) {
                nuevoEstado = 'pulpotomia';
            } else if (contiene('endodoncia', 'tratamiento de conducto', 'tratamiento conducto', 'conducto radicular')) {
                nuevoEstado = 'endodoncia';
            } else if (contiene('corona en mal estado', 'corona mal estado', 'corona defectuosa')) {
                nuevoEstado = 'corona_mal_estado';
            } else if (contiene('corona provisoria', 'corona provisional')) {
                nuevoEstado = 'corona_provisoria';
            } else if (contiene('perno munon', 'perno y munon')) {
                nuevoEstado = 'perno_munon';
            } else if (contiene('resto radicular', 'residuo radicular', 'remanente radicular')) {
                nuevoEstado = 'residuo_radicular';
            } else if (contiene('protesis removible')) {
                nuevoEstado = 'protesis_removible';
            } else if (contiene('ribbond')) {
                nuevoEstado = 'ribbond';
            } else if (contiene('extraccion', 'exodoncia')) {
                nuevoEstado = 'extraccion';
            } else if (contiene('impactado', 'incluido')) {
                nuevoEstado = 'impactado';
            } else if (contiene('fractura', 'fracturado')) {
                nuevoEstado = 'fractura';
            } else if (contiene('movilidad')) {
                nuevoEstado = 'movilidad';
            } else if (contiene('abfraccion')) {
                nuevoEstado = 'abfraccion';
            } else if (contiene('abrasion')) {
                nuevoEstado = 'abrasion';
            } else if (contiene('atricion')) {
                nuevoEstado = 'atricion';
            } else if (contiene('erosion')) {
                nuevoEstado = 'erosion';
            } else if (contiene('obturacion')) {
                nuevoEstado = 'obturacion';
            } else if (contiene('ortodoncia', 'ortodontico', 'ortodontica')) {
                nuevoEstado = 'ortodoncia';
            } else if (contiene('sellante', 'sellado de fosas', 'sellado fosas')) {
                nuevoEstado = 'sellante';
            } else if (contiene('surco')) {
                nuevoEstado = 'surco';
            } else if (contiene('fluor', 'fluoracion', 'fluoruracion')) {
                nuevoEstado = 'fluor';
            } else if (contiene('corona')) {
                nuevoEstado = 'corona';
            } else if (contiene('carie')) {
                nuevoEstado = 'carie';
            } else if (contiene('diente ausente', 'pieza ausente', 'ausencia dentaria')) {
                nuevoEstado = 'ausente';
            } else if (contiene('diente sano', 'pieza sana')) {
                nuevoEstado = 'normal';
            } else if (contiene('otro tratamiento', 'otro tto')) {
                nuevoEstado = 'otro_tto';
            }

            if (nuevoEstado !== null) {
                estados[pieza] = nuevoEstado;
            }
        });

        $selector.find('[data-selector-pieza]').each(function () {
            const $boton = $(this);
            const pieza = String($boton.data('selector-pieza'));
            const codigo = pieza.replace('.', '');
            const estado = estados[pieza] || 'normal';
            const rutas = {
                carie: base + '/carie/carie' + codigo + '.png',
                ausente: base + '/diente-ausente/dau' + codigo + '.png',
                extraccion: base + '/extraccion/porhacer/extraccion_' + codigo + '.png',
                fractura: base + '/fractura/fractura_' + codigo + '.png',
                impactado: base + '/impactado/impactado_' + codigo + '.png',
                endodoncia: base + '/endodoncia/endo' + codigo + '.png',
                pulpotomia: base + '/pulpotomia/pulpotomia' + codigo + '.png',
                pulpectomia: base + '/pulpectomia/pulpectomia_' + codigo + '.png',
                implante: base + '/implante/impl' + codigo + '.png',
                movilidad: base + '/movilidad/movilidad_' + codigo + '.png',
                perno_munon: base + '/perno-munon/hecho/perno_munon_' + codigo + '.png',
                corona: base + '/corona/hecho/corona_' + codigo + '.png',
                corona_provisoria: base + '/corona-provisoria/hecho/cp_hecho_' + codigo + '.png',
                corona_mal_estado: base + '/corona_mal_estado/c_malestado' + codigo + '.png',
                protesis_removible: base + '/protesis-removible/p_removible' + codigo + '.png',
                residuo_radicular: base + '/residuo-radicular/hecho/rr_' + codigo + '.png',
                ribbond: base + '/ribbond/hecho/ribbond_' + codigo + '.png',
                sellante: base + '/sellante/sellante_' + codigo + '.png',
                surco: base + '/surco/surco_' + codigo + '.png',
                atricion: base + '/atricion/atricion' + codigo + '.png',
                abrasion: base + '/abrasion/abrasion' + codigo + '.png',
                abfraccion: base + '/abfraccion/abfraccion' + codigo + '.png',
                erosion: base + '/erosion/erosion' + codigo + '.png',
                obturacion: base + '/obturacion/obturacion' + codigo + '.png',
                ortodoncia: base + '/ortodoncia/ortodoncia' + codigo + '.png',
                fluor: base + '/fluor/fluor' + codigo + '.png',
                otro_tto: base + '/otro-tto/otro-tto' + codigo + '.png',
                normal: base + '/d' + codigo + '.png'
            };

            $boton.find('img')
                .attr('src', rutas[estado] || rutas.normal)
                .attr('data-estado-clinico', estado);
        });
    };
}

(function(){
    const rootSelector=@json('#'.$selectorId), inputSelector=@json('#'.$selectorInputId), multiple=@json($selectorMultiple);
    const $root=$(rootSelector);
    $root.on('click','.selector-odontograma-generico__pieza.is-enabled',function(){
        const $button=$(this);
        if(!multiple){$root.find('.is-selected').not($button).removeClass('is-selected').attr('aria-pressed','false');}
        $button.toggleClass('is-selected').attr('aria-pressed',$button.hasClass('is-selected')?'true':'false');
        const values=$root.find('.is-selected').map(function(){return String($(this).data('selector-pieza'));}).get();
        $(inputSelector).val(multiple?values:(values[0]||'0')).trigger('change');
        $root.find('.selector-odontograma-generico__resumen').html(values.length?values.map(value=>`<span class="badge badge-primary">${value}</span>`).join(''):'<span class="text-muted">Ninguna pieza seleccionada</span>');
        $root.trigger('odontograma:change',[values]);
    });

    if(typeof window.refrescarSelectoresOdontograma !== 'function'){
        window.refrescarSelectoresOdontograma=function(){
            $('.selector-odontograma-generico').each(function(){
                const $selector=$(this), inputId=$selector.data('input-id');
                if(Number($selector.data('auto-refresh'))!==1){return;}
                $.ajax({
                    url:$selector.data('refresh-url'), type:'POST',
                    data:{
                        id_paciente:$('#id_paciente_fc').val()||$('#id_paciente').val(),
                        id_ficha_atencion:$('#id_fc').val(),
                        id_presupuesto:$('#id_presupuesto').val(),
                        solo_pendientes:Number($selector.data('solo-pendientes'))===1?1:0,
                        _token:$('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(resp){
                        let estadosBloqueados=$selector.data('estados-bloqueados')||[1,3];

                        if(typeof estadosBloqueados==='string'){
                            try{
                                estadosBloqueados=JSON.parse(estadosBloqueados);
                            }catch(e){
                                estadosBloqueados=[1,3];
                            }
                        }

                        estadosBloqueados=(Array.isArray(estadosBloqueados)?estadosBloqueados:[1,3])
                            .map(estado=>Number(estado));

                        const piezasDisponibles=(resp.piezas||[]).filter(function(item){
                            if(!item || item.pieza===undefined || item.pieza===null){
                                return false;
                            }

                            // Si el backend no devuelve estado, se entiende que
                            // ya aplicó el filtro y la pieza puede mostrarse.
                            if(item.estado===undefined || item.estado===null || item.estado===''){
                                return true;
                            }

                            return !estadosBloqueados.includes(Number(item.estado));
                        });

                        const disponibles=new Set(
                            piezasDisponibles.map(item=>String(item.pieza))
                        );

                        const hayPiezasDisponibles=disponibles.size>0;

                        $selector
                            .find('.selector-odontograma-generico__mensaje-vacio')
                            .toggle(!hayPiezasDisponibles);

                        $selector
                            .closest('.form-group')
                            .find('.mensaje-presupuesto-sin-piezas')
                            .toggle(!hayPiezasDisponibles);

                        $selector.find('[data-selector-pieza]').each(function(){
                            const $pieza=$(this);
                            const habilitada=disponibles.has(
                                String($pieza.data('selector-pieza'))
                            );

                            $pieza
                                .prop('disabled',!habilitada)
                                .toggleClass('is-enabled',habilitada);

                            if(!habilitada){
                                $pieza
                                    .removeClass('is-selected')
                                    .attr('aria-pressed','false');
                            }
                        });

                        const seleccionadas=$selector.find('.is-selected')
                            .map(function(){
                                return String($(this).data('selector-pieza'));
                            })
                            .get();

                        const multiple=Number($selector.data('multiple'))===1;

                        $('#'+inputId)
                            .val(multiple?seleccionadas:(seleccionadas[0]||'0'))
                            .trigger('change');

                        $selector.find('.selector-odontograma-generico__resumen').html(
                            seleccionadas.length
                                ? seleccionadas.map(value=>`<span class="badge badge-primary">${value}</span>`).join('')
                                : '<span class="text-muted">Ninguna pieza seleccionada</span>'
                        );
                    },
                    error:function(xhr){
                        console.error('No fue posible refrescar las piezas disponibles.',xhr);
                    }
                });
            });
        };
        $(document).on('odontograma:refresh',window.refrescarSelectoresOdontograma);
    }
    @if($selectorAutoRefresh)
    setTimeout(function(){ window.refrescarSelectoresOdontograma(); },0);
    @endif
})();
</script>
