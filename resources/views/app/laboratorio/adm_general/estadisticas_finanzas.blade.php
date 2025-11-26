
@extends('template.laboratorio.laboratorio_profesional.template')
@section('content')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Inventario</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('laboratorio.area_comercial') }}">Administración</a></li>
                            <li class="breadcrumb-item"><a href="#">Inventario</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Header-->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title font-weight-bold">Estadísticas de Finanzas</h4>
                    <p class="card-text">Aquí puedes ver las estadísticas financieras relacionadas con el inventario del laboratorio.</p>
                    <!-- Formulario de filtros generales -->
                    <form method="GET" action="" class="mb-4">
                        <div class="form-row align-items-end">
                            <div class="form-group col-md-3">
                                <label for="fecha_inicio">Fecha inicio</label>
                                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ request('fecha_inicio') }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="fecha_final">Fecha final</label>
                                <input type="date" class="form-control" id="fecha_final" name="fecha_final" value="{{ request('fecha_final') }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="institucion">Institución</label>
                                <select class="form-control" id="institucion" name="institucion">
                                    <option value="">Todas</option>
                                    @foreach($sucursales ?? [] as $inst)
                                        <option value="{{ $inst->id }}" {{ request('institucion') == $inst->id ? 'selected' : '' }}>{{ $inst->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="profesional">Profesional</label>
                                <select class="form-control" id="profesional" name="profesional">
                                    <option value="">Todos</option>
                                    @foreach($profesionales ?? [] as $prof)
                                        <option value="{{ $prof->id }}" {{ request('profesional') == $prof->id ? 'selected' : '' }}>{{ $prof->nombre }} {{ $prof->apellido_uno }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                    <!-- Nav pills -->
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-totales-tab" data-toggle="pill" href="#pills-totales" role="tab" aria-controls="pills-totales" aria-selected="true">Totales</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-agenda-tab" data-toggle="pill" href="#pills-agenda" role="tab" aria-controls="pills-agenda" aria-selected="false">Agenda</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-ventas-tab" data-toggle="pill" href="#pills-ventas" role="tab" aria-controls="pills-ventas" aria-selected="false">Ventas</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-profesional-tab" data-toggle="pill" href="#pills-profesional" role="tab" aria-controls="pills-profesional" aria-selected="false">Profesional</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-tratamientos-tab" data-toggle="pill" href="#pills-tratamientos" role="tab" aria-controls="pills-tratamientos" aria-selected="false">Tratamientos</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-productos-tab" data-toggle="pill" href="#pills-productos" role="tab" aria-controls="pills-productos" aria-selected="false">Productos</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-comision-tab" data-toggle="pill" href="#pills-comision" role="tab" aria-controls="pills-comision" aria-selected="false">Comisión</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-comisiones-tab" data-toggle="pill" href="#pills-comisiones" role="tab" aria-controls="pills-comisiones" aria-selected="false">Comisiones</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-comisionatencion-tab" data-toggle="pill" href="#pills-comisionatencion" role="tab" aria-controls="pills-comisionatencion" aria-selected="false">Comisión por atención</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-consolidado-tab" data-toggle="pill" href="#pills-consolidado" role="tab" aria-controls="pills-consolidado" aria-selected="false">Consolidado</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-boletas-tab" data-toggle="pill" href="#pills-boletas" role="tab" aria-controls="pills-boletas" aria-selected="false">Boletas</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-bonos-tab" data-toggle="pill" href="#pills-bonos" role="tab" aria-controls="pills-bonos" aria-selected="false">Bonos</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-retiros-tab" data-toggle="pill" href="#pills-retiros" role="tab" aria-controls="pills-retiros" aria-selected="false">Retiros</a>
                        </li>
                        {{-- <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-excedentes-tab" data-toggle="pill" href="#pills-excedentes" role="tab" aria-controls="pills-excedentes" aria-selected="false">Venta de excedentes</a>
                        </li> --}}
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-pacientes-tab" data-toggle="pill" href="#pills-pacientes" role="tab" aria-controls="pills-pacientes" aria-selected="false">Pacientes</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-totales" role="tabpanel" aria-labelledby="pills-totales-tab">
                            <h5>Totales</h5>
                            <p>Resumen general de ingresos, egresos y balance.</p>
                            <ul>
                                <li>Ingresos totales: <strong>$0</strong></li>
                                <li>Egresos totales: <strong>$0</strong></li>
                                <li>Balance: <strong>$0</strong></li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="pills-agenda" role="tabpanel" aria-labelledby="pills-agenda-tab">
                            <h5>Agenda</h5>
                            <p>Estadísticas de citas agendadas, realizadas y canceladas.</p>
                            {{-- <ul>
                                <li>Citas agendadas: <strong>0</strong></li>
                                <li>Citas realizadas: <strong>0</strong></li>
                                <li>Citas canceladas: <strong>0</strong></li>
                            </ul> --}}
                            <div id="grafico_agenda"></div>
                        </div>
                        <div class="tab-pane fade" id="pills-ventas" role="tabpanel" aria-labelledby="pills-ventas-tab">
                            {{-- <h5>Ventas</h5>
                            <p>Detalle de ventas realizadas en el periodo.</p>
                            <ul>
                                <li>Ventas totales: <strong>0</strong></li>
                                <li>Ingresos por ventas: <strong>$0</strong></li>
                            </ul> --}}
                            <div id="grafico_ventas"></div>
                        </div>
                        <div class="tab-pane fade" id="pills-profesional" role="tabpanel" aria-labelledby="pills-profesional-tab">
                            {{-- <h5>Profesional</h5>
                            <p>Estadísticas por profesional: atenciones, ingresos y comisiones.</p>
                            <ul>
                                <li>Profesionales activos: <strong>0</strong></li>
                                <li>Atenciones realizadas: <strong>0</strong></li>
                            </ul> --}}
                            <div id="grafico_profesional"></div>
                        </div>
                        <div class="tab-pane fade" id="pills-tratamientos" role="tabpanel" aria-labelledby="pills-tratamientos-tab">
                            {{-- <h5>Tratamientos</h5>
                            <p>Estadísticas de tratamientos realizados y sus ingresos.</p>
                            <ul>
                                <li>Tratamientos realizados: <strong>0</strong></li>
                                <li>Ingresos por tratamientos: <strong>$0</strong></li>
                            </ul> --}}
                            <div id="grafico_tratamientos"></div>
                        </div>
                        <div class="tab-pane fade" id="pills-productos" role="tabpanel" aria-labelledby="pills-productos-tab">
                            {{-- <h5>Productos</h5>
                            <p>Estadísticas de productos vendidos y stock.</p>
                            <ul>
                                <li>Productos vendidos: <strong>0</strong></li>
                                <li>Stock actual: <strong>0</strong></li>
                            </ul> --}}
                            <div id="grafico_productos"></div>
                        </div>
                        <div class="tab-pane fade" id="pills-comision" role="tabpanel" aria-labelledby="pills-comision-tab">
                            {{-- <h5>Comisión</h5>
                            <p>Detalle de comisiones individuales.</p>
                            <ul>
                                <li>Comisión total: <strong>$0</strong></li>
                            </ul> --}}
                             <div id="grafico_comision"></div>
                        </div>
                        <div class="tab-pane fade" id="pills-comisiones" role="tabpanel" aria-labelledby="pills-comisiones-tab">
                            {{-- <h5>Comisiones</h5>
                            <p>Resumen de todas las comisiones pagadas.</p>
                            <ul>
                                <li>Comisiones pagadas: <strong>$0</strong></li>
                            </ul> --}}
                            <div id="grafico_comisiones"></div>
                        </div>
                        <div class="tab-pane fade" id="pills-comisionatencion" role="tabpanel" aria-labelledby="pills-comisionatencion-tab">
                            {{-- <h5>Comisión por atención</h5>
                            <p>Detalle de comisiones por cada atención realizada.</p>
                            <ul>
                                <li>Atenciones con comisión: <strong>0</strong></li>
                                <li>Monto total: <strong>$0</strong></li>
                            </ul> --}}
                            <div id="grafico_comision_atencion"></div>
                        </div>
                        {{-- <div class="tab-pane fade" id="pills-consolidado" role="tabpanel" aria-labelledby="pills-consolidado-tab">
                            <h5>Consolidado</h5>
                            <p>Consolidado financiero general.</p>
                            <ul>
                                <li>Ingresos consolidados: <strong>$0</strong></li>
                                <li>Egresos consolidados: <strong>$0</strong></li>
                            </ul>
                        </div> --}}
                        <div class="tab-pane fade" id="pills-boletas" role="tabpanel" aria-labelledby="pills-boletas-tab">
                            <h5>Boletas</h5>
                            <p>Estadísticas de boletas emitidas.</p>
                            <ul>
                                <li>Boletas emitidas: <strong>0</strong></li>
                                <li>Monto total: <strong>$0</strong></li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="pills-bonos" role="tabpanel" aria-labelledby="pills-bonos-tab">
                            {{-- <h5>Bonos</h5>
                            <p>Estadísticas de bonos utilizados.</p>
                            <ul>
                                <li>Bonos utilizados: <strong>0</strong></li>
                                <li>Monto total: <strong>$0</strong></li>
                            </ul> --}}
                            <div id="grafico_bonos"></div>
                        </div>
                        <div class="tab-pane fade" id="pills-retiros" role="tabpanel" aria-labelledby="pills-retiros-tab">
                            <h5>Retiros</h5>
                            <p>Detalle de retiros realizados.</p>
                            <ul>
                                <li>Retiros realizados: <strong>0</strong></li>
                                <li>Monto total: <strong>$0</strong></li>
                            </ul>
                        </div>
                        {{-- <div class="tab-pane fade" id="pills-excedentes" role="tabpanel" aria-labelledby="pills-excedentes-tab">
                            <h5>Venta de excedentes</h5>
                            <p>Estadísticas de ventas de excedentes.</p>
                            <ul>
                                <li>Ventas de excedentes: <strong>0</strong></li>
                                <li>Monto total: <strong>$0</strong></li>
                            </ul>
                        </div> --}}
                        <div class="tab-pane fade" id="pills-pacientes" role="tabpanel" aria-labelledby="pills-pacientes-tab">
                            <h5>Pacientes</h5>
                            <p>Estadísticas de pacientes atendidos.</p>
                            <ul>
                                <li>Pacientes atendidos: <strong>0</strong></li>
                                <li>Nuevos pacientes: <strong>0</strong></li>
                            </ul>
                            <div id="grafico_pacientes"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
<script>
    // Función general para capturar los datos del formulario de filtros
    function getFiltrosEstadisticas() {
        return {
            fecha_inicio: document.getElementById('fecha_inicio').value,
            fecha_final: document.getElementById('fecha_final').value,
            institucion: document.getElementById('institucion').value,
            profesional: document.getElementById('profesional').value
        };
    }

    // Validar que al menos una fecha esté ingresada
    function validarFechas() {
        const filtros = getFiltrosEstadisticas();
        if (!filtros.fecha_inicio && !filtros.fecha_final) {
            swal({
                title: "Error",
                text: "Debe ingresar al menos la fecha de inicio o la fecha final.",
                icon: "error",
                button: "Aceptar",
            });
            return false;
        }
        return true;
    }

    function validarProfesional() {
        const profesional = document.getElementById('profesional').value;
        if (!profesional) {
            swal({
                title: "Error",
                text: "Debe seleccionar un profesional para esta estadística.",
                icon: "error",
                button: "Aceptar",
            });
            return false;
        }
        return true;
    }

    // Funciones para cada tab (pill)
    function cargarTotales() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        // Aquí puedes hacer una petición AJAX o manipular el DOM según los filtros
        console.log('Totales:', filtros);
    }

    function cargarAgenda() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Agenda:', filtros);
        $.ajax({
            url: '{{ route("laboratorio.estadisticas.buscar") }}',
            type: 'GET',
            data: {
                fecha_inicio: filtros.fecha_inicio,
                fecha_fin: filtros.fecha_final,
                id_institucion: filtros.institucion,
                id_sucursal: filtros.profesional,
                id_profesional: filtros.profesional,
                tipo_estadistica: 'agenda'
            },
            success: function(response) {
                console.log(response);
                // Aquí puedes renderizar los resultados
                $('#grafico_agenda').html(response || '<div class="alert alert-info">No hay resultados para el rango seleccionado.</div>');
            },
            error: function(error) {
                console.log(error);
                $('#grafico_agenda').html('<div class="alert alert-danger">Error al buscar estadísticas.</div>');
            }
        });
    }

    function cargarVentas() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Ventas:', filtros);

        // Petición AJAX (ajusta la ruta según tu backend)
        $.ajax({
            url: '{{ route("laboratorio.estadisticas.buscar") }}',
            type: 'GET',
            data: {
                fecha_inicio: filtros.fecha_inicio,
                fecha_fin: filtros.fecha_final,
                id_institucion: filtros.institucion,
                id_sucursal: filtros.profesional,
                tipo_estadistica: 'ventas'
            },
            success: function(response) {
                console.log(response);
                // Aquí puedes renderizar los resultados
                $('#grafico_ventas').html(response || '<div class="alert alert-info">No hay resultados para el rango seleccionado.</div>');
            },
            error: function(error) {
                console.log(error);
                $('#grafico_ventas').html('<div class="alert alert-danger">Error al buscar estadísticas.</div>');
            }
        });
    }

    function cargarProfesional() {
        if (!validarFechas()) return;
        if (!validarProfesional()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Profesional:', filtros);
        // Petición AJAX (ajusta la ruta según tu backend)
        $.ajax({
            url: '{{ route("laboratorio.estadisticas.buscar") }}',
            type: 'GET',
            data: {
                fecha_inicio: filtros.fecha_inicio,
                fecha_fin: filtros.fecha_final,
                id_institucion: filtros.institucion,
                id_sucursal: filtros.profesional,
                id_profesional: filtros.profesional,
                tipo_estadistica: 'profesional'
            },
            success: function(response) {
                console.log(response);
                // Aquí puedes renderizar los resultados
                $('#grafico_profesional').html(response || '<div class="alert alert-info">No hay resultados para el rango seleccionado.</div>');
            },
            error: function(error) {
                console.log(error);
                $('#grafico_profesional').html('<div class="alert alert-danger">Error al buscar estadísticas.</div>');
            }
        });
    }

    function cargarTratamientos() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Tratamientos:', filtros);
        // Petición AJAX (ajusta la ruta según tu backend)
        $.ajax({
            url: '{{ route("laboratorio.estadisticas.buscar") }}',
            type: 'GET',
            data: {
                fecha_inicio: filtros.fecha_inicio,
                fecha_fin: filtros.fecha_final,
                id_institucion: filtros.institucion,
                id_sucursal: filtros.profesional,
                id_profesional: filtros.profesional,
                tipo_estadistica: 'tratamientos'
            },
            success: function(response) {
                console.log(response);
                // Aquí puedes renderizar los resultados
                $('#grafico_tratamientos').html(response || '<div class="alert alert-info">No hay resultados para el rango seleccionado.</div>');
            },
            error: function(error) {
                console.log(error);
                $('#grafico_tratamientos').html('<div class="alert alert-danger">Error al buscar estadísticas.</div>');
            }
        });
    }

    function cargarProductos() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Productos:', filtros);
        // Petición AJAX (ajusta la ruta según tu backend)
        $.ajax({
            url: '{{ route("laboratorio.estadisticas.buscar") }}',
            type: 'GET',
            data: {
                fecha_inicio: filtros.fecha_inicio,
                fecha_fin: filtros.fecha_final,
                id_institucion: filtros.institucion,
                id_sucursal: filtros.sucursal,
                id_profesional: filtros.profesional,
                tipo_estadistica: 'productos'
            },
            success: function(response) {
                console.log(response);
                // Aquí puedes renderizar los resultados
                $('#grafico_productos').html(response || '<div class="alert alert-info">No hay resultados para el rango seleccionado.</div>');
            },
            error: function(error) {
                console.log(error);
                $('#grafico_productos').html('<div class="alert alert-danger">Error al buscar estadísticas.</div>');
            }
        });
    }

    function cargarComision() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Comisión:', filtros);
        $.ajax({
            url: '{{ route("laboratorio.estadisticas.buscar") }}',
            type: 'GET',
            data: {
                fecha_inicio: filtros.fecha_inicio,
                fecha_fin: filtros.fecha_final,
                id_institucion: filtros.institucion,
                id_sucursal: filtros.sucursal,
                id_profesional: filtros.profesional,
                tipo_estadistica: 'comisiones'
            },
            success: function(response) {
                console.log(response);
                // Aquí puedes renderizar los resultados
                $('#grafico_comision').html(response || '<div class="alert alert-info">No hay resultados para el rango seleccionado.</div>');
            },
            error: function(error) {
                console.log(error);
                $('#grafico_comision').html('<div class="alert alert-danger">Error al buscar estadísticas.</div>');
            }
        });
    }
    function cargarComisiones() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Comisiones:', filtros);
        
    }
    function cargarComisionAtencion() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Comisión por atención:', filtros);
    }
    function cargarConsolidado() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Consolidado:', filtros);
    }
    function cargarBoletas() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Boletas:', filtros);
    }
    function cargarBonos() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Bonos:', filtros);
        $.ajax({
            url: '{{ route("laboratorio.estadisticas.buscar") }}',
            type: 'GET',
            data: {
                fecha_inicio: filtros.fecha_inicio,
                fecha_fin: filtros.fecha_final,
                id_institucion: filtros.institucion,
                id_sucursal: filtros.sucursal,
                id_profesional: filtros.profesional,
                tipo_estadistica: 'bonos'
            },
            success: function(response) {
                console.log(response);
                // Aquí puedes renderizar los resultados
                $('#grafico_bonos').html(response || '<div class="alert alert-info">No hay resultados para el rango seleccionado.</div>');
            },
            error: function(error) {
                console.log(error);
                $('#grafico_bonos').html('<div class="alert alert-danger">Error al buscar estadísticas.</div>');
            }
        });
    }
    function cargarRetiros() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Retiros:', filtros);
    }
    function cargarExcedentes() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Venta de excedentes:', filtros);
    }

    function cargarPacientes() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Pacientes:', filtros);
        $.ajax({
            url: '{{ route("laboratorio.estadisticas.buscar") }}',
            type: 'GET',
            data: {
                fecha_inicio: filtros.fecha_inicio,
                fecha_fin: filtros.fecha_final,
                id_institucion: filtros.institucion,
                id_sucursal: filtros.sucursal,
                id_profesional: filtros.profesional,
                tipo_estadistica: 'pacientes'
            },
            success: function(response) {
                console.log(response);
                // Aquí puedes renderizar los resultados
                $('#grafico_pacientes').html(response || '<div class="alert alert-info">No hay resultados para el rango seleccionado.</div>');
            },
            error: function(error) {
                console.log(error);
                $('#grafico_pacientes').html('<div class="alert alert-danger">Error al buscar estadísticas.</div>');
            }
        });
    }   

    // Asignar eventos al cambiar de tab
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('pills-totales-tab').addEventListener('click', cargarTotales);
        document.getElementById('pills-agenda-tab').addEventListener('click', cargarAgenda);
        document.getElementById('pills-ventas-tab').addEventListener('click', cargarVentas);
        document.getElementById('pills-profesional-tab').addEventListener('click', cargarProfesional);
        document.getElementById('pills-tratamientos-tab').addEventListener('click', cargarTratamientos);
        document.getElementById('pills-productos-tab').addEventListener('click', cargarProductos);
        document.getElementById('pills-comision-tab').addEventListener('click', cargarComision);
        document.getElementById('pills-comisiones-tab').addEventListener('click', cargarComisiones);
        document.getElementById('pills-comisionatencion-tab').addEventListener('click', cargarComisionAtencion);
        document.getElementById('pills-consolidado-tab').addEventListener('click', cargarConsolidado);
        document.getElementById('pills-boletas-tab').addEventListener('click', cargarBoletas);
        document.getElementById('pills-bonos-tab').addEventListener('click', cargarBonos);
        document.getElementById('pills-retiros-tab').addEventListener('click', cargarRetiros);
        // document.getElementById('pills-excedentes-tab').addEventListener('click', cargarExcedentes);
        document.getElementById('pills-pacientes-tab').addEventListener('click', cargarPacientes);
    });
</script>
@endsection
