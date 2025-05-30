<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 ">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="oft" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_dent_impl_tab" data-toggle="tab" href="#atencion_dent_impl" role="tab" aria-controls="atencion_dent_impl" aria-selected="true">Atención especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="odonto_adulto_tab" data-toggle="tab" href="#odonto_adulto" role="tab" aria-controls="odonto_adulto" aria-selected="false">Odontograma</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="eval_periimpl_tab" data-toggle="tab" href="#eval_periimpl" role="tab" aria-controls="eval_periimpl" aria-selected="false">Evaluación-Periodonto-pre-implantar</a>
                    </li>
                    {{-- <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="evaluacion_general_tab" data-toggle="tab" href="#evaluacion_general" role="tab" aria-controls="evaluacion_general" aria-selected="false">Evaluación General</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="tratamiento_tab" data-toggle="tab" href="#tratamiento" role="tab" aria-controls="tratamiento" aria-selected="false">Tratamiento/Presupuesto</a>
                    </li> --}}
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="presupuesto_tab" data-toggle="tab" href="#presupuesto" role="tab" aria-controls="presupuesto" aria-selected="false">Presupuesto</a>
                    </li>
                </ul>
            </div>
             <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert" id="mensaje_ficha"></div>
            </div>
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {!! nl2br(e(session('success'))) !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {!! session('error') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <!-- Tu formulario o contenido aquí -->
            </div>
            <div class="col-sm-12 col-md-12">
                <form action="{{ route('dental.registrar_ficha_atencion_dental') }}" method="POST">
                    <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                    <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                    <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                    <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                    <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                    <input type="hidden" name="ficha_id_atencion_dental_odon" value="{{ $id_ficha_atencion }}" id="ficha_id_atencion_dental_odon">
                    <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                    <input type="hidden" name="id_paciente" value="{{ $paciente->id }}" id="id_paciente">
                    <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">
                    <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                    <input type="hidden" name="id_especialidad" id="id_especialidad" value="{{ $profesional->id_especialidad }}">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="ficha_id_lugar_atencion" value="{{ $id_lugar_atencion }}" id="ficha_id_lugar_atencion">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                    <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">
                    <input type="hidden" name="tipo_examen_especial" id="tipo_examen_especial" value="{{ $lista_examen_especial }}">
                    <input type="hidden" name="random_preimpl" id="random_preimpl" value="">
                    <input type="hidden" name="random_postimpl" id="random_postimpl" value="">
                    @csrf
                    <div class="tab-content" id="od_imp-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_dent_impl" role="tabpanel" aria-labelledby="atencion_dent_impl_tab">
                            <!--FORMULARIOS menor-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3 mb-0">
                                <!--Formulario / Menor de edad-->
                                @include('general.secciones_ficha.seccion_menor')
                                <!--Cierre: Formulario / Menor de edad-->
                            </div>
                            <!--Motivo consulta-->
                                 @include('atencion_odontologica.generales.motivo_consulta')
                            <!--EXAMEN ODONT GENERAL - PARAMETROS DE CONTROL-->
                                 @include('atencion_odontologica.generales.includes.odontologia_general')
                                @include('atencion_odontologica.generales.includes.odontologia_preimplante')
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="exam_esp_imp_col">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_imp_col_c" aria-expanded="false" aria-controls="exam_esp_imp_col_c">
                                            Tratamiento implantológico
                                        </button>
                                    </div>
                                    <div id="exam_esp_imp_col_c" class="collapse" aria-labelledby="exam_esp_imp_col" data-parent="#exam_esp_imp_col">
                                        <div class="card-body-aten-a shadow-none">
                                            <div id="form-col_implantes">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="coloc_impl" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="col_implantes_tab" data-toggle="tab" href="#col_implantes" role="tab" aria-controls="col_implantes" aria-selected="true">Procedimiento</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="protocolo_implantes_tab" data-toggle="tab" href="#protocolo_implantes" role="tab" aria-controls="protocolo_implantes" aria-selected="true">Protocolo e Indicaciones</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="col_implante">
                                                            <!--PROCEDIMIENTO-->
                                                            <div class="tab-pane fade show active" id="col_implantes" role="tabpanel" aria-labelledby="col_implantes_tab">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4">
                                                                        <h6 class="t-aten d-inline"> Procedimiento</h6>
                                                                        <button type="button" class="btn btn-info btn-sm  d-inline float-md-right mt-n2 mb-2" onclick="mostrar_nueva_pieza_dental_tto_impl(1000)"><i class="fas fa-plus"></i> Añadir pieza</button>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div id="contenedor_tto_implantologia">
                                                                            @php $counter = 1 @endphp
                                                                            @foreach ($examenes_tto_implantes as $e)
                                                                            <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="card-informacion">
                                                                                    <div class="card-body">
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                <input type="text" class="form-control form-control-sm" name="numero_pieza_tto_impl{{ $counter }}" id="numero_pieza_tto_impl{{ $counter }}" value="{{ $e->numero_pieza }}">
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Tipo de Procedimiento</label>
                                                                                                    <select name="tpo_proc_imp{{ $counter }}" data-titulo="tpo_proc_imp" data-seccion="Implante"  id="tpo_proc_imp{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_proc_imp{{ $counter }}','div_tpo_proc_imp{{ $counter }}','obs_tpo_proc_impo{{ $counter }}',10);">
                                                                                                        @foreach ($tratamientos_implantologia as $t)
                                                                                                            <option value="{{ $t->id }}" @if($e->id_tipo_procedimiento == $t->id) selected @endif>{{ $t->descripcion }}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group" id="div_tpo_proc_imp{{ $counter }}" style="display:none;">
                                                                                                    <label class="floating-label-activo-sm">Otro tipo de Procedimiento</label>
                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tpo_proc_imp{{ $counter }}" id="obs_tpo_proc_imp{{ $counter }}">{{ $e->tipo_procedimiento }}</textarea>
                                                                                                    <div class="form-group mt-3">
                                                                                                        <label class="floating-label-activo-sm">UCO?</label>
                                                                                                        <input type="text"class="form-control form-control-sm" id="uco_tto{{ $counter }}">
                                                                                                    </div>
                                                                                                    <div class="form-group mt-3">
                                                                                                        <label class="floating-label-activo-sm">Laboratorio</label>
                                                                                                        <input type="text"class="form-control form-control-sm" id="lab_tto{{ $counter }}">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Anestesia</label>
                                                                                                    <select name="anestesia_impl{{ $counter }}" data-titulo="anestesia_impl" data-seccion="anestesia_impl{{ $counter }}"  id="anestesia_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('anestesia_impl{{ $counter }}','div_anestesia_impl{{ $counter }}','obs_anestesia_impl{{ $counter }}',4);">
                                                                                                        <option @if($e->id_tipo_anestesia == 1) selected @endif value="1">Local</option>
                                                                                                        <option @if($e->id_tipo_anestesia == 2) selected @endif value="2">Local mas sedación consciente</option>
                                                                                                        <option @if($e->id_tipo_anestesia == 3) selected @endif value="3">Anestesia General</option>
                                                                                                        <option @if($e->id_tipo_anestesia == 4) selected @endif value="4">Otro describir</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group" id="div_anestesia_impl{{ $counter }}" @if($e->id_tipo_anestesia !== 4) style="display:none;"  @endif >
                                                                                                    <label class="floating-label-activo-sm">Otra anestesia</label>
                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anestesia_impl{{ $counter }}" id="obs_anestesia_impl{{ $counter }}">{{ $e->anestesia }}</textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                <div class="form-group">
                                                                                                    <label for="" class="floating-label-activo-sm">N° de tubos</label>
                                                                                                    <input type="text" class="form-control form-control-sm" name="numero_tubos_impl{{ $counter }}" id="numero_tubos_impl{{ $counter }}" value="{{ $e->numero_tubos }}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                <div class="form-group">
                                                                                                    <label for="" class="floating-label-activo-sm">Técnica de antestesia</label>
                                                                                                    <select name="tec_anestesia_impl{{ $counter }}" data-titulo="tec_anestesia_impl{{ $counter }}" data-seccion="tec_anestesia_impl{{ $counter }}"  id="tec_anestesia_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tec_anestesia_impl{{ $counter }}','div_tec_anestesia_impl{{ $counter }}','obs_tec_anestesia_impl{{ $counter }}',10);">
                                                                                                        <option @if($e->id_tecnica_anestesia == 1) selected @endif value="1">Infiltrativa vestibular </option>
                                                                                                        <option @if($e->id_tecnica_anestesia == 2) selected @endif value="2">Infiltrativa palatina/lingual</option>
                                                                                                        <option @if($e->id_tecnica_anestesia == 3) selected @endif value="3">Spix indirecta</option>
                                                                                                        <option @if($e->id_tecnica_anestesia == 4) selected @endif value="4">Spix directa</option>
                                                                                                        <option @if($e->id_tecnica_anestesia == 5) selected @endif value="5">Técnica de tuberosidad</option>
                                                                                                        <option @if($e->id_tecnica_anestesia == 6) selected @endif value="6">Técnica infraorbitaria</option>
                                                                                                        <option @if($e->id_tecnica_anestesia == 7) selected @endif value="7">Técnica carrea</option>
                                                                                                        <option @if($e->id_tecnica_anestesia == 8) selected @endif value="8">Técnica akinosi</option>
                                                                                                        <option @if($e->id_tecnica_anestesia == 9) selected @endif value="9">Técnica gowgates</option>
                                                                                                        <option @if($e->id_tecnica_anestesia == 10) selected @endif value="10">Otro describir</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group" id="div_tec_anestesia_impl{{ $counter }}" @if($e->id_tecnica_anestesia !== 10) style="display:none;" @endif>
                                                                                                    <label class="floating-label-activo-sm">Otra anestesia</label>
                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tec_anestesia_impl{{ $counter }}" id="obs_tec_anestesia_impl{{ $counter }}">{{ $e->tecnica_anestesia }}</textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                <div class="form-group">
                                                                                                    <label for="" class="floating-label-activo-sm">Anestésico</label>
                                                                                                    <select name="anestesico_impl{{ $counter }}" data-titulo="anestesico_impl{{ $counter }}" data-seccion="anestesico_impl"  id="anestesico_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('anestesico_impl{{ $counter }}','div_anestesico_impl{{ $counter }}','obs_anestesico_impl{{ $counter }}',6);">
                                                                                                        <option @if($e->id_anestesico == 1) selected @endif value="1">Lidocaína 2% </option>
                                                                                                        <option @if($e->id_anestesico == 2) selected @endif value="2">Mepivacaína 3%</option>
                                                                                                        <option @if($e->id_anestesico == 3) selected @endif value="3">Articaína 4%</option>
                                                                                                        <option @if($e->id_anestesico == 4) selected @endif value="4">Benzocaína 7.5%</option>
                                                                                                        <option @if($e->id_anestesico == 5) selected @endif value="5">Bupivacaína 7.5%</option>
                                                                                                        <option @if($e->id_anestesico == 6) selected @endif value="6">Otro describir</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group" id="div_anestesico_impl{{ $counter }}" @if($e->id_anestesico !== 6) style="display:none;" @endif>
                                                                                                    <label class="floating-label-activo-sm">Otro anestesico</label>
                                                                                                    <textarea class="form-control form-control-sm" data-titulo="anestisico_dental_title"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anestesico_impl{{ $counter }}" id="obs_anestesico_impl{{ $counter }}">{{ $e->anestesico }}</textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Incidentes</label>
                                                                                                    <select name="incid_col_impl{{ $counter }}" data-titulo="Ex_cuello" data-seccion="Cuello"  id="incid_col_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('incid_col_impl{{ $counter }}','div_incid_col_impl{{ $counter }}','obs_incid_col_impl{{ $counter }}',2);">
                                                                                                        <option @if($e->id_incidentes == 1) selected @endif  value="1">Sin incidentes</option>
                                                                                                        <option @if($e->id_incidentes == 2) selected @endif  value="2">Con Incidentes</option>

                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group" id="div_incid_col_impl{{ $counter }}" @if($e->id_incidentes !== 2) style="display:none;" @endif>
                                                                                                    <label class="floating-label-activo-sm">Obs</label>
                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_incid_col_impl{{ $counter }}" id="obs_incid_col_impl{{ $counter }}">{{ $e->incidentes }}</textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Material de injerto óseo</label>
                                                                                                    <select name="mat_inj_oseo_impl{{ $counter }}" data-titulo="Ex_cuello" data-seccion="Cuello"  id="mat_inj_oseo_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('mat_inj_oseo{{ $counter }}','div_mat_inj_oseo{{ $counter }}','obs_mat_inj_oseo{{ $counter }}',6);">
                                                                                                        <option @if($e->id_mat_injerto_oseo == 1) selected @endif value="1">Sin Injerto Óseo</option>
                                                                                                        <option @if($e->id_mat_injerto_oseo == 2) selected @endif value="2">autoinjerto</option>
                                                                                                        <option @if($e->id_mat_injerto_oseo == 3) selected @endif value="3">aloinjerto</option>
                                                                                                        <option @if($e->id_mat_injerto_oseo == 4) selected @endif value="4">xenoinjerto</option>
                                                                                                        <option @if($e->id_mat_injerto_oseo == 5) selected @endif value="5">aloplástico</option>
                                                                                                        <option @if($e->id_mat_injerto_oseo == 6) selected @endif value="6">Otro (describir)</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group" id="div_mat_inj_oseo{{ $counter }}" @if($e->id_mat_injerto_oseo !== 6) style="display:none;" @endif>
                                                                                                    <label class="floating-label-activo-sm">Otro tipo de injerto</label>
                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_mat_inj_oseo{{ $counter }}" id="obs_mat_inj_oseo{{ $counter }}">{{ $e->material_injerto_oseo }}</textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Método de injerto óseo</label>
                                                                                                    <input type="text" name="metodo_injerto_tto{{ $counter }}" id="metodo_injerto_tto{{ $counter }}" class="form-control form-control-sm" value="{{ $e->metodo_injerto_oseo }}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Suturas</label>
                                                                                                    <select name="suturas_impl{{ $counter }}" data-titulo="suturas_impl{{ $counter }}" data-seccion="suturas"  id="suturas_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('suturas_impl{{ $counter }}','div_suturas{{ $counter }}','obs_suturas{{ $counter }}',5);">
                                                                                                        <option @if($e->id_suturas == 1) selected @endif value="1">Catgut</option>
                                                                                                        <option @if($e->id_suturas == 2) selected @endif value="2">Seda</option>
                                                                                                        <option @if($e->id_suturas == 3) selected @endif value="3">Nylon</option>
                                                                                                        <option @if($e->id_suturas == 4) selected @endif value="4">Polipropileno</option>
                                                                                                        <option @if($e->id_suturas == 5) selected @endif value="5">Otro describir</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group" id="div_suturas{{ $counter }}" @if($e->id_suturas !== 5) style="display:none;" @endif>
                                                                                                    <label class="floating-label-activo-sm">Describa</label>
                                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_suturas{{ $counter }}" id="obs_suturas{{ $counter }}">{{ $e->suturas }}</textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2" >
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Grosor</label>
                                                                                                    <input type="text" name="grosor_nylon{{ $counter }}" id="grosor_nylon{{ $counter }}" class="form-control form-control-sm" value="{{ $e->grosor_nylon }}">
                                                                                                </div>
                                                                                                <div class="form-group" id="div_grosor_nylon{{ $counter }}" style="display:none;">
                                                                                                    <label class="floating-label-activo-sm">Describa</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_grosor_nylon{{ $counter }}" id="obs_grosor_nylon{{ $counter }}">{{ $e->grosor_nylon }}</textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                <div class="form-group">
                                                                                                    <label for="tiempo_quir_impl{{ $counter }}" class="floating-label-activo-sm">Tiempo quirúrgico</label>
                                                                                                    <input type="number" class="form-control form-control-sm" id="tiempo_quir_impl{{ $counter }}" value="{{ $e->tiempo_quirurgico }}">
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="card-footer">
                                                                                        <div class="form-group">
                                                                                            <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_tto_impl({{ $e->id }})">X</button>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                            @php $counter++; @endphp
                                                                            @endforeach
                                                                        </div>
                                                                        <div id="pieza_dental_tto_impl" >
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--PROTOCOLO-->
                                                            <div class="tab-pane fade show" id="protocolo_implantes" role="tabpanel" aria-labelledby="protocolo_implantes_tab">
                                                                <div class="form-row mt-2">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <h6 class="t-aten">Protocolos e indicaciones</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                            <a class="nav-link-aten text-reset active" id="prot_impl_tab" data-toggle="tab" href="#prot_impl" role="tab" aria-controls="prot_impl" aria-selected="true">Protocolo</a>
                                                                            <a class="nav-link-aten text-reset" id="ind_impl_tab" data-toggle="tab" href="#ind_impl" role="tab" aria-controls="ind_impl" aria-selected="false">Indicaciones</a>
                                                                            <a class="nav-link-aten text-reset" id="cit_control_impl_tab" data-toggle="tab" href="#cit_control_impl" role="tab" aria-controls="cit_control_impl" aria-selected="false">Control</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-10 col-xl-10">
                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                            <!--PROTOCOLO-->
                                                                            <div class="tab-pane fade show active" id="prot_impl" role="tabpanel" aria-labelledby="prot_impl_tab">
                                                                            <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <h6 class="sub-aten">Protocolo<h6>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Equipo Cirujanos</label>
                                                                                            <div class="d-flex">
                                                                                                <input class="form-control form-control-sm" type="text" name="prot_cirujanos_imp" id="prot_cirujanos_imp">
                                                                                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="agregar_cirujano_impl()"><i class="fas fa-plus"></i></button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="d-none" id="div_nuevo_cirujano_impl">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Nuevo Cirujano</label>
                                                                                                <div class="d-flex mb-3">
                                                                                                    <input type="text" class="form-control form-control-sm">
                                                                                                    <button type="button" class="btn btn-danger" onclick="ocultar_cirujano_impl()"><i class="feather icon-x"></i></button>
                                                                                                    <button type="button" class="btn btn-info"><i class="feather icon-save"></i></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Anestesista</label>
                                                                                                <input class="form-control form-control-sm" type="text" name="prot_anestesista_imp"id="prot_anestesista_imp">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Tons</label>
                                                                                                <input class="form-control form-control-sm" type="text" name="prot_tons_imp"id="prot_tons_imp">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Arsenalera</label>
                                                                                                <input class="form-control form-control-sm" type="text" name="prot_ars_imp"id="prot_ars_imp">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>


                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Forma y material del Implante</label>
                                                                                            <select name="prot_forma_mat" id="prot_forma_mat"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prot_forma_mat','div_prot_forma_mat','det_prot_forma_mat',13)">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option value="1">Cilíndricos Titanio</option>
                                                                                                <option value="2">Cilíndricos Porcelana</option>
                                                                                                <option value="3">Cilíndricos Zirconio</option>
                                                                                                <option value="4">Laminados Titanio</option>
                                                                                                <option value="5">Laminados Porcelana</option>
                                                                                                <option value="6">Laminados Zirconio</option>
                                                                                                <option value="7">Tornillo Titanio</option>
                                                                                                <option value="8">Tornillo Porcelana</option>
                                                                                                <option value="9">Tornillo Zirconio</option>
                                                                                                <option value="10">Cónicos Titanio</option>
                                                                                                <option value="11">Cónicos Porcelana</option>
                                                                                                <option value="12">Cónicos Zirconio</option>
                                                                                                <option value="13">Otro</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group"  id="div_prot_forma_mat" style="display:none">
                                                                                            <label class="floating-label-activo-sm">Otros (Describir)</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_prot_forma_mat" id="det_prot_forma_mat"></textarea>
                                                                                        </div>
                                                                                    </div>

                                                                                    {{-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Marca Implante</label>
                                                                                            <select name="prot_marc_implante"  id="prot_marc_implante" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prot_marc_implante','div_prot_marc_implante','obs_prot_marc_implante',3);">
                                                                                                @foreach ($marcas_implantes as $marca)
                                                                                                    <option value="{{ $marca->id }}">{{ $marca->descripcion }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_prot_marc_implante" style="display:none;">
                                                                                            <label class="floating-label-activo-sm">Otra Marca</label>
                                                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_prot_marc_implante" id="obs_prot_marc_implante"></textarea>
                                                                                        </div>
                                                                                    </div> --}}

                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Implante</label>
                                                                                            <select name="prot_implante"  id="prot_implante" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prot_marc_implante','div_prot_marc_implante','obs_prot_marc_implante',3);" multiple="multiple">
                                                                                                @foreach ($insumos_tratamientos as $i)
                                                                                                    <option value="{{ $i->id }}">{{ $i->insumos }} {{ $i->nombre_marca }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_prot_marc_implante" style="display:none;">
                                                                                            <label class="floating-label-activo-sm">Otra Marca</label>
                                                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_prot_marc_implante" id="obs_prot_marc_implante"></textarea>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Implantes</label>
                                                                                            <select name="prot_proc" id="prot_proc"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prot_proc','div_prot_proc','det_prot_proc',3)">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option value="1">Implante único</option>
                                                                                                <option value="2">Implante Múltiple</option>
                                                                                                <option value="3">Otro</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group"   id="div_prot_proc" style="display:none">
                                                                                            <label class="floating-label-activo-sm">Otros (Describir)</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_prot_proc" id="det_prot_proc"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Corona / Prot. Provisoria</label>
                                                                                            <select name="prot_prot_corona" id="prot_prot_corona"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prot_prot_corona','div_prot_prot_corona','det_prot_prot_corona',3)">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option value="1">Si</option>
                                                                                                <option value="2">No</option>
                                                                                                <option value="3">Otro (Describir)</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group"   id="div_prot_prot_corona" style="display:none">
                                                                                            <label class="floating-label-activo-sm">Otros (Describir)</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_prot_prot_corona" id="det_prot_prot_corona"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Piezas N°</label>
                                                                                            <select class="js-example-basic-multiple" type="text" name="prot_pieza_imp"id="prot_pieza_imp" multiple="multiple">
                                                                                                @foreach ($odontograma as $o)
                                                                                                    @if($o->presupuesto == 1)
                                                                                                        <option value="{{ $o->id }}">{{ $o->pieza }}</option>
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Detalle Cirugía</label>
                                                                                            @php
                                                                                                $detalleCirugia = [];
                                                                                                foreach ($examenes_tto_implantes as $examen) {
                                                                                                    $detalleCirugia[] = "La pieza {$examen->numero_pieza} se ha realizado {$examen->tipo_procedimiento} usando {$examen->anestesia} con {$examen->numero_tubos} tubos, con la técnica {$examen->tecnica_anestesia}";
                                                                                                }
                                                                                                $detallesCirugiaTexto = implode("\n", $detalleCirugia);
                                                                                            @endphp
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="det_cir" id="det_cir">{{ $detallesCirugiaTexto }}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 text-center">
                                                                                        <button type="button" class="btn btn-sm btn-primary mt-2 mb-4" onclick="generar_pdf_protocolo_dental()">Ver documento en
                                                                                            PDF</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--INDICACIONES-->
                                                                            <div class="tab-pane fade show" id="ind_impl" role="tabpanel" aria-labelledby="ind_impl_tab">
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <h6 class="sub-aten">Indicaciones<h6>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xl-6">
                                                                                        <button type="button" class="btn btn-outline-primary btn-block btn-sm my-2" onclick="recomendaciones_implante();" ><i class="fas fa-plus"></i> Indicaciones Generales Post Implante </button>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xl-6">
                                                                                            <button type="button" class="btn btn-outline-primary btn-block btn-sm my-2" onclick="recomendaciones_esp_implante();" ><i class="fas fa-plus"></i> Indicaciones Especiales para el paciente post Implante  </button>
                                                                                     </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--CONTROL-->
                                                                            <div class="tab-pane fade show" id="cit_control_impl" role="tabpanel" aria-labelledby="cit_control_impl_tab">
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <h6 class="sub-aten">Control<h6>
                                                                                    </div>
                                                                                </div>

                                                                                <div id="contenedor_pieza_dental_endorx">
                                                                                    <div id="pieza_dentalrx" class="form-row">
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                            <div class="form-group">
                                                                                                <button type="button" class="btn btn-outline-primary btn-block" onclick="hora_medica_pedir({{ $profesional->id }}, {{ $id_lugar_atencion }})"><i class="feather icon-calendar"></i> Agendar hora</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-8 mx-auto">
                                                                                            <div class="card-informacion" style="border: 1px solid #6c9bd5;">
                                                                                            <div class="card-top text-center">
                                                                                                <h5 class="text-c-blue">PRÓXIMO CONTROL</h5>
                                                                                            </div>
                                                                                            <div class="card-body">
                                                                                                <div  class="form-row">
                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                                                                        <h5 class="text-c-blue"><i class="fas fa-calendar"></i> Fecha:</h5><h5 class="font-weight-bold">{{ isset($proxima_fecha_atencion) ? $proxima_fecha_atencion : '' }}</h5>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                                                                        <h5 class="text-c-blue"><i class="fas fa-clock"></i> Horario:</h5><p>  <strong>{{ isset($hora_inicio_atencion) ? $hora_inicio_atencion : '--:--' }}</strong> a <strong>{{ isset($hora_fin_atencion) ? $hora_fin_atencion : '--:--' }}</strong></p>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--MANTENCION DE IMPLANTES-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="exam_esp_imp">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_imp_c" aria-expanded="false" aria-controls="exam_esp_imp_c">
                                            Control Post Implante
                                        </button>
                                    </div>
                                    <div id="exam_esp_imp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp_imp">
                                        <div class="card-body-aten-a">
                                            <div id="form-endo-adulto">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="implantologia_control" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="eval_post_implante_tab" data-toggle="tab" href="#eval_post_implante" role="tab" aria-controls="eval_post_implante" aria-selected="true">Evaluación Implante Único</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="grupos_de_imp_tab" data-toggle="tab" href="#grupos_de_imp" role="tab" aria-controls="grupos_de_imp" aria-selected="true">Evaluación Grupos de Implante</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="corona_prot_tab" data-toggle="tab" href="#corona_prot" role="tab" aria-controls="corona_prot" aria-selected="true">Instalación de Corona |  Prótesis</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="prox_cont_imp_tab" data-toggle="tab" href="#prox_cont_imp" role="tab" aria-controls="prox_cont_imp" aria-selected="true" >Próximo control e Indicaciones</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-xl-12">
                                                        <div class="tab-content" id="v-pills-tabContent">
                                                            <!--EVALUACION POST IMPLANTE UNICO-->
                                                            <div class="tab-pane fade show active" id="eval_post_implante" role="tabpanel" aria-labelledby="eval_post_implante_tab">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4">
                                                                        <h6 class="t-aten d-inline"> Evaluación implante único</h6>
                                                                        <button type="button" class="btn btn-info btn-sm  d-inline float-md-right mt-n2 mb-2" onclick="mostrar_nueva_pieza_post_impl(1000)"><i class="fas fa-plus"></i> Añadir pieza</button>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div id="contenedor_pieza_post_implantada">
                                                                            @php $count = 1; @endphp
                                                                            @foreach ($examenes_post_implantes as $examen)
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="card-informacion">
                                                                                        <div class="card-body">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="numero_pieza_post_impl{{ $counter }}" id="numero_pieza_post_impl{{ $counter }}" value="{{ $examen->numero_pieza }}">
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Móvil</label>
                                                                                                            <select name="estab_post_implante{{ $counter }}"  id="estab_post_implante{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('estab_post_implante{{ $counter }}','div_estab_post_implante{{ $counter }}','obs_estab_post_implante{{ $counter }}',2);">
                                                                                                                <option @if($examen->id_movil == 0) selected @endif value="0">Seleccione</option>
                                                                                                                <option @if($examen->id_movil == 1) selected @endif value="1" selected>No</option>
                                                                                                                <option @if($examen->id_movil == 2) selected @endif value="2">Sí</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group" id="div_estab_post_implante{{ $counter }}" @if($examen->id_movil !== 2) style="display:none;" @endif>
                                                                                                            <label class="floating-label-activo-sm">Describa</label>
                                                                                                            <textarea class="form-control form-control-sm" data-titulo=""  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_estab_post_implante{{ $counter }}" id="obs_estab_post_implante{{ $counter }}">{{ $examen->movil }}</textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Posición</label>
                                                                                                            <select name="posc_post_impl{{ $counter }}" data-titulo="Ex_cuello" data-seccion="Cuello"  id="posc_post_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('posc_post_impl{{ $counter }}','div_posc_post_impl{{ $counter }}','posc_post_vp{{ $counter }}',2);">
                                                                                                                <option @if($examen->id_posicion == 1) selected @endif value="1">Correcta</option>
                                                                                                                <option @if($examen->id_posicion == 2) selected @endif value="2">Incorrecta(Describir)</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group" id="div_posc_post_impl{{ $counter }}" @if($examen->id_posicion !== 2) style="display:none;" @endif>
                                                                                                            <label class="floating-label-activo-sm">Vestíbulo-palatino</label>
                                                                                                            <input type="text"class="form-control form-control-sm" id="posc_post_vp{{ $counter }}">
                                                                                                            <div class="form-group mt-1">
                                                                                                                <label class="floating-label-activo-sm">vestíbulo-lingual</label>
                                                                                                                <input type="text"class="form-control form-control-sm" id="posc_post_vl{{ $counter }}">
                                                                                                            </div>
                                                                                                            <div class="form-group mt-1">
                                                                                                                <label class="floating-label-activo-sm">Mesio-distal</label>
                                                                                                                <input type="text"class="form-control form-control-sm" id="posc_post_md{{ $counter }}">
                                                                                                            </div>
                                                                                                            <div class="form-group mt-1">
                                                                                                                <label class="floating-label-activo-sm">Cráneo-caudal</label>
                                                                                                                <input type="text"class="form-control form-control-sm" id="posc_post_cc{{ $counter }}">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Exposición de espiras</label>
                                                                                                            <select name="exp_esp_post_impl{{ $counter }}"  id="exp_esp_post_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('exp_esp_post_impl{{ $counter }}','div_exp_esp_post_impl{{ $counter }}','obs_exp_esp_post_impl{{ $counter }}',2);">
                                                                                                                <option @if($examen->id_exp_esp == 0) selected @endif value="0">Seleccione</option>
                                                                                                                <option @if($examen->id_exp_esp == 1) selected @endif value="1" selected>No</option>
                                                                                                                <option @if($examen->id_exp_esp == 2) selected @endif value="2">Sí</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group" id="div_exp_esp_post_impl{{ $counter }}" @if($examen->id_exp_esp !== 2) style="display:none;" @endif>
                                                                                                            <label class="floating-label-activo-sm">Describa</label>
                                                                                                            <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_exp_esp_post_impl{{ $counter }}" id="obs_exp_esp_post_impl{{ $counter }}">{{ $examen->exp_esp }}</textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Supuración</label>
                                                                                                            <select name="sut_post_impl{{ $counter }}"  id="sut_post_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sut_post_impl{{ $counter }}','div_sut_post_impl{{ $counter }}','obs_sut_post_impl{{ $counter }}',2);">
                                                                                                                <option @if($examen->id_sup == 0) selected @endif value="0">Seleccione</option>
                                                                                                                <option @if($examen->id_sup == 1) selected @endif value="1" selected>No</option>
                                                                                                                <option @if($examen->id_sup == 2) selected @endif value="2">Sí</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group" id="div_sut_post_impl{{ $counter }}" @if($examen->id_sup !== 2) style="display:none;" @endif>
                                                                                                            <label class="floating-label-activo-sm">Describa</label>
                                                                                                            <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_sut_post_impl{{ $counter }}" id="obs_sut_post_impl{{ $counter }}">{{ $examen->supuracion }}</textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    {{-- <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Desgaste del implante</label>
                                                                                                            <select name="desg_impl"  id="desg_impl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('desg_impl','div_desg_impl','obs_desg_impl',2);">
                                                                                                                <option value="1">No</option>
                                                                                                                <option value="2">Si(describa)</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group" id="div_desg_impl" style="display:none;">
                                                                                                            <label class="floating-label-activo-sm">Describa otro</label>
                                                                                                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_desg_impl" id="obs_desg_impl"></textarea>
                                                                                                        </div>
                                                                                                    </div> --}}
                                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Estado de la encía</label>
                                                                                                            <select name="est_encia_post_impl{{ $counter }}" id="est_encia_post_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('est_encia_post_impl{{ $counter }}','div_est_encia_post_impl{{ $counter }}','obs_est_encia_post_impl{{ $counter }}',2);">
                                                                                                                <option @if($examen->est_encia == 1) selected @endif value="1">Normal</option>
                                                                                                                <option @if($examen->est_encia == 2) selected @endif value="2">Anormal(describa)</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group" id="div_est_encia_post_impl{{ $counter }}" @if($examen->est_encia !== 2) style="display:none;" @endif>
                                                                                                            <label class="floating-label-activo-sm">Describa anormal</label>
                                                                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_encia_post_impl{{ $counter }}" id="obs_est_encia_post_impl{{ $counter }}">{{ $examen->estado_encia }}</textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Pérdida ósea marginal</label>
                                                                                                            <input type="text" class="form-control form-control-sm" id="perd_osea_marg_post_impl{{ $counter }}" value="{{ $examen->perdida_osea_marginal }}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Observaciones al control del implante</label>
                                                                                                            <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_control_post_implante{{ $counter }}" id="obs_control_post_implante{{ $counter }}">{{ $examen->observaciones }}</textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    @if($examen->tipo == 2)
                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Nombre implantólogo</label>
                                                                                                            <input type="text" class="form-control form-control-sm" name="nombre_implantologo{{ $counter }}" id="nombre_implantologo{{ $counter }}" value="{{ $examen->nombre_implantologo }}" />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-footer">
                                                                                            <div class="form-group">
                                                                                                <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_post_impl({{ $examen->id }})">X</button>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    </div>
                                                                                </div>
                                                                            @php $count++; @endphp
                                                                            @endforeach
                                                                        </div>
                                                                        <div id="pieza_post_implantada">
                                                                        </div>
                                                                        {{-- <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                                                <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-pieza1" onclick="mostrar_nueva_pieza_post_impl({{ $count }})"><i class="fas fa-save"></i> Cargar Otra Pieza</button>
                                                                            </div>
                                                                        </div> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--EVALUACION POST IMPLANTE MÚLTIPLE-->
                                                            <div class="tab-pane fade show" id="grupos_de_imp" role="tabpanel" aria-labelledby="grupos_de_imp_tab">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4">
                                                                        <h6 class="t-aten d-inline"> Evaluación grupo de implantes</h6>
                                                                        <button type="button" class="btn btn-info btn-sm  d-inline float-md-right mt-n2 mb-2" onclick="mostrar_nuevo_grupo_post_impl(1000)"><i class="fas fa-plus"></i> Añadir grupo</button>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12">
                                                                        <div id="contenedor_grupos_dental_implantada">
                                                                            @php $counter = 1; @endphp
                                                                            @foreach ($examenes_post_implantes_grupos as $examen)
                                                                            @php
                                                                                $piezasSeleccionadas = is_array($examen->grupo_piezas) ? $examen->grupo_piezas : json_decode($examen->grupo_piezas, true);
                                                                            @endphp
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Piezas N°</label><!--USAR SELECT 2 ?-->
                                                                                                        <select class="js-example-basic-multiple select2-dental" name="pzas_grupo_impl{{ $counter }}" id="pzas_grupo_impl{{ $counter }}" multiple="multiple">
                                                                                                            @foreach (['1.1', '1.2', '1.3', '1.4', '1.5', '1.6', '1.7', '1.8', '2.1', '2.2', '2.3', '2.4', '2.5', '2.6', '2.7', '2.8','3.1', '3.2', '3.3', '3.4', '3.5', '3.6', '3.7', '3.8', '4.1', '4.2', '4.3', '4.4', '4.5', '4.6', '4.7', '4.8'] as $pieza)
                                                                                                                <option value="{{ $pieza }}" @if(in_array($pieza, $piezasSeleccionadas ?? [])) selected @endif>{{ $pieza }}</option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Posición</label>
                                                                                                        <select name="posc_grupo_impl{{ $counter }}"  id="posc_grupo_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('posc_grupo_impl{{ $counter }}','div_posc_grupo_impl{{ $counter }}','posc_grupo_vp{{ $counter }}',2);">
                                                                                                            <option @if($examen->id_posicion == 1) selected @endif value="1">Correcta</option>
                                                                                                            <option @if($examen->id_posicion == 2) selected @endif value="2">Incorrecta(Describir)</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_posc_grupo_impl{{ $counter }}" @if($examen->id_posicion !== 2) style="display:none;" @endif>
                                                                                                        <label class="floating-label-activo-sm">Vestíbulo-palatino</label>
                                                                                                        <input type="text"class="form-control form-control-sm" id="posc_grupo_vp{{ $counter }}">
                                                                                                        <div class="form-group mt-1">
                                                                                                            <label class="floating-label-activo-sm">vestíbulo-lingual</label>
                                                                                                            <input type="text"class="form-control form-control-sm" id="posc_vl{{ $counter }}">
                                                                                                        </div>
                                                                                                        <div class="form-group mt-1">
                                                                                                            <label class="floating-label-activo-sm">Mesio-distal</label>
                                                                                                            <input type="text"class="form-control form-control-sm" id="posc_md{{ $counter }}">
                                                                                                        </div>
                                                                                                        <div class="form-group mt-1">
                                                                                                            <label class="floating-label-activo-sm">Cráneo-caudal</label>
                                                                                                            <input type="text"class="form-control form-control-sm" id="posc_cc{{ $counter }}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Altura </label>
                                                                                                        <input type="number" class="form-control form-control-sm " id="posc_altura{{ $counter }}" value="{{ $examen->altura }}">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Dpa </label>
                                                                                                        <input type="number" class="form-control form-control-sm " placeholder="dist. pieza adyacente" id="posc_dpa{{ $counter }}" value="{{ $examen->dpa }}">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Desgaste del implante</label>
                                                                                                        <select name="desg_gpo_impl{{ $counter }}"  id="desg_gpo_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('desg_gpo_impl{{ $counter }}','div_desg_gpo_impl{{ $counter }}','obs_desg_gpo_impl{{ $counter }}',2);">
                                                                                                            <option @if($examen->id_desgaste == 1) selected @endif value="1">No</option>
                                                                                                            <option @if($examen->id_desgaste == 2) selected @endif value="2">Si(describa)</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_desg_gpo_impl{{ $counter }}" @if($examen->id_desgaste !== 2) style="display:none;" @endif>
                                                                                                        <label class="floating-label-activo-sm">Describa otro</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_desg_gpo_impl{{ $counter }}" id="obs_desg_gpo_impl{{ $counter }}">{{ $examen->desgaste }}</textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Estado de la encía</label>
                                                                                                        <select name="est_encia_gpo_impl{{ $counter }}" id="est_encia_gpo_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('est_encia_gpo_impl{{ $counter }}','div_est_encia_gpo_impl{{ $counter }}','obs_est_encia_gpo_impl{{ $counter }}',2);">
                                                                                                            <option @if($examen->id_estado_encia == 1) selected @endif value="1">Normal</option>
                                                                                                            <option @if($examen->id_estado_encia == 2) selected @endif value="2">Anormal(describa)</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_est_encia_gpo_impl{{ $counter }}" @if($examen->id_estado_encia !== 2) style="display:none;" @endif>
                                                                                                        <label class="floating-label-activo-sm">Describa anormal</label>
                                                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_encia_gpo_impl{{ $counter }}" id="obs_est_encia_gpo_impl{{ $counter }}">{{ $examen->estado_encia }}</textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Hueso circundante</label>
                                                                                                        <select name="hueso_cont_gpo_impl{{ $counter }}"  id="hueso_cont_gpo_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('hueso_cont_gpo_impl{{ $counter }}','div_hueso_cont_gpo_impl{{ $counter }}','obs_hueso_cont_gpo_impl{{ $counter }}',2);">
                                                                                                            <option @if($examen->id_hueso_circundante == 1) selected @endif value="1">Normal</option>
                                                                                                            <option @if($examen->id_hueso_circundante == 2) selected @endif value="2">Anormal describir</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_hueso_cont_gpo_impl{{ $counter }}" @if($examen->id_hueso_circundante !== 2) style="display:none;" @endif>
                                                                                                        <label class="floating-label-activo-sm">Describa Anormal</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hueso_cont_gpo_impl{{ $counter }}" id="obs_hueso_cont_gpo_impl{{ $counter }}">{{ $examen->hueso_circundante }}</textarea>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Evaluación Corona | Prótesis</label>
                                                                                                        <select name="corprot_cont_impl{{ $counter }}"  id="corprot_cont_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('corprot_cont_impl{{ $counter }}','div_corprot_cont_impl{{ $counter }}','obs_corprot_cont_impl{{ $counter }}',2);">
                                                                                                            <option @if($examen->id_eva_cp == 1) selected @endif value="1">Normal</option>
                                                                                                            <option @if($examen->id_eva_cp == 2) selected @endif value="2">Anormal describir</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_corprot_cont_impl{{ $counter }}" @if($examen->id_eva_cp !== 2) style="display:none;" @endif>
                                                                                                        <label class="floating-label-activo-sm">Describa Anormal</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_corprot_cont_impl{{ $counter }}" id="obs_corprot_cont_impl{{ $counter }}">{{ $examen->eva_cp }}</textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Observaciones al control grupo implante</label>
                                                                                                        <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_control_gpo_implante{{ $counter }}" id="obs_control_gpo_implante{{ $counter }}">{{ $examen->observaciones }}</textarea>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-12">
                                                                                                        <div class="form-group">
                                                                                                            <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_grupo_dental_post_impl({{ $examen->id }})">X</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            @php $counter++; @endphp
                                                                            @endforeach

                                                                        </div>
                                                                        <div id="grupo_dental_post_impl"></div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--INSTALACIÓN DE CORONA-->
                                                            <div class="tab-pane fade show" id="corona_prot" role="tabpanel" aria-labelledby="corona_prot_tab">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4">
                                                                        <h6 class="t-aten">Instalación de Corona | Prótesis</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                            <a class="nav-link-aten text-reset active" id="corona_impl_tab" data-toggle="tab" href="#corona_impl" role="tab" aria-controls="corona_impl" aria-selected="true">PFU</a>
                                                                            <a class="nav-link-aten text-reset" id="pft_impl_tab" data-toggle="tab" href="#pft_impl" role="tab" aria-controls="pft_impl" aria-selected="true">PFP</a>
                                                                            <a class="nav-link-aten text-reset" id="protesis_impl_tab" data-toggle="tab" href="#protesis_impl" role="tab" aria-controls="protesis_impl" aria-selected="false">Prótesis</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-112 col-lg-9 col-xl-10 col-xxl-10">
                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                            <div class="tab-pane fade show active" id="corona_impl" role="tabpanel" aria-labelledby="corona_impl_tab">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xm">
                                                                                            <button type="button" class="btn btn-info btn-sm  d-inline float-md-right mt-n2 mb-2" onclick="mostrar_nuevo_pieza_pfu()"><i class="fas fa-save"></i>Cargar Otra Pieza</button>
                                                                                    </div>

                                                                                </div>
                                                                                <div id="contenedor_piezas_dentales_pfu">
                                                                                    @foreach ($examenes_piezas_pfu as $examen)
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-12 col-md-12">


                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                                <input type="text" class="form-control form-control-sm" name="n_pieza_pfu{{ $counter }}" id="n_pieza_pfu{{ $counter }}" value="{{ $examen->numero_pieza }}">
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                            <div class="form-group fill">
                                                                                                                <label class="floating-label-activo-sm">Móvil</label>
                                                                                                                <select name="movil_pfu{{ $counter }}" id="movil_pfu{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('movil_pfu{{ $counter }}','div_movil_pfu{{ $counter }}','obs_movil_pfu{{ $counter }}',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1" selected="">No</option>
                                                                                                                    <option selected="" value="2">Sí</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group fill" id="div_movil_pfu{{ $counter }}">
                                                                                                                <label class="floating-label-activo-sm">Describa</label>
                                                                                                                <textarea class="form-control form-control-sm" data-titulo="" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_movil_pfu{{ $counter }}" id="obs_movil_pfu{{ $counter }}">{{ $examen->movil }}</textarea>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Prueba de ajuste</label>
                                                                                                                <select name="prueba_ajuste_cor_pfu{{ $counter }}"  id="prueba_ajuste_cor_pfu{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prueba_ajuste_cor_pfu{{ $counter }}','div_prueba_ajuste_cor_pfu{{ $counter }}','obs_prueba_ajuste_cor_pfu{{ $counter }}',2);">
                                                                                                                    <option @if($examen->id_prueba_ajuste == 1) selected @endif value="1">Correcta </option>
                                                                                                                    <option @if($examen->id_prueba_ajuste == 2) selected @endif value="2">No devuelta a laboratorio</option>

                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_prueba_ajuste_cor_pfu{{ $counter }}" @if($examen->id_prueba_ajuste !== 2) style="display:none;" @endif>
                                                                                                                <label class="floating-label-activo-sm">Otro describa</label>
                                                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_prueba_ajuste_cor_pfu{{ $counter }}" id="obs_prueba_ajuste_cor_pfu{{ $counter }}">{{ $examen->prueba_ajuste }}</textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label for="tornillo_cor_pfu{{ $counter }}" class="floating-label-activo-sm">Tornillo</label>
                                                                                                                <select class="form-control form-control-sm" name="tornillo_cor_pfu{{ $counter }}" id="tornillo_cor_pfu{{ $counter }}" onchange="evaluar_para_carga_detalle('tornillo_cor_pfu{{ $counter }}','div_tornillo_cor_pfu{{ $counter }}','obs_tornillo_cor_pfu{{ $counter }}',3);">
                                                                                                                    <option @if($examen->id_tornillo == 1) selected @endif value="1">Tornillo rodado</option>
                                                                                                                    <option @if($examen->id_tornillo == 2) selected @endif value="2">Fractura de tornillo</option>
                                                                                                                    <option @if($examen->id_tornillo == 3) selected @endif value="3">Otra</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_tornillo_cor_pfu{{ $counter }}" @if($examen->id_prueba_ajuste !== 2) style="display:none;" @endif>
                                                                                                                <label class="floating-label-activo-sm">Otro describa</label>
                                                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tornillo_cor_pfu{{ $counter }}" id="obs_tornillo_cor_pfu{{ $counter }}">{{ $examen->tornillo }}</textarea>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Pulido</label>
                                                                                                                <select name="pulido_ajuste_pfu{{ $counter }}" id="pulido_ajuste_pfu{{ $counter }}"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pulido_ajuste_pfu{{ $counter }}','div_pulido_ajuste_pfu{{ $counter }}','det_pulido_ajuste_pfu{{ $counter }}',2)">
                                                                                                                    <option @if($examen->id_pulido == 0) selected @endif value="0">Seleccione</option>
                                                                                                                    <option @if($examen->id_pulido == 1) selected @endif value="1">Satisfactorio</option>
                                                                                                                    <option @if($examen->id_pulido == 2) selected @endif value="2">Deficiente se cita a control</option>

                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_pulido_ajuste_pfu{{ $counter }}" @if($examen->id_pulido !== 2) style="display:none" @endif>
                                                                                                                <label class="floating-label-activo-sm">Detalle <i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_pulido_ajuste_pfu{{ $counter }}" id="det_pulido_ajuste_pfu{{ $counter }}">{{ $examen->pulido }}</textarea>
                                                                                                            </div>
                                                                                                        </div>


                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Observaciones al procedimiento</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="aprec_pfu{{ $counter }}" id="aprec_pfu{{ $counter }}">{{ $examen->observaciones }}</textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>


                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-footer">
                                                                                            <button type="button" class="btn btn-danger btn-sm  d-inline float-md-right mt-n2 mb-2" onclick="eliminar_pieza_dental_pfu({{ $examen->id }})">X</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                <div id="nueva_pieza_dental"></div>

                                                                            </div>
                                                                            <div class="tab-pane fade show" id="pft_impl" role="tabpanel" aria-labelledby="pft_impl_tab">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xm">
                                                                                        <button type="button" class="btn btn-info btn-sm  d-inline float-md-right mt-n2 mb-2" onclick="mostrar_nuevo_pieza_pfp()"><i class="fas fa-save"></i>Cargar Otra Pieza</button>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-12" id="contenedor_piezas_dentales_pfp">
                                                                                        @foreach ($examenes_piezas_pfp as $examen)
                                                                                        <div class="card">
                                                                                            <div class="card-body">
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                            <input type="text" class="form-control form-control-sm" name="n_pieza_pfp{{ $counter }}" id="n_pieza_pfp{{ $counter }}" value="{{ $examen->numero_pieza }}">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Tipo de anclaje</label>
                                                                                                            <select name="tipo_anc_impl_pfp{{ $counter }}" id="tipo_anc_impl_pfp{{ $counter }}"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_anc_impl_pfp{{ $counter }}','div_tipo_anc_impl_pfp{{ $counter }}','det_tipo_anc_impl_pfp{{ $counter }}',3)">
                                                                                                                <option @if($examen->id_tipo_anclaje == 0) selected @endif value="0">Seleccione</option>
                                                                                                                <option @if($examen->id_tipo_anclaje == 1) selected @endif value="1">Ferulizada Atornillada </option>
                                                                                                                <option @if($examen->id_tipo_anclaje == 2) selected @endif value="2">Ferulizada Cementada </option>
                                                                                                                <option @if($examen->id_tipo_anclaje == 3) selected @endif value="3">Otra</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group"   id="div_tipo_anc_impl_pfp{{ $counter }}" @if($examen->id_tipo_anclaje !== 3) style="display:none" @endif>
                                                                                                            <label class="floating-label-activo-sm">Observaciones</label>
                                                                                                            <input type="text" class="form-control form-control-sm" name="det_tipo_anc_impl_pfp{{ $counter }}" id="det_tipo_anc_impl_pfp{{ $counter }}" value="{{ $examen->tipo_anclaje }}">

                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Toma de medida y envío a laboratorio</label>
                                                                                                            <select name="corona_toma_imp_pfp{{ $counter }}" id="corona_toma_imp_pfp{{ $counter }}"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('corona_toma_imp_pfp{{ $counter }}','div_corona_toma_imp_pfp{{ $counter }}','det_corona_toma_imp_pfp{{ $counter }}',2)">
                                                                                                                <option @if($examen->id_toma_medida == 0) selected @endif value="0">Seleccione</option>
                                                                                                                <option @if($examen->id_toma_medida == 1) selected @endif value="1">No</option>
                                                                                                                <option @if($examen->id_toma_medida == 2) selected @endif value="2">Si</option>

                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group"   id="div_corona_toma_imp_pfp{{ $counter }}" @if($examen->id_toma_medida !== 2) style="display:none" @endif>
                                                                                                            <label class="floating-label-activo-sm">Nombre Paciente</label>
                                                                                                            <input type="text" class="form-control form-control-sm" name="nombre_paciente_pfp" id="nombre_paciente_pfp" value="{{ $examen->nombre_paciente }}">
                                                                                                            <div class="form-group mt-3">
                                                                                                                <label class="floating-label-activo-sm">Laboratorio</label>
                                                                                                                <input type="text" class="form-control form-control-sm" name="lab_pfp" id="lab_pfp" value="{{ $examen->nombre_laboratorio }}">
                                                                                                            </div>
                                                                                                            <div class="form-group mt-3">
                                                                                                                <label class="floating-label-activo-sm">Numero de orden</label>
                                                                                                                <input type="text" class="form-control form-control-sm" name="numero_orden_pfp" id="numero_orden_pfp" value="{{ $examen->numero_orden }}">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Prueba de ajuste</label>
                                                                                                            <select name="prueba_ajuste_cor_pfp{{ $counter }}"  id="prueba_ajuste_cor_pfp{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prueba_ajuste_cor_pfp{{ $counter }}','div_prueba_ajuste_cor_pfp{{ $counter }}','obs_prueba_ajuste_cor_pfp{{ $counter }}',2);">
                                                                                                                <option @if($examen->id_prueba_ajuste == 1) selected @endif value="1">Buena </option>
                                                                                                                <option @if($examen->id_prueba_ajuste == 2) selected @endif value="2">No devuelta a laboratorio</option>

                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group" id="div_prueba_ajuste_cor_pfp{{ $counter }}" @if($examen->id_prueba_ajuste !== 2) style="display:none;" @endif>
                                                                                                            <label class="floating-label-activo-sm">Otro describa</label>
                                                                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_prueba_ajuste_cor_pfp{{ $counter }}" id="obs_prueba_ajuste_cor_pfp{{ $counter }}">{{ $examen->prueba_ajuste }}</textarea>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Pulido</label>
                                                                                                            <select name="pulido_ajuste_pfp{{ $counter }}" id="pulido_ajuste_pfp{{ $counter }}"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pulido_ajuste_pfp{{ $counter }}','div_pulido_ajuste_pfp{{ $counter }}','det_pulido_ajuste_pfp{{ $counter }}',2)">
                                                                                                                <option @if($examen->id_pulido == 0) selected @endif value="0">Seleccione</option>
                                                                                                                <option @if($examen->id_pulido == 1) selected @endif value="1">Satisfactorio</option>
                                                                                                                <option @if($examen->id_pulido == 2) selected @endif value="2">Deficiente se cita a control</option>

                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group" id="div_pulido_ajuste_pfp{{ $counter }}" @if($examen->id_pulido !== 2) style="display:none" @endif>
                                                                                                            <label class="floating-label-activo-sm">Detalle <i>(describir)</i></label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_pulido_ajuste_pfp{{ $counter }}" id="det_pulido_ajuste_pfp{{ $counter }}">{{ $examen->pulido }}</textarea>
                                                                                                        </div>
                                                                                                    </div>


                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Observaciones al procedimiento</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="aprec_pfp{{ $counter }}" id="aprec_pfp{{ $counter }}">{{ $examen->observaciones }}</textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_pieza_dental_pfp({{ $examen->id }})">X</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        @endforeach
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div id="nueva_pieza_dental_pfp"></div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <!--PROTESIS-->
                                                                            <div class="tab-pane fade show" id="protesis_impl" role="tabpanel" aria-labelledby="protesis_impl_tab">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="card-informacion">
                                                                                            <div class="card-body">
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                                                                        <h6 class="t-aten"> Prótesis</h6>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    {{-- <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Pieza</label>
                                                                                                            <input type="text" class="form-control form-control-sm" name="n_pieza_protesis" id="n_pieza_protesis">
                                                                                                        </div>
                                                                                                    </div> --}}
                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Tipo de Prótesis Superior</label>
                                                                                                            <select name="protesis_imp_sup" id="protesis_imp_sup"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('protesis_imp_sup','div_protesis_imp_sup','obs_protesis_imp_sup',2)">
                                                                                                                <option value="0">Seleccione</option>
                                                                                                                <option value="1">Total superior</option>
                                                                                                                <option value="2">Parcial superior</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group"  id="div_protesis_imp_sup" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Observaciones</label>
                                                                                                            <input type="text" class="form-control form-control-sm" name="obs_protesis_imp_sup" id="obs_protesis_imp_sup">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Tipo de Prótesis Inferior</label>
                                                                                                            <select name="protesis_imp_inf" id="protesis_imp_inf"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('protesis_imp_inf','div_protesis_imp_inf','obs_protesis_imp_inf',2)">
                                                                                                                <option value="0">Seleccione</option>
                                                                                                                <option value="1">Total Infeirior</option>
                                                                                                                <option value="2">Parcial Inferior</option>

                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group" id="div_protesis_imp_inf" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Observaciones</label>
                                                                                                            <input type="text" class="form-control form-control-sm" name="obs_protesis_imp_inf" id="obs_protesis_imp_inf">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Impresión / Envío a Lab.</label>
                                                                                                            <select name="protesis_toma_imp" id="protesis_toma_imp"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('protesis_toma_imp','div_protesis_toma_imp','obs_protesis_toma_imp_inf',2)">
                                                                                                                <option value="0">Seleccione</option>
                                                                                                                <option value="1">No</option>
                                                                                                                <option value="2">Si</option>

                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group" id="div_protesis_toma_imp" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Observaciones</label>
                                                                                                            <input type="text" class="form-control form-control-sm" name="obs_protesis_toma_imp_inf" id="obs_protesis_toma_imp_inf">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Prueba de ajuste</label>
                                                                                                            <select name="prueba_ajuste_protesis"  id="prueba_ajuste_protesis" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prueba_ajuste_protesis','div_prueba_ajuste_protesis','obs_prueba_ajuste_protesis',2);">
                                                                                                                <option selected  value="1">Buena </option>
                                                                                                                <option value="2">No devuelta a laboratorio</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group" id="div_prueba_ajuste_protesis" style="display:none;">
                                                                                                            <label class="floating-label-activo-sm">Otro (Describir)</label>
                                                                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_prueba_ajuste_protesis" id="obs_prueba_ajuste_protesis"></textarea>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    {{--  <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Pulido y otros</label>
                                                                                                            <select name="pulido_ajuste" id="pulido_ajuste"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pulido_ajuste','div_pulido_ajuste','det_pulido_ajuste',2)">
                                                                                                                <option value="0">Seleccione</option>
                                                                                                                <option value="1">Satisfactorio</option>
                                                                                                                <option value="2">Deficiente se cita a control</option>

                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group"   id="div_pulido_ajuste" style="display:none">
                                                                                                            <label class="floating-label-activo-sm">Detalle (Describir)</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_pulido_ajuste" id="det_pulido_ajuste"></textarea>
                                                                                                        </div>
                                                                                                    </div>  --}}
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-6">
                                                                                                        <div class="form-group">
                                                                                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block btn-agregar-pieza1 mx-auto text-center" onclick="solicitar_protesis()"><i class="feather icon-check"></i> Reenvio de prótesis a laboratorio</button>
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
                                                                {{--  <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="contenedor_pieza_dental_endo">
                                                                                    <div id="pieza_dental" class="row">
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Piezas N°</label>
                                                                                                    <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Toma de impresión</label>
                                                                                                    <select id="sel_endo_resp_calor" name="sel_endo_resp_calor" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                                                        <option selected  value="1"> No realizada</option>
                                                                                                        <option selected  value="1">Normal</option>
                                                                                                        <option value="2">Anormal describir</option>
                                                                                                    </select>
                                                                                                </div>

                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Prueba y cementado</label>
                                                                                                    <select id="sel_endo_resp_frio" name="sel_endo_resp_frio" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                                                        <option selected  value="1"> No realizada</option>
                                                                                                        <option selected  value="1">Normal</option>
                                                                                                        <option value="2">Anormal describir</option>
                                                                                                    </select>
                                                                                                </div>

                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Corona | Protesis provisoria</label>
                                                                                                    <select id="sel_endo_resp_frio" name="sel_endo_resp_frio" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                                                        <option value="1"> Corona</option>
                                                                                                        <option value="2"> Prótesis</option>
                                                                                                        <option value="3">Otra describir</option>
                                                                                                    </select>
                                                                                                </div>

                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Pulido</label>
                                                                                                    <select id="sel_endo_resp_elect" name="sel_endo_resp_elect" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                                                        <option selected  value="1"> No realizada</option>
                                                                                                        <option selected  value="1">Normal</option>
                                                                                                        <option value="2">Anormal describir</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <div class="form-group">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Observaciones colacación corona</label>
                                                                                                        <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_control_implante" id="obs_control_implante"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--<div class="row">
                                                                                <div class="col-sm-4 col-md-4 mb-3">
                                                                                    <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-pieza"><i class="fas fa-save"></i>Cargar Otra Pieza</button>
                                                                                </div>
                                                                            </div>-->
                                                                        </div>

                                                                    </div>
                                                                </div>  --}}
                                                            </div>
                                                            <!--INDICACIONES Y PROXIMO CONTROL-->
                                                            <div class="tab-pane fade show" id="prox_cont_imp" role="tabpanel" aria-labelledby="prox_cont_imp_tab">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                                                        <h6 class="t-aten">Prox. Control e indicaciones</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-2">
                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                            <a class="nav-link-aten text-reset" id="ind_impl_man_tab" data-toggle="tab" href="#ind_impl_man" role="tab" aria-controls="ind_impl_man" aria-selected="false">Indicaciones</a>
                                                                            <a class="nav-link-aten text-reset" id="cit_control_impl__mantab" data-toggle="tab" href="#cit_control_impl_man" role="tab" aria-controls="cit_control_impl_man" aria-selected="false">Control</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-12 col-lg-10 col-xl-10 col-xxl-10">
                                                                        <div class="tab-content" id="v-pills-tabContent">

                                                                            <!--INDICACIONES-->
                                                                            <div class="tab-pane fade show" id="ind_impl_man" role="tabpanel" aria-labelledby="ind_impl_man_tab">
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                        <div class="card-informacion">
                                                                                            <div class="card-body">
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                        <h6 class="sub-aten">Indicaciones</h6>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                                                                                                        <div class="form-group">
                                                                                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block" onclick="recomendaciones_implante();" ><i class="fas fa-plus"></i> Indicaciones generales Post Implante </button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                                                                                                        <div class="form-group">
                                                                                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block" onclick="recomendaciones_esp_implante();" ><i class="fas fa-plus"></i> Indicaciones especiales para el pcte. Post Implante  </button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--CONTROL-->
                                                                            <div class="tab-pane fade show" id="cit_control_impl_man" role="tabpanel" aria-labelledby="cit_control_impl_man_tab">
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <h6 class="sub-aten">Control</h6>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                        <div class="form-group">
                                                                                            <button type="button" class="btn btn-outline-primary btn-block" onclick="hora_medica_pedir({{ $profesional->id }}, {{ $id_lugar_atencion }})"><i class="feather icon-calendar"></i> Agendar hora</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-8 mx-auto">
                                                                                        <div class="card-informacion" style="border: 1px solid #6c9bd5;">
                                                                                            <div class="card-top text-center">
                                                                                                <h5 class="text-c-blue">PRÓXIMO CONTROL</h5>
                                                                                            </div>
                                                                                            <div class="card-body">
                                                                                                <div  class="form-row">
                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                                                                        <h5 class="text-c-blue"><i class="fas fa-calendar"></i> Fecha:</h5><h5 class="font-weight-bold">{{ isset($proxima_fecha_atencion) ? $proxima_fecha_atencion : '' }}</h5>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                                                                        <h5 class="text-c-blue"><i class="fas fa-clock"></i> Horario:</h5><p>  <strong>{{ isset($hora_inicio_atencion) ? $hora_inicio_atencion : '--:--' }}</strong> a <strong>{{ isset($hora_fin_atencion) ? $hora_fin_atencion : '--:--' }}</strong></p>
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
                                                <div class="form-row pb-2">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <button type="button" class="btn btn-info float-right" onclick="solicitar_ic_periodoncia()"><i class="fas fa-plus"></i> Solicitar Interconsulta Rehabilitación Oral</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--  <!--EVALUACION PERIODONCIA -->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="eval_period">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#eval_period_1" aria-expanded="false" aria-controls="eval_period_1">
                                           Evaluación Periodóncica EN PREPARACION
                                        </button>
                                    </div>
                                    <div id="eval_period_1" class="collapse" aria-labelledby="eval_period" data-parent="#eval_period">
                                        <div class="card-body-aten-a">
                                            <div id="form-exam_esp_period">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="orl_adulto" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="ant_med_dent_period_tab" data-toggle="tab" href="#ant_med_dent_period" role="tab" aria-controls="ant_med_dent_period" aria-selected="false">Antecedentes</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="hist_piezas_period_hist_tab" data-toggle="tab" href="#hist_piezas_period_hist" role="tab" aria-controls="hist_pieza_period_hist" aria-selected="true">Historia de la pieza</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_periodonto_tab" data-toggle="tab" href="#eval_periodonto" role="tab" aria-controls="eval_periodonto" aria-selected="true">Examen Periodontal</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="estudio_rx_period_tab" data-toggle="tab" href="#estudio_rx_period" role="tab" aria-controls="estudio_rx_period" aria-selected="true">Estudio radiológico</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="plan_tto_period_tab" data-toggle="tab" href="#plan_tto_period" role="tab" aria-controls="plan_tto_period" aria-selected="true">Planificación Tratamiento | Presupuesto</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="impl">
                                                            <!--EVALUACION ESTADO PACIENTE-->
                                                            <div class="tab-pane fade show active" id="ant_med_dent_period" role="tabpanel" aria-labelledby="ant_med_dent_period_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-2">
                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                            <a class="nav-link-aten text-reset active" id="antec_med_period_tab" data-toggle="tab" href="#antec_med_period" role="tab" aria-controls="antec_med_period" aria-selected="true">Antecedentes Médicos</a>
                                                                                            <a class="nav-link-aten text-reset" id="antec_dent_period_tab" data-toggle="tab" href="#antec_dent_period" role="tab" aria-controls="antec_dent_period" aria-selected="false">Antecedentes dentales</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-10 col-xl-10">
                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="antec_med_period" role="tabpanel" aria-labelledby="antec_med_period_tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Antecedentes Generales</label>
                                                                                                                <div class="row">
                                                                                                                    {{-- Tratamientos en curso
                                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                                                                                                                        <div class="card border-card-primary h-100">
                                                                                                                            <div class="card-body-aten-a">
                                                                                                                                <ul>
                                                                                                                                    <li><strong>Tratamientos en curso</strong></li>
                                                                                                                                    @if (isset($tratamiento_activo))
                                                                                                                                        @foreach ( $tratamiento_activo as $receta)
                                                                                                                                            @foreach ( $receta['detalle'] as $detalle)
                                                                                                                                                @if ($detalle['id_tipo_control'] == 8)
                                                                                                                                                    <li style="font-size: 12px">
                                                                                                                                                        Receta Magistral<br/>&nbsp;&nbsp;
                                                                                                                                                        <span style="font-size: 9px; font-weight: bold;">
                                                                                                                                                            @php
                                                                                                                                                                $producto_detalle_temp = json_decode($detalle['producto']);
                                                                                                                                                                // var_dump($producto_detalle_temp[0]) ;
                                                                                                                                                            @endphp
                                                                                                                                                            @foreach ( $producto_detalle_temp as $det_temp)
                                                                                                                                                                {{ $det_temp->nombre }}: {{ $det_temp->cantidad }} |
                                                                                                                                                            @endforeach
                                                                                                                                                        </span>
                                                                                                                                                    </li>
                                                                                                                                                @else
                                                                                                                                                    <li style="font-size: 12px">{{ $detalle['producto'] }}<br/>&nbsp;&nbsp;<span style="font-size: 9px; font-weight: bold;">{{ $detalle['farmaco'] }}</span></li>
                                                                                                                                                @endif
                                                                                                                                            @endforeach
                                                                                                                                        @endforeach
                                                                                                                                    @else
                                                                                                                                        <li>No hay registros</li>
                                                                                                                                    @endif
                                                                                                                                    <li></li>
                                                                                                                                </ul>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    {{-- Medicamentos crónicos
                                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                                                                                                                        <div class="card border-card-primary h-100">
                                                                                                                            <div class="card-body-aten-a">
                                                                                                                                <ul>
                                                                                                                                    <li><strong>Medicamentos crónicos</strong></li>
                                                                                                                                </ul>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    {{-- Cirugías recientes
                                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                                                                                                                        <div class="card border-card-primary h-100">
                                                                                                                            <div class="card-body-aten-a">
                                                                                                                                <ul>
                                                                                                                                    <li><strong>Cirugías recientes</strong></li>
                                                                                                                                    @if(isset($antecedentes))
                                                                                                                                    @foreach ($antecedentes as $data)
                                                                                                                                        @if($data->id_tipo_antecedente==3)
                                                                                                                                            {{-- <li>{!! $data->antecedente_data->procedimiento.'<br/>&nbsp;&nbsp;&nbsp;- '.substr($data->comentario, 0, 30) !!}</li>
                                                                                                                                            <li> * {!! $data->antecedente_data->procedimiento.' - '.$data->comentario !!}</li>
                                                                                                                                        @else
                                                                                                                                            {{-- <li>No hay registros</li>
                                                                                                                                        @endif
                                                                                                                                    @endforeach
                                                                                                                                    @endif
                                                                                                                                </ul>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    {{-- Medicamentos recientes --}}
                                                                                                                    {{-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3"> --}}
                                                                                                                        {{-- <div class="card border-card-primary h-100"> --}}
                                                                                                                            {{-- <div class="card-body"> --}}
                                                                                                                                {{-- <ul> --}}
                                                                                                                                    {{-- <li><strong>Medicamentos recientes</strong></li> --}}
                                                                                                                                    {{-- <li>No hay registros</li> --}}
                                                                                                                                {{-- </ul> --}}
                                                                                                                            {{-- </div> --}}
                                                                                                                        {{-- </div> --}}
                                                                                                                    {{-- </div> --}}

                                                                                                                    {{-- Prótesis y ortesis
                                                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                                                                                                                        <div class="card border-card-primary h-100">
                                                                                                                            <div class="card-body-aten-a">
                                                                                                                                <ul>
                                                                                                                                    <li><strong>Prótesis y ortesis</strong></li>
                                                                                                                                    <li>No hay registros</li>
                                                                                                                                </ul>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="antec_dent_period" role="tabpanel" aria-labelledby="antec_dent_period_tab">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="card">
                                                                                                            <div class="card-body">
                                                                                                                <div id="contenedor_pieza_dental_endorx">
                                                                                                                    <div id="pieza_dentalrx" class="row">
                                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="floating-label-activo-sm">Antecedentes Dentales</label>
                                                                                                                                <table id="table_antecedentes_unificada" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                                                                                    <thead>
                                                                                                                                        <tr>
                                                                                                                                            <th class="text-center align-middle">Fecha</th>
                                                                                                                                            <th class="text-center align-middle">Procedimiento</th>
                                                                                                                                            <th class="text-center align-middle">Responsable</th>
                                                                                                                                            <th class="text-center align-middle">Detalles / Comentarios</th>
                                                                                                                                        </tr>
                                                                                                                                    </thead>

                                                                                                                                    <!-- Sección Anestesia -->
                                                                                                                                    <tbody id="tbody_anestesia">
                                                                                                                                        <tr class="table-primary">
                                                                                                                                            <td colspan="4" class="text-center"><strong>Antecedentes de Anestesia</strong></td>
                                                                                                                                        </tr>
                                                                                                                                        @if (isset($antecedentes))
                                                                                                                                            @foreach ($antecedentes as $antecedente)
                                                                                                                                                @if ($antecedente->id_tipo_antecedente == 1 && $antecedente->estado == 1)
                                                                                                                                                    <tr>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->antecedente_data->fecha }}</td>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->antecedente_data->procedimiento }}</td>
                                                                                                                                                        <td class="text-center align-middle">
                                                                                                                                                            {{ $antecedente->antecedente_data->profesional ?? 'N/A' }} <br/>
                                                                                                                                                            {{ $antecedente->antecedente_data->rut_responsable }}
                                                                                                                                                        </td>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->comentario }}</td>
                                                                                                                                                    </tr>
                                                                                                                                                @endif
                                                                                                                                            @endforeach
                                                                                                                                        @endif
                                                                                                                                    </tbody>

                                                                                                                                    <!-- Sección Hemorragias -->
                                                                                                                                    <tbody id="tbody_hemorragias">
                                                                                                                                        <tr class="table-danger">
                                                                                                                                            <td colspan="4" class="text-center"><strong>Antecedentes de Hemorragia</strong></td>
                                                                                                                                        </tr>
                                                                                                                                        @if (isset($antecedentes))
                                                                                                                                            @foreach ($antecedentes as $antecedente)
                                                                                                                                                @if ($antecedente->id_tipo_antecedente == 4 && $antecedente->estado == 1)
                                                                                                                                                    <tr>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->antecedente_data->fecha }}</td>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->antecedente_data->procedimiento }}</td>
                                                                                                                                                        <td class="text-center align-middle">
                                                                                                                                                            {{ $antecedente->antecedente_data->profesional ?? 'N/A' }} <br/>
                                                                                                                                                            {{ $antecedente->antecedente_data->rut_responsable }}
                                                                                                                                                        </td>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->comentario }}</td>
                                                                                                                                                    </tr>
                                                                                                                                                @endif
                                                                                                                                            @endforeach
                                                                                                                                        @endif
                                                                                                                                    </tbody>

                                                                                                                                    <!-- Sección Fracturas -->
                                                                                                                                    <tbody id="tbody_fracturas">
                                                                                                                                        <tr class="table-warning">
                                                                                                                                            <td colspan="4" class="text-center"><strong>Antecedentes de Fracturas</strong></td>
                                                                                                                                        </tr>
                                                                                                                                        @if (isset($antecedentes))
                                                                                                                                            @foreach ($antecedentes as $antecedente)
                                                                                                                                                @if ($antecedente->id_tipo_antecedente == 9 && $antecedente->estado == 1)
                                                                                                                                                    <tr>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->antecedente_data->fecha }}</td>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->antecedente_data->procedimiento }}</td>
                                                                                                                                                        <td class="text-center align-middle">
                                                                                                                                                            {{ $antecedente->antecedente_data->profesional ?? 'N/A' }} <br/>
                                                                                                                                                            {{ $antecedente->antecedente_data->rut_responsable }}
                                                                                                                                                        </td>
                                                                                                                                                        <td class="text-center align-middle">{{ $antecedente->comentario }}</td>
                                                                                                                                                    </tr>
                                                                                                                                                @endif
                                                                                                                                            @endforeach
                                                                                                                                        @endif
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
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>--}}
                                                            <!--HISTORIA-->
                                                            {{--  <div class="tab-pane fade show " id="hist_piezas_period_hist" role="tabpanel" aria-labelledby="hist_piezas_period_hist_tab">
                                                                <div id="hist_piezas_period">
                                                                    @php $count_period = 1; @endphp
                                                                    @foreach ($examenes_period as $e)
                                                                    <div class="card-body mb-2">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                        <div class="form-group fill">
                                                                                            <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                            <input type="text" class="form-control form-control-sm" name="historia_pza" id="historia_pza" value="{{ $e->numero_pieza }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                                                        <div class="form-group fill">
                                                                                            <label class="floating-label-activo-sm">Pérdida de la pieza</label>
                                                                                            <input type="text" class="form-control form-control-sm" value="{{ $e->perdida }}">
                                                                                        </div>
                                                                                        <div class="form-group" id="div_perdida" style="display:none;">
                                                                                            <label class="floating-label-activo-sm">Otro motivo</label>
                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_perdida" id="obs_perdida"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                                                        <div class="form-group fill">
                                                                                            <label class="floating-label-activo-sm">Años</label>
                                                                                            <input type="text" class="form-control form-control-sm" value="{{ $e->tiempo }}">
                                                                                        </div>
                                                                                        <div class="form-group" id="div_anos_perd" style="display:none;">
                                                                                            <label class="floating-label-activo-sm">Años</label>
                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anos_perd" id="obs_anos_perd"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Observaciones Pérdida</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Oral" data-seccion="Examen Oral" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oral" id="obs_ex_oral">{{ $e->observaciones }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_hist({{ $e->id }})">X</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @php $count_period++; @endphp
                                                                    @endforeach
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                @php $count = 1; @endphp
                                                                                <div id="contenedor_piezas_hist_period"></div>
                                                                                <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_nueva_pieza_dental_hist({{ $count_period }},'period')"><i class="fas fa-save"></i> Mostrar nueva pieza</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                            </div>  --}}
                                                            <!--EVALUACION PERIODONCICA-->
                                                            {{--  <div class="tab-pane fade show " id="eval_periodonto" role="tabpanel" aria-labelledby="eval_periodonto_tab">
                                                                <div id="contenedor_piezas_period_period">
                                                                    @foreach ($examenes_period_period as $e)
                                                                    <div class="card">
                                                                        <div class="card-body mb-2">
                                                                            <div class="row">
                                                                                <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                            <div class="form-group fill">
                                                                                                <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                <input type="text" class="form-control form-control-sm" name="historia_pza" id="historia_pza" value="{{ $e->numero_pieza }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                                                            <div class="form-group fill">
                                                                                                <label class="floating-label-activo-sm">Pérdida de la pieza</label>
                                                                                                <input type="text" class="form-control form-control-sm" value="{{ $e->perdida }}">
                                                                                            </div>
                                                                                            <div class="form-group" id="div_perdida" style="display:none;">
                                                                                                <label class="floating-label-activo-sm">Otro motivo</label>
                                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_perdida" id="obs_perdida"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                                                            <div class="form-group fill">
                                                                                                <label class="floating-label-activo-sm">Años</label>
                                                                                                <input type="text" class="form-control form-control-sm" value="{{ $e->tiempo }}">
                                                                                            </div>
                                                                                            <div class="form-group" id="div_anos_perd" style="display:none;">
                                                                                                <label class="floating-label-activo-sm">Años</label>
                                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anos_perd" id="obs_anos_perd"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Observaciones Pérdida</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Oral" data-seccion="Examen Oral" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oral" id="obs_ex_oral">{{ $e->observaciones }}</textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <div class="form-group fill">

                                                                                        <div class="switch switch-success d-inline m-r-10">
                                                                                            <input type="checkbox" onchange="biopsia_check_implantologia({{ $e->id }})" id="biopsia_check_implantologia{{ $e->id }}" name="biopsia_check_implantologia{{ $e->id }}" value="" checked="">
                                                                                            <label for="biopsia_check_implantologia({{ $e->id }})" class="cr"></label>
                                                                                        </div>
                                                                                        <label>biopsia</label>
                                                                                        <hr>
                                                                                        <div class="form-group fill">
                                                                                            <label id="" name="" class="floating-label-activo-sm">Zona y Motivo</label>
                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="im_biop_zona{{ $e->id }}" id="im_biop_zona{{ $e->id }}"></textarea>
                                                                                        </div>
                                                                                        <div class="form-group fill">
                                                                                            <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="im_obs_result_biopsia{{ $e->id }}" id="im_obs_result_biopsia{{ $e->id }}"></textarea>
                                                                                        </div>
                                                                                        <div class="form-group fill m-50">
                                                                                            <button type="button" class="btn btn-outline-success btn-sm " onclick="solicitar_ic_periodoncia()">SOLICITAR INTERCONSULTA PERIODÓNCIA</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_period({{ $e->id }})">X</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>


                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">

                                                                                <div id="contenedor_pieza_period_period"></div>
                                                                                <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_nueva_pieza_dental_period()"><i class="fas fa-save"></i> Mostrar nueva pieza</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                            </div>  --}}
                                                            <!--ESTUDIO RADIOLÓGICO POR PIEZA-->
                                                            {{--  <div class="tab-pane fade show" id="estudio_rx_period" role="tabpanel" aria-labelledby="estudio_rx_period_tab">
                                                                <div id="contenedor_imagenes_dent_period">
                                                                    @php $count = 1; @endphp
                                                                    @foreach ($imagenes_periodoncia as $imagen)
                                                                    <div class="form-row">
                                                                        <div class="col-sm-8 mt-2">
                                                                            <div class="card">
                                                                                <div class="card text-center">
                                                                                    <h6>EVALUACIÓN RADIOLÓGICA GENERAL</h6>
                                                                                </div>

                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div class="row mb-1">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <div class="form-row">
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
                                                                                                                                class="btn btn-danger btn-sm my-2"
                                                                                                                                onclick="eliminar_imagen_dental({{ $imagen->id }}, '{{ $path['path'] }}')">
                                                                                                                            <i class="feather icon-x"></i>
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
                                                                                        <div class="card-footer">

                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 mt-2">

                                                                                                    <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_imagenes({{ $imagen->id }})">X</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                            </div>
                                                                        </div>
                                                                        {{-- <div class="col-sm-4 mt-2" >
                                                                            <div class="form-group fill">

                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia_check_implantologia({{ $count }})" id="biopsia_check_implantologia{{ $count }}" name="biopsia_check_implantologia{{ $count }}" value="" {{ $imagen->biopsia === 1 ? 'checked' : '' }}>
                                                                                    <label for="biopsia_check_implantologia({{ $count }})" class="cr"></label>
                                                                                </div>
                                                                                <label>biopsia</label>
                                                                                <hr>
                                                                                <div class="form-group fill">
                                                                                    <label id="" name="" class="floating-label-activo-sm">Zona y Motivo</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="im_biop_zona{{ $count }}" id="im_biop_zona{{ $count }}">{{ $imagen->zona_y_motivo }}</textarea>
                                                                                </div>
                                                                                <div class="form-group fill">
                                                                                    <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="im_obs_result_biopsia{{ $count }}" id="im_obs_result_biopsia{{ $count }}">{{ $imagen->observaciones }}</textarea>
                                                                                </div>
                                                                                <div class="form-group fill m-50" >
                                                                                    <button type="button" class="btn btn-outline-success btn-sm " onclick="solicitar_ic_periodoncia()">SOLICITAR INTERCONSULTA PERIODÓNCIA</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @php $count++; @endphp
                                                                    @endforeach
                                                                </div>

                                                                <div id="contenedor_nueva_imagen_dent_period">

                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-12">
                                                                        <div class="form-group">

                                                                            <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_nuevas_imagenes_dent_periodoncica({{ $count }})">CARGAR NUEVA IMAGEN</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>  --}}
                                                            <!--PLANIFICACION TRATAMIENTO-->
                                                            {{--  <div class="tab-pane fade show" id="plan_tto_period" role="tabpanel" aria-labelledby="plan_tto_period_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="contenedor_pieza_plan_implante">
                                                                                    {{-- <div id="pieza_dental" class="row">
                                                                                        <div class="col-sm-12 col-md-12 col-xl-12">
                                                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                                                <div class="tab-pane fade show active" id="plan_implante" role="tabpanel" aria-labelledby="plan_implante_tab"><br>
                                                                                                    <div class="col-sm-12 col-md-12">
                                                                                                        <div class="form-row">
                                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Piezas N° | Grupo</label>
                                                                                                                    <input type="text" class="form-control form-control-sm">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                                    <select name="tpo_tto_period" data-titulo="tpo_tto_period" data-seccion="Implante"  id="tpo_tto_period" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_tto_period','div_tpo_tto_period','obs_tpo_tto_period',5);">
                                                                                                                        <option selected  value="1">Raspado y alisado radicular</option>
                                                                                                                        <option value="2">antibióticos</option>
                                                                                                                        <option value="3">enjuagues bucales</option>
                                                                                                                        <option value="4">Cirugía</option>
                                                                                                                        <option value="5">  Otro proc periodontoógico</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                                <div class="form-group" id="div_tpo_tto_period" style="display:none;">
                                                                                                                    <label class="floating-label-activo-sm">Otro proc periodontológico</label>
                                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tpo_tto_period" id="obs_tpo_tto_period"></textarea>
                                                                                                                    <div class="form-group mt-3">
                                                                                                                        <label class="floating-label-activo-sm">UCO?</label>
                                                                                                                        <input type="text"class="form-control form-control-sm">
                                                                                                                    </div>
                                                                                                                    <div class="form-group mt-3">
                                                                                                                        <label class="floating-label-activo-sm">Laboratorio</label>
                                                                                                                        <input type="text"class="form-control form-control-sm">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Cirugía</label>
                                                                                                                    <select name="cir_periodontal"  id="cir_periodontal" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cir_periodontal','div_cir_periodontal','obs_cir_periodontal',6);">
                                                                                                                        <option selected  value="1">Cirugía con colgajos</option>
                                                                                                                        <option value="2">Injertos de tejido blando</option>
                                                                                                                        <option value="3">Injerto óseo</option>
                                                                                                                        <option value="4">Regeneración tisular guiada</option>
                                                                                                                        <option value="5">Proteínas estimulantes de tejidos</option>
                                                                                                                        <option value="6">OTRO</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                                <div class="form-group" id="div_cir_periodontal" style="display:none;">
                                                                                                                    <label class="floating-label-activo-sm">Otra cirugía</label>
                                                                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cir_periodontal" id="obs_cir_periodontal"></textarea>
                                                                                                                </div>
                                                                                                            </div>


                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Convenio</label>
                                                                                                                    <select name="conv_odont_implante"   id="conv_odont_implante" class="form-control form-control-sm">
                                                                                                                        <option selected  value="1">Si</option>
                                                                                                                        <option value="2">No</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                <div class="form-group">
                                                                                                                    <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-save"></i> Cargar a presupuesto</button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-xl-12">
                                                                                        <div class="col-sm-4 col-md-4 col-xl-4">
                                                                                                <div class="form-row">
                                                                                                <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-pieza2" onclick="mostrar_nueva_pieza_dental_tto_period()"><i class="fas fa-save"></i> Cargar otra pieza</button>
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
                                    </div>
                                </div>
                            </div>--}}
                            <!--PROCEDIMIENTOS PERIODONCIA -->
                            {{--  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="tto_periodontal">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#tto_periodontal_c" aria-expanded="false" aria-controls="tto_periodontal_c">
                                            Tratamiento Periodontal EN PREPARACION
                                        </button>
                                    </div>
                                    <div id="tto_periodontal_c" class="collapse" aria-labelledby="tto_periodontal" data-parent="#tto_periodontal">
                                        <div class="card-body-aten-a shadow-none">
                                            <div id="form-col_implantes">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="tto_periodont" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="proc_periodontal_tab" data-toggle="tab" href="#proc_periodontal" role="tab" aria-controls="proc_periodontal" aria-selected="true">Procedimientos</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="protocolo_period_tab" data-toggle="tab" href="#protocolo_period" role="tab" aria-controls="protocolo_period" aria-selected="true">Protocolo e Indicaciones</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="periodoncia_proc">
                                                            <!--DOLOR-->
                                                            <div class="tab-pane fade show active" id="proc_periodontal" role="tabpanel" aria-labelledby="proc_periodontal_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="contenedor_implantologia">
                                                                                    <div id="pieza_dental_dolor" class="row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                    <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Tipo de Procedimiento</label>
                                                                                                        <select name="tpo_proc_imp" data-titulo="tpo_proc_imp" data-seccion="Implante"  id="tpo_proc_imp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_proc_imp','div_tpo_proc_imp','obs_tpo_proc_impo',10);">
                                                                                                            <option selected  value="1">Anclaje de precisión s/implantes</option>
                                                                                                            <option value="2">Anclaje de presición sobre Implante</option>
                                                                                                            <option value="3">Barra para prótesis sobre Implante</option>
                                                                                                            <option value="4">Cirugía Periimplantaria de manejo de tejidos blandos, por sitio</option>
                                                                                                            <option value="5">Cirugía Periimplantaria de tejidos blandos (no incluye insumos)</option>
                                                                                                            <option value="6">Conexión de Implante (No incluye valor aditamientos)</option>
                                                                                                            <option value="7">Corona de cerámica s/metal sobre implante cementada</option>
                                                                                                            <option value="8">Cirugía Periimplantaria de tejidos blandos (no incluye insumos)</option>
                                                                                                            <option value="9"> Corona provisional s/implante</option>
                                                                                                            <option value="10">  Corona Temporal Sobre Implantes</option>
                                                                                                            <option value="10">  Otro proc Implantes</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_tpo_proc_imp" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Otro tipo de Procedimiento</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tpo_proc_imp" id="obs_tpo_proc_imp"></textarea>
                                                                                                        <div class="form-group mt-3">
                                                                                                            <label class="floating-label-activo-sm">UCO?</label>
                                                                                                            <input type="text"class="form-control form-control-sm">
                                                                                                        </div>
                                                                                                        <div class="form-group mt-3">
                                                                                                            <label class="floating-label-activo-sm">Laboratorio</label>
                                                                                                            <input type="text"class="form-control form-control-sm">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Anestesia</label>
                                                                                                        <select name="anestesia_impl" data-titulo="anestesia_impl" data-seccion="anestesia_impl"  id="anestesia_impl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('anestesia_impl','div_anestesia_impl','obs_anestesia_impl',4);">
                                                                                                            <option selected  value="1">Local</option>
                                                                                                            <option value="2">Local mas sedación consciente</option>
                                                                                                            <option value="3">Anestesia General</option>
                                                                                                            <option value="4">Otro describir</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_anestesia_impl" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Otra anestesia</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anestesia_impl" id="obs_anestesia_impl"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Incidentes</label>
                                                                                                        <select name="incid_col_impl" data-titulo="Ex_cuello" data-seccion="Cuello"  id="incid_col_impl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('incid_col_impl','div_incid_col_impl','obs_incid_col_impl',2);">
                                                                                                            <option selected  value="1">Sin incidentes</option>
                                                                                                            <option value="2">Con Incidentes</option>

                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_incid_col_impl" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Describa Incidente</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_incid_col_impl" id="obs_incid_col_impl"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Material de injerto óseo</label>
                                                                                                        <select name="mat_inj_oseo" data-titulo="Ex_cuello" data-seccion="Cuello"  id="mat_inj_oseo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('mat_inj_oseo','div_mat_inj_oseo','obs_mat_inj_oseo',6);">
                                                                                                            <option selected  value="1">Sin Injerto Óseo</option>
                                                                                                            <option value="2">autoinjerto</option>
                                                                                                            <option value="3">aloinjerto</option>
                                                                                                            <option value="4">xenoinjerto</option>
                                                                                                            <option value="5">aloplástico</option>
                                                                                                            <option value="6">Otro (describir)</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_mat_inj_oseo" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Otro tipo de injerto</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_mat_inj_oseor" id="obs_mat_inj_oseo"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Método de injerto óseo</label>
                                                                                                        <select name="tipo_inj_oseo" data-titulo="implantes"  id="tipo_inj_oseo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_inj_oseo','div_tipo_inj_oseo','obs_tipo_inj_oseo',6);">
                                                                                                            <option selected  value="1">Sin Injerto Óseo</option>
                                                                                                            <option value="2">Osteoplastia</option>
                                                                                                            <option value="3">implantes subperiosticos</option>
                                                                                                            <option value="4">técnicas de ensanchamiento</option>
                                                                                                            <option value="5">Elevación de piso seno</option>
                                                                                                            <option value="6">Otro (describir)</option>

                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_tipo_inj_oseo" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Otro tipo de injerto</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_inj_oseo" id="obs_tipo_inj_oseo"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Suturas</label>
                                                                                                        <select name="suturas" data-titulo="suturas" data-seccion="suturas"  id="suturas" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('suturas','div_suturas','obs_suturas',5);">
                                                                                                            <option selected  value="1">Catgut</option>
                                                                                                            <option value="2">Seda</option>
                                                                                                            <option value="3">Nylon</option>
                                                                                                            <option value="4">Polipropileno</option>
                                                                                                            <option value="5">Otro describir</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_suturas" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm">Describa</label>
                                                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_suturas" id="obs_suturas"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-sm-4 col-md-4 mb-3">
                                                                                    <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-pieza1" ><i class="fas fa-save"></i>Cargar Otra Pieza</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--PROTOCOLO-->
                                                            <div class="tab-pane fade show" id="protocolo_period" role="tabpanel" aria-labelledby="protocolo_period_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-2">
                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                            <a class="nav-link-aten text-reset active" id="prot_period_tab" data-toggle="tab" href="#prot_period" role="tab" aria-controls="prot_period" aria-selected="true">Protocolo</a>
                                                                                            <a class="nav-link-aten text-reset" id="ind_period_tab" data-toggle="tab" href="#ind_period" role="tab" aria-controls="ind_period" aria-selected="false">Indicaciones</a>
                                                                                            <a class="nav-link-aten text-reset" id="cit_control_period_tab" data-toggle="tab" href="#cit_control_period" role="tab" aria-controls="cit_control_period" aria-selected="false">Control</a>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-10 col-xl-10">
                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="prot_period" role="tabpanel" aria-labelledby="prot_period_tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Equipo Cirujanos</label>
                                                                                                                <input class="form-control form-control-sm" type="text" name="prot_cirujanos_imp"id="prot_cirujanos_imp">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Anestesista</label>
                                                                                                                <input class="form-control form-control-sm" type="text" name="prot_anestesista_imp"id="prot_anestesista_imp">
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Tons</label>
                                                                                                                <input class="form-control form-control-sm" type="text" name="prot_tons_imp"id="prot_tons_imp">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Forma y material del Implante</label>
                                                                                                                <select name="prot_forma_mat" id="prot_forma_mat"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prot_forma_mat','div_prot_forma_mat','det_prot_forma_mat',13)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Cilíndricos Titanio</option>
                                                                                                                    <option value="2">Cilíndricos Porcelana</option>
                                                                                                                    <option value="3">Cilíndricos Zirconio</option>
                                                                                                                    <option value="4">Laminados Titanio</option>
                                                                                                                    <option value="5">Laminados Porcelana</option>
                                                                                                                    <option value="6">Laminados Zirconio</option>
                                                                                                                    <option value="7">Tornillo Titanio</option>
                                                                                                                    <option value="8">Tornillo Porcelana</option>
                                                                                                                    <option value="9">Tornillo Zirconio</option>
                                                                                                                    <option value="10">Cónicos Titanio</option>
                                                                                                                    <option value="11">Cónicos Porcelana</option>
                                                                                                                    <option value="12">Cónicos Zirconio</option>
                                                                                                                    <option value="13">Otro</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_prot_forma_mat" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Otros<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_prot_forma_mat" id="det_prot_forma_mat"></textarea>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Marca Inplante</label>
                                                                                                                <select name="prot_marc_implante"  id="prot_marc_implante" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prot_marc_implante','div_prot_marc_implante','obs_prot_marc_implante',3);">
                                                                                                                    <option selected  value="1">MARCA 1</option>
                                                                                                                    <option value="2">MARCA 2</option>
                                                                                                                    <option value="3">OTRO</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_prot_marc_implante" style="display:none;">
                                                                                                                <label class="floating-label-activo-sm">Otra Marca</label>
                                                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_prot_marc_implante" id="obs_prot_marc_implante"></textarea>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Implantes</label>
                                                                                                                <select name="prot_proc" id="prot_proc"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prot_proc','div_prot_proc','det_prot_proc',3)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Implante único</option>
                                                                                                                    <option value="2">Implante Múltiple</option>
                                                                                                                    <option value="3">Otro</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_prot_proc" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Otros<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_prot_proc" id="det_prot_proc"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Corona/Prot provisoria</label>
                                                                                                                <select name="prot_prot_corona" id="prot_prot_corona"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prot_prot_corona','div_prot_prot_corona','det_prot_prot_corona',3)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Si</option>
                                                                                                                    <option value="2">No</option>
                                                                                                                    <option value="3">Otro (describa)</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_prot_prot_corona" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Otros<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_prot_prot_corona" id="det_prot_prot_corona"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Piezas N°</label>
                                                                                                                <input class="form-control form-control-sm" type="text" name="prot_pieza_imp"id="prot_pieza_imp">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Detalle Cirugía</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="aprec_periodonto" id="aprec_periodonto"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 text-center">
                                                                                                            <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver documento en
                                                                                                                PDF</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="ind_period" role="tabpanel" aria-labelledby="ind_period_tab">

                                                                                                <div class="row">
                                                                                                    <div class="col-sm-12 col-md-12">
                                                                                                        <div class="form-row">
                                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                                <div class="form-group">
                                                                                                                    <button type="button" class="btn btn-outline-primary btn-sm" ><i class="fas fa-save"></i> Indicaciones Generales Periodóncia </button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                                <div class="form-group">
                                                                                                                    <button type="button" class="btn btn-outline-primary btn-sm" ><i class="fas fa-save"></i> Indicaciones Especiales para el paciente Periodóncia </button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="cit_control_period" role="tabpanel" aria-labelledby="cit_control_period_tab">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="card">
                                                                                                            <div class="card-body">
                                                                                                                <div id="contenedor_pieza_dental_endorx">
                                                                                                                    <div id="pieza_dentalrx" class="row">
                                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                            <div class="form-row">
                                                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <label class="floating-label-activo-sm">Fecha de Próximo Control</label>
                                                                                                                                        <input class="form-control form-control-sm" type="date" name="f_control_impl"id="f_control_impl">
                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                                <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <button type="button" class="btn btn-outline-primary btn-sm" ><i class="fas fa-save"></i> Ir a Agendar</button>
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
                            </div>    --}}
                            <!--CRONICOS / GES / CONFIDENCIAL -->
                            @include('general.secciones_ficha.seccion_cronicos_ges_confidencial')
                            <!--Diagnóstico-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a " id="diagnostico">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                                            Diagnóstico
                                        </button>
                                    </div>
                                    <div id="diagnostico_c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                        <div class="card-body-aten-a  shadow-none">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                                        <input type="text" class="form-control form-control-sm"  data-input_igual="lic_descripcion_hipotesis,hipotesis_certificado,dg_ingreso" name="descripcion_hipotesis" id="descripcion_hipotesis" onchange="cargarIgual('descripcion_hipotesis')" value="{{ isset($fichaAtencion->hipotesis_diagnostico) ? $fichaAtencion->hipotesis_diagnostico : '' }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Indicaciones</label>
                                                    <input type="text" class="form-control form-control-sm" name="ind_oft" id="ind_oft" value="{{ isset($fichaAtencion->indicaciones) ? $fichaAtencion->indicaciones : ''  }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                    <input type="text" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie" name="descripcion_cie" id="descripcion_cie" value="{{ isset($fichaAtencion->descripcion_ce10) ? $fichaAtencion->descripcion_ce10 : ''  }}" onchange="cargarIgual('descripcion_cie')">
                                                    <input type="hidden" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie" name="id_descripcion_cie" id="id_descripcion_cie" value="" onchange="cargarIgual('id_descripcion_cie')">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                                            @include('general.secciones_ficha.seccion_receta_examen_comunes')
                                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->
                                            <!--SECCION DE MEDICAMENTOS Y EXAMENES ESPECIALIDAD -->
                                            @include('atencion_medica.secciones_especialidad.seccion_receta_examen_esp_orl')
                                            <!--SECCION DE MEDICAMENTOS Y EXAMENES ESPECIALIDAD FIN  -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!--GUARDAR O IMPRIMIR FICHA-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                    <button type="submit" class="btn btn-purple mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha y finalizar su consulta">Guardar ficha y finalizar su consulta </button>
                                    <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su agenda">
                                    <input type="button" class="btn btn-primary mt-1" onclick="$('#cerrarsession').val('2');agregar_medicamentos_ficha(); agregar_examenes_ficha(); guardar_ficha()" value="Guardar y continuar en ficha">
                                </div>
                            </div>
                            <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
                        </div>
                        <!-- ODONTOGRAMA-->
                        <div class="tab-pane fade" id="odonto_adulto" role="tabpanel" aria-labelledby="odonto_adulto-tab">
                            @include('atencion_odontologica.generales.odontograma_adulto')
                        </div>
                        <!--CIERRE: ODONTOGRAMA--->
                        <!-- PERIIMPLANTE -->
                        <div class="tab-pane fade" id="eval_periimpl" role="tabpanel" aria-labelledby="eval_periimpl_tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            @include('atencion_odontologica.generales.periodontograma_general')
                                                        </div>
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--IMPLANTES ADULTO-->
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="tab-content" id="periimplante_adulto">
                                            <!--ARCADA SUPERIOR-->
                                            <div class="tab-pane fade active show " id="eval_18" role="tabpanel" aria-labelledby="eval_18_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_8')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show" id="eval_17" role="tabpanel" aria-labelledby="eval_17_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_7')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show" id="eval_16" role="tabpanel" aria-labelledby="eval_16_tab">
                                                 <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_6')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_15" role="tabpanel" aria-labelledby="eval_15_tab">
                                                 <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_5')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_14" role="tabpanel" aria-labelledby="eval_14_tab">
                                                 <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_4')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_13" role="tabpanel" aria-labelledby="eval_13_tab">
                                                 <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_3')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_12" role="tabpanel" aria-labelledby="eval_12_tab">
                                                 <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_2')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_11" role="tabpanel" aria-labelledby="eval_11_tab">
                                                 <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_1_1')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_21" role="tabpanel" aria-labelledby="eval_21_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_1')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_22" role="tabpanel" aria-labelledby="eval_22_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_2')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_23" role="tabpanel" aria-labelledby="eval_23_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_3')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_24" role="tabpanel" aria-labelledby="eval_24_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_4')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_25" role="tabpanel" aria-labelledby="eval_25_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_5')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_26" role="tabpanel" aria-labelledby="eval_26_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_6')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_27" role="tabpanel" aria-labelledby="eval_27_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_7')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_28" role="tabpanel" aria-labelledby="eval_28_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_2_8')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--ARCADA INFERIOR-->
                                            <div class="tab-pane fade  show " id="eval_48" role="tabpanel" aria-labelledby="eval_48_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_8')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_47" role="tabpanel" aria-labelledby="eval_47_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_7')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_46" role="tabpanel" aria-labelledby="eval_46_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_6')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_45" role="tabpanel" aria-labelledby="eval_45_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_5')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_44" role="tabpanel" aria-labelledby="eval_44_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_4')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_43" role="tabpanel" aria-labelledby="eval_43_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_3')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_42" role="tabpanel" aria-labelledby="eval_42_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_2')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_41" role="tabpanel" aria-labelledby="eval_41_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_4_1')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_31" role="tabpanel" aria-labelledby="eval_31_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_1')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_32" role="tabpanel" aria-labelledby="eval_32_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_2')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_33" role="tabpanel" aria-labelledby="eval_33_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_3')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade  show " id="eval_34" role="tabpanel" aria-labelledby="eval_34_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_4')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_35" role="tabpanel" aria-labelledby="eval_35_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_5')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_36" role="tabpanel" aria-labelledby="eval_36_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_6')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_37" role="tabpanel" aria-labelledby="eval_37_tab">
                                               <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_7')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show " id="eval_38" role="tabpanel" aria-labelledby="eval_38_tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            @include('atencion_odontologica.generales.pieza_3_8')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <!-- CIERRE PERIIMPLANTE -->
                        <!-- EVALUACIÓN-->
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
                                                            <!--ADULTO-->
                                                            <div class="tab-pane fade active show " id="eval_adults" role="tabpanel" aria-labelledby="eval_adults_tab">
                                                                @include('atencion_odontologica.generales.evaluacion_adulto')
                                                            </div>
                                                            <!--NIÑOS-->
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
                        <!-- PRESUPUESTO -->
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
@include("general.reserva_hora.modal.tomar_hora_dental")

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const cantidadInput = document.getElementById("cantidad");
        const precioInput = document.getElementById("precio");
        const totalInput = document.getElementById("total");

        // Calcula el total automáticamente cuando se ingresan datos
        function calcularTotal() {
            const cantidad = parseFloat(cantidadInput.value) || 0;
            const precio = parseFloat(precioInput.value) || 0;
            totalInput.value = (cantidad * precio).toFixed(2);
        }

        cantidadInput.addEventListener("input", calcularTotal);
        precioInput.addEventListener("input", calcularTotal);

    });
    $(document).ready(function(){
        $('.tratamiento-autocomplete').each(function() {
            $(this).autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getTratamientoImplantologia') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            if (data.length == 0) {
                                $('.diagnostico_activo').hide();
                                $('.diagnostico_inactivo').show();
                            } else {
                                $('.diagnostico_activo').show();
                                $('.diagnostico_inactivo').hide();
                            }
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $(this).val(ui.item.label);
                    $(this).next('input[type="hidden"]').val(ui.item.value); // Asigna el valor al input hidden correspondiente
                    return false;
                }
            });
        });
        mostrar_nuevas_imagenes_dent_estudio();
        $('#paciente_piezas_dentales_ex').select2();
        $('#paciente_piezas_dentales_ex_').select2();
        $('#tpo_proc_imp').select2();
        $('#prot_pieza_imp').select2();
        $('#prot_pieza_imp_man').select2();
        $('#prot_implante').select2();
        $('#prot_implante_man').select2();

        const piezasSelect = $('#paciente_piezas_dentales_ex');

        // // Inicializar Select2
        // piezasSelect.select2();

        // Control de selección de piezas en el odontograma
        $('.pieza').on('click', function () {
            const piezaNumero = $(this).data('pieza').toString(); // Convertir a string por seguridad

            if ($(this).hasClass('seleccionada')) {
                // Si ya está seleccionada, deseleccionarla
                $(this).removeClass('seleccionada');
                const options = piezasSelect.val().filter(item => item !== piezaNumero); // Filtra el elemento a eliminar
                piezasSelect.val(options).trigger('change');
            } else {
                // Si no está seleccionada, agregarla
                $(this).addClass('seleccionada');

                let opcionesSeleccionadas = piezasSelect.val() || [];
                if (!opcionesSeleccionadas.includes(piezaNumero)) {
                    opcionesSeleccionadas.push(piezaNumero);
                }

                piezasSelect.val(opcionesSeleccionadas).trigger('change');
            }
        });

        // generar numero random entre el 10 y el 20
        var random = Math.floor(Math.random() * (20 - 10 + 1) + 10);
        $('#random_preimpl').val(random);
        $('#random_postimpl').val(random);

        // Inicializar select2 en todos los select cuyo id comience con "pzas_grupo_impl"
        $('[id^="pzas_grupo_impl"]').select2();

        mostrar_nueva_pieza_dental_tto_impl(1000);
        mostrar_nueva_pieza_post_impl(random);
        mostrar_nuevo_grupo_post_impl(random);
        mostrar_nuevo_pieza_pfu(random);
        mostrar_nuevo_pieza_pfp(random);
    });

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

    function evaluar_para_carga_detalle(select, div, input, valor)
    {
        var valor_select = $('#'+select+'').val();
        if(valor_select == valor) $('#'+div+'').show();
        else {
            $('#'+div+'').hide();
            $('#'+input+'').val('');
        }
    }
    /** SECCION PERIODONTOGRAMA GENERAL */

        function getSangrado(){
            $("#suma").text(Math.round((totalSangrado/(totalDientes*6)*100)));

        }

        function getPlaca(){
            $("#suma2").text(Math.round((totalPlaca/(totalDientes*6)*100)));
        }

        function getSupuracion(){
            $("#suma3").text(Math.round((totalSupuracion/(totalDientes*6)*100)));

        }

        function dame_info_pieza() {
            let pieza = $('#historia_pza').val();
            console.log(pieza);
            let url ="{{ route('dental.dame_pieza') }}";
            let id_paciente = dame_id_paciente();
            if(id_paciente == '' || id_paciente == null){
                id_paciente = $('#id_paciente').val();
            }
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    pieza: pieza,
                    id_ficha_atencion: $('#id_fc').val(),
                    id_paciente: id_paciente,
                    _token: "{{ csrf_token() }}"
                },
                beforeSend: function(){
                    swal({
                        title:'info',
                        text:'Cargando ...',
                        icon:'info'
                    });
                },
                success: function (response)  {
                    swal.close();
                    console.log(response);
                    // Mapea los datos si los nombres de las claves no coinciden
                    const tipoExamenMap = {
                        1: 'Gral',
                        2: 'Endodoncia',
                        3: 'Odontopediatría' // Ejemplo adicional
                    };
                // Mapea los datos si los nombres de las claves no coinciden
                const data = response.map(item => ({
                    fecha: item.fecha || 'N/A', // Asigna valor por defecto si falta
                    diagnostico:  item.diagnostico ? item.diagnostico : 'N/A',
                    tratamiento:  item.tratamiento ? item.tratamiento : 'N/A',
                    tipo_examen: tipoExamenMap[item.tipo_examen] || 'Otro',
                    caras: item.diagnosticocaras || 'N/A',
                    responsable: item.profesional || 'N/A',
                    estado: item.diagnostico.estado == 1 ? 'TERMINADO' : 'EN ESPERA'
                }));

                // Inicializa o actualiza la tabla
                $('#historia_odontograma_pieza').DataTable({
                    destroy: true,
                    data: data,
                    columns: [
                        { data: 'fecha' },
                        { data: 'diagnostico' },
                        { data: 'tratamiento' },
                        { data: 'tipo_examen' },
                        { data: 'caras' },
                        { data: 'responsable' },
                        { data: 'estado' }
                    ],
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                    }
                });
                mostrar_nueva_pieza_dental_tto(pieza);
            },
            })

        }

        function getDefectos(){

            var datops18a=document.getElementById('ps18-a').value;
            var datops18b=document.getElementById('ps18-b').value;
            var datops18c=document.getElementById('ps18-c').value;

            var datops17a=document.getElementById('ps17-a').value;
            var datops17b=document.getElementById('ps17-b').value;
            var datops17c=document.getElementById('ps17-c').value;

            var datops16a=document.getElementById('ps16-a').value;
            var datops16b=document.getElementById('ps16-b').value;
            var datops16c=document.getElementById('ps16-c').value;

            var datops15a=document.getElementById('ps15-a').value;
            var datops15b=document.getElementById('ps15-b').value;
            var datops15c=document.getElementById('ps15-c').value;

            var datops14a=document.getElementById('ps14-a').value;
            var datops14b=document.getElementById('ps14-b').value;
            var datops14c=document.getElementById('ps14-c').value;

            var datops13a=document.getElementById('ps13-a').value;
            var datops13b=document.getElementById('ps13-b').value;
            var datops13c=document.getElementById('ps13-c').value;

            var datops12a=document.getElementById('ps12-a').value;
            var datops12b=document.getElementById('ps12-b').value;
            var datops12c=document.getElementById('ps12-c').value;

            var datops11a=document.getElementById('ps11-a').value;
            var datops11b=document.getElementById('ps11-b').value;
            var datops11c=document.getElementById('ps11-c').value;

            var total18=parseInt(datops18a)+parseInt(datops18b)+parseInt(datops18c)+
                        parseInt(datops17a)+parseInt(datops17b)+parseInt(datops17c)+
                        parseInt(datops16a)+parseInt(datops16b)+parseInt(datops16c)+
                        parseInt(datops15a)+parseInt(datops15b)+parseInt(datops15c)+
                        parseInt(datops14a)+parseInt(datops14b)+parseInt(datops14c)+
                        parseInt(datops13a)+parseInt(datops13b)+parseInt(datops13c)+
                        parseInt(datops12a)+parseInt(datops12b)+parseInt(datops12c)+
                        parseInt(datops11a)+parseInt(datops11b)+parseInt(datops11c);

            var datops28a=document.getElementById('ps28-a').value;
            var datops28b=document.getElementById('ps28-b').value;
            var datops28c=document.getElementById('ps28-c').value;

            var datops27a=document.getElementById('ps27-a').value;
            var datops27b=document.getElementById('ps27-b').value;
            var datops27c=document.getElementById('ps27-c').value;

            var datops26a=document.getElementById('ps26-a').value;
            var datops26b=document.getElementById('ps26-b').value;
            var datops26c=document.getElementById('ps26-c').value;

            var datops25a=document.getElementById('ps25-a').value;
            var datops25b=document.getElementById('ps25-b').value;
            var datops25c=document.getElementById('ps25-c').value;

            var datops24a=document.getElementById('ps24-a').value;
            var datops24b=document.getElementById('ps24-b').value;
            var datops24c=document.getElementById('ps24-c').value;

            var datops23a=document.getElementById('ps23-a').value;
            var datops23b=document.getElementById('ps23-b').value;
            var datops23c=document.getElementById('ps23-c').value;

            var datops22a=document.getElementById('ps22-a').value;
            var datops22b=document.getElementById('ps22-b').value;
            var datops22c=document.getElementById('ps22-c').value;

            var datops21a=document.getElementById('ps21-a').value;
            var datops21b=document.getElementById('ps21-b').value;
            var datops21c=document.getElementById('ps21-c').value;

            var total28=parseInt(datops28a)+parseInt(datops28b)+parseInt(datops28c)+
                        parseInt(datops27a)+parseInt(datops27b)+parseInt(datops27c)+
                        parseInt(datops26a)+parseInt(datops26b)+parseInt(datops26c)+
                        parseInt(datops25a)+parseInt(datops25b)+parseInt(datops25c)+
                        parseInt(datops24a)+parseInt(datops24b)+parseInt(datops24c)+
                        parseInt(datops23a)+parseInt(datops23b)+parseInt(datops23c)+
                        parseInt(datops22a)+parseInt(datops22b)+parseInt(datops22c)+
                        parseInt(datops21a)+parseInt(datops21b)+parseInt(datops21c);


            var datops38a=document.getElementById('ps38-a').value;
            var datops38b=document.getElementById('ps38-b').value;
            var datops38c=document.getElementById('ps38-c').value;

            var datops37a=document.getElementById('ps37-a').value;
            var datops37b=document.getElementById('ps37-b').value;
            var datops37c=document.getElementById('ps37-c').value;

            var datops36a=document.getElementById('ps36-a').value;
            var datops36b=document.getElementById('ps36-b').value;
            var datops36c=document.getElementById('ps36-c').value;

            var datops35a=document.getElementById('ps35-a').value;
            var datops35b=document.getElementById('ps35-b').value;
            var datops35c=document.getElementById('ps35-c').value;

            var datops34a=document.getElementById('ps34-a').value;
            var datops34b=document.getElementById('ps34-b').value;
            var datops34c=document.getElementById('ps34-c').value;

            var datops33a=document.getElementById('ps33-a').value;
            var datops33b=document.getElementById('ps33-b').value;
            var datops33c=document.getElementById('ps33-c').value;

            var datops32a=document.getElementById('ps32-a').value;
            var datops32b=document.getElementById('ps32-b').value;
            var datops32c=document.getElementById('ps32-c').value;

            var datops31a=document.getElementById('ps31-a').value;
            var datops31b=document.getElementById('ps31-b').value;
            var datops31c=document.getElementById('ps31-c').value;

            var total38=parseInt(datops38a)+parseInt(datops38b)+parseInt(datops38c)+
                        parseInt(datops37a)+parseInt(datops37b)+parseInt(datops37c)+
                        parseInt(datops36a)+parseInt(datops36b)+parseInt(datops36c)+
                        parseInt(datops35a)+parseInt(datops35b)+parseInt(datops35c)+
                        parseInt(datops34a)+parseInt(datops34b)+parseInt(datops34c)+
                        parseInt(datops33a)+parseInt(datops33b)+parseInt(datops33c)+
                        parseInt(datops32a)+parseInt(datops32b)+parseInt(datops32c)+
                        parseInt(datops31a)+parseInt(datops31b)+parseInt(datops31c);

            var datops48a=document.getElementById('ps48-a').value;
            var datops48b=document.getElementById('ps48-b').value;
            var datops48c=document.getElementById('ps48-c').value;

            var datops47a=document.getElementById('ps47-a').value;
            var datops47b=document.getElementById('ps47-b').value;
            var datops47c=document.getElementById('ps47-c').value;

            var datops46a=document.getElementById('ps46-a').value;
            var datops46b=document.getElementById('ps46-b').value;
            var datops46c=document.getElementById('ps46-c').value;

            var datops45a=document.getElementById('ps45-a').value;
            var datops45b=document.getElementById('ps45-b').value;
            var datops45c=document.getElementById('ps45-c').value;

            var datops44a=document.getElementById('ps44-a').value;
            var datops44b=document.getElementById('ps44-b').value;
            var datops44c=document.getElementById('ps44-c').value;

            var datops43a=document.getElementById('ps43-a').value;
            var datops43b=document.getElementById('ps43-b').value;
            var datops43c=document.getElementById('ps43-c').value;

            var datops42a=document.getElementById('ps42-a').value;
            var datops42b=document.getElementById('ps42-b').value;
            var datops42c=document.getElementById('ps42-c').value;

            var datops41a=document.getElementById('ps41-a').value;
            var datops41b=document.getElementById('ps41-b').value;
            var datops41c=document.getElementById('ps41-c').value;

            var total48=parseInt(datops48a)+parseInt(datops48b)+parseInt(datops48c)+
                        parseInt(datops47a)+parseInt(datops47b)+parseInt(datops47c)+
                        parseInt(datops46a)+parseInt(datops46b)+parseInt(datops46c)+
                        parseInt(datops45a)+parseInt(datops45b)+parseInt(datops45c)+
                        parseInt(datops44a)+parseInt(datops44b)+parseInt(datops44c)+
                        parseInt(datops43a)+parseInt(datops43b)+parseInt(datops43c)+
                        parseInt(datops42a)+parseInt(datops42b)+parseInt(datops42c)+
                        parseInt(datops41a)+parseInt(datops41b)+parseInt(datops41c);

            var datops18ba=document.getElementById('ps18b-a').value;
            var datops18bb=document.getElementById('ps18b-b').value;
            var datops18bc=document.getElementById('ps18b-c').value;

            var datops17ba=document.getElementById('ps17b-a').value;
            var datops17bb=document.getElementById('ps17b-b').value;
            var datops17bc=document.getElementById('ps17b-c').value;

            var datops16ba=document.getElementById('ps16b-a').value;
            var datops16bb=document.getElementById('ps16b-b').value;
            var datops16bc=document.getElementById('ps16b-c').value;

            var datops15ba=document.getElementById('ps15b-a').value;
            var datops15bb=document.getElementById('ps15b-b').value;
            var datops15bc=document.getElementById('ps15b-c').value;

            var datops14ba=document.getElementById('ps14b-a').value;
            var datops14bb=document.getElementById('ps14b-b').value;
            var datops14bc=document.getElementById('ps14b-c').value;

            var datops13ba=document.getElementById('ps13b-a').value;
            var datops13bb=document.getElementById('ps13b-b').value;
            var datops13bc=document.getElementById('ps13b-c').value;

            var datops12ba=document.getElementById('ps12b-a').value;
            var datops12bb=document.getElementById('ps12b-b').value;
            var datops12bc=document.getElementById('ps12b-c').value;

            var datops11ba=document.getElementById('ps11b-a').value;
            var datops11bb=document.getElementById('ps11b-b').value;
            var datops11bc=document.getElementById('ps11b-c').value;

            var total18b=parseInt(datops18ba)+parseInt(datops18bb)+parseInt(datops18bc)+
                        parseInt(datops17ba)+parseInt(datops17bb)+parseInt(datops17bc)+
                        parseInt(datops16ba)+parseInt(datops16bb)+parseInt(datops16bc)+
                        parseInt(datops15ba)+parseInt(datops15bb)+parseInt(datops15bc)+
                        parseInt(datops14ba)+parseInt(datops14bb)+parseInt(datops14bc)+
                        parseInt(datops13ba)+parseInt(datops13bb)+parseInt(datops13bc)+
                        parseInt(datops12ba)+parseInt(datops12bb)+parseInt(datops12bc)+
                        parseInt(datops11ba)+parseInt(datops11bb)+parseInt(datops11bc);


            var datops28ba=document.getElementById('ps28b-a').value;
            var datops28bb=document.getElementById('ps28b-b').value;
            var datops28bc=document.getElementById('ps28b-c').value;

            var datops27ba=document.getElementById('ps27b-a').value;
            var datops27bb=document.getElementById('ps27b-b').value;
            var datops27bc=document.getElementById('ps27b-c').value;

            var datops26ba=document.getElementById('ps26b-a').value;
            var datops26bb=document.getElementById('ps26b-b').value;
            var datops26bc=document.getElementById('ps26b-c').value;

            var datops25ba=document.getElementById('ps25b-a').value;
            var datops25bb=document.getElementById('ps25b-b').value;
            var datops25bc=document.getElementById('ps25b-c').value;

            var datops24ba=document.getElementById('ps24b-a').value;
            var datops24bb=document.getElementById('ps24b-b').value;
            var datops24bc=document.getElementById('ps24b-c').value;

            var datops23ba=document.getElementById('ps23b-a').value;
            var datops23bb=document.getElementById('ps23b-b').value;
            var datops23bc=document.getElementById('ps23b-c').value;

            var datops22ba=document.getElementById('ps22b-a').value;
            var datops22bb=document.getElementById('ps22b-b').value;
            var datops22bc=document.getElementById('ps22b-c').value;

            var datops21ba=document.getElementById('ps21b-a').value;
            var datops21bb=document.getElementById('ps21b-b').value;
            var datops21bc=document.getElementById('ps21b-c').value;

            var total28b=parseInt(datops28ba)+parseInt(datops28bb)+parseInt(datops28bc)+
                        parseInt(datops27ba)+parseInt(datops27bb)+parseInt(datops27bc)+
                        parseInt(datops26ba)+parseInt(datops26bb)+parseInt(datops26bc)+
                        parseInt(datops25ba)+parseInt(datops25bb)+parseInt(datops25bc)+
                        parseInt(datops24ba)+parseInt(datops24bb)+parseInt(datops24bc)+
                        parseInt(datops23ba)+parseInt(datops23bb)+parseInt(datops23bc)+
                        parseInt(datops22ba)+parseInt(datops22bb)+parseInt(datops22bc)+
                        parseInt(datops21ba)+parseInt(datops21bb)+parseInt(datops21bc);

            var datops38ba=document.getElementById('ps38b-a').value;
            var datops38bb=document.getElementById('ps38b-b').value;
            var datops38bc=document.getElementById('ps38b-c').value;

            var datops37ba=document.getElementById('ps37b-a').value;
            var datops37bb=document.getElementById('ps37b-b').value;
            var datops37bc=document.getElementById('ps37b-c').value;

            var datops36ba=document.getElementById('ps36b-a').value;
            var datops36bb=document.getElementById('ps36b-b').value;
            var datops36bc=document.getElementById('ps36b-c').value;

            var datops35ba=document.getElementById('ps35b-a').value;
            var datops35bb=document.getElementById('ps35b-b').value;
            var datops35bc=document.getElementById('ps35b-c').value;

            var datops34ba=document.getElementById('ps34b-a').value;
            var datops34bb=document.getElementById('ps34b-b').value;
            var datops34bc=document.getElementById('ps34b-c').value;

            var datops33ba=document.getElementById('ps33b-a').value;
            var datops33bb=document.getElementById('ps33b-b').value;
            var datops33bc=document.getElementById('ps33b-c').value;

            var datops32ba=document.getElementById('ps32b-a').value;
            var datops32bb=document.getElementById('ps32b-b').value;
            var datops32bc=document.getElementById('ps32b-c').value;

            var datops31ba=document.getElementById('ps31b-a').value;
            var datops31bb=document.getElementById('ps31b-b').value;
            var datops31bc=document.getElementById('ps31b-c').value;

            var total38b=parseInt(datops38ba)+parseInt(datops38bb)+parseInt(datops38bc)+
                        parseInt(datops37ba)+parseInt(datops37bb)+parseInt(datops37bc)+
                        parseInt(datops36ba)+parseInt(datops36bb)+parseInt(datops36bc)+
                        parseInt(datops35ba)+parseInt(datops35bb)+parseInt(datops35bc)+
                        parseInt(datops34ba)+parseInt(datops34bb)+parseInt(datops34bc)+
                        parseInt(datops33ba)+parseInt(datops33bb)+parseInt(datops33bc)+
                        parseInt(datops32ba)+parseInt(datops32bb)+parseInt(datops32bc)+
                        parseInt(datops31ba)+parseInt(datops31bb)+parseInt(datops31bc);

            var datops48ba=document.getElementById('ps48b-a').value;
            var datops48bb=document.getElementById('ps48b-b').value;
            var datops48bc=document.getElementById('ps48b-c').value;

            var datops47ba=document.getElementById('ps47b-a').value;
            var datops47bb=document.getElementById('ps47b-b').value;
            var datops47bc=document.getElementById('ps47b-c').value;

            var datops46ba=document.getElementById('ps46b-a').value;
            var datops46bb=document.getElementById('ps46b-b').value;
            var datops46bc=document.getElementById('ps46b-c').value;

            var datops45ba=document.getElementById('ps45b-a').value;
            var datops45bb=document.getElementById('ps45b-b').value;
            var datops45bc=document.getElementById('ps45b-c').value;

            var datops44ba=document.getElementById('ps44b-a').value;
            var datops44bb=document.getElementById('ps44b-b').value;
            var datops44bc=document.getElementById('ps44b-c').value;

            var datops43ba=document.getElementById('ps43b-a').value;
            var datops43bb=document.getElementById('ps43b-b').value;
            var datops43bc=document.getElementById('ps43b-c').value;

            var datops42ba=document.getElementById('ps42b-a').value;
            var datops42bb=document.getElementById('ps42b-b').value;
            var datops42bc=document.getElementById('ps42b-c').value;

            var datops41ba=document.getElementById('ps41b-a').value;
            var datops41bb=document.getElementById('ps41b-b').value;
            var datops41bc=document.getElementById('ps41b-c').value;

            var total48b=parseInt(datops48ba)+parseInt(datops48bb)+parseInt(datops48bc)+
                        parseInt(datops47ba)+parseInt(datops47bb)+parseInt(datops47bc)+
                        parseInt(datops46ba)+parseInt(datops46bb)+parseInt(datops46bc)+
                        parseInt(datops45ba)+parseInt(datops45bb)+parseInt(datops45bc)+
                        parseInt(datops44ba)+parseInt(datops44bb)+parseInt(datops44bc)+
                        parseInt(datops43ba)+parseInt(datops43bb)+parseInt(datops43bc)+
                        parseInt(datops42ba)+parseInt(datops42bb)+parseInt(datops42bc)+
                        parseInt(datops41ba)+parseInt(datops41bb)+parseInt(datops41bc);

            var totalps=total18+total28+total38+total48+total18b+total28b+total38b+total48b;
            var mediaps=totalps/(totalDientes*3);
            var redondeado = Math.round(mediaps*Math.pow(10,2))/Math.pow(10,2);

            $("#suma4").text(redondeado);


            var datomg18a=document.getElementById('mg18-a').value;
            var datomg18b=document.getElementById('mg18-b').value;
            var datomg18c=document.getElementById('mg18-c').value;

            var datomg17a=document.getElementById('mg17-a').value;
            var datomg17b=document.getElementById('mg17-b').value;
            var datomg17c=document.getElementById('mg17-c').value;

            var datomg16a=document.getElementById('mg16-a').value;
            var datomg16b=document.getElementById('mg16-b').value;
            var datomg16c=document.getElementById('mg16-c').value;

            var datomg15a=document.getElementById('mg15-a').value;
            var datomg15b=document.getElementById('mg15-b').value;
            var datomg15c=document.getElementById('mg15-c').value;

            var datomg14a=document.getElementById('mg14-a').value;
            var datomg14b=document.getElementById('mg14-b').value;
            var datomg14c=document.getElementById('mg14-c').value;

            var datomg13a=document.getElementById('mg13-a').value;
            var datomg13b=document.getElementById('mg13-b').value;
            var datomg13c=document.getElementById('mg13-c').value;

            var datomg12a=document.getElementById('mg12-a').value;
            var datomg12b=document.getElementById('mg12-b').value;
            var datomg12c=document.getElementById('mg12-c').value;

            var datomg11a=document.getElementById('mg11-a').value;
            var datomg11b=document.getElementById('mg11-b').value;
            var datomg11c=document.getElementById('mg11-c').value;

            var total18m=parseInt(datomg18a)+parseInt(datomg18b)+parseInt(datomg18c)+
                        parseInt(datomg17a)+parseInt(datomg17b)+parseInt(datomg17c)+
                        parseInt(datomg16a)+parseInt(datomg16b)+parseInt(datomg16c)+
                        parseInt(datomg15a)+parseInt(datomg15b)+parseInt(datomg15c)+
                        parseInt(datomg14a)+parseInt(datomg14b)+parseInt(datomg14c)+
                        parseInt(datomg13a)+parseInt(datomg13b)+parseInt(datomg13c)+
                        parseInt(datomg12a)+parseInt(datomg12b)+parseInt(datomg12c)+
                        parseInt(datomg11a)+parseInt(datomg11b)+parseInt(datomg11c);

            var datomg28a=document.getElementById('mg28-a').value;
            var datomg28b=document.getElementById('mg28-b').value;
            var datomg28c=document.getElementById('mg28-c').value;

            var datomg27a=document.getElementById('mg27-a').value;
            var datomg27b=document.getElementById('mg27-b').value;
            var datomg27c=document.getElementById('mg27-c').value;

            var datomg26a=document.getElementById('mg26-a').value;
            var datomg26b=document.getElementById('mg26-b').value;
            var datomg26c=document.getElementById('mg26-c').value;

            var datomg25a=document.getElementById('mg25-a').value;
            var datomg25b=document.getElementById('mg25-b').value;
            var datomg25c=document.getElementById('mg25-c').value;

            var datomg24a=document.getElementById('mg24-a').value;
            var datomg24b=document.getElementById('mg24-b').value;
            var datomg24c=document.getElementById('mg24-c').value;

            var datomg23a=document.getElementById('mg23-a').value;
            var datomg23b=document.getElementById('mg23-b').value;
            var datomg23c=document.getElementById('mg23-c').value;

            var datomg22a=document.getElementById('mg22-a').value;
            var datomg22b=document.getElementById('mg22-b').value;
            var datomg22c=document.getElementById('mg22-c').value;

            var datomg21a=document.getElementById('mg21-a').value;
            var datomg21b=document.getElementById('mg21-b').value;
            var datomg21c=document.getElementById('mg21-c').value;

            var total28m=parseInt(datomg28a)+parseInt(datomg28b)+parseInt(datomg28c)+
                        parseInt(datomg27a)+parseInt(datomg27b)+parseInt(datomg27c)+
                        parseInt(datomg26a)+parseInt(datomg26b)+parseInt(datomg26c)+
                        parseInt(datomg25a)+parseInt(datomg25b)+parseInt(datomg25c)+
                        parseInt(datomg24a)+parseInt(datomg24b)+parseInt(datomg24c)+
                        parseInt(datomg23a)+parseInt(datomg23b)+parseInt(datomg23c)+
                        parseInt(datomg22a)+parseInt(datomg22b)+parseInt(datomg22c)+
                        parseInt(datomg21a)+parseInt(datomg21b)+parseInt(datomg21c);


            var datomg38a=document.getElementById('mg38-a').value;
            var datomg38b=document.getElementById('mg38-b').value;
            var datomg38c=document.getElementById('mg38-c').value;

            var datomg37a=document.getElementById('mg37-a').value;
            var datomg37b=document.getElementById('mg37-b').value;
            var datomg37c=document.getElementById('mg37-c').value;

            var datomg36a=document.getElementById('mg36-a').value;
            var datomg36b=document.getElementById('mg36-b').value;
            var datomg36c=document.getElementById('mg36-c').value;

            var datomg35a=document.getElementById('mg35-a').value;
            var datomg35b=document.getElementById('mg35-b').value;
            var datomg35c=document.getElementById('mg35-c').value;

            var datomg34a=document.getElementById('mg34-a').value;
            var datomg34b=document.getElementById('mg34-b').value;
            var datomg34c=document.getElementById('mg34-c').value;

            var datomg33a=document.getElementById('mg33-a').value;
            var datomg33b=document.getElementById('mg33-b').value;
            var datomg33c=document.getElementById('mg33-c').value;

            var datomg32a=document.getElementById('mg32-a').value;
            var datomg32b=document.getElementById('mg32-b').value;
            var datomg32c=document.getElementById('mg32-c').value;

            var datomg31a=document.getElementById('mg31-a').value;
            var datomg31b=document.getElementById('mg31-b').value;
            var datomg31c=document.getElementById('mg31-c').value;

            var total38m=parseInt(datomg38a)+parseInt(datomg38b)+parseInt(datomg38c)+
                        parseInt(datomg37a)+parseInt(datomg37b)+parseInt(datomg37c)+
                        parseInt(datomg36a)+parseInt(datomg36b)+parseInt(datomg36c)+
                        parseInt(datomg35a)+parseInt(datomg35b)+parseInt(datomg35c)+
                        parseInt(datomg34a)+parseInt(datomg34b)+parseInt(datomg34c)+
                        parseInt(datomg33a)+parseInt(datomg33b)+parseInt(datomg33c)+
                        parseInt(datomg32a)+parseInt(datomg32b)+parseInt(datomg32c)+
                        parseInt(datomg31a)+parseInt(datomg31b)+parseInt(datomg31c);

            var datomg48a=document.getElementById('mg48-a').value;
            var datomg48b=document.getElementById('mg48-b').value;
            var datomg48c=document.getElementById('mg48-c').value;

            var datomg47a=document.getElementById('mg47-a').value;
            var datomg47b=document.getElementById('mg47-b').value;
            var datomg47c=document.getElementById('mg47-c').value;

            var datomg46a=document.getElementById('mg46-a').value;
            var datomg46b=document.getElementById('mg46-b').value;
            var datomg46c=document.getElementById('mg46-c').value;

            var datomg45a=document.getElementById('mg45-a').value;
            var datomg45b=document.getElementById('mg45-b').value;
            var datomg45c=document.getElementById('mg45-c').value;

            var datomg44a=document.getElementById('mg44-a').value;
            var datomg44b=document.getElementById('mg44-b').value;
            var datomg44c=document.getElementById('mg44-c').value;

            var datomg43a=document.getElementById('mg43-a').value;
            var datomg43b=document.getElementById('mg43-b').value;
            var datomg43c=document.getElementById('mg43-c').value;

            var datomg42a=document.getElementById('mg42-a').value;
            var datomg42b=document.getElementById('mg42-b').value;
            var datomg42c=document.getElementById('mg42-c').value;

            var datomg41a=document.getElementById('mg41-a').value;
            var datomg41b=document.getElementById('mg41-b').value;
            var datomg41c=document.getElementById('mg41-c').value;

            var total48m=parseInt(datomg48a)+parseInt(datomg48b)+parseInt(datomg48c)+
                        parseInt(datomg47a)+parseInt(datomg47b)+parseInt(datomg47c)+
                        parseInt(datomg46a)+parseInt(datomg46b)+parseInt(datomg46c)+
                        parseInt(datomg45a)+parseInt(datomg45b)+parseInt(datomg45c)+
                        parseInt(datomg44a)+parseInt(datomg44b)+parseInt(datomg44c)+
                        parseInt(datomg43a)+parseInt(datomg43b)+parseInt(datomg43c)+
                        parseInt(datomg42a)+parseInt(datomg42b)+parseInt(datomg42c)+
                        parseInt(datomg41a)+parseInt(datomg41b)+parseInt(datomg41c);

            var datomg18ba=document.getElementById('mg18b-a').value;
            var datomg18bb=document.getElementById('mg18b-b').value;
            var datomg18bc=document.getElementById('mg18b-c').value;

            var datomg17ba=document.getElementById('mg17b-a').value;
            var datomg17bb=document.getElementById('mg17b-b').value;
            var datomg17bc=document.getElementById('mg17b-c').value;

            var datomg16ba=document.getElementById('mg16b-a').value;
            var datomg16bb=document.getElementById('mg16b-b').value;
            var datomg16bc=document.getElementById('mg16b-c').value;

            var datomg15ba=document.getElementById('mg15b-a').value;
            var datomg15bb=document.getElementById('mg15b-b').value;
            var datomg15bc=document.getElementById('mg15b-c').value;

            var datomg14ba=document.getElementById('mg14b-a').value;
            var datomg14bb=document.getElementById('mg14b-b').value;
            var datomg14bc=document.getElementById('mg14b-c').value;

            var datomg13ba=document.getElementById('mg13b-a').value;
            var datomg13bb=document.getElementById('mg13b-b').value;
            var datomg13bc=document.getElementById('mg13b-c').value;

            var datomg12ba=document.getElementById('mg12b-a').value;
            var datomg12bb=document.getElementById('mg12b-b').value;
            var datomg12bc=document.getElementById('mg12b-c').value;

            var datomg11ba=document.getElementById('mg11b-a').value;
            var datomg11bb=document.getElementById('mg11b-b').value;
            var datomg11bc=document.getElementById('mg11b-c').value;

            var total18bm=parseInt(datomg18ba)+parseInt(datomg18bb)+parseInt(datomg18bc)+
                        parseInt(datomg17ba)+parseInt(datomg17bb)+parseInt(datomg17bc)+
                        parseInt(datomg16ba)+parseInt(datomg16bb)+parseInt(datomg16bc)+
                        parseInt(datomg15ba)+parseInt(datomg15bb)+parseInt(datomg15bc)+
                        parseInt(datomg14ba)+parseInt(datomg14bb)+parseInt(datomg14bc)+
                        parseInt(datomg13ba)+parseInt(datomg13bb)+parseInt(datomg13bc)+
                        parseInt(datomg12ba)+parseInt(datomg12bb)+parseInt(datomg12bc)+
                        parseInt(datomg11ba)+parseInt(datomg11bb)+parseInt(datomg11bc);


            var datomg28ba=document.getElementById('mg28b-a').value;
            var datomg28bb=document.getElementById('mg28b-b').value;
            var datomg28bc=document.getElementById('mg28b-c').value;

            var datomg27ba=document.getElementById('mg27b-a').value;
            var datomg27bb=document.getElementById('mg27b-b').value;
            var datomg27bc=document.getElementById('mg27b-c').value;

            var datomg26ba=document.getElementById('mg26b-a').value;
            var datomg26bb=document.getElementById('mg26b-b').value;
            var datomg26bc=document.getElementById('mg26b-c').value;

            var datomg25ba=document.getElementById('mg25b-a').value;
            var datomg25bb=document.getElementById('mg25b-b').value;
            var datomg25bc=document.getElementById('mg25b-c').value;

            var datomg24ba=document.getElementById('mg24b-a').value;
            var datomg24bb=document.getElementById('mg24b-b').value;
            var datomg24bc=document.getElementById('mg24b-c').value;

            var datomg23ba=document.getElementById('mg23b-a').value;
            var datomg23bb=document.getElementById('mg23b-b').value;
            var datomg23bc=document.getElementById('mg23b-c').value;

            var datomg22ba=document.getElementById('mg22b-a').value;
            var datomg22bb=document.getElementById('mg22b-b').value;
            var datomg22bc=document.getElementById('mg22b-c').value;

            var datomg21ba=document.getElementById('mg21b-a').value;
            var datomg21bb=document.getElementById('mg21b-b').value;
            var datomg21bc=document.getElementById('mg21b-c').value;

            var total28bm=parseInt(datomg28ba)+parseInt(datomg28bb)+parseInt(datomg28bc)+
                        parseInt(datomg27ba)+parseInt(datomg27bb)+parseInt(datomg27bc)+
                        parseInt(datomg26ba)+parseInt(datomg26bb)+parseInt(datomg26bc)+
                        parseInt(datomg25ba)+parseInt(datomg25bb)+parseInt(datomg25bc)+
                        parseInt(datomg24ba)+parseInt(datomg24bb)+parseInt(datomg24bc)+
                        parseInt(datomg23ba)+parseInt(datomg23bb)+parseInt(datomg23bc)+
                        parseInt(datomg22ba)+parseInt(datomg22bb)+parseInt(datomg22bc)+
                        parseInt(datomg21ba)+parseInt(datomg21bb)+parseInt(datomg21bc);

            var datomg38ba=document.getElementById('mg38b-a').value;
            var datomg38bb=document.getElementById('mg38b-b').value;
            var datomg38bc=document.getElementById('mg38b-c').value;

            var datomg37ba=document.getElementById('mg37b-a').value;
            var datomg37bb=document.getElementById('mg37b-b').value;
            var datomg37bc=document.getElementById('mg37b-c').value;

            var datomg36ba=document.getElementById('mg36b-a').value;
            var datomg36bb=document.getElementById('mg36b-b').value;
            var datomg36bc=document.getElementById('mg36b-c').value;

            var datomg35ba=document.getElementById('mg35b-a').value;
            var datomg35bb=document.getElementById('mg35b-b').value;
            var datomg35bc=document.getElementById('mg35b-c').value;

            var datomg34ba=document.getElementById('mg34b-a').value;
            var datomg34bb=document.getElementById('mg34b-b').value;
            var datomg34bc=document.getElementById('mg34b-c').value;

            var datomg33ba=document.getElementById('mg33b-a').value;
            var datomg33bb=document.getElementById('mg33b-b').value;
            var datomg33bc=document.getElementById('mg33b-c').value;

            var datomg32ba=document.getElementById('mg32b-a').value;
            var datomg32bb=document.getElementById('mg32b-b').value;
            var datomg32bc=document.getElementById('mg32b-c').value;

            var datomg31ba=document.getElementById('mg31b-a').value;
            var datomg31bb=document.getElementById('mg31b-b').value;
            var datomg31bc=document.getElementById('mg31b-c').value;

            var total38bm=parseInt(datomg38ba)+parseInt(datomg38bb)+parseInt(datomg38bc)+
                        parseInt(datomg37ba)+parseInt(datomg37bb)+parseInt(datomg37bc)+
                        parseInt(datomg36ba)+parseInt(datomg36bb)+parseInt(datomg36bc)+
                        parseInt(datomg35ba)+parseInt(datomg35bb)+parseInt(datomg35bc)+
                        parseInt(datomg34ba)+parseInt(datomg34bb)+parseInt(datomg34bc)+
                        parseInt(datomg33ba)+parseInt(datomg33bb)+parseInt(datomg33bc)+
                        parseInt(datomg32ba)+parseInt(datomg32bb)+parseInt(datomg32bc)+
                        parseInt(datomg31ba)+parseInt(datomg31bb)+parseInt(datomg31bc);

            var datomg48ba=document.getElementById('mg48b-a').value;
            var datomg48bb=document.getElementById('mg48b-b').value;
            var datomg48bc=document.getElementById('mg48b-c').value;

            var datomg47ba=document.getElementById('mg47b-a').value;
            var datomg47bb=document.getElementById('mg47b-b').value;
            var datomg47bc=document.getElementById('mg47b-c').value;

            var datomg46ba=document.getElementById('mg46b-a').value;
            var datomg46bb=document.getElementById('mg46b-b').value;
            var datomg46bc=document.getElementById('mg46b-c').value;

            var datomg45ba=document.getElementById('mg45b-a').value;
            var datomg45bb=document.getElementById('mg45b-b').value;
            var datomg45bc=document.getElementById('mg45b-c').value;

            var datomg44ba=document.getElementById('mg44b-a').value;
            var datomg44bb=document.getElementById('mg44b-b').value;
            var datomg44bc=document.getElementById('mg44b-c').value;

            var datomg43ba=document.getElementById('mg43b-a').value;
            var datomg43bb=document.getElementById('mg43b-b').value;
            var datomg43bc=document.getElementById('mg43b-c').value;

            var datomg42ba=document.getElementById('mg42b-a').value;
            var datomg42bb=document.getElementById('mg42b-b').value;
            var datomg42bc=document.getElementById('mg42b-c').value;

            var datomg41ba=document.getElementById('mg41b-a').value;
            var datomg41bb=document.getElementById('mg41b-b').value;
            var datomg41bc=document.getElementById('mg41b-c').value;

            var total48bm=parseInt(datomg48ba)+parseInt(datomg48bb)+parseInt(datomg48bc)+
                        parseInt(datomg47ba)+parseInt(datomg47bb)+parseInt(datomg47bc)+
                        parseInt(datomg46ba)+parseInt(datomg46bb)+parseInt(datomg46bc)+
                        parseInt(datomg45ba)+parseInt(datomg45bb)+parseInt(datomg45bc)+
                        parseInt(datomg44ba)+parseInt(datomg44bb)+parseInt(datomg44bc)+
                        parseInt(datomg43ba)+parseInt(datomg43bb)+parseInt(datomg43bc)+
                        parseInt(datomg42ba)+parseInt(datomg42bb)+parseInt(datomg42bc)+
                        parseInt(datomg41ba)+parseInt(datomg41bb)+parseInt(datomg41bc);

            var totalmg=total18m+total28m+total38m+total48m+total18bm+total28bm+total38bm+total48bm;
            var mediapsmg=(totalps+totalmg)/(totalDientes*3);
            var redondeadopsmg = Math.round(mediapsmg*Math.pow(10,2))/Math.pow(10,2);

            $("#suma5").text(redondeadopsmg);
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

        var contador = 0;
        var piezas_buscadas = new Set();

function mostrar_nueva_pieza_dental_tto(pieza){
    // Verificar si la pieza ya fue buscada
    // if (piezas_buscadas.has(pieza)) {
    //     console.log("La pieza ya ha sido buscada.");
    //     return; // Salir de la función si la pieza ya está en el set
    // }

    // Agregar la pieza al set de piezas buscadas
    // piezas_buscadas.add(pieza);

    contador++;
    let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_tto') }}";
    $.ajax({
        url: url,
        type: 'post',
        data: {
            pieza: pieza,
            seccion:'impl',
            counter: contador,
            id_paciente: $('#id_paciente').val(),
            id_ficha_atencion: $('#id_fc').val(),
            _token: '{{ csrf_token() }}'
        },
        success: function(resp) {
            console.log(resp);
             $('#contenedor_pieza_tto_implante').empty();
            $('#contenedor_pieza_tto_implante').append(resp.v);
        },
        error: function(error) {
            console.log(error);
        }
    });
}


function mostrar_nueva_pieza_dental_tto_period(counter){
    let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_tto') }}";
    $.ajax({
        url: url,
        type: 'post',
        data: {
            counter: counter,
            seccion:'period',
            _token: '{{ csrf_token() }}'
        },
        success: function(resp) {
            console.log(resp);
            $('#contenedor_pieza_plan_implante').empty();
            $('#contenedor_pieza_plan_implante').append(resp.v);
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

let pieza_numero = $('#numero_pieza'+count).val();
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
$('#mensaje_ficha').html(' Para el mejor funcionamiento del sistema rogamos anotar cualquier tipo de incidente o antecedente nuevo del paciente esto aportará a usted o sus colegas mayor información  acerca del paciente a tratar ');
$('#mensaje_ficha').show();
setTimeout(function(){
    $('#mensaje_ficha').hide();
}, 8000);
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
                                        <i class="feather icon-x"></i>Eliminar
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
                                        <i class="feather icon-x"></i>Eliminar
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
                                <td class="text-center align-middle text-wrap"><button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(${curacion.id})"><i class="feather icon-x"></i></button></td>
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
                                    <i class="feather icon-x"></i>Eliminar
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
                                    <i class="feather icon-x"></i>Eliminar
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
                                        <i class="feather icon-x"></i>Eliminar
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
                                        <i class="feather icon-x"></i>Eliminar
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
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(${curacion.id})">
                                        <i class="feather icon-x"></i>
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
                                        <td class="text-center align-middle text-wrap"><div name="remove" id="${medicamento.id}" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_medicamento_sdi(${medicamento.id});"><i class="feather icon-x"></i></div></td>
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
                                <td class="text-center align-middle text-wrap"><div name="remove" id="${medicamento.id}" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_medicamento_sdi(${medicamento.id});"><i class="feather icon-x"></i></div></td>
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

function mostrar_nuevas_imagenes_dent_estudio(counter){
    let url = "{{ ROUTE('profesional.mostrar_nuevas_imagenes_dental') }}";
    $.ajax({
        url: url,
        type: 'post',
        data: {
            counter: counter,
            tipo: 'preimplante',
            _token: '{{ csrf_token() }}'
        },
        success: function(resp) {
            console.log(resp);
            $('#contenedor_nueva_imagen_dent_estudio').empty();
            $('#contenedor_nueva_imagen_dent_estudio').append(resp.v);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function mostrar_nuevas_imagenes_dent_periodoncica(counter){
    let url = "{{ ROUTE('profesional.mostrar_nuevas_imagenes_dental') }}";
    $.ajax({
        url: url,
        type: 'post',
        data: {
            counter: counter,
            tipo: 'periodoncica',
            _token: '{{ csrf_token() }}'
        },
        success: function(resp) {
            console.log(resp);
            $('#contenedor_nueva_imagen_dent_period').empty();
            $('#contenedor_nueva_imagen_dent_period').append(resp.v);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function ocultar_pieza_imagenes_rx(){
    $('#contenedor_nueva_imagen_dent').empty();
}

function ocultar_pieza_imagenes_rx_estudio(){
    $('#contenedor_nueva_imagen_dent_estudio').empty();
}

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
                $('#pieza_dentalrx').find('select.select2').select2();
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
        showCancelButton: true,
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',

    })
    .then((confirm) => {
        if (confirm) {
            confirmar_eliminar_imagen_dental(id,path);
        } else {
            swal('Cancelado', 'La imagen no fue eliminada :(', 'error');
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
                let seccion = resp.seccion;
                if(seccion == 'gral'){
                    $('#contenedor_imagenes_dent').empty();
                    $('#contenedor_imagenes_dent').append(resp.v);
                }else if(seccion == 'implantologia'){
                    $('#contenedor_imagenes_dent_estudio').empty();
                    $('#contenedor_imagenes_dent_estudio').append(resp.v);
                }else{
                    $('#contenedor_imagenes_dent_period').empty();
                    $('#contenedor_imagenes_dent_period').append(resp.v);
                }

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
                let seccion = resp.seccion;
                if(seccion == 'gral'){
                    $('#contenedor_imagenes_dent').empty();
                    $('#contenedor_imagenes_dent').append(resp.v);
                }else if(seccion == 'implantologia'){
                    $('#contenedor_imagenes_dent_estudio').empty();
                    $('#contenedor_imagenes_dent_estudio').append(resp.v);
                }else{
                    $('#contenedor_imagenes_dent_period').empty();
                    $('#contenedor_imagenes_dent_period').append(resp.v);
                }

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

function eliminar_pieza_dental_imagenes_estudio(id){
    swal({
            title: 'Advertencia',
            text: '¿Está seguro de eliminar esta información?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            dangerMode: true
        }).then((aceptar) => {
            if (aceptar) {
                confirmar_eliminar_pieza_dental_imagenes_estudio(id);
            }
        })
}

function confirmar_eliminar_pieza_dental_imagenes_estudio(id){
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
                $('#contenedor_imagenes_dent_estudio').empty();
                $('#contenedor_imagenes_dent_estudio').append(resp.v);
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

    function pedir_autorizacion_presupuesto_dental(){
        swal({
            title: 'Advertencia',
            text: '¿Está seguro de solicitar la autorización del presupuesto?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            dangerMode: true
        }).then((aceptar) => {
            if (aceptar) {
                confirmar_pedir_autorizacion_presupuesto_dental();
            }
        })
    }

    function  confirmar_pedir_autorizacion_presupuesto_dental()
    {
        $('#modal_autorizacion_presupuesto').modal('show');
        $('#modal_autorizacion_imagen').html('');
        $('#modal_autorizacion_mensaje').html('');
        $('#modal_autorizacion_btn_solicitar').attr('disabled', false);
    }

    function  cerrar_autorizacion_presupuesto()
    {
        $('#modal_autorizacion_presupuesto').modal('hide');
    }

    function mostrar_nueva_pieza_dental_hist(count, tipo){
        let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_hist') }}";
        let data = {
            count: count,
            id_paciente: dame_id_paciente(),
            seccion: tipo,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'OK'){
                    if(tipo == 'impl'){
                        $('#contenedor_piezas_hist').empty();
                        $('#contenedor_piezas_hist').append(resp.v);
                    }else{
                        $('#contenedor_piezas_hist_period').empty();
                        $('#contenedor_piezas_hist_period').append(resp.v);
                    }


                }
            },
            error: function(error){
                console.log(error);
            }
        })
    }

    function mostrar_nueva_pieza_dental_period(count){
        let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_period') }}";
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
                    $('#contenedor_pieza_period_period').empty();
                    $('#contenedor_pieza_period_period').append(resp.v);
                }
            },
            error: function(error){
                console.log(error);
            }
        })
    }

    function solicitar_ic_periodoncia(){
        $('#modal_interconsulta_respuesta').modal('show');
    }

    function biopsia_check_implantologia(count) {
        // Obtén el checkbox
        var checkbox = $('#biopsia_check_implantologia' + count);

        // Obtén los textareas
        var textareaZona = $('#im_biop_zona' + count);
        var textareaObservaciones = $('#im_obs_result_biopsia' + count);

        // Verifica si el checkbox está marcado
        if (checkbox.is(':checked')) {
            // Si está marcado, habilita los textareas (remueve el atributo disabled)
            textareaZona.removeAttr('disabled');
            textareaObservaciones.removeAttr('disabled');
        } else {
            // Si no está marcado, deshabilita los textareas (añade el atributo disabled)
            textareaZona.attr('disabled', 'disabled');
            textareaObservaciones.attr('disabled', 'disabled');
        }
    }

    function biopsia_check_period(count) {
        console.log(count);
        // Obtén el checkbox
        var checkbox = $('#biopsia_check_period_period' + count);

        // Obtén los textareas
        var textareaZona = $('#period_biop_zona' + count);
        var textareaObservaciones = $('#period_obs_result_biopsia' + count);

        // Verifica si el checkbox está marcado
        if (checkbox.is(':checked')) {
            // Si está marcado, habilita los textareas (remueve el atributo disabled)
            textareaZona.removeAttr('disabled');
            textareaObservaciones.removeAttr('disabled');
        } else {
            // Si no está marcado, deshabilita los textareas (añade el atributo disabled)
            textareaZona.attr('disabled', 'disabled');
            textareaObservaciones.attr('disabled', 'disabled');
        }
    }
</script>

<script>
    function eliminar_pieza_dental_hist(id){
    swal({
        title: 'Advertencia',
        text: '¿Está seguro de eliminar esta pieza?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        dangerMode: true
    })
    .then((aceptar) => {
        if (aceptar) {
            confirmar_eliminar_pieza_dental_hist(id);
        } else {
            swal('Cancelado', 'La pieza no fue eliminada :(', 'error');
        }
    });
}

function confirmar_eliminar_pieza_dental_hist(id){
    let url = "{{ ROUTE('profesional.eliminar_pieza_dental_hist') }}";
    let data = {
        _token: CSRF_TOKEN,
        id_paciente: dame_id_paciente(),
        id: id,
        id_ficha_atencion: $('#id_fc').val(),
        id_lugar_atencion: $('#id_lugar_atencion').val()
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                let seccion = resp.seccion;
                if(seccion == 'impl'){
                    $('#hist_piezas').empty();
                    $('#hist_piezas').append(resp.v);
                }else{
                    $('#hist_piezas_period').empty();
                    $('#hist_piezas_period').append(resp.v);
                }


                swal({
                    title:'Exito',
                    text:'Se ha eliminado con éxito',
                    icon:'success'
                });


            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

function ocultar_pieza_impl(counter){
    console.log(counter);
    $('#contenedor_pieza_tto_impl'+counter).empty();
}

function cargar_a_presupuesto_impl_g() {
    // preguntar si desea eliminar
    swal({
        title: "Cargar Piezas",
        text: "¿Está seguro que desea cargar el grupo de piezas?",
        icon: "warning",
        buttons: ["Cancelar", "Aceptar"],
        DangerMode: true,
    })
    .then((willLoad) => {
        if (willLoad) {
            cargar_a_presupuesto_impl_g_confirmar();
        }
    });
}

function cargar_a_presupuesto_impl_g_confirmar(){
    // Obtener los valores seleccionados en el select
    var piezasSeleccionadas = $('#paciente_piezas_dentales_ex').val();
    var ttoPiezas = $('#diag_presupuesto_pieza_g').val();

    let valido = 1;
    let mensaje = '';

    if(piezasSeleccionadas.length == 0){
        valido = 0;
        mensaje += '<li>Piezas seleccionadas </li>'
    }
    if(ttoPiezas == ''){
        valido = 0;
        mensaje += '<li>Tratamiento </li>';
    }

    if(valido == 0){
        swal({
                title: "Campos requeridos",
                content:{
                    element: "ul",
                    attributes: {
                        innerHTML: mensaje
                    }
                },
                icon: "error",
            });
            return false;
    }

    let url = "{{ ROUTE('dental.cargar_tratamiento_presupuesto_period') }}";
    let data = {
        piezas: piezasSeleccionadas,
        tto: ttoPiezas,
        id_ficha_atencion: $('#id_fc').val(),
        id_lugar_atencion: $('#id_lugar_atencion').val(),
        id_paciente: dame_id_paciente(),
        _token: "{{ csrf_token() }}"
    }
    console.log(data);
    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.status == 1){
                swal({
                    icon:'success',
                    title:'Info',
                    text: resp.mensaje
                });
                let odontograma = resp.odontograma_paciente;
                let html = '';
                odontograma.forEach(function(odonto){
                    html += '<tr>';
                    html += '<td>'+odonto.fecha+'</td>';
                    html += '<td>'+odonto.tratamiento+'</td>';
                    html += '<td>'+odonto.caras+'</td>';
                    html += '<td>'+odonto.pieza+'</td>';
                    html += '<td>'+odonto.diagnostico+'</td>';
                    html += '<td>'+formatoMoneda(odonto.valor)+'</td>';
                    // html += '<td>';
                    // html += '<button type="button" class="btn btn-danger btn-sm" onclick="eliminar_odontograma('+odonto.id+')"><i class="feather icon-x"></i>Eliminar</button>';
                    // if(odonto.presupuesto == 0){
                    //     html += '<button type="button" class="btn btn-primary btn-sm" onclick="cargar_a_presupuesto('+odonto.id+')"><i class="fas fa-save"></i>Cargar a presupuesto</button>';
                    // }else{
                    //     html += '<button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto('+odonto.id+')"><i class="feather icon-x"></i>Sacar de presupuesto</button>';
                    // }

                    // html += '</td>';
                     // Checkbox para seleccionar el odontograma
                    html += '<td>';
                    html += '<div class="form-check">';
                    html += '<input class="form-check-input" type="checkbox" value="' + odonto.id + '" '
                    html += odonto.presupuesto == 1 ? 'checked ' : '';
                    html += 'onchange="togglePresupuesto(' + odonto.id + ', this.checked)">';
                    html += '<label class="form-check-label"></label>';
                    html += '</div>';
                    html += '</td>';
                    html += '<td>';
                    html += '<div class="form-check">';
                    html += '<input class="form-check-input checkbox-seleccion" type="checkbox" value="' + odonto.id + '" ';
                    html += 'id="seleccionCheck' + odonto.id + '" ';
                    html += 'onchange="toggleSeleccion(' + odonto.id + ', this.checked)">';
                    html += '<label class="form-check-label" for="seleccionCheck' + odonto.id + '"></label>';
                    html += '</div>';
                    html += '</td>';
                    html += '</tr>';
                });
                $('#contenedor_examenes_grupos_dentales').empty();
                $('#contenedor_examenes_grupos_dentales').append(resp.vista_presupuestos);
                $('#table_odontograma tbody').html(html);
                $('#contenedor_piezas_dentales_presupuesto').empty();
                $('#table_trabajos_presupuesto tbody').empty();
                $('#numero_pieza_post_impl2000').empty();
                // id que representa el select de piezas pre implante
                $('#numero_pieza_tto_impl1000').empty();
                odontograma.forEach(function(odonto){
                    if(odonto.presupuesto == 1){
                        $('#contenedor_piezas_dentales_presupuesto').append(`
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-informacion">
                                    <div class="card-body pb-0">
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-3 col-lg-1 col-xl-1 fill">
                                                <label class="floating-label-activo-sm">Pieza</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-9 col-lg-4 col-xl-4 fill">
                                                <label class="floating-label-activo-sm">Prestación</label>
                                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                <label class="floating-label-activo-sm">Sub-Total</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                <label class="floating-label-activo-sm">Descuento</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                <label class="floating-label-activo-sm">Total prestación</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                            </div>
                                            <div class="form-group col-sm-12 col-md-1 col-lg-1 col-xl-1 d-flex">
                                                <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                        $('#table_trabajos_presupuesto tbody').append(`
                            <tr>
                                <td>${odonto.fecha}</td>
                                <td>${odonto.diagnostico} </td>
                                <td>${odonto.caras} </td>
                                <td>${odonto.pieza} </td>
                                <td>${odonto.tratamiento} </td>
                                <td>${formatoMoneda(odonto.valor)} </td>
                                <td> </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Atender</button>
                                </td>
                            </tr>
                        `);
                        // select que representa a las piezas post implante
                        $('#numero_pieza_post_impl2000').append(`
                            <option value="${odonto.pieza}">${odonto.pieza}</option>
                        `);
                        // select que representa a las piezas pre implante
                        $('#numero_pieza_tto_impl1000').append(`
                            <option value="${odonto.pieza}">${odonto.pieza}</option>
                        `);
                    }
                });
                let valores_boca_general = resp.valores[0];
                let valores_odontograma = resp.valores[1];
                let valores_insumos = resp.valores[2];
                let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                $('#subtotal_clinico').val(formatoMoneda(valores_boca_general + valores_odontograma));
                $('#total_clinico').val(formatoMoneda(valores_boca_general + valores_odontograma));
                $('#total_presupuesto_dental').val(total_general);
                $('#total_presupuesto').val(formatoMoneda(total_general));

                // se cargan las piezas seleccionadas en tabla con id table_piezas_presupuesto_odonto
                let table_odon_gral = $('#table_piezas_presupuesto_odonto').DataTable();
                table_odon_gral.clear().draw();

                odontograma.forEach(function(pieza){
                            // Agregar una nueva fila a la tabla
                            let rowNode = table_odon_gral.row.add([
                                pieza.pieza,
                                pieza.descripcion,
                                formatoMoneda(formatoMoneda(pieza.valor)),
                                '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma('+pieza.id+')"><i class="feather icon-x"> </i> </button>'

                            ]).draw(false).node(); // Obtener el nodo de la fila


                });

                $('#monto_total').html(formatoMoneda(valores_insumos)+' + '+formatoMoneda(valores_odontograma + valores_boca_general)+' = '+formatoMoneda(total_general));

                let table = $('#presup_estado_pago').DataTable();
                table.clear().draw();

                // Recorrer el odontograma y agregar nuevas filas
                odontograma.forEach(function(odonto) {

                        if (odonto.presupuesto == 1) {
                            if(odonto.estado_pago == 'ok'){
                                var clase = 'bg-success';
                            }else if(odonto.estado_pago == 'incompleto'){
                                var clase = 'bg-warning';
                            }else{
                                var clase = 'bg-danger';
                            }

                            if(odonto.estado == 0){
                                var estado = 'PENDIENTE';
                            }else{
                                var estado = 'TERMINADO';
                            }
                            // Agregar una nueva fila a la tabla
                            let rowNode = table.row.add([
                                odonto.descripcion,
                                odonto.pieza,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                0,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                '<div class="circle '+clase+'"></div>',
                                estado, // Columna vacía

                            ]).draw(false).node(); // Obtener el nodo de la fila

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }
                });
                //limpiar_formulario_cargar_presupuesto_g();
                $('#table_pagos_reasignar_odontograma tbody').empty();
                odontograma.forEach(function(odonto) {
                    if (odonto.presupuesto == 1) {
                        let fila = `<tr>
                            <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                            <td>${odonto.pieza}</td>
                            <td>${formatoMoneda(odonto.valor)}</td>
                            <td><button type="button" class="btn btn-danger" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"> </i> </button></td>
                        </tr>`;
                        $('#table_pagos_reasignar_odontograma tbody').append(fila);
                    }
                });
                // limpiar formulario
                $('#diag_presupuesto_pieza_g').val('');
                $('#paciente_piezas_dentales_ex').val(null).trigger('change');
            }else{
                swal({
                    icon:'error',
                    title:'info',
                    text: resp.mensaje
                });
            }


            $('#tratamiento_presupuesto tbody').empty();
            let presupuesto = resp.presupuesto;
            console.log(presupuesto);
            $('#tratamiento_presupuesto tbody').append(`
            <tr>
                <td class="text-center align-middle">${presupuesto.fecha}</td>
                <td class="text-center align-middle">${presupuesto.id}</td>
                <td class="text-center align-middle">${presupuesto.aprobado}</td>
                <td class="text-center align-middle">Sector I</td>
                <td class="text-center align-middle">${presupuesto.boca}</td>

                <td class="text-center align-middle">
                    <div class="form-group col-md-4">
                        <div class="switch switch-success d-inline m-r-2">
                            <input type="checkbox" id="info_finalizado" checked="">
                            <label for="info_finalizado" class="cr"></label>
                        </div>
                        <label>Realizado?</label>
                    </div>
                </td>
                <td class="text-center align-middle">
                    ${presupuesto.fecha}
                </td>
                <td class="text-center align-middle">
                    <button type="button" class="btn btn-info btn-sm" onclick="presupuesto()" ;="">
                        <i class="fa fa-plus"></i> Trabajar en pieza
                    </button>
                </td>
            </tr>
            `);

        },
        error: function(error){
            console.log(error.responseText);
        }
    });
}

function limpiar_formulario_cargar_presupuesto_g(){
    $('#diag_presupuesto_pieza_g').val('');
    $('#paciente_piezas_dentales_ex').empty();
    //$('#paciente_piezas_dentales_ex').selectpicker('refresh');
}

function mostrar_nueva_pieza_dental_tto_impl(counter){
            let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_tto_impl') }}";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    id_paciente: dame_id_paciente(),
                    id_ficha_atencion: $('#id_fc').val(),
                    id_lugar_atencion: $('#id_lugar_atencion').val(),
                    counter: counter,
                    _token: '{{ csrf_token() }}'
                },
                success: function(resp) {
                    console.log(resp);
                    $('#pieza_dental_tto_impl').empty();
                    $('#pieza_dental_tto_impl').append(resp.v);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function eliminar_pieza_dental_tto_impl(id){
            swal({
                    title: 'Advertencia',
                    text: '¿Está seguro de eliminar este examen?',
                    icon: 'warning',
                    buttons: ['Cancelar', 'Aceptar'],
                    dangerMode: true
                }).then((aceptar) => {
                    if (aceptar) {
                        confirmar_eliminar_pieza_dental_tto_impl(id);
                    }
                })
        }


function confirmar_eliminar_pieza_dental_tto_impl(id){
    let url = "{{ ROUTE('profesional.eliminar_pieza_dental_tto_impl') }}";
    let id_paciente = dame_id_paciente();

    $.ajax({
        type:'post',
        url: url,
        data:{
            id: id,
            id_paciente: id_paciente,
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            _token: CSRF_TOKEN
        },
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                swal({
                    title:'Exito',
                    text:'Se ha eliminado con éxito',
                    icon:'success',
                });
                $('#contenedor_tto_implantologia').empty();
                $('#contenedor_tto_implantologia').append(resp.v);
                // Verificar si existen exámenes en la respuesta
                if (resp.examenes && resp.examenes.length > 0) {
                        let detalleCirugia = resp.examenes.map(examen =>
                            `La pieza ${examen.numero_pieza} se ha realizado ${examen.tipo_procedimiento} ` +
                            `usando ${examen.anestesia} con ${examen.numero_tubos} tubos, ` +
                            `con la técnica ${examen.tecnica_anestesia}`
                        ).join("\n");

                        $('#det_cir').val(detalleCirugia);
                    let odontograma = resp.odontograma;
                        let table = $('#presup_estado_pago').DataTable();
                        table.clear().draw();

                        // Recorrer el odontograma y agregar nuevas filas
                        // Recorrer el odontograma y agregar nuevas filas
                        odontograma.forEach(function(odonto) {

                            if (odonto.presupuesto == 1) {
                                if(odonto.estado_pago == 'ok'){
                                    var clase = 'bg-success';
                                }else if(odonto.estado_pago == 'incompleto'){
                                    var clase = 'bg-warning';
                                }else{
                                    var clase = 'bg-danger';
                                }

                                if(odonto.estado == 0){
                                    var estado = 'PENDIENTE';
                                }else{
                                    var estado = 'TERMINADO';
                                }
                                // Agregar una nueva fila a la tabla
                                let rowNode = table.row.add([
                                    odonto.descripcion,
                                    odonto.pieza,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    0,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    '<div class="circle '+clase+'"></div>',
                                    estado, // Columna vacía

                                ]).draw(false).node(); // Obtener el nodo de la fila

                                // Agregar clases a la fila
                                $(rowNode).addClass('text-center align-middle status-circle');
                            }
                        });
                } else {
                    $('#det_cir').val('No hay detalles de cirugía disponibles.');
                }
            }
        },
        error: function(error){
            console.log(error);
        }
    });
}

function mostrar_nueva_pieza_post_impl(counter){

    let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_dental_post_impl') }}";
    $.ajax({
        url: url,
        type: 'post',
        data: {
            id_paciente: dame_id_paciente(),
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            count: counter,
            _token: '{{ csrf_token() }}'
        },
        success: function(resp) {
            console.log(resp);
            $('#pieza_post_implantada').empty();
            $('#pieza_post_implantada').append(resp.v);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function agregar_cirujano_impl(){
    $('#div_nuevo_cirujano_impl').removeClass('d-none');
    $('#div_nuevo_cirujano_impl').addClass('d-block');
}

function agregar_cirujano_impl_man(){
    $('#div_nuevo_cirujano_impl_man').removeClass('d-none');
    $('#div_nuevo_cirujano_impl_man').addClass('d-block');
}

function ocultar_cirujano_impl(){
    $('#div_nuevo_cirujano_impl').addClass('d-none');
    $('#div_nuevo_cirujano_impl').removeClass('d-block');
}

function ocultar_cirujano_impl_man(){
    $('#div_nuevo_cirujano_impl_man').addClass('d-none');
    $('#div_nuevo_cirujano_impl_man').removeClass('d-block');
}

function generar_pdf_protocolo_dental(){
    let nombre_cir = $('#prot_cirujanos_imp').val();
    let nombre_anest = $('#prot_anestesista_imp').val();
    let nombre_tons = $('#prot_tons_imp').val();
    let nombre_arsenalera = $('#prot_ars_imp').val();

    let id_forma_mat_impl = $('#prot_forma_mat').val();
    let forma_mat_impl = $('#prot_forma_mat option:selected').text();
    let valido = 1;
    let mensaje = '';
    if(id_forma_mat_impl == 13){
        forma_mat_impl = $('#det_prot_forma_mat').val();
    }
    let implantes_insumos = $('#prot_implante').val();
    if(implantes_insumos.length == 0){
        valido = 0;
        mensaje += '<li>Implantes/insumos </li>';
    }

    let id_implantes = $('#prot_proc').val();
    let implantes = $('#prot_proc option:selected').text();
    if(id_implantes == 3){
        implantes = $('#det_prot_proc').val();
    }

    if(id_implantes == 0){
        valido = 0;
        mensaje += '<li>Implantes </li>';
    }

    let id_prot_prot_corona = $('#prot_prot_corona').val();
    let prot_prot_corona = $('#prot_prot_corona option:selected').text();
    if(id_prot_prot_corona == 3){
        prot_prot_corona = $('#det_prot_prot_corona').val();
    }

    let prot_pieza_imp = $('#prot_pieza_imp').val();

    if(id_forma_mat_impl == 0){
        valido = 0;
        mensaje += '<li>Materia Implante </li>';
    }

    if(nombre_cir == ''){
        valido = 0;
        mensaje += '<li>Cirujano </li>';
    }

    if(nombre_anest == ''){
        valido = 0;
        mensaje += '<li>Anestesista </li>';
    }

    if(nombre_arsenalera == ''){
        valido = 0;
        mensaje += '<li>Arsenalera </li>';
    }

    if(nombre_tons == ''){
        valido = 0;
        mensaje += '<li>Tons </li>';
    }

    if(prot_pieza_imp.length == 0){
        valido = 0;
        mensaje += '<li>Piezas </li>'
    }
    let det_cir = $('#det_cir').val();

    if(valido == 1){


        let data = {
            nombre_cir: nombre_cir,
            nombre_anest: nombre_anest,
            nombre_tons: nombre_tons,
            nombre_arsenalera: nombre_arsenalera,
            id_forma_mat_impl: id_forma_mat_impl,
            forma_mat_impl: forma_mat_impl,
            implantes_insumos: implantes_insumos,
            id_implantes: id_implantes,
            implantes: implantes,
            id_prot_prot_corona: id_prot_prot_corona,
            prot_prot_corona: prot_prot_corona,
            prot_pieza_imp: prot_pieza_imp,
            det_cir: det_cir,
            id_paciente: dame_id_paciente(),
            tipo:'implantologia',
            _token: CSRF_TOKEN
        }

        console.log(data);

       $.ajax({
        type:'post',
        url:'{{ route("dental.generar_pdf_protocolo_impl") }}',
        data: data,
        success: function(data){
            console.log(data);
            if(data == 'error'){
                swal({
                    title:'Error',
                    text:'Primero debe generar la liquidación.',
                    icon:'error',
                    button:"Aceptar"
                });
                return false;
            }
            if(data.ruta){
                swal({
                    title: "Reporte generado",
                    text: "El reporte se ha generado correctamente",
                    icon: "success",
                    button: "Aceptar"
                }).then(() => {
                    // Abrir el PDF en una ventana emergente
                    var width = 800;
                    var height = 600;
                    var left = (screen.width - width) / 2;
                    var top = (screen.height - height) / 2;
                    window.open(data.ruta, 'Presupuesto dental', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);
                });
            }else{
                swal({
                    title: "Error",
                    text: "Ha ocurrido un error al generar el reporte",
                    icon: "error",
                    button: "Aceptar"
                });
            }
        },
        else: function(error){
            console.log(error.responseText);
        }
       });
    }else{
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
}

function generar_pdf_protocolo_man_dental(){
    let nombre_cir = $('#prot_cirujanos_imp_man').val();
    let nombre_cir_nuevo = $('#prot_cirujanos_imp_man_nuevo').val();
    let nombre_anest = $('#prot_anestesista_imp_man').val();
    let nombre_tons = $('#prot_tons_imp_man').val();
    let nombre_arsenalera = $('#prot_ars_imp_man').val();

    let id_forma_mat_impl = $('#prot_forma_mat_man').val();
    let forma_mat_impl = $('#prot_forma_mat_man option:selected').text();
    let valido = 1;
    let mensaje = '';
    if(id_forma_mat_impl == 13){
        forma_mat_impl = $('#det_prot_forma_mat_man').val();
    }
    let implantes_insumos = $('#prot_implante_man').val();

    let id_implantes = $('#prot_proc_man').val();
    let implantes = $('#prot_proc_man option:selected').text();
    if(id_implantes == 3){
        implantes = $('#det_prot_proc_man').val();
    }

    if(id_implantes == 0){
        valido = 0;
        mensaje += '<li>Implantes </li>';
    }

    let id_prot_prot_corona = $('#prot_prot_corona_man').val();
    let prot_prot_corona = $('#prot_prot_corona_man option:selected').text();
    if(id_prot_prot_corona == 3){
        prot_prot_corona = $('#det_prot_prot_corona_man').val();
    }

    let prot_pieza_imp = $('#prot_pieza_imp_man').val();

    if(id_forma_mat_impl == 0){
        valido = 0;
        mensaje += '<li>Materia Implante </li>';
    }

    if(nombre_cir == ''){
        valido = 0;
        mensaje += '<li>Cirujano </li>';
    }


    if(prot_pieza_imp.length == 0){
        valido = 0;
        mensaje += '<li>Piezas </li>'
    }
    let det_cir = $('#det_cir_man').val();

    if(valido == 1){


        let data = {
            nombre_cir: nombre_cir,
            nombre_cir_nuevo: nombre_cir_nuevo,
            nombre_anest: nombre_anest,
            nombre_tons: nombre_tons,
            nombre_arsenalera: nombre_arsenalera,
            id_forma_mat_impl: id_forma_mat_impl,
            forma_mat_impl: forma_mat_impl,
            implantes_insumos: implantes_insumos,
            id_implantes: id_implantes,
            implantes: implantes,
            id_prot_prot_corona: id_prot_prot_corona,
            prot_prot_corona: prot_prot_corona,
            prot_pieza_imp: prot_pieza_imp,
            det_cir: det_cir,
            id_paciente: dame_id_paciente(),
            id_ficha_atencion: $('#id_fc').val(),
            tipo:'mantencion',
            _token: CSRF_TOKEN
        }

       console.log(data);

       $.ajax({
        type:'post',
        url:'{{ route("dental.generar_pdf_protocolo_impl") }}',
        data: data,
        success: function(data){
            console.log(data);
            if(data == 'error'){
                swal({
                    title:'Error',
                    text:'Primero debe generar la liquidación.',
                    icon:'error',
                    button:"Aceptar"
                });
                return false;
            }
            if(data.ruta){
                swal({
                    title: "Reporte generado",
                    text: "El reporte se ha generado correctamente",
                    icon: "success",
                    button: "Aceptar"
                }).then(() => {
                    // Abrir el PDF en una ventana emergente
                    var width = 800;
                    var height = 600;
                    var left = (screen.width - width) / 2;
                    var top = (screen.height - height) / 2;
                    window.open(data.ruta, 'Presupuesto dental', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);
                });
            }else{
                swal({
                    title: "Error",
                    text: "Ha ocurrido un error al generar el reporte",
                    icon: "error",
                    button: "Aceptar"
                });
            }
            // limpiar formulario
            $('#prot_anestesista_imp_man').val('');
            $('#prot_forma_mat_man').val(0);
            $('#prot_proc_man').val(0);
            // $('#det_cir_man').val('');
            // limpiar los select2
            $('#prot_implante_man').val(null).trigger('change');
            $('#prot_pieza_imp_man').val(null).trigger('change');
        },
        else: function(error){
            console.log(error.responseText);
        }
       });
    }else{
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
}

function eliminar_pieza_dental_post_impl(id){
    // preguntar si desea eliminar
    swal({
        title: "Eliminar Pieza",
        text: "¿Está seguro que desea eliminar la pieza?",
        icon: "warning",
        buttons: ["Cancelar", "Aceptar"],
        DangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            confirmar_eliminar_pieza_post_impl(id);
        }
    });
}

function confirmar_eliminar_pieza_post_impl(id){
    let url = "{{ ROUTE('profesional.eliminar_pieza_dental_post_impl') }}";
    let id_paciente = dame_id_paciente();

    $.ajax({
        type:'post',
        url: url,
        data:{
            id: id,
            id_paciente: id_paciente,
            id_ficha_atencion: $('#id_fc').val(),
            _token: CSRF_TOKEN
        },
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#contenedor_pieza_post_implantada').empty();
                $('#contenedor_pieza_post_implantada').append(resp.v);
            }
            if (resp.examenes && resp.examenes.length > 0) {
                let detalleHistoria = resp.examenes.map(implante => {
                let detalle = `La pieza ${implante.numero_pieza} presenta las siguientes observaciones:\n`;

                // Móvil
                if (implante.movil === "Sí") {
                    detalle += `Se observa movilidad en la pieza${implante.obs_movil ? `, descrita como: ${implante.obs_movil}` : ''}. `;
                } else {
                    detalle += `No se observa movilidad en la pieza. `;
                }

                // Posición
                if (implante.posicion === "Correcta") {
                    detalle += `La posición del implante es adecuada. `;
                } else {
                    detalle += `La posición del implante es incorrecta, presentando las siguientes desviaciones: ` +
                        `vestíbulo-palatino: ${implante.vp || 'N/A'}, ` +
                        `vestíbulo-lingual: ${implante.vl || 'N/A'}, ` +
                        `mesio-distal: ${implante.md || 'N/A'} y ` +
                        `cráneo-caudal: ${implante.cc || 'N/A'}. `;
                }

                // Exposición de espiras
                if (implante.exp_espiras === "Sí") {
                    detalle += `Se evidencia exposición de espiras${implante.obs_exp_espiras ? `, descrita como: ${implante.obs_exp_espiras}` : ''}. `;
                } else {
                    detalle += `No se observa exposición de espiras. `;
                }

                // Supuración
                if (implante.supuracion === "Sí") {
                    detalle += `Se detecta presencia de supuración${implante.obs_supuracion ? `, descrita como: ${implante.obs_supuracion}` : ''}. `;
                } else {
                    detalle += `No se observa supuración. `;
                }

                // Estado de la encía
                if (implante.estado_encia === "Anormal") {
                    detalle += `El estado de la encía es anormal, descrito como: ${implante.obs_estado_encia || 'Sin observación'}. `;
                } else {
                    detalle += `El estado de la encía es normal. `;
                }

                // Pérdida ósea marginal
                if (implante.perdida_osea_marginal) {
                    detalle += `Se reporta una pérdida ósea marginal de aproximadamente ${implante.perdida_osea_marginal}. `;
                }

                // Observaciones generales
                if (implante.observaciones) {
                    detalle += `Observaciones adicionales: ${implante.observaciones}. `;
                }

                return detalle;
            }).join("\n\n");

            $('#det_cir_man').val(detalleHistoria);

        } else {
            $('#det_cir_man').val('No hay detalles del control de implantes disponibles.');
        }
        },
        error: function(error){
            console.log(error);
        }
    });

}

function mostrar_nuevo_grupo_post_impl(counter){
    let url = "{{ ROUTE('profesional.mostrar_nuevo_grupo_post_impl') }}";
    $.ajax({
        url: url,
        type: 'post',
        data: {
            count: counter,
            _token: '{{ csrf_token() }}'
        },
        success: function(resp) {
            console.log(resp);
            $('#grupo_dental_post_impl').empty();
            $('#grupo_dental_post_impl').append(resp.v);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function eliminar_grupo_dental_post_impl(id){
    // preguntar si desea eliminar
    swal({
        title: "Eliminar Grupo",
        text: "¿Está seguro que desea eliminar el grupo?",
        icon: "warning",
        buttons: ["Cancelar", "Aceptar"],
        DangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            confirmar_eliminar_grupo_dental_post_impl(id);
        }
    });
}

function confirmar_eliminar_grupo_dental_post_impl(id){
    let url = "{{ ROUTE('profesional.eliminar_grupo_dental_post_impl') }}";
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
                swal({
                    title:'Exito',
                    text:'Se ha eliminado con éxito',
                    icon:'success',
                });
                $('#contenedor_grupos_dental_implantada').empty();
                $('#contenedor_grupos_dental_implantada').append(resp.v);
            }
        },
        error: function(error){
            console.log(error);
        }
    });

}

function mostrar_nuevo_pieza_pfu(){
    let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_pfu') }}";
    $.ajax({
        url: url,
        type: 'post',
        data: {
            seccion:'pfu',
            id_paciente: $('#id_paciente').val(),
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            _token: '{{ csrf_token() }}'
        },
        success: function(resp) {
            console.log(resp);
            $('#nueva_pieza_dental').empty();
            $('#nueva_pieza_dental').append(resp.v);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function eliminar_pieza_dental_pfu(id){
    // preguntar si desea eliminar
    swal({
        title: "Eliminar Pieza",
        text: "¿Está seguro que desea eliminar la pieza?",
        icon: "warning",
        buttons: ["Cancelar", "Aceptar"],
        DangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            confirmar_eliminar_pieza_dental_pfu(id);
        }
    });
}

function confirmar_eliminar_pieza_dental_pfu(id){
    let url = "{{ ROUTE('profesional.eliminar_pieza_dental_corona_protesis') }}";
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
                swal({
                    title:'Exito',
                    text:'Se ha eliminado con éxito',
                    icon:'success',
                });
                $('#contenedor_piezas_dentales_pfu').empty();
                $('#contenedor_piezas_dentales_pfu').append(resp.v);
            }
        },
        error: function(error){
            console.log(error);
        }
    });

}

function mostrar_nuevo_pieza_pfp(){
    let url = "{{ ROUTE('profesional.mostrar_nueva_pieza_pfu') }}";
    $.ajax({
        url: url,
        type: 'post',
        data: {
            seccion:'pfp',
            id_paciente: $('#id_paciente').val(),
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            _token: '{{ csrf_token() }}'
        },
        success: function(resp) {
            console.log(resp);
            $('#nueva_pieza_dental_pfp').empty();
            $('#nueva_pieza_dental_pfp').append(resp.v);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function eliminar_pieza_dental_pfp(id){
    // preguntar si desea eliminar
    swal({
        title: "Eliminar Pieza",
        text: "¿Está seguro que desea eliminar la pieza?",
        icon: "warning",
        buttons: ["Cancelar", "Aceptar"],
        DangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            confirmar_eliminar_pieza_dental_pfp(id);
        }
    });
}

function confirmar_eliminar_pieza_dental_pfp(id){
    let url = "{{ ROUTE('profesional.eliminar_pieza_dental_corona_protesis') }}";
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
                $('#contenedor_piezas_dentales_pfp').empty();
                $('#contenedor_piezas_dentales_pfp').append(resp.v);
            }
        },
        error: function(error){
            console.log(error);
        }
    });

}

function solicitar_protesis(){
    var numero_pieza = $('#n_pieza_protesis').val();
    var tipo_protesis = $('#protesis_imp_sup').val();
    var tipo_protesis_text = $('#protesis_imp_sup option:selected').text();
    if(tipo_protesis == 2){
        tipo_protesis_text = $('#obs_protesis_imp_sup').val();
    }
    var tipo_protesis_inf = $('#protesis_imp_inf').val();
    var tipo_protesis_inf_text = $('#protesis_imp_inf option:selected').text();
    if(tipo_protesis_inf == 2){
        tipo_protesis_inf_text = $('#obs_protesis_imp_inf').val();
    }
    var protesis_toma_imp = $('#protesis_toma_imp').val();
    var protesis_toma_imp_text = $('#protesis_toma_imp option:selected').text();
    if(protesis_toma_imp == 2){
        protesis_toma_imp_text = $('#obs_protesis_toma_imp_inf').val();
    }
    var prueba_ajuste = $('#prueba_ajuste_protesis').val();
    var prueba_ajuste_text = $('#prueba_ajuste_protesis option:selected').text();
    if(prueba_ajuste == 2){
        prueba_ajuste_text = $('#obs_prueba_ajuste_protesis').val();
    }

    var valido = 1;
    var mensaje = '';

    if(numero_pieza == ''){
        valido = 0;
        mensaje += '<li>Número de pieza</li>';
    }

    if(tipo_protesis == 0){
        valido = 0;
        mensaje += '<li>Tipo de prótesis superior</li>';
    }

    if(tipo_protesis == 2){
        if(tipo_protesis_text == ''){
            valido = 0;
            mensaje += '<li>Observación tipo de prótesis superior</li>';
        }
    }

    if(tipo_protesis_inf == 0){
        valido = 0;
        mensaje += '<li>Tipo de prótesis inferior</li>';
    }

    if(tipo_protesis_inf == 2){
        if(tipo_protesis_inf_text == ''){
            valido = 0;
            mensaje += '<li>Observación tipo de prótesis inferior</li>';
        }
    }

    if(protesis_toma_imp == 0){
        valido = 0;
        mensaje += '<li>Prótesis toma impresión</li>';
    }

    if(protesis_toma_imp == 2){
        if(protesis_toma_imp_text == ''){
            valido = 0;
            mensaje += '<li>Observación prótesis toma impresión</li>';
        }
    }

    if(prueba_ajuste == 0){
        valido = 0;
        mensaje += '<li>Prueba de ajuste</li>';
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

    var data = {
        numero_pieza: numero_pieza,
        tipo_protesis: tipo_protesis,
        tipo_protesis_text: tipo_protesis_text,
        tipo_protesis_inf: tipo_protesis_inf,
        tipo_protesis_inf_text: tipo_protesis_inf_text,
        protesis_toma_imp: protesis_toma_imp,
        protesis_toma_imp_text: protesis_toma_imp_text,
        prueba_ajuste: prueba_ajuste,
        prueba_ajuste_text: prueba_ajuste_text,
        id_paciente: dame_id_paciente(),
        _token: CSRF_TOKEN
    }

    return console.log(data);
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

        function cargar_a_presupuesto_impl(counter){
            let pieza = $('#numero_pieza_tto_imp'+counter).val();
            let tto = $('#diag_presupuesto_pieza'+counter).val();
            let valido = 1;
            let mensaje = '';

            console.log(pieza, tto);
            let url = "{{ ROUTE('dental.cargar_tratamiento_presupuesto_period') }}";
            let data = {
                pieza: pieza,
                tto: tto,
                id_ficha_atencion: $('#id_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                id_paciente: dame_id_paciente(),
                _token: "{{ csrf_token() }}"
            }
            console.log(data);
            $.ajax({
                type:'post',
                url: url,
                data: data,
                success: function(resp){
                    console.log(resp);
                    if(resp.status == 1){
                        swal({
                            icon:'success',
                            title:'Info',
                            text: resp.mensaje
                        });
                        let odontograma = resp.odontograma_paciente;
                        let html = '';
                        odontograma.forEach(function(odonto){
                            html += '<tr>';
                            html += '<td>'+odonto.fecha+'</td>';
                            html += '<td>'+odonto.tratamiento+'</td>';
                            html += '<td>'+odonto.caras+'</td>';
                            html += '<td>'+odonto.pieza+'</td>';
                            html += '<td>'+odonto.diagnostico+'</td>';
                            html += '<td>'+formatoMoneda(odonto.valor)+'</td>';
                            // html += '<td>';
                            // html += '<button type="button" class="btn btn-danger btn-sm" onclick="eliminar_odontograma('+odonto.id+')"><i class="feather icon-x"></i>Eliminar</button>';
                            // if(odonto.presupuesto == 0){
                            //     html += '<button type="button" class="btn btn-primary btn-sm" onclick="cargar_a_presupuesto('+odonto.id+')"><i class="fas fa-save"></i>Cargar a presupuesto</button>';
                            // }else{
                            //     html += '<button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto('+odonto.id+')"><i class="feather icon-x"></i>Sacar de presupuesto</button>';
                            // }

                            // html += '</td>';
                            // Checkbox para seleccionar el odontograma
                            html += '<td>';
                            html += '<div class="form-check">';
                            html += '<input class="form-check-input" type="checkbox" value="' + odonto.id + '" '
                            html += odonto.presupuesto == 1 ? 'checked ' : '';
                            html += 'onchange="togglePresupuesto(' + odonto.id + ', this.checked)">';
                            html += '<label class="form-check-label"></label>';
                            html += '</div>';
                            html += '</td>';
                            html += '<td>';
                            html += '<div class="form-check">';
                            html += '<input class="form-check-input checkbox-seleccion" type="checkbox" value="' + odonto.id + '" ';
                            html += 'id="seleccionCheck' + odonto.id + '" ';
                            html += 'onchange="toggleSeleccion(' + odonto.id + ', this.checked)">';
                            html += '<label class="form-check-label" for="seleccionCheck' + odonto.id + '"></label>';
                            html += '</div>';
                            html += '</td>';
                            html += '</tr>';
                        });
                        $('#contenedor_examenes_grupos_dentales').empty();
                        $('#contenedor_examenes_grupos_dentales').append(resp.vista_presupuestos);
                        $('#table_odontograma tbody').html(html);
                        $('#contenedor_piezas_dentales_presupuesto').empty();
                        $('#table_trabajos_presupuesto tbody').empty();
                        odontograma.forEach(function(odonto){
                            if(odonto.presupuesto == 1){
                                $('#contenedor_piezas_dentales_presupuesto').append(`
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-informacion">
                                        <div class="card-body pb-0">
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Pieza</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Total prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                </div>
                                                <div class="form-group col-md-2 d-flex justify-content-center">
                                                    <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="fas fa-trash"></i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        `);
                                    $('#table_trabajos_presupuesto tbody').append(`
                                        <tr>
                                            <td>${odonto.fecha}</td>
                                            <td>${odonto.diagnostico} </td>
                                            <td>${odonto.caras} </td>
                                            <td>${odonto.pieza} </td>
                                            <td>${odonto.tratamiento} </td>
                                            <td>${formatoMoneda(odonto.valor)} </td>
                                            <td> </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Atender</button>
                                            </td>
                                        </tr>
                                    `);
                                }
                            });
                            let valores_boca_general = resp.valores[0];
                            let valores_odontograma = resp.valores[1];
                            let valores_insumos = resp.valores[2];
                            let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                            $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                            $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                            $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                            $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                            $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                            $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                            $('#subtotal_clinico').val(formatoMoneda(total_general));
                            $('#total_clinico').val(formatoMoneda(total_general));
                            // guardamos el total en un input hidden
                            $('#total_presupuesto_dental').val(total_general);

                            $('#monto_total').html(formatoMoneda(valores_insumos)+' + '+formatoMoneda(valores_odontograma + valores_boca_general)+' = '+formatoMoneda(total_general));

                            let table = $('#presup_estado_pago').DataTable();
                            table.clear().draw();

                            // Recorrer el odontograma y agregar nuevas filas
                            // Recorrer el odontograma y agregar nuevas filas
                            odontograma.forEach(function(odonto) {

                                if (odonto.presupuesto == 1) {
                                    if(odonto.estado_pago == 'ok'){
                                        var clase = 'bg-success';
                                    }else if(odonto.estado_pago == 'incompleto'){
                                        var clase = 'bg-warning';
                                    }else{
                                        var clase = 'bg-danger';
                                    }

                                    if(odonto.estado == 0){
                                        var estado = 'PENDIENTE';
                                    }else{
                                        var estado = 'TERMINADO';
                                    }
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table.row.add([
                                        odonto.descripcion,
                                        odonto.pieza,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        0,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        '<div class="circle '+clase+'"></div>',
                                        estado, // Columna vacía

                                    ]).draw(false).node(); // Obtener el nodo de la fila

                                    // Agregar clases a la fila
                                    $(rowNode).addClass('text-center align-middle status-circle');
                                }
                            });

                        $('#table_pagos_reasignar_odontograma tbody').empty();
                        odontograma.forEach(function(odonto) {
                            if (odonto.presupuesto == 1) {
                                let fila = `<tr>
                                    <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                                    <td>${odonto.pieza}</td>
                                    <td>${formatoMoneda(odonto.valor)}</td>
                                    <td><button type="button" class="btn btn-danger" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"> </i> </button></td>
                                </tr>`;
                                $('#table_pagos_reasignar_odontograma tbody').append(fila);
                            }
                        });
                        let count = $('#random_preimpl').val();
                        let count_post_impl = $('#random_postimpl').val();
                        $('#numero_pieza_tto_impl'+count).empty();
                        $('#numero_pieza_post_impl'+count).empty();
                        odontograma.forEach(o => {
                            if(o.presupuesto == 1){
                                $('#numero_pieza_tto_impl'+count).append(`
                                    <option value="${o.pieza}">${o.pieza} </option>
                                `);
                                $('#numero_pieza_post_impl'+count).append(`
                                    <option value="${o.pieza}">${o.pieza} </option>
                                `);
                            }

                        });
                        // se cargan las piezas seleccionadas en tabla con id table_piezas_presupuesto_odonto
                        let table_odon_gral = $('#table_piezas_presupuesto_odonto').DataTable();
                        table_odon_gral.clear().draw();

                        odontograma.forEach(function(pieza){
                            // Agregar una nueva fila a la tabla
                            let rowNode = table_odon_gral.row.add([
                                pieza.pieza,
                                pieza.descripcion,
                                formatoMoneda(formatoMoneda(pieza.valor)),
                                '<button type="button" class="btn btn-danger-light-c btn-icon" onclick="eliminar_odontograma('+pieza.id+')"><i class="feather icon-x"> </i> </button>'

                            ]).draw(false).node(); // Obtener el nodo de la fila
                        });
                    }else{
                        swal({
                            icon:'error',
                            title:'info',
                            text: resp.mensaje
                        });
                    }


                    $('#tratamiento_presupuesto tbody').empty();
                    let presupuesto = resp.presupuesto;
                    console.log(presupuesto);
                    $('#tratamiento_presupuesto tbody').append(`
                    <tr>
                        <td class="text-center align-middle">${presupuesto.fecha}</td>
                        <td class="text-center align-middle">${presupuesto.id}</td>
                        <td class="text-center align-middle">${presupuesto.aprobado}</td>
                        <td class="text-center align-middle">Sector I</td>
                        <td class="text-center align-middle">${presupuesto.boca}</td>

                        <td class="text-center align-middle">
                            <div class="form-group col-md-4">
                                <div class="switch switch-success d-inline m-r-2">
                                    <input type="checkbox" id="info_finalizado" checked="">
                                    <label for="info_finalizado" class="cr"></label>
                                </div>
                                <label>Realizado?</label>
                            </div>
                        </td>
                        <td class="text-center align-middle">
                            ${presupuesto.fecha}
                        </td>
                        <td class="text-center align-middle">
                            <button type="button" class="btn btn-info btn-sm" onclick="presupuesto()" ;="">
                                <i class="fa fa-plus"></i> Trabajar en pieza
                            </button>
                        </td>
                    </tr>
                    `);

                },
                error: function(error){
                    console.log(error.responseText);
                }
            });
        }

        function recargar_piezas_preimplante(){

        }

function guardar_ficha(){
    let motivo = $('#motivo').val();
    let antecedentes = $('#antecedentes').val();
    let examen_fisico = $('#examen_fisico').val();

    let valido = 1;
    let mensaje = '';

    if(motivo == ''){
        valido = 0;
        mensaje += '<li>Motivo</li>';
    }

    if(antecedentes == ''){
        valido = 0;
        mensaje += '<li>Antecedentes</li>';
    }

    if(examen_fisico == ''){
        valido = 0;
        mensaje += '<li>Examen fisico</li>';
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
        motivo: motivo,
        antecedentes: antecedentes,
        examen_fisico: examen_fisico,
        descripcion_hipotesis: '',
        hipotesis_diagnostico: '',
        id_profesional_fc: $('#id_profesional').val(),
        id_paciente_fc: $('#id_paciente').val(),
        hora_medica: $('#hora_medica').val(),
        cerrarsession: 2,
        _token: CSRF_TOKEN
    }

    $.ajax({
        type:'post',
        url:'{{ ROUTE("dental.registrar_ficha_atencion_dental") }}',
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.estado == 'ok'){
                swal({
                    title:'exito',
                    text: resp.mensaje,
                    icon:'success'
                });
            }
        },
        error: function(error){
            console.log(error);
        }
    })

}


function ocultar_pieza_impl(counter){
    console.log(counter);
    $('#contenedor_pieza_tto_impl'+counter).empty();
}



</script>




