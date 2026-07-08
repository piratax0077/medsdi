@extends('template.paciente.template')

@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">

            {{-- Encabezado --}}
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Reservar Bono</h5>
                            </div>

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('paciente.home') }}">Mi escritorio</a>
                                </li>
                                <li class="breadcrumb-item"> <a href="#">Reservar Bono</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contenido principal --}}
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Reserva tu bono</h4>
                        </div>

                        <div class="card-body">
                            <p>
                                Hola
                                <strong>{{ $paciente->nombres ?? 'Paciente' }} {{ $paciente->apellido_uno ?? '' }}</strong>,
                            </p>

                            <p class="mb-4">Sigue los pasos para validar el beneficiario, buscar profesionales habilitados según la previsión y cotizar tu bono.</p>

                            <form id="form_reservar_bono" method="POST" action="#">
                                @csrf

                                <input type="hidden" id="current_paciente_id" value="{{ $paciente->id ?? '' }}">
                                <input type="hidden" id="beneficiario_validado" value="0">
                                <input type="hidden" id="prevision_id" value="">
                                <input type="hidden" id="prevision_tipo" value="">
                                <input type="hidden" id="prevision_nombre" value="">
                                <input type="hidden" id="tipo_bono_id" name="tipo_bono_id" value="">
                                <input type="hidden" id="tipo_bono_seleccionado" value="">
                                <input type="hidden" id="codigo_prestacion" name="codigo_prestacion" value="">
                                <input type="hidden" id="id_prestacion" name="id_prestacion" value="">
                                <input type="hidden" id="nombre_prestacion" name="nombre_prestacion" value="">
                                <input type="hidden" id="origen_prestacion" name="origen_prestacion" value="">
                                <input type="hidden" id="cotizacion_validada" value="0">

                                {{-- Paso 1 --}}
                                <div class="card border mb-3">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0 font-weight-bold">
                                            <span class="badge badge-primary mr-1">1</span>
                                            Beneficiario automático
                                        </h6>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-row align-items-end">
                                            <div class="col-sm-12 col-md-8 mb-3">
                                                {{-- Beneficiario oculto:
                                                     Se envía siempre 1 para mantener compatibilidad con el backend actual. --}}
                                                <input type="hidden" id="beneficiary_id" name="beneficiary_id" value="1">

                                                <div class="alert alert-light border mb-0">
                                                    <div class="d-flex align-items-start">
                                                        <div class="mr-2 text-primary">
                                                            <i class="feather icon-user-check" style="font-size: 20px;"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Beneficiario principal seleccionado automáticamente.</strong>
                                                            <br>
                                                            <span class="text-muted">
                                                                Para este flujo se omite la selección manual del beneficiario y se utiliza el beneficiario principal del paciente.
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-4 mb-3">
                                                <button
                                                    type="button"
                                                    id="btn_validar_prevision"
                                                    class="btn btn-sm btn-outline-primary btn-block"
                                                    onclick="validarBeneficiarioPrevision();"
                                                >
                                                    <i class="feather icon-search"></i> Validar beneficiario
                                                </button>
                                            </div>
                                        </div>

                                        <div id="resultado_validacion_prevision"></div>
                                    </div>
                                </div>

                                {{-- Paso 2 --}}
                                <div class="card border mb-3" id="card_busqueda_profesionales">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0 font-weight-bold">
                                            <span class="badge badge-primary mr-1">2</span>
                                            Tipo de bono y búsqueda de profesionales por previsión
                                        </h6>
                                    </div>

                                    <div class="card-body">
                                        <div class="alert alert-info mb-3">
                                            Primero valida el beneficiario y selecciona el tipo de bono. Luego puedes buscar al profesional por <strong>RUT/nombre</strong> o filtrar por <strong>profesión y especialidad</strong>.
                                        </div>

                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-6 mb-3">
                                                <label for="prestacion_fonasa_busqueda">Tipo de bono / Prestación FONASA</label>

                                                <div class="input-group input-group-sm">
                                                    <input type="text"
                                                        id="prestacion_fonasa_busqueda"
                                                        class="form-control"
                                                        placeholder="Ingrese código FONASA, ej: 0101001"
                                                        autocomplete="off"
                                                        onkeyup="limpiarPrestacionFonasaSiCambia(); resetResultadoProfesionales();">

                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-info" onclick="buscarFonasaReservaBono();">
                                                            <i class="feather icon-search"></i> Buscar
                                                        </button>
                                                    </div>
                                                </div>

                                                <input type="text"
                                                    id="prestacion_fonasa_texto"
                                                    class="form-control form-control-sm mt-2"
                                                    placeholder="Prestación seleccionada"
                                                    readonly>

                                                <small class="text-muted">
                                                    Busca por código FONASA y selecciona la prestación antes de buscar profesionales.
                                                </small>

                                                <div id="resultado_fonasa_reserva_bono" class="mt-2"></div>
                                            </div>

                                            <div class="col-sm-12 col-md-3 mb-3 d-flex align-items-end">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" id="buscar_especialidad_hora24" onchange="resetResultadoProfesionales();">
                                                    <label class="form-check-label" for="buscar_especialidad_hora24">
                                                        Solo 24 hrs
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-3 mb-3 d-flex align-items-end">
                                                <button type="button" class="btn btn-primary btn-block" onclick="buscar_profesional_especialidad();">
                                                    <i class="feather icon-search"></i> Buscar profesionales
                                                </button>
                                            </div>
                                        </div>

                                        <div class="card border shadow-sm mb-3">
                                            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                                <h6 class="mb-0 font-weight-bold">
                                                    <i class="feather icon-user-check mr-1 text-primary"></i> Buscar profesional directo
                                                </h6>
                                                <span id="badge_busqueda_directa" class="badge badge-secondary">Opcional</span>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-row align-items-end">
                                                    <div class="col-sm-12 col-md-8 mb-3 mb-md-0">
                                                        <label for="nombre_rut_profesional">RUT, nombre o apellido del profesional</label>
                                                        <input type="text"
                                                            id="nombre_rut_profesional"
                                                            class="form-control form-control-sm"
                                                            placeholder="Ej: 12.345.678-9, Juan Pérez o Pérez Soto"
                                                            onkeyup="actualizarModoBusquedaProfesional(); resetResultadoProfesionales();"
                                                            onchange="actualizarModoBusquedaProfesional(); resetResultadoProfesionales();">
                                                        <small class="text-muted">
                                                            Si completas este campo, la búsqueda no obligará a seleccionar profesión ni especialidad.
                                                        </small>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <button type="button" class="btn btn-outline-secondary btn-sm btn-block" onclick="limpiarBusquedaDirectaProfesional();">
                                                            <i class="feather icon-x-circle"></i> Limpiar búsqueda directa
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card border shadow-sm mb-0">
                                            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                                <h6 class="mb-0 font-weight-bold">
                                                    <i class="feather icon-filter mr-1 text-primary"></i> Filtrar por profesión y especialidad
                                                </h6>
                                                <span id="badge_busqueda_especialidad" class="badge badge-primary">Activo si no buscas por RUT/nombre</span>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-4 mb-3">
                                                        <label for="agregar_profesional_nuevo_profesion">Profesión</label>
                                                        <select id="agregar_profesional_nuevo_profesion" name="profesion"
                                                            class="form-control form-control-sm"
                                                            onchange="buscar_tipo_especialidad(); actualizarModoBusquedaProfesional(); resetResultadoProfesionales();">
                                                            <option value="">Seleccione profesión</option>

                                                            @foreach ($profesiones ?? [] as $profesion)
                                                                <option value="{{ $profesion->id }}">{{ $profesion->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-12 col-md-4 mb-3">
                                                        <label for="agregar_profesional_nuevo_especialidad">Especialidad</label>
                                                        <select id="agregar_profesional_nuevo_especialidad" name="especialidad"
                                                            class="form-control form-control-sm"
                                                            onchange="buscar_sub_tipo_especialidad(); actualizarModoBusquedaProfesional(); resetResultadoProfesionales();">
                                                            <option value="">Seleccione especialidad</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-12 col-md-4 mb-3">
                                                        <label for="agregar_profesional_nuevo_sub_tipo_especialidad">Subtipo especialidad</label>
                                                        <select id="agregar_profesional_nuevo_sub_tipo_especialidad"
                                                            name="sub_tipo_especialidad" class="form-control form-control-sm"
                                                            onchange="actualizarModoBusquedaProfesional(); resetResultadoProfesionales();">
                                                            <option value="">Seleccione subtipo</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div id="ayuda_modo_busqueda" class="alert alert-light border mb-0 small">
                                                    <strong>Modo actual:</strong> búsqueda por especialidad. Debes seleccionar profesión y especialidad, salvo que busques por RUT/nombre.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            {{-- Resultados --}}
                            <div id="div_resultado_busqueda" class="row"></div>

                            <hr>

                            <p class="mt-3">
                                Si necesitas ayuda, puedes volver a tu escritorio o contactar a soporte.
                            </p>

                            <div class="mt-3">
                                <a href="{{ route('paciente.home') }}" class="btn btn-outline-secondary mr-2">
                                    Volver a mi escritorio
                                </a>

                                <a href="{{ route('paciente.agendar_hora') }}" class="btn btn-info">
                                    Buscar hora médica
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Información</h5>
                        </div>

                        <div class="card-body">
                            <p><strong>Flujo del bono:</strong></p>
                            <ol class="pl-3 mb-0">
                                <li>Selecciona beneficiario.</li>
                                <li>Valida vigencia y cobertura de la previsión.</li>
                                <li>Busca profesionales habilitados.</li>
                                <li>Cotiza y confirma el pago.</li>
                            </ol>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h5 class="mb-0">Historial</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-striped" id="tabla_historial_vouchers">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Profesional</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($ordenes_voucher) && count($ordenes_voucher) > 0)
                                            @foreach ($ordenes_voucher ?? [] as $reserva)
                                                <tr id="voucher_row_{{ $reserva->id }}">
                                                    <td>{{ $reserva->fecha_pagado_cap }}</td>
                                                    <td>{{ $reserva->profesional_nombre }}</td>
                                                    <td>
                                                        <span class="badge badge-{{ $reserva->estado_badge }}">
                                                            {{ $reserva->estado_voucher }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm" role="group">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-orden-id="{{ $reserva->id }}"
                                                                data-paciente="{{ e(optional($reserva->paciente)->nombres . ' ' . optional($reserva->paciente)->apellido_uno) }}"
                                                                data-profesional="{{ e(optional($reserva->profesional)->nombre . ' ' . optional($reserva->profesional)->apellido_uno) }}"
                                                                data-profesional-id="{{ $reserva->id_profesional ?? optional($reserva->profesional)->id ?? '' }}"
                                                                data-fecha="{{ e($reserva->fecha_pagado_cap) }}"
                                                                data-total="{{ e($reserva->monto) }}"
                                                                data-estado="{{ e($reserva->estado_voucher) }}"
                                                                data-tipo="{{ e($reserva->tipo) }}"
                                                                data-lugar="{{ e(optional($reserva->lugarAtencion)->nombre) }}"
                                                                data-lugar-id="{{ $reserva->id_lugar_atencion ?? optional($reserva->lugarAtencion)->id ?? '' }}"
                                                                onclick="mostrarQrOrden(this);">
                                                                QR
                                                            </button>

                                                            <button type="button" class="btn btn-info"
                                                                data-orden-id="{{ $reserva->id }}"
                                                                data-paciente="{{ e(optional($reserva->paciente)->nombres . ' ' . optional($reserva->paciente)->apellido_uno) }}"
                                                                data-profesional="{{ e(optional($reserva->profesional)->nombre . ' ' . optional($reserva->profesional)->apellido_uno) }}"
                                                                data-profesional-id="{{ $reserva->id_profesional ?? optional($reserva->profesional)->id ?? '' }}"
                                                                data-fecha="{{ e($reserva->fecha_pagado_cap) }}"
                                                                data-total="{{ e($reserva->monto) }}"
                                                                data-estado="{{ e($reserva->estado_voucher) }}"
                                                                data-tipo="{{ e($reserva->tipo) }}"
                                                                data-lugar="{{ e(optional($reserva->lugarAtencion)->nombre) }}"
                                                                data-lugar-id="{{ $reserva->id_lugar_atencion ?? optional($reserva->lugarAtencion)->id ?? '' }}"
                                                                onclick="abrirModalEditarVoucher(this);">
                                                                <i class="feather icon-edit"></i>
                                                            </button>

                                                            <button type="button" class="btn btn-success"
                                                                title="Compartir voucher"
                                                                data-orden-id="{{ $reserva->id }}"
                                                                data-paciente="{{ e(optional($reserva->paciente)->nombres . ' ' . optional($reserva->paciente)->apellido_uno) }}"
                                                                data-profesional="{{ e(optional($reserva->profesional)->nombre . ' ' . optional($reserva->profesional)->apellido_uno) }}"
                                                                data-profesional-id="{{ $reserva->id_profesional ?? optional($reserva->profesional)->id ?? '' }}"
                                                                data-fecha="{{ e($reserva->fecha_pagado_cap) }}"
                                                                data-total="{{ e($reserva->monto) }}"
                                                                data-estado="{{ e($reserva->estado_voucher) }}"
                                                                data-tipo="{{ e($reserva->tipo) }}"
                                                                data-lugar="{{ e(optional($reserva->lugarAtencion)->nombre) }}"
                                                                data-lugar-id="{{ $reserva->id_lugar_atencion ?? optional($reserva->lugarAtencion)->id ?? '' }}"
                                                                onclick="abrirModalCompartirVoucher(this);">
                                                                <i class="feather icon-share-2"></i>
                                                            </button>

                                                            <button type="button" class="btn btn-danger"
                                                                data-orden-id="{{ $reserva->id }}"
                                                                data-paciente="{{ e(optional($reserva->paciente)->nombres . ' ' . optional($reserva->paciente)->apellido_uno) }}"
                                                                data-profesional="{{ e(optional($reserva->profesional)->nombre . ' ' . optional($reserva->profesional)->apellido_uno) }}"
                                                                data-profesional-id="{{ $reserva->id_profesional ?? optional($reserva->profesional)->id ?? '' }}"
                                                                data-fecha="{{ e($reserva->fecha_pagado_cap) }}"
                                                                data-total="{{ e($reserva->monto) }}"
                                                                data-estado="{{ e($reserva->estado_voucher) }}"
                                                                data-tipo="{{ e($reserva->tipo) }}"
                                                                data-lugar="{{ e(optional($reserva->lugarAtencion)->nombre) }}"
                                                                data-lugar-id="{{ $reserva->id_lugar_atencion ?? optional($reserva->lugarAtencion)->id ?? '' }}"
                                                                onclick="abrirModalEliminarVoucher(this);">
                                                                <i class="feather icon-trash-2"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4" class="text-muted text-center">Sin reservas registradas</td>
                                            </tr>
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

    {{-- Modal: Cotización y Pago --}}
    <div class="modal fade" id="convenio_usuario" tabindex="-1" role="dialog" aria-labelledby="convenioUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content border-0 shadow">

                <div class="modal-header bg-primary text-white">
                    <div>
                        <h5 class="modal-title mb-0" id="convenioUsuarioLabel">
                            <i class="feather icon-credit-card mr-1"></i> Cotización y pago del bono
                        </h5>
                        <small class="d-block mt-1">Revisa beneficiario, profesional, prestación, convenio y copago antes de confirmar.</small>
                    </div>

                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body bg-light">
                    <input type="hidden" id="id_profesional_modal" value="0">
                    <input type="hidden" id="id_lugar_modal" value="0">
                    <input type="hidden" id="profesional_rut" value="">
                    <input type="hidden" id="cotizacion_id" value="">

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-header bg-white">
                                    <h6 class="mb-0 font-weight-bold">
                                        <i class="feather icon-user mr-1 text-primary"></i> Datos de la atención
                                    </h6>
                                </div>

                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label class="font-weight-bold">Beneficiario</label>
                                            <input type="text" id="beneficiario_info" class="form-control form-control-sm" readonly>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="profesional_info" class="font-weight-bold">Profesional</label>
                                            <input type="text" id="profesional_info" class="form-control form-control-sm" readonly>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label class="font-weight-bold">Previsión</label>
                                            <input type="text" id="prevision_info" class="form-control form-control-sm" readonly>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="font-weight-bold">Tipo de bono / Prestación</label>
                                            <input type="text" id="prestacion_info" class="form-control form-control-sm" readonly>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="cm_prof_cobro" class="font-weight-bold">Tipo de cobro</label>
                                            <select id="cm_prof_cobro" class="form-control form-control-sm">
                                                <option value="bono_prevision">Bono previsión</option>
                                                <option value="hora_medica">Hora médica particular</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0 font-weight-bold">
                                        <i class="feather icon-map-pin mr-1 text-primary"></i> Lugar y convenio
                                    </h6>
                                    <span class="badge badge-light">Previsión / Convenios</span>
                                </div>

                                <div class="card-body">
                                    <div id="contenedor_select_lugar" class="mb-3"></div>

                                    <div id="lista_convenios_prof">
                                        <div class="alert alert-light border mb-0">
                                            No hay convenios cargados.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-header bg-white">
                                    <h6 class="mb-0 font-weight-bold">
                                        <i class="feather icon-dollar-sign mr-1 text-primary"></i> Cotización
                                    </h6>
                                </div>

                                <div class="card-body">
                                    <div class="form-group mb-2">
                                        <label class="font-weight-bold">Valor prestación</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                            <input type="text" id="cm_prof_cobro_valor" class="form-control font-weight-bold" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label class="font-weight-bold">Bonificación</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                            <input type="text" id="cm_bonificacion" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="font-weight-bold">Copago paciente</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                            <input type="text" id="cm_copago" class="form-control font-weight-bold text-primary" readonly>
                                        </div>
                                    </div>

                                    <div id="resultado_cotizacion" class="mt-3"></div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-header bg-white">
                                    <h6 class="mb-0 font-weight-bold">
                                        <i class="feather icon-credit-card mr-1 text-primary"></i> Forma de pago
                                    </h6>
                                </div>

                                <div class="card-body">
                                    <div id="lista_formas_pago">
                                        @if (isset($formas_pago) && count($formas_pago) > 0)
                                            @foreach ($formas_pago as $fp)
                                                <div class="form-check mb-2">
                                                    <input
                                                        class="form-check-input"
                                                        type="radio"
                                                        name="forma_pago_id"
                                                        id="forma_pago_{{ $fp->id }}"
                                                        value="{{ $fp->id }}"
                                                        {{ $loop->first ? 'checked' : '' }}
                                                    >

                                                    <label class="form-check-label" for="forma_pago_{{ $fp->id }}" style="cursor:pointer;">
                                                        {{ $fp->nombre }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="alert alert-warning mb-0">
                                                No hay formas de pago disponibles.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-white">
                                    <h6 class="mb-0 font-weight-bold">
                                        <i class="feather icon-grid mr-1 text-primary"></i> Código QR
                                    </h6>
                                </div>

                                <div class="card-body text-center">
                                    <p class="text-muted small mb-3">
                                        El QR se generará después de confirmar el pago.
                                    </p>

                                    <div id="qr_section" style="display:none;">
                                        <div id="qr_container" class="mx-auto border rounded p-2 bg-white" style="width:220px;"></div>

                                        <button type="button" id="download_qr_btn" class="btn btn-sm btn-outline-secondary mt-3" onclick="downloadQRCode();">
                                            <i class="feather icon-download mr-1"></i> Descargar QR
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>

                    <button type="button" class="btn btn-primary" onclick="confirmar_pago_bono();">
                        <i class="feather icon-check-circle mr-1"></i> Confirmar pago
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal: QR Historial Voucher --}}
    <div class="modal fade" id="orden_qr_modal" tabindex="-1" role="dialog" aria-labelledby="ordenQrModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-primary text-white">
                    <div>
                        <h5 class="modal-title mb-0" id="ordenQrModalLabel">
                            <i class="feather icon-grid mr-1"></i> Código QR Voucher
                        </h5>
                        <small class="d-block mt-1">Presenta este código al momento de la atención.</small>
                    </div>

                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body bg-light">
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-header bg-white">
                            <h6 class="mb-0 font-weight-bold">
                                <i class="feather icon-file-text mr-1 text-primary"></i> Detalle del voucher
                            </h6>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered mb-0">
                                    <tbody>
                                        <tr><th class="bg-light">Paciente</th><td id="orden_qr_paciente"></td></tr>
                                        <tr><th class="bg-light">Profesional</th><td id="orden_qr_profesional"></td></tr>
                                        <tr><th class="bg-light">Fecha</th><td id="orden_qr_fecha"></td></tr>
                                        <tr>
                                            <th class="bg-light">Valor</th>
                                            <td><strong class="text-primary">$ <span id="orden_qr_total"></span></strong></td>
                                        </tr>
                                        <tr><th class="bg-light">Lugar atención</th><td id="orden_qr_lugar"></td></tr>
                                        <tr><th class="bg-light">Estado</th><td><span id="orden_qr_estado" class="badge badge-secondary"></span></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center">
                            <h6 class="font-weight-bold mb-2">
                                <i class="feather icon-smartphone mr-1 text-primary"></i> Validación QR
                            </h6>

                            <p class="text-muted small mb-3">Escanea este código para validar la orden del voucher.</p>

                            <div id="qr_section_historial" style="display:none;">
                                <div id="qr_container_historial" class="mx-auto border rounded p-2 bg-white" style="width:220px;"></div>

                                <button type="button" class="btn btn-sm btn-outline-secondary mt-3" onclick="downloadQRCode('qr_container_historial');">
                                    <i class="feather icon-download mr-1"></i> Descargar QR
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-white d-flex justify-content-between">
                    <button type="button" class="btn btn-sm btn-success" onclick="enviarQrWhatsapp();">
                        <i class="feather icon-message-circle mr-1"></i> Enviar por WhatsApp
                    </button>

                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>



    {{-- Modal: Compartir Voucher --}}
    <div class="modal fade" id="modal_compartir_voucher" tabindex="-1" role="dialog" aria-labelledby="modalCompartirVoucherLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-success text-white">
                    <div>
                        <h5 class="modal-title mb-0" id="modalCompartirVoucherLabel">
                            <i class="feather icon-share-2 mr-1"></i> Compartir voucher
                        </h5>
                        <small class="d-block mt-1">Envía los datos del voucher al paciente.</small>
                    </div>

                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body bg-light">
                    <input type="hidden" id="compartir_voucher_id" value="">

                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-header bg-white">
                            <h6 class="mb-0 font-weight-bold">
                                <i class="feather icon-file-text mr-1 text-success"></i> Datos del voucher
                            </h6>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered mb-0">
                                    <tbody>
                                        <tr><th class="bg-light">Orden</th><td id="compartir_voucher_orden"></td></tr>
                                        <tr><th class="bg-light">Paciente</th><td id="compartir_voucher_paciente"></td></tr>
                                        <tr><th class="bg-light">Profesional</th><td id="compartir_voucher_profesional"></td></tr>
                                        <tr><th class="bg-light">Fecha</th><td id="compartir_voucher_fecha"></td></tr>
                                        <tr><th class="bg-light">Lugar</th><td id="compartir_voucher_lugar"></td></tr>
                                        <tr><th class="bg-light">Valor</th><td><strong>$ <span id="compartir_voucher_total"></span></strong></td></tr>
                                        <tr><th class="bg-light">Estado</th><td><span id="compartir_voucher_estado" class="badge badge-secondary"></span></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="compartir_voucher_email" class="font-weight-bold">Correo del paciente</label>
                                <input type="email" id="compartir_voucher_email" class="form-control form-control-sm" placeholder="correo@ejemplo.cl">
                                <small class="text-muted">Se usará para enviar el voucher por email.</small>
                            </div>

                            <div class="form-group mb-0">
                                <label for="compartir_voucher_observacion" class="font-weight-bold">Mensaje adicional</label>
                                <textarea id="compartir_voucher_observacion" class="form-control form-control-sm" rows="2" placeholder="Mensaje opcional"></textarea>
                            </div>

                            <div id="resultado_compartir_voucher" class="mt-3"></div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-white d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-sm btn-success" onclick="compartirVoucherWhatsapp();">
                            <i class="feather icon-message-circle mr-1"></i> WhatsApp
                        </button>

                        <button type="button" class="btn btn-sm btn-primary" onclick="compartirVoucherEmail();">
                            <i class="feather icon-mail mr-1"></i> Email
                        </button>

                        <button type="button" class="btn btn-sm btn-info" onclick="compartirVoucherApp();">
                            <i class="feather icon-smartphone mr-1"></i> App
                        </button>
                    </div>

                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal: Editar Voucher --}}
    <div class="modal fade" id="modal_editar_voucher" tabindex="-1" role="dialog" aria-labelledby="modalEditarVoucherLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-info text-white">
                    <div>
                        <h5 class="modal-title mb-0" id="modalEditarVoucherLabel">
                            <i class="feather icon-edit mr-1"></i> Editar voucher
                        </h5>
                        <small class="d-block mt-1">Puedes modificar el lugar de atención asociado a la orden.</small>
                    </div>

                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body bg-light">
                    <input type="hidden" id="editar_voucher_id" value="">
                    <input type="hidden" id="editar_voucher_profesional_id" value="">
                    <input type="hidden" id="editar_voucher_lugar_actual_id" value="">

                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-header bg-white">
                            <h6 class="mb-0 font-weight-bold">
                                <i class="feather icon-file-text mr-1 text-info"></i> Datos de la orden
                            </h6>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered mb-0">
                                    <tbody>
                                        <tr><th class="bg-light" style="width:35%;">Orden</th><td id="editar_voucher_orden"></td></tr>
                                        <tr><th class="bg-light">Paciente</th><td id="editar_voucher_paciente"></td></tr>
                                        <tr><th class="bg-light">Profesional</th><td id="editar_voucher_profesional"></td></tr>
                                        <tr><th class="bg-light">Fecha</th><td id="editar_voucher_fecha"></td></tr>
                                        <tr><th class="bg-light">Lugar actual</th><td id="editar_voucher_lugar_actual"></td></tr>
                                        <tr><th class="bg-light">Estado</th><td><span id="editar_voucher_estado" class="badge badge-secondary"></span></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white">
                            <h6 class="mb-0 font-weight-bold">
                                <i class="feather icon-map-pin mr-1 text-info"></i> Cambiar lugar de atención
                            </h6>
                        </div>

                        <div class="card-body">
                            <div class="form-group mb-0">
                                <label for="editar_voucher_lugar_id" class="font-weight-bold">Nuevo lugar de atención</label>
                                <select id="editar_voucher_lugar_id" class="form-control form-control-sm">
                                    <option value="">Cargando lugares...</option>
                                </select>
                                <small class="text-muted">
                                    Se cargarán los lugares asociados al profesional de la orden.
                                </small>
                            </div>

                            <div id="resultado_editar_voucher" class="mt-3"></div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-white d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Cancelar</button>

                    <button type="button" id="btn_confirmar_editar_voucher" class="btn btn-info btn-sm" onclick="confirmarEditarLugarVoucher();">
                        <i class="feather icon-save mr-1"></i> Guardar cambios
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal: Eliminar / Anular Voucher --}}
    <div class="modal fade" id="modal_eliminar_voucher" tabindex="-1" role="dialog" aria-labelledby="modalEliminarVoucherLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-danger text-white">
                    <div>
                        <h5 class="modal-title mb-0" id="modalEliminarVoucherLabel">
                            <i class="feather icon-trash-2 mr-1"></i> Eliminar / anular voucher
                        </h5>
                        <small class="d-block mt-1">Revisa los datos de la orden antes de confirmar la anulación.</small>
                    </div>

                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body bg-light">
                    <input type="hidden" id="eliminar_voucher_id" value="">
                    <input type="hidden" id="eliminar_voucher_total_raw" value="0">

                    <div class="alert alert-warning">
                        <strong>Atención:</strong> esta acción marcará el voucher como anulado/eliminado.
                        Si corresponde devolución de dinero, selecciona la opción e ingresa el motivo.
                    </div>

                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-header bg-white">
                            <h6 class="mb-0 font-weight-bold">
                                <i class="feather icon-file-text mr-1 text-danger"></i> Datos de la orden
                            </h6>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered mb-0">
                                    <tbody>
                                        <tr><th class="bg-light" style="width:35%;">Orden</th><td id="eliminar_voucher_orden"></td></tr>
                                        <tr><th class="bg-light">Paciente</th><td id="eliminar_voucher_paciente"></td></tr>
                                        <tr><th class="bg-light">Profesional</th><td id="eliminar_voucher_profesional"></td></tr>
                                        <tr><th class="bg-light">Fecha</th><td id="eliminar_voucher_fecha"></td></tr>
                                        <tr><th class="bg-light">Lugar atención</th><td id="eliminar_voucher_lugar"></td></tr>
                                        <tr><th class="bg-light">Estado actual</th><td><span id="eliminar_voucher_estado" class="badge badge-secondary"></span></td></tr>
                                        <tr>
                                            <th class="bg-light">Monto</th>
                                            <td><strong class="text-danger">$ <span id="eliminar_voucher_total"></span></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white">
                            <h6 class="mb-0 font-weight-bold">
                                <i class="feather icon-dollar-sign mr-1 text-danger"></i> Devolución de dinero
                            </h6>
                        </div>

                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="eliminar_voucher_devolucion" class="font-weight-bold">¿Corresponde devolución?</label>
                                    <select id="eliminar_voucher_devolucion" class="form-control form-control-sm" onchange="toggleMontoDevolucionVoucher();">
                                        <option value="0">No</option>
                                        <option value="1">Sí</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="eliminar_voucher_monto_devolucion" class="font-weight-bold">Monto devolución</label>
                                    <input type="text" id="eliminar_voucher_monto_devolucion" class="form-control form-control-sm" value="0" disabled>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="eliminar_voucher_medio_devolucion" class="font-weight-bold">Medio devolución</label>
                                    <select id="eliminar_voucher_medio_devolucion" class="form-control form-control-sm" disabled>
                                        <option value="">Seleccione</option>
                                        <option value="efectivo">Efectivo</option>
                                        <option value="transferencia">Transferencia</option>
                                        <option value="tarjeta">Reversa tarjeta</option>
                                        <option value="otro">Otro</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <label for="eliminar_voucher_motivo" class="font-weight-bold">Motivo de anulación</label>
                                <textarea id="eliminar_voucher_motivo" class="form-control form-control-sm" rows="3" placeholder="Ej: paciente solicita anulación, error de emisión, cambio de profesional, etc."></textarea>
                            </div>

                            <div id="resultado_eliminar_voucher" class="mt-3"></div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-white d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Cancelar</button>

                    <button type="button" id="btn_confirmar_eliminar_voucher" class="btn btn-danger btn-sm" onclick="confirmarEliminarVoucher();">
                        <i class="feather icon-trash-2 mr-1"></i> Confirmar anulación
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        $(document).ready(function () {
            $('#form_reservar_bono').on('submit', function(e) {
                e.preventDefault();
            });

            $('#nombre_rut_profesional').on('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    buscar_profesional_especialidad();
                }
            });

            $('#prestacion_fonasa_busqueda').on('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    buscarFonasaReservaBono();
                }
            });

            actualizarModoBusquedaProfesional();
        });

        /*
        |--------------------------------------------------------------------------
        | QR
        |--------------------------------------------------------------------------
        */
        function loadQRCodeLibrary(callback) {
            if (window.QRCode) return callback && callback();
            var s = document.createElement('script');
            s.src = 'https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js';
            s.onload = function() { callback && callback(); };
            document.head.appendChild(s);
        }

        function generateQRCode(obj, containerId = 'qr_container') {
            try {
                var sectionId = containerId === 'qr_container' ? '#qr_section' : '#qr_section_historial';
                $(sectionId).show();

                var container = document.getElementById(containerId);
                if (!container) return;
                container.innerHTML = '';

                loadQRCodeLibrary(function() {
                    new QRCode(container, {
                        text: JSON.stringify(obj),
                        width: 200,
                        height: 200,
                        colorDark: '#000000',
                        colorLight: '#ffffff',
                        correctLevel: QRCode.CorrectLevel.H
                    });
                });
            } catch (e) {
                console.log('Error generando QR', e);
            }
        }

        function downloadQRCode(containerId = 'qr_container') {
            var container = document.getElementById(containerId);
            if (!container) return;

            var img = container.querySelector('img') || container.querySelector('canvas');
            if (!img) return;

            var dataUrl = img.tagName === 'IMG' ? img.src : img.toDataURL('image/png');
            var a = document.createElement('a');
            a.href = dataUrl;
            a.download = 'orden_qr.png';
            document.body.appendChild(a);
            a.click();
            a.remove();
        }

        let ultimoPayloadQrHistorial = null;

        function mostrarQrOrden(button) {
            var element = button instanceof HTMLElement ? button : $(button)[0];
            var ordenId = element.dataset.ordenId || null;

            if (!ordenId) {
                swal('Error', 'No se encontró el ID de reserva', 'error');
                return;
            }

            var payload = {
                orden_id: ordenId,
                paciente: element.dataset.paciente || '',
                profesional: element.dataset.profesional || '',
                fecha: element.dataset.fecha || '',
                total: element.dataset.total || element.dataset.monto || '0',
                estado: element.dataset.estado || '',
                tipo: element.dataset.tipo || 'voucher',
                lugarAtencion: element.dataset.lugar || '',
                origen: 'reserva_bono'
            };

            $('#orden_qr_numero').text(payload.orden_id);
            $('#orden_qr_paciente').text(payload.paciente);
            $('#orden_qr_profesional').text(payload.profesional);
            $('#orden_qr_fecha').text(payload.fecha);
            $('#orden_qr_total').text(formatMonto(payload.total));
            $('#orden_qr_estado').text(payload.estado);
            $('#orden_qr_lugar').text(payload.lugarAtencion || 'N/A');

            $('#qr_section_historial').show();
            $('#qr_container_historial').html('');

            ultimoPayloadQrHistorial = payload;
            $('#orden_qr_modal').modal('show');

            setTimeout(function() {
                generateQRCode({ o: payload.orden_id, t: 'voucher' }, 'qr_container_historial');
            }, 300);
        }

        function enviarQrWhatsapp() {
            if (!ultimoPayloadQrHistorial) {
                swal('Error', 'No hay información del voucher para enviar', 'error');
                return;
            }

            let mensaje = `Hola, te envío los datos de tu voucher:%0A%0A`;
            mensaje += `Orden: ${ultimoPayloadQrHistorial.orden_id}%0A`;
            mensaje += `Profesional: ${ultimoPayloadQrHistorial.profesional}%0A`;
            mensaje += `Fecha: ${ultimoPayloadQrHistorial.fecha}%0A`;
            mensaje += `Tipo: Voucher%0A%0A`;
            mensaje += `Puedes presentar estos datos al momento de la atención.`;

            window.open(`https://wa.me/?text=${mensaje}`, '_blank');
        }


        let ultimoPayloadCompartirVoucher = null;

        function obtenerPayloadVoucherDesdeBoton(button) {
            var element = button instanceof HTMLElement ? button : $(button)[0];

            return {
                orden_id: element.dataset.ordenId || '',
                paciente: element.dataset.paciente || '',
                profesional: element.dataset.profesional || '',
                profesional_id: element.dataset.profesionalId || '',
                fecha: element.dataset.fecha || '',
                total: element.dataset.total || element.dataset.monto || '0',
                estado: element.dataset.estado || '',
                tipo: element.dataset.tipo || 'voucher',
                lugarAtencion: element.dataset.lugar || '',
                lugar_atencion_id: element.dataset.lugarId || '',
                origen: 'reserva_bono'
            };
        }

        function abrirModalCompartirVoucher(button) {

            var payload = obtenerPayloadVoucherDesdeBoton(button);

            if (!payload.orden_id) {
                swal('Error', 'No se encontró el ID del voucher', 'error');
                return;
            }

            ultimoPayloadCompartirVoucher = payload;

            $('#compartir_voucher_id').val(payload.orden_id);
            $('#compartir_voucher_orden').text(payload.orden_id);
            $('#compartir_voucher_paciente').text(payload.paciente || 'N/A');
            $('#compartir_voucher_profesional').text(payload.profesional || 'N/A');
            $('#compartir_voucher_fecha').text(payload.fecha || 'N/A');
            $('#compartir_voucher_lugar').text(payload.lugarAtencion || 'N/A');
            $('#compartir_voucher_total').text(formatMonto(payload.total));
            $('#compartir_voucher_estado').text(payload.estado || 'N/A');
            $('#compartir_voucher_email').val('');
            $('#compartir_voucher_observacion').val('');
            $('#resultado_compartir_voucher').html('');

            $('#modal_compartir_voucher').modal('show');
        }

        function construirMensajeVoucher(payload) {
            let mensaje = `Hola, te envío los datos de tu voucher:\n\n`;
            mensaje += `Orden: ${payload.orden_id}\n`;
            mensaje += `Paciente: ${payload.paciente || 'N/A'}\n`;
            mensaje += `Profesional: ${payload.profesional || 'N/A'}\n`;
            mensaje += `Fecha: ${payload.fecha || 'N/A'}\n`;
            mensaje += `Lugar: ${payload.lugarAtencion || 'N/A'}\n`;
            mensaje += `Valor: $ ${formatMonto(payload.total)}\n`;
            mensaje += `Estado: ${payload.estado || 'N/A'}\n\n`;
            mensaje += `Puedes presentar estos datos al momento de la atención.`;

            const observacion = $.trim($('#compartir_voucher_observacion').val() || '');
            if (observacion !== '') {
                mensaje += `\n\nObservación: ${observacion}`;
            }

            return mensaje;
        }

        function compartirVoucherWhatsapp() {
            if (!ultimoPayloadCompartirVoucher) {
                swal('Error', 'No hay información del voucher para compartir', 'error');
                return;
            }

            const mensaje = encodeURIComponent(construirMensajeVoucher(ultimoPayloadCompartirVoucher));
            window.open(`https://wa.me/?text=${mensaje}`, '_blank');
        }

        function compartirVoucherEmail() {

            if (!ultimoPayloadCompartirVoucher) {
                swal('Error', 'No hay información del voucher para compartir', 'error');
                return;
            }

            const email = $.trim($('#compartir_voucher_email').val() || '');

            if (email === '') {
                swal('Error', 'Debe ingresar el correo del paciente', 'error');
                return;
            }

            $('#resultado_compartir_voucher').html(`
                <div class="alert alert-info mb-0">
                    Enviando voucher por email...
                </div>
            `);

            $.ajax({
                url: "{{ route('bonos.compartir_email') }}",
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    orden_id: ultimoPayloadCompartirVoucher.orden_id,
                    email: email,
                    mensaje: construirMensajeVoucher(ultimoPayloadCompartirVoucher),
                    observacion: $.trim($('#compartir_voucher_observacion').val() || '')
                }
            })
            .done(function(resp) {
                console.log(resp);
                resp = parseRespuesta(resp);

                if (resp && resp.estado == 1) {
                    $('#resultado_compartir_voucher').html(`
                        <div class="alert alert-success mb-0">
                            ${escapeHtml(resp.msj || 'Voucher enviado correctamente por email.')}
                        </div>
                    `);

                    swal('Correcto', resp.msj || 'Voucher enviado correctamente por email', 'success');
                    return;
                }

                $('#resultado_compartir_voucher').html(`
                    <div class="alert alert-danger mb-0">
                        ${escapeHtml(resp?.msj || 'No se pudo enviar el voucher por email.')}
                    </div>
                `);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);

                $('#resultado_compartir_voucher').html(`
                    <div class="alert alert-danger mb-0">
                        Error de comunicación al enviar email.
                    </div>
                `);
            });
        }

        function compartirVoucherApp() {

            if (!ultimoPayloadCompartirVoucher) {
                swal('Error', 'No hay información del voucher para compartir', 'error');
                return;
            }

            $('#resultado_compartir_voucher').html(`
                <div class="alert alert-info mb-0">
                    Enviando voucher a la app del paciente...
                </div>
            `);

            $.ajax({
                url: "{{ route('bonos.compartir_app') }}",
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    orden_id: ultimoPayloadCompartirVoucher.orden_id,
                    mensaje: construirMensajeVoucher(ultimoPayloadCompartirVoucher)
                }
            })
            .done(function(resp) {
                resp = parseRespuesta(resp);

                if (resp && resp.estado == 1) {
                    $('#resultado_compartir_voucher').html(`
                        <div class="alert alert-success mb-0">
                            ${escapeHtml(resp.msj || 'Voucher enviado correctamente a la app.')}
                        </div>
                    `);
                    swal('Correcto', resp.msj || 'Voucher enviado correctamente a la app', 'success');
                    return;
                }

                $('#resultado_compartir_voucher').html(`
                    <div class="alert alert-danger mb-0">
                        ${escapeHtml(resp?.msj || 'No se pudo enviar el voucher a la app.')}
                    </div>
                `);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);
                $('#resultado_compartir_voucher').html(`
                    <div class="alert alert-danger mb-0">
                        Error de comunicación al enviar a la app.
                    </div>
                `);
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Helpers
        |--------------------------------------------------------------------------
        */
        function parseRespuesta(data) {
            if (typeof data === 'string') {
                try { return JSON.parse(data); }
                catch (e) {
                    console.log('Error parseando JSON:', e, data);
                    return null;
                }
            }
            return data;
        }

        function escapeHtml(text) {
            return String(text ?? '')
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }

        function escapeJsParam(text) {
            return String(text ?? '').replace(/\\/g, '\\\\').replace(/'/g, "\\'");
        }

        function limpiarSelect(selector, texto = 'Seleccione') {
            $(selector).empty().append(`<option value="">${texto}</option>`);
        }

        function limpiarValoresCotizacion(mensaje = 'No hay valores para el convenio seleccionado.') {
            $('#cm_prof_cobro_valor').val('');
            $('#cm_bonificacion').val('0');
            $('#cm_copago').val('');

            $('#resultado_cotizacion').html(`
                <div class="alert alert-warning mb-0">
                    ${mensaje}
                </div>
            `);
        }

        function formatMonto(valor) {
            let n = Number(String(valor ?? '0').replace(/[^0-9.-]/g, '')) || 0;
            return new Intl.NumberFormat('es-CL').format(n);
        }

        function getBeneficiarioTexto() {
            return 'Beneficiario principal';
        }

        function getPrestacionTexto() {
            return $('#prestacion_fonasa_texto').val()
                || $('#nombre_prestacion').val()
                || 'Prestación FONASA no seleccionada';
        }

        function getPrevisionTexto() {
            return $('#prevision_nombre').val() || 'Previsión no informada';
        }

        function resetFlujoBono() {
            $('#beneficiario_validado').val(0);
            $('#prevision_id').val('');
            $('#prevision_tipo').val('');
            $('#prevision_nombre').val('');
            $('#cotizacion_validada').val(0);
            $('#resultado_validacion_prevision').html('');
            resetResultadoProfesionales();
        }

        function resetResultadoProfesionales() {
            $('#div_resultado_busqueda').html('');
            $('#cotizacion_validada').val(0);
        }

        function getNombreRutProfesional() {
            return $.trim($('#nombre_rut_profesional').val() || '');
        }

        function actualizarModoBusquedaProfesional() {
            const nombreRut = getNombreRutProfesional();
            const profesion = $('#agregar_profesional_nuevo_profesion').val();
            const especialidad = $('#agregar_profesional_nuevo_especialidad').val();

            if (nombreRut !== '') {
                $('#badge_busqueda_directa')
                    .removeClass('badge-secondary badge-light')
                    .addClass('badge-success')
                    .text('Activo');

                $('#badge_busqueda_especialidad')
                    .removeClass('badge-primary badge-success')
                    .addClass('badge-light')
                    .text('Opcional');

                $('#ayuda_modo_busqueda').html(`
                    <strong>Modo actual:</strong> búsqueda directa por RUT, nombre o apellido.
                    No es obligatorio seleccionar profesión ni especialidad.
                `);
                return;
            }

            $('#badge_busqueda_directa')
                .removeClass('badge-success')
                .addClass('badge-secondary')
                .text('Opcional');

            $('#badge_busqueda_especialidad')
                .removeClass('badge-light')
                .addClass(profesion || especialidad ? 'badge-success' : 'badge-primary')
                .text(profesion || especialidad ? 'En uso' : 'Activo si no buscas por RUT/nombre');

            $('#ayuda_modo_busqueda').html(`
                <strong>Modo actual:</strong> búsqueda por especialidad.
                Debes seleccionar profesión y especialidad, salvo que busques por RUT/nombre.
            `);
        }

        function limpiarBusquedaDirectaProfesional() {
            $('#nombre_rut_profesional').val('');
            actualizarModoBusquedaProfesional();
            resetResultadoProfesionales();
        }

        function setTipoBonoSeleccionado() {
            // Compatibilidad con el flujo antiguo:
            // tipo_bono_id queda como hidden y se alimenta desde el buscador FONASA.
            const tipoBonoId = $('#tipo_bono_id').val() || '';
            $('#tipo_bono_seleccionado').val(tipoBonoId);
            $('#cotizacion_validada').val(0);
        }

        /*
        |--------------------------------------------------------------------------
        | Buscador código FONASA para reserva de bono
        |--------------------------------------------------------------------------
        */
        function limpiarPrestacionFonasaSiCambia() {
            const busqueda = $.trim($('#prestacion_fonasa_busqueda').val() || '');
            const seleccionActual = $.trim($('#prestacion_fonasa_texto').val() || '');

            if (seleccionActual !== '' && busqueda !== seleccionActual) {
                limpiarPrestacionFonasa(false);
            }
        }

        function limpiarPrestacionFonasa(limpiarInput = true) {
            $('#tipo_bono_id').val('');
            $('#tipo_bono_seleccionado').val('');
            $('#codigo_prestacion').val('');
            $('#id_prestacion').val('');
            $('#nombre_prestacion').val('');
            $('#origen_prestacion').val('');
            $('#prestacion_fonasa_texto').val('');
            $('#cotizacion_validada').val(0);

            if (limpiarInput) {
                $('#prestacion_fonasa_busqueda').val('');
                $('#resultado_fonasa_reserva_bono').html('');
            }
        }

        function buscarFonasaReservaBono() {

            const valor = $.trim($('#prestacion_fonasa_busqueda').val() || '');

            limpiarPrestacionFonasa(false);
            $('#resultado_fonasa_reserva_bono').html('');

            if (valor === '') {
                $('#resultado_fonasa_reserva_bono').html(`
                    <div class="alert alert-danger p-2 mb-0">
                        Debe ingresar un código FONASA para buscar.
                    </div>
                `);
                return;
            }

            $('#resultado_fonasa_reserva_bono').html(`
                <div class="alert alert-info p-2 mb-0">
                    <span class="spinner-border spinner-border-sm mr-1"></span>
                    Buscando prestación FONASA...
                </div>
            `);

            $.ajax({
                url: "{{ route('fonasa.buscar.por.codigo') }}",
                type: "GET",
                data: { valor: valor }
            })
            .done(function(resp) {
                resp = parseRespuesta(resp);

                if (!resp || resp.estado != 1 || !resp.registros || resp.registros.length === 0) {
                    $('#resultado_fonasa_reserva_bono').html(`
                        <div class="alert alert-warning p-2 mb-0">
                            No se encontraron prestaciones asociadas al código ingresado.
                        </div>
                    `);
                    return;
                }

                let html = `
                    <div class="list-group shadow-sm">
                `;

                $(resp.registros).each(function(i, item) {
                    const id = escapeHtml(item.id || '');
                    const codigo = escapeHtml(item.codigo || '');
                    const nombre = escapeHtml(item.nombre || '');
                    const origen = escapeHtml(item.origen || 'fonasa');

                    html += `
                        <button type="button"
                            class="list-group-item list-group-item-action py-2"
                            data-id="${id}"
                            data-codigo="${codigo}"
                            data-nombre="${nombre}"
                            data-origen="${origen}"
                            onclick="seleccionarFonasaReservaBono(this);">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <strong>${codigo}</strong> - ${nombre}
                                    <small class="text-muted d-block">${origen}</small>
                                </div>
                                <span class="badge badge-info">Seleccionar</span>
                            </div>
                        </button>
                    `;
                });

                html += `</div>`;

                $('#resultado_fonasa_reserva_bono').html(html);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);

                $('#resultado_fonasa_reserva_bono').html(`
                    <div class="alert alert-danger p-2 mb-0">
                        Error al buscar código FONASA.
                    </div>
                `);
            });
        }

        function seleccionarFonasaReservaBono(button) {

            const item = button.dataset || {};

            const id = item.id || '';
            const codigo = item.codigo || '';
            const nombre = item.nombre || '';
            const origen = item.origen || 'fonasa';
            const texto = `${codigo} - ${nombre}`;

            $('#tipo_bono_id').val(id);
            $('#tipo_bono_seleccionado').val(id);
            $('#id_prestacion').val(id);
            $('#codigo_prestacion').val(codigo);
            $('#nombre_prestacion').val(nombre);
            $('#origen_prestacion').val(origen);
            $('#prestacion_fonasa_busqueda').val(codigo);
            $('#prestacion_fonasa_texto').val(texto);
            $('#cotizacion_validada').val(0);

            $('#resultado_fonasa_reserva_bono').html(`
                <div class="alert alert-success p-2 mb-0">
                    <strong>Prestación seleccionada:</strong><br>
                    ${escapeHtml(texto)}
                </div>
            `);

            resetResultadoProfesionales();
        }

        /*
        |--------------------------------------------------------------------------
        | Validación beneficiario / Previsión
        |--------------------------------------------------------------------------
        */
        function validarBeneficiarioPrevision() {

            let beneficiario = $('#beneficiary_id').val() || 1;
            $('#beneficiary_id').val(beneficiario);

            $('#btn_validar_prevision')
                .prop('disabled', true)
                .html('<span class="spinner-border spinner-border-sm mr-1"></span> Validando...');

            $('#resultado_validacion_prevision').html(`
                <div class="alert alert-info mb-0">
                    Consultando vigencia y cobertura del beneficiario...
                </div>
            `);

            $.ajax({
                // Cuando tengas API real, crea esta ruta en Laravel.
                // Debe responder: { estado: 1, msj: 'Beneficiario vigente', data: {...} }
                url: "{{ route('bonos.validar_beneficiario') }}",
                type: "POST",
                data: {
                    _token: CSRF_TOKEN,
                    beneficiary_id: beneficiario
                }
            })
            .done(function(resp) {
                console.log(resp);
                resp = parseRespuesta(resp);

                if (resp && resp.estado == 1) {
                    const prevision = resp.prevision || {};
                    $('#beneficiario_validado').val(1);
                    $('#prevision_id').val(prevision.id || '');
                    $('#prevision_tipo').val(prevision.tipo || '');
                    $('#prevision_nombre').val(prevision.nombre || '');

                    let detallePrevision = '';
                    if (prevision.nombre) {
                        detallePrevision += `<br><strong>Previsión:</strong> ${escapeHtml(prevision.nombre)}`;
                    }
                    if (prevision.tipo) {
                        detallePrevision += ` <span class="badge badge-light">${escapeHtml(prevision.tipo)}</span>`;
                    }

                    $('#resultado_validacion_prevision').html(`
                        <div class="alert alert-success mb-0">
                            <strong>Beneficiario validado.</strong><br>
                            ${escapeHtml(resp.msj || 'El beneficiario figura vigente para compra de bono según su previsión.')}
                            ${detallePrevision}
                        </div>
                    `);
                } else {
                    $('#beneficiario_validado').val(0);
                    $('#resultado_validacion_prevision').html(`
                        <div class="alert alert-danger mb-0">
                            <strong>No validado.</strong><br>
                            ${escapeHtml(resp?.msj || 'El beneficiario no pudo ser validado.')}
                        </div>
                    `);
                }
            })
            .fail(function(jqXHR) {
                console.log(jqXHR);

                // Fallback temporal para desarrollo. Eliminar cuando exista API real.
                $('#beneficiario_validado').val(1);
                $('#prevision_id').val('0');
                $('#prevision_tipo').val('simulada');
                $('#prevision_nombre').val('Validación simulada');
                $('#resultado_validacion_prevision').html(`
                    <div class="alert alert-warning mb-0">
                        <strong>Validación simulada.</strong><br>
                        No existe la integración real todavía, pero se deja el beneficiario como validado para pruebas.
                    </div>
                `);
            })
            .always(function() {
                $('#btn_validar_prevision')
                    .prop('disabled', false)
                    .html('<i class="feather icon-search"></i> Validar beneficiario');
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Especialidades
        |--------------------------------------------------------------------------
        */
        function buscar_tipo_especialidad(id = '') {
            const profesion = $('#agregar_profesional_nuevo_profesion').val();

            limpiarSelect('#agregar_profesional_nuevo_especialidad', 'Seleccione especialidad');
            limpiarSelect('#agregar_profesional_nuevo_sub_tipo_especialidad', 'Seleccione subtipo');

            if (!profesion) return;

            $.ajax({
                url: "{{ route('home.buscar_especialidad') }}",
                type: "GET",
                data: { especialidad: profesion },
            })
            .done(function(data) {
                data = parseRespuesta(data);

                if (data == null) {
                    alert('No se pudo cargar los tipos de especialidad');
                    return;
                }

                const especialidades = $('#agregar_profesional_nuevo_especialidad');
                limpiarSelect('#agregar_profesional_nuevo_especialidad', 'Seleccione especialidad');

                if (data.length > 0) {
                    $(data).each(function(i, v) {
                        especialidades.append(`<option value="${v.id}">${escapeHtml(v.nombre)}</option>`);
                    });
                } else {
                    especialidades.append('<option value="0">No Aplica</option>').val(0);
                    $('#agregar_profesional_nuevo_sub_tipo_especialidad').empty().append('<option value="0">No Aplica</option>').val(0);
                }

                if (id !== '') especialidades.val(id);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);
            });
        }

        function buscar_sub_tipo_especialidad(id = '') {
            const especialidad = $('#agregar_profesional_nuevo_especialidad').val();

            limpiarSelect('#agregar_profesional_nuevo_sub_tipo_especialidad', 'Seleccione subtipo');

            if (!especialidad) return;

            $.ajax({
                url: "{{ route('home.buscar_sub_tipo_especialidad') }}",
                type: "GET",
                data: { especialidad: especialidad },
            })
            .done(function(data) {
                data = parseRespuesta(data);

                if (data == null) {
                    alert('No se pudo cargar los subtipo de especialidad');
                    return;
                }

                const subEspecialidades = $('#agregar_profesional_nuevo_sub_tipo_especialidad');
                limpiarSelect('#agregar_profesional_nuevo_sub_tipo_especialidad', 'Seleccione subtipo');

                if (data.length > 0) {
                    $(data).each(function(i, v) {
                        subEspecialidades.append(`<option value="${v.id}">${escapeHtml(v.nombre)}</option>`);
                    });
                } else {
                    subEspecialidades.append('<option value="0">No Aplica</option>').val(0);
                }

                if (id !== '') subEspecialidades.val(id);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Buscador de profesionales Previsión
        |--------------------------------------------------------------------------
        */
        function buscar_profesional_especialidad() {

            let requerido = 0;
            let error = '';

            const beneficiario = $('#beneficiary_id').val() || 1;
            $('#beneficiary_id').val(beneficiario);
            const beneficiarioValidado = $('#beneficiario_validado').val();
            const profesion = $('#agregar_profesional_nuevo_profesion').val();
            const especialidad = $('#agregar_profesional_nuevo_especialidad').val();
            const subEspecialidad = $('#agregar_profesional_nuevo_sub_tipo_especialidad').val();
            const tipoBono = $('#tipo_bono_id').val();
            const codigoPrestacion = $('#codigo_prestacion').val();
            const hora24 = $('#buscar_especialidad_hora24').prop('checked') ? 1 : 0;
            const nombreRut = getNombreRutProfesional();

            if (!beneficiario) {
                requerido = 1;
                error += 'Debe seleccionar beneficiario\n';
            }

            if (beneficiarioValidado != 1) {
                requerido = 1;
                error += 'Debe validar el beneficiario con su previsión\n';
            }

            if (nombreRut === '') {
                if (profesion === '') {
                    requerido = 1;
                    error += 'Campo requerido Profesión\n';
                }

                if (especialidad === '') {
                    requerido = 1;
                    error += 'Campo requerido Especialidad\n';
                }
            }

            if ($('#tipo_bono_id').length && tipoBono === '') {
                requerido = 1;
                error += 'Campo requerido Tipo de bono / Prestación\n';
            }

            if (requerido === 1) {
                swal({
                    title: "Campos mínimos requeridos",
                    text: error,
                    icon: "error",
                });
                return;
            }

            $('#div_resultado_busqueda').html(`
                <div class="col-md-12">
                    <p class="text-muted">
                        Buscando profesionales habilitados según previsión...
                    </p>
                </div>
            `);

            $.ajax({
                url: "{{ route('profesional.buscador') }}",
                type: "GET",
                data: {
                    beneficiary_id: beneficiario,
                    id_especialidad: profesion,
                    id_tipo_especialidad: especialidad,
                    id_sub_tipo_especialidad: subEspecialidad,
                    tipo_bono_id: tipoBono,
                    id_prestacion: tipoBono,
                    codigo_prestacion: codigoPrestacion,
                    prevision_id: $('#prevision_id').val(),
                    prevision_tipo: $('#prevision_tipo').val(),
                    buscar_especialidad_hora24: hora24,
                    tipo_agenda: '1,2',
                    solo_prevision: 1,

                    // Búsqueda por RUT, nombre o apellidos
                    nombre_rut: nombreRut
                },
            })
            .done(function(data) {
                data = parseRespuesta(data);

                const contenedor = $('#div_resultado_busqueda');
                contenedor.empty();

                if (!data || data.estado != 1 || !data.registros || data.registros.length === 0) {
                    contenedor.html(`
                        <div class="col-md-12">
                            <div class="alert alert-warning mb-0">
                                Sin profesionales habilitados para esta previsión y búsqueda.
                            </div>
                        </div>
                    `);
                    return;
                }

                $(data.registros).each(function(key, profesional) {
                    contenedor.append(renderCardProfesional(profesional));
                });
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);

                $('#div_resultado_busqueda').html(`
                    <div class="col-md-12">
                        <div class="alert alert-danger mb-0">
                            Error al buscar profesionales.
                        </div>
                    </div>
                `);
            });
        }

        function renderCardProfesional(profesional) {
            const nombreCompleto = [
                profesional.profesionales_nombre,
                profesional.profesionales_apellido_uno,
                profesional.profesionales_apellido_dos
            ].filter(Boolean).join(' ');

            const nombreSeguro = escapeHtml(nombreCompleto);
            const nombreParam = escapeJsParam(nombreCompleto);

            let especialidadTexto = '';

            if (profesional.tipos_especialidad_nombre != null) {
                especialidadTexto += escapeHtml(profesional.tipos_especialidad_nombre) + '<br>';
            }

            if (profesional.sub_tipo_especialidad_nombre != null) {
                especialidadTexto += escapeHtml(profesional.sub_tipo_especialidad_nombre);
            }

            let textoHora = 'Próxima hora Sin Agenda';
            let idLugarAtencion = 0;

            if (profesional.profesional_hora_mas_proxima && Object.keys(profesional.profesional_hora_mas_proxima).length > 0) {
                textoHora = 'Próxima hora ' +
                    escapeHtml(profesional.profesional_hora_mas_proxima.dia) + ' ' +
                    escapeHtml(profesional.profesional_hora_mas_proxima.hora);

                idLugarAtencion = profesional.profesional_hora_mas_proxima.id_lugar_atencion || 0;
            }

            const previsionBadge = profesional.prevision_habilitado == 0
                ? '<span class="badge badge-warning mt-2">Pendiente validar previsión</span>'
                : '<span class="badge badge-success mt-2">Previsión habilitada</span>';

            return `
                <div class="col-sm-12 col-md-4">
                    <div class="card user-card user-card-1 mt-4">
                        <div class="card-body pt-0">
                            <div class="user-about-block text-center">
                                <div class="row align-items-end">
                                    <div class="col">
                                        <img class="img-radius img-fluid wid-70" src="${escapeHtml(profesional.img_profesional)}" alt="${nombreSeguro}">
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <span class="badge badge-primary mt-2">${especialidadTexto}</span><br>
                                ${previsionBadge}

                                <h6 class="mb-1 mt-2">${nombreSeguro}</h6>

                                <p class="mb-3 text-muted">
                                    <i class="feather icon-calendar"></i> ${textoHora}
                                </p>

                                <button type="button" class="btn btn-primary btn-sm"
                                    onclick="abrir_pago_bono(${profesional.profesionales_id}, ${idLugarAtencion}, '${nombreParam}');">
                                    <i class="feather icon-credit-card"></i> Cotizar bono
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        /*
        |--------------------------------------------------------------------------
        | Cotización / Pago bono
        |--------------------------------------------------------------------------
        */
        function abrir_pago_bono(idProfesional, idLugar, nombreProfesional = '') {

            if ($('#beneficiario_validado').val() != 1) {
                swal('Error', 'Primero debe validar el beneficiario', 'error');
                return;
            }

            $('#id_profesional_modal').val(idProfesional || 0);
            $('#id_lugar_modal').val(idLugar || 0);
            $('#beneficiario_info').val(getBeneficiarioTexto());
            $('#prevision_info').val(getPrevisionTexto());
            $('#prestacion_info').val(getPrestacionTexto());

            if (nombreProfesional) {
                $('#profesional_info').val(nombreProfesional);
            }

            convenio_profesional_cm(idProfesional);
        }

        function convenio_profesional_cm(idProfesional) {
            $.ajax({
                url: "{{ route('adm_cm.dame_convenio_profesional') }}",
                type: "post",
                data: {
                    id_profesional: idProfesional,
                    beneficiary_id: $('#beneficiary_id').val(),
                    prevision_id: $('#prevision_id').val(),
                    prevision_tipo: $('#prevision_tipo').val(),
                    tipo_bono_id: $('#tipo_bono_seleccionado').val() || $('#tipo_bono_id').val(),
                    id_prestacion: $('#id_prestacion').val(),
                    codigo_prestacion: $('#codigo_prestacion').val(),
                    _token: CSRF_TOKEN,
                },
            })
            .done(function(data) {
                data = parseRespuesta(data);

                if (!data || data.estado != 1) {
                    swal({
                        title: "Error",
                        text: data?.msj || 'No se pudo cargar la información del profesional',
                        icon: "error",
                        buttons: "Aceptar",
                        dangerMode: true,
                    });
                    return;
                }

                $('#convenio_usuario').modal('show');

                const nombreProfesional = data.profesional_nombre || data.nombre_profesional || data.nombre || data.nombreCompleto || $('#profesional_info').val() || '';

                $('#profesional_info').val(nombreProfesional);
                $('#profesional_rut').val(data.rut || '');
                $('#cm_prof_cobro').val('bono_prevision');

                const valor = data.valor_prestacion || data.valor_copago_fonasa || 0;
                const bonificacion = data.bonificacion || 0;
                const copago = data.copago || valor;

                $('#cm_prof_cobro_valor').val(formatMonto(valor));
                $('#cm_bonificacion').val(formatMonto(bonificacion));
                $('#cm_copago').val(formatMonto(copago));
                $('#cotizacion_id').val(data.cotizacion_id || '');
                $('#cotizacion_validada').val(data.cotizacion_valida == 0 ? 0 : 1);

                $('#resultado_cotizacion').html(`
                    <div class="alert alert-success mb-0">
                        Cotización cargada. Revisa el copago antes de confirmar.
                    </div>
                `);

                const convenios = data.profesional_convenios || data.professional_convenios || data.profesional_convenios_list || [];

                if (data.valor_prestacion || data.valor) {
                    const valor = data.valor_prestacion || data.valor || 0;
                    const bonificacion = data.bonificacion || 0;
                    const copago = data.copago || valor;

                    $('#cm_prof_cobro_valor').val(formatMonto(valor));
                    $('#cm_bonificacion').val(formatMonto(bonificacion));
                    $('#cm_copago').val(formatMonto(copago));
                } else {
                    asignarValorPrimerConvenio(convenios);
                }

                $('#cotizacion_id').val(data.cotizacion_id || '');
                $('#cotizacion_validada').val(data.cotizacion_valida == 0 ? 0 : 1);

                renderConveniosProfesional(idProfesional, convenios);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);

                swal({
                    title: "Error",
                    text: "Error al cargar convenios/cotización del profesional",
                    icon: "error",
                });
            });
        }

        function asignarValorPrimerConvenio(convenios) {
            if (!convenios || convenios.length === 0) {
                $('#cm_prof_cobro_valor').val(formatMonto(0));
                $('#cm_bonificacion').val(formatMonto(0));
                $('#cm_copago').val(formatMonto(0));
                return;
            }

            const primerConvenio = convenios[0];

            const valor = primerConvenio.valor_copago_fonasa || 0;

            $('#cm_prof_cobro_valor').val(formatMonto(valor));

            // Por ahora, como no hay cálculo real de bonificación,
            // dejamos bonificación en 0 y copago igual al valor.
            $('#cm_bonificacion').val(formatMonto(0));
            $('#cm_copago').val(formatMonto(valor));

            $('#resultado_cotizacion').html(`
                <div class="alert alert-success mb-0">
                    Valor cargado desde el primer convenio disponible.
                </div>
            `);
        }

        function renderConveniosProfesional(idProfesional, convenios) {
            if (!convenios || convenios.length === 0) {
                habilitarPagoSinConvenio();

                $('#contenedor_select_lugar').html('');
                $('#lista_convenios_prof').html(`
                    <div class="alert alert-warning mb-0">
                        Este profesional no posee convenios cargados en el sistema.
                        Puede continuar sólo como pago particular si corresponde.
                    </div>
                `);
                return;
            }

            habilitarPagoConConvenio();
            window._proConveniosCurrent = convenios;

            const idLugarDefault = $('#id_lugar_modal').val() || '';

            $('#contenedor_select_lugar').html(`
                <div class="form-group">
                    <label for="select_lugar_atencion">Seleccione lugar de atención</label>
                    <select id="select_lugar_atencion" class="form-control form-control-sm"></select>
                </div>
            `);

            $('#select_lugar_atencion')
                .off('lugares:loaded')
                .on('lugares:loaded', function() {
                    const lugarSeleccionado = $(this).val() || idLugarDefault || $(this).find('option').first().val();

                    if (!lugarSeleccionado) {
                        $('#lista_convenios_prof').html('<p class="text-muted">No hay convenios cargados.</p>');
                        return;
                    }

                    $('#id_lugar_modal').val(lugarSeleccionado);
                    renderTablaConvenios(lugarSeleccionado, convenios);
                });

            $('#select_lugar_atencion')
                .off('change')
                .on('change', function() {
                    $('#id_lugar_modal').val($(this).val() || 0);
                    renderTablaConvenios($(this).val(), convenios);
                });

            cargar_lugares_atencion(idProfesional, 'select_lugar_atencion', idLugarDefault, convenios);
        }

        function renderTablaConvenios(idLugar, convenios) {
            const filtrados = $(convenios).filter(function(_, item) {
                return String(item.id_lugar_atencion || 0) === String(idLugar);
            }).toArray();

            if (filtrados.length === 0) {
                limpiarValoresCotizacion('No hay convenios ni valores para el lugar seleccionado.');
                $('#lista_convenios_prof').html('<p class="text-muted">No hay convenios para el lugar seleccionado.</p>');
                return;
            }

            // Cargar valor del primer convenio del lugar seleccionado que tenga valor > 0
            const convenioConValor = filtrados.find(function(convenio) {
                return Number(convenio.valor_copago_fonasa || 0) > 0;
            });

            if (convenioConValor) {
                asignarValorPrimerConvenio([convenioConValor]);
            } else {
                limpiarValoresCotizacion('El convenio seleccionado no tiene valor cargado.');
            }

            let tabla = `
                <div class="table-responsive">
                    <table id="tabla_convenios_prof" class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>Tipo atención</th>
                                <th>Convenio</th>
                                <th>Nombre</th>
                                <th>Valor</th>
                                <th>Observaciones</th>
                            </tr>
                        </thead>
                        <tbody>
            `;

            $(filtrados).each(function(i, convenio) {
                tabla += `
                    <tr data-convenio-id="${escapeHtml(convenio.id || '')}">
                        <td>${escapeHtml(convenio.tipo_atencion || '')}</td>
                        <td>${escapeHtml(convenio.convenios || '')}</td>
                        <td>${escapeHtml(convenio.nombre_convenio || '')}</td>
                        <td>${escapeHtml(convenio.valor || '')}</td>
                        <td>${escapeHtml(convenio.observaciones || '')}</td>
                    </tr>
                `;
            });

            tabla += `</tbody></table></div>`;

            $('#lista_convenios_prof').html(tabla);
            inicializarDataTableConvenios();
        }

        function inicializarDataTableConvenios() {
            if (typeof $.fn.DataTable === 'undefined') return;

            try {
                if ($.fn.dataTable.isDataTable('#tabla_convenios_prof')) {
                    $('#tabla_convenios_prof').DataTable().destroy();
                }

                $('#tabla_convenios_prof').DataTable({
                    paging: true,
                    pageLength: 5,
                    lengthChange: false,
                    searching: true,
                    info: false,
                    responsive: true,
                    language: { url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json' }
                });
            } catch (e) {
                console.log(e);
            }
        }

        function cargar_lugares_atencion(idProfesional, divDestino, valueInit = '', conveniosFallback = []) {
            $.ajax({
                url: "{{ route('bonos.lugares_atencion', '__ID_PROFESIONAL__') }}".replace('__ID_PROFESIONAL__', idProfesional),
                type: "GET",
                data: {},
            })
            .done(function(data) {
                data = parseRespuesta(data);

                const select = $('#' + divDestino);
                select.empty().append('<option value="">Seleccione</option>');

                if (data && data.estado == 1 && data.registros && data.registros.length > 0) {
                    $(data.registros).each(function(i, lugar) {
                        select.append(`<option value="${lugar.id}">${escapeHtml(lugar.nombre)}</option>`);
                    });
                } else {
                    cargarLugaresDesdeConvenios(select, conveniosFallback);
                }

                if (valueInit) select.val(valueInit);
                select.trigger('lugares:loaded');
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);

                const select = $('#' + divDestino);
                select.empty();

                cargarLugaresDesdeConvenios(select, conveniosFallback);

                if (valueInit) select.val(valueInit);
                select.trigger('lugares:loaded');
            });
        }

        function cargarLugaresDesdeConvenios(select, convenios) {
            const lugares = {};

            $(convenios || []).each(function(i, convenio) {
                const idLugar = convenio.id_lugar_atencion || 0;

                if (!lugares[idLugar]) {
                    lugares[idLugar] = {
                        id: idLugar,
                        nombre: convenio.lugar_nombre || ('Lugar ' + idLugar)
                    };
                }
            });

            if (Object.keys(lugares).length === 0) {
                select.append('<option value="">Seleccione</option>');
                return;
            }

            $.each(lugares, function(id, lugar) {
                select.append(`<option value="${lugar.id}">${escapeHtml(lugar.nombre)}</option>`);
            });
        }

        function confirmar_pago_bono() {

            const idProfesional = $('#id_profesional_modal').val();
            const idLugar = $('#id_lugar_modal').val();
            const formaPago = $('input[name="forma_pago_id"]:checked').val();
            const tipoCobro = $('#cm_prof_cobro').val();
            const rutProfesional = $('#profesional_rut').val();
            const valor = $('#cm_copago').val() || $('#cm_prof_cobro_valor').val();
            const beneficiaryId = $('#beneficiary_id').val() || 1;
            $('#beneficiary_id').val(beneficiaryId);
            const tipoBonoId = $('#tipo_bono_seleccionado').val() || $('#tipo_bono_id').val();
            const idPrestacion = $('#id_prestacion').val();
            const codigoPrestacion = $('#codigo_prestacion').val();
            const cotizacionId = $('#cotizacion_id').val();

            if (!beneficiaryId) {
                swal('Error', 'No se encontró el beneficiario seleccionado', 'error');
                return;
            }

            if ($('#beneficiario_validado').val() != 1) {
                swal('Error', 'El beneficiario no está validado', 'error');
                return;
            }

            if (!idProfesional || idProfesional == 0) {
                swal('Error', 'No se encontró el profesional seleccionado', 'error');
                return;
            }

            if (!idLugar || idLugar == 0) {
                swal('Error', 'Debe seleccionar un lugar de atención', 'error');
                return;
            }

            if (!formaPago) {
                swal('Error', 'Debe seleccionar una forma de pago', 'error');
                return;
            }

            const btnConfirmar = $('#convenio_usuario .modal-footer .btn-primary');

            btnConfirmar
                .prop('disabled', true)
                .html('<span class="spinner-border spinner-border-sm mr-1"></span> Validando pago...');

            swal({
                title: 'Validando pago',
                text: 'Estamos validando la transacción. Por favor espera...',
                icon: 'info',
                buttons: false,
                closeOnClickOutside: false,
                closeOnEsc: false,
            });

            setTimeout(function() {
                $.ajax({
                    url: "{{ route('asistente.venta.bono.pago') }}",
                    type: "post",
                    data: {
                        _token: CSRF_TOKEN,
                        beneficiary_id: beneficiaryId,
                        prevision_id: $('#prevision_id').val(),
                        prevision_tipo: $('#prevision_tipo').val(),
                        id_profesional: idProfesional,
                        id_lugar_atencion: idLugar,
                        forma_pago_id: formaPago,
                        tipo_cobro: tipoCobro,
                        rut_profesional: rutProfesional,
                        tipo_bono_id: tipoBonoId,
                        id_prestacion: idPrestacion,
                        codigo_prestacion: codigoPrestacion,
                        cotizacion_id: cotizacionId,
                        valor: valor
                    },
                })
                .done(function(data) {
                    console.log('Respuesta pago bono:', data);
                    data = parseRespuesta(data);

                    if (data.orden) {
                        agregarFilaHistorialVoucher(data.orden);
                    }

                    if (data && data.estado == 1) {
                        generateQRCode(data.qr_payload || {
                            o: data.orden_id,
                            t: 'voucher'
                        });

                        swal('Éxito', data.msj || 'Pago procesado correctamente', 'success');
                    } else {
                        swal('Error', data?.msj || 'Error procesando pago', 'error');
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError);
                    swal('Error', 'Error en el servidor', 'error');
                })
                .always(function() {
                    btnConfirmar
                        .prop('disabled', false)
                        .html('<i class="feather icon-check-circle mr-1"></i> Confirmar pago');
                });
            }, 1200);
        }

        function habilitarPagoSinConvenio() {
            $('#cm_prof_cobro').prop('disabled', false);
            $('#cm_prof_cobro').val('hora_medica');

            $('input[name="forma_pago_id"]')
                .prop('disabled', false)
                .removeAttr('disabled');

            $('#cm_prof_cobro_valor')
                .prop('readonly', false)
                .val('');

            $('#cm_bonificacion')
                .prop('readonly', false)
                .val('0');

            $('#cm_copago')
                .prop('readonly', false)
                .val('');

            $('#resultado_cotizacion').html(`
                <div class="alert alert-warning mb-0">
                    Profesional sin convenio. Ingrese manualmente el valor y copago particular.
                </div>
            `);
        }

        function habilitarPagoConConvenio() {
            $('#cm_prof_cobro').prop('disabled', false);
            $('input[name="forma_pago_id"]').prop('disabled', false);
        }


        /*
        |--------------------------------------------------------------------------
        | Editar voucher
        |--------------------------------------------------------------------------
        */
        let ultimoVoucherEditar = null;

        function abrirModalEditarVoucher(button) {

            const element = button instanceof HTMLElement ? button : $(button)[0];

            const payload = {
                orden_id: element.dataset.ordenId || '',
                paciente: element.dataset.paciente || '',
                profesional: element.dataset.profesional || '',
                profesional_id: element.dataset.profesionalId || '',
                fecha: element.dataset.fecha || '',
                estado: element.dataset.estado || '',
                lugarAtencion: element.dataset.lugar || '',
                lugarAtencionId: element.dataset.lugarId || ''
            };

            if (!payload.orden_id) {
                swal('Error', 'No se encontró el ID de la orden', 'error');
                return;
            }

            ultimoVoucherEditar = payload;

            $('#editar_voucher_id').val(payload.orden_id);
            $('#editar_voucher_profesional_id').val(payload.profesional_id);
            $('#editar_voucher_lugar_actual_id').val(payload.lugarAtencionId);
            $('#editar_voucher_orden').text(payload.orden_id);
            $('#editar_voucher_paciente').text(payload.paciente || 'N/A');
            $('#editar_voucher_profesional').text(payload.profesional || 'N/A');
            $('#editar_voucher_fecha').text(payload.fecha || 'N/A');
            $('#editar_voucher_lugar_actual').text(payload.lugarAtencion || 'N/A');
            $('#editar_voucher_estado').text(payload.estado || 'N/A');
            $('#resultado_editar_voucher').html('');

            $('#editar_voucher_lugar_id').html('<option value="">Cargando lugares...</option>');
            $('#modal_editar_voucher').modal('show');

            cargarLugaresEditarVoucher(payload.profesional_id, payload.lugarAtencionId, payload.lugarAtencion);
        }

        function cargarLugaresEditarVoucher(idProfesional, idLugarActual, nombreLugarActual) {
            const select = $('#editar_voucher_lugar_id');
            select.empty();

            if (!idProfesional) {
                select.append(`<option value="${escapeHtml(idLugarActual || '')}">${escapeHtml(nombreLugarActual || 'Lugar actual')}</option>`);
                $('#resultado_editar_voucher').html(`
                    <div class="alert alert-warning mb-0">
                        No se recibió el ID del profesional. Solo se muestra el lugar actual.
                    </div>
                `);
                return;
            }

            $.ajax({
                url: "{{ route('bonos.lugares_atencion', '__ID_PROFESIONAL__') }}".replace('__ID_PROFESIONAL__', idProfesional),
                type: "GET",
                data: {}
            })
            .done(function(resp) {
                resp = parseRespuesta(resp);
                select.empty().append('<option value="">Seleccione lugar</option>');

                if (resp && resp.estado == 1 && resp.registros && resp.registros.length > 0) {
                    $(resp.registros).each(function(i, lugar) {
                        const selected = String(lugar.id) === String(idLugarActual) ? 'selected' : '';
                        select.append(`<option value="${escapeHtml(lugar.id)}" ${selected}>${escapeHtml(lugar.nombre)}</option>`);
                    });
                } else {
                    select.append(`<option value="${escapeHtml(idLugarActual || '')}" selected>${escapeHtml(nombreLugarActual || 'Lugar actual')}</option>`);
                    $('#resultado_editar_voucher').html(`
                        <div class="alert alert-warning mb-0">
                            No se encontraron otros lugares para este profesional.
                        </div>
                    `);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);
                select.empty().append(`<option value="${escapeHtml(idLugarActual || '')}" selected>${escapeHtml(nombreLugarActual || 'Lugar actual')}</option>`);
                $('#resultado_editar_voucher').html(`
                    <div class="alert alert-danger mb-0">
                        Error al cargar lugares de atención.
                    </div>
                `);
            });
        }

        function confirmarEditarLugarVoucher() {

            const ordenId = $('#editar_voucher_id').val();
            const nuevoLugarId = $('#editar_voucher_lugar_id').val();
            const nuevoLugarTexto = $('#editar_voucher_lugar_id option:selected').text();
            const lugarActualId = $('#editar_voucher_lugar_actual_id').val();

            if (!ordenId) {
                swal('Error', 'No se encontró la orden seleccionada', 'error');
                return;
            }

            if (!nuevoLugarId) {
                swal('Error', 'Debe seleccionar un lugar de atención', 'error');
                return;
            }

            if (String(nuevoLugarId) === String(lugarActualId)) {
                swal('Aviso', 'El lugar seleccionado es el mismo que tiene actualmente la orden.', 'warning');
                return;
            }

            const btn = $('#btn_confirmar_editar_voucher');
            btn.prop('disabled', true)
                .html('<span class="spinner-border spinner-border-sm mr-1"></span> Guardando...');

            $('#resultado_editar_voucher').html(`
                <div class="alert alert-info mb-0">
                    Guardando cambio de lugar de atención...
                </div>
            `);

            $.ajax({
                url: "{{ route('bonos.editar_voucher') }}",
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    orden_id: ordenId,
                    id_lugar_atencion: nuevoLugarId
                },
            })
            .done(function(resp) {
                resp = parseRespuesta(resp);

                if (resp && resp.estado == 1) {
                    $('#resultado_editar_voucher').html(`
                        <div class="alert alert-success mb-0">
                            ${escapeHtml(resp.msj || 'Lugar de atención actualizado correctamente.')}
                        </div>
                    `);

                    $(`#voucher_row_${ordenId} button`).each(function() {
                        this.dataset.lugar = nuevoLugarTexto;
                        this.dataset.lugarId = nuevoLugarId;
                    });

                    $('#editar_voucher_lugar_actual').text(nuevoLugarTexto);
                    $('#editar_voucher_lugar_actual_id').val(nuevoLugarId);

                    swal('Correcto', resp.msj || 'Lugar de atención actualizado correctamente', 'success');

                    setTimeout(function() {
                        $('#modal_editar_voucher').modal('hide');
                    }, 700);

                    return;
                }

                $('#resultado_editar_voucher').html(`
                    <div class="alert alert-danger mb-0">
                        ${escapeHtml(resp?.msj || 'No se pudo actualizar el lugar de atención.')}
                    </div>
                `);

                swal('Error', resp?.msj || 'No se pudo actualizar el lugar de atención', 'error');
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);

                $('#resultado_editar_voucher').html(`
                    <div class="alert alert-danger mb-0">
                        Error de comunicación con el servidor.
                    </div>
                `);

                swal('Error', 'Error de comunicación con el servidor', 'error');
            })
            .always(function() {
                btn.prop('disabled', false)
                    .html('<i class="feather icon-save mr-1"></i> Guardar cambios');
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Eliminar / Anular voucher
        |--------------------------------------------------------------------------
        */
        let ultimoVoucherEliminar = null;

        function abrirModalEliminarVoucher(button) {

            const element = button instanceof HTMLElement ? button : $(button)[0];

            const payload = {
                orden_id: element.dataset.ordenId || '',
                paciente: element.dataset.paciente || '',
                profesional: element.dataset.profesional || '',
                fecha: element.dataset.fecha || '',
                total: element.dataset.total || element.dataset.monto || '0',
                estado: element.dataset.estado || '',
                tipo: element.dataset.tipo || 'voucher',
                lugarAtencion: element.dataset.lugar || ''
            };

            if (!payload.orden_id) {
                swal('Error', 'No se encontró el ID de la orden', 'error');
                return;
            }

            ultimoVoucherEliminar = payload;

            $('#eliminar_voucher_id').val(payload.orden_id);
            $('#eliminar_voucher_total_raw').val(payload.total);
            $('#eliminar_voucher_orden').text(payload.orden_id);
            $('#eliminar_voucher_paciente').text(payload.paciente || 'N/A');
            $('#eliminar_voucher_profesional').text(payload.profesional || 'N/A');
            $('#eliminar_voucher_fecha').text(payload.fecha || 'N/A');
            $('#eliminar_voucher_lugar').text(payload.lugarAtencion || 'N/A');
            $('#eliminar_voucher_estado').text(payload.estado || 'N/A');
            $('#eliminar_voucher_total').text(formatMonto(payload.total));

            $('#eliminar_voucher_devolucion').val('0');
            $('#eliminar_voucher_monto_devolucion').val('0').prop('disabled', true);
            $('#eliminar_voucher_medio_devolucion').val('').prop('disabled', true);
            $('#eliminar_voucher_motivo').val('');
            $('#resultado_eliminar_voucher').html('');

            $('#modal_eliminar_voucher').modal('show');
        }

        function toggleMontoDevolucionVoucher() {
            const aplicaDevolucion = $('#eliminar_voucher_devolucion').val() == '1';
            const total = $('#eliminar_voucher_total_raw').val() || 0;

            $('#eliminar_voucher_monto_devolucion')
                .prop('disabled', !aplicaDevolucion)
                .val(aplicaDevolucion ? formatMonto(total) : '0');

            $('#eliminar_voucher_medio_devolucion')
                .prop('disabled', !aplicaDevolucion);

            if (!aplicaDevolucion) {
                $('#eliminar_voucher_medio_devolucion').val('');
            }
        }

        function confirmarEliminarVoucher() {

            const ordenId = $('#eliminar_voucher_id').val();
            const devolucion = $('#eliminar_voucher_devolucion').val();
            const montoDevolucion = $('#eliminar_voucher_monto_devolucion').val();
            const medioDevolucion = $('#eliminar_voucher_medio_devolucion').val();
            const motivo = $.trim($('#eliminar_voucher_motivo').val() || '');

            if (!ordenId) {
                swal('Error', 'No se encontró la orden seleccionada', 'error');
                return;
            }

            if (motivo === '') {
                swal('Error', 'Debe ingresar el motivo de anulación', 'error');
                return;
            }

            if (devolucion == '1' && medioDevolucion === '') {
                swal('Error', 'Debe seleccionar el medio de devolución', 'error');
                return;
            }

            swal({
                title: 'Confirmar anulación',
                text: '¿Está seguro de anular este voucher?',
                icon: 'warning',
                buttons: ['Cancelar', 'Sí, anular'],
                dangerMode: true,
            }).then(function(confirmado) {
                if (!confirmado) return;

                const btn = $('#btn_confirmar_eliminar_voucher');

                btn.prop('disabled', true)
                    .html('<span class="spinner-border spinner-border-sm mr-1"></span> Anulando...');

                $('#resultado_eliminar_voucher').html(`
                    <div class="alert alert-info mb-0">
                        Procesando anulación del voucher...
                    </div>
                `);

                $.ajax({
                    url: "{{ route('bonos.anular_voucher') }}",
                    type: 'POST',
                    data: {
                        _token: CSRF_TOKEN,
                        orden_id: ordenId,
                        devolucion: devolucion,
                        monto_devolucion: montoDevolucion,
                        medio_devolucion: medioDevolucion,
                        motivo: motivo
                    },
                })
                .done(function(resp) {
                    resp = parseRespuesta(resp);

                    if (resp && resp.estado == 1) {
                        $('#resultado_eliminar_voucher').html(`
                            <div class="alert alert-success mb-0">
                                ${escapeHtml(resp.msj || 'Voucher anulado correctamente.')}
                            </div>
                        `);

                        $('#voucher_row_' + ordenId).remove();

                        if ($('#tabla_historial_vouchers tbody tr').length === 0) {
                            $('#tabla_historial_vouchers tbody').html(`
                                <tr>
                                    <td colspan="4" class="text-muted text-center">Sin reservas registradas</td>
                                </tr>
                            `);
                        }

                        swal('Correcto', resp.msj || 'Voucher anulado correctamente', 'success');

                        setTimeout(function() {
                            $('#modal_eliminar_voucher').modal('hide');
                        }, 700);

                        return;
                    }

                    $('#resultado_eliminar_voucher').html(`
                        <div class="alert alert-danger mb-0">
                            ${escapeHtml(resp?.msj || 'No se pudo anular el voucher.')}
                        </div>
                    `);

                    swal('Error', resp?.msj || 'No se pudo anular el voucher', 'error');
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError);

                    $('#resultado_eliminar_voucher').html(`
                        <div class="alert alert-danger mb-0">
                            Error de comunicación con el servidor.
                        </div>
                    `);

                    swal('Error', 'Error de comunicación con el servidor', 'error');
                })
                .always(function() {
                    btn.prop('disabled', false)
                        .html('<i class="feather icon-trash-2 mr-1"></i> Confirmar anulación');
                });
            });
        }

        function agregarFilaHistorialVoucher(orden) {
            const totalRaw = orden.total || orden.monto || 0;
            const total = formatMonto(totalRaw);
            const tbody = $('#tabla_historial_vouchers tbody');

            tbody.find('td[colspan="4"]').closest('tr').remove();


            const fila = `
                <tr id="voucher_row_${escapeHtml(orden.id)}">
                    <td>${escapeHtml(orden.fecha_pagado_cap || '')}</td>
                    <td>${escapeHtml(orden.profesional_nombre || '')}</td>
                    <td>
                        <span class="badge badge-${escapeHtml(orden.estado_badge || 'success')}">
                            ${escapeHtml(orden.estado_texto || 'PAGADO')}
                        </span>
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <button type="button" class="btn btn-secondary"
                                data-orden-id="${escapeHtml(orden.id)}"
                                data-paciente="${escapeHtml(orden.paciente_nombre || '')}"
                                data-profesional="${escapeHtml(orden.profesional_nombre || '')}"
                                data-profesional-id="${escapeHtml(orden.id_profesional || orden.profesional_id || '')}"
                                data-fecha="${escapeHtml(orden.fecha_pagado_cap || '')}"
                                data-total="${escapeHtml(totalRaw)}"
                                data-estado="${escapeHtml(orden.estado_texto || 'PAGADO')}"
                                data-tipo="${escapeHtml(orden.tipo || 'voucher')}"
                                data-lugar="${escapeHtml(orden.lugar_nombre || '')}"
                                data-lugar-id="${escapeHtml(orden.id_lugar_atencion || orden.lugar_id || '')}"
                                onclick="mostrarQrOrden(this);">
                                QR
                            </button>

                            <button type="button" class="btn btn-info"
                                data-orden-id="${escapeHtml(orden.id)}"
                                data-paciente="${escapeHtml(orden.paciente_nombre || '')}"
                                data-profesional="${escapeHtml(orden.profesional_nombre || '')}"
                                data-profesional-id="${escapeHtml(orden.id_profesional || orden.profesional_id || '')}"
                                data-fecha="${escapeHtml(orden.fecha_pagado_cap || '')}"
                                data-total="${escapeHtml(totalRaw)}"
                                data-estado="${escapeHtml(orden.estado_texto || 'PAGADO')}"
                                data-tipo="${escapeHtml(orden.tipo || 'voucher')}"
                                data-lugar="${escapeHtml(orden.lugar_nombre || '')}"
                                data-lugar-id="${escapeHtml(orden.id_lugar_atencion || orden.lugar_id || '')}"
                                onclick="abrirModalEditarVoucher(this);">
                                <i class="feather icon-edit"></i>
                            </button>

                            <button type="button" class="btn btn-success"
                                title="Compartir voucher"
                                data-orden-id="${escapeHtml(orden.id)}"
                                data-paciente="${escapeHtml(orden.paciente_nombre || '')}"
                                data-profesional="${escapeHtml(orden.profesional_nombre || '')}"
                                data-profesional-id="${escapeHtml(orden.id_profesional || orden.profesional_id || '')}"
                                data-fecha="${escapeHtml(orden.fecha_pagado_cap || '')}"
                                data-total="${escapeHtml(totalRaw)}"
                                data-estado="${escapeHtml(orden.estado_texto || 'PAGADO')}"
                                data-tipo="${escapeHtml(orden.tipo || 'voucher')}"
                                data-lugar="${escapeHtml(orden.lugar_nombre || '')}"
                                data-lugar-id="${escapeHtml(orden.id_lugar_atencion || orden.lugar_id || '')}"
                                onclick="abrirModalCompartirVoucher(this);">
                                <i class="feather icon-share-2"></i>
                            </button>

                            <button type="button" class="btn btn-danger"
                                data-orden-id="${escapeHtml(orden.id)}"
                                data-paciente="${escapeHtml(orden.paciente_nombre || '')}"
                                data-profesional="${escapeHtml(orden.profesional_nombre || '')}"
                                data-profesional-id="${escapeHtml(orden.id_profesional || orden.profesional_id || '')}"
                                data-fecha="${escapeHtml(orden.fecha_pagado_cap || '')}"
                                data-total="${escapeHtml(totalRaw)}"
                                data-estado="${escapeHtml(orden.estado_texto || 'PAGADO')}"
                                data-tipo="${escapeHtml(orden.tipo || 'voucher')}"
                                data-lugar="${escapeHtml(orden.lugar_nombre || '')}"
                                data-lugar-id="${escapeHtml(orden.id_lugar_atencion || orden.lugar_id || '')}"
                                onclick="abrirModalEliminarVoucher(this);">
                                <i class="feather icon-trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `;

            tbody.prepend(fila);
        }
    </script>
@endsection
