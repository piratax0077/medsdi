<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="pediatria_general" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_ped_gen-tab" data-toggle="tab" href="#atencion_ped_gen" role="tab" aria-controls="atencion_ped_gen" aria-selected="false">Ficha Atención</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="ns-tab" data-toggle="tab" href="#ns" role="tab" aria-controls="ns" aria-selected="false">Control Niño Sano</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="vac-tab" data-toggle="tab" href="#vac" role="tab" aria-controls="vac" aria-selected="false">Vacunas</a>
                    </li>
                    {{--  <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="neo-tab" data-toggle="tab" href="#neo" role="tab" aria-controls="neo" aria-selected="false">Neonatología</a>
                    </li>  --}}
                </ul>
            </div>
            <div class="col-sm-12 col-md-12">
                <form action="{{ route('fichaAtencion.registrar_ficha_ped_gen') }}" method="POST">
                    <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                    <!-- <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}"> -->
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
                                                                <input type="text" class="form-control form-control-sm" name="descripcion_consulta" id="descripcion_consulta">
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
                                                        <div id="form-pediatria">
                                                            <div class="form-row">
                                                                <div class="col-md-12">
                                                                    <h6 class="f-16 text-c-blue"> Crecimiento y Desarrollo</h6>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-5">
                                                                    <label class="floating-label-activo-sm">Descripción Crecimiento y Desarrollo</label>
                                                                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_gral_crec_desarr" id="obs_gral_crec_desarr"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-7">
                                                                    {{-- descomentar cuando se tengan antecedentes de embarazon en gine obstetricia --}}
                                                                    {{-- <button type="button" class="btn btn-outline-primary btn-sm mb-4" onclick="ant_parto ();"></i>Antec. Embarazo y Parto</button> --}}
                                                                    <button type="button" class="btn btn-outline-primary btn-sm mb-4" onclick="tunner();"></i>G. de Tunner Femenino</button>
                                                                    <button type="button" class="btn btn-outline-primary btn-sm mb-4" onclick="tunner_m();"></i>G. de Tunner Masculino</button>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Carga Ficha Tipo</label>
                                                                        <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                            <option value="">Seleccione</option>
                                                                            @if(!empty($fichaTipo['ped_gen']))
                                                                                @foreach ($fichaTipo['ped_gen'] as $ft )
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
                                                            <div class="form-row">
                                                                <div class="col-md-12">
                                                                    <h6 class="f-16 text-c-blue">Estado Nutricional</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div id="form-ped_gen">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">Estado Nutricional</label>
                                                                            <select name="e_nutricional" data-titulo="Examen_nutricional" data-seccion="Estado Nutricional" id="e_nutricional" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_nutricional','div_examen_nutricional','obs_e_nutricional',2);">
                                                                                <option selected  value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                                <option value="3">Ex. No Realizado</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group" id="div_examen_nutricional" style="display:none;">
                                                                            <label class="floating-label-activo-sm">Estado Nutricional(describir)</label>
                                                                            <textarea class="form-control form-control-sm" data-titulo="obs. Examen_nutricional" data-seccion="Estado Nutricional" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_nutricional" id="obs_e_nutricional"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <div class="form-group ">
                                                                            <label class="floating-label-activo-sm">Vacunas</label>
                                                                            <select name="e_vacunas" id="e_vacunas" data-titulo="Vacunas" data-seccion="Estado Nutricional" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_vacunas','div_e_vacunas','obs_e_vacunas',2);">
                                                                                <option selected value="1">Al día</option>
                                                                                <option value="2">Atrasadas</option>
                                                                                <option value="3">No Informadas</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group" id="div_e_vacunas" style="display:none;">
                                                                            <label class="floating-label-activo-sm">Vacunas(describir)</label>
                                                                            <textarea class="form-control form-control-sm"  data-titulo="obs. Vacunas" data-seccion="Estado Nutricional" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_vacunas" id="obs_e_vacunas"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">Obs. Estado nutricional y vacunas</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Estado nutricional y vacunas" data-seccion="Estado Nutricional" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_nutricional_vacunas" id="obs_ex_nutricional_vacunas"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="form-row">
                                                                    <div class="col-md-12">
                                                                        <h6 class="f-16 text-c-blue">Examen Segmentario</h6>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">Piel</label>
                                                                            <select name="e_piel" id="e_piel" data-titulo="Piel" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_piel','div_e_piel','obs_e_piel',2)">
                                                                                <option selected value="1">Normal</option>
                                                                                <option value="2">Anormal Describir</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group" id="div_e_piel" style="display:none">
                                                                            <label class="floating-label-activo-sm">Describir Examen de piel</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Piel" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_piel" id="obs_e_piel"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">Cabeza y Cuello</label>
                                                                            <select name="e_cabcuello" id="e_cabcuello" data-titulo="Cabeza y Cuello" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_cabcuello','div_e_cabcuello','obs_e_cabcuello',3)">
                                                                                <option selected value="1">Normal</option>
                                                                                <option value="2">No Examinado</option>
                                                                                <option value="3">Otro Describir</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group" id="div_e_cabcuello" style="display:none">
                                                                            <label class="floating-label-activo-sm">Describir Examen de Cuello</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Cabeza y Cuello" data-seccion="Examen Segmentario"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_cabcuello" id="obs_e_cabcuello"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">Torax</label>
                                                                            <select name="e_torax" id="e_torax" data-titulo="Torax" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_torax','div_e_torax','obs_e_torax',2);">
                                                                                <option selected value="1">Normal</option>
                                                                                <option value="2">Alterado Describir</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group" id="div_e_torax" style="display:none">
                                                                            <label class="floating-label-activo-sm">Describir Examen de Torax</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Torax" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_torax" id="obs_e_torax"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">Abdomen</label>
                                                                            <select name="e_abdomen" id="e_abdomen" data-titulo="Abdomen" data-seccion="Examen Segmentario"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_abdomen','div_e_abdomen','obs_e_abdomen',2);">
                                                                                <option selected value="1">Normal</option>
                                                                                <option value="2">Anormal(describir)</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group" id="div_e_abdomen" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen de Abdomen</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Abdomen" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_abdomen" id="obs_e_abdomen"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                    <div class="form-group">
                                                                            <label class="floating-label-activo-sm">Musculo-Esquelético</label>
                                                                            <select name="e_muscesq" id="e_muscesq" data-titulo="Musculo-Esquelético" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_muscesq','div_e_muscesq','obs_e_muscesq',2);">
                                                                                <option selected value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group" id="div_e_muscesq" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen Musculo-Esquelético</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Musculo-Esquelético" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_muscesq" id="obs_e_muscesq"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">Organos de los Sentidos</label>
                                                                            <select name="e_o_sent" id="e_o_sent" data-titulo="O-Sentidos" class="form-control form-control-sm"data-seccion="Examen Segmentario"  onchange="evaluar_para_carga_detalle('e_o_sent','div_e_o_sent','obs_e_o_sent',2);">
                                                                                <option selected value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group" id="div_e_o_sent" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen Organos de los Sentidos</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. O-Sentidos" data-seccion="Examen Segmentario" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_o_sent" id="obs_e_o_sent"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <label class="floating-label-activo-sm">Observaciones Ex Segmentario</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Ex Segmentario" data-seccion="Examen Segmentario"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_segmentario" id="obs_ex_segmentario"></textarea>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-9" style="margin-bottom: 0;">
                                                                        <label class="floating-label-activo-sm">Observaciones Examen Especialidad</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Examen Especialidad" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_ex_pedgen" id="obs_ex_pedgen"></textarea>
                                                                    </div>
                                                                    <div class="form-group col-md-3 align-middle" style="margin:auto">
                                                                        <button type="button" class="btn btn-outline-primary has-ripple" onclick="abrir_modal_guardar_tipo('form-ped_gen','registro_f_t_detalle','ped_gen');"><i class="me-2" data-feather="thumbs-up"></i>Guardar Nueva Ficha Tipo<span class="ripple ripple-animate" style="height: 99.2656px; width: 99.2656px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -32.5625px; left: 8.375px;"></span></button>
                                                                    </div>
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
                                                                @if (isset($fichaAtencion) && $fichaAtencion->ct_lenguaje != null)
                                                                <label class="floating-label-activo-sm">Lenguaje</label>
                                                                <input type="text" class="form-control form-control-sm" name="ct_lenguaje" id="ct_lenguaje" value="{{ $fichaAtencion->ct_lenguaje }}">
                                                                @else
                                                                <label class="floating-label-activo-sm">Lenguaje</label>
                                                                <input type="text" class="form-control form-control-sm" name="ct_lenguaje" id="ct_lenguaje" value="{!! old('ct_lenguaje') !!}">
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->ct_traslado != null)
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
                                                                <input type="text" class="form-control form-control-sm"  data-input_igual="lic_descripcion_hipotesis,diagnostico_cons" name="descripcion_hipotesis" id="descripcion_hipotesis" onchange="cargarIgual('descripcion_hipotesis')" >
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Indicaciones</label>
                                                                <input type="text" class="form-control form-control-sm" name="indicacion" id="indicacion">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                                @if (isset($fichaAtencion->diagnostico_ce10))
                                                                    <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_cie,lic_descripcion_cie" name="descripcion_cie_esp" id="descripcion_cie_esp" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('descripcion_cie_esp')">
                                                                    <input type="hidden" class="form-control form-control-sm" data-input_igual="id_descripcion_cie,lic_descripcion_cie" name="id_descripcion_cie_esp" id="id_descripcion_cie_esp" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('id_descripcion_cie_esp')">
                                                                @else
                                                                    <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_cie,lic_descripcion_cie" name="descripcion_cie_esp" id="descripcion_cie_esp" value="" onchange="cargarIgual('descripcion_cie_esp')">
                                                                    <input type="hidden" class="form-control form-control-sm" data-input_igual="id_descripcion_cie,lic_descripcion_cie" name="id_descripcion_cie_esp" id="id_descripcion_cie_esp" value="" onchange="cargarIgual('id_descripcion_cie_esp')">
                                                                @endif
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
                        <!--ATENCIÓN NIÑO SANO--><!--ATENCIÓN VACUNAS-->
                        @include('atencion_pediatrica.secciones_especialidad.control_ninosano')
                        @include('atencion_pediatrica.secciones_especialidad.vacunas')
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

            // $('#btn_recien_nacido').click(function () {
            //     $('#recien_nacido').toggle();
            // });

            // /** Datos recien nacido **/
            // $('#btn_vac_part_puerp').click(function () {
            //     $('#vac_part_puerp').toggle();
            // });

            // /** Datos recien nacido **/
            // $('#btn_extamiz').click(function () {
            //     $('#extamiz').toggle();
            // });

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

            var actual = $('#'+input);
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

        function abrir_modal_guardar_tipo(div_id_data, div_id_detalle,tipo)
        {
            $("#btn_registro_ficha_tipo").unbind();

            if(tipo == 'ped_gen')
            {
                $('#btn_registro_ficha_tipo').click(function(){
                    guardar_tipo_ficha_ped_gen();
                });
            }
            $('#modal_registrar_ficha_tipo').modal('show');

            cargarSeccion(div_id_detalle,div_id_data);
        }

        function cargarSeccion(div_destino, div_data)
        {
            // var tipo = $('#'+select+'').val();
            $('#'+div_destino).html('');
            $('#'+div_data).find('select,textarea,input').each(function(key, elemento){
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

        function guardar_tipo_ficha_ped_gen()
        {
            var registro_f_t_nombre = $('#registro_f_t_nombre').val();
            var registro_f_t_descripcion = $('#registro_f_t_descripcion').val();
            var _token = CSRF_TOKEN;
            if(registro_f_t_nombre == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }
            if(registro_f_t_descripcion == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }


            var data = [];
            data.registro_f_t_nombre = registro_f_t_nombre;
            data.registro_f_t_descripcion = registro_f_t_descripcion;

            $('#registro_f_t_detalle').find('input,textarea').each(function(key, elemento){
                // console.log($(elemento).attr('id'));
                // console.log($(elemento).val());
                // console.log($(elemento).prop('nodeName'));
                // console.log('*******');

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            {{--  console.log(data);  --}}
            url = "{{ route('profesional.ficha_tipo_ped_gen') }}";
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional : $('#id_profesional_fc').val(),
                    nombre : data.registro_f_t_nombre,
                    descripcion : data.registro_f_t_descripcion,
                    e_nutricional : data.modal_agregar_tipo_e_nutricional,
                    obs_e_nutricional : data.observaciones_obs_e_nutricional,
                    e_vacunas : data.modal_agregar_tipo_e_vacunas,
                    obs_e_vacunas : data.observaciones_obs_e_vacunas,
                    obs_ex_nutricional_vacunas : data.observaciones_obs_ex_nutricional_vacunas,
                    e_piel : data.modal_agregar_tipo_e_piel,
                    obs_e_piel : data.observaciones_obs_e_piel,
                    e_cabcuello : data.modal_agregar_tipo_e_cabcuello,
                    obs_e_cabcuello : data.observaciones_obs_e_cabcuello,
                    e_torax : data.modal_agregar_tipo_e_torax,
                    obs_e_torax : data.observaciones_obs_e_torax,
                    e_abdomen : data.modal_agregar_tipo_e_abdomen,
                    obs_e_abdomen : data.observaciones_obs_e_abdomen,
                    e_muscesq : data.modal_agregar_tipo_e_muscesq,
                    obs_e_muscesq : data.observaciones_obs_e_muscesq,
                    e_o_sent : data.modal_agregar_tipo_e_o_sent,
                    obs_e_o_sent : data.observaciones_obs_e_o_sent,
                    obs_ex_segmentario : data.observaciones_obs_ex_segmentario,
                    obs_ex_pedgen : data.observaciones_obs_ex_pedgen,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $('#registro_f_t_nombre').val('');
                    $('#registro_f_t_descripcion').val('')
                    $('#registro_f_t_detalle').html('');
                    $('#modal_registrar_ficha_tipo').modal('hide');
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

        function cargar_info_ficha_tipo_ped_gen(select, div_descripcion)
        {
            let id_ft = $('#'+select).val();
            if(id_ft == '')
            {
                $('#'+div_descripcion).html('');
                $('#form-ped_gen').find('select,textarea').each(function(key, elemento){
                    if($(elemento).prop('nodeName') == 'SELECT')
                    {
                        $(elemento).val(0);
                    }
                    else
                    {
                        $(elemento).val('');
                    }
                });

                evaluar_para_carga_detalle('e_nutricional','div_examen_nutricional','obs_e_nutricional',2);
                evaluar_para_carga_detalle('e_vacunas','div_e_vacunas','obs_e_vacunas',2);
                evaluar_para_carga_detalle('e_piel','div_e_piel','obs_e_piel',2);
                evaluar_para_carga_detalle('e_cabcuello','div_e_cabcuello','obs_e_cabcuello',3);
                evaluar_para_carga_detalle('e_torax','div_e_torax','obs_e_torax',2);
                evaluar_para_carga_detalle('e_abdomen','div_e_abdomen','obs_e_abdomen',2);
                evaluar_para_carga_detalle('e_muscesq','div_e_muscesq','obs_e_muscesq',2);
                evaluar_para_carga_detalle('e_o_sent','div_e_o_sent','obs_e_o_sent',2);

                return false;
            }
            $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

            url = "{{ route('profesional.buscar_ficha_tipo_ped_gen') }}";
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
                // console.log('-----------------------');
                // console.log(data);
                // console.log('-----------------------');
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        $('#'+index).val(value);
                    });

                    evaluar_para_carga_detalle('e_nutricional','div_examen_nutricional','obs_e_nutricional',2);
                    evaluar_para_carga_detalle('e_vacunas','div_e_vacunas','obs_e_vacunas',2);
                    evaluar_para_carga_detalle('e_piel','div_e_piel','obs_e_piel',2);
                    evaluar_para_carga_detalle('e_cabcuello','div_e_cabcuello','obs_e_cabcuello',3);
                    evaluar_para_carga_detalle('e_torax','div_e_torax','obs_e_torax',2);
                    evaluar_para_carga_detalle('e_abdomen','div_e_abdomen','obs_e_abdomen',2);
                    evaluar_para_carga_detalle('e_muscesq','div_e_muscesq','obs_e_muscesq',2);
                    evaluar_para_carga_detalle('e_o_sent','div_e_o_sent','obs_e_o_sent',2);

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



