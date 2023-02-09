@extends('template.template')
@section('Content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--HEADER-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h5 class="text-white d-inline f-16 mt-1"><strong>ATENCIÓN GENERAL</strong></h5>
                                <p class="font-italic mt-0 mb-0 text-white">
                                    @php
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        $fecha = \Carbon\Carbon::parse(now());
                                        $mes = $meses[($fecha->format('n')) - 1];
                                        $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                                    @endphp
                                    {{ $fecha }}
                                </p>
                            </div>
                        </div>
                        {{--
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <button type="button" class="btn btn-outline-light btn-sm d-inline float-md-right mr-4 mb-1">Finalizar atención</button>
                            </div>
                        </div>
                        --}}
                    </div>
                </div>
            </div>
            <!--CIERRE: HEADER-->

            <!-- TAB GENERAL -->
            <div class="user-profile user-card pt-0">
                <div class="card-body py-0">
                    <div class="user-about-block m-0">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-reset active" id="atender-tab" data-toggle="tab" href="#atender" role="tab" aria-controls="atender" aria-selected="true">Atender paciente</a>
                                    </li>
                                    @if (auth()->user()->can('profesional.premium.pacientes.licencia'))
                                        {{--  <li class="nav-item">
                                            <a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#licencia" role="tab" aria-controls="licencia" aria-selected="false">Licencia</a>
                                        </li>  --}}
                                    @else
                                        {{--  <li class="nav-item">
                                            <a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#" role="tab" aria-controls="licencia" aria-selected="false">Licencia</a>
                                        </li>  --}}
                                    @endif

                                    @if (auth()->user()->can('profesional.premium.pacientes.ficha_medica_unica'))
                                        {{--  <li class="nav-item">
                                            <a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#fmu" role="tab" aria-controls="fmu" aria-selected="false">FMU</a>
                                        </li>  --}}
                                    @else
                                        {{--  <li class="nav-item">
                                            <a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#" role="tab" aria-controls="fmu" aria-selected="false">FMU</a>
                                        </li>  --}}
                                    @endif

                                    @if (auth()->user()->can('profesional.premium.pacientes.atenciones_previas'))
                                        <li class="nav-item">
                                            <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false">Historial de Consultas</a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false">Historial de Consultas</a>
                                        </li>
                                    @endif

                                    @if (auth()->user()->can('profesional.premium.pacientes.resultados_examenes'))
                                        {{--  <li class="nav-item">
                                            <a class="nav-link text-reset" id="examenes-tab" data-toggle="tab" href="#examenes" role="tab" aria-controls="examenes" aria-selected="false">Exámenes</a>
                                        </li>  --}}
                                    @else
                                        {{--  <li class="nav-item">
                                            <a class="nav-link text-reset" id="examenes-tab" data-toggle="tab" href="#examenes" role="tab" aria-controls="examenes" aria-selected="false">Exámenes</a>
                                        </li>  --}}
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CIERRE TAB GENERAL-->

            <!--CONTENIDO DE TAB-->
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="at-general">

                        <!--Formulario atencion paciente-->
                        <div class="tab-pane fade show active" id="atender" role="tabpanel" aria-labelledby="atender-tab">
                            @include( 'atencion_medica.formularios.atencion_general_form' )
                        </div>
                        <!--Cierre: Formulario atencion paciente-->

                        <!--Formularios de Licencia-->
                        <div class="tab-pane fade show" id="licencia" role="tabpanel" aria-labelledby="licencia-tab">
                            {{--  @include( 'atencion_medica.formularios.licencia_medica_form' )  --}}
                        </div>
                        <!--Cierre: Formularios de Licencia-->

                        <!--Acceso Ficha Médica Única (FMU)-->
                        <div class="tab-pane fade show" id="fmu" role="tabpanel" aria-labelledby="fmu-tab">
                            {{--  @include( 'atencion_medica.formularios.ficha_medica_unica_form' )  --}}
                        </div>
                        <!--Cierre: Acceso Ficha Médica Única (FMU)-->

                        <!--Atenciones Médicas Previas-->
                        <div class="tab-pane fade show" id="aten-previas" role="tabpanel" aria-labelledby="aten-previas-tab">
                            @include( 'atencion_medica.formularios.atenciones_previas_form' )
                        </div>
                        <!--Cierre: Atenciones Médicas Previas-->

                        <!--Atenciones Resultados Examenes-->
                        <div class="tab-pane fade show" id="examenes" role="tabpanel" aria-labelledby="examenes-tab">
                            {{--  @include( 'atencion_medica.formularios.resultados_examenes_form' )  --}}
                        </div>
                        <!--Cierre: Atenciones Resultados Examenes-->

                    </div>
                </div>
            </div>
            <!--CIERRE CONTENIDO DE TAB-->

            <!-- SIDE BAR  -->
            @include("atencion_medica.modales"){{-- base de botones de sidebar --}}


        </div>
    </div>
@endsection
