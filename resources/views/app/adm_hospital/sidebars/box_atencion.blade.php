<div id="side_box_atencion" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg"
    data-width="370px" data-offset="true">
    <header class="bs-canvas-header p-3 bg-info overflow-auto">
        <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true"
                class="text-light">&times;</span></button>
        <h5 class="d-inline-block text-light mb-0 float-right mt-1">BOX ATENCIÓN</h5>
    </header>
    <div class="bs-canvas-content">
     
        <div class="accordion" id="side_bar_boxes">
            @foreach($boxes as $box)
            <div class="card-sidebar">
                <div class="card-header-sidebar" id="heading_form_generales">
                    <h2 class="mb-0 ">
                        <button class="btn {{ $box->alerta == 1 ? 'btn-danger' : '' }} btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapse_pacientes_box{{ $box->id }}" aria-expanded="true"
                            aria-controls="collapse_pacientes_box{{ $box->id }}"><i
                                class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                {{ $box->numero_box }} - {{ $box->tipo_box }}
                        </button>
                    </h2>
                </div>
            </div>
            <div id="collapse_pacientes_box{{ $box->id }}" class="collapse" aria-labelledby="heading_form_generales" data-parent="#side_bar_boxes">
                <div class="card-body-sidebar">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Pacientes en espera</h5>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-sm">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Triage</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Edad</th>
                                                    <th scope="col">Hora</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($box->pacientes->count() == 0)
                                                <tr>
                                                    <td colspan="4" class="text-center">No hay pacientes en espera</td>
                                                </tr>
                                                @endif
                                                
                                                @foreach($box->pacientes as $p)
                                                <tr>
                                                    <td class="{{ $p->clase_html }} text-white">{{ $p->codigo }}</td>
                                                    <td>{{ $p->nombres }} {{ $p->apellido_uno }} {{ $p->apellido_dos }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($p->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}</td>
                                                    <td>{{ $p->hora }}</td>
                                                    
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

       
        <div class="accordion d-none" id="accordion_side_bar">
            <div class="card-sidebar">
                <div class="card-header-sidebar" id="heading_form_generales">
                    <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapse_form_generales" aria-expanded="true"
                            aria-controls="collapse_form_generales"><i
                                class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            FORMULARIOS GENERALES
                        </button>
                    </h2>
                </div>
                <div id="collapse_form_generales" class="collapse" aria-labelledby="heading_form_generales" data-parent="#accordion_side_bar">
                   
                    <div class="card-body-sidebar">
                        <!--Boton Modal Formulario certificado de reposo-->
                        @if (auth()->user()->can('profesional.premium.pacientes.reposo_medico'))
                            <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_certificado_reposo">
                                + Certificado de reposo
                            </button>
                        @else
                            <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_certificado_reposo">
                                + Certificado de reposo
                            </button>
                        @endif

                        @if (auth()->user()->can('profesional.premium.pacientes.interconsulta'))
                            <!--Boton Modal Formulario de interconsulta-->
                            <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_interconsulta">
                                + Crear Interconsulta
                            </button>
                        @else
                            <!--Boton Modal Formulario de interconsulta-->
                            <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_interconsulta">
                                + Crear Interconsulta
                            </button>
                        @endif

                        @if (auth()->user()->can('profesional.premium.pacientes.interconsulta'))
                            <!--Boton Modal Formulario de interconsulta respuesta-->
                            @if($interconsulta)
                                <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_interconsulta_respuesta">
                                    + Responder Interconsulta
                                </button>
                            @else
                                <button type="button" class="btn btn-sm btn-info btn-block text-left  disabled" style="cursor: not-allowed;">
                                    + Responder Interconsulta
                                </button>
                            @endif
                        @else
                            <!--Boton Modal Formulario de interconsulta respuesta-->
                            {{--  @if($interconsulta)  --}}
                                <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_interconsulta_respuesta">
                                    + Responder Interconsulta
                                </button>
                            {{--  @else  --}}
                                <button type="button" class="btn btn-sm btn-info btn-block text-left  disabled" style="cursor: not-allowed;">
                                    + Responder Interconsulta
                                </button>
                            {{--  @endif  --}}
                        @endif

                        @if (auth()->user()->can('profesional.premium.pacientes.informe_medico'))
                            <!--Boton Modal Formulario de informe médico-->
                            <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_inf_medico">
                                + Informe Médico
                            </button>
                        @else
                            <!--Boton Modal Formulario de informe médico-->
                            <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_inf_medico">
                                + Informe Médico
                            </button>
                        @endif

                        @if (auth()->user()->can('profesional.premium.pacientes.uso_personal'))
                            <!--Boton Modal formulario uso personal-->
                            <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_uso_personal">
                                + Uso Personal
                            </button>
                        @else
                            <!--Boton Modal formulario uso personal-->
                            <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_uso_personal">
                                + Uso Personal
                            </button>
                        @endif
                    </div>
                </div>
            </div>
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

                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="test_alcohol()";>+ Exámen alcoholemia</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="test_drogas()";>+ Test de Drogas</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="";>+ Otros</button>
                    </div>
                </div>
                @include('page.general.sidebar.modal_form_generales.m_alcoholemia')
                @include('page.general.sidebar.modal_form_generales.m_adrogas')
            </div>
            <div class="card-sidebar">
                <div class="card-header-sidebar" id="heading_form_notificaciones">
                    <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapse_form_notificaciones" aria-expanded="false"
                            aria-controls="collapse_form_notificaciones"><i
                                class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            FORMULARIOS DE NOTIFICACIÓN
                        </button>
                    </h2>
                </div>
                <div id="collapse_form_notificaciones" class="collapse"
                    aria-labelledby="heading_form_notificaciones" data-parent="#accordion_side_bar">
                    <div class="card-body-sidebar">
                        <!--Boton Modal Formulario Constancia Ges-->
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="agregar_ges()";>+ Constancia Ges</button>

                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="agregar_eno()";>+ Constancia Eno</button>

                            
                        {{--  <!--Boton Modal Formulario Reembolso Médico-->
                        <button type="button"
                            class="btn btn-sm btn-info btn-block text-left accion_modal_reembolso_medico">+ Reembolso Gastos
                            Médicos</button>  --}}

                        <!--Boton Modal Formulario Reembolso Dental
                        <button type="button"
                            class="btn btn-sm btn-info btn-block text-left accion_modal_reembolso_dental">+ Reembolso Gastos
                            Dentales</button>-->
                    </div>
                     {{--  @include('page.general.sidebar.modal_form_generales.modal_declaraciones_eno')    --}}
                     {{--  @include('page.general.sidebar.modal_form_generales.modal_ges')  --}}
                </div>
            </div>
           <!-- SECCION CONSENTIMIENTOS -->

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
                @include("page.general.modal.m_ucodigofonasa")
                @include("page.general.modal.m_uimc")
            </div>
            @include('page.general.sidebar.seccion_consentimientos')
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
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ind_amig()";>+ Indicaciones Cuidados Post Amigdalectomía</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ind_timp()";>+ Indicaciones Cuidados Post Timpanoplastias</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ind_rino()";>+ Indicaciones Cuidados Post Rinoseptoplastias</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="icirugia()";>+ Indicaciones post cirugía En General</button>
                    </div>
                </div>

                {{--  @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.recom_amig")
                @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.recom_rino")
                @include("general.modal.m_cuidados_cirugia")
                @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.recom_timp")  --}}

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
                    </div>
                </div>
                {{--  @include("page.general.hospitalizacion.modals.in_solic_pabellon")  --}}
                @include("page.general.hospitalizacion.modals.ingreso_hosp")
                @include("page.general.modal.m_req_ingreso")
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
                @include("page.general.modal.m_form_faltante")
                @include("page.general.modal.m_sugerencias")
                @include("page.general.modal.m_consent_faltante")
            </div>
        </div>
    </div>

</div>