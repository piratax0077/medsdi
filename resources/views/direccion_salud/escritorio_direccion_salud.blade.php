@extends('template.direccion_salud.template')

@section('content')

    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Escritorio Dirección Salud</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('ministerio.home') }}" >Mi escritorio </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <!--Botones superiores-->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-lg-4">

                    <div class="col">
                        <div class="card subir">
                            <a href="{{ route('ministerio.control_medicamento') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/medicamento-ministerio.png') }}">
                                    <h6 class="mt-1">Control Medicamentos</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                     <div class="col">
                        <div class="card subir">
                            <a href="{{ route('ministerio.control_farmacia') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/historial-farmacia.png') }}">
                                    <h6 class="mt-1 f-13">Historial Controles Farmacia</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card subir">
                            <a href="{{ route('conect_farmacia') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/farmacia-ministerio.png') }}">
                                    <h6 class="mt-1 f-13">Controlar Farmacia</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card subir">
                            <a href="{{ route('ministerio.ges') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/ges.png') }}">
                                    <h6 class="mt-1">GES</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card subir">
                            <a href="{{ route('ministerio.enfer_noti_obliga') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/eno.png') }}">
                                    <h6 class="mt-1">Enfermedad de Notificacion Obligatoria</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                          <div class="card subir">
                            <a href="{{ route('ministerio.notificaciones_snss') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/comunicados.png') }}">
                                    <h6 class="mt-1">Notificaciones y resoluciones SNSS</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card subir">
                            <a href="{{ route('ministerio.control_bonos_fonasa') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-70 text-center mb-1" src="{{ asset('images/iconos/fonasa.jpg') }}">
                                    <h6 class="mt-1 font-weight-bold">Control de bonos fonasa</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card subir">
                            <a href="{{ route('ministerio.control_licencias') }}"  style="cursor:pointer">
                                <div class="card-body text-center px-2">
                                              <img class="wid-40 text-center" src="{{ asset('images/iconos/licencia-ro.svg') }}">
                                    <h6 class="mt-1 font-weight-bold">Control de licencias</h6>
                                </div>
                             </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card subir">
                            <a href="{{ route('ministerio.control_laboratorios') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/examenes-ro.svg') }}">
                                    <h6 class="mt-1 font-weight-bold">Control de laboratorios clínicos</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card subir">
                            <a href="{{ route('ministerio.control_denuncia_ram') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/alerta.png') }}">
                                    <h6 class="mt-1 font-weight-bold">Control y denuncia de RAM</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card subir">
                            <a href="{{ route('ministerio.subir_base_datos') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/base-datos.png') }}">
                                    <h6 class="mt-1 font-weight-bold">Subir base de datos</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card subir">
                            <a href="{{ route('ministerio.publicar_lista_espera') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/lista-espera.png') }}">
                                    <h6 class="mt-1 font-weight-bold">Publicar lista de espera</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card subir">
                            <a href="{{ route('ministerio.control_cronicos') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/p-cronico.png') }}">
                                    <h6 class="mt-1 font-weight-bold">Control pacientes crónicos</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card subir">
                            <a href="{{ route('ministerio.control_salud_publica') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/salud-publica.png') }}">
                                    <h6 class="mt-1 font-weight-bold">Control salud pública</h6>
                                </div>
                            </a>
                        </div>
                    </div>
            </div>

        </div>
    </div>
    <!--Cierre: Container Completo-->

@endsection

