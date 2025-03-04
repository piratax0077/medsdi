@extends('template.laboratorio.laboratorio_profesional.template')
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
                        <h5 class="m-b-10 font-weight-bold">Escritorio Laboratorio</h5>
                    </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="escritorio_profesional_laboratorio.php">Mi Escritorio</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card-deck">
                    <div class="card subir">
                        <a href="{{ route('laboratorio.lab_asistente.agenda_laboratorio') }}">
                        <div class="card-body text-center px-2" onclick="seleccionar_lugar_atencion();"
                            style="cursor:pointer">
                            <img class="wid-40 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                            <h6 class="mt-1">Mi <br>agenda</h6>
                        </div>
                        </a>
                    </div>
                    <div class="card subir">
                        <a href="{{ route('profesional.pacientes') }}">
                            <div class="card-body text-center px-2" style="cursor:pointer">
                                <img class="wid-40 text-center" src="{{ asset('images/iconos/pacientes.svg') }}">
                                <h6 class="mt-1">Mis <br>pacientes</h6>
                            </div>
                        </a>
                    </div>
                    <div class="card subir">
                        <a href="{{ route('profesional.configuracion') }}">
                            <div class="card-body text-center px-2" style="cursor:pointer">
                                <img class="wid-40 text-center"
                                    src="{{ asset('images/iconos/panel_configuracion.svg') }}">
                                <h6 class="mt-1"> Panel de <br>configuración</h6>
                            </div>
                        </a>
                    </div>
                    {{--  <div class="card subir">
                        <a href="{{ route('profesional.index_receta_online') }}">
                            <div class="card-body text-center px-2" style="cursor:pointer">
                                <img class="wid-40 text-center" src="{{ asset('images/iconos/receta_online.svg') }}">
                                <h6 class="mt-1">Receta <br>Online</h6>
                            </div>
                        </a>
                    </div>  --}}
                    <div class="card subir">
                        <a href="{{ route('profesional.index_transcripcion_examen') }}">
                            <div class="card-body text-center px-2" style="cursor:pointer">
                                <img class="wid-40 text-center" src="{{ asset('images/iconos/examenes-ro.svg') }}">
                                <h6 class="mt-1 f-13">Subir <br>examenes</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--Botones superiores-->
        <div class="col-md-3 mb-3">
            <div class="card subir text-center h-100">
                <img class="img-fluid card-img-top" src="{{ asset('images/iconos/inscripciones_1.svg') }}"
                    alt="Farmacrónicos">
                 <a href="http://cronicos.cl/registro.php" target="_blank" class="btn  btn-arrastre" type="button">
                    <div class="card-body">
                        <h5 style="font-size: 1.2rem;" class="card-title pt-2">Inscripción en Farmacrónicos</h5>
                        <p class="card-text">Inscriba a sus Pacientes en crónicos.cl <br> Obtendrá Importantes Novedades en el Manejo de su Patología<br> y en el uso de sus Medicamentos</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card subir">
                    <a href="{{ ROUTE('laboratorio.lab_profesional.pacientes_laboratorio') }}">
                        <div class="card-body text-center" style="cursor:pointer">
							<img class="wid-60 text-center" src="{{ asset('images/iconos/pacientes.svg') }}">
                            <h5 class="mt-2">Pacientes</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card subir">
                    <a href="{{ ROUTE('laboratorio.lab_profesional.procesos_laboratorio') }}">
                        <div class="card-body text-center" style="cursor:pointer">
							<img class="wid-60 text-center" src="{{ asset('images/iconos/examen.svg') }}">
                            <h5 class="mt-2">Venta Audífonos y repuestos</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card subir">
                    <a href="{{ ROUTE('laboratorio.lab_profesional.recepcion_muestras') }}">
                        <div class="card-body text-center" style="cursor:pointer">
							<img class="wid-60 text-center" src="{{ asset('images/iconos/derivar.svg') }}">
                            <h5 class="mt-2">Mis Usuarios de Audífonos </h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card subir">
                    <a href="{{ ROUTE('laboratorio.lab_profesional.recepcion_muestras') }}">
                        <div class="card-body text-center" style="cursor:pointer">
							<img class="wid-60 text-center" src="{{ asset('images/iconos/derivar.svg') }}">
                            <h5 class="mt-2">Ventas online</h5>
                        </div>
                    </a>
                </div>
            </div>
			{{--  <div class="col-md-6">
                <div class="card subir">
                    <a href="{{ ROUTE('laboratorio.lab_profesional.recepcion_muestras') }}">
                        <div class="card-body text-center" style="cursor:pointer">
							<img class="wid-60 text-center" src="{{ asset('images/iconos/derivar.svg') }}">
                            <h5 class="mt-2">Derivación de exámenes</h5>
                        </div>
                    </a>
                </div>
            </div>  --}}
            {{--  <div class="col-md-6">
                <div class="card subir">
                    <a href="{{ ROUTE('laboratorio.lab_profesional.inventario_laboratorio') }}">
                        <div class="card-body text-center" style="cursor:pointer">
							<img class="wid-60 text-center" src="{{ asset('images/iconos/inventario.svg') }}">
                            <h5 class="mt-2">Inventario</h5>
                        </div>
                    </a>
                </div>
            </div>  --}}
            {{--  <div class="col-md-6">
                <div class="card subir">
                    <a href="{{ ROUTE('laboratorio.lab_profesional.proveedores_laboratorio') }}">
                        <div class="card-body text-center" style="cursor:pointer">
							<img class="wid-60 text-center" src="{{ asset('images/iconos/proveedores.svg') }}">
                            <h5 class="mt-2">Proveedores</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card subir">
                    <a href="{{ ROUTE('laboratorio.lab_profesional.gastos_laboratorio') }}">
                        <div class="card-body text-center" style="cursor:pointer">
							<img class="wid-60 text-center" src="{{ asset('images/iconos/gastos.svg') }}">
                            <h5 class="mt-2">Gastos</h5>
                        </div>
                    </a>
                </div>
            </div>  --}}
        </div>

    </div>
</div>
    <!--Cierre: Container Completo-->
@endsection
