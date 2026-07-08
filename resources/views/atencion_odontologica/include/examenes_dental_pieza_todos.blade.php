@php $counter = 1; @endphp
                                        @foreach ($examenes as $examen)
                                        <div class="card">
                                            <div class="card-body">
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
                                                                <input type="text" class="form-control form-control-sm" name="ex_grl_hp{{ $counter }}" id="ex_grl_hp{{ $counter }}" value="{{ $examen->historia_anterior }}">
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
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_pieza_dental_pieza({{ $examen->id }},'gral')"><i class="feather icon-x"></i></button>
                                            </div>
                                        </div>
                                        @php $counter++; @endphp
                                        @endforeach
