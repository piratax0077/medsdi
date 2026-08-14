@php
    $selectorPedId = $id ?? 'selector_odontograma_pediatrico';
    $selectorPedModo = $modo ?? 'planificacion';
    $selectorPedMultiple = $multiple ?? ($selectorPedModo === 'planificacion');
    $selectorPedInput = $inputId ?? null;
    $selectorPedRequiereDiagnostico = $requiereDiagnostico ?? false;
    $selectorPedDisponibles = isset($piezasDisponibles)
        ? collect($piezasDisponibles)->map(function ($item) {
            return (string) data_get($item, 'pieza', $item);
        })->all()
        : null;
    $selectorPedPresupuestadas = collect($piezasPresupuesto ?? [])->map(function ($item) {
        return (string) data_get($item, 'pieza', $item);
    })->unique()->values()->all();
    $selectorPedDiagnosticosIniciales = collect($diagnosticosIniciales ?? [])->mapWithKeys(function ($item) {
        $pieza = (string) data_get($item, 'pieza', '');
        return $pieza === '' ? [] : [$pieza => [
            'id' => data_get($item, 'diagnostico_id', data_get($item, 'diagnostico_plan', data_get($item, 'diagnostico'))),
            'diagnostico' => data_get($item, 'diagnostico_descripcion', data_get($item, 'diagnostico')),
        ]];
    });
    $selectorPedDiagnosticosInicialesJson = $selectorPedDiagnosticosIniciales
        ->map(function ($item, $pieza) {
            return [
                'pieza' => (string) $pieza,
                'id' => data_get($item, 'id'),
                'diagnostico' => data_get($item, 'diagnostico'),
            ];
        })
        ->values()
        ->toJson();
    $selectorPedPiezas = [
        ['5.5', '5.4', '5.3', '5.2', '5.1', '6.1', '6.2', '6.3', '6.4', '6.5'],
        ['8.5', '8.4', '8.3', '8.2', '8.1', '7.1', '7.2', '7.3', '7.4', '7.5'],
    ];
@endphp

<div class="selector-odontograma-pediatrico" id="{{ $selectorPedId }}"
    data-modo="{{ $selectorPedModo }}" data-multiple="{{ $selectorPedMultiple ? 1 : 0 }}"
    data-input-id="{{ $selectorPedInput }}" data-requiere-diagnostico="{{ $selectorPedRequiereDiagnostico ? 1 : 0 }}">
    <div class="selector-odontograma-pediatrico__encabezado">
        <div>
            <h6>{{ $titulo ?? 'Odontograma pedi&aacute;trico' }}</h6>
            <small>{{ $ayuda ?? 'Seleccione una o varias piezas temporales.' }}</small>
        </div>
        <span class="badge badge-light-primary">Dentici&oacute;n temporal</span>
    </div>

    <div class="selector-odontograma-pediatrico__contenido">
        <div class="selector-odontograma-pediatrico__piezas" role="group" aria-label="Piezas dentales temporales">
            @foreach ($selectorPedPiezas as $fila)
                <div class="selector-odontograma-pediatrico__fila">
                    @foreach ($fila as $pieza)
                        @php
                            $codigoPieza = str_replace('.', '', $pieza);
                            $piezaDisponible = $selectorPedDisponibles === null || in_array($pieza, $selectorPedDisponibles, true);
                            $diagnosticoInicial = $selectorPedDiagnosticosIniciales->get($pieza);
                            $piezaBloqueada = !$piezaDisponible || ($selectorPedRequiereDiagnostico && !$diagnosticoInicial);
                            $piezaPresupuestada = in_array($pieza, $selectorPedPresupuestadas, true);
                        @endphp
                        <button type="button"
                            class="selector-odontograma-pediatrico__pieza {{ $piezaBloqueada ? 'is-locked' : '' }} {{ $diagnosticoInicial ? 'has-diagnosis' : '' }} {{ $piezaPresupuestada ? 'is-in-budget' : '' }}"
                            data-pieza-pediatrica="{{ $pieza }}" data-selector-pieza="{{ $pieza }}" aria-pressed="false"
                            data-diagnostico-id="{{ data_get($diagnosticoInicial, 'id', '') }}"
                            data-diagnostico-texto="{{ data_get($diagnosticoInicial, 'diagnostico', '') }}"
                            aria-disabled="{{ $piezaBloqueada ? 'true' : 'false' }}"
                            title="{{ $piezaBloqueada ? 'Registre primero el diagnóstico de esta pieza' : 'Seleccionar pieza' }}">
                            <img src="{{ asset('images/dental/odontopediatria/diente-sano/diente-sano'.$codigoPieza.'.png') }}"
                                alt="Pieza {{ $pieza }}">
                            <strong>{{ $pieza }}</strong>
                        </button>
                    @endforeach
                </div>
            @endforeach
        </div>

        @if ($selectorPedModo === 'diagnostico')
            <div class="selector-odontograma-pediatrico__formulario">
                <div class="form-group">
                    <label class="floating-label-activo-sm">{{ $selectorPedMultiple ? 'Piezas seleccionadas' : 'Pieza seleccionada' }}</label>
                    <input type="text" class="form-control form-control-sm pieza-seleccionada-ped" readonly
                        placeholder="Seleccione una pieza">
                </div>
                <div class="form-group">
                    <label class="floating-label-activo-sm">Diagn&oacute;stico</label>
                    <select class="form-control form-control-sm diagnostico-pieza-ped">
                        <option value="0">Seleccione</option>
                        @foreach ($diagnosticos ?? [] as $diagnosticoPed)
                            <option value="{{ $diagnosticoPed->id }}">{{ $diagnosticoPed->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="button" class="btn btn-primary btn-block guardar-diagnostico-ped">
                    <i class="feather icon-save"></i> Agregar diagn&oacute;stico
                </button>
                <div class="diagnosticos-pieza-ped mt-3"></div>
                <input type="hidden" name="diagnosticos_pieza_odontop" class="diagnosticos-pieza-ped-json" value="[]">
            </div>
        @endif
    </div>
</div>

<style>
    #{{ $selectorPedId }}{border:1px solid #dbe4ee;border-radius:.75rem;background:#fff;overflow:hidden}
    #{{ $selectorPedId }} .selector-odontograma-pediatrico__encabezado{display:flex;align-items:center;justify-content:space-between;gap:1rem;padding:.8rem 1rem;border-bottom:1px solid #dbe4ee;background:#f7f9fc}
    #{{ $selectorPedId }} .selector-odontograma-pediatrico__encabezado h6{margin:0;color:#174ea6;font-weight:700}
    #{{ $selectorPedId }} .selector-odontograma-pediatrico__encabezado small{color:#748397}
    #{{ $selectorPedId }} .selector-odontograma-pediatrico__contenido{display:grid;grid-template-columns:minmax(620px,1.5fr) minmax(260px,.7fr);gap:1rem;padding:1rem}
    #{{ $selectorPedId }}[data-modo="planificacion"] .selector-odontograma-pediatrico__contenido{display:block}
    #{{ $selectorPedId }}[data-modo="presupuesto"] .selector-odontograma-pediatrico__contenido{display:block}
    #{{ $selectorPedId }} .selector-odontograma-pediatrico__piezas{overflow-x:auto}
    #{{ $selectorPedId }} .selector-odontograma-pediatrico__fila{display:grid;grid-template-columns:repeat(10,minmax(58px,1fr));gap:.45rem;min-width:620px}
    #{{ $selectorPedId }} .selector-odontograma-pediatrico__fila+.selector-odontograma-pediatrico__fila{margin-top:.7rem}
    #{{ $selectorPedId }} .selector-odontograma-pediatrico__pieza{min-height:100px;padding:.35rem;border:1px solid #73a5ff;border-radius:.65rem;background:#dbeafe;color:#174ea6;cursor:pointer}
    #{{ $selectorPedId }} .selector-odontograma-pediatrico__pieza img{display:block;width:42px;height:57px;object-fit:contain;margin:0 auto .15rem}
    #{{ $selectorPedId }} .selector-odontograma-pediatrico__pieza.is-selected{border-color:#174ea6;background:#2453aa;color:#fff;box-shadow:0 0 0 2px rgba(23,78,166,.18)}
    #{{ $selectorPedId }} .selector-odontograma-pediatrico__pieza.is-locked{border-color:#d5dce5;background:#edf1f5;color:#9aa6b4;cursor:not-allowed;filter:grayscale(1);opacity:.55}
    #{{ $selectorPedId }} .selector-odontograma-pediatrico__pieza.has-diagnosis{border-color:#22a06b;background:#dff5e8;color:#147a4b;filter:none;opacity:1}
    #{{ $selectorPedId }} .selector-odontograma-pediatrico__pieza.is-in-budget{border-color:#22a06b;background:#dff5e8;color:#147a4b;box-shadow:inset 0 -5px 0 #22a06b,0 0 0 2px rgba(34,160,107,.16);filter:none;opacity:1}
    #{{ $selectorPedId }} .selector-odontograma-pediatrico__pieza.is-in-budget.is-selected{border-color:#174ea6;background:#2453aa;color:#fff;box-shadow:inset 0 -5px 0 #22a06b,0 0 0 2px rgba(34,160,107,.24)}
    #{{ $selectorPedId }} .diagnostico-pieza-ped-item{display:flex;justify-content:space-between;gap:.5rem;padding:.45rem .6rem;margin-top:.4rem;border-radius:.4rem;background:#edf4ff;color:#174ea6}
    @media(max-width:991.98px){#{{ $selectorPedId }} .selector-odontograma-pediatrico__contenido{grid-template-columns:1fr}}
</style>

<script>
(function () {
    const $selector = $('#{{ $selectorPedId }}');
    const multiple = Number($selector.data('multiple')) === 1;
    const inputId = String($selector.data('input-id') || '');
    const diagnosticos = {};
    const diagnosticosIniciales = {!! $selectorPedDiagnosticosInicialesJson !!};
    diagnosticosIniciales.forEach(function (item) { diagnosticos[item.pieza] = item; });
    if (diagnosticosIniciales.length) {
        window.diagnosticosPiezaOdontop = Object.values(diagnosticos);
    }

    $selector.on('click', '[data-pieza-pediatrica]', function () {
        const $pieza = $(this);
        if ($pieza.hasClass('is-locked')) return;
        if (!multiple) {
            $selector.find('[data-pieza-pediatrica]').not($pieza).removeClass('is-selected').attr('aria-pressed', 'false');
        }
        $pieza.toggleClass('is-selected').attr('aria-pressed', $pieza.hasClass('is-selected') ? 'true' : 'false');
        const piezas = $selector.find('[data-pieza-pediatrica].is-selected').map(function () {
            return String($(this).data('pieza-pediatrica'));
        }).get();
        $selector.find('.pieza-seleccionada-ped').val(piezas.join(', '));
        if (inputId) $(inputId.charAt(0) === '#' ? inputId : '#' + inputId).val(piezas).trigger('change');
        $selector.trigger('odontograma-pediatrico:change', [piezas]);
        $selector.trigger('odontograma:change', [piezas]);
    });

    $selector.on('click', '.guardar-diagnostico-ped', function () {
        const piezas = $selector.find('[data-pieza-pediatrica].is-selected').map(function () {
            return String($(this).data('pieza-pediatrica'));
        }).get();
        const $diagnostico = $selector.find('.diagnostico-pieza-ped');
        const diagnosticoId = $diagnostico.val();
        if (!piezas.length || diagnosticoId === '0') {
            swal('Datos requeridos', 'Seleccione al menos una pieza y un diagn&oacute;stico.', 'warning');
            return;
        }
        const textoDiagnosticoPersistente = $diagnostico.find('option:selected').text();
        const $botonGuardarPersistente = $(this).prop('disabled', true);
        $.ajax({
            type: 'POST',
            url: @json(route('dental.cargar_tratamiento_presupuesto_period')),
            data: {
                piezas: piezas,
                diagnostico: diagnosticoId,
                tto: '',
                etapa: 'diagnostico',
                tipo: 'odped',
                urgencia: 0,
                id_ficha_atencion: $('#id_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                id_paciente: $('#id_paciente_fc').val(),
                id_presupuesto: $('#id_presupuesto').val() || null,
                _token: @json(csrf_token())
            },
            success: function (respuesta) {
                if (Number(respuesta.status) !== 1) {
                    swal('No fue posible guardar', respuesta.mensaje || 'Intente nuevamente.', 'error');
                    return;
                }
                if (respuesta.presupuesto && respuesta.presupuesto.id) $('#id_presupuesto').val(respuesta.presupuesto.id);
                piezas.forEach(function (pieza) {
                    diagnosticos[pieza] = { pieza: pieza, id: diagnosticoId, diagnostico: textoDiagnosticoPersistente };
                });
                const registrosPersistidos = Object.values(diagnosticos);
                window.diagnosticosPiezaOdontop = registrosPersistidos;
                window.odontograma_global = respuesta.odontograma_paciente || [];
                $selector.find('.diagnosticos-pieza-ped-json').val(JSON.stringify(registrosPersistidos));
                $selector.find('.diagnosticos-pieza-ped').html(registrosPersistidos.map(function (item) {
                    return '<div class="diagnostico-pieza-ped-item"><strong>Pieza ' + item.pieza + '</strong><span>' + item.diagnostico + '</span></div>';
                }).join(''));
                $diagnostico.val('0');
                $(document).trigger('odontopediatria:diagnosticos-actualizados', [registrosPersistidos]);
                if (typeof window.actualizarPlanificacionOdontop === 'function') {
                    window.actualizarPlanificacionOdontop(registrosPersistidos);
                }
                swal({ icon: 'success', title: 'Diagnóstico guardado', text: respuesta.mensaje });
            },
            error: function (xhr) {
                const mensaje = xhr.responseJSON && (xhr.responseJSON.message || xhr.responseJSON.mensaje);
                swal('Error', mensaje || 'No fue posible guardar el diagnóstico.', 'error');
            },
            complete: function () { $botonGuardarPersistente.prop('disabled', false); }
        });
        return;
        const textoDiagnostico = $diagnostico.find('option:selected').text();
        piezas.forEach(function (pieza) {
            diagnosticos[pieza] = { pieza: pieza, id: diagnosticoId, diagnostico: textoDiagnostico };
        });
        const registros = Object.values(diagnosticos);
        window.diagnosticosPiezaOdontop = registros;
        $selector.find('.diagnosticos-pieza-ped-json').val(JSON.stringify(registros));
        $selector.find('.diagnosticos-pieza-ped').html(registros.map(function (item) {
            return '<div class="diagnostico-pieza-ped-item"><strong>Pieza ' + item.pieza + '</strong><span>' + item.diagnostico + '</span></div>';
        }).join(''));
        $diagnostico.val('0');
        piezas.forEach(function (pieza) {
            $selector.find('[data-pieza-pediatrica="' + pieza + '"]').addClass('has-diagnosis');
        });
        $(document).trigger('odontopediatria:diagnosticos-actualizados', [registros]);
        swal({
            icon: 'success',
            title: 'Diagnóstico guardado',
            text: piezas.length === 1
                ? 'El diagn&oacute;stico fue asociado a la pieza ' + piezas[0] + '.'
                : 'El diagn&oacute;stico fue asociado a ' + piezas.length + ' piezas.'
        });
    });

    if (Number($selector.attr('data-requiere-diagnostico')) === 1) {
        const actualizarPiezasDiagnosticadas = function (registros) {
            const mapa = {};
            (registros || []).forEach(function (registro) { mapa[String(registro.pieza)] = registro; });
            $selector.find('[data-pieza-pediatrica]').each(function () {
                const $pieza = $(this);
                const registro = mapa[String($pieza.data('pieza-pediatrica'))];
                $pieza.toggleClass('is-locked', !registro)
                    .toggleClass('has-diagnosis', !!registro)
                    .attr('aria-disabled', registro ? 'false' : 'true')
                    .attr('title', registro ? 'Seleccionar pieza diagnosticada' : 'Registre primero el diagnóstico de esta pieza')
                    .data('diagnostico-id', registro ? registro.id : null)
                    .data('diagnostico-texto', registro ? registro.diagnostico : null);
            });
        };

        window.actualizarPlanificacionOdontop = actualizarPiezasDiagnosticadas;

        const cargarDiagnosticosPersistidosOdontop = function () {
            $.ajax({
                type: 'POST',
                url: @json(route('profesional.selector_odontograma.piezas')),
                data: {
                    id_paciente: $('#id_paciente_fc').val(),
                    id_ficha_atencion: $('#id_fc').val(),
                    id_presupuesto: $('#id_presupuesto').val() || null,
                    _token: @json(csrf_token())
                },
                success: function (respuesta) {
                    const registros = (respuesta.piezas || [])
                        .filter(function (pieza) {
                            return pieza && Number(pieza.urgencia || 0) === 0
                                && String(pieza.tratamiento || '').trim() === ''
                                && pieza.diagnostico !== null && pieza.diagnostico !== undefined;
                        })
                        .map(function (pieza) {
                            const diagnosticoId = pieza.diagnostico_id || pieza.diagnostico_plan || pieza.id_diagnostico || pieza.diagnostico;
                            return {
                                pieza: String(pieza.pieza),
                                id: diagnosticoId,
                                diagnostico: pieza.diagnostico_descripcion
                                    || pieza.nombre_diagnostico
                                    || $('#diagnostico_combo_g option[value="' + diagnosticoId + '"]').text()
                                    || pieza.diagnostico
                            };
                        });

                    if (registros.length) {
                        window.diagnosticosPiezaOdontop = registros;
                        actualizarPiezasDiagnosticadas(registros);
                    }
                }
            });
        };

        $(document).on('odontopediatria:diagnosticos-actualizados', function (event, registros) {
            actualizarPiezasDiagnosticadas(registros);
        });

        $(document).on('shown.bs.tab', 'a[href="#plan_od_ped"]', function () {
            actualizarPiezasDiagnosticadas(window.diagnosticosPiezaOdontop || []);
            cargarDiagnosticosPersistidosOdontop();
        });

        actualizarPiezasDiagnosticadas(window.diagnosticosPiezaOdontop || []);

        $selector.on('odontograma-pediatrico:change', function (event, piezas) {
            const pieza = (piezas || [])[0];
            const $boton = $selector.find('[data-pieza-pediatrica="' + pieza + '"]');
            if (!pieza || !$boton.length) return;
            $('#diagnostico_combo_g').val(String($boton.data('diagnostico-id'))).trigger('change');
        });
    }
})();
</script>
