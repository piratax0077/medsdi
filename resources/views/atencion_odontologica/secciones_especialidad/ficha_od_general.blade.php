<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 ">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="oft" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_dent_endo_tab" data-toggle="tab" href="#atencion_dent_endo" role="tab" aria-controls="atencion_dent_endo" aria-selected="true">Atención especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="odonto_adulto_tab" data-toggle="tab" href="#odonto_adulto" role="tab" aria-controls="odonto_adulto" aria-selected="false">Odontograma</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="periodontograma_tab" data-toggle="tab" href="#periodontograma" role="tab" aria-controls="periodontograma" aria-selected="false">Evaluación-PSR</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="evaluacion_general_tab" data-toggle="tab" href="#evaluacion_general" role="tab" aria-controls="evaluacion_general" aria-selected="false">Evaluación</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="tratamiento_tab" data-toggle="tab" href="#tratamiento" role="tab" aria-controls="tratamiento" aria-selected="false">Tratamiento/Presupuesto</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="presupuesto_tab" data-toggle="tab" href="#presupuesto" role="tab" aria-controls="presupuesto" aria-selected="false">Presupuesto</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert" id="mensaje_ficha"></div>
            </div>
            <div class="col-sm-12 col-md-12">
                <form action="{{ route('dental.registrar_ficha_atencion_dental') }}" method="POST">
                    <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                    <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                    <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                    <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                    <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                    <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                    <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">
                    <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                    <input type="hidden" name="id_especialidad" id="id_especialidad" value="{{ $profesional->id_especialidad }}">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                    <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">
                    <input type="hidden" name="tipo_examen_especial" id="tipo_examen_especial" value="{{ $lista_examen_especial }}">
                    @csrf
                    <div class="tab-content" id="od_endo-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_dent_endo" role="tabpanel" aria-labelledby="atencion_dent_endo_tab">
                            <!--FORMULARIOS-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3 mb-0">
                                <!--Formulario / Menor de edad-->
                                @include('general.secciones_ficha.seccion_menor')
                                <!--Cierre: Formulario / Menor de edad-->
                            </div>
                        <!--Motivo consulta-->
                            {{--  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="motivodd">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                                            Motivo de la consulta y Examen físico general
                                        </button>
                                    </div>
                                    <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
                                        <div class="card-body-aten-a">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label-activo-sm">Motivo de consulta</label>
                                                    <input type="text" class="form-control form-control-sm" name="motivo" id="motivo">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label-activo-sm">Antecedentes Especialidad</label>
                                                    <input type="text" class="form-control form-control-sm" name="antecedentes" id="antecedentes">
                                                </div>
                                            </div>
                                            <div class="form-row" >
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                                    <label class="floating-label-activo-sm">Observaciones al Examen de la Especialidad</label>
                                                    <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico" placeholder="OBSERVACIONES DE LA CONSULTA Y EXAMEN FISICO RELEVANTE"></textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="anestesia_local_dental();">Anestesia local</button>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="hemorragia_dental();"<i class="feather icon-save"></i> Hemorragias</button>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="fractura_dental();"<i class="feather icon-save"></i> Fracturas</button>
                                                </div>
                                            </div>


                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>  --}}
                            @include('atencion_odontologica.generales.motivo_consulta')
                            <!--EXAMEN ODONT GENERAL - PARAMETROS DE CONTROL-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="exam_esp">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                            Examen Odontológico General
                                        </button>
                                    </div>
                                    <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
                                        <div class="card-body-aten-a shadow-none">
                                            <div id="form-endo-adulto">
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
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="odogeneral">
                                                            <!--DOLOR-->
                                                            <div class="tab-pane fade show active" id="examen_general" role="tabpanel" aria-labelledby="examen_general_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body" >
                                                                                <div id="h_dental" class="row my-2">
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
                                                                                            <div id="h_dental" class="row my-2">
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
                                                                                            </div>
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
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-12">
                                                                                                        <div class="form-group">

                                                                                                            <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_nuevas_imagenes_dent({{ $count }})">MOSTRAR NUEVA PIEZA</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <label class="floating-label-activo-sm">Observaciones Examen Oral</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oral" id="obs_ex_oral"></textarea>
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
                                                                                    @php $count = 1; @endphp
                                                                                    @foreach ($examenes_pieza as $examen)
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

                                                                                    @php $count++; @endphp
                                                                                    @endforeach
                                                                                </div>
                                                                                <div id="pieza_dental_examen" class="row">

                                                                                </div>
                                                                                <div id="contenedor_nueva_pieza_dental"></div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-4 col-md-4 mb-3">
                                                                                    <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_pieza_dental_examen({{ $count }})" >Mostrar nueva pieza</button>
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
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="exam_esp_end">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_end-c" aria-expanded="false" aria-controls="exam_esp_end-c">
                                            Examen especialidad Endodóncia
                                        </button>
                                    </div>
                                    <div id="exam_esp_end-c" class="collapse" aria-labelledby="exam_esp_end" data-parent="#exam_esp_end">
                                        <div class="card-body-aten-a shadow-none">
                                            <div id="form-endo-adulto">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="orl_adulto" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="examen_general_end-tab" data-toggle="tab" href="#examen_general_end" role="tab" aria-controls="examen_general_end" aria-selected="true">Dolor</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="ex_oral_end-tab" data-toggle="tab" href="#ex_oral_end" role="tab" aria-controls="ex_oral_end" aria-selected="true">Examen Oral</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="endo_pieza_end-tab" data-toggle="tab" href="#endo_pieza_end" role="tab" aria-controls="endo_pieza_end" aria-selected="true">Examen Por Pieza</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="endo_ex_boca_general-tab" data-toggle="tab" href="#endo_ex_boca_general" role="tab" aria-controls="endo_ex_boca_general" aria-selected="true">Examen Boca General</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="plan_endo_end-tab" data-toggle="tab" href="#plan_endo_end" role="tab" aria-controls="plan_endo_end" aria-selected="true">Planificación de tratamiento</a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="endo_adulto">
                                                            <!--DOLOR-->
                                                            <div class="tab-pane fade show active" id="examen_general_end" role="tabpanel" aria-labelledby="examen_general_end-tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="h_dental" class="row my-2">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="form-row">
                                                                                            <div class="col-md-4">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-active">Derivado por:</label>
                                                                                                    <input type="text" class="form-control form-control-sm" name="ex_end_derivado_por" id="ex_end_derivado_por" >
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-4">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-active">Zona de Dolor</label>
                                                                                                    <input type="text" class="form-control form-control-sm" name="ex_end_zona_dolor" id="ex_end_zona_dolor" >
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-4">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-active">Historia Anterior</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_end_hist_ant" id="ex_end_hist_ant"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="contenedor_examen_dolor_end">
                                                                                    <div class="card">

                                                                                            @if(isset($examenes_dental_end))
                                                                                            @php $count = 1; @endphp
                                                                                            @foreach ($examenes_dental_end as $examen)
                                                                                            <div class="card">
                                                                                                <div class="card-body">
                                                                                                    <div id="h_dental" class="row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <div class="form-row">
                                                                                                                <div class="form-group col-md-4">
                                                                                                                    <label class="floating-label-active">Derivado por:</label>
                                                                                                                    <input type="text" class="form-control form-control-sm" name="end_derivado_por{{ $count }}" id="end_derivado_por{{ $count }}" value="{{ $examen->derivado_por }}">
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-4">
                                                                                                                    <label class="floating-label-active">Zona de Dolor</label>
                                                                                                                    <input type="text" class="form-control form-control-sm" name="end_zona_dolor{{ $count }}" id="end_zona_dolor{{ $count }}" value="{{ $examen->zona_dolor }}">
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-4">
                                                                                                                    <label class="floating-label-active">Historia Anterior</label>
                                                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" name="end_historia_anterior{{ $count }}" id="end_historia_anterior{{ $count }}">{{ $examen->historia_anterior }}</textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

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
                                                                                                                            onclick="eliminarExamenEndAgregado({{ $examen->id }},'endo')"><i class="feather icon-x"></i>
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

                                                                                            @endif

                                                                                    </div>
                                                                                </div>
                                                                                <div id="contenedor_nuevo_examen_end"></div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-sm-4 col-md-4 mb-3">
                                                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="guardar_pieza_dental_end({{ $count }})" ><i class="fas fa-save"></i>Guardar</button>
                                                                                    <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_nueva_pieza_dental_end({{ $count }})">MOSTRAR NUEVA PIEZA</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--EXAMEN  ORAL-->
                                                            <div class="tab-pane fade show" id="ex_oral_end" role="tabpanel" aria-labelledby="ex_oral_end-tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-2">
                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                            <a class="nav-link-aten text-reset active" id="intraoral_tab" data-toggle="tab" href="#intraoral_end" role="tab" aria-controls="intraoral_end" aria-selected="true">Intra-Oral</a>
                                                                                            <a class="nav-link-aten text-reset" id="extra_oral_tab" data-toggle="tab" href="#extra_oral_end" role="tab" aria-controls="extra_oral_end" aria-selected="false">Extra Oral</a>
                                                                                            <a class="nav-link-aten text-reset" id="radiologia_endo_tab" data-toggle="tab" href="#radiologia_endo_end" role="tab" aria-controls="radiologia_endo_end" aria-selected="false">Ex. Radiológico</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-10 col-xl-10">
                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="intraoral_end" role="tabpanel" aria-labelledby="intraoral_end_tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Aspecto General</label>
                                                                                                                <select name="end_intra_general" id="end_intra_general" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('end_intra_general','end_div_detalle_intra_general','end_det_intra_general',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Aceptable</option>
                                                                                                                    <option value="2">Deficiente</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="end_div_detalle_intra_general" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Aspecto General<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="end_det_intra_general" id="end_det_intra_general"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Periodonto</label>
                                                                                                                <select name="end_periodonto" id="end_periodonto" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('end_periodonto','end_div_detalle_periodonto','end_aprec_periodonto',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Aceptable</option>
                                                                                                                    <option value="2">Deficiente</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="end_div_detalle_periodonto" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Periodonto<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="end_aprec_periodonto" id="end_aprec_periodonto"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="extra_oral_end" role="tabpanel" aria-labelledby="extra_oral_end_tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm" style="color:#CE0909;">Aumento de Volumen</label>
                                                                                                                <select name="end_aum_vol" id="end_aum_vol" data-titulo="Examen Fosa Nasal Der." data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('end_aum_vol','end_div_detalle_aum_vol','end_ex_aum_vol',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">No</option>
                                                                                                                    <option value="2">Si<i>(describir)</i></option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="end_div_detalle_aum_vol" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Aumento de Volumen<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Der." data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="end_ex_aum_vol" id="end_ex_aum_vol"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm"  style="color:rgb(41, 90, 189);">Fístula</label>
                                                                                                                <select name="end_fistula_endo" id="end_fistula_endo" data-titulo="Examen Fosa Nasal Izq." data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('end_fistula_endo','end_div_detalle_fistula_endo','end_ex_fistula_endo',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="end_div_detalle_fistula_endo" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Fístula<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Izq." data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="end_ex_fistula_endo" id="end_ex_fistula_endo"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm"  style="color:rgb(41, 90, 189);">Adenopatías</label>
                                                                                                                <select name="end_adenopatias" id="end_adenopatias" data-titulo="Examen Fosa Nasal Izq." data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('end_adenopatias','end_div_detalle_adenopatias','end_ex_adenopatias',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="end_div_detalle_adenopatias" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Adenopatías<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Izq." data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="end_ex_adenopatias" id="end_ex_adenopatias"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="radiologia_endo_end" role="tabpanel" aria-labelledby="radiologia_endo_end_tab">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="card">
                                                                                                            <div class="card-body">
                                                                                                                <div id="contenedor_pieza_dental_endorx_endo">
                                                                                                                    @php $counter = 1; @endphp
                                                                                                                    @foreach($examenes_rx_oral_end as $e)
                                                                                                                    <div id="pieza_dentalrx" class="row">
                                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                            <div class="form-row">
                                                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                                                        <input class="form-control form-control-sm" type="text" name="end_numero_pieza_{{ $counter }}"id="end_numero_pieza_{{ $counter }}" value="{{ $e->numero_pieza }}">
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <label class="floating-label-activo-sm">Espacio Periodontal Apical</label>
                                                                                                                                        <select name="end_rx_esp_peri_apical{{ $counter }}" id="end_rx_esp_peri_apical{{ $counter }}" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('end_rx_esp_peri_apical','end_div_detalle_rx_esp_peri_apical','end_det_rx_esp_peri_apical',4)">
                                                                                                                                            <option @if($e->espacio_periodontal == 0) selected @endif value="0">Seleccione</option>
                                                                                                                                            <option @if($e->espacio_periodontal == 1) selected @endif value="1">Normal</option>
                                                                                                                                            <option @if($e->espacio_periodontal == 2) selected @endif value="2">Engrosado</option>
                                                                                                                                            <option @if($e->espacio_periodontal == 3) selected @endif value="3">Ausente</option>
                                                                                                                                            <option @if($e->espacio_periodontal == 4) selected @endif value="4">Otro</option>
                                                                                                                                        </select>
                                                                                                                                    </div>
                                                                                                                                    <div class="form-group"   id="end_div_detalle_rx_esp_peri_apical" style="display:none">
                                                                                                                                        <label class="floating-label-activo-sm">Espacio Periodontal Apical<i>(describir)</i></label>
                                                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="end_det_rx_esp_peri_apical" id="end_det_rx_esp_peri_apical"></textarea>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <label class="floating-label-activo-sm">Hueso Alveolar Apical</label>
                                                                                                                                        <select name="end_h_apical{{ $counter }}" id="end_h_apical{{ $counter }}" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('end_h_apical','end_div_detalle_h_apical','end_aprec_h_apical',5)">
                                                                                                                                            <option @if($e->hueso_alveolal == 0) selected @endif value="0">Seleccione</option>
                                                                                                                                            <option @if($e->hueso_alveolal == 1) selected @endif value="1">Normal</option>
                                                                                                                                            <option @if($e->hueso_alveolal == 2) selected @endif value="2">Zona apical Difusa</option>
                                                                                                                                            <option @if($e->hueso_alveolal == 3) selected @endif value="3">Zona apical Corticalizada</option>
                                                                                                                                            <option @if($e->hueso_alveolal == 4) selected @endif value="4">Osteítis Condensante</option>
                                                                                                                                            <option @if($e->hueso_alveolal == 5) selected @endif value="5">Otro<i>(describir)</i></option>
                                                                                                                                        </select>
                                                                                                                                    </div>
                                                                                                                                    <div class="form-group"  id="div_detalle_h_apical" style="display:none">
                                                                                                                                        <label class="floating-label-activo-sm">Hueso Alveolar Apical<i>(describir)</i></label>
                                                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_h_apical" id="aprec_h_apical"></textarea>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="form-row">
                                                                                                                                <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                                                                                                    <div class="form-group">
                                                                                                                                            <label class="floating-label-activo-sm">Observaciones Examen Pieza</label>
                                                                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Nasal" data-seccion="Naríz" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="end_obs_ex_oral{{ $counter }}" id="end_obs_ex_oral{{ $counter }}">{{ $e->observaciones }}</textarea>
                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                            </div>
                                                                                                                        </div>

                                                                                                                    </div>
                                                                                                                    <!-- Contenedor de Imágenes -->
                                                                                                                    <div class="form-row" id="contenedor_piezas_ex_oral">
                                                                                                                        @if (!empty($e->decoded_imagenes) && is_array($e->decoded_imagenes))
                                                                                                                            @foreach ($e->decoded_imagenes as $imagen)
                                                                                                                                @if (is_array($imagen) && isset($imagen['paths_imagenes']) && is_array($imagen['paths_imagenes']))

                                                                                                                                    @foreach ($imagen['paths_imagenes'] as $path)
                                                                                                                                    <div>
                                                                                                                                        <a href="javascript:void(0)" onclick="amplificar_imagen('{{ $path }}')">
                                                                                                                                            <img src="{{ asset('storage/' . str_replace('\\', '', $path)) }}"  alt="Imagen del examen"  class="img-fluid mx-2 imagen_rx">
                                                                                                                                        </a>

                                                                                                                                        <button type="button" class="btn btn-outline-danger btn-sm my-2" onclick="eliminar_rx_end({{ $imagen['id']}})"><i class="fas fa-trash"></i></button>
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
                                                                                                                    @php $counter++; @endphp
                                                                                                                    <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_rx_end({{ $e->id }})">X</button>
                                                                                                                    @endforeach

                                                                                                                </div>
                                                                                                                <div id="nueva_pieza_end"></div>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="mostrar_nueva_pieza_ex_radio_end({{ $counter }})"><i class="fas fa-save"></i> Cargar Otra Pieza</button>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <label class="floating-label-activo-sm">Observaciones Examen Oral</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Nasal" data-seccion="Naríz" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="end_obs_ex_oral" id="end_obs_ex_oral"></textarea>
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
                                                            <div class="tab-pane fade show" id="endo_pieza_end" role="tabpanel" aria-labelledby="endo_pieza_end-tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="contenedor_pieza_dental_endo">
                                                                                    @php $count = 1; @endphp
                                                                                    @foreach ($examenes_pieza_end as $examen)
                                                                                    <div class="mb-3">
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                    <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp_end{{ $count }}" id="n_pieza_ex_pp_end{{ $count }}" value="{{ $examen->numero_pieza }}">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Resp.Calor</label>
                                                                                                    <select id="sel_endo_resp_calor{{ $count }}" name="sel_endo_resp_calor{{ $count }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
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
                                                                                                    <select id="sel_endo_resp_frio{{ $count }}" name="sel_endo_resp_frio{{ $count }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
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
                                                                                                    <select id="sel_endo_resp_elect{{ $count }}" name="sel_endo_resp_elect{{ $count }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
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
                                                                                                    <select id="sel_endo_resp_perc{{ $count }}" name="sel_endo_resp_perc{{ $count }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
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
                                                                                                    <select id="sel_endo_resp_expl{{ $count }}" name="sel_endo_resp_expl{{ $count }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
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
                                                                                                    <select id="sel_endo_cavitaria{{ $count }}" name="sel_endo_cavitaria{{ $count }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                                                        <option @if($examen->cavitaria == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                                                                                                        <option @if($examen->cavitaria == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado</option>
                                                                                                        <option @if($examen->cavitaria == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido</option>
                                                                                                        <option @if($examen->cavitaria == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                                                                                                        <option @if($examen->cavitaria == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_pieza({{ $examen->id }},'endo')">X</button>
                                                                                        </div>
                                                                                    </div>

                                                                                    @php $count++; @endphp
                                                                                    @endforeach
                                                                                </div>
                                                                                <div id="nueva_pieza_dental_endo"></div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-4 col-md-4 mb-3">
                                                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="mostrar_pieza_dental_examen_end({{ $count }})"><i class="fas fa-save"></i>Cargar Otra Pieza</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- EXAMEN BOCA GENERAL endo_ex_boca_general-->
                                                            <div class="tab-pane fade show" id="endo_ex_boca_general" role="tabpanel" aria-labelledby="endo_ex_boca_general-tab">
                                                                <div class="container">
                                                                    <div class="row mb-3">
                                                                        <div class="col-md-3 px-1 py-1">
                                                                            <button type="button" class="btn btn-info btn-sm btn-block" onclick="maxilar_superior_endo()" ;=""><i class="feather icon-file-plus"></i> Maxilar superior</button>

                                                                        </div>
                                                                        <div class="col-md-3 px-1 py-1">
                                                                            <button type="button" class="btn btn-info btn-sm btn-block" onclick="maxilar_inferior_endo()" ;=""><i class="feather icon-file-plus"></i> Maxilar  inferior</button>

                                                                        </div>
                                                                        <div class="col-md-3 px-1 py-1">
                                                                            <button type="button" class="btn btn-info btn-sm btn-block" onclick="boca_completa_endo()" ;=""><i class="feather icon-file-plus"></i> Boca  Completa</button>

                                                                        </div>
                                                                        <div class="col-md-3 px-1 py-1">
                                                                            <button type="button" class="btn btn-primary btn-sm btn-block" onclick="prest_lab();"><i class="feather icon-file-plus"></i>Solicitud de laboratorio</button>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--PLANIFICACION TRATAMIENTO-->
                                                            <div class="tab-pane fade show" id="plan_endo_end" role="tabpanel" aria-labelledby="plan_endo_end-tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="contenedor_pieza_plan_endo">
                                                                                    <div id="pieza_dental" class="row">
                                                                                        <div class="col-sm-12 col-md-12 col-xl-12">
                                                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                                                <div class="tab-pane fade show active" id="faringe" role="tabpanel" aria-labelledby="faringe-tab"><br>
                                                                                                    <div class="col-sm-12 col-md-12" >
                                                                                                        <div id="planificacion_examenes_endo">
                                                                                                            @foreach($examenes_pieza_end as $e)
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
                                                                                                        <div id="planificacion_max_sup_tratamientos_endo">
                                                                                                            @foreach($maxilar_superior_gral_tratamientos_endo as $e)
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
                                                                                                        <div id="planificacion_max_sup_diagnosticos_endo">
                                                                                                            @foreach($maxilar_superior_gral_diagnosticos_endo as $e)
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
                                                                                                        <div id="planificacion_max_inf_tratamientos_endo">
                                                                                                            @foreach($maxilar_inferior_gral_tratamientos_endo as $e)
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
                                                                                                        <div id="planificacion_max_inf_diagnosticos_endo">
                                                                                                            @foreach($maxilar_inferior_gral_diagnosticos_endo as $e)
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
                                                                                                        <div id="planificacion_boca_completa_tratamientos_endo">
                                                                                                            @foreach($boca_completa_gral_tratamiento_endo as $e)
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
                                                                                                        <div id="planificacion_boca_completa_diagnosticos_endo">
                                                                                                            @foreach($boca_completa_gral_diagnostico_endo as $e)
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
                                                                                                        <button type="button" class="btn btn-primary btn-sm" onclick="cargar_a_presupuesto('endo')">Cargar a presupuesto</button>
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
                                                            <div class="tab-pane fade show" id="hosp_endodoncia_end" role="tabpanel" aria-labelledby="hosp_endodoncia_end-tab">
                                                                @include('general.hospitalizacion.hospitalizar')
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="exam_od_ped">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_od_ped_c" aria-expanded="false" aria-controls="exam_od_ped_c">
                                            Examen especialidad Odontopediatría
                                        </button>
                                    </div>
                                    <div id="exam_od_ped_c" class="collapse" aria-labelledby="exam_od_ped" data-parent="#exam_od_ped">
                                        <div class="card-body-aten-a shadow-none">
                                            <div id="form-od-ped">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="orl_od_ped" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="examen_od_ped_general_tab" data-toggle="tab" href="#examen_od_ped_general" role="tab" aria-controls="examen_od_ped_general" aria-selected="true">Dolor</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="ex_oral_oped_morfologico-tab" data-toggle="tab" href="#ex_oral_oped_morfologico" role="tab" aria-controls="ex_oral_oped_morfologico" aria-selected="true">Examen Morfológico</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="ex_oral_od_ped-tab" data-toggle="tab" href="#ex_oral_od_ped" role="tab" aria-controls="ex_oral_od_ped" aria-selected="true">Examen Oral</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="endo_od_ped_pieza-tab" data-toggle="tab" href="#endo_od_ped_pieza" role="tab" aria-controls="endo_od_ped_pieza" aria-selected="true">Examen Por Pieza</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="plan_od_ped-tab" data-toggle="tab" href="#plan_od_ped" role="tab" aria-controls="plan_od_ped" aria-selected="true">Planificación de tratamiento</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="hosp_od_ped-tab" data-toggle="tab" href="#hosp_od_ped" role="tab" aria-control="hosp_od_ped" aria-selected="false">Hospitalización</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="endo_adulto">
                                                            <div class="tab-pane fade show" id="ex_oral_oped_morfologico" role="tabpanel" aria-labelledby="ex_oral_oped_morfologico_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-2">
                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                            <a class="nav-link-aten text-reset backdrop:active" id="morf_habitos_tab" data-toggle="tab" href="#morf_habitos" role="tab" aria-controls="morf_habitos" aria-selected="false">Habitos</a>
                                                                                            <a class="nav-link-aten text-reset " id="atm_tab" data-toggle="tab" href="#atm" role="tab" aria-controls="atm" aria-selected="true">ATM</a>
                                                                                            <a class="nav-link-aten text-reset" id="oclusion_tab" data-toggle="tab" href="#oclusion" role="tab" aria-controls="oclusion" aria-selected="false">Oclusión</a>
                                                                                            <a class="nav-link-aten text-reset" id="radiologia_oped_tab" data-toggle="tab" href="#radiologia_oped" role="tab" aria-controls="radiologia_oped" aria-selected="false">Ex. Rx. Panorámico</a>
                                                                                            <a class="nav-link-aten text-reset" id="fotos_oped_tab" data-toggle="tab" href="#fotos_oped" role="tab" aria-controls="fotos_oped" aria-selected="false">Fotos</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-10 col-xl-10">
                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="morf_habitos" role="tabpanel" aria-labelledby="morf_habitos_tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Bruxismo</label>
                                                                                                                <select name="op_bruxismo" id="op_bruxismo" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('op_bruxismo','div_detalle_op_bruxismo','det_op_bruxismo',4)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">SI</option>
                                                                                                                    <option value="2">NO</option>
                                                                                                                    <option value="3">NO SABE</option>
                                                                                                                    <option value="4">OTRO<label><i>(describir)</i></label></option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_detalle_op_bruxismo" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Otro General<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_op_bruxismo" id="det_op_bruxismo"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Sueño</label>
                                                                                                                <select name="op_sueno" id="op_sueno" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('op_sueno','div_detalle_op_sueno','aprec_op_sueno',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Aceptable</option>
                                                                                                                    <option value="2">Deficiente</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_op_sueno" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Sueño<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_op_sueno" id="aprec_op_sueno"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Respiración</label>
                                                                                                                <select name="op_resp" id="op_resp" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('op_resp','div_detalle_op_resp','det_op_resp',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Aceptable</option>
                                                                                                                    <option value="2">Deficiente</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_detalle_op_resp" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Deficiencia<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_op_resp" id="det_op_resp"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Interposición Lingual</label>
                                                                                                                <select name="op_interpling" id="op_interpling" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('op_interpling','div_detalle_op_interpling','aprec_op_interpling',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Noe</option>
                                                                                                                    <option value="2">Si</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_op_interpling" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Interposición Lingual<i>(describir) Tipo</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_op_interpling" id="aprec_op_interpling"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-save"></i> + Solicitar Rx de cavum Rinofaríngeo</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-save"></i> + Solicitar ic a Otorrinolaringólogo</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-save"></i> + Solicitar ic a Fonoaudiólogo</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-save"></i> + Solicitar ic a Otra Especialidad Dental</button>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show " id="atm" role="tabpanel" aria-labelledby="atm_tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">ATM (Función)</label>
                                                                                                                <select name="op_atm" id="op_atm" data-titulo="ATM" data-seccion="ATM" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('op_atm','div_detalle_op_atm','det_op_atm',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Función Normal</option>
                                                                                                                    <option value="2">Función Alterada</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_detalle_op_atm" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Función Alterada <i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="ATM (Función)" data-seccion="ATM"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_op_atm" id="det_op_atm"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Asimetrías</label>
                                                                                                                <select name="op_asim_atm" id="op_asim_atm" data-titulo="Asimetrías" data-seccion="ATM" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('op_asim_atm','div_detalle_op_asim_atm','aprec_op_asim_atm',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">NO</option>
                                                                                                                    <option value="2">SI</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_op_asim_atm" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Asimetrías<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Asimetrías<i>(describir)" data-seccion="ATM" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_op_asim_atm" id="aprec_op_asim_atm"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Resalte</label>
                                                                                                                <select name="op_resalte_atm" id="op_resalte_atm" data-titulo="Resalte" data-seccion="ATM" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('op_resalte_atm','div_detalle_op_resalte_atm','det_op_resalte_atm',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">NO</option>
                                                                                                                    <option value="2">SI</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_detalle_op_resalte_atm" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Resalte<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Resalte<i>(describir)" data-seccion="ATM"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_op_resalte_atm" id="det_op_resalte_atm"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Dolor</label>
                                                                                                                <select name="op_dolor_atm" id="op_dolor_atm" data-titulo="Dolor" data-seccion="ATM" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('op_dolor_atm','div_detalle_op_dolor_atm','aprec_op_dolor_atm',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">NO</option>
                                                                                                                    <option value="2">SI</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_op_dolor_atm" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Dolor<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Dolor Descripción" data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_op_dolor_atm" id="aprec_op_dolor_atm"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show " id="oclusion" role="tabpanel" aria-labelledby="oclusion_tab">
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-6 col-md-6 col-xl-6">
                                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" >
                                                                                                            <a class="nav-link-aten text-reset backdrop:active" id="dent_temp_tab" data-toggle="tab" href="#dent_temp" role="tab" aria-controls="dent_temp" aria-selected="false">Dentición Temporal</a>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-6 col-md-6 col-xl-6">
                                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" >
                                                                                                            {{--  <a class="nav-link-aten text-reset backdrop:active" id="dent_temp_tab" data-toggle="tab" href="#dent_temp" role="tab" aria-controls="dent_temp" aria-selected="false">Dentición Temporal</a>  --}}
                                                                                                            <a class="nav-link-aten text-reset " id="dent_permanente_tab" data-toggle="tab" href="#dent_permanente" role="tab" aria-controls="dent_permanente" aria-selected="true">Dentición Permanente</a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-12 col-xl-12">
                                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                                            <div class="tab-pane fade show active" id="dent_temp" role="tabpanel" aria-labelledby="dent_temp_tab">
                                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                                    <div class="form-row">
                                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="floating-label-activo-sm">Tipo Oclusión</label>
                                                                                                                                <select name="escalon" id="escalon" data-titulo="Escalón" data-seccion="Oclusión Temporal" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('escalon','div_detalle_escalon','det_escalon',4)">
                                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                                    <option value="1">plano terminal recto</option>
                                                                                                                                    <option value="2">escalón mesial</option>
                                                                                                                                    <option value="3">escalón distal</option>
                                                                                                                                    <option value="4">Otras Observaciones</option>
                                                                                                                                </select>

                                                                                                                            </div>
                                                                                                                            <div class="form-group"   id="div_detalle_escalon" style="display:none">
                                                                                                                                <label class="floating-label-activo-sm">Detalle Escalón<i>(describir)</i></label>
                                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Escalón" data-seccion="Oclusión Temporal"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_escalon" id="det_escalon"></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="floating-label-activo-sm">Tipo de Mordída</label>
                                                                                                                                <select name="tpo_mord" id="tpo_mord" data-titulo="Tipo mordida" data-seccion="Oclusión Temporal" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_mord','div_detalle_tpo_mord','aprec_tpo_mord',5)">
                                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                                    <option value="1">Normal</option>
                                                                                                                                    <option value="2">Invertida</option>
                                                                                                                                    <option value="3">Mordida cruzada Derecha </option>
                                                                                                                                    <option value="4">Mordida cruzada Izquierda </option>
                                                                                                                                    <option value="5">Otras Observaciones</option>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                            <div class="form-group"  id="div_detalle_tpo_mord" style="display:none">
                                                                                                                                <label class="floating-label-activo-sm">Tipo de Mordída<i>(describir)</i></label>
                                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Tipo mordida" data-seccion="Oclusión Temporal" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_tpo_mord" id="aprec_tpo_mord"></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="floating-label-activo-sm">Piezas supernumerarias</label>
                                                                                                                                <select name="supernum" id="supernum" data-titulo="supernumerarias" data-seccion="Oclusión Temporal" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('supernum','div_detalle_supernum','det_supernum',2)">
                                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                                    <option value="1">NO</option>
                                                                                                                                    <option value="2">SI</option>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                            <div class="form-group"   id="div_detalle_supernum" style="display:none">
                                                                                                                                <label class="floating-label-activo-sm">supernumerarias<i>(describir)</i></label>
                                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.supernumerarias" data-seccion="Oclusión Temporal"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_supernum" id="det_supernum"></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="floating-label-activo-sm">Otras Anomalías</label>
                                                                                                                                <select name="ot_anomalias" id="ot_anomalias" data-titulo="Otras Anomalías" data-seccion="Oclusión Temporal" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ot_anomalias','div_detalle_ot_anomalias','aprec_ot_anomalias',2)">
                                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                                    <option value="1">NO</option>
                                                                                                                                    <option value="2">SI</option>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                            <div class="form-group"  id="div_detalle_ot_anomalias" style="display:none">
                                                                                                                                <label class="floating-label-activo-sm">Otras Anomalías<i>(describir)</i></label>
                                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo=" Obs.Otras Anomalías" data-seccion="Oclusión Temporal" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_ot_anomalias" id="aprec_ot_anomalias"></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="tab-pane fade show " id="dent_permanente" role="tabpanel" aria-labelledby="dent_permanente_tab">
                                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                                    <div class="form-row">
                                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="floating-label-activo-sm">Tipo Oclusión</label>
                                                                                                                                <select name="intra_general" id="intra_general" data-titulo="Tipo Oclusión" data-seccion="Dentición Permanente" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('intra_general','div_detalle_intra_general','det_intra_general',2)">
                                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                                    <option value="1">Clase I de Angle</option>
                                                                                                                                    <option value="2">Clase II de Angle</option>
                                                                                                                                    <option value="3">Clase III de Angle</option>
                                                                                                                                    <option value="4">Observaciones</option>
                                                                                                                                </select>

                                                                                                                            </div>
                                                                                                                            <div class="form-group"   id="div_detalle_intra_general" style="display:none">
                                                                                                                                <label class="floating-label-activo-sm">Observaciones<i>(describir)</i></label>
                                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_intra_general" id="det_intra_general"></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="floating-label-activo-sm">Asimetrías</label>
                                                                                                                                <select name="periodonto" id="periodonto" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('periodonto','div_detalle_periodonto','aprec_periodonto',2)">
                                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                                    <option value="1">Aceptable</option>
                                                                                                                                    <option value="2">Deficiente</option>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                            <div class="form-group"  id="div_detalle_periodonto" style="display:none">
                                                                                                                                <label class="floating-label-activo-sm">Periodonto<i>(describir)</i></label>
                                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_periodonto" id="aprec_periodonto"></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="floating-label-activo-sm">Otro</label>
                                                                                                                                <select name="intra_general" id="intra_general" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('intra_general','div_detalle_intra_general','det_intra_general',2)">
                                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                                    <option value="1">Aceptable</option>
                                                                                                                                    <option value="2">Deficiente</option>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                            <div class="form-group"   id="div_detalle_intra_general" style="display:none">
                                                                                                                                <label class="floating-label-activo-sm">Detalle Aspecto General<i>(describir)</i></label>
                                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_intra_general" id="det_intra_general"></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="floating-label-activo-sm">Otro</label>
                                                                                                                                <select name="periodonto" id="periodonto" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('periodonto','div_detalle_periodonto','aprec_periodonto',2)">
                                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                                    <option value="1">Aceptable</option>
                                                                                                                                    <option value="2">Deficiente</option>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                            <div class="form-group"  id="div_detalle_periodonto" style="display:none">
                                                                                                                                <label class="floating-label-activo-sm">Periodonto<i>(describir)</i></label>
                                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_periodonto" id="aprec_periodonto"></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="form-row">
                                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                    <label class="floating-label-activo-sm">Observaciones Examen Oclusión</label>
                                                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Nasal" data-seccion="Naríz" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oral" id="obs_ex_oral"></textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="radiologia_oped" role="tabpanel" aria-labelledby="radiologia_oped_tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Tipo radiología</label>
                                                                                                                <select name="aum_vol" id="aum_vol" data-titulo="radiología" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('aum_vol','div_detalle_aum_vol','ex_aum_vol',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Panorámica</option>
                                                                                                                    <option value="2">Dental Simple<i>(describir pieza)</i></option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_aum_vol" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Aumento de Volumen<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Der." data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_aum_vol" id="ex_aum_vol"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Resultado radiología</label>
                                                                                                                <select name="aum_vol" id="aum_vol" data-titulo="radiología" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('aum_vol','div_detalle_aum_vol','ex_aum_vol',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">No</option>
                                                                                                                    <option value="2">Si<i>(describir)</i></option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_aum_vol" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Aumento de Volumen<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Der." data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_aum_vol" id="ex_aum_vol"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <button type="button" class="btn btn-success btn-sm btn-block" onclick="d_periodoncista1();"><i class="feather icon-file-plus"></i> Solicitar Estudio Radiológico</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="fotos_oped" role="tabpanel" aria-labelledby="fotos_oped_tab">
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-12 col-md-12">
                                                                                                        <div class="form-row">
                                                                                                            <div class="col-sm-6 col-md-6">
                                                                                                                <div class="card-a">
                                                                                                                    <div class="card-header-a" id="img">
                                                                                                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#imagenes_uro_post" aria-expanded="false" aria-controls="imagenes_uro_pre">
                                                                                                                            Imagenes Pre tratamiento
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                    <div id="imagenes_uro_pre-c" class="collapse show" aria-labelledby="imagenes_uro_pre" data-parent="#imagenes_uro_pre">
                                                                                                                        <div class="card-body-aten shadow-none">
                                                                                                                            <!-- [ Main Content ] start -->
                                                                                                                            <div class="dropzone" id="mis-imagenes-odontop-pre" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                                                            <!-- [ file-upload ] end -->
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-6 col-md-6">
                                                                                                                <div class="card-a">
                                                                                                                    <div class="card-header-a" id="img">
                                                                                                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#imagenes_uro_post" aria-expanded="false" aria-controls="imagenes_uro_post">
                                                                                                                            Imagenes Post Tratamiento
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                    <div id="imagenes_uro_post-c" class="collapse show" aria-labelledby="imagenes_uro_post" data-parent="#imagenes_uro_post">
                                                                                                                        <div class="card-body-aten shadow-none">
                                                                                                                            <!-- [ Main Content ] start -->
                                                                                                                            <div class="dropzone" id="mis-imagenes-odontop-post" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                                                            <!-- [ file-upload ] end -->
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-row">
                                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-10 pb-10">
                                                                                                                <label class="floating-label-activo-sm">Comentarios Fotos</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Fotos" data-seccion=" Fotos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_fotos_ven" id="obs_fotos_ven"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-10 pt-10">
                                                                                        <div class="form-row mb-10 pb-10 ">
                                                                                            <hr><hr>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-10 pt-10">
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <label class="floating-label-activo-sm">Observaciones Examen Morfológico</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Morfológico" data-seccion="Ex morfológico" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_op_morfologico" id="obs_ex_op_morfologico"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--DOLOR-->
                                                            <div class="tab-pane fade show active" id="examen_od_ped_general" role="tabpanel" aria-labelledby="examen_od_ped_general_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-md-4">
                                                                                            <label class="floating-label">Derivado por:</label>
                                                                                            <input type="text" class="form-control form-control-sm" name="derivado_por_odontop" id="derivado_por_odontop">
                                                                                        </div>
                                                                                        <div class="form-group col-md-4">
                                                                                            <label class="floating-label">Zona de Dolor</label>
                                                                                            <input type="text" class="form-control form-control-sm" name="zona_dolor_odontop" id="zona_dolor_odontop">
                                                                                        </div>
                                                                                        <div class="form-group col-md-4">
                                                                                            <label class="floating-label">Historia Anterior</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" name="historia_anterior_odontop" id="historia_anterior_odontop"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="contenedor_pieza_dental_od_general">
                                                                                    @php $count = 0; @endphp
                                                                                    @foreach ($examenes_dental_odontopediatria as $examen)
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div id="h_dental" class="row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="form-group col-md-4">
                                                                                                            <label class="floating-label-active">Derivado por:</label>
                                                                                                            <input type="text" class="form-control form-control-sm" name="end_derivado_por{{ $count }}" id="end_derivado_por{{ $count }}" value="{{ $examen->derivado_por }}">
                                                                                                        </div>
                                                                                                        <div class="form-group col-md-4">
                                                                                                            <label class="floating-label-active">Zona de Dolor</label>
                                                                                                            <input type="text" class="form-control form-control-sm" name="end_zona_dolor{{ $count }}" id="end_zona_dolor{{ $count }}" value="{{ $examen->zona_dolor }}">
                                                                                                        </div>
                                                                                                        <div class="form-group col-md-4">
                                                                                                            <label class="floating-label-active">Historia Anterior</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" name="end_historia_anterior{{ $count }}" id="end_historia_anterior{{ $count }}">{{ $examen->historia_anterior }}</textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

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
                                                                                                                    onclick="eliminarExamenEndAgregado({{ $examen->id }},'odontop')"><i class="feather icon-x"></i>
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
                                                                                <div id="nueva_pieza_dental_odontop"></div>
                                                                                <div class="row">
                                                                                    <div class="col-sm-4 col-md-4 mb-3">
                                                                                        <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_pieza_dental_examen_odontop({{ $count }})">MOSTRAR NUEVA PIEZA</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--EXAMEN  ORAL-->
                                                            <div class="tab-pane fade show" id="ex_oral_od_ped" role="tabpanel" aria-labelledby="ex_oral_od_ped_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-2">
                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                            <a class="nav-link-aten text-reset active" id="intraoral_odontop_tab" data-toggle="tab" href="#intraoral_odontop" role="tab" aria-controls="intraoral_odontop" aria-selected="true">Intra-Oral</a>
                                                                                            <a class="nav-link-aten text-reset" id="extraoral_odontop_tab" data-toggle="tab" href="#extraoral_odontop" role="tab" aria-controls="extraoral_odontop" aria-selected="false">Extra Oral</a>
                                                                                            <a class="nav-link-aten text-reset" id="radiologia_odontop_tab" data-toggle="tab" href="#radiologia_odontop" role="tab" aria-controls="radiologia_odontop" aria-selected="false">Ex. Radiológico por pieza</a>
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
                                                                                                                <select name="intra_general" id="intra_general" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('intra_general','div_detalle_intra_general','det_intra_general',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Aceptable</option>
                                                                                                                    <option value="2">Deficiente</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_detalle_intra_general" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Aspecto General<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_intra_general" id="det_intra_general"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Periodonto</label>
                                                                                                                <select name="periodonto" id="periodonto" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('periodonto','div_detalle_periodonto','aprec_periodonto',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Aceptable</option>
                                                                                                                    <option value="2">Deficiente</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_periodonto" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Periodonto<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_periodonto" id="aprec_periodonto"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="extraoral_odontop" role="tabpanel" aria-labelledby="extraoral_odontop_tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm" style="color:#CE0909;">Aumento de Volumen</label>
                                                                                                                <select name="aum_vol" id="aum_vol" data-titulo="Examen Fosa Nasal Der." data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('aum_vol','div_detalle_aum_vol','ex_aum_vol',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">No</option>
                                                                                                                    <option value="2">Si<i>(describir)</i></option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_aum_vol" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Aumento de Volumen<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Der." data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_aum_vol" id="ex_aum_vol"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm"  style="color:rgb(41, 90, 189);">Fístula</label>
                                                                                                                <select name="fistula_endo" id="fistula_endo" data-titulo="Examen Fosa Nasal Izq." data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('fistula_endo','div_detalle_fistula_endo','ex_fistula_endo',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_fistula_endo" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Fístula<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Izq." data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_fistula_endo" id="ex_fistula_endo"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm"  style="color:rgb(41, 90, 189);">Adenopatías</label>
                                                                                                                <select name="adenopatias" id="adenopatias" data-titulo="Examen Fosa Nasal Izq." data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('adenopatias','div_detalle_adenopatias','ex_adenopatias',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_adenopatias" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Adenopatías<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Izq." data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_adenopatias" id="ex_adenopatias"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="radiologia_odontop" role="tabpanel" aria-labelledby="radiologia_odontop_tab">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="card">
                                                                                                            <div class="card-body">
                                                                                                                <div id="contenedor_pieza_dental_odontop">
                                                                                                                    @php $count_odon = 1; @endphp
                                                                                                                    @foreach ($examenes_rx_oral_odontop as $examen)
                                                                                                                    <div class="card">
                                                                                                                        <div class="card-body">

                                                                                                                            <div >
                                                                                                                                <div id="pieza_dental_dolor" class="row">
                                                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                                        <div class="form-row">
                                                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                                                <div class="form-group">
                                                                                                                                                    <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                                                                    <input type="text" class="form-control form-control-sm" name="ex_grl_dol_pi_n{{ $count_odon }}" id="ex_grl_dol_pi_n{{ $count_odon }}" value="{{ $examen->numero_pieza }}">
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                                                <div class="form-group">
                                                                                                                                                    <label class="floating-label-activo-sm">Tipo de Dolor</label>
                                                                                                                                                    <select name="tipo_dolor{{ $count_odon }}" id="tipo_dolor{{ $count_odon }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_dolor{{ $count_odon }}','div_tipo_dolor{{ $count_odon }}','obs_tipo_dolor{{ $count_odon }}',3);">
                                                                                                                                                        <option @if($examen->tipo_dolor == 1) selected @endif value="1">Espontáneo</option>
                                                                                                                                                        <option @if($examen->tipo_dolor == 2) selected @endif value="2">Provocado</option>
                                                                                                                                                        <option @if($examen->tipo_dolor == 3) selected @endif value="3">Otro describir</option>
                                                                                                                                                    </select>
                                                                                                                                                </div>
                                                                                                                                                <div class="form-group" id="div_tipo_dolor{{ $count_odon }}" style="display:none;">
                                                                                                                                                    <label class="floating-label-activo-sm">Tipo de dolor</label>
                                                                                                                                                    <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_dolor{{ $count_odon }}" id="obs_tipo_dolor{{ $count_odon }}">{{ $examen->observacion }}</textarea>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                                                <div class="form-group">
                                                                                                                                                    <label class="floating-label-activo-sm">Intensidad</label>
                                                                                                                                                    <select name="intensidad{{ $count_odon }}" id="intensidad{{ $count_odon }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('intensidad{{ $count_odon }}','div_intensidad{{ $count_odon }}','obs_intensidad{{ $count_odon }}',4);">
                                                                                                                                                        <option @if($examen->intensidad == 1) selected @endif value="1">Leve</option>
                                                                                                                                                        <option @if($examen->intensidad == 2) selected @endif value="2">Moderado</option>
                                                                                                                                                        <option @if($examen->intensidad == 3) selected @endif value="3">Intenso</option>
                                                                                                                                                        <option @if($examen->intensidad == 4) selected @endif value="4">Otro describir</option>
                                                                                                                                                    </select>
                                                                                                                                                </div>
                                                                                                                                                <div class="form-group" id="div_intensidad{{ $count_odon }}" style="display:none;">
                                                                                                                                                    <label class="floating-label-activo-sm">Intensidad</label>
                                                                                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_intensidad{{ $count }}" id="obs_intensidad{{ $count }}"></textarea>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                                                <div class="form-group">
                                                                                                                                                    <label class="floating-label-activo-sm">Modo dolor</label>
                                                                                                                                                    <select name="modo_dolor{{ $count_odon }}"  id="modo_dolor{{ $count_odon }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('modo_dolor{{ $count_odon }}','div_modo_dolor','obs_modo_dolor',3);">
                                                                                                                                                        <option @if($examen->modo_dolor == 1) selected @endif value="1">Pulsátil</option>
                                                                                                                                                        <option @if($examen->modo_dolor == 2) selected @endif value="2">Permanente</option>
                                                                                                                                                        <option @if($examen->modo_dolor == 3) selected @endif value="3">Otro describir</option>
                                                                                                                                                    </select>
                                                                                                                                                </div>
                                                                                                                                                <div class="form-group" id="div_modo_dolor" style="display:none;">
                                                                                                                                                    <label class="floating-label-activo-sm">Modo dolor</label>
                                                                                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_modo_dolor{{ $count_odon }}" id="obs_modo_dolor{{ $count_odon }}"></textarea>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                                                <div class="form-group">
                                                                                                                                                    <label class="floating-label-activo-sm">Localización</label>
                                                                                                                                                    <select name="loc_dolor{{ $count_odon }}" id="loc_dolor{{ $count_odon }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('loc_dolor{{ $count_odon }}','div_loc_dolor','obs_loc_dolor',3);">
                                                                                                                                                        <option selected  value="1">Localizado</option>
                                                                                                                                                        <option value="2">Referido</option>
                                                                                                                                                        <option value="3">Otro describir</option>
                                                                                                                                                    </select>
                                                                                                                                                </div>
                                                                                                                                                <div class="form-group" id="div_loc_dolor" style="display:none;">
                                                                                                                                                    <label class="floating-label-activo-sm">Localización</label>
                                                                                                                                                    <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_loc_dolor{{ $count_odon }}" id="obs_loc_dolor{{ $count_odon }}"></textarea>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                                                <div class="form-group">
                                                                                                                                                    <label class="floating-label-activo-sm">Provocación del Dolor</label>
                                                                                                                                                    <select name="provocacion_dolor" data-titulo="General_endodoncia" data-seccion="General_endodoncia"  id="provocacion_dolor{{ $count_odon }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('provocacion_dolor{{ $count_odon }}','div_provocacion_dolor','obs_provocacion_dolor',5);">
                                                                                                                                                        <option selected  value="1">Frío</option>
                                                                                                                                                        <option value="2">Calor</option>
                                                                                                                                                        <option value="3">Actividad</option>
                                                                                                                                                        <option value="4">Masticación</option>
                                                                                                                                                        <option value="5">Otro describir</option>
                                                                                                                                                    </select>
                                                                                                                                                </div>
                                                                                                                                                <div class="form-group" id="div_provocacion_dolor" style="display:none;">
                                                                                                                                                    <label class="floating-label-activo-sm">Provocación del Dolor</label>
                                                                                                                                                    <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_provocacion_dolor{{ $count_odon }}" id="obs_provocacion_dolor{{ $count_odon }}"></textarea>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                        <div class="form-row">
                                                                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                                                <div class="form-group">
                                                                                                                                                    <label class="floating-label-activo-sm">Cuando duele</label>
                                                                                                                                                    <select name="cdo_duele{{ $count_odon }}"  id="cdo_duele{{ $count_odon }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cdo_duele{{ $count_odon }}','div_cdo_duele','obs_cdo_duele',3);">
                                                                                                                                                        <option selected  value="1">Palpación</option>
                                                                                                                                                        <option value="2">Decubito</option>
                                                                                                                                                        <option value="3">Otro describir</option>
                                                                                                                                                    </select>
                                                                                                                                                </div>
                                                                                                                                                <div class="form-group" id="div_cdo_duele" style="display:none;">
                                                                                                                                                    <label class="floating-label-activo-sm">Cuando duele</label>
                                                                                                                                                    <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cdo_duele{{ $count_odon}}" id="obs_cdo_duele{{ $count_odon}}"></textarea>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                                                <div class="form-group">
                                                                                                                                                    <label class="floating-label-activo-sm">Tpo Evolución</label>
                                                                                                                                                    <select name="tpo_evolucion{{ $count_odon }}"  id="tpo_evolucion{{ $count_odon }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_evolucion{{ $count_odon }}','div_tpo_evolucion','obs_tpo_evolucion',3);">
                                                                                                                                                        <option selected  value="1">Menos de 1 Semana</option>
                                                                                                                                                        <option value="2">Más de 1 Semana</option>
                                                                                                                                                        <option value="3">Otro describir</option>
                                                                                                                                                    </select>
                                                                                                                                                </div>
                                                                                                                                                <div class="form-group" id="div_tpo_evolucion" style="display:none;">
                                                                                                                                                    <label class="floating-label-activo-sm">Tpo Evolución</label>
                                                                                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tpo_evolucion{{ $count_odon }}" id="obs_tpo_evolucion{{ $count_odon }}"></textarea>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                                                                <div class="form-group">
                                                                                                                                                    <label class="floating-label-activo-sm">Efecto Analgésicos</label>
                                                                                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anal_dolor{{ $count_odon }}" id="obs_anal_dolor{{ $count_odon }}">{{ $examen->observaciones }}</textarea>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                                                <button type="button" class="btn btn-icon btn-danger-light-c"
                                                                                                                                                    onclick="eliminarExamenAgregadoRxOdontop({{ $examen->id }})"><i class="feather icon-x"></i>
                                                                                                                                                </button>
                                                                                                                                                {{-- <button type="button" class="btn btn-icon btn-success-light-c" onclick="agregarEvolucionPaciente()"><i class="feather icon-save"></i> </button> --}}
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
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

                                                                                                                    @php $count_odon++; @endphp
                                                                                                                    @endforeach

                                                                                                                </div>


                                                                                                                <div id="nueva_pieza_dental_odontop_"></div>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                        <div class="form-group">
                                                                                                                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="mostrar_nueva_pieza_oral_rx_odontop()" ><i class="fas fa-save"></i> Cargar Otra Pieza</button>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <label class="floating-label-activo-sm">Observaciones Examen Oral</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Nasal" data-seccion="Naríz" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oral" id="obs_ex_oral"></textarea>
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
                                                            <div class="tab-pane fade show" id="endo_od_ped_pieza" role="tabpanel" aria-labelledby="endo_od_ped_pieza-tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="contenedor_pieza_dental_odontop_examen">
                                                                                    @php $counter = 1; @endphp
                                                                                    @foreach ($examenes_dental_odontopediatria as $examen)
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
                                                                                            <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_pieza({{ $examen->id }},'odontop')">X</button>
                                                                                        </div>
                                                                                    </div>

                                                                                    @php $counter++; @endphp
                                                                                    @endforeach
                                                                                </div>
                                                                                <div id="nueva_pieza_dental_odontop_examen"></div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-4 col-md-4 mb-3">
                                                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="mostrar_pieza_dental_examen_odontop_({{ $counter }})"><i class="fas fa-save"></i>Cargar Otra Pieza</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--PLANIFICACION TRATAMIENTO-->
                                                            <div class="tab-pane fade show" id="plan_od_ped" role="tabpanel" aria-labelledby="plan_od_ped-tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="contenedor_pieza_plan_odontop">
                                                                                    <div id="pieza_dental" class="row">
                                                                                        <div class="col-sm-12 col-md-12 col-xl-12" >
                                                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                                                <div class="tab-pane fade show active" id="faringe" role="tabpanel" aria-labelledby="faringe-tab"><br>
                                                                                                    <div class="col-sm-12 col-md-12" id="planificacion_examenes_odontop">
                                                                                                        @foreach ($examenes_dental_odontopediatria as $examen)
                                                                                                        <div class="form-row">
                                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                                    <input type="text" class="form-control form-control-sm" value="{{ $examen->numero_pieza }}">
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
                                                                                                        <div class="col-sm-12 col-md-12">
                                                                                                            <button type="button" class="btn btn-primary btn-sm" onclick="cargar_a_presupuesto('odontop')">Cargar a presupuesto</button>
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
                                                            <!--HOSPITALIZACION-->
                                                            <div class="tab-pane fade show" id="hosp_od_ped" role="tabpanel" aria-labelledby="hosp_od_ped-tab">
                                                                @include('general.hospitalizacion.hospitalizar')
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="hospitalizar_paciente">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open " type="button" data-toggle="collapse" data-target="#hospitalizar_paciente-c" aria-expanded="false" aria-controls="hospitalizar_paciente-c">
                                            Hospitalizar Paciente
                                        </button>
                                    </div>
                                    <div id="hospitalizar_paciente-c" class="collapse" aria-labelledby="hospitalizar_paciente" data-parent="#hospitalizar_paciente">
                                        <div class="card-body-aten-a shadow-none">
                                            @include('general.hospitalizacion.hospitalizar')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--  <!--FORMULARIO / SIGNOS VITALES Y OTROS-->
                            @include('general.secciones_ficha.signos_vitales')  --}}

                            {{--  <!--CRONICOS / GES / CONFIDENCIAL -->
                            @include('general.secciones_ficha.seccion_cronicos_ges_confidencial')  --}}
                            <!--Diagnóstico-->
                            @include('general.secciones_ficha.diagnostico')
                            <!--Diagnóstico-->


                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            @include('general.secciones_ficha.seccion_receta_examen_comunes')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--GUARDAR O IMPRIMIR FICHA-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="row mb-3">
                                    <div class="col-md-12 text-center">
                                        <input type="submit" class="btn btn-info-light-c mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
                                        <input type="submit" class="btn btn-success-light-c mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
                                    </div>
                                </div>
                            </div>
                            <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
                        </div>
                        <!-- ODONTOGRAMA-->
                        <div class="tab-pane fade" id="odonto_adulto" role="tabpanel" aria-labelledby="odonto_adulto-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="gral_od_adulto" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="odon_adults_tab" data-toggle="tab" href="#odon_adults" role="tab" aria-controls="odon_adults" aria-selected="true">Odontograma Adulto</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="odon_infts_tab" data-toggle="tab" href="#odon_infts" role="tab" aria-controls="odon_infts" aria-selected="false">Odontograma Infantil</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="gral_od_adulto">
                                                            <!-ADULTO-->
                                                            <div class="tab-pane fade active show " id="odon_adults" role="tabpanel" aria-labelledby="odon_adults_tab">
                                                                @include('atencion_odontologica.generales.odontograma_adulto')
                                                            </div>
                                                            <!-NIÑOS-->
                                                            <div class="tab-pane fade" id="odon_infts" role="tabpanel" aria-labelledby="odon_infts_tab">
                                                                @include('atencion_odontologica.generales.odontograma_infantil')
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: ODONTOGRAMA--->
                        <!-- PSR-->
                        <div class="tab-pane fade" id="periodontograma" role="tabpanel" aria-labelledby="periodontograma-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="gral_od_adulto" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="periodon_adults_tab" data-toggle="tab" href="#periodon_adults" role="tab" aria-controls="periodon_adults" aria-selected="true">Periodontograma Adulto</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="periodon_infts_tab" data-toggle="tab" href="#periodon_infts" role="tab" aria-controls="periodon_infts" aria-selected="false">Periodontograma Infantil</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="gral_od_adulto">
                                                            <!-ADULTO-->
                                                            <div class="tab-pane fade active show " id="periodon_adults" role="tabpanel" aria-labelledby="periodon_adults_tab">
                                                                @include('atencion_odontologica.generales.periodontograma_ad')
                                                            </div>
                                                            <!-NIÑOS-->
                                                            <div class="tab-pane fade" id="periodon_infts" role="tabpanel" aria-labelledby="periodon_infts_tab">
                                                                @include('atencion_odontologica.generales.periodontograma_inf')
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- EVALUAION-->
                        <div class="tab-pane fade" id="evaluacion_general" role="tabpanel" aria-labelledby="evaluacion_general_tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="gral_od_adulto" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="eval_adults_tab" data-toggle="tab" href="#eval_adults" role="tab" aria-controls="eval_adults" aria-selected="true">Adulto</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_infts_tab" data-toggle="tab" href="#eval_infts" role="tab" aria-controls="eval_infts" aria-selected="false">Evaluación  Infantil</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="gral_od_adulto">
                                                            <!-ADULTO-->
                                                            <div class="tab-pane fade active show " id="eval_adults" role="tabpanel" aria-labelledby="eval_adults_tab">
                                                                @include('atencion_odontologica.generales.evaluacion_adulto')
                                                            </div>
                                                            <!-NIÑOS-->
                                                            <div class="tab-pane fade" id="eval_infts" role="tabpanel" aria-labelledby="eval_infts_tab">
                                                                @include('atencion_odontologica.generales.evaluacion_infantil')
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: EVALUACION--->
                        <!-- TRATAMIENTO-->
                        <div class="tab-pane fade" id="tratamiento" role="tabpanel" aria-labelledby="tratamiento_tab">
                           @include('atencion_odontologica.generales.tratamiento_presup')
                        </div>
                        <!--CIERRE: TRATAMIENTO--->
                        <!--CIERRE: PRESUPUESTO--->
                        <div class="tab-pane fade" id="presupuesto" role="tabpanel" aria-labelledby="presupuesto_tab">
                            @include('atencion_odontologica.generales.presupuesto')
                        </div>
                        <!--CIERRE: PRESUPUESTO--->
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>
@include('atencion_odontologica.modals.odontograma.tratamiento_boca_completa')
@include('atencion_odontologica.modals.odontograma.tratamiento_maxilar_inferior')
@include('atencion_odontologica.modals.odontograma.tratamiento_maxilar_superior')
@include('atencion_odontologica.modals.odontograma.tratamiento_laboratorio')
@include('atencion_odontologica.modals.odontograma.modal_odontograma')

@include('atencion_odontologica.modals.infantil.tratamiento_boca_completainf')
@include('atencion_odontologica.modals.infantil.tratamiento_maxilar_inferiorinf')
@include('atencion_odontologica.modals.infantil.tratamiento_maxilar_superiorinf')
@include('atencion_odontologica.modals.atencion_general.formularios_generales.m_info_lab')


@section('page-script-ficha-atencion')
<script>
    var myDropzone;
    /** MENSAJE*/
    /** CARGAR mensaje */
    $('#mensaje_ficha').html(' El campo dignóstico y la actualización del Odontograma son Obligatorio el resto es  opcional');
    $('#mensaje_ficha').show();
    setTimeout(function(){
        $('#mensaje_ficha').hide();
    }, 5000);

    $(document).ready(function() {

        myDropzone = new Dropzone("#mis-imagenes-odontop-pre", {
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
        dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",
        init: function() {
            this.on("canceled", function(file) {
                console.log("Subida cancelada");
                cargar_lista_imagenes();

                // Acceder a los archivos aceptados
                const acceptedFiles = this.getAcceptedFiles();
                console.log(acceptedFiles);
            });
        }
    });
        var myDropzoneOdontopPost = new Dropzone("#mis-imagenes-odontop-post", {
            url: "{{ route('profesional.imagen.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': CSRF_TOKEN,
            },
            acceptedFiles: "image/*",
            maxFilesize: 4, // Tamaño máximo en MB
            maxFiles: 12, // Máximo número de archivos permitidos
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",
            init: function() {
                myDropzoneOdontopPost = this;

                // Lógica adicional en la inicialización
                this.on("success", function(file, response) {
                    cargar_lista_imagenes();
                    if (file.previewElement) {
                        file.previewElement.classList.add("dz-success");
                    }
                });

                this.on("error", function(file, message) {
                    if (file.previewElement) {
                        file.previewElement.classList.add("dz-error");
                        for (let node of file.previewElement.querySelectorAll("[data-dz-errormessage]")) {
                            node.textContent = typeof message === "string" ? message : message.message || message.error;
                        }
                    }
                });

                this.on("removedfile", function(file) {
                    cargar_lista_imagenes();
                });
            }
        });

        $('#tabla_odontologico_tratamiento').DataTable({
            responsive: true,
        });
        $('#tabla_odontologicos_pieza').DataTable({
            responsive: true,
        });
        $('#tabla_aranceles').DataTable({
            responsive: true,
        });

        $('#table_odontograma').DataTable({
            responsive: true,
        });

        /* formatear rut */
        $("#solicitado_por_rut_rfl").rut({
            formatOn: 'keyup',
            minimumLength: 2,
            validateOn: 'change',
            useThousandsSeparator : false
        });

        $('#descripcion_hipotesis').keyup(function(){
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

        $("#descripcion_cie").autocomplete({
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
                $('#descripcion_cie').val(ui.item.label); // display the selected text
                $('#id_descripcion_cie').val(ui.item.value); // save selected id to input
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

        /** cronico */
        /** autocomplete de medicamentos generales */
        $("#nombre_medicamentocron").autocomplete({
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
                        console.log(data.length);
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#nombre_medicamentocron').val(ui.item.label);
                $('#id_medicamento_cronico').val(ui.item.value);
                getDosis_cronico(ui.item.value, 'dosis_cronicomes');
                return false;
            }
        });

        $('#diag_seleccionado_gral_autocomplete').autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getDiagnosticoDental') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        if( data.length == 0 )
                        {
                            $('.diagnostico_activo').hide();
                            $('.diagnostico_inactivo').show();
                        }
                        else
                        {
                            $('.diagnostico_activo').show();
                            $('.diagnostico_inactivo').hide();
                        }
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#diag_seleccionado_gral_autocomplete').val(ui.item.label);
                $('#id_medicamento_cronico').val(ui.item.value);
                return false;
            }
        });

        $('#proc_seleccionado_gral_autocomplete').autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getDiagnosticoDental') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data);

                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#proc_seleccionado_gral_autocomplete').val(ui.item.label);
                $('#id_medicamento_cronico').val(ui.item.value);

                return false;
            }
        });

        $('#diag_seleccionado_endo_autocomplete').autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getDiagnosticoDental') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        if( data.length == 0 )
                        {
                            $('.diagnostico_activo').hide();
                            $('.diagnostico_inactivo').show();
                        }
                        else
                        {
                            $('.diagnostico_activo').show();
                            $('.diagnostico_inactivo').hide();
                        }
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#diag_seleccionado_endo_autocomplete').val(ui.item.label);
                return false;
            }
        });

        $('#proc_seleccionado_endo_autocomplete').autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getDiagnosticoDental') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data);

                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#proc_seleccionado_endo_autocomplete').val(ui.item.label);

                return false;
            }
        });
        $('#diag_seleccionado_max_inf_gral_autocomplete').autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getDiagnosticoDental') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data);
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#diag_seleccionado_max_inf_gral_autocomplete').val(ui.item.label);
                return false;
            }
        });

        $('#proc_seleccionado_max_inf_gral_autocomplete').autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getDiagnosticoDental') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data);

                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#proc_seleccionado_max_inf_gral_autocomplete').val(ui.item.label);

                return false;
            }
        });
        $('#diag_seleccionado_max_inf_endo_autocomplete').autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getDiagnosticoDental') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        if( data.length == 0 )
                        {
                            $('.diagnostico_activo').hide();
                            $('.diagnostico_inactivo').show();
                        }
                        else
                        {
                            $('.diagnostico_activo').show();
                            $('.diagnostico_inactivo').hide();
                        }
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#diag_seleccionado_max_inf_endo_autocomplete').val(ui.item.label);
                return false;
            }
        });

        $('#proc_seleccionado_max_inf_endo_autocomplete').autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getDiagnosticoDental') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data);

                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#proc_seleccionado_max_inf_gral_autocomplete').val(ui.item.label);

                return false;
            }
        });

        $('#diag_seleccionado_boca_compl_gral_autocomplete').autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getDiagnosticoDental') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        if( data.length == 0 )
                        {
                            $('.diagnostico_activo').hide();
                            $('.diagnostico_inactivo').show();
                        }
                        else
                        {
                            $('.diagnostico_activo').show();
                            $('.diagnostico_inactivo').hide();
                        }
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#diag_seleccionado_boca_compl_gral_autocomplete').val(ui.item.label);
                return false;
            }
        });

        $('#proc_seleccionado_boca_compl_gral_autocomplete').autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getDiagnosticoDental') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data);

                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#proc_seleccionado_boca_compl_gral_autocomplete').val(ui.item.label);

                return false;
            }
        });

        $('#diag_seleccionado_boca_compl_endo_autocomplete').autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getDiagnosticoDental') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        if( data.length == 0 )
                        {
                            $('.diagnostico_activo').hide();
                            $('.diagnostico_inactivo').show();
                        }
                        else
                        {
                            $('.diagnostico_activo').show();
                            $('.diagnostico_inactivo').hide();
                        }
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#diag_seleccionado_boca_compl_endo_autocomplete').val(ui.item.label);
                return false;
            }
        });

        $('#proc_seleccionado_boca_compl_endo_autocomplete').autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getDiagnosticoDental') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data);

                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#proc_seleccionado_boca_compl_endo_autocomplete').val(ui.item.label);

                return false;
            }
        });



        /** autocomplete de medicamentos patologia */
        $("#nombre_medicamentocron_patologia").autocomplete({
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
                        console.log(data.length);
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#nombre_medicamentocron_patologia').val(ui.item.label);
                $('#id_medicamentocron_patologia').val(ui.item.value);
                getDosis_cronico(ui.item.value, 'dosis_medicamentocron_patologia');
                return false;
            }
        });

        /** accion check confidencial */
        $('#confidencial').change(function() {
            if ($('#confidencial').is(':checked')) {
                $('#confidencial_descripcion').show();
            } else {
                $('#confidencial_descripcion').hide();
            }
        });

        /** accion check ges */
        $('#modal_ges').change(function() {
            if ($('#modal_ges').is(':checked')) {
                $('#form_ges').modal('show');
            } else {
                $('#form_ges').modal('hide');
            }
        });

        /** busqueda de diagnostico GES */
        $("#nombre_ges").autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('ges.ver') }}",
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
                $('#nombre_ges').val(ui.item.label); // display the selected text
                $('#id_ges').val(ui.item.value); // save selected id to input
                return false;
            }
        });

    });

    /** MANEJO DE IMAGENES */


    Dropzone.options.misImagenes = {
        init:function()
        {
            myDropzone = this;
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
            cargar_lista_imagenes();

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
            cargar_lista_imagenes();
            if (file.previewElement != null && file.previewElement.parentNode != null) {
                file.previewElement.parentNode.removeChild(file.previewElement);
            }
            return this._updateMaxFilesReachedClass();
        },
        canceled: function canceled(file) {
            cargar_lista_imagenes();
            return this.emit("error", file, this.options.dictUploadCanceled);
        },
    };



    var lista_imagenes = [];
    function cargar_lista_imagenes()
    {
        // console.log('--------------cargar_lista_imagenes----------------------');
        lista_imagenes = [];
        let temp  = myDropzone.getAcceptedFiles();
        $.each(temp, function( index, value )
        {
            if(value.status == "success")
            {
                if(value.xhr !== undefined)
                {
                    var img_temp = JSON.parse(value.xhr.response);
                    lista_imagenes[index] = [
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

    console.log('dropzoneando');
        var myDropzoneOdontopPre;
        Dropzone.options.misImagenesOdontopPre = {
        init:function()
        {
            myDropzoneOdontopPre = this;
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
        success: function(file, response){
            // console.log('-------------success-----------------------');
            cargar_lista_imagenes();

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
            cargar_lista_imagenes();
            if (file.previewElement != null && file.previewElement.parentNode != null) {
                file.previewElement.parentNode.removeChild(file.previewElement);
            }
            return this._updateMaxFilesReachedClass();
        },
        canceled: function canceled(file) {
            cargar_lista_imagenes();
            return this.emit("error", file, this.options.dictUploadCanceled);
        },
    }

    /** REGISTO ANTECEDENTES */
    function carga_campos_antecedente_nuevo()
    {
        if($('#tipo_antecedente').val()!='')
        {
            $('#div_campos_antecedente_nuevo').html('');
            var html = '';
            if($('#tipo_antecedente').val() == 'alergia')
            {
                html +='';

                html += '<div class="form-row">';
                html += '    <div class="form-group col-sm-6 col-md-6">';
                html += '        <label class="floating-label-activo-sm">Seleccione</label>';
                html += '        <input type="text" id="alergia_paciente" name="alergia_paciente" class="form-control form-control-sm"  value="">';
                html += '        <input type="hidden" name="id_alergia_paciente" id="id_alergia_paciente" value=""/>';
                html += '    </div>';
                html += '    <div class="form-group col-sm-6 col-md-6">';
                html += '        <label class="floating-label-activo-sm">Detalle</label>';
                html += '        <input type="text" name="alergia_comentario_paciente" id="alergia_comentario_paciente"  class="form-control form-control-sm"  value="">';
                html += '    </div>';
                html += '    <div class="form-group col-sm-6 col-md-6">';
                html += '       <button type="button" class="btn btn-success btn-sm" onclick="agregar_alergia_paciente();">Guardar</button>';
                html += '    </div>';
                html += '</div>';

                $('#div_campos_antecedente_nuevo').show();
                $('#div_campos_antecedente_nuevo').html(html);

                    /** autocompletado de alergias */
                $("#alergia_paciente").autocomplete({
                    source: function(request, response) {
                        // Fetch data
                        $.ajax({
                            url: "{{ route('alergias.ver_autocomplete') }}",
                            type: 'get',
                            dataType: "json",
                            data: {
                                search: request.term
                            },
                            success: function(data) {
                                console.log(data);
                                response(data);
                            }
                        });
                    },
                    select: function(event, ui) {
                        // Set selection
                        $('#alergia_paciente').val(ui.item.label); // display the selected text
                        $('#id_alergia_paciente').val(ui.item.value); // save selected id to input

                        return false;
                    }
                });

            }
            if($('#tipo_antecedente').val() == 'enfermedades_cronicas')
            {
                html +='';
            }
            if($('#tipo_antecedente').val() == 'anestesias')
            {
                html +='';
            }
            if($('#tipo_antecedente').val() == 'cirugia')
            {
                html +='';
            }
        }
        else
        {
            $('#div_campos_antecedente_nuevo').hide();
            $('#div_campos_antecedente_nuevo').html('');
        }
    }

    function agregar_alergia_paciente() {

        let alergia = $('#alergia_paciente').val();
        let id_alergia = $('#id_alergia_paciente').val();
        let comentario = $('#alergia_comentario_paciente').val();
        let paciente = $('#id_paciente_fc').val();
        let token = CSRF_TOKEN;
        var mensaje = '';
        var valido = 0;

        if(alergia=="")
        {
            mensaje +='Campo requerido alergia\n';
            valido = 1;
        }
        // if(id_alergia=="")
        // {
        //     mensaje +='Campo requerido id alergia\n';
        //     valido = 1;
        // }
        if(comentario=="")
        {
            mensaje +='Campo requerido Detalle\n';
            valido = 1;
        }
        if(paciente=="")
        {
            mensaje +='Campo requerido paciente\n';
            valido = 1;
        }

        if(valido == 0)
        {
            swal({
                title: "Alergia agregada correctamente. ***PENDIDENTE POR HACER***",
                icon: "success",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }
        else
        {
            swal({
                title: "Campo Requerido en registro de Alergia. ***PENDIDENTE POR HACER***",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }


        // let url = "{{ route('profesional.agregar_alergia_paciente') }}";

        // $.ajax({
        //     url: url,
        //     type: 'POST',
        //     dataType: 'json',
        //     data: {
        //         _token: CSRF_TOKEN,
        //         alergia: alergia,
        //         id_alergia: id_alergia,
        //         comentario: comentario,
        //         paciente: paciente
        //     },
        // })
        // .done(function(response) {

        //     if (response.success) {
        //         swal({
        //             title: "Alergia agregada correctamente",
        //             icon: "success",
        //             buttons: "Aceptar",
        //             DangerMode: true,
        //         });

        //         $('#alergia_paciente').val('');
        //         $('#id_alergia_paciente').val('');

        //     }
        //     else
        //     {
        //         swal({
        //             title: "Error al agregar alergia",
        //             icon: "error",
        //             buttons: "Aceptar",
        //             DangerMode: true,
        //         })
        //     }

        //     return response;
        // })
        // .fail(function() {
        //     console.log("error");
        // });

    }
    /** FIN REGISTRO ANTECEDENTES  */


    function cargarIgual(input)
    {

        let actual = $('#'+input);
        let equivalentes = $('#'+input).attr('data-input_igual').split(',');
        $.each(equivalentes, function( index, value ) {
            var equivalente = $('#'+value);
            equivalente.val(actual.val());
        });

        // let actual = $('#'+input);
        // let equivalente = $('#'+$('#'+input).attr('data-input_igual'));

        // equivalente.val(actual.val());

    }

    function evaluar_para_carga_detalle(select, div, input, valor)
    {
        var valor_select = $('#'+select+'').val();
        if(valor_select == valor) $('#'+div+'').show();
        else {
            $('#'+div+'').hide();
            $('#'+input+'').val('');
        }
    }

    function abrir_modal_guardar_tipo()
    {
        $('#modal_registrar_ficha_tipo_orl').modal('show');
        cargarSeccion('registro_f_t_orl_detalle');
    }

    function cargarSeccion(div_destino)
    {
        // var tipo = $('#'+select+'').val();
        $('#'+div_destino).html('');
        var seccion_actual = '';
        var seccion_previa = '';
        $('#form-otorrino').find('select,textarea').each(function(key, elemento){


            html ='';

            // if(seccion_previa == '' && seccion_actual == '')
            if(key == 0)
            {
                seccion_actual = $(elemento).data('seccion').trim();
                seccion_previa = $(elemento).data('seccion').trim();

                html +='<hr>';
                html +='<div class="row"><div class="col-md-12 text-center"><h6 style="color: #3e55c3;">'+seccion_actual+'</h6></div></div>';
                html +='<hr>';
            }
            else
            {
                if($(elemento).data('seccion'))
                seccion_actual = $(elemento).data('seccion').trim();
            }

            if(seccion_actual == seccion_previa)
            {
                html +='<hr>';
                html +='<div class="row"><div class="col-md-12 text-center"><h6 style="color: #3e55c3;">'+seccion_actual+'</h6></div></div>';
                html +='<hr>';
            }

            html +='<div class="row" style="margin-top:10px;">';
            if($(elemento).prop('nodeName') == 'SELECT')
            {
                if($(elemento).val() == 0)
                    $(elemento).val(1)

                html +='<div class="col-md-5">'+$(elemento).data('titulo')+'</div>';
                html +='<div class="col-md-5">';
                html +='    '+$('#'+$(elemento).attr('id')+' option:selected').text()+'';
                html +='    <input type="hidden" name="modal_agregar_tipo_'+$(elemento).attr('id')+'" id="modal_agregar_tipo_'+$(elemento).attr('id')+'" value="'+$(elemento).val()+'">';
                html +='</div>';
                html +='<div class="col-md-2"></div>';
            }
            else if($(elemento).prop('nodeName') == 'TEXTAREA')
            {
                if($(elemento).data('tipo'))
                    html +='<div class="col-md-5">'+$(elemento).data('titulo')+'</div>';
                else
                    html +='<div class="col-md-5">Detalle</div>';
                html +='<div class="col-md-5">';
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
            seccion_previa = $(elemento).data('seccion');
        });
    }

    function cambiar_div(mostrar, ocultar, label, textarea)
    {
        $('.'+mostrar).show();
        $('.'+ocultar).hide();
        $('#'+label).html( $('#'+textarea).val() );
    }

    function guardar_tipo_ficha_otorrino()
    {
        var registro_f_t_orl_nombre = $('#registro_f_t_orl_nombre').val();
        var registro_f_t_orl_descripcion = $('#registro_f_t_orl_descripcion').val();
        var _token = CSRF_TOKEN;
        if(registro_f_t_orl_nombre == ''){
            swal({
                    title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
                return false;
        }
        if(registro_f_t_orl_descripcion == ''){
            swal({
                    title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
                return false;
        }


        var data = [];
        data.registro_f_t_orl_nombre = registro_f_t_orl_nombre;
        data.registro_f_t_orl_descripcion = registro_f_t_orl_descripcion;

        $('#registro_f_t_orl_detalle').find('input,textarea').each(function(key, elemento){
            //console.log($(elemento).attr('id'));
            //console.log($(elemento).val());
            //console.log($(elemento).prop('nodeName'));
            //console.log('*******');

            data[$(elemento).attr('id')] = $(elemento).val();

        });

        console.log(data);

        url = "{{ route('profesional.ficha_tipo_otorrino') }}";
        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id_profesional : $('#id_profesional').val(),

                modal_agregar_tipo_apreciacion_auditiva :  data.modal_agregar_tipo_apreciacion_auditiva,
                modal_agregar_tipo_apreciacion_resp :  data.modal_agregar_tipo_apreciacion_resp,
                modal_agregar_tipo_disfonia :  data.modal_agregar_tipo_disfonia,
                modal_agregar_tipo_ex_boca :  data.modal_agregar_tipo_ex_boca,
                modal_agregar_tipo_examen_bio_od :  data.modal_agregar_tipo_examen_bio_od,
                modal_agregar_tipo_examen_bio_oi :  data.modal_agregar_tipo_examen_bio_oi,
                modal_agregar_tipo_examen_faringe :  data.modal_agregar_tipo_examen_faringe,
                modal_agregar_tipo_examen_fnd :  data.modal_agregar_tipo_examen_fnd,
                modal_agregar_tipo_examen_fni :  data.modal_agregar_tipo_examen_fni,
                modal_agregar_tipo_examen_laringe :  data.modal_agregar_tipo_examen_laringe,
                modal_agregar_tipo_examen_od :  data.modal_agregar_tipo_examen_od,
                modal_agregar_tipo_examen_oi :  data.modal_agregar_tipo_examen_oi,
                modal_agregar_tipo_nariz_general :  data.modal_agregar_tipo_nariz_general,
                modal_agregar_tipo_usa_audifono :  data.modal_agregar_tipo_usa_audifono,
                observaciones_aprec_auditiva_def :  data.observaciones_aprec_auditiva_def,
                observaciones_aprec_resp_def :  data.observaciones_aprec_resp_def,
                observaciones_audifono :  data.observaciones_audifono,
                observaciones_det_disfonia :  data.observaciones_det_disfonia,
                observaciones_det_nariz_general :  data.observaciones_det_nariz_general,
                observaciones_detalle_ex_boca :  data.observaciones_detalle_ex_boca,
                observaciones_ex_farige_anormal :  data.observaciones_ex_farige_anormal,
                observaciones_ex_fnd_anormal :  data.observaciones_ex_fnd_anormal,
                observaciones_ex_fni_anormal :  data.observaciones_ex_fni_anormal,
                observaciones_ex_larige_anormal :  data.observaciones_ex_larige_anormal,
                observaciones_ex_od_anormal :  data.observaciones_ex_od_anormal,
                observaciones_ex_oi_anormal :  data.observaciones_ex_oi_anormal,
                observaciones_obs_ex_biom :  data.observaciones_obs_ex_biom,
                observaciones_obs_ex_nasal :  data.observaciones_obs_ex_nasal,
                observaciones_obs_ex_oidos :  data.observaciones_obs_ex_oidos,
                observaciones_obs_ex_orl :  data.observaciones_obs_ex_orl,
                observaciones_obs_examen_bio_od :  data.observaciones_obs_examen_bio_od,
                observaciones_obs_examen_bio_oi :  data.observaciones_obs_examen_bio_oi,
                observaciones_obs_examen_laringe :  data.observaciones_obs_examen_laringe,
                registro_f_t_orl_descripcion :  data.registro_f_t_orl_descripcion,
                registro_f_t_orl_nombre :  data.registro_f_t_orl_nombre,

                modal_agregar_tipo_episodios: data.modal_agregar_tipo_episodios,
                observaciones_detalle_episodios: data.observaciones_detalle_episodios,
                modal_agregar_tipo_equilibrio: data.modal_agregar_tipo_equilibrio,
                observaciones_detalle_equilibrio: data.observaciones_detalle_equilibrio,
                modal_agregar_tipo_ng: data.modal_agregar_tipo_ng,
                observaciones_detalle_ng: data.observaciones_detalle_ng,
                modal_agregar_tipo_sint_acomp: data.modal_agregar_tipo_sint_acomp,
                observaciones_detalle_sint_acompanantes: data.observaciones_detalle_sint_acompanantes,
                modal_agregar_tipo_vertigo: data.modal_agregar_tipo_tipo_vertigo,
                observaciones_detalle_tipo_vertigo: data.observaciones_detalle_tipo_vertigo,
                observaciones_vestibular: data.observaciones_obs_vestibular,
            },
        })
        .done(function(data)
        {
            // console.log('-----------------------');
            // console.log(data);
            // console.log('-----------------------');
            if(data.estado == 1)
            {
                $('#modal_registrar_ficha_tipo_orl').modal('hide');
                swal({
                    title: "Tipo Ficha Registrado",
                    icon: "success",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
            }
            else{

                swal({
                    title: "Problema al Registrar Tipo Ficha.",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function cargar_info_ficha_tipo_orl(select, div_descripcion)
    {
        let id_ft = $('#'+select).val();
        if(id_ft == '')
        {
            $('#'+div_descripcion).html('');
            $('#form-otorrino').find('select,textarea').each(function(key, elemento){
                if($(elemento).prop('nodeName') == 'SELECT')
                {
                    $(elemento).val(0);
                }
                else
                {
                    $(elemento).val('');
                }
            });

            evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5);
            evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2);
            evaluar_para_carga_detalle('examen_oi','div_detalle_examen_oi','ex_oi_anormal',2);
            evaluar_para_carga_detalle('examen_od','div_detalle_examen_od','ex_od_anormal',2);
            evaluar_para_carga_detalle('examen_bio_oi','div_obs_examen_bio_oi','obs_examen_bio_oi',2);
            evaluar_para_carga_detalle('examen_bio_od','div_obs_examen_bio_od','obs_examen_bio_od',2);
            evaluar_para_carga_detalle('tipo_vertigo','div_detalle_tipo_vertigo','detalle_tipo_vertigo',3);
            evaluar_para_carga_detalle('sint_acomp','div_detalle_sintomas_acompanantes','detalle_sint_acompanantes',3);
            evaluar_para_carga_detalle('ng','div_detalle_ng','detalle_ng',2);
            evaluar_para_carga_detalle('episodios','div_detalle_episodios','detalle_episodios',3);
            evaluar_para_carga_detalle('equilibrio','div_detalle_equilibrio','detalle_equilibrio',2);
            evaluar_para_carga_detalle('nariz_general','div_detalle_nariz_gen','det_nariz_general',2);
            evaluar_para_carga_detalle('apreciacion_resp','div_detalle_nariz_resp','aprec_resp_def',2);
            evaluar_para_carga_detalle('examen_fni','div_detalle_examen_fni','ex_fni_anormal',2);
            evaluar_para_carga_detalle('examen_fnd','div_detalle_examen_fnd','ex_fnd_anormal',2);
            evaluar_para_carga_detalle('disfonia','div_disfonia','det_disfonia',2);
            evaluar_para_carga_detalle('ex_boca','div_detalle_ex_boca','detalle_ex_boca',2);
            evaluar_para_carga_detalle('examen_faringe','div_detalle_examen_faringe','ex_farige_anormal',2);
            evaluar_para_carga_detalle('examen_laringe','div_detalle_examen_laringe','ex_larige_anormal',2);
            return false;
        }
        $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

        url = "{{ route('profesional.buscar_ficha_tipo_otorrino') }}";
        $.ajax({

            url: url,
            type: "GET",
            data: {
                id_profesional : $('#id_profesional').val(),
                id_ficha_tipo :  id_ft,
            },
        })
        .done(function(data)
        {
            // console.log('-----------------------');
            // console.log(data);
            // console.log('-----------------------');
            if(data.estado == 1)
            {
                $.each(data.registros, function(index, value)
                {
                    // console.log(index);
                    // console.log(value);
                    // console.log($('#'+index));

                    if(index == 'id_usa_audifono')
                        index = 'usa_audifono';

                    if(index == 'id_tipo_episodios')
                        index = 'episodios';

                    if(index == 'id_tipo_equilibrio')
                        index = 'equilibrio';

                    if(index == 'id_tipo_ng')
                        index = 'ng';

                    if(index == 'id_tipo_sint_acomp')
                        index = 'sint_acomp';

                    if(index == 'id_tipo_vertigo')
                        index = 'tipo_vertigo';

                    if(index == 'obs_tipo_vertigo')
                        index = 'detalle_tipo_vertigo';

                    if(index == 'obs_sint_acomp')
                        index = 'detalle_sint_acompanantes';

                    if(index == 'obs_ng')
                        index = 'detalle_ng';

                    if(index == 'obs_episodios')
                        index = 'detalle_episodios';

                    if(index == 'obs_equilibrio')
                        index = 'detalle_equilibrio';



                    $('#'+index).val(value);
                });

                evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5);
                evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2);
                evaluar_para_carga_detalle('examen_oi','div_detalle_examen_oi','ex_oi_anormal',2);
                evaluar_para_carga_detalle('examen_od','div_detalle_examen_od','ex_od_anormal',2);
                evaluar_para_carga_detalle('examen_bio_oi','div_obs_examen_bio_oi','obs_examen_bio_oi',2);
                evaluar_para_carga_detalle('examen_bio_od','div_obs_examen_bio_od','obs_examen_bio_od',2);
                evaluar_para_carga_detalle('tipo_vertigo','div_detalle_tipo_vertigo','detalle_tipo_vertigo',3);
                evaluar_para_carga_detalle('sint_acomp','div_detalle_sintomas_acompanantes','detalle_sint_acompanantes',3);
                evaluar_para_carga_detalle('ng','div_detalle_ng','detalle_ng',2);
                evaluar_para_carga_detalle('episodios','div_detalle_episodios','detalle_episodios',3);
                evaluar_para_carga_detalle('equilibrio','div_detalle_equilibrio','detalle_equilibrio',2);
                evaluar_para_carga_detalle('nariz_general','div_detalle_nariz_gen','det_nariz_general',2);
                evaluar_para_carga_detalle('apreciacion_resp','div_detalle_nariz_resp','aprec_resp_def',2);
                evaluar_para_carga_detalle('examen_fni','div_detalle_examen_fni','ex_fni_anormal',2);
                evaluar_para_carga_detalle('examen_fnd','div_detalle_examen_fnd','ex_fnd_anormal',2);
                evaluar_para_carga_detalle('disfonia','div_disfonia','det_disfonia',2);
                evaluar_para_carga_detalle('ex_boca','div_detalle_ex_boca','detalle_ex_boca',2);
                evaluar_para_carga_detalle('examen_faringe','div_detalle_examen_faringe','ex_farige_anormal',2);
                evaluar_para_carga_detalle('examen_laringe','div_detalle_examen_laringe','ex_larige_anormal',2);

            }
            else{

                swal({
                    title: "Problema al Cargar Tipo Ficha.",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function agregar_medicamentos_ficha() {


        var rows1 = [];
        $('#tabla_medicamento_cirugia tr').each(function(i, n) {
            if (i > 0) {
                rol = {};
                var data = $(this).find("td");
                rol["id_producto"] = $.trim($(data[0]).text().split("\n").join(""));
                rol["uso_cronico"] = $.trim($(data[1]).text().split("\n").join(""));
                rol["medicamento"] = $.trim($(data[2]).text().split("\n").join(""));
                rol["presentacion"] = $.trim($(data[3]).text().split("\n").join(""));
                rol["posologia"] = $.trim($(data[4]).text().split("\n").join(""));
                rol["via_administracion"] = $.trim($(data[5]).text().split("\n").join(""));
                rol["periodo"] = $.trim($(data[6]).text().split("\n").join(""));
                rol["compra"] = $.trim($(data[7]).text().split("\n").join(""));
                rows1.push(rol);
            }
        });

        $('#medicamentos').val(JSON.stringify(rows1));


    }

    function agregar_examenes_ficha()
    {
        var rows = [];
        $('#tabla_examen_cirugia tr').each(function(i, n) {
            if (i > 0) {
                console.log(i);
                rol = {};
                var data = $(this).find("td");
                rol["nombre_examen"] = $.trim($(data[0]).text().split("\n").join(""));
                rol["tipo"] = $.trim($(data[1]).text().split("\n").join(""));
                // rol["subtipo"] = $.trim($(data[2]).text().split("\n").join(""));
                rol["prioridad"] = $.trim($(data[2]).text().split("\n").join(""));
                rol["con_contraste"] = $.trim($(data[3]).text().split("\n").join(""));
                rows.push(rol);
            }
        });
        $('#examenes').val(JSON.stringify(rows));
    }

    function cargar_profesional(rut, input_nombre, input_id, div_solicitar)
    {
        rut = $(rut).val();

        // console.log('------------------------------------');
        // console.log(rut.length);
        // console.log(rut);
        // console.log('------------------------------------');

        if(rut.length>5)
        {
            url = "{{ route('profesional.buscar') }}";
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    rut : rut,
                },
            })
            .done(function(data)
            {
                // console.log('-----------------------');
                // console.log(data);
                // console.log('-----------------------');
                if(data.estado == 1)
                {

                    if(data.registros.length>0)
                    {
                        var nombre = data.registros[0].nombre+' '+data.registros[0].apellido_uno;
                        var id = data.registros[0].id;
                        // $('#'+input_nombre).attr('readonly', true);
                        $('#'+input_nombre).val(nombre);
                        $('#'+input_id).val(id);
                        $('#'+div_solicitar).hide();
                        mensaje = '';
                        $('#div_mensaje').hide();
                        $('#mensaje_solicitado_por').html(mensaje);
                        $('#solicitado_por_nombre_rfl').val('');
                        $('#solicitado_por_apellido_rfl').val('');
                        $('#solicitado_por_telefono_rfl').val('');
                        $('#solicitado_por_email_rfl').val('');
                    }
                    else
                    {
                        mensaje = 'Profesional no encontrato, debe ingresar datos.';
                        $('#'+input_nombre).val('');
                        $('#'+input_id).val('');
                        $('#'+div_solicitar).show();
                        $('#div_mensaje').show();
                        $('#mensaje_solicitado_por').html(mensaje);
                        $('#solicitado_por_nombre_rfl').val('');
                        $('#solicitado_por_apellido_rfl').val('');
                        $('#solicitado_por_telefono_rfl').val('');
                        $('#solicitado_por_email_rfl').val('');
                        // $('#'+input_nombre).attr('readonly', true);
                    }
                }
                else
                {
                    mensaje = 'Se presento un problema en la busqueda intente nuevamente';
                    $('#div_mensaje').show();
                    $('#mensaje_solicitado_por').html(mensaje);
                    // $('#'+input_nombre).attr('readonly', false);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
        else if(rut.length==0)
        {
            $('#'+input_nombre).val('');
            // $('#'+input_nombre).attr('readonly', true);
            $('#'+input_id).val('');
            $('#'+div_solicitar).hide();
            $('#div_mensaje').hide();
            $('#mensaje_solicitado_por').html('');
        }
    }

    function actualizar_solicitado_por(input_solitado_por, input_nombre, input_apellido)
    {
        var nombre = $('#'+input_nombre).val();
        var apellido = $('#'+input_apellido).val();
        if(nombre != '' || apellido != '')
        {
            // $('#'+input_solitado_por).attr('readonly', true);
            $('#'+input_solitado_por).val($('#'+input_nombre).val()+' '+$('#'+input_apellido).val());
        }
        else
        {
            // $('#'+input_solitado_por).attr('readonly', false);
            $('#'+input_solitado_por).val();
        }
    }

    /** CRONICO */
    function getDosis_cronico(id_medicamento, div_dosis) {

        console.log(id_medicamento);

        let url = "{{ route('dental.getDosis') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {

                    id_medicamento: id_medicamento,

                },
            })
            .done(function(data) {
                console.log(data)

                if (data != null) {

                    data = JSON.parse(data);
                    console.log(data)
                    let dosis = $('#'+div_dosis);

                    dosis.find('option').remove();
                    dosis.append('<option value="0">Seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        dosis.append('<option value="' + v.dosis + '" data-id="'+v.id+'" data-cant_comp="'+v.cant_comp+'">' + v.present +
                            '</option>');
                    })

                } else {



                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

    };

    function getCantCompCronica(div_dosis, div_comp) {

        var cant_comp = $('#'+div_dosis+' option:selected').attr('data-cant_comp');
        console.log(cant_comp);

        let url = "{{ route('presentacion.getCantComp') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {

                    cant_comp: cant_comp,

                },
            })
            .done(function(data) {
                console.log(data)

                if (data != null) {

                    data = JSON.parse(data);
                    console.log(data)
                    let select_cant_comp = $('#'+div_comp);

                    select_cant_comp.find('option').remove();
                    select_cant_comp.append('<option value="0">Seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        select_cant_comp.append('<option value="' + v.id + '">' + v.cant +'</option>');
                    })
                    select_cant_comp.append('<option value="999">Otra Cantidad</option>');

                } else {



                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

    };

    function es_cronico() {
        if ($('#enf_cronico').prop('checked')) {
            $('#form_enfermedad_cronica').modal('show');
            $('#hipertension_div').hide();
            $('#control_peso_div').hide();
            $('#diabetes_div').hide();

            $('#cronicos').val('n_C');
            ver_medicamento_cronico();
            $('.medicamento_cronico_div').show();
            $('#senal_med_cronico').removeClass('fa-angle-down');
            $('#senal_med_cronico').addClass('fa-angle-up');

            cambiar_enfermedad_cronica();

        }

    }

    function cambiar_enfermedad_cronica() {

        if($('#cronicos').val() != 'n_C')
        {
            var nombre_enfermedad = $("#cronicos option:selected").text();
            $('#titulo_med_patologia').html( ('Medicamentos '+nombre_enfermedad).toUpperCase());
            $('.medicamento_patologia').show();
            $('#btn_registro_med_patologia').attr('onclick','agregar_medicamento_cronico_patologia(\''+$('#cronicos').val()+'\')');
            ver_medicamento_cronico_patologia();

            $('.medicamento_cronico_div').hide();
            $('#senal_med_cronico').addClass('fa-angle-down');
            $('#senal_med_cronico').removeClass('fa-angle-up');

            switch ($('#cronicos').val()) {
                case 'cpeso':
                    $('#hipertension_div').hide();
                    $('#control_peso_div').show();
                    $('#diabetes_div').hide();
                    $('#cinsufren').hide();
                    $('#cmtumorales').hide();
                    $('#creumato').hide();
                    $('#clitemia').hide();
                break;
                case 'chipertension':
                    $('#hipertension_div').show();
                    $('#control_peso_div').hide();
                    $('#diabetes_div').hide();
                    $('#cinsufren').hide();
                    $('#cmtumorales').hide();
                    $('#creumato').hide();
                    $('#clitemia').hide();
                    ver_control_hipertension();

                break;
                case 'cdiabet':
                    $('#hipertension_div').hide();
                    $('#control_peso_div').hide();
                    $('#diabetes_div').show();
                    $('#cinsufren').hide();
                    $('#cmtumorales').hide();
                    $('#creumato').hide();
                    $('#clitemia').hide();
                break;

                case 'cinsufren':
                    $('#hipertension_div').hide();
                    $('#control_peso_div').hide();
                    $('#diabetes_div').hide();
                    $('#cinsufren').show();
                    $('#cmtumorales').hide();
                    $('#creumato').hide();
                    $('#clitemia').hide();
                break;
                case 'cmtumorales':
                    $('#hipertension_div').hide();
                    $('#control_peso_div').hide();
                    $('#diabetes_div').hide();
                    $('#cinsufren').hide();
                    $('#cmtumorales').show();
                    $('#creumato').hide();
                    $('#clitemia').hide();
                break;
                case 'creumato':
                    $('#hipertension_div').hide();
                    $('#control_peso_div').hide();
                    $('#diabetes_div').hide();
                    $('#cinsufren').hide();
                    $('#cmtumorales').hide();
                    $('#creumato').show();
                    $('#clitemia').hide();
                break;
                case 'clitemia':
                    $('#hipertension_div').hide();
                    $('#control_peso_div').hide();
                    $('#diabetes_div').hide();
                    $('#cinsufren').hide();
                    $('#cmtumorales').hide();
                    $('#creumato').hide();
                    $('#clitemia').show();
                break;

                default:
                    break;
            }
        }
        else
        {
            $('.medicamento_patologia').hide();
            $('#hipertension_div').hide();
            $('#control_peso_div').hide();
            $('#diabetes_div').hide();

            $('#titulo_med_patologia').html( 'Medicamentos' );
        }
    }

    function registrar_control_obesidad() {

        let peso = $('#registro_peso').val();
        let variacion = $('#registro_peso_variacion').val();
        let ideal = $('#registro_peso_ideal').val();
        let url = "{{ route('ficha_medica.registrar_control_obesidad') }}";
        let hora_medica = $('#hora_medica').val();
        var validar = 0;
        var mensaje ='';

        if( peso == '' )
        {
            $('#registro_peso').focus();
            mensaje += 'Debe ingresar el Peso del Control Actual.\n';
            validar = 1;
        }
        if( variacion == '' )
        {
            $('#registro_peso_variacion').focus();
            mensaje += 'Debe ingresar la Variación.\n';
            validar = 1;
        }
        if( ideal == '' )
        {
            $('#registro_peso_ideal').focus();
            mensaje += 'Debe ingresar el Peso Ideal.\n';
            validar = 1;
        }

        if(validar == 1)
        {
            swal({
                title: "Debe ingresar todos los datos requeridos." ,
                text: mensaje,
                icon: "error",
                // buttons: "Aceptar",
                //SuccessMode: true,
            })
            return false;
        }
        else
        {
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    peso: peso,
                    variacion: variacion,
                    ideal: ideal,
                    hora_medica: hora_medica
                },
            })
            .done(function(response) {

                if (response != '') {
                    console.log(response);
                    //$('#form_control_obesidad').trigger("reset");
                    $('#mensaje').text('Se ha agregago control de obesidad correctamente');
                    $('#mensaje').show();
                    {{--  $('#form_enfermedad_cronica').modal('hide');  --}}
                    {{--  location.reload();  --}}
                    $('#registro_peso').val('');
                    $('#registro_peso_variacion').val('');
                    $('#registro_peso_ideal').val('');
                    ver_control_obesidad();
                }
            })
            .fail(function(e) {
                console.log("error");
                console.log(e);
            })
        }
    };

    function registrar_hipertension() {

        let sistolica = $('#presion_sistolica_hipertension').val();
        let diastolica = $('#presion_diastolica_hipertension').val();
        let ideal = $('#ideal_hipertension').val();
        let url = "{{ route('ficha_medica.registrar_hipertension') }}";
        let hora_medica = $('#hora_medica').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();

        var validar = 0;
        var mensaje ='';

        if( sistolica == '' )
        {
            $('#presion_sistolica_hipertension').focus();
            mensaje += 'Debe ingresar el Presión Sistólica.\n';
            validar = 1;
        }
        if( diastolica == '' )
        {
            $('#presion_diastolica_hipertension').focus();
            mensaje += 'Debe ingresar el Presión Diastólica.\n';
            validar = 1;
        }
        if( ideal == '' )
        {
            $('#ideal_hipertension').focus();
            mensaje += 'Debe ingresar el Presión Ideal.\n';
            validar = 1;
        }

        if(validar == 1)
        {
            swal({
                title: "Debe ingresar todos los datos requeridos." ,
                text: mensaje,
                icon: "error",
                // buttons: "Aceptar",
                //SuccessMode: true,
            })
            return false;
        }
        else
        {
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    sistolica: sistolica,
                    diastolica: diastolica,
                    ideal: ideal,
                    hora_medica: hora_medica,
                    id_lugar_atencion: id_lugar_atencion
                },
            })
            .done(function(response) {

                if (response != '') {
                    console.log(response);
                    //$('#form_control_obesidad').trigger("reset");
                    $('#mensaje').text('Se ha agregado control de Presión Arterial correctamente');
                    $('#mensaje').show();
                    {{--  $('#form_enfermedad_cronica').modal('hide');  --}}
                    $('#presion_sistolica_hipertension').val('');
                    $('#presion_diastolica_hipertension').val('');
                    $('#ideal_hipertension').val('');
                    ver_control_hipertension();

                }
            })
            .fail(function(e) {
                console.log("error");
                console.log(e);
            })
        }
    };

    function registrar_diabetes() {

        let peso = $('#peso_diabetes').val();
        let pies = $('#pies_diabetes').val();
        let hgac1 = $('#hga1c_diabetes').val();
        let colesterol = $('#colesterol_diabetes').val();
        let creatina = $('#creatina_diabetes').val();
        let glicosilada_postprandial = $('#glicosilada_postprandial_diabetes').val();
        let glicosinada_ayuno = $('#glicosilada_ayuno_diabetes').val();
        let url = "{{ route('ficha_medica.registrar_diabetes') }}";
        let hora_medica = $('#hora_medica').val();

        $.ajax({
                url: url,
                type: 'GET',
                data: {
                    peso: peso,
                    pies: pies,
                    hgac1: hgac1,
                    colesterol: colesterol,
                    creatina: creatina,
                    glicosilada_postprandial: glicosilada_postprandial,
                    glicosinada_ayuno: glicosinada_ayuno,
                    hora_medica: hora_medica
                },
            })
            .done(function(response) {

                if (response != '') {
                    console.log(response);
                    //$('#form_control_obesidad').trigger("reset");
                    $('#mensaje').text('Se ha agregago control de diabetes correctamente');
                    $('#mensaje').show();
                    $('#form_enfermedad_cronica').modal('hide');
                    location.reload();
                }
            })
            .fail(function(e) {
                console.log("error");
                console.log(e);
            })
    };

    function agregar_medicamento_cronico()
    {

        let url = "{{ route('medicamento_cronico.registrar') }}";


        var _token = CSRF_TOKEN;
        var id_profesional = $('#id_profesional_fc').val();
        var id_ficha_atencion = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var nombre_medicamento = $('#nombre_medicamentocron').val();
        var id_medicamento = $('#id_medicamentocron').val();
        var cantidad = $('#med_cronicomes option:selected').text()
        var tipo_enfermedad = 'cronico';

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id_profesional:id_profesional,
                id_ficha_atencion:id_ficha_atencion,
                id_paciente:id_paciente,
                nombre_medicamento:nombre_medicamento,
                id_medicamento:id_medicamento,
                cantidad:cantidad,
                tipo_enfermedad:tipo_enfermedad,
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('-----------------------');
                console.log(data);
                console.log('-----------------------');
                if(data.estado == 1)
                {
                    swal({
                        title: "Medicamento Cronico.",
                        text: "Medicamento Registrado con exito.",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    $('#nombre_medicamentocron').val('');

                    $('#dosis_cronicomes').html('<option value="0">Seleccione</option>');
                    $('#med_cronicomes').html('<option value="0">Seleccione</option>');

                    ver_medicamento_cronico();


                }
                else{

                    swal({
                        title: "Problema al Registrar Medicamento Cronico.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function ver_medicamento_cronico()
    {

        let url = "{{ route('medicamento_cronico.getRegsitros') }}";


        var _token = CSRF_TOKEN;
        var id_ficha_atencion = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();

        $.ajax({

            url: url,
            type: "GET",
            data: {
                _token: _token,
                // id_ficha_atencion:id_ficha_atencion,
                id_paciente:id_paciente,
                tipo_enfermedad:'cronico'
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('-----------------------');
                console.log(data);
                console.log('-----------------------');
                var html = '';
                html += '<thead>';
                html += '    <tr>';
                html += '        <th class="text-center align-middle">Nombre Medicamento</th>';
                html += '        <th class="text-center align-middle">Cantidad Mensual</th>';
                html += '        <th class="text-center align-middle">Acción</th>';
                html += '        <th class="text-center align-middle">Check</th>';
                html += '    </tr>';
                html += '</thead>';
                html += '<tbody>';
                if(data.estado == 1)
                {

                    $.each(data.registros, function(index, value)
                    {
                        html += '<tr>';
                        html += '    <td class="align-left align-middle">'+value.nombre_medicamento+'</td>';
                        html += '    <td class="text-center align-middle">'+value.cantidad+'</td>';
                        html += '    <td class="text-center align-middle">';
                        html += '        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_med_cronico(\''+value.id+'\');"><i class="feather icon-x"></i></button>';
                        html += '    </td>';
                        html += '    <td class="text-center align-middle">';
                        html += '        <input type="checkbox" name="medicamento_cronico_general" id="medicamento_cronico_general_'+value.id+'">';
                        html += '    </td>';
                        html += '</tr>';
                    });

                }
                else
                {

                    html += '<tr>';
                    html += '    <td class="text-center align-middle" colspan="3">SIN REGISTROS</td>';
                    html += '</tr>';

                }
                html += '</tbody>';
                $('#tabla_medicamento_cronico').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function eliminar_med_cronico(id)
    {
        let url = "{{ route('medicamento_cronico.deleteRegsitro') }}";


        var _token = CSRF_TOKEN;
        var id =id;

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id:id
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('-----------------------');
                console.log(data);
                console.log('-----------------------');
                if(data.estado == 1)
                {
                    swal({
                        title: "Medicamento Cronico.",
                        text: "Medicamento Eliminado.",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    ver_medicamento_cronico();
                }
                else{

                    swal({
                        title: "Problema al Eliminar Registro de Medicamento Cronico.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
            }
            else{

                swal({
                    title: "Problema al Eliminar Registro de Medicamento Cronico.",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    {{--  MEDICAMENTOS CRONICOS PATOLOGIA  --}}
    function agregar_medicamento_cronico_patologia(tipo)
    {

        let url = "{{ route('medicamento_cronico.registrar') }}";


        var _token = CSRF_TOKEN;
        var id_profesional = $('#id_profesional_fc').val();
        var id_ficha_atencion = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var nombre_medicamento = $('#nombre_medicamentocron_patologia').val();
        var cantidad = $('#med_cronicomes_patologia option:selected').text();
        var tipo_enfermedad = tipo;

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id_profesional:id_profesional,
                id_ficha_atencion:id_ficha_atencion,
                id_paciente:id_paciente,
                nombre_medicamento:nombre_medicamento,
                cantidad:cantidad,
                tipo_enfermedad:tipo_enfermedad,
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('-----------------------');
                console.log(data);
                console.log('-----------------------');
                if(data.estado == 1)
                {
                    swal({
                        title: "Medicamento Cronico.",
                        text: "Medicamento Registrado con exito.",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    $('#nombre_medicamentocron_patologia').val('');
                    $('#id_medicamentocron_patologia').val('');

                    $('#dosis_medicamentocron_patologia').html('<option value="0">Seleccione</option>');
                    $('#med_cronicomes_patologia').html('<option value="0">Seleccione</option>');

                    ver_medicamento_cronico_patologia()
                }
                else{

                    swal({
                        title: "Problema al Registrar Medicamento Cronico.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function ver_medicamento_cronico_patologia()
    {

        let url = "{{ route('medicamento_cronico.getRegsitros') }}";


        var _token = CSRF_TOKEN;
        var id_ficha_atencion = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var tipo_enfermedad = $('#cronicos').val();
        $('#tabla_med_patologia').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                _token: _token,
                // id_ficha_atencion:id_ficha_atencion,
                id_paciente:id_paciente,
                tipo_enfermedad:tipo_enfermedad
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('-----------------------');
                console.log(data);
                console.log('-----------------------');
                var html = '';
                html += '<thead>';
                html += '    <tr>';
                html += '        <th class="text-center align-middle">Nombre Medicamento</th>';
                html += '        <th class="text-center align-middle">Cantidad Mensual</th>';
                html += '        <th class="text-center align-middle">Acción</th>';
                html += '        <th class="text-center align-middle">Check</th>';
                html += '    </tr>';
                html += '</thead>';
                html += '<tbody>';
                if(data.estado == 1)
                {

                    $.each(data.registros, function(index, value)
                    {
                        html += '<tr>';
                        html += '    <td class="align-left align-middle">'+value.nombre_medicamento+'</td>';
                        html += '    <td class="text-center align-middle">'+value.cantidad+'</td>';
                        html += '    <td class="text-center align-middle">';
                        html += '        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_med_cronico_patologia(\''+value.id+'\');"><i class="feather icon-x"></i></button>';
                        html += '    </td>';
                        html += '    <td class="text-center align-middle">';
                        html += '        <input type="checkbox" name="medicamento_cronico_patologia" id="medicamento_cronico_patologia_'+value.id+'">';
                        html += '    </td>';
                        html += '</tr>';
                    });

                }
                else
                {

                    html += '<tr>';
                    html += '    <td class="text-center align-middle" colspan="4">SIN REGISTROS</td>';
                    html += '</tr>';

                }
                html += '</tbody>';
                $('#tabla_med_patologia').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function eliminar_med_cronico_patologia(id)
    {
        let url = "{{ route('medicamento_cronico.deleteRegsitro') }}";


        var _token = CSRF_TOKEN;
        var id =id;
        var tipo_enfermedad = $('#cronicos').val();

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id:id
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('-----------------------');
                console.log(data);
                console.log('-----------------------');
                if(data.estado == 1)
                {
                    swal({
                        title: "Medicamento Cronico.",
                        text: "Medicamento Eliminado.",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    ver_medicamento_cronico_patologia(tipo_enfermedad);
                }
                else{

                    swal({
                        title: "Problema al Eliminar Registro de Medicamento Cronico.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
            }
            else{

                swal({
                    title: "Problema al Eliminar Registro de Medicamento Cronico.",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }


    {{--  mostrar div   --}}
    function mostrar_div(div)
    {
        if ($('.'+div).is(':visible')) {
            $('.'+div).hide();
            $('#senal_med_cronico').addClass('fa-angle-down');
            $('#senal_med_cronico').removeClass('fa-angle-up');
        } else {
            $('.'+div).show();
            $('#senal_med_cronico').removeClass('fa-angle-down');
            $('#senal_med_cronico').addClass('fa-angle-up');
        }
    }


    {{--  CRONICO VER CONTROL DE HIPERTENSION  --}}
    function ver_control_hipertension()
    {

        let url = "{{ route('hipertension.getHipertension') }}";


        var _token = CSRF_TOKEN;
        var id_paciente = $('#id_paciente_fc').val();
        $('#control_hipertension').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                _token: _token,
                id_paciente:id_paciente
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('----------ver_control_hipertension-------------');
                console.log(data);
                console.log('-----------------------');
                var html = '';
                html += '<thead>';
                html += '    <tr>';
                html += '         <th class="text-center align-middle">Nº Control</th>';
                html += '         <th class="text-center align-middle">Fecha</th>';
                html += '         <th class="text-center align-middle">Presión Sistólica</th>';
                html += '         <th class="text-center align-middle">Presión Diastólica</th>';
                html += '         <th class="text-center align-middle">Presión Ideal</th>';
                html += '    </tr>';
                html += '</thead>';
                html += '<tbody>';
                if(data.estado == 1)
                {

                    $.each(data.registros, function(index, value)
                    {
                        var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                        var fecha = new Date(f_temp);
                        fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear()+' '+fecha.getHours()+':'+fecha.getMinutes();

                        html += '<tr>';
                        html += '    <td class="text-center align-middle">'+value.id+'</td>';
                        html += '    <td class="text-center align-middle">'+fecha+'</td>';
                        html += '    <td class="text-center align-middle">'+value.sistolica+'</td>';
                        html += '    <td class="text-center align-middle">'+value.diastolica+'</td>';
                        html += '    <td class="text-center align-middle">'+value.ideal+'</td>';
                        html += '</tr>';
                    });

                }
                else
                {

                    html += '<tr>';
                    html += '    <td class="text-center align-middle" colspan="5">SIN REGISTROS</td>';
                    html += '</tr>';

                }
                html += '</tbody>';
                $('#control_hipertension').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    {{--  CRONICO VER CONTROL DE OBESIDAD  --}}
    function ver_control_obesidad()
    {

        let url = "{{ route('control_obesidad.getControlObesidad') }}";


        var _token = CSRF_TOKEN;
        var id_paciente = $('#id_paciente_fc').val();
        $('#control_obesidad').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                _token: _token,
                id_paciente:id_paciente
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('----------ver_control_hipertension-------------');
                console.log(data);
                console.log('-----------------------');
                var html = '';
                html += '<thead>';
                html += '    <tr>';
                html += '    <th class="text-center align-middle">Nº Control</th>';
                html += '    <th class="text-center align-middle">Fecha</th>';
                html += '    <th class="text-center align-middle">Peso</th>';
                html += '    <th class="text-center align-middle">Variación</th>';
                html += '    <th class="text-center align-middle">Peso Ideal</th>';
                html += '    <!-- <th class="text-center align-middle">Acción</th>-->';
                html += '</tr>';
                html += '</thead>';
                html += '<tbody>';
                if(data.estado == 1)
                {

                    $.each(data.registros, function(index, value)
                    {
                        var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                        var fecha = new Date(f_temp);
                        fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear();


                        html += '<tr>';
                        html += '    <td class="text-center align-middle">'+value.id+'</td>';
                        html += '    <td class="text-center align-middle">'+fecha+'</td>';
                        html += '    <td class="text-center align-middle">'+value.peso+'</td>';
                        html += '    <td class="text-center align-middle">'+value.variacion+'</td>';
                        html += '    <td class="text-center align-middle">'+value.ideal+'</td>';
                        html += '    <!--<td class="text-center align-middle"><button href="#!" class="btn btn-danger btn-sm"><i class="feather icon-x"></i> Eliminar</button></td>-->';
                        html += '</tr>';
                    });

                }
                else
                {

                    html += '<tr>';
                    html += '    <td class="text-center align-middle" colspan="5">SIN REGISTROS</td>';
                    html += '</tr>';

                }
                html += '</tbody>';
                $('#control_obesidad').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }
    /** FIN CRONICO */

    /** PERVISUALIZACION DE EXAMEN */
    function visualizar_pdf_examen(tipo_examen)
    {
        if(tipo_examen!='')
        {
            var array_datos = {};
            $('.div_form_examen_'+tipo_examen).find('input,textarea,select').each(function (key, element){
                array_datos[element.id] = element.value;
            });

            var imagenes = $('#input_lista_imagenes').val();
            if(imagenes != '')
            {
                imagenes = JSON.stringify(imagenes);
            }

            var data ='id_ficha='+$('#id_fc').val()+'&contenido='+JSON.stringify(array_datos)+'&imagenes='+imagenes;
            Fancybox.show(
                [
                    {
                    src: '{{ route("pdf.visualizar.examen") }}?'+data,
                    type: "iframe",
                    preload: false,
                    },
                ]
            );
        }
        else
        {
            console.log('tipo examen no especificado');
        }
    }

    /* Ponemos "agregarPieza" en el ámbito de toda la página */
    function agregarPieza()
    {
        var html = '';
        html += '<div id="pieza_dental" class="row">';
        html += '    <div class="form-row">';
        html += '        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Pieza N°</label>';
        html += '                <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">';
        html += '            </div>';
        html += '        </div>';
        html += '    </div>';
        html += '    <div class="form-row">';
        html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Resp.Calor</label>';
        html += '                <select id="sel_endo_resp_calor" name="sel_endo_resp_calor" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
        html += '                    <option><span>N/R </span> No realizada</option>';
        html += '                    <option><span>↑ </span> Aumentado</option>';
        html += '                    <option><span>↓ </span> Disminuido</option>';
        html += '                    <option><span>N </span> Normal</a></option>';
        html += '                    <option><span>(-) </span> No responde</a></option>';
        html += '                </select>';
        html += '            </div>';
        html += '        </div>';
        html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Resp.Frio</label>';
        html += '                <select id="sel_endo_resp_frio" name="sel_endo_resp_frio" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
        html += '                    <option><span>N/R </span> No realizada</option>';
        html += '                    <option><span>↑ </span> Aumentado</option>';
        html += '                    <option><span>↓ </span> Disminuido</option>';
        html += '                    <option><span>N </span> Normal</a></option>';
        html += '                    <option><span>(-) </span> No responde</a></option>';
        html += '                </select>';
        html += '            </div>';
        html += '        </div>';
        html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Eléctrico</label>';
        html += '                <select id="sel_endo_resp_elect" name="sel_endo_resp_elect" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
        html += '                    <option><span>N/R </span> No realizada</option>';
        html += '                    <option><span>↑ </span> Aumentado</option>';
        html += '                    <option><span>↓ </span> Disminuido</option>';
        html += '                    <option><span>N </span> Normal</a></option>';
        html += '                    <option><span>(-) </span> No responde</a></option>';
        html += '                </select>';
        html += '            </div>';
        html += '        </div>';
        html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Percusión</label>';
        html += '                <select id="sel_endo_resp_perc" name="sel_endo_resp_perc" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
        html += '                    <option><span>N/R </span> No realizada</option>';
        html += '                    <option><span>↑ </span> Aumentado</option>';
        html += '                    <option><span>↓ </span> Disminuido</option>';
        html += '                    <option><span>N </span> Normal</a></option>';
        html += '                    <option><span>(-) </span> No responde</a></option>';
        html += '                </select>';
        html += '            </div>';
        html += '        </div>';
        html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Exploración</label>';
        html += '                <select id="sel_endo_resp_expl" name="sel_endo_resp_expl" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
        html += '                    <option><span>N/R </span> No realizada</option>';
        html += '                    <option><span>↑ </span> Aumentado</option>';
        html += '                    <option><span>↓ </span> Disminuido</option>';
        html += '                    <option><span>N </span> Normal</a></option>';
        html += '                    <option><span>(-) </span> No responde</a></option>';
        html += '                </select>';
        html += '            </div>';
        html += '        </div>';
        html += '        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Cavitaria</label>';
        html += '                <select id="sel_endo_cavitaria" name="sel_endo_cavitaria" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">';
        html += '                    <option><span>N/R </span> No realizada</option>';
        html += '                    <option><span>↑ </span> Aumentado</option>';
        html += '                    <option><span>↓ </span> Disminuido</option>';
        html += '                    <option><span>N </span> Normal</a></option>';
        html += '                    <option><span>(-) </span> No responde</a></option>';
        html += '                </select>';
        html += '            </div>';
        html += '        </div>';
        html += '       ';
        html += '    </div>';
        html += '</div>';

        $('#contenedor_pieza_dental_endo').append(html);
    }

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

    function mostrar_nueva_pieza_dental_end(counter){
        let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_end') }}";
        $.ajax({
            url: url,
            type: 'post',
            data: {
                counter: counter,
                _token: '{{ csrf_token() }}'
            },
            success: function(resp) {
                console.log(resp);
                $('#contenedor_nuevo_examen_end').empty();
                $('#contenedor_nuevo_examen_end').append(resp.v);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function ocultarExamen(counter){
        $('#nueva_pieza_dental_odontodolor').empty();
    }

    function ocultarExamenEnd(counter){
        $('#contenedor_nuevo_examen_end').empty();
    }

    function guardar_pieza_dental_dolor(count){
        let derivado_por = $('#ex_grl_deriv').val();
        let zona_dolor = $('#ex_grl_zdolor').val();
        let historia_anterior = $('#ex_grl_hp').val();

        let pieza_numero = $('#ex_grl_dol_pi_n'+count).val();
        let tipo_dolor = $('#tipo_dolor'+count).val();
        let intensidad = $('#intensidad'+count).val();
        let modo_dolor = $('#modo_dolor'+count).val();
        let loc_dolor = $('#loc_dolor'+count).val();
        let provocacion_dolor = $('#provocacion_dolor'+count).val();
        let cdo_duele = $('#cdo_duele'+count).val();
        let tpo_evolucion = $('#tpo_evolucion'+count).val();
        let obs_anal_dolor = $('#obs_anal_dolor'+count).val();

        let valido = 1;
        let mensaje = '';

        if(derivado_por == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Derivado por </li>';
        }
        if(zona_dolor == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Zona dolor </li>';
        }
        if(historia_anterior == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Historia anterior </li>';
        }
        if(pieza_numero == ''){
            valido = 0;
            mensaje += '<li>Campo requerido N° Pieza </li>';
        }
        if(tipo_dolor == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Tipo Dolor </li>';
        }
        if(intensidad == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Intensidad </li>';
        }
        if(obs_anal_dolor == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Observaciones analgesicos dolor </li>';
        }

        if(valido == 0){
            swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }

        let data = {
            _token: CSRF_TOKEN,
            derivado_por: derivado_por,
            zona_dolor: zona_dolor,
            historia_anterior: historia_anterior,
            pieza_numero: pieza_numero,
            tipo_dolor: tipo_dolor,
            intensidad: intensidad,
            modo_dolor: modo_dolor,
            loc_dolor: loc_dolor,
            provocacion_dolor: provocacion_dolor,
            cdo_duele: cdo_duele,
            tpo_evolucion: tpo_evolucion,
            obs_anal_dolor: obs_anal_dolor,
            id_paciente: $('#id_paciente_fc').val(),
            id_lugar_atencion : $('#id_lugar_atencion').val(),
            id_ficha_atencion: $('#id_ficha_atencion').val(),
            id_profesional: $('#id_profesional_fc').val(),
            count: count
        }

        let url = "{{ ROUTE('profesional.adm_dental.guardar_pieza_dental_dolor') }}";

        $.ajax({
            url: url,
            type:'post',
            data: data,
            success: function(resp){
                console.log(resp);
                $('#contenedor_pieza_dental_odontodolor').empty();
                $('#contenedor_pieza_dental_odontodolor').append(resp.v);
                $('#nueva_pieza_dental_odontodolor').empty();
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function guardar_pieza_dental_end(count){
        let derivado_por = $('#ex_end_derivado_por').val();
        let zona_dolor = $('#ex_end_zona_dolor').val();
        let historia_anterior = $('#ex_end_hist_ant').val();

        let pieza_numero = $('#end_numero_pieza'+count).val();
        let tipo_dolor = $('#end_tipo_dolor'+count).val();
        let intensidad = $('#end_intensidad'+count).val();
        let modo_dolor = $('#end_modo_dolor'+count).val();
        let loc_dolor = $('#end_loc_dolor'+count).val();
        let provocacion_dolor = $('#end_provocacion_dolor'+count).val();
        let cdo_duele = $('#end_cdo_duele'+count).val();
        let tpo_evolucion = $('#end_tpo_evolucion'+count).val();
        let obs_anal_dolor = $('#end_obs_loc_dolor'+count).val();

        let valido = 1;
        let mensaje = '';

        if(derivado_por == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Derivado por </li>';
        }
        if(zona_dolor == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Zona dolor </li>';
        }
        if(historia_anterior == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Historia anterior </li>';
        }
        if(pieza_numero == ''){
            valido = 0;
            mensaje += '<li>Campo requerido N° Pieza </li>';
        }
        if(tipo_dolor == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Tipo Dolor </li>';
        }
        if(intensidad == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Intensidad </li>';
        }
        if(obs_anal_dolor == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Observaciones analgesicos dolor </li>';
        }

        if(valido == 0){
            swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }

        let data = {
            _token: CSRF_TOKEN,
            derivado_por: derivado_por,
            zona_dolor: zona_dolor,
            historia_anterior: historia_anterior,
            pieza_numero: pieza_numero,
            tipo_dolor: tipo_dolor,
            intensidad: intensidad,
            modo_dolor: modo_dolor,
            loc_dolor: loc_dolor,
            provocacion_dolor: provocacion_dolor,
            cdo_duele: cdo_duele,
            tpo_evolucion: tpo_evolucion,
            obs_anal_dolor: obs_anal_dolor,
            id_paciente: $('#id_paciente_fc').val(),
            id_lugar_atencion : $('#id_lugar_atencion').val(),
            id_ficha_atencion: $('#id_ficha_atencion').val(),
            id_profesional: $('#id_profesional_fc').val(),
            count: count
        }

        let url = "{{ ROUTE('profesional.adm_dental.guardar_pieza_dental_end_dolor') }}";

        $.ajax({
            url: url,
            type:'post',
            data: data,
            success: function(resp){
                console.log(resp);
                $('#contenedor_examen_dolor_end').empty();
                $('#contenedor_examen_dolor_end').append(resp.v);
                $('#contenedor_nuevo_examen_end').empty();
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function eliminarExamenAgregado(id) {
        swal({
            title: 'Advertencia',
            text: '¿Está seguro de eliminar este examen?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            dangerMode: true
        }).then((aceptar) => {
            if (aceptar) {
                confirmarEliminarExamenAgregado(id);
            }
        })
    }

    function eliminarExamenEndAgregado(id, tipo_examen) {
        swal({
            title: 'Advertencia',
            text: '¿Está seguro de eliminar este examen?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            dangerMode: true
        }).then((aceptar) => {
            if (aceptar) {
                confirmarEliminarExamenEndAgregado(id, tipo_examen);
            }
        })
    }

    function confirmarEliminarExamenAgregado(id){
        let url = "{{ route('profesional.eliminar_nueva_pieza_dental') }}";
        var idPaciente = $('#id_paciente_fc').val();
        $.ajax({
            url: url,
            type: 'post',
            data: {
                id: id,
                id_paciente: idPaciente,
                _token: '{{ csrf_token() }}'
            },
            success: function(resp) {
                console.log(resp);
                let mensaje = resp.mensaje;
                let vista = resp.vista;
                if (mensaje == 'OK') {
                    swal({
                        title: 'Éxito',
                        text: 'Evolución eliminada correctamente',
                        icon: 'success',
                        button: 'Aceptar'
                    });
                    $('#contenedor_pieza_dental_odontodolor').empty();
                    $('#contenedor_pieza_dental_odontodolor').append(vista);
                } else {
                    swal({
                        title: 'Error',
                        text: 'mensaje',
                        icon: 'error',
                        button: 'Aceptar'
                    })
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function confirmarEliminarExamenEndAgregado(id, tipo_examen){
        let url = "{{ route('profesional.eliminar_nueva_pieza_dental_end') }}";
        var idPaciente = $('#id_paciente_fc').val();
        $.ajax({
            url: url,
            type: 'post',
            data: {
                id: id,
                id_paciente: idPaciente,
                tipo_examen: tipo_examen,
                _token: '{{ csrf_token() }}'
            },
            success: function(resp) {
                console.log(resp);
                let mensaje = resp.mensaje;
                let vista = resp.vista;
                if (mensaje == 'OK') {
                    swal({
                        title: 'Éxito',
                        text: 'Evolución eliminada correctamente',
                        icon: 'success',
                        button: 'Aceptar'
                    });
                    if(tipo_examen == 'endo'){
                        $('#contenedor_examen_dolor_end').empty();
                        $('#contenedor_examen_dolor_end').append(vista);
                    }else if(tipo_examen == 'odontop'){
                        $('#contenedor_pieza_dental_od_general').empty();
                        $('#contenedor_pieza_dental_od_general').append(vista);
                    }

                } else {
                    swal({
                        title: 'Error',
                        text: 'mensaje',
                        icon: 'error',
                        button: 'Aceptar'
                    })
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function mostrarFormularioReceta(id) {
            console.log(id);
            if (id == 1) {
                $('#rec_1').addClass('show active');
                $('#rec_2').removeClass('show active');
                $('#procedimiento_div').removeClass('show active');
                $('#curaciones_div').removeClass('show active');
            } else if (id == 2) {
                $('#rec_2').addClass('show active');
                $('#rec_1').removeClass('show active');
                $('#procedimiento_div').removeClass('show active');
                $('#curaciones_div').removeClass('show active');
            } else if (id == 3) {
                $('#rec_1').removeClass('show active');
                $('#rec_2').removeClass('show active');
                $('#procedimiento_div').addClass('show active');
                $('#curaciones_div').removeClass('show active');
            }else{
                console.log('es 4');
                $('#rec_1').removeClass('show active');
                $('#rec_2').removeClass('show active');
                $('#procedimiento_div').removeClass('show active');
                $('#curaciones_div').addClass('show active');
            }
        }

        function indicar_procedimiento_sdi() {
            var ind_med = $('#ind_med').val();
            var ind_cur = $('#ind_cur').val();
            var ind_proc = $('#ind_proc').val();
            var ind_inmmed = $('#ind_inmmed').val();
            var ind_cc = $('#ind_cv_inmmed_urg').val();
            var ind_pp = $('#ind_pp').val();
            var ind_vig_sig = $('#ind_vig_sig').val();

            var obs_ind_med = $('#obs_ind_med_servicio').val();
            var obs_detalle_ind_med = $('#obs_detalle_ind_med').val();

            var params = new URLSearchParams(location.search);
            var id_paciente = $('#id_paciente').val();

            var valido = 0;
            var mensaje = '';

            // if ($.trim(ind_med) == '' || ind_med == 0 || $.trim(ind_med) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Vias y Cateter.\n';
            // }

            // if ($.trim(ind_cur) == '' || ind_cur == 0 || $.trim(ind_cur) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Curaciones.\n';
            // }

            // if ($.trim(ind_proc) == '' || ind_proc == 0 || $.trim(ind_proc) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Sondas y procedimientos.\n';
            // }

            // if ($.trim(ind_inmmed) == '' || ind_inmmed == 0 || $.trim(ind_inmmed) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Inmovilizacion.\n';
            // }

            // if ($.trim(ind_cc) == '' || ind_cc == 0 || $.trim(ind_cc) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Control de ciclo.\n';
            // }

            // if ($.trim(ind_pp) == '' || ind_pp == 0 || $.trim(ind_pp) == 'Seleccione') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Preparar para.\n';
            // }

            // if ($.trim(ind_vig_sig) == '') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Vigilar signos de alerta.\n';
            // }

            // if ($.trim(obs_ind_med) == '') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Observaciones.\n';
            // }

            // if ($.trim(obs_detalle_ind_med) == '') {
            //     valido = 1;
            //     mensaje += 'Debe completar el campo Detalle de Observaciones.\n';
            // }


            if (valido == 0) {
                let data = {
                    ind_med: ind_med,
                    ind_cur: ind_cur,
                    ind_proc: ind_proc,
                    ind_inmmed: ind_inmmed,
                    ind_cc: ind_cc,
                    ind_pp: ind_pp,
                    ind_vig_sig: ind_vig_sig,
                    id_paciente: id_paciente,
                    obs_ind_med: obs_ind_med,
                    obs_detalle_ind_med: obs_detalle_ind_med,
                    _token: "{{ csrf_token() }}"
                };

                console.log(data);
                var url = "{{ route('indicar_procedimiento_sdi') }}";
                $.ajax({
                        url: url,
                        type: "post",
                        data: data,
                        dataType: "json",
                    })
                    .done(function(data) {
                        if (data.status == 1) {
                            let procedimientos = data.procedimientos;
                            let curaciones = data.curaciones;

                            $('#tabla_procedimientos_servicio tbody').empty();
                            $('#tabla_procedimientos_servicio_enfermera tbody').empty();
                            $('#tabla_curaciones_servicio tbody').empty();
                            $('#tabla_curaciones_procedimientos tbody').empty();
                            $('#tabla_procedimientos_hosp tbody').empty();
                            procedimientos.forEach(function(procedimiento) {
                                console.log(procedimiento.id);
                                if (procedimiento.estado == 0) {
                                    var html = '<span class="badge badge-warning">Suspendido </span>';
                                } else {
                                    var html = '';
                                }
                                let datos = JSON.parse(procedimiento.datos_procedimiento);
                                // Ahora puedes trabajar con datos como un objeto JSON

                                $('#tabla_procedimientos_servicio tbody').append(`
                                    <tr>
                                        <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora}</td>
                                        <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                        <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                        <td class="text-center align-middle text-wrap">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                                <i class="fas fa-trash"></i>Eliminar
                                            </button>
                                            <button type="button"
                                                class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                                onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                                <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                                ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                            </button>
                                        </td>
                                    </tr>
                                `);

                                $('#tabla_procedimientos_hosp tbody').append(`
                                    <tr>
                                        <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora}</td>
                                        <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                        <td class="text-center align-middle text-wrap">
                                            <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                        </td>
                                        <td class="text-center align-middle text-wrap">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                                <i class="fas fa-trash"></i>Eliminar
                                            </button>
                                            <button type="button"
                                                class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                                onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                                <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                                ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                            </button>
                                        </td>
                                    </tr>
                                `);
                            });
                            if (curaciones.length > 0) {
                                curaciones.forEach(function(curacion) {
                                    let datos = curacion.datos_curacion;
                                    // Ahora puedes trabajar con datos como un objeto JSON
                                    console.log(curacion);
                                    $('#tabla_curaciones_servicio tbody').append(`
                                        <tr>
                                            <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                            <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                            <td class="text-center align-middle">
                                                <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                            </td>
                                            <td class="text-center align-middle">
                                                <div class="switch switch-success d-inline">
                                                    <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                                    <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                                    Insumos
                                                </button>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button type="button" class="btn btn-outline-warning btn-sm" >
                                                    <i class="fas fa-edit"></i>

                                                </button>
                                            </td>
                                        </tr>
                                    `);

                                    $('#tabla_curaciones_procedimientos tbody').append(`
                                    <tr>
                                        <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                                        <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                        <td class="text-center align-middle text-wrap"><button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(${curacion.id})"><i class="fas fa-trash"></i></button></td>
                                    </tr>
                                    `);
                                });
                            }

                            swal({
                                title: "Indicación de Procedimiento.",
                                text: data.mensaje,
                                icon: "success",
                                buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                        } else {
                            swal({
                                title: "Indicación de Procedimiento.",
                                text: data.mensaje,
                                icon: "error",
                                buttons: "Aceptar",
                                //SuccessMode: true,
                            });
                        }
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            } else {
                swal({
                    title: "Indicación de Procedimiento.",
                    text: mensaje,
                    icon: "error",
                    buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }
        }

        function evaluar_para_carga_detalle(select, div, input, valor)
        {
            var valor_select = $('#'+select+'').val();
            if(valor_select == valor) $('#'+div+'').show();
            else {
                $('#'+div+'').hide();
                $('#'+input+'').val('');
            }
        }

        function eliminar_procedimiento_sdi(id) {
            swal({
                title: "Eliminar Procedimiento.",
                text: 'Al "Aceptar" Elimina el procedimiento.\n',
                icon: "warning",
                buttons: ["Cancelar", 'Aceptar'],
            }).then((result) => {
                console.log(result);
                if (result == true) {
                    eliminar_procedimiento_sdi_ajax(id);
                } else {
                    console.log('regresar');
                }
            });
        }

        function suspender_procedimiento_sdi(id) {
            var url = "{{ route('suspender_procedimiento_sdi') }}";
            var id_paciente = $('#id_paciente').val();

            $.ajax({
                    url: url,
                    type: "post",
                    data: {
                        id: id,
                        id_paciente: id_paciente,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    console.log(data);
                    if (data.estado == 'success') {
                        let procedimientos = data.procedimientos;
                        let curaciones = data.curaciones;
                        console.log(procedimientos);
                        $('#tabla_procedimientos_servicio tbody').empty();
                        $('#tabla_procedimientos_hosp tbody').empty();
                        $('#tabla_curaciones_servicio tbody').empty();
                        procedimientos.forEach(function(procedimiento) {
                            if (procedimiento.estado == 0) {
                                var html = '<span class="badge badge-warning">Suspendido </span>';
                            } else {
                                var html = '';
                            }
                            let datos = JSON.parse(procedimiento.datos_procedimiento);
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(datos);
                            $('#tabla_procedimientos_servicio tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                    <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                    <td class="text-center align-middle text-wrap">
                                        <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                    </td>
                                    <td class="text-center align-middle text-wrap">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                            <i class="fas fa-trash"></i>Eliminar
                                        </button>
                                        <button type="button"
                                            class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                            onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                            <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                            ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                        </button>
                                    </td>
                                </tr>
                            `);

                            $('#tabla_procedimientos_hosp tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                    <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                    <td class="text-center align-middle text-wrap">
                                        <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                    </td>
                                    <td class="text-center align-middle text-wrap">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                            <i class="fas fa-trash"></i>Eliminar
                                        </button>
                                        <button type="button"
                                            class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                            onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                            <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                            ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                        </button>
                                    </td>
                                </tr>
                            `);

                        });

                        curaciones.forEach(function(curacion) {
                            let datos = curacion.datos_curacion;
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(curacion);
                            $('#tabla_curaciones_servicio tbody').append(`
                                <tr>
                                    <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                    <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle">
                                        <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="switch switch-success d-inline">
                                            <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                            <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                            Insumos
                                        </button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-warning btn-sm" >
                                            <i class="fas fa-edit"></i>

                                        </button>
                                    </td>
                                </tr>
                            `);
                        });

                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "success",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    } else {
                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "error",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function eliminar_procedimiento_sdi_ajax(id) {
            var url = "{{ route('eliminar_procedimiento_sdi') }}";
            var id_paciente = $('#id_paciente').val();
            $.ajax({
                    url: url,
                    type: "post",
                    data: {
                        id: id,
                        id_paciente: id_paciente,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    console.log(data);
                    if (data.estado == 'success') {
                        let procedimientos = data.procedimientos;
                        let curaciones = data.curaciones;
                        console.log(curaciones);
                        $('#tabla_procedimientos_servicio tbody').empty();
                        $('#tabla_procedimientos_hosp tbody').empty();
                        $('#tabla_curaciones_servicio tbody').empty();
                        procedimientos.forEach(function(procedimiento) {
                            if (procedimiento.estado == 0) {
                                    var html = '<span class="badge badge-warning">Suspendido </span>';
                                } else {
                                    var html = '';
                                }
                            let datos = JSON.parse(procedimiento.datos_procedimiento);
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(datos);
                            $('#tabla_procedimientos_servicio tbody').append(`
                                    <tr>
                                        <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                        <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                        <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                        <td class="text-center align-middle text-wrap">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                                <i class="fas fa-trash"></i>Eliminar
                                            </button>
                                            <button type="button"
                                                class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                                onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                                <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                                ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                            </button>
                                        </td>
                                    </tr>
                                `);

                                $('#tabla_procedimientos_hosp tbody').append(`
                                    <tr>
                                        <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                        <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                        <td class="text-center align-middle text-wrap">
                                            <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                        </td>
                                        <td class="text-center align-middle text-wrap">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                                <i class="fas fa-trash"></i>Eliminar
                                            </button>
                                            <button type="button"
                                                class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                                onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                                <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                                ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                            </button>
                                        </td>
                                    </tr>
                                `);
                        });

                        curaciones.forEach(function(curacion) {
                            let datos = curacion.datos_curacion;
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(curacion);
                            $('#tabla_curaciones_servicio tbody').append(`
                                <tr>
                                    <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                    <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle">
                                        <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="switch switch-success d-inline">
                                            <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                            <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                            Insumos
                                        </button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-warning btn-sm" >
                                            <i class="fas fa-edit"></i>

                                        </button>
                                    </td>
                                </tr>
                            `);
                        });

                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "success",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    } else {
                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "error",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function eliminarCuracion(id) {
            swal({
                    title: "¿Estás seguro?",
                    text: "Una vez eliminado, no podrás recuperar este registro!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{ route('eliminar_curacion') }}",
                            type: "POST",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "id": id,
                                "id_paciente": $('#id_paciente').val()
                            },
                            success: function(data) {

                                // convertir json a objeto
                                var obj = JSON.parse(data);
                                var curaciones = obj.curaciones;
                                $('#tabla_curaciones_servicio tbody').empty();
                                $('#tabla_curaciones_procedimientos tbody').empty();
                                curaciones.forEach(curacion => {
                                    let datos = curacion.datos_curacion;
                                    $('#tabla_curaciones_servicio tbody').append(`
                                    <tr>
                                        <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                        <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                        <td class="text-center align-middle">
                                            <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline">
                                                <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                                <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                                Insumos
                                            </button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-outline-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminarCuracion(${curacion.id})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                `);
                                    $('#tabla_curaciones_procedimientos tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap hidden" hidden="hidden">${curacion.id}</td>
                                    <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${curacion.id}" name="ind_vig_sig${curacion.id}" class="form-control form-control-sm"></td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(${curacion.id})"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                `);
                                });

                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                    }
                });

        }

        function eliminar_medicamento_sdi(id) {
            swal({
                title: "Eliminar Medicamento",
                text: "¿Está seguro de eliminar el medicamento?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    let url = "{{ route('detalle_receta.eliminar') }}";
                    var _token = CSRF_TOKEN;
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            _token: _token,
                            id: id,
                        },
                        success: function(resp) {
                            console.log(resp);
                            let mensaje = resp.status;
                            if (mensaje == 'success') {
                                let medicamentos = resp.data;
                                $('#tbody_tabla_medicamento_cirugia_sdi').empty();
                                $('#tbody_tabla_medicamento_manual').empty();
                                $('#tabla_tratamientos_servicio tbody').empty();
                                medicamentos.forEach(medicamento => {
                                    console.log(medicamento);
                                    if (medicamento.id_dosis == null) {
                                        medicamento.dosis = medicamento.nombre_dosis;
                                    }

                                    if (medicamento.id_frecuencia == null || medicamento
                                        .id_frecuencia == 0) {
                                        medicamento.indicaciones = medicamento
                                        .nombre_frecuencia;
                                    }

                                    let fila = `<tr id="row${medicamento.id}">
                                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_tipo_control}</td>
                                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_medicamento}</td>
                                                <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
                                                <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.farmaco}</td>
                                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_dosis_medicamento_ficha_dental}</td>
                                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_frecuencia_medicamento_ficha_dental}</td>
                                                <td class="text-center align-middle text-wrap">${medicamento.indicaciones}</td>
                                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_via_administracion}</td>
                                                <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                                <td class="text-center align-middle text-wrap"><div name="remove" id="${medicamento.id}" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_medicamento_sdi(${medicamento.id});"><i class="fas fa-trash"></i></div></td>
                                            </tr>`;

                                    let fila_ = `<tr id="row${medicamento.id}">
                                                <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
                                                <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                                <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                                <td><input type="text" disabled></td>
                                                <td class="p-0">
                                                    <div class="switch switch-success d-inline">
                                                        <input type="checkbox" id="tratamiento_listo${medicamento.id}">
                                                        <label for="tratamiento_listo${medicamento.id}" class="cr"></label>
                                                    </div><br>
                                                    <label>Listo</label>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos">Insumos</button>
                                                </td>
                                                <td><button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"> </i></button> </td>
                                            </tr>`;
                                    $('#tbody_tabla_medicamento_cirugia_sdi').append(fila);
                                    $('#tbody_tabla_medicamento_manual').append(fila);
                                    $('#tabla_tratamientos_servicio tbody').append(fila_);
                                });
                                swal({
                                    title: "Medicamento Eliminado",
                                    icon: "success",
                                    // buttons: "Aceptar",
                                    //SuccessMode: true,
                                });
                            }
                        },
                        error: function(error) {
                            console.log(error.responseText);
                        }
                    })
                }
            });
        }

        function enviar_medicamento_faltante_sdi()
        {
            var med_faltante = $.trim($('#med_faltante').val());
            var med_droga = $.trim($('#manual_nombre_composicion_farmaco').val());

            if(med_faltante != '')
            {
                /** registro */
                let url = "{{ route('medicamentoFaltante.registro')}}";


                var _token = CSRF_TOKEN;
                var id_profesional = $('#id_profesional').val();

                $.ajax({

                    url: url,
                    type: "POST",
                    data: {
                        _token: _token,
                        id_profesional: id_profesional,
                        nombre: med_faltante,
                        droga: med_droga,
                    },
                })
                .done(function(data)
                {

                    if (data !== 'null')
                    {
                        //data = JSON.parse(data);
                        console.log('-----------------------');
                        console.log(data);
                        console.log('-----------------------');
                        if(data.estado == 1)
                        {
                            swal({
                                title: "Medicamento/Dispositivo Faltante enviado.\n Proximamente se agregará el Medicamento/Dispositivo Faltante en los registros",
                                icon: "success",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            });
                            $('#med_faltante').val('');
                            $('#no_existe_switch').prop( "checked", false );
                            $('#no_existe').hide();

                        }
                        else{

                            swal({
                                title: "Problema al Enviar solicitud.",
                                icon: "warning",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                        }
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

            }
            else
            {
                swal({
                    title: "Debe Indicar el nombre del Medicamento/Dispositivo Faltante.",
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
            }

        }
        function indicar_medicamento_manual_sdi()
        {
            let nombre_medicamento_ficha_dental = $('#manual_nombre_medicamento_ficha_dental').val();
            let id_medicamento = $('#manual_id_medicamento_ficha_dental').val();
            let farmaco = $('#manual_nombre_composicion_farmaco').val();
            let tipo_control = $('#manual_tipo_control').val();

            let dosis_medicamento_ficha_dental = $('#manual_dosis_medicamento_ficha_dental').val();
            let frecuencia_medicamento_ficha_dental = $('#manual_frecuencia_medicamento_ficha_dental').val();

            let cantidad_comprar = $('#manual_cantidad_comprar').val();
            let cantidad_numero_comprar = $('#manual_cantidad_numero').val();

            let id_via_administracion_ficha_dental = $('#manual_via_administracion_ficha_dental').val();
            let via_administracion_ficha_dental = $('#manual_via_administracion_ficha_dental option:selected').text();

            let observaciones_medicamento_ficha_dental = $('#manual_observaciones_via_administracion_ficha_dental').val();

            let id_periodo_ficha_dental = $('#manual_periodo_ficha_dental').val();
            let periodo_ficha_dental = $('#manual_periodo_ficha_dental option:selected').text();

            let observaciones_periodo_ficha_dental = $('#manual_observaciones_periodo_ficha_dental').val();



            var lista_med = [];
            $('#tabla_medicamento_cirugia_sdi tr').each(function(i, n) {
                if (i > 0) {
                    rol = {};
                    var data = $(this).find("td");
                    lista_med.push($.trim($(data[2]).text().split("\n").join("")));
                }
            });

            if($.inArray(nombre_medicamento_ficha_dental,lista_med) == -1)
            {

                var medicamento_uso_cronico = 0;
                if($('#manual_medicamento_uso_cronico').is(':checked'))
                    medicamento_uso_cronico = 1;

                var valido = 0;
                var mensaje = '';

                if($.trim(nombre_medicamento_ficha_dental) == '')
                {
                    valido = 1;
                    mensaje += 'Debe completar el campo Medicamento.\n';
                }

                if($.trim(tipo_control) == '0')
                {
                    valido = 1;
                    mensaje += 'Debe completar el campo Tipo Control.\n';
                }

                if($.trim(farmaco) == '')
                {
                    valido = 1;
                    mensaje += 'Debe completar el campo Farmaco.\n';
                }

                if($.trim(dosis_medicamento_ficha_dental) == '')
                {
                    valido = 1;
                    mensaje += 'Debe completar el campo Presentación.\n';
                }

                if($.trim(frecuencia_medicamento_ficha_dental) == '')
                {
                    valido = 1;
                    mensaje += 'Debe completar el campo Posología.\n';
                }


                if($.trim(via_administracion_ficha_dental) == '' || via_administracion_ficha_dental == 0 || $.trim(via_administracion_ficha_dental) == 'Seleccione')
                {
                    valido = 1;
                    mensaje += 'Debe completar el campo Via de Administración.\n';
                }
                else if($('#via_administracion_ficha_dental').val() == 11)
                {
                    if( $.trim(observaciones_medicamento_ficha_dental) == '')
                    {
                        valido = 1;
                        mensaje += 'Debe ingresar Otra Vía Administración\n';
                    }
                    else
                    {
                        via_administracion_ficha_dental = observaciones_medicamento_ficha_dental;
                    }
                }

                // if($.trim(periodo_ficha_dental) == '' || periodo_ficha_dental == 0 || $.trim(periodo_ficha_dental) == 'Seleccione')
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

                // if($.trim(cantidad_comprar) == '')
                // {
                //     valido = 1;
                //     mensaje += 'Debe completar el campo Cantidad a Comprar.\n';
                // }
                // else
                // {
                //     const regex = /\(\d+\) \w+ \w+/g;
                //     if (!regex.test(cantidad_comprar))
                //     {
                //         console.log('no cuadra');
                //         valido = 1;
                //         mensaje += 'El campo de Cantidad a Comprar no tiene el formato adecuado\n Ejemplo: (1) Una Caja.\n';
                //     }
                //     else
                //     {
                //         console.log('correcto');
                //     }
                // }

                if(valido == 0)
                {
                    var parametros = {
                        "id_tipo_control": tipo_control,
                        "id_medicamento": id_medicamento,
                        "nombre_medicamento_ficha_dental": nombre_medicamento_ficha_dental,
                        "farmaco": farmaco,
                        "dosis_medicamento_ficha_dental": dosis_medicamento_ficha_dental,
                        "frecuencia_medicamento_ficha_dental": frecuencia_medicamento_ficha_dental,
                        "via_administracion_ficha_dental": via_administracion_ficha_dental,
                        "observaciones_medicamento_ficha_dental": observaciones_medicamento_ficha_dental,
                        "medicamento_uso_cronico": medicamento_uso_cronico,

                    }

                    console.log(parametros);
                    $('.medicamentos_sin_registros').remove();
                    agregarMedicamentoManualReceta(parametros, 1);

                    /** enviando a table de medicamento faltante */
                    if($('#id_medicamento_ficha_dental').val() == '')
                    {
                        $('#med_faltante').val(nombre_medicamento_ficha_dental);
                        enviar_medicamento_faltante_sdi();
                    }


                    $('#manual_nombre_medicamento_ficha_dental').val('');
                    $('#manual_id_medicamento_ficha_dental').val('');
                    $('#manual_nombre_composicion_farmaco').val('');
                    $('#manual_dosis_medicamento_ficha_dental').val('');
                    $('#manual_frecuencia_medicamento_ficha_dental').val('');
                    $('#manual_cantidad_comprar').val('');
                    $('#manual_via_administracion_ficha_dental').val(0);
                    $('#manual_observaciones_via_administracion_ficha_dental').val('');
                    $('#manual_periodo_ficha_dental').val(0);
                    $('#manual_observaciones_periodo_ficha_dental').val('');

                    $( "#medicamento_uso_cronico" ).prop( "checked", false ).change();

                }
                else
                {
                    swal({
                        title: "Ingreso de medicamento(s).",
                        text: mensaje,
                        icon: "error",
                    });
                }
            }
            else
            {
                swal({
                    title: "Ingreso de medicamento(s).",
                    text:'El medicamento está Recetado',
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }
        }

        function validar_via_administracion_manual_sdi() {
            if ($('#manual_via_administracion_ficha_dental').val() == 11) {
                $('#div_manual_observaciones_via_administracion_ficha_dental').show();
                $('#manual_observaciones_via_administracion_ficha_dental').removeAttr('disabled');
            } else {
                $('#div_manual_observaciones_via_administracion_ficha_dental').hide();
                $('#manual_observaciones_via_administracion_ficha_dental').attr('disabled', 'disabled');
                $('#manual_observaciones_via_administracion_ficha_dental').val('');
            }
        }

        function agregarMedicamentoManualReceta(parametros, receta_am) {

        let url = "{{ route('detalle_receta.registro_manual_receta') }}";
        let id_paciente = $('#id_paciente').val();
        let selectedOption = $('#dosis_medicamento_ficha_dental option:selected');
        let dataId = selectedOption.data('id');
        var _token = CSRF_TOKEN;
        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id_ficha: $('#id_fc').val(),
                id_tipo_control: parametros.id_tipo_control,
                id_medicamento: parametros.id_medicamento,
                nombre_medicamento_ficha_dental: parametros.nombre_medicamento_ficha_dental,
                nombre_dosis_ficha_dental: parametros.dosis_medicamento_ficha_dental,
                nombre_frecuencia_ficha_dental: parametros.frecuencia_medicamento_ficha_dental,
                via_administracion: parametros.via_administracion_ficha_dental,
                farmaco: parametros.farmaco,
                observaciones: parametros.observaciones_medicamento_ficha_dental,
                uso_cronico: parametros.medicamento_uso_cronico,
                id_paciente: id_paciente,
                receta_am: receta_am,
            },
            success: function(resp) {
                console.log(resp);
                let mensaje = resp.status;
                if (mensaje == 'success') {
                    let medicamentos = resp.data;
                    $('#tbody_tabla_medicamento_cirugia_sdi').empty();
                    $('#tbody_tabla_medicamento_manual').empty();
                    $('#tabla_tratamientos_servicio tbody').empty();
                    medicamentos.forEach(medicamento => {
                        console.log(medicamento);
                        if (medicamento.id_dosis == null) {
                            medicamento.dosis = medicamento.nombre_dosis;
                        }

                        if (medicamento.id_frecuencia == null || medicamento.id_frecuencia == 0 ||
                            medicamento.id_frecuencia == 1000) {
                            medicamento.indicaciones = medicamento.nombre_frecuencia;
                        }
                        let fila = `<tr id="row${medicamento.id}">
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_tipo_control}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_medicamento}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.farmaco}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_dosis_medicamento_ficha_dental}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_frecuencia_medicamento_ficha_dental}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.indicaciones}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_via_administracion}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                        <td class="text-center align-middle text-wrap"><div name="remove" id="${medicamento.id}" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_medicamento_sdi(${medicamento.id});"><i class="fas fa-trash"></i></div></td>
                                    </tr>`;

                        let fila_ = `<tr id="row${medicamento.id}">
                                        <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
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
                    swal({
                        title: "Medicamento Agregado",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                }
            },
            error: function(error) {
                console.log(error.responseText);
            }
        })
    }

    function getDosis_sdi() {
        let id_medicamento = $('#id_medicamento_ficha_dental').val();
        console.log(id_medicamento);

        let url = "{{ route('dosis.get') }}";
        $.ajax({

            url: url,
            type: "get",
            data: {

                id_medicamento: id_medicamento,

            },
        })
        .done(function(data) {
            console.log(data)

            if (data != null) {

                data = JSON.parse(data);
                console.log(data)
                let dosis = $('#dosis_medicamento_ficha_dental');

                dosis.find('option').remove();
                dosis.append('<option value="0">Seleccione</option>');
                $(data).each(function(i, v) { // indice, valor
                    dosis.append('<option value="' + v.dosis + '" data-id="' + v.id +
                        '" data-cant_comp="' + v.cant_comp + '">' + v.present +
                        '</option>');
                })

            } else {



            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    };

    function getFrecuencia_sdi() {

let id_dosis = $('#dosis_medicamento_ficha_dental_hosp').val();
console.log(id_dosis);
//console.log(dosis);

let url = "{{ route('frecuencia.get') }}";
$.ajax({

    url: url,
    type: "get",
    data: {

        id_dosis: id_dosis,

    },
})
.done(function(data) {
    console.log(data)

    if (data != null) {

        data = JSON.parse(data);
        console.log(data);
        let dosis = $('#frecuencia_medicamento_ficha_dental');

        dosis.find('option').remove();
        dosis.append('<option value="1000">Por una vez</option>');
        $(data).each(function(i, v) { // indice, valor
            dosis.append('<option value="' + v.id + '">' + v.indic +
                '</option>');
        })

    } else {



    }

})
.fail(function(jqXHR, ajaxOptions, thrownError) {
    console.log(jqXHR, ajaxOptions, thrownError)
});
};

function getCantComp_sdi() {

var cant_comp = $('#dosis_medicamento_ficha_dental_hosp option:selected').attr('data-cant_comp');
console.log(cant_comp);

let url = "{{ route('presentacion.get') }}";
$.ajax({

url: url,
type: "get",
data: {

    cant_comp: cant_comp,

},
})
.done(function(data) {
console.log(data)

if (data != null) {

    data = JSON.parse(data);
    console.log(data)
    let select_cant_comp = $('#cantidad_comprar');
    let select_cant_comp2 = $('#med_cronicomes');

    select_cant_comp.find('option').remove();
    select_cant_comp.append('<option value="0">Seleccione</option>');
    $(data).each(function(i, v) { // indice, valor
        select_cant_comp.append('<option value="' + v.cantidad + '">' + v.cant +
            '</option>');
    })
    select_cant_comp.append('<option value="999">Otra Cantidad</option>');
} else {



}

})
.fail(function(jqXHR, ajaxOptions, thrownError) {
console.log(jqXHR, ajaxOptions, thrownError)
});

};

function validar_via_administracion_sdi() {
        if ($('#via_administracion_ficha_dental').val() == 11) {
            $('#div_observaciones_medicamento_ficha_dental').show();
            $('#observaciones_medicamento_ficha_dental').removeAttr('disabled');
        } else {
            $('#div_observaciones_medicamento_ficha_dental').hide();
            $('#observaciones_medicamento_ficha_dental').attr('disabled', 'disabled');
            $('#observaciones_medicamento_ficha_dental').val('');
        }
    }

    function indicar_medicamento_sdi(id) {
        console.log(id);
        if (id == 1) {
            var nombre_medicamento_ficha_dental = $('#nombre_medicamento_ficha_dental').val();
            var farmaco = $('#nombre_composicion_farmaco').html();
            var id_medicamento = $('#id_medicamento_ficha_dental').val();
            var id_tipo_control = $('#id_medicamento_tipo_control').val();

            var id_dosis_medicamento_ficha_dental = $('#dosis_medicamento_ficha_dental').val();
            var dosis_medicamento_ficha_dental = $('#dosis_medicamento_ficha_dental option:selected').text();

            var id_frecuencia_medicamento_ficha_dental = $('#frecuencia_medicamento_ficha_dental').val();
            var frecuencia_medicamento_ficha_dental = $('#frecuencia_medicamento_ficha_dental option:selected').text();

            var id_via_administracion_ficha_dental = $('#via_administracion_ficha_dental').val();
            var via_administracion_ficha_dental = $('#via_administracion_ficha_dental option:selected').text();

            var observaciones_medicamento_ficha_dental = $('#observaciones_medicamento_ficha_dental').val();

        } else {
            // luego lo vemos

        }


        var lista_med = [];
        $('#tabla_medicamento_cirugia_sdi tr').each(function(i, n) {
            if (i > 0) {
                rol = {};
                var data = $(this).find("td");
                lista_med.push($.trim($(data[0]).text().split("\n").join("")));
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

            if ($('#id_medicamento_ficha_dental').val() != '') {
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
            } else {
                if (dosis_medicamento_ficha_dental_2 == '') {
                    valido = 1;
                    mensaje += 'Debe completar el campo Dosis\n';
                } else {
                    dosis_medicamento_ficha_dental = dosis_medicamento_ficha_dental_2;
                }
                if (frecuencia_medicamento_ficha_dental_2 == '') {
                    valido = 1;
                    mensaje += 'Debe completar el campo Frecuencia\n';
                } else {
                    frecuencia_medicamento_ficha_dental = frecuencia_medicamento_ficha_dental_2;
                }
            }

            if ($.trim(via_administracion_ficha_dental) == '' || via_administracion_ficha_dental == 0 || $.trim(
                    via_administracion_ficha_dental) == 'Seleccione') {
                valido = 1;
                mensaje += 'Debe completar el campo Via de Administración.\n';
            } else if ($('#via_administracion_ficha_dental').val() == 11) {
                if ($.trim(observaciones_medicamento_ficha_dental) == '') {
                    valido = 1;
                    mensaje += 'Debe ingresar Otra Vía Administración\n';
                } else {
                    via_administracion_ficha_dental = observaciones_medicamento_ficha_dental;
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
                if ($('#id_medicamento_ficha_dental').val() == '') {
                    $('#med_faltante').val(nombre_medicamento_ficha_dental);
                    enviar_medicamento_faltante_sdi();
                }

                limpiar_campos_medicamento_sdi();
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
        let url = "{{ route('detalle_receta.registro_receta') }}";
        let id_paciente = dame_id_paciente();
        let selectedOption = $('#dosis_medicamento_ficha_dental option:selected');
        let dataId = selectedOption.data('id');
        var _token = CSRF_TOKEN;
        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id_ficha: $('#id_fc').val(),
                id_tipo_control: parametros.id_tipo_control,
                id_medicamento: parametros.id_medicamento,
                nombre_medicamento_ficha_dental: parametros.nombre_medicamento_ficha_dental,
                id_dosis_medicamento_ficha_dental: dataId,
                nombre_dosis_ficha_dental: parametros.dosis_medicamento_ficha_dental,
                nombre_frecuencia_ficha_dental: parametros.frecuencia_medicamento_ficha_dental,
                id_frecuencia_medicamento_ficha_dental: parametros.id_frecuencia_medicamento_ficha_dental,
                via_administracion: parametros.via_administracion_ficha_dental,
                id_via_administracion: parametros.id_via_administracion_ficha_dental,
                farmaco: parametros.farmaco,
                observaciones: parametros.observaciones_medicamento_ficha_dental,
                uso_cronico: parametros.medicamento_uso_cronico,
                id_paciente: id_paciente,
                receta_am: receta_am,
            },
            success: function(resp) {
                console.log(resp);
                let mensaje = resp.status;
                if (mensaje == 'success') {
                    let medicamentos = resp.data;
                    $('#tbody_tabla_medicamento_cirugia_sdi').empty();
                    $('#tbody_tabla_medicamento_manual').empty();
                    $('#tabla_tratamientos_servicio tbody').empty();
                    medicamentos.forEach(medicamento => {
                        console.log(medicamento);
                        if (medicamento.id_dosis == null) {
                            medicamento.dosis = medicamento.nombre_dosis;
                        }

                        if (medicamento.id_frecuencia == null || medicamento.id_frecuencia == 0 ||
                            medicamento.id_frecuencia == 1000) {
                            medicamento.indicaciones = medicamento.nombre_frecuencia;
                        }
                        let fila = `<tr id="row${medicamento.id}">
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_tipo_control}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_medicamento}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.farmaco}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_dosis_medicamento_ficha_dental}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_frecuencia_medicamento_ficha_dental}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.indicaciones}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_via_administracion}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                        <td class="text-center align-middle text-wrap"><div name="remove" id="${medicamento.id}" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_medicamento_sdi(${medicamento.id});"><i class="fas fa-trash"></i></div></td>
                                    </tr>`;

                        let fila_ = `<tr id="row${medicamento.id}">
                                        <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
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
                    swal({
                        title: "Medicamento Agregado",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                }
            },
            error: function(error) {
                console.log(error.responseText);
            }
        })
    }

    function dame_id_paciente(){
        let id_paciente = $('#id_paciente').val();
        return id_paciente;
    }

    function limpiar_campos_medicamento_sdi() {
        $('#nombre_medicamento_ficha_dental').val('');
        $('#nombre_composicion_farmaco').html('');
        $('#id_medicamento_ficha_dental').val('');
        $('#id_medicamento_tipo_control').val('');
        $('#mensaje_med_control').val('');
        $('#dosis_medicamento_ficha_dental').val('');
        $('#frecuencia_medicamento_ficha_dental').val('');
        $('#via_administracion_ficha_dental').val('');
        $('#observaciones_medicamento_ficha_dental').val('');
        $('#medicamento_uso_cronico').prop('checked', false);
        $('#mensaje_uso_cronico').hide();

    }

    /** autocomplete de medicamentos antecedentes */
$("#nombre_medicamento_ficha_dental").autocomplete({
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
                console.log(data.length);
                if( data.length == 0 )
                {
                    $('.medicamento_activo').hide();
                    $('.medicamento_inactivo').show();
                    $('#dosis_medicamento_ficha_dental_2').val('');
                    $('#frecuencia_medicamento_ficha_dental_2').val('');
                    $('#id_medicamento_ficha_dental').val('');
                }
                else
                {
                    $('.medicamento_activo').show();
                    $('.medicamento_inactivo').hide();
                    $('#dosis_medicamento_ficha_dental_2').val('');
                    $('#frecuencia_medicamento_ficha_dental_2').val('');
                    $('#id_medicamento_ficha_dental').val('');
                }
                response(data);
            }
        });
    },
    select: function(event, ui) {
        // Set selection
        $('#nombre_medicamento_ficha_dental').val(ui.item.label); // display the selected text
        $('#id_medicamento_ficha_dental').val(ui.item.value); // save selected id to input
        $('#nombre_composicion_farmaco').html(ui.item.droga); // save selected id to input

        return false;
    }
});



function mostrar_nueva_pieza_ex_radio(counter){
    let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_rx') }}";
    $.ajax({
        url: url,
        type: 'post',
        data: {
            counter: counter,
            _token: '{{ csrf_token() }}'
        },
        success: function(resp) {
            console.log(resp);
            $('#contenedor_examenes_oral_rx').empty();
            $('#contenedor_examenes_oral_rx').append(resp.v);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function mostrar_nueva_pieza_ex_radio_end(counter){
    let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_rx_end') }}";
    $.ajax({
        url: url,
        type: 'post',
        data: {
            counter: counter,
            tipo_examen: 'endo',
            _token: '{{ csrf_token() }}'
        },
        success: function(resp) {
            console.log(resp);
            $('#nueva_pieza_end').empty();
            $('#nueva_pieza_end').append(resp.v);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function mostrar_nuevas_imagenes_dent(counter){
    let url = "{{ ROUTE('profesional.mostrar_nuevas_imagenes_dental') }}";
    $.ajax({
        url: url,
        type: 'post',
        data: {
            counter: counter,
            _token: '{{ csrf_token() }}'
        },
        success: function(resp) {
            console.log(resp);
            $('#contenedor_nueva_imagen_dent').empty();
            $('#contenedor_nueva_imagen_dent').append(resp.v);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function ocultar_pieza_imagenes_rx(){
    $('#contenedor_nueva_imagen_dent').empty();
}

function eliminar_pieza_dental_rx(id){
    swal({
            title: 'Advertencia',
            text: '¿Está seguro de eliminar este examen?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            dangerMode: true
        }).then((aceptar) => {
            if (aceptar) {
                confirmar_eliminar_pieza_dental_rx(id);
            }
        })
}

function editar_pieza_dental_rx(id){
    // abrir_modal
    $('#modal_agregar_imagenes_dental_paciente').modal('show');
}


function confirmar_eliminar_pieza_dental_rx(id){
    let url = "{{ ROUTE('profesional.eliminar_pieza_dental_rx') }}";
    let id_paciente = dame_id_paciente();

    $.ajax({
        type:'post',
        url: url,
        data:{
            id: id,
            id_paciente: id_paciente,
            _token: CSRF_TOKEN
        },
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#pieza_dentalrx').empty();
                $('#pieza_dentalrx').append(resp.v);
            }
        },
        error: function(error){
            console.log(error);
        }
    });
}

function amplificar_imagen(path){
    // abrir modal
    $('#modal_imagen_dental_rx').modal('show');
    $('.zoom-container').on('mousemove', function (e) {
            const $img = $(this).find('img');
            const offsetX = e.offsetX; // Posición X del mouse dentro del contenedor
            const offsetY = e.offsetY; // Posición Y del mouse dentro del contenedor
            const width = $(this).width();
            const height = $(this).height();
            const xPercent = (offsetX / width) * 100; // Porcentaje X
            const yPercent = (offsetY / height) * 100; // Porcentaje Y

            $img.css('transform-origin', `${xPercent}% ${yPercent}%`); // Ajusta el origen de transformación
        });
    $('#imagen_paciente_rx').attr('src',"{{ asset('storage') }}"+"/"+path);
}

function eliminar_rx(id){
    swal({
            title: 'Advertencia',
            text: '¿Está seguro de eliminar esta RX?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            dangerMode: true
        }).then((aceptar) => {
            if (aceptar) {
                confirmarEliminarImagenRx(id);
            }
        })
}

function confirmarEliminarImagenRx(id){
    let url = "{{ ROUTE('profesional.eliminar_imagen_rx_paciente') }}";
    let data = {
        _token: CSRF_TOKEN,
        id:id,
        id_paciente: dame_id_paciente()
    }

    $.ajax({
        type:'post',
        data: data,
        url: url,
        success: function(resp){
            if(resp.mensaje == 'OK'){
                $('#pieza_dentalrx').empty();
                $('#pieza_dentalrx').append(resp.v);
            }else{
                $('#pieza_dentalrx').empty();
                $('#pieza_dentalrx').append(resp.mensaje);
            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function eliminar_imagen_dental(id,path){
    swal({
        title: 'Advertencia',
        text: '¿Está seguro de eliminar esta imagen?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        dangerMode: true,
        confirmButtonText: 'Sí, eliminarlo!',
        cancelButtonText: 'Cancelar',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        closeOnConfirm: false,
        closeOnCancel: true,
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',

    })
    .then((confirm) => {
        if (confirm) {
            confirmar_eliminar_imagen_dental(id,path);
        } else {
            Swal.fire('Cancelado', 'La imagen no fue eliminada :(', 'error');
        }
    });

}

function confirmar_eliminar_imagen_dental(id,path){
    let url = "{{ route('profesional.eliminar_imagen_dental_paciente') }}";
    let data = {
        _token: CSRF_TOKEN,
        id:id,
        path: path,
        id_paciente: dame_id_paciente()
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#contenedor_imagenes_dent').empty();
                $('#contenedor_imagenes_dent').append(resp.v);
            }else{
                // $('#contenedor_imagenes_dent').empty();
                // $('#contenedor_imagenes_dent').append(resp.mensaje);
            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function eliminar_pieza_dental_imagenes(id){
    swal({
            title: 'Advertencia',
            text: '¿Está seguro de eliminar esta información?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            dangerMode: true
        }).then((aceptar) => {
            if (aceptar) {
                confirmar_eliminar_pieza_dental_imagenes(id);
            }
        })
}

function confirmar_eliminar_pieza_dental_imagenes(id){
    let url = "{{ ROUTE('profesional.eliminar_pieza_dental_imagenes_paciente') }}";
    let id_paciente = dame_id_paciente();

    let data = {
        _token: CSRF_TOKEN,
        id_paciente: id_paciente,
        id: id
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#contenedor_imagenes_dent').empty();
                $('#contenedor_imagenes_dent').append(resp.v);
                swal({
                    title:'Exito',
                    text:'Se ha guardado con exito',
                    icon:'success'
                })
            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function mostrar_pieza_dental_examen(count){
    let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_examen') }}";
    let data = {
        count: count,
        id_paciente: dame_id_paciente(),
        _token: CSRF_TOKEN
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#contenedor_nueva_pieza_dental').empty();
                $('#contenedor_nueva_pieza_dental').append(resp.v);

            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function mostrar_pieza_dental_examen_end(count){
    let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_examen_end') }}";
    let data = {
        count: count,
        id_paciente: dame_id_paciente(),
        tipo_examen:'endo',
        _token: CSRF_TOKEN
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#nueva_pieza_dental_endo').empty();
                $('#nueva_pieza_dental_endo').append(resp.v);

            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function mostrar_pieza_dental_examen_odontop(count){
    let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_examen_odontop') }}";
    let data = {
        count: count,
        id_paciente: dame_id_paciente(),
        _token: CSRF_TOKEN
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#nueva_pieza_dental_odontop').empty();
                $('#nueva_pieza_dental_odontop').append(resp.v);

            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function eliminar_pieza_dental_pieza(id,tipo){
    swal({
        title: 'Advertencia',
        text: '¿Está seguro de eliminar esta pieza?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        dangerMode: true
    })
    .then((aceptar) => {
        if (aceptar) {
            confirmar_eliminar_pieza_dental_pieza(id, tipo);
        } else {
            Swal.fire('Cancelado', 'La pieza no fue eliminada :(', 'error');
        }
    });
}

function confirmar_eliminar_pieza_dental_pieza(id, tipo){
    let url = "{{ ROUTE('profesional.eliminar_pieza_dental_pieza') }}";
    let data = {
        _token: CSRF_TOKEN,
        id_paciente: dame_id_paciente(),
        id: id,
        tipo: tipo
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                let examenes = resp.examenes;
                if(tipo == 'gral'){
                    $('#contenedor_pieza_dental_endo_gral').empty();
                    $('#contenedor_pieza_dental_endo_gral').append(resp.v);
                    $('#planificacion_examenes_gral').empty();
                    examenes.forEach(examen => {
                        $('#planificacion_examenes_gral').append(`
                            <div class="form-row">
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                        <input type="text" class="form-control form-control-sm" value="${examen.numero_pieza}">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                            <option selected="" value="1">Uniradicular</option>
                                            <option value="2">Biradicular</option>
                                            <option value="2">Triradicular</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Convenio</label>
                                        <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                            <option selected="" value="1">Convenio</option>
                                            <option value="2">Sin Convenio</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        `);
                    });
                }else if(tipo == 'endo'){
                    $('#contenedor_pieza_dental_endo').empty();
                    $('#contenedor_pieza_dental_endo').append(resp.v);
                    $('#planificacion_examenes_endo').empty();
                    examenes.forEach(examen => {
                        $('#planificacion_examenes_endo').append(`
                            <div class="form-row">
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                        <input type="text" class="form-control form-control-sm" value="${examen.numero_pieza}">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                            <option selected="" value="1">Uniradicular</option>
                                            <option value="2">Biradicular</option>
                                            <option value="2">Triradicular</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Convenio</label>
                                        <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                            <option selected="" value="1">Convenio</option>
                                            <option value="2">Sin Convenio</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        `);
                    });
                }else{
                    $('#contenedor_pieza_dental_odontop_examen').empty();
                    $('#contenedor_pieza_dental_odontop_examen').append(resp.v);
                    $('#planificacion_examenes_odontop').empty();
                    examenes.forEach(examen => {
                        $('#planificacion_examenes_odontop').append(`
                        <div class="form-row">
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Pieza N°</label>
                                    <input type="text" class="form-control form-control-sm" value="${examen.numero_pieza}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                    <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                        <option selected="" value="1">Uniradicular</option>
                                        <option value="2">Biradicular</option>
                                        <option value="2">Triradicular</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Convenio</label>
                                    <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                        <option selected="" value="1">Convenio</option>
                                        <option value="2">Sin Convenio</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        `);
                    });
                }
                swal({
                    title:'Exito',
                    text:'Se ha eliminado con éxito',
                    icon:'success'
                })
            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function eliminar_pieza_dental_rx_end(id){
    swal({
        title: 'Advertencia',
        text: '¿Está seguro de eliminar este RX?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        dangerMode: true
    })
    .then((aceptar) => {
        if (aceptar) {
            confirmar_eliminar_pieza_dental_rx_end(id);
        } else {
            Swal.fire('Cancelado', 'El RX no fue eliminado :(', 'error');
        }
    });
}

function confirmar_eliminar_pieza_dental_rx_end(id){
    let url = "{{ route('profesional.eliminar_pieza_dental_rx_end') }}";
    let data = {
        _token: CSRF_TOKEN,
        id_paciente: dame_id_paciente(),
        id: id
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#contenedor_pieza_dental_endorx_endo').empty();
                $('#contenedor_pieza_dental_endorx_endo').append(resp.v);
                swal({
                    title:'Exito',
                    text:'Se ha eliminado con éxito',
                    icon:'success'
                })
            }
        },
        error: function(error){
            console.log(error);
        }
    })
}


function eliminar_rx_end(id){
    swal({
            title: 'Advertencia',
            text: '¿Está seguro de eliminar esta RX?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            dangerMode: true
        }).then((aceptar) => {
            if (aceptar) {
                confirmarEliminarImagenRxEnd(id);
            }
        })
}

function confirmarEliminarImagenRxEnd(id){
    let url = "{{ ROUTE('profesional.eliminar_imagen_rx_end_paciente') }}";
    let data = {
        _token: CSRF_TOKEN,
        id:id,
        id_paciente: dame_id_paciente()
    }

    $.ajax({
        type:'post',
        data: data,
        url: url,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#contenedor_pieza_dental_endorx_endo').empty();
                $('#contenedor_pieza_dental_endorx_endo').append(resp.v);
            }else{
                $('#contenedor_pieza_dental_endorx_endo').empty();
                $('#contenedor_pieza_dental_endorx_endo').append(resp.mensaje);
            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function eliminarExamenAgregadoRxOdontop(id) {
        swal({
            title: 'Advertencia',
            text: '¿Está seguro de eliminar este examen?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            dangerMode: true
        }).then((aceptar) => {
            if (aceptar) {
                confirmarEliminarExamenAgregadoRxOdontop(id);
            }
        })
    }

    function confirmarEliminarExamenAgregadoRxOdontop(id){
        let url = "{{ route('profesional.eliminar_nueva_pieza_dental_rx_odontop') }}";
        var idPaciente = $('#id_paciente_fc').val();
        $.ajax({
            url: url,
            type: 'post',
            data: {
                id: id,
                id_paciente: idPaciente,
                tipo_examen: 'odontop',
                _token: '{{ csrf_token() }}'
            },
            success: function(resp) {
                console.log(resp);
                let mensaje = resp.mensaje;
                let vista = resp.v;
                if (mensaje == 'OK') {
                    swal({
                        title: 'Éxito',
                        text: 'Evolución eliminada correctamente',
                        icon: 'success',
                        button: 'Aceptar'
                    });
                    $('#contenedor_pieza_dental_odontop').empty();
                    $('#contenedor_pieza_dental_odontop').append(vista);
                } else {
                    swal({
                        title: 'Error',
                        text: 'mensaje',
                        icon: 'error',
                        button: 'Aceptar'
                    })
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function mostrar_nueva_pieza_oral_rx_odontop(count){
        let url = "{{ route('profesional.mostrar_nueva_pieza_dental_rx_end') }}";
        let odontop_numero_pieza = $('#odontop_numero_pieza_'+count).val();
        let odontop_rx_esp_peri_apical = $('#odontop_rx_esp_peri_apical_'+count).val();
        let odontop_h_apical = $('#odontop_h_apical'+count).val();
        let odontop_obs_ex_oral = $('#odontop_obs_ex_oral_'+count).val();
        let data = {
            numero_pieza: odontop_numero_pieza,
            odontop_rx_esp_peri_apical: odontop_rx_esp_peri_apical,
            odontop_h_apical: odontop_h_apical,
            odontop_obs_ex_oral: odontop_obs_ex_oral,
            count: count,
            id_paciente: dame_id_paciente(),
            tipo_examen: 'odontop',
            _token: '{{ csrf_token() }}'
        }

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'OK'){
                    $('#nueva_pieza_dental_odontop_').empty();
                    $('#nueva_pieza_dental_odontop_').append(resp.v);
                }
            },
            error: function(error){
                console.log(error);
            }
        })
    }

    function mostrar_pieza_dental_examen_odontop_(count){
        let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_examen_end') }}";
    let data = {
        count: count,
        id_paciente: dame_id_paciente(),
        tipo_examen:'odontop',
        _token: CSRF_TOKEN
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#nueva_pieza_dental_odontop_examen').empty();
                $('#nueva_pieza_dental_odontop_examen').append(resp.v);

            }
        },
        error: function(error){
            console.log(error);
        }
    })
    }
</script>

@endsection
