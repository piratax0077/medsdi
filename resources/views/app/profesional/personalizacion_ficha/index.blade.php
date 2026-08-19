@extends('template.profesional.template')

@php
    $nombreEspecialidadFicha = $nombreEspecialidadFicha
        ?? optional($subTipoEspecialidadActual ?? null)->nombre
        ?? optional($tipoEspecialidadActual ?? null)->nombre
        ?? optional($especialidadActual ?? null)->nombre
        ?? 'Ficha médica';

    $codigoEspecialidadFicha = $codigoEspecialidadFicha
        ?? \Illuminate\Support\Str::slug($nombreEspecialidadFicha, '_');

    $nombrePlantillaPredeterminado = 'Ficha ' . $nombreEspecialidadFicha . ' personalizada';
    $seccionesBaseFicha = $seccionesBase ?? [];

    /*
     * Configuración económica/operativa odontológica.
     * El controlador puede enviarla como $configuracionPresupuesto.
     * Como fallback se intenta obtener desde la plantilla persistida.
     */
    $configuracionPresupuestoFicha = $configuracionPresupuesto
        ?? data_get($plantilla ?? null, 'configuracion_presupuesto', []);

    if (is_string($configuracionPresupuestoFicha)) {
        $configuracionPresupuestoFicha = json_decode($configuracionPresupuestoFicha, true) ?: [];
    }

    if (!is_array($configuracionPresupuestoFicha)) {
        $configuracionPresupuestoFicha = [];
    }
@endphp

@section('content')
    <style>
        .personalizador-card {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(31, 45, 61, .06);
        }

        .personalizador-card .card-header {
            background: #fff;
            border-bottom: 1px solid #edf2f7;
            border-radius: 12px 12px 0 0;
        }

        .seccion-configurable {
            border: 1px solid #dce5ef;
            border-radius: 10px;
            background: #fff;
            margin-bottom: 12px;
            transition: .2s ease;
        }

        .seccion-configurable:hover {
            border-color: #80bdff;
            box-shadow: 0 3px 10px rgba(0, 123, 255, .08);
        }

        .seccion-configurable.seccion-inactiva {
            opacity: .62;
            background: #f7f9fb;
        }

        .seccion-cabecera {
            padding: 12px 14px;
            cursor: pointer;
        }

        .seccion-detalle {
            display: none;
            padding: 0 14px 14px;
            border-top: 1px solid #edf2f7;
        }

        .seccion-configurable.abierta .seccion-detalle {
            display: block;
        }

        .subseccion-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 9px 10px;
            margin-bottom: 7px;
            background: #f8fafc;
            border: 1px solid #e4eaf1;
            border-radius: 8px;
        }

        .switch-personalizado {
            position: relative;
            display: inline-block;
            width: 42px;
            height: 23px;
            margin: 0;
            flex: 0 0 auto;
        }

        .switch-personalizado input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .switch-slider {
            position: absolute;
            cursor: pointer;
            inset: 0;
            background-color: #cbd5e0;
            transition: .25s;
            border-radius: 23px;
        }

        .switch-slider:before {
            position: absolute;
            content: "";
            height: 17px;
            width: 17px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .25s;
            border-radius: 50%;
            box-shadow: 0 1px 4px rgba(0, 0, 0, .22);
        }

        .switch-personalizado input:checked + .switch-slider {
            background-color: #2f80ed;
        }

        .switch-personalizado input:checked + .switch-slider:before {
            transform: translateX(19px);
        }

        .preview-ficha {
            position: sticky;
            top: 20px;
            max-height: calc(100vh - 120px);
            overflow-y: auto;
        }

        .preview-seccion {
            border: 1px solid #dce5ef;
            border-radius: 10px;
            margin-bottom: 11px;
            overflow: hidden;
            background: #fff;
        }

        .preview-seccion-titulo {
            padding: 10px 12px;
            font-weight: 700;
            color: #174ea6;
            border-bottom: 1px solid #e7edf4;
        }

        .preview-seccion-cuerpo {
            padding: 11px 12px;
        }

        .preview-campo {
            height: 34px;
            border: 1px solid #d5dde7;
            border-radius: 7px;
            background: #fafbfd;
            margin-top: 6px;
        }

        .preview-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .preview-tab {
            flex: 1 1 100px;
            padding: 7px;
            text-align: center;
            border: 1px solid #d7e0eb;
            background: #eef4ff;
            color: #315d9b;
            border-radius: 6px;
            font-size: 11px;
        }

        .badge-tipo {
            font-size: 10px;
            font-weight: 600;
            padding: 4px 7px;
            border-radius: 20px;
            background: #edf2f7;
            color: #4a5568;
        }

        .titulo-bloque {
            color: #174ea6;
            font-weight: 700;
        }

        .ayuda-texto {
            font-size: 12px;
            color: #718096;
        }

        .btn-icono {
            width: 31px;
            height: 31px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }

        .config-presupuesto-card {
            border: 1px solid #dce5ef;
            border-radius: 10px;
            background: #f9fbfd;
            padding: 14px;
            margin-bottom: 12px;
        }

        .config-presupuesto-card:last-child {
            margin-bottom: 0;
        }

        .config-presupuesto-card__titulo {
            color: #244a78;
            font-weight: 700;
            margin-bottom: 3px;
        }

        .config-presupuesto-card__descripcion {
            color: #718096;
            font-size: 12px;
            margin-bottom: 12px;
        }

        .config-presupuesto-opciones {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .config-presupuesto-opcion {
            border: 1px solid #e2e8f0;
            border-radius: 9px;
            background: #fff;
            padding: 12px;
        }

        .config-presupuesto-opcion .custom-control-label {
            font-weight: 600;
            color: #34495e;
        }

        .config-presupuesto-help {
            display: block;
            color: #7b8794;
            font-size: 11px;
            line-height: 1.35;
            margin-top: 4px;
        }

        .config-presupuesto-campo-condicional {
            margin-top: 12px;
        }

        .config-presupuesto-campo-condicional.is-disabled {
            opacity: .5;
            pointer-events: none;
        }

        @media (max-width: 767.98px) {
            .config-presupuesto-opciones {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 991.98px) {
            .preview-ficha {
                position: static;
                max-height: none;
            }
        }
    </style>

    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center mt-3">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="text-white mb-0">
                                </h5>
                            </div>
                            <ul class="breadcrumb mt-2 mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Configuraciones</a> </li>
                                <li class="breadcrumb-item active"><a href="#">Personalización de Ficha {{ $nombreEspecialidadFicha }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>



            <form id="form_personalizacion_ficha"
                  method="POST"
                  action="{{ Route::has('profesional.personalizar_ficha.guardar') ? route('profesional.personalizar_ficha.guardar') : '#' }}">
                @csrf

                <input type="hidden" name="id_especialidad" id="id_especialidad" value="{{ $profesional->id_especialidad ?? '' }}">
                <input type="hidden" id="id_tipo_especialidad" value="{{ $profesional->id_tipo_especialidad ?? '' }}">
                <input type="hidden" id="id_sub_tipo_especialidad" value="{{ $profesional->id_sub_tipo_especialidad ?? '' }}">
                <input type="hidden" name="configuracion" id="configuracion_ficha" value="">

                <div class="row">

                    <div class="col-lg-8">
                        <div class="alert alert-primary border-0 shadow-sm">
                <div class="d-flex align-items-start">
                    <i class="fas fa-info-circle f-18 mr-2 mt-1"></i>
                    <div>
                        <h4 class="f-18 text-c-blue"><strong>Personalización de Ficha {{ $nombreEspecialidadFicha }}</strong></h4>
                        <p class="text-dark font-weight-normal">Configure la estructura de la ficha habilitando o deshabilitando secciones y subsecciones según sus necesidades. Los cambios se reflejarán automáticamente en las nuevas fichas de atención.</p>
                    </div>
                </div>
            </div>
                        <div class="card personalizador-card mb-3">
                            <div class="card-body">
                                <div class="form-row align-items-center">
                                    <div class="col-md-4">
                                        <h6 class="mb-1 f-20 text-c-blue">Plantilla clínica</h6>
                                        <p class="mb-0 ayuda-texto">Seleccione la especialidad y asigne un nombre a esta configuración.</p>
                                    </div>
                                    <div class="col-md-8 mt-3 mt-md-0">
                                        <div class="form-row">
                                            <div class="col-sm-6">
                                                <label class="mb-1 font-weight-bold text-dark">Especialidad</label>
                                                <select class="form-control form-control-sm" id="especialidad_selector" disabled>
                                                    <option value="{{ $codigoEspecialidadFicha }}" selected>{{ $nombreEspecialidadFicha }}</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="mb-1 font-weight-bold text-dark">Nombre de plantilla</label>
                                                <input type="text"
                                                       class="form-control form-control-sm"
                                                       name="nombre_plantilla"
                                                       id="nombre_plantilla"
                                                       value="{{ old('nombre_plantilla', optional($plantilla)->nombre ?? $nombrePlantillaPredeterminado) }}"
                                                       maxlength="120">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card personalizador-card mb-3">
                            <div class="card-header-principal d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0 f-18 text-c-blue">Secciones visibles en la ficha</h6>
                                    <p class="mb-0 ayuda-texto">Use el interruptor para mostrar u ocultar cada sección de la ficha de {{ $nombreEspecialidadFicha }}.</p>
                                </div>
                                <span class="badge badge-success" id="contador_secciones">0 activas</span>
                            </div>
                            <div class="card-body" id="contenedor_secciones"></div>
                        </div>

                        <div class="card personalizador-card mb-3">
                            <div class="card-header-principal d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1 f-18 titulo-bloque">
                                        <i class="feather icon-dollar-sign mr-1"></i>
                                        Presupuesto, honorarios y control de pagos
                                    </h6>
                                    <p class="mb-0 ayuda-texto">
                                        Configure reglas económicas para los presupuestos odontológicos de esta especialidad.
                                    </p>
                                </div>
                                <span class="badge badge-light-primary">Odontología</span>
                            </div>

                            <div class="card-body">
                                {{-- Monto mínimo --}}
                                <div class="config-presupuesto-card">
                                    <div class="config-presupuesto-card__titulo">
                                        Monto mínimo del presupuesto
                                    </div>
                                    <div class="config-presupuesto-card__descripcion">
                                        Permite advertir o impedir la generación de presupuestos bajo un monto definido por el profesional.
                                    </div>

                                    <div class="custom-control custom-switch">
                                        <input type="checkbox"
                                               class="custom-control-input"
                                               id="cfg_monto_minimo_activo">
                                        <label class="custom-control-label" for="cfg_monto_minimo_activo">
                                            Aplicar monto mínimo
                                        </label>
                                    </div>

                                    <div id="bloque_cfg_monto_minimo" class="config-presupuesto-campo-condicional is-disabled">
                                        <div class="form-row">
                                            <div class="form-group col-md-6 mb-2">
                                                <label class="font-weight-bold text-dark" for="cfg_monto_minimo">
                                                    Monto mínimo ($)
                                                </label>
                                                <input type="number"
                                                       class="form-control form-control-sm"
                                                       id="cfg_monto_minimo"
                                                       min="0"
                                                       step="1"
                                                       placeholder="Ej.: 20000">
                                            </div>

                                            <div class="form-group col-md-6 mb-2">
                                                <label class="font-weight-bold text-dark" for="cfg_monto_minimo_accion">
                                                    Si el presupuesto es menor
                                                </label>
                                                <select class="form-control form-control-sm" id="cfg_monto_minimo_accion">
                                                    <option value="advertir">Mostrar advertencia y permitir continuar</option>
                                                    <option value="bloquear">No permitir generar el presupuesto</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Trabajo odontológico / honorarios --}}
                                <div class="config-presupuesto-card">
                                    <div class="config-presupuesto-card__titulo">
                                        Trabajo odontológico / honorarios profesionales
                                    </div>
                                    <div class="config-presupuesto-card__descripcion">
                                        Permite agregar un valor profesional al presupuesto de manera independiente o asociarlo a una prestación del arancel.
                                    </div>

                                    <div class="custom-control custom-switch">
                                        <input type="checkbox"
                                               class="custom-control-input"
                                               id="cfg_trabajo_odontologico_activo">
                                        <label class="custom-control-label" for="cfg_trabajo_odontologico_activo">
                                            Incorporar valor del trabajo odontológico
                                        </label>
                                    </div>

                                    <div id="bloque_cfg_trabajo_odontologico" class="config-presupuesto-campo-condicional is-disabled">
                                        <div class="form-row mt-3">
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-bold text-dark" for="cfg_trabajo_odontologico_modo">
                                                    Forma de incorporación
                                                </label>
                                                <select class="form-control form-control-sm" id="cfg_trabajo_odontologico_modo">
                                                    <option value="independiente">Valor independiente en el presupuesto</option>
                                                    <option value="arancel">Usar una prestación de la lista de aranceles</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6" id="grupo_cfg_trabajo_valor">
                                                <label class="font-weight-bold text-dark" for="cfg_trabajo_odontologico_valor">
                                                    Valor del trabajo ($)
                                                </label>
                                                <input type="number"
                                                       class="form-control form-control-sm"
                                                       id="cfg_trabajo_odontologico_valor"
                                                       min="0"
                                                       step="1"
                                                       placeholder="Ej.: 15000">
                                            </div>

                                            <div class="form-group col-md-6 d-none" id="grupo_cfg_trabajo_arancel">
                                                <label class="font-weight-bold text-dark" for="cfg_trabajo_odontologico_id_arancel">
                                                    Prestación del arancel
                                                </label>
                                                <select class="form-control form-control-sm" id="cfg_trabajo_odontologico_id_arancel">
                                                    <option value="">Seleccione una prestación</option>
                                                    @if(isset($aranceles) && count($aranceles))
                                                        @foreach($aranceles as $arancel)
                                                            <option value="{{ data_get($arancel, 'id') }}">
                                                                {{ data_get($arancel, 'descripcion', data_get($arancel, 'nombre', 'Prestación #' . data_get($arancel, 'id'))) }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @if(!isset($aranceles) || !count($aranceles))
                                                    <small class="config-presupuesto-help">
                                                        El controlador aún no está enviando la lista de aranceles. Puede dejar esta opción configurada y cargar los aranceles posteriormente.
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Alertas de deuda --}}
                                <div class="config-presupuesto-card">
                                    <div class="config-presupuesto-card__titulo">
                                        Alertas de deuda y avance del tratamiento
                                    </div>
                                    <div class="config-presupuesto-card__descripcion">
                                        Defina cuándo MedSDI debe advertir al profesional si existen saldos pendientes o prestaciones aún no pagadas.
                                    </div>

                                    <div class="config-presupuesto-opciones">
                                        <div class="config-presupuesto-opcion">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox"
                                                       class="custom-control-input"
                                                       id="cfg_alerta_deuda">
                                                <label class="custom-control-label" for="cfg_alerta_deuda">
                                                    Alertar si el paciente mantiene deuda
                                                </label>
                                            </div>
                                            <span class="config-presupuesto-help">
                                                Muestra una advertencia cuando exista saldo pendiente en presupuestos odontológicos.
                                            </span>
                                        </div>

                                        <div class="config-presupuesto-opcion">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox"
                                                       class="custom-control-input"
                                                       id="cfg_alerta_prestacion_no_pagada">
                                                <label class="custom-control-label" for="cfg_alerta_prestacion_no_pagada">
                                                    Alertar por prestación no pagada
                                                </label>
                                            </div>
                                            <span class="config-presupuesto-help">
                                                Advierte antes de trabajar sobre una prestación que todavía no se encuentre pagada.
                                            </span>
                                        </div>

                                        <div class="config-presupuesto-opcion">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox"
                                                       class="custom-control-input"
                                                       id="cfg_alerta_avance_con_deuda">
                                                <label class="custom-control-label" for="cfg_alerta_avance_con_deuda">
                                                    Alertar al avanzar tratamiento con deuda
                                                </label>
                                            </div>
                                            <span class="config-presupuesto-help">
                                                Revisa el saldo cuando una prestación cambia de pendiente a en proceso o finalizada.
                                            </span>
                                        </div>

                                        <div class="config-presupuesto-opcion">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox"
                                                       class="custom-control-input"
                                                       id="cfg_bloquear_avance_con_deuda">
                                                <label class="custom-control-label" for="cfg_bloquear_avance_con_deuda">
                                                    Bloquear avance si existe deuda
                                                </label>
                                            </div>
                                            <span class="config-presupuesto-help">
                                                Si está activo, no permitirá avanzar el tratamiento hasta regularizar el pago.
                                            </span>
                                        </div>
                                    </div>

                                    <div class="alert alert-info py-2 px-3 mt-3 mb-0">
                                        <small>
                                            <i class="feather icon-info mr-1"></i>
                                            Se recomienda utilizar las alertas como advertencia y reservar el bloqueo para los casos en que el profesional realmente lo requiera.
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card personalizador-card mb-3">
                            <div class="card-header-principal">
                                <h6 class="mb-1 f-18 titulo-bloque">Agregar nueva sección</h6>
                                <p class="mb-0 ayuda-texto">Cree una card adicional para la ficha de atención.</p>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="text-dark font-weight-bold" for="nueva_seccion_nombre">Nombre de la sección</label>
                                        <input type="text"
                                               class="form-control form-control-sm"
                                               id="nueva_seccion_nombre"
                                               placeholder="ESCRIBA TÍTULO GENERAL DE LA SECCIÓN">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="text-dark font-weight-bold" for="nueva_seccion_tipo">Contenido principal</label>
                                        <select class="form-control form-control-sm" id="nueva_seccion_tipo">
                                            <option value="textarea">Campo para escribir</option>
                                            <option value="summernote">Editor de texto enriquecido</option>
                                            <option value="imagenes">Adjuntador de imágenes o archivos</option>
                                            <option value="texto_imagenes">Texto e imágenes</option>
                                            <option value="subsecciones">Subsecciones en pestañas</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <div class="custom-control custom-switch mt-2">
                                            <input type="checkbox" class="custom-control-input" id="nueva_seccion_textarea" checked>
                                            <label class="custom-control-label" for="nueva_seccion_textarea">Añadir campo de texto</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="custom-control custom-switch mt-2">
                                            <input type="checkbox" class="custom-control-input" id="nueva_seccion_imagenes">
                                            <label class="custom-control-label" for="nueva_seccion_imagenes">Permitir imágenes</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="custom-control custom-switch mt-2">
                                            <input type="checkbox" class="custom-control-input" id="nueva_seccion_con_subsecciones">
                                            <label class="custom-control-label" for="nueva_seccion_con_subsecciones">Añadir subsecciones</label>
                                        </div>
                                    </div>
                                </div>

                                <div id="bloque_subsecciones_nueva" class="border rounded p-3 mb-3" style="display:none;">
                                    <div class="form-row align-items-end">
                                        <div class="form-group col-md-9 mb-md-0">
                                            <label class="text-dark font-weight-bold" for="nueva_subseccion_temporal">Nombre de la subsección</label>
                                            <input type="text"
                                                   class="form-control form-control-sm"
                                                   id="nueva_subseccion_temporal"
                                                   placeholder="Escriba título de la subsección">
                                        </div>
                                        <div class="form-group col-md-3 mb-0">
                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block" id="btn_agregar_subseccion_temporal">
                                                <i class="feather icon-plus"></i> Agregar
                                            </button>
                                        </div>
                                    </div>
                                    <div id="lista_subsecciones_temporales" class="mt-3"></div>
                                </div>

                                <button type="button" class="btn btn-primary" id="btn_agregar_seccion">
                                    <i class="feather icon-plus"></i> Agregar sección
                                </button>
                            </div>
                        </div>

                        <div class="d-flex flex-column flex-sm-row justify-content-end mb-4">
                            <a href="{{ route('profesional.home') }}" class="btn btn-secondary mr-sm-2 mb-2 mb-sm-0">
                                Cancelar
                            </a>
                            <button type="button" class="btn btn-info" id="btn_guardar_configuracion">
                                <i class="feather icon-save"></i> Guardar personalización
                            </button>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card personalizador-card preview-ficha">
                            <div class="card-header-principal">
                                <h6 class="mb-1 f-20 text-c-blue">Vista previa</h6>
                                <p class="mb-0 ayuda-texto">Representación aproximada de la ficha de {{ $nombreEspecialidadFicha }}.</p>
                            </div>
                            <div class="card-body" id="vista_previa_ficha"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        (function () {
            'use strict';

            let contadorPersonalizados = 1;
            let subseccionesTemporales = [];

            const nombreEspecialidadFicha = @json($nombreEspecialidadFicha);
            const codigoEspecialidadFicha = @json($codigoEspecialidadFicha);
            const nombrePlantillaPredeterminado = @json($nombrePlantillaPredeterminado);
            const idEspecialidadFicha = Number(@json($profesional->id_especialidad ?? 0));
            const idTipoEspecialidadFicha = Number(@json($profesional->id_tipo_especialidad ?? 0));
            const idSubTipoEspecialidadFicha = Number(@json($profesional->id_sub_tipo_especialidad ?? 0));

            /*
             * La estructura base se resuelve en el controlador según la
             * especialidad, tipo y subtipo del profesional autenticado.
             */
            const seccionesPredeterminadas = @json($seccionesBaseFicha);

            /*
             * Plantilla persistida enviada por el controlador.
             * Si no existe, se usan las secciones predeterminadas.
             */
            const plantillaGuardada = @json($plantilla);
            const configuracionPresupuestoPersistida = @json($configuracionPresupuestoFicha);

            function normalizarConfiguracionPresupuesto(valor) {
                if (!valor || typeof valor !== 'object' || Array.isArray(valor)) {
                    valor = {};
                }

                return {
                    monto_minimo_activo: normalizarBooleano(valor.monto_minimo_activo, false),
                    monto_minimo: Number(valor.monto_minimo || 0),
                    monto_minimo_accion: valor.monto_minimo_accion === 'bloquear' ? 'bloquear' : 'advertir',

                    trabajo_odontologico_activo: normalizarBooleano(valor.trabajo_odontologico_activo, false),
                    trabajo_odontologico_modo: valor.trabajo_odontologico_modo === 'arancel' ? 'arancel' : 'independiente',
                    trabajo_odontologico_valor: Number(valor.trabajo_odontologico_valor || 0),
                    trabajo_odontologico_id_arancel: valor.trabajo_odontologico_id_arancel
                        ? String(valor.trabajo_odontologico_id_arancel)
                        : '',

                    alerta_deuda: normalizarBooleano(valor.alerta_deuda, false),
                    alerta_prestacion_no_pagada: normalizarBooleano(valor.alerta_prestacion_no_pagada, false),
                    alerta_avance_con_deuda: normalizarBooleano(valor.alerta_avance_con_deuda, false),
                    bloquear_avance_con_deuda: normalizarBooleano(valor.bloquear_avance_con_deuda, false)
                };
            }

            let configuracionPresupuesto = normalizarConfiguracionPresupuesto(
                configuracionPresupuestoPersistida
            );

            function clonar(valor) {
                return JSON.parse(JSON.stringify(valor));
            }

            function normalizarBooleano(valor, valorPorDefecto) {
                if (valor === null || typeof valor === 'undefined') {
                    return valorPorDefecto;
                }

                return valor === true ||
                    valor === 1 ||
                    valor === '1';
            }

            function normalizarCampos(campos) {
                if (!Array.isArray(campos)) {
                    return [];
                }

                return campos.map(function (campo, indice) {
                    return {
                        id: campo.id || null,
                        codigo: campo.codigo || '',
                        nombre: campo.nombre || 'Campo',
                        visible: normalizarBooleano(campo.visible, true),
                        orden: campo.orden || (indice + 1),
                        tipo: campo.tipo || 'textarea',
                        personalizada: normalizarBooleano(
                            campo.personalizada,
                            false
                        )
                    };
                });
            }

            function normalizarSubsecciones(subsecciones) {
                if (!Array.isArray(subsecciones)) {
                    return [];
                }

                return subsecciones.map(function (subseccion, indice) {
                    return {
                        id: subseccion.id || null,
                        codigo: subseccion.codigo || '',
                        nombre: subseccion.nombre || 'Subsección',
                        visible: normalizarBooleano(
                            subseccion.visible,
                            true
                        ),
                        orden: subseccion.orden || (indice + 1),
                        tipo: subseccion.tipo || 'textarea',
                        personalizada: normalizarBooleano(
                            subseccion.personalizada,
                            false
                        ),
                        campos: normalizarCampos(subseccion.campos)
                    };
                });
            }

            function normalizarSecciones(seccionesGuardadas) {
                if (!Array.isArray(seccionesGuardadas)) {
                    return [];
                }

                return seccionesGuardadas.map(function (seccion, indice) {
                    const esObligatoria = normalizarBooleano(
                        seccion.obligatoria,
                        normalizarBooleano(seccion.obligatorio, false)
                    );

                    return {
                        id: seccion.id || null,
                        codigo: seccion.codigo || '',
                        nombre: seccion.nombre || 'Sección',
                        visible: normalizarBooleano(seccion.visible, true),
                        orden: seccion.orden || (indice + 1),
                        tipo: seccion.tipo || 'campos',
                        obligatoria: esObligatoria,
                        personalizada: normalizarBooleano(
                            seccion.personalizada,
                            false
                        ),
                        permitir_imagenes: normalizarBooleano(
                            seccion.permitir_imagenes,
                            false
                        ),
                        campos: normalizarCampos(seccion.campos),
                        subsecciones: normalizarSubsecciones(
                            seccion.subsecciones
                        )
                    };
                });
            }

            const seccionesBaseNormalizadas = normalizarSecciones(
                seccionesPredeterminadas
            );
            let secciones = clonar(seccionesBaseNormalizadas);

            if (
                plantillaGuardada &&
                Array.isArray(plantillaGuardada.secciones) &&
                plantillaGuardada.secciones.length > 0
            ) {
                secciones = normalizarSecciones(
                    plantillaGuardada.secciones
                );

                seccionesBaseNormalizadas.forEach(function (seccionBase) {
                    const indiceExistente = secciones.findIndex(function (seccion) {
                        return seccion.codigo === seccionBase.codigo;
                    });

                    if (indiceExistente === -1) {
                        const nuevaSeccionBase = clonar(seccionBase);
                        nuevaSeccionBase.orden = secciones.length + 1;
                        secciones.push(nuevaSeccionBase);
                        return;
                    }

                    /*
                     * Mantener la configuración guardada, pero completar con
                     * subsecciones nuevas incorporadas posteriormente en la
                     * plantilla base del servidor.
                     *
                     * Esto evita que una plantilla antigua de Periodoncia o
                     * Endodoncia siga mostrando "0 subsecciones" después de
                     * agregar Odontología General a su estructura base.
                     */
                    const seccionGuardada = secciones[indiceExistente];
                    const subseccionesBase = Array.isArray(seccionBase.subsecciones)
                        ? seccionBase.subsecciones
                        : [];
                    const subseccionesGuardadas = Array.isArray(seccionGuardada.subsecciones)
                        ? seccionGuardada.subsecciones
                        : [];

                    subseccionesBase.forEach(function (subseccionBase) {
                        const indiceSubGuardada = subseccionesGuardadas.findIndex(function (subseccion) {
                            return subseccion.codigo === subseccionBase.codigo;
                        });

                        if (indiceSubGuardada === -1) {
                            const nuevaSubseccion = clonar(subseccionBase);
                            nuevaSubseccion.orden = subseccionesGuardadas.length + 1;
                            subseccionesGuardadas.push(nuevaSubseccion);
                        } else {
                            /*
                             * Conservamos visible/orden guardados, pero recuperamos
                             * nombre, tipo y demás metadatos técnicos de la base.
                             */
                            subseccionesGuardadas[indiceSubGuardada] = Object.assign(
                                {},
                                clonar(subseccionBase),
                                subseccionesGuardadas[indiceSubGuardada],
                                {
                                    codigo: subseccionBase.codigo,
                                    nombre: subseccionBase.nombre,
                                    tipo: subseccionBase.tipo,
                                    personalizada: false
                                }
                            );
                        }
                    });

                    seccionGuardada.subsecciones = subseccionesGuardadas;

                    /*
                     * También actualizamos los metadatos técnicos de la sección,
                     * sin perder visibilidad ni orden elegidos por el profesional.
                     */
                    secciones[indiceExistente] = Object.assign(
                        {},
                        clonar(seccionBase),
                        seccionGuardada,
                        {
                            codigo: seccionBase.codigo,
                            nombre: seccionBase.nombre,
                            tipo: seccionBase.tipo,
                            obligatoria: !!seccionBase.obligatoria,
                            personalizada: false,
                            subsecciones: subseccionesGuardadas
                        }
                    );
                });
            }

            /*
             * Las secciones obligatorias se definen en la configuración base
             * de cada especialidad. Se vuelven a aplicar sobre plantillas
             * antiguas para impedir que una configuración previamente guardada
             * permita desactivarlas.
             */
            const codigosSeccionesObligatorias = seccionesBaseNormalizadas.filter(function (seccion) {
                return seccion.obligatoria;
            }).map(function (seccion) {
                return seccion.codigo;
            });

            secciones.forEach(function (seccion) {
                if (codigosSeccionesObligatorias.indexOf(seccion.codigo) !== -1) {
                    seccion.obligatoria = true;
                    seccion.visible = true;

                    (seccion.subsecciones || []).forEach(function (subseccion) {
                        subseccion.visible = true;
                    });
                }
            });

            function escaparHtml(valor) {
                return String(valor || '')
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#039;');
            }

            function generarCodigo(texto) {
                return String(texto || '')
                    .normalize('NFD')
                    .replace(/[\u0300-\u036f]/g, '')
                    .toLowerCase()
                    .trim()
                    .replace(/[^a-z0-9]+/g, '_')
                    .replace(/^_+|_+$/g, '');
            }

            function renderizarConfiguracion() {
                const contenedor = document.getElementById('contenedor_secciones');
                let html = '';

                secciones.forEach(function (seccion, indice) {
                    const claseInactiva = seccion.visible ? '' : ' seccion-inactiva';
                    const badge = seccion.personalizada
                        ? '<span class="badge badge-info ml-2">Personalizada</span>'
                        : '<span class="badge-tipo ml-2">' + escaparHtml(nombreEspecialidadFicha) + '</span>';

                    html += `
                        <div class="seccion-configurable${claseInactiva}" data-indice="${indice}">
                            <div class="seccion-cabecera d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center flex-grow-1 mr-3" onclick="alternarDetalle(${indice})">
                                    <i class="feather icon-menu mr-2 text-muted"></i>
                                    <div>
                                        <strong>${escaparHtml(seccion.nombre)}</strong>
                                        ${badge}
                                        ${seccion.obligatoria ? '<span class="badge badge-warning ml-1">Obligatoria</span>' : ''}
                                        <div class="ayuda-texto">${Array.isArray(seccion.subsecciones) ? seccion.subsecciones.length : 0} subsección(es)</div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    ${seccion.personalizada ? `
                                        <button type="button" class="btn btn-outline-danger btn-icono btn-sm mr-2" onclick="eliminarSeccion(${indice})" title="Eliminar sección">
                                            <i class="feather icon-trash-2"></i>
                                        </button>
                                    ` : ''}

                                    <label class="switch-personalizado" title="Mostrar u ocultar sección">
                                        <input type="checkbox"
                                               ${seccion.visible ? 'checked' : ''}
                                               ${seccion.obligatoria ? 'disabled' : ''}
                                               onchange="cambiarVisibilidadSeccion(${indice}, this.checked)">
                                        <span class="switch-slider"></span>
                                    </label>

                                    <button type="button" class="btn btn-link btn-sm ml-1 p-1" onclick="alternarDetalle(${indice})">
                                        <i class="feather icon-chevron-down"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="seccion-detalle">
                                <div class="pt-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <strong class="text-secondary">Subsecciones</strong>
                                        <small class="text-muted">Active solamente las que utilizará.</small>
                                    </div>

                                    <div id="subsecciones_${indice}">
                                        ${renderizarSubsecciones(seccion, indice)}
                                    </div>

                                    <div class="border-top pt-3 mt-3">
                                        <label class="mb-1">Nueva subsección</label>
                                        <div class="input-group input-group-sm">
                                            <input type="text"
                                                   class="form-control"
                                                   id="nueva_subseccion_${indice}"
                                                   placeholder="Ej.: Audiometría, pruebas vestibulares...">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-outline-primary" onclick="agregarSubseccion(${indice})">
                                                    <i class="feather icon-plus"></i> Agregar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });

                contenedor.innerHTML = html;
                actualizarContador();
                renderizarVistaPrevia();
                sincronizarConfiguracion();
            }

            function renderizarSubsecciones(seccion, indiceSeccion) {
                if (!Array.isArray(seccion.subsecciones)) {
                    seccion.subsecciones = [];
                }

                if (seccion.obligatoria) {
                    seccion.subsecciones.forEach(function (subseccion) {
                        subseccion.visible = true;
                    });
                }

                if (!seccion.subsecciones.length) {
                    return '<p class="text-muted mb-0">Esta sección todavía no tiene subsecciones.</p>';
                }

                return seccion.subsecciones.map(function (subseccion, indiceSubseccion) {
                    return `
                        <div class="subseccion-item">
                            <div>
                                <strong>${escaparHtml(subseccion.nombre)}</strong>
                                <span class="badge-tipo ml-1">${escaparHtml(subseccion.tipo || 'textarea')}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                ${subseccion.personalizada ? `
                                    <button type="button"
                                            class="btn btn-link text-danger btn-sm mr-1"
                                            onclick="eliminarSubseccion(${indiceSeccion}, ${indiceSubseccion})"
                                            title="Eliminar subsección">
                                        <i class="feather icon-trash-2"></i>
                                    </button>
                                ` : ''}
                                <label class="switch-personalizado">
                                    <input type="checkbox"
                                           ${subseccion.visible ? 'checked' : ''}
                                           ${seccion.obligatoria ? 'disabled' : ''}
                                           onchange="cambiarVisibilidadSubseccion(${indiceSeccion}, ${indiceSubseccion}, this.checked)">
                                    <span class="switch-slider"></span>
                                </label>
                            </div>
                        </div>
                    `;
                }).join('');
            }

            function renderizarVistaPrevia() {
                const contenedor = document.getElementById('vista_previa_ficha');
                const visibles = secciones.filter(function (seccion) {
                    return seccion.visible;
                });

                if (!visibles.length) {
                    contenedor.innerHTML = '<div class="alert alert-warning mb-0">No hay secciones visibles.</div>';
                    return;
                }

                let html = `
                    <div class="mb-3">
                        <small class="text-c-blue font-weight-bold">Plantilla</small>
                        <h6 class="mb-0 f-16 text-dark">${escaparHtml(document.getElementById('nombre_plantilla').value || nombrePlantillaPredeterminado)}</h6>
                    </div>
                `;

                visibles.forEach(function (seccion) {
                    const subsVisibles = (
                        Array.isArray(seccion.subsecciones)
                            ? seccion.subsecciones
                            : []
                    ).filter(function (sub) {
                        return sub.visible;
                    });

                    html += `
                        <div class="preview-seccion">
                            <div class="preview-seccion-titulo">${escaparHtml(seccion.nombre)}</div>
                            <div class="preview-seccion-cuerpo">
                    `;

                    if (!subsVisibles.length) {
                        html += '<small class="text-muted">Sin subsecciones visibles.</small>';
                    } else if (seccion.tipo === 'tabs' || seccion.tipo === 'subsecciones') {
                        html += '<div class="preview-tabs">';
                        subsVisibles.forEach(function (sub) {
                            html += `<div class="preview-tab">${escaparHtml(sub.nombre)}</div>`;
                        });
                        html += '</div><div class="preview-campo"></div>';
                    } else if (seccion.tipo === 'switches') {
                        subsVisibles.forEach(function (sub) {
                            html += `
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge badge-secondary mr-2">●</span>
                                    <small>${escaparHtml(sub.nombre)}</small>
                                </div>
                            `;
                        });
                    } else {
                        subsVisibles.forEach(function (sub) {
                            html += `
                                <small class="d-block mt-2">${escaparHtml(sub.nombre)}</small>
                                <div class="preview-campo"></div>
                            `;
                        });
                    }

                    if (seccion.permitir_imagenes) {
                        html += '<div class="mt-2 p-2 border rounded text-center text-muted"><i class="feather icon-image"></i> Adjuntar imágenes</div>';
                    }

                    html += '</div></div>';
                });

                contenedor.innerHTML = html;
            }

            function actualizarContador() {
                const total = secciones.filter(function (seccion) {
                    return seccion.visible;
                }).length;

                document.getElementById('contador_secciones').textContent = total + ' activa' + (total === 1 ? '' : 's');
            }

            function aplicarConfiguracionPresupuestoFormulario() {
                const setChecked = function (id, valor) {
                    const elemento = document.getElementById(id);
                    if (elemento) elemento.checked = Boolean(valor);
                };

                const setValue = function (id, valor) {
                    const elemento = document.getElementById(id);
                    if (elemento) elemento.value = valor ?? '';
                };

                setChecked('cfg_monto_minimo_activo', configuracionPresupuesto.monto_minimo_activo);
                setValue('cfg_monto_minimo', configuracionPresupuesto.monto_minimo || '');
                setValue('cfg_monto_minimo_accion', configuracionPresupuesto.monto_minimo_accion || 'advertir');

                setChecked('cfg_trabajo_odontologico_activo', configuracionPresupuesto.trabajo_odontologico_activo);
                setValue('cfg_trabajo_odontologico_modo', configuracionPresupuesto.trabajo_odontologico_modo || 'independiente');
                setValue('cfg_trabajo_odontologico_valor', configuracionPresupuesto.trabajo_odontologico_valor || '');
                setValue('cfg_trabajo_odontologico_id_arancel', configuracionPresupuesto.trabajo_odontologico_id_arancel || '');

                setChecked('cfg_alerta_deuda', configuracionPresupuesto.alerta_deuda);
                setChecked('cfg_alerta_prestacion_no_pagada', configuracionPresupuesto.alerta_prestacion_no_pagada);
                setChecked('cfg_alerta_avance_con_deuda', configuracionPresupuesto.alerta_avance_con_deuda);
                setChecked('cfg_bloquear_avance_con_deuda', configuracionPresupuesto.bloquear_avance_con_deuda);

                actualizarEstadoControlesPresupuesto();
            }

            function obtenerConfiguracionPresupuestoDesdeFormulario() {
                const checked = function (id) {
                    const elemento = document.getElementById(id);
                    return elemento ? elemento.checked : false;
                };

                const value = function (id) {
                    const elemento = document.getElementById(id);
                    return elemento ? elemento.value : '';
                };

                return normalizarConfiguracionPresupuesto({
                    monto_minimo_activo: checked('cfg_monto_minimo_activo'),
                    monto_minimo: Number(value('cfg_monto_minimo') || 0),
                    monto_minimo_accion: value('cfg_monto_minimo_accion') || 'advertir',

                    trabajo_odontologico_activo: checked('cfg_trabajo_odontologico_activo'),
                    trabajo_odontologico_modo: value('cfg_trabajo_odontologico_modo') || 'independiente',
                    trabajo_odontologico_valor: Number(value('cfg_trabajo_odontologico_valor') || 0),
                    trabajo_odontologico_id_arancel: value('cfg_trabajo_odontologico_id_arancel') || '',

                    alerta_deuda: checked('cfg_alerta_deuda'),
                    alerta_prestacion_no_pagada: checked('cfg_alerta_prestacion_no_pagada'),
                    alerta_avance_con_deuda: checked('cfg_alerta_avance_con_deuda'),
                    bloquear_avance_con_deuda: checked('cfg_bloquear_avance_con_deuda')
                });
            }

            function actualizarEstadoControlesPresupuesto() {
                const montoActivo = document.getElementById('cfg_monto_minimo_activo')?.checked;
                const trabajoActivo = document.getElementById('cfg_trabajo_odontologico_activo')?.checked;
                const modoTrabajo = document.getElementById('cfg_trabajo_odontologico_modo')?.value || 'independiente';

                const bloqueMonto = document.getElementById('bloque_cfg_monto_minimo');
                const bloqueTrabajo = document.getElementById('bloque_cfg_trabajo_odontologico');
                const grupoValor = document.getElementById('grupo_cfg_trabajo_valor');
                const grupoArancel = document.getElementById('grupo_cfg_trabajo_arancel');

                if (bloqueMonto) {
                    bloqueMonto.classList.toggle('is-disabled', !montoActivo);
                }

                if (bloqueTrabajo) {
                    bloqueTrabajo.classList.toggle('is-disabled', !trabajoActivo);
                }

                if (grupoValor) {
                    grupoValor.classList.toggle('d-none', modoTrabajo !== 'independiente');
                }

                if (grupoArancel) {
                    grupoArancel.classList.toggle('d-none', modoTrabajo !== 'arancel');
                }
            }

            function validarConfiguracionPresupuesto() {
                configuracionPresupuesto = obtenerConfiguracionPresupuestoDesdeFormulario();

                if (
                    configuracionPresupuesto.monto_minimo_activo &&
                    configuracionPresupuesto.monto_minimo <= 0
                ) {
                    swal({
                        title: 'Monto mínimo',
                        text: 'Ingrese un monto mínimo mayor a $0 o desactive esta opción.',
                        icon: 'warning'
                    });

                    document.getElementById('cfg_monto_minimo')?.focus();
                    return false;
                }

                if (
                    configuracionPresupuesto.trabajo_odontologico_activo &&
                    configuracionPresupuesto.trabajo_odontologico_modo === 'independiente' &&
                    configuracionPresupuesto.trabajo_odontologico_valor <= 0
                ) {
                    swal({
                        title: 'Trabajo odontológico',
                        text: 'Ingrese el valor del trabajo odontológico o seleccione la modalidad de arancel.',
                        icon: 'warning'
                    });

                    document.getElementById('cfg_trabajo_odontologico_valor')?.focus();
                    return false;
                }

                if (
                    configuracionPresupuesto.trabajo_odontologico_activo &&
                    configuracionPresupuesto.trabajo_odontologico_modo === 'arancel' &&
                    !configuracionPresupuesto.trabajo_odontologico_id_arancel
                ) {
                    swal({
                        title: 'Prestación del arancel',
                        text: 'Seleccione la prestación que representará el trabajo odontológico.',
                        icon: 'warning'
                    });

                    document.getElementById('cfg_trabajo_odontologico_id_arancel')?.focus();
                    return false;
                }

                return true;
            }

            function sincronizarConfiguracion() {
                configuracionPresupuesto = obtenerConfiguracionPresupuestoDesdeFormulario();

                secciones.forEach(function (seccion) {
                    if (!seccion.obligatoria) {
                        return;
                    }

                    seccion.visible = true;
                    (seccion.subsecciones || []).forEach(function (subseccion) {
                        subseccion.visible = true;
                    });
                });

                const configuracion = {
                    especialidad: codigoEspecialidadFicha,
                    id_especialidad: idEspecialidadFicha,
                    id_tipo_especialidad: idTipoEspecialidadFicha,
                    id_sub_tipo_especialidad: idSubTipoEspecialidadFicha,
                    nombre_plantilla: document.getElementById('nombre_plantilla').value,
                    secciones: secciones,
                    configuracion_presupuesto: configuracionPresupuesto
                };

                document.getElementById('configuracion_ficha').value = JSON.stringify(configuracion);
            }

            window.alternarDetalle = function (indice) {
                const elemento = document.querySelector('.seccion-configurable[data-indice="' + indice + '"]');
                if (elemento) {
                    elemento.classList.toggle('abierta');
                }
            };

            window.cambiarVisibilidadSeccion = function (indice, visible) {
                if (secciones[indice].obligatoria) {
                    secciones[indice].visible = true;
                    renderizarConfiguracion();
                    return;
                }

                secciones[indice].visible = visible;
                renderizarConfiguracion();
            };

            window.cambiarVisibilidadSubseccion = function (indiceSeccion, indiceSubseccion, visible) {
                if (secciones[indiceSeccion].obligatoria) {
                    secciones[indiceSeccion].subsecciones[indiceSubseccion].visible = true;
                    renderizarConfiguracion();
                    return;
                }

                secciones[indiceSeccion].subsecciones[indiceSubseccion].visible = visible;
                renderizarVistaPrevia();
                sincronizarConfiguracion();
            };

            window.agregarSubseccion = function (indiceSeccion) {
                const input = document.getElementById('nueva_subseccion_' + indiceSeccion);
                const nombre = input.value.trim();

                if (!nombre) {
                    swal({
                        title: 'Subsección',
                        text: 'Ingrese un nombre para la nueva subsección.',
                        icon: 'warning'
                    });
                    input.focus();
                    return;
                }

                secciones[indiceSeccion].subsecciones.push({
                    codigo: generarCodigo(nombre) + '_' + Date.now(),
                    nombre: nombre,
                    visible: true,
                    tipo: 'textarea',
                    personalizada: true
                });

                renderizarConfiguracion();

                setTimeout(function () {
                    const tarjeta = document.querySelector('.seccion-configurable[data-indice="' + indiceSeccion + '"]');
                    if (tarjeta) {
                        tarjeta.classList.add('abierta');
                    }
                }, 0);
            };

            window.eliminarSubseccion = function (indiceSeccion, indiceSubseccion) {
                swal({
                    title: '¿Eliminar subsección?',
                    text: 'La subsección personalizada será retirada de esta plantilla.',
                    icon: 'warning',
                    buttons: ['Cancelar', 'Eliminar'],
                    dangerMode: true
                }).then(function (confirmado) {
                    if (!confirmado) return;
                    secciones[indiceSeccion].subsecciones.splice(indiceSubseccion, 1);
                    renderizarConfiguracion();
                });
            };

            window.eliminarSeccion = function (indice) {
                swal({
                    title: '¿Eliminar sección?',
                    text: 'La sección personalizada y sus subsecciones serán retiradas.',
                    icon: 'warning',
                    buttons: ['Cancelar', 'Eliminar'],
                    dangerMode: true
                }).then(function (confirmado) {
                    if (!confirmado) return;
                    secciones.splice(indice, 1);
                    renderizarConfiguracion();
                });
            };

            document.getElementById('nueva_seccion_con_subsecciones').addEventListener('change', function () {
                document.getElementById('bloque_subsecciones_nueva').style.display = this.checked ? 'block' : 'none';
            });

            document.getElementById('btn_agregar_subseccion_temporal').addEventListener('click', function () {
                const input = document.getElementById('nueva_subseccion_temporal');
                const nombre = input.value.trim();

                if (!nombre) {
                    input.focus();
                    return;
                }

                subseccionesTemporales.push({
                    codigo: generarCodigo(nombre) + '_' + Date.now(),
                    nombre: nombre,
                    visible: true,
                    tipo: 'textarea',
                    personalizada: true
                });

                input.value = '';
                renderizarSubseccionesTemporales();
            });

            function renderizarSubseccionesTemporales() {
                const contenedor = document.getElementById('lista_subsecciones_temporales');

                contenedor.innerHTML = subseccionesTemporales.map(function (sub, indice) {
                    return `
                        <div class="subseccion-item">
                            <span>${escaparHtml(sub.nombre)}</span>
                            <button type="button" class="btn btn-link text-danger btn-sm" onclick="quitarSubseccionTemporal(${indice})">
                                <i class="feather icon-x"></i>
                            </button>
                        </div>
                    `;
                }).join('');
            }

            window.quitarSubseccionTemporal = function (indice) {
                subseccionesTemporales.splice(indice, 1);
                renderizarSubseccionesTemporales();
            };

            document.getElementById('btn_agregar_seccion').addEventListener('click', function () {
                const nombre = document.getElementById('nueva_seccion_nombre').value.trim();
                const tipo = document.getElementById('nueva_seccion_tipo').value;
                const texto = document.getElementById('nueva_seccion_textarea').checked;
                const imagenes = document.getElementById('nueva_seccion_imagenes').checked;
                const conSubsecciones = document.getElementById('nueva_seccion_con_subsecciones').checked;

                if (!nombre) {
                    swal({
                        title: 'Nueva sección',
                        text: 'Ingrese el nombre de la nueva sección.',
                        icon: 'warning'
                    });
                    document.getElementById('nueva_seccion_nombre').focus();
                    return;
                }

                const nuevasSubsecciones = conSubsecciones && subseccionesTemporales.length
                    ? JSON.parse(JSON.stringify(subseccionesTemporales))
                    : (texto ? [{
                        codigo: 'contenido_' + contadorPersonalizados,
                        nombre: 'Descripción',
                        visible: true,
                        tipo: tipo === 'summernote' ? 'summernote' : 'textarea',
                        personalizada: true
                    }] : []);

                secciones.push({
                    codigo: generarCodigo(nombre) + '_' + contadorPersonalizados++,
                    nombre: nombre,
                    visible: true,
                    tipo: conSubsecciones ? 'subsecciones' : tipo,
                    personalizada: true,
                    permitir_imagenes: imagenes || tipo === 'imagenes' || tipo === 'texto_imagenes',
                    subsecciones: nuevasSubsecciones
                });

                document.getElementById('nueva_seccion_nombre').value = '';
                document.getElementById('nueva_seccion_tipo').value = 'textarea';
                document.getElementById('nueva_seccion_textarea').checked = true;
                document.getElementById('nueva_seccion_imagenes').checked = false;
                document.getElementById('nueva_seccion_con_subsecciones').checked = false;
                document.getElementById('bloque_subsecciones_nueva').style.display = 'none';
                subseccionesTemporales = [];
                renderizarSubseccionesTemporales();
                renderizarConfiguracion();
            });

            document.getElementById('nombre_plantilla').addEventListener('input', function () {
                renderizarVistaPrevia();
                sincronizarConfiguracion();
            });

            document.getElementById('btn_guardar_configuracion').addEventListener('click', function () {
                guardarConfiguracionFicha();
            });

            function guardarConfiguracionFicha() {
    sincronizarConfiguracion();

    const form = document.getElementById('form_personalizacion_ficha');
    const boton = document.getElementById('btn_guardar_configuracion');
    const action = form.getAttribute('action');

    const idEspecialidad = document.getElementById('id_especialidad').value;
    const nombrePlantilla = document.getElementById('nombre_plantilla').value.trim();

    if (!action || action === '#') {
        swal({
            title: 'Ruta no configurada',
            text: 'No se encontró la ruta para guardar la personalización.',
            icon: 'warning'
        });

        return;
    }

    if (!idEspecialidad) {
        swal({
            title: 'Especialidad',
            text: 'No se pudo determinar la especialidad del profesional.',
            icon: 'warning'
        });

        return;
    }

    if (!nombrePlantilla) {
        swal({
            title: 'Nombre de plantilla',
            text: 'Ingrese un nombre para la plantilla.',
            icon: 'warning'
        });

        document.getElementById('nombre_plantilla').focus();
        return;
    }

    if (!validarConfiguracionPresupuesto()) {
        return;
    }

    if (!Array.isArray(secciones) || secciones.length === 0) {
        swal({
            title: 'Plantilla vacía',
            text: 'La plantilla debe contener al menos una sección.',
            icon: 'warning'
        });

        return;
    }

    /*
     * Se prepara la estructura exacta que espera el controlador.
     */
    const seccionesPreparadas = secciones.map(function (seccion, indiceSeccion) {
        return {
            codigo: seccion.codigo || null,
            nombre: seccion.nombre,
            visible: seccion.obligatoria ? true : Boolean(seccion.visible),
            obligatoria: Boolean(seccion.obligatoria),
            orden: indiceSeccion + 1,
            tipo: seccion.tipo || null,
            personalizada: Boolean(seccion.personalizada),
            permitir_imagenes: Boolean(seccion.permitir_imagenes),

            campos: Array.isArray(seccion.campos)
                ? seccion.campos.map(function (campo, indiceCampo) {
                    return {
                        codigo: campo.codigo || null,
                        nombre: campo.nombre || 'Campo',
                        tipo: campo.tipo || 'textarea',
                        visible: campo.visible !== false,
                        orden: indiceCampo + 1
                    };
                })
                : [],

            subsecciones: Array.isArray(seccion.subsecciones)
                ? seccion.subsecciones.map(function (subseccion, indiceSubseccion) {
                    return {
                        codigo: subseccion.codigo || null,
                        nombre: subseccion.nombre,
                        visible: seccion.obligatoria
                            ? true
                            : subseccion.visible !== false,
                        orden: indiceSubseccion + 1,
                        tipo: subseccion.tipo || 'textarea',
                        personalizada: Boolean(subseccion.personalizada),

                        campos: Array.isArray(subseccion.campos)
                            ? subseccion.campos.map(function (campo, indiceCampo) {
                                return {
                                    codigo: campo.codigo || null,
                                    nombre: campo.nombre || 'Campo',
                                    tipo: campo.tipo || 'textarea',
                                    visible: campo.visible !== false,
                                    orden: indiceCampo + 1
                                };
                            })
                            : []
                    };
                })
                : []
        };
    });

    const payload = {
        id_especialidad: parseInt(idEspecialidad, 10),
        id_tipo_especialidad: idTipoEspecialidadFicha,
        id_sub_tipo_especialidad: idSubTipoEspecialidadFicha,
        nombre: nombrePlantilla,
        secciones: seccionesPreparadas,
        configuracion_presupuesto: configuracionPresupuesto
    };

    const textoOriginal = boton.innerHTML;

    boton.disabled = true;
    boton.innerHTML =
        '<span class="spinner-border spinner-border-sm mr-1" ' +
        'role="status" aria-hidden="true"></span> Guardando...';

    fetch(action, {
        method: 'POST',
        credentials: 'same-origin',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector(
                'input[name="_token"]'
            ).value
        },
        body: JSON.stringify(payload)
    })
    .then(async function (response) {
        let data = {};

        try {
            data = await response.json();
        } catch (error) {
            data = {};
        }

        if (response.status === 401 || response.status === 419) {
            throw {
                tipo: 'sesion',
                mensaje: 'Su sesión expiró. Ingrese nuevamente.'
            };
        }

        if (response.status === 422) {
            /*
             * El controlador devuelve la colección bajo la clave "errores".
             */
            const errores = data.errores || data.errors || {};
            let primerError = null;

            Object.keys(errores).some(function (campo) {
                if (
                    Array.isArray(errores[campo]) &&
                    errores[campo].length > 0
                ) {
                    primerError = errores[campo][0];
                    return true;
                }

                return false;
            });

            throw {
                tipo: 'validacion',
                mensaje: primerError ||
                    data.mensaje ||
                    'Revise los datos enviados.'
            };
        }

        if (!response.ok || data.estado === 0) {
            throw {
                tipo: 'servidor',
                mensaje: data.mensaje ||
                    data.detalle ||
                    'No fue posible guardar la plantilla.'
            };
        }

        return data;
    })
    .then(function (data) {
        console.log(data);
        /*
         * Se actualizan las secciones locales con la respuesta persistida,
         * cuando el controlador las devuelve.
         */
        if (Array.isArray(data.secciones)) {
            secciones = normalizarSecciones(data.secciones);

            if (
                data.plantilla &&
                data.plantilla.nombre
            ) {
                document.getElementById(
                    'nombre_plantilla'
                ).value = data.plantilla.nombre;
            }

            renderizarConfiguracion();
        }

        if (data.configuracion_presupuesto) {
            configuracionPresupuesto = normalizarConfiguracionPresupuesto(
                data.configuracion_presupuesto
            );
            aplicarConfiguracionPresupuestoFormulario();
        }

        swal({
            title: 'Plantilla guardada',
            text: data.mensaje ||
                'La personalización fue guardada correctamente.',
            icon: 'success'
        });
    })
    .catch(function (error) {
        console.error('Error al guardar plantilla:', error);

        swal({
            title: error.tipo === 'sesion'
                ? 'Sesión expirada'
                : 'No se pudo guardar',
            text: error.mensaje ||
                'Ocurrió un error inesperado.',
            icon: 'error'
        }).then(function () {
            if (error.tipo === 'sesion') {
                window.location.reload();
            }
        });
    })
    .finally(function () {
        boton.disabled = false;
        boton.innerHTML = textoOriginal;
    });
}

            [
                'cfg_monto_minimo_activo',
                'cfg_monto_minimo',
                'cfg_monto_minimo_accion',
                'cfg_trabajo_odontologico_activo',
                'cfg_trabajo_odontologico_modo',
                'cfg_trabajo_odontologico_valor',
                'cfg_trabajo_odontologico_id_arancel',
                'cfg_alerta_deuda',
                'cfg_alerta_prestacion_no_pagada',
                'cfg_alerta_avance_con_deuda',
                'cfg_bloquear_avance_con_deuda'
            ].forEach(function (id) {
                const elemento = document.getElementById(id);

                if (!elemento) {
                    return;
                }

                elemento.addEventListener('change', function () {
                    actualizarEstadoControlesPresupuesto();
                    sincronizarConfiguracion();
                });

                if (elemento.tagName === 'INPUT') {
                    elemento.addEventListener('input', function () {
                        sincronizarConfiguracion();
                    });
                }
            });

            aplicarConfiguracionPresupuestoFormulario();
            renderizarConfiguracion();
        })();
    </script>
@endsection
