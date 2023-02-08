<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-3 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
					<li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="fcc-tab" data-toggle="tab" href="#fcc" role="tab" aria-controls="fcc" aria-selected="false">Ficha de atención especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="cisto-tab" data-toggle="tab" href="#cisto" role="tab" aria-controls="cisto" aria-selected="false">Cistoscopía</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="pros-tab" data-toggle="tab" href="#pros" role="tab" aria-controls="pros" aria-selected="false">Prostata</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="uroflujo-tab" data-toggle="tab" href="#uroflujo" role="tab" aria-controls="uroflujo" aria-selected="false">Uroflujometría</a>
                    </li>
                </ul>
            </div>
			<div class="col-sm-12 col-md-12">
                <form action="{{ route('fichaAtencion.registrar_ficha_orl') }}" method="POST">
                    <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                    <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                    <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                    <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                    <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                    <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">

                    @csrf
                    <div class="tab-content" id="uro-contenido">
						<!--ATENCIÓN ESPECIALIDAD-->
						<div class="tab-pane fade  show active" id="atencion_uro" role="tabpanel" aria-labelledby="atencion_uro-tab">
                            <div class="row bg-white shadow-none rounded mx-1">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Ficha de atención Urológica</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <!--Formulario / Menor de edad-->
                                        @include('atencion_medica.generales.seccion_menor')
                                        <!--Cierre: Formulario / Menor de edad-->
                                        <!--Motivo consulta-->
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="motivo">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                                                        Motivo de la consulta
                                                    </button>
                                                </div>
                                                <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label-activo-sm">Motivo de Consulta</label>
                                                                <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_consulta" name="descripcion_consulta_orl" id="descripcion_consulta_orl" onchange="cargarIgual('descripcion_consulta_orl');">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label-activo-sm">Antecedentes Especialidad</label>
                                                                <input type="text" class="form-control form-control-sm" name="antec_especialidad_orl" id="antec_especialidad_orl">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Formulario / Signos vitales y otros-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="signosvit-otros">
                                                    <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#signosvit-otros-c" aria-expanded="false" aria-controls="signosvit-otros-c">
                                                        Signos vitales y otros
                                                    </button>
                                                </div>
                                                <div id="signosvit-otros-c" class="collapse" aria-labelledby="signosvit-otros" data-parent="#signosvit-otros">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-1">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->temperatura !=
                                                                null)
                                                                <label class="floating-label-activo-sm">Tº</label>
                                                                <input type="text" class="form-control form-control-sm" name="temperatura" id="temperatura" value="{{ $fichaAtencion->temperatura }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">Tº</label>
                                                                <input type="text" class="form-control form-control-sm" name="temperatura" id="temperatura" value="{!! old('temperatura') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-1">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->pulso != null)
                                                                <label class="floating-label-activo-sm">Pulso</label>
                                                                <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value="{{ $fichaAtencion->pulso }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">Pulso</label>
                                                                <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value="{!! old('pulso') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->frecuencia_reposo
                                                                != null)
                                                                <label class="floating-label-activo-sm">Frec.
                                                                    Reposo</label>
                                                                <input type="text" class="form-control form-control-sm" name="frecuencia_reposo" id="frecuencia_reposo" value="{{ $fichaAtencion->frecuencia_reposo }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">Frec.
                                                                    Reposo</label>
                                                                <input type="text" class="form-control form-control-sm" name="frecuencia_reposo" id="frecuencia_reposo" value="{!! old('frecuencia_reposo') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->peso != null)
                                                                <label class="floating-label-activo-sm">Peso</label>
                                                                <input type="text" class="form-control form-control-sm" name="peso" id="peso" value="{{ $fichaAtencion->peso }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">Peso</label>
                                                                <input type="text" class="form-control form-control-sm" name="peso" id="peso" value="{!! old('peso') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->talla != null)
                                                                <label class="floating-label-activo-sm">Talla</label>
                                                                <input type="text" class="form-control form-control-sm" name="talla" id="talla" value="{{ $fichaAtencion->talla }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">Talla</label>
                                                                <input type="text" class="form-control form-control-sm" name="talla" id="talla" value="{!! old('talla') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->imc != null)
                                                                <label class="floating-label-activo-sm">IMC</label>
                                                                <input type="text" class="form-control form-control-sm" name="imc" id="imc" value="{{ $fichaAtencion->imc }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">IMC</label>
                                                                <input type="text" class="form-control form-control-sm" name="imc" id="imc" value="{!! old('imc') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->estado_nutricional
                                                                != null)
                                                                <label class="floating-label-activo-sm">Estado
                                                                    Nutricional</label>
                                                                <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{{ $fichaAtencion->estado_nutricional }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">Estado
                                                                    Nutricional</label>
                                                                <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{!! old('estado_nutricional') !!}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group mb-1">
                                                                <label><strong>Presión Arterial</strong></label>
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" id="p_arterial" value="{!! old('p_arterial') !!}">
                                                                    <label for="p_arterial" class="cr"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row" id="form_1" style="display:none">
                                                            <div class="form-group col-md-3">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->presion_bi !=
                                                                null)
                                                                <label class="floating-label-activo-sm">BI</label>
                                                                <input type="text" class="form-control form-control-sm" name="presion_bi" id="presion_bi" value="{{ $fichaAtencion->presion_bi }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">BI</label>
                                                                <input type="text" class="form-control form-control-sm" name="presion_bi" id="presion_bi" value="{!! old('presion_bi') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->presion_bd !=
                                                                null)
                                                                <label class="floating-label-activo-sm">BD</label>
                                                                <input type="text" class="form-control form-control-sm" name="presion_bd" id="presion_bd" value="{{ $fichaAtencion->presion_bd }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">BD</label>
                                                                <input type="text" class="form-control form-control-sm" name="presion_bd" id="presion_bd" value="{!! old('presion_bd') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->presion_de_pie !=
                                                                null)
                                                                <label class="floating-label-activo-sm">De pié</label>
                                                                <input type="text" class="form-control form-control-sm" name="presion_de_pie" id="presion_de_pie" value="{{ $fichaAtencion->presion_de_pie }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">De pié</label>
                                                                <input type="text" class="form-control form-control-sm" name="presion_de_pie" id="presion_de_pie" value="{!! old('presion_de_pie') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->presion_sentado !=
                                                                null)
                                                                <label class="floating-label-activo-sm">Sentado</label>
                                                                <input type="text" class="form-control form-control-sm" name="presion_sentado" id="presion_sentado" value="{{ $fichaAtencion->presion_sentado }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">Sentado</label>
                                                                <input type="text" class="form-control form-control-sm" name="presion_sentado" id="presion_sentado" value="{!! old('presion_sentado') !!}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group mb-1">
                                                                <label><strong>Comunicación y traslado</strong></label>
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" id="com_trasl" value="{!! old('com_trasl') !!}">
                                                                    <label for="com_trasl" class="cr"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row" id="form_2" style="display:none">
                                                            <div class="form-group col-md-4">
                                                                @if (isset($fichaAtencion) &&
                                                                $fichaAtencion->ct_estado_conciencia != null)
                                                                <label class="floating-label-activo-sm">Estado de
                                                                    conciencia</label>
                                                                <input type="text" class="form-control form-control-sm" name="ct_estado_conciencia" id="ct_estado_conciencia" value="{{ $fichaAtencion->ct_estado_conciencia }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">Estado de
                                                                    conciencia</label>
                                                                <input type="text" class="form-control form-control-sm" name="ct_estado_conciencia" id="ct_estado_conciencia" value="{!! old('ct_estado_conciencia') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->ct_lenguaje !=
                                                                null)
                                                                <label class="floating-label-activo-sm">Lenguaje</label>
                                                                <input type="text" class="form-control form-control-sm" name="ct_lenguaje" id="ct_lenguaje" value="{{ $fichaAtencion->ct_lenguaje }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">Lenguaje</label>
                                                                <input type="text" class="form-control form-control-sm" name="ct_lenguaje" id="ct_lenguaje" value="{!! old('ct_lenguaje') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->ct_traslado !=
                                                                null)
                                                                <label class="floating-label-activo-sm">Traslado</label>
                                                                <input type="text" class="form-control form-control-sm" name="ct_traslado" id="ct_traslado" value="{{ $fichaAtencion->ct_traslado }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">Traslado</label>
                                                                <input type="text" class="form-control form-control-sm" name="ct_traslado" id="ct_traslado" value="{!! old('ct_traslado') !!}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Cierre: Formulario / Signos vitales y otros-->

                                        <!--EXAMEN ESPECIALIDAD - PARAMETROS DE CONTROL-->
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header" id="exam_esp">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="true" aria-controls="exam_esp_c">
                                                        Examen especialidad
                                                    <span class="ripple ripple-animate" style="height: 1038.22px; width: 1038.22px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(55, 58, 60); opacity: 0.4; top: -504.329px; left: -219.501px;"></span></button>
                                                </div>
                                                <div id="exam_esp_c" class="collapse show" aria-labelledby="exam_esp" data-parent="#exam_esp" style="">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Carga Ficha Tipo</label>
                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_orl('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                        <option value="">Seleccione</option>
                                                                        <option value="1" data-descripcion="Oido normal">Oido normal</option>
                                                                        <option value="2" data-descripcion="Anomalia OD">Anomalia OD</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span id="descripcion_ficha_tipo_especialidad"></span>
                                                            </div>
                                                        </div>
                                                        <div id="form-otorrino">
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h6>Ángulo costovertebral</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12 fill">
                                                                            <label class="floating-label-activo-sm">Examen Lado derecho</label>
                                                                            <select name="costo_vert_ld" id="costo_vert_ld" data-titulo="Costo_vert_ld" data-seccion="Ángulo costovertebral" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('costo_vert_ld','div_detalle_costo_vert_ld','obs_costo_vert_ld',2)">
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_costo_vert_ld" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen Lado derecho</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Costo_vert_ld" data-seccion="Ángulo costovertebral" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_costo_vert_ld" id="obs_costo_vert_ld"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12 fill">
                                                                            <label class="floating-label-activo-sm">Examen Lado izquierdo</label>
                                                                            <select name="costo_vert_li" id="costo_vert_li" data-titulo="Costo_vert_li" data-seccion="Ángulo costovertebral" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('costo_vert_li','div_costo_vert_li','obs_costo_vert_li',2)">
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_costo_vert_li" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen Lado izquierdo</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Costo_vert_li" data-seccion="Ángulo costovertebral" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_costo_vert_li" id="obs_costo_vert_li"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Observaciones Examen Ángulo</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" data-seccion="Oídos Audición" data-tipo="general" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oidos" id="obs_ex_oidos"></textarea>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h6>Abdomen</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Examen Abdominal</label>
                                                                            <select name="examen_abd" data-titulo="Examen Abdominal" id="examen_abd" data-seccion="Examen-Abdominal" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_abd','div_obs_examen_abd','obs_examen_abd',2);">
                                                                                <option  selected value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                                <option value="3">No Realizada</option>
                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="row">

                                                                        <div class="form-group col-md-12" id="div_obs_examen_abd" style="display:none;">
                                                                            <label class="floating-label-activo-sm"> Observaciones Examen Abdominal</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Abdominal" data-seccion="Examen-Abdominal" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_examen_abd" id="obs_examen_abd"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
															<!--tacto-->
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h6>Tacto Rectal</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Tacto</label>
                                                                            <select name="tacto_rectal" id="tacto_rectal" data-titulo="Tacto Rectal" data-seccion="Tacto_Rectal" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tacto_rectal','div_detalle_tacto_rectal','detalle_tacto_rectal',2)">
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                                <option value="3">No Realizado</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12" id="div_detalle_tacto_rectal" style="display:none">
                                                                            <label class="floating-label-activo-sm">Observaciones Tacto</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Tacto Rectal" data-seccion="Tacto_Rectal" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_tacto_rectal" id="detalle_tacto_rectal"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h6>Ingle</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Ingle</label>
                                                                            <select name="ingle" id="ingle" data-titulo="Ingle" data-seccion="Examen_ingle" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ingle','div_detalle_ingle','detalle_ingle',2)">
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                                <option value="3">No Examinada</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12" id="div_detalle_ingle" style="display:none">
                                                                            <label class="floating-label-activo-sm">Observaciones Ingle</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Ingle" data-seccion="Examen_ingle" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_ingle" id="detalle_ingle"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h6> Genitales Masculinos</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="col-md-4">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12 fill">
                                                                            <label class="floating-label-activo-sm">Uretra</label>
                                                                            <select name="uretra_masc" id="uretra_masc" class="form-control form-control-sm" data-titulo="Uretra_m" data-seccion="Genitales_Masculinos" onchange="evaluar_para_carga_detalle('uretra_masc','div_detalle_uretra_masc','obs_detalle_uretra_masc',2)">
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">anormal</option>
                                                                                <option value="3">No Examinada</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_uretra_masc" style="display:none">
                                                                            <label class="floating-label-activo-sm">Observaciones Uretra</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Uretra_m" data-seccion="Genitales_Masculinos" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_detalle_uretra_masc" id="obs_detalle_uretra_masc"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12 fill">
                                                                            <label class="floating-label-activo-sm">Pene</label>
                                                                            <select name="examen_pene" id="examen_pene" data-titulo="Pene" data-seccion="Genitales_Masculinos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_pene','div_detalle_examen_pene','ex_pene_anormal',2);">
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                                <option value="3">No Examinado</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_examen_pene" style="display:none">
                                                                            <label class="floating-label-activo-sm">Observaciónes Pene</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Pene" data-seccion="Genitales_Masculinos" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="ex_pene_anormal" id="ex_pene_anormal"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12 fill">
                                                                            <label class="floating-label-activo-sm">Testículos</label>
                                                                            <select name="examen_test" id="examen_test" data-titulo="Testículos" data-seccion="Genitales_Masculinos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_test','div_detalle_examen_test','ex_test_anormal',2);">
                                                                                <option value="1">Normales</option>
                                                                                <option value="2">Anormales</option>
                                                                                <option value="3">No Examinados</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_examen_test" style="display:none">
                                                                            <label class="floating-label-activo-sm">Observaciónes Testículos</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Testículos" data-seccion="Genitales_Masculinos" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="ex_test_anormal" id="ex_test_anormal"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Observaciones Examen Genital masculino</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen genital" data-seccion="Genitales_Masculinos" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_genital_masc" id="obs_ex_genital_masc"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h6>Genitales Femeninos</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="col-md-4">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12 fill">
                                                                            <label class="floating-label-activo-sm">Vulva y Glandulas_anexas</label>
                                                                            <select name="vulva" id="vulva" class="form-control form-control-sm" data-titulo="Vulva" data-seccion="Genitales Femeninos" onchange="evaluar_para_carga_detalle('vulva','div_vulva','det_vulva',2)">
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">anormal</option>
                                                                                <option value="3">No Examinada</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_vulva" style="display:none">
                                                                            <label class="floating-label-activo-sm">Observaciones Vulva y Glandulas_anexas</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Vulva" data-seccion="Genitales Femeninos" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_det_vulva" id="obs_det_vulva"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12 fill">
                                                                            <label class="floating-label-activo-sm">Vagina</label>
                                                                            <select name="vagina" id="vagina" class="form-control form-control-sm" data-titulo="Vagina" data-seccion="Genitales Femeninos" onchange="evaluar_para_carga_detalle('vagina','div_vagina','det_vagina',2)">
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">anormal</option>
                                                                                <option value="3">No Examinada</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_vagina" style="display:none">
                                                                            <label class="floating-label-activo-sm">Observaciones Vagina</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Vagina" data-seccion="Genitales Femeninos" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_det_vagina" id="obs_det_vagina"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12 fill">
                                                                            <label class="floating-label-activo-sm">Uretra</label>
                                                                            <select name="uretra" id="uretra" class="form-control form-control-sm" data-titulo="Uretra_f" data-seccion="Genitales Femeninos" onchange="evaluar_para_carga_detalle('uretra','div_detalle_uretra','obs_detalle_uretra',2)">
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">anormal</option>
                                                                                <option value="3">No Examinada</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_uretra" style="display:none">
                                                                            <label class="floating-label-activo-sm">Observaciones Uretra</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Uretra_f" data-seccion="Genitales Femeninos" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_detalle_uretra" id="obs_detalle_uretra"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Observaicones Examen Genitales Femeninos</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaicones Examen Genitales Femeninos" data-seccion="Genitales Femeninos" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_examen_genitales_fem" id="obs_examen_genitales_fem"></textarea>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-9" style="margin-bottom: 0;">
                                                                    <label class="floating-label-activo-sm">Resumen Examen Especialidad</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Resumen Examen Especialidad" data-seccion="Resumen Examen Especialidad" data-tipo="general" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="bs_ex_orl" id="obs_ex_orl"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-3 align-middle" style="margin:auto">
                                                                    <button type="button" class="btn btn-outline-primary has-ripple" onclick="abrir_modal_guardar_tipo();"><i class="me-2" data-feather="thumbs-up"></i>Guardar Nueva Ficha Tipo<span class="ripple ripple-animate" style="height: 99.2656px; width: 99.2656px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -32.5625px; left: 8.375px;"></span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--ENFERMO CRÓNICO O GES-->
                                        <div class="col-sm-12">
                                            <div class="row">
                                                {{-- CRONICO --}}
                                                <div class="col-md-4 mx-auto">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" onchange="es_cronico();" id="enf_cronico" name="enf_cronico" data-toggle="modal" data-target="#form_enfermo_cronico" value="{!! old('enf_cronico') !!}">
                                                                    <label for="enf_cronico" class="cr"></label>
                                                                </div>
                                                                <label>¿Es enfermo crónico?</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row " hidden>
                                                        <div class="col-sm-12">
                                                            <div class="alert alert-warning mx-auto" role="alert">
                                                                <table class="table table-borderless mt-0 mb-0">
                                                                    <tbody>
                                                                        <tr id="tr_obesidad">
                                                                            <td class="align-middle pb-1 pt-1">Obesidad</td>
                                                                            <td class="align-middle pb-1 pt-1">
                                                                                <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                                                    <i class="feather icon-x"></i>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                        <tr id="tr_diabetes">
                                                                            <td class="align-middle pb-1 pt-1">Diabetes</td>
                                                                            <td class="align-middle pb-1 pt-1">
                                                                                <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                                                    <i class="feather icon-x"></i>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                        <tr id="tr_hipertesion">
                                                                            <td class="align-middle pb-1 pt-1">Hipertensión</td>
                                                                            <td class="align-middle pb-1 pt-1">
                                                                                <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                                                    <i class="feather icon-x"></i>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- GES --}}
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" id="modal_ges" name="modal_ges" value="{!! old('modal_ges') !!}">
                                                                    <label for="modal_ges" class="cr"></label>
                                                                </div>
                                                                <label>Ges</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" hidden>
                                                        <div class="alert alert-warning mx-auto my-0" role="alert">
                                                            <table class="table table-borderless mt-0 mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="align-middle pb-1 pt-1">Paciente GES<br>PS.02
                                                                        </td>
                                                                        <td class="align-middle pb-1 pt-1">
                                                                            <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                                                <i class="feather icon-x"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <div class="switch switch-success d-inline m-r-10">
                                                                <input type="checkbox" id="confidencial" name="confidencial" value="{!! old('confidencial') !!}" />
                                                                <label for="confidencial" class="cr"></label>
                                                            </div>
                                                            <label>Confidencial</label>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="confidencial_descripcion" style="display: none">
                                                        <div class="col-sm-12">
                                                            <div class="alert alert-warning mx-auto" role="alert">
                                                                <p class="text-dark f-14 pb-1 pt-1 mt-0 mb-0">Este registro
                                                                    de atención médica es confidencial
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Diagnóstico-->
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header" id="diagnostico">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                                                        Diagnóstico
                                                    </button>
                                                </div>
                                                <div id="diagnostico_c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                                                <input type="text" class="form-control form-control-sm"  data-input_igual="descripcion_hipotesis,lic_descripcion_hipotesis" name="hip-diag_spec" id="hip-diag_spec" onchange="cargarIgual('hip-diag_spec')" >
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Indicaciones</label>
                                                                <input type="text" class="form-control form-control-sm" name="ind_orl" id="ind_orl">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                                <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_cie,lic_descripcion_cie" name="descripcion_cie_esp" id="descripcion_cie_esp" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('descripcion_cie_esp')">
                                                                <input type="hidden" class="form-control form-control-sm" data-input_igual="id_descripcion_cie,lic_descripcion_cie" name="id_descripcion_cie_esp" id="id_descripcion_cie_esp" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('id_descripcion_cie_esp')">
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
						<!--CIERRE: ATENCIÓN ESPECIALIDAD-->
						<!--ATENCIÓN ESPECIALIDAD GENERAL-->
						@include('atencion_medica.secciones_especialidad.seccion_ficha_general')
                        <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
						<!-- CISTOSCOPÍA-->
						<div class="tab-pane fade" id="cisto" role="tabpanel" aria-labelledby="cisto-tab">
							<div class="row bg-white shadow-none rounded mx-1">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-12 mt-3 mb-0">
											<h6 class="f-16 text-c-blue">Citoscopía</h6>
											<hr>
										</div>
									</div>
									<div class="row">
										<!--INFORME CITOSCOPIA-->
										<div class="col-sm-12 col-md-12">
											<div class="card">
												<div class="card-header" id="infor-citoscopia">
													<button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#infor-citoscopia-c" aria-expanded="false" aria-controls="infor-citoscopia-c">
													Informe
													</button>
												</div>
												<div id="infor-citoscopia-c" class="collapse show" aria-labelledby="infor-citoscopia" data-parent="#infor-citoscopia">
													<div class="card-body-aten shadow-none">

                                                        <div class="form-row">
                                                            <div class="col-md-3">
                                                                <label class="col-form-label font-weight-bolder">Uretra</label>
                                                            </div>
                                                            <div class="form-group col-md-9">
                                                                <label class="floating-label">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="uretra" id="uretra"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-3">
                                                                <label class="col-form-label font-weight-bolder">Vejiga</label>
                                                            </div>
                                                            <div class="form-group col-md-9">
                                                                <label class="floating-label">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="vejiga" id="vejiga"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-3">
                                                                <label class="col-form-label font-weight-bolder">Biópsias</label>
                                                            </div>
                                                            <div class="form-group col-md-9">
                                                                <label class="floating-label">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="biopsias" id="biopsias"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-3">
                                                                <label class="col-form-label font-weight-bolder">Tratamientos</label>
                                                            </div>
                                                            <div class="form-group col-md-9">
                                                                <label class="floating-label">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="tratamientos" id="tratamientos"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-3">
                                                                <label class="col-form-label font-weight-bolder">Comentarios</label>
                                                            </div>
                                                            <div class="form-group col-md-9">
                                                                <label class="floating-label">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="comentrarios" id="comentrarios"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" onchange="biopsia_cisto();" id="biopsia_cisto" name="biopsia_cisto" value="">
                                                                    <label for="biopsia_cisto" class="cr"></label>
                                                                </div>
                                                                <label>biopsia</label>
                                                            </div>

                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-12">
                                                                <label class="floating-label">IMAGENES</label>
                                                                <iframe style="width: 100%">IMAGENES</iframe>
                                                            </div>
                                                        </div>
													</div>
												</div>
											</div>
										</div>
										<!--DIAGNÓSTICO-->
										<div class="col-sm-12 col-md-12">
											<div class="card">
												<div class="card-header" id="diagn-citoscopia">
													<button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagn-citoscopia-c" aria-expanded="false" aria-controls="diagn-citoscopia-c">
													Diagnóstico
													</button>
												</div>
												<div id="diagn-citoscopia-c" class="collapse show" aria-labelledby="diagn-citoscopia" data-parent="#diagn-citoscopia">
													<div class="card-body-aten shadow-none">
														<form>
															<div class="form-row">
																<div class="form-group col-md-6">
																	<label class="floating-label">Diagnóstico endoscópico</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="diag_endo" id="hip_diag"></textarea>
																</div>
																<div class="form-group col-md-6">
																	<label class="floating-label">Observaciones</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs" id="obs"></textarea>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <!--Modals de especialidad -->
                        @include("atencion_medica.formularios.modal_atencion_especialidad.cirugia.modal_biopsia_cirugia")
						<!--CIERRE: CISTOSCOPÍA-->
						<!--PRÓSTATA-->
						<div class="tab-pane fade" id="pros" role="tabpanel" aria-labelledby="pros-tab">
							<div class="row bg-white shadow-none rounded mx-1">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-12 mt-3 mb-0">
											<h6 class="f-16 text-c-blue">Prostata</h6>
											<hr>
										</div>
									</div>
									<div class="row">
										<!--INFORME PROSTATA-->
										<div class="col-sm-12 col-md-12">
											<div class="card">
												<div class="card-header" id="infor-prostata">
													<button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#infor-prostata-c" aria-expanded="false" aria-controls="infor-prostata-c">
													Informe
													</button>
												</div>
												<div id="infor-prostata-c" class="collapse show" aria-labelledby="infor-prostata" data-parent="#infor-prostata">
													<div class="card-body-aten shadow-none">
														<form>
															<div class="form-row">
																<div class="col-md-3">
																	<label class="col-form-label font-weight-bolder">Tacto</label>
																</div>
																<div class="form-group col-md-9">
																	<label class="floating-label">Descripción</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="tacto" id="tacto"></textarea>
																</div>
															</div>
															<div class="form-row">
																<div class="col-md-3">
																	<label class="col-form-label font-weight-bolder">Antígenos</label>
																</div>
																<div class="form-group col-md-9">
																	<label class="floating-label">Descripción</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="antigenos" id="antigenos"></textarea>
																</div>
															</div>
															<div class="form-row">
																<div class="col-md-3">
																	<label class="col-form-label font-weight-bolder">Biópsias</label>
																</div>
																<div class="form-group col-md-9">
																	<label class="floating-label">Descripción</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="biopsias" id="biopsias"></textarea>
																</div>
															</div>
															<div class="form-row">
																<div class="col-md-3">
																	<label class="col-form-label font-weight-bolder">Comentarios</label>
																</div>
																<div class="form-group col-md-9">
																	<label class="floating-label">Descripción</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="comentrarios" id="comentrarios"></textarea>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!--DIAGNÓSTICO-->
										<div class="col-sm-12 col-md-12">
											<div class="card">
												<div class="card-header" id="diagn-prostata">
													<button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagn-prostata-c" aria-expanded="false" aria-controls="diagn-prostata-c">
													Diagnóstico
													</button>
												</div>
												<div id="diagn-prostata-c" class="collapse show" aria-labelledby="diagn-prostata" data-parent="#diagn-prostata">
													<div class="card-body-aten shadow-none">
														<form>
															<div class="form-row">
																<div class="form-group col-md-6">
																	<label class="floating-label">Diagnóstico endoscópico</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="diag_endo" id="diag_endo"></textarea>
																</div>
																<div class="form-group col-md-6">
																	<label class="floating-label">Observaciones</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs" id="obs"></textarea>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--CIERRE:PRÓSTATA-->
						<!--UROFLUJO-->
						<div class="tab-pane fade" id="uroflujo" role="tabpanel" aria-labelledby="uroflujo-tab">
							<div class="row bg-white shadow-none rounded mx-1">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-12 mt-3 mb-0">
											<h6 class="f-16 text-c-blue">Uroflujometría</h6>
											<hr>
										</div>
									</div>
									<div class="row">
										<!--INFORME Uroflujometría-->
										<div class="col-sm-6 col-md-6">
											<div class="card">
												<div class="card-header" id="info-uroflujo">
													<button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#info-uroflujo-c" aria-expanded="false" aria-controls="info-uroflujo-c">
													Informe
													</button>
												</div>
												<div id="info-uroflujo-c" class="collapse show" aria-labelledby="info-uroflujo" data-parent="#info-uroflujo">
													<div class="card-body-aten shadow-none">
														<form>
															<div class="form-row">
																<div class="col-md-3">
																	<label class="col-form-label font-weight-bolder">Volumen de Vaciado</label>
																</div>
																<div class="form-group col-md-3">
																	<label class="floating-label">Descripción</label>
																	<input type="text" class="form-control form-control-sm" name="vol_vac" id="vol_vac">
																</div>
															</div>
															<div class="form-row">
																<div class="col-md-3">
																	<label class="col-form-label font-weight-bolder"> Qmax -Flujo</label>
																</div>
																<div class="form-group col-md-3">
																	<label class="floating-label">Descripción</label>
																	<input type="text" class="form-control form-control-sm" name="q_flujo" id="q_flujo">
																</div>
															</div>
															<div class="form-row">
																<div class="col-md-3">
																	<label class="col-form-label font-weight-bolder">Morfología de la Curva</label>
																</div>
																<div class="form-group col-md-3">
																	<label class="floating-label">Descripción</label>
																	<input type="text" class="form-control form-control-sm" name="m_curva" id="m_curva">
																</div>
															</div>
															<div class="form-row">
																<div class="col-md-3">
																	<label class="col-form-label font-weight-bolder">Residuo Post-Miccional</label>
																</div>
																<div class="form-group col-md-3">
																	<label class="floating-label">Descripción</label>
																	<input type="text" class="form-control form-control-sm" name="residuo" id="residuo">
																</div>
															</div>
															<div class="form-row">
																<div class="col-md-3">
																	<label class="col-form-label font-weight-bolder">Comentarios</label>
																</div>
																<div class="form-group col-md-9">
																	<label class="floating-label">Descripción</label>
																	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="comentrarios" id="comentrarios"></textarea>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-6 col-md-6">
											<div class="form-group col-md-12">
												<label class="floating-label">Imagenes resultado</label>
												<textarea class="form-control caja-texto form-control-sm" rows="13"  onfocus="this.rows=13" onblur="this.rows=13;" name="obs" id="obs"></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--CIERRE:PRÓSTATA-->
                        @include('atencion_medica.secciones_especialidad.seccion_ficha_general')
                        {{--  div de botones  --}}
                        <div class="bg-white shadow-none rounded mx-1 p-15">
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                            @include('atencion_medica.generales.seccion_receta_examen_comunes')
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
@include("atencion_medica.generales.seccion_menor");
@section('page-script-ficha-atencion')


    <script>
        $(document).ready(function() {

            $('#hip-diag_spec').keyup(function(){
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

            $("#descripcion_cie_esp").autocomplete({
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
                    $('#descripcion_cie_esp').val(ui.item.label); // display the selected text
                    $('#id_descripcion_cie_esp').val(ui.item.value); // save selected id to input
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

        function abrir_modal_guardar_tipo()
        {
            $('#modal_registrar_ficha_tipo_orl').modal('show');
            cargarSeccion('registro_f_t_orl_detalle');
        }

        function cargarSeccion(div_destino)
        {
            {{--  var tipo = $('#'+select+'').val();  --}}
            $('#'+div_destino).html('');
            $('#form-otorrino').find('select,textarea').each(function(key, elemento){
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
                    html +='<div class="col-md-4">Detalle</div>';
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
                {{--  console.log($(elemento).attr('id'));  --}}
                {{--  console.log($(elemento).val());  --}}
                {{--  console.log($(elemento).prop('nodeName'));  --}}
                {{--  console.log('*******');  --}}

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            {{--  console.log(data);  --}}
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
                    registro_f_t_orl_descripcion :  data.registro_f_t_orl_descripcion,
                    registro_f_t_orl_nombre :  data.registro_f_t_orl_nombre,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
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
                        if(index == 'id_usa_audifono')
                            index = 'usa_audifono';

                        $('#'+index).val(value);
                    });
                    evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5);
                    evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2);
                    evaluar_para_carga_detalle('examen_oi','div_detalle_examen_oi','ex_oi_anormal',2);
                    evaluar_para_carga_detalle('examen_od','div_detalle_examen_od','ex_od_anormal',2);
                    evaluar_para_carga_detalle('examen_bio_oi','div_obs_examen_bio_oi','obs_examen_bio_oi',2);
                    evaluar_para_carga_detalle('examen_bio_od','div_obs_examen_bio_od','obs_examen_bio_od',2);
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

    </script>
@endsection




<!--Modals de especialidad -->
{{--  @include("modals_generales.autorizacion_acompa");  --}}




