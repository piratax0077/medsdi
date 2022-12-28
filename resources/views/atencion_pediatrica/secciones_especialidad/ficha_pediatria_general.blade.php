<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_ped_gen-tab" data-toggle="tab" href="#atencion_ped_gen" role="tab" aria-controls="atencion_ped_gen" aria-selected="true">Atención Especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="fcc-tab" data-toggle="tab" href="#fcc" role="tab" aria-controls="fcc" aria-selected="false">Ficha Tradicional</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="ns-tab" data-toggle="tab" href="#ns" role="tab" aria-controls="ns" aria-selected="false">Control Niño Sano</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="vac-tab" data-toggle="tab" href="#vac" role="tab" aria-controls="vac" aria-selected="false">vacunas</a>
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
                    <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                    <div class="tab-content" id="ped-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_ped_gen" role="tabpanel" aria-labelledby="atencion_ped_gen-tab">
                            <div class="row bg-white shadow-none rounded mx-1">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Ficha de atención general</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <!--Formulario / Menor de edad-->
                                        @include('atencion_pediatrica.generales.seccion_menor')
                                        <!--Cierre: Formulario / Menor de edad-->

                                        <!--Motivo consulta-->
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="motivop">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivop_c" aria-expanded="false" aria-controls="motivop_c">
                                                        Motivo de la consulta
                                                    </button>
                                                </div>
                                                <div id="motivop_c" class="collapse show" aria-labelledby="motivop" data-parent="#motivop">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label-activo-sm">Motivo de Consulta</label>
                                                                <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_consulta" name="descripcion_consulta_ped" id="descripcion_consulta_ped" onchange="cargarIgual('descripcion_consulta_orl');">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label-activo-sm">Antecedentes Especialidad</label>
                                                                <input type="text" class="form-control form-control-sm" name="antec_especialidad_ped" id="antec_especialidad_ped">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Fin Motivo consulta-->
                                        <!--EXAMEN ESPECIALIDAD - PARAMETROS DE CONTROL-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="exam_esp">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                                        Examen especialidad
                                                    </button>
                                                </div>
                                                <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">

                                                    <div class="card-body-aten shadow-none">

                                                        <div id="form-otorrino">
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h6 class="f-16 text-c-blue"> Crecimiento y Desarrollo</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label class="floating-label-activo-sm">Descripción Crecimiento y Desarrollo</label>
                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="antec_ped" id="antec_ped"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <form>
                                                                        <button type="button" class="btn btn-outline-primary btn-sm mb-4" onclick="ant_parto ();"></i>Antecedentes Embarazo y Parto</button>
                                                                        <button type="button" class="btn btn-outline-primary btn-sm mb-4" onclick="tunner();"></i>Grado de Tunner Femenino</button>
                                                                        <button type="button" class="btn btn-outline-primary btn-sm mb-4" onclick="tunner_m();"></i>Grado de Tunner Masculino</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group col-md-12">
                                                                        <label class="floating-label-activo-sm">Carga Ficha Tipo</label>
                                                                        <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                            <option value="">Seleccione</option>
                                                                            @if(!empty($fichaTipo))
                                                                                @foreach ($fichaTipo as $ft )
                                                                                    <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h6 class="f-16 text-c-blue">Estado Nutricional</h6>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Estado Nutricional</label>
                                                                            <select name="e_nutricional" data-titulo="Examen_nutricional" id="e_nutricional" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_nutricional','div_examen_nutricional','obs_obs_e_nutricional',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                                <option value="3">No Realizada</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_examen_nutricional" style="display:none;">
                                                                            <label class="floating-label-activo-sm">Estado Nutricional(describir)</label>
                                                                            <textarea class="form-control form-control-sm" data-titulo="Examen_nutricional" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_nutricional" id="obs_obs_e_nutricional"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Vacunas</label>
                                                                            <select name="e_vacunas" id="e_vacunas" data-titulo="Vacunas"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_vacunas','div_e_vacunas','obs_e_vacunas',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Al día</option>
                                                                                <option value="2">Atrasadas</option>
                                                                                <option value="3">No Informadas</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_e_vacunas" style="display:none;">
                                                                            <label class="floating-label-activo-sm">Vacunas(describir)</label>
                                                                            <textarea class="form-control form-control-sm"  data-titulo="Vacunas" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_vacunas" id="obs_e_vacunas"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Obs. Estado nutricional y vacunas</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Biomicroscópico" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_biom" id="obs_ex_biom"></textarea>
                                                                </div>
                                                            </div>
                                                            <hr>
															<!--Vestibular-->
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h6 class="f-16 text-c-blue">Examen Segmentario</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="col-md-4">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Piel</label>
                                                                            <select name="e_piel" id="e_piel" data-titulo="Piel" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_piel','div_e_piel','obs_e_piel',2)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal Describir</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_e_piel" style="display:none">
                                                                            <label class="floating-label-activo-sm">Describir Examen de piel</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Piel" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_piel" id="obs_e_piel"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Cabeza y Cuello</label>
                                                                            <select name="e_cabcuello" id="e_cabcuello" data-titulo="Cabeza y Cuello" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_cabcuello','div_e_cabcuello','detalle_e_cabcuello',3)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">No Examinado</option>
                                                                                <option value="3">Otro Describir</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_e_cabcuello" style="display:none">
                                                                            <label class="floating-label-activo-sm">Describir Examen de Cuello</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Cabeza y Cuello" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_e_cabcuello" id="detalle_e_cabcuello"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Torax</label>
                                                                            <select name="e_torax" id="e_torax" data-titulo="Torax" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_torax','div_e_torax','det_e_torax',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Alterado Describir</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_e_torax" style="display:none">
                                                                            <label class="floating-label-activo-sm">Describir Examen de Torax</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Torax" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_e_torax" id="det_e_torax"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Abdomen</label>
                                                                            <select name="e_abdomen" id="e_abdomen" data-titulo="Abdomen" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_abdomen','div_e_abdomen','det_e_abdomen',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal(describir)</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_e_abdomen" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen de Abdomen</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Abdomen" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_e_abdomen" id="det_e_abdomen"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Musculo-Esquelético</label>
                                                                            <select name="e_muscesq" id="e_muscesq" data-titulo="Musculo-Esquelético" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_muscesq','div_e_muscesq','det_e_muscesq',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_e_muscesq" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen Musculo-Esquelético</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Musculo-Esquelético" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_e_muscesq" id="det_e_muscesq"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Organos de los Sentidos</label>
                                                                            <select name="e_o_sent" id="e_o_sent" data-titulo="O-Sentidos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_o_sent','div_e_o_sent','det_e_o_sent',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_e_o_sent" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen Organos de los Sentidos</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Musculo-Esquelético" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_e_o_sent" id="det_e_o_sent"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Observaciones Ex Segmentario</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen equilibrio" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_equilibrio" id="obs_equilibrio"></textarea>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-9" style="margin-bottom: 0;">
                                                                    <label class="floating-label-activo-sm">Observaciones Examen Especialidad</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Especialidad" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="bs_ex_orl" id="obs_ex_orl"></textarea>
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
                        <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->


                        @include('atencion_medica.secciones_especialidad.seccion_ficha_general')

                        <!--ATENCIÓN NIÑO SANO-->
                        <div class="tab-pane fade" id="ns" role="tabpanel" aria-labelledby="ns-tab">
                            <div class="row bg-white shadow-sm  rounded mx-1">
                                <div class="col-md-12">
                                    <div class="row bg-white shadow-sm rounded mx-3 mt-4">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header" id="motivo">
                                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                                                                Información del Embarazo Parto y Puerperio
                                                            </button>
                                                        </div>
                                                        <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
                                                            <div class="card-body-aten shadow-none">
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <form>
                                                                            <div class="form-row mb-2">
                                                                                <div class="col-md-12">
                                                                                    <!--Formulario / Menor de edad-->
                                                                                    @include('atencion_pediatrica.generales.seccion_menor')
                                                                                    <!--Cierre: Formulario / Menor de edad-->
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-row mb-2">
                                                                                <div class="col-md-12">
                                                                                    <h6>I.-Información del embarazo puerperio</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="form-group col-md-3">
                                                                                    <label class="floating-label">Clínica / Hospital</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="n_clinica_hospital" id="n_clinica_hospital">
                                                                                </div>
                                                                                <div class="form-group col-md-3">
                                                                                    <label class="floating-label">Patología del Embarazo</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="p_pat_embarazo" id="p_pat_embarazo">
                                                                                </div>
                                                                                <div class="form-group col-md-3">
                                                                                    <label class="floating-label">Semanas gestación</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="p_sem_gest" id="p_sem_gest">
                                                                                </div>
                                                                                <div class="form-group col-md-3">
                                                                                    <label class="floating-label">Embarazo controlado</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="p_cont_emb" id="p_cont_emb">
                                                                                </div>
                                                                                <div class="form-group col-md-3">
                                                                                    <label class="floating-label">Tipo de parto</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="p_tpo_parto" id="p_tpo_parto">
                                                                                </div>
                                                                                <div class="form-group col-md-3">
                                                                                    <label class="floating-label">Lactancia</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="p_madre_lactancia" id="p_madre_lactancia">
                                                                                </div>
                                                                                <div class="form-group col-md-3">
                                                                                    <label class="floating-label">Inscripción en Registro Civil</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="p_insc" id="p_insc">
                                                                                </div>
                                                                                <div class="form-group col-md-3">
                                                                                    <label class="floating-label">Otros</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="p_otros_parto" id="p_otros_parto">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row mb-2">
                                                                                <div class="col-md-12">
                                                                                    <h6>II. Datos del recién nacido <i id="btn_recien_nacido" class="fas fa-plus-circle text-primary" data-toggle="tooltip" data-placement="top" title="Ver" style="cursor:pointer;"></i></h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row" id="recien_nacido" style="display:none;">
                                                                                <div class="form-group col-sm-3 col-md-3">
                                                                                    <label class="floating-label-activo-sm">Fecha nacimiento</label>
                                                                                    <input type="date" class="form-control form-control-sm" name="p_fn" id="p_fn">
                                                                                </div>
                                                                                <div class="form-group col-sm-3 col-md-3">
                                                                                    <label class="floating-label-activo-sm">Hora</label>
                                                                                    <input type="time" class="form-control form-control-sm" name="p_hora" id="p_hora">
                                                                                </div>
                                                                                <div class="form-group col-sm-3 col-md-3">
                                                                                    <label class="floating-label">Peso (kg.)</label>
                                                                                    <input type="number" class="form-control form-control-sm" name="p_nac" id="p_nac">
                                                                                </div>
                                                                                <div class="form-group col-sm-3 col-md-3">
                                                                                    <label class="floating-label">Talla (cm.)</label>
                                                                                    <input type="number" class="form-control form-control-sm" name="p_talla" id="p_talla">
                                                                                </div>
                                                                                <div class="form-group col-sm-3 col-md-3">
                                                                                    <label class="floating-label">Perimetro cefálico (cm.)</label>
                                                                                    <input type="number" class="form-control form-control-sm" name="p_pc" id="p_pc">
                                                                                </div>
                                                                                <div class="form-group col-sm-3 col-md-3">
                                                                                    <label class="floating-label">APGAR min</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="p_apgar_1" id="p_apgar_1">
                                                                                </div>
                                                                                <div class="form-group col-sm-3 col-md-3">
                                                                                    <label class="floating-label">APGAR 5 min</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="p_apgar_5" id="p_apgar_5">
                                                                                </div>
                                                                                <div class="form-group col-sm-3 col-md-3">
                                                                                    <label class="floating-label">Edad gestacional</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="p_eg" id="p_eg">
                                                                                </div>
                                                                                <div class="form-group col-sm-6 col-md-6">
                                                                                    <label class="floating-label">Reanimación</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="p_reanimacion" id="p_reanimacion">
                                                                                </div>
                                                                                <div class="form-group col-sm-6 col-md-6">
                                                                                    <label class="floating-label">Medicamentos</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="p_uso_medicamento" id="p_uso_medicamento"></textarea>
                                                                                </div>
                                                                                <div class="form-group col-md-4">
                                                                                    <label class="floating-label">Diagnóstico</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="p_n_diag" id="p_n_diag"></textarea>
                                                                                </div>
                                                                                <div class="form-group col-md-4">
                                                                                    <label class="floating-label">Pronóstico</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="p_n_pronostico" id="p_n_pronostico"></textarea>
                                                                                </div>
                                                                                <div class="form-group col-md-4">
                                                                                    <label class="floating-label">Observaciones</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="p_n_obs" id="p_n_obs"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row mb-2">
                                                                                <div class="col-md-12">
                                                                                    <h6>III. Vacunas <i id="btn_vac_part_puerp" class="fas fa-plus-circle text-primary" data-toggle="tooltip" data-placement="top" title="Ver" style="cursor:pointer;"></i></h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row" id="vac_part_puerp" style="display:none;">
                                                                                <div class="form-group col-md-2">
                                                                                    <label class="floating-label">BCG</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="p_bcg" id="p_bcg">
                                                                                </div>
                                                                                <div class="form-group col-md-2">
                                                                                    <label class="floating-label">Hepatitis B</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="p_hep_b" id="p_hep_b">
                                                                                </div>
                                                                                <div class="form-group col-md-2">
                                                                                    <label class="floating-label">Otra</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="p_otra_vac" id="p_otra_vac">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label class="floating-label">Sueros y Medicamentos</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="p_otra_msuero" id="p_otra_msuero">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row mb-2">
                                                                                <div class="col-md-12">
                                                                                    <h6>IV. Exámenes y Tamizaje <i id="btn_extamiz" class="fas fa-plus-circle text-primary" data-toggle="tooltip" data-placement="top" title="Ver" style="cursor:pointer;"></i></h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row" id="extamiz" style="display:none;">
                                                                                <div class="form-group col-md-2">
                                                                                    <label class="floating-label">TSH</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="p_tsh" id="p_tsh">
                                                                                </div>
                                                                                <div class="form-group col-md-2">
                                                                                    <label class="floating-label">Evaluacion auditíva</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="p_eval_audit" id="p_eval_audit">
                                                                                </div>
                                                                                <div class="form-group col-md-2">
                                                                                    <label class="floating-label">PKU</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="p_pku" id="p_pku">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label class="floating-label">Otros</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="p_otros_ex" id="p_otros_ex"></textarea>
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
                                            <hr class="mt-1">
                                        </div>
                                        <!--Formularios (botones)-->
                                        <!--Antec acomp,embarazo parto y puerperio-->
                                        <div class="row bg-white shadow-sm rounded mx-3 mt-1">
                                        <!--Antec acomp,embarazo parto y puerperio-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <ul class="nav nav-pills mt-1 mb-4" id="pills-tab-crec-desarrollo" role="tablist">

                                                        <li class="nav-item">
                                                            <a class="nav-link-modal" id="pills-0-7-dias-tab" data-toggle="pill" href="#pills-0-7-dias" role="tab" aria-controls="pills-0-7-dias" aria-selected="false">RN (0 y 7 días)</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link-modal" id="pills-1-mes-tab" data-toggle="pill" href="#pills-1-mes" role="tab" aria-controls="pills-1-mes" aria-selected="false">Control 1 mes</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link-modal" id="pills-2-5-meses-tab" data-toggle="pill" href="#pills-2-5-meses" role="tab" aria-controls="pills-2-5-meses" aria-selected="false">Lactante menor (2 a 5 meses)</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link-modal" id="pills-6-11-meses-tab" data-toggle="pill" href="#pills-6-11-meses" role="tab" aria-controls="pills-6-11-meses" aria-selected="false">Lactante menor (6 a 11 meses)</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link-modal" id="pills-12-23-meses-tab" data-toggle="pill" href="#pills-12-23-meses" role="tab" aria-controls="pills-12-23-meses" aria-selected="false">Lactante mayor (12 a 23 meses)</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link-modal" id="pills-2-4-anos-tab" data-toggle="pill" href="#pills-2-4-anos" role="tab" aria-controls="pills-2-4-anos" aria-selected="false">Preescolar (2 a 4 años)</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link-modal" id="pills-6-9-anos-tab" data-toggle="pill" href="#pills-6-9-anos" role="tab" aria-controls="pills-6-9-anos" aria-selected="false">Escolar (6 a 9 años)</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="pills-tabContent-crec-desarrollo">
                                                        <!--Info del acompañante, parto y puerperio-->
                                                        <div class="tab-pane fade show active" id="pills-parto-perpu" role="tabpanel" aria-labelledby="pills-tab-parto-perpu">

                                                        </div>
                                                        <!--Recién nacido (0 y 7 días)-->
                                                        <div class="tab-pane fade" id="pills-0-7-dias" role="tabpanel" aria-labelledby="pills-0-7-dias-tab">
                                                            <div class="row">
                                                                <div class="col-md-12 mt-1">
                                                                    <h6 class="text-c-blue f-16">Recién nacido (0 y 7 días)</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h6>Control parámetros 0 y 7 días</h6>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-12">
                                                                    <label class="floating-label-activo-sm">Anamnesis</label>
                                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="p_07anamnesis" name="p_07anamnesis" ></textarea>
                                                                </div>
                                                            </div>
                                                        </br>
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Exper.Embarazo parto y puerperio</label>
                                                                        <select name="p_07_p_puerp" data-titulo="Experiencia_parto" id="p_07_p_puerp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_puerp','div_p_07_p_puerp','obs_p_07_p_puerp',2);">
                                                                            <option selected value="1">Normal y Felíz</option>
                                                                            <option value="2">Anormal</option>
                                                                            <option value="3">No Realizada</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_p_07_p_puerp" style="display:none">
                                                                        <label class="floating-label-activo-sm">Experiencia del embarazo parto y puerperio(describir)</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Experiencia_parto" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_puerp" id="obs_p_07_p_puerp"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Est. Emoc. familiar y redes </label>
                                                                        <select name="p_07_p" id="p_07_p" data-titulo="Emoción"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p','div_p_07_p','obs_p_07_p',2);">
                                                                            <option selected value="1">Normal</option>
                                                                            <option value="2">Alterado</option>
                                                                            <option value="3">No Informadas</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_p_07_p" style="display:none">
                                                                        <label class="floating-label-activo-sm">Estado emocional familiar(describir)</label>
                                                                        <textarea class="form-control form-control-sm"  data-titulo="Emoción" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p" id="obs_p_07_p"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Lactancia </label>
                                                                        <select name="p_07_p_lactancia" id="p_07_p_lactancia" data-titulo="Lactancia"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_lactancia','div_p_07_p_lactancia','obs_p_07_p_lactancia',2);">
                                                                            <option selected value="1">Normal e Informada</option>
                                                                            <option value="2">Alterada</option>
                                                                            <option value="3">No Examinada</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_p_07_p_lactancia" style="display:none">
                                                                        <label class="floating-label-activo-sm">Lactancia(describir)</label>
                                                                        <textarea class="form-control form-control-sm"  data-titulo="Lactancia" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_lactancia" id="obs_p_07_p_lactancia"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Antecedentes heredo-fam. Maternos</label>
                                                                        <select name="p_07_p_ant_mat" id="p_07_p_ant_mat" data-titulo="Antec_mat"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_ant_mat','div_p_07_p_ant_mat','obs_p_07_p_ant_mat',2);">
                                                                            <option selected value="1">No</option>
                                                                            <option value="2">Si</option>
                                                                            <option value="3">No Informada</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_p_07_p_ant_mat" style="display:none">
                                                                        <label class="floating-label-activo-sm">Estado emocional familiar(describir)</label>
                                                                        <textarea class="form-control form-control-sm"  data-titulo="Antec_mat" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_ant_mat" id="obs_p_07_p_ant_mat"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Antecedentes heredo-fam. Paternos</label>
                                                                        <select name="p_07_p_ant_pat" id="p_07_p_ant_pat" data-titulo="Antec_pat"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_ant_pat','div_p_07_p_ant_pat','obs_p_07_p_ant_pat',2);">
                                                                            <option selected value="1">No</option>
                                                                            <option value="2">Si</option>
                                                                            <option value="3">No Informada</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_p_07_p_ant_pat" style="display:none">
                                                                        <label class="floating-label-activo-sm">Estado emocional familiar(describir)</label>
                                                                        <textarea class="form-control form-control-sm"  data-titulo="Antec_mat" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_ant_pat" id="obs_p_07_p_ant_pat"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <form>
                                                                        <!--Control parametros 0 y 7 días-->

                                                                        <div class="form-row">



                                                                        </div>
                                                                        <!--Examen físico del menor-->
                                                                        <div class="form-row">
                                                                            <div class="col-md-12 mb-3 mt-2">
                                                                                <h6>Examen físico del menor</h6>
                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                <label class="floating-label">Inspección general</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_07_p_insp_gral" name="p_07_p_insp_gral" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label class="floating-label">Actividad</label>
                                                                                        <select name="p_07_p_rnact" data-titulo="Actividad" id="p_07_p_rnact" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_rnact','div_p_07_p_rnact','obs_p_07_p_rnact',2);">
                                                                                            <option value="0">Seleccione</option>
                                                                                            <option selected value="1">Normal y Felíz</option>
                                                                                            <option value="2">Anormal</option>
                                                                                            <option value="3">No Realizada</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12" id="div_p_07_p_rnact" style="display:none;">
                                                                                        <label class="floating-label">Actividad</label>
                                                                                        <textarea class="form-control form-control-sm" data-titulo="Actividad" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_rnact" id="obs_p_07_p_rnact"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label class="floating-label-activo-sm">Malformaciones</label>
                                                                                        <select name="p_07_malf" id="p_07_malf" data-titulo="Malf"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_malf','div_p_07_malf','obs_p_07_malf',2);">

                                                                                            <option selected value="1">No</option>
                                                                                            <option value="2">Si</option>
                                                                                            <option value="3">No Informadas</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12" id="div_p_07_malf" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Malformaciones</label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Malf" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_malf" id="obs_p_07_malf"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label class="floating-label-activo-sm">Tono y Postura </label>
                                                                                        <select name="p_07_p_tp" id="p_07_p_tp" data-titulo="Tono"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_tp','div_p_07_p_tp','obs_p_07_p_tp',2);">

                                                                                            <option selected value="1">Normal </option>
                                                                                            <option value="2">Alterada</option>
                                                                                            <option value="3">No Informada</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12" id="div_p_07_p_tp" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Tono y Postura</label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Tono" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_tp" id="obs_p_07_p_tp"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label class="floating-label-activo-sm">Piél</label>
                                                                                        <select name="p_07_p_piel" id="p_07_p_piel" data-titulo="Piel"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_piel','div_p_07_p_piel','obs_p_07_p_piel',2);">

                                                                                            <option selected value="1">Normal </option>
                                                                                            <option value="2">Alterada</option>
                                                                                            <option value="3">No Informadas</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12" id="div_p_07_p_piel" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Examen de Piél </label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Piel" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_piel" id="obs_p_07_p_piel"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label class="floating-label-activo-sm">Ex Oftalmológico</label>
                                                                                        <select name="p_07_p_ojo" id="p_07_p_ojo" data-titulo="Ojos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_ojo','div_p_07_p_ojo','obs_p_07_p_ojo',2);">

                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Alterado</option>
                                                                                            <option value="3">No Informadas</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12" id="div_p_07_p_ojo" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Ex Oftalmológico</label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Ojos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_ojo" id="obs_p_07_p_ojo"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label class="floating-label-activo-sm">Ex Buco-dental</label>
                                                                                        <select name="p_07_p_dental" id="p_07_p_dental" data-titulo="Dental"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_dental','div_p_07_p_dental','obs_p_07_p_dental',2);">

                                                                                            <option selected value="1">Normal </option>
                                                                                            <option value="2">Alterada</option>
                                                                                            <option value="3">No Informadas</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12" id="div_p_07_p_dental" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Ex Buco-dental</label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Dental" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_dental" id="obs_p_07_p_dental"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label class="floating-label">Cabeza y Cuello</label>
                                                                                        <select name="p_07_p_ccuello" data-titulo="Cab_cuello" id="p_07_p_ccuello" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_ccuello','div_p_07_p_ccuello','obs_p_07_p_ccuello',2);">

                                                                                            <option selected value="1">Normal </option>
                                                                                            <option value="2">Anormal</option>
                                                                                            <option value="3">No Realizada</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12" id="div_p_07_p_ccuello" style="display:none;">
                                                                                        <label class="floating-label">Cabeza y Cuello</label>
                                                                                        <textarea class="form-control form-control-sm" data-titulo="Cab_cuello" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_ccuello" id="obs_p_07_p_ccuello"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label class="floating-label-activo-sm">Cordón</label>
                                                                                        <select name="p_07_pcordon" id="p_07_pcordon" data-titulo="Cordon"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_pcordon','div_p_07_pcordon','obs_p_07_pcordon',2);">

                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Alterado</option>
                                                                                            <option value="3">No Informadas</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12" id="div_p_07_pcordon" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Cordón</label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Cordon" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_pcordon" id="obs_p_07_pcordon"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label class="floating-label-activo-sm">Abdomen</label>
                                                                                        <select name="p_07_p_abd" id="p_07_p_abd" data-titulo="Abdomen"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_abd','div_p_07_p_abd','obs_p_07_p_abd',2);">

                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Alterada</option>
                                                                                            <option value="3">No Informadas</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12" id="div_p_07_p_abd" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Abdomen</label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Abdomen" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_abda" id="obs_p_07_p_abd"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label class="floating-label-activo-sm">Tórax</label>
                                                                                        <select name="p_07_p_torax" id="p_07_p_torax" data-titulo="Torax"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_torax','div_p_07_p_torax','obs_p_07_p_torax',2);">

                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Alterada</option>
                                                                                            <option value="3">No Informadas</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12" id="div_p_07_p_torax" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Tórax</label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Torax" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_torax" id="obs_p_07_p_torax"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label class="floating-label-activo-sm">Columna</label>
                                                                                        <select name="p_07_p_col" id="p_07_p_col" data-titulo="Columna"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_col','div_p_07_p_col','obs_p_07_p_col',2);">

                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Alterada</option>
                                                                                            <option value="3">No Informadas</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12" id="div_p_07_p_col" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Columna</label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Columna" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_col" id="obs_p_07_p_col"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label class="floating-label-activo-sm">Extremidades</label>
                                                                                        <select name="p_07_p_ext" id="p_07_p_ext" data-titulo="Extrem"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_ext','div_p_07_p_ext','obs_p_07_p_ext',2);">

                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Alterada</option>
                                                                                            <option value="3">No Informadas</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12" id="div_p_07_p_ext" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Extremidades<</label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Extrem" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_ext" id="obs_p_07_p_ext"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label class="floating-label-activo-sm">Genitales</label>
                                                                                        <select name="p_07_p_gen" id="p_07_p_gen" data-titulo="Genitales"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_gen','div_p_07_p_gen','obs_p_07_p_gen',2);">

                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Alterada</option>
                                                                                            <option value="3">No Informadas</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12" id="div_p_07_p_gen" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Genitales</label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Genitales" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_gen" id="obs_p_07_p_gen"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label class="floating-label-activo-sm">Ex Neurológico</label>
                                                                                        <select name="p_07_p_neuro" id="p_07_p_neuro" data-titulo="Neuro"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_neuro','div_p_07_p_neuro','obs_p_07_p_neuro',2);">

                                                                                            <option selected value="1">Normal</option>
                                                                                            <option value="2">Alterada</option>
                                                                                            <option value="3">No Informadas</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12" id="div_p_07_p_neuro" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Ex Neurológico</label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Neuro" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_neuro" id="obs_p_07_p_neuro"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-md-3">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <button type="button" class="btn btn-info btn-block btn-sm" onclick="cimc();" >Val referencial</button>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <button type="button" class="btn btn-info btn-block btn-sm" onclick="cimc();" >Tablas</button>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--Antropometría-->
                                                                        <div class="form-row">
                                                                            <div class="col-md-12 mb-3 mt-2">
                                                                                <h6>Antropometría</h6>
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <label class="floating-label">Peso (gr.)</label>
                                                                                <input type="number" class="form-control form-control-sm" name="p_07peso" id="p_07peso">
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <label class="floating-label">Longitud (cm.)</label>
                                                                                <input type="number" class="form-control form-control-sm" name="p_07longitud" id="p_07longitud">
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <label class="floating-label">Perímetro cefálico (cm.)</label>
                                                                                <input type="number" class="form-control form-control-sm" name="p_07peri_cef" id="p_07peri_cef">
                                                                            </div>


                                                                            <div class="form-group col-md-3">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <button type="button" class="btn btn-info btn-block btn-sm" onclick="cimc();" >Val referencial</button>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <button type="button" class="btn btn-info btn-block btn-sm" onclick="cimc();" >Val referencial</button>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>







                                                                        <!--Estado de salud materno-->
                                                                        <div class="form-row">
                                                                            <div class="col-md-12 mb-3 mt-2">
                                                                                <h6>Estado de salud materno</h6>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Signos vitales</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" id="p_07descripcion_mat" name="p_07descripcion_mat" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <label class="floating-label">Peso (kg.)</label>
                                                                                <input type="number" class="form-control form-control-sm" name="p_07_matpeso" id="p_07_matpeso">
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <label class="floating-label">Variación (kg.)</label>
                                                                                <input type="number" class="form-control form-control-sm" name="p_07_matpeso" id="p_07_matpeso">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Involución uterina</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" id="p_07_mat_utero" name="p_07_mat_utero" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Hda. Operatoria</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" id="p_07_mat_heridaop" name="p_07_mat_heridaop" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Zona genito-anal</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" id="p_07_mat_ga" name="p_07_mat_ga" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Extremidades inferiores (edemas)</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" id="p_07_mat_ext" name="p_07_mat_ext" ></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <!--Lactancia materna-->
                                                                        <div class="form-row">
                                                                            <div class="col-md-12 mb-3 mt-2">
                                                                                <h6>Lactancia materna</h6>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label class="floating-label-activo-sm">Lactancia en general</label>
                                                                                        <select name="p_07_mat_lact" id="p_07_mat_lact" data-titulo="Lactancia"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_mat_lact','div_p_07_mat_lact','obs_p_07_mat_lact',2);">
                                                                                            <option value="0">Seleccione</option>
                                                                                            <option value="1">Normal e Informada</option>
                                                                                            <option value="2">Alterada</option>
                                                                                            <option value="3">No Informada</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12" id="div_p_07_mat_lact" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Ex. mamas</label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Lactancia" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_mat_lact" id="obs_p_07_mat_lact"></textarea>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label class="floating-label-activo-sm">Técnica</label>
                                                                                        <select name="p_07_p_tlactancia" id="p_07_p_tlactancia" data-titulo="TLactancia"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_tlactancia','div_p_07_p_tlactancia','obs_p_07_p_tlactancia',2);">
                                                                                            <option value="0">Seleccione</option>
                                                                                            <option value="1">Normal e Informada</option>
                                                                                            <option value="2">Alterada</option>
                                                                                            <option value="3">No Informadas</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12" id="div_p_07_p_tlactancia" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Técnica</label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="TLactancia" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_tlactancia" id="obs_p_07_p_tlactancia"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label class="floating-label-activo-sm">Ex. mamas</label>
                                                                                        <select name="p_07_mat_lactmamas" id="p_07_mat_lactmamas" data-titulo="ex_mamas"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_mat_lactmamas','div_p_07_mat_lactmamas','obs_p_07_mat_lactmamas',2);">
                                                                                            <option value="0">Seleccione</option>
                                                                                            <option value="1">Normal e Informada</option>
                                                                                            <option value="2">Alterada</option>
                                                                                            <option value="3">No Informadas</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12" id="div_p_07_mat_lactmamas" style="display:none;">
                                                                                        <label class="floating-label-activo-sm">Ex. mamas</label>
                                                                                        <textarea class="form-control form-control-sm"  data-titulo="ex_mamas" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_mat_lactmamas" id="obs_p_07_mat_lactmamas"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <!--Diagnósticos-->
                                                                        <div class="form-row">
                                                                            <div class="col-md-12 mb-3 mt-2">
                                                                                <h6>Diagnósticos</h6>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">General</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_07_dg_gen" name="p_07_dg_gen" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Incremento ponderal</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_07_in_pon" name="p_07_in_pon" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Lactancia</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_07_idg_lac" name="p_07_idg_lac" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Salud del lactante</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_07_dg_sallac" name="p_07_dg_sallac" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Salud de la madre</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_07_dg_salmaterna" name="p_07_dg_salmaterna" ></textarea>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="floating-label">Salud sico-social</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_07_dg_salsicoso" name="p_07_dg_salsicoso" ></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Recién nacido (1 mes)-->
                                                        <div class="tab-pane fade" id="pills-1-mes" role="tabpanel" aria-labelledby="pills-1-mes-tab">
                                                            <div class="row">
                                                                <div class="col-md-12 mt-1">
                                                                    <h6 class="text-c-blue f-16">Control 1 mes</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Anamnesis</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=9" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Evaluación relación-familiares</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=9" onblur="this.rows=1;" id="ant_mat" name="ant_mat" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Examen físico del menor</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Inspección general</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="insp_gral" name="insp_gral"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Piel</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="piel" name="piel" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Ganglios</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ganglios" name="ganglios" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Cardio pulmonar</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ex_cardiopulm" name="ex_cardiopulmf" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Abdomen</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abdomen" name="abdomen" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Ex genito-anal</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genito_anal" name="genito_anal" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Reflejos</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="reflejos" name="reflejos" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Motilidad</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="motilidad" name="motilidad" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Tono axilar</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abdomen" name="abdomen" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Signos sug. parálisis cerebral</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="s_paralisis" name="s_paralisis" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Columna</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="columna" name="columna" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Caderas</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="caderas" name="caderas" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Extremidades</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="extremidades" name="extremidades" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Ex. Oftalmológico</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="oft" name="oft" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Ex. Auditivo</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="audit" name="audit" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Ex. Buco dental</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="bucoden" name="bucoden" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Antropometría</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label">Peso en (gr.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                                                        </div>
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label">Longitud (cm.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Perímetro cefálico (cm.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="per_cef" id="per_cef">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Cefalohematomas Fontanella ant</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros_font" name="otros_font" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Lactancia materna</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">General</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="lac_general" name="lac_general" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Técnica</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="tec" name="tec" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Ex. Mamas</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="mamas" name="mamas" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label-activo-sm">Señales de maltrato</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="maltrato" name="maltrato" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Diagnósticos</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">General</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="general" id="general"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Incremento ponderal</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inc_pon" id="inc_pon"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Nutricional</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="nutricional" id="nutricional"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Salud del lactante</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_lact" id="sal_lact"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Salud de la madre</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_madre" id="sal_madre"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Salud psicosocial</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_psico" id="sal_psico"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Lactante menor (2 a 5 meses)-->
                                                        <div class="tab-pane fade" id="pills-2-5-meses" role="tabpanel" aria-labelledby="pills-2-5-meses-tab">
                                                            <div class="row">
                                                                <div class="col-md-12 mt-1">
                                                                    <h6 class="text-c-blue f-16">Lactante menor (2 y 5 meses)</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Anamnesis</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Antecedentes heredofamiliares maternos</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ant_mat" name="ant_mat" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Antecedentes heredofamiliares paternos</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ant_pat" name="ant_pat" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Test de Edimburgo</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="edimburgo" name="edimburgo" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Rx. Caderas</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="rx_cadera" name="rx_cadera" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Evaluación DSM</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="rx_cadera" name="rx_cadera" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Examen físico del menor</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Inspección general y relación parental</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="insp_gral" name="insp_gral" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Piel</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="piel" name="piel" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Ganglios</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ganglios" name="ganglios" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Cardiopulmonar</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ex_cv" name="ex_cv" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Abdomen</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abdomen" name="abdomen" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Ex. Genitoanal</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genito_anal" name="genito_anal" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Reflejos</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="reflejos" name="reflejos" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Tono y motilidad</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="t_motilidad" name="t_motilidad" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Caderas</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="caderas" name="caderas" ></textarea>
                                                                        </div>

                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Extremidades</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="extr" name="extr" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Examen oftalmológico</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="oft" name="oft" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Examen auditívo</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="audit" name="audit" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Antropometría</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label">Peso en (gr.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                                                        </div>
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label">Longitud (cm.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Perímetro cefálico (cm.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="per_cef" id="per_cef">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Otros (lesiones)</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros_font" name="otros_font"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Señales de maltrato</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="maltrato" name="maltrato" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Diagnósticos</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">General</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_gen" id="dg_gen"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Incremento ponderal</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inc_pon" id="inc_pon"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Lactancia</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="nutricional" id="nutricional"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Salud del lactante</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_lact" id="sal_lact"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Otros</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="otros" id="otros"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Salud psicosocial</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_sicosocial" id="sal_sicosocial"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Lactante medio (6 a 11 meses)-->
                                                        <div class="tab-pane fade" id="pills-6-11-meses" role="tabpanel" aria-labelledby="pills-6-11-meses-tab">
                                                            <div class="row">
                                                                <div class="col-md-12 mt-1">
                                                                    <h6 class="text-c-blue f-16">Lactante medio (6 y 11 meses)</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Anamnesis</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="anamnesis" name="anamnesis"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Test de Edimburgo</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="edimburgo" name="edimburgo"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Pautas prevención accidentes</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="prev_accident" name="prev_accident"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Otros</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros" name="otros"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Examen físico del menor</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Inspección general y relación parental</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="insp_gral" name="insp_gral" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Piel</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="piel" name="piel" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Ganglios</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ganglios" name="ganglios" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Cardiopulmonar</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ex_cv" name="ex_cv" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Abdomen</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abdomen" name="abdomen" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Ex. Genitoanal</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genito_anal" name="genito_anal" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Reflejos</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="reflejos" name="reflejos" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Tono y motilidad</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="t_motilidad" name="t_motilidad" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Caderas</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="caderas" name="caderas" ></textarea>
                                                                        </div>

                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Extremidades</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="extr" name="extr" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Examen oftalmológico</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="oft" name="oft" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Examen auditívo</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="audit" name="audit" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Antropometría</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label">Peso en (gr.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                                                        </div>
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label">Longitud (cm.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Perímetro cefálico (cm.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="per_cef" id="per_cef">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Otros (lesiones)</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros_font" name="otros_font" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Señales de maltrato</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="maltrato" name="maltrato" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Diagnósticos</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">General</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_gen" id="dg_gen"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Incremento ponderal</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inc_pon" id="inc_pon"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Lactancia</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="nutricional" id="nutricional"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Salud del lactante</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_lact" id="sal_lact"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Otros</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="otros" id="otros"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Salud psicosocial</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_sicosocial" id="sal_sicosocial"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Lactante mayor (12 a 23 meses)-->
                                                        <div class="tab-pane fade" id="pills-12-23-meses" role="tabpanel" aria-labelledby="pills-12-23-meses-tab">
                                                            <div class="row">
                                                                <div class="col-md-12 mt-1">
                                                                    <h6 class="text-c-blue f-16">Lactante mayor (12 y 23 meses)</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Anamnesis</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Evaluaciones indicaciones anteriores</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ev_anter" name="ev_anter" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Dieta</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="dieta" name="dieta" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Hábitos</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="habitos" name="habitos" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Rutinas de sueño alimentación</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="sueno_alim" name="sueno_alim" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Prevención de accidentes</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="accidentes" name="accidentes" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Cuidadores</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="cuidadores" name="cuidadores" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Examen físico del menor</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Inspección general y relación parental</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="insp_gral" name="insp_gral" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Piel</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="piel" name="piel" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Ganglios</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ganglios" name="ganglios" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Cardiopulmonar</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ex_cv" name="ex_cv" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Abdomen</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abdomen" name="abdomen" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Ex. Genitoanal</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genito_anal" name="genito_anal" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Reflejos</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="reflejos" name="reflejos" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Tono y motilidad</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="t_motilidad" name="t_motilidad" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Caderas</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="caderas" name="caderas" ></textarea>
                                                                        </div>

                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Extremidades</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="extr" name="extr" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Examen oftalmológico</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="oft" name="oft" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Examen auditívo</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="audit" name="audit" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Antropometría</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label">Peso en (gr.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                                                        </div>
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label">Longitud (cm.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Perímetro cefálico (cm.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="per_cefalico" id="per_cefalico">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Otros (lesiones)</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros_font" name="otros_font" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Señales de maltrato</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="maltrato" name="maltrato" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Diagnósticos</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">General</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="general" id="general"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Incremento ponderal</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inscr_ponderal" id="inscr_ponderal"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Lactancia</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="lactancia" id="lactancia"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Salud del lactante</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="salud_lactante" id="salud_lactante"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Salud de la madre</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="salud_madre" id="salud_madre"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Salud psicosocial</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_psico" id="sal_psico"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Pre-escolar (2 a 4 años)-->
                                                        <div class="tab-pane fade" id="pills-2-4-anos" role="tabpanel" aria-labelledby="pills-2-4-anos-tab">
                                                            <div class="row">
                                                                <div class="col-md-12 mt-1">
                                                                    <h6 class="text-c-blue f-16">Pre-escolar (2 y 4 años)</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Anamnesis</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Evaluaciones indicaciones anteriores</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ev_anter" name="ev_anter" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Dieta</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="dieta" name="dieta" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Hábitos</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="habitos" name="habitos" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Rutinas de sueño alimentación</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="sueno_alim" name="sueno_alim" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Prevención de accidentes</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="accidentes" name="accidentes" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Cuidadores</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="cuidadores" name="cuidadores" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Examen Físico del menor</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Inspección general y relación parental</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="insp_gral" name="insp_gral" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Piel</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="piel" name="piel" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Ganglios</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ganglios" name="ganglios" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Cardiopulmonar</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ex_cv" name="ex_cv" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Abdomen</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abdomen" name="abdomen" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Ex. Genitoanal</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genito_anal" name="genito_anal" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Presión arterial</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_arterial" name="p_arterial" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Ex. Neurológico</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="neurl" name="neurl" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Marcha</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="marcha" name="marcha" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Pié plano flexible</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_planof" name="p_planof" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Pié plano doloroso</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_planod" name="p_planod" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Genu valgo</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genu" name="genu" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Examen oftalmológico</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="oft" name="oft" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Examen auditívo</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="audit" name="audit" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Antropometría</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label">Peso en (gr.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                                                        </div>
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label">Longitud (cm.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Perímetro cefálico (cm.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="per_cefal" id="per_cefal">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Ex. Bucodental</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="bucodental" name="bucodental" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Señales de maltrato</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="maltrato" name="maltrato" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Diagnósticos</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">General</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_gen" id="dg_gen"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Incremento ponderal</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inc_pon" id="inc_pon"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Otros</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="otros" id="otros"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Salud psicosocial</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_sicosocial" id="sal_sicosocial"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Escolar (6 a 9 años)-->
                                                        <div class="tab-pane fade" id="pills-6-9-anos" role="tabpanel" aria-labelledby="pills-2-4-anos-tab">
                                                            <div class="row">
                                                                <div class="col-md-12 mt-1">
                                                                    <h6 class="text-c-blue f-16">Escolar (6 y 9 años)</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Anamnesis</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=8" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Evaluaciones psicoafectivas</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=8" onblur="this.rows=1;" id="ev_psicoa" name="ev_psicoa" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Otros</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=8" onblur="this.rows=1;" id="sueno_alim" name="sueno_alim" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Examen físico del menor</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label">Inspección general y relación parental</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="insp_gral" name="insp_gral" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-1">
                                                                        <div class="col-md-12">
                                                                            <h6>Antropometría</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Peso (kg.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="pesoIMC" id="pesoIMC">
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label">Talla (cms.)</label>
                                                                            <input type="number" class="form-control form-control-sm" name="alturaIMC" id="alturaIMC">
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label-activo-sm">IMC</label>
                                                                            <input type="number" class="form-control form-control-sm"  id="resultadoIMC" name="resultado"  >
                                                                                <script>
                                                                                    function cimc(){
                                                                                    var peso = document.querySelector('#pesoIMC').value;
                                                                                    var altura = document.querySelector('#alturaIMC').value;

                                                                                    var alturaMetro = altura/100;
                                                                                    var imc = Math.round(peso / (alturaMetro + alturaMetro));
                                                                                    var leyenda = '';

                                                                                    if (imc <= 21) {

                                                                                        leyenda = "Está delgado. Debe engordar " + Math.round(alturaMetro * alturaMetro * 20.5 - peso) + " kilos";
                                                                                    }else if(imc >= 26){
                                                                                        leyenda = "Tiene sobrepeso. Debe adelgazar " + Math.round(peso - alturaMetro * alturaMetro * 25.5) + " kilos";
                                                                                    }else{
                                                                                        leyenda = "Esta en  peso ideal";
                                                                                    }
                                                                                    //var hr = document.createElement('hr');
                                                                                    //var spanIMC = document.createElement('span');
                                                                                    //spanIMC.textContent = `IMC: ${imc} - ${leyenda}`;
                                                                                    //var divResultado = document.querySelector('#resultado');
                                                                                    document.querySelector('#resultadoIMC').value = imc;
                                                                                    //divResultado.appendChild(hr);
                                                                                    //divResultado.appendChild(spanIMC);
                                                                                }
                                                                                </script>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <button type="button" class="btn btn-info btn-block btn-sm" onclick="cimc();" >Calcular IMC</button>
                                                                            <button type="button" class="btn btn-info btn-block btn-sm" onclick="calcular_imc()">Valores Referenciales</button>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Piel</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="piel" name="piel" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Ganglios</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ganglios" name="ganglios" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-12 mb-0">
                                                                            <p class="text-danger">Este examen se debe desarrollar con la presencia del adulto responsable del menor y con el consentimiento escolar*</p>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label text-danger">Desarrollo puberal *</label>
                                                                            <textarea class="form-control form-control-sm"  rows="2" onfocus="this.rows=6" onblur="this.rows=2;" id="desarr_pub" name="desarr_pub" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label text-danger">Desarrollo puberal *</label>
                                                                            <textarea class="form-control form-control-sm"  rows="2" onfocus="this.rows=6" onblur="this.rows=2;" id="abdomen" name="abdomen" placeholder="REVISAR RESPUESTAS DEL CUESTIONARIO (COMPLETADO POR PADRES)" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label text-danger">Ex. Genitoanal *</label>
                                                                            <textarea class="form-control form-control-sm"  rows="2" onfocus="this.rows=6" onblur="this.rows=2;" id="genito_anal" name="genito_anal" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Presión arterial</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_arterial" name="p_arterial" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Test de Adams</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="adams" name="adams" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                                <label class="floating-label">Ex. Tórax</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="torax" name="torax" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Abdomen</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abdomen" name="abdomen" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Ex. Bucodental</label>
                                                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="buco_dent" name="buco_dent" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Marcha</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="marcha" name="marcha" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Pié plano flexible</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_planof" name="p_planof" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Pié plano doloroso</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_planod" name="p_planod" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Genu valgo</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genu" name="genu" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Examen oftalmológico</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="oft" name="oft" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Examen auditívo</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="audit" name="audit" ></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label">Señales de maltrato</label>
                                                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="maltrato" name="maltrato" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mb-2">
                                                                        <div class="col-md-12">
                                                                            <h6>Diagnósticos</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">General</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="general" id="general"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Nutricional</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="nutricional" id="nutricional"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Salud (General)</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_gnal" id="sal_gnal"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label">Salud psicosocial</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="s_psicosocial" id="s_psicosocial"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Próximo control-->

                                                <hr>

                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header bg-info align-middle">
                                                        <h6 class="float-left d-inline">Indicaciones de próximo control</h6>
                                                    </div>
                                                    <div class="card-body shadow-none">
                                                        <form>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-2">
                                                                    <label class="floating-label-activo-sm">Fecha</label>
                                                                    <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label class="floating-label">Control con:</label>
                                                                    <input type="text" class="form-control form-control-sm" name="control" id="control">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label class="floating-label">Sugerencias</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="sug" id="sug"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label">Otras sugerencias</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="otras_sugerencias" id="otras_sugerencias"></textarea>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Botones carnet vacunas
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="carnet_vac();"><i class="fa fa-plus"></i> Carnet de vacunas generales</button>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="inter();"><i class="fa fa-plus"></i> Interconsulta</button>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="otras_vac();"><i class="fa fa-plus"></i> Carnet de vacunas especiales</button>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mb-3">
                                                <div class="col-md-12 text-center">
                                                    <button type="reset" class="btn btn-danger">Borrar</button>
                                                    <button type="submit" class="btn btn-info">Guardar ficha</button>
                                                </div>
                                            </div>-->
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: ATENCIÓN NIÑO SANO-->
                        <!--ATENCIÓN VACUNAS-->
                        <div class="tab-pane fade" id="vac" role="tabpanel" aria-labelledby="vac-tab">
                            <div class="row bg-white shadow-sm rounded mx-1">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-2">
                                            <h6 class="f-18 d-inline float-left">Vacunas</h6>
                                        </div>
                                    </div>
                                </div>
                                    <hr class="mt-1">
                                <div class="col-sm-12">
                                    <div class="row">

                                        <div class="card">
                                            <div class="card-body shadow-none" id="formulario_vac">
                                                <form>
                                                    <div class="form-row mb-2">
                                                        <div class="col-md-12">
                                                            <h6>Información del estado de Vacunación del menor</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label">Estado de vacunación</label>
                                                            <select class="form-control form-control-sm" id="categoria">
                                                                <option>Seleccione</option>
                                                                <optgroup label="Programa Minsal">
                                                                    <option value="AL">Al día</option>
                                                                    <option value="LA">Atrasado</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                                <label class="floating-label">Vacuna correspondiente a edad</label>
                                                                <select class="form-control form-control-sm" id="categoria">
                                                                    <option>Seleccione</option>
                                                                    <optgroup label="Recién Nacido">
                                                                        <option value="AL">BCG</option>
                                                                        <option value="LA">Hepatitis B</option>
                                                                    </optgroup>
                                                                    <optgroup label="2° mes , 4° mes , 6° mes">
                                                                        <option value="AL">Hexavalente</option>
                                                                        <option value="LA">Neumocócica Conjugada (prematuros)</option>
                                                                    </optgroup>
                                                                    <optgroup label="12 meses">
                                                                        <option value="AL">Tres Vírica 1ª Dosis</option>
                                                                        <option value="LA">Meningocócica Conjugada</option>
                                                                        <option value="LA">Neumocócica Conjugada</option>
                                                                    </optgroup>
                                                                    <optgroup label="18 meses">
                                                                        <option value="AL">Hexavalente</option>
                                                                        <option value="LA">Hepatitis A</option>
                                                                        <option value="LA">Varícela 1ª Dosis</option>
                                                                        <option value="LA">Fiebre Amarilla(Isla de Pascua)</option>
                                                                    </optgroup>
                                                                    <optgroup label="Pre-escolar">
                                                                        <option value="AL">Tres Vírica 2ª Dosis</option>
                                                                        <option value="LA">Varícela 2ª Dosis</option>
                                                                    </optgroup>
                                                                    <optgroup label="Escolar">
                                                                        <option value="AL">1º Básico dTp (acelular)</option>
                                                                        <option value="AL">4º Básico VPH 1ª Dosis</option>
                                                                        <option value="AL">5º Básico VPH 2ª Dosis</option>
                                                                        <option value="AL">8º Básico dTp (acelular)</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Vacuna administrada-->
                                    <!--Incidentes con la vacuna-->
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">Incidentes con la vacuna</h6>
                                            </div>
                                            <div class="card-body shadow-none">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Incidentes</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="incidentes" id="incidentes"></textarea>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <div class="row mb-3">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Estado de Vacunación</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <!--Motivo de consulta-->
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <table id="tabla_profesionales_laboratorio" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle">EDAD</th>
                                                            <th class="text-center align-middle">VACUNAS</th>
                                                            <th class="text-center align-middle">RECIBIDA</th>
                                                            <th class="text-center align-middle">FECHA</th>
                                                            <th class="text-center align-middle">INCIDENTES</th>
                                                            <th class="text-center align-middle">ACCIÓN</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle text-center">
                                                                <span><strong>RN</strong></span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>BCG</span><br>
                                                                <span>Hepatitis B</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                               <span>SI</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>20/12/2021</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span>ERITEMA LOCAL</span>
                                                            </td>
                                                            <td class="align-middle text-center">

                                                                <button type="button" class="btn btn-danger btn-sm">
                                                                <i class="feather icon-x-circle"></i> INDICAR</button><!--SI LA OPCION RECIBIDA ES NO DEBE APARECER BOTON-->
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!--Medicamentos o Examen-->
                                        <div class="form-group col-md-6">
                                             <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_vacunas();"><i class="fa fa-plus"></i> Indicar Vacunas Programa MINSAL</button>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_vacunas_otras();"><i class="fa fa-plus"></i> Indicar Otras Vacunas</button>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row mb-3">
                                        <div class="col-md-12 text-center">
                                            <button type="button" class="btn btn-info">Guardar</button>
                                            <button type="button" class="btn btn-success">Imprimir</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: ATENCIÓN VACUNAS-->
                        {{--  div de botones  --}}
                        <div class="bg-white shadow-none rounded mx-1 p-15">
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                            @include('atencion_medica.generales.seccion_receta_examen_comunes')
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->

                            <!--SECCION DE MEDICAMENTOS Y EXAMENES ESPECIALIDAD -->

                            <!--SECCION DE MEDICAMENTOS Y EXAMENES ESPECIALIDAD FIN  -->

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
        $('#btn_recien_nacido').click(function () {
            $('#recien_nacido').toggle();
        });

        /** Datos recien nacido **/
        $('#btn_vac_part_puerp').click(function () {
            $('#vac_part_puerp').toggle();
        });

        /** Datos recien nacido **/
        $('#btn_extamiz').click(function () {
            $('#extamiz').toggle();
        });
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

        function guardar_tipo_ficha_ped()
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


