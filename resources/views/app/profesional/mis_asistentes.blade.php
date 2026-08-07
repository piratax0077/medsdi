@extends('template.profesional.template')

@section('content')
    <!--****Container Completo****-->
    <div class="pcoded-main-container">
        <div class="pcoded-content m-top">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12 mt-2">
                            <div class="page-header-title"></div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top"
                                        title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.configuracion') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a panel de configuración">
                                        Panel de Configuración
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Mis asistentes</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header-principal bg-white">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0">
                                        <h5 class="f-20 d-inline">
                                            <i class="feather icon-users icono-primary"></i> Mis asistentes
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div style="overflow-x:auto;">
                                <div class="table-responsive">
                                    <table class="display table table-striped table-sm dt-responsive nowrap tabla-asistentes" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Lugar Atención</th>
                                                <th>Rut</th>
                                                <th>Nombre</th>
                                                <th>Contacto</th>
                                                <th>Dirección</th>
                                                <th>Permisos</th>
                                                <th>Desvincular</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($asistentes_lugar_atencion))
                                                @foreach ($asistentes_lugar_atencion as $asis_la)
                                                    @php
                                                        $asistente = $asis_la->Asistentes()->first();
                                                        $lugar = $asis_la->LugarAtencion()->first();
                                                        $direccion = $asistente ? $asistente->Direccion()->first() : null;
                                                        $ciudad = $direccion ? $direccion->Ciudad()->first() : null;
                                                        $nombre_asistente = $asistente
                                                            ? trim(($asistente->nombres ?? '') . ' ' . ($asistente->apellido_uno ?? '') . ' ' . ($asistente->apellido_dos ?? ''))
                                                            : '';
                                                    @endphp

                                                    <tr>
                                                        <td>{{ $lugar->nombre ?? 'NO DISPONIBLE' }}</td>
                                                        <td>{{ $asistente->rut ?? 'NO DISPONIBLE' }}</td>
                                                        <td>{{ $nombre_asistente ?: 'NO DISPONIBLE' }}</td>
                                                        <td>
                                                            <span>
                                                                <i class="feather icon-mail icono-tabla"></i>
                                                                {{ $asistente->email ?? 'NO DISPONIBLE' }}
                                                            </span><br>
                                                            <span>
                                                                <i class="feather icon-phone icono-tabla"></i>
                                                                {{ $asistente->telefono_uno ?? 'NO DISPONIBLE' }}
                                                            </span>
                                                        </td>
                                                        <td class="align-middle">
                                                            @if ($direccion)
                                                                {{ $direccion->direccion }}<br>
                                                                {{ $ciudad->nombre ?? '' }}
                                                            @else
                                                                NO DISPONIBLE
                                                            @endif
                                                        </td>
                                                        <td class="align-middle">
                                                            <button type="button"
                                                                data-id-asistente="{{ $asis_la->id_asistente }}"
                                                                data-id-lugar-atencion="{{ $asis_la->id_lugar_atencion ?? 0 }}"
                                                                data-nombre-asistente='@json($nombre_asistente)'
                                                                onclick="abrirPermisosDesdeBoton(this)"
                                                                class="btn btn-info btn-sm btn-icon"
                                                                data-toggle="tooltip"
                                                                data-placement="top"
                                                                title="Permisos">
                                                                <i class="feather icon-shield"></i>
                                                            </button>
                                                        </td>
                                                        <td class="align-middle">
                                                            <button type="button"
                                                                onclick="desasociar_asistente({{ $asis_la->id }})"
                                                                class="btn btn-danger btn-sm btn-icon"
                                                                data-toggle="tooltip"
                                                                data-placement="top"
                                                                title="Desvincular">
                                                                <i class="feather icon-x"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL: Permisos del Asistente --}}

    <div id="permisos_rol" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="permisos_rol" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content permisos-modal-content">
                <div class="modal-header-sdi">
                    <h5 class="modal-title-sdi">
                        Permisos del Asistente
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" onclick="cerrar_permisos_asistente_modal();">
                        <span aria-hidden="true">×</span>
                    </button>

                    <input type="hidden" id="permisos_rol_id_asistente" value="">
                    <input type="hidden" id="permisos_rol_id_lugar_atencion" value="">
                </div>

                <div class="modal-body permisos-modal-body">
                    <div class="permisos-asistente-box mb-4">
                        <div class="permisos-asistente-avatar">
                            <img class="img-radius" src="{{ asset('images/iconos/usuario_asistente.svg') }}" alt="Profesional">

                        </div>
                        <div>
                            <small class="small-informacion d-block">Asistente</small>
                            <p class="font-weight-bold text-dark mb-0" id="permisos_rol_nombre_asistente">—</p>
                        </div>
                    </div>

                    <div id="permisos_rol_spinner" class="text-center py-3" style="display:none;">
                        <div class="spinner-border text-info" role="status">
                            <span class="sr-only">Cargando...</span>
                        </div>
                    </div>

                    <div id="permisos_rol_contenido">

                            <h6 class="permisos-grupo-titulo mb-1"><i class="feather icon-calendar"></i> Agenda y horas</h6>
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-6 mb-2">
                                    <div class="permiso-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_confirmar_hora" data-permiso="permiso_confirmar_hora">
                                            <label class="custom-control-label" for="pa_permiso_confirmar_hora">
                                                Confirmar hora
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 mb-2">
                                    <div class="permiso-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_anular_hora" data-permiso="permiso_anular_hora">
                                            <label class="custom-control-label" for="pa_permiso_anular_hora">
                                                Anular hora
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 mb-2">
                                    <div class="permiso-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_agendar_horas_extras" data-permiso="permiso_agendar_horas_extras">
                                            <label class="custom-control-label" for="pa_permiso_agendar_horas_extras">
                                                Agendar horas extras
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 mb-2">
                                    <div class="permiso-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_agendar_examenes" data-permiso="permiso_agendar_examenes">
                                            <label class="custom-control-label" for="pa_permiso_agendar_examenes">
                                                 Agendar exámenes
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 mb-2">
                                    <div class="permiso-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_transcripcion_examenes" data-permiso="permiso_transcripcion_examenes">
                                            <label class="custom-control-label" for="pa_permiso_transcripcion_examenes">
                                                Transcripción de exámenes
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h6 class="permisos-grupo-titulo mb-1"><i class="feather icon-users"></i> Pacientes</h6>
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-6 mb-2">
                                    <div class="permiso-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_ver_pacientes" data-permiso="permiso_ver_pacientes">
                                            <label class="custom-control-label" for="pa_permiso_ver_pacientes">
                                                Buscar pacientes
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 mb-2">
                                    <div class="permiso-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_editar_pacientes" data-permiso="permiso_editar_pacientes">
                                            <label class="custom-control-label" for="pa_permiso_editar_pacientes">
                                                Editar pacientes
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h6 class="permisos-grupo-titulo mb-1"><i class="feather icon-folder"></i> Archivos</h6>
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-6 mb-2">
                                    <div class="permiso-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_subir_ver_archivos" data-permiso="permiso_subir_ver_archivos">
                                            <label class="custom-control-label" for="pa_permiso_subir_ver_archivos">
                                                 Subir y ver archivos
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 mb-2">
                                    <div class="permiso-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_eliminar_archivos" data-permiso="permiso_eliminar_archivos">
                                            <label class="custom-control-label" for="pa_permiso_eliminar_archivos">
                                                Eliminar archivos
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h6 class="permisos-grupo-titulo mb-1">Finanzas</h6>
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-6 mb-2">
                                    <div class="permiso-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_cotizar" data-permiso="permiso_cotizar">
                                            <label class="custom-control-label" for="pa_permiso_cotizar">
                                               Cotizar
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 mb-2">
                                    <div class="permiso-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_entrega_caja" data-permiso="permiso_entrega_caja">
                                            <label class="custom-control-label" for="pa_permiso_entrega_caja">
                                                Entrega de caja
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                    </div>
                </div>

                <div class="modal-footer permisos-modal-footer">
                    <button type="button" class="btn btn-info" id="permisos_rol_btn_guardar" onclick="guardar_permisos_asistente_modal()">
                        <i class="feather icon-save"></i> Guardar permisos
                    </button>
                </div>
            </div>
        </div>
    </div>

    @include('app.profesional.modales.nuevo_asistente')

    {{-- @include('app.contabilidad.modals.datos_profesional') --}}
@endsection

@section('page-script')

    <script>
        window.abrirPermisosDesdeBoton = function(btn) {
            let idAsistente = $(btn).data('id-asistente');
            let idLugarAtencion = $(btn).data('id-lugar-atencion');
            let nombreAsistente = $(btn).attr('data-nombre-asistente');

            try{
                nombreAsistente = JSON.parse(nombreAsistente);
            }catch(e){}

            roles_permisos(idAsistente, nombreAsistente, idLugarAtencion);
        };

        window.roles_permisos = function(id_asistente, nombre, id_lugar_atencion)
        {
            if (!id_asistente) {
                swal({
                    title: 'Campos requeridos',
                    text: 'ID de asistente requerido.',
                    icon: 'error',
                    buttons: 'Aceptar'
                });
                return;
            }

            if (!id_lugar_atencion) {
                swal({
                    title: 'Campos requeridos',
                    text: 'ID de lugar de atención requerido.',
                    icon: 'error',
                    buttons: 'Aceptar'
                });
                return;
            }

            $('#permisos_rol_id_asistente').val(id_asistente);
            $('#permisos_rol_id_lugar_atencion').val(id_lugar_atencion);
            $('#permisos_rol_nombre_asistente').text(nombre || '—');

            $('#permisos_rol_spinner').show();
            $('#permisos_rol_contenido').hide();
            $('#permisos_rol_btn_guardar').hide();
            $('.permiso-asistente-check').prop('checked', false);

            $('#permisos_rol').modal('show');

            $.ajax({
                url: "{{ route('profesional.asistente.get.permisos') }}",
                type: 'GET',
                data: {
                    id_asistente: id_asistente,
                    id_lugar_atencion: id_lugar_atencion
                }
            })
            .done(function(data) {
                console.log('Permisos obtenidos:', data);
                if (data && data.estado == 1 && data.permisos) {
                    let p = data.permisos;

                    $('#pa_permiso_cotizar').prop('checked', !!Number(p.permiso_cotizar));
                    $('#pa_permiso_confirmar_hora').prop('checked', !!Number(p.permiso_confirmar_hora));
                    $('#pa_permiso_anular_hora').prop('checked', !!Number(p.permiso_anular_hora));
                    $('#pa_permiso_subir_ver_archivos').prop('checked', !!Number(p.permiso_subir_ver_archivos));
                    $('#pa_permiso_eliminar_archivos').prop('checked', !!Number(p.permiso_eliminar_archivos));
                    $('#pa_permiso_editar_pacientes').prop('checked', !!Number(p.permiso_editar_pacientes));
                    $('#pa_permiso_ver_pacientes').prop('checked', !!Number(p.permiso_ver_pacientes));
                    $('#pa_permiso_agendar_horas_extras').prop('checked', !!Number(p.permiso_agendar_horas_extras));
                    $('#pa_permiso_agendar_examenes').prop('checked', !!Number(p.permiso_agendar_examenes));
                    $('#pa_permiso_transcripcion_examenes').prop('checked', !!Number(p.permiso_transcripcion_examenes));
                    $('#pa_permiso_entrega_caja').prop('checked', !!Number(p.permiso_entrega_caja));
                }

                $('#permisos_rol_spinner').hide();
                $('#permisos_rol_contenido').show();
                $('#permisos_rol_btn_guardar').show();
            })
            .fail(function() {
                $('#permisos_rol_spinner').hide();
                cerrar_permisos_asistente_modal();

                swal({
                    title: 'Error',
                    text: 'No se pudieron cargar los permisos.',
                    icon: 'error',
                    buttons: 'Aceptar'
                });
            });
        };

        window.cerrar_permisos_asistente_modal = function()
        {
            $('#permisos_rol').modal('hide');

            // Respaldo: si el fondo oscuro queda pegado, se limpia manualmente
            setTimeout(function () {
                if (!$('.modal.show').length) {
                    $('.modal-backdrop').remove();
                    $('body').removeClass('modal-open').css('padding-right', '');
                }
            }, 300);
        };

        window.guardar_permisos_asistente_modal = function()
        {
            let id_asistente = $('#permisos_rol_id_asistente').val();
            let id_lugar_atencion = $('#permisos_rol_id_lugar_atencion').val();

            let data = {
                _token: "{{ csrf_token() }}",
                id_asistente: id_asistente,
                id_lugar_atencion: id_lugar_atencion,
                permiso_cotizar: $('#pa_permiso_cotizar').is(':checked') ? 1 : 0,
                permiso_confirmar_hora: $('#pa_permiso_confirmar_hora').is(':checked') ? 1 : 0,
                permiso_anular_hora: $('#pa_permiso_anular_hora').is(':checked') ? 1 : 0,
                permiso_subir_ver_archivos: $('#pa_permiso_subir_ver_archivos').is(':checked') ? 1 : 0,
                permiso_eliminar_archivos: $('#pa_permiso_eliminar_archivos').is(':checked') ? 1 : 0,
                permiso_editar_pacientes: $('#pa_permiso_editar_pacientes').is(':checked') ? 1 : 0,
                permiso_ver_pacientes: $('#pa_permiso_ver_pacientes').is(':checked') ? 1 : 0,
                permiso_agendar_horas_extras: $('#pa_permiso_agendar_horas_extras').is(':checked') ? 1 : 0,
                permiso_agendar_examenes: $('#pa_permiso_agendar_examenes').is(':checked') ? 1 : 0,
                permiso_transcripcion_examenes: $('#pa_permiso_transcripcion_examenes').is(':checked') ? 1 : 0,
                permiso_entrega_caja: $('#pa_permiso_entrega_caja').is(':checked') ? 1 : 0
            };

            $('#permisos_rol_btn_guardar').prop('disabled', true);

            $.ajax({
                url: "{{ route('profesional.asistente.guardar.permisos') }}",
                type: 'POST',
                data: data
            })
            .done(function(resp) {
                console.log('Respuesta al guardar permisos:', resp);
                if (resp && resp.estado == 1) {
                    swal({
                        title: 'Permisos actualizados',
                        text: resp.msj || 'Los permisos fueron guardados correctamente.',
                        icon: 'success',
                        buttons: 'Aceptar'
                    });

                    cerrar_permisos_asistente_modal();
                } else {
                    swal({
                        title: 'Error',
                        text: (resp && resp.msj) ? resp.msj : 'No fue posible guardar los permisos.',
                        icon: 'error',
                        buttons: 'Aceptar'
                    });
                }
            })
            .fail(function(xhr) {

                console.error('Error guardando permisos:', xhr);
                console.error('Respuesta Laravel:', xhr.responseJSON);

                let mensaje = 'Error al guardar los permisos.';

                if (
                    xhr.responseJSON &&
                    xhr.responseJSON.msj
                ) {
                    mensaje = xhr.responseJSON.msj;
                }

                swal({
                    title: 'Error',
                    text: mensaje,
                    icon: 'error',
                    buttons: 'Aceptar'
                });
            })
            .always(function() {
                $('#permisos_rol_btn_guardar').prop('disabled', false);
            });
        };
    </script>
@endsection
