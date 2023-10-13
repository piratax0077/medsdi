{{-- INCLUIR EN FICHA --}}
{{-- @include('app.profesional.modales.boton_flotante_agenda_autorizacion') --}}

{{-- MODIFICAR EN FICHA TAB DE LICENCIA --}}
{{-- @if(!empty(session('lic_token')) && session('lic_estado') == 1)
    <a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#licencia" role="tab" aria-controls="licencia" aria-selected="false" onclick="cargar_licencias();">Licencia</a>
@else
    <a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#" role="tab" aria-controls="licencia" aria-selected="false" onclick="abrir_autorizacion();">Licencia</a>
@endif --}}

{{-- INCLUIR EN TEMPLATE DE FICHA --}}
{{-- @yield('css-btn-autorizacion') --}}
{{-- @yield('page-script-btn-autorizacion') --}}

@section('css-btn-autorizacion')
    <style>
        .btn-agenda-autorizacion {
            display: block;
            position: fixed;
            color: #fff;
            padding: 8px;
            text-align: center;
            right: 0;
            bottom: 64%;
            z-index: 2;
            cursor: pointer;
            /* background-color: #1cbebe; */
            transition: 0.3s;
            font-size: 0.9em;
            line-height: 12px;
            border-radius: 10% 0 0 10%;
        }

        .btn-agenda-autorizacion:hover {
            color: #fff;
            padding-right: 20px;
            /* background-color: #03a6a6; */
            transition: 0.3s;
        }
    </style>
@endsection

<!-- BOTÓN FLOTANTE AUTORIZACION (AUTORIZACION LICENCIA) -->
<div class="bs-offset-main bs-canvas-anim">
    @if(!empty(session('lic_token')) && session('lic_estado') == 1)
        <button class="btn btn-agenda-autorizacion btn-info shadow-sm" type="button" onclick="abrir_autorizacion();"><i class="feather feather icon-lock f-22"></i> <br>Autorización</button>
    @else
        <button class="btn btn-agenda-autorizacion btn-danger shadow-sm" type="button" onclick="abrir_autorizacion();"><i class="feather feather icon-lock f-22"></i> <br>Autorización</button>
    @endif
</div>

<div id="modal_autorizacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Recepcion de bonos" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_autorizacionLabel">Autorización</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_autorizacion();"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @if(!empty(session('lic_token')) && session('lic_estado') == 1)
                        <div class="col-md-6 text-center">
                            <button class="btn btn-xs btn-success" id="modal_autorizacion_btn_solicitar" onclick="solicitar_autorizacion_licencia();" disabled>Abrir mis Talonarios de Receta y Licencia</button>
                        </div>
                        <div class="col-md-6 text-center">
                            <button class="btn btn-xs btn-danger" id="modal_autorizacion_btn_cancelar" onclick="cancelar_autorizacion_licencia();" >Cerrar mis Talonarios de Receta y Licencia</button>
                        </div>
                    @else
                        <div class="col-md-6 text-center">
                            <button class="btn btn-xs btn-success" id="modal_autorizacion_btn_solicitar" onclick="solicitar_autorizacion_licencia();">Abrir mis Talonarios de Receta y Licencia</button>
                        </div>
                        <div class="col-md-6 text-center">
                            <button class="btn btn-xs btn-danger" id="modal_autorizacion_btn_cancelar" onclick="cancelar_autorizacion_licencia();" disabled>Cerrar mis Talonarios de Receta y Licencia</button>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-6" id="modal_autorizacion_imagen">
                        {{--  --}}
                    </div>
                    <div class="col-md-6" id="modal_autorizacion_mensaje">
                        {{--  --}}
                    </div>
                </div>

            </div>
            <div class="modal-body">
                <button class="btn btn-sm btn-danger" onclick="cerrar_autorizacion();">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!--SCRIPT (DEJARLO EN JS CON JOHAN)-->
@section('page-script-btn-autorizacion')
    <script type="text/javascript">
        var lic_token = '{{  session('lic_token') }}';
        var lic_estado = '{{  session('lic_estado') }}';

        function  abrir_autorizacion()
        {
            $('#modal_autorizacion').modal('show');
            $('#modal_autorizacion_imagen').html('');
            $('#modal_autorizacion_mensaje').html('');
        }

        function  cerrar_autorizacion()
        {
            $('#modal_autorizacion').modal('hide');
        }

        function solicitar_autorizacion_licencia()
        {
            $('#modal_autorizacion_btn_solicitar').attr('disabled', true);
            $('#modal_autorizacion_btn_cancelar').attr('disabled', true);

            var id_lugar_atencion = $('#id_lugar_atencion').val();
            let url = "{{ route('profesional.licencia.solicitar') }}";
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    id_lugar_atencion : id_lugar_atencion
                },
                success:function(data){
                    if (data !== 'null')
                    {
                        console.log(data);
                        if(data.estado == 1)
                        {
                            $('#modal_autorizacion_imagen').html('<img src="{{ asset('images/spinner.svg') }}" alt="Cargando">');
                            $('#modal_autorizacion_mensaje').html('<h3>En espera de Aprobación</h3>');

                            validar_autorizacion_licencia(data.log_users_devices.token);
                        }
                        else
                        {
                            $('#modal_autorizacion_imagen').html('<img src="{{ asset('images/spinner.svg') }}" alt="Cargando">');
                            $('#modal_autorizacion_mensaje').html('<h3>Problema al solicitar Aprobación.</h3>');
                        }
                    }
                    else
                    {
                        console.log('error');
                        console.log(data);
                    }
                }
            });
        }

        function validar_autorizacion_licencia(token)
        {
            let url = "{{ route('profesional.licencia.validar') }}";
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    token : token,
                },
                success:function(data){

                    $('#modal_autorizacion_mensaje').html('<h3>'+data.msj+'</h3>');

                    if(data.estado == 0)
                    {
                        setTimeout(function(){
                            validar_autorizacion_licencia(token);
                        }, 2000);
                        $('#nav-licencia').html('<a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#" role="tab" aria-controls="licencia" aria-selected="false" onclick="abrir_autorizacion();">Licencia</a>');
                        $("#atender-tab").trigger("click");
                        lic_token = '';
                        lic_estado = '';
                        if($("#descripcion_hipotesis"))
                        {
                            $("#descripcion_hipotesis").trigger("keyup");
                        }

                    }
                    else if(data.estado == 1)
                    {
                        $('#modal_autorizacion_imagen').html('<img class="img-fluid" src="{{ asset('images/iconos/aprobacion.svg') }}" alt="Aprobado">');

                        $('#modal_autorizacion_btn_solicitar').attr('disabled', true);
                        $('#modal_autorizacion_btn_cancelar').attr('disabled', false);

                        $('.btn-agenda-autorizacion').removeClass('btn-danger');
                        $('.btn-agenda-autorizacion').addClass('btn-info');

                        setTimeout(function(){
                            $('#modal_autorizacion').modal('hide');
                        }, 3000);

                        $('#nav-licencia').html('<a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#licencia" role="tab" aria-controls="licencia" aria-selected="false" onclick="cargar_licencias();">Licencia</a>');
                        $("#licencia-tab").trigger("click");

                        lic_token = data.lic_token;
                        lic_estado = data.lic_estado;
                        if($("#descripcion_hipotesis"))
                        {
                            $("#descripcion_hipotesis").trigger("keyup");
                        }

                    }
                    else if(data.estado == 2)
                    {
                        $('#modal_autorizacion_imagen').html('<img class="img-fluid" src="{{ asset('images/iconos/error.svg') }}" alt="Rechazado">');

                        $('.btn-agenda-autorizacion').addClass('btn-danger');
                        $('.btn-agenda-autorizacion').removeClass('btn-info');

                        setTimeout(function(){
                            $('#modal_autorizacion').modal('hide');
                        }, 3000);

                        $('#nav-licencia').html('<a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#" role="tab" aria-controls="licencia" aria-selected="false" onclick="abrir_autorizacion();">Licencia</a>');
                        $("#atender-tab").trigger("click");
                        lic_token = '';
                        lic_estado = '';
                        if($("#descripcion_hipotesis"))
                        {
                            $("#descripcion_hipotesis").trigger("keyup");
                        }

                    }
                    else if(data.estado == 3)
                    {
                        $('#modal_autorizacion_imagen').html('<img class="img-fluid" src="{{ asset('images/iconos/error.svg') }}" alt="Cancelado">');

                        $('.btn-agenda-autorizacion').addClass('btn-danger');
                        $('.btn-agenda-autorizacion').removeClass('btn-info');

                        setTimeout(function(){
                            $('#modal_autorizacion').modal('hide');
                        }, 3000);

                        $('#nav-licencia').html('<a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#" role="tab" aria-controls="licencia" aria-selected="false" onclick="abrir_autorizacion();">Licencia</a>');
                        $("#atender-tab").trigger("click");
                        lic_token = '';
                        lic_estado = '';
                        if($("#descripcion_hipotesis"))
                        {
                            $("#descripcion_hipotesis").trigger("keyup");
                        }

                    }
                    else if(data.estado == 4)
                    {
                        $('#modal_autorizacion_imagen').html('<img class="img-fluid" src="{{ asset('images/iconos/error.svg') }}" alt="Aprobado Expirado">');

                        $('.btn-agenda-autorizacion').addClass('btn-danger');
                        $('.btn-agenda-autorizacion').removeClass('btn-info');

                        setTimeout(function(){
                            $('#modal_autorizacion').modal('hide');
                        }, 3000);

                        $('#nav-licencia').html('<a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#" role="tab" aria-controls="licencia" aria-selected="false" onclick="abrir_autorizacion();">Licencia</a>');
                        $("#atender-tab").trigger("click");
                        lic_token = '';
                        lic_estado = '';
                        if($("#descripcion_hipotesis"))
                        {
                            $("#descripcion_hipotesis").trigger("keyup");
                        }

                    }
                    else
                    {
                        setTimeout(function(){
                            validar_autorizacion_licencia(token);
                        }, 3000);

                        $('#nav-licencia').html('<a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#" role="tab" aria-controls="licencia" aria-selected="false" onclick="abrir_autorizacion();">Licencia</a>');
                        $("#atender-tab").trigger("click");
                        lic_token = '';
                        lic_estado = '';
                        if($("#descripcion_hipotesis"))
                        {
                            $("#descripcion_hipotesis").trigger("keyup");
                        }

                    }
                }
            });
        }

        function cancelar_autorizacion_licencia()
        {
            $('#modal_autorizacion_btn_solicitar').attr('disabled', true);
            $('#modal_autorizacion_btn_cancelar').attr('disabled', true);

            let url = "{{ route('profesional.licencia.cancelar') }}";
            $.ajax({
                url: url,
                type: "GET",
                data: {},
                success:function(data){
                    if (data !== 'null')
                    {
                        console.log(data);
                        if(data.estado == 1)
                        {
                            $('#modal_autorizacion_imagen').html('<img src="{{ asset('images/iconos/aprobacion.svg') }}" alt="Aprobado">');
                            $('#modal_autorizacion_mensaje').html('<h3>Autorización Finalizada</h3>');
                            $('#modal_autorizacion_btn_solicitar').attr('disabled', false);
                            $('#modal_autorizacion_btn_cancelar').attr('disabled', true);

                            $('.btn-agenda-autorizacion').addClass('btn-danger');
                            $('.btn-agenda-autorizacion').removeClass('btn-info');

                            setTimeout(function(){
                                $('#modal_autorizacion_imagen').html('');
                                $('#modal_autorizacion_mensaje').html('');
                            },5000);

                            $('#nav-licencia').html('<a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#" role="tab" aria-controls="licencia" aria-selected="false" onclick="abrir_autorizacion();">Licencia</a>');
                            $("#atender-tab").trigger("click");
                            lic_token = '';
                            lic_estado = '';
                            if($("#descripcion_hipotesis"))
                            {
                                $("#descripcion_hipotesis").trigger("keyup");
                            }

                        }
                        else
                        {
                            $('#modal_autorizacion_imagen').html('<img src="{{ asset('images/iconos/error.svg') }}" alt="Error">');
                            $('#modal_autorizacion_mensaje').html('<h3>Problema al Finalizar Aprobación.</h3>');
                            $('#modal_autorizacion_btn_solicitar').attr('disabled', true);
                            $('#modal_autorizacion_btn_cancelar').attr('disabled', false);

                            setTimeout(function(){
                                $('#modal_autorizacion_imagen').html('');
                                $('#modal_autorizacion_mensaje').html('');
                            },5000);

                            $('#nav-licencia').html('<a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#" role="tab" aria-controls="licencia" aria-selected="false" onclick="abrir_autorizacion();">Licencia</a>');
                            $("#atender-tab").trigger("click");
                            lic_token = '';
                            lic_estado = '';
                            if($("#descripcion_hipotesis"))
                            {
                                $("#descripcion_hipotesis").trigger("keyup");
                            }

                        }
                    }
                    else
                    {
                        console.log('error');
                        console.log(data);
                    }
                }
            });
        }
    </script>


@endsection
