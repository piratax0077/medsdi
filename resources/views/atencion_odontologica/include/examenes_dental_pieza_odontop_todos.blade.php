@php $counter = 1; @endphp

@foreach ($examenes as $examen)
    <div class="card-informacion">
        <div class="card-body">
            <div class="mb-3">
                <div class="form-row">
                    <div
                        class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label
                                class="floating-label-activo-sm">Pieza
                                N°</label>
                            <input type="text"
                                class="form-control form-control-sm"
                                name="n_pieza_ex_pp{{ $counter }}"
                                id="n_pieza_ex_pp{{ $counter }}"
                                value="{{ $examen->numero_pieza }}">
                        </div>
                    </div>
                    <div
                        class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                        <div class="form-group">
                            <label
                                class="floating-label-activo-sm">Zona
                                de dolor</label>
                            <input type="text"
                                class="form-control form-control-sm"
                                name="n_pieza_zona_dolor_pp{{ $counter }}"
                                id="n_pieza_zona_dolor_pp{{ $counter }}"
                                value="{{ $examen->zona_dolor }}">
                        </div>
                    </div>
                    <div
                        class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                        <div class="form-group">
                            <label
                                class="floating-label-activo-sm">Historia
                                anterior</label>
                            <input type="text"
                                class="form-control form-control-sm"
                                name="n_pieza_historia_anterior_pp{{ $counter }}"
                                id="n_pieza_historia_anterior_pp{{ $counter }}"
                                value="{{ $examen->historia_anterior }}">
                        </div>
                    </div>
                </div>
                <div class="form-row my-2">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Intensidad</label>
                            <select name="intensidad_odontop1" id="intensidad_odontop1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('intensidad_odontop1','div_intensidad_odontop1','obs_intensidad_odontop1',4);">
                                <option value="1" @if($examen->intensidad == 1) selected @endif>Leve</option>
                                <option value="2" @if($examen->intensidad == 2) selected @endif>Moderada</option>
                                <option value="3" @if($examen->intensidad == 3) selected @endif>Severa</option>
                                <option value="4" @if($examen->intensidad == 4) selected @endif>Intensa</option>
                                <option value="5" @if($examen->intensidad == 5) selected @endif>Otro (Describir)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_intensidad_odontop1" style="display:none;">
                            <label class="floating-label-activo-sm">Intensidad</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_intensidad_odontop1" id="obs_intensidad_odontop1"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Modo dolor</label>
                            <select name="modo_dolor_odontop1" id="modo_dolor_odontop1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('modo_dolor_odontop1','div_modo_dolor_odontop1','obs_modo_dolor_odontop1',3);">
                                <option value="1" @if($examen->modo_dolor == 1) selected @endif>Pulsátil</option>
                                <option value="2" @if($examen->modo_dolor == 2) selected @endif>Permanente</option>
                                <option value="3" @if($examen->modo_dolor == 3) selected @endif>Otro (Describir)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_modo_dolor_odontop1" style="display:none;">
                            <label class="floating-label-activo-sm">Modo dolor</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_modo_dolor_odontop1" id="obs_modo_dolor_odontop1"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Localización</label>
                            <select name="loc_dolor_odontop1" id="loc_dolor_odontop1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('loc_dolor_odontop1','div_loc_dolor_odontop1','obs_loc_dolor_odontop1',3);">
                                <option value="1" @if($examen->localizacion == 1) selected @endif>Localizado</option>
                                <option value="2" @if($examen->localizacion == 2) selected @endif>Referido</option>
                                <option value="3" @if($examen->localizacion == 3) selected @endif>Otro (Describir)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_loc_dolor_odontop1" style="display:none;">
                            <label class="floating-label-activo-sm">Localización</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_loc_dolor_odontop1" id="obs_loc_dolor_odontop1"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Provocación del Dolor</label>
                            <select name="provocacion_dolor_odontop1" data-titulo="Odontopediatria" data-seccion="Odontopediatria" id="provocacion_dolor_odontop1" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('provocacion_dolor_odontop1','div_provocacion_dolor_odontop1','obs_provocacion_dolor_odontop1',5);">
                                <option value="1" @if($examen->provocacion_dolor == 1) selected @endif>Frío</option>
                                <option value="2" @if($examen->provocacion_dolor == 2) selected @endif>Calor</option>
                                <option value="3" @if($examen->provocacion_dolor == 3) selected @endif>Actividad</option>
                                <option value="4" @if($examen->provocacion_dolor == 4) selected @endif>Masticación</option>
                                <option value="5" @if($examen->provocacion_dolor == 5) selected @endif>Otro (Describir)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_provocacion_dolor_odontop1" style="display:none;">
                            <label class="floating-label-activo-sm">Provocación del Dolor</label>
                            <textarea class="form-control form-control-sm" data-titulo="Odontopediatria" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_provocacion_dolor_odontop1" id="obs_provocacion_dolor_odontop1"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Observaciones</label>
                            <textarea class="form-control form-control-sm" data-titulo="Odontopediatria" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_observaciones_odontop1" id="obs_observaciones_odontop1">{{ $examen->observaciones }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div
                        class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label
                                class="floating-label-activo-sm">Resp.Calor</label>
                            <select
                                id="sel_endo_resp_calor{{ $counter }}"
                                name="sel_endo_resp_calor{{ $counter }}"
                                class="form-control form-control-sm"
                                style=" font-size: 14px; color: #232020">
                                <option
                                    @if ($examen->resp_calor == 'N/R No realizada') selected @endif>
                                    <span>N/R </span> No
                                    realizada</option>
                                <option
                                    @if ($examen->resp_calor == '↑ Aumentado') selected @endif>
                                    <span>↑ </span> Aumentado
                                </option>
                                <option
                                    @if ($examen->resp_calor == '↓ Disminuido') selected @endif>
                                    <span>↓ </span> Disminuido
                                </option>
                                <option
                                    @if ($examen->resp_calor == 'N Normal') selected @endif>
                                    <span>N </span> Normal</a>
                                </option>
                                <option
                                    @if ($examen->resp_calor == '(-) No responde') selected @endif>
                                    <span>(-) </span> No
                                    responde</a></option>
                            </select>
                        </div>

                    </div>
                    <div
                        class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label
                                class="floating-label-activo-sm">Resp.Frio</label>
                            <select
                                id="sel_endo_resp_frio{{ $counter }}"
                                name="sel_endo_resp_frio{{ $counter }}"
                                class="form-control form-control-sm"
                                style=" font-size: 14px; color: #232020">
                                <option
                                    @if ($examen->resp_frio == 'N/R No realizada') selected @endif>
                                    <span>N/R </span> No
                                    realizada</option>
                                <option
                                    @if ($examen->resp_frio == '↑ Aumentado') selected @endif>
                                    <span>↑ </span> Aumentado
                                </option>
                                <option
                                    @if ($examen->resp_frio == '↓ Disminuido') selected @endif>
                                    <span>↓ </span> Disminuido
                                </option>
                                <option
                                    @if ($examen->resp_frio == 'N Normal') selected @endif>
                                    <span>N </span> Normal</a>
                                </option>
                                <option
                                    @if ($examen->resp_frio == '(-) No responde') selected @endif>
                                    <span>(-) </span> No
                                    responde</a></option>
                            </select>
                        </div>

                    </div>
                    <div
                        class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label
                                class="floating-label-activo-sm">Eléctrico</label>
                            <select
                                id="sel_endo_resp_elect{{ $counter }}"
                                name="sel_endo_resp_elect{{ $counter }}"
                                class="form-control form-control-sm"
                                style=" font-size: 14px; color: #232020">
                                <option
                                    @if ($examen->electrico == 'N/R No realizada') selected @endif>
                                    <span>N/R </span> No
                                    realizada</option>
                                <option
                                    @if ($examen->electrico == '↑ Aumentado') selected @endif>
                                    <span>↑ </span> Aumentado
                                </option>
                                <option
                                    @if ($examen->electrico == '↓ Disminuido') selected @endif>
                                    <span>↓ </span> Disminuido
                                </option>
                                <option
                                    @if ($examen->electrico == 'N Normal') selected @endif>
                                    <span>N </span> Normal</a>
                                </option>
                                <option
                                    @if ($examen->electrico == '(-) No responde') selected @endif>
                                    <span>(-) </span> No
                                    responde</a></option>
                            </select>
                        </div>
                    </div>
                    <div
                        class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label
                                class="floating-label-activo-sm">Percusión</label>
                            <select
                                id="sel_endo_resp_perc{{ $counter }}"
                                name="sel_endo_resp_perc{{ $counter }}"
                                class="form-control form-control-sm"
                                style=" font-size: 14px; color: #232020">
                                <option
                                    @if ($examen->percusion == 'N/R No realizada') selected @endif>
                                    <span>N/R </span> No
                                    realizada</option>
                                <option
                                    @if ($examen->percusion == '↑ Aumentado') selected @endif>
                                    <span>↑ </span> Aumentado
                                </option>
                                <option
                                    @if ($examen->percusion == '↓ Disminuido') selected @endif>
                                    <span>↓ </span> Disminuido
                                </option>
                                <option
                                    @if ($examen->percusion == 'N Normal') selected @endif>
                                    <span>N </span> Normal</a>
                                </option>
                                <option
                                    @if ($examen->percusion == '(-) No responde') selected @endif>
                                    <span>(-) </span> No
                                    responde</a></option>
                            </select>
                        </div>
                    </div>
                    <div
                        class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label
                                class="floating-label-activo-sm">Exploración</label>
                            <select
                                id="sel_endo_resp_expl{{ $counter }}"
                                name="sel_endo_resp_expl{{ $counter }}"
                                class="form-control form-control-sm"
                                style=" font-size: 14px; color: #232020">
                                <option
                                    @if ($examen->exploracion == 'N/R No realizada') selected @endif>
                                    <span>N/R </span> No
                                    realizada</option>
                                <option
                                    @if ($examen->exploracion == '↑ Aumentado') selected @endif>
                                    <span>↑ </span> Aumentado
                                </option>
                                <option
                                    @if ($examen->exploracion == '↓ Disminuido') selected @endif>
                                    <span>↓ </span> Disminuido
                                </option>
                                <option
                                    @if ($examen->exploracion == 'N Normal') selected @endif>
                                    <span>N </span> Normal</a>
                                </option>
                                <option
                                    @if ($examen->exploracion == '(-) No responde') selected @endif>
                                    <span>(-) </span> No
                                    responde</a></option>
                            </select>
                        </div>
                    </div>
                    <div
                        class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label
                                class="floating-label-activo-sm">Cavitaria</label>
                            <select
                                id="sel_endo_cavitaria{{ $counter }}"
                                name="sel_endo_cavitaria{{ $counter }}"
                                class="form-control form-control-sm"
                                style=" font-size: 14px; color: #232020">
                                <option
                                    @if ($examen->cavitaria == 'N/R No realizada') selected @endif>
                                    <span>N/R </span> No
                                    realizada</option>
                                <option
                                    @if ($examen->cavitaria == '↑ Aumentado') selected @endif>
                                    <span>↑ </span> Aumentado
                                </option>
                                <option
                                    @if ($examen->cavitaria == '↓ Disminuido') selected @endif>
                                    <span>↓ </span> Disminuido
                                </option>
                                <option
                                    @if ($examen->cavitaria == 'N Normal') selected @endif>
                                    <span>N </span> Normal</a>
                                </option>
                                <option
                                    @if ($examen->cavitaria == '(-) No responde') selected @endif>
                                    <span>(-) </span> No
                                    responde</a></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="button"
                class="btn btn-icon btn-danger-light-c"
                onclick="eliminar_pieza_dental_pieza({{ $examen->id }},'odontop')">X</button>
        </div>
        @php $counter++; @endphp
    </div>
@endforeach
        
        
   
