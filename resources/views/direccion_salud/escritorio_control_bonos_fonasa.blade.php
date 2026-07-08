@extends('template.direccion_salud.template')

@section('content')

    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">

                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('ministerio.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Volver a panel de configuración">Control de Bonos FONASA</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <div class="row m-b-10">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-white py-3">
                            <h6 class="font-weight-bold text-dark f-18">
                                Bonos FONASA registrados
                            </h6>
                        </div>
                        <div class="card-body">
                            <!-- Filtros -->
                            <div class="form-row mb-3 align-items-end">
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Desde</label>
                                    <input type="date" class="form-control form-control-sm" id="filtro_fecha_desde">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Hasta</label>
                                    <input type="date" class="form-control form-control-sm" id="filtro_fecha_hasta">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Región</label>
                                    <select class="form-control form-control-sm" id="filtro_region">
                                        <option value="">Todas</option>
                                        @foreach ($regiones as $region)
                                            <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Ciudad</label>
                                    <select class="form-control form-control-sm" id="filtro_ciudad">
                                        <option value="">Todas</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-8">
                                    <label class="floating-label-activo-sm">Buscar</label>
                                    <input type="text" class="form-control form-control-sm" id="filtro_buscar_bono"
                                        placeholder="Número bono, boleta, RUT o paciente...">
                                </div>
                                <div class="form-group col-md-4">
                                    <button class="btn btn-primary-light-c btn-sm btn-block" onclick="cargar_bonos()">
                                        <i class="feather icon-search"></i> Buscar
                                    </button>
                                </div>
                            </div>

                            <!-- Resumen contadores -->
                            <div class="row mb-3" id="resumen_bonos" style="display:none;">
                                <div class="col-md-3">
                                    <div class="card bg-light border-0 text-center py-2">
                                        <small class="text-muted">Total bonos</small>
                                        <h4 class="font-weight-bold mb-0" id="cnt_total">0</h4>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card bg-success text-white border-0 text-center py-2">
                                        <small>Valor atención total</small>
                                        <h5 class="font-weight-bold mb-0" id="cnt_valor">$0</h5>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card bg-info text-white border-0 text-center py-2">
                                        <small>Bonificación total</small>
                                        <h5 class="font-weight-bold mb-0" id="cnt_bonificacion">$0</h5>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card bg-warning border-0 text-center py-2">
                                        <small>Rendidos</small>
                                        <h4 class="font-weight-bold mb-0" id="cnt_rendidos">0</h4>
                                    </div>
                                </div>
                            </div>

                            <!-- Spinner -->
                            <div id="spinner_bonos" class="text-center py-4" style="display:none;">
                                <div class="spinner-border text-primary" role="status"><span class="sr-only">Cargando...</span></div>
                                <p class="mt-2 text-muted small">Cargando bonos FONASA...</p>
                            </div>

                            <!-- Tabla -->
                            <div class="table-responsive" id="contenedor_tabla_bonos" style="display:none;">
                                <table id="tabla_bonos" class="display table dt-responsive nowrap table-xs" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>N° Bono</th>
                                            <th>Paciente</th>
                                            <th>Profesional</th>
                                            <th>Tipo Bono</th>
                                            <th>Fecha Atención</th>
                                            <th class="text-right">Valor</th>
                                            <th class="text-right">Bonificación</th>
                                            <th class="text-center">Rendido</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_bonos"></tbody>
                                </table>
                            </div>

                            <!-- Sin resultados -->
                            <div id="sin_resultados_bonos" class="text-center py-4" style="display:none;">
                                <i class="feather icon-credit-card" style="font-size:2.5rem;color:#ccc;"></i>
                                <p class="mt-2 text-muted">No se encontraron bonos FONASA con los filtros seleccionados.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- ===== Modal Detalle Bono ===== -->
    <div class="modal fade" id="modal_bono" tabindex="-1" role="dialog" aria-labelledby="modal_bonoLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white font-weight-bold" id="modal_bonoLabel">
                        <i class="feather icon-credit-card"></i> Detalle del Bono FONASA
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="detalle_bono_body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                        <i class="feather icon-x"></i> Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>

<script>
    var bonosCache = [];
    var dtBonos = null;

    $(document).ready(function () {
        // Fecha por defecto: inicio del mes actual — hoy
        var hoy = new Date();
        var primerDia = new Date(hoy.getFullYear(), hoy.getMonth(), 1);
        $('#filtro_fecha_desde').val(primerDia.toISOString().split('T')[0]);
        $('#filtro_fecha_hasta').val(hoy.toISOString().split('T')[0]);

        // Evento para cargar ciudades al cambiar región
        $('#filtro_region').on('change', function() {
            buscar_ciudad_filtro();
        });

        cargar_bonos();
    });

    // Nueva función para buscar ciudades en el filtro
    function buscar_ciudad_filtro() {
        let region = $('#filtro_region').val();
        let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                region: region,
            },
        })
        .done(function(data) {
            if (data != null) {
                data = JSON.parse(data);
                let ciudades = $('#filtro_ciudad');
                ciudades.find('option').remove();
                ciudades.append('<option value="">Todas</option>');
                $(data).each(function(i, v) {
                    ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                });
            } else {
                $('#filtro_ciudad').html('<option value="">Todas</option>');
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function cargar_bonos() {
        $('#spinner_bonos').show();
        $('#contenedor_tabla_bonos, #sin_resultados_bonos, #resumen_bonos').hide();

        if (dtBonos && $.fn.DataTable.isDataTable('#tabla_bonos')) {
            dtBonos.destroy();
            dtBonos = null;
        }
        $('#tbody_bonos').empty();

        $.ajax({
            url: '{{ route("ministerio.bonos_fonasa.listar") }}',
            type: 'GET',
            data: {
                fecha_desde: $('#filtro_fecha_desde').val(),
                fecha_hasta: $('#filtro_fecha_hasta').val(),
                buscar:      $('#filtro_buscar_bono').val(),
                region:      $('#filtro_region').val(),
                ciudad:      $('#filtro_ciudad').val(),
            },
            dataType: 'json',
        })
        .done(function (data) {
            $('#spinner_bonos').hide();

            if (!data.estado || data.bonos.length === 0) {
                $('#sin_resultados_bonos').show();
                return;
            }

            bonosCache = data.bonos;

            // Calcular resumen
            var totalValor = 0, totalBonif = 0, totalRendidos = 0;
            data.bonos.forEach(function (b) {
                totalValor     += parseFloat(b.valor_atencion) || 0;
                totalBonif     += parseFloat(b.bonificacion)   || 0;
                if (parseInt(b.rendido) === 1) totalRendidos++;
            });
            $('#cnt_total').text(data.bonos.length);
            $('#cnt_valor').text('$' + totalValor.toLocaleString('es-CL'));
            $('#cnt_bonificacion').text('$' + totalBonif.toLocaleString('es-CL'));
            $('#cnt_rendidos').text(totalRendidos);
            $('#resumen_bonos').show();

            $.each(data.bonos, function (i, b) {
                var badgeRendido = parseInt(b.rendido) === 1
                    ? '<span class="badge badge-success">Sí</span>'
                    : '<span class="badge badge-secondary">No</span>';

                var fila = '<tr>' +
                    '<td class="align-middle">' + (i + 1) + '</td>' +
                    '<td class="align-middle"><strong>' + (b.numero_bono || '—') + '</strong>' +
                    (b.numero_boleta && b.numero_boleta !== '0' ? '<br><small class="text-muted">Boleta: ' + b.numero_boleta + '</small>' : '') +
                    '</td>' +
                    '<td class="align-middle"><small>' + (b.paciente_nombre || '—') + '<br><span class="text-muted">' + (b.paciente_rut || '') + '</span></small></td>' +
                    '<td class="align-middle"><small>' + (b.profesional_nombre || '—') + '</small></td>' +
                    '<td class="align-middle"><small>' + (b.tipo_bono || '—') + '</small></td>' +
                    '<td class="align-middle"><small>' + (b.fecha_atencion || '—') + '</small></td>' +
                    '<td class="align-middle text-right"><small>$' + (parseFloat(b.valor_atencion) || 0).toLocaleString('es-CL') + '</small></td>' +
                    '<td class="align-middle text-right"><small>$' + (parseFloat(b.bonificacion) || 0).toLocaleString('es-CL') + '</small></td>' +
                    '<td class="align-middle text-center">' + badgeRendido + '</td>' +
                    '<td class="align-middle text-center">' +
                    '<button class="btn btn-xxs btn-primary-light-c " title="Ver detalle" ' +
                    'onclick="ver_bono(' + i + ')">' +
                    '<i class="feather icon-eye"></i> Detalle</button>' +
                    '</td>' +
                    '</tr>';
                $('#tbody_bonos').append(fila);
            });

            $('#contenedor_tabla_bonos').show();
            dtBonos = $('#tabla_bonos').DataTable({
                language: { url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json' },
                pageLength: 15,
                order: [[0, 'asc']],
                columnDefs: [{ targets: [8, 9], orderable: false }]
            });
        })
        .fail(function () {
            $('#spinner_bonos').hide();
            $('#sin_resultados_bonos').show();
        });
    }

    function ver_bono(index) {
        var b = bonosCache[index];
        if (!b) return;

        var html =
            '<div class="row">' +
            '  <div class="col-md-6">' +
            '    <table class="table table-sm table-borderless">' +
            '      <tr><td class="text-muted font-weight-bold" style="width:45%">N° Bono</td><td>' + (b.numero_bono || '—') + '</td></tr>' +
            '      <tr><td class="text-muted font-weight-bold">N° Boleta</td><td>' + (b.numero_boleta && b.numero_boleta !== '0' ? b.numero_boleta : '—') + '</td></tr>' +
            '      <tr><td class="text-muted font-weight-bold">Tipo Bono</td><td>' + (b.tipo_bono || '—') + '</td></tr>' +
            '      <tr><td class="text-muted font-weight-bold">Convenio</td><td><span class="badge badge-primary">' + (b.convenio_nombre || '—') + '</span></td></tr>' +
            '      <tr><td class="text-muted font-weight-bold">Fecha Atención</td><td>' + (b.fecha_atencion || '—') + '</td></tr>' +
            '      <tr><td class="text-muted font-weight-bold">Rendido</td><td>' + (parseInt(b.rendido) === 1 ? '<span class="badge badge-success">Sí</span>' : '<span class="badge badge-secondary">No</span>') + '</td></tr>' +
            '    </table>' +
            '  </div>' +
            '  <div class="col-md-6">' +
            '    <table class="table table-sm table-borderless">' +
            '      <tr><td class="text-muted font-weight-bold" style="width:50%">Paciente</td><td>' + (b.paciente_nombre || '—') + '</td></tr>' +
            '      <tr><td class="text-muted font-weight-bold">RUT Paciente</td><td>' + (b.paciente_rut || '—') + '</td></tr>' +
            '      <tr><td class="text-muted font-weight-bold">Profesional</td><td>' + (b.profesional_nombre || '—') + '</td></tr>' +
            '    </table>' +
            '  </div>' +
            '</div>' +
            '<hr class="my-2">' +
            '<div class="row">' +
            '  <div class="col-md-4 text-center">' +
            '    <small class="text-muted d-block">Valor Atención</small>' +
            '    <h5 class="font-weight-bold text-dark">$' + (parseFloat(b.valor_atencion) || 0).toLocaleString('es-CL') + '</h5>' +
            '  </div>' +
            '  <div class="col-md-4 text-center">' +
            '    <small class="text-muted d-block">Bonificación FONASA</small>' +
            '    <h5 class="font-weight-bold text-info">$' + (parseFloat(b.bonificacion) || 0).toLocaleString('es-CL') + '</h5>' +
            '  </div>' +
            '  <div class="col-md-4 text-center">' +
            '    <small class="text-muted d-block">Aporte Seguro</small>' +
            '    <h5 class="font-weight-bold text-success">$' + (parseFloat(b.aporte_seguro) || 0).toLocaleString('es-CL') + '</h5>' +
            '  </div>' +
            '</div>' +
            (b.glosa && b.glosa !== '0' ? '<hr class="my-2"><p class="text-muted small mb-0"><strong>Glosa:</strong> ' + b.glosa + '</p>' : '');

        $('#detalle_bono_body').html(html);
        $('#modal_bono').modal('show');
    }


</script>

@endsection

