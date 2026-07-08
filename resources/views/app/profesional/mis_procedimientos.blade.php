@extends('template.profesional.template')
@section('content')
<!--Container Completo-->
<div class="pcoded-main-container">
    <div class="pcoded-content m-top">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-4 pb-4">
                            <div class="page-header-title">
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.configuracion') }}" data-toggle="tooltip" data-placement="top" title="Volver a panel de configuración">Panel de Configuración</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Mis Procedimientos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
            </div>
        </div>
        <div class="row bg-gris">
            <div class="col-sm-12">
                <div class="card mt-n4">
                    <div class="card-header bg-info">
                        <h6 class="text-white font-weight-bolder f-20 d-inline">Mis Procedimientos (Exámenes)</h6>
                        <button class="btn btn-light btn-sm d-inline float-md-right" data-toggle="modal" data-target="#nuevoProcedimientoProfesional"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo procedimiento</button>
                    </div>
                    <div class="card-body" id="card_body_procedimientos_profesional">
                        <table id="tabla_procedimientos_profesional" class="display table table-striped dt-responsive nowrap table-sm" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-wrap align-middle">Procedimiento</th>
                                    <th class="align-middle">Lugar de atención</th>
                                    <th class="align-middle">Min. por bloque</th>
                                    <th class="align-middle">Cantidad de bloques</th>
                                    <th class="align-middle">Estado</th>

                                    <th class="align-middle">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($procedimientos as $procedimiento)
                                    <tr data-proc-id="{{ $procedimiento->id }}">
                                        <td class="align-middle">{{ $procedimiento->nombre }}</td>
                                        <td class="align-middle">{{ $procedimiento->lugar_nombre }}</td>
                                        <td class="align-middle">{{ $procedimiento->minutos_bloque }}</td>
                                        <td class="align-middle">{{ $procedimiento->cantidad_bloques }}</td>
                                        <td class="align-middle">
                                            @if($procedimiento->estado == 1)
                                                <span class="badge badge-info">Activo</span>
                                            @else
                                                <span class="badge badge-secondary">Inactivo</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <button type="button"
                                                class="btn btn-icon {{ $procedimiento->estado == 1 ? 'btn-success' : 'btn-secondary' }}"
                                                onclick="toggleEstadoProcedimiento({{ $procedimiento->id }}, {{ $procedimiento->estado }})"
                                                title="{{ $procedimiento->estado == 1 ? 'Desactivar' : 'Activar' }}">
                                                <i class="feather {{ $procedimiento->estado == 1 ? 'icon-toggle-right' : 'icon-toggle-left' }}"></i>
                                            </button>
                                            <!-- boton editar -->
                                            <button type="button" class="btn btn-warning btn-icon" onclick="cargarProcedimiento({{ json_encode($procedimiento) }})"><i class="feather  icon-edit"></i></button>
                                            <!-- boton eliminar -->
                                            <button type="button" class="btn btn-danger btn-icon" onclick="eliminarProcedimiento({{ $procedimiento->id }})"><i class="feather icon-x"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: nuevo procedimiento -->
<div class="modal fade" id="nuevoProcedimientoProfesional" tabindex="-1" role="dialog" aria-labelledby="nuevoProcedimientoProfesionalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form id="form-nuevo-procedimiento">
                @csrf
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="nuevoProcedimientoProfesionalLabel">Registrar procedimiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="id_lugar_atencion" class="floating-label-activo-sm">Lugar de atención</label>
                            <select class="form-control form-control-sm" id="id_lugar_atencion" onchange="cargarProcedimientosCentro(this.value)" name="id_lugar_atencion" required>
                                <option value="">Seleccione</option>
                                @foreach($lugares as $lugar)
                                    <option value="{{ $lugar->id }}">{{ $lugar->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="id_procedimiento_centro" class="floating-label-activo-sm">Procedimiento</label>
                            <select class="form-control form-control-sm" id="id_procedimiento_centro" name="id_procedimiento_centro" required>
                                <option value="">Seleccione un lugar para cargar los procedimientos</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="minutos_bloque" class="floating-label-activo-sm">Minutos por bloque</label>
                            <input type="number" class="form-control form-control-sm" id="minutos_bloque" name="minutos_bloque" value="15" min="1" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cantidad_bloques" class="floating-label-activo-sm">Cantidad de bloques</label>
                            <input type="number" class="form-control form-control-sm" id="cantidad_bloques" name="cantidad_bloques" value="1" min="1" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="otros" class="floating-label-activo-sm">Observaciones</label>
                        <textarea class="form-control form-control-sm" id="otros" name="otros" rows="2" placeholder="Notas u observaciones adicionales"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                    <button type="submit" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar procedimiento</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Cierre Modal: nuevo procedimiento -->
<!-- Modal: cargar procedimiento -->
<div class="modal fade" id="cargarProcedimientoProfesional" tabindex="-1" role="dialog" aria-labelledby="cargarProcedimientoProfesionalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="form-cargar-procedimiento">
                @csrf
                <input type="hidden" id="id_procedimiento_profesional" name="id_procedimiento_profesional">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="cargarProcedimientoProfesionalLabel">Editar procedimiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit_id_lugar_atencion" class="floating-label-activo-sm">Lugar de atención</label>
                            <select class="form-control form-control-sm" id="edit_id_lugar_atencion" name="id_lugar_atencion" required>
                                <option value="">Seleccione</option>
                                @foreach($lugares as $lugar)
                                    <option value="{{ $lugar->id }}">{{ $lugar->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edit_id_procedimiento_centro" class="floating-label-activo-sm">Procedimiento base</label>
                            <select class="form-control form-control-sm" id="edit_id_procedimiento_centro" name="id_procedimiento_centro" required>
                                <option value="">Seleccione un lugar para cargar los procedimientos</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit_minutos_bloque" class="floating-label-activo-sm">Minutos por bloque</label>
                            <input type="number" class="form-control form-control-sm" id="edit_minutos_bloque" name="minutos_bloque" min="1" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edit_cantidad_bloques" class="floating-label-activo-sm">Cantidad de bloques</label>
                            <input type="number" class="form-control form-control-sm" id="edit_cantidad_bloques" name="cantidad_bloques" min="1" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_otros" class="floating-label-activo-sm">Observaciones</label>
                        <textarea class="form-control form-control-sm" id="edit_otros" name="otros" rows="2" placeholder="Notas u observaciones adicionales"></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="alert alert-info" role="alert">
                                <strong>Procedimiento base:</strong> <span id="procedimiento_base_info">-</span><br>
                                <strong>Nombre personalizado:</strong> <span id="nombre_personalizado_info">-</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                    <button type="button" class="btn btn-info btn-sm" id="btn-actualizar-procedimiento" onclick="actualizarProcedimiento()"><i class="feather icon-save"></i> Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Cierre Modal: cargar procedimiento -->
@endsection

@section('page-script')
<script>
    let tablaProcedimientos;

    function cargarProcedimientosCentro(idLugar) {
        const $select = $('#id_procedimiento_centro');
        $select.empty().append('<option value="">Cargando...</option>');

        if (!idLugar) {
            $select.empty().append('<option value="">Seleccione un lugar para cargar los procedimientos</option>');
            return;
        }

        $.ajax({
            url: "{{ route('centro.procedimientos') }}",
            type: 'get',
            data: { id_lugar_atencion: idLugar },
        })
        .done(function(data) {
            $select.empty().append('<option value="">Seleccione</option>');
            if (data && data.estado === 1 && data.registro) {
                $.each(data.registro, function(_, value) {
                    $select.append('<option value="' + value.id + '">' + value.nombre + '</option>');
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError);
            $select.empty().append('<option value="">No fue posible cargar los procedimientos</option>');
        });
    }

    function agregarFila(procedimiento) {
        const estado = procedimiento.estado === 1 ? '<span class="badge badge-info">Activo</span>' : '<span class="badge badge-secondary">Inactivo</span>';
        const toggleBtn = '<button type="button" class="btn btn-icon ' + (procedimiento.estado === 1 ? 'btn-success' : 'btn-secondary') + '" onclick="toggleEstadoProcedimiento(' + procedimiento.id + ',' + procedimiento.estado + ')" title="' + (procedimiento.estado === 1 ? 'Desactivar' : 'Activar') + '"><i class="feather ' + (procedimiento.estado === 1 ? 'icon-toggle-right' : 'icon-toggle-left') + '"></i></button>';
        const acciones = '<button type="button" class="btn btn-danger btn-icon" onclick="eliminarProcedimiento(' + procedimiento.id + ')"><i class="feather icon-x"></i></button>';
        const rowNode = tablaProcedimientos.row.add([
            procedimiento.nombre || '-',
            procedimiento.lugar_nombre || '-',
            procedimiento.minutos_bloque || '',
            procedimiento.cantidad_bloques || '',
            estado,
            toggleBtn,
            acciones
        ]).draw().node();
        $(rowNode).attr('data-proc-id', procedimiento.id);
    }

    function eliminarProcedimiento(id) {
        swal({
            title: 'Eliminar procedimiento',
            text: '¿Deseas eliminar este procedimiento?',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then(function(confirmar) {
            if (!confirmar) {
                return;
            }
            $.ajax({
                url: "{{ route('profesional.mis_procedimientos.destroy', ['procedimiento' => '__ID__']) }}".replace('__ID__', id),
                type: 'post',
                data: {
                    _method: 'DELETE',
                    _token: "{{ csrf_token() }}"
                },
            })
            .done(function(resp) {
                if (resp.estado === 1) {
                    tablaProcedimientos.rows(function(idx, data, node) {
                        return $(node).data('proc-id') === id;
                    }).remove().draw();
                    swal({
                        title: 'Eliminado',
                        text: resp.mensaje,
                        icon: 'success'
                    });
                } else {
                    swal({
                        title: 'Error',
                        text: resp.mensaje,
                        icon: 'error'
                    });
                }
            })
            .fail(function() {
                swal({
                    title: 'Error',
                    text: 'No fue posible eliminar el procedimiento',
                    icon: 'error'
                });
            });
        });
    }

    $(document).ready(function() {
        tablaProcedimientos = $('#tabla_procedimientos_profesional').DataTable({
            language: {
                url: "{{ asset('js/Spanish.json') }}"
            }
        });

        $('#id_lugar_atencion').on('change', function() {
            cargarProcedimientosCentro(this.value);
        });

        $('#form-nuevo-procedimiento').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('profesional.mis_procedimientos.store') }}",
                type: 'post',
                data: $(this).serialize(),
            })
            .done(function(resp) {
                if (resp.estado === 1) {
                    agregarFila(resp.procedimiento);
                    $('#nuevoProcedimientoProfesional').modal('hide');
                    $('#form-nuevo-procedimiento')[0].reset();
                    swal({
                        title: 'Procedimiento',
                        text: resp.mensaje,
                        icon: 'success'
                    });
                } else {
                    swal({
                        title: 'Error',
                        text: resp.mensaje,
                        icon: 'error'
                    });
                }
            })
            .fail(function(xhr) {
                let mensaje = 'No fue posible registrar el procedimiento.';
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    mensaje = Object.values(xhr.responseJSON.errors).flat().join('\\n');
                } else if (xhr.responseJSON && xhr.responseJSON.mensaje) {
                    mensaje = xhr.responseJSON.mensaje;
                }
                swal({
                    title: 'Error',
                    text: mensaje,
                    icon: 'error'
                });
            });
        });

        const primerLugar = $('#id_lugar_atencion').val();
        if (primerLugar) {
            cargarProcedimientosCentro(primerLugar);
        }

        // Event listener para el lugar de atención en el modal de edición
        $('#edit_id_lugar_atencion').on('change', function() {
            cargarProcedimientosParaEdicion(this.value);
        });
    });

    // Función para actualizar procedimiento
    function actualizarProcedimiento() {
        const id = $('#id_procedimiento_profesional').val();

        // Validar campos requeridos
        const lugarAtencion = $('#edit_id_lugar_atencion').val();
        const procedimientoCentro = $('#edit_id_procedimiento_centro').val();
        const minutosBloque = $('#edit_minutos_bloque').val();
        const cantidadBloques = $('#edit_cantidad_bloques').val();

        if (!lugarAtencion) {
            swal({
                title: 'Campos requeridos',
                text: 'Por favor seleccione un lugar de atención',
                icon: 'warning'
            });
            return;
        }

        if (!procedimientoCentro) {
            swal({
                title: 'Campos requeridos',
                text: 'Por favor seleccione un procedimiento',
                icon: 'warning'
            });
            return;
        }

        if (!minutosBloque || minutosBloque < 1) {
            swal({
                title: 'Campos requeridos',
                text: 'Los minutos por bloque deben ser mayor a 0',
                icon: 'warning'
            });
            return;
        }

        if (!cantidadBloques || cantidadBloques < 1) {
            swal({
                title: 'Campos requeridos',
                text: 'La cantidad de bloques debe ser mayor a 0',
                icon: 'warning'
            });
            return;
        }

        // Recopilar datos del formulario
        const datos = {
            id_lugar_atencion: lugarAtencion,
            id_procedimiento_centro: procedimientoCentro,
            minutos_bloque: minutosBloque,
            cantidad_bloques: cantidadBloques,
            otros: $('#edit_otros').val() || '',
            _token: "{{ csrf_token() }}",
            _method: 'PUT'
        };

        console.log('Datos a enviar:', datos);

        // Enviar petición AJAX
        $.ajax({
            url: "{{ route('profesional.mis_procedimientos.update', ['procedimiento' => '__ID__']) }}".replace('__ID__', id),
            type: 'POST',
            data: datos,
            beforeSend: function() {
                // Deshabilitar botón mientras se envía
                $('#btn-actualizar-procedimiento').prop('disabled', true).text('Actualizando...');
            }
        })
        .done(function(resp) {
            console.log('Respuesta del servidor:', resp);
            if (resp.estado === 1) {
                // Actualizar la fila en la tabla
                const row = tablaProcedimientos.row(function(idx, data, node) {
                    return $(node).data('proc-id') == id;
                });
                if (row.length) {
                    const proc = resp.procedimiento;
                    const estado = proc.estado === 1 ? '<span class="badge badge-info">Activo</span>' : '<span class="badge badge-secondary">Inactivo</span>';
                    const toggleBtn = '<button type="button" class="btn btn-icon ' + (proc.estado === 1 ? 'btn-success' : 'btn-secondary') + '" onclick="toggleEstadoProcedimiento(' + proc.id + ',' + proc.estado + ')" title="' + (proc.estado === 1 ? 'Desactivar' : 'Activar') + '"><i class="feather ' + (proc.estado === 1 ? 'icon-toggle-right' : 'icon-toggle-left') + '"></i></button>';
                    const acciones = '<button type="button" class="btn btn-warning btn-icon" onclick="cargarProcedimiento(' + JSON.stringify(proc).replace(/"/g, '&quot;') + ')"><i class="feather icon-edit"></i></button> ' +
                                    '<button type="button" class="btn btn-danger btn-icon" onclick="eliminarProcedimiento(' + proc.id + ')"><i class="feather icon-x"></i></button>';

                    row.data([
                        proc.nombre || '-',
                        proc.lugar_nombre || '-',
                        proc.minutos_bloque || '',
                        proc.cantidad_bloques || '',
                        estado,
                        toggleBtn,
                        acciones
                    ]).draw();
                }
                $('#cargarProcedimientoProfesional').modal('hide');
                swal({
                    title: 'Actualizado',
                    text: resp.mensaje,
                    icon: 'success'
                });
            } else {
                swal({
                    title: 'Error',
                    text: resp.mensaje,
                    icon: 'error'
                });
            }
        })
        .fail(function(xhr) {
            console.error('Error en la petición:', xhr);
            let mensaje = 'No fue posible actualizar el procedimiento.';
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                const errores = Object.values(xhr.responseJSON.errors).flat();
                mensaje = errores.join('\n');
            } else if (xhr.responseJSON && xhr.responseJSON.mensaje) {
                mensaje = xhr.responseJSON.mensaje;
            } else if (xhr.responseText) {
                try {
                    const errorObj = JSON.parse(xhr.responseText);
                    mensaje = errorObj.mensaje || errorObj.message || mensaje;
                } catch(e) {
                    // Si no se puede parsear, usar mensaje por defecto
                }
            }
            swal({
                title: 'Error',
                text: mensaje,
                icon: 'error'
            });
        })
        .always(function() {
            // Rehabilitar botón
            $('#btn-actualizar-procedimiento').prop('disabled', false).text('Guardar cambios');
        });
    }

    function toggleEstadoProcedimiento(id, estadoActual) {
        const nuevoTexto = estadoActual == 1 ? 'desactivar' : 'activar';
        swal({
            title: '¿' + nuevoTexto.charAt(0).toUpperCase() + nuevoTexto.slice(1) + ' procedimiento?',
            icon: 'warning',
            buttons: ['Cancelar', 'Confirmar'],
            dangerMode: estadoActual == 1,
        }).then(function(confirmar) {
            if (!confirmar) return;
            $.ajax({
                url: "{{ route('profesional.mis_procedimientos.toggle', ['procedimiento' => '__ID__']) }}".replace('__ID__', id),
                type: 'post',
                data: { _method: 'PATCH', _token: "{{ csrf_token() }}" },
            })
            .done(function(resp) {
                if (resp.estado === 1) {
                    const row = tablaProcedimientos.row(function(idx, data, node) {
                        return $(node).data('proc-id') == id;
                    });
                    if (row.length) {
                        const rowData = row.data();
                        const nuevoEstado = resp.nuevo_estado;
                        rowData[4] = nuevoEstado === 1 ? '<span class="badge badge-info">Activo</span>' : '<span class="badge badge-secondary">Inactivo</span>';
                        rowData[5] = '<button type="button" class="btn btn-icon ' + (nuevoEstado === 1 ? 'btn-success' : 'btn-secondary') + '" onclick="toggleEstadoProcedimiento(' + id + ',' + nuevoEstado + ')" title="' + (nuevoEstado === 1 ? 'Desactivar' : 'Activar') + '"><i class="feather ' + (nuevoEstado === 1 ? 'icon-toggle-right' : 'icon-toggle-left') + '"></i></button>';
                        row.data(rowData).draw();
                    }
                    swal({ title: 'Listo', text: resp.mensaje, icon: 'success', timer: 1500, buttons: false });
                } else {
                    swal({ title: 'Error', text: resp.mensaje, icon: 'error' });
                }
            })
            .fail(function() {
                swal({ title: 'Error', text: 'No fue posible cambiar el estado', icon: 'error' });
            });
        });
    }

    function cargarProcedimientosParaEdicion(idLugar) {
        const $select = $('#edit_id_procedimiento_centro');
        $select.empty().append('<option value="">Cargando...</option>');

        if (!idLugar) {
            $select.empty().append('<option value="">Seleccione un lugar para cargar los procedimientos</option>');
            return;
        }

        $.ajax({
            url: "{{ route('centro.procedimientos') }}",
            type: 'get',
            data: { id_lugar_atencion: idLugar },
        })
        .done(function(data) {
            $select.empty().append('<option value="">Seleccione</option>');
            if (data && data.estado === 1 && data.registro) {
                $.each(data.registro, function(_, value) {
                    $select.append('<option value="' + value.id + '">' + value.nombre + '</option>');
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError);
            $select.empty().append('<option value="">No fue posible cargar los procedimientos</option>');
        });
    }

    function cargarProcedimiento(procedimiento) {
        console.log('Cargar procedimiento para edición:', procedimiento);

        // Validar que el objeto procedimiento tenga las propiedades necesarias
        if (!procedimiento || !procedimiento.id) {
            swal({
                title: 'Error',
                text: 'Los datos del procedimiento no están disponibles',
                icon: 'error'
            });
            return;
        }

        try {
            // Cargar el ID en el campo oculto
            $('#id_procedimiento_profesional').val(procedimiento.id);

            // Cargar lugar de atención
            if (procedimiento.id_lugar_atencion) {
                $('#edit_id_lugar_atencion').val(procedimiento.id_lugar_atencion);
                // Cargar los procedimientos del centro después de seleccionar el lugar
                cargarProcedimientosParaEdicion(procedimiento.id_lugar_atencion);

                // Esperar un poco para que se carguen los procedimientos y luego seleccionar el correcto
                setTimeout(function() {
                    if (procedimiento.id_procedimiento_centro) {
                        $('#edit_id_procedimiento_centro').val(procedimiento.id_procedimiento_centro);
                    }
                }, 500);
            }

            // Cargar valores numéricos con validación
            $('#edit_minutos_bloque').val(procedimiento.minutos_bloque || 15);
            $('#edit_cantidad_bloques').val(procedimiento.cantidad_bloques || 1);

            // Cargar observaciones (puede ser null)
            $('#edit_otros').val(procedimiento.otros || '');

            // Mostrar información adicional del procedimiento
            $('#procedimiento_base_info').text(procedimiento.procedimiento_base || 'No especificado');
            $('#nombre_personalizado_info').text(procedimiento.nombre || 'Sin nombre personalizado');

            // Cambiar el título del modal si es necesario
            $('#cargarProcedimientoProfesionalLabel').text('Editar: ' + (procedimiento.nombre || 'Procedimiento'));

            // Mostrar el modal
            $('#cargarProcedimientoProfesional').modal('show');

        } catch (error) {
            console.error('Error al cargar procedimiento:', error);
            swal({
                title: 'Error',
                text: 'Ocurrió un error al cargar los datos del procedimiento',
                icon: 'error'
            });
        }
    }
</script>
@endsection
