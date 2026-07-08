@extends('template.adm_cm.template')

@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12 mt-4">
                            <div class="page-header-title">
                                <h5></h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('adm_cm.area_comercial') }}" data-toggle="tooltip" data-placement="top" title="Volver a escritorio Comercial">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Flujo de Caja</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

             <div class="row  mt-n3">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                    <div class="user-profile user-card pt-0 mt-2">
                        <div class="card-body py-0">
                            <div class="user-about-block m-0">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                        <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link text-reset active" id="resumen-cm-tab" data-toggle="tab" href="#resumen-cm" role="tab" aria-controls="resumen-cm" aria-selected="true">Resumen</a>
                                            </li>
                                             <li class="nav-item">
                                                <a class="nav-link text-reset" id="caja-cm-tab" data-toggle="tab" href="#caja-cm" role="tab" aria-controls="caja-cm" aria-selected="true">Gestión de cajas</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-reset" id="rendicion-cm-tab" data-toggle="tab" href="#rendicion-cm" role="tab" aria-controls="rendicion-cm" aria-selected="true">Rendiciones</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link text-reset" id="ventas-cm-tab" data-toggle="tab" href="#ventas-cm" role="tab" aria-controls="ventas-cm" aria-selected="true">Ventas</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link text-reset" id="garantia-cm-tab" data-toggle="tab" href="#garantia-cm" role="tab" aria-controls="garantia-cm" aria-selected="true">Registro de Garantías</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="row bg-gris">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                    <div class="tab-content" id="pills-tabContent">
                        {{-- RESUMEN --}}
                        <div class="tab-pane fade show active" id="resumen-cm" role="tabpanel" aria-labelledby="resumen-cm-tab">
                            <div class="row mt-3 px-2">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                    <h6 class="f-22 text-c-blue mb-3">Resumen financiero de INSI</h6>
                                </div>
                                 <!-- DIA -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="metric-card">

                                        <div class="metric-top">
                                            <div class="metric-icon bg-soft-green">
                                                💰
                                            </div>
                                        </div>

                                        <div class="metric-title">
                                            Total recaudado en el día
                                        </div>

                                        <div class="metric-value">
                                            ${{ number_format($total_dia ?? 0, 0, ',', '.') }}
                                        </div>
                                        <div class="metric-subtitle">
                                            {{ \Carbon\Carbon::now()->format('d \d\e F Y') }}
                                        </div>

                                    </div>
                                </div>

                                <!-- MES -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="metric-card">

                                        <div class="metric-top">

                                            <div class="metric-icon bg-soft-green">
                                                📅
                                            </div>

                                            <select class="metric-month">
                                                <option>Mayo 2026</option>
                                                <option>Abril 2026</option>
                                                <option>Marzo 2026</option>
                                                <option>Febrero 2026</option>
                                            </select>

                                        </div>

                                        <div class="metric-title">
                                            Total recaudado en el mes
                                        </div>

                                        <div class="metric-value">
                                            ${{ number_format($total_mes ?? 0, 0, ',', '.') }}
                                        </div>

                                        <div class="metric-subtitle">
                                            Recaudación mensual
                                        </div>

                                    </div>
                                </div>

                                <!-- AÑO -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="metric-card">

                                        <div class="metric-top">

                                            <div class="metric-icon bg-soft-green">
                                                🗓️
                                            </div>

                                            <select class="metric-month">
                                                <option>2026</option>
                                                <option>2025</option>
                                                <option>2024</option>
                                            </select>

                                        </div>

                                        <div class="metric-title">
                                            Total recaudado en el año
                                        </div>

                                        <div class="metric-value">
                                            ${{ number_format($total_anio ?? 0, 0, ',', '.') }}
                                        </div>

                                        <div class="metric-subtitle">
                                            Enero - Diciembre
                                        </div>

                                    </div>
                                </div>

                                <!-- COMPARACION -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="metric-card">

                                        <div class="metric-top">

                                            <div class="metric-icon bg-soft-green">
                                                📈
                                            </div>

                                            <select class="metric-month">
                                                <option>Mayo 2026</option>
                                                <option>Abril 2026</option>
                                                <option>Marzo 2026</option>
                                            </select>

                                        </div>

                                        <div class="metric-title">
                                            Comparación mes actual vs anterior
                                        </div>

                                        <div class="metric-value metric-positive">
                                            {{ $comparacion_mes ?? '+0%' }}
                                        </div>

                                        <div class="metric-subtitle">
                                            Respecto al mes anterior
                                        </div>

                                    </div>
                                </div>

                                <!-- BONOS -->
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="metric-card">

                                        <div class="metric-top">

                                            <div class="metric-icon bg-soft-blue">
                                                🎟️
                                            </div>

                                            <select class="metric-month">
                                                <option>Mayo 2026</option>
                                                <option>Abril 2026</option>
                                                <option>Marzo 2026</option>
                                            </select>

                                        </div>

                                        <div class="metric-title">
                                            Cantidad de bonos emitidos
                                        </div>

                                        <div class="metric-value">
                                            {{ $cant_bonos ?? 0 }}
                                        </div>

                                        <div class="metric-subtitle">
                                            Bonos emitidos en el período
                                        </div>

                                    </div>
                                </div>

                                <!-- RENDIDO -->
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="metric-card">

                                        <div class="metric-top">

                                            <div class="metric-icon bg-soft-purple">
                                                👨‍⚕️
                                            </div>

                                            <select class="metric-month">
                                                <option>Mayo 2026</option>
                                                <option>Abril 2026</option>
                                                <option>Marzo 2026</option>
                                            </select>

                                        </div>

                                        <div class="metric-title">
                                            Total rendido al médico
                                        </div>

                                        <div class="metric-value">
                                            @php
                                                $maxValue = 999999999;
                                                $valor = min($total_rendido ?? 0, $maxValue);
                                            @endphp
                                            ${{ number_format($valor, 0, ',', '.') }}
                                            @if(($total_rendido ?? 0) > $maxValue)
                                                <span class="text-danger" title="Valor truncado por ser demasiado grande">*</span>
                                            @endif
                                        </div>

                                        <div class="metric-subtitle">
                                            Rendición acumulada
                                        </div>

                                    </div>
                                </div>

                                <!-- PENDIENTE -->
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="metric-card">

                                        <div class="metric-top">

                                            <div class="metric-icon bg-soft-orange">
                                                ⏳
                                            </div>

                                            <select class="metric-month">
                                                <option>Mayo 2026</option>
                                                <option>Abril 2026</option>
                                                <option>Marzo 2026</option>
                                            </select>

                                        </div>

                                        <div class="metric-title">
                                            Pendiente por rendir
                                        </div>

                                        <div class="metric-value metric-warning">
                                            ${{ number_format($total_pendiente ?? 0, 0, ',', '.') }}
                                        </div>

                                        <div class="metric-subtitle">
                                            Pendiente de liquidación
                                        </div>

                                    </div>
                                </div>

                                <!-- GARANTIAS -->
                                <div class="col-12 mb-4">

                                    <div class="metric-card">

                                        <div class="d-flex flex-wrap align-items-center justify-content-between">

                                            <div class="d-flex align-items-center">

                                                <div class="metric-icon bg-soft-red mr-3">
                                                    🛡️
                                                </div>

                                                <div>
                                                    <div class="metric-title mb-1">
                                                        Garantías
                                                    </div>

                                                    <div class="metric-subtitle mt-0">
                                                        Control de garantías emitidas y vencidas
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="d-flex align-items-center flex-wrap">

                                                <div class="text-center mr-5">

                                                    <div class="metric-title">
                                                        Garantías emitidas
                                                    </div>

                                                    <div class="metric-value">
                                                        {{ $garantias_emitidas ?? 0 }}
                                                    </div>

                                                </div>

                                                <div class="text-center">

                                                    <div class="metric-title">
                                                        Garantías vencidas
                                                    </div>

                                                    <div class="metric-value metric-danger">
                                                        {{ $garantias_vencidas ?? 0 }}
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- CAJAS --}}
                        <div class="tab-pane fade" id="caja-cm" role="tabpanel" aria-labelledby="caja-cm-tab">
                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12 mb-2">
                                    <h6 class="f-22 text-c-blue mb-3 d-inline">Gestión de cajas</h6>

                                </div>
                            </div>
                             <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <div class="card py-0">
                                        <div class="card-body pb-2 pt-2">
                                            <ul class="nav nav-tabs-aten nav-fill" id="pills-tab" role="tablist">
                                                <!--<li class="nav-item">
                                                    <a class="nav-link-aten text-reset" id="cabiertacm-tab" data-toggle="pill" href="#cabiertacm" role="tab" aria-controls="cabiertacm" aria-selected="true">
                                                        Cajas Abiertas
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset" id="cerradacm-tab" data-toggle="pill" href="#cerradacm" role="tab" aria-controls="cerradacm" aria-selected="false">
                                                        Cajas Cerradas
                                                    </a>
                                                </li>-->
                                                 <li class="nav-item">
                                                    <a class="nav-link-aten text-reset active" id="entregacajacm-tab" data-toggle="pill" href="#entregacajacm" role="tab" aria-controls="cerradacm" aria-selected="false">
                                                       Entregas de caja
                                                    </a>
                                                </li>
                                                 <li class="nav-item">
                                                    <a class="nav-link-aten text-reset" id="registrarcajacm-tab" data-toggle="pill" href="#registrarcajacm" role="tab" aria-controls="cerradacm" aria-selected="false">
                                                       Registrar caja
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
                                        <!--CAJAS ABIERTAS-->
                                        <div class="tab-pane show active" id="cabiertacm" role="tabpanel" aria-labelledby="cabiertacm-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                            <div class="card">
                                                                <div class="card-header-new-md">
                                                                    <div class="row">
                                                                        <div class="pt-2 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                                            <h5 class=" d-inline">Cajas abiertas</h5>
                                                                              <button type="button" class="btn btn-sm btn-info d-inline float-md-right" data-toggle="modal" data-target="#abrircaja"> + Abrir caja </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <div class="dt-responsive table-responsive">
                                                                            <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Usuario</th>
                                                                                        <th>Apertura</th>
                                                                                        <th>Detalle</th>
                                                                                        <th>Saldo Anterior</th>
                                                                                        <th>Saldo inicial</th>
                                                                                        <th>Acumulado</th>
                                                                                        <th>Institución</th>
                                                                                         <th>Acciones</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @if(count($cajas) > 0)
                                                                                        @foreach($cajas as $caja)
                                                                                            <tr>
                                                                                                <td>
                                                                                                      <strong>{{ $caja->Usuario()->first()->nombres }} {{ $caja->Usuario()->first()->apellido_uno }}<br>
                                                                                                            {{ $caja->Usuario()->first()->rut }}</strong><br>
                                                                                                           <!--TIPO USUARIO-->
                                                                                                </td>
                                                                                                <td>
                                                                                                    {{ \Carbon\Carbon::parse($caja->fecha_apertura)->format('d/m/Y H:i') }}

                                                                                                </td>

                                                                                                <td>
                                                                                                    <button type="button" class="btn btn-info btn-xxs" data-toggle="modal" data-target="#modalCajacerrada">Ver caja N° {{ $caja->id }}</button>
                                                                                                </td>

                                                                                                <td>
                                                                                                    ${{ number_format($caja->saldo_anterior, 0, ',', '.') }}
                                                                                                </td>

                                                                                                <td>
                                                                                                    ${{ number_format($caja->saldo_inicial, 0, ',', '.') }}
                                                                                                </td>

                                                                                                <td>
                                                                                                    ${{ number_format($caja->acumulado, 0, ',', '.') }}
                                                                                                </td>

                                                                                                <td>
                                                                                                    INSI (Casa Matriz)<br><small>Avenida Vicuña Mackenna 864, Quilpué</small>
                                                                                                    <!--NOMBRE DEL LUGAR ARRIBA Y ABAJO PUEDE SER UBICACIÓN O CARACTERÍSTICA-->
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button class="btn btn-sm btn-success" onclick="cerrar_caja({{ $caja->id }});">Cerrar caja</button>
                                                                                                    <!--ELIMINAR CAJA -->
                                                                                                    <button class="btn btn-sm btn-danger" onclick="eliminar_caja({{ $caja->id }});">Eliminar caja</button>
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    @else
                                                                                        <tr>
                                                                                            <td colspan="9" class="text-center">No hay cajas abiertas actualmente.</td>
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
                                            </div>
                                        </div>
                                        <!--CAJA CERRADA-->
                                        <div class="tab-pane fade" id="cerradacm" role="tabpanel" aria-labelledby="cerradacm-tab">
                                        	<div class="row">

	                                                {{-- SECCIONES --}}
	                                                <div class="col-sm-12 col-md-12">
	                                                    <div class="tab-content" id="rendicion_caja">
	                                                        {{-- PESTAÑA REALIZAR CIERRE DE CAJA - VER RENDICIONES RECIBIDAS --}}
	                                                        <div class="tab-pane fade show active " role="tabpanel" aria-labelledby="cerradacajacm-tab" id="cerradacajacm">
		                                                    <div class="row">
			                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
			                                                            <div class="card">
                                                                            <div class="card-header-new-md">
                                                                                <div class="row">
                                                                                    <div class="pt-2 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                                                        <h5 class=" d-inline">Cajas cerradas</h5>
                                                                                          <button type="button" class="btn btn-sm btn-info d-inline float-md-right" data-toggle="modal" data-target="#abrircaja"> + Abrir caja </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
			                                                                <div class="card-body">
			                                                                    <div class="table-responsive">
			                                                                        <div class="dt-responsive table-responsive">
			                                                                            <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
			                                                                                <thead>
			                                                                                    <tr>
			                                                                                        <th>Usuario</th>
			                                                                                        <th>Apertura</th>
			                                                                                        <th>Cierre</th>
			                                                                                        <th>Detalle</th>
			                                                                                        <th>Total Abonos</th>
			                                                                                        <th>Total gastos</th>
			                                                                                        <th>Saldo cierre</th>
			                                                                                         <th>Institución</th>>
                                                                                                     <th>Acciones</th>
			                                                                                    </tr>
			                                                                                </thead>
			                                                                                <tbody>
			                                                                                    @if(count($cajas_cerradas) > 0)
                                                                                                    @foreach($cajas_cerradas as $caja)
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                  <strong>{{ $caja->Usuario()->first()->nombres }} {{ $caja->Usuario()->first()->apellido_uno }}<br>
                                                                                                                        {{ $caja->Usuario()->first()->rut }}</strong><br>
                                                                                                                       <!--TIPO USUARIO-->
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                {{ \Carbon\Carbon::parse($caja->fecha_apertura)->format('d/m/Y H:i') }}

                                                                                                            </td>

                                                                                                            <td>
                                                                                                                {{ \Carbon\Carbon::parse($caja->fecha_cierre)->format('d/m/Y H:i') }}

                                                                                                            </td>

                                                                                                            <td>
                                                                                                                <button type="button" class="btn btn-info btn-xxs" data-toggle="modal" data-target="#modalCajacerrada">Ver caja N° {{ $caja->id }}</button>
                                                                                                            </td>

                                                                                                            <td>
                                                                                                                ${{ number_format($caja->total_abonos, 0, ',', '.') }}
                                                                                                            </td>

                                                                                                            <td>
                                                                                                                ${{ number_format($caja->total_gastos, 0, ',', '.') }}
                                                                                                            </td>

                                                                                                            <td>
                                                                                                                ${{ number_format($caja->saldo_cierre, 0, ',', '.') }}
                                                                                                            </td>

                                                                                                            <td>
                                                                                                                INSI (Casa Matriz)<br><small>Avenida Vicuña Mackenna 864, Quilpué</small>
                                                                                                                <!--NOMBRE DEL LUGAR ARRIBA Y ABAJO PUEDE SER UBICACIÓN O CARACTERÍSTICA-->
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <button class="btn btn-sm btn-success" onclick="abrir_caja({{ $caja->id }});">Abrir caja</button>
                                                                                                                <!--ELIMINAR CAJA -->
                                                                                                                <button class="btn btn-sm btn-danger" onclick="eliminar_caja({{ $caja->id }});">Eliminar caja</button>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    @endforeach
                                                                                                @else
                                                                                                    <tr>
                                                                                                        <td colspan="9" class="text-center">No hay cajas cerradas actualmente.</td>
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

	                                                        <div class="tab-pane fade " role="tabpanel" aria-labelledby="pills-profile-tab" id="rendicion_rendicion">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card">
                                                                                <div class="card-body">
                    	                                                            <div class="row">
                    	                                                                <div class="col-md-12">
                    	                                                                    <h5 class="text-c-blue d-inline float-left f-18 pt-1">Cierres de Cajas {{ date('d-m-Y') }}</h5>
                    	                                                                </div>
                    	                                                            </div>
                    	                                                            <hr>
                    	                                                            <div class="form-row">
                    	                                                                <input type="hidden" name="lista_rendiciones" id="lista_rendiciones" value="{{ $lista_rendiciones }}">
                    	                                                                <input type="hidden" name="total_rendiciones" id="total_rendiciones" value="{{ $total_rendiciones }}">
                    	                                                                <div class="col-sm-6 col-md-2">
                    	                                                                    <div class="form-group">
                    	                                                                        <label class="floating-label-activo-sm">Número de Bonos</label>
                    	                                                                        <input type="number" class="form-control form-control-sm" id="numero_bonos_rendiciones" name="numero_bonos_rendiciones" value="{{ $total_bonos_rendiciones  }}" readonly="readonly">
                    	                                                                    </div>
                    	                                                                </div>
                    	                                                                <div class="col-sm-6 col-md-2">
                    	                                                                    <div class="form-group">
                    	                                                                        <label class="floating-label-activo-sm">Efectivo</label>
                    	                                                                        <input type="number" class="form-control form-control-sm" id="efectivo_rendiciones" name="efectivo_rendiciones" value="{{ $total_efectivo_rendicion  }}" readonly="readonly">
                    	                                                                    </div>
                    	                                                                </div>
                    	                                                                <div class="col-sm-6 col-md-2">
                    	                                                                    <div class="form-group">
                    	                                                                        <label class="floating-label-activo-sm">Otros</label>
                    	                                                                        <input type="number" class="form-control form-control-sm" id="otros_rendiciones" name="otros_rendiciones" value="{{ $total_otros_rendicion  }}" readonly="readonly">
                    	                                                                    </div>
                    	                                                                </div>
                    	                                                                <div class="col-sm-6 col-md-2">
                    	                                                                    <div class="form-group">
                    	                                                                        <label class="floating-label-activo-sm">Total Documentos</label>
                    	                                                                        <input type="number" class="form-control form-control-sm" id="total_documentos_rendiciones" name="total_documentos_rendiciones" value="{{ $total_documentos_rendiciones  }}" readonly="readonly">
                    	                                                                    </div>
                    	                                                                </div>
                    	                                                                <div class="col-sm-6 col-md-2">
                    	                                                                    <div class="form-group">
                    	                                                                        <label class="floating-label-activo-sm">Recibe Caja :</label>
                    	                                                                        <select name="id_asistente_receptor_rendiciones" id="id_asistente_receptor_rendiciones" class="form-control form-control-sm">
                    	                                                                            @if($listado_recibe)
                    	                                                                                @foreach ( $listado_recibe as $recibe )
                    	                                                                                    <option value="{{ $recibe->id }}">{{ strtoupper($recibe->nombres.' '.$recibe->apellido_uno.' '.$recibe->apellido_dos) }}</option>
                    	                                                                                @endforeach
                    	                                                                            @endif
                    	                                                                        </select>
                    	                                                                    </div>
                    	                                                                </div>
                    	                                                                <div class="col-sm-12 col-md-2 text-center">
                    	                                                                    <button class="btn btn-block btn-sm btn-info" onclick="rendir_cierre();" id="btn_rendicion_cierre_dia">Cierres de Cajas</button>
                    	                                                                </div>
                    	                                                            </div>

                    	                                                            <div class="row">
                    	                                                                <div class="col-sm-12 col-md-12">
                    	                                                                    <table id="tabla_rendir_rendiciones" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                    	                                                                        <thead>
                    	                                                                            <tr>
                    	                                                                                <th class="text-center align-middle">ID REND</th>
                    	                                                                                <th class="text-center align-middle">Asistente</th>
                    	                                                                                <th class="text-center align-middle">Receptor</th>
                    	                                                                                <th class="text-center align-middle">F/Recepción</th>
                    	                                                                                <th class="text-center align-middle">Bonos</th>
                    	                                                                                <th class="text-center align-middle">Efectivo</th>
                    	                                                                                <th class="text-center align-middle">Otros</th>
                    	                                                                                <th class="text-center align-middle">T. Doc.</th>
                    	                                                                                <th class="text-center align-middle">T. Doc Adj.</th>
                    	                                                                                <th class="text-center align-middle">Detalle</th>
                    	                                                                            </tr>
                    	                                                                        </thead>
                    	                                                                        <tbody>
                    	                                                                            @if( isset($rendiciones) )
                    	                                                                                @foreach($rendiciones as $key_r => $value_r)
                    	                                                                                @if($value_r->AsistenteReceptor()->first())
                    	                                                                                    <tr>
                    	                                                                                        <td class="align-middle text-center">{{ $value_r->id }}</td>
                    	                                                                                        <td class="align-middle text-center">
                    	                                                                                            <span>{{ $value_r->Asistente()->first()->nombres }} {{ $value_r->Asistente()->first()->apellido_uno }} {{ $value_r->Asistente()->first()->apellido_dos }}</span><br>
                    	                                                                                            <span>{{ $value_r->Asistente()->first()->rut }}</span>
                    	                                                                                        </td>
                    	                                                                                        <td class="align-middle text-center">
                    	                                                                                            <span>{{ $value_r->AsistenteReceptor()->first()->nombres }} {{ $value_r->AsistenteReceptor()->first()->apellido_uno }} {{ $value_r->AsistenteReceptor()->first()->apellido_dos }}</span><br>
                    	                                                                                            <span>{{ $value_r->AsistenteReceptor()->first()->rut }}</span>
                    	                                                                                        </td>
                    	                                                                                        <td class="align-middle text-center">{{ $value_r->fecha_rendicion }}</td>
                    	                                                                                        <td class="align-middle text-center">{{ $value_r->total_bono }}</td>
                    	                                                                                        <td class="align-middle text-center">${{ number_format($value_r->total_efectivo, 0, ",", ".") }}</td>
                    	                                                                                        <td class="align-middle text-center">{{ $value_r->total_otros }}</td>
                    	                                                                                        <td class="align-middle text-center">{{ $value_r->total_documentos }}</td>
                    	                                                                                        <td class="align-middle text-center">
                    	                                                                                            <div>
                    	                                                                                                <button  class="btn btn-block btn-sm btn-info" onclick="ver_archivos('{{ $value_r->id }}');">Ver</button>
                    	                                                                                                <div style=" background-color: red; border-radius: 90px; width: 25px; height: 25px; padding: 5px; color: white; font-weight: bold; position: relative; top: -40px;">{{ $value_r->cantidad_archivos }}</div>
                    	                                                                                            </div>
                    	                                                                                        </td>
                    	                                                                                        <td class="align-middle text-center"><button  class="btn btn-block btn-sm btn-info" onclick="ver_datalle_rendicion('{{ $value_r->id }}');">Ver</button></td>
                    	                                                                                    </tr>
                    	                                                                                @endif
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

	                                                        {{-- PESTAÑA CIERRE DE CAJAS DIARIAS --}}
	                                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
	                                                        </div>

	                                                        {{-- PESTAÑA DE HISTORICO CIERR DE CAJAS --}}
	                                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
	                                                        </div>

	                                                    </div>

	                                                </div>

				                            </div>
                                        </div>
                                         <!--ENTREGAS DE CAJAS-->
                                        <div class="tab-pane fade" id="entregacajacm" role="tabpanel" aria-labelledby="entregacajacm-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                            <div class="card">
                                                                <div class="card-header-new-md">
                                                                    <div class="row">
                                                                        <div class="pt-2 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                                            <h5>Entregas de cajas</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <div class="dt-responsive table-responsive">
                                                                            <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="align-middle">Entrega</th>
                                                                                        <th class="align-middle">Recibe</th>
                                                                                        <th class="align-middle">Fecha / Hora</th>
                                                                                        <th class="align-middle">Monto</th>
                                                                                        <th class="align-middle">Sucursal</th>
                                                                                        <th class="align-middle">Estado</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <strong>Nombre Usuario <br>
                                                                                            18.233.434-1</strong><br>
                                                                                            <small>Asistente</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>Laura mena  <br>
                                                                                            18.233.434-1</strong><br>
                                                                                            <small>Administrador</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            12/05/2026 10:55

                                                                                        </td>
                                                                                        <td>
                                                                                               $1.553.345
                                                                                        </td>
                                                                                        <td>
                                                                                            INSI (Casa Matriz)<br><small>Avenida Vicuña Mackenna 864, Quilpué</small>
                                                                                            <!--NOMBRE DEL LUGAR ARRIBA Y ABAJO PUEDE SER UBICACIÓN O CARACTERÍSTICA-->
                                                                                        </td>
                                                                                        <td><span class="badge badge-success">Completado</span></td>
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
                                         <!--REGISTRO DE CAJAS-->
                                        <div class="tab-pane fade" id="registrarcajacm" role="tabpanel" aria-labelledby="registrarcajacm-tab">
                                           <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="card">
                                                         <div class="card-header-new-md">
                                                            <div class="row">
                                                                <div class="pt-2 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                                    <h5 class=" d-inline">Registro de cajas</h5>
                                                                      <button type="button" class="btn btn-sm btn-info d-inline float-md-right" data-toggle="modal" data-target="#registrarcaja"> + Registrar caja</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <div class="dt-responsive table-responsive">
                                                                    <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Nombre</th>
                                                                                <th>Ubicación</th>
                                                                                <th>Insitución</th>
                                                                                <th>Acción</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    Nombre de la caja o N°
                                                                                </td>
                                                                                <td>
                                                                                    Descripcion de ubicacion
                                                                                </td>
                                                                                   <td>
                                                                                    INSI (Casa Matriz)<br><small>Avenida Vicuña Mackenna 864, Quilpué</small>
                                                                                    <!--NOMBRE DEL LUGAR ARRIBA Y ABAJO PUEDE SER UBICACIÓN O CARACTERÍSTICA-->
                                                                                </td>
                                                                                <td><button class="btn btn-warning btn-icon"><i class="feather icon-edit"></i></button>
                                                                                    <button class="btn btn-danger btn-icon"><i class="feather icon-x"></i></button></td>
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

                        </div>

                        {{-- RENDICIONES --}}
                        <div class="tab-pane fade" id="rendicion-cm" role="tabpanel" aria-labelledby="rendicion-cm-tab">
                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                    <h6 class="f-22 text-c-blue mb-3">Rendiciones</h6>
                                </div>
                                <div class="col-12">
                                	<div class="card">
                                		<div class="card-body">
		                                    <div class="table-responsive w-100">
		                                        <table id="tabla_rendir_caja" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
		                                            <thead>
		                                                <tr>
		                                                    <th class="align-middle">Id Recepción</th>
		                                                    <th class="align-middle">Fecha</th>
		                                                    <th class="align-middle">Rendido por</th>
		                                                    <th class="align-middle">Receptor</th>
		                                                    <th class="align-middle">Total Documentos</th>
		                                                    <th class="align-middle">Total Bonos</th>
		                                                    <th class="align-middle">Total Efectivo</th>
		                                                    <th class="align-middle">Total Otros</th>
		                                                    <th class="align-middle">Acciones</th>
		                                                </tr>
		                                            </thead>
		                                            <tbody>
		                                                @if( isset($rendiciones) )
		                                                    @foreach($rendiciones as $key_b => $value_b)
		                                                        @php
		                                                            $estado = $value_b->estado;
		                                                            if($estado == 1){
		                                                                $estado = 'EN ESPERA';
		                                                            }elseif($estado == 2){
		                                                                $estado = 'OTRO';
		                                                            }elseif($estado == 3){
		                                                                $estado = 'APROBADA';
		                                                            }else if($estado == 4){
		                                                                $estado = 'RECHAZADA';
		                                                            }
		                                                        @endphp
		                                                        <tr>
		                                                            <td class="align-middle">{{ $value_b->id }}</td>
		                                                            <td class="align-middle">{{ $value_b->fecha_rendicion }}</td>
		                                                            <td class="align-middle">{{ optional($value_b->Asistente()->first())->nombres }} {{ optional($value_b->Asistente()->first())->apellido_uno }} {{ optional($value_b->Asistente()->first())->apellido_dos }}</td>
		                                                            <td class="align-middle">{{ optional($value_b->AsistenteReceptor()->first())->nombres }} {{ optional($value_b->AsistenteReceptor()->first())->apellido_uno }} {{ optional($value_b->AsistenteReceptor()->first())->apellido_dos }}</td>
		                                                            <td class="align-middle">{{ $value_b->total_documentos }}</td>
		                                                            <td class="align-middle">{{ $value_b->total_bono }}</td>
		                                                            <td class="align-middle">${{ number_format($value_b->total_efectivo, 0, ",", ".") }}</td>
		                                                            <td class="align-middle">{{ $value_b->total_otros }}</td>
		                                                            <td class="align-middle">
		                                                                <button class="btn btn-primary-light-c btn-xxs" onclick="ver_rendicion({{ $value_b->id }})">Ver</button>
		                                                                <button class="btn btn-secondary btn-xxs" onclick="ver_pdf_rendicion({{ $value_b->id }},{{ optional($value_b->Asistente()->first())->id }})">Ver PDF</button>
		                                                                <div class="switch switch-success d-inline m-l-5">
		                                                                    <input type="checkbox"
		                                                                           id="switch_rendicion_{{ $value_b->id }}"
		                                                                           onchange="cambiarEstadoRendicion(this)"
		                                                                           data-id="{{ $value_b->id }}"
		                                                                           data-email="{{ optional($value_b->Asistente()->first())->email }}"
		                                                                           {{ $estado == 'APROBADA' ? 'checked' : '' }}>
		                                                                    <label for="switch_rendicion_{{ $value_b->id }}" class="cr"></label>
		                                                                </div>
		                                                                <label style="font-size: 11px;">Aprobar</label>
		                                                            </td>
		                                                        </tr>
		                                                    @endforeach
		                                                @else
		                                                    <tr>
		                                                        <td colspan="9" class="text-center">No hay rendiciones registradas.</td>
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

                        {{--  VENTAS --}}
                        <div class="tab-pane fade" id="ventas-cm" role="tabpanel" aria-labelledby="ventas-cm-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12 mt-3 mb-2">
                                    <h5 class="text-c-blue d-inline float-left f-22 pt-1">Ventas </h5>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <div class="card py-0">
                                        <div class="card-body pb-2 pt-2">
                                            <ul class="nav nav-tabs-aten nav-fill" id="pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset active" id="venta-bonocm-tab" data-toggle="pill" href="#venta-bonocm" role="tab" aria-controls="venta-bonocm" aria-selected="true">
                                                        Venta de Bonos
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset" id="ventaprogramacm-tab" data-toggle="pill" href="#ventaprogramacm" role="tab" aria-controls="ventaprogramacm" aria-selected="false">
                                                        Venta de programas
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset" id="ventatotalprofcm-tab" data-toggle="pill" href="#ventatotalprofcm" role="tab" aria-controls="ventatotalprofcm" aria-selected="false">
                                                        Resumen de ventas por profesional
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
                                        <!--VENTA BONOS-->
                                        <div class="tab-pane show active" id="venta-bonocm" role="tabpanel" aria-labelledby="venta-bonocm-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <h5 class="text-c-blue d-inline float-left f-18">Bonos</h5>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <div class="dt-responsive table-responsive">
                                                                            <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="align-middle">Paciente</th>
                                                                                        <th class="align-middle">Convenio</th>
                                                                                        <th class="align-middle">Tipo atención</th>
                                                                                        <th class="align-middle">Fecha de atención</th>
                                                                                        <th class="align-middle">Profesional</th>
                                                                                        <th class="align-middle">Monto</th>
                                                                                        <th class="align-middle">Medio de pago</th>
                                                                                        <th class="align-middle">Vendido por</th>
                                                                                         <th class="align-middle">Sucursal</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <strong>Juan Perez<br>
                                                                                            18.233.434-1</strong>
                                                                                        </td>
                                                                                        <td>
                                                                                            Banmédica<br>
                                                                                            <small>CÓD: 723874</small>

                                                                                        </td>
                                                                                        <td>
                                                                                            <span>Consulta</span><br>
                                                                                            <small>Bono emitido por institución</small><!--CLASE-->
                                                                                        </td>
                                                                                        <td>
                                                                                            5/6/2026<!--FECHA--><br>
                                                                                            10:23 <!--HORA-->
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>Jaime Kriman<br>
                                                                                            823982934-9</strong>
                                                                                            <br>
                                                                                            <small>Otorrinolaringología</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            $45.000
                                                                                        </td>
                                                                                        <td>
                                                                                            Débito
                                                                                        </td>

                                                                                        <td>
                                                                                            <strong>Nombre Usuario <br>
                                                                                            18.233.434-1</strong><br>
                                                                                            <small>Asistente</small><!--TIPO USUARIO-->
                                                                                        </td>
                                                                                        <td>
                                                                                            INSI (Casa Matriz)<br><small>Avenida Vicuña Mackenna 864, Quilpué</small>
                                                                                            <!--NOMBRE DEL LUGAR ARRIBA Y ABAJO PUEDE SER UBICACIÓN O CARACTERÍSTICA-->
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
                                        <!--VENTA PROGRAMAS-->
                                        <div class="tab-pane" id="ventaprogramacm" role="tabpanel" aria-labelledby="ventaprogramacm-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <h5 class="text-c-blue d-inline float-left f-18">Programas</h5>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <div class="dt-responsive table-responsive">
                                                                            <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="align-middle">Paciente</th>
                                                                                        <th class="align-middle">Convenio</th>
                                                                                         <th class="align-middle">Tipo atención</th>
                                                                                        <th class="align-middle">N° Programa</th>
                                                                                        <th class="align-middle">Fecha de atención</th>
                                                                                        <th class="align-middle">Profesional</th>
                                                                                        <th class="align-middle">Monto</th>
                                                                                        <th class="align-middle">Medio de pago</th>
                                                                                        <th class="align-middle">Vendido por</th>
                                                                                         <th class="align-middle">Sucursal</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <strong>Juan Perez<br>
                                                                                            18.233.434-1</strong>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span>Fonasa</span><br>
                                                                                            <small>849839</small><!--CLASE-->
                                                                                        </td>
                                                                                        <td>
                                                                                            <span>Consulta</span><br>
                                                                                            <small>Bono emitido por institución</small><!--CLASE-->
                                                                                        </td>
                                                                                        <td>
                                                                                            N° 10<br>
                                                                                            <small>CÓD: 48874</small>

                                                                                        </td>
                                                                                        <td>
                                                                                            8/6/2026<!--FECHA--><br>
                                                                                            15:13 <!--HORA-->
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>Jaime Kriman<br>
                                                                                            823982934-9</strong><br>
                                                                                            <small>Otorrinolaringología</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            $105.000
                                                                                        </td>
                                                                                        <td>
                                                                                            Débito
                                                                                        </td>

                                                                                        <td>
                                                                                            <strong>Nombre Usuario <br>
                                                                                                            18.233.434-1</strong><br>
                                                                                                            <small>Asistente</small><!--TIPO USUARIO-->
                                                                                        </td>
                                                                                        <td>
                                                                                            INSI (Casa Matriz)<br><small>Avenida Vicuña Mackenna 864, Quilpué</small>
                                                                                            <!--NOMBRE DEL LUGAR ARRIBA Y ABAJO PUEDE SER UBICACIÓN O CARACTERÍSTICA-->
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
                                         <!--RESUMEN VENTAS POR PROFESIONAL-->
                                        <div class="tab-pane" id="ventatotalprofcm" role="tabpanel" aria-labelledby="ventatotalprofcm-tab">
                                            <div class="row">
                                               <!-- <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <h5 class="text-c-blue d-inline float-left f-18">Resumen diario de ventas por profesional</h5>
                                                </div>-->
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                            <div class="card">
                                                                <div class="card-header-new-md">
                                                                    <h5>Resumen diario de ventas por profesional</h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <div class="dt-responsive table-responsive">
                                                                            <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="align-middle">Profesional</th>
                                                                                        <th class="align-middle">Fecha</th>
                                                                                        <th class="align-middle"> Total Bonos</th>
                                                                                         <th class="align-middle"> Total Programas</th>
                                                                                         <th class="align-middle">Sucursal</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <strong>Juan Perez<br>
                                                                                            18.233.434-1</strong>
                                                                                            <small>Especialidad</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span>5/5/2026</span><br>
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>10</strong><br>
                                                                                            <small>$100.234</small><!--CLASE-->
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>5</strong><br>
                                                                                            <small>$55.000</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            INSI (Casa Matriz)<br><small>Avenida Vicuña Mackenna 864, Quilpué</small>
                                                                                            <!--NOMBRE DEL LUGAR ARRIBA Y ABAJO PUEDE SER UBICACIÓN O CARACTERÍSTICA-->
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
                                </div>
                            </div>

                        </div>
                        {{--  PESTAÑA DE REGISTRO GARANTIA --}}
                        <div class="tab-pane fade" id="garantia-cm" role="tabpanel" aria-labelledby="garantia-cm-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12 mt-3 mb-2">
                                    <h5 class="text-c-blue d-inline float-left f-22 pt-1">Registro de garantía</h5>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <div class="card py-0">
                                        <div class="card-body pb-2 pt-2">
                                            <ul class="nav nav-tabs-aten nav-fill" id="pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset active" id="garantia-pendiente-tab" data-toggle="pill" href="#garantia-pendiente" role="tab" aria-controls="garantia-pendiente" aria-selected="true">
                                                        Garantías pendientes de pago
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset" id="garantia-pagada-tab" data-toggle="pill" href="#garantia-pagada" role="tab" aria-controls="garantia-pagada" aria-selected="false">
                                                        Garantías pagadas
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
                                        <!--GARANTIAS PENDIENTE DE PAGO-->
                                        <div class="tab-pane show active" id="garantia-pendiente" role="tabpanel" aria-labelledby="garantia-pendiente-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <h5 class="text-c-blue d-inline float-left f-18">Garantías pendiente de pago</h5>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <div class="dt-responsive table-responsive">
                                                                            <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="align-middle">Profesional</th>
                                                                                        <th class="align-middle">Paciente</th>
                                                                                           <th class="align-middle">Sucursal</th>
                                                                                        <th class="align-middle">Monto <br>Garantía</th>
                                                                                        <th class="align-middle">Convenio</th>
                                                                                        <th class="align-middle">Tipo <br>atención</th>
                                                                                        <th class="align-middle">Emisión</th>
                                                                                        <th class="align-middle">Vencimiento</th>
                                                                                        <th class="align-middle">Días <br>restantes</th>
                                                                                        <th class="align-middle">Estado</th>
                                                                                        <th class="align-middle">Venta por</th>

                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                         <td>
                                                                                            <strong>Jaime Kriman</strong><br>
                                                                                            <strong>75465656-7</strong><br>
                                                                                            <small>Otorrinolaringología</small><!-- ESPECIALIDAD-->
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>Juan Perez</strong><br>
                                                                                            18.233.434-1
                                                                                        </td>
                                                                                        <td>
                                                                                            INSI Casa Matriz
                                                                                        </td>
                                                                                        <td>
                                                                                            $30.000
                                                                                        </td>
                                                                                        <td>
                                                                                            PONER CONVENIO<br>
                                                                                            <small>CÓD: PONER CODIGO</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            Consulta<br>
                                                                                            <small>Estado: Poner estado de consulta</small>
                                                                                        </td>
                                                                                         <td>
                                                                                            30/5/2026
                                                                                        </td>
                                                                                        <td>
                                                                                            5/6/2026
                                                                                        </td>
                                                                                        <td>
                                                                                            6 días
                                                                                        </td>
                                                                                        <td>
                                                                                            <h6><span class="badge badge-warning">Por vencer</span></h6>
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>Nombre Usuario</strong><br>
                                                                                            <strong>18.233.434-1</strong><br>
                                                                                            <small>Asistente</small>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                         <td>
                                                                                            <strong>Nombre Apellido</strong><br>
                                                                                            <strong>RUT75465656-7</strong><br>
                                                                                            <small>Especialidad</small><!-- ESPECIALIDAD-->
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>Pepito Perez</strong><br>
                                                                                            7.343.434-9
                                                                                        </td>
                                                                                        <td>
                                                                                            INSI Casa Matriz
                                                                                        </td>
                                                                                        <td>
                                                                                            $18.500
                                                                                        </td>
                                                                                         <td>
                                                                                            PONER CONVENIO<br>
                                                                                            <small>CÓD: PONER CODIGO</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            Programa<br>
                                                                                            <small>Estado: Poner estado de consulta</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            30/5/2026
                                                                                        </td>
                                                                                        <td>
                                                                                            19/5/2026
                                                                                        </td>
                                                                                        <td>
                                                                                            0 días
                                                                                        </td>
                                                                                        <td>
                                                                                            <h6><span class="badge badge-danger">Vencido</span></h6>
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>Nombre Usuario</strong><br>
                                                                                            <strong>18.233.434-1</strong><br>
                                                                                            <small>Asistente</small>
                                                                                        </td>
                                                                                    </tr>
                                                                                     <tr>
                                                                                        <td>
                                                                                            <strong>Nombre Apellido</strong><br>
                                                                                            <strong>RUT75465656-7</strong><br>
                                                                                            <small>Especialidad</small><!-- ESPECIALIDAD-->
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>Alejandra Perez</strong><br>
                                                                                            9.643.434-k
                                                                                        </td>
                                                                                        <td>
                                                                                            INSI Casa Matriz
                                                                                        </td>
                                                                                        <td>
                                                                                            $50.500
                                                                                        </td>
                                                                                         <td>
                                                                                            PONER CONVENIO<br>
                                                                                            <small>CÓD: PONER CODIGO</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            Consulta<br>
                                                                                            <small>Estado: Poner estado de consulta</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            30/5/2026
                                                                                        </td>
                                                                                        <td>
                                                                                            14/6/2026
                                                                                        </td>
                                                                                        <td>
                                                                                            12 días
                                                                                        </td>
                                                                                        <td>
                                                                                            <h6><span class="badge badge-success">Vigente</span></h6>
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>Nombre Usuario</strong><br>
                                                                                            <strong>18.233.434-1</strong><br>
                                                                                            <small>Asistente</small>
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
                                        <!--GARANTIAS PAGADAS-->
                                        <div class="tab-pane" id="garantia-pagada" role="tabpanel" aria-labelledby="garantia-pagada-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <h5 class="text-c-blue d-inline float-left f-18">Garantías pagadas</h5>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <div class="dt-responsive table-responsive">
                                                                            <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="align-middle">Profesional</th>
                                                                                        <th class="align-middle">Paciente</th>
                                                                                        <th class="align-middle">Sucursal</th>
                                                                                        <th class="align-middle">Monto<br> Garantía</th>
                                                                                        <th class="align-middle">Convenio</th>
                                                                                        <th class="align-middle">Tipo<br> atención</th>
                                                                                        <th class="align-middle">Emisión</th>
                                                                                        <th class="align-middle">Fecha <br>de pago</th>
                                                                                        <th class="align-middle">Medio <br>de pago</th>
                                                                                         <th class="align-middle">Venta por</th>
                                                                                        <th class="align-middle">Estado</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <strong>Jaime Kriman</strong><br>
                                                                                            <strong>75465656-7</strong><br>
                                                                                            <small>Otorrinolaringología</small><!-- ESPECIALIDAD-->
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>Juan Perez</strong><br>
                                                                                            18.233.434-1
                                                                                        </td>
                                                                                         <td>
                                                                                            INSI Casa Matriz
                                                                                        </td>
                                                                                        <td>
                                                                                            $30.000
                                                                                        </td>
                                                                                         <td>
                                                                                            PONER CONVENIO<br>
                                                                                            <small>CÓD: PONER CODIGO</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            Consulta<br>
                                                                                            <small>Estado: Poner estado de consulta</small>
                                                                                        </td>
                                                                                         <td>
                                                                                            1/10/2026
                                                                                        </td>
                                                                                         <td>
                                                                                            1/10/2026
                                                                                        </td>
                                                                                        <td>
                                                                                            Efectivo
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>Nombre Usuario</strong><br>
                                                                                            <strong>18.233.434-1</strong><br>
                                                                                            <small>Asistente</small>
                                                                                        </td>
                                                                                        <td>
                                                                                            <h6><span class="badge badge-success">Pagado</span></h6>
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
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- REGISTRAR CAJA -->
<div class="modal fade" id="registrarcaja" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-dialog-centered" role="document">

        <div class="modal-content border-0 shadow">
            <div class="modal-header ">
                <h2 class="modal-title font-weight-bold">
                    Registrar caja
                </h2>

                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <!-- Body -->
            <div class="modal-body pt-3">
                <div class="form-row">
                    <div class="col-12">
                        <form>
                            <div class="form-group">
                                 <div class="col-12">
                                    <label  class="text-dark font-weight-bold">Nombre o N° de caja </label>
                                    <input type="text" class="form-control" required placeholder="Ej: Caja 1, Caja principal, etc." id="nombre_caja">
                                </div>
                              </div>
                             <div class="form-group">
                                 <div class="col-12">
                                    <label  class="text-dark font-weight-bold">Ubicación</label>
                                    <input type="text" class="form-control" required placeholder="Ej: Primer piso." id="ubicacion_caja">

                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-12">
                                     <h6  class="text-dark font-weight-bold mb-1">Institución</h6>
                                    <select class="form-control mt-2">
                                        <option>Seleccione Institución</option>
                                       @foreach($sucursales as $suc)
                                        <option value="{{ $suc->id_lugar_atencion }}">{{ $suc->nombre }}</option>
                                       @endforeach
                                    </select>

                                </div>
                              </div>
                        </form>
                    </div>
                </div>

            <div class="modal-footer">
                <button class="btn btn-info px-4 mt-2">
                    <i class="feather icon-check"></i> Registrar Caja
                </button>
            </div>

        </div>

    </div>
</div>

<!--MODAL RENDICIONES-->
<div id="ver_rendicion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ver_rendicion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Rendición Caja Diaria</h5>
                <button type="button" class="close text-white" aria-label="Close" data-dismiss="modal" onclick="cerrar_modal_rendicion()" ><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <!-- El contenido se carga dinámicamente por AJAX -->
            </div>
           <!-- <div class="modal-footer">
                <div class="row w-100">
                    <div class="col-md-6">
                        <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal" onclick="cerrar_modal_rendicion()">Cancelar</button>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</div>

<!-- MODAL ABRIR CAJA -->
<div class="modal fade" id="abrircaja" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-dialog-centered" role="document">

        <div class="modal-content border-0 shadow">

            <!-- Header -->
            <div class="modal-header ">
                <h2 class="modal-title font-weight-bold">
                    Abrir caja
                </h2>

                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <!-- Body -->
            <div class="modal-body pt-3">
                <div class="form-row">
                    <div class="col-12">
                        <form>
                            <div class="form-group">
                                 <div class="col-12">
                                    <label  class="text-dark font-weight-bold">Nombre o N° de caja </label>
                                    <input type="text" class="form-control" required placeholder="Ej: Caja 1, Caja principal, etc." id="nombre_caja">
                                </div>
                              </div>
                             <div class="form-group">
                                 <div class="col-12">
                                    <label  class="text-dark font-weight-bold">Responsable</label>
                                  <select class="custom-select" required id="responsable_caja">
                                      <option selected>Seleccione Responsable</option>
                                        @foreach ($responsables as $responsable)
                                              <option value="{{ $responsable->id }}" class="text-uppercase">{{ $responsable->nombre_profesional }} {{ $responsable->apellido_uno_profesional }} {{ $responsable->apellido_dos_profesional }} - {{ $responsable->nombre }}</option>
                                         @endforeach

                                </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-12">
                                     <label  class="text-dark font-weight-bold">Saldo final caja anterior</label>
                                    <input type="text" class="form-control" required placeholder="$0" id="saldo_final_caja_anterior">
                                </div>
                              </div>
                               <div class="form-group">
                                <div class="col-12">
                                    <label  class="text-dark font-weight-bold">Abono inicial de caja</label>
                                    <input type="text" class="form-control" required placeholder="$0" id="abono_inicial_caja">
                                </div>
                              </div>
                        </form>
                    </div>
                     <div class="col-12 px-4">
                        <div class="alert alert-primary text-justify" role="alert">
                            <i class="feather icon-info font-weight-bold "></i> ABONO INICIAL DE CAJA:<br>
                            Este valor corresponde al dinero que se deja disponible al momento de abrir la caja.
                            Su finalidad es contar con efectivo suficiente para entregar vuelto durante las recaudaciones o pagos realizados en el día.
                            <br>
                            Si no necesita asignar un monto inicial para la apertura de esta caja, puede ingresar 0.
                        </div>
                     </div>
                </div>

            <div class="modal-footer">
                <button class="btn btn-info px-4 mt-2" onclick="guardar_caja()">
                    <i class="feather icon-check"></i> Abrir caja
                </button>
            </div>

        </div>

    </div>
</div>

<!--DETALLE CAJA ABIERTA-->
<div class="modal fade" id="modalCajaabierta" tabindex="-1" role="dialog" aria-labelledby="modalCajaabierta" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-white border-bottom">
                <div>
                    <h4 class="mb-0 font-weight-bold">
                        Total caja N°2
                    </h4>
                    <h6><span class="badge badge-pill badge-success">CAJA ABIERTA</span></h6>
                </div>

                <div class="text-right">
                    <h2 class="mb-0 font-weight-bold text-success">
                        $515.465
                    </h2>
                </div>
            </div>
            <div class="modal-body">

                <!-- Estado de la caja -->
                <div class="alert alert-success d-flex align-items-center  flex-wrap shadow-sm caja-alert">
                    <div class="font-weight-semibold mb-2 mb-md-0">
                        <strong>Caja abierta:</strong>
                        Ingrese la cantidad de dinero que quedará en la caja luego del cierre
                    </div>
                <div class="d-flex align-items-center ml-3">
                    <input
                        type="number"
                        class="form-control form-control-sm mr-2 input-caja"
                        placeholder="$0"
                    >

                    <!-- BTN PARA CERRAR LA CAJA-->
                    <button class="btn btn-danger btn-sm w-100" onclick="cerrar_caja({{ $caja->id }})">
                         <i class="feather icon-x"></i>
                        Cerrar caja
                    </button>
                 </div>

            </div>

                <div class="row mb-4">
                    <div class="col-6">
                        <div class="card-lineal shadow-sm h-100">
                            <div class="card-body d-flex align-items-center">


                                    <i class="feather icon-user icono-primary"></i>


                                <div>
                                    <small class="text-muted d-block">
                                        Asistente
                                    </small>

                                    <h5 class="mb-0 font-weight-bold">
                                        Nombre asistente
                                    </h5>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-lineal shadow-sm h-100">
                            <div class="card-body d-flex align-items-center">
                                <i class="feather icon-home icono-primary"></i>
                                <div>
                                    <small class="text-muted d-block">
                                        Sucursal
                                    </small>

                                    <h5 class="mb-0 font-weight-bold">
                                        Insi
                                    </h5>
                                </div>

                            </div>
                        </div>
                    </div>
               </div>
                <!-- Tabla -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover bg-white table-sm">
                        <tbody>

                            <tr>
                                <td class="font-weight-bold">Fecha apertura</td>
                                <td class="text-right">12/05/2026 10:55</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Saldo anterior</td>
                                <td class="text-right">$0</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Abono inicial</td>
                                <td class="text-right">$0</td>
                            </tr>

                            <tr class="table-secondary">
                                <td class="font-weight-bold">Saldo inicial total</td>
                                <td class="text-right font-weight-bold">$0</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Efectivo (cantidad: 4)</td>
                                <td class="text-right">$10</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Recaudado</td>
                                <td class="text-right">$550.465</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold text-danger">Gastos (-)</td>
                                <td class="text-right text-danger">-$35.000</td>
                            </tr>

                            <tr class="table-light">
                                <td class="font-weight-bold">
                                    Total caja <br>
                                    <small>(recaudado + saldo inicial + reingresos - devoluciones - gastos)</small>
                                </td>
                           <td class="text-right font-weight-bold h5 text-success">
                                    $515.465
                                </td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Saldo cierre</td>
                                <td class="text-right">$0</td>
                            </tr>

                        </tbody>

                    </table>
                </div>

                <div class="row my-4">
                    <div class="col-12 mb-3 ">
                        <h5 class="text-dark"><i class="feather icon-credit-card icono-primary"></i> Transacciones (00/00/0000)<!--PONER FECHA DEL CIERRE--> </h5>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                        <div class="table-responsive">
                            <div class="dt-responsive table-responsive">
                                <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">Paciente</th>
                                            <th class="align-middle">Convenio</th>
                                            <th class="align-middle">Tipo atención</th>
                                            <th class="align-middle">Profesional</th>
                                            <th class="align-middle">Boleta</th>
                                            <th class="align-middle">Monto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <strong>Juan Perez<br>
                                                18.233.434-1</strong>
                                            </td>
                                            <td>
                                                Banmédica<br>
                                                <small>CÓD: 723874</small>
                                            </td>
                                            <td>
                                                <span>Consulta</span><br>
                                                <small>Bono emitido por institución</small><!--CLASE-->
                                            </td>
                                            <td>
                                                <strong>Jaime Kriman<br>
                                                823982934-9</strong>
                                                <br>
                                                <small>Otorrinolaringología</small>
                                            </td>  <td>
                                               #564654654
                                            </td>
                                            <td>
                                                $45.000<br>
                                                <small>Débito</small> <!--MEDIO DE PAGO-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Juan Perez<br>
                                                18.233.434-1</strong>
                                            </td>
                                            <td>
                                                Fonasa<br>
                                                <small>CÓD: 234432</small>
                                            </td>
                                            <td>
                                                <span>Programa</span><br>
                                                <span>N° 732847</span><br>
                                                <small>Bono emitido por institución</small><!--CLASE-->
                                            </td>
                                            <td>
                                                <strong>Jaime Kriman<br>
                                                823982934-9</strong>
                                                <br>
                                                <small>Otorrinolaringología</small>
                                            </td>  <td>
                                               #564654654
                                            </td>
                                            <td>
                                                $45.000<br>
                                                <small>Débito</small> <!--MEDIO DE PAGO-->
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
<!--Cierre: Container Completo-->

<!--DETALLE CAJA CERRADA-->
<div class="modal fade" id="modalCajacerrada" tabindex="-1" role="dialog" aria-labelledby="modalCajacerrada" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow">
            <!-- Header -->
            <div class="modal-header bg-white border-bottom">
                <div>
                    <h4 class="mb-0 font-weight-bold">
                        Total caja N°2
                    </h4>
                     <h6><span class="badge badge-pill badge-danger">CAJA CERRADA</span></h6>
                </div>

                <div class="text-right">
                    <h2 class="mb-0 font-weight-bold text-success">
                        $515.465
                    </h2>
                </div>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
				    <div class="col-6">
				        <div class="card-lineal shadow-sm h-100">
				            <div class="card-body d-flex align-items-center">

				                    <i class="feather icon-user icono-primary"></i>

				                <div>
				                    <small class="text-muted d-block">
				                        Asistente
				                    </small>

				                    <h5 class="mb-0 font-weight-bold">
				                        Nombre asistente
				                    </h5>
				                </div>

				            </div>
				        </div>
				    </div>
				    <div class="col-6">
				        <div class="card-lineal shadow-sm h-100">
				            <div class="card-body d-flex align-items-center">
				            	<i class="feather icon-home icono-primary"></i>
				                <div>
				                    <small class="text-muted d-block">
				                        Sucursal
				                    </small>

				                    <h5 class="mb-0 font-weight-bold">
				                        Insi
				                    </h5>
				                </div>

				            </div>
				        </div>
				    </div>
			   </div>
                <!-- Tabla -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover bg-white table-sm">
                        <tbody>

                            <tr>
                                <td class="font-weight-bold">Fecha apertura</td>
                                <td class="text-right">12/05/2026 10:55</td>
                            </tr>
                              <tr>
                                <td class="font-weight-bold">Fecha Cierre</td>
                                <td class="text-right">12/05/2026 20:55</td>
                            </tr>


                            <tr>
                                <td class="font-weight-bold">Saldo anterior</td>
                                <td class="text-right">$0</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Abono inicial</td>
                                <td class="text-right">$0</td>
                            </tr>

                            <tr class="table-secondary">
                                <td class="font-weight-bold">Saldo inicial total</td>
                                <td class="text-right font-weight-bold">$0</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Efectivo (cantidad: 4)</td>
                                <td class="text-right">$10</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Recaudado</td>
                                <td class="text-right">$550.465</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold text-danger">Gastos (-)</td>
                                <td class="text-right text-danger">-$35.000</td>
                            </tr>

                            <tr class="table-light">
                                <td class="font-weight-bold">
                                    Total caja <br>
                                    <small>(recaudado + saldo inicial + reingresos - devoluciones - gastos)</small>
                                </td>
                           <td class="text-right font-weight-bold h5 text-success">
                                    $515.465
                                </td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Saldo cierre</td>
                                <td class="text-right">$0</td>
                            </tr>

                        </tbody>

                    </table>
                </div>

                <div class="row my-4">
                	<div class="col-12 mb-3 ">
                		<h5 class="text-dark"><i class="feather icon-credit-card icono-primary"></i> Transacciones (00/00/0000)<!--PONER FECHA DEL CIERRE--> </h5>
                	</div>
                	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                        <div class="table-responsive">
                            <div class="dt-responsive table-responsive">
                                <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">Paciente</th>
                                            <th class="align-middle">Convenio</th>
                                            <th class="align-middle">Tipo atención</th>
                                            <th class="align-middle">Profesional</th>
                                            <th class="align-middle">Boleta</th>
                                            <th class="align-middle">Monto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <strong>Juan Perez<br>
                                                18.233.434-1</strong>
                                            </td>
                                            <td>
                                                Banmédica<br>
                                                <small>CÓD: 723874</small>
                                            </td>
                                            <td>
                                                <span>Consulta</span><br>
                                                <small>Bono emitido por institución</small><!--CLASE-->
                                            </td>
                                            <td>
                                                <strong>Jaime Kriman<br>
                                                823982934-9</strong>
                                                <br>
                                                <small>Otorrinolaringología</small>
                                            </td>  <td>
                                               #564654654
                                            </td>
                                            <td>
                                                $45.000<br>
                                                <small>Débito</small> <!--MEDIO DE PAGO-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Juan Perez<br>
                                                18.233.434-1</strong>
                                            </td>
                                            <td>
                                                Fonasa<br>
                                                <small>CÓD: 234432</small>
                                            </td>
                                            <td>
                                                <span>Programa</span><br>
                                                <span>N° 732847</span><br>
                                                <small>Bono emitido por institución</small><!--CLASE-->
                                            </td>
                                            <td>
                                                <strong>Jaime Kriman<br>
                                                823982934-9</strong>
                                                <br>
                                                <small>Otorrinolaringología</small>
                                            </td>  <td>
                                               #564654654
                                            </td>
                                            <td>
                                                $45.000<br>
                                                <small>Débito</small> <!--MEDIO DE PAGO-->
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
<!--Cierre: Container Completo-->
@endsection

@section('page-script')
    <script>

 $(document).ready(function() {
        $('#tabla_rendiciones_cm').DataTable({
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
            }
        });
    });
    </script>
<script>
    function ver_rendicion(id){
        let url = "{{ route('flujo_caja.profesional.rendicion.show', ':id') }}";
        url = url.replace(':id', id);
        $.ajax({
            url: url,
            type: 'GET',
            success: function(data){
                console.log(data);
                // abrir modal
                $('#ver_rendicion').modal('show');
                $('#ver_rendicion .modal-body').html(data);
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function ver_pdf_rendicion(id, id_asistente){
        let url = "{{ route('flujo_caja.profesional.rendicion.pdf', [':id', ':id_asistente']) }}";
        url = url.replace(':id', id).replace(':id_asistente', id_asistente);
        $.ajax({
            url: url,
            type: 'GET',
            success: function(data){
                let url = data.ruta;
                let height = 800;
                let width = 1200;
                let left = (screen.width / 2) - (width / 2);
                let top = (screen.height / 2) - (height / 2);
                let options = 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left;
                window.open(url, 'pdf_rendicion', options);
            },
            error: function(error){
                console.log(error);
            }
        });
    }
     function cerrar_modal_rendicion(){
        $('#ver_rendicion').modal('hide');
    }

    function cambiarEstadoRendicion(element) {
        const id = element.getAttribute('data-id');
        const email = element.getAttribute('data-email');
        const checked = element.checked;

        if (checked) {
            swal({
                title: "¿Aprobar rendición?",
                text: "Una vez aprobada, no podrá ser modificada.",
                icon: "warning",
                buttons: true,
                dangerMode: false,
            }).then((aceptar) => {
                if (aceptar) {
                    confirmar_aprobar_rendicion(id, email);
                } else {
                    // Si el usuario cancela, revertimos el switch
                    element.checked = false;
                    // Actualizar estado de botón de recepción
                    seleccionar_bonos_rendicion();
                }
            });
        } else {
            swal({
                title: "¿Rechazar rendición?",
                text: "Una vez rechazada, no podrá ser modificada.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((aceptar) => {
                if (aceptar) {
                    rechazar_rendicion(id, email);
                } else {
                    // Si el usuario cancela, revertimos el switch
                    element.checked = true;
                    // Actualizar estado de botón de recepción
                    seleccionar_bonos_rendicion();
                }
            });
        }
        // Actualizar el estado del botón de recepción después de cualquier cambio
        setTimeout(function() {
            seleccionar_bonos_rendicion();
        }, 100);
    }

    function guardar_caja(){
        let nombre_caja = $('#nombre_caja').val();
        let responsable_caja = $('#responsable_caja').val();
        let saldo_final_caja_anterior = $('#saldo_final_caja_anterior').val();
        let abono_inicial_caja = $('#abono_inicial_caja').val();

        let valido = 1;
        let mensaje = "Corrija los siguientes errores:<br><br>";

        if(!nombre_caja || nombre_caja.trim() === ""){
            valido = 0;
            mensaje += "- El campo 'Nombre o N° de caja' es obligatorio.<br>";
        }

        if(!responsable_caja || responsable_caja === "Seleccione Responsable"){
            valido = 0;
            mensaje += "- El campo 'Responsable' es obligatorio.<br>";
        }

        if(!saldo_final_caja_anterior || isNaN(saldo_final_caja_anterior) || Number(saldo_final_caja_anterior) < 0){
            valido = 0;
            mensaje += "- El campo 'Saldo final caja anterior' debe ser un número válido mayor o igual a 0.<br>";
        }

        if(!abono_inicial_caja || isNaN(abono_inicial_caja) || Number(abono_inicial_caja) < 0){
            valido = 0;
            mensaje += "- El campo 'Abono inicial de caja' debe ser un número válido mayor o igual a 0.<br>";
        }

        if(valido === 0){
            swal({
                title: "Error",
                content: document.createElement('div'),
                icon: "error",
            });
            $('.swal-content').html(mensaje);
            return;
        }

        $.ajax({
            url: "{{ route('flujo_caja.abrir_caja') }}",
            type: 'POST',
            data: {
                nombre_caja: nombre_caja,
                responsable_caja: responsable_caja,
                saldo_final_caja_anterior: saldo_final_caja_anterior,
                abono_inicial_caja: abono_inicial_caja,
                _token: "{{ csrf_token() }}"
            },
            success: function(data) {
                console.log(data);
                $('#abrircaja').modal('hide');
                swal("¡Caja abierta exitosamente!", {
                    icon: "success",
                }).then(() => {
                    location.reload(); // Recargar la página para reflejar cambios
                });
            },
            error: function(error) {
                console.log(error);
                swal("Error al abrir caja", {
                    icon: "error",
                });
            }
        });
    }

    function cerrar_caja(id){
        swal({
            title: "¿Cerrar caja?",
            text: "Una vez cerrada, no podrá ser modificada.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((aceptar) => {
            if (aceptar) {
                // Generar la URL con el id de la caja
                let url = "{{ route('flujo_caja.cerrar_caja', ['id' => 'ID_CIERRE']) }}".replace('ID_CIERRE', id);
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        console.log(data);
                        $('#modalCajaabierta').modal('hide');
                        swal("¡Caja cerrada exitosamente!", {
                            icon: "success",
                        }).then(() => {
                            location.reload(); // Recargar la página para reflejar cambios
                        });
                    },
                    error: function(error) {
                        console.log(error);
                        swal("Error al cerrar caja", {
                            icon: "error",
                        });
                    }
                });
            }
        });
    }
</script>
<script>
    function confirmar_aprobar_rendicion(id, email) {
        let url = "{{ route('flujo_caja.profesional.rendicion.aprobar', ':id') }}";
        url = url.replace(':id', id);

        $.ajax({
            url: url,
            type: 'GET',
            success: function(data) {
                let rendiciones = data.rendiciones;
                $('#ver_rendicion').modal('hide');

                swal("¡Rendición aprobada y correo enviado a " + email + "!", {
                    icon: "success",
                });

                let table = $('#tabla_rendir_caja').DataTable();
                table.clear().draw();

                for (let i = 0; i < rendiciones.length; i++) {
                    let r = rendiciones[i];
                    let nombreCompleto = `${r.asistente.nombres} ${r.asistente.apellido_uno} ${r.asistente.apellido_dos}`;
                    let acciones = generarAccionesRendicion(r.id, r.asistente.email, r.asistente.id, r.estado); // <-- ¡Importante!

                    table.row.add([
                        r.id,
                        r.fecha_rendicion,
                        nombreCompleto,
                        "2", // Aquí puedes reemplazar si quieres cargar dinámicamente el tipo
                        r.estado,
                        acciones
                    ]).draw(false);
                }
            },
            error: function(error) {
                console.log(error);
                swal("Error al aprobar rendición", {
                    icon: "error",
                });
            }
        });
    }

    function seleccionar_bonos_rendicion(){
        console.log('seleccionar bonos rendicion');

        // Obtener el estado del checkbox "enviar_todos"
        var enviarTodos = document.getElementById('enviar_todos');
        var table = $('#tabla_rendir_caja').DataTable();

        // Usar DataTables API para obtener TODAS las filas (todas las páginas)
        var allRows = table.rows().nodes();
        var checkboxes = $(allRows).find('input[id^="switch_rendicion_"]');

        // Si se activó "enviar_todos", seleccionar/deseleccionar todas las rendiciones
        if (event && event.target && event.target.id === 'enviar_todos') {
            if (enviarTodos.checked) {
                // Si se marca "enviar_todos", seleccionar todas
                checkboxes.each(function() {
                    this.checked = true;
                });
            } else {
                // Si se desmarca "enviar_todos", restaurar al estado inicial (solo aprobadas)
                checkboxes.each(function() {
                    // Buscar en la fila padre si el estado es "APROBADA"
                    var fila = $(this).closest('tr');
                    var estadoCell = fila.find('td').eq(4); // La columna de estado es la 5ta (índice 4)
                    var estadoTexto = estadoCell.text().trim();

                    // Solo marcar si el estado es APROBADA
                    this.checked = (estadoTexto === 'APROBADA');
                });
            }
        }

        // Contar rendiciones seleccionadas usando DataTables API
        var seleccionados = [];
        checkboxes.each(function() {
            if (this.checked) {
                var rendicionId = $(this).attr('data-id');
                if (rendicionId) {
                    seleccionados.push(rendicionId);
                }
            }
        });

        console.log('Rendiciones seleccionadas:', seleccionados);
        console.log('Total checkboxes encontrados:', checkboxes.length);

        // Mostrar/ocultar botón según selección
        var boton = document.getElementById('iniciar_procesocobro_rendicion_2');
        if(seleccionados.length > 0){
            boton.style.display = 'block';
        }else{
            boton.style.display = 'none';
        }

        // Verificar si todas las rendiciones están seleccionadas para marcar/desmarcar "enviar_todos"
        var todasSeleccionadas = true;
        checkboxes.each(function() {
            if (!this.checked) {
                todasSeleccionadas = false;
                return false; // break del each
            }
        });

        // Solo marcar "enviar_todos" si TODAS están seleccionadas
        enviarTodos.checked = todasSeleccionadas && checkboxes.length > 0;

        return seleccionados;
    }
</script>
<div class="mb-2">
    <input type="checkbox" id="enviar_todos" onchange="seleccionar_bonos_rendicion()" />
    <label for="enviar_todos" style="font-size: 13px;">Seleccionar/Deseleccionar todos</label>
</div>
<div class="col-12 mt-2">
                                    <button id="iniciar_procesocobro_rendicion_2" class="btn btn-success" style="display:none;" onclick="iniciarProcesoCobro()">
                                        Iniciar Proceso de Cobro
                                    </button>
                                </div>
@endsection
</div>




