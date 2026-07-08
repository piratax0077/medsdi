<div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 ">
        <div class="row mx-0">
            <div class="col-md-12">
                <input type="hidden" name="tipo_examen_especial" id="tipo_examen_especial" value="{{ $lista_examen_especial }}">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="gine" role="tablist">
                    @php
                        $cantida_ex_esp = 0;
                    @endphp
                    @foreach ($examen_tipo as $ex_tipo)
                        @php
                            $activo = '';
                            if($cantida_ex_esp == 0)
                            {
                                $cantida_ex_esp++;
                                $activo = 'active';
                            }
                            else
                                $activo = '';
                        @endphp
                        <li class="nav-item-secciones">
                            <a class="nav-secciones {{ $activo }} text-uppercase" id="{{ $ex_tipo->ExamenEspecialidadTemplate->alias }}_tab" data-toggle="tab" href="#{{ $ex_tipo->ExamenEspecialidadTemplate->alias }}" role="tab" aria-controls="{{ $ex_tipo->ExamenEspecialidadTemplate->alias }}" aria-selected="true">{{ $ex_tipo->nombre }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!-----------------------EXAMEN PARA REEMPLAZAR EN BASE DE DATOS------------------------------------>
{{-- <div class="tab-content" id="gine-contenido"> --}}
    {{-- <!--ECO GINECOLÓGICA-->
    <div class="tab-pane fade active show" id="eco_gine" role="tabpanel" aria-labelledby="eco_gine_tab">
        <!--MOTIVO DEL EXAMEN-->
        <div class="form-row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header-new-md">
                        <h5><i class="feather icon-info icono-primary"></i>Motivo del examen</h5>
                    </div>
                    <div class="card-body">
                         <!-- inicio Motivo examen -->
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <input type="hidden" name="solicitado_id_profesional_eco_gine" id="solicitado_id_profesional_eco_gine" value="">
                                <label class="floating-label-activo-sm" for="solicitado_rut_eco_gine">RUT</label>
                                <input type="text" class="form-control form-control-sm" name="solicitado_rut_eco_gine" id="solicitado_rut_eco_gine" oninput="formatoRut(this)" onblur="cargar_profesional(this, 'solicitado_por_eco_gine', 'solicitado_id_profesional_eco_gine', 'div_profesional_no_inscrito', 'solicitado_nombre_eco_gine', 'solicitado_apellido_eco_gine', 'solicitado_telefono_eco_gine', 'solicitado_email_eco_gine', 'div_mensaje_eco_gine', 'mensaje_solicitado_por_eco_gine');" onchange="cargar_profesional(rut, 'solicitado_por_eco_gine', 'solicitado_id_profesional_eco_gine', 'div_profesional_no_inscrito', 'solicitado_nombre_eco_gine', 'solicitado_apellido_eco_gine', 'solicitado_telefono_eco_gine', 'solicitado_email_eco_gine', 'div_mensaje_eco_gine', 'mensaje_solicitado_por_eco_gine');" onkeyup="cargar_profesional(rut, 'solicitado_por_eco_gine', 'solicitado_id_profesional_eco_gine', 'div_profesional_no_inscrito', 'solicitado_nombre_eco_gine', 'solicitado_apellido_eco_gine', 'solicitado_telefono_eco_gine', 'solicitado_email_eco_gine', 'div_mensaje_eco_gine', 'mensaje_solicitado_por_eco_gine');">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm" for="solicitado_por_eco_gine">Solicitado por</label>
                                <input type="text" class="form-control form-control-sm" name="solicitado_por_eco_gine" id="solicitado_por_eco_gine" readonly="readonly">
                            </div>

                            <div class="form-group col-md-4">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm" for="mot_examen_eco_gine">Motivo del Examen</label>
                                    <select class="form-control form-control-sm" id="mot_examen_eco_gine" name="mot_examen_eco_gine" onchange="evaluar_para_carga_detalle('mot_examen_eco_gine','div_mot_examen_eco_gine','descripcion_motivo_eco_gine',4)">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Examen de Rutina</option>
                                        <option value="2">Control Embarazo Normal</option>
                                        <option value="3">Control Embarazo Patológico</option>
                                        <option value="4">Otro</option>
                                    </select>
                                </div>

                                <div class="form-group" id="div_mot_examen_eco_gine" style="display:none">
                                    <label class="floating-label-activo-sm" for="descripcion_motivo_eco_gine">Motivo Examen (Escriba Motivo) </label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="descripcion_motivo_eco_gine" id="descripcion_motivo_eco_gine"></textarea>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="floating-label-activo-sm" for="antec_especialidad_eco_gine">Antecedentes Especialidad</label>
                                <input type="text" class="form-control form-control-sm" data-input_igual="antec_especialidad" name="antec_especialidad_eco_gine" id="antec_especialidad_eco_gine" onchange="cargarIgual('antec_especialidad_eco_gine');">
                            </div>

                            <div class="form-group col-md-12" id="div_mensaje_eco_gine" style="display: none;">
                                <span style="font-size: 10px;color: #ff0808;" id="mensaje_solicitado_por_eco_gine"></span>
                            </div>
                        </div>
                        <div class="form-row" id="div_profesional_no_inscrito" style="display: none;">
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm" for="solicitado_nombre_eco_gine">Nombre</label>
                                <input type="text" class="form-control form-control-sm" name="solicitado_nombre_eco_gine" id="solicitado_nombre_eco_gine" onchange="actualizar_solicitado_por('solicitado_por_eco_gine', 'solicitado_nombre_eco_gine', 'solicitado_apellido_eco_gine');">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm" for="solicitado_apellido_eco_gine">Apellido</label>
                                <input type="text" class="form-control form-control-sm" name="solicitado_apellido_eco_gine" id="solicitado_apellido_eco_gine" onchange="actualizar_solicitado_por('solicitado_por_eco_gine', 'solicitado_nombre_eco_gine', 'solicitado_apellido_eco_gine');">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm" for="solicitado_telefono_eco_gine">Teléfono</label>
                                <input type="text" class="form-control form-control-sm" name="solicitado_telefono_eco_gine" id="solicitado_telefono_eco_gine">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm" for="solicitado_email_eco_gine">Email</label>
                                <input type="text" class="form-control form-control-sm" name="solicitado_email_eco_gine" id="solicitado_email_eco_gine">
                            </div>
                        </div>
                        <!-- cierre Motivo examen -->
                    </div>
                </div>
            </div>
        </div>
         <!--ECO GINECOLÓGICA-->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header-new-md">
                        <h5><i class="feather icon-edit-2 icono-primary"></i>Ecografía ginecológica</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4" id="">
                                <label class="floating-label-activo-sm" for="tipo">Tipo de Ecografía</label>
                                <div class="form-group">
                                    <select class="form-control form-control-sm" id="tipo_eco_gine" name="tipo_eco_gine">
                                        <option value="">Seleccione examen</option>
                                        <option value="Trans-vaginal">Trans-vaginal</option>
                                        <option value="Abdominal">Abdominal</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                         <div class="form-row mb-4">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <h5 class="f-16 mb-0 font-weight-bold text-dark"><i class="feather icon-paperclip"></i> Adjunte Imágenes y/o Documentos</h5>
                                <div>
                                    <div class="dropzone dz-clickable" id="mis-archivos-eco-gine" action="{{ route('profesional.imagen.carga') }}"><div class="dz-default dz-message"><button class="dz-button" type="button"><i class="feather icon-paperclip"></i> Arrastra imagenes o documentos aquí o haz clic para seleccionarlos</button></div></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm" for="general_eco_gine">Utero</label>
                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="general_eco_gine" id="general_eco_gine" placeholder="Comentarios Generales"></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm" for="endometrio_eco_gine">Endometrio</label>
                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="endometrio_eco_gine" id="endometrio_eco_gine" placeholder="Comentarios"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm" for="ovario_der_eco_gine">Ovarios</label>
                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="ovario_der_eco_gine" id="ovario_der_eco_gine" placeholder="Comentarios"></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm" for="trompa_der_eco_gine">Tropas</label>
                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="trompa_der_eco_gine" id="trompa_der_eco_gine" placeholder="Comentarios"></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm" for="fondo_saco_eco_gine">Fondo de Saco</label>
                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="fondo_saco_eco_gine" id="fondo_saco_eco_gine" placeholder="Comentarios"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header-new-md">
                        <h5><i class="feather icon-clipboard icono-primary"></i>Conclusión y Observaciones del examen</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <label class="floating-label-activo-sm" for="diag_endos_eco_gine">Conclusión del examen</label>
                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="diag_endos_eco_gine" id="diag_endos_eco_gine" placeholder="Comentarios"></textarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <label class="floating-label-activo-sm" for="obs_eco">Observaciones</label>
                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="observacion_eco_gine" id="observacion_eco_gine" placeholder="Comentarios"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--CIERRE: ECO GINECOLÓGICA--> --}}

    {{-- <!--ECO OBSTÉTRICA-->
    <div class="tab-pane fade " id="eco_obst" role="tabpanel" aria-labelledby="eco_obst_tab">
        <!--MOTIVO DEL EXAMEN-->
        <div class="form-row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header-new-md">
                        <h5><i class="feather icon-info icono-primary"></i>Motivo del examen</h5>
                    </div>
                    <div class="card-body">
                         <div class="form-row">
                            <div class="form-group col-md-2">
                                <input type="hidden" name="solicitado_id_profesional_eco_obst" id="solicitado_id_profesional_eco_obst" value="">
                                <label class="floating-label-activo-sm" for="solicitado_rut_eco_obst">RUT</label>
                                <input type="text" class="form-control form-control-sm" name="solicitado_rut_eco_obst" id="solicitado_rut_eco_obst" oninput="formatoRut(this)" onblur="cargar_profesional(this, 'solicitado_por_eco_obst', 'solicitado_id_profesional_eco_obst', 'div_profesional_no_inscrito_eco_obst', 'solicitado_nombre_eco_obst', 'solicitado_apellido_eco_obst', 'solicitado_telefono_eco_obst', 'solicitado_email_eco_obst', 'div_mensaje_eco_obst', 'mensaje_solicitado_por_eco_obst');" onchange="cargar_profesional(rut, 'solicitado_por_eco_obst', 'solicitado_id_profesional_eco_obst', 'div_profesional_no_inscrito_eco_obst', 'solicitado_nombre_eco_obst', 'solicitado_apellido_eco_obst', 'solicitado_telefono_eco_obst', 'solicitado_email_eco_obst', 'div_mensaje_eco_obst', 'mensaje_solicitado_por_eco_obst');" onkeyup="cargar_profesional(rut, 'solicitado_por_eco_obst', 'solicitado_id_profesional_eco_obst', 'div_profesional_no_inscrito_eco_obst', 'solicitado_nombre_eco_obst', 'solicitado_apellido_eco_obst', 'solicitado_telefono_eco_obst', 'solicitado_email_eco_obst', 'div_mensaje_eco_obst', 'mensaje_solicitado_por_eco_obst');">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm" for="solicitado_por_eco_obst">Solicitado por</label>
                                <input type="text" class="form-control form-control-sm" name="solicitado_por_eco_obst" id="solicitado_por_eco_obst" readonly="readonly">
                            </div>

                            <div class="form-group col-md-4">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm" for="mot_examen_eco_obst">Motivo del Examen</label>
                                    <select class="form-control form-control-sm" id="mot_examen_eco_obst" name="mot_examen_eco_obst" onchange="evaluar_para_carga_detalle('mot_examen_eco_obst','div_mot_examen_eco_obst','descripcion_motivo_eco_obst',4)">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Examen de Rutina</option>
                                        <option value="2">Control Embarazo Normal</option>
                                        <option value="3">Control Embarazo Patológico</option>
                                        <option value="4">Otro</option>
                                    </select>
                                </div>

                                <div class="form-group" id="div_mot_examen_eco_obst" style="display:none">
                                    <label class="floating-label-activo-sm" for="descripcion_motivo_eco_obst">Motivo Examen <i>(Anote Motivo)</i> </label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="descripcion_motivo_eco_obst" id="descripcion_motivo_eco_obst"></textarea>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="floating-label-activo-sm" for="antec_especialidad_eco_obst">Antecedentes Especialidad</label>
                                <input type="text" class="form-control form-control-sm" data-input_igual="antec_especialidad" name="antec_especialidad_eco_obst" id="antec_especialidad_eco_obst" onchange="cargarIgual('antec_especialidad_eco_obst');">
                            </div>

                            <div class="form-group col-md-12" id="div_mensaje_eco_obst" style="display: none;">
                                <span style="font-size: 10px;color: #ff0808;" id="mensaje_solicitado_por_eco_obst"></span>
                            </div>
                        </div>
                        <div class="form-row" id="div_profesional_no_inscrito_eco_obst" style="display: none;">
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm" for="solicitado_nombre_eco_obst">Nombre</label>
                                <input type="text" class="form-control form-control-sm" name="solicitado_nombre_eco_obst" id="solicitado_nombre_eco_obst" onchange="actualizar_solicitado_por('solicitado_por_eco_obst', 'solicitado_nombre_eco_obst', 'solicitado_apellido_eco_obst');">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm" for="solicitado_apellido_eco_obst">Apellido</label>
                                <input type="text" class="form-control form-control-sm" name="solicitado_apellido_eco_obst" id="solicitado_apellido_eco_obst" onchange="actualizar_solicitado_por('solicitado_por_eco_obst', 'solicitado_nombre_eco_obst', 'solicitado_apellido_eco_obst');">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm" for="solicitado_telefono_eco_obst">Telefono</label>
                                <input type="text" class="form-control form-control-sm" name="solicitado_telefono_eco_obst" id="solicitado_telefono_eco_obst">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm" for="solicitado_email_eco_obst">Email</label>
                                <input type="text" class="form-control form-control-sm" name="solicitado_email_eco_obst" id="solicitado_email_eco_obst">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--ECO OBSTÉTRICA-->
        <div class="form-row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header-new-md">
                        <h5><i class="feather icon-edit-2 icono-primary"></i>Ecografía Obstétrica</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4" id="">
                                <label class="floating-label-activo-sm" for="tipo_eco_obst">Tipo de Ecografía</label>
                                <select class="form-control form-control-sm" id="tipo_eco_obst" name="tipo_eco_obst">
                                    <option>Seleccione</option>
                                    <option>Trans-vaginal</option>
                                    <option>Abdominal</option>
                                </select>
                            </div>
                        </div>

                         <div class="form-row mb-4">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <h5 class="f-16 mb-0 font-weight-bold text-dark"><i class="feather icon-paperclip"></i> Adjunte Imágenes y/o Documentos</h5>
                                <div>
                                    <div class="dropzone dz-clickable" id="mis-archivos-eco-obst" action="{{ route('profesional.imagen.carga') }}"><div class="dz-default dz-message"><button class="dz-button" type="button"><i class="feather icon-paperclip"></i> Arrastra imagenes o documentos aquí o haz clic para seleccionarlos</button></div></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm" for="fur_eco_obst">FUR</label>
                                <input type="date" class="form-control form-control-sm" name="fur_eco_obst" id="fur_eco_obst">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm" for="fpp_eco_obst">FPP</label>
                                <input type="date" class="form-control form-control-sm" name="fpp_eco_obst" id="fpp_eco_obst">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm" for="e_gest_eco_obst">Edad gestacional</label>
                                <input type="text" class="form-control form-control-sm" name="e_gest_eco_obst" id="e_gest_eco_obst">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm" for="num_gest_eco_obst">Nº de gestación</label>
                                <input type="text" class="form-control form-control-sm" name="num_gest_eco_obst" id="num_gest_eco_obst">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm" for="lcc_eco_obst">Longitud Cráneo-Caudal</label>
                                <input type="text" class="form-control form-control-sm" name="lcc_eco_obst" id="lcc_eco_obst">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm" for="diametro_cef_eco_obst">Diametro cefálico</label>
                                <input type="text" class="form-control form-control-sm" name="diametro_cef_eco_obst" id="diametro_cef_eco_obst">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm" for="peso_fetal_eco_obst">Estimación del peso fetal</label>
                                <input type="text" class="form-control form-control-sm" name="peso_fetal_eco_obst" id="peso_fetal_eco_obst">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm" for="edad_ecografia_eco_obst">Edad gestacional por ecografía</label>
                                    <input type="text" class="form-control form-control-sm" name="edad_ecografia_eco_obst" id="edad_ecografia_eco_obst">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm" for="placenta_eco_obst">Placenta</label>
                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="placenta_eco_obst" id="placenta_eco_obst"></textarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm" for="liq_amniotico_eco_obst">Liquido amniótico</label>
                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="liq_amniotico_eco_obst" id="liq_amniotico_eco_obst"></textarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm" for="sexo_eco_obst">Sexo</label>
                                <div class="form-group fill">
                                    <select class="form-control form-control-sm" id="sexo_eco_obst" name="sexo_eco_obst">
                                        <option>Seleccione</option>
                                        <option>Femenino</option>
                                        <option>Masculino</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="form-row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header-new-md">
                        <h5><i class="feather icon-clipboard icono-primary"></i>Conclusión y Observaciones del examen</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label class="floating-label-activo-sm" for="diag_endos_eco_obst">Diagnóstico Ecográfico</label>
                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="diag_endos_eco_obst" id="diag_endos_eco_obst"></textarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label class="floating-label-activo-sm" for="observacion_eco_obst">Observaciones</label>
                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="observacion_eco_obst" id="observacion_eco_obst"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--CIERRE: ECO OBSTÉTRICA--> --}}

     <!--PROCEDIMIENTOS-->
    {{-- <div class="tab-pane fade " id="proced" role="tabpanel" aria-labelledby="proced_tab">
        <!--MOTIVO DEL EXAMEN-->
        <div class="form-row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header-new-md">
                        <h5><i class="feather icon-info icono-primary"></i>Motivo del examen</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                <div class="form-group col-md-2">
                    <input type="hidden" name="solicitado_id_profesional_proced" id="solicitado_id_profesional_proced" value="">
                    <label class="floating-label-activo-sm" for="solicitado_rut_proced">RUT</label>
                    <input type="text" class="form-control form-control-sm" name="solicitado_rut_proced" id="solicitado_rut_proced" oninput="formatoRut(this)" onblur="cargar_profesional(this, 'solicitado_por_proced', 'solicitado_id_profesional_proced', 'div_profesional_no_inscrito_proced', 'solicitado_nombre_proced', 'solicitado_apellido_proced', 'solicitado_telefono_proced', 'solicitado_email_proced', 'div_mensaje_proced', 'mensaje_solicitado_por_proced');" onchange="cargar_profesional(rut, 'solicitado_por_proced', 'solicitado_id_profesional_proced', 'div_profesional_no_inscrito_proced', 'solicitado_nombre_proced', 'solicitado_apellido_proced', 'solicitado_telefono_proced', 'solicitado_email_proced', 'div_mensaje_proced', 'mensaje_solicitado_por_proced');" onkeyup="cargar_profesional(rut, 'solicitado_por_proced', 'solicitado_id_profesional_proced', 'div_profesional_no_inscrito_proced', 'solicitado_nombre_proced', 'solicitado_apellido_proced', 'solicitado_telefono_proced', 'solicitado_email_proced', 'div_mensaje_proced', 'mensaje_solicitado_por_proced');">
                </div>
                <div class="form-group col-md-2">
                    <label class="floating-label-activo-sm" for="solicitado_por_proced">Solicitado por</label>
                    <input type="text" class="form-control form-control-sm" name="solicitado_por_proced" id="solicitado_por_proced" readonly="readonly">
                </div>

                <div class="form-group col-md-4">
                    <div class="form-group fill">
                        <label class="floating-label-activo-sm" for="mot_examen_proced">Motivo del Examen</label>
                        <select class="form-control form-control-sm" id="mot_examen_proced" name="mot_examen_proced" onchange="evaluar_para_carga_detalle('mot_examen_proced','div_mot_examen_proced','descripcion_motivo_proced',3)">
                            <option value="0">Seleccione</option>
                            <option value="1">Control Rutinario</option>
                            <option value="2">Sospecha de Patología</option>
                            <option value="3">Otro</option>
                        </select>
                    </div>

                    <div class="form-group" id="div_mot_examen_proced" style="display:none">
                        <label class="floating-label-activo-sm" for="descripcion_motivo_proced">Motivo Examen <i>(Anote Motivo)</i> </label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="descripcion_motivo_proced" id="descripcion_motivo_proced"></textarea>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label class="floating-label-activo-sm" for="antec_especialidad_proced">Antecedentes Especialidad</label>
                    <input type="text" class="form-control form-control-sm" data-input_igual="antec_especialidad" name="antec_especialidad_proced" id="antec_especialidad_proced" onchange="cargarIgual('antec_especialidad_proced');">
                </div>

                <div class="form-group col-md-12" id="div_mensaje_proced" style="display: none;">
                    <span style="font-size: 10px;color: #ff0808;" id="mensaje_solicitado_por_proced"></span>
                </div>
            </div>
                    </div>
                </div>
            </div>
        </div>
        <!--PROCEDIMIENTOS-->
        <div class="form-row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header-new-md">
                        <h5><i class="feather icon-edit-2 icono-primary"></i>Procedimientos</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tipo de Procedimiento</label>
                                    <select class="form-control form-control-sm js-example-basic-multiple" id="tipo_proced" name="tipo_proced" onchange="ver_seccion_otros_proc();evaluar_para_carga_detalle('tipo_proced','div_detalle_tipo_proced','otro_tipo_proced',6);" multiple="" tabindex="-1" aria-hidden="false">
                                        <!-- <option value="0" disabled selected>Seleccione</option> -->
                                        <option value="1">Toma Biopsia</option>
                                        <option value="2">Instalación DIU</option>
                                        <option value="3">Cambio DIU</option>
                                        <option value="4">Toma de Muestra PAP</option>
                                        <option value="5">Electro-Cauterio o Radiofrecuencia</option>
                                        <option value="6">Otro</option>
                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                </div>
                                <div class="form-group" id="div_detalle_tipo_proced" style="display:none">
                                    <label class="floating-label-activo-sm">Otro Procedimiento (Describa) </label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="otro_tipo_proced" id="otro_tipo_proced"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-row" style="display:none;" id="div_seccion_biopsia">
                                    <div class="form-group col-md-2">
                                        <h6 class="float-left d-inline mt-2 text-dark f-18">BIOPSIA</h6>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button type="button" class="btn btn-outline-primary btn-block btn-sm mb-2" onclick="sol_biopsia_go();">Tomar Biopsia</button>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label class="floating-label-activo-sm">Observaciones del Procedimiento</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="biopsia_obs_proced" id="biopsia_obs_proced"></textarea>
                                    </div>
                                </div>
                                <div class="form-row" style="" id="div_seccion_pap">
                                    <div class="form-group col-md-2">
                                        <h6 class="float-left d-inline mt-2 text-dark f-18">PAP</h6>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button type="button" class="btn btn-outline-primary btn-block btn-sm mb-2" onclick="toma_pap();">Tomar PAP</button>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label class="floating-label-activo-sm">Observaciones del Procedimiento</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="ex_pap_obs_proced" id="ex_pap_obs_proced"></textarea>
                                    </div>
                                </div>
                                <div class="form-row" style="display: none;" id="div_seccion_diu">
                                    <div class="form-group col-md-2">
                                        <h6 class="float-left d-inline mt-2 text-dark f-18">DIU</h6>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button type="button" class="btn btn-outline-primary btn-block btn-sm mb-2" onclick="anticonc();">Antec DIU</button>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label class="floating-label-activo-sm">Observaciones del Procedimiento</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="ex_diu_proced" id="ex_diu_proced"></textarea>
                                    </div>
                                </div>
                                <div class="form-row" style="display:none;" id="div_seccion_otro_procedimiento">
                                    <div class="form-group col-md-2">
                                        <h6 class="float-left d-inline mt-2 text-dark f-18">Otro Procedimiento</h6>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button type="button" class="btn btn-outline-primary btn-block btn-sm mb-2" onclick="otros_proc();">Antec. Otros Procedimientos</button>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label class="floating-label-activo-sm">Describa Procedimiento y Observaciones</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="3" onfocus="this.rows=5" onblur="this.rows=3;" name="ant_obs_proced" id="ant_obs_proced"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--CIERRE: PROCEDIMIENTOS-->
{{-- </div> --}}
<!-----------------------CIERRE:EXAMEN PARA REEMPLAZAR EN BASE DE DATOS------------------------------------>
<div class="tab-content" id="gine-contenido">

    @php
        $cantida_ex_esp = 0;
    @endphp
    @foreach ($examen_tipo as $ex_tipo)
        @php
            $activo = '';
            if($cantida_ex_esp == 0)
            {
                $cantida_ex_esp++;
                $activo = 'show active';
            }
            else
                $activo = '';
        @endphp
        <div class="tab-pane fade {{ $activo }}" id="{{ $ex_tipo->ExamenEspecialidadTemplate->alias }}" role="tabpanel" aria-labelledby="{{ $ex_tipo->ExamenEspecialidadTemplate->alias }}_tab">
            {!! $ex_tipo->ExamenEspecialidadTemplate->cuerpo !!}
        </div>
    @endforeach

    <!-- MODALES PROCEDIMIENTOS -->
    @include('atencion_gine_obstetricia.formularios.modal_atencion_especialidad.gineco_obst.m_biopsia_go')
    @include('atencion_gine_obstetricia.formularios.modal_atencion_especialidad.gineco_obst.modal_anticonceptivo')
    @include('atencion_gine_obstetricia.formularios.modal_atencion_especialidad.gineco_obst.otros_procedimientos')

</div>

<script>

    // Deshabilitar auto-discover para evitar errores con elementos duplicados o sin URL válida
    Dropzone.autoDiscover = false;

    var myDropzone_eco_gine;
    var myDropzone_eco_obst;

    if (!window.dropzoneInitialized) {
        window.dropzoneInitialized = {};
    }

    $(document).ready(function() {

        /** DROPZONE - ECO GINECOLÓGICA */
        var el_eco_gine = document.getElementById('mis-archivos-eco-gine');
        if (el_eco_gine && !el_eco_gine.dropzone && !window.dropzoneInitialized.misArchivosEcoGine) {
            myDropzone_eco_gine = new Dropzone(el_eco_gine, {
                url: "{{ route('profesional.imagen.carga') }}",
                method: 'post',
                createImageThumbnails: true,
                addRemoveLinks: true,
                headers: { 'X-CSRF-TOKEN': CSRF_TOKEN },
                acceptedFiles: "image/*,.pdf,.doc,.docx",
                maxFilesize: 4,
                maxFiles: 12,
                dictDefaultMessage: "Arrastra imágenes o documentos aquí o haz clic para seleccionarlos.",
                dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",
                dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos.",
                dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",
                dictInvalidFileType: "No puedes subir archivos de este tipo.",
                dictCancelUpload: "Cancelar carga",
                dictUploadCanceled: "Subida cancelada.",
                dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",
                dictRemoveFile: "Eliminar archivo",
                dictMaxFilesExceeded: "No puede cargar más archivos.",
                success: function(file, response) {
                    cargar_lista_imagenes(myDropzone_eco_gine, 'eco_gine');
                    if (file.previewElement) file.previewElement.classList.add("dz-success");
                },
                error: function(file, message) {
                    if (file.previewElement) {
                        file.previewElement.classList.add("dz-error");
                        message = (typeof message !== "string" && message.error) ? message.error : message.message;
                        for (let node of file.previewElement.querySelectorAll("[data-dz-errormessage]")) {
                            node.textContent = message;
                        }
                    }
                },
                removedfile: function(file) {
                    cargar_lista_imagenes(myDropzone_eco_gine, 'eco_gine');
                    if (file.previewElement != null && file.previewElement.parentNode != null) {
                        file.previewElement.parentNode.removeChild(file.previewElement);
                    }
                    return this._updateMaxFilesReachedClass();
                },
                canceled: function(file) {
                    cargar_lista_imagenes(myDropzone_eco_gine, 'eco_gine');
                    return this.emit("error", file, this.options.dictUploadCanceled);
                },
            });
            window.dropzoneInitialized.misArchivosEcoGine = true;
        } else if (el_eco_gine && el_eco_gine.dropzone) {
            myDropzone_eco_gine = el_eco_gine.dropzone;
        }

        /** DROPZONE - ECO OBSTÉTRICA */
        var el_eco_obst = document.getElementById('mis-archivos-eco-obst');
        if (el_eco_obst && !el_eco_obst.dropzone && !window.dropzoneInitialized.misArchivosEcoObst) {
            myDropzone_eco_obst = new Dropzone(el_eco_obst, {
                url: "{{ route('profesional.imagen.carga') }}",
                method: 'post',
                createImageThumbnails: true,
                addRemoveLinks: true,
                headers: { 'X-CSRF-TOKEN': CSRF_TOKEN },
                acceptedFiles: "image/*,.pdf,.doc,.docx",
                maxFilesize: 4,
                maxFiles: 12,
                dictDefaultMessage: "Arrastra imágenes o documentos aquí o haz clic para seleccionarlos.",
                dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",
                dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos.",
                dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",
                dictInvalidFileType: "No puedes subir archivos de este tipo.",
                dictCancelUpload: "Cancelar carga",
                dictUploadCanceled: "Subida cancelada.",
                dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",
                dictRemoveFile: "Eliminar archivo",
                dictMaxFilesExceeded: "No puede cargar más archivos.",
                success: function(file, response) {
                    cargar_lista_imagenes(myDropzone_eco_obst, 'eco_obst');
                    if (file.previewElement) file.previewElement.classList.add("dz-success");
                },
                error: function(file, message) {
                    if (file.previewElement) {
                        file.previewElement.classList.add("dz-error");
                        message = (typeof message !== "string" && message.error) ? message.error : message.message;
                        for (let node of file.previewElement.querySelectorAll("[data-dz-errormessage]")) {
                            node.textContent = message;
                        }
                    }
                },
                removedfile: function(file) {
                    cargar_lista_imagenes(myDropzone_eco_obst, 'eco_obst');
                    if (file.previewElement != null && file.previewElement.parentNode != null) {
                        file.previewElement.parentNode.removeChild(file.previewElement);
                    }
                    return this._updateMaxFilesReachedClass();
                },
                canceled: function(file) {
                    cargar_lista_imagenes(myDropzone_eco_obst, 'eco_obst');
                    return this.emit("error", file, this.options.dictUploadCanceled);
                },
            });
            window.dropzoneInitialized.misArchivosEcoObst = true;
        } else if (el_eco_obst && el_eco_obst.dropzone) {
            myDropzone_eco_obst = el_eco_obst.dropzone;
        }

    });

    function ver_seccion_otros_proc()
    {
        var valor = $('#tipo_proced').val();

        $('#div_seccion_biopsia').hide();
        $('#div_seccion_pap').hide();
        $('#div_seccion_diu').hide();
        $('#div_seccion_otro_procedimiento').hide();

        $.each(valor, function (index, value)
        {
            switch (parseInt(value)) {
                case 1: //Toma Biopsia
                    $('#div_seccion_biopsia').show();
                    // $('#div_seccion_pap').hide();
                    // $('#div_seccion_diu').hide();
                    // $('#div_seccion_otro_procedimiento').hide();
                    break;
                case 2: //Instalación DIU
                    // $('#div_seccion_biopsia').hide();
                    // $('#div_seccion_pap').hide();
                    $('#div_seccion_diu').show();
                    // $('#div_seccion_otro_procedimiento').hide();
                    break;
                case 3: //Cambio DIU
                    // $('#div_seccion_biopsia').hide();
                    // $('#div_seccion_pap').hide();
                    $('#div_seccion_diu').show();

                    // $('#div_seccion_otro_procedimiento').hide();
                    break;
                case 4: //Toma de Muestra PAP
                    // $('#div_seccion_biopsia').show();
                    $('#div_seccion_pap').show();
                    // $('#div_seccion_diu').hide();
                    // $('#div_seccion_otro_procedimiento').hide();
                    break;
                case 5: //Electro-Cauterio o Radiofrecuencia
                    // $('#div_seccion_biopsia').hide();
                    // $('#div_seccion_pap').hide();
                    // $('#div_seccion_diu').hide();
                    $('#div_seccion_otro_procedimiento').show();
                    break;
                case 6: //Otro
                    // $('#div_seccion_biopsia').hide();
                    // $('#div_seccion_pap').hide();
                    // $('#div_seccion_diu').hide();
                    $('#div_seccion_otro_procedimiento').show();
                    break;
                default:
                    // $('#div_seccion_biopsia').hide();
                    // $('#div_seccion_pap').hide();
                    // $('#div_seccion_diu').hide();
                    // $('#div_seccion_otro_procedimiento').hide();
                    break;
            }
        });
    }

</script>
