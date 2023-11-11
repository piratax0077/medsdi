<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">

            </div>
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="traumato_general" role="tablist">

                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_traumato-tab" data-toggle="tab" href="#atencion_traumato" role="tab" aria-controls="atencion_traumato_gen" aria-selected="false">Traumatología</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="ortopedia_gen-tab" data-toggle="tab" href="#ortopedia_gen" role="tab" aria-controls="ortopedia_gen" aria-selected="false">Ortopedia</a>
                    </li>

                </ul>
            </div>
			 <!--ALERTA-->
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert"><strong>Solo el campo diagnóstico es obligatorio el resto es opcional</strong>
                </div>
            </div>

            <div class="col-sm-12 col-md-12">
                <form action="{{ route('fichaAtencion.registrar_ficha_trau_ort') }}" method="POST">
                    <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                    <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                    <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                    <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                    <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                    <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                    <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">
                    <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">

                    @csrf
                    <div class="tab-content" id="traumato-contenido">

                        <!--ATENCIÓN TRAUMATOLOGIA-->
                        <div class="tab-pane fade show active " id="atencion_traumato" role="tabpanel" aria-labelledby="atencion_traumato-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="tit-gen">Ficha de atención Traumatológica </h6>
                                        </div>
                                    </div>
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <!--Formulario / Menor de edad-->
                                        @include('atencion_medica.generales.seccion_menor')
                                        <!--Cierre: Formulario / Menor de edad-->

                                        <!--Motivo consulta-->
                                        <div class="col-md-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="motivo">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                                                        Motivo de la consulta
                                                    </button>
                                                </div>
                                                <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
                                                    <div class="card-body-aten-a">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Síntoma Principal de Consulta</label>
                                                                    <select name="sintoma_cons" id="sintoma_cons" data-titulo="sintoma principal" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sintoma_cons','div_obs_sintoma_cons','obs_sintoma_cons',5)">
                                                                        <option value="0">Seleccione Síntoma</option>
                                                                        <option value="1">Dolor</option>
                                                                        <option value="2">Deformidad</option>
                                                                        <option value="3">Alteración funcional</option>
                                                                        <option value="4">masa</option>
                                                                        <option value="5">Otro </option>
                                                                    </select>
                                                                </div>

                                                                <div class="col-md-12" id="div_obs_sintoma_cons" style="display:none">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Describa Otro Signo o Síntoma</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Sintoma" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_sintoma_cons" id="obs_sintoma_cons"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Motivo de Consulta</label>
                                                                    <input type="text" class="form-control form-control-sm" name="descripcion_consula" id="descripcion_consula">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Antecedentes Cirugías Especialidad</label>
                                                                    <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="antec_especialidad_cig" id="antec_especialidad_cig"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Antecedentes Generales Especialidad</label>
                                                                    <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="antec_especialidad_gen" id="antec_especialidad_gen"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="exam_esp_traumatologia">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_traumatologia_c" aria-expanded="false" aria-controls="exam_esp_traumatologia_c">
                                                        Examen Paciente Traumatología
                                                    </button>
                                                </div>
                                                <div id="exam_esp_traumatologia_c" class="collapse" aria-labelledby="exam_esp_traumatologia" data-parent="#exam_esp_traumatologia">
                                                    <div class="card-body-aten-a">
                                                        <div id="form-traumato">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-crec_des_trauma" role="tablist">
                                                                        {{-- <li class="nav-item"> --}}
                                                                            {{-- <a class="nav-link-aten text-reset active" id="exam-traumato-ft-tab" data-toggle="tab" href="#exam-traumato-ft" role="tab" aria-controls="exam-traumato-ft" aria-selected="true">Ficha tipo</a> --}}
                                                                        {{-- </li> --}}
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset active" id="examen-segment-traumato-tab" data-toggle="tab" href="#examen-segment-traumato" role="tab" aria-controls="examen-segment-traumato" aria-selected="false">Exámen físico</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="examen-traumato-tab" data-toggle="tab" href="#examen-traumato" role="tab" aria-controls="examen-traumato" aria-selected="false">Otros Traumatología</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="tab-content" id="trauma">
                                                                        <!--FICHA TIPO-->
                                                                        {{-- <div class="tab-pane fade show active" id="exam-traumato-ft" role="tabpanel" aria-labelledby="exam-traumato-ft-tab"> --}}
                                                                            {{-- <div class="row"> --}}
                                                                                {{-- <div class="col-md-12"> --}}
                                                                                    {{-- <h6 class="f-16 text-c-blue mb-3">Ficha tipo</h6> --}}
                                                                                {{-- </div> --}}
                                                                            {{-- </div> --}}
                                                                            {{-- <div class="form-row"> --}}
                                                                                {{-- <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6"> --}}
                                                                                    {{-- <label class="floating-label-activo-sm">Carga ficha tipo</label> --}}
                                                                                    {{-- <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');"> --}}
                                                                                        {{-- <option value="">Seleccione</option> --}}
                                                                                        {{-- @if(!empty($fichaTipo['ped_gen'])) --}}
                                                                                            {{-- @foreach ($fichaTipo['ped_gen'] as $ft ) --}}
                                                                                                {{-- <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option> --}}
                                                                                            {{-- @endforeach --}}
                                                                                        {{-- @endif --}}
                                                                                    {{-- </select> --}}
                                                                                {{-- </div> --}}
                                                                                {{-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> --}}
                                                                                    {{-- <span id="descripcion_ficha_tipo_especialidad"></span> --}}
                                                                                {{-- </div> --}}
                                                                            {{-- </div> --}}
                                                                        {{-- </div> --}}

                                                                        <!--EXAMEN FISICO-->
                                                                        <div class="tab-pane fade show active" id="examen-segment-traumato" role="tabpanel" aria-labelledby="examen-segment-traumato-tab">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="f-16 text-c-blue mb-3">Examen segmentario</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Causa</label>
                                                                                        <select name="e_causa_trau" id="e_causa_trau" data-titulo="Causa" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_causa_trau','div_e_causa_trau','obs_e_causa_trau',4)">
                                                                                            <option selected value="1">Accidente deportivo</option>
                                                                                            <option selected value="2">Accidente casero</option>
                                                                                            <option selected value="3">Accidente Hogar</option>
                                                                                            <option value="4">Otro Describir</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_causa_trau" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Describir examen de Otra Causa</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Causa" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_causa_trau" id="obs_e_causa_trau"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Cabeza y cuello</label>
                                                                                        <select name="e_cab_cuello_trau" id="e_cab_cuello_trau" data-titulo="Cabeza y Cuello" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_cab_cuello_trau','div_e_cab_cuello_trau','obs_e_cab_cuello_trau',2)">
                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Anormal</option>
                                                                                            <option value="3">No Examinador</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_cab_cuello_trau" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Describir Anormalidad</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Cabeza y Cuello" data-seccion="Examen Segmentario"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_cab_cuello_trau" id="obs_e_cab_cuello_trau"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Ex de Columna</label>
                                                                                        <select name="e_columna_trau" id="e_columna_trau" data-titulo="Columna" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_columna_trau','div_e_columna_trau','obs_e_columna_trau',2);">
                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Alterado Describir</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_columna_trau" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Describir examen de tórax</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Columna" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_columna_trau" id="obs_e_columna_trau"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Parrilla Costal</label>
                                                                                        <select name="e_parrilla_trau" id="e_parrilla_trau" data-titulo="Parrilla Costal" data-seccion="Examen Segmentario"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_parrilla_trau','div_e_parrilla_trau','obs_e_parrilla_trau',2);">
                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Anormal(describir)</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_parrilla_trau" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Parrilla Costal</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Parrilla Costal" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_parrilla_trau" id="obs_e_parrilla_trau"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Extremidades Superiores</label>
                                                                                        <select name="e_ext_sup_trau" id="e_ext_sup_trau" data-titulo="Extremidades Superiores" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_ext_sup_trau','div_e_ext_sup_trau','obs_e_ext_sup_trau',2);">
                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Anormal</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_ext_sup_trau" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Extremidades Superiores</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Superiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_ext_sup_trau" id="obs_e_ext_sup_trau"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Pélvis</label>
                                                                                        <select name="e_pelvis_trau" id="e_pelvis_trau" data-titulo="Pélvis" class="form-control form-control-sm"data-seccion="Examen Segmentario"  onchange="evaluar_para_carga_detalle('e_pelvis_trau','div_e_pelvis_trau','obs_e_pelvis',2);">
                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Anormal</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_pelvis_trau" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Pélvis</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Pélvis" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_pelvis_trau" id="obs_e_pelvis_trau"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Extremidades Inferiores</label>
                                                                                        <select name="e_ext_infer_trau" id="e_ext_infer_trau" data-titulo="Extremidadess Inferiores" class="form-control form-control-sm"data-seccion="Examen Segmentario"  onchange="evaluar_para_carga_detalle('e_ext_infer_trau','div_e_ext_infer_trau','obs_e_ext_infer_trau',2);">
                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Anormal</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_ext_infer_trau" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Extremidades Inferiores</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Inferiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_ext_infer_trau" id="obs_e_ext_infer_trau"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Tendones y ligamentos</label>
                                                                                        <select name="e_tend_lig_trau" id="e_tend_lig_trau" data-titulo="Tendones y ligamentos" class="form-control form-control-sm"data-seccion="Examen Segmentario"  onchange="evaluar_para_carga_detalle('e_tend_lig_trau','div_e_tend_lig_trau','obs_e_tend_lig_trau',2);">
                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Anormal</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_tend_lig_trau" style="display:none">
                                                                                        <label class="floating-label-activo-sm">Tendones y ligamentos</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Tendones y ligamentos" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_tend_lig_trau" id="obs_e_tend_lig_trau"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Evaluación EVA</label>
                                                                                        <input type="text" class="form-control form-control-sm" name="eval_eva_trau" id="eval_eva_trau">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="form-group col-md-12">
                                                                                    <label class="floating-label-activo-sm">Observaciones Ex. Segmentario</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Ex Segmentario" data-seccion="Examen Segmentario"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_segmentario" id="obs_ex_segmentario"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!--LUXOFRACTURAS-->
                                                                        <div class="tab-pane fade show " id="examen-traumato" role="tabpanel" aria-labelledby="examen-traumato-tab">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="f-16 text-c-blue mb-3">Masas y Tumores</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Localización</label>
                                                                                        <select name="e_localizacion" data-titulo="Localización" data-seccion="Masas y Tumores" id="e_localizacion" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_localizacion','div_e_obs_localizacion','e_obs_localizacion',2);">
                                                                                            <option selected  value="1">Normal</option>
                                                                                            <option value="2">Anormal</option>
                                                                                            <option value="3">Ex. No Realizado</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_obs_localizacion" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Localización <i>(describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Localización" data-seccion="Masas y Tumores" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_obs_localizacion" id="e_obs_localizacion"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Signos y Síntomas</label>
                                                                                        <select name="e_signos_sintomas" id="e_signos_sintomas" data-titulo="Signos y Síntomas" data-seccion="Masas y Tumores" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_signos_sintomas','div_e_signos_sintomas','obs_e_signos_sintomas',2);">
                                                                                            <option selected value="1">Normales</option>
                                                                                            <option value="2">Anormales</option>
                                                                                            <option value="3">No Informadas</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_signos_sintomas" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Signos y Síntomas <i>(describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Obs. Signos y Síntomas" data-seccion="Masas y Tumores" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_signos_sintomas" id="obs_e_signos_sintomas"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Crecimiento</label>
                                                                                        <select name="e_crecimiento" id="e_crecimiento" data-titulo="Crecimiento" data-seccion="Masas y Tumores" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_crecimiento','div_e_crecimiento','obs_e_crecimiento',3);">
                                                                                            <option selected value="1">Lento e Indoloro</option>
                                                                                            <option value="2">Rápido e Indoloro</option>
                                                                                            <option value="3">Otros Describir</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_crecimiento" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Crecimiento <i>(describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Obs. Crecimiento" data-seccion="Masas y Tumores" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_crecimiento" id="obs_e_crecimiento"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Obs. Masas y Tumores</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Masas y Tumores" data-seccion="Masas y Tumores" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_masas_tumores" id="obs_e_masas_tumores"></textarea>
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

                                <!--HOSPITALIZACION-->
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

                                <!-- control post qx -->
                                <div class="col-sm-12 col-md-12 mt-2">
                                    <div class="card-a">
                                        <div class="card-header-a" id="Control_traumato">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#traumato_ta" aria-expanded="false" aria-controls="traumato_ta">
                                                Control Post Quirúrgico
                                            </button>
                                        </div>
                                        <div id="traumato_ta" class="collapse" aria-labelledby="cirugia_general" data-parent="#Control_traumato">
                                            <div class="card-body-aten-a">
                                                <div id="form-cir_control_cir_ped">
                                                    <div class="form-row mb-2">
                                                        <div class="col-md-12">
                                                            <h5 style="text-align:center;">Control Traumatológico</h5>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <!-- Estado General -->
                                                        <div class="col-md-6">
                                                            <div class="form-group" >
                                                                <label class="floating-label-activo-sm">Estado General</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Estado General" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="eg_cpq_cg" id="eg_cpq_cg"></textarea>
                                                            </div>
                                                        </div>
                                                        <!-- Herida Operatoria Curación -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Herida Operatoria Curación</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Herida Operatoria Curación" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="hoc_cpa_cg" id="hoc_cpa_cg"></textarea>
                                                            </div>
                                                        </div>
                                                        <!-- Masas Palpables -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Estado Inmovilización</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Estado Inmovilización" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="estado_inmovil_cpq_cg" id="estado_inmovil_cpq_cg"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Masas Palpables</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Masas Palpables" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="masas_cpq_cg" id="masas_cpq_cg"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Estudio Rx.</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Estudio Rx." rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="estudios_rx_cpq_cg" id="estudios_rx_cpq_cg"></textarea>
                                                            </div>
                                                        </div>
														 <!-- botones modal -->
														<div class="col-md-3">
															<div class="form-group">
															   <button type="button" class="btn btn-outline-primary btn-sm btn-block mb-2" onclick="no_disponible();"></i> Ver Protocolo Cirugía</button>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
															   <button type="button" class="btn btn-outline-primary btn-sm btn-block mb-2" onclick="no_disponible();"></i> Ver Epicrisis</button>
															</div>
														</div>
                                                    </div>
                                                    <!-- Observaciones Estado General Paciente -->
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label-activo-sm">Observaciones Estado General Paciente</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Estado general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_egp_cpq_cg" id="obs_egp_cpq_cg"></textarea>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- cierre control post qx -->

                                <!-- diagnostico -->
                                <div class="col-sm-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="diagnostico_trau">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_trau_c" aria-expanded="false" aria-controls="diagnostico_trau_c">
                                                Diagnóstico
                                            </button>
                                        </div>
                                        <div id="diagnostico_trau_c" class="collapse show" aria-labelledby="diagnostico_trau" data-parent="#diagnostico_trau">
                                            <div class="card-body-aten-a">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                                        <input type="text" class="form-control form-control-sm"  data-input_igual="lic_descripcion_hipotesis" name="descripcion_hipotesis_trau" id="descripcion_hipotesis_trau" onchange="cargarIgual('descripcion_hipotesis_trau')" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm">Indicaciones</label>
                                                        <input type="text" class="form-control form-control-sm" name="ind_esp_cirugia_trau" id="ind_esp_cirugia_trau">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                        <input type="text" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie" name="descripcion_cie_esp_trau" id="descripcion_cie_esp_trau" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('descripcion_cie_esp_trau')">
                                                        <input type="hidden" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie" name="id_descripcion_cie_esp_trau" id="id_descripcion_cie_esp_trau" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('id_descripcion_cie_esp_trau')">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- cierre diagnostico -->

                            </div>
                        </div>
                        <br>
                        <!--CIERRE: ATENCIÓN TRAUMATOLOGIA-->


                        <!--ATENCIÓN ORTOPEDICA-->
                        <div class="tab-pane fade show" id="ortopedia_gen" role="tabpanel" aria-labelledby="ortopedia_gen-tab">
                            <div class="row bg-white shadow-none rounded mx-1">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="tit-gen">Ficha de atención Ortopédia </h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="ortopedia" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset active" id="ortopedia_infanto_juv-tab" data-toggle="tab" href="#ortopedia_infanto_juv" role="tab" aria-controls="ortopedia_infanto_juv" aria-selected="true">Ortopedia del Infante</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset" id="atenc_ortopedia_tab" data-toggle="tab" href="#atenc_ortopedia" role="tab" aria-controls="atenc_ortopedia" aria-selected="true">Ortopedia Adulto</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content" id="ortopedia">
                                        <div class="tab-pane fade show active" id="ortopedia_infanto_juv" role="tabpanel" aria-labelledby="ortopedia_infanto_juv-tab">
                                           <hr>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="label">General</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Peso</label>
                                                        <input type="text" class="form-control form-control-sm" name="peso_ort_inf" id="peso_ort_inf">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Talla</label>
                                                        <input type="text" class="form-control form-control-sm" name="talla_ort_inf" id="talla_ort_inf">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Movilidad Espontánea</label>
                                                        <select name="e_lact_mov_ort_inf" id="e_lact_mov_ort_inf" data-titulo="Columna" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_lact_mov_ort_inf','div_e_lact_mov_ort_inf','obs_e_lact_mov_ort_inf',2);">
                                                            <option selected value="1">Normal</option>
                                                            <option value="2">Alterado Describir</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_e_lact_mov_ort_inf" style="display:none">
                                                        <label class="floating-label-activo-sm"> Describir Movilidad Espontánea</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Columna" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_lact_mov_ort_inf" id="obs_e_lact_mov_ort_inf"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="label">Exploración Axial</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Movilidad Cervical</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Superiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_mov_cerv_ort_inf" id="e_mov_cerv_ort_inf"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Musc Esternocleidomastoídeo</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Superiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_musc_ester_ort_inf" id="e_musc_ester_ort_inf"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Test de Adams</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Inferiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_test_adams_ort_inf" id="e_test_adams_ort_inf"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="label"></label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-5 col-lg-4 col-xl-5">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Angiomas vellosidades etc.</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Inferiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_ang_vello_ort_inf" id="e_ang_vello_ort_inf"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Cifosis Lumbar</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Inferiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_cifo_lum_ort_inf" id="e_cifo_lum_ort_inf"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="label">Exploración Periférica Mb. Superior</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Flexo-extensión de codo</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Superiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_flx_codo_ort_inf" id="e_flx_codo_ort_inf"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Dedo en resorte</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Superiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_dedo_resort_ort_inf" id="e_dedo_resort_ort_inf"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Rigidez</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Inferiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_rigidez_ort_inf" id="e_rigidez_ort_inf"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="label">Exploración Periférica Mb. Inferior</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Cadera M. de Ortolani Barlow</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Superiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_cadera_below_ort_inf" id="e_cadera_below_ort_inf"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Abducción</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Superiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_abduccion_ort_inf" id="e_abduccion_ort_inf"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Pliegues Poplíteos</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Inferiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_plieg_poplit_ort_inf" id="e_plieg_poplit_ort_inf"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="label"></label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Rodillas Flexo recurvatum</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Inferiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_rodi_flx_recur_ort_inf" id="e_rodi_flx_recur_ort_inf"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Pié Flexión dorsal</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Inferiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_pie_flex_dor_ort_inf" id="e_pie_flex_dor_ort_inf"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Pié Valgo/Varo de retropíe</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Inferiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_pie_val_retro_ort_inf" id="e_pie_val_retro_ort_inf"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="label"></label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Aspecto Plantar</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Inferiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_asp_plant_ort_inf" id="e_asp_plant_ort_inf"></textarea>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Pié Valgo/Varo de retropíe</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Inferiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_extinfer" id="obs_e_extinfer"></textarea>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label-activo-sm">Observaciones Ortopedia del Lactante</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Ex Segmentario" data-seccion="Examen Segmentario"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ort_lactante" id="obs_ort_lactante"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" id="atenc_ortopedia" role="tabpanel" aria-labelledby="atenc_ortopedia_tab">
                                           <hr>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="label">General</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Peso</label>
                                                        <input type="text" class="form-control form-control-sm" name="peso_ort_adul" id="peso_ort_adul">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Talla</label>
                                                        <input type="text" class="form-control form-control-sm" name="talla_ort_adul" id="talla_ort_adul">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Manipulación</label>
                                                        <select name="e_manipulacion_ort_adul" id="e_manipulacion_ort_adul" data-titulo="Columna" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_manipulacion_ort_adul','div_e_manipulacion_ort_adul','obs_e_manipulacion_ort_adul',2);">
                                                            <option selected value="1">Normal</option>
                                                            <option value="2">Alterado Describir</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_e_manipulacion_ort_adul" style="display:none">
                                                        <label class="floating-label-activo-sm"> Describir Manipulación/label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Columna" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_manipulacion_ort_adul" id="obs_e_manipulacion_ort_adul"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Evaluación EVA</label>
                                                        <input type="text" class="form-control form-control-sm" name="e_eval_eva_ort_adul" id="e_eval_eva_ort_adul">
                                                    </div>

                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="label"></label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Características del Dolor</label>
                                                        <select name="e_carac_dolo_ort_adul" id="e_carac_dolo_ort_adul" data-titulo="Columna" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_carac_dolo_ort_adul','div_e_carac_dolo_ort_adul','obs_e_carac_dolo_ort_adul',2);">
                                                            <option selected value="1">Normal</option>
                                                            <option value="2">Alterado Describir</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_e_carac_dolo_ort_adul" style="display:none">
                                                        <label class="floating-label-activo-sm"> Características del Dolor</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Columna" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_carac_dolo_ort_adul" id="obs_e_carac_dolo_ort_adul"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Agravantes</label>
                                                        <input type="text" class="form-control form-control-sm" name="e_agravant_ort_adul" id="e_agravant_ort_adul">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Marcha</label>
                                                        <select name="e_marcha_ort_adul" id="e_marcha_ort_adul" data-titulo="Columna" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_marcha_ort_adul','div_e_marcha_ort_adul','obs_e_marcha_ort_adul',2);">
                                                            <option selected value="1">Normal</option>
                                                            <option value="2">Alterado Describir</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_e_marcha_ort_adul" style="display:none">
                                                        <label class="floating-label-activo-sm"> Describir Manipulación</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Columna" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_marcha_ort_adul" id="obs_e_marcha_ort_adul"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Postura</label>
                                                        <select name="e_postura_ort_adul" id="e_postura_ort_adul" data-titulo="Columna" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_postura_ort_adul','div_e_postura_ort_adul','obs_e_postura_ort_adul',2);">
                                                            <option selected value="1">Normal</option>
                                                            <option value="2">Alterado Describir</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_e_postura_ort_adul" style="display:none">
                                                        <label class="floating-label-activo-sm">Postura</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Columna" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_postura_ort_adul" id="obs_e_postura_ort_adul"></textarea>
                                                    </div>

                                                </div>


                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="label">Exploración Axial</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Movilidad Vertebral</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Superiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_mov_vert_ort_adul" id="e_mov_vert_ort_adul"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Ritmo Lumbo-Pélvico</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Superiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_ritm_lum_pelv_ort_adul" id="e_ritm_lum_pelv_ort_adul"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Indice Cif/Lord Sagital</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Inferiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_indice_sagital_ort_adul" id="e_indice_sagital_ort_adul"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="label"></label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-5 col-lg-4 col-xl-5">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Irritación radicular</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Inferiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_irri_radic_ort_adul" id="e_irri_radic_ort_adul"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Neurológico basico</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Inferiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_neuro_basi_ort_adul" id="e_neuro_basi_ort_adul"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="label">Exploración Periférica</label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Balance articular (inclinómetro)</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Superiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_balan_arti_ort_adul" id="e_balan_arti_ort_adul"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Balance Muscular Manual</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Superiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_balan_mus_manu_ort_adul" id="e_balan_mus_manu_ort_adul"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Hiperlaxitud articular</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Inferiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_hiper_arti_ort_adul" id="e_hiper_arti_ort_adul"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label class="label"></label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Dismetría de miembros inferiores</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Superiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_dis_infe_ort_adul" id="e_dis_infe_ort_adul"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Signos Inflamatorios</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Superiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_signo_inflam_ort_adul" id="e_signo_inflam_ort_adul"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Test Clinicos</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Extremidades Inferiores" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_test_clin_ort_adul" id="e_test_clin_ort_adul"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label-activo-sm">Observaciones Ortopedia</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Ex Segmentario" data-seccion="Examen Segmentario"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ort_adul" id="obs_ort_adul"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="diagnostico_ort">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_ort_c" aria-expanded="false" aria-controls="diagnostico_ort_c">
                                                Diagnóstico
                                            </button>
                                        </div>
                                        <div id="diagnostico_ort_c" class="collapse show" aria-labelledby="diagnostico_ort" data-parent="#diagnostico_ort">
                                            <div class="card-body-aten-a">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                                        <input type="text" class="form-control form-control-sm"  data-input_igual="lic_descripcion_hipotesis" name="descripcion_hipotesis_ort" id="descripcion_hipotesis_ort" onchange="cargarIgual('descripcion_hipotesis_ort')" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm">Indicaciones</label>
                                                        <input type="text" class="form-control form-control-sm" name="ind_esp_cirugia_ort" id="ind_esp_cirugia_ort">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                        <input type="text" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie" name="descripcion_cie_esp_ort" id="descripcion_cie_esp_ort" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('descripcion_cie_esp_ort')">
                                                        <input type="hidden" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie" name="id_descripcion_cie_esp_ort" id="id_descripcion_cie_esp_ort" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('id_descripcion_cie_esp_ort')">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: ATENCIÓN ORTOPEDICA--->

                        {{--  div de botones  --}}
                        <div class="bg-white shadow-none rounded mx-1 p-15">
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                            @include('general.secciones_ficha.seccion_receta_examen_comunes')
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->
                            <hr>
                            <!--GUARDAR O IMPRIMIR FICHA-->
                            <div class="row mb-3">
                                <div class="col-md-12 text-center">
                                    <input type="submit" class="btn btn-info mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
                                    <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@section('page-script-ficha-atencion')
    <script>
        $(document).ready(function() {
            /* formatear rut */
            $("#solicitado_por_rut_eda").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });
             /* formatear rut */
             $("#solicitado_por_rut_edb").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });
            /** fin formulario pestaña 1 */
            /** diagnostico traumatologia */
            $('#descripcion_hipotesis_trau').keyup(function(){
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
		/** MENSAJE*/
		/** CARGAR mensaje */
		$('#mensaje_ficha').html(' Solo el campo dignóstico es Obligatorio el resto es  opcional');
		$('#mensaje_ficha').show();
		setTimeout(function(){
			$('#mensaje_ficha').hide();
		}, 5000);
            /** diagnostico ortopedia */
            $('#descripcion_hipotesis_ort').keyup(function(){
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

            $("#descripcion_cie_esp_trau").autocomplete({
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
                    $('#descripcion_cie_esp_trau').val(ui.item.label); // display the selected text
                    $('#id_descripcion_cie_esp_trau').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

            $("#descripcion_cie_esp_ort").autocomplete({
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
                    $('#descripcion_cie_esp_ort').val(ui.item.label); // display the selected text
                    $('#id_descripcion_cie_esp_ort').val(ui.item.value); // save selected id to input
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

        })

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
                            $('#solicitado_por_nombre_eda').val('');
                            $('#solicitado_por_apellido_eda').val('');
                            $('#solicitado_por_telefono_eda').val('');
                            $('#solicitado_por_email_eda').val('');
                        }
                        else
                        {
                            mensaje = 'Profesional no encontrato, debe ingresar datos.';
                            $('#'+input_nombre).val('');
                            $('#'+input_id).val('');
                            $('#'+div_solicitar).show();
                            $('#div_mensaje').show();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_por_nombre_eda').val('');
                            $('#solicitado_por_apellido_eda').val('');
                            $('#solicitado_por_telefono_eda').val('');
                            $('#solicitado_por_email_eda').val('');
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
        function cargarIgual(input){

            let actual = $('#'+input);
            let equivalentes = $('#'+input).attr('data-input_igual').split(',');
            $.each(equivalentes, function( index, value ) {
                var equivalente = $('#'+value);
                equivalente.val(actual.val());
            });
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

        function abrir_modal_guardar_tipo(div_id_data, div_id_detalle,tipo)
        {
            $("#modal_registrar_ficha_tipo_dg").unbind();
            if(tipo == 'cdg')
            {
                $('#btn_modal_registrar_ficha_tipo_dg').click(function(){
                    guardar_tipo_ficha_cdg();
                });
            }
            else if(tipo == 'cg')
            {
                $('#btn_modal_registrar_ficha_tipo_dg').click(function(){
                    guardar_tipo_ficha_cg();
                });
            }
            $('#modal_registrar_ficha_tipo_dg').modal('show');

            cargarSeccion(div_id_detalle,div_id_data);
        }

        function cargarSeccion(div_destino, div_data)
        {
            // var tipo = $('#'+select+'').val();
            $('#'+div_destino).html('');
            $('#'+div_data).find('select,textarea').each(function(key, elemento){
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
                    html +='<div class="col-md-4">'+$(elemento).data('titulo')+'</div>';
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

        function guardar_tipo_ficha_cdg()
        {
            var registro_f_t_cg_nombre = $('#registro_f_t_cg_nombre').val();
            var registro_f_t_cg_descripcion = $('#registro_f_t_cg_descripcion').val();
            var _token = CSRF_TOKEN;
            if(registro_f_t_cg_nombre == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }
            if(registro_f_t_cg_descripcion == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }


            var data = [];
            data.registro_f_t_cg_nombre = registro_f_t_cg_nombre;
            data.registro_f_t_cg_descripcion = registro_f_t_cg_descripcion;

            $('#registro_f_t_cg_detalle').find('input,textarea').each(function(key, elemento){
                {{--  console.log($(elemento).attr('id'));  --}}
                {{--  console.log($(elemento).val());  --}}
                {{--  console.log($(elemento).prop('nodeName'));  --}}
                {{--  console.log('*******');  --}}

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            {{--  console.log(data);  --}}
            url = "{{ route('profesional.ficha_tipo_cdg') }}";
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional : $('#id_profesional_fc').val(),
                    ind_esp_cirugia : '',
                    nombre : data.registro_f_t_cg_nombre,
                    descripcion : data.registro_f_t_cg_descripcion,
                    dolor_cdg : data.modal_agregar_tipo_dolor_cdg,
                    obs_dolor_cdg : data.observaciones_obs_dolor_cdg,
                    dolor_cdg : data.modal_agregar_tipo_dolor_cdg,
                    obs_dolor_cdg : data.observaciones_obs_dolor_cdg,
                    otros_sintomas_cdg : data.modal_agregar_tipo_otros_sintomas_cdg,
                    obs_otros_sintomas_cdg : data.observaciones_obs_otros_sintomas_cdg,
                    ceg_cdg : data.modal_agregar_tipo_ceg_cdg,
                    obs_ceg_cdg : data.observaciones_obs_ceg_cdg,
                    masa_cdg : data.modal_agregar_tipo_masa_cdg,
                    obs_masa_cdg : data.observaciones_obs_masa_cdg,
                    urgencia_cdg : data.modal_agregar_tipo_urgencia_cdg,
                    obs_urgencia_cdg : data.observaciones_obs_urgencia_cdg,
                    so_cdg : data.modal_agregar_tipo_so_cdg,
                    obs_so_cdg : data.observaciones_obs_so_cdg,
                    obs_egp_cdg : data.observaciones_obs_egp_cdg,
                    obs_gen_ex_esp_cdg : data.observaciones_obs_gen_ex_esp_cdg,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $('#modal_registrar_ficha_tipo_dg').modal('hide');
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

        /* function guardar_tipo_ficha_cg()
        {
            var registro_f_t_cg_nombre = $('#registro_f_t_cg_nombre').val();
            var registro_f_t_cg_descripcion = $('#registro_f_t_cg_descripcion').val();
            var _token = CSRF_TOKEN;
            if(registro_f_t_cg_nombre == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }
            if(registro_f_t_cg_descripcion == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }


            var data = [];
            data.registro_f_t_cg_nombre = registro_f_t_cg_nombre;
            data.registro_f_t_cg_descripcion = registro_f_t_cg_descripcion;

            $('#registro_f_t_cg_detalle').find('input,textarea').each(function(key, elemento){
                {{--  console.log($(elemento).attr('id'));  --}}
                {{--  console.log($(elemento).val());  --}}
                {{--  console.log($(elemento).prop('nodeName'));  --}}
                {{--  console.log('*******');  --}}

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            {{--  console.log(data);  --}}
            url = "{{ route('profesional.ficha_tipo_cg') }}";
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional : $('#id_profesional_fc').val(),
                    ind_esp_cirugia : '',
                    nombre : data.registro_f_t_cg_nombre,
                    descripcion : data.registro_f_t_cg_descripcion,
                    organo_cg : data.modal_agregar_tipo_organo_cg,
                    obs_organo_cg : data.observaciones_obs_organo_cg,
                    ceg_cg : data.modal_agregar_tipo_ceg_cg,
                    obs_ceg_cg : data.observaciones_obs_ceg_cg,
                    masa_cg : data.modal_agregar_tipo_masa_cg,
                    obs_masas_cg : data.observaciones_obs_masas_cg,
                    urgencia_cg : data.modal_agregar_tipo_urgencia_cg,
                    obs_urgencia_cg : data.observaciones_obs_urgencia_cg,
                    so_cg : data.modal_agregar_tipo_so_cg,
                    obs_so_cg : data.observaciones_obs_so_cg,
                    obs_egp_cg : data.observaciones_obs_egp_cg,
                    obs_gen_ex_esp_cg : data.observaciones_obs_gen_ex_esp_cg,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $('#modal_registrar_ficha_tipo_dg').modal('hide');
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
        */

        function cargar_info_ficha_tipo_cdg(select, div_descripcion)
        {
            let id_ft = $('#'+select).val();
            if(id_ft == '')
            {
                $('#'+div_descripcion).html('');
                $('#form-cdg').find('select,textarea').each(function(key, elemento){
                    if($(elemento).prop('nodeName') == 'SELECT')
                    {
                        $(elemento).val(0);
                    }
                    else
                    {
                        $(elemento).val('');
                    }
                });

                evaluar_para_carga_detalle('dolor_cdg','div_detalle_dolor','obs_dolor_cdg',2);
                evaluar_para_carga_detalle('otros_sintomas_cdg','div_detalle_cd_otros_sintomas','obs_otros_sintomas_cdg',2);
                evaluar_para_carga_detalle('ceg_cdg','div_detalle_ceg_cdg','obs_ceg_cdg',2);
                evaluar_para_carga_detalle('masa_cdg','div_detalle_masa_cdg','obs_masa_cdg',2);
                evaluar_para_carga_detalle('urgencia_cdg','div_detalle_urgencia_cdg','obs_urgencia_cdg',2);
                evaluar_para_carga_detalle('so_cdg','div_detale_sospecha__organo_cdg','obs_so_cdg',2);

                return false;
            }
            $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

            url = "{{ route('profesional.buscar_ficha_tipo_cdg') }}";
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    id_profesional : $('#id_profesional_fc').val(),
                    id_ficha_tipo :  id_ft,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        {{--  console.log(index);  --}}
                        {{--  console.log(value);  --}}
                        {{--  console.log($('#'+index));  --}}

                        $('#'+index).val(value);
                    });
                    evaluar_para_carga_detalle('dolor_cdg','div_detalle_dolor','obs_dolor_cdg',2);
                    evaluar_para_carga_detalle('otros_sintomas_cdg','div_detalle_cd_otros_sintomas','obs_otros_sintomas_cdg',2);
                    evaluar_para_carga_detalle('ceg_cdg','div_detalle_ceg_cdg','obs_ceg_cdg',2);
                    evaluar_para_carga_detalle('masa_cdg','div_detalle_masa_cdg','obs_masa_cdg',2);
                    evaluar_para_carga_detalle('urgencia_cdg','div_detalle_urgencia_cdg','obs_urgencia_cdg',2);
                    evaluar_para_carga_detalle('so_cdg','div_detale_sospecha__organo_cdg','obs_so_cdg',2);

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

        function cargar_info_ficha_tipo_cg(select, div_descripcion)
        {
            let id_ft = $('#'+select).val();
            if(id_ft == '')
            {
                $('#'+div_descripcion).html('');
                $('#form-cg').find('select,textarea').each(function(key, elemento){
                    if($(elemento).prop('nodeName') == 'SELECT')
                    {
                        $(elemento).val(1);
                    }
                    else
                    {
                        $(elemento).val('');
                    }
                });

                evaluar_para_carga_detalle('organo_cg','div_detalle_organo','obs_organo_cg',2);
                evaluar_para_carga_detalle('ceg_cg','div_detalle_ceg_cg','obs_ceg_cg',2);
                evaluar_para_carga_detalle('masa_cg','div_detalle_masa_cg','obs_masas_cg',2);
                evaluar_para_carga_detalle('urgencia_cg','div_detalle_urgencia_cg','obs_urgencia_cg',2);
                evaluar_para_carga_detalle('so_cg','div_detalle_so_cg','obs_so_cg',2);

                return false;
            }
            $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

            url = "{{ route('profesional.buscar_ficha_tipo_cg') }}";
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    id_profesional : $('#id_profesional_fc').val(),
                    id_ficha_tipo :  id_ft,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        {{--  console.log(index);  --}}
                        {{--  console.log(value);  --}}
                        {{--  console.log($('#'+index));  --}}

                        $('#'+index).val(value);
                    });
                    evaluar_para_carga_detalle('organo_cg','div_detalle_organo','obs_organo_cg',2);
                    evaluar_para_carga_detalle('ceg_cg','div_detalle_ceg_cg','obs_ceg_cg',2);
                    evaluar_para_carga_detalle('masa_cg','div_detalle_masa_cg','obs_masas_cg',2);
                    evaluar_para_carga_detalle('urgencia_cg','div_detalle_urgencia_cg','obs_urgencia_cg',2);
                    evaluar_para_carga_detalle('so_cg','div_detalle_so_cg','obs_so_cg',2);

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

        function agregar_examenes_ficha() {
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


		function biopsia_endo_gas() {
            if($('#biopsia_end_gast').prop('checked'))
			{
				$('#m_biopsia_cir').modal('show');
			}
        }

        function biopsia_endo_colon() {
            if($('#biopsia_colon').prop('checked'))
			{
				$('#m_biopsia_cir').modal('show');
			}
        }

		function muestra_hp_abrir_div()
		{
			if($('#muestra_hp').prop('checked'))
			{
				$('#div_select_muestra_hp').show();
			}
			else
			{
				$('#div_select_muestra_hp').hide();
				$('#muestra_hp_resultado').val('');
			}

		}

        /** MANEJO DE IMAGENES */
        var myDropzone ;
        Dropzone.options.imgEdga = {
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
        /** CIERRE MANEJO DE IMAGENES */

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
                            $('#solicitado_por_nombre_cda').val('');
                            $('#solicitado_por_apellido_cda').val('');
                            $('#solicitado_por_telefono_cda').val('');
                            $('#solicitado_por_email_cda').val('');
                        }
                        else
                        {
                            mensaje = 'Profesional no encontrato, debe ingresar datos.';
                            $('#'+input_nombre).val('');
                            $('#'+input_id).val('');
                            $('#'+div_solicitar).show();
                            $('#div_mensaje').show();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_por_nombre_cda').val('');
                            $('#solicitado_por_apellido_cda').val('');
                            $('#solicitado_por_telefono_cda').val('');
                            $('#solicitado_por_email_cda').val('');
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


    </script>

    <!--ALERTA DE ATENCION-->
    <script>
    window.setTimeout(function() {
        $(".alert-atencion").fadeTo(500, 0).slideUp(600, function(){
            $(this).remove(); 
        });
    }, 5000);

@endsection


