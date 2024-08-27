@extends('template.adm_cm.template')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">

            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Reportes</h5>

                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('comercial') }}">Administracion del centro médico</a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('comercial') }}">Reportes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <!--Card Nav Pills-->
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills bg-white" id="personal_cm" role="tablist">
                        <li class="nav-item active">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="diario-tab" data-toggle="tab" href="#diario" role="tab" aria-controls="diario" aria-selected="false">Reporte Diario</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="mensual-tab" data-toggle="tab" href="#mensual" role="tab" aria-controls="mensual" aria-selected="false">Reporte Mensual</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="anual-tab" data-toggle="tab" href="#anual" role="tab" aria-controls="salidas" aria-selected="false">Reporte Anual</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-12 align-botton">
                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Reportes</h4>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="Profesionales_cm">
                        <div class="tab-pane fade active show" id="diario" role="tabpanel" aria-labelledby="diario-tab">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="fecha" class="floating-label-activo-sm">Fecha</label>
                                        <input type="date" class="form-control w-100" id="fecha">

                                    </div>
                                    <button class="btn btn-outline-success btn-sm w-100 my-3">Buscar</button>
                                </div>
                                <div class="col-md-9">
                                    <table class="table w-100" id="tabla_reporte_diario">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Producto</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Precio</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01/01/2021</td>
                                                <td>Producto 1</td>
                                                <td>10</td>
                                                <td>100</td>
                                                <td>1000</td>
                                            </tr>
                                            <tr>
                                                <td>01/01/2021</td>
                                                <td>Producto 2</td>
                                                <td>20</td>
                                                <td>200</td>
                                                <td>4000</td>
                                            </tr>
                                            <tr>
                                                <td>01/01/2021</td>
                                                <td>Producto 3</td>
                                                <td>30</td>
                                                <td>300</td>
                                                <td>9000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="mensual" role="tabpanel" aria-labelledby="mensual-tab">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <label for="mes" class="floating-label-activo-sm">Mes</label>
                                            <select class="form-control w-100" id="mes">
                                                <option value="1">Enero</option>
                                                <option value="2">Febrero</option>
                                                <option value="3">Marzo</option>
                                                <option value="4">Abril</option>
                                                <option value="5">Mayo</option>
                                                <option value="6">Junio</option>
                                                <option value="7">Julio</option>
                                                <option value="8">Agosto</option>
                                                <option value="9">Septiembre</option>
                                                <option value="10">Octubre</option>
                                                <option value="11">Noviembre</option>
                                                <option value="12">Diciembre</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="mes_year" class="floating-label-activo-sm">Mes</label>
                                            <select class="form-control w-100" id="mes_year">
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                            </select>
                                        </div>
                                    </div>

                                    <button class="btn btn-outline-success btn-sm w-100 my-3">Buscar</button>
                                </div>
                                <div class="col-md-9">
                                    <table class="table w-100" id="tabla_reporte_mensual">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Producto</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Precio</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01/01/2021</td>
                                                <td>Producto 1</td>
                                                <td>10</td>
                                                <td>100</td>
                                                <td>1000</td>
                                            </tr>
                                            <tr>
                                                <td>01/01/2021</td>
                                                <td>Producto 2</td>
                                                <td>20</td>
                                                <td>200</td>
                                                <td>4000</td>
                                            </tr>
                                            <tr>
                                                <td>01/01/2021</td>
                                                <td>Producto 3</td>
                                                <td>30</td>
                                                <td>300</td>
                                                <td>9000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="anual" role="tabpanel" aria-labelledby="anual-tab">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="year" class="floating-label-activo-sm">Año</label>
                                        <select class="form-control w-100" id="year">
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>

                                    </div>
                                    <button class="btn btn-outline-success btn-sm w-100 my-3">Buscar</button>
                                </div>
                                <div class="col-md-9">
                                    <table class="table w-100" id="tabla_reporte_anual">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Producto</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Precio</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01/01/2021</td>
                                                <td>Producto 1</td>
                                                <td>10</td>
                                                <td>100</td>
                                                <td>1000</td>
                                            </tr>
                                            <tr>
                                                <td>01/01/2021</td>
                                                <td>Producto 2</td>
                                                <td>20</td>
                                                <td>200</td>
                                                <td>4000</td>
                                            </tr>
                                            <tr>
                                                <td>01/01/2021</td>
                                                <td>Producto 3</td>
                                                <td>30</td>
                                                <td>300</td>
                                                <td>9000</td>
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
@endsection
