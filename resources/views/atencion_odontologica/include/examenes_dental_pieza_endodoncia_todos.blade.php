@php $count = 300; @endphp
@foreach ($examenes as $examen)
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <div class="form-row">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Pieza N°</label>
                            <input type="text" class="form-control form-control-sm"
                                name="n_pieza_ex_pp_end{{ $count }}" id="n_pieza_ex_pp_end{{ $count }}"
                                value="{{ $examen->numero_pieza }}">
                        </div>
                    </div>
                    <div class="form-group col-sm-12 col-md-5">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Zona de Dolor</label>
                            <input type="text" class="form-control form-control-sm"
                                name="ex_grl_zdolor_end{{ $count }}" id="ex_grl_zdolor_end{{ $count }}"
                                value="{{ $examen->zona_dolor }}">
                        </div>
                    </div>
                    <div class="form-group col-sm-12 col-md-5">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Historial de la pieza</label>
                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                name="ex_grl_hp_end{{ $count }}" id="ex_grl_hp_end{{ $count }}">{{ $examen->historia_anterior }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-row my-2">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Intensidad</label>
                            <select name="intensidad_end{{ $count }}" id="intensidad_end{{ $count }}"
                                class="form-control form-control-sm"
                                onchange="evaluar_para_carga_detalle('intensidad_end{{ $count }}','div_intensidad_end{{ $count }}','obs_intensidad_end{{ $count }}',4);">
                                <option selected="" value="1">Leve</option>
                                <option value="2">Moderada</option>
                                <option value="3">Severa</option>
                                <option value="4">Intensa</option>
                                <option value="5">Otro (Describir)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_intensidad_end{{ $count }}" style="display:none;">
                            <label class="floating-label-activo-sm">Intensidad</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                name="obs_intensidad_end{{ $count }}" id="obs_intensidad_end{{ $count }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Modo dolor</label>
                            <select name="modo_dolor_end{{ $count }}" id="modo_dolor_end{{ $count }}"
                                class="form-control form-control-sm"
                                onchange="evaluar_para_carga_detalle('modo_dolor_end{{ $count }}','div_modo_dolor_end{{ $count }}','obs_modo_dolor_end{{ $count }}',3);">
                                <option selected="" value="1">Pulsátil</option>
                                <option value="2">Permanente</option>
                                <option value="3">Otro (Describir)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_modo_dolor_end{{ $count }}" style="display:none;">
                            <label class="floating-label-activo-sm">Modo dolor</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                name="obs_modo_dolor_end{{ $count }}" id="obs_modo_dolor_end{{ $count }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Localización</label>
                            <select name="loc_dolor_end{{ $count }}" id="loc_dolor_end{{ $count }}"
                                class="form-control form-control-sm"
                                onchange="evaluar_para_carga_detalle('loc_dolor_end{{ $count }}','div_loc_dolor_end{{ $count }}','obs_loc_dolor_end{{ $count }}',3);">
                                <option selected="" value="1">Localizado</option>
                                <option value="2">Referido</option>
                                <option value="3">Otro (Describir)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_loc_dolor_end{{ $count }}" style="display:none;">
                            <label class="floating-label-activo-sm">Localización</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                name="obs_loc_dolor_end{{ $count }}" id="obs_loc_dolor_end{{ $count }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Provocación del Dolor</label>
                            <select name="provocacion_dolor_end{{ $count }}" data-titulo="Odontopediatria"
                                data-seccion="Odontopediatria" id="provocacion_dolor_end{{ $count }}"
                                class="form-control form-control-sm"
                                onchange="evaluar_para_carga_detalle('provocacion_dolor_end{{ $count }}','div_provocacion_dolor_end{{ $count }}','obs_provocacion_dolor_end{{ $count }}',5);">
                                <option selected="" value="1">Frío</option>
                                <option value="2">Calor</option>
                                <option value="3">Actividad</option>
                                <option value="4">Masticación</option>
                                <option value="5">Otro (Describir)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_provocacion_dolor_end{{ $count }}"
                            style="display:none;">
                            <label class="floating-label-activo-sm">Provocación del Dolor</label>
                            <textarea class="form-control form-control-sm" data-titulo="Odontopediatria" rows="1" onfocus="this.rows=3"
                                onblur="this.rows=1;" name="obs_provocacion_dolor_end{{ $count }}"
                                id="obs_provocacion_dolor_end{{ $count }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Observaciones</label>
                            <textarea class="form-control form-control-sm" data-titulo="Odontopediatria" rows="1" onfocus="this.rows=3"
                                onblur="this.rows=1;" name="obs_observaciones_end{{ $count }}"
                                id="obs_observaciones_end{{ $count }}"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Resp.Calor</label>
                            <select id="sel_endo_resp_calor{{ $count }}"
                                name="sel_endo_resp_calor{{ $count }}" class="form-control form-control-sm"
                                style=" font-size: 14px; color: #232020">
                                <option @if ($examen->resp_calor == 'N/R No realizada') selected @endif><span>N/R </span> No realizada
                                </option>
                                <option @if ($examen->resp_calor == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado
                                </option>
                                <option @if ($examen->resp_calor == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido
                                </option>
                                <option @if ($examen->resp_calor == 'N Normal') selected @endif><span>N </span> Normal
                                </option>
                                <option @if ($examen->resp_calor == '(-) No responde') selected @endif><span>(-) </span> No responde
                                </option>
                            </select>
                        </div>

                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Resp.Frio</label>
                            <select id="sel_endo_resp_frio{{ $count }}"
                                name="sel_endo_resp_frio{{ $count }}" class="form-control form-control-sm"
                                style=" font-size: 14px; color: #232020">
                                <option @if ($examen->resp_frio == 'N/R No realizada') selected @endif><span>N/R </span> No realizada
                                </option>
                                <option @if ($examen->resp_frio == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado
                                </option>
                                <option @if ($examen->resp_frio == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido
                                </option>
                                <option @if ($examen->resp_frio == 'N Normal') selected @endif><span>N </span> Normal
                                </option>
                                <option @if ($examen->resp_frio == '(-) No responde') selected @endif><span>(-) </span> No responde
                                </option>
                            </select>
                        </div>

                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Eléctrico</label>
                            <select id="sel_endo_resp_elect{{ $count }}"
                                name="sel_endo_resp_elect{{ $count }}" class="form-control form-control-sm"
                                style=" font-size: 14px; color: #232020">
                                <option @if ($examen->electrico == 'N/R No realizada') selected @endif><span>N/R </span> No
                                    realizada</option>
                                <option @if ($examen->electrico == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado
                                </option>
                                <option @if ($examen->electrico == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido
                                </option>
                                <option @if ($examen->electrico == 'N Normal') selected @endif><span>N </span> Normal
                                </option>
                                <option @if ($examen->electrico == '(-) No responde') selected @endif><span>(-) </span> No
                                    responde</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Percusión</label>
                            <select id="sel_endo_resp_perc{{ $count }}"
                                name="sel_endo_resp_perc{{ $count }}" class="form-control form-control-sm"
                                style=" font-size: 14px; color: #232020">
                                <option @if ($examen->percusion == 'N/R No realizada') selected @endif><span>N/R </span> No
                                    realizada</option>
                                <option @if ($examen->percusion == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado
                                </option>
                                <option @if ($examen->percusion == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido
                                </option>
                                <option @if ($examen->percusion == 'N Normal') selected @endif><span>N </span> Normal
                                </option>
                                <option @if ($examen->percusion == '(-) No responde') selected @endif><span>(-) </span> No
                                    responde</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Exploración</label>
                            <select id="sel_endo_resp_expl{{ $count }}"
                                name="sel_endo_resp_expl{{ $count }}" class="form-control form-control-sm"
                                style=" font-size: 14px; color: #232020">
                                <option @if ($examen->exploracion == 'N/R No realizada') selected @endif><span>N/R </span> No
                                    realizada</option>
                                <option @if ($examen->exploracion == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado
                                </option>
                                <option @if ($examen->exploracion == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido
                                </option>
                                <option @if ($examen->exploracion == 'N Normal') selected @endif><span>N </span> Normal
                                </option>
                                <option @if ($examen->exploracion == '(-) No responde') selected @endif><span>(-) </span> No
                                    responde</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Cavitaria</label>
                            <select id="sel_endo_cavitaria{{ $count }}"
                                name="sel_endo_cavitaria{{ $count }}" class="form-control form-control-sm"
                                style=" font-size: 14px; color: #232020">
                                <option @if ($examen->cavitaria == 'N/R No realizada') selected @endif><span>N/R </span> No
                                    realizada</option>
                                <option @if ($examen->cavitaria == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado
                                </option>
                                <option @if ($examen->cavitaria == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido
                                </option>
                                <option @if ($examen->cavitaria == 'N Normal') selected @endif><span>N </span> Normal
                                </option>
                                <option @if ($examen->cavitaria == '(-) No responde') selected @endif><span>(-) </span> No
                                    responde</option>
                            </select>
                        </div>
                    </div>
                    <button type="button" class="btn btn-icon btn-danger-light-c"
                        onclick="eliminar_pieza_dental_pieza({{ $examen->id }},'endo')">X</button>
                </div>
            </div>
        </div>
    </div>


    @php $count++; @endphp
@endforeach
