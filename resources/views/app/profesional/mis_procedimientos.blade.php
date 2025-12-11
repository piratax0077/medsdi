@extends('template.adm_cm.template')
@section('content')
<!--Container Completo-->
<div class="pcoded-main-container">
    <div class="pcoded-content m-top">
        <div class="page-header">
            <div class="page-block">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <ul class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('profesional.configuracion') }}" data-toggle="tooltip" data-placement="top" title="Volver al panel de configuración">Panel de Configuración</a></li>
                            <li class="breadcrumb-item">
                                <a href="#">Procedimientos</a>
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
                        <h6 class="text-white font-weight-bolder f-18 d-inline">Mis Procedimientos</h6>
                        <button class="btn btn-light btn-sm d-inline float-md-right" data-toggle="modal" data-target="#nuevoProcedimientoProfesional"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo procedimiento</button>
                    </div>
                    <div class="card-body" id="card_body_procedimientos_profesional">
                        <table id="tabla_procedimientos_profesional" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-wrap text-center align-middle">Procedimiento</th>
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
                                        <td class="align-middle text-center">{{ $procedimiento->minutos_bloque }}</td>
                                        <td class="align-middle text-center">{{ $procedimiento->cantidad_bloques }}</td>
                                        <td class="align-middle text-center">
                                            @if($procedimiento->estado == 1)
                                                <span class="badge badge-success">Activo</span>
                                            @else
                                                <span class="badge badge-secondary">Inactivo</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn btn-danger btn-sm has-ripple" onclick="eliminarProcedimiento({{ $procedimiento->id }})"><i class="fas fa-trash"></i></button>
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
    <div class="modal-dialog modal-lg" role="document">
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
                            <label for="id_lugar_atencion" class="font-weight-bold">Lugar de atención</label>
                            <select class="form-control" id="id_lugar_atencion" name="id_lugar_atencion" required>
                                <option value="">Seleccione</option>
                                @foreach($lugares as $lugar)
                                    <option value="{{ $lugar->id }}">{{ $lugar->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="id_procedimiento_centro" class="font-weight-bold">Procedimiento</label>
                            <select class="form-control" id="id_procedimiento_centro" name="id_procedimiento_centro" required>
                                <option value="">Seleccione un lugar para cargar los procedimientos</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="minutos_bloque" class="font-weight-bold">Minutos por bloque</label>
                            <input type="number" class="form-control" id="minutos_bloque" name="minutos_bloque" value="15" min="1" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cantidad_bloques" class="font-weight-bold">Cantidad de bloques</label>
                            <input type="number" class="form-control" id="cantidad_bloques" name="cantidad_bloques" value="1" min="1" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="otros" class="font-weight-bold">Observaciones</label>
                        <textarea class="form-control" id="otros" name="otros" rows="2" placeholder="Notas u observaciones adicionales"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar procedimiento</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js-profesionales')
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
        const estado = procedimiento.estado === 1 ? '<span class="badge badge-success">Activo</span>' : '<span class="badge badge-secondary">Inactivo</span>';
        const acciones = '<button type="button" class="btn btn-danger btn-sm has-ripple" onclick="eliminarProcedimiento(' + procedimiento.id + ')"><i class="fas fa-trash"></i></button>';
        const rowNode = tablaProcedimientos.row.add([
            procedimiento.nombre || '-',
            procedimiento.lugar_nombre || '-',
            procedimiento.minutos_bloque || '',
            procedimiento.cantidad_bloques || '',
            estado,
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
    });
</script>
@endsection
