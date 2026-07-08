@extends('template.adm_cm.template')

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
                              {{--  @if ($profesional->id_especialidad == 11 && $profesional->id_tipo_especialidad == 59)
                                    <h5 class="m-b-10 font-weight-bold">Agenda Laboratorio Radiología</h5>
                                @else
                                    <h5 class="m-b-10 font-weight-bold">Agenda Laboratorio</h5>
                                @endif--}}

                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('laboratorio.lab_profesional.escritorio_profesional_laboratorio') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                @if (isset($profesional) && $profesional->id_especialidad == 11 && $profesional->id_tipo_especialidad == 59)
                                    <li class="breadcrumb-item"><a href="agenda_laboratorios_asistentes_cm.php">Agenda Laboratorio Radiología</a></li>
                                @else
                                    <li class="breadcrumb-item"><a href="agenda_laboratorios_asistentes_cm.php">Agenda Laboratorio</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
             <!--Pacientes y pagos-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="container py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-3">Escritorio Administrador Técnico de Laboratorio</h1>
            <p class="text-muted">Bienvenido. Desde aquí puedes gestionar productos con defectos, cambios y devoluciones.</p>
        </div>
    </div>
    <div class="row">
        <!-- Panel de acciones rápidas -->
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Recepción de Productos</h5>
                    <p class="card-text">Registrar la recepción de productos con defecto o para cambio.</p>
                    <a href="#" class="btn btn-primary w-100">Registrar Recepción</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Gestión de Cambios</h5>
                    <p class="card-text">Ver y gestionar solicitudes de cambio de productos.</p>
                    <a href="#" class="btn btn-warning w-100">Gestionar Cambios</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Historial de Devoluciones</h5>
                    <p class="card-text">Consulta el historial de productos devueltos o gestionados.</p>
                    <a href="#" class="btn btn-secondary w-100">Ver Historial</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="alert alert-info">
                <strong>¿Necesitas ayuda?</strong> Contacta al soporte o revisa la documentación interna para procedimientos de recepción y gestión de productos.
            </div>
        </div>
    </div>
</div>
                    </div>
                </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->

@endsection
