<div class="row">
                                    @if(isset($director_cm) && $director_cm != null)
                                    <div class="col-md-4">
                                        <!--Card Información Básica-->
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Datos Personales Director Medico</h5>
                                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_admin_cm(1,{{ $institucion->id }})"><i class="fas fa-trash"></i></button>
                                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_basica_director_cm" aria-expanded="false" aria-controls="info_basica-1_ info_basica-2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Datos Personales-->
                                            <div class="card-body border-top info_basica_director_cm collapse show" id="info_basica-1_">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Rut</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_cm->rut }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Nombre</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_cm->nombre }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Primer
                                                            Apellido</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_cm->apellido_uno }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Segundo
                                                            Apellido</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_cm->apellido_dos }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Sexo</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            @if ($director_cm->sexo == 'F')
                                                                Mujer
                                                            @elseif ($director_cm->sexo == 'M')
                                                                Hombre
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Nacimiento</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{ \Carbon\Carbon::parse($director_cm->fecha_nac)->format('d-m-Y') }}
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Datos Personales-->
                                            <!--(Editar)Datos Personales-->
                                            <div class="card-body border-top info_basica_director_cm collapse" id="pinfo_basica_2">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" placeholder="Rut" id="perfil_rut_medico" name="perfil_rut_medico" value="{{$director_cm->rut }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Nombre</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" placeholder="Nombre" id="perfil_nombre_medico" name="perfil_nombre_medico" value="{{$director_cm->nombre }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Primer Apellido</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="perfil_apellido_uno_medico" name="perfil_apellido_uno_medico" placeholder="Primer Apellido" value="{{$director_cm->apellido_uno }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Segundo Apellido</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="perfil_apellido_dos_medico" name="perfil_apellido_dos_medico" placeholder="Segundo Apellido" value="{{$director_cm->apellido_dos }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Sexo</label>
                                                        <div class="col-sm-7 my-auto">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" id="perfil_sexo_medico" name="perfil_sexo_medico" id="inlineRadio2" value="F" @if ($director_cm->sexo == 'F') checked @endif>
                                                                <label class="form-check-label" for="inlineRadio2">Mujer</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" id="perfil_sexo_medico" name="perfil_sexo_medico" id="inlineRadio1" value="M" @if ($director_cm->sexo == 'M') checked @endif>
                                                                <label class="form-check-label" for="inlineRadio1">Hombre</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Nacimiento</label>
                                                        <div class="col-sm-7">
                                                            <input type="date" class="form-control" id="perfil_nac_medico" name="perfil_nac_medico" value="{{$director_cm->fecha_nac }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label"></label>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                            <button type="button" onclick="editar_responsable_medico_datos_personales();" class="btn btn-info">Guardar Cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: (Editar)Datos Personales-->
                                        </div>
                                        <!--Cierre: Card Datos Personales-->

                                        <!--Contraseña-->
                                        <div class="card">
                                            <div class="card-header d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Cambiar contraseña</h5>
                                                <button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".pass_personal_director_cm" aria-expanded="false" aria-controls="pass_personal_1 pass_personal_2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Contraseña-->
                                            <div class="card-body pass_personal_director_cm collapse show" id="pass_personal_1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Contraseña actual</label>
                                                        <div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> •••••••• </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Contraseña-->
                                            <!--(Editar)Contraseña-->
                                            <div class="card-body pass_personal_director_cm collapse" id="pass_personal_2">
                                                <form method="get" action="{{ route('adm_cm.cambio_contrasena_responsable')}}" id="form_cambio_contrasena_perfil_responsable" name="form_cambio_contrasena_perfil_responsable">
                                                    <input type="hidden" name="responsable_id" id="responsable_id" value="{{ $responsable->Usuario()->first()->id }}">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Contraseña actual</label>
                                                        <div class="col-sm-7">
                                                            <input type="password" class="form-control form-control-sm" name="responsable_actual" id="responsable_actual" placeholder="Contraseña Actual">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Nueva contraseña</label>
                                                        <div class="col-sm-7">
                                                            <input type="password" class="form-control form-control-sm" name="responsable_nueva" id="responsable_nueva" placeholder="Nueva Contraseña">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Repitir contraseña</label>
                                                        <div class="col-sm-7">
                                                            <input type="password" class="form-control form-control-sm" name="responsable_validacion" id="responsable_validacion" placeholder="Repita la Contraseña">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label"></label>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-sm btn-danger mr-2">Cancelar</button>
                                                            <button type="submit" class="btn btn-sm btn-info">Guardar cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: (Editar)Contraseña-->
                                        </div>
                                        <!--Cierre:Contraseña-->
                                        <!--Card Contacto-->
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Contacto</h5>
                                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_contacto_" aria-expanded="false" aria-controls="info_contacto_1 info_contacto_2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Contacto-->
                                            <div class="card-body border-top info_contacto_ collapse show" id="info_contacto_1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Correo
                                                            Electrónico</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_cm->email }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6 my-auto ml-2">{{$director_cm->telefono_uno }}</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6 my-auto ml-2">{{$director_cm->telefono_dos }}</div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Contacto-->
                                            <!--(Editar) Contacto-->
                                            <div class="card-body border-top info_contacto_ collapse " id="info_contacto_2">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Correo Electrónico</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="Perfil_email" name="Perfil_email" placeholder="Correo Electrónico" value="{{$director_cm->email }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Teléfono" id="Perfil_fono" name="Perfil_fono" value="{{$director_cm->telefono_uno }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Teléfono" id="Perfil_fono_dos" name="Perfil_fono_dos" value="{{$director_cm->telefono_dos }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label"></label>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                            <button type="button" onclick="editar_responsable_datos_contacto()" class="btn btn-info">Guardar Cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--(Editar) Contacto-->
                                        </div>
                                        <!--Cierre: Card Contacto-->
                                        <!--Card Residencia-->
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Residencia</h5>
                                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_residencial_director_cm" aria-expanded="false" aria-controls="info_residencial_1 info_residencial_2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Residencia-->
                                            <div class="card-body border-top info_residencial_director_cm collapse show" id="info_residencial_1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$director_cm->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Comuna</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$director_cm->Direccion()->first()->Ciudad()->first()->nombre }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$director_cm->Direccion()->first()->direccion . ' ' . $responsable->Direccion()->first()->numero_dir }}
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Residencia-->
                                            <!--(Editar) Residencia-->
                                            <div class="card-body border-top info_residencial_director_cm collapse " id="info_residencial_2">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" onchange="buscar_ciudad_responsable();" id="perfil_region" name="perfil_region">
                                                                <option value="">Seleccione una Región</option>
                                                                @if (isset($regiones))
                                                                    @foreach ($regiones as $region)
                                                                    <option value="{{ $region->id }}" @if ($region->id ==
                                                                    $director_cm->Direccion()->first()->Ciudad()->first()->Region()->first()->id) selected @endif>
                                                                        {{ $region->nombre }}
                                                                    </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Ciudad</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" id="perfil_ciudad" name="perfil_ciudad">
                                                                <option value="">Seleccione su comuna</option>
                                                                @if (isset($ciudades))
                                                                    @foreach ($ciudades as $ciudad)
                                                                    <option value="{{ $ciudad->id }}" @if ($director_cm->Direccion()->first()->id_ciudad == $ciudad->id) selected @endif>
                                                                        {{ $ciudad->nombre }}
                                                                    </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Dirección" name="perfil_dire" id="perfil_dire" value="{{$director_cm->Direccion()->first()->direccion }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Piso/Depto</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="n&uacute;mero #" name="perfil_numero_dir" id="perfil_numero_dir" value="{{$director_cm->Direccion()->first()->numero_dir }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label"></label>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                            <button type="button" onclick="editar_responsable_datos_residencia();" class="btn btn-info">Guardar Cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--(Editar) Residencia-->
                                        </div>
                                        <!--Cierre: Card Residencia-->
                                    </div>
                                    @endif
                                    @if(isset($subdirector_cm) && $subdirector_cm != null)
                                    <div class="col-md-4">
                                        <!--Card Información Básica-->
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Datos Personales SubDirector Medico</h5>
                                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_admin_cm(2,{{ $institucion->id }})"><i class="fas fa-trash"></i></button>
                                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_basica_subdirector_cm" aria-expanded="false" aria-controls="info_basica-1 info_basica-2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Datos Personales-->
                                            <div class="card-body border-top info_basica_subdirector_cm collapse show" id="info_basica-1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Rut</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$subdirector_cm->rut }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Nombre</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$subdirector_cm->nombre }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Primer
                                                            Apellido</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$subdirector_cm->apellido_uno }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Segundo
                                                            Apellido</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$subdirector_cm->apellido_dos }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Sexo</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            @if ($subdirector_cm->sexo == 'F')
                                                                Mujer
                                                            @elseif ($subdirector_cm->sexo == 'M')
                                                                Hombre
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Nacimiento</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{ \Carbon\Carbon::parse($subdirector_cm->fecha_nac)->format('d-m-Y') }}
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Datos Personales-->
                                            <!--(Editar)Datos Personales-->
                                            <div class="card-body border-top info_basica_subdirector_cm collapse" id="pinfo_basica_2">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" placeholder="Rut" id="perfil_rut_medico" name="perfil_rut_medico" value="{{$subdirector_cm->rut }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Nombre</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" placeholder="Nombre" id="perfil_nombre_medico" name="perfil_nombre_medico" value="{{$subdirector_cm->nombre }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Primer Apellido</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="perfil_apellido_uno_medico" name="perfil_apellido_uno_medico" placeholder="Primer Apellido" value="{{$subdirector_cm->apellido_uno }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Segundo Apellido</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="perfil_apellido_dos_medico" name="perfil_apellido_dos_medico" placeholder="Segundo Apellido" value="{{$subdirector_cm->apellido_dos }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Sexo</label>
                                                        <div class="col-sm-7 my-auto">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" id="perfil_sexo_medico" name="perfil_sexo_medico" id="inlineRadio2" value="F" @if ($subdirector_cm->sexo == 'F') checked @endif>
                                                                <label class="form-check-label" for="inlineRadio2">Mujer</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" id="perfil_sexo_medico" name="perfil_sexo_medico" id="inlineRadio1" value="M" @if ($subdirector_cm->sexo == 'M') checked @endif>
                                                                <label class="form-check-label" for="inlineRadio1">Hombre</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Nacimiento</label>
                                                        <div class="col-sm-7">
                                                            <input type="date" class="form-control" id="perfil_nac_medico" name="perfil_nac_medico" value="{{$subdirector_cm->fecha_nac }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label"></label>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                            <button type="button" onclick="editar_responsable_medico_datos_personales();" class="btn btn-info">Guardar Cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: (Editar)Datos Personales-->
                                        </div>
                                        <!--Cierre: Card Datos Personales-->

                                        <!--Contraseña-->
                                        <div class="card">
                                            <div class="card-header d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Cambiar contraseña</h5>
                                                <button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".pass_personal_subdirector_cm" aria-expanded="false" aria-controls="pass_personal_1 pass_personal_2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Contraseña-->
                                            <div class="card-body pass_personal_subdirector_cm collapse show" id="pass_personal_1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Contraseña actual</label>
                                                        <div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> •••••••• </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Contraseña-->
                                            <!--(Editar)Contraseña-->
                                            <div class="card-body pass_personal_subdirector_cm collapse" id="pass_personal_2">
                                                <form method="get" action="{{ route('adm_cm.cambio_contrasena_responsable')}}" id="form_cambio_contrasena_perfil_responsable" name="form_cambio_contrasena_perfil_responsable">
                                                    <input type="hidden" name="responsable_id" id="responsable_id" value="{{ $responsable->Usuario()->first()->id }}">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Contraseña actual</label>
                                                        <div class="col-sm-7">
                                                            <input type="password" class="form-control form-control-sm" name="responsable_actual" id="responsable_actual" placeholder="Contraseña Actual">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Nueva contraseña</label>
                                                        <div class="col-sm-7">
                                                            <input type="password" class="form-control form-control-sm" name="responsable_nueva" id="responsable_nueva" placeholder="Nueva Contraseña">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Repitir contraseña</label>
                                                        <div class="col-sm-7">
                                                            <input type="password" class="form-control form-control-sm" name="responsable_validacion" id="responsable_validacion" placeholder="Repita la Contraseña">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label"></label>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-sm btn-danger mr-2">Cancelar</button>
                                                            <button type="submit" class="btn btn-sm btn-info">Guardar cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: (Editar)Contraseña-->
                                        </div>
                                        <!--Cierre:Contraseña-->
                                        <!--Card Contacto-->
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Contacto</h5>
                                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_contacto_subdirector_cm" aria-expanded="false" aria-controls="info_contacto_1 info_contacto_2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Contacto-->
                                            <div class="card-body border-top info_contacto_subdirector_cm collapse show" id="info_contacto_1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Correo
                                                            Electrónico</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$subdirector_cm->email }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6 my-auto ml-2">{{$subdirector_cm->telefono_uno }}</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6 my-auto ml-2">{{$subdirector_cm->telefono_dos }}</div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Contacto-->
                                            <!--(Editar) Contacto-->
                                            <div class="card-body border-top info_contacto_subdirector_cm collapse " id="info_contacto_2">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Correo Electrónico</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="Perfil_email" name="Perfil_email" placeholder="Correo Electrónico" value="{{$subdirector_cm->email }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Teléfono" id="Perfil_fono" name="Perfil_fono" value="{{$subdirector_cm->telefono_uno }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Teléfono" id="Perfil_fono_dos" name="Perfil_fono_dos" value="{{$subdirector_cm->telefono_dos }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label"></label>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                            <button type="button" onclick="editar_responsable_datos_contacto()" class="btn btn-info">Guardar Cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--(Editar) Contacto-->
                                        </div>
                                        <!--Cierre: Card Contacto-->
                                        <!--Card Residencia-->
                                        @if(isset($subdirector_cm))
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Residencia</h5>
                                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_residencial_subdirector_cm" aria-expanded="false" aria-controls="info_residencial_1 info_residencial_2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Residencia-->
                                            <div class="card-body border-top info_residencial_subdirector_cm collapse show" id="info_residencial_1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$subdirector_cm->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Comuna</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$subdirector_cm->Direccion()->first()->Ciudad()->first()->nombre }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$subdirector_cm->Direccion()->first()->direccion . ' ' . $responsable->Direccion()->first()->numero_dir }}
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Residencia-->
                                            <!--(Editar) Residencia-->
                                            <div class="card-body border-top info_residencial_subdirector_cm collapse " id="info_residencial_2">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" onchange="buscar_ciudad_responsable();" id="perfil_region" name="perfil_region">
                                                                <option value="">Seleccione una Región</option>
                                                                @if (isset($regiones))
                                                                    @foreach ($regiones as $region)
                                                                    <option value="{{ $region->id }}" @if ($region->id ==
                                                                    $subdirector_cm->Direccion()->first()->Ciudad()->first()->Region()->first()->id) selected @endif>
                                                                        {{ $region->nombre }}
                                                                    </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Ciudad</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" id="perfil_ciudad" name="perfil_ciudad">
                                                                <option value="">Seleccione su comuna</option>
                                                                @if (isset($ciudades))
                                                                    @foreach ($ciudades as $ciudad)
                                                                    <option value="{{ $ciudad->id }}" @if ($subdirector_cm->Direccion()->first()->id_ciudad == $ciudad->id) selected @endif>
                                                                        {{ $ciudad->nombre }}
                                                                    </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Dirección" name="perfil_dire" id="perfil_dire" value="{{$subdirector_cm->Direccion()->first()->direccion }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Piso/Depto</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="n&uacute;mero #" name="perfil_numero_dir" id="perfil_numero_dir" value="{{$subdirector_cm->Direccion()->first()->numero_dir }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label"></label>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                            <button type="button" onclick="editar_responsable_datos_residencia();" class="btn btn-info">Guardar Cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--(Editar) Residencia-->
                                        </div>
                                        @endif
                                        <!--Cierre: Card Residencia-->
                                    </div>
                                    @endif
                                    @if(isset($director_gestion_cuidado) && $director_gestion_cuidado != null)
                                    <div class="col-md-4">
                                        <!--Card Información Básica-->
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Datos Personales SubDirector Gestion Cuidado</h5>
                                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_admin_cm(3,{{ $institucion->id }})"><i class="fas fa-trash"></i></button>
                                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_basica" aria-expanded="false" aria-controls="info_basica-1 info_basica-2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Datos Personales-->
                                            <div class="card-body border-top info_basica collapse show" id="info_basica-1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Rut</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_gestion_cuidado->rut }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Nombre</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_gestion_cuidado->nombre }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Primer
                                                            Apellido</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_gestion_cuidado->apellido_uno }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Segundo
                                                            Apellido</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_gestion_cuidado->apellido_dos }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Sexo</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            @if ($director_gestion_cuidado->sexo == 'F')
                                                                Mujer
                                                            @elseif ($director_gestion_cuidado->sexo == 'M')
                                                                Hombre
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Nacimiento</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{ \Carbon\Carbon::parse($director_gestion_cuidado->fecha_nac)->format('d-m-Y') }}
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Datos Personales-->
                                            <!--(Editar)Datos Personales-->
                                            <div class="card-body border-top info_basica collapse" id="pinfo_basica_2">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" placeholder="Rut" id="perfil_rut_medico" name="perfil_rut_medico" value="{{$director_gestion_cuidado->rut }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Nombre</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" placeholder="Nombre" id="perfil_nombre_medico" name="perfil_nombre_medico" value="{{$director_gestion_cuidado->nombre }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Primer Apellido</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="perfil_apellido_uno_medico" name="perfil_apellido_uno_medico" placeholder="Primer Apellido" value="{{$director_gestion_cuidado->apellido_uno }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Segundo Apellido</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="perfil_apellido_dos_medico" name="perfil_apellido_dos_medico" placeholder="Segundo Apellido" value="{{$director_gestion_cuidado->apellido_dos }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Sexo</label>
                                                        <div class="col-sm-7 my-auto">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" id="perfil_sexo_medico" name="perfil_sexo_medico" id="inlineRadio2" value="F" @if ($director_gestion_cuidado->sexo == 'F') checked @endif>
                                                                <label class="form-check-label" for="inlineRadio2">Mujer</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" id="perfil_sexo_medico" name="perfil_sexo_medico" id="inlineRadio1" value="M" @if ($director_gestion_cuidado->sexo == 'M') checked @endif>
                                                                <label class="form-check-label" for="inlineRadio1">Hombre</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Nacimiento</label>
                                                        <div class="col-sm-7">
                                                            <input type="date" class="form-control" id="perfil_nac_medico" name="perfil_nac_medico" value="{{$director_gestion_cuidado->fecha_nac }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label"></label>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                            <button type="button" onclick="editar_responsable_medico_datos_personales();" class="btn btn-info">Guardar Cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: (Editar)Datos Personales-->
                                        </div>
                                        <!--Cierre: Card Datos Personales-->

                                        <!--Contraseña-->
                                        <div class="card">
                                            <div class="card-header d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Cambiar contraseña</h5>
                                                <button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".pass_personal" aria-expanded="false" aria-controls="pass_personal_1 pass_personal_2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Contraseña-->
                                            <div class="card-body pass_personal collapse show" id="pass_personal_1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Contraseña actual</label>
                                                        <div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> •••••••• </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Contraseña-->
                                            <!--(Editar)Contraseña-->
                                            <div class="card-body pass_personal collapse" id="pass_personal_2">
                                                <form method="get" action="{{ route('adm_cm.cambio_contrasena_responsable')}}" id="form_cambio_contrasena_perfil_responsable" name="form_cambio_contrasena_perfil_responsable">
                                                    <input type="hidden" name="responsable_id" id="responsable_id" value="{{ $responsable->Usuario()->first()->id }}">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Contraseña actual</label>
                                                        <div class="col-sm-7">
                                                            <input type="password" class="form-control form-control-sm" name="responsable_actual" id="responsable_actual" placeholder="Contraseña Actual">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Nueva contraseña</label>
                                                        <div class="col-sm-7">
                                                            <input type="password" class="form-control form-control-sm" name="responsable_nueva" id="responsable_nueva" placeholder="Nueva Contraseña">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Repitir contraseña</label>
                                                        <div class="col-sm-7">
                                                            <input type="password" class="form-control form-control-sm" name="responsable_validacion" id="responsable_validacion" placeholder="Repita la Contraseña">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label"></label>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-sm btn-danger mr-2">Cancelar</button>
                                                            <button type="submit" class="btn btn-sm btn-info">Guardar cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: (Editar)Contraseña-->
                                        </div>
                                        <!--Cierre:Contraseña-->
                                        <!--Card Contacto-->
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Contacto</h5>
                                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_contacto" aria-expanded="false" aria-controls="info_contacto_1 info_contacto_2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Contacto-->
                                            <div class="card-body border-top info_contacto collapse show" id="info_contacto_1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Correo
                                                            Electrónico</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_gestion_cuidado->email }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6 my-auto ml-2">{{$director_gestion_cuidado->telefono_uno }}</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6 my-auto ml-2">{{$director_gestion_cuidado->telefono_dos }}</div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Contacto-->
                                            <!--(Editar) Contacto-->
                                            <div class="card-body border-top info_contacto collapse " id="info_contacto_2">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Correo Electrónico</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="Perfil_email" name="Perfil_email" placeholder="Correo Electrónico" value="{{$director_gestion_cuidado->email }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Teléfono" id="Perfil_fono" name="Perfil_fono" value="{{$director_gestion_cuidado->telefono_uno }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Teléfono" id="Perfil_fono_dos" name="Perfil_fono_dos" value="{{$director_gestion_cuidado->telefono_dos }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label"></label>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                            <button type="button" onclick="editar_responsable_datos_contacto()" class="btn btn-info">Guardar Cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--(Editar) Contacto-->
                                        </div>
                                        <!--Cierre: Card Contacto-->
                                        <!--Card Residencia-->
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Residencia</h5>
                                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_residencial" aria-expanded="false" aria-controls="info_residencial_1 info_residencial_2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Residencia-->
                                            <div class="card-body border-top info_residencial collapse show" id="info_residencial_1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$director_gestion_cuidado->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Comuna</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$director_gestion_cuidado->Direccion()->first()->Ciudad()->first()->nombre }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$director_gestion_cuidado->Direccion()->first()->direccion . ' ' . $responsable->Direccion()->first()->numero_dir }}
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Residencia-->
                                            <!--(Editar) Residencia-->
                                            <div class="card-body border-top info_residencial collapse " id="info_residencial_2">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" onchange="buscar_ciudad_responsable();" id="perfil_region" name="perfil_region">
                                                                <option value="">Seleccione una Región</option>
                                                                @if (isset($regiones))
                                                                    @foreach ($regiones as $region)
                                                                    <option value="{{ $region->id }}" @if ($region->id ==
                                                                    $director_gestion_cuidado->Direccion()->first()->Ciudad()->first()->Region()->first()->id) selected @endif>
                                                                        {{ $region->nombre }}
                                                                    </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Ciudad</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" id="perfil_ciudad" name="perfil_ciudad">
                                                                <option value="">Seleccione su comuna</option>
                                                                @if (isset($ciudades))
                                                                    @foreach ($ciudades as $ciudad)
                                                                    <option value="{{ $ciudad->id }}" @if ($director_gestion_cuidado->Direccion()->first()->id_ciudad == $ciudad->id) selected @endif>
                                                                        {{ $ciudad->nombre }}
                                                                    </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Dirección" name="perfil_dire" id="perfil_dire" value="{{$director_gestion_cuidado->Direccion()->first()->direccion }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Piso/Depto</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="n&uacute;mero #" name="perfil_numero_dir" id="perfil_numero_dir" value="{{$director_gestion_cuidado->Direccion()->first()->numero_dir }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label"></label>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                            <button type="button" onclick="editar_responsable_datos_residencia();" class="btn btn-info">Guardar Cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--(Editar) Residencia-->
                                        </div>
                                        <!--Cierre: Card Residencia-->
                                    </div>
                                    @endif
                                    @if(isset($director_tecnico) && $director_tecnico != null)
                                    <div class="col-md-4">
                                        <!--Card Información Básica-->
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Datos Personales Director Técnico</h5>
                                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_admin_cm(8,{{ $institucion->id }})"><i class="fas fa-trash"></i></button>
                                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_basica" aria-expanded="false" aria-controls="info_basica-1 info_basica-2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Datos Personales-->
                                            <div class="card-body border-top info_basica collapse show" id="info_basica-1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Rut</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_tecnico->rut }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Nombre</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_tecnico->nombre }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Primer
                                                            Apellido</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_tecnico->apellido_uno }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Segundo
                                                            Apellido</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_tecnico->apellido_dos }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Sexo</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            @if ($director_tecnico->sexo == 'F')
                                                                Mujer
                                                            @elseif ($director_tecnico->sexo == 'M')
                                                                Hombre
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Nacimiento</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{ \Carbon\Carbon::parse($director_tecnico->fecha_nac)->format('d-m-Y') }}
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Datos Personales-->
                                            <!--(Editar)Datos Personales-->
                                            <div class="card-body border-top info_basica collapse" id="pinfo_basica_2">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" placeholder="Rut" id="perfil_rut_medico" name="perfil_rut_medico" value="{{$director_tecnico->rut }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Nombre</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" placeholder="Nombre" id="perfil_nombre_medico" name="perfil_nombre_medico" value="{{$director_tecnico->nombre }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Primer Apellido</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="perfil_apellido_uno_medico" name="perfil_apellido_uno_medico" placeholder="Primer Apellido" value="{{$director_tecnico->apellido_uno }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Segundo Apellido</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="perfil_apellido_dos_medico" name="perfil_apellido_dos_medico" placeholder="Segundo Apellido" value="{{$director_tecnico->apellido_dos }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Sexo</label>
                                                        <div class="col-sm-7 my-auto">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" id="perfil_sexo_medico" name="perfil_sexo_medico" id="inlineRadio2" value="F" @if ($director_tecnico->sexo == 'F') checked @endif>
                                                                <label class="form-check-label" for="inlineRadio2">Mujer</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" id="perfil_sexo_medico" name="perfil_sexo_medico" id="inlineRadio1" value="M" @if ($director_tecnico->sexo == 'M') checked @endif>
                                                                <label class="form-check-label" for="inlineRadio1">Hombre</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Nacimiento</label>
                                                        <div class="col-sm-7">
                                                            <input type="date" class="form-control" id="perfil_nac_medico" name="perfil_nac_medico" value="{{$director_tecnico->fecha_nac }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label"></label>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                            <button type="button" onclick="editar_responsable_medico_datos_personales();" class="btn btn-info">Guardar Cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: (Editar)Datos Personales-->
                                        </div>
                                        <!--Cierre: Card Datos Personales-->

                                        <!--Contraseña-->
                                        <div class="card">
                                            <div class="card-header d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Cambiar contraseña</h5>
                                                <button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".pass_personal" aria-expanded="false" aria-controls="pass_personal_1 pass_personal_2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Contraseña-->
                                            <div class="card-body pass_personal collapse show" id="pass_personal_1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Contraseña actual</label>
                                                        <div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> •••••••• </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Contraseña-->
                                            <!--(Editar)Contraseña-->
                                            <div class="card-body pass_personal collapse" id="pass_personal_2">
                                                <form method="get" action="{{ route('adm_cm.cambio_contrasena_responsable')}}" id="form_cambio_contrasena_perfil_responsable" name="form_cambio_contrasena_perfil_responsable">
                                                    <input type="hidden" name="responsable_id" id="responsable_id" value="{{ $responsable->Usuario()->first()->id }}">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Contraseña actual</label>
                                                        <div class="col-sm-7">
                                                            <input type="password" class="form-control form-control-sm" name="responsable_actual" id="responsable_actual" placeholder="Contraseña Actual">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Nueva contraseña</label>
                                                        <div class="col-sm-7">
                                                            <input type="password" class="form-control form-control-sm" name="responsable_nueva" id="responsable_nueva" placeholder="Nueva Contraseña">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Repitir contraseña</label>
                                                        <div class="col-sm-7">
                                                            <input type="password" class="form-control form-control-sm" name="responsable_validacion" id="responsable_validacion" placeholder="Repita la Contraseña">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label"></label>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-sm btn-danger mr-2">Cancelar</button>
                                                            <button type="submit" class="btn btn-sm btn-info">Guardar cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: (Editar)Contraseña-->
                                        </div>
                                        <!--Cierre:Contraseña-->
                                        <!--Card Contacto-->
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Contacto</h5>
                                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_contacto" aria-expanded="false" aria-controls="info_contacto_1 info_contacto_2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Contacto-->
                                            <div class="card-body border-top info_contacto collapse show" id="info_contacto_1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Correo
                                                            Electrónico</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_tecnico->email }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6 my-auto ml-2">{{$director_tecnico->telefono_uno }}</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6 my-auto ml-2">{{$director_tecnico->telefono_dos }}</div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Contacto-->
                                            <!--(Editar) Contacto-->
                                            <div class="card-body border-top info_contacto collapse " id="info_contacto_2">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Correo Electrónico</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="Perfil_email" name="Perfil_email" placeholder="Correo Electrónico" value="{{$director_tecnico->email }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Teléfono" id="Perfil_fono" name="Perfil_fono" value="{{$director_tecnico->telefono_uno }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Teléfono" id="Perfil_fono_dos" name="Perfil_fono_dos" value="{{$director_tecnico->telefono_dos }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label"></label>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                            <button type="button" onclick="editar_responsable_datos_contacto()" class="btn btn-info">Guardar Cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--(Editar) Contacto-->
                                        </div>
                                        <!--Cierre: Card Contacto-->
                                        <!--Card Residencia-->
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Residencia</h5>
                                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_residencial" aria-expanded="false" aria-controls="info_residencial_1 info_residencial_2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Residencia-->
                                            <div class="card-body border-top info_residencial collapse show" id="info_residencial_1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$director_tecnico->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Comuna</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$director_tecnico->Direccion()->first()->Ciudad()->first()->nombre }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$director_tecnico->Direccion()->first()->direccion . ' ' . $responsable->Direccion()->first()->numero_dir }}
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Residencia-->
                                            <!--(Editar) Residencia-->
                                            <div class="card-body border-top info_residencial collapse " id="info_residencial_2">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" onchange="buscar_ciudad_responsable();" id="perfil_region" name="perfil_region">
                                                                <option value="">Seleccione una Región</option>
                                                                @if (isset($regiones))
                                                                    @foreach ($regiones as $region)
                                                                    <option value="{{ $region->id }}" @if ($region->id ==
                                                                    $director_tecnico->Direccion()->first()->Ciudad()->first()->Region()->first()->id) selected @endif>
                                                                        {{ $region->nombre }}
                                                                    </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Ciudad</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" id="perfil_ciudad" name="perfil_ciudad">
                                                                <option value="">Seleccione su comuna</option>
                                                                @if (isset($ciudades))
                                                                    @foreach ($ciudades as $ciudad)
                                                                    <option value="{{ $ciudad->id }}" @if ($director_tecnico->Direccion()->first()->id_ciudad == $ciudad->id) selected @endif>
                                                                        {{ $ciudad->nombre }}
                                                                    </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Dirección" name="perfil_dire" id="perfil_dire" value="{{$director_tecnico->Direccion()->first()->direccion }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Piso/Depto</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="n&uacute;mero #" name="perfil_numero_dir" id="perfil_numero_dir" value="{{$director_tecnico->Direccion()->first()->numero_dir }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label"></label>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                            <button type="button" onclick="editar_responsable_datos_residencia();" class="btn btn-info">Guardar Cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--(Editar) Residencia-->
                                        </div>
                                        <!--Cierre: Card Residencia-->
                                    </div>
                                    @endif
                                </div>