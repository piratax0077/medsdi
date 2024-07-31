@extends('template.contabilidad.template')
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
                            <h5 class="m-b-10 font-weight-bold">Escritorio Contabilidad</h5>
                        </div>

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.area_comercial') }}">Escritorio Adm. Comercial</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
		<div class="col-sm-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="card subir">
						  <a href="{{ ROUTE('contabilidad.secciones_contabilidad.rrhh') }}">
							<div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
								<h5 class="mt-1 mb-0">Recursos Humanos</h5>
							</div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card subir">
						  <a href="{{ ROUTE('contabilidad.secciones_contabilidad.info-pago_sueldos') }}">
							<div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
								<h5 class="mt-1 mb-0">Info sueldos Personal</h5>
							</div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card subir">
                       <a href="{{ ROUTE('contabilidad.secciones_contabilidad.liquidaciones') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                <h5 class="mt-1 mb-0">Liquidaciones a Profesionales</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
					<div class="card subir">
					   <a href="{{ ROUTE('contabilidad.secciones_contabilidad.remuneraciones') }}">
							<div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/flujo_caja_2.svg') }}">
								<h5 class="mt-1 mb-0">Planillas de Pago remuneraciones</h5>
							</div>
                        </a>
					</div>
				</div>
                <div class="col-md-3">
                    <div class="card subir">
                         <a href="{{ ROUTE('contabilidad.secciones_contabilidad.contable') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/flujo_caja_2.svg') }}">
                                <h5 class="mt-1 mb-0"> Libro Contable</h5>
                            </div>
                        </a>
                    </div>
                </div>
				{{--  <div class="col-md-3">
					<div class="card subir" onclick="en_construccion()";>  --}}
					   {{-- <a href="{{ ROUTE('asistente_adm.asistente_adm_pedidos') }}"></a>--}}
							{{--  <div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/flujo_caja_2.svg') }}">
								<h5 class="mt-1 mb-0">Imposiciones y leyes sociales</h5>
							</div>
						</a>
					</div>
				</div>  --}}
 {{--
				<div class="col-md-4">
                    <div class="card subir" onclick="en_construccion()";>
                        <a href="{{ ROUTE('asistente_adm.gastos') }}"></a>
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                            <h5 class="mt-1 mb-0">Pagos Personal del Centro</h5>
                        </div>
                    </div>
                </div>
--}}

                <div class="col-md-3">
                    <div class="card subir">
                          <a href="{{ ROUTE('contabilidad.secciones_contabilidad.ingresos') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/profesional_1.svg') }}">
                                <h5 class="mt-2">Ingresos</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card subir">
                        <a href="{{ ROUTE('contabilidad.secciones_contabilidad.egresos') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/profesional_1.svg') }}">
                                <h5 class="mt-2">Egresos</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card subir" onclick="en_construccion()";>
                        {{--  <a href="{{ ROUTE('asistente_adm.gastos') }}"></a>--}}
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                            <h5 class="mt-1 mb-0">Impuestos</h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card subir" onclick="en_construccion()";>
                    {{--  <a href="{{ ROUTE('asistente_adm.asistente_adm_pedidos') }}"></a>--}}
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/flujo_caja_2.svg') }}">
                                <h5 class="mt-1 mb-0">Convenios</h5>
                            </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card subir">
                          <a href="{{ ROUTE('proveedores') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/flujo_caja_2.svg') }}">
                                <h5 class="mt-1 mb-0"> Proveedores</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card subir">
                       <a href="{{ ROUTE('contabilidad.secciones_contabilidad.factura') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/flujo_caja_2.svg') }}">
                                <h5 class="mt-1 mb-0"> Facturar</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card subir" onclick="en_construccion()";>
                         {{--  <a href="{{ ROUTE('asistente_adm.gastos') }}"></a>--}}
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                            <h5 class="mt-1 mb-0">Estadisticas del Centro</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--CIERRE: Row Botones -->
    </div>
</div>
@include('app.adm_cm.modales.en_construccion')
<!--Cierre: Container Completo-->
@endsection
