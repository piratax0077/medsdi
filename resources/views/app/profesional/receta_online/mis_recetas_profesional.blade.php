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
                                <h5 class="m-b-10 font-weight-bold">Mis recetas</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('profesional.index_receta_online') }}"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Volver a inicio de receta online">Receta Online</a></li>
                                <li class="breadcrumb-item"><a href="#">Mis Recetas</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="f-20 text-c-blue">Mis recetas</h6>
                            </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-12">
                                    <table id="tabla_recetas_profesional_ro"
                                        class="display table table-striped dt-responsive nowrap table-xs"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Fecha</th>
                                                <th class="text-center align-middle">Paciente</th>
                                                <th class="text-center align-middle">Diagnóstico</th>
                                                <!--th class="text-center align-middle">Acción</th>-->
                                                <!-- <th class="text-center align-middle">Estado</th>-->
                                                <th class="text-center align-middle">Receta</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ficha as $fic)
                                                @if(!empty($fic->recetas) && $fic->recetas !=null && count($fic->recetas)>0)
                                                <tr>
                                                    <td class="text-wrap text-center align-middle">
                                                        {{ $fic->created_at }}
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        {{ $fic->Paciente()->first()->nombres }}<br>
                                                        {{ $fic->Paciente->first()->rut }}
                                                    </td>
                                                    <td class="align-middle text-center">{{ $fic->motivo }}</td>
                                                    <!--<td class="align-middle text-center">
                                                        <button type="button" class="btn  btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Enviar Receta a Paciente"><i class="feather icon-navigation"></i></button>
                                                    </td>-->
                                                    <!--<td class="align-middle text-center">
                                                    </td>-->
                                                    <td class="align-middle text-center">
                                                        {{-- <a href="{{ route('profesional.ver_recetas_pdf', $fic->id) }}"><img src="{{ asset('images/documento.svg') }}" alt="Documento" height="20px"> Ver Receta</a> --}}
                                                        <div onclick="ver_pdf_receta('{{ $fic->id }}')"><img src="{{ asset('images/documento.svg') }}" alt="Documento" height="20px"> Ver</div>
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
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
    <!-- Modal recetas profesional-->
    <!--<div id="agregar_receta_profesional_ro" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="agregar_receta_profesional_ro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Agregar receta</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="recetas_profesional">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <h6 class="text-c-blue ml-2 mb-3">Ingrese los datos del paciente</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label">Rut</label>
                                    <input type="person" class="form-control" name="rut_paciente" id="rut_paciente">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label">Edad</label>
                                    <input type="number" class="form-control" name="edad_paciente" id="edad_paciente">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label">Nombres</label>
                                    <input type="text" class="form-control" name="nombres_paciente" id="nombres_paciente">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label">Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos_paciente"
                                        id="apellidos_paciente">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label">Dirección</label>
                                    <input type="address" class="form-control" name="direccion_paciente"
                                        id="direccion_paciente">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label">Región / Comuna</label>
                                    <select id="region_comuna" name="region_comuna" class="form-control">
                                        <option selected value="0">Seleccione una opción </option>
                                        <optgroup label="Región de Valparaíso">
                                            <option>Viña del Mar</option>
                                            <option>Valparaíso</option>
                                            <option>San Felipe</option>
                                            <option>etc...</option>
                                        </optgroup>
                                        <optgroup label="Región Metropolitana">
                                            <option>Santiago</option>
                                            <option>Maipú</option>
                                            <option>etc...</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo">Fecha</label>
                                    <input type="date" class="form-control" name="fecha_paciente" id="fecha_paciente">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label">Diagnóstico</label>
                                    <input type="text" class="form-control" name="diagnostico_paciente"
                                        id="diagnostico_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Rp:</label>
                                    <textarea class="form-control" rows="6" name="descripcion_rp" id="descripcion_rp"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>-->
@endsection

