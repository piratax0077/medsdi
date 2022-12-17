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
                                <h5 class="m-b-10 font-weight-bold">Mis Certificados</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('profesional.index_receta_online') }}" data-toggle="tooltip" data-placement="top" title="Volver a inicio de receta online">Receta Online</a></li>
                                <li class="breadcrumb-item"><a href="mis_certificados_profesional.php">Mis Certificados</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-c-blue f-22 d-inline ml-4 my-1 py-1">Mis Certificados</h4>
                                    <!--<button type="button" class="btn btn-success btn-sm d-inline float-right mr-4 my-1" data-toggle="modal" data-target="#agregar_certificado_profesional_ro"> <i class="feather icon-plus"></i> Agregar certificado</button>-->
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6 col-md-12">
                                    <table id="tabla_certificado_profesional_ro"
                                        class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-wrap text-center align-middle">Fecha</th>
                                                <th class="text-center align-middle">Paciente</th>
                                                <th class="text-center align-middle">Tipo de certificado</th>
                                                <!--<th class="text-center align-middle">Acción</th>-->
                                                <!--<th class="text-center align-middle">Estado</th>-->
                                                <th class="text-center align-middle">Certificado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($reposo)
                                                @foreach ($reposo as $rep)
                                                    <tr>
                                                        <td class="text-wrap text-center align-middle">{{ $rep->created_at }}
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            {{ $rep->Paciente()->first()->nombres }}<br>
                                                            {{ $rep->Paciente()->first()->rut }}
                                                        </td>
                                                        <td class="align-middle text-center">Certificado Reposo</td>
                                                        <!--
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn  btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Enviar Certificado a Paciente"><i class="feather icon-navigation"></i></button>
                                                        </td>
                                                        <td class="align-middle text-center">Enviado</td>
                                                        -->
                                                        <td class="align-middle text-center"> <div onclick="ver_pdf_certificado_reposo('{{ $rep->id_ficha_atencion }}')"><img src="{{ asset('images/documento.svg') }}" alt="Documento" height="20px"> Ver </div></td>
                                                        <!--
                                                        <td class="align-middle text-center"><a href="#" download="Certificado_NombrePaciente"><img src="{{ asset('images/documento.svg') }}" alt="Documento" height="20px"> Ver</a></td>-->
                                                    </tr>
                                                @endforeach
                                            @endif

                                            @if ($interconsulta)
                                                @foreach ($interconsulta as $inter)
                                                    <tr>
                                                        <td class="text-wrap text-center align-middle">
                                                            {{ $inter->created_at }}
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            {{ $inter->Paciente()->first()->nombres }}<br>
                                                            {{ $inter->Paciente()->first()->rut }}
                                                        </td>
                                                        <td class="align-middle text-center">Interconsulta</td>
                                                        <!--<td class="align-middle text-center">
                                                        <button type="button" class="btn  btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Enviar Certificado a Paciente"><i class="feather icon-navigation"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">Enviado</td>-->
                                                        <td class="align-middle text-center"> <div onclick="ver_pdf_interconsulta('{{ $inter->id }}')"><img src="{{ asset('images/documento.svg') }}" alt="Documento" height="20px"> Ver </div></td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                            @if ($informesMedicos)
                                                @foreach ($informesMedicos as $informe)
                                                    <tr>
                                                        <td class="text-wrap text-center align-middle">
                                                            {{ $informe->created_at }}
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            {{ $informe->Paciente()->first()->nombres }}<br>
                                                            {{ $informe->Paciente()->first()->rut }}
                                                        </td>
                                                        <td class="align-middle text-center">Informe Medico</td>
                                                        <!--<td class="align-middle text-center">
                                                        <button type="button" class="btn  btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Enviar Certificado a Paciente"><i class="feather icon-navigation"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">Enviado</td>-->
                                                        <td class="align-middle text-center"> <div onclick="ver_pdf_informe_medico('{{ $informe->id_ficha_atencion }}')"><img src="{{ asset('images/documento.svg') }}" alt="Documento" height="20px"> Ver </div></td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                            {{--  @if ($controlObesidad)
                                                @foreach ($controlObesidad as $obesidad)
                                                    <tr>
                                                        <td class="text-wrap text-center align-middle">
                                                            {{ $obesidad->created_at }}
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            {{ $obesidad->Paciente()->first()->nombres }}<br>
                                                            {{ $obesidad->Paciente()->first()->rut }}
                                                        </td>
                                                        <td class="align-middle text-center">Control Obesidad</td>
                                                        <!--<td class="align-middle text-center">
                                                        <button type="button" class="btn  btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Enviar Certificado a Paciente"><i class="feather icon-navigation"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">Enviado</td>-->
                                                        <td class="align-middle text-center"><a href="#" download="Certificado_NombrePaciente"><img src="{{ asset('images/documento.svg') }}" alt="Documento" height="20px"> Ver </a></td>
                                                    </tr>
                                                @endforeach
                                            @endif  --}}

                                            {{--  @if ($hipertensiones)
                                                @foreach ($hipertensiones as $hipertension)
                                                    <tr>
                                                        <td class="text-wrap text-center align-middle">
                                                            {{ $hipertension->created_at }}
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            {{ $hipertension->Paciente()->first()->nombres }}<br>
                                                            {{ $hipertension->Paciente()->first()->rut }}
                                                        </td>
                                                        <td class="align-middle text-center">Control Hipertensión</td>
                                                        <!--
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn  btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Enviar Certificado a Paciente"><i class="feather icon-navigation"></i></button>
                                                        </td>
                                                        <td class="align-middle text-center">Enviado</td>
                                                        -->
                                                        <td class="align-middle text-center"><a href="#" download="Certificado_NombrePaciente"><img src="{{ asset('images/documento.svg') }}" alt="Documento" height="20px"> Ver </a></td>
                                                    </tr>
                                                @endforeach
                                            @endif  --}}
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
    <!-- Modal certificado profesional-->
    {{-- <div id="agregar_certificado_profesional_ro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_receta_profesional_ro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Agregar certificado</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="recetas_profesional">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <h6 class="text-c-blue ml-2 mb-3">Ingrese los datos del certificado</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Rut</label>
                                    <input type="person" class="form-control" name="rut_paciente" id="rut_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Nombres</label>
                                    <input type="text" class="form-control" name="nombres_paciente" id="nombres_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos_paciente"
                                        id="apellidos_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Tipo de certificado</label>
                                    <select id="tipo_certificado" name="tipo_certificado" class="form-control">
                                        <option selected value="0">Seleccione una opción </option>
                                        <option>..</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo">Fecha</label>
                                    <input type="date" class="form-control" name="fecha_paciente" id="fecha_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <h6 class="ml-2 mt-2">Adjuntar certificado</h6>
                                    <input type="file" class="aform-control-file pb-3"
                                        id="adjuntar_certificado_receta_online">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Comentarios</label>
                                    <textarea class="form-control" rows="1" name="comentarios_examen" id="comentarios_examen"></textarea>
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
    </div>--}}
@endsection
