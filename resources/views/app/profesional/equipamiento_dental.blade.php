@extends('template.profesional.template')
@section('content')

    <style>
        /* Buscador con ícono dentro del input */
        .input-buscador {
            position: relative;
        }

        .input-buscador > i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 17px;
            color: #1a49a3;
            pointer-events: none;
        }

        .input-buscador .form-control {
            padding-left: 42px;
        }

        .input-buscador .form-control::placeholder {
            color: #b9c1d1;
        }

        .pcoded-content .form-control:focus,
        .modal .form-control:focus,
        .pcoded-content .custom-select:focus,
        .modal .custom-select:focus {
            border-color: #1a49a3;
            box-shadow: 0 0 0 .18rem rgba(26, 73, 163, .18);
        }
    </style>

    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="page-header-title"></div>
                            <ul class="breadcrumb mt-3">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.configuracion') }}" data-toggle="tooltip" data-placement="top" title="Volver a panel de configuración">
                                        Panel de Configuración
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Equipamiento Dental</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <!-- Cards de resumen (compactas, icono a la izquierda) -->
            <div class="row mb-3">
                <div class="col-sm-6 col-md-4 col-lg col-xl mb-2">
                    <div class="card py-2 mb-0">
                        <div class="card-body py-2 px-3 d-flex align-items-center">
                            <i class="feather icon-layers f-24 text-primary mr-3"></i>
                            <div>
                                <h5 class="f-w-700 f-26 mb-0">{{ $equipamientos->count() }}</h5>
                                <p class="text-muted mb-0 f-12">Total equipos</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg col-xl mb-2">
                    <div class="card py-2 mb-0">
                        <div class="card-body py-2 px-3 d-flex align-items-center">
                            <i class="feather icon-check-circle f-24 text-success mr-3"></i>
                            <div>
                                <h5 class="f-w-700 f-26 mb-0">{{ $equipamientos->where('estado', 'activo')->count() }}</h5>
                                <p class="text-muted mb-0 f-12">Activos</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg col-xl mb-2">
                    <div class="card py-2 mb-0">
                        <div class="card-body py-2 px-3 d-flex align-items-center">
                            <i class="feather icon-settings f-24 text-warning mr-3"></i>
                            <div>
                                <h5 class="f-w-700 f-26 mb-0">{{ $equipamientos->where('estado', 'en_mantencion')->count() }}</h5>
                                <p class="text-muted mb-0 f-12">En mantención</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg col-xl mb-2">
                    <div class="card py-2 mb-0">
                        <div class="card-body py-2 px-3 d-flex align-items-center">
                            <i class="feather icon-x-circle f-24 text-danger mr-3"></i>
                            <div>
                                <h5 class="f-w-700 f-26 mb-0">{{ $equipamientos->where('estado', 'inactivo')->count() }}</h5>
                                <p class="text-muted mb-0 f-12">Inactivos</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg col-xl mb-2">
                    <div class="card py-2 mb-0">
                        <div class="card-body py-2 px-3 d-flex align-items-center">
                            <i class="feather icon-calendar f-24 text-info mr-3"></i>
                            <div>
                                <h5 class="f-w-700 f-26 mb-0">{{ $equipamientos->where('condicion', 'prox_mantencion')->count() }}</h5>
                                <p class="text-muted mb-0 f-12">Próx. mantención</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cierre: Cards de resumen -->

            <!-- Filtros -->
            <div class="card mb-3">
                <div class="card-body py-2">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-4 col-lg-4 mb-2 mb-md-0">
                            <div class="input-buscador">
                                <i class="feather icon-search"></i>
                                <input type="text" id="filtro_busqueda" class="form-control"
                                    placeholder="Buscar equipo, marca, modelo...">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md col-lg mb-2 mb-md-0">
                            <select id="filtro_ubicacion" class="form-control">
                                <option value="">Ubicación: Todas</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-md col-lg mb-2 mb-md-0">
                            <select id="filtro_categoria" class="form-control">
                                <option value="">Categoría: Todas</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-md col-lg mb-2 mb-md-0">
                            <select id="filtro_estado" class="form-control">
                                <option value="">Estado: Todos</option>
                                <option value="activo">Activo</option>
                                <option value="en mantención">En mantención</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-md-auto">
                            <button id="btn_limpiar_filtros" class="btn btn-light w-100">
                                <i class="feather icon-filter"></i> Limpiar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cierre: Filtros -->

            <!-- Tabla de equipamiento -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header-principal bg-white">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-12 col-md-7 col-lg-8 col-xl-8 pl-0">
                                        <h5 class="f-20 d-inline">
                                            <i class="icono-primary feather icon-file-plus"></i>
                                            Equipamiento Dental
                                        </h5>
                                    </div>
                                    <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4 text-md-right mt-2 mt-md-0 pr-0">
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevo_equipamiento">
                                            <i class="feather icon-plus"></i> Agregar Equipamiento
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabla_equipamiento" class="display table table-striped dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Elemento</th>
                                            <th>Ubicación</th>
                                            <th>Marca / Modelo</th>
                                            <th>Estado</th>
                                            <th>Condición</th>
                                            <th>Garantía hasta</th>
                                            <th>Próx. Mantención</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($equipamientos as $item)
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                @if($item->estado == 'activo')
                                                    <span class="badge badge-success">Activo</span>
                                                @elseif($item->estado == 'en_mantencion')
                                                    <span class="badge badge-warning">En mantención</span>
                                                @else
                                                    <span class="badge badge-danger">Inactivo</span>
                                                @endif
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-icon btn-warning mr-1"
                                                    title="Editar"
                                                    data-toggle="modal"
                                                    data-target="#nuevo_equipamiento"
                                                    data-mode="editar">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                                <button type="button"
                                                    class="btn btn-icon btn-secondary"
                                                    title="Mantenciones"
                                                    data-toggle="modal"
                                                    data-target="#modal_mantenciones"
                                                    data-id="{{ $item->id ?? '' }}"
                                                    data-nombre="{{ $item->nombre ?? '' }}"
                                                    data-codigo="{{ $item->codigo ?? '' }}">
                                                    <i class="feather icon-settings"></i>
                                                </button>
                                                <button type="button"
                                                    class="btn btn-icon btn-danger"
                                                    title="Eliminar">
                                                    <i class="feather icon-x"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td>EQ-001</td>
                                            <td>Sillón dental eléctrico</td>
                                            <td>Box 1</td>
                                            <td>Gnatus / G-Solid 300</td>
                                            <td><span class="badge badge-success">Activo</span></td>
                                            <td>Bueno</td>
                                            <td>31/12/2026</td>
                                            <td>15/03/2025</td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-icon btn-warning mr-1"
                                                    title="Editar"
                                                    data-toggle="modal"
                                                    data-target="#nuevo_equipamiento"
                                                    data-mode="editar"
                                                    data-id="1"
                                                    data-codigo="EQ-001"
                                                    data-nombre="Sillón dental eléctrico"
                                                    data-marca="Gnatus"
                                                    data-modelo="G-Solid 300"
                                                    data-ubicacion="Box 1"
                                                    data-estado="activo"
                                                    data-condicion="Bueno"
                                                    data-garantia="2026-12-31"
                                                    data-mantencion="2025-03-15">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                                <button type="button"
                                                    class="btn btn-icon btn-secondary"
                                                    title="Mantenciones"
                                                    data-toggle="modal"
                                                    data-target="#modal_mantenciones"
                                                    data-id="1"
                                                    data-nombre="Sillón dental eléctrico"
                                                    data-codigo="EQ-001">
                                                    <i class="feather icon-settings"></i>
                                                </button>
                                                <button type="button"
                                                    class="btn btn-icon btn-danger"
                                                    title="Eliminar">
                                                    <i class="feather icon-trash-2"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cierre: Tabla -->

        </div>
    </div>
    <!--Cierre: Container Completo-->

    <!-- Modal: Agregar / Editar Equipamiento -->
    <div class="modal fade" id="nuevo_equipamiento" tabindex="-1" role="dialog" aria-labelledby="modalEquipamientoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEquipamientoLabel">
                        <span id="modal_titulo">Agregar Equipamiento</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_equipamiento" method="POST" action="#">
                    @csrf
                    <input type="hidden" name="_method" id="form_method" value="POST">
                    <input type="hidden" name="id" id="campo_id">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Código <span class="text-danger">*</span></label>
                                    <input type="text" name="codigo" id="campo_codigo" class="form-control form-control-sm" placeholder="Ej: EQ-001" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Elemento / Nombre <span class="text-danger">*</span></label>
                                    <input type="text" name="nombre" id="campo_nombre" class="form-control form-control-sm" placeholder="Ej: Sillón dental eléctrico" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group ">
                                    <label class="floating-label-activo-sm">Marca</label>
                                    <input type="text" name="marca" id="campo_marca" class="form-control form-control-sm" placeholder="Ej: Gnatus">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group ">
                                    <label class="floating-label-activo-sm">Modelo</label>
                                    <input type="text" name="modelo" id="campo_modelo" class="form-control form-control-sm" placeholder="Ej: G-Solid 300">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group ">
                                    <label class="floating-label-activo-sm">Ubicación</label>
                                    <input type="text" name="ubicacion" id="campo_ubicacion" class="form-control form-control-sm" placeholder="Ej: Box 1, Bodega...">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group ">
                                    <label class="floating-label-activo-sm">Estado <span class="text-danger">*</span></label>
                                    <select name="estado" id="campo_estado" class="form-control form-control-sm" required>
                                        <option value="">Seleccionar</option>
                                        <option value="activo">Activo</option>
                                        <option value="en_mantencion">En mantención</option>
                                        <option value="inactivo">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Condición</label>
                                    <select name="condicion" id="campo_condicion" class="form-control form-control-sm">
                                        <option value="">Seleccionar</option>
                                        <option value="Bueno">Bueno</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Malo">Malo</option>
                                        <option value="prox_mantencion">Próxima mantención</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group ">
                                    <label class="floating-label-activo-sm">Garantía hasta</label>
                                    <input type="date" name="garantia_hasta" id="campo_garantia" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Próx. Mantención</label>
                                    <input type="date" name="prox_mantencion" id="campo_mantencion" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="feather icon-x"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-info">
                            <i class="feather icon-save"></i> Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Cierre: Modal -->

    <!-- Modal: Mantenciones -->
    <div class="modal fade" id="modal_mantenciones" tabindex="-1" role="dialog" aria-labelledby="modalMantencionLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMantencionLabel">
                        Registrar Mantención <span id="mant_nombre_equipo" class="text-muted"></span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_mantencion" method="POST" action="#">
                    @csrf
                    <input type="hidden" name="id_equipamiento" id="mant_id_equipamiento">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Fecha de mantención <span class="text-danger">*</span></label>
                                    <input type="date" name="fecha_mantencion" class="form-control form-control-sm" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tipo de mantención <span class="text-danger">*</span></label>
                                    <input type="text" name="fecha_mantencion" class="form-control form-control-sm" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Estado resultante</label>
                                    <select name="estado_resultante" class="form-control form-control-sm">
                                        <option value="">Seleccionar</option>
                                        <option value="activo">Activo / Operativo</option>
                                        <option value="en_mantencion">Requiere seguimiento</option>
                                        <option value="inactivo">Dado de baja</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Técnico / Empresa responsable</label>
                                    <input type="text" name="tecnico" class="form-control form-control-sm" placeholder="Ej: Servicio Técnico Gnatus">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Costo ($)</label>
                                    <input type="number" name="costo" class="form-control form-control-sm" placeholder="0" min="0">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Descripción / Trabajo realizado <span class="text-danger">*</span></label>
                                    <textarea name="descripcion" class="form-control form-control-sm" rows="3"
                                        placeholder="Detalle el trabajo realizado durante la mantención" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Próxima mantención programada</label>
                                    <input type="date" name="prox_mantencion" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Observaciones</label>
                                    <input type="text" name="observaciones" class="form-control form-control-sm" placeholder="Observaciones adicionales...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="feather icon-x"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-info">
                            <i class="feather icon-save"></i> Guardar mantención
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Cierre: Modal Mantenciones -->

@endsection

@section('page-script')
<script>
$(document).ready(function () {

    /* ── DataTable ── */
    var table = $('#tabla_equipamiento').DataTable({
        responsive: true,
        dom: 'lrtip',
        pageLength: 10,
        columnDefs: [
            { targets: [8], orderable: false, searchable: false }
        ],
        language: {
            lengthMenu:   'Mostrar _MENU_ registros',
            zeroRecords:  'No se encontraron resultados',
            info:         'Mostrando _START_ a _END_ de _TOTAL_ equipos',
            infoEmpty:    'Sin equipamiento registrado',
            infoFiltered: '(filtrado de _MAX_ totales)',
            paginate: {
                first:    'Primero',
                last:     'Último',
                next:     'Siguiente',
                previous: 'Anterior'
            }
        }
    });

    /* ── Filtros conectados a DataTable ── */
    $('#filtro_busqueda').on('input', function () {
        table.search(this.value).draw();
    });
    $('#filtro_ubicacion').on('change', function () {
        table.column(2).search(this.value).draw();
    });
    $('#filtro_categoria').on('change', function () {
        table.column(1).search(this.value).draw();
    });
    $('#filtro_estado').on('change', function () {
        table.column(4).search(this.value).draw();
    });
    $('#btn_limpiar_filtros').on('click', function () {
        $('#filtro_busqueda').val('');
        $('#filtro_ubicacion, #filtro_categoria, #filtro_estado').val('');
        table.search('').columns().search('').draw();
    });

    /* ── Modal mantenciones ── */
    $('#modal_mantenciones').on('show.bs.modal', function (e) {
        var btn = $(e.relatedTarget);
        $('#mant_id_equipamiento').val(btn.data('id'));
        $('#mant_nombre_equipo').text('[' + btn.data('codigo') + '] ' + btn.data('nombre'));
        $('#form_mantencion')[0].reset();
        $('#mant_id_equipamiento').val(btn.data('id'));
    });

    /* ── Modal agregar / editar ── */
    $('#nuevo_equipamiento').on('show.bs.modal', function (e) {
        var btn  = $(e.relatedTarget);
        var mode = btn.data('mode');
        if (mode === 'editar') {
            $('#modal_titulo').text('Editar Equipamiento');
            $('#form_method').val('PUT');
            $('#campo_id').val(btn.data('id'));
            $('#campo_codigo').val(btn.data('codigo'));
            $('#campo_nombre').val(btn.data('nombre'));
            $('#campo_marca').val(btn.data('marca'));
            $('#campo_modelo').val(btn.data('modelo'));
            $('#campo_ubicacion').val(btn.data('ubicacion'));
            $('#campo_garantia').val(btn.data('garantia'));
            $('#campo_mantencion').val(btn.data('mantencion'));
            $('#campo_estado').val(btn.data('estado'));
            $('#campo_condicion').val(btn.data('condicion'));
        } else {
            $('#modal_icono').attr('class', 'feather icon-plus-circle icono-primary mr-1');
            $('#modal_titulo').text('Agregar Equipamiento');
            $('#form_method').val('POST');
            $('#form_equipamiento')[0].reset();
        }
    });

});
</script>
@endsection
