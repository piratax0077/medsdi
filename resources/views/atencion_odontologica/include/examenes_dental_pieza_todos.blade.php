@php
    $counter = 1;
    $piezasConExamen = collect($examenes)->map(function ($examen) {
        return (object) [
            'pieza' => (string) $examen->numero_pieza,
            'tratamiento' => $examen->tratamiento_procedimiento ?? null,
        ];
    });
    $primeraPiezaExamen = optional(collect($examenes)->first())->numero_pieza;
@endphp
<div class="row examen-pieza-master-detail">
    <div class="col-sm-12 col-lg-6 mb-3">
        <div class="card h-100 mb-0">
            <div class="card-body">
                @include('atencion_odontologica.include.selector_odontograma', [
                    'id' => 'selector_historial_examen_pieza',
                    'inputId' => 'pieza_historial_examen_seleccionada',
                    'counter' => 'historial',
                    'multiple' => false,
                    'compacto' => true,
                    'soloPendientes' => false,
                    'autoRefresh' => false,
                    'piezasDisponibles' => $piezasConExamen,
                    'piezasSeleccionadas' => $primeraPiezaExamen ? [(string) $primeraPiezaExamen] : [],
                    'titulo' => 'Historial por pieza',
                    'ayuda' => 'Seleccione una pieza para revisar sus antecedentes',
                ])
                <input type="hidden" id="pieza_historial_examen_seleccionada" value="{{ $primeraPiezaExamen ?: 0 }}">
                <div class="alert alert-info mt-3 mb-0 py-2">
                    Debajo se listan todas las piezas examinadas. Seleccione una pieza para resaltarla y saltar a su detalle.
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-6 examen-pieza-lista-detalle" tabindex="0"
        role="region" aria-label="Detalle e historial de exámenes por pieza">
        <div class="card detalle-examen-pieza-vacio" @if($examenes->isNotEmpty()) style="display:none" @endif>
            <div class="card-body text-center py-5">
                <i class="feather icon-info text-primary" style="font-size:2rem"></i>
                <h5 class="mt-3">Esta pieza no tiene examen registrado</h5>
                <p class="text-muted mb-0">Puede completar el formulario de nuevo examen para crear su primera evaluación.</p>
            </div>
        </div>
                                        @foreach ($examenes as $examen)
                                        <div class="card detalle-examen-pieza mb-3" data-detalle-pieza="{{ $examen->numero_pieza }}">
                                            <div class="card-body">
                                                @php
                                                    $estadoProcedimiento = (int) ($examen->estado_procedimiento ?? 0);

                                                    $estadosProcedimiento = [
                                                        0 => [
                                                            'texto' => 'PENDIENTE',
                                                            'clase' => 'badge-danger',
                                                        ],
                                                        1 => [
                                                            'texto' => 'FINALIZADO',
                                                            'clase' => 'badge-success',
                                                        ],
                                                        2 => [
                                                            'texto' => 'EN PROCESO',
                                                            'clase' => 'badge-info',
                                                        ],
                                                        3 => [
                                                            'texto' => 'CITADO A CONTROL',
                                                            'clase' => 'badge-warning',
                                                        ],
                                                    ];

                                                    $estadoActual = $estadosProcedimiento[$estadoProcedimiento]
                                                        ?? $estadosProcedimiento[0];

                                                    $estadoTexto = $estadoActual['texto'];
                                                    $estadoClase = $estadoActual['clase'];
                                                @endphp
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <div><strong>Pieza {{ $examen->numero_pieza }}</strong><br><small class="text-muted">{{ $examen->tratamiento_procedimiento }}</small></div>
                                                    <span class="badge {{ $estadoClase }} px-3 py-2">{{ $estadoTexto }}</span>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Pieza N°</label>
                                                                <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp_gral{{ $counter }}" id="n_pieza_ex_pp_gral{{ $counter }}" value="{{ $examen->numero_pieza }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Historia Anterior</label>
                                                                <textarea class="form-control form-control-sm" rows="3" name="ex_grl_hp{{ $counter }}" id="ex_grl_hp{{ $counter }}" readonly>{{ $examen->historial_registros ?? $examen->historia_anterior }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Zona de Dolor</label>
                                                                <input type="text" class="form-control form-control-sm" name="zona_dolor{{ $counter }}" id="zona_dolor{{ $counter }}" value="{{ $examen->zona_dolor }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row my-2">
                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Intensidad</label>
                                                                <select name="intensidad{{ $counter }}" id="intensidad{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('intensidad{{ $counter }}','div_intensidad{{ $counter }}','obs_intensidad{{ $counter }}',4);">
                                                                    <option @if($examen->intensidad == 1) selected @endif value="1">Leve</option>
                                                                    <option @if($examen->intensidad == 2) selected @endif value="2">Moderada</option>
                                                                    <option @if($examen->intensidad == 3) selected @endif value="3">Severa</option>
                                                                    <option @if($examen->intensidad == 4) selected @endif value="4">Intensa</option>
                                                                    <option @if($examen->intensidad == 5) selected @endif value="5">Otro (Describir)</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_intensidad{{ $counter }}" style="display:none;">
                                                                <label class="floating-label-activo-sm">Intensidad</label>
                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_intensidad{{ $counter }}" id="obs_intensidad{{ $counter }}"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Modo dolor</label>
                                                                <select name="modo_dolor{{ $counter }}"  id="modo_dolor{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('modo_dolor{{ $counter }}','div_modo_dolor{{ $counter }}','obs_modo_dolor{{ $counter }}',3);">
                                                                    <option @if($examen->modo_dolor == 1) selected @endif value="1">Pulsátil</option>
                                                                    <option @if($examen->modo_dolor == 2) selected @endif value="2">Permanente</option>
                                                                    <option @if($examen->modo_dolor == 3) selected @endif value="3">Otro (Describir)</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_modo_dolor{{ $counter }}" style="display:none;">
                                                                <label class="floating-label-activo-sm">Modo dolor</label>
                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_modo_dolor{{ $counter }}" id="obs_modo_dolor{{ $counter }}"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Localización</label>
                                                                <select name="loc_dolor{{ $counter }}" id="loc_dolor{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('loc_dolor{{ $counter }}','div_loc_dolor{{ $counter }}','obs_loc_dolor{{ $counter }}',3);">
                                                                    <option @if($examen->loc_dolor == 1) selected @endif value="1">Localizado</option>
                                                                    <option @if($examen->loc_dolor == 2) selected @endif value="2">Referido</option>
                                                                    <option @if($examen->loc_dolor == 3) selected @endif value="3">Otro (Describir)</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_loc_dolor{{ $counter }}" style="display:none;">
                                                                <label class="floating-label-activo-sm">Localización</label>
                                                                <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_loc_dolor{{ $counter }}" id="obs_loc_dolor{{ $counter }}"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Provocación del Dolor</label>
                                                                <select name="provocacion_dolor{{ $counter }}" data-titulo="General_endodoncia" data-seccion="General_endodoncia"  id="provocacion_dolor{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('provocacion_dolor{{ $counter }}','div_provocacion_dolor{{ $counter }}','obs_provocacion_dolor{{ $counter }}',5);">
                                                                    <option @if($examen->provocacion_dolor == 1) selected @endif value="1">Frío</option>
                                                                    <option @if($examen->provocacion_dolor == 2) selected @endif value="2">Calor</option>
                                                                    <option @if($examen->provocacion_dolor == 3) selected @endif value="3">Actividad</option>
                                                                    <option @if($examen->provocacion_dolor == 4) selected @endif value="4">Masticación</option>
                                                                    <option @if($examen->provocacion_dolor == 5) selected @endif value="5">Otro (Describir)</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_provocacion_dolor{{ $counter }}" style="display:none;">
                                                                <label class="floating-label-activo-sm">Provocación del Dolor</label>
                                                                <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_provocacion_dolor{{ $counter }}" id="obs_provocacion_dolor{{ $counter }}"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_observaciones{{ $counter }}" id="obs_observaciones{{ $counter }}"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Resp.Calor</label>
                                                                <select id="sel_endo_resp_calor{{ $counter }}" name="sel_endo_resp_calor{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                    <option @if($examen->resp_calor == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                                                                    <option @if($examen->resp_calor == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado</option>
                                                                    <option @if($examen->resp_calor == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido</option>
                                                                    <option @if($examen->resp_calor == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                                                                    <option @if($examen->resp_calor == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Resp.Frio</label>
                                                                <select id="sel_endo_resp_frio{{ $counter }}" name="sel_endo_resp_frio{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                    <option @if($examen->resp_frio == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                                                                    <option @if($examen->resp_frio == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado</option>
                                                                    <option @if($examen->resp_frio == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido</option>
                                                                    <option @if($examen->resp_frio == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                                                                    <option @if($examen->resp_frio == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Eléctrico</label>
                                                                <select id="sel_endo_resp_elect{{ $counter }}" name="sel_endo_resp_elect{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                    <option @if($examen->electrico == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                                                                    <option @if($examen->electrico == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado</option>
                                                                    <option @if($examen->electrico == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido</option>
                                                                    <option @if($examen->electrico == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                                                                    <option @if($examen->electrico == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Percusión</label>
                                                                <select id="sel_endo_resp_perc{{ $counter }}" name="sel_endo_resp_perc{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                    <option @if($examen->percusion == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                                                                    <option @if($examen->percusion == '↑ Positiva') selected @endif><span>↑ </span> Positiva</option>
                                                                    <option @if($examen->percusion == '↓ Negativa') selected @endif><span>↓ </span> Negativa</option>
                                                                    <option @if($examen->percusion == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                                                                    <option @if($examen->percusion == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Exploración</label>
                                                                <select id="sel_endo_resp_expl{{ $counter }}" name="sel_endo_resp_expl{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                    <option @if($examen->exploracion == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                                                                    <option @if($examen->exploracion == '↑ Positiva') selected @endif><span>↑ </span> Positiva</option>
                                                                    <option @if($examen->exploracion == '↓ Negativa') selected @endif><span>↓ </span> Negativa</option>
                                                                    <option @if($examen->exploracion == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                                                                    <option @if($examen->exploracion == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Cavitaria</label>
                                                                <select id="sel_endo_cavitaria{{ $counter }}" name="sel_endo_cavitaria{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                    <option @if($examen->cavitaria == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                                                                    <option @if($examen->cavitaria == '↑ Positiva') selected @endif><span>↑ </span> Positiva</option>
                                                                    <option @if($examen->cavitaria == '↓ Negativa') selected @endif><span>↓ </span> Negativa</option>
                                                                    <option @if($examen->cavitaria == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                                                                    <option @if($examen->cavitaria == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @php $historialCompleto = $examen->historial_completo ?? collect(); @endphp
                                                @if($historialCompleto->count() > 1)
                                                <div class="mt-3">
                                                    <h6 class="text-muted mb-2"><i class="feather icon-clock"></i> Historial de registros de esta pieza ({{ $historialCompleto->count() }})</h6>
                                                    <div class="list-group">
                                                        @php
                                                            $textoIntensidad = [1 => 'Leve', 2 => 'Moderada', 3 => 'Severa', 4 => 'Intensa', 5 => 'Otro'];
                                                            $textoModoDolor = [1 => 'Pulsátil', 2 => 'Permanente', 3 => 'Otro'];
                                                            $textoLocalizacion = [1 => 'Localizado', 2 => 'Referido', 3 => 'Otro'];
                                                            $textoProvocacion = [1 => 'Frío', 2 => 'Calor', 3 => 'Actividad', 4 => 'Masticación', 5 => 'Otro'];
                                                        @endphp
                                                        @foreach($historialCompleto as $registroHist)
                                                            @php
                                                                $fechaHist = $registroHist->fecha_examen
                                                                    ? \Carbon\Carbon::parse($registroHist->fecha_examen)->format('d-m-Y')
                                                                    : optional($registroHist->created_at)->format('d-m-Y H:i');
                                                            @endphp
                                                            <div class="list-group-item {{ $loop->first ? 'border-primary' : '' }}">
                                                                <div class="d-flex justify-content-between align-items-start">
                                                                    <strong>{{ $fechaHist ?: 'Sin fecha' }}</strong>
                                                                    @if($loop->first)
                                                                        <span class="badge badge-primary">Último</span>
                                                                    @endif
                                                                </div>
                                                                <div class="small text-muted mt-1">
                                                                    Zona de dolor: {{ $registroHist->zona_dolor ?: '-' }} |
                                                                    Intensidad: {{ $textoIntensidad[$registroHist->intensidad_dolor] ?? '-' }} |
                                                                    Modo dolor: {{ $textoModoDolor[$registroHist->modo_dolor] ?? '-' }} |
                                                                    Localización: {{ $textoLocalizacion[$registroHist->localizacion] ?? '-' }} |
                                                                    Provocación: {{ $textoProvocacion[$registroHist->provocacion_dolor] ?? '-' }}
                                                                    @if($registroHist->observaciones)
                                                                        <br>Observaciones: {{ $registroHist->observaciones }}
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_pieza_dental_pieza({{ $examen->id }},'gral')"><i class="feather icon-x"></i></button>
                                            </div>
                                        </div>
                                        @php $counter++; @endphp
                                        @endforeach
    </div>
</div>
<script>
(function(){
    const $selector=$('#selector_historial_examen_pieza');
    $selector.on('odontograma:change',function(event,piezas){
        const pieza=(piezas||[])[0];
        const $contenedor=$selector.closest('.examen-pieza-master-detail');
        const $detalle=$contenedor.find('[data-detalle-pieza="'+pieza+'"]').first();
        if(!$detalle.length){ return; }
        // Todas las tarjetas ya están visibles; solo se resalta y se hace scroll a la elegida.
        $contenedor.find('.detalle-examen-pieza').removeClass('border-primary');
        $detalle.addClass('border-primary');
        const $lista=$contenedor.find('.examen-pieza-lista-detalle');
        const destino=$lista.scrollTop()+$detalle.offset().top-$lista.offset().top;
        $lista.stop(true).animate({scrollTop:Math.max(0,destino-8)},250);
    });
})();
</script>
<style>
@media (min-width: 992px) {
    .examen-pieza-master-detail .examen-pieza-lista-detalle {
        max-height: 640px;
        overflow-y: auto;
        overscroll-behavior: contain;
        scrollbar-gutter: stable;
        padding-right: .65rem;
    }

    .examen-pieza-master-detail .detalle-examen-pieza .form-row > [class*="col-"] {
        flex: 0 0 50%;
        max-width: 50%;
    }
}
@media (max-width: 991.98px) {
    .examen-pieza-master-detail .examen-pieza-lista-detalle {
        max-height: 70vh;
        overflow-y: auto;
        overscroll-behavior: contain;
        padding-right: .35rem;
    }

    .examen-pieza-master-detail .detalle-examen-pieza .form-row > [class*="col-"] {
        flex: 0 0 100%;
        max-width: 100%;
    }
}

.examen-pieza-master-detail .examen-pieza-lista-detalle:focus {
    outline: 2px solid rgba(23, 78, 166, .22);
    outline-offset: 2px;
    border-radius: .65rem;
}

.examen-pieza-master-detail .examen-pieza-lista-detalle::-webkit-scrollbar {
    width: 9px;
}

.examen-pieza-master-detail .examen-pieza-lista-detalle::-webkit-scrollbar-thumb {
    border: 2px solid transparent;
    border-radius: 10px;
    background: #aeb9c6;
    background-clip: padding-box;
}
</style>
