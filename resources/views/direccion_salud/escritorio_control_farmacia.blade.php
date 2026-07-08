@extends('template.direccion_salud.template')

@section('content')

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- Header -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Historial de Controles de Farmacias</h5>
                        </div>

                        <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('ministerio.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('conect_farmacia') }}" data-toggle="tooltip" data-placement="top" title="Volver a panel de configuración">Conexión Farmacia</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Historial de Controles de Farmacias</a>
                                </li>
                            </ul>

                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Header -->

        <!-- Tarjetas resumen -->
        <div class="row" id="cards_resumen">
            <div class="col-6 col-sm-3">
                <div class="card text-center">
                    <div class="card-body py-2">
                        <h3 class="mb-0 text-purple f-w-700" id="rsm_total">—</h3>
                        <h6 class="mb-0 f-14 text-purple text-c-blue">Total controles</h6>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <div class="card text-center">
                    <div class="card-body py-2">
                        <h3 class="mb-0 text-success f-w-700" id="rsm_finalizada">—</h3>
                        <h6 class="mb-0 f-14 text-success">Finalizados</h6>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <div class="card text-center">
                    <div class="card-body py-2">
                        <h3 class="mb-0 text-warning f-w-700" id="rsm_en_curso">—</h3>
                        <h6 class="mb-0 f-15 text-warning">En curso</h6>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <div class="card text-center">
                    <div class="card-body py-2">
                        <h3 class="mb-0 text-danger f-w-700" id="rsm_cancelada">—</h3>
                        <h6 class="mb-0 f-15 text-danger">Cancelados</h6>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filtros -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-row align-items-end">
                            <div class="form-group col-sm-12 col-md-3 mb-2">
                                <label class="floating-label-activo-sm">Farmacia</label>
                                <select class="form-control form-control-sm" id="filtro_farmacia">
                                    <option value="">Todas las farmacias</option>
                                    @foreach($farmacias as $f)
                                        <option value="{{ $f->nombre }}">{{ $f->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6 col-md-2 mb-2">
                                <label class="floating-label-activo-sm">Tipo</label>
                                <select class="form-control form-control-sm" id="filtro_tipo">
                                    <option value="">Todos</option>
                                    <option value="control_stock">Control de Stock</option>
                                    <option value="vencimientos">Vencimientos</option>
                                    <option value="fiscalizacion">Fiscalización</option>
                                    <option value="coordinacion">Coordinación</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6 col-md-2 mb-2">
                                <label class="floating-label-activo-sm">Estado</label>
                                <select class="form-control form-control-sm" id="filtro_estado">
                                    <option value="">Todos</option>
                                    <option value="finalizada">Finalizada</option>
                                    <option value="en_curso">En curso</option>
                                    <option value="cancelada">Cancelada</option>
                                    <option value="pendiente">Pendiente</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6 col-md-2 mb-2">
                                <label class="floating-label-activo-sm">Desde</label>
                                <input type="date" class="form-control form-control-sm" id="filtro_fecha_desde">
                            </div>
                            <div class="form-group col-sm-6 col-md-2 mb-2">
                                <label class="floating-label-activo-sm">Hasta</label>
                                <input type="date" class="form-control form-control-sm" id="filtro_fecha_hasta">
                            </div>
                            <div class="col-sm-12 col-md-1 mb-2 d-flex align-items-end">
                                <button class="btn btn-primary-light-c btn-sm btn-block" onclick="cargar_controles()">
                                    <i class="feather icon-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla principal -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-white py-2">
                        <h6 class="mb-0 d-inline text-dark f-18">
                            Controles Realizados
                        </h6>
                        <button class="btn btn-info btn-sm float-right" onclick="cargar_controles()">
                            <i class="feather icon-refresh-cw"></i> Actualizar
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <!-- Spinner -->
                        <div id="spinner_controles" class="text-center py-5">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Cargando...</span>
                            </div>
                            <p class="text-muted mt-2 f-14">Cargando controles...</p>
                        </div>
                        <!-- Sin resultados -->
                        <div id="sin_controles" class="text-center py-5" style="display:none">
                            <i class="feather icon-inbox f-40 text-muted"></i>
                            <p class="text-muted mt-2">No se encontraron controles con los filtros aplicados.</p>
                        </div>
                        <!-- Contenedor tabla -->
                        <div id="contenedor_tabla_controles" style="display:none">
                            <div class="table-responsive">
                                <table id="tabla_controles" class="table table-sm table-hover mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="align-middle">Farmacia</th>
                                            <th class="text-center align-middle">Tipo</th>
                                            <th class="align-middle">Responsable</th>
                                            <th class="text-center align-middle">Hora Inicio</th>
                                            <th class="text-center align-middle">Hora Término</th>
                                            <th class="text-center align-middle">Estado</th>
                                            <th class="align-middle">Acta</th>
                                            <th class="text-center align-middle">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_controles">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin tabla -->

    </div><!-- /pcoded-content -->
</div><!-- /pcoded-main-container -->

<!-- Modal detalle control -->
<div class="modal fade" id="modal_detalle_control" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h6 class="modal-title">
                    <i class="feather icon-file-text mr-1"></i>
                    Detalle del Control — <span id="det_farmacia_nombre"></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <p class="mb-1 f-12 text-muted">Fecha</p>
                        <p class="mb-0 f-w-600" id="det_fecha"></p>
                    </div>
                    <div class="col-sm-4">
                        <p class="mb-1 f-12 text-muted">Tipo</p>
                        <p class="mb-0" id="det_tipo"></p>
                    </div>
                    <div class="col-sm-4">
                        <p class="mb-1 f-12 text-muted">Estado</p>
                        <p class="mb-0" id="det_estado"></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <p class="mb-1 f-12 text-muted">Responsable</p>
                        <p class="mb-0" id="det_responsable"></p>
                    </div>
                    <div class="col-sm-4">
                        <p class="mb-1 f-12 text-muted">Hora inicio</p>
                        <p class="mb-0" id="det_hora_inicio"></p>
                    </div>
                    <div class="col-sm-4">
                        <p class="mb-1 f-12 text-muted">Hora término</p>
                        <p class="mb-0" id="det_hora_termino"></p>
                    </div>
                </div>
                <div class="mb-3" id="det_enlace_wrapper">
                    <p class="mb-1 f-12 text-muted">Enlace sesión Jitsi</p>
                    <a id="det_enlace" href="#" target="_blank" class="text-truncate d-block"></a>
                </div>
                <div class="mb-3">
                    <p class="mb-1 f-12 text-muted">Acta / Observaciones</p>
                    <div id="det_acta" class="bg-light p-2 rounded f-14" style="white-space:pre-wrap; max-height:200px; overflow-y:auto;"></div>
                </div>
                <div id="det_productos_wrapper">
                    <p class="mb-1 f-12 text-muted">Productos chequeados en sesión</p>
                    <div class="row mb-2">
                        <div class="col">
                            <div class="progress" style="height:8px;">
                                <div id="det_barra_prog" class="progress-bar bg-success" style="width:0%"></div>
                            </div>
                        </div>
                        <div class="col-auto f-12" id="det_pct"></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Producto</th>
                                    <th class="text-center">Verificado</th>
                                </tr>
                            </thead>
                            <tbody id="det_tbody_productos"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-2">
                <button class="btn btn-outline-secondary btn-sm" onclick="imprimir_detalle()">
                    <i class="feather icon-printer mr-1"></i>Imprimir
                </button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin modal detalle -->

@endsection

@section('page-script')
<script>
    var listaControles = [];
    var detalleIdx     = -1;

    var etiquetasTipo = {
        control_stock:  'Control de Stock',
        vencimientos:   'Vencimientos',
        fiscalizacion:  'Fiscalización',
        coordinacion:   'Coordinación',
        otro:           'Otro'
    };

    var etiquetasEstado = {
        finalizada: { txt: 'Finalizada', cls: 'badge-success'   },
        en_curso:   { txt: 'En curso',   cls: 'badge-warning'   },
        cancelada:  { txt: 'Cancelada',  cls: 'badge-danger'    },
        pendiente:  { txt: 'Pendiente',  cls: 'badge-secondary' }
    };

    function cargar_controles() {
        $('#spinner_controles').show();
        $('#sin_controles').hide();
        $('#contenedor_tabla_controles').hide();

        $.ajax({
            url:      '{{ route("ministerio.control_farmacia.listar") }}',
            method:   'GET',
            dataType: 'json',
            data: {
                farmacia:    $('#filtro_farmacia').val(),
                tipo:        $('#filtro_tipo').val(),
                estado:      $('#filtro_estado').val(),
                fecha_desde: $('#filtro_fecha_desde').val(),
                fecha_hasta: $('#filtro_fecha_hasta').val()
            },
            success: function (resp) {
                console.log(resp);
                $('#spinner_controles').hide();
                if (resp.estado !== 'ok') { return; }

                listaControles = resp.controles;

                /* Actualizar cards resumen */
                $('#rsm_total').text(resp.totales.total);
                $('#rsm_finalizada').text(resp.totales.finalizada);
                $('#rsm_en_curso').text(resp.totales.en_curso);
                $('#rsm_cancelada').text(resp.totales.cancelada);

                if (listaControles.length === 0) {
                    $('#sin_controles').show();
                    return;
                }

                /* Renderizar filas */
                var html = '';
                $.each(listaControles, function (i, c) {
                    var estadoInfo = etiquetasEstado[c.estado] || { txt: c.estado, cls: 'badge-secondary' };
                    var tipoTxt   = etiquetasTipo[c.tipo]   || c.tipo;
                    var actaTxt   = c.acta ? (c.acta.length > 60 ? c.acta.substring(0, 60) + '…' : c.acta) : '—';
                    var fechaFmt  = c.fecha ? c.fecha.split('-').reverse().join('/') : '—';

                    html += '<tr>';
                    html += '<td class="text-center align-middle text-nowrap">' + fechaFmt + '</td>';
                    html += '<td class="align-middle">'   + escHtml(c.farmacia_nombre)       + '</td>';
                    html += '<td class="text-center align-middle text-nowrap"><span class="badge badge-light text-dark border">' + tipoTxt + '</span></td>';
                    html += '<td class="align-middle">'   + escHtml(c.responsable || '—')    + '</td>';
                    html += '<td class="text-center align-middle">' + (c.hora_inicio   || '—') + '</td>';
                    html += '<td class="text-center align-middle">' + (c.hora_termino  || '—') + '</td>';
                    html += '<td class="text-center align-middle"><span class="badge ' + estadoInfo.cls + '">' + estadoInfo.txt + '</span></td>';
                    html += '<td class="align-middle f-12 text-muted">' + escHtml(actaTxt) + '</td>';
                    html += '<td class="text-center align-middle">';
                    html += '  <button class="btn btn-icon btn-sm btn-outline-primary" onclick="ver_detalle(' + i + ')" title="Ver detalle"><i class="feather icon-eye"></i></button>';
                    html += '</td>';
                    html += '</tr>';
                });

                $('#tbody_controles').html(html);

                /* Inicializar / re-inicializar DataTable */
                if ($.fn.DataTable.isDataTable('#tabla_controles')) {
                    $('#tabla_controles').DataTable().destroy();
                }
                $('#tabla_controles').DataTable({
                    language:    { url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json' },
                    order:       [[0, 'desc']],
                    pageLength:  15,
                    responsive:  true,
                    columnDefs:  [{ orderable: false, targets: [8] }]
                });

                $('#contenedor_tabla_controles').show();
            },
            error: function (err) {
                console.log(err);
                $('#spinner_controles').hide();
                $('#sin_controles').show();
                swal({ title: 'Error', text: 'No se pudo cargar el historial de controles.', icon: 'error', buttons: 'Aceptar' });
            }
        });
    }

    function ver_detalle(idx) {
        var c = listaControles[idx];
        if (!c) return;
        detalleIdx = idx;

        var fechaFmt   = c.fecha  ? c.fecha.split('-').reverse().join('/') : '—';
        var estadoInfo = etiquetasEstado[c.estado] || { txt: c.estado, cls: 'badge-secondary' };
        var tipoTxt    = etiquetasTipo[c.tipo] || c.tipo;

        $('#det_farmacia_nombre').text(c.farmacia_nombre);
        $('#det_fecha').text(fechaFmt);
        $('#det_tipo').text(tipoTxt);
        $('#det_estado').html('<span class="badge ' + estadoInfo.cls + '">' + estadoInfo.txt + '</span>');
        $('#det_responsable').text(c.responsable   || '—');
        $('#det_hora_inicio').text(c.hora_inicio   || '—');
        $('#det_hora_termino').text(c.hora_termino || '—');
        $('#det_acta').text(c.acta || '—');

        /* Enlace Jitsi */
        if (c.enlace_jitsi) {
            $('#det_enlace').attr('href', c.enlace_jitsi).text(c.enlace_jitsi);
            $('#det_enlace_wrapper').show();
        } else {
            $('#det_enlace_wrapper').hide();
        }

        /* Productos verificados */
        var productos = c.productos_verificados;
        if (typeof productos === 'string') { try { productos = JSON.parse(productos); } catch(e) { productos = null; } }

        if (productos && productos.length > 0) {
            var verifCount = productos.filter(function(p){ return p.verificado; }).length;
            var pct = Math.round((verifCount / productos.length) * 100);
            $('#det_barra_prog').css('width', pct + '%');
            $('#det_pct').text(verifCount + ' / ' + productos.length + ' (' + pct + '%)');

            var filas = '';
            $.each(productos, function(i, p) {
                filas += '<tr>';
                filas += '<td>' + escHtml(p.nombre) + '</td>';
                filas += '<td class="text-center">';
                filas += p.verificado
                    ? '<span class="badge badge-success"><i class="feather icon-check"></i> Verificado</span>'
                    : '<span class="badge badge-light text-muted border">Pendiente</span>';
                filas += '</td>';
                filas += '</tr>';
            });
            $('#det_tbody_productos').html(filas);
            $('#det_productos_wrapper').show();
        } else {
            $('#det_productos_wrapper').hide();
        }

        $('#modal_detalle_control').modal('show');
    }

    function imprimir_detalle() {
        if (detalleIdx < 0) return;
        var c = listaControles[detalleIdx];
        var contenido = document.getElementById('modal_detalle_control').querySelector('.modal-body').innerHTML;
        var titulo    = c ? c.farmacia_nombre : '';
        var win = window.open('', 'imprimir_control_farmacia', 'width=820,height=650,left=100,top=80,resizable=yes,scrollbars=yes');
        win.document.write('<!DOCTYPE html><html><head><meta charset="utf-8">');
        win.document.write('<title>Control Farmacia — ' + titulo + '</title>');
        win.document.write('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">');
        win.document.write('<style>body{padding:20px;font-size:13px;} @media print{.no-print{display:none}}</style>');
        win.document.write('</head><body>');
        win.document.write('<h5 class="mb-3 pb-2 border-bottom">Control de Farmacia — ' + escHtml(titulo) + '</h5>');
        win.document.write(contenido);
        win.document.write('<br><button class="btn btn-primary btn-sm no-print" onclick="window.print()"><i>Imprimir / PDF</i></button>');
        win.document.write('</body></html>');
        win.document.close();
    }

    function escHtml(str) {
        if (str === null || str === undefined) return '';
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;');
    }

    $(document).ready(function () {
        cargar_controles();
    });
</script>
@endsection

