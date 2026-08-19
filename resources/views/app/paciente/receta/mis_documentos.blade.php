@extends('template.paciente.template')

@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">

            {{-- Header --}}
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('paciente.home') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('paciente.receta') }}">Receta Online</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Mis documentos e indicaciones</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .documentos-header {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    flex-wrap: wrap;
                    gap: 12px;
                }

                .documentos-subtitle {
                    color: #72849a;
                    margin: 4px 0 0;
                    font-size: 13px;
                }

                .doc-badge {
                    display: inline-flex;
                    align-items: center;
                    gap: 5px;
                    border-radius: 20px;
                    padding: 5px 10px;
                    font-size: 11px;
                    font-weight: 600;
                    white-space: nowrap;
                }

                .doc-badge-presupuesto {
                    background: #eaf4ff;
                    color: #0056a6;
                }

                .doc-badge-receta {
                    background: #f3ecff;
                    color: #6441a5;
                }

                .doc-badge-firmado {
                    background: #e9f8f0;
                    color: #168556;
                }

                .doc-badge-pendiente {
                    background: #fff6df;
                    color: #9c6a00;
                }

                .doc-actions {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-wrap: wrap;
                    gap: 6px;
                }

                .doc-actions .btn {
                    margin: 0;
                    white-space: nowrap;
                }

                .doc-profesional small {
                    display: block;
                    color: #7d8998;
                    margin-top: 2px;
                }

                .doc-title {
                    font-weight: 600;
                    color: #22364a;
                }

                .doc-number {
                    color: #0056a6;
                    font-weight: 700;
                }

                .firma-info {
                    background: #f7f9fc;
                    border: 1px solid #e3e9f0;
                    border-radius: 8px;
                    padding: 12px 14px;
                    font-size: 13px;
                    color: #58697a;
                    margin-bottom: 15px;
                }

                .firma-confirmacion {
                    border: 1px solid #d9e2ec;
                    border-radius: 8px;
                    padding: 10px 12px;
                    background: #fff;
                }

                @media (max-width: 767px) {
                    .documentos-header {
                        display: block;
                    }

                    .doc-actions {
                        justify-content: flex-start;
                    }
                }
            </style>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-header-principal bg-white">
                            <div class="documentos-header">
                                <div>
                                    <h5 class="f-20 d-inline mt-1">
                                        <i class="feather icon-file-text icono-primary"></i>
                                        Mis documentos e indicaciones
                                    </h5>
                                    <p class="documentos-subtitle">
                                        Revise, imprima y firme sus documentos clínicos disponibles.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="tabla_documentos_paciente"
                                    class="display table table-striped table-hover dt-responsive nowrap table-xs"
                                    style="width:100%">

                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Profesional o servicio</th>
                                            <th class="text-center align-middle">Documento</th>
                                            <th class="text-center align-middle">Detalle</th>
                                            <th class="text-center align-middle">Estado</th>
                                            <th class="text-center align-middle">Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        {{-- =========================================================
                                             PRESUPUESTOS ODONTOLÓGICOS
                                             ========================================================= --}}
                                        @if(isset($presupuestos) && count($presupuestos) > 0)
                                            @foreach($presupuestos as $presupuesto)
                                                @php
                                                    $profPresupuesto = $presupuesto->profesional_documento ?? null;

                                                    $nombreProfesional = $profPresupuesto
                                                        ? trim(
                                                            ($profPresupuesto->nombre ?? '') . ' ' .
                                                            ($profPresupuesto->apellido_uno ?? '') . ' ' .
                                                            ($profPresupuesto->apellido_dos ?? '')
                                                        )
                                                        : 'Profesional no identificado';

                                                    $especialidadPresupuesto =
                                                        data_get($profPresupuesto, 'SubTipoEspecialidad.nombre')
                                                        ?: data_get($profPresupuesto, 'TipoEspecialidad.nombre')
                                                        ?: data_get($profPresupuesto, 'Especialidad.nombre')
                                                        ?: '';

                                                    $firmadoPaciente =
                                                        (bool)($presupuesto->firmado_paciente ?? false)
                                                        || (int)($presupuesto->firma_paciente_estado ?? 0) === 1;

                                                    $pdfPresupuesto =
                                                        $presupuesto->pdf_url
                                                        ?? $presupuesto->ruta_pdf
                                                        ?? $presupuesto->pdf
                                                        ?? null;

                                                    $esUrgencia =
                                                        (int)($presupuesto->urgencia ?? 0) === 1
                                                        || !empty($presupuesto->id_convenio_urgencia_aplicado);

                                                    $detallePresupuesto =
                                                        $esUrgencia
                                                            ? 'Presupuesto de urgencia odontológica'
                                                            : 'Presupuesto odontológico';
                                                @endphp

                                                <tr data-tipo="presupuesto">
                                                    <td class="text-center align-middle"
                                                        data-order="{{ optional($presupuesto->created_at)->timestamp ?? 0 }}">
                                                        {{ !empty($presupuesto->created_at)
                                                            ? \Carbon\Carbon::parse($presupuesto->created_at)->format('d/m/Y')
                                                            : '-' }}
                                                    </td>

                                                    <td class="align-middle text-center doc-profesional">
                                                        <strong>{{ $nombreProfesional }}</strong>
                                                        @if(!empty($especialidadPresupuesto))
                                                            <small>{{ $especialidadPresupuesto }}</small>
                                                        @endif
                                                    </td>

                                                    <td class="align-middle text-center">
                                                        <span class="doc-badge doc-badge-presupuesto">
                                                            <i class="feather icon-file-text"></i>
                                                            Presupuesto
                                                        </span>
                                                        <div class="doc-number mt-1">
                                                            N.º {{ $presupuesto->id }}
                                                        </div>
                                                    </td>

                                                    <td class="align-middle text-center text-wrap">
                                                        <span class="doc-title">{{ $detallePresupuesto }}</span>

                                                        @if(isset($presupuesto->total) && $presupuesto->total !== null)
                                                            <div class="mt-1">
                                                                Total:
                                                                <strong>
                                                                    ${{ number_format((float)$presupuesto->total, 0, ',', '.') }}
                                                                </strong>
                                                            </div>
                                                        @endif
                                                    </td>

                                                    <td class="align-middle text-center">
                                                        @if($firmadoPaciente)
                                                            <span class="doc-badge doc-badge-firmado">
                                                                <i class="feather icon-check-circle"></i>
                                                                Firmado por paciente
                                                            </span>

                                                            @if(!empty($presupuesto->firma_paciente_fecha))
                                                                <div class="small text-muted mt-1">
                                                                    {{ \Carbon\Carbon::parse($presupuesto->firma_paciente_fecha)->format('d/m/Y H:i') }}
                                                                </div>
                                                            @endif
                                                        @else
                                                            <span class="doc-badge doc-badge-pendiente">
                                                                <i class="feather icon-clock"></i>
                                                                Pendiente de firma
                                                            </span>
                                                        @endif
                                                    </td>

                                                    <td class="text-center align-middle">
                                                        <div class="doc-actions">

                                                            {{-- Ver / imprimir PDF ya generado --}}
                                                            @if(!empty($pdfPresupuesto))
                                                                <a href="{{ $pdfPresupuesto }}"
                                                                    target="_blank"
                                                                    rel="noopener"
                                                                    class="btn btn-outline-primary btn-xxs"
                                                                    title="Ver presupuesto">
                                                                    <i class="feather icon-eye"></i> Ver
                                                                </a>

                                                                <button type="button"
                                                                    class="btn btn-outline-secondary btn-xxs btn-imprimir-presupuesto"
                                                                    data-url="{{ e($pdfPresupuesto) }}"
                                                                    title="Imprimir presupuesto">
                                                                    <i class="feather icon-printer"></i> Imprimir
                                                                </button>
                                                            @elseif(\Illuminate\Support\Facades\Route::has('paciente.presupuesto.pdf'))
                                                                <a href="{{ route('paciente.presupuesto.pdf', ['id' => $presupuesto->id]) }}"
                                                                    target="_blank"
                                                                    rel="noopener"
                                                                    class="btn btn-outline-primary btn-xxs">
                                                                    <i class="feather icon-file-text"></i> Ver PDF
                                                                </a>
                                                            @else
                                                                <button type="button"
                                                                    class="btn btn-light btn-xxs"
                                                                    disabled
                                                                    title="PDF aún no disponible">
                                                                    <i class="feather icon-file-text"></i> PDF no disponible
                                                                </button>
                                                            @endif

                                                            {{-- Firma paciente --}}
                                                            @if(!$firmadoPaciente)
                                                                @if(\Illuminate\Support\Facades\Route::has('paciente.presupuesto.firmar'))
                                                                    <button type="button"
                                                                        class="btn btn-success btn-xxs btn-firmar-presupuesto"
                                                                        data-id-presupuesto="{{ (int) $presupuesto->id }}"
                                                                        data-nombre-documento="Presupuesto N.º {{ (int) $presupuesto->id }}">
                                                                        <i class="feather icon-edit-3"></i> Firmar
                                                                    </button>
                                                                @else
                                                                    <button type="button"
                                                                        class="btn btn-success btn-xxs"
                                                                        disabled
                                                                        title="Falta configurar la ruta paciente.presupuesto.firmar">
                                                                        <i class="feather icon-edit-3"></i> Firmar
                                                                    </button>
                                                                @endif
                                                            @else
                                                                <button type="button"
                                                                    class="btn btn-success-light btn-xxs"
                                                                    disabled>
                                                                    <i class="feather icon-check"></i> Firmado
                                                                </button>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif


                                        {{-- =========================================================
                                             RECETAS EXISTENTES
                                             ========================================================= --}}
                                        @if(isset($fichas))
                                            @foreach($fichas as $f)
                                                @php
                                                    $profFicha = $f->Profesional()->first();
                                                    $especialidadFicha = $profFicha
                                                        ? optional($profFicha->especialidad()->first())->txt_esp
                                                        : '';
                                                @endphp

                                                @foreach($f->Recetas()->get() as $r)
                                                    <tr data-tipo="receta">
                                                        <td class="text-center align-middle"
                                                            data-order="{{ optional($r->created_at)->timestamp ?? 0 }}">
                                                            {{ \Carbon\Carbon::parse($r->created_at)->format('d/m/Y') }}
                                                        </td>

                                                        <td class="align-middle text-center doc-profesional">
                                                            @if($profFicha)
                                                                <strong>
                                                                    {{ trim(
                                                                        ($profFicha->nombre ?? '') . ' ' .
                                                                        ($profFicha->apellido_uno ?? '') . ' ' .
                                                                        ($profFicha->apellido_dos ?? '')
                                                                    ) }}
                                                                </strong>
                                                                @if(!empty($especialidadFicha))
                                                                    <small>{{ $especialidadFicha }}</small>
                                                                @endif
                                                            @else
                                                                <span class="text-muted">Profesional no identificado</span>
                                                            @endif
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            <span class="doc-badge doc-badge-receta">
                                                                <i class="feather icon-file-text"></i>
                                                                Receta
                                                            </span>
                                                        </td>

                                                        <td class="align-middle text-center text-wrap">
                                                            {{ $f->diagnostico ?: 'Sin diagnóstico informado' }}
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            <span class="doc-badge doc-badge-firmado">
                                                                <i class="feather icon-check-circle"></i>
                                                                Enviado
                                                            </span>
                                                        </td>

                                                        <td class="text-center align-middle">
                                                            <button type="button"
                                                                class="btn btn-danger-light-c btn-xxs"
                                                                data-toggle="modal"
                                                                data-target="#m_cons_receta">
                                                                <i class="feather icon-file-plus"></i> Ver
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>

                            @if((!isset($presupuestos) || count($presupuestos) === 0) && (!isset($fichas) || count($fichas) === 0))
                                <div class="text-center py-5">
                                    <i class="feather icon-file-text f-40 text-muted"></i>
                                    <h5 class="mt-3">Aún no tiene documentos disponibles</h5>
                                    <p class="text-muted">
                                        Los documentos emitidos por sus profesionales aparecerán aquí.
                                    </p>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    {{-- =============================================================
         MODAL FIRMA PRESUPUESTO
         ============================================================= --}}
    <div class="modal fade" id="modal_firmar_presupuesto" tabindex="-1" role="dialog"
        aria-labelledby="modal_firmar_presupuesto_titulo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="modal_firmar_presupuesto_titulo">
                        <i class="feather icon-edit-3 text-success mr-1"></i>
                        Firmar presupuesto
                    </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="firma-info">
                        <strong id="firma_presupuesto_nombre">Presupuesto</strong>
                        <div class="mt-1">
                            Al firmar, confirma que ha revisado y acepta el contenido del presupuesto
                            presentado por su profesional.
                        </div>
                    </div>

                    <input type="hidden" id="firma_presupuesto_id">

                    <div class="firma-confirmacion mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox"
                                class="custom-control-input"
                                id="firma_presupuesto_acepto">
                            <label class="custom-control-label" for="firma_presupuesto_acepto">
                                He leído el presupuesto y confirmo que deseo firmarlo.
                            </label>
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <label for="firma_presupuesto_password">
                            Contraseña de su cuenta
                        </label>
                        <input type="password"
                            class="form-control"
                            id="firma_presupuesto_password"
                            autocomplete="current-password"
                            placeholder="Ingrese su contraseña para confirmar">
                        <small class="form-text text-muted">
                            La contraseña se utiliza solamente para confirmar su identidad.
                        </small>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button"
                        class="btn btn-light"
                        data-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="button"
                        class="btn btn-success"
                        id="btn_confirmar_firma_presupuesto">
                        <i class="feather icon-edit-3 mr-1"></i>
                        Firmar presupuesto
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('page-script')
    <script>
        $(document).ready(function() {

            $('#tabla_documentos_paciente').DataTable({
                responsive: true,
                order: [[0, 'desc']],
                pageLength: 10,
                language: {
                    emptyTable: 'No existen documentos disponibles.',
                    search: 'Buscar:',
                    lengthMenu: 'Mostrar _MENU_ documentos',
                    info: 'Mostrando _START_ a _END_ de _TOTAL_ documentos',
                    infoEmpty: 'No existen documentos disponibles',
                    zeroRecords: 'No se encontraron documentos',
                    paginate: {
                        first: 'Primero',
                        last: 'Último',
                        next: 'Siguiente',
                        previous: 'Anterior'
                    }
                }
            });

            $(document).on('click', '.btn-imprimir-presupuesto', function() {
                const url = $(this).attr('data-url') || '';
                imprimirPresupuesto(url);
            });

            $(document).on('click', '.btn-firmar-presupuesto', function() {
                const idPresupuesto = $(this).attr('data-id-presupuesto');
                const nombreDocumento = $(this).attr('data-nombre-documento') || ('Presupuesto N.º ' + idPresupuesto);

                abrirFirmaPresupuesto(idPresupuesto, nombreDocumento);
            });

            $('#btn_confirmar_firma_presupuesto').on('click', function() {
                confirmarFirmaPresupuesto();
            });
        });


        function imprimirPresupuesto(url) {

            if (!url) {
                swal({
                    title: 'Documento no disponible',
                    text: 'El presupuesto todavía no tiene un PDF generado.',
                    icon: 'warning'
                });
                return;
            }

            const ventana = window.open(url, '_blank');

            if (!ventana) {
                swal({
                    title: 'Ventana bloqueada',
                    text: 'Permita las ventanas emergentes para poder imprimir el documento.',
                    icon: 'warning'
                });
                return;
            }

            /*
             * Se abre el PDF en una pestaña nueva.
             * El usuario puede usar el botón imprimir del visor PDF.
             */
            ventana.focus();
        }


        function abrirFirmaPresupuesto(idPresupuesto, nombreDocumento) {

            $('#firma_presupuesto_id').val(idPresupuesto);
            $('#firma_presupuesto_nombre').text(nombreDocumento || ('Presupuesto N.º ' + idPresupuesto));
            $('#firma_presupuesto_acepto').prop('checked', false);
            $('#firma_presupuesto_password').val('');

            $('#modal_firmar_presupuesto').modal('show');
        }


        function confirmarFirmaPresupuesto() {

            const idPresupuesto = $('#firma_presupuesto_id').val();
            const acepta = $('#firma_presupuesto_acepto').is(':checked');
            const password = $('#firma_presupuesto_password').val();

            if (!acepta) {
                swal({
                    title: 'Confirmación requerida',
                    text: 'Debe confirmar que ha leído y acepta el presupuesto.',
                    icon: 'warning'
                });
                return;
            }

            if (!password) {
                swal({
                    title: 'Contraseña requerida',
                    text: 'Ingrese su contraseña para confirmar la firma.',
                    icon: 'warning'
                });
                $('#firma_presupuesto_password').focus();
                return;
            }

            @if(\Illuminate\Support\Facades\Route::has('paciente.presupuesto.firmar'))

                const boton = $('#btn_confirmar_firma_presupuesto');

                boton.prop('disabled', true)
                    .html('<i class="feather icon-loader mr-1"></i> Firmando...');

                $.ajax({
                    type: 'POST',
                    url: "{{ route('paciente.presupuesto.firmar') }}",
                    data: {
                        id_presupuesto: idPresupuesto,
                        password: password,
                        acepta: 1,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(resp) {
                        console.log(resp);
                        if (resp && (Number(resp.estado) === 1 || resp.estado === 'ok' || resp.success === true)) {
                            $('#modal_firmar_presupuesto').modal('hide');

                            swal({
                                title: 'Presupuesto firmado',
                                text: resp.msj || resp.mensaje || 'El presupuesto fue firmado correctamente.',
                                icon: 'success'
                            }).then(function() {
                                window.location.reload();
                            });

                            return;
                        }

                        swal({
                            title: 'No fue posible firmar',
                            text: (resp && (resp.msj || resp.mensaje || resp.error))
                                ? (resp.msj || resp.mensaje || resp.error)
                                : 'No fue posible completar la firma del presupuesto.',
                            icon: 'error'
                        });
                    },
                    error: function(xhr) {

                        let mensaje = 'No fue posible completar la firma del presupuesto.';

                        if (xhr.responseJSON) {
                            mensaje =
                                xhr.responseJSON.msj ||
                                xhr.responseJSON.mensaje ||
                                xhr.responseJSON.error ||
                                mensaje;

                            if (
                                xhr.responseJSON.errors &&
                                xhr.responseJSON.errors.password &&
                                xhr.responseJSON.errors.password.length
                            ) {
                                mensaje = xhr.responseJSON.errors.password[0];
                            }
                        }

                        swal({
                            title: 'Error',
                            text: mensaje,
                            icon: 'error'
                        });
                    },
                    complete: function() {
                        boton.prop('disabled', false)
                            .html('<i class="feather icon-edit-3 mr-1"></i> Firmar presupuesto');
                    }
                });

            @else

                swal({
                    title: 'Firma no configurada',
                    text: 'Todavía no existe la ruta paciente.presupuesto.firmar en el backend.',
                    icon: 'warning'
                });

            @endif
        }
    </script>
@endsection
