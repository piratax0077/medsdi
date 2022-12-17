@extends('template.profesional.template')
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
                                <h5 class="m-b-10 font-weight-bold">Diagnósticos CIE 1O</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('profesional.configuracion') }}" data-toggle="tooltip" data-placement="top" title="Volver a panel de configuración">Panel de Configuración</a></li>
                                <li class="breadcrumb-item"><a href="#">Configuración Diagnósticos CIE 1O</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h4 class="text-white f-20 text-center mb-0">Diagnósticos Frecuentes CIE-10</h4>
                        </div>
                        <div class="card-body">
                            <div class="container row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-form-label-sm-active">Ingrese texto buesqueda</label>
                                        <input type="text" name="text_busqueda_cie10" id="text_busqueda_cie10">
                                        <div class="btn btn-success" onclick="buscar_diagnosticos_cie10();">Buscar</div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group ">
                                        <label for="todos_diagnosticos_cie10" class="cr">Activar Todos los diagnosticos Seleccionados</label>
                                        <div class="switch switch-success d-inline m-r-10">
                                            <input type="checkbox" id="todos_diagnosticos_cie10" onchange="activar_diagnosticos_cie10();">
                                            {{--  <label for="todos_diagnosticos_cie10" class="cr">Activar Todos los diagnosticos Seleccionados</label>  --}}
                                            <label for="todos_diagnosticos_cie10" class="cr"></label>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="btn btn-success" onclick="guardar_diagnosticos_cie10_profesional();">Guardar Diagnósticos Seleccionados</div>
                                </div>
                                <div class="col-md-12">
                                        <label class="label">*Por cada busqueda si realiza modificación debe <span class="" style="font-weight: bold;">"Guardar Diagnósticos Seleccionados"</span></label>
                                </div>
                                <div class="col-md-12">
                                    <table id="tabla_configuracion_cie10" class="display table table-striped table-hover dt-responsive nowrap table-xs"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-wrap text-center" style="width: 20%;">Código</th>
                                                <th class="text-center" style="width: 60%;">Descripción</th>
                                                <th class="text-center" style="width: 9%;">Activar</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            {{--  @foreach ($diagnostico as $df)

                                                <tr>
                                                    <td class="" style="width: 20%;">{{ $df->codigo }}
                                                    </td>
                                                    <td class="" style="width: 60%;">{{ $df->descripcion }}
                                                    </td>
                                                    <td class="" style="width: 9%;">

                                                        <div class="switch switch-success d-inline m-r-10">
                                                            <input type="checkbox" id="diagnostico_{{ $df->id }}">
                                                            <label for="diagnostico_{{ $df->id }}" class="cr"></label>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach  --}}

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            {{--  {{ $diagnostico->links() }}  --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->
@endsection
