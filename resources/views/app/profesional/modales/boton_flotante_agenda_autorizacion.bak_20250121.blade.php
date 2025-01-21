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
			width: 182px;
			font-weight: 600;
			font-size: 0.77rem;
			position: fixed;
			right: -79px;
			top: 213px;
			text-align: center;
			z-index: 1000000000;
			transition: 0.3s;
			cursor: pointer;
			transform: rotate(90deg);
        }



        .btn-agenda-autorizacion:hover {
            color: #fff;
        }

        .btn-agenda-autorizacion-fmu {
           display: block;
            width: 60px;
            padding-left: 3px;
            font-weight: 600;
            font-size: 0.77rem;
            position: fixed;
            right: -18px;
            top: 80px;
            text-align: center;
            z-index: 1000000000;
            transition: 0.3s;
            cursor: pointer;
            transform: rotate(90deg) ;
        }


    </style>


@endsection

<!-- BOTÓN FLOTANTE AUTORIZACION (AUTORIZACION LICENCIA) -->

   @if ($profesional->id_especialidad == 1 || $profesional->id_especialidad == 2)
		@if(!empty(session('lic_token')) && session('lic_estado') == 1)
			<button class="btn btn-agenda-autorizacion btn-info btn-sm shadow-sm" type="button" onclick="abrir_autorizacion();"><i class="feather feather icon-lock f-12"></i> ABRIR TALONARIOS</button>
		@else
			<button class="btn btn-agenda-autorizacion btn-danger btn-sm shadow-sm" type="button" onclick="abrir_autorizacion();"><i class="feather feather icon-lock f-12"></i> ABRIR TALONARIOS</button>
		@endif
	@else
		{{-- no mostrar nada  --}}
	@endif

<!-- BOTÓN FLOTANTE AUTORIZACION (AUTORIZACION FMU) -->


        @if(!empty(session('fmu_token')) && session('fmu_estado') == 1)
            <button class="btn btn-agenda-autorizacion-fmu btn-info btn-sm shadow-sm f-12" type="button" onclick="abrir_autorizacion_fmu();"><i class="feather feather icon-file f-12"></i> FMU</button>
        @else
            <button class="btn btn-agenda-autorizacion-fmu btn-danger btn-sm shadow-sm f-12" type="button" onclick="abrir_autorizacion_fmu();"><i class="feather feather icon-file f-12"></i> FMU</button>
        @endif




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
                        <div class="col-md-12 text-center">
                            <button class="btn btn-xs btn-success" id="modal_autorizacion_btn_solicitar" onclick="solicitar_autorizacion_licencia();" disabled>Abrir mis Talonarios de Receta y Licencia</button>
                        </div>
                        <div class="col-md-12 text-center mt-3">
                            <button class="btn btn-xs btn-danger" id="modal_autorizacion_btn_cancelar" onclick="cancelar_autorizacion_licencia();" >Cerrar mis Talonarios de Receta y Licencia</button>
                        </div>
                    @else
                        <div class="col-md-12 text-center ">
                            <button class="btn btn-xs btn-success" id="modal_autorizacion_btn_solicitar" onclick="solicitar_autorizacion_licencia();">Abrir mis Talonarios de Receta y Licencia</button>
                        </div>
                        <div class="col-md-12 text-center mt-3">
                            <button class="btn btn-xs btn-danger" id="modal_autorizacion_btn_cancelar" onclick="cancelar_autorizacion_licencia();" disabled>Cerrar mis Talonarios de Receta y Licencia</button>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-6 text-center" id="modal_autorizacion_imagen">
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

<div id="modal_autorizacion_fmu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Recepcion de bonos" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_autorizacion_fmuLabel">Autorización FMU</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_autorizacion_fmu();"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @if(!empty(session('fmu_token')) && session('fmu_estado') == 1)
                        <div class="col-md-12 text-center">
                            <button class="btn btn-xs btn-success" id="modal_autorizacion_fmu_btn_solicitar" onclick="solicitar_autorizacion_fmu();" disabled>Solicitar Autorización para ver FMU</button>
                        </div>
                        <div class="col-md-12 text-center mt-3">
                            <button class="btn btn-xs btn-danger" id="modal_autorizacion_fmu_btn_cancelar" onclick="cancelar_autorizacion_fmu();" >Cerrar Autorización para ver FMU</button>
                        </div>
                    @else
                        <div class="col-md-12 text-center ">
                            <button class="btn btn-xs btn-success" id="modal_autorizacion_fmu_btn_solicitar" onclick="solicitar_autorizacion_fmu();">Solicitar Autorización para ver FMU</button>
                        </div>
                        <div class="col-md-12 text-center mt-3">
                            <button class="btn btn-xs btn-danger" id="modal_autorizacion_fmu_btn_cancelar" onclick="cancelar_autorizacion_fmu();" disabled>Cerrar Autorización para ver FMU</button>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-6" id="modal_autorizacion_fmu_imagen">
                        {{--  --}}
                    </div>
                    <div class="col-md-6" id="modal_autorizacion_fmu_mensaje">
                        {{--  --}}
                    </div>
                </div>

            </div>
            <div class="modal-body">
                <button class="btn btn-sm btn-danger" onclick="cerrar_autorizacion_fmu();">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!--SCRIPT (DEJARLO EN JS CON JOHAN)-->
@section('page-script-btn-autorizacion')
    <script type="text/javascript">

        /** seccion licencia */
        var lic_token = '{{  session('lic_token') }}';
        var lic_estado = '{{  session('lic_estado') }}';

        function  abrir_autorizacion()
        {
            $('#modal_autorizacion').modal('show');
            $('#modal_autorizacion_imagen').html('');
            $('#modal_autorizacion_mensaje').html('');
			$('#modal_autorizacion_btn_solicitar').attr('disabled', false);
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
                    $('#r_lentes').attr('disabled', true);

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

                        if($("#hip_diag_spec"))
                        {
                            $("#hip_diag_spec").trigger("keyup");
                        }

                        $('.accion_modal_certificado_reposo').attr('disabled', true);
                        $('.accion_modal_interconsulta').attr('disabled', true);
                        $('.accion_modal_interconsulta_respuesta').attr('disabled', true);
                        $('.accion_modal_inf_medico').attr('disabled', true);
                        $('.accion_modal_uso_personal').attr('disabled', true);

                    }
                    else if(data.estado == 1)
                    {
                        $('#modal_autorizacion_imagen').html('<img class="img-fluid w-50" src="{{ asset('images/iconos/aprobacion.svg') }}" alt="Aprobado">');

                        $('#modal_autorizacion_btn_solicitar').attr('disabled', true);
                        $('#modal_autorizacion_btn_cancelar').attr('disabled', false);


                        $('.btn-agenda-autorizacion').removeClass('btn-danger');
                        $('.btn-agenda-autorizacion').addClass('btn-info');

                        setTimeout(function(){
                            $('#modal_autorizacion').modal('hide');
                        }, 3000);

                        $('#nav-licencia').html('<a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#licencia" role="tab" aria-controls="licencia" aria-selected="false" onclick="cargar_licencias();">Licencia</a>');
                        // $("#licencia-tab").trigger("click");

                        lic_token = data.lic_token;
                        lic_estado = data.lic_estado;
                        if($("#descripcion_hipotesis"))
                        {
                            $("#descripcion_hipotesis").trigger("keyup");
                            $('#r_lentes').attr('disabled', false);
                        }

                        if($("#hip_diag_spec"))
                        {
                            $("#hip_diag_spec").trigger("keyup");
                        }

                        $('.accion_modal_certificado_reposo').attr('disabled', false);
                        $('.accion_modal_interconsulta').attr('disabled', false);

                        @if($interconsulta)
                            $('.accion_modal_interconsulta_respuesta').attr('disabled', false);
                        @else
                            $('.accion_modal_interconsulta_respuesta').attr('disabled', true);
                        @endif

                        $('.accion_modal_inf_medico').attr('disabled', false);
                        $('.accion_modal_uso_personal').attr('disabled', false);

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

                        if($("#hip_diag_spec"))
                        {
                            $("#hip_diag_spec").trigger("keyup");
                        }

                        $('.accion_modal_certificado_reposo').attr('disabled', true);
                        $('.accion_modal_interconsulta').attr('disabled', true);
                        $('.accion_modal_interconsulta_respuesta').attr('disabled', true);
                        $('.accion_modal_inf_medico').attr('disabled', true);
                        $('.accion_modal_uso_personal').attr('disabled', true);

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

                        if($("#hip_diag_spec"))
                        {
                            $("#hip_diag_spec").trigger("keyup");
                        }
                        $('.accion_modal_certificado_reposo').attr('disabled', true);
                        $('.accion_modal_interconsulta').attr('disabled', true);
                        $('.accion_modal_interconsulta_respuesta').attr('disabled', true);
                        $('.accion_modal_inf_medico').attr('disabled', true);
                        $('.accion_modal_uso_personal').attr('disabled', true);

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

                        if($("#hip_diag_spec"))
                        {
                            $("#hip_diag_spec").trigger("keyup");
                        }
                        $('.accion_modal_certificado_reposo').attr('disabled', true);
                        $('.accion_modal_interconsulta').attr('disabled', true);
                        $('.accion_modal_interconsulta_respuesta').attr('disabled', true);
                        $('.accion_modal_inf_medico').attr('disabled', true);
                        $('.accion_modal_uso_personal').attr('disabled', true);

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

                        if($("#hip_diag_spec"))
                        {
                            $("#hip_diag_spec").trigger("keyup");
                        }

                        $('.accion_modal_certificado_reposo').attr('disabled', true);
                        $('.accion_modal_interconsulta').attr('disabled', true);
                        $('.accion_modal_interconsulta_respuesta').attr('disabled', true);
                        $('.accion_modal_inf_medico').attr('disabled', true);
                        $('.accion_modal_uso_personal').attr('disabled', true);

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
                            $('#modal_autorizacion_imagen').html('<img class="img-fluid w-50" src="{{ asset('images/iconos/aprobacion.svg') }}" alt="Aprobado">');
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

                            if($("#hip_diag_spec"))
                            {
                                $("#hip_diag_spec").trigger("keyup");
                            }

                            $('.accion_modal_certificado_reposo').attr('disabled', true);
                            $('.accion_modal_interconsulta').attr('disabled', true);
                            $('.accion_modal_interconsulta_respuesta').attr('disabled', true);
                            $('.accion_modal_inf_medico').attr('disabled', true);
                            $('.accion_modal_uso_personal').attr('disabled', true);

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

                            if($("#hip_diag_spec"))
                            {
                                $("#hip_diag_spec").trigger("keyup");
                            }

                            $('.accion_modal_certificado_reposo').attr('disabled', false);
                            $('.accion_modal_interconsulta').attr('disabled', false);

                            @if($interconsulta)
                                $('.accion_modal_interconsulta_respuesta').attr('disabled', false);
                            @else
                                $('.accion_modal_interconsulta_respuesta').attr('disabled', true);
                            @endif

                            $('.accion_modal_inf_medico').attr('disabled', false);
                            $('.accion_modal_uso_personal').attr('disabled', false);

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

        /*******************************/
        /** seccion FMU */
        var fmu_token = '{{  session('fmu_token') }}';
        var fmu_estado = '{{  session('fmu_estado') }}';

        function  abrir_autorizacion_fmu()
        {
            $('#modal_autorizacion_fmu').modal('show');
            $('#modal_autorizacion_fmu_imagen').html('');
            $('#modal_autorizacion_fmu_mensaje').html('');
        }

        function  cerrar_autorizacion_fmu()
        {
            $('#modal_autorizacion_fmu').modal('hide');
        }

        function solicitar_autorizacion_fmu()
        {
            $('#modal_autorizacion_fmu_btn_solicitar').attr('disabled', true);
            $('#modal_autorizacion_fmu_btn_cancelar').attr('disabled', true);

            var id_lugar_atencion = $('#id_lugar_atencion').val();
            var id_paciente = $('#id_paciente_fc').val();
            let url = "{{ route('profesional.fmu.solicitar') }}";
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    id_lugar_atencion : id_lugar_atencion,
                    id_paciente : id_paciente
                },
                success:function(data){
                    if (data !== 'null')
                    {
                        console.log(data);
                        if(data.estado == 1)
                        {
                            $('#modal_autorizacion_fmu_imagen').html('<img src="{{ asset('images/spinner.svg') }}" alt="Cargando">');
                            $('#modal_autorizacion_fmu_mensaje').html('<h3>En espera de Aprobación</h3>');

                            validar_autorizacion_fmu(data.log_users_devices.token);
                        }
                        else
                        {
                            $('#modal_autorizacion_fmu_imagen').html('<img src="{{ asset('images/spinner.svg') }}" alt="Cargando">');
                            $('#modal_autorizacion_fmu_mensaje').html('<h3>Problema al solicitar Aprobación.</h3>');
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

        function validar_autorizacion_fmu(token)
        {
            let url = "{{ route('profesional.fmu.validar') }}";
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    token : token,
                },
                success:function(data){

                    $('#modal_autorizacion_fmu_mensaje').html('<h3>'+data.msj+'</h3>');

                    if(data.estado == 0)
                    {
                        setTimeout(function(){
                            validar_autorizacion_fmu(token);
                        }, 2000);
                        $('#nav-fmu').html('<a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#" role="tab" aria-controls="fmu" aria-selected="false" onclick="abrir_autorizacion_fmu();">FMU</a>');
                        fmu_token = '';
                        fmu_estado = '';

                    }
                    else if(data.estado == 1)
                    {
                        $('#modal_autorizacion_fmu_imagen').html('<img class="img-fluid w-50" src="{{ asset('images/iconos/aprobacion.svg') }}" alt="Aprobado">');

                        $('#modal_autorizacion_fmu_btn_solicitar').attr('disabled', true);
                        $('#modal_autorizacion_fmu_btn_cancelar').attr('disabled', false);


                        $('.btn-agenda-autorizacion-fmu').removeClass('btn-danger');
                        $('.btn-agenda-autorizacion-fmu').addClass('btn-info');

                        setTimeout(function(){
                            $('#modal_autorizacion_fmu').modal('hide');
                        }, 3000);

                        $('#nav-fmu').html('<a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#fmu" role="tab" aria-controls="fmu" aria-selected="false">FMU</a>');
                        $("#fmu-tab").trigger("click");

                        fmu_token = data.fmu_token;
                        fmu_estado = data.fmu_estado;

                    }
                    else if(data.estado == 2)
                    {
                        $('#modal_autorizacion_fmu_imagen').html('<img class="img-fluid" src="{{ asset('images/iconos/error.svg') }}" alt="Rechazado">');

                        $('.btn-agenda-autorizacion-fmu').addClass('btn-danger');
                        $('.btn-agenda-autorizacion-fmu').removeClass('btn-info');

                        setTimeout(function(){
                            $('#modal_autorizacion_fmu').modal('hide');
                        }, 3000);

                        $('#nav-fmu').html('<a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#" role="tab" aria-controls="fmu" aria-selected="false" onclick="abrir_autorizacion_fmu();">FMU</a>');

                        fmu_token = '';
                        fmu_estado = '';

                    }
                    else if(data.estado == 3)
                    {
                        $('#modal_autorizacion_fmu_imagen').html('<img class="img-fluid" src="{{ asset('images/iconos/error.svg') }}" alt="Cancelado">');

                        $('.btn-agenda-autorizacion-fmu').addClass('btn-danger');
                        $('.btn-agenda-autorizacion-fmu').removeClass('btn-info');

                        setTimeout(function(){
                            $('#modal_autorizacion_fmu').modal('hide');
                        }, 3000);

                        $('#nav-fmu').html('<a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#" role="tab" aria-controls="fmu" aria-selected="false" onclick="abrir_autorizacion_fmu();">FMU</a>');

                        fmu_token = '';
                        fmu_estado = '';

                    }
                    else if(data.estado == 4)
                    {
                        $('#modal_autorizacion_fmu_imagen').html('<img class="img-fluid" src="{{ asset('images/iconos/error.svg') }}" alt="Aprobado Expirado">');

                        $('.btn-agenda-autorizacion-fmu').addClass('btn-danger');
                        $('.btn-agenda-autorizacion-fmu').removeClass('btn-info');

                        setTimeout(function(){
                            $('#modal_autorizacion_fmu').modal('hide');
                        }, 3000);

                        $('#nav-fmu').html('<a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#" role="tab" aria-controls="fmu" aria-selected="false" onclick="abrir_autorizacion_fmu();">FMU</a>');

                        fmu_token = '';
                        fmu_estado = '';

                    }
                    else
                    {
                        setTimeout(function(){
                            validar_autorizacion_fmu(token);
                        }, 3000);

                        $('#nav-fmu').html('<a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#" role="tab" aria-controls="fmu" aria-selected="false" onclick="abrir_autorizacion_fmu();">FMU</a>');

                        fmu_token = '';
                        fmu_estado = '';

                    }
                }
            });
        }

        function cancelar_autorizacion_fmu()
        {
            $('#modal_autorizacion_fmu_btn_solicitar').attr('disabled', true);
            $('#modal_autorizacion_fmu_btn_cancelar').attr('disabled', true);

            let url = "{{ route('profesional.fmu.cancelar') }}";
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
                            $('#modal_autorizacion_fmu_imagen').html('<img class="img-fluid w-50" src="{{ asset('images/iconos/aprobacion.svg') }}" alt="Aprobado">');
                            $('#modal_autorizacion_fmu_mensaje').html('<h3>Autorización Finalizada</h3>');
                            $('#modal_autorizacion_fmu_btn_solicitar').attr('disabled', false);
                            $('#modal_autorizacion_fmu_btn_cancelar').attr('disabled', true);

                            $('.btn-agenda-autorizacion-fmu').addClass('btn-danger');
                            $('.btn-agenda-autorizacion-fmu').removeClass('btn-info');

                            setTimeout(function(){
                                $('#modal_autorizacion_fmu_imagen').html('');
                                $('#modal_autorizacion_fmu_mensaje').html('');
                            },5000);

                            $('#nav-fmu').html('<a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#" role="tab" aria-controls="fmu" aria-selected="false" onclick="abrir_autorizacion_fmu();">FMU</a>');

                            fmu_token = '';
                            fmu_estado = '';

                        }
                        else
                        {
                            $('#modal_autorizacion_fmu_imagen').html('<img src="{{ asset('images/iconos/error.svg') }}" alt="Error">');
                            $('#modal_autorizacion_fmu_mensaje').html('<h3>Problema al Finalizar Aprobación.</h3>');
                            $('#modal_autorizacion_fmu_btn_solicitar').attr('disabled', true);
                            $('#modal_autorizacion_fmu_btn_cancelar').attr('disabled', false);

                            setTimeout(function(){
                                $('#modal_autorizacion_imagen_fmu').html('');
                                $('#modal_autorizacion_mensaje_fmu').html('');
                            },5000);

                            $('#nav-fmu').html('<a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#" role="tab" aria-controls="fmu" aria-selected="false" onclick="abrir_autorizacion_fmu();">FMU</a>');

                            fmu_token = '';
                            fmu_estado = '';

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
