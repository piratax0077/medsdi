@extends('template.laboratorio.laboratorio_profesional.template')
@section('style')
<style>
    .select2-container--open{
        z-index: 9999999 !important;
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
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">MIS CONVENIOS</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('adm_cm.home') }}" data-toggle="tooltip" title="Escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item">
                                <a href="{{ route('laboratorio.distribucion_mayor') }}">Distribución</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a href="#">Mis Convenios</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h5 class="text-white font-weight-bolder">Convenios</h5>
                    <button class="btn btn-info btn-sm mx-2 has-ripple float-right" data-toggle="modal" data-target="#nuevoConvenioInstitucion"><i class="fa fa-plus" aria-hidden="true"></i>Registrar nuevo convenio</button>
                </div>
                <div class="card-body" id="card_body_convenios_institucion">
                    <table id="tabla_convenios_institucion" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-wrap text-center align-middle">Convenios</th>
                                <th class="text-center align-middle">Tipo Atención</th>
                                <th class="text-center align-middle">Porcentaje</th>
                                <th class="text-center align-middle">Valor</th>
                                <th class="text-center align-middle">Valor Garantía</th>
                                <th class="text-center align-middle">Copago Fonasa</th>
                                <th class="text-center align-middle">Bono Fonasa</th>
                                <th class="text-center align-middle">Lugar Atención</th>
                                <th class="text-center align-middle">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($convenios_institucion) && count($convenios_institucion) > 0)
                            @foreach($convenios_institucion as $convenio)
                                <tr>
                                    <td class="align-middle text-center">
                                        @if(isset($convenio->convenios_array) && count($convenio->convenios_array) > 0)
                                            @foreach($convenio->convenios_array as $conv)
                                                <span class="badge badge-info mb-1">{{ $conv }}</span><br>
                                            @endforeach
                                        @else
                                            <span class="text-muted">Sin convenios</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">{{ $convenio->tipo_atencion }}</td>
                                    <td class="align-middle text-center">{{ $convenio->porcentaje }}%</td>
                                    <td class="align-middle text-center">${{ number_format($convenio->valor, 0, ',', '.') }}</td>
                                    <td class="align-middle text-center">
                                        @if($convenio->valor_garantia)
                                            ${{ number_format($convenio->valor_garantia, 0, ',', '.') }}
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        @if($convenio->valor_copago_fonasa)
                                            ${{ number_format($convenio->valor_copago_fonasa, 0, ',', '.') }}
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        @if($convenio->valor_bon_fonasa)
                                            ${{ number_format($convenio->valor_bon_fonasa, 0, ',', '.') }}
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        @if(isset($convenio->lugar_atencion_nombre))
                                            <span class="badge badge-success mb-1">{{ $convenio->lugar_atencion_nombre }}</span><br>
                                        @else
                                            <span class="text-muted">Sin lugares de atención</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <button class="btn btn-warning btn-sm has-ripple" onclick="dame_convenio({{ $convenio->id }})" data-toggle="modal" data-target="#editarConvenioInstitucion"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm has-ripple" onclick="eliminar_convenio({{ $convenio->id }})"><i class="fas fa-trash"></i> </button>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="10" class="text-center text-muted py-4">
                                    <i class="feather icon-inbox f-30 mb-2"></i><br>
                                    No hay convenios registrados aún.
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        </div>
    </div>

    <!-- Modal Nuevo Convenio -->
    <div class="modal fade" id="nuevoConvenioInstitucion" tabindex="-1" role="dialog" aria-labelledby="nuevoConvenioInstitucionLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content shadow-lg">
                <div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                    <h5 class="modal-title font-weight-bold text-white" id="nuevoConvenioInstitucionLabel">
                        <i class="feather icon-plus-circle mr-2"></i>Registrar Nuevo Convenio
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_nuevo_convenio">
                        <div class="row">
                            <!-- Seleccionar Convenios -->
                            <div class="col-md-12 mb-3">
                                <label class="font-weight-bold">
                                    <i class="feather icon-layers mr-2"></i>Convenios
                                </label>
                                <select id="convenios_select" name="convenios" class="form-control select2" multiple required>
                                    <option value="">-- Seleccione convenios --</option>
                                    <option value="Fonasa">Fonasa</option>
                                    <option value="Isapre">Isapre</option>
                                    <option value="Particular">Particular</option>
                                    <option value="Otros Seguros">Otros Seguros</option>
                                </select>
                                <small class="text-muted">Seleccione uno o más convenios</small>
                            </div>

                            <!-- Tipo de Atención -->
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">
                                    <i class="feather icon-briefcase mr-2"></i>Tipo de Atención
                                </label>
                                <select id="tipo_atencion" name="tipo_atencion" class="form-control" required>
                                    <option value="">-- Seleccione --</option>
                                    <option value="Consulta">Consulta</option>
                                    <option value="Audiometría">Audiometría</option>
                                    <option value="Venta Audifonos">Venta Audífonos</option>
                                    <option value="Reparación">Reparación</option>
                                    <option value="Mantenimiento">Mantenimiento</option>
                                </select>
                            </div>

                            <!-- Porcentaje -->
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">
                                    <i class="feather icon-percent mr-2"></i>Porcentaje (%)
                                </label>
                                <input type="number" id="porcentaje" name="porcentaje" class="form-control" min="0" max="100" step="0.01" placeholder="Ej: 20.5" required>
                            </div>

                            <!-- Valor -->
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">
                                    <i class="feather icon-dollar-sign mr-2"></i>Valor ($)
                                </label>
                                <input type="number" id="valor" name="valor" class="form-control" min="0" step="100" placeholder="Ej: 50000" required>
                            </div>

                            <!-- Valor Garantía -->
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">
                                    <i class="feather icon-shield mr-2"></i>Valor Garantía ($)
                                </label>
                                <input type="number" id="valor_garantia" name="valor_garantia" class="form-control" min="0" step="100" placeholder="Opcional">
                            </div>

                            <!-- Copago Fonasa -->
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">
                                    <i class="feather icon-credit-card mr-2"></i>Copago Fonasa ($)
                                </label>
                                <input type="number" id="valor_copago_fonasa" name="valor_copago_fonasa" class="form-control" min="0" step="100" placeholder="Opcional">
                            </div>

                            <!-- Bono Fonasa -->
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">
                                    <i class="feather icon-gift mr-2"></i>Bono Fonasa ($)
                                </label>
                                <input type="number" id="valor_bon_fonasa" name="valor_bon_fonasa" class="form-control" min="0" step="100" placeholder="Opcional">
                            </div>

                            <!-- Lugar de Atención -->
                            <div class="col-md-12 mb-3">
                                <label class="font-weight-bold">
                                    <i class="feather icon-map-pin mr-2"></i>Lugar de Atención
                                </label>
                                <select id="lugar_atencion" name="lugar_atencion" class="form-control" required>
                                    <option value="">-- Seleccione lugar de atención --</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                        <i class="feather icon-x"></i> Cancelar
                    </button>
                    <button type="button" class="btn btn-primary" onclick="guardar_nuevo_convenio()" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                        <i class="feather icon-save"></i> Guardar Convenio
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar Convenio -->
    <div class="modal fade" id="editarConvenioInstitucion" tabindex="-1" role="dialog" aria-labelledby="editarConvenioInstitucionLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content shadow-lg">
                <div class="modal-header" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); border: none;">
                    <h5 class="modal-title font-weight-bold text-white" id="editarConvenioInstitucionLabel">
                        <i class="feather icon-edit-3 mr-2"></i>Editar Convenio
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_editar_convenio">
                        <input type="hidden" id="edit_convenio_id" name="convenio_id">
                        <div class="row">
                            <!-- Seleccionar Convenios -->
                            <div class="col-md-12 mb-3">
                                <label class="font-weight-bold">
                                    <i class="feather icon-layers mr-2"></i>Convenios
                                </label>
                                <select id="edit_convenios_select" name="convenios" class="form-control select2" multiple required>
                                    <option value="Fonasa">Fonasa</option>
                                    <option value="Isapre">Isapre</option>
                                    <option value="Particular">Particular</option>
                                    <option value="Otros Seguros">Otros Seguros</option>
                                </select>
                            </div>

                            <!-- Tipo de Atención -->
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">
                                    <i class="feather icon-briefcase mr-2"></i>Tipo de Atención
                                </label>
                                <select id="edit_tipo_atencion" name="tipo_atencion" class="form-control" required>
                                    <option value="Consulta">Consulta</option>
                                    <option value="Audiometría">Audiometría</option>
                                    <option value="Venta Audifonos">Venta Audífonos</option>
                                    <option value="Reparación">Reparación</option>
                                    <option value="Mantenimiento">Mantenimiento</option>
                                </select>
                            </div>

                            <!-- Porcentaje -->
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">
                                    <i class="feather icon-percent mr-2"></i>Porcentaje (%)
                                </label>
                                <input type="number" id="edit_porcentaje" name="porcentaje" class="form-control" min="0" max="100" step="0.01" required>
                            </div>

                            <!-- Valor -->
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">
                                    <i class="feather icon-dollar-sign mr-2"></i>Valor ($)
                                </label>
                                <input type="number" id="edit_valor" name="valor" class="form-control" min="0" step="100" required>
                            </div>

                            <!-- Valor Garantía -->
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">
                                    <i class="feather icon-shield mr-2"></i>Valor Garantía ($)
                                </label>
                                <input type="number" id="edit_valor_garantia" name="valor_garantia" class="form-control" min="0" step="100">
                            </div>

                            <!-- Copago Fonasa -->
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">
                                    <i class="feather icon-credit-card mr-2"></i>Copago Fonasa ($)
                                </label>
                                <input type="number" id="edit_valor_copago_fonasa" name="valor_copago_fonasa" class="form-control" min="0" step="100">
                            </div>

                            <!-- Bono Fonasa -->
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">
                                    <i class="feather icon-gift mr-2"></i>Bono Fonasa ($)
                                </label>
                                <input type="number" id="edit_valor_bon_fonasa" name="valor_bon_fonasa" class="form-control" min="0" step="100">
                            </div>

                            <!-- Lugar de Atención -->
                            <div class="col-md-12 mb-3">
                                <label class="font-weight-bold">
                                    <i class="feather icon-map-pin mr-2"></i>Lugar de Atención
                                </label>
                                <select id="edit_lugar_atencion" name="lugar_atencion" class="form-control" required>
                                    <option value="">-- Seleccione lugar de atención --</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                        <i class="feather icon-x"></i> Cancelar
                    </button>
                    <button type="button" class="btn btn-warning" onclick="actualizar_convenio()" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); border: none; color: white;">
                        <i class="feather icon-save"></i> Actualizar Convenio
                    </button>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $laboratorio->id_lugar_atencion ?? '' }}">

@endsection

@section('page-script')
    <script>
        $(document).ready(function() {
            // Inicializar Select2 para selects de convenios
            $('#convenios_select').select2({
                placeholder: 'Seleccione convenios',
                allowClear: true,
                width: '100%'
            });

            $('#edit_convenios_select').select2({
                placeholder: 'Seleccione convenios',
                allowClear: true,
                width: '100%'
            });

            // Cargar lugares de atención al abrir el modal
            cargar_lugares_atencion('#lugar_atencion');
            cargar_lugares_atencion('#edit_lugar_atencion');
        });

        /**
         * Cargar lugares de atención en el select
         */
        function cargar_lugares_atencion(selector) {
            $.ajax({
                url: "{{ route('laboratorio.distribucion.obtener_lugares_atencion') }}",
                method: 'GET',
                dataType: 'json',
                data: {
                    id_lugar_atencion: $('#id_lugar_atencion').val()
                },
                success: function(response) {
                    console.log('Lugares de atención obtenidos:', response);
                    if (response.status === 'success' && response.lugares) {
                        let select = $(selector);
                        select.find('option:not(:first)').remove();
                        response.lugares.forEach(function(lugar) {
                            select.append(`<option value="${lugar.id}">${lugar.nombre}</option>`);
                        });
                    }
                },
                error: function(err) {
                    console.error('Error cargando lugares de atención:', err);
                }
            });
        }

        /**
         * Guardar nuevo convenio
         */
        function guardar_nuevo_convenio() {
            let convenios = $('#convenios_select').val();
            let tipo_atencion = $('#tipo_atencion').val();
            let porcentaje = $('#porcentaje').val();
            let valor = $('#valor').val();
            let valor_garantia = $('#valor_garantia').val();
            let valor_copago_fonasa = $('#valor_copago_fonasa').val();
            let valor_bon_fonasa = $('#valor_bon_fonasa').val();
            let lugar_atencion = $('#lugar_atencion').val();

            // Validación
            if (!convenios || convenios.length === 0) {
                swal('Validación', 'Por favor seleccione al menos un convenio', 'warning');
                return;
            }
            if (!tipo_atencion) {
                swal('Validación', 'Por favor seleccione tipo de atención', 'warning');
                return;
            }
            if (!porcentaje || porcentaje < 0 || porcentaje > 100) {
                swal('Validación', 'Ingrese un porcentaje válido (0-100)', 'warning');
                return;
            }
            if (!valor || valor <= 0) {
                swal('Validación', 'Ingrese un valor válido', 'warning');
                return;
            }
            if (!lugar_atencion) {
                swal('Validación', 'Por favor seleccione un lugar de atención', 'warning');
                return;
            }

            // Enviar datos
            $.ajax({
                url: "{{ route('laboratorio.distribucion.guardar_convenio') }}",
                method: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    convenios: convenios,
                    tipo_atencion: tipo_atencion,
                    porcentaje: porcentaje,
                    valor: valor,
                    valor_garantia: valor_garantia || null,
                    valor_copago_fonasa: valor_copago_fonasa || null,
                    valor_bon_fonasa: valor_bon_fonasa || null,
                    lugar_atencion: lugar_atencion
                },
                success: function(response) {
                    if (response.status === 'success') {
                        swal('Éxito', 'Convenio registrado correctamente', 'success').then(function() {
                            $('#nuevoConvenioInstitucion').modal('hide');
                            $('#form_nuevo_convenio')[0].reset();
                            location.reload();
                        });
                    } else {
                        swal('Error', response.message || 'No se pudo guardar el convenio', 'error');
                    }
                },
                error: function(err) {
                    let mensaje = 'No se pudo guardar el convenio';
                    if (err.responseJSON && err.responseJSON.message) {
                        mensaje = err.responseJSON.message;
                    }
                    swal('Error', mensaje, 'error');
                }
            });
        }

        /**
         * Cargar datos del convenio para editar
         */
        function dame_convenio(id) {
            $.ajax({
                url: "/Laboratorio/Distribuidores/convenios/" + id + "/detalle",
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        let convenio = response.convenio;
                        $('#edit_convenio_id').val(convenio.id);

                        if (convenio.convenios_array && Array.isArray(convenio.convenios_array)) {
                            $('#edit_convenios_select').val(convenio.convenios_array).trigger('change');
                        }

                        $('#edit_tipo_atencion').val(convenio.tipo_atencion);
                        $('#edit_porcentaje').val(convenio.porcentaje);
                        $('#edit_valor').val(convenio.valor);
                        $('#edit_valor_garantia').val(convenio.valor_garantia || '');
                        $('#edit_valor_copago_fonasa').val(convenio.valor_copago_fonasa || '');
                        $('#edit_valor_bon_fonasa').val(convenio.valor_bon_fonasa || '');
                        $('#edit_lugar_atencion').val(convenio.id_lugar_atencion);
                    }
                },
                error: function(err) {
                    swal('Error', 'No se pudo cargar el convenio', 'error');
                }
            });
        }

        /**
         * Actualizar convenio
         */
        function actualizar_convenio() {
            let id = $('#edit_convenio_id').val();
            let convenios = $('#edit_convenios_select').val();
            let tipo_atencion = $('#edit_tipo_atencion').val();
            let porcentaje = $('#edit_porcentaje').val();
            let valor = $('#edit_valor').val();
            let valor_garantia = $('#edit_valor_garantia').val();
            let valor_copago_fonasa = $('#edit_valor_copago_fonasa').val();
            let valor_bon_fonasa = $('#edit_valor_bon_fonasa').val();
            let lugar_atencion = $('#edit_lugar_atencion').val();

            // Validación
            if (!convenios || convenios.length === 0) {
                swal('Validación', 'Por favor seleccione al menos un convenio', 'warning');
                return;
            }
            if (!tipo_atencion) {
                swal('Validación', 'Por favor seleccione tipo de atención', 'warning');
                return;
            }
            if (!porcentaje || porcentaje < 0 || porcentaje > 100) {
                swal('Validación', 'Ingrese un porcentaje válido (0-100)', 'warning');
                return;
            }
            if (!valor || valor <= 0) {
                swal('Validación', 'Ingrese un valor válido', 'warning');
                return;
            }
            if (!lugar_atencion) {
                swal('Validación', 'Por favor seleccione un lugar de atención', 'warning');
                return;
            }

            // Enviar datos
            $.ajax({
                url: "/Laboratorio/Distribuidores/convenios/" + id + "/actualizar",
                method: 'PUT',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    convenios: convenios,
                    tipo_atencion: tipo_atencion,
                    porcentaje: porcentaje,
                    valor: valor,
                    valor_garantia: valor_garantia || null,
                    valor_copago_fonasa: valor_copago_fonasa || null,
                    valor_bon_fonasa: valor_bon_fonasa || null,
                    lugar_atencion: lugar_atencion
                },
                success: function(response) {
                    if (response.status === 'success') {
                        swal('Éxito', 'Convenio actualizado correctamente', 'success').then(function() {
                            $('#editarConvenioInstitucion').modal('hide');
                            location.reload();
                        });
                    } else {
                        swal('Error', response.message || 'No se pudo actualizar el convenio', 'error');
                    }
                },
                error: function(err) {
                    let mensaje = 'No se pudo actualizar el convenio';
                    if (err.responseJSON && err.responseJSON.message) {
                        mensaje = err.responseJSON.message;
                    }
                    swal('Error', mensaje, 'error');
                }
            });
        }

        /**
         * Eliminar convenio
         */
        function eliminar_convenio(id) {
            swal({
                title: '¿Eliminar convenio?',
                text: 'Esta acción no se puede deshacer',
                icon: 'warning',
                buttons: {
                    cancel: 'Cancelar',
                    confirm: {
                        text: 'Eliminar',
                        value: true
                    }
                }
            }).then(function(value) {
                if (value) {
                    $.ajax({
                        url: "/Laboratorio/Distribuidores/convenios/" + id + "/eliminar",
                        method: 'DELETE',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                swal('Éxito', 'Convenio eliminado correctamente', 'success').then(function() {
                                    location.reload();
                                });
                            } else {
                                swal('Error', response.message || 'No se pudo eliminar el convenio', 'error');
                            }
                        },
                        error: function(err) {
                            swal('Error', 'No se pudo eliminar el convenio', 'error');
                        }
                    });
                }
            });
        }
    </script>
@endsection
