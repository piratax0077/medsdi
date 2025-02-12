<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="exam_esp">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                Examen Odontológico General
            </button>
        </div>
        <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
            <div class="card-body-aten-a">
                <div class="form-row" id="form-endo-adulto">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <ul class="nav nav-tabs-aten nav-fill mb-10" id="orl_adulto" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link-aten text-reset active" id="examen_general_tab" data-toggle="tab" href="#examen_general" role="tab" aria-controls="examen_general" aria-selected="true">Dolor</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link-aten text-reset" id="ex_oral-tab" data-toggle="tab" href="#ex_oral" role="tab" aria-controls="ex_oral" aria-selected="true">Examen Oral</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link-aten text-reset" id="endo_pieza-tab" data-toggle="tab" href="#endo_pieza" role="tab" aria-controls="orl_flaringe" aria-selected="true">Examen Por Pieza</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link-aten text-reset" id="endo_boca_gral-tab" data-toggle="tab" href="#endo_boca_gral" role="tab" aria-controls="endo_boca_gral" aria-selected="true">Examen Boca General</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link-aten text-reset" id="plan_endo-tab" data-toggle="tab" href="#plan_endo" role="tab" aria-controls="cuello" aria-selected="true">Planificación de tratamiento</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="tab-content" id="odogeneral">
                                    <!--DOLOR-->
                                    <div class="tab-pane fade show active" id="examen_general" role="tabpanel" aria-labelledby="examen_general_tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body" >
                                                        <div class="row my-2" id="h_dental">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-active">Derivado por:</label>
                                                                            <input type="text" class="form-control form-control-sm" name="ex_grl_deriv" id="ex_grl_deriv" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-active">Zona de Dolor</label>
                                                                            <input type="text" class="form-control form-control-sm" name="ex_grl_zdolor" id="ex_grl_zdolor" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-active">Historia Anterior</label>
                                                                            <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_grl_hp" id="ex_grl_hp"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="contenedor_pieza_dental_odontodolor">
                                                            @php $count = 1; @endphp

                                                            @foreach ($examenes_dental as $examen)
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    {{-- <div id="h_dental" class="row my-2">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-row">
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label">Derivado por:</label>
                                                                                        <input type="text" class="form-control form-control-sm" name="ex_grl_deriv{{ $count }}" id="ex_grl_deriv{{ $count }}" value="{{ $examen->derivado_por }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label">Zona de Dolor</label>
                                                                                        <input type="text" class="form-control form-control-sm" name="ex_grl_zdolor{{ $count }}" id="ex_grl_zdolor{{ $count }}" value="{{ $examen->zona_dolor }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label">Historia Anterior</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_grl_hp{{ $count }}" id="ex_grl_hp{{ $count }}">{{ $examen->historia_anterior }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> --}}
                                                                    <div >
                                                                        <div id="pieza_dental_dolor" class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                            <input type="text" class="form-control form-control-sm" name="ex_grl_dol_pi_n{{ $count }}" id="ex_grl_dol_pi_n{{ $count }}" value="{{ $examen->numero_pieza }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Tipo de Dolor</label>
                                                                                            <select name="tipo_dolor{{ $count }}" id="tipo_dolor{{ $count }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_dolor','div_tipo_dolor','obs_tipo_dolor',3);">
                                                                                                <option @if($examen->tipo_dolor == 1) selected @endif value="1">Espontáneo</option>
                                                                                                <option @if($examen->tipo_dolor == 2) selected @endif value="2">Provocado</option>
                                                                                                <option @if($examen->tipo_dolor == 3) selected @endif value="3">Otro describir</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_tipo_dolor" style="display:none;">
                                                                                            <label class="floating-label-activo-sm">Tipo de dolor</label>
                                                                                            <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_dolor{{ $count }}" id="obs_tipo_dolor{{ $count }}">{{ $examen->observacion }}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Intensidad</label>
                                                                                            <select name="intensidad{{ $count }}" id="intensidad{{ $count }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('intensidad','div_intensidad','obs_intensidad',4);">
                                                                                                <option @if($examen->intensidad == 1) selected @endif value="1">Leve</option>
                                                                                                <option @if($examen->intensidad == 2) selected @endif value="2">Moderado</option>
                                                                                                <option @if($examen->intensidad == 3) selected @endif value="3">Intenso</option>
                                                                                                <option @if($examen->intensidad == 4) selected @endif value="4">Otro describir</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_intensidad" style="display:none;">
                                                                                            <label class="floating-label-activo-sm">Intensidad</label>
                                                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_intensidad{{ $count }}" id="obs_intensidad{{ $count }}"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Modo dolor</label>
                                                                                            <select name="modo_dolor{{ $count }}"  id="modo_dolor{{ $count }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('modo_dolor','div_modo_dolor','obs_modo_dolor',3);">
                                                                                                <option @if($examen->modo_dolor == 1) selected @endif value="1">Pulsátil</option>
                                                                                                <option @if($examen->modo_dolor == 2) selected @endif value="2">Permanente</option>
                                                                                                <option @if($examen->modo_dolor == 3) selected @endif value="3">Otro describir</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_modo_dolor" style="display:none;">
                                                                                            <label class="floating-label-activo-sm">Modo dolor</label>
                                                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_modo_dolor{{ $count }}" id="obs_modo_dolor{{ $count }}"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Localización</label>
                                                                                            <select name="loc_dolor{{ $count }}" id="loc_dolor{{ $count }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('loc_dolor','div_loc_dolor','obs_loc_dolor',3);">
                                                                                                <option selected  value="1">Localizado</option>
                                                                                                <option value="2">Referido</option>
                                                                                                <option value="3">Otro describir</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_loc_dolor" style="display:none;">
                                                                                            <label class="floating-label-activo-sm">Localización</label>
                                                                                            <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_loc_dolor{{ $count }}" id="obs_loc_dolor{{ $count }}"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Provocación del Dolor</label>
                                                                                            <select name="provocacion_dolor" data-titulo="General_endodoncia" data-seccion="General_endodoncia"  id="provocacion_dolor{{ $count }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('provocacion_dolor','div_provocacion_dolor','obs_provocacion_dolor',5);">
                                                                                                <option selected  value="1">Frío</option>
                                                                                                <option value="2">Calor</option>
                                                                                                <option value="3">Actividad</option>
                                                                                                <option value="4">Masticación</option>
                                                                                                <option value="5">Otro describir</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_provocacion_dolor" style="display:none;">
                                                                                            <label class="floating-label-activo-sm">Provocación del Dolor</label>
                                                                                            <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_provocacion_dolor{{ $count }}" id="obs_provocacion_dolor{{ $count }}"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Cuando duele</label>
                                                                                            <select name="cdo_duele{{ $count }}"  id="cdo_duele{{ $count }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cdo_duele','div_cdo_duele','obs_cdo_duele',3);">
                                                                                                <option selected  value="1">Palpación</option>
                                                                                                <option value="2">Decubito</option>
                                                                                                <option value="3">Otro describir</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_cdo_duele" style="display:none;">
                                                                                            <label class="floating-label-activo-sm">Cuando duele</label>
                                                                                            <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cdo_duele{{ $count}}" id="obs_cdo_duele{{ $count}}"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Tpo Evolución</label>
                                                                                            <select name="tpo_evolucion{{ $count }}"  id="tpo_evolucion{{ $count }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_evolucion','div_tpo_evolucion','obs_tpo_evolucion',3);">
                                                                                                <option selected  value="1">Menos de 1 Semana</option>
                                                                                                <option value="2">Más de 1 Semana</option>
                                                                                                <option value="3">Otro describir</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_tpo_evolucion" style="display:none;">
                                                                                            <label class="floating-label-activo-sm">Tpo Evolución</label>
                                                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tpo_evolucion{{ $count }}" id="obs_tpo_evolucion{{ $count }}"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Efecto Analgésicos</label>
                                                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anal_dolor{{ $count }}" id="obs_anal_dolor{{ $count }}">{{ $examen->observaciones }}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                        <button type="button" class="btn btn-icon btn-danger-light-c"
                                                                                            onclick="eliminarExamenAgregado({{ $examen->id }})"><i class="feather icon-x"></i>
                                                                                        </button>
                                                                                        {{-- <button type="button" class="btn btn-icon btn-success-light-c" onclick="agregarEvolucionPaciente()"><i class="feather icon-save"></i> </button> --}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @php $count++; @endphp
                                                            @endforeach
                                                        </div>

                                                        <div id="nueva_pieza_dental_odontodolor"></div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-4 col-md-4 mb-3">
                                                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="guardar_pieza_dental_dolor({{ $count }})" ><i class="fas fa-save"></i>Guardar</button>
                                                            <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_nueva_pieza_dental({{ $count }})">MOSTRAR NUEVA PIEZA</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!--EXAMEN  ORAL-->
                                    <div class="tab-pane fade show" id="ex_oral" role="tabpanel" aria-labelledby="ex_oral_tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                                <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                    <a class="nav-link-aten text-reset active" id="intraoral_tab" data-toggle="tab" href="#intraoral" role="tab" aria-controls="intraoral" aria-selected="true">Intra-Oral</a>
                                                                    <a class="nav-link-aten text-reset" id="extra_oral_tab" data-toggle="tab" href="#extra_oral" role="tab" aria-controls="extra_oral" aria-selected="false">Extra Oral</a>
                                                                    <a class="nav-link-aten text-reset" id="radiologia_endo_tab" data-toggle="tab" href="#radiologia_endo" role="tab" aria-controls="radiologia_endo" aria-selected="false">Ex. Radiológico</a>
                                                                    <a class="nav-link-aten text-reset" id="imagenes_dent_tab" data-toggle="tab" href="#imagenes_dent" role="tab" aria-controls="imagenes_dent" aria-selected="false">Imagenes</a>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-10 col-xl-10">
                                                                <div class="tab-content" id="v-pills-tabContent">
                                                                    <div class="tab-pane fade show active" id="intraoral" role="tabpanel" aria-labelledby="intraoral_tab">
                                                                        <div class="col-sm-12 col-md-12">
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Aspecto General</label>
                                                                                        <select name="intra_general" id="intra_general" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('intra_general','div_detalle_intra_general','det_intra_general',2)">
                                                                                            <option value="0">Seleccione</option>
                                                                                            <option value="1">Aceptable</option>
                                                                                            <option value="2">Deficiente</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"   id="div_detalle_intra_general" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Detalle Aspecto General<i>(describir)</i></label>
                                                                                        <textarea class="form-control caja-texto form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_intra_general" id="det_intra_general"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Periodonto</label>
                                                                                        <select name="periodonto" id="periodonto"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('periodonto','div_detalle_periodonto','aprec_periodonto',2)">
                                                                                            <option value="0">Seleccione</option>
                                                                                            <option value="1">Aceptable</option>
                                                                                            <option value="2">Deficiente</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"  id="div_detalle_periodonto" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Periodonto<i>(describir)</i></label>
                                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_periodonto" id="aprec_periodonto"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane fade show" id="extra_oral" role="tabpanel" aria-labelledby="extra_oral_tab">
                                                                        <div class="col-sm-12 col-md-12">
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Aumento de Volumen</label>
                                                                                        <select name="aum_vol" id="aum_vol" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('aum_vol','div_detalle_aum_vol','ex_aum_vol',2);">
                                                                                            <option value="0">Seleccione</option>
                                                                                            <option value="1">No</option>
                                                                                            <option value="2">Si<i>(describir)</i></option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_detalle_aum_vol" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Aumento de Volumen<i>(describir)</i></label>
                                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_aum_vol" id="ex_aum_vol"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Fístula</label>
                                                                                        <select name="fistula_endo" id="fistula_endo"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('fistula_endo','div_detalle_fistula_endo','ex_fistula_endo',2);">
                                                                                            <option value="0">Seleccione</option>
                                                                                            <option value="1">No</option>
                                                                                            <option value="2">Si</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"  id="div_detalle_fistula_endo" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Fístula<i>(describir)</i></label>
                                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_fistula_endo" id="ex_fistula_endo"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Adenopatías</label>
                                                                                        <select name="adenopatias" id="adenopatias"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('adenopatias','div_detalle_adenopatias','ex_adenopatias',2);">
                                                                                            <option value="0">Seleccione</option>
                                                                                            <option value="1">Normal</option>
                                                                                            <option value="2">Anormal</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"  id="div_detalle_adenopatias" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Adenopatías<i>(describir)</i></label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_adenopatias" id="ex_adenopatias"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane fade show" id="radiologia_endo" role="tabpanel" aria-labelledby="radiologia_endo_tab">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <div id="contenedor_pieza_dental_endorx">
                                                                                            <div id="pieza_dentalrx" class="row">
                                                                                                @php $counter = 0; @endphp
                                                                                                @foreach ($examenes_rx_oral as $examen)

                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <div class="card">
                                                                                                        <div class="card-body">
                                                                                                            <div class="form-row">
                                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                    <div class="form-group">
                                                                                                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                                        <input class="form-control form-control-sm" type="text" name="rx_numero_pieza{{ $counter }}" id="rx_numero_pieza{{ $counter }}" value="{{ $examen->numero_pieza }}">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                                                                                    <div class="form-group">
                                                                                                                        <label class="floating-label-activo-sm">Espacio Periodontal Apical</label>
                                                                                                                        <select name="rx_esp_peri_apical{{ $counter }}" id="rx_esp_peri_apical{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('rx_esp_peri_apical{{ $counter }}','div_detalle_rx_esp_peri_apical{{ $counter }}','det_rx_esp_peri_apical{{ $counter }}',4)">
                                                                                                                            <option value="0">Seleccione</option>
                                                                                                                            <option @if($examen->espacio_periodontal == 1) selected  @endif value="1">Normal</option>
                                                                                                                            <option @if($examen->espacio_periodontal == 2) selected  @endif value="2">Engrosado</option>
                                                                                                                            <option @if($examen->espacio_periodontal == 3) selected  @endif value="3">Ausente</option>
                                                                                                                            <option @if($examen->espacio_periodontal == 4) selected  @endif value="4">Otro</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                    <div class="form-group"   id="div_detalle_rx_esp_peri_apical{{ $counter }}" style="display:none">
                                                                                                                        <label class="floating-label-activo-sm">Espacio Periodontal Apical<i>(describir)</i></label>
                                                                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_rx_esp_peri_apical{{ $counter }}" id="det_rx_esp_peri_apical{{ $counter }}"></textarea>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                                                                                    <div class="form-group">
                                                                                                                        <label class="floating-label-activo-sm">Hueso Alveolar Apical</label>
                                                                                                                        <select name="h_apical{{ $counter }}" id="h_apical{{ $counter }}"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('h_apical{{ $counter }}','div_detalle_h_apical{{ $counter }}','aprec_h_apical{{ $counter }}',5)">
                                                                                                                            <option value="0">Seleccione</option>
                                                                                                                            <option @if($examen->hueso_alveolal == 1) selected  @endif value="1">Normal</option>
                                                                                                                            <option @if($examen->hueso_alveolal == 2) selected  @endif value="2">Zona apical Difusa</option>
                                                                                                                            <option @if($examen->hueso_alveolal == 3) selected  @endif value="3">Zona apical Corticalizada</option>
                                                                                                                            <option @if($examen->hueso_alveolal == 4) selected  @endif value="4">Osteítis Condensante</option>
                                                                                                                            <option @if($examen->hueso_alveolal == 5) selected  @endif value="5">Otro<i>(describir)</i></option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                    <div class="form-group"  id="div_detalle_h_apical{{ $counter }}" style="display:none">
                                                                                                                        <label class="floating-label-activo-sm">Hueso Alveolar Apical<i>(describir)</i></label>
                                                                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_h_apical{{ $counter }}" id="aprec_h_apical{{ $counter }}"></textarea>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                                <!--IMAGENES-->
                                                                                                            <!-- Contenedor de Imágenes -->
                                                                                                            <div class="form-row" id="contenedor_piezas_ex_oral">
                                                                                                                @if (!empty($examen->decoded_imagenes) && is_array($examen->decoded_imagenes))
                                                                                                                    @foreach ($examen->decoded_imagenes as $imagen)
                                                                                                                        @if (is_array($imagen) && isset($imagen['paths_imagenes']) && is_array($imagen['paths_imagenes']))

                                                                                                                            @foreach ($imagen['paths_imagenes'] as $path)
                                                                                                                            <div>
                                                                                                                                <a href="javascript:void(0)" onclick="amplificar_imagen('{{ $path }}')">
                                                                                                                                    <img src="{{ asset('storage/' . str_replace('\\', '', $path)) }}"  alt="Imagen del examen"  class="img-fluid mx-2 imagen_rx">
                                                                                                                                </a>

                                                                                                                                <button type="button" class="btn btn-outline-danger btn-sm my-2" onclick="eliminar_rx({{ $imagen['id']}})"><i class="fas fa-trash"></i></button>
                                                                                                                            </div>

                                                                                                                            @endforeach
                                                                                                                        @else
                                                                                                                            <p>Formato de imagen no válido.</p>
                                                                                                                        @endif
                                                                                                                    @endforeach
                                                                                                                @else
                                                                                                                    <p>No hay imágenes disponibles para este examen.</p>
                                                                                                                @endif
                                                                                                            </div>

                                                                                                        </div>
                                                                                                        <div class="card-footer">
                                                                                                            <button type="button" class="btn btn-icon btn-warning-light-c" onclick="editar_pieza_dental_rx({{ $examen->id }})"><i class="fas fa-edit"></i></button>
                                                                                                            <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_rx({{ $examen->id }})">X</button>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <hr>

                                                                                                </div>
                                                                                                @php $counter++; @endphp
                                                                                                @endforeach
                                                                                            </div>
                                                                                            <div id="contenedor_examenes_oral_rx"></div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-12">
                                                                                                    <div class="form-group">

                                                                                                        <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_nueva_pieza_ex_radio({{ $count }})">MOSTRAR NUEVA PIEZA</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane fade show" id="imagenes_dent" role="tabpanel" aria-labelledby="imagenes_dent_tab">
                                                                        <div id="contenedor_imagenes_dent">
                                                                            @php $count = 1; @endphp
                                                                            @foreach ($imagenes as $imagen)
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <div class="row mb-1">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-4 mt-2">
                                                                                                        <div class="card">
                                                                                                            <div class="card text-center" id="img">
                                                                                                            <H6>Imagenes Pre</H6>
                                                                                                            </div>
                                                                                                            <div class="card-body">
                                                                                                                <!-- Contenedor de Imágenes -->
                                                                                                                <div class="form-row" id="contenedor_piezas_ex_oral">
                                                                                                                    @if (!empty($imagen->paths_imagenes) && is_array($imagen->paths_imagenes))
                                                                                                                        @foreach ($imagen->paths_imagenes as $path)
                                                                                                                            @if (isset($path['momento']) && $path['momento'] === 'Pre')
                                                                                                                                <div>
                                                                                                                                    <!-- Botón para ampliar imagen -->
                                                                                                                                    <a href="javascript:void(0)" onclick="amplificar_imagen('{{ $path['path'] }}')">
                                                                                                                                        <img src="{{ asset('storage/' . ltrim($path['path'], '/')) }}"
                                                                                                                                            alt="Imagen del examen"
                                                                                                                                            class="img-fluid mx-2 imagen_rx">
                                                                                                                                    </a>

                                                                                                                                    <!-- Botón para eliminar imagen -->
                                                                                                                                    <button type="button"
                                                                                                                                            class="btn btn-outline-danger btn-sm my-2"
                                                                                                                                            onclick="eliminar_imagen_dental({{ $imagen->id }}, '{{ $path['path'] }}')">
                                                                                                                                        <i class="fas fa-trash"></i>
                                                                                                                                    </button>
                                                                                                                                </div>
                                                                                                                            @else
                                                                                                                            <p>No hay imágenes disponibles para este examen.</p>
                                                                                                                            @endif
                                                                                                                        @endforeach
                                                                                                                    @else
                                                                                                                        <p>No hay imágenes disponibles para este examen.</p>
                                                                                                                    @endif
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4 mt-2">
                                                                                                        <div class="card">
                                                                                                            <div class="card text-center" id="img">
                                                                                                                <H6>Imagenes Post</H6>
                                                                                                            </div>
                                                                                                            <div class="card-body">
                                                                                                                <!-- Contenedor de Imágenes -->
                                                                                                                <div class="form-row" id="contenedor_piezas_ex_oral">
                                                                                                                    @if (!empty($imagen->paths_imagenes) && is_array($imagen->paths_imagenes))
                                                                                                                        @foreach ($imagen->paths_imagenes as $path)
                                                                                                                            @if (isset($path['momento']) && $path['momento'] === 'Post')
                                                                                                                                <div>
                                                                                                                                    <!-- Botón para ampliar imagen -->
                                                                                                                                    <a href="javascript:void(0)" onclick="amplificar_imagen('{{$path['path'] }}')">
                                                                                                                                        <img src="{{ asset('storage/' . ltrim($path['path'], '/')) }}"
                                                                                                                                            alt="Imagen del examen"
                                                                                                                                            class="img-fluid mx-2 imagen_rx">
                                                                                                                                    </a>

                                                                                                                                    <!-- Botón para eliminar imagen -->
                                                                                                                                    <button type="button"
                                                                                                                                            class="btn btn-outline-danger btn-sm my-2"
                                                                                                                                            onclick="eliminar_imagen_dental({{ $imagen->id }}, '{{ $path['path'] }}')">
                                                                                                                                        <i class="fas fa-trash"></i>
                                                                                                                                    </button>
                                                                                                                                </div>
                                                                                                                            @else
                                                                                                                            <p>No hay imágenes disponibles para este examen.</p>
                                                                                                                            @endif
                                                                                                                        @endforeach
                                                                                                                    @else
                                                                                                                        <p>No hay imágenes disponibles para este examen.</p>
                                                                                                                    @endif
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4 mt-2">
                                                                                                        <div class="form-group fill">
                                                                                                            <input type="hidden" name="biopsia_odont{{ $count }}" id="biopsia_odont{{ $count }}" value="">
                                                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                                                <input type="checkbox" onchange="biopsia('odont',{{ $count }});" id="biopsia_check_odont{{ $count }}" name="biopsia_check_odont{{ $count }}" value="" @if($imagen->biopsia == 1) checked @endif disabled>
                                                                                                                <label for="biopsia_check_odont{{ $count }}" class="cr"></label>
                                                                                                            </div>
                                                                                                            <label>biopsia</label>
                                                                                                            <hr>
                                                                                                            <div class="form-group fill">
                                                                                                                <label id="" name="" class="floating-label-activo-sm">Zona y Motivo</label>
                                                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="od_biop_zona{{ $count }}" id="od_biop_zona{{ $count }}" disabled>{{ $imagen->zona_y_motivo }}</textarea>
                                                                                                            </div>
                                                                                                            <div class="form-group fill">
                                                                                                                <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                                                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_result_biopsia{{ $count }}" id="obs_result_biopsia{{ $count }}" disabled>{{ $imagen->observaciones }}</textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="card-footer">

                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 mt-2">

                                                                                                <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_imagenes({{ $imagen->id }})">X</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @php $count++; @endphp
                                                                            @endforeach
                                                                        </div>

                                                                        <div id="contenedor_nueva_imagen_dent">

                                                                        </div>
                                                                        <div class="form-row my-3">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label class="floating-label-activo-sm">Observaciones Examen Oral</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oral" id="obs_ex_oral"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-12">
                                                                                <div class="form-group">

                                                                                    <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_nuevas_imagenes_dent({{ $count }})">CARGAR NUEVAS IMAGENES</button>
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
                                    <!--EXAMEN  POR PIEZA-->
                                    <div class="tab-pane fade show" id="endo_pieza" role="tabpanel" aria-labelledby="endo_pieza-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div id="contenedor_pieza_dental_endo_gral" class="mb-3">
                                                            @php $counter = 1; @endphp
                                                            @foreach ($examenes_pieza as $examen)
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="mb-3">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp{{ $counter }}" id="n_pieza_ex_pp{{ $counter }}" value="{{ $examen->numero_pieza }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
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
                                                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
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
                                                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
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
                                                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Percusión</label>
                                                                                    <select id="sel_endo_resp_perc{{ $counter }}" name="sel_endo_resp_perc{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                                        <option @if($examen->percusion == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                                                                                        <option @if($examen->percusion == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado</option>
                                                                                        <option @if($examen->percusion == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido</option>
                                                                                        <option @if($examen->percusion == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                                                                                        <option @if($examen->percusion == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Exploración</label>
                                                                                    <select id="sel_endo_resp_expl{{ $counter }}" name="sel_endo_resp_expl{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                                        <option @if($examen->exploracion == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                                                                                        <option @if($examen->exploracion == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado</option>
                                                                                        <option @if($examen->exploracion == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido</option>
                                                                                        <option @if($examen->exploracion == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                                                                                        <option @if($examen->exploracion == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Cavitaria</label>
                                                                                    <select id="sel_endo_cavitaria{{ $counter }}" name="sel_endo_cavitaria{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                                        <option @if($examen->cavitaria == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                                                                                        <option @if($examen->cavitaria == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado</option>
                                                                                        <option @if($examen->cavitaria == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido</option>
                                                                                        <option @if($examen->cavitaria == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                                                                                        <option @if($examen->cavitaria == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_pieza({{ $examen->id }},'gral')">X</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            @php $counter++; @endphp
                                                            @endforeach
                                                        </div>
                                                        <div id="pieza_dental_examen" class="row">

                                                        </div>
                                                        <div id="contenedor_nueva_pieza_dental"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 col-md-4 mb-3">
                                                            <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_pieza_dental_examen({{ $counter++ }})" >Mostrar nueva pieza</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--EXAMEN  BOCA GENERAL-->
                                    <div class="tab-pane fade show" id="endo_boca_gral" role="tabpanel" aria-labelledby="endo_boca_gral-tab">
                                        <div class="container my-3">
                                            <div class="row mb-3">
                                                <div class="col-md-4 px-1 py-1">
                                                    <button type="button" class="btn btn-info btn-sm btn-block"
                                                        onclick="maxilar_superior()";><i class="feather icon-file-plus"></i> Maxilar superior</button>

                                                </div>
                                                <div class="col-md-4 px-1 py-1">
                                                    <button type="button" class="btn btn-info btn-sm btn-block"
                                                        onclick="maxilar_inferior()";><i class="feather icon-file-plus"></i> Maxilar  inferior</button>

                                                </div>
                                                <div class="col-md-4 px-1 py-1">
                                                    <button type="button" class="btn btn-info btn-sm btn-block"
                                                        onclick="boca_completa()";><i class="feather icon-file-plus"></i> Boca  Completa</button>

                                                </div>
                                                {{-- <div class="col-md-3 px-1 py-1">
                                                    <button type="button" class="btn btn-primary btn-sm btn-block"
                                                        onclick="prest_lab();"><i class="feather icon-file-plus"></i>Solicitud de laboratorio</button>

                                                </div> --}}
                                            </div>
                                        </div>

                                    </div>
                                    <!--PLANIFICACION TRATAMIENTO-->
                                    <div class="tab-pane fade show" id="plan_endo" role="tabpanel" aria-labelledby="plan_endo-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div id="contenedor_pieza_plan_gral">
                                                            <div id="pieza_dental" class="row">
                                                                <div class="col-sm-12 col-md-12 col-xl-12">
                                                                    <div class="tab-content" id="v-pills-tabContent">
                                                                        <div class="tab-pane fade show active" id="faringe" role="tabpanel" aria-labelledby="faringe-tab"><br>
                                                                            <div class="col-sm-12 col-md-12" >
                                                                                <div id="planificacion_examenes_gral">
                                                                                    @foreach($examenes_pieza as $e)
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                    <input type="text" class="form-control form-control-sm" value="{{ $e->numero_pieza }}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                    <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                        <option selected  value="1">Uniradicular</option>
                                                                                                        <option value="2">Biradicular</option>
                                                                                                        <option value="2">Triradicular</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Convenio</label>
                                                                                                    <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                        <option selected  value="1">Convenio</option>
                                                                                                        <option value="2">Sin Convenio</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                <div id="planificacion_max_sup_tratamientos_gral">
                                                                                    @foreach($maxilar_superior_gral_tratamientos as $e)
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">{{ $e->localizacion }}</label>
                                                                                                    <input type="text" class="form-control form-control-sm" value="{{ $e->especialidad_examen }} {{ $e->diagnostico_tratamiento }}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                    <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                        <option selected  value="1">Uniradicular</option>
                                                                                                        <option value="2">Biradicular</option>
                                                                                                        <option value="2">Triradicular</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Convenio</label>
                                                                                                    <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                        <option selected  value="1">Convenio</option>
                                                                                                        <option value="2">Sin Convenio</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                <div id="planificacion_max_sup_diagnosticos_gral">
                                                                                    @foreach($maxilar_superior_gral_diagnosticos as $e)
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">{{ $e->localizacion }}</label>
                                                                                                    <input type="text" class="form-control form-control-sm" value="{{ $e->especialidad_examen }} {{ $e->diagnostico_tratamiento }}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                    <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                        <option selected  value="1">Uniradicular</option>
                                                                                                        <option value="2">Biradicular</option>
                                                                                                        <option value="2">Triradicular</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Convenio</label>
                                                                                                    <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                        <option selected  value="1">Convenio</option>
                                                                                                        <option value="2">Sin Convenio</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                <div id="planificacion_max_inf_tratamientos_gral">
                                                                                    @foreach($maxilar_inferior_gral_tratamientos as $e)
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">{{ $e->localizacion }}</label>
                                                                                                    <input type="text" class="form-control form-control-sm" value="{{ $e->especialidad_examen }} {{ $e->diagnostico_tratamiento }}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                    <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                        <option selected  value="1">Uniradicular</option>
                                                                                                        <option value="2">Biradicular</option>
                                                                                                        <option value="2">Triradicular</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Convenio</label>
                                                                                                    <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                        <option selected  value="1">Convenio</option>
                                                                                                        <option value="2">Sin Convenio</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                <div id="planificacion_max_inf_diagnosticos_gral">
                                                                                    @foreach($maxilar_inferior_gral_diagnosticos as $e)
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">{{ $e->localizacion }}</label>
                                                                                                    <input type="text" class="form-control form-control-sm" value="{{ $e->especialidad_examen }} {{ $e->diagnostico_tratamiento }}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                    <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                        <option selected  value="1">Uniradicular</option>
                                                                                                        <option value="2">Biradicular</option>
                                                                                                        <option value="2">Triradicular</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Convenio</label>
                                                                                                    <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                        <option selected  value="1">Convenio</option>
                                                                                                        <option value="2">Sin Convenio</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                <div id="planificacion_boca_completa_tratamientos_gral">
                                                                                    @foreach($boca_completa_gral_tratamientos as $e)
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">{{ $e->localizacion }}</label>
                                                                                                    <input type="text" class="form-control form-control-sm" value="{{ $e->especialidad_examen }} {{ $e->diagnostico_tratamiento }}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                    <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                        <option selected  value="1">Uniradicular</option>
                                                                                                        <option value="2">Biradicular</option>
                                                                                                        <option value="2">Triradicular</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Convenio</label>
                                                                                                    <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                        <option selected  value="1">Convenio</option>
                                                                                                        <option value="2">Sin Convenio</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                <div id="planificacion_boca_completa_diagnosticos_gral">
                                                                                    @foreach($boca_completa_gral_diagnosticos as $e)
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">{{ $e->localizacion }}</label>
                                                                                                    <input type="text" class="form-control form-control-sm" value="{{ $e->especialidad_examen }} {{ $e->diagnostico_tratamiento }}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                    <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                        <option selected  value="1">Uniradicular</option>
                                                                                                        <option value="2">Biradicular</option>
                                                                                                        <option value="2">Triradicular</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Convenio</label>
                                                                                                    <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                        <option selected  value="1">Convenio</option>
                                                                                                        <option value="2">Sin Convenio</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12">
                                                                                <button type="button" class="btn btn-primary btn-sm" onclick="cargar_a_presupuesto('gral')">Cargar a presupuesto</button>
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
                                    <!--HOSPITALIZACION-->
                                    {{--  <div class="tab-pane fade show" id="hosp_endodoncia" role="tabpanel" aria-labelledby="hosp_endodoncia-tab">
                                        @include('general.hospitalizacion.hospitalizar')
                                    </div>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

     function mostrar_nueva_pieza_dental(counter){
            let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental') }}";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    counter: counter,
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    $('#nueva_pieza_dental_odontodolor').empty();
                    $('#nueva_pieza_dental_odontodolor').append(resp.v);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
</script>
