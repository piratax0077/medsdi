{{-- @extends('template.otros_profesionales.template_fono') --}}
@extends('template.laboratorio.laboratorio_asistente.template')

@section('page-style')
    <style type="text/css">
        .ng_esp {
            /* Common */
        font : 13px 'Wingdings 3';
            color : #0000ff;
            width: 60px; background-color: #f6faf9; color: #FF0000;text-align:center; font-weight: bold; font-size: x-large;
            background-color: #f6faf9;
            text-align:center;
            font-weight: bold;
            display: block;
            width: 100%;
            padding: 0.4rem 0.5rem 0.3rem 0.5rem!important;
            font-size: 1.0rem;
            font-weight: 400;
            line-height: 1.5;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 3px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        @font-face {
            font-family: 'Wingdings 3';
        }
    </style>
@endsection

@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h5 class="text-white d-inline f-16 mt-1"><strong>ATENCIÓN LABORATORIO: OTORRINOLARINGOLOGÍA</strong></h5>
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
                        <div class="col-md-6">
                            {{--  <div class="page-header-title">
                                <button type="button" class="btn btn-outline-light btn-sm d-inline float-md-right mr-4 mb-1">Finalizar atención</button>
                            </div>  --}}
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!-- TAB ATENCIÓN -->
            <div class="user-profile user-card pt-0">
                <div class="card-body py-0">
                    <div class="user-about-block m-0">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                    @foreach ($procedimientoCentro as $pc)
                                        @switch($pc->tipo_ficha_atencion)
                                            @case(1)
                                                <li class="nav-item">
                                                    <a class="nav-link text-reset active" id="ficha_atenc_gral-tab" data-toggle="tab" href="#ficha_atenc_gral" role="tab" aria-controls="ficha_atenc_gral" aria-selected="true">Atención General</a>
                                                </li>
                                                @break

                                            @case(2)
                                                <li class="nav-item">
                                                    <a class="nav-link text-reset" id="audicion-tab" data-toggle="tab" href="#audicion" role="tab" aria-controls="audicion" aria-selected="false">Audición</a>
                                                </li>
                                                @break

                                            @case(3)
                                                <li class="nav-item">
                                                    <a class="nav-link text-reset" id="equilibrio-tab" data-toggle="tab" href="#equilibrio" role="tab" aria-controls="equilibrio" aria-selected="false">Equilibrio</a>
                                                </li>
                                                @break

                                            @case(4)
                                                <li class="nav-item">
                                                    <a class="nav-link text-reset" id="audif-tab" data-toggle="tab" href="#audif" role="tab" aria-controls="audif" aria-selected="false">Audífonos</a>
                                                </li>
                                                @break
                                            @default
                                                <li class="nav-item">
                                                    <a class="nav-link text-reset active" id="ficha_atenc_gral-tab" data-toggle="tab" href="#ficha_atenc_gral" role="tab" aria-controls="ficha_atenc_gral" aria-selected="true">Atención General</a>
                                                </li>
                                                @break
                                        @endswitch
                                    @endforeach

                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false">Atenciones Previas</a>
                                    </li>

                                    {{-- <li class="nav-item">
                                        <a class="nav-link text-reset active" id="ficha_atenc_gral-tab" data-toggle="tab" href="#ficha_atenc_gral" role="tab" aria-controls="ficha_atenc_gral" aria-selected="true">Atención General</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="audicion-tab" data-toggle="tab" href="#audicion" role="tab" aria-controls="audicion" aria-selected="false">Audición</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="equilibrio-tab" data-toggle="tab" href="#equilibrio" role="tab" aria-controls="equilibrio" aria-selected="false">Equilibrio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="audif-tab" data-toggle="tab" href="#audif" role="tab" aria-controls="audif" aria-selected="false">Audífonos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false">Atenciones Previas</a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tab general-->
            <!--Contenido de tab-->
            <form action="{{ route('ficha.otro.prof.registrar_lab_general') }}" method="POST">
                <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                <input type="hidden" name="id_examen" value="{{ $id_ficha_atencion }}" id="id_examen">
                <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                @csrf

                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="at-tecn_orl">

                            {{-- Atención General --}}
                            <div class="tab-pane fade show active" id="ficha_atenc_gral" role="tabpanel" aria-labelledby="ficha_atenc_gral-tab">
                                <!-- FORMULARIO LAVADO OIDOS-->
                                <div class="row" style="margin-top: 22px;">

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <ul class="nav nav-tabs-secciones mb-3 mt-10" id="orl" role="tablist">
                                        <li class="nav-item-secciones">
                                            <a class="nav-secciones active text-uppercase" id="atenc_gral-tab" data-toggle="tab" href="#atenc_gral" role="tab" aria-controls="atenc_gral" aria-selected="true">Atención especialidad</a>
                                        </li>
                                        <li class="nav-item-secciones">
                                            <a class="nav-secciones text-uppercase" id="eval_ter_voz-tab" data-toggle="tab" href="#eval_ter_voz" role="tab" aria-controls="eval_ter_voz" aria-selected="false">Evaluación y terápia de la Voz</a>
                                        </li>
                                        {{--  <li class="nav-item-secciones">
                                            <a class="nav-secciones text-uppercase" id="otro1-tab" data-toggle="tab" href="#otro1" role="tab" aria-controls="otro1" aria-selected="false">Otro1</a>
                                        </li>  --}}
                                    </ul>
                                </div>
                                <div class="tab-content" id="tecn-orl-contenido">
                                    <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                                    <div class="tab-pane fade show active" id="atenc_gral" role="tabpanel" aria-labelledby="atenc_gral-tab">

                                        <div class="row div_ex_gral_tec_orl">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="card-a">
                                                    <div class="card-body-aten-a">
                                                        <div class="form-row" style="display: none;">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                                                <label class="floating-label-activo-sm">Fecha de examen</label>
                                                                <input type="date" class="form-control form-control-sm" name="fecha_ex" id="fecha_ex" value="{{ date('Y-m-d') }}" readonly>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                                <label class="floating-label-activo-sm">Examinador</label>
                                                                <input type="text" class="form-control form-control-sm" name="profesional" id="profesional" value="Dr. {{ $profesional->apellido_uno }}" readonly>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-7 col-xl-7">
                                                                {{-- <label class="floating-label-activo-sm">Derivado por:</label> --}}
                                                                {{-- <input type="text" class="form-control form-control-sm" name="derivado_por" id="derivado_por" value=""> --}}
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <input type="hidden" name="solicitado_id_profesional_oct_par" id="solicitado_id_profesional_oct_par" value="">
                                                                        <label class="floating-label-activo-sm">Derivado por RUT:</label>
                                                                        <input type="text" class="form-control form-control-sm" name="derivado_por_rut" id="derivado_por_rut" value=""
                                                                            onblur="cargar_profesional(this,'derivado_por', 'solicitado_id_profesional_oct_par', 'div_profesional_no_inscrito');"
                                                                            onkeyup="cargar_profesional(this,'derivado_por', 'solicitado_id_profesional_oct_par', 'div_profesional_no_inscrito');"
                                                                            oninput="formatoRut(this);"
                                                                        >

                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="floating-label-activo-sm">Nombre:</label>
                                                                        <input type="text" class="form-control form-control-sm" name="derivado_por" id="derivado_por" value="">
                                                                    </div>
                                                                    <div class="form-group col-md-12" id="div_mensaje"  style="display: none;">
                                                                        <span style="font-size: 10px;color: #ff0808;" id="mensaje_solicitado_por"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-3" id="div_profesional_no_inscrito" style="display: none;">

                                                                    <div class="form-group col-md-3">
                                                                        <label class="floating-label-activo-sm">Nombre</label>
                                                                        <input type="text" class="form-control form-control-sm"  name="solicitado_nombre_oct_par" id="solicitado_nombre_oct_par" onchange="actualizar_solicitado_por('derivado_por', 'solicitado_nombre_oct_par', 'solicitado_apellido_oct_par');">
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label class="floating-label-activo-sm">Apellido</label>
                                                                        <input type="text" class="form-control form-control-sm"  name="solicitado_apellido_oct_par" id="solicitado_apellido_oct_par" onchange="actualizar_solicitado_por('derivado_por', 'solicitado_nombre_oct_par', 'solicitado_apellido_oct_par');">
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label class="floating-label-activo-sm">Telefono</label>
                                                                        <input type="text" class="form-control form-control-sm"  name="solicitado_telefono_oct_par" id="solicitado_telefono_oct_par" >
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label class="floating-label-activo-sm">Email</label>
                                                                        <input type="text" class="form-control form-control-sm"  name="solicitado_email_oct_par" id="solicitado_email_oct_par" >
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Nombre paciente</label>
                                                                <input type="text" class="form-control form-control-sm" name="nombre_pcte" id="nombre_pcte" value="{{ $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos }}">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                <label class="floating-label-activo-sm">Edad</label>
                                                                <input type="text" class="form-control form-control-sm" name="edad" id="edad" value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->age }}" readonly>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                <label class="floating-label-activo-sm">Rut</label>
                                                                <input type="text" class="form-control form-control-sm" name="rut" id="rut" value="{{ $paciente->rut }}">
                                                            </div>
                                                            <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Dirección</label>
                                                                <input type="text" class="form-control form-control-sm" name="direccion" id="direccion"
                                                                @if (isset($paciente))
                                                                    @if ($paciente->Direccion()->first() != null)
                                                                        value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}"
                                                                    @else
                                                                        value="NO HA REGISTRADO DIRECCIÓN !"
                                                                    @endif
                                                                @else
                                                                    value="NO HA REGISTRADO DIRECCIÓN !"
                                                                @endif
                                                                readonly>
                                                            </div>
                                                            <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Email</label>
                                                                <input type="text" class="form-control form-control-sm" name="email" id="email" value="{{ $paciente->email }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <h5 >LAVADO DE OÍDOS</h5>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Motivo de consulta</label>
                                                                <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ant_especialidad" id="ant_especialidad" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Examen y Observación General Procedimiento</label>
                                                                <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_general" id="obs_general" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                            </div>
                                                        </div>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="card-a">
                                                    <div class="card-header-a" id="sec_carga_archivo">
                                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#sec_carga_archivo_c" aria-expanded="false" aria-controls="sec_carga_archivo_c">
                                                            CARGA DE ARCHIVOS
                                                        </button>
                                                    </div>
                                                    <div id="sec_carga_archivo_c" class="collapse show" aria-labelledby="sec_carga_archivo" data-parent="#sec_carga_archivo">
                                                        <div class="card-body-aten-a">
                                                            <div class="row">
                                                                <input type="hidden" name="input_lista_archivo" id="input_lista_archivo" value="">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <!-- [ Main Content ] start -->
                                                                    <div class="dropzone" id="mis-archivos" action="{{ route('profesional.archivo.carga') }}">
                                                                    </div>
                                                                    <!-- [ file-upload ] end -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="eval_ter_voz" role="tabpanel" aria-labelledby="eval_ter_voz-tab">
                                        <div class="card-a">
                                            <div class="card-body-aten-a">
                                                <div class="form-row" style="display: none;">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                                        <label class="floating-label-activo-sm">Fecha de examen</label>
                                                        <input type="date" class="form-control form-control-sm" name="fecha_ex" id="fecha_ex" value="{{ date('Y-m-d') }}" readonly>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                        <label class="floating-label-activo-sm">Examinador</label>
                                                        <input type="text" class="form-control form-control-sm" name="profesional" id="profesional" value="Dr. {{ $profesional->apellido_uno }}" readonly>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-7 col-xl-7">
                                                        {{-- <label class="floating-label-activo-sm">Derivado por:</label> --}}
                                                        {{-- <input type="text" class="form-control form-control-sm" name="derivado_por" id="derivado_por" value=""> --}}
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <input type="hidden" name="solicitado_id_profesional_oct_par" id="solicitado_id_profesional_oct_par" value="">
                                                                <label class="floating-label-activo-sm">Derivado por RUT:</label>
                                                                <input type="text" class="form-control form-control-sm" name="derivado_por_rut" id="derivado_por_rut" value=""
                                                                    onblur="cargar_profesional(this,'derivado_por', 'solicitado_id_profesional_oct_par', 'div_profesional_no_inscrito');"
                                                                    onkeyup="cargar_profesional(this,'derivado_por', 'solicitado_id_profesional_oct_par', 'div_profesional_no_inscrito');"
                                                                    oninput="formatoRut(this);"
                                                                >

                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="floating-label-activo-sm">Nombre:</label>
                                                                <input type="text" class="form-control form-control-sm" name="derivado_por" id="derivado_por" value="">
                                                            </div>
                                                            <div class="form-group col-md-12" id="div_mensaje"  style="display: none;">
                                                                <span style="font-size: 10px;color: #ff0808;" id="mensaje_solicitado_por"></span>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3" id="div_profesional_no_inscrito" style="display: none;">

                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label-activo-sm">Nombre</label>
                                                                <input type="text" class="form-control form-control-sm"  name="solicitado_nombre_oct_par" id="solicitado_nombre_oct_par" onchange="actualizar_solicitado_por('derivado_por', 'solicitado_nombre_oct_par', 'solicitado_apellido_oct_par');">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label-activo-sm">Apellido</label>
                                                                <input type="text" class="form-control form-control-sm"  name="solicitado_apellido_oct_par" id="solicitado_apellido_oct_par" onchange="actualizar_solicitado_por('derivado_por', 'solicitado_nombre_oct_par', 'solicitado_apellido_oct_par');">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label-activo-sm">Telefono</label>
                                                                <input type="text" class="form-control form-control-sm"  name="solicitado_telefono_oct_par" id="solicitado_telefono_oct_par" >
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label-activo-sm">Email</label>
                                                                <input type="text" class="form-control form-control-sm"  name="solicitado_email_oct_par" id="solicitado_email_oct_par" >
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Nombre paciente</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_pcte" id="nombre_pcte" value="{{ $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                        <label class="floating-label-activo-sm">Edad</label>
                                                        <input type="text" class="form-control form-control-sm" name="edad" id="edad" value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->age }}" readonly>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                        <label class="floating-label-activo-sm">Rut</label>
                                                        <input type="text" class="form-control form-control-sm" name="rut" id="rut" value="{{ $paciente->rut }}">
                                                    </div>
                                                    <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Dirección</label>
                                                        <input type="text" class="form-control form-control-sm" name="direccion" id="direccion"
                                                        @if (isset($paciente))
                                                            @if ($paciente->Direccion()->first() != null)
                                                                value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}"
                                                            @else
                                                                value="NO HA REGISTRADO DIRECCIÓN !"
                                                            @endif
                                                        @else
                                                            value="NO HA REGISTRADO DIRECCIÓN !"
                                                        @endif
                                                        readonly>
                                                    </div>
                                                    <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Email</label>
                                                        <input type="text" class="form-control form-control-sm" name="email" id="email" value="{{ $paciente->email }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <h5 >EVALUACIÓN Y TERÁPIA DE LA VOZ</h5>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label class="floating-label-activo-sm">Motivo de consulta</label>
                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ant_especialidad" id="ant_especialidad" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label class="floating-label-activo-sm">Examen y Observación General de la Voz</label>
                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_general" id="obs_general" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label class="floating-label-activo-sm">Plan de tratamiento</label>
                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_general" id="obs_general" placeholder="Plan de tratamiento"></textarea>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                                        <h5 >TERÁPIA DE LA VOZ</h5>
                                                    </div>
                                                </div>
                                                <div class="form-row" >
                                                    <div class="form-group col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                        <label class="floating-label-activo-sm">Sesión N°</label>
                                                        <input type="date" class="form-control form-control-sm" name="ses_num" id="ses_num">
                                                    </div>
                                                    <div class="form-group col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                        <label class="floating-label-activo-sm">Tipo de terápia </label>
                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_general" id="obs_general" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-row">

                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label class="floating-label-activo-sm">Comentario</label>
                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_general" id="obs_general" placeholder="Plan de tratamiento"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Audición --}}
                            <div class="tab-pane fade show" id="audicion" role="tabpanel" aria-labelledby="audicion-tab">
                                <!-- FORMULARIO EXAMENES AUDITIVOS-->
                                <div class="card-a">
                                    <div class="row" style="margin-top: 22px; ">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div id="id_general_c" class="collapse show" aria-labelledby="id_general" data-parent="#id_general">
                                                <div class="card-body-aten-a">
                                                    <div class="form-row" style="display: none;">
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                                            <label class="floating-label-activo-sm">Fecha de examen</label>
                                                            <input type="date" class="form-control form-control-sm" name="fecha_ex" id="fecha_ex" value="{{ date('Y-m-d') }}" readonly>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                            <label class="floating-label-activo-sm">Examinador</label>
                                                            <input type="text" class="form-control form-control-sm" name="profesional" id="profesional" value="Dr. {{ $profesional->apellido_uno }}" readonly>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-7 col-xl-7">
                                                            {{-- <label class="floating-label-activo-sm">Derivado por:</label> --}}
                                                            {{-- <input type="text" class="form-control form-control-sm" name="derivado_por" id="derivado_por" value=""> --}}
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <input type="hidden" name="solicitado_id_profesional_oct_par" id="solicitado_id_profesional_oct_par" value="">
                                                                    <label class="floating-label-activo-sm">Derivado por RUT:</label>
                                                                    <input type="text" class="form-control form-control-sm" name="derivado_por_rut" id="derivado_por_rut" value=""
                                                                        onblur="cargar_profesional(this,'derivado_por', 'solicitado_id_profesional_oct_par', 'div_profesional_no_inscrito');"
                                                                        onkeyup="cargar_profesional(this,'derivado_por', 'solicitado_id_profesional_oct_par', 'div_profesional_no_inscrito');"
                                                                        oninput="formatoRut(this);"
                                                                    >

                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="floating-label-activo-sm">Nombre:</label>
                                                                    <input type="text" class="form-control form-control-sm" name="derivado_por" id="derivado_por" value="">
                                                                </div>
                                                                <div class="form-group col-md-12" id="div_mensaje"  style="display: none;">
                                                                    <span style="font-size: 10px;color: #ff0808;" id="mensaje_solicitado_por"></span>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3" id="div_profesional_no_inscrito" style="display: none;">

                                                                <div class="form-group col-md-3">
                                                                    <label class="floating-label-activo-sm">Nombre</label>
                                                                    <input type="text" class="form-control form-control-sm"  name="solicitado_nombre_oct_par" id="solicitado_nombre_oct_par" onchange="actualizar_solicitado_por('derivado_por', 'solicitado_nombre_oct_par', 'solicitado_apellido_oct_par');">
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label class="floating-label-activo-sm">Apellido</label>
                                                                    <input type="text" class="form-control form-control-sm"  name="solicitado_apellido_oct_par" id="solicitado_apellido_oct_par" onchange="actualizar_solicitado_por('derivado_por', 'solicitado_nombre_oct_par', 'solicitado_apellido_oct_par');">
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label class="floating-label-activo-sm">Telefono</label>
                                                                    <input type="text" class="form-control form-control-sm"  name="solicitado_telefono_oct_par" id="solicitado_telefono_oct_par" >
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label class="floating-label-activo-sm">Email</label>
                                                                    <input type="text" class="form-control form-control-sm"  name="solicitado_email_oct_par" id="solicitado_email_oct_par" >
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Nombre paciente</label>
                                                            <input type="text" class="form-control form-control-sm" name="nombre_pcte" id="nombre_pcte" value="{{ $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos }}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Edad</label>
                                                            <input type="text" class="form-control form-control-sm" name="edad" id="edad" value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->age }}" readonly>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Rut</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut" id="rut" value="{{ $paciente->rut }}">
                                                        </div>
                                                        <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Dirección</label>
                                                            <input type="text" class="form-control form-control-sm" name="direccion" id="direccion"
                                                            @if (isset($paciente))
                                                                @if ($paciente->Direccion()->first() != null)
                                                                    value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}"
                                                                @else
                                                                    value="NO HA REGISTRADO DIRECCIÓN !"
                                                                @endif
                                                            @else
                                                                value="NO HA REGISTRADO DIRECCIÓN !"
                                                            @endif
                                                            readonly>
                                                        </div>
                                                        <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Email</label>
                                                            <input type="text" class="form-control form-control-sm" name="email" id="email" value="{{ $paciente->email }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <h5 >EXÁMENES AUDICIÓN</h5>
                                                        </div>
                                                    </div>
                                                    <div class="form-row" >
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm" for="aud">Seleccione el o los examenes</label>
                                                            <select class="js-example-basic-multiple select2-dental" name="aud" id="aud" multiple="multiple">
                                                                <option  value="1">  Audiometría Adultos </option>
                                                                <option  value="2">  Audiometría Niños </option>
                                                                <option  value="3">  Impedanciometría</option>
                                                                <option  value="4">  Pruebas de función tubárica</option>
                                                                <option  value="5">  Emisiones Otoacústicas</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Observaciones</label>
                                                            <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ant_especialidad" id="ant_especialidad" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card-a">
                                                            <div class="card-header-a" id="sec_carga_archivo">
                                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#sec_carga_archivo_c" aria-expanded="false" aria-controls="sec_carga_archivo_c">
                                                                    CARGA DE ARCHIVOS EXÁMENES AUDITIVOS
                                                                </button>
                                                            </div>
                                                            <div id="sec_carga_archivo_c" class="collapse show" aria-labelledby="sec_carga_archivo" data-parent="#sec_carga_archivo">
                                                                <div class="card-body-aten-a">
                                                                    <div class="row">
                                                                        <input type="hidden" name="input_lista_archivo" id="input_lista_archivo" value="">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <!-- [ Main Content ] start -->
                                                                            <div class="dropzone" id="mis-archivos" action="{{ route('profesional.archivo.carga') }}">
                                                                            </div>
                                                                            <!-- [ file-upload ] end -->
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

                            {{-- Equilibrio --}}
                            <div class="tab-pane fade show" id="equilibrio" role="tabpanel" aria-labelledby="equilibrio-tab">
                                <!-- FORMULARIO EXAMENES EQUILIOBRIO-->
                                <div class="card-a">
                                    <div class="row" style="margin-top: 22px; ">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-body-aten-a">
                                                <div class="form-row" style="display: none;">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                                        <label class="floating-label-activo-sm">Fecha de examen</label>
                                                        <input type="date" class="form-control form-control-sm" name="fecha_ex" id="fecha_ex" value="{{ date('Y-m-d') }}" readonly>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                        <label class="floating-label-activo-sm">Examinador</label>
                                                        <input type="text" class="form-control form-control-sm" name="profesional" id="profesional" value="Dr. {{ $profesional->apellido_uno }}" readonly>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-7 col-xl-7">
                                                        {{-- <label class="floating-label-activo-sm">Derivado por:</label> --}}
                                                        {{-- <input type="text" class="form-control form-control-sm" name="derivado_por" id="derivado_por" value=""> --}}
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <input type="hidden" name="solicitado_id_profesional_oct_par" id="solicitado_id_profesional_oct_par" value="">
                                                                <label class="floating-label-activo-sm">Derivado por RUT:</label>
                                                                <input type="text" class="form-control form-control-sm" name="derivado_por_rut" id="derivado_por_rut" value=""
                                                                    onblur="cargar_profesional(this,'derivado_por', 'solicitado_id_profesional_oct_par', 'div_profesional_no_inscrito');"
                                                                    onkeyup="cargar_profesional(this,'derivado_por', 'solicitado_id_profesional_oct_par', 'div_profesional_no_inscrito');"
                                                                    oninput="formatoRut(this);"
                                                                >

                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="floating-label-activo-sm">Nombre:</label>
                                                                <input type="text" class="form-control form-control-sm" name="derivado_por" id="derivado_por" value="">
                                                            </div>
                                                            <div class="form-group col-md-12" id="div_mensaje"  style="display: none;">
                                                                <span style="font-size: 10px;color: #ff0808;" id="mensaje_solicitado_por"></span>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3" id="div_profesional_no_inscrito" style="display: none;">

                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label-activo-sm">Nombre</label>
                                                                <input type="text" class="form-control form-control-sm"  name="solicitado_nombre_oct_par" id="solicitado_nombre_oct_par" onchange="actualizar_solicitado_por('derivado_por', 'solicitado_nombre_oct_par', 'solicitado_apellido_oct_par');">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label-activo-sm">Apellido</label>
                                                                <input type="text" class="form-control form-control-sm"  name="solicitado_apellido_oct_par" id="solicitado_apellido_oct_par" onchange="actualizar_solicitado_por('derivado_por', 'solicitado_nombre_oct_par', 'solicitado_apellido_oct_par');">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label-activo-sm">Telefono</label>
                                                                <input type="text" class="form-control form-control-sm"  name="solicitado_telefono_oct_par" id="solicitado_telefono_oct_par" >
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label-activo-sm">Email</label>
                                                                <input type="text" class="form-control form-control-sm"  name="solicitado_email_oct_par" id="solicitado_email_oct_par" >
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Nombre paciente</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_pcte" id="nombre_pcte" value="{{ $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                        <label class="floating-label-activo-sm">Edad</label>
                                                        <input type="text" class="form-control form-control-sm" name="edad" id="edad" value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->age }}" readonly>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                        <label class="floating-label-activo-sm">Rut</label>
                                                        <input type="text" class="form-control form-control-sm" name="rut" id="rut" value="{{ $paciente->rut }}">
                                                    </div>
                                                    <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Dirección</label>
                                                        <input type="text" class="form-control form-control-sm" name="direccion" id="direccion"
                                                        @if (isset($paciente))
                                                            @if ($paciente->Direccion()->first() != null)
                                                                value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}"
                                                            @else
                                                                value="NO HA REGISTRADO DIRECCIÓN !"
                                                            @endif
                                                        @else
                                                            value="NO HA REGISTRADO DIRECCIÓN !"
                                                        @endif
                                                        readonly>
                                                    </div>
                                                    <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Email</label>
                                                        <input type="text" class="form-control form-control-sm" name="email" id="email" value="{{ $paciente->email }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <h5 >EXÁMENES EQUILIBRIO</h5>
                                                    </div>
                                                </div>
                                                <div class="form-row" >
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm" for="equil">Seleccione el o los examenes</label>
                                                        <select class="form-control form-control-sm" name="equil" id="equil" multiple="multiple">
                                                            <option  value="1">  Examen funcional 8° Par </option>
                                                            <option  value="2">  Maniobras de reposición vestibular </option>
                                                            <option  value="3">  Maniobras de rehabilitación vestivular</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Observaciones</label>
                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ant_especialidad" id="ant_especialidad" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card-a">
                                                        <div class="card-header-a" id="sec_carga_archivo">
                                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#sec_carga_archivo_c" aria-expanded="false" aria-controls="sec_carga_archivo_c">
                                                                CARGA DE ARCHIVOS EXÁMENES EQUILIBRIO
                                                            </button>
                                                        </div>
                                                        <div id="sec_carga_archivo_c" class="collapse show" aria-labelledby="sec_carga_archivo" data-parent="#sec_carga_archivo">
                                                            <div class="card-body-aten-a">
                                                                <div class="row">
                                                                    <input type="hidden" name="input_lista_archivo" id="input_lista_archivo" value="">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <!-- [ Main Content ] start -->
                                                                        <div class="dropzone" id="mis-archivos" action="{{ route('profesional.archivo.carga') }}">
                                                                        </div>
                                                                        <!-- [ file-upload ] end -->
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

                            {{-- Audífonos --}}
                            <div class="tab-pane fade show " id="audif" role="tabpanel" aria-labelledby="audif-tab">
                                <!-- FORMULARIO LAVADO OIDOS-->
                                <div class="row" style="margin-top: 22px;">

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <ul class="nav nav-tabs-secciones mb-3 mt-10" id="orl" role="tablist">
                                        <li class="nav-item-secciones">
                                            <a class="nav-secciones active text-uppercase" id="venta_audif-tab" data-toggle="tab" href="#venta_audif" role="tab" aria-controls="venta_audif" aria-selected="true">Venta de audifonos y repuestos</a>
                                        </li>
                                        <li class="nav-item-secciones">
                                            <a class="nav-secciones text-uppercase" id="cont_post_venta-tab" data-toggle="tab" href="#cont_post_venta" role="tab" aria-controls="cont_post_venta" aria-selected="false">Control de audífonos post venta</a>
                                        </li>
                                        <li class="nav-item-secciones">
                                            <a class="nav-secciones text-uppercase" id="cont_audif_ext-tab" data-toggle="tab" href="#cont_audif_ext" role="tab" aria-controls="cont_audif_ext" aria-selected="false">Control de audífono externo</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content" id="tecn-orl-contenido">
                                    <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                                    <div class="tab-pane fade show active" id="venta_audif" role="tabpanel" aria-labelledby="venta_audif-tab">

                                        <div class="row div_form_examen_ocho_par">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="card-a">
                                                    <div class="user-about-block mt-10">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="tab-content" id="myTabContent">
                                                                    <!--TAB INFORMACIÓN PERSONAL-->
                                                                    <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                                                                        <div class="card">
                                                                            <div class="form-row">
                                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12"style="text-align:center">
                                                                                    <h5 >VENTA DE AUDIFONOS Y REPUESTOS</h5>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <label class="floating-label-activo-sm">Motivo de Uso</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ant_especialidad" id="ant_especialidad" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-row">
                                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <label class="floating-label-activo-sm">Observación General</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_general" id="obs_general" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <!--Card Información audifono-->
                                                                                <div class="card">
                                                                                    <div class="card-header d-flex align-items-center justify-content-between bg-primary">
                                                                                        <h5 class="mb-0 text-white">Información Venta Audífonos</h5>
                                                                                        <button type="button" class="btn btn-light btn-icon m-0 float-right" data-toggle="collapse" data-target=".info_audifono" aria-expanded="false" aria-controls="info_audifono-1 info_audifono-2">
                                                                                            <i class="feather icon-edit"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                    <!--Datos audifono-->
                                                                                    <div class="card-body info_audifono collapse show" id="info_audifono-1">
                                                                                        <form>
                                                                                            <div class="row">
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <div class="form-row">
                                                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <label class="font-weight-bolder ml-0 mb-0">N° Serie aud.Izq</label>
                                                                                                            {{--  <div> {{ $n_serie_aud_izq" }} </div>  --}}
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <label class="font-weight-bolder ml-0 mb-0">Marca</label>

                                                                                                            {{--  <div> {{ $paciente->apellido_uno }}</div>  --}}
                                                                                                        </div>
                                                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            {{--  <label class="font-weight-bolder ml-0 mb-0">Modelo</label>  --}}

                                                                                                            {{--  <div> {{ $paciente->apellido_dos }}
                                                                                                            </div>  --}}
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <label class="font-weight-bolder ml-0 mb-0">Modelo</label>
                                                                                                            <div>
                                                                                                                {{--  @if ($paciente->sexo == 'F')
                                                                                                                    Mujer
                                                                                                                @elseif ($paciente->sexo == 'M')
                                                                                                                    Hombre
                                                                                                                @endif  --}}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <label class="font-weight-bolder ml-0 mb-0">Fecha de entrega</label>
                                                                                                            <div>
                                                                                                                {{--  {{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('d-m-Y') }}  --}}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <label class="font-weight-bolder ml-0 mb-0">Satisfacción</label>
                                                                                                            <div> Buena</div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <div class="form-row">
                                                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <label class="font-weight-bolder ml-0 mb-0">N° Serie aud.Der</label>
                                                                                                            {{--  <div> {{ $paciente->rut }} </div>  --}}
                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <label class="font-weight-bolder ml-0 mb-0">Marca</label>

                                                                                                            {{--  <div> {{ $paciente->apellido_uno }}</div>  --}}
                                                                                                        </div>
                                                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            {{--  <label class="font-weight-bolder ml-0 mb-0">Modelo</label>  --}}

                                                                                                            {{--  <div> {{ $paciente->apellido_dos }}
                                                                                                            </div>  --}}
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <label class="font-weight-bolder ml-0 mb-0">Modelo</label>
                                                                                                            <div>
                                                                                                                {{--  @if ($paciente->sexo == 'F')
                                                                                                                    Mujer
                                                                                                                @elseif ($paciente->sexo == 'M')
                                                                                                                    Hombre
                                                                                                                @endif  --}}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <label class="font-weight-bolder ml-0 mb-0">Fecha de entrega</label>
                                                                                                            <div>
                                                                                                                {{--  {{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('d-m-Y') }}  --}}
                                                                                                            </div>
                                                                                                        </div>


                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <label class="font-weight-bolder ml-0 mb-0">Satisfacción</label>
                                                                                                            <div> Buena</div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                    <!--Cierre: audifono-->
                                                                                    <!--(Editar)Datos audifono-->
                                                                                    <div class="card-body info_audifono collapse" id="pinfo_audifono_2">
                                                                                        <form>
                                                                                            <div class="row">
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo">N° de serie audifono Izquierdo</label>
                                                                                                        <input type="text" class="form-control form-control-sm" placeholder="N° serie" id="n_serie_aud_izq" name="n_serie_aud_izq" value="">
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo">Marca</label>
                                                                                                        <input type="text" class="form-control form-control-sm" placeholder="Marca" id="marca_aud_izq" name="marca_aud_izq" value="">
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo">Modelo</label>
                                                                                                        <input type="text" class="form-control form-control-sm" placeholder="Modelo" id="model_aud_izq" name="model_aud_izq" value="">
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo">Fecha de entrega</label>
                                                                                                        <input type="text" class="form-control form-control-sm" placeholder="Fecha de entrega" id="fecha_ent_aud_izq"name="fecha_ent_aud_izq" value="">
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo">Satisfacción</label>
                                                                                                        <input type="text" class="form-control form-control-sm" placeholder="Satsfacción" id="satisf_aud_izq" name="satisf_aud_izq" value="">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo">N° de serie audifono Derecho</label>
                                                                                                        <input type="text" class="form-control form-control-sm" placeholder="N° serie" id="n_serie_aud_der" name="n_serie_aud_der" value="">
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo">Marca</label>
                                                                                                        <input type="text" class="form-control form-control-sm" placeholder="Marca" id="marca_aud_der" name="marca_aud_der" value="">
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo">Modelo</label>
                                                                                                        <input type="text" class="form-control form-control-sm" placeholder="Modelo" id="model_aud_der" name="model_aud_der" value="">
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo">Fecha de entrega</label>
                                                                                                        <input type="text" class="form-control form-control-sm" placeholder="Fecha de entrega" id="fecha_ent_aud_der"name="fecha_ent_aud_der" value="">
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo">Satisfacción</label>
                                                                                                        <input type="text" class="form-control form-control-sm" placeholder="Satsfacción" id="satisf_aud_der" name="satisf_aud_der" value="">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-sm-12 d-flex justify-content-end">
                                                                                                    <button type="button" class="btn btn-danger-light-c btn-sm mr-2"><i class="feather icon-x"></i> Cancelar</button>
                                                                                                    <button type="button" onclick="editar_paciente_datos_personales();" class="btn btn-sm btn-info-light-c"><i class="feather icon-save"></i> Guardar cambios</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                    <!--Cierre: (Editar)Datos audifono-->
                                                                                </div>
                                                                                <!--Cierre: Card Datos audifono-->
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="card-a">
                                                    <div class="card-header-a" id="sec_carga_archivo">
                                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#sec_carga_archivo_c" aria-expanded="false" aria-controls="sec_carga_archivo_c">
                                                            CARGA DE ARCHIVOS
                                                        </button>
                                                    </div>
                                                    <div id="sec_carga_archivo_c" class="collapse show" aria-labelledby="sec_carga_archivo" data-parent="#sec_carga_archivo">
                                                        <div class="card-body-aten-a">
                                                            <div class="row">
                                                                <input type="hidden" name="input_lista_archivo" id="input_lista_archivo" value="">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <!-- [ Main Content ] start -->
                                                                    <div class="dropzone" id="mis-archivos" action="{{ route('profesional.archivo.carga') }}">
                                                                    </div>
                                                                    <!-- [ file-upload ] end -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="cont_post_venta" role="tabpanel" aria-labelledby="cont_post_venta-tab">
                                        <div class="card-a">
                                            <div class="card-body-aten-a">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <!--Card Información audifono-->
                                                    <div class="card">
                                                        <div class="card-header d-flex align-items-center justify-content-between bg-primary">
                                                            <h5 class="mb-0 text-white">Información Control Audífonos</h5>
                                                            <button type="button" class="btn btn-light btn-icon m-0 float-right" data-toggle="collapse" data-target=".info_audifono" aria-expanded="false" aria-controls="info_audifono-1 info_audifono-2">
                                                                <i class="feather icon-edit"></i>
                                                            </button>
                                                        </div>
                                                        <!--Datos audifono-->
                                                        <div class="card-body info_audifono collapse show" id="info_audifono-1">
                                                            <form>
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="font-weight-bolder ml-0 mb-0">N° Serie aud.Izq</label>
                                                                                {{--  <div> {{ $n_serie_aud_izq" }} </div>  --}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="font-weight-bolder ml-0 mb-0">Marca</label>

                                                                                {{--  <div> {{ $paciente->apellido_uno }}</div>  --}}
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                {{--  <label class="font-weight-bolder ml-0 mb-0">Modelo</label>  --}}

                                                                                {{--  <div> {{ $paciente->apellido_dos }}
                                                                                </div>  --}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="font-weight-bolder ml-0 mb-0">Modelo</label>
                                                                                <div>
                                                                                    {{--  @if ($paciente->sexo == 'F')
                                                                                        Mujer
                                                                                    @elseif ($paciente->sexo == 'M')
                                                                                        Hombre
                                                                                    @endif  --}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="font-weight-bolder ml-0 mb-0">Fecha de entrega</label>
                                                                                <div>
                                                                                    {{--  {{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('d-m-Y') }}  --}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="font-weight-bolder ml-0 mb-0">Satisfacción</label>
                                                                                <div> Buena</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="font-weight-bolder ml-0 mb-0">N° Serie aud.Der</label>
                                                                                {{--  <div> {{ $paciente->rut }} </div>  --}}
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="font-weight-bolder ml-0 mb-0">Marca</label>

                                                                                {{--  <div> {{ $paciente->apellido_uno }}</div>  --}}
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                {{--  <label class="font-weight-bolder ml-0 mb-0">Modelo</label>  --}}

                                                                                {{--  <div> {{ $paciente->apellido_dos }}
                                                                                </div>  --}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="font-weight-bolder ml-0 mb-0">Modelo</label>
                                                                                <div>
                                                                                    {{--  @if ($paciente->sexo == 'F')
                                                                                        Mujer
                                                                                    @elseif ($paciente->sexo == 'M')
                                                                                        Hombre
                                                                                    @endif  --}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="font-weight-bolder ml-0 mb-0">Fecha de entrega</label>
                                                                                <div>
                                                                                    {{--  {{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('d-m-Y') }}  --}}
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="font-weight-bolder ml-0 mb-0">Satisfacción</label>
                                                                                <div> Buena</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!--Cierre: audifono-->
                                                        <!--(Editar)Datos audifono-->
                                                        <div class="card-body info_audifono collapse" id="pinfo_audifono_2">
                                                            <form>
                                                                <div class="row">
                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo">N° de serie audifono Izquierdo</label>
                                                                            <input type="text" class="form-control form-control-sm" placeholder="N° serie" id="n_serie_aud_izq" name="n_serie_aud_izq" value="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo">Marca</label>
                                                                            <input type="text" class="form-control form-control-sm" placeholder="Marca" id="marca_aud_izq" name="marca_aud_izq" value="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo">Modelo</label>
                                                                            <input type="text" class="form-control form-control-sm" placeholder="Modelo" id="model_aud_izq" name="model_aud_izq" value="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo">Fecha de entrega</label>
                                                                            <input type="text" class="form-control form-control-sm" placeholder="Fecha de entrega" id="fecha_ent_aud_izq"name="fecha_ent_aud_izq" value="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo">Satisfacción</label>
                                                                            <input type="text" class="form-control form-control-sm" placeholder="Satsfacción" id="satisf_aud_izq" name="satisf_aud_izq" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo">N° de serie audifono Derecho</label>
                                                                            <input type="text" class="form-control form-control-sm" placeholder="N° serie" id="n_serie_aud_der" name="n_serie_aud_der" value="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo">Marca</label>
                                                                            <input type="text" class="form-control form-control-sm" placeholder="Marca" id="marca_aud_der" name="marca_aud_der" value="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo">Modelo</label>
                                                                            <input type="text" class="form-control form-control-sm" placeholder="Modelo" id="model_aud_der" name="model_aud_der" value="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo">Fecha de entrega</label>
                                                                            <input type="text" class="form-control form-control-sm" placeholder="Fecha de entrega" id="fecha_ent_aud_der"name="fecha_ent_aud_der" value="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo">Satisfacción</label>
                                                                            <input type="text" class="form-control form-control-sm" placeholder="Satsfacción" id="satisf_aud_der" name="satisf_aud_der" value="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                                        <button type="button" class="btn btn-danger-light-c btn-sm mr-2"><i class="feather icon-x"></i> Cancelar</button>
                                                                        <button type="button" onclick="editar_paciente_datos_personales();" class="btn btn-sm btn-info-light-c"><i class="feather icon-save"></i> Guardar cambios</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!--Cierre: (Editar)Datos audifono-->
                                                    </div>
                                                    <!--Cierre: Card Datos audifono-->
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="cont_audif_ext" role="tabpanel" aria-labelledby="cont_audif_ext-tab">
                                        <div class="card-a">
                                            <div class="card-body-aten-a">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <!--Card Información audifono-->
                                                    <div class="card">
                                                        <div class="card-header d-flex align-items-center justify-content-between bg-primary">
                                                            <h5 class="mb-0 text-white">Información Control Audífonos Externos</h5>
                                                            <button type="button" class="btn btn-light btn-icon m-0 float-right" data-toggle="collapse" data-target=".info_audifono" aria-expanded="false" aria-controls="info_audifono-1 info_audifono-2">
                                                                <i class="feather icon-edit"></i>
                                                            </button>
                                                        </div>
                                                        <!--Datos audifono-->
                                                        <div class="card-body info_audifono collapse show" id="info_audifono-1">
                                                            <form>
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="font-weight-bolder ml-0 mb-0">N° Serie aud.Izq</label>
                                                                                {{--  <div> {{ $n_serie_aud_izq" }} </div>  --}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="font-weight-bolder ml-0 mb-0">Marca</label>

                                                                                {{--  <div> {{ $paciente->apellido_uno }}</div>  --}}
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                {{--  <label class="font-weight-bolder ml-0 mb-0">Modelo</label>  --}}

                                                                                {{--  <div> {{ $paciente->apellido_dos }}
                                                                                </div>  --}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="font-weight-bolder ml-0 mb-0">Modelo</label>
                                                                                <div>
                                                                                    {{--  @if ($paciente->sexo == 'F')
                                                                                        Mujer
                                                                                    @elseif ($paciente->sexo == 'M')
                                                                                        Hombre
                                                                                    @endif  --}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="font-weight-bolder ml-0 mb-0">Fecha de entrega</label>
                                                                                <div>
                                                                                    {{--  {{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('d-m-Y') }}  --}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="font-weight-bolder ml-0 mb-0">Satisfacción</label>
                                                                                <div> Buena</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="font-weight-bolder ml-0 mb-0">N° Serie aud.Der</label>
                                                                                {{--  <div> {{ $paciente->rut }} </div>  --}}
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="font-weight-bolder ml-0 mb-0">Marca</label>

                                                                                {{--  <div> {{ $paciente->apellido_uno }}</div>  --}}
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                {{--  <label class="font-weight-bolder ml-0 mb-0">Modelo</label>  --}}

                                                                                {{--  <div> {{ $paciente->apellido_dos }}
                                                                                </div>  --}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="font-weight-bolder ml-0 mb-0">Modelo</label>
                                                                                <div>
                                                                                    {{--  @if ($paciente->sexo == 'F')
                                                                                        Mujer
                                                                                    @elseif ($paciente->sexo == 'M')
                                                                                        Hombre
                                                                                    @endif  --}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="font-weight-bolder ml-0 mb-0">Fecha de entrega</label>
                                                                                <div>
                                                                                    {{--  {{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('d-m-Y') }}  --}}
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="font-weight-bolder ml-0 mb-0">Satisfacción</label>
                                                                                <div> Buena</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!--Cierre: audifono-->
                                                        <!--(Editar)Datos audifono-->
                                                        <div class="card-body info_audifono collapse" id="pinfo_audifono_2">
                                                            <form>
                                                                <div class="row">
                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo">N° de serie audifono Izquierdo</label>
                                                                            <input type="text" class="form-control form-control-sm" placeholder="N° serie" id="n_serie_aud_izq" name="n_serie_aud_izq" value="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo">Marca</label>
                                                                            <input type="text" class="form-control form-control-sm" placeholder="Marca" id="marca_aud_izq" name="marca_aud_izq" value="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo">Modelo</label>
                                                                            <input type="text" class="form-control form-control-sm" placeholder="Modelo" id="model_aud_izq" name="model_aud_izq" value="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo">Fecha de entrega</label>
                                                                            <input type="text" class="form-control form-control-sm" placeholder="Fecha de entrega" id="fecha_ent_aud_izq"name="fecha_ent_aud_izq" value="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo">Satisfacción</label>
                                                                            <input type="text" class="form-control form-control-sm" placeholder="Satsfacción" id="satisf_aud_izq" name="satisf_aud_izq" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo">N° de serie audifono Derecho</label>
                                                                            <input type="text" class="form-control form-control-sm" placeholder="N° serie" id="n_serie_aud_der" name="n_serie_aud_der" value="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo">Marca</label>
                                                                            <input type="text" class="form-control form-control-sm" placeholder="Marca" id="marca_aud_der" name="marca_aud_der" value="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo">Modelo</label>
                                                                            <input type="text" class="form-control form-control-sm" placeholder="Modelo" id="model_aud_der" name="model_aud_der" value="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo">Fecha de entrega</label>
                                                                            <input type="text" class="form-control form-control-sm" placeholder="Fecha de entrega" id="fecha_ent_aud_der"name="fecha_ent_aud_der" value="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo">Satisfacción</label>
                                                                            <input type="text" class="form-control form-control-sm" placeholder="Satsfacción" id="satisf_aud_der" name="satisf_aud_der" value="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                                        <button type="button" class="btn btn-danger-light-c btn-sm mr-2"><i class="feather icon-x"></i> Cancelar</button>
                                                                        <button type="button" onclick="editar_paciente_datos_personales();" class="btn btn-sm btn-info-light-c"><i class="feather icon-save"></i> Guardar cambios</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!--Cierre: (Editar)Datos audifono-->
                                                    </div>
                                                    <!--Cierre: Card Datos audifono-->
                                                </div>

                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <label class="floating-label-activo-sm">Motivo de Uso</label>
                                                    <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ant_especialidad" id="ant_especialidad" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <label class="floating-label-activo-sm">Observación General</label>
                                                    <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_general" id="obs_general" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>

                                    {{--  <div class="tab-pane fade show" id="otro1" role="tabpanel" aria-labelledby="otro1-tab">otro
                                    </div>  --}}
                                </div>
                            </div>

                            {{-- atenciones previas --}}
                            <div class="tab-pane fade show " id="aten-previas" role="tabpanel" aria-labelledby="aten-previas-tab">
                            </div>

                        </div>
                    </div>
                </div>



                <div class="row">
                    <!--GUARDAR O IMPRIMIR FICHA-->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <input type="submit" class="btn btn-purple mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
                                <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- SIDE BAR FONO -->
    {{-- base de botones de sidebar --}}
    {{-- @include("atencion_otros_prof.modales") --}}
    {{-- modales y data de sidebar especialidad --}}
    {{-- @include("atencion_otros_prof.include.sidebar_derecho_fono") --}}

@endsection

@section('page-script')
    <script>

        $(document).ready(function () {
            $('#aud').select2();
            $('#equil').select2();
        });


        function cargar_profesional(rut, input_nombre, input_id, div_solicitar)
        {
            rut = $(rut).val();

            // console.log('------------------------------------');
            // console.log(rut.length);
            // console.log(rut);
            // console.log('------------------------------------');

            if(rut.length>5)
            {
                url = "{{ route('profesional.buscar') }}";
                $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        rut : rut,
                    },
                })
                .done(function(data)
                {
                    // console.log('-----------------------');
                    // console.log(data);
                    // console.log('-----------------------');
                    if(data.estado == 1)
                    {

                        if(data.registros.length>0)
                        {
                            var nombre = data.registros[0].nombre+' '+data.registros[0].apellido_uno;
                            var id = data.registros[0].id;
                            // $('#'+input_nombre).attr('readonly', true);
                            $('#'+input_nombre).val(nombre);
                            $('#'+input_id).val(id);
                            $('#'+div_solicitar).hide();
                            mensaje = '';
                            $('#div_mensaje').hide();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_nombre_oct_par').val('');
                            $('#solicitado_apellido_oct_par').val('');
                            $('#solicitado_telefono_oct_par').val('');
                            $('#solicitado_email_oct_par').val('');
                        }
                        else
                        {
                            mensaje = 'Profesional no encontrato, debe ingresar datos.';
                            $('#'+input_nombre).val('');
                            $('#'+input_id).val('');
                            $('#'+div_solicitar).show();
                            $('#div_mensaje').show();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_nombre_oct_par').val('');
                            $('#solicitado_apellido_oct_par').val('');
                            $('#solicitado_telefono_oct_par').val('');
                            $('#solicitado_email_oct_par').val('');
                            $('#'+input_nombre).attr('readonly', true);
                        }
                    }
                    else
                    {
                        mensaje = 'Se presento un problema en la busqueda intente nuevamente';
                        $('#div_mensaje').show();
                        $('#mensaje_solicitado_por').html(mensaje);
                        $('#'+input_nombre).attr('readonly', false);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
            else if(rut.length==0)
            {
                $('#'+input_nombre).val('');
                // $('#'+input_nombre).attr('readonly', true);
                $('#'+input_id).val('');
                $('#'+div_solicitar).hide();
                $('#div_mensaje').hide();
                $('#mensaje_solicitado_por').html('');
            }
        }

        function actualizar_solicitado_por(input_solitado_por, input_nombre, input_apellido)
        {
            var nombre = $('#'+input_nombre).val();
            var apellido = $('#'+input_apellido).val();
            if(nombre != '' || apellido != '')
            {
                // $('#'+input_solitado_por).attr('readonly', true);
                $('#'+input_solitado_por).val($('#'+input_nombre).val()+' '+$('#'+input_apellido).val());
            }
            else
            {
                // $('#'+input_solitado_por).attr('readonly', false);
                $('#'+input_solitado_por).val();
            }
        }

        /************** ARCHIVO **************/
        var myDropzone_Archivo ;
        Dropzone.options.misArchivos = {
            init:function()
            {
                myDropzone_Archivo = this;
            },
            url: "{{ route('profesional.archivo.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
            },

            acceptedFiles: "application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*",
            maxFilesize: 4,
            maxFiles: 4,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre Archivo al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
            dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_archivo();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_archivo(myDropzone_Archivo,'');

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                // console.log('-------------error-----------------------');
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error)
                    {
                        message = message.error;
                    }
                    else
                    {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                // console.log('-------------removedfile-----------------------');
                cargar_lista_archivo(myDropzone_Archivo,'');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_archivo(myDropzone_Archivo,'');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };


        var lista_archivo = {};
        function cargar_lista_archivo(obj_dropzone, alias_archivo)
        {
            // console.log('--------------cargar_lista_archivo----------------------');
            lista_archivo = [];
            $('#input_lista_archivo').val('');
            let temp  = obj_dropzone.getAcceptedFiles();
            $.each(temp, function( index, value )
            {
                if(value.status == "success")
                {
                    if(value.xhr !== undefined)
                    {
                        var archivo_temp = JSON.parse(value.xhr.response);
                        lista_archivo[index] = [
                            url = archivo_temp.archivo.url,
                            nombre_original = archivo_temp.archivo.original_file_name,
                            nombre_archivo = archivo_temp.archivo.nombre_archivo,
                            file_extension = archivo_temp.archivo.file_extension,
                        ];
                        $('#input_lista_archivo').val('');
                        $('#input_lista_archivo').val(JSON.stringify(lista_archivo));
                    }
                }
            });
        }
        /************** ARCHIVO **************/
    </script>
@endsection

{{-- @include('app.profesional.modales.boton_flotante_agenda_autorizacion') --}}
