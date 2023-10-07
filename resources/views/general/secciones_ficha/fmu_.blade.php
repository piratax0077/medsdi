    <div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
        <div class="col-md-12 py-0 px-1 shadow-none">
            <div class="row mx-0">
                <div class="col-md-12">
                </div>
            </div>
            <div class="row mx-1  mt-4">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h4 class="text-c-blue float-left d-inline f-20">Ficha Médica Única</h4>
                    {{--<button type="button" class="btn btn-xs btn-danger d-inline float-right ml-2 mb-2"><i class="feather icon-x"></i> Cerrar</button> --}}
                    {{--<button type="button" class="btn btn-xs btn-primary d-inline float-right ml-2 mb-2"><i class="feather icon-printer"></i> Imprimir</button>--}}
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12  mb-4">
                    <div class="card">
                        <div class="card-body pt-2 pb-2">
                            <div class="row align-middle">
                                <div class="col-sm-12 col-md-2">
                                    <img class="img-fluid wid-70 rounded-circle" src="{{ asset('images/iconos/paciente-f.svg') }}">
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <p><i class="feather icon-user"></i><strong> Paciente</strong> <br><label for="inputEmail4"><span id="nombre">{{$paciente->nombres}} {{$paciente->apellido_uno}} {{$paciente->apellido_dos}}</span><br><strong> Rut:</strong>{{$paciente->rut}}</label>
                                    </p>
                                    <p></p>
                                </div>
                                <div class="col-sm-6  col-md-2">
                                    <p><i class="feather icon-calendar"></i><strong> Edad</strong> <br>{{ $paciente->edad }} <br> {{$paciente->fecha_nac}}</p>
                                </div>
                                <div class="col-sm-6  col-md-2">
                                    <p><i class="feather icon-user"></i><strong> Sexo</strong> <br>{{$paciente->sexo}}</p>
                                </div>
                                <div class="col-sm-6  col-md-3">
                                    <p><i class="feather icon-home"></i><strong> Dirección</strong> <br>Jorge Llanos, 153. Los Andes. Región de Valparaíso <br>{{$paciente->telefono_uno}} / {{$paciente->telefono_dos}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mx-1">
                <!--INFORMACIÓN PACIENTE-->
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-c-blue" style="font-size: 0.9rem!important;">Información del paciente</h6>
                            <hr>
                            <ul>
                                <li><i class="feather icon-droplet"></i><strong> Grupo sanguíneo</strong></li>
                                <li class="text-danger"><span id="grupo_sanguineo" >
                                    b3 Rh +
                                    </span></li>
                            </ul>
                            <ul>
                                <li><i class="feather icon-heart "></i> <strong>Paciente crónico</strong></li>
                                <li>Diabetes</li>
                                <li>Hipertensión</li>
                                <li>Cáncer de colon</li>
                            </ul>
                            <ul>
                                <li><i class=""></i> <strong>Alergias medicamentos</strong></li>
                                <li>Aspirina</li>
                            </ul>
                            <ul>
                                <li><i class=""></i> <strong>Alergias generales</strong></li>
                                <li>aspirina</li>
                            </ul>
                            <ul>
                                <li><i class=""></i> <strong>Cirugías</strong></li>
                                <li>Apendice</li>
                            </ul>
                            <ul>
                                <li><i class=""></i> <strong>Medicamentos de uso crónico</strong></li>
                                <li>vitamina C</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--LADO DERECHO-->
                <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                            <button type="button" class="btn btn-xs btn-primary mb-1" onclick="cirugias_fmu();">Cirugías</button>
                            <button type="button" class="btn btn-xs btn-primary mb-1" onclick="alergias_fmu();">Alergias</button>
                            <button type="button" class="btn btn-xs btn-primary mb-1" onclick="responsables_fmu();"><i class="feather icon-users"></i> Responsables</button>
                            <button type="button" class="btn btn-xs btn-primary mb-1" onclick="confidencial_fmu();"><i class="feather icon-lock"></i> Confidencial</button>
                            <button type="button" class="btn btn-xs btn-primary mb-1" onclick="trat_act_fmu();"><i class="feather icon-file-plus"></i> Tratamientos activos</button>
                            <button type="button" class="btn btn-xs btn-danger mb-1" onclick="c_sos_fmu();"><i class="feather icon-phone"></i> Contacto de emergencia</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 mb-4">
                            <div class="card border-card-primary h-100">
                                <div class="card-body">
                                    <ul>
                                        <li><strong>Tratamientos en curso</strong></li>
                                        <li>No hay registros</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 mb-4">
                            <div class="card border-card-primary h-100">
                                <div class="card-body">
                                    <ul>
                                        <li><strong>Cirugías recientes</strong></li>
                                        <li>No hay registros</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 mb-4">
                            <div class="card border-card-primary h-100">
                                <div class="card-body">
                                    <ul>
                                        <li><strong>Medicamentos recientes</strong></li>
                                        <li>No hay registros</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 mb-4">
                            <div class="card border-card-primary h-100">
                                <div class="card-body">
                                    <ul>
                                        <li><strong>Prótesis y ortesis</strong></li>
                                        <li>No hay registros</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                            <h5 class="text-c-blue">Historia médica</h5>
                        </div>
                        <!--HISTORIAL-->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="enf-cron">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#enf-cron-c" aria-expanded="false" aria-controls="enf-cron-c">
                                    Últimos exámenes
                                    </button>
                                </div>
                                <div id="enf-cron-c" class="collapse" aria-labelledby="enf-cron" data-parent="#mot-consulta">
                                    <div class="card-body-aten-a">
										<div class="row mt-3">
											<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pb-4">
                                                <div class="table-responsive">
													<table id="table_atenciones_profesional" class="display table table-striped table-xs dt-responsive nowrap pb-4" style="width:100%">
														<thead>
															<tr>
																<th class="text-center align-middle">Fecha</th>
																<th class="text-center align-middle">Profesional</th>
																<th class="text-center align-middle">Diagnóstico</th>
																<th class="text-center align-middle">Recetas</th>
																<th class="text-center align-middle">Exámenes</th>
																<!--<th class="text-center align-middle">Archivos </th>
																<th class="text-center align-middle">Ficha</th>-->
															</tr>
														</thead>
														<tbody>
															@if (isset($fichas) && $fichas->count() > 0)
																@foreach ($fichas as $f)
																	<tr>
																		<td>
																			{{ \Carbon\Carbon::parse($f->created_at)->format('d/m/Y') }}
																		</td>

																		<td>{{ $f->profesional->nombre }} {{ $f->profesional->apellido_uno }} {{ $f->profesional->apellido_dos }}<br>
																			@foreach ($especialidad as $esp)
																				@if($esp->id==$f->profesional->id_especialidad)
																				<b>{{ $esp->nombre }}<b><br>
																				@endif
																			@endforeach
																			{{--@foreach ($sub_tipo_especialidad as $sub_esp)
																				@if($sub_esp->id==$f->profesional->id_sub_tipo_especialidad)
																			<b>{{ $sub_esp->nombre }}<b><br>
																				@endif
																			@endforeach --}}
																		</td>

																		<td>{{ $f->hipotesis_diagnostico }}</td>

																		<td class="align-middle">
																			<button type="button" class="btn btn-xs btn-warning-light"  @if (isset($f->id)) onclick="buscar_receta_fmu({{ $f->id }});" @endif><i class="feather icon-file-plus"></i> Ver</button>
																		</td>

																		<td class="align-middle">
																			<button type="button" class="btn btn-xs btn-success-light" @if (isset($f->id)) onclick="buscar_examenes_fmu({{ $f->id }});" @endif><i class="feather icon-activity"></i> Ver</button>
																		</td>
																	</tr>
																@endforeach
															@else
																<span>
																	<h5>no existen registros</h5>
																</span>
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
						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="enf-cron">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#enf-cron-c" aria-expanded="false" aria-controls="enf-cron-c">
                                    Control de enfermedades crónicas
                                    </button>
                                </div>
                                <div id="enf-cron-c" class="collapse" aria-labelledby="enf-cron" data-parent="#mot-consulta">
                                    <div class="card-body-aten-a">
                                        <form>
                                            <div class="form-row">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--HISTORIAL-->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="mot-consulta">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#odonto-c" aria-expanded="false" aria-controls="odonto-c">
                                    Historial odontológico
                                    </button>
                                </div>
                                <div id="odonto-c" class="collapse" aria-labelledby="odonto" data-parent="#mot-consulta">
                                    <div class="card-body-aten-a">
                                        <form>
                                            <div class="form-row">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--HISTORIAL-->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="nino-sano">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#nino-sano-c" aria-expanded="false" aria-controls="nino-sano-c">
                                    Historial de niño sano
                                    </button>
                                </div>
                                <div id="nino-sano-c" class="collapse" aria-labelledby="mot-consulta" data-parent="#nino-sano">
                                    <div class="card-body-aten-a">
                                        <form>
                                            <div class="form-row">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--HISTORIAL-->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="etc">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#etc-c" aria-expanded="false" aria-controls="etc-c">
                                    Historial Médico
                                    </button>
                                </div>
                                <div id="etc-c" class="collapse" aria-labelledby="etc" data-parent="#mot-consulta">
                                    <div class="card-body-aten-a">
                                        <div class="row mt-3">
                                            <div class="col-sm-12 pb-4">
                                                <table id="table_atenciones_profesional" class="display table table-striped table-xs dt-responsive nowrap pb-4" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle">Fecha</th>
                                                            <th class="text-center align-middle">Profesional</th>
                                                            <th class="text-center align-middle">Diagnóstico</th>
                                                            <th class="text-center align-middle">Recetas</th>
                                                            <th class="text-center align-middle">Exámenes</th>
                                                            <!--<th class="text-center align-middle">Archivos </th>
                                                            <th class="text-center align-middle">Ficha</th>-->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (isset($fichas) && $fichas->count() > 0)
                                                            @foreach ($fichas as $f)
                                                                <tr>
                                                                    <td class="text-center align-middle">
                                                                        {{ \Carbon\Carbon::parse($f->created_at)->format('d/m/Y') }}
                                                                    </td>

                                                                    <td class="text-center align-middle">{{ $f->profesional->nombre }} {{ $f->profesional->apellido_uno }} {{ $f->profesional->apellido_dos }}<br>
                                                                        @foreach ($especialidad as $esp)
                                                                            @if($esp->id==$f->profesional->id_especialidad)
                                                                            <b>{{ $esp->nombre }}<b><br>
                                                                            @endif
                                                                        @endforeach
                                                                        {{--@foreach ($sub_tipo_especialidad as $sub_esp)
                                                                            @if($sub_esp->id==$f->profesional->id_sub_tipo_especialidad)
                                                                        <b>{{ $sub_esp->nombre }}<b><br>
                                                                            @endif
                                                                        @endforeach --}}
                                                                    </td>

                                                                    <td class="text-center align-middle">{{ $f->hipotesis_diagnostico }}</td>

                                                                    <td class="text-center align-middle">
                                                                        <a class="badge badge-light-warning"  @if (isset($f->id)) onclick="buscar_receta_fmu({{ $f->id }});" @endif><i class="feather icon-file-plus"></i> Ver</a>
                                                                    </td>

                                                                    <td class="text-center align-middle">
                                                                        <a class="badge badge-light-success" @if (isset($f->id)) onclick="buscar_examenes_fmu({{ $f->id }});" @endif><i class="feather icon-activity"></i> Ver</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <span>
                                                                <h5>no existen registros</h5>
                                                            </span>
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
    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('css/ficha_medica_unica.css') }}">
    <!-- Estilo cards -->
    <link rel="stylesheet" href="{{ asset('css/iconos-sdi.css') }}">





    <style type="text/css">
        .auth-wrapper
        {
            background-color: #f3f3f3!important;
        }
    </style>


    <!-- Tablas ficha médica única-->
    <script src="{{ asset('js/tablas_patologias_cronicas_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_tratamientos_antecedentes_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_odontologia_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_obstetricos_control_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_informacion_confidencial_fmu.js') }}"></script>
    <script src="{{ asset('/js/ficha_medica/main.js') }}"></script>


	<script>
        function formatDate(date)
        {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [day, month, year].join('-');
        }
    </script>


    <!--Modals-->
    @include("general.secciones_ficha.modales_fmu.alergias_fmu")
    @include("general.secciones_ficha.modales_fmu.responsables_fmu")
    @include("general.secciones_ficha.modales_fmu.cirugias_fmu")
    @include("general.secciones_ficha.modales_fmu.confidencial_fmu")
    @include("general.secciones_ficha.modales_fmu.trat_act_fmu")
    @include("general.secciones_ficha.modales_fmu.c_sos_fmu")


    @include("general.secciones_ficha.modales_fmu.hist_medico_recetas_fmu")
    @include("general.secciones_ficha.modales_fmu.hist_medico_exa_fmu")
