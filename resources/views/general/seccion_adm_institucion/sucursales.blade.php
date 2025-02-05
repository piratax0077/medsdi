<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header pt-3 pb-2 bg-light">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="f-18 d-inline mt-3 text-info">Sucursales</h6>
                        <div class="btn-group mb-2 mr-2 float-right">
                            <button type="button" class="btn btn-info btn-sm" onclick="ag_sucursal();"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Añadir nueva</button>
                            <button type="button" class="btn btn-outline-info  btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                            <div class="dropdown-menu">
                                <button class="dropdown-item" type="button" class="btn  btn-primary" data-toggle="modal" data-target="#modal_agregar_lugar_existente">Desasociar o agregar<br> lugar de atención <br>existente</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                    </div>
                </div>
                <table id="sucursales_cm" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">Identificación</th>
                            <th class="text-center align-middle">Dirección</th>
                            <th class="text-center align-middle">Contacto</th>
                            <th class="text-center align-middle">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($sucursales)
                            @foreach ($sucursales as $suc)
                                <tr>
                                    <td class="align-middle text-center">
                                        <strong>{{ $suc->nombre }}</strong><br>
                                        {{ $suc->rut }}
                                    </td>
                                    <td class="align-middle text-center">
                                        {{ $suc->direccion->direccion }} {{ $suc->direccion->numero_dir }}<br>
                                        {{ $suc->ciudadObj->nombre }}
                                    </td>
                                    <td class="align-middle text-center">
                                        <span>{{ $suc->email }}</span><br>
                                        <span>{{ $suc->telefono }}</span>
                                        @if(!empty($suc->telefono_2))
                                            <br><span>{{ $suc->telefono_2 }}</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <!--Botón Modal-->
                                        <button type="button" class="btn btn-info btn-sm btn-icon" onclick="ed_sucursal({{ $suc->id }});" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                        <!--Botón Modal-->
                                        {{-- <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="asis_sucursal({{ $suc->id }});" data-toggle="tooltip" data-placement="top" title="Asistentes"><i class="feather icon-user"></i></button> --}}
                                        <!--Botón Modal-->
                                        <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="hor_sucursal({{ $suc->id }});" data-toggle="tooltip" data-placement="top" title="Horario de sucursal"><i class="feather icon-watch"></i></button>
                                    </td>
                                </tr>

                            @endforeach

                        @endif
                        {{-- <tr>
                            <td class="align-middle text-center">
                                <strong>CEMICAL (CASA MATRIZ)</strong><br>
                                00.000.000-0
                            </td>
                            <td class="align-middle text-center">
                                <span>Arlegui, 23</span><br>
                                <span>Viña del Mar</span>
                            </td>
                            <td class="align-middle text-center">
                                <span>contacto@correo.cl</span><br>
                                <span>2178218</span>
                            </td>
                            <td class="align-middle text-center">
                                <!--Botón Modal-->
                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="ed_sucursal();" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                <!--Botón Modal-->
                                <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="asis_sucursal();" data-toggle="tooltip" data-placement="top" title="Asistentes"><i class="feather icon-user"></i></button>
                                <!--Botón Modal-->
                                <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="hor_sucursal();" data-toggle="tooltip" data-placement="top" title="Horario de sucursal"><i class="feather icon-watch"></i></button>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{--  MODAL  SUCURSAL  --}}
<div id="a_sucursal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_sucursal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Añadir nueva sucursal</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="a_sucursal_id_institucion" id="a_sucursal_id_institucion" value="{{ $institucion->id }}">
                {{-- <input type="hidden" name="a_sucursal_id_lugar_atencion" id="a_sucursal_id_lugar_atencion" value="{{ $institucion->id_lugar_atencion }}"> --}}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Rut</label>
                            <input class="form-control form-control-sm" name="a_sucursal_rut" id="a_sucursal_rut" type="text" oninput="formatoRut(this)">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Nombre</label>
                            <input class="form-control form-control-sm" name="a_sucursal_nombre" id="a_sucursal_nombre" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Dirección</label>
                            <input class="form-control form-control-sm" name="a_sucursal_direccion" id="a_sucursal_direccion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Región</label>
                            <select class="form-control form-control-sm" name="a_sucursal_region" id="a_sucursal_region" onchange="buscar_ciudad_sucursal('a_sucursal_region', 'a_sucursal_comuna', 0);">
                                <option value="">Seleccione</option>
                                @if($regiones)
                                    @foreach ($regiones as $reg )
                                        <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Comuna</label>
                            <select class="form-control form-control-sm" name="a_sucursal_comuna" id="a_sucursal_comuna">
                                {{--  --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Correo electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="a_sucursal_email" type="a_sucursal_email">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Teléfono</label>
                            <input class="form-control form-control-sm" name="a_sucursal_telefono_1" id="a_sucursal_telefono_1"
                                type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="a_sucursal_telefono_2" id="a_sucursal_telefono_2"
                                type="text">
                        </div>
                    </div>
                    {{-- <div class="col-sm-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="not_pacientes_1">
                                <label for="not_pacientes_1" class="cr"></label>
                                <label>Notificar a pacientes</label>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn-sm mx-auto" onclick="registrar_sucursal();">Añadir nueva sucursal</button>
            </div>
        </div>
    </div>
</div>

<div id="e_sucursal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="e_sucursal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Editar sucursal ( Nombre de sucursal)
                    <!--Sin los parentesis, solo cargar el nombre de la sucursal-->
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Rut</label>
                                <input class="form-control form-control-sm" name="nombre_lugar_atencion"
                                    id="nombre_lugar_atencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Nombre</label>
                                <input class="form-control form-control-sm" name="nombre_lugar_atencion"
                                    id="nombre_lugar_atencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Dirección</label>
                                <input class="form-control form-control-sm" name="direccion"
                                    id="direccion_lugar_atencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Región</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione</option>
                                    <optgroup label="Valparaíso">
                                        <option value="AL">Viña del Mar</option>
                                        <option value="LA">La Calera</option>
                                        <option value="VA">Valparaíso</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Comuna</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione</option>
                                    <option value="AL">Viña del Mar</option>
                                    <option value="LA">La Calera</option>
                                    <option value="VA">Valparaíso</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Correo electrónico</label>
                                <input class="form-control form-control-sm" name="email" id="email"
                                    type="email">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Teléfono</label>
                                <input class="form-control form-control-sm" name="telefono_1" id="telefono_1"
                                    type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Teléfono (opcional)</label>
                                <input class="form-control form-control-sm" name="telefono_2" id="telefono_2"
                                    type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="not_pacientes_1">
                                    <label for="not_pacientes_1" class="cr"></label>
                                    <label>Notificar a pacientes</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info btn-sm mx-auto">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>

<div id="asistentes_sucursal" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="asistentes_sucursal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Asistentes de ( Nombre de sucursal)
                    <!--Sin los parentesis, solo cargar el nombre de la sucursal-->
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h6>Ingrese Rut de el o la asistente que desea asociar a su lugar de atención</h6>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-sm" placeholder="Rut"
                                    aria-label="Rut" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-info btn-sm" type="button"
                                        id="button-addon2">Asociar</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <!--TABLA RESPONSIVA HACIA ABAJO-->
                            <table id="res-config"
                                class="display table table-striped dt-responsive nowrap text-center table-xs"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Acción</th>
                                        <th>Rut</th>
                                        <th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="habdes_1">
                                                <label class="custom-control-label" for="habdes_1"></label>
                                            </div>
                                        </td>
                                        <td>00.000.000-0</td>
                                        <td>Pepita Sanchez Díaz</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-sm mx-auto">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="horario_sucursal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="horario_sucursal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Horario de ( Nombre de sucursal)
                    <!--Sin los parentesis, solo cargar el nombre de la sucursal-->
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h6 class="text-c-blue">Horario de atención</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Día</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione</option>
                                    <option>Lunes a viernes</option>
                                    <option>Sabado y domingos</option>
                                    <option>Lunes</option>
                                    <option>Martes</option>
                                    <option>Miércoles</option>
                                    <option>Jueves</option>
                                    <option>Viernes</option>
                                    <option>Sábado</option>
                                    <option>Domingo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Desde</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione</option>
                                    <option>Cargar horas</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Hasta</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione</option>
                                    <option>Cargar horas</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <button type="button" class="btn btn-info btn-sm btn-block">Añadir horario</button></td>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <!--TABLA RESPONSIVA HACIA ABAJO-->
                            <table id="res-config"
                                class="display table table-striped dt-responsive nowrap table-xs text-center"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Desde</th>
                                        <th>Hasta</th>
                                        <th>Día</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>8:00 am</td>
                                        <td>19:00 pm</td>
                                        <td>Martes</td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm btn-icon"
                                                data-toggle="tooltip" data-placement="top" title="Eliminar"><i
                                                    class="feather icon-x"></i></button>
                                        </td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td>8:00 am</td>
                                        <td>19:00 pm</td>
                                        <td>Lunes a viernes</td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm btn-icon"
                                                data-toggle="tooltip" data-placement="top" title="Eliminar"><i
                                                    class="feather icon-x"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10:00 am</td>
                                        <td>14:00 pm</td>
                                        <td>Sábado</td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm btn-icon"
                                                data-toggle="tooltip" data-placement="top" title="Eliminar"><i
                                                    class="feather icon-x"></i></button>
                                        </td>
                                    </tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-sm mx-auto">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    /*-SUCURSALES-*/
    /*-Agregar sucursal-*/
    function ag_sucursal() {
        $('#a_sucursal').modal('show');
    }

    function registrar_sucursal()
    {
        var id_institucion = $('#a_sucursal_id_institucion').val();
        var id_lugar_atencion = '';
        var rut = $('#a_sucursal_rut').val();
        var nombre = $('#a_sucursal_nombre').val();
        var direccion = $('#a_sucursal_direccion').val();
        var region = $('#a_sucursal_region').val();
        var comuna = $('#a_sucursal_comuna').val();
        var email = $('#a_sucursal_email').val();
        var telefono_1 = $('#a_sucursal_telefono_1').val();
        var telefono_2 = $('#a_sucursal_telefono_2').val();

        let url = "{{ route('sucursal.registrar') }}";
        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: CSRF_TOKEN,
                id_institucion: id_institucion,
                id_lugar_atencion: '',
                rut: rut,
                nombre: nombre,
                direccion: direccion,
                region: region,
                comuna: comuna,
                email: email,
                telefono: telefono_1,
                telefono_2: telefono_2,
            },
        })
        .done(function(data) {
            if (data != null)
            {
                console.log(data);
                $('#a_sucursal_rut').val('');
                $('#a_sucursal_nombre').val('');
                $('#a_sucursal_direccion').val('');
                $('#a_sucursal_region').val('');
                $('#a_sucursal_comuna').val('');
                $('#a_sucursal_email').val('');
                $('#a_sucursal_telefono_1').val('');
                $('#a_sucursal_telefono_2').val('');

                $('#a_sucursal').modal('hide');

                swal({
                    title: "registro exitoso",
                    icon: "success",
                });

                setTimeout(function() {
                    location.reload()
                }, 100);
            }
            else
            {
                swal({
                    title: "Error al registrar",
                    icon: "error",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    /*-Editar sucursal-*/
    function ed_sucursal() {
        $('#e_sucursal').modal('show');
    }

    /*-Asistentes de sucursal-*/
    function asis_sucursal() {
        $('#asistentes_sucursal').modal('show');
    }

    /*-Horario sucursal -*/
    function hor_sucursal() {
        $('#horario_sucursal').modal('show');
    }

    /** ciudad */
    function buscar_ciudad_sucursal(select_region, select_ciudad, id_ciudad=0) {

        let region = $('#'+select_region).val();
        let url = "{{ route('home.buscar_ciudad_region') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                region: region,
            },
        })
        .done(function(data) {
            if (data != null) {
                data = JSON.parse(data);

                let ciudades = $('#'+select_ciudad);

                ciudades.find('option').remove();
                ciudades.append('<option value="0">Seleccione Ciudad</option>');
                $(data).each(function(i, v) { // indice, valor
                    ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                })

                if(id_ciudad != 0)
                    ciudades.val(id_ciudad);

            } else {

                swal({
                    title: "Error",
                    text: "Error al cargar las ciudades",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                })
                // alert('No se pudo Cargar las ciudades');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    };

    function formatoRut(rut)
    {
        var valor = rut.value.replace('.','');
        valor = valor.replace(/\-/g,'');
        valor = valor.replace(/\ /g,'');
        valor = valor.replace(/[qwertyuiopasdfghjlñzxcvbnmQWERTYUIOPASDFGHJLÑZXCVBNM]/g,'');
        valor = valor.replace(/[/,´.*'+¿?^$!¡=&%"#¨_:;`~°{}()|[\]\\]/g,'');

        cuerpo = valor.slice(0,-1);
        dv = valor.slice(-1).toUpperCase();
        rut.value = cuerpo + '-'+ dv

        if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

        suma = 0;
        multiplo = 2;

        for(i=1;i<=cuerpo.length;i++)
        {
            index = multiplo * valor.charAt(cuerpo.length - i);
            suma = suma + index;
            if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
        }

        dvEsperado = 11 - (suma % 11);
        dv = (dv == 'K')?10:dv;
        dv = (dv == 0)?11:dv;

        if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

        rut.setCustomValidity('');
    }
</script>
