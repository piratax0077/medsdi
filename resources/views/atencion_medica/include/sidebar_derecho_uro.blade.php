    <!--Sidebar 3 (UROLOGICOS)-->
    <div class="position-fixed w-100 h-100"></div>
    <div id="formularios_uro" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg" data-width="370px" data-offset="true">
        <header class="bs-canvas-header p-3 bg-info overflow-auto">
            <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true" class="text-white">&times;</span></button>
            <h5 class="d-inline-block text-light mb-0 float-right">Formularios Urológicos</h5>
        </header>
        <div class="bs-canvas-content">
            <div class="accordion" id="accordion_side_bar">
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_solicitud_examenes">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_solicitud_examenes" aria-expanded="true" aria-controls="collapse_solicitud_examenes"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            SOLICITAR EXÁMENES ESPECÍFICOS
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_solicitud_examenes" class="collapse" aria-labelledby="heading_solicitud_examenes" data-parent="#accordion_side_bar">
                         <div class="card-body-sidebar">


                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ex_orina()";>+ Exámenes de orina</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="est_hormo()";>+ Exámenes hormonales</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="rx_uro ()";>+ Orden radiología</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="biopsia()";>+ Biopsias</button>
                         </div>
                    </div>
                </div>

                <!-- SECCION CONSENTIMIENTOS -->
               @include('general.sidebar.seccion_consentimientos')
                {{--<div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_consentimientos_informados">
                        <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_consentimientos_informados" aria-expanded="false" aria-controls="collapse_consentimientos_informados"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            CONSENTIMIENTOS INFORMADOS
                        </button>
                        </h2>
                    </div>
                    <div id="collapse_consentimientos_informados" class="collapse" aria-labelledby="heading_consentimientos_informados" data-parent="#accordion_side_bar">
                        <div class="card-body-sidebar">
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="cons_tto()";>+ Para tratamiento</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="cons_revtto()";>+ Revocación Consentimiento</button>
                        </div>
                        <div class="card-body-sidebar">
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="solalta()";>+ Solicitar Alta Voluntaria</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="rechtto()";>+ Rechazo Tratamiento</button>
                        </div>
                    </div>
					
					@include("atencion_pediatrica.formularios.modal_atencion_general.m_aconsent_tto")
					@include("atencion_pediatrica.formularios.modal_atencion_general.m_revocacionconsent")
					@include("atencion_pediatrica.formularios.modal_atencion_general.m_sol_alta")
					@include("atencion_pediatrica.formularios.modal_atencion_general.m_rech_tto")
                </div>   --}}              


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
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ucalcimc()";>+ Calculadora de IMC</button>
                        </div>
                    </div>
                    @include("atencion_medica.sidebars.modals_generales.m_ucodigofonasa")
                    @include("atencion_medica.sidebars.modals_generales.m_uimc")
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
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="cuidados_uro ()";>+ Indicaciones Cuidados Sistema genito-Urinario</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="i_cistos ()";>+ Indicaciones Examen Cistocopía</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ingreso()";>+ Orden de Hospitalización</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="r_ingreso()";>+ Requisitos de ingreso</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="icirugia()";>+ Indicaciones post cirugía Urológica</button>
                        </div>
                    </div>

                    @include("atencion_medica.sidebars.modals_especialidad.urologia.m_uro_cuidados")
                    @include("atencion_medica.sidebars.modals_especialidad.urologia.m_uro_cistoscopia")
                    @include("atencion_medica.sidebars.modals_generales.ingreso")
                    @include("atencion_medica.sidebars.modals_generales.m_cuidados_cirugia")
                    @include("atencion_medica.sidebars.modals_generales.m_req_ingreso")

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
                        </div>
                    </div>
                    @include("general.sidebar.m_form_faltante")
                    @include("general.sidebar.m_sugerencias")
                    @include("general.sidebar.m_consent_faltante")
                </div>
            </div>
        </div>
    </div>
    <!--FORMULARIOS GENERALES-->


    <!--SIDEBAR 3 (GINECO-OBSTÉTRICOS)-->
        <!--MODALS EXÁMENES ESPECÍFICOS-->

