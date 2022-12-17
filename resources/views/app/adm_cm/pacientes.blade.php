@extends('template.adm_cm.template')
@section('content')
{{--  ESTILOS PROPIOS DE LA VISTA   --}}
@section('page-styles')
    <link href='{{ asset('css/perfiles_usuarios.css') }}' rel='stylesheet' />
@endsection

{{--  CONTENIDO  --}}
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
                            <h5 class="m-b-10 font-weight-bold">Pacientes</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="pacientes.php">Pacientes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
         <!--Buscador de pacientes-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="row">
                                <div class="col-md-12 align-botton">
                                    <h4 class="text-white f-20 d-inline ml-4 mt-3">Pacientes</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-12">
                                    <table id="pacientes_asistente" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Paciente</th>
                                            <th class="text-center align-middle">Rut</th>
                                            <th class="text-center align-middle">Contacto</th>
                                            <th class="text-center align-middle">Previsión</th>
                                            <th class="text-center align-middle">Tipo de usuario</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle">Pepita Vargas Díaz<br>
                                            </td>
                                            <td class="text-center align-middle">22.234.455-0</td>
                                            <td class="align-middle text-center">
												<!--Botón Modal-->
												<button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto();" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="fab fa-contao"></i></button>
											</td>
                                            <td class="text-center align-middle">Colmena</td>
                                            <td class="align-middle text-center">
                                                <span class="badge badge-primary">Básico</span>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="text-center align-middle">juan Perez Díaz<br>
                                            </td>
                                            <td class="text-center align-middle">22.234.455-0</td>
                                            <td class="align-middle text-center">
												<!--Botón Modal-->
												<button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto();" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="fab fa-contao"></i></button>
											</td>
                                            <td class="text-center align-middle">Colmena</td>
                                            <td class="align-middle text-center">
                                                <span class="badge badge-primary">Básico</span>
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
