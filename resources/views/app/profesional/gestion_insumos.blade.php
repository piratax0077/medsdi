@extends('template.profesional.template')
@section('content')

    <style>
        /* Buscador con ícono dentro del input */
        .input-buscador {
            position: relative;
        }

        .input-buscador > i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 17px;
            color: #1a49a3;
            pointer-events: none;
        }

        .input-buscador .form-control {
            padding-left: 42px;
        }

        .input-buscador .form-control::placeholder {
            color: #b9c1d1;
        }

        /* ==========================================================
           FOCUS UNIFICADO
           ========================================================== */
        .pcoded-content .form-control:focus,
        .modal .form-control:focus,
        .pcoded-content .custom-select:focus,
        .modal .custom-select:focus {
            border-color: #1a49a3;
            box-shadow: 0 0 0 .18rem rgba(26, 73, 163, .18);
        }

        /* select2 con el mismo tratamiento */
        .select2-container--default.select2-container--focus .select2-selection--multiple,
        .select2-container--default.select2-container--open .select2-selection--multiple,
        .select2-container--default.select2-container--focus .select2-selection--single,
        .select2-container--default.select2-container--open .select2-selection--single {
            border-color: #1a49a3;
            box-shadow: 0 0 0 .18rem rgba(26, 73, 163, .18);
        }

        /* Borde izquierdo de acento para las cards superiores.
           Se aplica junto a .card -> class="card card-acento acento-azul" */
        .card-acento {
            border-left: 3px solid transparent;
        }

        .card-acento.acento-azul    { border-left-color: #1a49a3; }
        .card-acento.acento-danger  { border-left-color: #ff5252; }
        .card-acento.acento-warning { border-left-color: #e8a334; }
        .card-acento.acento-info    { border-left-color: #31bebe; }

        /* Tiles de resumen del inventario */
        .tile-resumen {
            display: flex;
            align-items: center;
            gap: 14px;
            height: 100%;
            padding: 16px 18px;
            border: 1px solid #edf0f5;
            border-left: 3px solid transparent;
            border-radius: 8px;
            background: #fff;
            transition: box-shadow .2s ease, transform .2s ease;
        }

        .tile-resumen:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 14px rgba(26, 73, 163, .08);
        }

        /* Variante plana: fondo celeste, sin bordes ni efecto hover.
           Se aplica junto a .tile-resumen -> class="tile-resumen tile-plana" */
        .tile-resumen.tile-plana {
            background: #f3f8fd;
            border: none;
        }

        .tile-resumen.tile-plana:hover {
            transform: none;
            box-shadow: none;
        }

        .tile-icono {
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 42px;
            width: 42px;
            height: 42px;
            border-radius: 10px;
            font-size: 19px;
        }

        .tile-label {
            margin-bottom: 2px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: .4px;
            text-transform: uppercase;
            color: #9aa4b8;
            line-height: 1.3;
        }

        .tile-valor {
            margin-bottom: 0;
            font-weight: 700;
            font-size: 19px;
            color: #2b3445;
        }

        .tile-azul   { border-left-color: #1a49a3; }
        .tile-azul   .tile-icono { background: rgba(26, 73, 163, .10); color: #1a49a3; }

        .tile-morado { border-left-color: #7759de; }
        .tile-morado .tile-icono { background: rgba(119, 89, 222, .10); color: #7759de; }

        .tile-verde  { border-left-color: #2ca87f; }
        .tile-verde  .tile-icono { background: rgba(44, 168, 127, .10); color: #2ca87f; }

        .tile-rojo   { border-left-color: #e2445c; }
        .tile-rojo   .tile-icono { background: rgba(226, 68, 92, .10); color: #e2445c; }
    </style>

    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="page-header-title">
                            </div>
                            <ul class="breadcrumb mt-3">
                                <li class="breadcrumb-item">
                               
                                        <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>
                                 
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.configuracion') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a panel de configuración">
                                        Panel de Configuración
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Gestión de insumos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            @if(session('success'))
                <div class="alert alert-success"><i class="feather icon-check-circle mr-2"></i>{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>No fue posible guardar el insumo.</strong>
                    <ul class="mb-0 mt-1">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif
            <div class="row mb-3">
                <div class="col-sm-6 col-md-6 col-lg-3 col-xl mb-2">
                    <div class="card py-2 mb-0 card-acento acento-info">
                        <div class="card-body py-2 px-3 d-flex align-items-center">
                            <i class="feather icon-package f-24 text-info mr-3"></i>
                            <div>
                                <h6 class="text-info mb-0 f-14">PRODUCTOS</h6>
                                <h5 class="f-w-700 f-26 mb-0">{{ number_format($resumen['stock_total'], 0, ',', '.') }}</h5>
                                <p class="text-muted mb-0 f-12">{{ $resumen['productos'] }} productos activos</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 col-xl mb-2">
                    <div class="card py-2 mb-0 card-acento acento-danger">
                        <div class="card-body py-2 px-3 d-flex align-items-center">
                            <i class="feather icon-trending-down f-24 text-danger mr-3"></i>
                            <div>
                                <h6 class="text-danger mb-0 f-14">BAJO STOCK</h6>
                                <h5 class="f-w-700 f-26 mb-0">{{ $resumen['bajo_stock'] }}</h5>
                                <p class="text-muted mb-0 f-12">Requieren compra</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 col-xl mb-2">
                    <div class="card py-2 mb-0 card-acento acento-warning">
                        <div class="card-body py-2 px-3 d-flex align-items-center">
                            <i class="feather icon-clock f-24 text-warning mr-3"></i>
                            <div>
                                <h6 class="text-warning mb-0 f-14">POR VENCER</h6>
                                <h5 class="f-w-700 f-26 mb-0">{{ $resumen['por_vencer'] }}</h5>
                                <p class="text-muted mb-0 f-12">En stock</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 col-xl mb-2">
                    <div class="card py-2 mb-0 card-acento acento-danger">
                        <div class="card-body py-2 px-3 d-flex align-items-center">
                            <i class="feather icon-alert-triangle f-24 text-danger mr-3"></i>
                            <div>
                                <h6 class="text-danger mb-0 f-14">VENCIDOS</h6>
                                <h5 class="f-w-700 f-26 mb-0">{{ $resumen['vencidos'] }}</h5>
                                <p class="text-muted mb-0 f-12">Dar de baja</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--PILL-->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <div class="card py-0">
                        <div class="card-body pb-2 pt-2">
                            <ul class="nav nav-tabs-aten nav-fill" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="inventario-dental-tab" data-toggle="pill" href="#inventario-dental" role="tab" aria-controls="inventario-dental" aria-selected="true">
                                        Inventario
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="insumo-dental-tab" data-toggle="pill" href="#insumo-dental" role="tab" aria-controls="insumo-dental" aria-selected="false">
                                        Insumos
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="movimientos-dental-tab" data-toggle="pill" href="#movimientos-dental" role="tab" aria-controls="movimientos-dental" aria-selected="false">
                                       Movimientos
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="vencimientos-dental-tab" data-toggle="pill" href="#vencimientos-dental" role="tab" aria-controls="vencimientos-dental" aria-selected="false">
                                       Vencimientos
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="proveedores-dental-tab" data-toggle="pill" href="#proveedores-dental" role="tab" aria-controls="proveedores-dental" aria-selected="false">
                                       Proveedores
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                <div class="tab-content">
                    <!--Inventario-->
                    <div class="tab-pane show active" id="inventario-dental" role="tabpanel" aria-labelledby="inventario-dental-tab">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header-principal bg-white">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7 pl-0">
                                                    <h5 class="f-20 d-inline">
                                                        <i class="feather icon-clipboard icono-primary"></i>
                                                        Inventario Valorizado
                                                    </h5>
                                                </div>
                                                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 text-md-right mt-2 mt-md-0 pr-0">
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nueva_toma_inventario">
                                                        <i class="feather icon-check-square"></i> Toma de Inventario
                                                    </button>
                                                    <button type="button" class="btn btn-light">
                                                        <i class="feather icon-download"></i> Exportar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!--Resumen valorizado-->
                                        <div class="row mb-4">
                                            <div class="col-sm-6 col-md-3 mb-2">
                                                <div class="tile-resumen tile-plana tile-azul">
                                                    <div class="tile-icono">
                                                        <i class="feather icon-credit-card"></i>
                                                    </div>
                                                    <div>
                                                        <p class="tile-label">Valor total del stock</p>
                                                        <h5 class="tile-valor">$ 4.382.500</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3 mb-2">
                                                <div class="tile-resumen tile-plana tile-morado">
                                                    <div class="tile-icono">
                                                        <i class="feather icon-grid"></i>
                                                    </div>
                                                    <div>
                                                        <p class="tile-label">Categorías</p>
                                                        <h5 class="tile-valor">8</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3 mb-2">
                                                <div class="tile-resumen tile-plana tile-verde">
                                                    <div class="tile-icono">
                                                        <i class="feather icon-check-square"></i>
                                                    </div>
                                                    <div>
                                                        <p class="tile-label">Última toma de inventario</p>
                                                        <h5 class="tile-valor">01/08/2026</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3 mb-2">
                                                <div class="tile-resumen tile-plana tile-rojo">
                                                    <div class="tile-icono">
                                                        <i class="feather icon-alert-circle"></i>
                                                    </div>
                                                    <div>
                                                        <p class="tile-label">Diferencias detectadas</p>
                                                        <h5 class="tile-valor text-danger">3</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Filtros-->
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-12 col-md-4 mb-2 mb-md-0">
                                                <div class="input-buscador">
                                                    <i class="feather icon-search"></i>
                                                    <input type="text" id="filtro_inv_busqueda" class="form-control" placeholder="Buscar código, producto...">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md mb-2 mb-md-0">
                                                <select id="filtro_inv_categoria" class="form-control">
                                                    <option value="">Categoría: Todas</option>
                                                    @foreach($categorias as $categoria)
                                                        <option value="{{ $categoria->nombre }}">{{ $categoria->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6 col-md mb-2 mb-md-0">
                                                <select id="filtro_inv_ubicacion" class="form-control">
                                                    <option value="">Ubicación: Todas</option>
                                                    @foreach($ubicaciones as $ubicacion)
                                                        <option value="{{ $ubicacion }}">{{ $ubicacion }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6 col-md mb-2 mb-md-0">
                                                <select id="filtro_inv_stock" class="form-control">
                                                    <option value="">Nivel de stock: Todos</option>
                                                    <option value="Óptimo">Óptimo</option>
                                                    <option value="Bajo">Bajo</option>
                                                    <option value="Crítico">Crítico</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 col-md-auto">
                                                <button id="btn_limpiar_inv" class="btn btn-outline-dark w-100">
                                                    <i class="feather icon-filter"></i> Limpiar
                                                </button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="tabla_inventario" class="display table table-striped dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Producto</th>
                                                        <th>Categoría</th>
                                                        <th>Ubicación</th>
                                                        <th>Stock<br>Sistema</th>
                                                        <th>Stock<br>Físico</th>
                                                        <th>Diferencia</th>
                                                        <th>Valor Stock<br>(a costo)</th>
                                                        <th>Nivel</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>234234</td>
                                                        <td>Algodón Hidrófilo Prensado 200gr</td>
                                                        <td>Material descartable</td>
                                                        <td>B2</td>
                                                        <td>30</td>
                                                        <td>30</td>
                                                        <td><span class="text-muted">0</span></td>
                                                        <td>$ 105.000</td>
                                                        <td><span class="badge badge-success">Óptimo</span></td>
                                                        <td>
                                                            <button type="button" class="btn btn-icon btn-primary" title="Ver detalle"
                                                                data-toggle="modal" data-target="#detalle_inventario"
                                                                data-codigo="234234"
                                                                data-producto="Algodón Hidrófilo Prensado 200gr"
                                                                data-categoria="Material descartable"
                                                                data-ubicacion="B2"
                                                                data-unidad="Paquete"
                                                                data-stock-sistema="30"
                                                                data-stock-fisico="30"
                                                                data-diferencia="0"
                                                                data-costo="$ 3.500"
                                                                data-valor-costo="$ 105.000"
                                                                data-precio="$ 5.900"
                                                                data-valor-venta="$ 177.000"
                                                                data-margen="68,6%"
                                                                data-nivel="Óptimo">
                                                                <i class="feather icon-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-warning" title="Ajustar stock"
                                                                data-toggle="modal" data-target="#ajuste_inventario">
                                                                <i class="feather icon-edit"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>884512</td>
                                                        <td>Anestesia Lidocaína 2%</td>
                                                        <td>Anestésicos</td>
                                                        <td>A1</td>
                                                        <td>20</td>
                                                        <td>18</td>
                                                        <td><span class="text-danger f-w-600">-2</span></td>
                                                        <td>$ 232.200</td>
                                                        <td><span class="badge badge-warning">Bajo</span></td>
                                                        <td>
                                                            <button type="button" class="btn btn-icon btn-primary" title="Ver detalle"
                                                                data-toggle="modal" data-target="#detalle_inventario"
                                                                data-codigo="884512"
                                                                data-producto="Anestesia Lidocaína 2%"
                                                                data-categoria="Anestésicos"
                                                                data-ubicacion="A1"
                                                                data-unidad="Frasco"
                                                                data-stock-sistema="20"
                                                                data-stock-fisico="18"
                                                                data-diferencia="-2"
                                                                data-costo="$ 12.900"
                                                                data-valor-costo="$ 232.200"
                                                                data-precio="$ 18.500"
                                                                data-valor-venta="$ 333.000"
                                                                data-margen="43,4%"
                                                                data-nivel="Bajo">
                                                                <i class="feather icon-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-warning" title="Ajustar stock"
                                                                data-toggle="modal" data-target="#ajuste_inventario">
                                                                <i class="feather icon-edit"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>770193</td>
                                                        <td>Cemento de Ionómero de Vidrio</td>
                                                        <td>Restauración</td>
                                                        <td>C3</td>
                                                        <td>4</td>
                                                        <td>4</td>
                                                        <td><span class="text-muted">0</span></td>
                                                        <td>$ 98.000</td>
                                                        <td><span class="badge badge-danger">Crítico</span></td>
                                                        <td>
                                                            <button type="button" class="btn btn-icon btn-primary" title="Ver detalle"
                                                                data-toggle="modal" data-target="#detalle_inventario"
                                                                data-codigo="770193"
                                                                data-producto="Cemento de Ionómero de Vidrio"
                                                                data-categoria="Restauración"
                                                                data-ubicacion="C3"
                                                                data-unidad="Frasco"
                                                                data-stock-sistema="4"
                                                                data-stock-fisico="4"
                                                                data-diferencia="0"
                                                                data-costo="$ 24.500"
                                                                data-valor-costo="$ 98.000"
                                                                data-precio="$ 29.900"
                                                                data-valor-venta="$ 119.600"
                                                                data-margen="22,0%"
                                                                data-nivel="Crítico">
                                                                <i class="feather icon-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-warning" title="Ajustar stock"
                                                                data-toggle="modal" data-target="#ajuste_inventario">
                                                                <i class="feather icon-edit"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>551208</td>
                                                        <td>Guantes Nitrilo Talla M</td>
                                                        <td>Material descartable</td>
                                                        <td>B2</td>
                                                        <td>50</td>
                                                        <td>45</td>
                                                        <td><span class="text-danger f-w-600">-5</span></td>
                                                        <td>$ 369.000</td>
                                                        <td><span class="badge badge-success">Óptimo</span></td>
                                                        <td>
                                                            <button type="button" class="btn btn-icon btn-primary" title="Ver detalle"
                                                                data-toggle="modal" data-target="#detalle_inventario"
                                                                data-codigo="551208"
                                                                data-producto="Guantes Nitrilo Talla M"
                                                                data-categoria="Material descartable"
                                                                data-ubicacion="B2"
                                                                data-unidad="Caja"
                                                                data-stock-sistema="50"
                                                                data-stock-fisico="45"
                                                                data-diferencia="-5"
                                                                data-costo="$ 8.200"
                                                                data-valor-costo="$ 369.000"
                                                                data-precio="$ 12.500"
                                                                data-valor-venta="$ 562.500"
                                                                data-margen="52,4%"
                                                                data-nivel="Óptimo">
                                                                <i class="feather icon-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-warning" title="Ajustar stock"
                                                                data-toggle="modal" data-target="#ajuste_inventario">
                                                                <i class="feather icon-edit"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Insumos-->
                    <div class="tab-pane fade" id="insumo-dental" role="tabpanel" aria-labelledby="insumo-dental-tab">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header-principal bg-white">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-7 col-lg-8 col-xl-8 pl-0">
                                                    <h5 class="f-20 d-inline">
                                                         <i class="feather icon-box icono-primary"></i>
                                                        Gestión de Insumos
                                                    </h5>
                                                </div>
                                                <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4 text-md-right mt-2 mt-md-0 pr-0">
                                                    <a href="{{ route('profesional.aranceles') }}" class="btn btn-outline-primary">
                                                        <i class="feather icon-link"></i> Asociar a tratamientos
                                                    </a>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevo_insumo">
                                                        <i class="feather icon-plus"></i> Agregar Insumo
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!--Filtros-->
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-12 col-md-5 mb-2 mb-md-0">
                                                <div class="input-buscador">
                                                    <i class="feather icon-search"></i>
                                                    <input type="text" id="filtro_prod_busqueda" class="form-control" placeholder="Buscar código, producto...">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md mb-2 mb-md-0">
                                                <select id="filtro_prod_categoria" class="form-control">
                                                    <option value="">Categoría: Todas</option>
                                                    @foreach($categorias as $categoria)
                                                        <option value="{{ $categoria->nombre }}">{{ $categoria->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6 col-md mb-2 mb-md-0">
                                                <select id="filtro_prod_ubicacion" class="form-control">
                                                    <option value="">Ubicación: Todas</option>
                                                    @foreach($ubicaciones as $ubicacion)
                                                        <option value="{{ $ubicacion }}">{{ $ubicacion }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6 col-md-auto">
                                                <button id="btn_limpiar_prod" class="btn btn-outline-dark w-100">
                                                    <i class="feather icon-filter"></i> Limpiar
                                                </button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="tabla_insumos" class="display table table-striped dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Producto</th>
                                                        <th>Categoría</th>
                                                        <th>Ubicación</th>
                                                        <th>Stock<br>Actual</th>
                                                        <th>Precio<br>Venta</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>234234</td>
                                                        <td>Algodón Hidrófilo Prensado 200gr</td>
                                                        <td>Material descartable</td>
                                                        <td>B2</td>
                                                        <td>30</td>
                                                        <td>$ 5.900</td>
                                                        <td>
                                                            <button type="button" class="btn btn-icon btn-primary" title="Detalle del producto"
                                                                data-toggle="modal" data-target="#detalle_producto"
                                                                data-codigo="234234"
                                                                data-producto="Algodón Hidrófilo Prensado 200gr"
                                                                data-categoria="Material descartable"
                                                                data-ubicacion="B2"
                                                                data-unidad="Paquete"
                                                                data-stock="30"
                                                                data-stock-seguridad="2"
                                                                data-stock-minimo="4"
                                                                data-costo="$ 3.500"
                                                                data-precio="$ 5.900"
                                                                data-margen="68,6%"
                                                                data-descripcion="Algodón prensado de uso clínico, presentación de 200 gramos.">
                                                                <i class="feather icon-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-warning" title="Editar"
                                                                data-toggle="modal" data-target="#nuevo_insumo" data-mode="editar">
                                                                <i class="feather icon-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-danger" title="Eliminar">
                                                                <i class="feather icon-x"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>884512</td>
                                                        <td>Anestesia Lidocaína 2%</td>
                                                        <td>Anestésicos</td>
                                                        <td>A1</td>
                                                        <td>18</td>
                                                        <td>$ 18.500</td>
                                                        <td>
                                                            <button type="button" class="btn btn-icon btn-primary" title="Detalle del producto"
                                                                data-toggle="modal" data-target="#detalle_producto"
                                                                data-codigo="884512"
                                                                data-producto="Anestesia Lidocaína 2%"
                                                                data-categoria="Anestésicos"
                                                                data-ubicacion="A1"
                                                                data-unidad="Frasco"
                                                                data-stock="18"
                                                                data-stock-seguridad="5"
                                                                data-stock-minimo="10"
                                                                data-costo="$ 12.900"
                                                                data-precio="$ 18.500"
                                                                data-margen="43,4%"
                                                                data-descripcion="Anestésico local al 2% con vasoconstrictor.">
                                                                <i class="feather icon-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-warning" title="Editar"
                                                                data-toggle="modal" data-target="#nuevo_insumo" data-mode="editar">
                                                                <i class="feather icon-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-danger" title="Eliminar">
                                                                <i class="feather icon-x"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>770193</td>
                                                        <td>Cemento de Ionómero de Vidrio</td>
                                                        <td>Restauración</td>
                                                        <td>C3</td>
                                                        <td>4</td>
                                                        <td>$ 29.900</td>
                                                        <td>
                                                            <button type="button" class="btn btn-icon btn-primary" title="Detalle del producto"
                                                                data-toggle="modal" data-target="#detalle_producto"
                                                                data-codigo="770193"
                                                                data-producto="Cemento de Ionómero de Vidrio"
                                                                data-categoria="Restauración"
                                                                data-ubicacion="C3"
                                                                data-unidad="Frasco"
                                                                data-stock="4"
                                                                data-stock-seguridad="3"
                                                                data-stock-minimo="6"
                                                                data-costo="$ 24.500"
                                                                data-precio="$ 29.900"
                                                                data-margen="22,0%"
                                                                data-descripcion="Cemento de restauración de uso odontológico.">
                                                                <i class="feather icon-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-warning" title="Editar"
                                                                data-toggle="modal" data-target="#nuevo_insumo" data-mode="editar">
                                                                <i class="feather icon-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-danger" title="Eliminar">
                                                                <i class="feather icon-x"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Movimientos-->
                    <div class="tab-pane fade" id="movimientos-dental" role="tabpanel" aria-labelledby="movimientos-dental-tab">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header-principal bg-white">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-7 col-lg-8 col-xl-8 pl-0">
                                                    <h5 class="f-20 d-inline">
                                                        <i class="feather icon-repeat icono-primary"></i>
                                                        Movimientos de Stock
                                                    </h5>
                                                </div>
                                                <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4 text-md-right mt-2 mt-md-0 pr-0">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevo_movimiento" data-tipo="entrada">
                                                        <i class="feather icon-arrow-down"></i> Entrada
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#nuevo_movimiento" data-tipo="salida">
                                                        <i class="feather icon-arrow-up"></i> Salida
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!--Filtros-->
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-12 col-md-4 mb-2 mb-md-0">
                                                <div class="input-buscador">
                                                    <i class="feather icon-search"></i>
                                                    <input type="text" id="filtro_mov_busqueda" class="form-control" placeholder="Buscar producto, responsable...">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md mb-2 mb-md-0">
                                                <select id="filtro_mov_tipo" class="form-control">
                                                    <option value="">Tipo: Todos</option>
                                                    <option value="Entrada">Entrada</option>
                                                    <option value="Salida">Salida</option>
                                                    <option value="Ajuste">Ajuste</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 col-md mb-2 mb-md-0">
                                                <input type="date" id="filtro_mov_desde" class="form-control" title="Desde">
                                            </div>
                                            <div class="col-sm-6 col-md mb-2 mb-md-0">
                                                <input type="date" id="filtro_mov_hasta" class="form-control" title="Hasta">
                                            </div>
                                            <div class="col-sm-6 col-md-auto">
                                                <button id="btn_limpiar_mov" class="btn btn-outline-dark w-100">
                                                    <i class="feather icon-filter"></i> Limpiar
                                                </button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="tabla_movimientos" class="display table table-striped dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Fecha</th>
                                                        <th>Tipo</th>
                                                        <th>Producto</th>
                                                        <th>Cantidad</th>
                                                        <th>Stock<br>Resultante</th>
                                                        <th>Motivo</th>
                                                        <th>Responsable</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>10/08/2026<br><small class="text-muted">09:32</small></td>
                                                        <td><span class="badge badge-success">Entrada</span></td>
                                                        <td>Algodón Hidrófilo Prensado 200gr</td>
                                                        <td class="text-success f-w-600">+20</td>
                                                        <td>30</td>
                                                        <td>Compra a proveedor</td>
                                                        <td>Dr. Pérez</td>
                                                        <td>
                                                            <button type="button" class="btn btn-icon btn-primary" title="Ver detalle"
                                                                data-toggle="modal" data-target="#detalle_movimiento"
                                                                data-fecha="10/08/2026 09:32"
                                                                data-tipo="Entrada"
                                                                data-producto="Algodón Hidrófilo Prensado 200gr"
                                                                data-lote="L-2027-03"
                                                                data-cantidad="+20"
                                                                data-stock-anterior="10"
                                                                data-stock-resultante="30"
                                                                data-motivo="Compra a proveedor"
                                                                data-responsable="Dr. Pérez"
                                                                data-documento="F-102934"
                                                                data-observaciones="Ingreso por orden de compra mensual.">
                                                                <i class="feather icon-eye"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>09/08/2026<br><small class="text-muted">16:10</small></td>
                                                        <td><span class="badge badge-danger">Salida</span></td>
                                                        <td>Guantes Nitrilo Talla M</td>
                                                        <td class="text-danger f-w-600">-5</td>
                                                        <td>45</td>
                                                        <td>Consumo en atención</td>
                                                        <td>Asist. Rojas</td>
                                                        <td>
                                                            <button type="button" class="btn btn-icon btn-primary" title="Ver detalle"
                                                                data-toggle="modal" data-target="#detalle_movimiento"
                                                                data-fecha="09/08/2026 16:10"
                                                                data-tipo="Salida"
                                                                data-producto="Guantes Nitrilo Talla M"
                                                                data-lote="L-2026-11"
                                                                data-cantidad="-5"
                                                                data-stock-anterior="50"
                                                                data-stock-resultante="45"
                                                                data-motivo="Consumo en atención"
                                                                data-responsable="Asist. Rojas"
                                                                data-documento=""
                                                                data-observaciones="Consumo en atenciones del turno tarde.">
                                                                <i class="feather icon-eye"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>08/08/2026<br><small class="text-muted">11:47</small></td>
                                                        <td><span class="badge badge-warning">Ajuste</span></td>
                                                        <td>Anestesia Lidocaína 2%</td>
                                                        <td class="text-danger f-w-600">-2</td>
                                                        <td>18</td>
                                                        <td>Merma / rotura</td>
                                                        <td>Dr. Pérez</td>
                                                        <td>
                                                            <button type="button" class="btn btn-icon btn-primary" title="Ver detalle"
                                                                data-toggle="modal" data-target="#detalle_movimiento"
                                                                data-fecha="08/08/2026 11:47"
                                                                data-tipo="Ajuste"
                                                                data-producto="Anestesia Lidocaína 2%"
                                                                data-lote="L-2026-08"
                                                                data-cantidad="-2"
                                                                data-stock-anterior="20"
                                                                data-stock-resultante="18"
                                                                data-motivo="Merma / rotura"
                                                                data-responsable="Dr. Pérez"
                                                                data-documento=""
                                                                data-observaciones="Dos frascos quebrados durante el traslado.">
                                                                <i class="feather icon-eye"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Vencimientos-->
                    <div class="tab-pane fade" id="vencimientos-dental" role="tabpanel" aria-labelledby="vencimientos-dental-tab">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header-principal bg-white">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-7 col-lg-8 col-xl-8 pl-0">
                                                    <h5 class="f-20 d-inline">
                                                        <i class="feather icon-calendar icono-primary"></i>
                                                        Control de Vencimientos
                                                    </h5>
                                                </div>
                                                <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4 text-md-right mt-2 mt-md-0 pr-0">
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevo_lote">
                                                        <i class="feather icon-plus"></i> Registrar Lote
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!--Filtros-->
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-12 col-md-4 mb-2 mb-md-0">
                                                <div class="input-buscador">
                                                    <i class="feather icon-search"></i>
                                                    <input type="text" id="filtro_venc_busqueda" class="form-control" placeholder="Buscar producto, lote...">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md mb-2 mb-md-0">
                                                <select id="filtro_venc_estado" class="form-control">
                                                    <option value="">Estado: Todos</option>
                                                    <option value="Vigente">Vigente</option>
                                                    <option value="Por vencer">Por vencer</option>
                                                    <option value="Vencido">Vencido</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 col-md mb-2 mb-md-0">
                                                <select id="filtro_venc_rango" class="form-control">
                                                    <option value="">Vence en: Cualquier fecha</option>
                                                    <option value="30">Próximos 30 días</option>
                                                    <option value="90">Próximos 90 días</option>
                                                    <option value="180">Próximos 6 meses</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 col-md-auto">
                                                <button id="btn_limpiar_venc" class="btn btn-outline-dark w-100">
                                                    <i class="feather icon-filter"></i> Limpiar
                                                </button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="tabla_vencimientos" class="display table table-striped dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Producto</th>
                                                        <th>Lote</th>
                                                        <th>Cantidad</th>
                                                        <th>Vencimiento</th>
                                                        <th>Días<br>Restantes</th>
                                                        <th>Estado</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>234234</td>
                                                        <td>Algodón Hidrófilo Prensado 200gr</td>
                                                        <td>L-2027-03</td>
                                                        <td>30</td>
                                                        <td>10/03/2027</td>
                                                        <td>211</td>
                                                        <td><span class="badge badge-success">Vigente</span></td>
                                                        <td>
                                                            <button type="button" class="btn btn-icon btn-primary" title="Ver detalle"
                                                                data-toggle="modal" data-target="#detalle_vencimiento"
                                                                data-codigo="234234"
                                                                data-producto="Algodón Hidrófilo Prensado 200gr"
                                                                data-lote="L-2027-03"
                                                                data-ubicacion="B2"
                                                                data-cantidad="30"
                                                                data-ingreso="10/03/2026"
                                                                data-vencimiento="10/03/2027"
                                                                data-dias="211"
                                                                data-estado="Vigente"
                                                                data-proveedor="Dental Import Ltda."
                                                                data-costo="$ 3.500"
                                                                data-valor="$ 105.000">
                                                                <i class="feather icon-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-danger" title="Dar de baja">
                                                                <i class="feather icon-x"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>884512</td>
                                                        <td>Anestesia Lidocaína 2%</td>
                                                        <td>L-2026-08</td>
                                                        <td>18</td>
                                                        <td>15/09/2026</td>
                                                        <td class="text-warning f-w-600">35</td>
                                                        <td><span class="badge badge-warning">Por vencer</span></td>
                                                        <td>
                                                            <button type="button" class="btn btn-icon btn-primary" title="Ver detalle"
                                                                data-toggle="modal" data-target="#detalle_vencimiento"
                                                                data-codigo="884512"
                                                                data-producto="Anestesia Lidocaína 2%"
                                                                data-lote="L-2026-08"
                                                                data-ubicacion="A1"
                                                                data-cantidad="18"
                                                                data-ingreso="15/03/2026"
                                                                data-vencimiento="15/09/2026"
                                                                data-dias="35"
                                                                data-estado="Por vencer"
                                                                data-proveedor="Insumos Médicos del Sur"
                                                                data-costo="$ 12.900"
                                                                data-valor="$ 232.200">
                                                                <i class="feather icon-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-danger" title="Dar de baja">
                                                                <i class="feather icon-x"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>770193</td>
                                                        <td>Cemento de Ionómero de Vidrio</td>
                                                        <td>L-2026-02</td>
                                                        <td>4</td>
                                                        <td>20/07/2026</td>
                                                        <td class="text-danger f-w-600">-22</td>
                                                        <td><span class="badge badge-danger">Vencido</span></td>
                                                        <td>
                                                            <button type="button" class="btn btn-icon btn-primary" title="Ver detalle"
                                                                data-toggle="modal" data-target="#detalle_vencimiento"
                                                                data-codigo="770193"
                                                                data-producto="Cemento de Ionómero de Vidrio"
                                                                data-lote="L-2026-02"
                                                                data-ubicacion="C3"
                                                                data-cantidad="4"
                                                                data-ingreso="20/01/2026"
                                                                data-vencimiento="20/07/2026"
                                                                data-dias="-22"
                                                                data-estado="Vencido"
                                                                data-proveedor="Insumos Médicos del Sur"
                                                                data-costo="$ 24.500"
                                                                data-valor="$ 98.000">
                                                                <i class="feather icon-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-danger" title="Dar de baja">
                                                                <i class="feather icon-x"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Proveedores-->
                    <div class="tab-pane fade" id="proveedores-dental" role="tabpanel" aria-labelledby="proveedores-dental-tab">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header-principal bg-white">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-7 col-lg-8 col-xl-8 pl-0">
                                                    <h5 class="f-20 d-inline">
                                                        <i class="feather icon-users icono-primary"></i>
                                                        Proveedores
                                                    </h5>
                                                </div>
                                                <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4 text-md-right mt-2 mt-md-0 pr-0">
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevo_proveedor">
                                                        <i class="feather icon-plus"></i> Agregar Proveedor
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!--Filtros-->
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-12 col-md-5 mb-2 mb-md-0">
                                                <div class="input-buscador">
                                                    <i class="feather icon-search"></i>
                                                    <input type="text" id="filtro_prov_busqueda" class="form-control" placeholder="Buscar proveedor, RUT, contacto...">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md mb-2 mb-md-0">
                                                <select id="filtro_prov_estado" class="form-control">
                                                    <option value="">Estado: Todos</option>
                                                    <option value="Activo">Activo</option>
                                                    <option value="Inactivo">Inactivo</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 col-md-auto">
                                                <button id="btn_limpiar_prov" class="btn btn-outline-dark w-100">
                                                    <i class="feather icon-filter"></i> Limpiar
                                                </button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="tabla_proveedores" class="display table table-striped dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>RUT</th>
                                                        <th>Proveedor</th>
                                                        <th>Contacto</th>
                                                        <th>Estado</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>76.543.210-K</td>
                                                        <td>Dental Import Ltda.</td>
                                                        <td>
                                                            <span class="d-block f-w-600">Marcela Soto</span>
                                                            <span class="d-block f-12">
                                                                <i class="feather icon-phone text-c-blue mr-1"></i>+56 9 8765 4321
                                                            </span>
                                                            <span class="d-block f-12">
                                                                <i class="feather icon-mail text-c-blue mr-1"></i>ventas@dentalimport.cl
                                                            </span>
                                                        </td>
                                                        <td><span class="badge badge-success">Activo</span></td>
                                                        <td>
                                                            <button type="button" class="btn btn-icon btn-primary" title="Ver detalle"
                                                                data-toggle="modal" data-target="#detalle_proveedor"
                                                                data-rut="76.543.210-K"
                                                                data-razon="Dental Import Ltda."
                                                                data-giro="Venta al por mayor de insumos dentales"
                                                                data-contacto="Marcela Soto"
                                                                data-telefono="+56 9 8765 4321"
                                                                data-email="ventas@dentalimport.cl"
                                                                data-web="www.dentalimport.cl"
                                                                data-direccion="Av. Providencia 1234, Providencia"
                                                                data-productos="Algodón Hidrófilo Prensado 200gr|Guantes Nitrilo Talla M|Mascarillas Quirúrgicas|Fresas de Diamante"
                                                                data-total-productos="12"
                                                                data-ultima-compra="05/08/2026"
                                                                data-estado="Activo"
                                                                data-observaciones="Pago a 30 días. Despacho sin costo sobre $200.000.">
                                                                <i class="feather icon-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-warning" title="Editar"
                                                                data-toggle="modal" data-target="#nuevo_proveedor" data-mode="editar">
                                                                <i class="feather icon-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-danger" title="Eliminar">
                                                                <i class="feather icon-x"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>77.112.334-5</td>
                                                        <td>Insumos Médicos del Sur</td>
                                                        <td>
                                                            <span class="d-block f-w-600">Rodrigo Fuentes</span>
                                                            <span class="d-block f-12">
                                                                <i class="feather icon-phone text-c-blue mr-1"></i>+56 2 2345 6789
                                                            </span>
                                                            <span class="d-block f-12">
                                                                <i class="feather icon-mail text-c-blue mr-1"></i>contacto@imsur.cl
                                                            </span>
                                                        </td>
                                                        <td><span class="badge badge-success">Activo</span></td>
                                                        <td>
                                                            <button type="button" class="btn btn-icon btn-primary" title="Ver detalle"
                                                                data-toggle="modal" data-target="#detalle_proveedor"
                                                                data-rut="77.112.334-5"
                                                                data-razon="Insumos Médicos del Sur"
                                                                data-giro="Distribución de material clínico"
                                                                data-contacto="Rodrigo Fuentes"
                                                                data-telefono="+56 2 2345 6789"
                                                                data-email="contacto@imsur.cl"
                                                                data-web="www.imsur.cl"
                                                                data-direccion="Camino Real 456, Puerto Montt"
                                                                data-productos="Anestesia Lidocaína 2%|Cemento de Ionómero de Vidrio|Mascarillas Quirúrgicas"
                                                                data-total-productos="7"
                                                                data-ultima-compra="28/07/2026"
                                                                data-estado="Activo"
                                                                data-observaciones="Pago contado. Entrega en 5 días hábiles.">
                                                                <i class="feather icon-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-warning" title="Editar"
                                                                data-toggle="modal" data-target="#nuevo_proveedor" data-mode="editar">
                                                                <i class="feather icon-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-danger" title="Eliminar">
                                                                <i class="feather icon-x"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
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
        </div>
    </div>
    <!--Cierre: Container Completo-->

    <!--Modal: Detalle Inventario-->
    <div class="modal fade" id="detalle_inventario" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalle de Inventario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-8 mb-3">
                            <p class="text-muted mb-1 f-12">PRODUCTO</p>
                            <h5 class="mb-0" id="inv_producto">—</h5>
                            <small class="text-muted">Código <span id="inv_codigo">—</span></small>
                        </div>
                        <div class="col-sm-12 col-md-4 mb-3">
                            <p class="text-muted mb-1 f-12">NIVEL DE STOCK</p>
                            <span id="inv_nivel"></span>
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <p class="text-muted mb-1 f-12">CATEGORÍA</p>
                            <span id="inv_categoria">—</span>
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <p class="text-muted mb-1 f-12">UBICACIÓN</p>
                            <span id="inv_ubicacion">—</span>
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <p class="text-muted mb-1 f-12">UNIDAD</p>
                            <span id="inv_unidad">—</span>
                        </div>
                    </div>

                    <hr class="mt-0">
                    <p class="text-muted f-12 mb-2">CONTROL DE STOCK</p>
                    <div class="row">
                        <div class="col-4">
                            <div class="tile-resumen tile-azul">
                                <div>
                                    <p class="tile-label">Stock sistema</p>
                                    <h5 class="tile-valor" id="inv_stock_sistema">—</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="tile-resumen tile-verde">
                                <div>
                                    <p class="tile-label">Stock físico</p>
                                    <h5 class="tile-valor" id="inv_stock_fisico">—</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="tile-resumen tile-rojo">
                                <div>
                                    <p class="tile-label">Diferencia</p>
                                    <h5 class="tile-valor" id="inv_diferencia">—</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <p class="text-muted f-12 mb-2">VALORIZACIÓN</p>
                    <div class="row">
                        <div class="col-6 col-md-3 mb-2">
                            <p class="text-muted mb-1 f-12">COSTO PROMEDIO</p>
                            <span class="f-w-600" id="inv_costo">—</span>
                        </div>
                        <div class="col-6 col-md-3 mb-2">
                            <p class="text-muted mb-1 f-12">VALOR A COSTO</p>
                            <span class="f-w-600" id="inv_valor_costo">—</span>
                        </div>
                        <div class="col-6 col-md-3 mb-2">
                            <p class="text-muted mb-1 f-12">PRECIO VENTA</p>
                            <span class="f-w-600" id="inv_precio">—</span>
                        </div>
                        <div class="col-6 col-md-3 mb-2">
                            <p class="text-muted mb-1 f-12">VALOR A VENTA</p>
                            <span class="f-w-600" id="inv_valor_venta">—</span>
                        </div>
                        <div class="col-12">
                            <p class="text-muted mb-1 f-12">MARGEN</p>
                            <span class="badge badge-success" id="inv_margen">—</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="feather icon-x"></i> Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Modal Detalle Inventario-->

    <!--Modal: Detalle Producto-->
    <div class="modal fade" id="detalle_producto" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalle del Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-8 mb-3">
                            <p class="text-muted mb-1 f-12">PRODUCTO</p>
                            <h5 class="mb-0" id="prod_nombre">—</h5>
                            <small class="text-muted">Código <span id="prod_codigo">—</span></small>
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <p class="text-muted mb-1 f-12">CATEGORÍA</p>
                            <span id="prod_categoria">—</span>
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <p class="text-muted mb-1 f-12">UBICACIÓN</p>
                            <span id="prod_ubicacion">—</span>
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <p class="text-muted mb-1 f-12">UNIDAD DE MEDIDA</p>
                            <span id="prod_unidad">—</span>
                        </div>
                    </div>

                    <hr class="mt-0">
                    <p class="text-muted f-12 mb-2">NIVELES DE STOCK</p>
                    <div class="row">
                        <div class="col-4">
                            <div class="tile-resumen tile-azul">
                                <div>
                                    <p class="tile-label">Stock actual</p>
                                    <h5 class="tile-valor" id="prod_stock">—</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="tile-resumen tile-verde">
                                <div>
                                    <p class="tile-label">Stock seguridad</p>
                                    <h5 class="tile-valor" id="prod_stock_seguridad">—</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="tile-resumen tile-rojo">
                                <div>
                                    <p class="tile-label">Stock mínimo</p>
                                    <h5 class="tile-valor" id="prod_stock_minimo">—</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-6 col-md-4 mb-3">
                            <p class="text-muted mb-1 f-12">COSTO PROMEDIO</p>
                            <span class="f-w-600" id="prod_costo">—</span>
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <p class="text-muted mb-1 f-12">PRECIO DE VENTA</p>
                            <span class="f-w-600" id="prod_precio">—</span>
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <p class="text-muted mb-1 f-12">MARGEN</p>
                            <span class="badge badge-success" id="prod_margen">—</span>
                        </div>
                        <div class="col-12">
                            <p class="text-muted mb-1 f-12">DESCRIPCIÓN</p>
                            <span id="prod_descripcion">—</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="feather icon-x"></i> Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Modal Detalle Producto-->

    <!--Modal: Detalle Movimiento-->
    <div class="modal fade" id="detalle_movimiento" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalle del Movimiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-8 mb-3">
                            <p class="text-muted mb-1 f-12">PRODUCTO</p>
                            <h5 class="mb-0" id="mov_producto">—</h5>
                            <small class="text-muted">Lote <span id="mov_lote">—</span></small>
                        </div>
                        <div class="col-sm-12 col-md-4 mb-3">
                            <p class="text-muted mb-1 f-12">TIPO</p>
                            <span id="mov_tipo_badge"></span>
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <p class="text-muted mb-1 f-12">FECHA Y HORA</p>
                            <span id="mov_fecha">—</span>
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <p class="text-muted mb-1 f-12">RESPONSABLE</p>
                            <span id="mov_responsable">—</span>
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <p class="text-muted mb-1 f-12">DOCUMENTO</p>
                            <span id="mov_documento">—</span>
                        </div>
                    </div>

                    <hr class="mt-0">
                    <p class="text-muted f-12 mb-2">IMPACTO EN STOCK</p>
                    <div class="row">
                        <div class="col-4">
                            <div class="tile-resumen tile-morado">
                                <div>
                                    <p class="tile-label">Stock anterior</p>
                                    <h5 class="tile-valor" id="mov_stock_anterior">—</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="tile-resumen tile-azul">
                                <div>
                                    <p class="tile-label">Cantidad</p>
                                    <h5 class="tile-valor" id="mov_cantidad">—</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="tile-resumen tile-verde">
                                <div>
                                    <p class="tile-label">Stock resultante</p>
                                    <h5 class="tile-valor" id="mov_stock_resultante">—</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12 col-md-5 mb-3">
                            <p class="text-muted mb-1 f-12">MOTIVO</p>
                            <span class="f-w-600" id="mov_motivo">—</span>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <p class="text-muted mb-1 f-12">OBSERVACIONES</p>
                            <span id="mov_observaciones">—</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="feather icon-x"></i> Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Modal Detalle Movimiento-->

    <!--Modal: Detalle Vencimiento-->
    <div class="modal fade" id="detalle_vencimiento" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalle del Lote</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-8 mb-3">
                            <p class="text-muted mb-1 f-12">PRODUCTO</p>
                            <h5 class="mb-0" id="venc_producto">—</h5>
                            <small class="text-muted">Código <span id="venc_codigo">—</span></small>
                        </div>
                        <div class="col-sm-12 col-md-4 mb-3">
                            <p class="text-muted mb-1 f-12">ESTADO</p>
                            <span id="venc_estado"></span>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <p class="text-muted mb-1 f-12">LOTE</p>
                            <span class="f-w-600" id="venc_lote">—</span>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <p class="text-muted mb-1 f-12">UBICACIÓN</p>
                            <span id="venc_ubicacion">—</span>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <p class="text-muted mb-1 f-12">CANTIDAD</p>
                            <span id="venc_cantidad">—</span>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <p class="text-muted mb-1 f-12">PROVEEDOR</p>
                            <span id="venc_proveedor">—</span>
                        </div>
                    </div>

                    <hr class="mt-0">
                    <p class="text-muted f-12 mb-2">VIGENCIA</p>
                    <div class="row">
                        <div class="col-4">
                            <div class="tile-resumen tile-azul">
                                <div>
                                    <p class="tile-label">Fecha de ingreso</p>
                                    <h5 class="tile-valor" id="venc_ingreso">—</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="tile-resumen tile-morado">
                                <div>
                                    <p class="tile-label">Vencimiento</p>
                                    <h5 class="tile-valor" id="venc_vencimiento">—</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="tile-resumen tile-rojo">
                                <div>
                                    <p class="tile-label">Días restantes</p>
                                    <h5 class="tile-valor" id="venc_dias">—</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <p class="text-muted mb-1 f-12">COSTO UNITARIO</p>
                            <span class="f-w-600" id="venc_costo">—</span>
                        </div>
                        <div class="col-6 col-md-4">
                            <p class="text-muted mb-1 f-12">VALOR DEL LOTE</p>
                            <span class="f-w-600" id="venc_valor">—</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="feather icon-x"></i> Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Modal Detalle Vencimiento-->

    <!--Modal: Producto / Insumo-->
    <div class="modal fade" id="nuevo_insumo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><span id="insumo_titulo">Agregar Insumo</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_insumo" method="POST" action="{{ route('profesional.gestion_insumos.guardar') }}">
                    @csrf
                    <input type="hidden" name="id" id="insumo_id">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Código <span class="text-danger">*</span></label>
                                    <input type="text" name="codigo" class="form-control form-control-sm" placeholder="Ej: 234234" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Nombre del producto <span class="text-danger">*</span></label>
                                    <input type="text" name="nombre" class="form-control form-control-sm" placeholder="Ej: Algodón Hidrófilo Prensado 200gr" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Categoría <span class="text-danger">*</span></label>
                                    <select name="categoria" class="form-control form-control-sm" required>
                                        <option value="">Seleccionar</option>
                                        @foreach($categorias as $categoria)
                                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Unidad de medida <span class="text-danger">*</span></label>
                                    <select name="unidad" class="form-control form-control-sm" required>
                                        <option value="">Seleccionar</option>
                                        @foreach($unidades as $unidad)
                                            <option value="{{ $unidad->id }}">{{ $unidad->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ubicación</label>
                                    <input type="text" name="ubicacion" class="form-control form-control-sm" placeholder="Ej: B2">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Stock inicial</label>
                                    <input type="number" name="stock_inicial" class="form-control form-control-sm" min="0" placeholder="0">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Stock de seguridad</label>
                                    <input type="number" name="stock_seguridad" class="form-control form-control-sm" min="0" placeholder="0">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Stock mínimo</label>
                                    <input type="number" name="stock_minimo" class="form-control form-control-sm" min="0" placeholder="0">
                                </div>
                            </div>

                            <div class="col-12"><hr class="mt-1 mb-3"></div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Disponible en Implantolog&iacute;a</label>
                                    <select name="uso_implantologia" id="uso_implantologia" class="form-control form-control-sm">
                                        <option value="0">No</option>
                                        <option value="1">S&iacute;</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 campos-implantologia d-none">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tipo de insumo implantol&oacute;gico</label>
                                    <select name="tipo_insumo_implantologia" id="tipo_insumo_implantologia" class="form-control form-control-sm">
                                        <option value="">Seleccionar</option>
                                        <option value="1">Implante</option><option value="2">Instrumental quir&uacute;rgico/prot&eacute;sico</option>
                                        <option value="3">Sutura y regeneraci&oacute;n</option><option value="4">Descartables y bioseguridad</option>
                                        <option value="5">Injerto &oacute;seo</option><option value="6">Membrana</option>
                                        <option value="7">Tornillo de fijaci&oacute;n</option><option value="8">Aditamento</option><option value="9">Otro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 campos-implantologia campo-marca-implante d-none">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Marca del implante</label>
                                    <select name="marca_implante" class="form-control form-control-sm">
                                        <option value="">Seleccionar</option>
                                        @foreach($marcasImplantesGestion as $marcaImplante)
                                            <option value="{{ $marcaImplante->id }}">{{ $marcaImplante->descripcion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12"><hr class="mt-1 mb-3"></div>

                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Costo promedio</label>
                                    <input type="text" id="insumo_costo_promedio" class="form-control form-control-sm" value="$ 0" readonly>
                                    <small class="text-muted">Se calcula automáticamente desde los lotes ingresados.</small>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Precio de venta <span class="text-danger">*</span></label>
                                    <input type="number" name="precio_venta" id="insumo_precio_venta" class="form-control form-control-sm" min="0" placeholder="0" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Margen estimado</label>
                                    <input type="text" id="insumo_margen" class="form-control form-control-sm" value="—" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Descripción</label>
                                    <textarea name="descripcion" class="form-control form-control-sm" rows="2" placeholder="Detalle del producto..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="feather icon-x"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-info">
                            <i class="feather icon-save"></i> Guardar producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Cierre: Modal Producto-->

    <!--Modal: Toma de Inventario-->
    <div class="modal fade" id="nueva_toma_inventario" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nueva Toma de Inventario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_toma_inventario" method="POST" action="#">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Fecha de la toma <span class="text-danger">*</span></label>
                                    <input type="date" name="fecha" class="form-control form-control-sm" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tipo de toma <span class="text-danger">*</span></label>
                                    <select name="tipo_toma" class="form-control form-control-sm" required>
                                        <option value="">Seleccionar</option>
                                        <option value="total">Inventario total</option>
                                        <option value="parcial">Parcial por categoría</option>
                                        <option value="ubicacion">Parcial por ubicación</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Responsable <span class="text-danger">*</span></label>
                                    <input type="text" name="responsable" class="form-control form-control-sm" placeholder="Nombre del responsable" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Categoría a inventariar</label>
                                    <select name="categoria" class="form-control form-control-sm">
                                        <option value="">Todas las categorías</option>
                                        <option value="descartable">Material descartable</option>
                                        <option value="anestesicos">Anestésicos</option>
                                        <option value="restauracion">Restauración</option>
                                        <option value="instrumental">Instrumental</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ubicación a inventariar</label>
                                    <select name="ubicacion" class="form-control form-control-sm">
                                        <option value="">Todas las ubicaciones</option>
                                        <option value="A1">A1</option>
                                        <option value="B2">B2</option>
                                        <option value="C3">C3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Observaciones</label>
                                    <textarea name="observaciones" class="form-control form-control-sm" rows="2" placeholder="Motivo o detalle de la toma de inventario..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="feather icon-x"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-info">
                            <i class="feather icon-save"></i> Iniciar toma
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Cierre: Modal Toma de Inventario-->

    <!--Modal: Ajuste de Inventario-->
    <div class="modal fade" id="ajuste_inventario" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajustar Stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_ajuste" method="POST" action="#">
                    @csrf
                    <input type="hidden" name="id_insumo" id="aj_id_insumo">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Producto</label>
                                    <input type="text" id="aj_producto" class="form-control form-control-sm" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Stock en sistema</label>
                                    <input type="number" id="aj_stock_sistema" class="form-control form-control-sm" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Stock físico contado <span class="text-danger">*</span></label>
                                    <input type="number" name="stock_fisico" class="form-control form-control-sm" min="0" placeholder="0" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Motivo del ajuste <span class="text-danger">*</span></label>
                                    <select name="motivo" class="form-control form-control-sm" required>
                                        <option value="">Seleccionar</option>
                                        <option value="conteo">Diferencia de conteo</option>
                                        <option value="merma">Merma / rotura</option>
                                        <option value="perdida">Pérdida o extravío</option>
                                        <option value="vencimiento">Baja por vencimiento</option>
                                        <option value="error">Corrección de error de registro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Observaciones</label>
                                    <textarea name="observaciones" class="form-control form-control-sm" rows="2" placeholder="Detalle del ajuste..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="feather icon-x"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-info">
                            <i class="feather icon-save"></i> Guardar ajuste
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Cierre: Modal Ajuste-->

    <!--Modal: Movimiento de Stock-->
    <div class="modal fade" id="nuevo_movimiento" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <span id="mov_titulo">Registrar Movimiento</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_movimiento" method="POST" action="#">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tipo de movimiento <span class="text-danger">*</span></label>
                                    <select name="tipo" id="mov_tipo" class="form-control form-control-sm" required>
                                        <option value="">Seleccionar</option>
                                        <option value="entrada">Entrada</option>
                                        <option value="salida">Salida</option>
                                        <option value="ajuste">Ajuste</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Producto <span class="text-danger">*</span></label>
                                    <select name="id_insumo" class="form-control form-control-sm" required>
                                        <option value="">Seleccionar producto</option>
                                        <option value="1">Algodón Hidrófilo Prensado 200gr</option>
                                        <option value="2">Guantes Nitrilo Talla M</option>
                                        <option value="3">Anestesia Lidocaína 2%</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Lote</label>
                                    <input type="text" name="lote" class="form-control form-control-sm" placeholder="Ej: L-2027-03">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Cantidad <span class="text-danger">*</span></label>
                                    <input type="number" name="cantidad" class="form-control form-control-sm" min="1" placeholder="0" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Fecha <span class="text-danger">*</span></label>
                                    <input type="date" name="fecha" class="form-control form-control-sm" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Motivo <span class="text-danger">*</span></label>
                                    <select name="motivo" class="form-control form-control-sm" required>
                                        <option value="">Seleccionar</option>
                                        <option value="compra">Compra a proveedor</option>
                                        <option value="consumo">Consumo en atención</option>
                                        <option value="devolucion">Devolución</option>
                                        <option value="merma">Merma / rotura</option>
                                        <option value="vencimiento">Baja por vencimiento</option>
                                        <option value="inventario">Ajuste de inventario</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Responsable</label>
                                    <input type="text" name="responsable" class="form-control form-control-sm" placeholder="Nombre del responsable">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Observaciones</label>
                                    <textarea name="observaciones" class="form-control form-control-sm" rows="2" placeholder="Detalle adicional del movimiento..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="feather icon-x"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-info">
                            <i class="feather icon-save"></i> Guardar movimiento
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Cierre: Modal Movimiento-->

    <!--Modal: Registrar Lote-->
    <div class="modal fade" id="nuevo_lote" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Registrar Lote
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_lote" method="POST" action="#">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-8">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Producto <span class="text-danger">*</span></label>
                                    <select name="id_insumo" class="form-control form-control-sm" required>
                                        <option value="">Seleccionar producto</option>
                                        <option value="1">Algodón Hidrófilo Prensado 200gr</option>
                                        <option value="2">Guantes Nitrilo Talla M</option>
                                        <option value="3">Anestesia Lidocaína 2%</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">N° de Lote <span class="text-danger">*</span></label>
                                    <input type="text" name="lote" class="form-control form-control-sm" placeholder="Ej: L-2027-03" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Cantidad <span class="text-danger">*</span></label>
                                    <input type="number" name="cantidad" class="form-control form-control-sm" min="1" placeholder="0" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Fecha de vencimiento <span class="text-danger">*</span></label>
                                    <input type="date" name="fecha_vencimiento" class="form-control form-control-sm" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ubicación</label>
                                    <input type="text" name="ubicacion" class="form-control form-control-sm" placeholder="Ej: B2">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Costo unitario de compra <span class="text-danger">*</span></label>
                                    <input type="number" name="costo_unitario" class="form-control form-control-sm" min="0" placeholder="0" required>
                                    <small class="text-muted">Recalcula el costo promedio del producto.</small>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">N° de factura / guía</label>
                                    <input type="text" name="documento" class="form-control form-control-sm" placeholder="Ej: F-102934">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Proveedor</label>
                                    <select name="id_proveedor" class="form-control form-control-sm">
                                        <option value="">Seleccionar</option>
                                        <option value="1">Dental Import Ltda.</option>
                                        <option value="2">Insumos Médicos del Sur</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Alerta previa (días antes)</label>
                                    <input type="number" name="dias_alerta" class="form-control form-control-sm" min="0" placeholder="30">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="feather icon-x"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-info">
                            <i class="feather icon-save"></i> Guardar lote
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Cierre: Modal Lote-->

    <!--Modal: Detalle Proveedor-->
    <div class="modal fade" id="detalle_proveedor" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalle del Proveedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-8 mb-3">
                            <p class="text-muted mb-1 f-12">RAZÓN SOCIAL</p>
                            <h5 class="mb-0" id="det_razon">—</h5>
                        </div>
                        <div class="col-sm-12 col-md-4 mb-3">
                            <p class="text-muted mb-1 f-12">ESTADO</p>
                            <span id="det_estado"></span>
                        </div>
                        <div class="col-sm-12 col-md-4 mb-3">
                            <p class="text-muted mb-1 f-12">RUT</p>
                            <span id="det_rut">—</span>
                        </div>
                        <div class="col-sm-12 col-md-8 mb-3">
                            <p class="text-muted mb-1 f-12">GIRO</p>
                            <span id="det_giro">—</span>
                        </div>
                    </div>

                    <hr class="mt-0">

                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <p class="text-muted mb-1 f-12">CONTACTO</p>
                            <span class="d-block f-w-600" id="det_contacto">—</span>
                            <span class="d-block f-13">
                                <i class="feather icon-phone text-c-blue mr-1"></i><span id="det_telefono">—</span>
                            </span>
                            <span class="d-block f-13">
                                <i class="feather icon-mail text-c-blue mr-1"></i><span id="det_email">—</span>
                            </span>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <p class="text-muted mb-1 f-12">UBICACIÓN Y WEB</p>
                            <span class="d-block f-13">
                                <i class="feather icon-map-pin text-c-blue mr-1"></i><span id="det_direccion">—</span>
                            </span>
                            <span class="d-block f-13">
                                <i class="feather icon-globe text-c-blue mr-1"></i><span id="det_web">—</span>
                            </span>
                        </div>
                    </div>

                    <hr class="mt-0">

                    <div class="row">
                        <div class="col-sm-12 col-md-8 mb-3">
                            <p class="text-muted mb-2 f-12">
                                PRODUCTOS QUE PROVEE
                                (<span id="det_total_productos">0</span>)
                            </p>
                            <div id="det_productos"></div>
                        </div>
                        <div class="col-sm-12 col-md-4 mb-3">
                            <p class="text-muted mb-1 f-12">ÚLTIMA COMPRA</p>
                            <h5 class="mb-0" id="det_ultima_compra">—</h5>
                        </div>
                        <div class="col-sm-12">
                            <p class="text-muted mb-1 f-12">OBSERVACIONES</p>
                            <span id="det_observaciones">—</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="feather icon-x"></i> Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Modal Detalle Proveedor-->

    <!--Modal: Proveedor-->
    <div class="modal fade" id="nuevo_proveedor" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <span id="prov_titulo">Agregar Proveedor</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_proveedor" method="POST" action="#">
                    @csrf
                    <input type="hidden" name="id" id="prov_id">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">RUT <span class="text-danger">*</span></label>
                                    <input type="text" name="rut" class="form-control form-control-sm" placeholder="76.543.210-K" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Razón social <span class="text-danger">*</span></label>
                                    <input type="text" name="razon_social" class="form-control form-control-sm" placeholder="Ej: Dental Import Ltda." required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Giro de la empresa <span class="text-danger">*</span></label>
                                    <input type="text" name="giro" class="form-control form-control-sm" placeholder="Ej: Venta al por mayor de insumos dentales" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Persona de contacto</label>
                                    <input type="text" name="contacto" class="form-control form-control-sm" placeholder="Nombre del contacto">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Teléfono</label>
                                    <input type="text" name="telefono" class="form-control form-control-sm" placeholder="+56 9 1234 5678">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Email</label>
                                    <input type="email" name="email" class="form-control form-control-sm" placeholder="ventas@proveedor.cl">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Sitio web</label>
                                    <input type="text" name="sitio_web" class="form-control form-control-sm" placeholder="www.proveedor.cl">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Dirección</label>
                                    <input type="text" name="direccion" class="form-control form-control-sm" placeholder="Calle, número, comuna">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Estado <span class="text-danger">*</span></label>
                                    <select name="estado" class="form-control form-control-sm" required>
                                        <option value="activo">Activo</option>
                                        <option value="inactivo">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <select name="productos[]" id="prov_productos" class="form-control form-control-sm" multiple>
                                        <option value="1">Algodón Hidrófilo Prensado 200gr</option>
                                        <option value="2">Guantes Nitrilo Talla M</option>
                                        <option value="3">Anestesia Lidocaína 2%</option>
                                        <option value="4">Cemento de Ionómero de Vidrio</option>
                                        <option value="5">Mascarillas Quirúrgicas</option>
                                        <option value="6">Fresas de Diamante</option>
                                    </select>
                                    <small class="text-c-blue font-weight-bold"><i class="feather icon-info"></i> PUEDES SELECCIONAR UNO O MÁS PRODUCTOS</small>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Observaciones</label>
                                    <textarea name="observaciones" class="form-control form-control-sm" rows="2" placeholder="Condiciones de pago, plazos de entrega..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="feather icon-x"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-info">
                            <i class="feather icon-save"></i> Guardar proveedor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Cierre: Modal Proveedor-->

@endsection

@section('page-script')
<script>
$(document).ready(function () {

    var idiomaDT = {
        lengthMenu:   'Mostrar _MENU_ registros',
        zeroRecords:  'No se encontraron resultados',
        info:         'Mostrando _START_ a _END_ de _TOTAL_ registros',
        infoEmpty:    'Sin registros',
        infoFiltered: '(filtrado de _MAX_ totales)',
        paginate: { first: 'Primero', last: 'Último', next: 'Siguiente', previous: 'Anterior' }
    };

    /* Rellena un modal de detalle desde los data-* del botón */
    function llenarDetalle(btn, mapa) {
        $.each(mapa, function (id, attr) {
            var v = btn.data(attr);
            $('#' + id).text((v === undefined || v === '') ? '—' : v);
        });
    }

    function badge(valor, mapaColores) {
        return '<span class="badge badge-' + (mapaColores[valor] || 'secondary') + '">' + (valor || '—') + '</span>';
    }

    /* La vista se alimenta exclusivamente del catálogo persistido. Las filas que
       pertenecían a la maqueta se eliminan antes de inicializar DataTables. */
    var productosGestion = @json($insumos);
    var productosPorId = {};
    function escapar(valor) {
        return $('<div>').text(valor === null || valor === undefined ? '' : valor).html();
    }
    function moneda(valor) {
        return '$ ' + new Intl.NumberFormat('es-CL').format(Number(valor) || 0);
    }
    function atributosProducto(producto) {
        var categoria = producto.tipo_producto ? producto.tipo_producto.nombre : '';
        var unidad = producto.unidad_medida ? producto.unidad_medida.nombre : '';
        var costo = Number(producto.precio_compra || producto.precio_unitario || 0);
        var precio = Number(producto.precio_venta || 0);
        var margen = costo > 0 ? (((precio - costo) / costo) * 100).toFixed(1).replace('.', ',') + '%' : '—';
        return ' data-codigo="' + escapar(producto.codigo_interno) + '"' +
            ' data-producto="' + escapar(producto.nombre) + '"' +
            ' data-categoria="' + escapar(categoria) + '"' +
            ' data-ubicacion="' + escapar(producto.ubicacion || '') + '"' +
            ' data-unidad="' + escapar(unidad) + '"' +
            ' data-stock="' + Number(producto.stock_actual || 0) + '"' +
            ' data-stock-sistema="' + Number(producto.stock_actual || 0) + '"' +
            ' data-stock-fisico="' + Number(producto.stock_actual || 0) + '"' +
            ' data-diferencia="0" data-stock-seguridad="' + Number(producto.stock_seguridad || 0) + '"' +
            ' data-stock-minimo="' + Number(producto.stock_minimo || 0) + '"' +
            ' data-costo="' + moneda(costo) + '" data-valor-costo="' + moneda(costo * Number(producto.stock_actual || 0)) + '"' +
            ' data-precio="' + moneda(precio) + '" data-valor-venta="' + moneda(precio * Number(producto.stock_actual || 0)) + '"' +
            ' data-margen="' + margen + '" data-descripcion="' + escapar(producto.descripcion || '') + '"';
    }

    $('#tabla_inventario tbody, #tabla_insumos tbody, #tabla_movimientos tbody, #tabla_vencimientos tbody, #tabla_proveedores tbody').empty();
    productosGestion.forEach(function (producto) {
        productosPorId[producto.id] = producto;
        var categoria = producto.tipo_producto ? producto.tipo_producto.nombre : 'Sin categoría';
        var stock = Number(producto.stock_actual || 0);
        var minimo = Number(producto.stock_minimo || 0);
        var seguridad = Number(producto.stock_seguridad || 0);
        var nivel = stock <= seguridad ? 'Crítico' : (stock <= minimo ? 'Bajo' : 'Óptimo');
        var claseNivel = nivel === 'Crítico' ? 'danger' : (nivel === 'Bajo' ? 'warning' : 'success');
        var attrs = atributosProducto(producto) + ' data-nivel="' + nivel + '"';
        var accionesGestion = producto.id_profesional
            ? '<button type="button" class="btn btn-icon btn-warning btn-editar-insumo" data-toggle="modal" data-target="#nuevo_insumo" data-mode="editar" data-id="' + producto.id + '"><i class="feather icon-edit"></i></button> ' +
              '<button type="button" class="btn btn-icon btn-danger btn-eliminar-insumo" data-id="' + producto.id + '"><i class="feather icon-x"></i></button>'
            : '<span class="badge badge-info">Catálogo base</span>';
        $('#tabla_inventario tbody').append('<tr><td>' + escapar(producto.codigo_interno) + '</td><td>' + escapar(producto.nombre) +
            '</td><td>' + escapar(categoria) + '</td><td>' + escapar(producto.ubicacion || '—') + '</td><td>' + stock +
            '</td><td>' + stock + '</td><td>0</td><td>' + moneda(Number(producto.precio_compra || producto.precio_unitario || 0) * stock) +
            '</td><td><span class="badge badge-' + claseNivel + '">' + nivel + '</span></td><td>' +
            '<button type="button" class="btn btn-icon btn-primary" data-toggle="modal" data-target="#detalle_inventario"' + attrs + '><i class="feather icon-eye"></i></button></td></tr>');
        $('#tabla_insumos tbody').append('<tr><td>' + escapar(producto.codigo_interno) + '</td><td>' + escapar(producto.nombre) +
            '</td><td>' + escapar(categoria) + '</td><td>' + escapar(producto.ubicacion || '—') + '</td><td>' + stock +
            '</td><td>' + moneda(producto.precio_venta) + '</td><td>' +
            '<button type="button" class="btn btn-icon btn-primary" data-toggle="modal" data-target="#detalle_producto"' + attrs + '><i class="feather icon-eye"></i></button> ' +
            accionesGestion + '</td></tr>');
    });

    /* ── Inventario ── */
    var tablaInv = $('#tabla_inventario').DataTable({
        responsive: true, dom: 'lrtip', pageLength: 10,
        columnDefs: [{ targets: [9], orderable: false, searchable: false }],
        language: idiomaDT
    });
    $('#filtro_inv_busqueda').on('input', function () { tablaInv.search(this.value).draw(); });
    $('#filtro_inv_categoria').on('change', function () { tablaInv.column(2).search(this.value).draw(); });
    $('#filtro_inv_ubicacion').on('change', function () { tablaInv.column(3).search(this.value).draw(); });
    $('#filtro_inv_stock').on('change', function () { tablaInv.column(8).search(this.value).draw(); });

    $('#detalle_inventario').on('show.bs.modal', function (e) {
        var b = $(e.relatedTarget);
        llenarDetalle(b, {
            inv_codigo: 'codigo', inv_producto: 'producto', inv_categoria: 'categoria',
            inv_ubicacion: 'ubicacion', inv_unidad: 'unidad',
            inv_stock_sistema: 'stock-sistema', inv_stock_fisico: 'stock-fisico', inv_diferencia: 'diferencia',
            inv_costo: 'costo', inv_valor_costo: 'valor-costo',
            inv_precio: 'precio', inv_valor_venta: 'valor-venta', inv_margen: 'margen'
        });
        $('#inv_nivel').html(badge(b.data('nivel'),
            { 'Óptimo': 'success', 'Bajo': 'warning', 'Crítico': 'danger' }));
        $('#inv_diferencia').removeClass('text-danger text-success')
            .addClass(parseInt(b.data('diferencia'), 10) === 0 ? '' : 'text-danger');
    });

    /* ── Detalle Producto ── */
    $('#detalle_producto').on('show.bs.modal', function (e) {
        llenarDetalle($(e.relatedTarget), {
            prod_codigo: 'codigo', prod_nombre: 'producto', prod_categoria: 'categoria',
            prod_ubicacion: 'ubicacion', prod_unidad: 'unidad',
            prod_stock: 'stock', prod_stock_seguridad: 'stock-seguridad', prod_stock_minimo: 'stock-minimo',
            prod_costo: 'costo', prod_precio: 'precio', prod_margen: 'margen',
            prod_descripcion: 'descripcion'
        });
    });

    /* ── Detalle Movimiento ── */
    $('#detalle_movimiento').on('show.bs.modal', function (e) {
        var b = $(e.relatedTarget);
        llenarDetalle(b, {
            mov_producto: 'producto', mov_lote: 'lote', mov_fecha: 'fecha',
            mov_responsable: 'responsable', mov_documento: 'documento',
            mov_stock_anterior: 'stock-anterior', mov_cantidad: 'cantidad',
            mov_stock_resultante: 'stock-resultante',
            mov_motivo: 'motivo', mov_observaciones: 'observaciones'
        });
        $('#mov_tipo_badge').html(badge(b.data('tipo'),
            { 'Entrada': 'success', 'Salida': 'danger', 'Ajuste': 'warning' }));
        $('#mov_cantidad').removeClass('text-success text-danger')
            .addClass(String(b.data('cantidad')).indexOf('-') === 0 ? 'text-danger' : 'text-success');
    });

    /* ── Detalle Vencimiento ── */
    $('#detalle_vencimiento').on('show.bs.modal', function (e) {
        var b = $(e.relatedTarget);
        llenarDetalle(b, {
            venc_codigo: 'codigo', venc_producto: 'producto', venc_lote: 'lote',
            venc_ubicacion: 'ubicacion', venc_cantidad: 'cantidad', venc_proveedor: 'proveedor',
            venc_ingreso: 'ingreso', venc_vencimiento: 'vencimiento', venc_dias: 'dias',
            venc_costo: 'costo', venc_valor: 'valor'
        });
        $('#venc_estado').html(badge(b.data('estado'),
            { 'Vigente': 'success', 'Por vencer': 'warning', 'Vencido': 'danger' }));
    });
    $('#btn_limpiar_inv').on('click', function () {
        $('#filtro_inv_busqueda, #filtro_inv_categoria, #filtro_inv_ubicacion, #filtro_inv_stock').val('');
        tablaInv.search('').columns().search('').draw();
    });

    /* Modal ajuste: carga los datos de la fila */
    $('#ajuste_inventario').on('show.bs.modal', function (e) {
        var fila = $(e.relatedTarget).closest('tr');
        $('#form_ajuste')[0].reset();
        $('#aj_producto').val(fila.find('td').eq(1).text().trim());
        $('#aj_stock_sistema').val(fila.find('td').eq(4).text().trim());
    });

    /* ── Productos ── */
    var tablaProd = $('#tabla_insumos').DataTable({
        responsive: true, dom: 'lrtip', pageLength: 10,
        columnDefs: [{ targets: [6], orderable: false, searchable: false }],
        language: idiomaDT
    });
    $('#filtro_prod_busqueda').on('input', function () { tablaProd.search(this.value).draw(); });
    $('#filtro_prod_categoria').on('change', function () { tablaProd.column(2).search(this.value).draw(); });
    $('#filtro_prod_ubicacion').on('change', function () { tablaProd.column(3).search(this.value).draw(); });
    $('#btn_limpiar_prod').on('click', function () {
        $('#filtro_prod_busqueda, #filtro_prod_categoria, #filtro_prod_ubicacion').val('');
        tablaProd.search('').columns().search('').draw();
    });

    /* ── Movimientos ── */
    var tablaMov = $('#tabla_movimientos').DataTable({
        responsive: true, dom: 'lrtip', pageLength: 10,
        order: [[0, 'desc']],
        columnDefs: [{ targets: [7], orderable: false, searchable: false }],
        language: idiomaDT
    });
    $('#filtro_mov_busqueda').on('input', function () { tablaMov.search(this.value).draw(); });
    $('#filtro_mov_tipo').on('change', function () { tablaMov.column(1).search(this.value).draw(); });
    $('#btn_limpiar_mov').on('click', function () {
        $('#filtro_mov_busqueda, #filtro_mov_tipo, #filtro_mov_desde, #filtro_mov_hasta').val('');
        tablaMov.search('').columns().search('').draw();
    });

    /* ── Vencimientos ── */
    var tablaVenc = $('#tabla_vencimientos').DataTable({
        responsive: true, dom: 'lrtip', pageLength: 10,
        columnDefs: [{ targets: [7], orderable: false, searchable: false }],
        language: idiomaDT
    });
    $('#filtro_venc_busqueda').on('input', function () { tablaVenc.search(this.value).draw(); });
    $('#filtro_venc_estado').on('change', function () { tablaVenc.column(6).search(this.value).draw(); });
    $('#btn_limpiar_venc').on('click', function () {
        $('#filtro_venc_busqueda, #filtro_venc_estado, #filtro_venc_rango').val('');
        tablaVenc.search('').columns().search('').draw();
    });

    /* ── Proveedores ── */
    var tablaProv = $('#tabla_proveedores').DataTable({
        responsive: true, dom: 'lrtip', pageLength: 10,
        columnDefs: [{ targets: [4], orderable: false, searchable: false }],
        language: idiomaDT
    });
    $('#filtro_prov_busqueda').on('input', function () { tablaProv.search(this.value).draw(); });
    $('#filtro_prov_estado').on('change', function () { tablaProv.column(3).search(this.value).draw(); });

    /* Modal detalle proveedor */
    $('#detalle_proveedor').on('show.bs.modal', function (e) {
        var b = $(e.relatedTarget);
        $('#det_rut').text(b.data('rut') || '—');
        $('#det_razon').text(b.data('razon') || '—');
        $('#det_giro').text(b.data('giro') || '—');
        $('#det_contacto').text(b.data('contacto') || '—');
        $('#det_telefono').text(b.data('telefono') || '—');
        $('#det_email').text(b.data('email') || '—');
        $('#det_web').text(b.data('web') || '—');
        $('#det_direccion').text(b.data('direccion') || '—');
        $('#det_ultima_compra').text(b.data('ultima-compra') || '—');
        $('#det_total_productos').text(b.data('total-productos') || 0);
        $('#det_observaciones').text(b.data('observaciones') || 'Sin observaciones');

        var estado = b.data('estado') || '';
        $('#det_estado').html('<span class="badge badge-' +
            (estado === 'Activo' ? 'success' : 'danger') + '">' + estado + '</span>');

        var productos = (b.data('productos') || '').toString();
        $('#det_productos').html(
            productos
                ? productos.split('|').map(function (p) {
                      return '<span class="badge badge-light mr-1 mb-1">' + p + '</span>';
                  }).join('')
                : '<span class="text-muted">Sin productos asociados</span>'
        );
    });
    $('#btn_limpiar_prov').on('click', function () {
        $('#filtro_prov_busqueda, #filtro_prov_estado').val('');
        tablaProv.search('').columns().search('').draw();
    });

    /* Recalcular anchos al cambiar de pestaña */
    $('a[data-toggle="pill"]').on('shown.bs.tab', function () {
        $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust().responsive.recalc();
    });

    /* ── Modal producto: agregar / editar + margen ── */
    $('#nuevo_insumo').on('show.bs.modal', function (e) {
        var esEdicion = $(e.relatedTarget).data('mode') === 'editar';
        $('#form_insumo')[0].reset();
        $('#insumo_margen').val('—');
        $('#insumo_titulo').text(esEdicion ? 'Editar Insumo' : 'Agregar Insumo');
        $('#insumo_id').val('');
        if (esEdicion) {
            var producto = productosPorId[$(e.relatedTarget).data('id')];
            if (!producto) return;
            $('#insumo_id').val(producto.id);
            $('#form_insumo [name="codigo"]').val(producto.codigo_interno);
            $('#form_insumo [name="nombre"]').val(producto.nombre);
            $('#form_insumo [name="categoria"]').val(producto.id_tipo_producto);
            $('#form_insumo [name="unidad"]').val(producto.id_unidad_medida);
            $('#form_insumo [name="ubicacion"]').val(producto.ubicacion);
            $('#form_insumo [name="stock_inicial"]').val(producto.stock_actual);
            $('#form_insumo [name="stock_seguridad"]').val(producto.stock_seguridad);
            $('#form_insumo [name="stock_minimo"]').val(producto.stock_minimo);
            $('#form_insumo [name="precio_venta"]').val(producto.precio_venta);
            $('#form_insumo [name="descripcion"]').val(producto.descripcion);
            $('#uso_implantologia').val(producto.es_implante ? '1' : '0');
            $('#tipo_insumo_implantologia').val(producto.id_tipo_insumo_implantologia || '');
            $('#form_insumo [name="marca_implante"]').val(producto.id_marca_implante || '');
        }
        actualizarCamposImplantologia();
    });

    function actualizarCamposImplantologia() {
        var activo = $('#uso_implantologia').val() === '1';
        var esImplante = activo && $('#tipo_insumo_implantologia').val() === '1';
        $('.campos-implantologia').toggleClass('d-none', !activo);
        $('.campo-marca-implante').toggleClass('d-none', !esImplante);
        $('#tipo_insumo_implantologia').prop('required', activo);
        $('#form_insumo [name="marca_implante"]').prop('required', esImplante);
    }
    $('#uso_implantologia, #tipo_insumo_implantologia').on('change', actualizarCamposImplantologia);

    $(document).on('click', '.btn-eliminar-insumo', function () {
        var id = $(this).data('id');
        swal({
            title: 'Eliminar insumo',
            text: 'Solo se podrá eliminar si todavía no está asociado a un tratamiento.',
            icon: 'warning', buttons: ['Cancelar', 'Eliminar'], dangerMode: true
        }).then(function (confirmado) {
            if (!confirmado) return;
            $.ajax({
                url: '{{ url('/profesional/gestion_insumos') }}/' + id,
                type: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: function (resp) {
                    swal('Correcto', resp.mensaje, 'success').then(function () { window.location.reload(); });
                },
                error: function (xhr) {
                    swal('No fue posible eliminar', (xhr.responseJSON && xhr.responseJSON.mensaje) || 'Revise la asociación del insumo.', 'error');
                }
            });
        });
    });

    /* Margen = (precio venta - costo promedio) / costo promedio */
    $('#insumo_precio_venta').on('input', function () {
        var costo  = parseFloat(($('#insumo_costo_promedio').val() || '').replace(/[^\d]/g, '')) || 0;
        var precio = parseFloat(this.value) || 0;
        if (costo > 0 && precio > 0) {
            $('#insumo_margen').val((((precio - costo) / costo) * 100).toFixed(1).replace('.', ',') + ' %');
        } else {
            $('#insumo_margen').val('—');
        }
    });

    /* ── Modal movimiento: preselecciona tipo según botón ── */
    $('#nuevo_movimiento').on('show.bs.modal', function (e) {
        var tipo = $(e.relatedTarget).data('tipo');
        $('#form_movimiento')[0].reset();
        if (tipo) {
            $('#mov_tipo').val(tipo);
            $('#mov_titulo').text('Registrar ' + tipo.charAt(0).toUpperCase() + tipo.slice(1));
        } else {
            $('#mov_titulo').text('Registrar Movimiento');
        }
    });

    /* ── Modal proveedor: agregar / editar ── */
    $(function () {
        $('#prov_productos').select2({
            placeholder: 'Seleccione productos que provee',
            width: '100%',
            closeOnSelect: false,
            dropdownParent: $('#prov_productos').closest('.form-group')
        });
    });

    $('#nuevo_proveedor').on('show.bs.modal', function (e) {
        var esEdicion = $(e.relatedTarget).data('mode') === 'editar';
        $('#form_proveedor')[0].reset();
        $('#prov_productos').val(null).trigger('change');
        $('#prov_titulo').text(esEdicion ? 'Editar Proveedor' : 'Agregar Proveedor');
    });

});
</script>
@endsection
