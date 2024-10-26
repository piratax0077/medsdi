<!--Tab perfil persona liquidacion -->
<div class="tab-pane fade" id="info-liquidacion" role="tabpanel" aria-labelledby="info-liquidacion-tab">
    {{-- formulario para agregar  --}}
    <div class="row">
        <div class="col-md-12 pb-3">
            <h5 class="f-20 text-c-blue d-inline mr-2 pt-1">Cuentas bancarias para depósito</h5>
            <button type="button" class="btn btn-info-light-c btn-xs d-inline" onclick="cta_banco_m();"><i class="feather icon-plus"></i> Añadir</button>
        </div>

        <div class="row">
            @if($liquidacion != NULL)
                @foreach($liquidacion as $key_liqu => $value_liqu)
                    {{-- CAJA DE REGISTRO LIQUIDACION  --}}
                    <div class="col-md-6">
                        <!--Card LIQUIDACION-->
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                {{-- <h5 class="mb-0 text-white">{{ $value_liqu->banco->nombre }}</h5> --}}
                                <h5 class="mb-0 text-white">{{ $value_liqu->banco['nombre'] }}</h5>
                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".u_personal_liquidacion_{{ $value_liqu->id }}" aria-expanded="false" aria-controls="u_personal_liquidacion_{{ $value_liqu->id }}_1 u_personal_liquidacion_{{ $value_liqu->id }}_2">
                                    <i class="feather icon-edit"></i>
                                </button>
                            </div>
                            <!--LIQUIDACION-->
                            <div class="card-body border-top u_personal_liquidacion_{{ $value_liqu->id }} collapse show" id="u_personal_liquidacion_{{ $value_liqu->id }}_1">
                                <form>
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label">Rut</label>
                                        <div class="col-sm-6 pt-2 ml-2 font-weight-bolder"> {{ $value_liqu->serie }}</div>
                                        <label class="col-sm-5 col-form-label">Titular</label>
                                        <div class="col-sm-6 pt-2 ml-2 font-weight-bolder"> {{ $value_liqu->autor }}</div>
                                        <label class="col-sm-5 col-form-label">Banco</label>
                                        <div class="col-sm-6 pt-2 ml-2 font-weight-bolder"> {{ $value_liqu->banco['nombre'] }}</div>
                                        <label class="col-sm-5 col-form-label">Cuenta</label>
                                        <div class="col-sm-6 pt-2 ml-2 font-weight-bolder"> {{  substr($value_liqu->numero_control, 0, 3) . '*******'; }}</div>
                                        <label class="col-sm-5 col-form-label">Tipo Cuenta</label>
                                        <div class="col-sm-6 pt-2 ml-2 font-weight-bolder"> {{  $value_liqu->otro; }}</div>
                                        <label class="col-sm-5 col-form-label">Email</label>
                                        <div class="col-sm-6 pt-2 ml-2 font-weight-bolder"> {{ $value_liqu->email }}</div>
                                        <label class="col-sm-5 col-form-label">Principal</label>
                                        <div class="col-sm-6 pt-2 ml-2 font-weight-bolder">
                                            @if ($value_liqu->principal == 1)
                                                Principal
                                            @else
                                                Opcional
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!--Cierre: profesion->                                                                                                                                                                                                                                                                                                              <!--(Editar)profesion-->
                            <div class="card-body border-top u_personal_liquidacion_{{ $value_liqu->id }} collapse" id="u_personal_liquidacion_{{ $value_liqu->id }}_2">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Rut" id="{{ $value_liqu->id }}_liquidacion_rut" value="{{ $value_liqu->serie }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">Titular</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Nombre" id="{{ $value_liqu->id }}_liquidacion_nombre" value="{{ $value_liqu->autor }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">Banco</label>
                                    <div class="col-sm-7">
                                        <select name="{{ $value_liqu->id }}_liquidacion_banco" id="{{ $value_liqu->id }}_liquidacion_banco" class="form-control control-sm">
                                            <option value="">Seleccione</option>
                                            @foreach ( $bancos as $banco)
                                                @if ($value_liqu->casa == $banco->id)
                                                <option value="{{ $banco->id }}" selected>{{ $banco->nombre }}</option>
                                                @else
                                                <option value="{{ $banco->id }}">{{ $banco->nombre }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">Cuenta</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Cuenta" id="{{ $value_liqu->id }}_liquidacion_cuenta" value="{{ $value_liqu->numero_control }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">Tipo Cuenta</label>
                                    <div class="col-sm-7">
                                        <select name="{{ $value_liqu->id }}_liquidacion_tipo_cuenta" id="{{ $value_liqu->id }}_liquidacion_tipo_cuenta" class="form-control control-sm">
                                            <option value="">Seleccione</option>
                                            <option value="Corriente" @if(mb_strtoupper($value_liqu->otro) == mb_strtoupper('Corriente')) selected @endif>Corriente</option>
                                            <option value="Ahorro" @if(mb_strtoupper($value_liqu->otro) == mb_strtoupper('Ahorro')) selected @endif>Ahorro</option>
                                            <option value="Vista" @if(mb_strtoupper($value_liqu->otro) == mb_strtoupper('Vista')) selected @endif>Vista</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">Email</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Email" id="{{ $value_liqu->id }}_liquidacion_email" value="{{ $value_liqu->email }}">
                                    </div>
                                </div>
                                @if($liqui_principal == 0)
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label font-weight-bolder">Principal</label>
                                        <div class="col-sm-7 switch switch-success d-inline ">
                                            @if ($value_liqu->principal == 1)
                                            <input type="checkbox" id="{{ $value_liqu->id }}_liquidacion_principal" name="{{ $value_liqu->id }}_liquidacion_principal" value="" checked>
                                            @else
                                            <input type="checkbox" id="{{ $value_liqu->id }}_liquidacion_principal" name="{{ $value_liqu->id }}_liquidacion_principal" value="">
                                            @endif
                                            <label for="{{ $value_liqu->id }}_liquidacion_principal" class="cr"></label>
                                        </div>
                                    </div>
                                @else
                                    @if($value_liqu->principal == 0)
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label font-weight-bolder">Principal</label>
                                            <div class="col-sm-7 switch switch-success d-inline ">
                                                <input type="checkbox" id="{{ $value_liqu->id }}_liquidacion_principal" name="{{ $value_liqu->id }}_liquidacion_principal" disabled="disabled" value="">
                                                <label for="{{ $value_liqu->id }}_liquidacion_principal" class="cr"></label>
                                            </div>
                                        </div>
                                    @else
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label font-weight-bolder">Principal</label>
                                            <div class="col-sm-7 switch switch-success d-inline ">
                                                <input type="checkbox" id="{{ $value_liqu->id }}_liquidacion_principal" name="{{ $value_liqu->id }}_liquidacion_principal" value="" checked>
                                                <label for="{{ $value_liqu->id }}_liquidacion_principal" class="cr"></label>
                                            </div>
                                        </div>
                                    @endif

                                @endif

                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label"></label>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button class="btn btn-info" onclick="modificar_registro_liquidacion({{ $value_liqu->id }});">Guardar Cambios</button>
                                    </div>
                                </div>
                            </div>
                            <!--Cierre: (Editar)profesion-->
                        </div>
                        <!--Cierre: Card profesion-->
                    </div>
                @endforeach
            @endif


        </div>

    </div>
</div>

@include('app.profesional.modales.datos_bancarios')

<script>

    function cta_banco_m()
    {
        $('#cta_banco_modal').modal('show');
    }

    function cerrar_cta_banco_m()
    {
        $('#cta_banco_modal').modal('hide');
    }

    function agregar_registro_liquidacion()
    {
        var mensaje = '';
        var valido = 1;
        var id_profesional = $('#liquidacion_id_profesional').val();
        var email = $('#liquidacion_email').val();
        var rut = $('#liquidacion_rut').val();
        var nombre = $('#liquidacion_nombre').val();
        var banco = $('#liquidacion_banco').val();
        var cuenta = $('#liquidacion_cuenta').val();
        var tipo_cuenta = $('#liquidacion_tipo_cuenta').val();
        var principal = 0;
        if($('#liquidacion_principal').prop('checked'))
            principal = 1;

        if(rut == '')
        {
            mensaje += 'Campo rut requerido\n';
            valido = 0;
        }
        if(nombre == '')
        {
            mensaje += 'Campo nombre requerido\n';
            valido = 0;
        }
        if(banco == '')
        {
            mensaje += 'Campo banco requerido\n';
            valido = 0;
        }
        if(cuenta == '')
        {
            mensaje += 'Campo cuenta requerido\n';
            valido = 0;
        }
        if(tipo_cuenta == '')
        {
            mensaje += 'Campo cuenta requerido\n';
            valido = 0;
        }

        if(valido == 1)
        {
            let url = "{{ route('liquidacion.agregar') }}";
            let token = CSRF_TOKEN;

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: CSRF_TOKEN,
                    id_profesional:id_profesional,
                    email:email,
                    rut:rut,
                    nombre:nombre,
                    banco:banco,
                    cuenta:cuenta,
                    tipo_cuenta:tipo_cuenta,
                    principal:principal,
                },
            })
            .done(function(data) {

                if (data.estado == 1) {

                    swal({
                        title: "se a agregado datos de liquidacion con exito",
                        icon: "success",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                    setTimeout(function() {
                        location.reload()
                    }, 100);
                    // alert('se modifico antecedentes del paciente');
                    // location.reload();

                } else {
                    swal({
                        title: "Error al agregar datos de liquidacion",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('Error al modificar los antecedentes');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
        else
        {
            swal({
                title: "Campo requerido",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }

    }

    function modificar_registro_liquidacion(id)
    {
        var mensaje = '';
        var valido = 1;
        var id_profesional = $('#liquidacion_id_profesional').val();

        var rut = $('#'+id+'_liquidacion_rut').val();
        var nombre = $('#'+id+'_liquidacion_nombre').val();
        var banco = $('#'+id+'_liquidacion_banco').val();
        var cuenta = $('#'+id+'_liquidacion_cuenta').val();
        var tipo_cuenta = $('#'+id+'_liquidacion_tipo_cuenta').val();
        var email = $('#'+id+'_liquidacion_email').val();
        var principal = 0;
        if($('#'+id+'_liquidacion_principal').prop('checked'))
            principal = 1;

        if(rut == '')
        {
            mensaje += 'Campo rut requerido\n';
            valido = 0;
        }
        if(nombre == '')
        {
            mensaje += 'Campo nombre requerido\n';
            valido = 0;
        }
        if(banco == '')
        {
            mensaje += 'Campo banco requerido\n';
            valido = 0;
        }
        if(cuenta == '')
        {
            mensaje += 'Campo cuenta requerido\n';
            valido = 0;
        }
        if(tipo_cuenta == '')
        {
            mensaje += 'Campo tipo cuenta requerido\n';
            valido = 0;
        }

        if(valido == 1)
        {
            let url = "{{ route('liquidacion.modificar') }}";
            let token = CSRF_TOKEN;

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: CSRF_TOKEN,
                    id:id,
                    id_profesional:id_profesional,
                    email:email,
                    rut:rut,
                    nombre:nombre,
                    banco:banco,
                    cuenta:cuenta,
                    tipo_cuenta:tipo_cuenta,
                    principal:principal,
                },
            })
            .done(function(data) {

                if (data.estado == 1) {

                    swal({
                        title: "se a modificar datos de liquidacion con exito",
                        icon: "success",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                    setTimeout(function() {
                        location.reload()
                    }, 100);
                    // alert('se modifico antecedentes del paciente');
                    // location.reload();

                } else {
                    swal({
                        title: "Error al modificar datos de liquidacion",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('Error al modificar los antecedentes');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
        else
        {
            swal({
                title: "Campo requerido",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }
    }

</script>
