    <!--Sidebar 3 (otorrino)-->

    <div class="position-fixed w-100 h-100"></div>

    <div id="formularios_orl" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg" data-width="370px" data-offset="true">

        <header class="bs-canvas-header p-3 bg-info overflow-auto d-flex justify-content-between">

             <button type="button" class="bs-canvas-close close" onclick="$('#formularios_orl').modal('hide')" aria-label="Close" data-dismiss="modal"> <span aria-hidden="true" class="text-white">&times;</span></button>

            <h5 class="d-inline-block text-light mb-0">Formularios Hospital Ambulatorio</h5>

        </header>

        <div class="bs-canvas-content">

                <div class="accordion" id="accordion_side_bar">

                    {{--  <div class="card-sidebar">

                        <div class="card-header-sidebar" id="heading_solicitud_examenes">

                            <h2 class="mb-0">

                                <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_solicitud_examenes" aria-expanded="true" aria-controls="collapse_solicitud_examenes"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>

                                SOLICITAR EXÁMENES ESPECÍFICOS

                                </button>

                            </h2>

                        </div>

                        <div id="collapse_solicitud_examenes" class="collapse" aria-labelledby="heading_solicitud_examenes" data-parent="#accordion_side_bar">

                            <div class="card-body-sidebar">



                                <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="i_exa()";>+ SOLICITAR EXÁMENES ESPECÍFICOS 1</button>

                                <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="i_ex()";>+ SOLICITAR EXÁMENES ESPECÍFICOS 2</button>

                                <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="i_()";>+ SOLICITAR EXÁMENES ESPECÍFICOS 3</button>

                            </div>

                        </div>

                    </div>  --}}



                  <div class="accordion" id="accordion_side_bar">

                    <div class="card-header-sidebar" id="heading_consentimientos_informados">

                        <h2 class="mb-0">

                            <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_consentimientos_informados" aria-expanded="false" aria-controls="collapse_consentimientos_informados"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>

                               CONSENTIMIENTOS INFORMADOS

                            </button>

                        </h2>

                    </div>

                        @include('general.sidebar.seccion_consentimientos')

                        <!-- SECCION CONSENTIMIENTOS -->

                  </div>

                <div class="card-sidebar">

                    <div class="card-header-sidebar" id="heading_utilidades">

                        <h2 class="mb-0">

                        <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_utilidades" aria-expanded="false" aria-controls="collapse_utilidades"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>

                            UTILIDADES

                        </button>

                        </h2>

                    </div>

                    <div id="collapse_utilidades" class="collapse" aria-labelledby="heading_utilidades" data-parent="#accordion_side_bar">

                        <div class="card-body-sidebar">

                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ufonasa()";>+ Buscador código FONASA</button>

                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="imc()";>+ Calculadora de IMC</button>

                        </div>

                    </div>

                    @include("general.modal.m_ucodigofonasa")

                    @include("general.modal.m_uimc")

                </div>



                <div class="card-sidebar">

                    <div class="card-header-sidebar" id="heading_recom">

                        <h2 class="mb-0">

                        <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_recom" aria-expanded="false" aria-controls="collapse_recom"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>

                        INDICACIONES A PACIENTES

                        </button>

                        </h2>

                    </div>

                    <div id="collapse_recom" class="collapse" aria-labelledby="heading_recom" data-parent="#accordion_side_bar">

                        <div class="card-body-sidebar">

                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="indic_period_gen()";>+ Indicaciones Cuidados formación de placa bacteriana</button>

                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ind_timp()";>+ Indicaciones Cuidados Post Timpanoplastias</button>

                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ind_rino()";>+ Indicaciones Cuidados Post Rinoseptoplastias</button>

                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="icirugia()";>+ Indicaciones post cirugía En General</button>

                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="cuidados_hda_op()";>+ Indicaciones cuidado herida operatoria</button>

                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ind_rge()";>+ Recomendaciones Paciente con RGE</button>

                        </div>

                    </div>



                    @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.recom_amig")

                    @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.recom_rino")

                    @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_recomendaciones_reflujo")

                    @include("atencion_medica.formularios.modal_atencion_especialidad.cirugia.modal_cuidados_herida_operatoria")

                    @include("general.modal.m_cuidados_cirugia")

                    @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.recom_timp")







                </div>

                 <div class="card-sidebar">

                    <div class="card-header-sidebar" id="heading_hosp">

                        <h2 class="mb-0">

                        <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_hosp" aria-expanded="false" aria-controls="collapse_hosp"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>

                        FORMULARIOS DE HOSPITALIZACIÓN

                        </button>

                        </h2>

                    </div>

                    <div id="collapse_hosp" class="collapse" aria-labelledby="headinghospm" data-parent="#accordion_side_bar">
                        <div class="card-body-sidebar">
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="sol_pabellon()";>+ Solicitud Pabellón</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ingresohosp()";>+ Hospitalización </button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="r_ingreso()";>+ Requisitos de ingreso</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ingresoequipo()">+ Equipo quirúrgico</button>
                        </div>
                    </div>
                    @include("general.hospitalizacion.modals.in_solic_pabellon")
                    @include("general.hospitalizacion.modals.ingreso_hosp")
                    @include("general.modal.m_req_ingreso")
                    @include("general.modal.m_equipo_quirurgico")

                </div>

                <div class="card-sidebar">

                    <div class="card-header-sidebar" id="heading_sugerencias">

                        <h2 class="mb-0">

                        <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_sugerencias" aria-expanded="false" aria-controls="collapse_sugerencias"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>

                            AYUDENOS A MEJORAR

                        </button>

                        </h2>

                    </div>

                    <div id="collapse_sugerencias" class="collapse" aria-labelledby="heading_sugerencias" data-parent="#accordion_side_bar">

                        <div class="card-body-sidebar">

                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="c_faltante()";>+ Consentimiento  faltante</button>

                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="f_faltante()";>+ formulario faltante</button>

                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="sugerencias()";>+ Sugerencias</button>

                                                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="medicamentos_faltantes();">+ Medicamentos faltantes</button>

                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="examenes_faltantes();">+ Exámenes faltantes</button>

                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="reportar_falla();">+ Reportar Falla</button>

                            <button type="button" class="btn btn-danger btn-sm btn-block text-left" onclick="abrir_modal_nueva_ram('')">

                                <i class="feather icon-plus-circle"></i> Nueva Denuncia RAM

                            </button>

                        </div>

                    </div>

                    @include("general.modal.m_form_faltante")

                    @include("general.modal.m_sugerencias")

                    @include("general.modal.m_consent_faltante")

                        @include("general.modal.m_medicamentos_faltantes")

                    @include("general.modal.m_examenes_faltantes")

                    @include("general.modal.m_reportar_falla")

                    @include("general.modal.m_denuncia_ram")

                </div>

            </div>

        </div>

    </div>

    <!--SIDEBAR 3 (Otorrino)-->



    <!--MODALS SIDE BAR GENERALES-->

    {{-- @include('atencion_medica.modales') --}}





    @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_exbiopsia_orl")



    @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_exradiologico_orl")





