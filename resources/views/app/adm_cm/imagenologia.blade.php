@extends('template.adm_cm.template')
@section('content')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center mt-3">
                    <div class="col-md-12">
                        <div class="page-header-title">
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.imagenologia') }}">Área de Imagenología  {{ mb_strtoupper($institucion->nombre) }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <img class="wid-60 align-self-start mr-3"  src="{{ asset('images/iconos/imagenologia.png') }}">
                          <div class="media-body">
                           <h4 class="text-c-blue">Imagenología</h4>
                           <p>Área especializada en exámenes de imagenología y obtención de imágenes diagnósticas para apoyo médico</p>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="card py-0">
                    <div class="card-body pb-2 pt-2">
                        <ul class="nav nav-tabs-aten nav-fill" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="prof-imageo-cm-tab" data-toggle="pill" href="#prof-imageo-cm" role="tab" aria-controls="prof-odonto-cm" aria-selected="true">
                                    Profesionales
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="ex-imageo-cm-tab" data-toggle="pill" href="#ex-imageo-cm" role="tab" aria-controls="ex-odonto-cm" aria-selected="false">
                                    Exámenes
                                </a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="proc-imageo-cm-tab" data-toggle="pill" href="#proc-imageo-cm" role="tab" aria-controls="proc-odonto-cm" aria-selected="false">
                                   Procedimientos
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
                    <!--PROFESIONALES-->
                    <div class="tab-pane show active" id="prof-imageo-cm" role="tabpanel" aria-labelledby="prof-imageo-cm-tab">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header-principal">
                                        <div class="row">
                                            <div class="col-md-12 align-botton">
                                                <h5 class="d-inline"><i class="feather icon-user icono-primary"></i>Profesionales</h5>
                                                  <button type="button" class="btn btn-info btn-sm d-inline float-md-right" onclick="agregar_odontologo();"><i class="feather icon-plus"></i> Añadir profesional</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <table id="tabla_prof_imagenologia" class="display table table-striped table-sm table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Profesional</th>
                                                    <th>Especialidad</th>
                                                    <th>Contacto</th>
                                                    <th>Lugar de atención</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($odontologos))
                                                    @foreach($odontologos as $odontologo)
                                                    <tr>
                                                        <td>
                                                            <span><strong>{{ $odontologo->nombre.' '.$odontologo->apellido_uno.' '.$odontologo->apellido_dos }}</strong></span><br>
                                                            <span>{{ $odontologo->rut }}</span>
                                                        </td>
                                                        <td>
                                                            <span><i class="feather icon-phone icono-tabla"></i> {{ $odontologo->telefono_uno }}</span> <br>
                                                            <span><i class="feather icon-mail icono-tabla"></i> {{ $odontologo->email }}</span>
                                                        </td>
                                                        <td>
                                                        <span>{{ $odontologo->lugar_atencion ?? 'N/A' }}</span>
                                                    </td>
                                                    <td>
                                                        <label class="switch-moderno">
                                                            <input type="checkbox" id="switchEstado">
                                                            <span class="switch-slider">
                                                                    <span class="switch-text off">
                                                                     Inactivo
                                                                    </span>
                                                                    <span class="switch-text on">
                                                                    Activo
                                                                    </span>
                                                            </span>
                                                        </label>
                                                    </td>
                                                        <td class="align-middle text-center">
                                                            {{--<button type="button" class="btn btn-info btn-icon btn-sm" onclick="ver_odontologo({{ $odontologo->id }})" title="Ver detalles"><i class="feather icon-eye"></i></button>--}}
                                                            <button type="button" class="btn btn-warning btn-icon btn-sm" onclick="editar_odontologo({{ $odontologo->id }})" title="Editar"><i class="feather icon-edit"></i></button>
                                                            <button type="button" class="btn btn-danger btn-icon btn-sm" onclick="eliminar_odontologo({{ $odontologo->id }})" title="Eliminar"><i class="feather icon-trash-2"></i></button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--EXÁMENES-->
                    <div class="tab-pane fade" id="ex-imageo-cm" role="tabpanel" aria-labelledby="ex-imageo-cm-tab">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                     <div class="card-header-principal">
                                        <div class="row">
                                            <div class="col-md-12 align-botton">
                                                <h5 class="d-inline"><i class="feather icon-file icono-primary"></i>Exámenes</h5>
                                                  <button type="button" class="btn btn-info btn-sm d-inline float-md-right" onclick="agregar_odontologo();"><i class="feather icon-plus"></i> Añadir exámenes</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <table id="tabla_ex_imagenologia" class="display table table-striped table-sm table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Procedimiento</th>
                                                    <th>Min. por bloque</th>
                                                    <th>Bloques</th>
                                                    <th>Valor</th>
                                                    <th>Lugar de atención</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Nombre del procedimiento</td>
                                                    <td>15 min</td>
                                                    <td>2 bloques</td>
                                                    <td>$25.000</td>
                                                    <td>
                                                        <span>{{ $odontologo->lugar_atencion ?? 'N/A' }}</span>
                                                    </td>
                                                    <td>
                                                        <label class="switch-moderno">
                                                            <input type="checkbox" id="switchEstado">
                                                            <span class="switch-slider">
                                                                    <span class="switch-text off">
                                                                     Inactivo
                                                                    </span>
                                                                    <span class="switch-text on">
                                                                    Activo
                                                                    </span>
                                                            </span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <button class="btn-warning btn btn-icon"><i class="feather icon-edit"></i></button>
                                                        <button class="btn-danger btn btn-icon"><i class="feather icon-x"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!--Procedimientos-->
                    <div class="tab-pane fade" id="proc-imageo-cm" role="tabpanel" aria-labelledby="proc-imageo-cm-tab">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header-principal">
                                        <div class="row">
                                            <div class="col-md-12 align-botton">
                                                <h5 class="d-inline"><i class="feather icon-file icono-primary"></i>Procedimiento</h5>
                                                  <button type="button" class="btn btn-info btn-sm d-inline float-md-right" onclick="agregar_odontologo();"><i class="feather icon-plus"></i> Añadir procedimiento</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <table id="tabla_proc_imagenologia" class="display table table-striped table-sm table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Nombre del exámen</th>
                                                    <th>Descripción</th>
                                                    <th>Cantidad de bloques</th>
                                                    <th>Valor</th>
                                                    <th>Lugar de atención</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>5665456</td>
                                                    <td>Nombre examen</td>
                                                    <td>Descripción</td>
                                                    <td>3</td>
                                                    <td>$30.000</td>
                                                    <td>
                                                        <span>{{ $odontologo->lugar_atencion ?? 'N/A' }}</span>
                                                    </td>
                                                    <td>
                                                        <label class="switch-moderno">
                                                            <input type="checkbox" id="switchEstado">
                                                            <span class="switch-slider">
                                                                    <span class="switch-text off">
                                                                     Inactivo
                                                                    </span>
                                                                    <span class="switch-text on">
                                                                    Activo
                                                                    </span>
                                                            </span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <button class="btn-warning btn btn-icon"><i class="feather icon-edit"></i></button>
                                                        <button class="btn-danger btn btn-icon"><i class="feather icon-x"></i></button>
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
@endsection
