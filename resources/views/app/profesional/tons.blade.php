@extends('template.profesional.template')
@section('content')

    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Tons</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    @if(Auth::user()->hasRole('Profesional'))
                                        <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>
                                    @elseif(Auth::user()->hasRole('Asistente'))
                                        <a href="{{ route('asistente.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>
                                    @elseif(Auth::user()->hasRole('Institucion'))
                                        <a href="{{ route('institucion.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>
                                    @elseif(Auth::user()->hasRole('Servicio'))
                                        <a href="{{ route('servicio.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>
                                    {{--  @elseif(Auth::user()->hasRole('AsistenCaja'))
                                        <a href="{{ route('asistente_adm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>  --}}
                                    @endif
                                    {{--  <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>  --}}
                                </li>
                                <li class="breadcrumb-item"><a href="#">Tons</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h4 class="text-white f-20 d-inline">Tons</h4>
                                        <button type="button" class="btn btn-light btn-xs float-md-right d-inline" data-toggle="modal" data-target="#nueva_tons">
                                            <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Agregar TONS
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                @if (isset($mensaje))
                                    <span class="alert alert-warning"> {{ $mensaje }}</span>
                                @endif
                            </div>
                            <table id="tabla_lugares_atencion"
                                class="display table table-striped dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="align-middle">Nombre</th>
                                        <th class="align-middle">Dirección</th>
                                        <th class="align-middle">Tipo</th>
                                        <th class="align-middle">Contacto</th>
                                        <th class="align-middle">Editar</th>
                                        <th class="align-middle">Asistentes</th>
                                        <th class="align-middle">Horarios</th>
                                        <th class="align-middle">Procedimientos</th>
                                        <th class="align-middle">Convenios y Valores</th>
                                        <th class="align-middle">Deshabilitar</th>
                                        <th class="align-middle">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- {{ dd($lugares) }} --}}
                                    @if (isset($lugares))
                                        @foreach ($lugares as $l)
                                            @if ($l->pivot->estado !== 3)
                                                <tr>
                                                    <td class="align-middle">{{ $l->nombre }}</td>
                                                    <td class="align-middle">
                                                        <span>{{ $l->Direccion()->first()->direccion . ' ' . $l->Direccion()->first()->numero_dir }}</span><br>
                                                        <span>{{ $l->Direccion()->first()->Ciudad()->first()->nombre }}</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        @if ($l->tipo == 1)
                                                            Centro Medico
                                                        @else
                                                            Particular
                                                        @endif
                                                    </td>
                                                    <td class="align-middle">
                                                        <span>{{ $l->email }}</span><br>
                                                        <span>{{ $l->telefono }}</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        {{-- editar lugar atencion --}}
                                                        <button type="button" class="btn btn-info btn-sm btn-icon  accion_editar_lugar_atencion" data-toggle="modal" onclick="ver_lugar_atencion({{ $l->id }});" data-target="#editar_lugar_atencion" title="Editar lugar de atención">
                                                            <i class="feather icon-edit"></i>
                                                        </button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        {{-- ver asistente lugar de atencion --}}
                                                        <button type="button" class="btn btn-warning btn-sm btn-icon  accion_asistentes" onclick="mi_asistente_lugar_atencion({{ $l->id }})" data-toggle="tooltip" data-placement="top" title="Configurar">
                                                            <i class="feather icon-user"></i>
                                                        </button>
                                                    </td>
                                                    <td class="align-middle">
                                                        {{-- horario --}}
                                                        <button type="button" class="btn btn-info btn-sm btn-icon  accion_editar_horarios" data-toggle="modal" onclick="mi_horario_lugar_atencion({{ $l->id }})">
                                                            <i class="fas fa-clock"></i>
                                                        </button>

                                                    </td>
                                                    <td class="align-middle">
                                                        {{-- procedimientos --}}
                                                        <button type="button" class="btn btn-info btn-sm btn-icon  accion_editar_horarios" data-toggle="modal" onclick="mi_procedimiento_lugar_atencion({{ $l->id }}, {{ $id_profesional }});">
                                                            <i class="fas fa-procedures"></i>
                                                        </button>

                                                    </td>
                                                    <td class="align-middle">
                                                        {{-- valores de lugar de atencion --}}
                                                        <button type="button" class="btn btn-success btn-sm btn-icon accion_editar_valores" data-toggle="modal" onclick="mis_valores_lugar_atencion({{ $l->id }})" title="Configurar">
                                                            <i class="fas fa-dollar-sign"></i>
                                                        </button>
                                                    </td>

                                                    <td>
                                                        {{-- estado de lugar de atencion --}}
                                                        @if ($l->pivot->estado == '1')
                                                            <div class="align-middle">
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" onclick="cambio_estado_lugar_atencion({{ $l->id }})" id="estado_lugar_atencion_{{ $l->id }}" checked="true">
                                                                    <label for="estado_lugar_atencion_{{ $l->id }}" class="cr"></label>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="align-middle">
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" onclick="cambio_estado_lugar_atencion({{ $l->id }})" id="estado_lugar_atencion_{{ $l->id }}">
                                                                    <label for="estado_lugar_atencion_{{ $l->id }}" class="cr"></label>
                                                                </div>
                                                            </div>
                                                        @endif

                                                    </td>

                                                    <td>
                                                        {{-- eliminar de lugar de atencion --}}

                                                        <div class="align-middle">
                                                            <button type="button" class="btn btn-danger btn-sm btn-icon accion_editar_valores" data-toggle="modal" onclick="eliminar_lugar_atencion({{ $l->id }})" title="Eliminar">
                                                                <i class="feather icon-x"></i>
                                                            </button>
                                                        </div>

                                                    </td>
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
    <!--Modal nuevo lugar de atención-->
    <div id="nueva_tons" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="nueva_tons"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" id="nueva_tons_titulo">Agregar nueva TONS&nbsp;</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id_tons" id="id_tons" value="">
                    <div class="form-row">
                        <div class="col-12">
                            <div class="form-group fill">
                                <label for="rut_tons" class="floating-label-activo-sm">Rut de tons</label>
                                <input type="text" name="rut_tons" id="rut_tons" class="form-control form-control-sm" oninput="formatoRut(this)">
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-success btn-sm w-100 my-3" onclick="buscar_tons()"><i class="fas fa-search"></i> Buscar</button>
                    </div>

                    <div class="form-row d-none" id="contenedor_tons">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Nombre</label>
                                <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                            </div>
                        </div>

                        <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                <input class="form-control form-control-sm" name="direccion_lugar_atencion" id="direccion_lugar_atencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nº</label>
                                <input class="form-control form-control-sm" name="numero_lugar_atencion" id="numero_lugar_atencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar" class="form-control form-control-sm" required>
                                    <option value="">Seleccione</option>
                                    @if(isset($region))
                                    @foreach ($region as $reg)
                                        @if (isset($region))
                                            <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                        @endif
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Ciudad</label>
                                <select id="ciudad_agregar" name="ciudad_agregar" class="form-control form-control-sm" required>
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group ">
                                <label class="floating-label-activo-sm">Tipo</label>
                                <select id="tipo_agregar_lugar_atencion" name="tipo_agregar_lugar_atencion" class="js-example-basic-single form-control form-control-sm">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Centro Médico</option>
                                    <option value="2">Consulta Particular</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                <input class="form-control form-control-sm" name="email_lugar_atencion" id="email_lugar_atencion" type="email">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                <input class="form-control form-control-sm" name="telefono_lugar_atencion" id="telefono_lugar_atencion_1" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="notificar_pacientes" name="notificar_pacientes">
                                    <label for="notificar_pacientes" class="cr"></label>
                                    <label>Notificar a pacientes</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row d-none" id="contenedor_datos_tons">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre_tons" class="floating-label-activo-sm">Nombre</label>
                                <input type="text" id="nombre_tons" name="nombre_tons" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellidos_tons" class="floating-label-activo-sm">Apellidos</label>
                                <input type="text" id="apellidos_tons" name="apellidos_tons" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="floating-label-activo-sm">Correo Electrónico</label>
                                <input type="email" id="email_tons" name="email_tons" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="floating-label-activo-sm">Región</label>
                                <select name="region_tons" id="region_tons" class="form-control form-control-sm" disabled>
                                    @if(isset($region))
                                    @foreach ($region as $reg)
                                        @if (isset($region))
                                            <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                        @endif
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="floating-label-activo-sm">Ciudad</label>
                                <input type="email" id="ciudad_tons" name="ciudad_tons" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="direccion_tons" class="floating-label-activo-sm">Dirección</label>
                                <input type="text" id="direccion_tons" name="direccion_tons" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefono_tons" class="floating-label-activo-sm">Teléfono</label>
                                <input type="text" id="telefono_tons" name="telefono_tons" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sexo_tons" class="floating-label-activo-sm">Sexo</label>
                                <select  id="sexo_tons" name="sexo_tons" class="form-control form-control-sm" disabled>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-outline-success btn-sm my-3 w-100" onclick="solicitar_tons()">Solicitar</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                    <button type="submit" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar cambios</button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('page-script')
<script>
    function buscar_tons(){
        let rut_tons = $('#rut_tons').val();
        if(rut_tons == ''){
            swal({
                title:'info',
                icon:'info',
                text:'Debe ingresar rut'
            });
            return false;
        }
        let data = {
            rut_tons: rut_tons,
            _token: CSRF_TOKEN
        }

        let url = "{{ ROUTE('profesional.buscar_tons') }}";

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.estado == 1){
                    $('#contenedor_datos_tons').removeClass('d-none');
                    $('#contenedor_tons').addClass('d-none');
                    let tons = resp.tons;
                    $('#id_tons').val(tons.id);
                    $('#nombre_tons').val(tons.nombre);
                    $('#apellidos_tons').val(tons.apellido_uno+' '+tons.apellido_dos);
                    $('#email_tons').val(tons.email);
                    $('#region_tons').val(tons.ciudad.id_region);
                    $('#ciudad_tons').val(tons.ciudad.nombre);
                    $('#direccion_tons').val(tons.direccion.direccion+' '+tons.direccion.numero_dir);
                    $('#telefono_tons').val(tons.telefono_uno);
                    $('#sexo_tons').val(tons.sexo);
                }else{
                    $('#contenedor_datos_tons').addClass('d-none');
                    $('#contenedor_tons').removeClass('d-none');
                }
            },
            error: function(error){
                console.log(error);
            }
        });


    }

    function solicitar_tons(){
        let id_tons = $('#id_tons').val();
        console.log(id_tons);
        let url = "{{ ROUTE('profesional.solicitar_tons') }}";
        let data = {
            id_tons: id_tons,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
            },
            error: function(error){
                console.log(error.responseText);
            }
        });
    }
</script>
@endsection
