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
    <style>
        /* Neutraliza el borde negro grueso que Bootstrap 5 agrega bajo el encabezado */
        .tabla-asistentes > :not(:first-child) {
            border-top: 1px solid #eef0f5;
        }

        .permisos-modal-content {
            border: none;
            border-radius: 16px;
            overflow: hidden;
        }
        .permisos-modal-header {
            background: linear-gradient(120deg, #1a49a3 0%, #2DC2C1 100%);
            border-bottom: none;
            padding: 18px 24px;
        }
        .permisos-modal-header .modal-title {
            font-weight: 700;
            font-size: 1.05rem;
        }
        .permisos-modal-header .close {
            text-shadow: none;
            opacity: .9;
            font-weight: 400;
            font-size: 1.5rem;
        }
        .permisos-modal-header .close:hover {
            opacity: 1;
        }
        .permisos-modal-body {
            padding: 20px 24px 8px;
        }
        .permisos-asistente-box {
            display: flex;
            align-items: center;
            background-color: #f4f4f4;
            border-radius: 12px;
            padding: 12px 16px;
        }
        .permisos-asistente-avatar {
            width: 42px;
            height: 42px;
            min-width: 42px;
            border-radius: 50%;
            background-color: rgba(26, 73, 163, .1);
            color: #1a49a3;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            margin-right: 12px;
        }
        .permisos-grupo-titulo {
            display: flex;
            align-items: center;
            font-weight: 700;
            font-size: .78rem;
            letter-spacing: .6px;
            text-transform: uppercase;
            color: #343a40;
            margin-bottom: 18px;
        }
        .permisos-grupo-titulo i {
            margin-right: 6px;
        }
        .permisos-grupo + .permisos-grupo {
            margin-top: 18px;
            padding-top: 18px;
            border-top: 1px solid #f0f1f5;
        }
        .permiso-item {
            border: 1px solid #eef0f5;
            border-radius: 10px;
            padding: 10px 12px;
            height: 100%;
            transition: border-color .2s ease, background-color .2s ease;
        }
        .permiso-item:hover {
            border-color: #cfd9ee;
            background-color: #f8f9fc;
        }
        .permiso-item .custom-control-label {
            font-weight: 600;
            color: #2b2f3a;
            font-size: .9rem;
            cursor: pointer;
        }
        .permisos-modal-footer {
            border-top: 1px solid #f0f1f5;
            padding: 14px 24px 20px;
        }
    </style>

    <div id="permisos_rol" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="permisos_rol" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content permisos-modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title f-20 text-white">
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
                            <i class="feather icon-user"></i>
                        </div>
                        <div>
                            <small class="text-c-blue d-block">Asistente</small>
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
                                                <i class="feather icon-check-circle text-success"></i> Confirmar hora
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 mb-2">
                                    <div class="permiso-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_anular_hora" data-permiso="permiso_anular_hora">
                                            <label class="custom-control-label" for="pa_permiso_anular_hora">
                                                <i class="feather icon-x-circle text-danger"></i> Anular hora
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 mb-2">
                                    <div class="permiso-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_agendar_horas_extras" data-permiso="permiso_agendar_horas_extras">
                                            <label class="custom-control-label" for="pa_permiso_agendar_horas_extras">
                                                <i class="feather icon-calendar text-primary"></i> Agendar horas extras
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 mb-2">
                                    <div class="permiso-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_agendar_examenes" data-permiso="permiso_agendar_examenes">
                                            <label class="custom-control-label" for="pa_permiso_agendar_examenes">
                                                <i class="feather icon-clipboard text-info"></i> Agendar exámenes
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 mb-2">
                                    <div class="permiso-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_transcripcion_examenes" data-permiso="permiso_transcripcion_examenes">
                                            <label class="custom-control-label" for="pa_permiso_transcripcion_examenes">
                                                <i class="feather icon-file-text text-warning"></i> Transcripción de exámenes
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
                                                <i class="feather icon-eye text-info"></i> Buscar pacientes
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 mb-2">
                                    <div class="permiso-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_editar_pacientes" data-permiso="permiso_editar_pacientes">
                                            <label class="custom-control-label" for="pa_permiso_editar_pacientes">
                                                <i class="feather icon-edit text-warning"></i> Editar pacientes
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
                                                <i class="feather icon-upload-cloud text-primary"></i> Subir y ver archivos
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 mb-2">
                                    <div class="permiso-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_eliminar_archivos" data-permiso="permiso_eliminar_archivos">
                                            <label class="custom-control-label" for="pa_permiso_eliminar_archivos">
                                                <i class="feather icon-trash-2 text-danger"></i> Eliminar archivos
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h6 class="permisos-grupo-titulo mb-1"><i class="feather icon-credit-card"></i> Finanzas</h6>
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-6 mb-2">
                                    <div class="permiso-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_cotizar" data-permiso="permiso_cotizar">
                                            <label class="custom-control-label" for="pa_permiso_cotizar">
                                                <i class="feather icon-file-text text-success"></i> Cotizar
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 mb-2">
                                    <div class="permiso-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input permiso-asistente-check" id="pa_permiso_entrega_caja" data-permiso="permiso_entrega_caja">
                                            <label class="custom-control-label" for="pa_permiso_entrega_caja">
                                                <i class="feather icon-credit-card text-success"></i> Entrega de caja
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
            .fail(function() {
                swal({
                    title: 'Error',
                    text: 'Error de conexión. Intente nuevamente.',
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
