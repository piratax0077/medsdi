@extends('template.laboratorio.laboratorio_profesional.template')
@section('page-script')

@endsection
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
                                <h5 class="m-b-10 font-weight-bold">IMPORTACIONES A PROVEEDORES</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('adm_cm.home') }}" data-toggle="tooltip" title="Escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item">
                                <a href="{{ route('laboratorio.distribucion_mayor') }}">Distribución</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a href="#">Importaciones</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cuerpo-->
            <div class="row">
                <div class="col-sm-12">


                            <!-- TABLA DE COTIZACIONES -->
                            @if($cotizaciones && count($cotizaciones) > 0)
                            <div class="card mt-4 border-primary">
                                <div class="card-header bg-primary text-white">
                                    <h6 class="mb-0 text-white">
                                        <i class="feather icon-file-text mr-2"></i>
                                        Cotizaciones del laboratorio ({{ count($cotizaciones) }})
                                    </h6>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-sm mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="text-center">N° Cotización</th>
                                                    <th>Proveedor</th>
                                                    <th class="text-center">Fecha Emisión</th>
                                                    <th class="text-center">Válido Hasta</th>
                                                    <th class="text-center">Estado</th>
                                                    <th class="text-center">Detalles</th>
                                                    <th class="text-center">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cotizaciones as $cot)
                                                <tr>
                                                    <td class="text-center">
                                                        <span class="badge badge-info">{{ $cot->numero_cotizacion }}</span>
                                                    </td>
                                                    <td>
                                                        <strong>{{ $cot->proveedor->nombre ?? 'N/A' }}</strong>
                                                        <br>
                                                        <small class="text-muted">{{ $cot->proveedor->email ?? 'N/A' }}</small>
                                                    </td>
                                                    <td class="text-center">
                                                        {{ \Carbon\Carbon::parse($cot->fecha_emision)->format('d/m/Y') }}
                                                    </td>
                                                    <td class="text-center">
                                                        @if($cot->fecha_validez)
                                                            {{ \Carbon\Carbon::parse($cot->fecha_validez)->format('d/m/Y') }}
                                                            @if(\Carbon\Carbon::parse($cot->fecha_validez) < now())
                                                                <br><span class="badge badge-danger">Vencida</span>
                                                            @endif
                                                        @else
                                                            <small class="text-muted">-</small>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if($cot->estado === 'enviada')
                                                            <span class="badge badge-success">Enviada</span>
                                                        @elseif($cot->estado === 'borrador')
                                                            <span class="badge badge-warning">Borrador</span>
                                                        @elseif($cot->estado === 'anulada')
                                                            <span class="badge badge-danger">Anulada</span>
                                                        @else
                                                            <span class="badge badge-secondary">{{ $cot->estado }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <small>{{ substr($cot->observaciones, 0, 30) }}{{ strlen($cot->observaciones) > 30 ? '...' : '' }}</small>
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-sm btn-info" onclick="ver_detalles_cotizacion({{ $cot->id }}, '{{ $cot->numero_cotizacion }}')" title="Ver detalles">
                                                            <i class="feather icon-eye"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-primary" onclick="abrir_seguimiento_cotizacion({{ $cot->id }})" title="Agregar seguimiento">
                                                            <i class="feather icon-message-square"></i>
                                                        </button>
                                                        @if($cot->estado !== 'anulada')
                                                        <button class="btn btn-sm btn-danger" onclick="anular_cotizacion({{ $cot->id }}, '{{ $cot->numero_cotizacion }}')" title="Anular cotización">
                                                            <i class="feather icon-x"></i>
                                                        </button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="alert alert-info mt-4" role="alert">
                                <i class="feather icon-info mr-2"></i>
                                No hay cotizaciones registradas aún. Cree una cotización desde la sección de <strong>Cotizaciones</strong>.
                            </div>
                            @endif
                            <!-- FIN TABLA DE COTIZACIONES -->

                            <!-- modal_seguimiento_cotizacion -->
                            <div class="modal fade" id="modal_seguimiento_cotizacion" tabindex="-1" role="dialog" aria-labelledby="modal_seguimiento_cotizacion_label" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content shadow-lg rounded">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title font-weight-bold" id="modal_seguimiento_cotizacion_label">
                                                <i class="feather icon-clipboard mr-2"></i> Seguimiento de Cotización
                                            </h5>
                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="modal_seguimiento_cotizacion_body">

                                                <div class="form-group">
                                                    <label class="font-weight-bold">Comentarios / Notas</label>
                                                    <textarea class="form-control" id="seguimiento_cotizacion_comentarios" name="seguimiento_cotizacion_comentarios" rows="4" required></textarea>
                                                </div>

                                        </div>
                                        <div class="modal-footer bg-light">
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                                <i class="feather icon-x"></i> Cerrar
                                            </button>
                                            <button type="button" class="btn btn-primary" onclick="enviar_seguimiento_cotizacion()">
                                                <i class="feather icon-save"></i> Guardar Seguimiento
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- fin modal seguimiento cotizacion -->



                            <input type="hidden" name="id_seguimiento_cotizacion" id="id_seguimiento_cotizacion" value="">
                            <script>
                                $(document).ready(function() {
                                    $('#tabla_historial_campanas').DataTable();
                                    // Inicialización de pestañas
                                    $('#atencionTabs a').on('click', function (e) {
                                        e.preventDefault();
                                        $(this).tab('show');
                                    });

                                    // Cargar historial de cotizaciones si hay paciente seleccionado
                                    @if(isset($paciente))
                                        cargar_historial_cotizaciones("{{ $paciente->rut }}");
                                    @endif

                                });
                                /**
                                 * Buscar paciente para venta de audífonos
                                 */


                                    function toggleGarantiaDiv() {
                                        var checked = document.getElementById('garantiaPrestamo').checked;
                                        document.getElementById('divGarantia').style.display = checked ? 'block' : 'none';
                                    }

                                    /**
                                     * Ver detalles de cotización
                                     */
                                    function ver_detalles_cotizacion(id, numero) {
                                        $.ajax({
                                            url: "/Laboratorio/Distribuidores/cotizaciones/" + id + "/detalle",
                                            method: 'GET',
                                            dataType: 'json',
                                            success: function(response) {
                                                if (response.status === 'success') {
                                                    let html = `
                                                        <div class="alert alert-info mb-3">
                                                            <strong>Cotización #${numero}</strong><br>
                                                            Detalles de la solicitud
                                                        </div>
                                                        <p><strong>Proveedor:</strong> ${response.cotizacion.proveedor.nombre}</p>
                                                        <p><strong>Email:</strong> ${response.cotizacion.proveedor.email}</p>
                                                        <p><strong>Observaciones:</strong></p>
                                                        <div class="border p-3 rounded bg-light">
                                                            ${response.cotizacion.observaciones}
                                                        </div>
                                                    `;
                                                    swal({
                                                        title: 'Detalles de Cotización',
                                                        content: {
                                                            element: 'div',
                                                            attributes: {
                                                                innerHTML: html
                                                            }
                                                        },
                                                        icon: 'info'
                                                    });
                                                }
                                            },
                                            error: function(err) {
                                                swal('Error', 'No se pudieron cargar los detalles', 'error');
                                            }
                                        });
                                    }

                                    /**
                                     * Abrir modal para agregar seguimiento
                                     */
                                    function abrir_seguimiento_cotizacion(id) {
                                        $('#id_seguimiento_cotizacion').val(id);
                                        $('#seguimiento_cotizacion_comentarios').val('');
                                        $('#modal_seguimiento_cotizacion').modal('show');
                                    }

                                    /**
                                     * Enviar seguimiento de cotización de distribución a proveedor
                                     */
                                    function enviar_seguimiento_cotizacion() {
                                        let id_cotizacion = $('#id_seguimiento_cotizacion').val();
                                        let comentarios = $('#seguimiento_cotizacion_comentarios').val().trim();

                                        // Validación
                                        if (!id_cotizacion) {
                                            swal('Error', 'No se identificó la cotización', 'error');
                                            return;
                                        }

                                        if (!comentarios) {
                                            swal('Validación', 'Por favor ingrese un comentario o nota', 'warning');
                                            return;
                                        }

                                        // Enviar seguimiento
                                        $.ajax({
                                            url: "/Laboratorio/Distribuidores/cotizaciones/" + id_cotizacion + "/seguimiento",
                                            method: 'POST',
                                            dataType: 'json',
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            data: {
                                                comentarios: comentarios
                                            },
                                            success: function(response) {
                                                if (response.status === 'success') {
                                                    swal('Éxito', 'Seguimiento registrado correctamente', 'success').then(function() {
                                                        $('#modal_seguimiento_cotizacion').modal('hide');
                                                        $('#seguimiento_cotizacion_comentarios').val('');
                                                        location.reload();
                                                    });
                                                } else {
                                                    swal('Error', response.message || 'No se pudo registrar el seguimiento', 'error');
                                                }
                                            },
                                            error: function(err) {
                                                let mensaje = 'No se pudo registrar el seguimiento';
                                                if (err.responseJSON && err.responseJSON.message) {
                                                    mensaje = err.responseJSON.message;
                                                }
                                                swal('Error', mensaje, 'error');
                                            }
                                        });
                                    }

                                    /**
                                     * Anular cotización
                                     */
                                    function anular_cotizacion(id, numero) {
                                        swal({
                                            title: '¿Anular cotización?',
                                            text: `Está por anular la cotización ${numero}. Esta acción no se puede deshacer.`,
                                            icon: 'warning',
                                            buttons: {
                                                cancel: 'Cancelar',
                                                confirm: {
                                                    text: 'Anular',
                                                    value: true
                                                }
                                            }
                                        }).then(function(value) {
                                            if (value) {
                                                $.ajax({
                                                    url: "/Laboratorio/Distribuidores/cotizaciones/" + id + "/anular",
                                                    method: 'PUT',
                                                    dataType: 'json',
                                                    headers: {
                                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                    },
                                                    data: {},
                                                    success: function(response) {
                                                        swal('Éxito', 'Cotización anulada correctamente', 'success').then(function() {
                                                            location.reload();
                                                        });
                                                    },
                                                    error: function(err) {
                                                        swal('Error', 'No se pudo anular la cotización', 'error');
                                                    }
                                                });
                                            }
                                        });
                                    }

                            </script>
                </div>
            </div>
        </div>
    </div>

<input type="hidden" name="id_paciente_fc" id="id_paciente_fc" value="">
<input type="hidden" name="id_profesional_fc" id="id_profesional_fc" value="{{ $profesional->id }}">
<input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $profesional->id_lugar_atencion }}">

@endsection

