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

        .btn-tons-autorizacion{
            display: block;
            width: 182px;
            font-weight: 600;
			font-size: 0.77rem;
			position: fixed;
			right: -79px;
			top: 213px;
			text-align: center;
			/* z-index: 1000000000; */
			transition: 0.3s;
			cursor: pointer;
			transform: rotate(90deg);
        }

        .btn-agenda-autorizacion:hover, .btn-tons-autorizacion:hover {
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

        @if($profesional->id_especialidad == 2)
            @php
                $active = 0;
                foreach ($tons_dental as $key => $value) {
                    if(isset($value->estado) && $value->estado == 2){
                        $active = 1;
                        break;
                    }
                }
            @endphp
            @if($active == 1)
                {{-- Si existe un profesional activo --}}
                <button class="btn btn-tons-autorizacion btn-info btn-sm shadow-sm" style="top: 410px;" type="button" onclick="abrir_tons();"><i class="feather feather icon-lock f-12"></i> ABRIR TONS</button>
            @else
                <button class="btn btn-tons-autorizacion btn-danger btn-sm shadow-sm" style="top: 410px;" type="button" onclick="abrir_tons();"><i class="feather feather icon-lock f-12"></i> ABRIR TONS</button>
            @endif
            {{-- no mostrar nada  --}}
        @endif

<!-- BOTÓN FLOTANTE AUTORIZACION (AUTORIZACION LICENCIA) -->

   @if ($profesional->id_especialidad == 1 || $profesional->id_especialidad == 2 || $profesional->id_especialidad == 8)
		@if(!empty(session('lic_token')) && session('lic_estado') == 1)
			<button class="btn btn-agenda-autorizacion btn-info btn-sm shadow-sm f-12" type="button" onclick="abrir_autorizacion();"><i class="feather feather icon-lock f-12"></i> ABRIR TALONARIOS</button>
		@else
			<button class="btn btn-agenda-autorizacion btn-danger btn-sm shadow-sm f-12" type="button" onclick="abrir_autorizacion();"><i class="feather feather icon-lock f-12"></i> ABRIR TALONARIOS</button>
		@endif
	@else
		{{-- no mostrar nada  --}}
	@endif

<!-- BOTÓN FLOTANTE AUTORIZACION (AUTORIZACION FMU) -->


        @if (Auth::user()->id == 3)
            @if(!empty(session('fmu_token')) && session('fmu_estado') == 1)
                <button class="btn btn-agenda-autorizacion-fmu btn-info btn-sm shadow-sm f-12" type="button" onclick="abrir_autorizacion_fmu();"><i class="feather feather icon-file f-12"></i> FMU</button>
            @else
                <button class="btn btn-agenda-autorizacion-fmu btn-danger btn-sm shadow-sm f-12" type="button" onclick="abrir_autorizacion_fmu();"><i class="feather feather icon-file f-12"></i> FMU</button>
            @endif
        @endif





<div id="modal_autorizacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Recepcion de bonos" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_autorizacionLabel">Autorización</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_autorizacion();"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                {{-- Acciones: se ocultan mientras se procesa la autorizacion --}}
                <div class="proceso-acciones" id="modal_autorizacion_acciones">
                    <p class="proceso-acciones__texto text-center mb-3">Administra el acceso a tus talonarios de receta y licencia médica.</p>
                    @if(!empty(session('lic_token')) && session('lic_estado') == 1)
                        <button class="btn btn-success btn-block" id="modal_autorizacion_btn_solicitar" onclick="solicitar_autorizacion_licencia();" disabled><i class="fa fa-unlock-alt mr-1"></i> Abrir mis Talonarios de Receta y Licencia</button>
                        <button class="btn btn-outline-danger btn-block mt-2" id="modal_autorizacion_btn_cancelar" onclick="cancelar_autorizacion_licencia();" ><i class="fa fa-lock mr-1"></i> Cerrar mis Talonarios de Receta y Licencia</button>
                    @else
                        <button class="btn btn-success btn-block" id="modal_autorizacion_btn_solicitar" onclick="solicitar_autorizacion_licencia();"><i class="fa fa-unlock-alt mr-1"></i> Abrir mis Talonarios de Receta y Licencia</button>
                        <button class="btn btn-outline-danger btn-block mt-2" id="modal_autorizacion_btn_cancelar" onclick="cancelar_autorizacion_licencia();" disabled><i class="fa fa-lock mr-1"></i> Cerrar mis Talonarios de Receta y Licencia</button>
                    @endif
                </div>

                {{-- Estado: spinner mientras espera, check al autorizar, cruz si falla --}}
                <div class="proceso-estado d-none" id="modal_autorizacion_estado">
                    <div class="proceso-estado__icono">
                        <span class="proceso-spinner"></span>
                        <span class="proceso-check"><i class="fa fa-check"></i></span>
                        <span class="proceso-error"><i class="fa fa-times"></i></span>
                    </div>
                    {{-- contenedor heredado: el JS inyecta aqui los svg antiguos, se mantiene oculto --}}
                    <div id="modal_autorizacion_imagen" class="d-none"></div>
                    <div class="proceso-estado__mensaje" id="modal_autorizacion_mensaje">
                        {{--  --}}
                    </div>
                </div>

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
                {{-- Acciones: se ocultan mientras se procesa la autorizacion --}}
                <div class="proceso-acciones" id="modal_autorizacion_fmu_acciones">
                    <p class="proceso-acciones__texto text-center mb-3">Administra el acceso a la Ficha Médica Única del paciente.</p>
                    @if(!empty(session('fmu_token')) && session('fmu_estado') == 1)
                        <button class="btn btn-success btn-block" id="modal_autorizacion_fmu_btn_solicitar" onclick="solicitar_autorizacion_fmu();" disabled><i class="fa fa-unlock-alt mr-1"></i> Solicitar Autorización para ver FMU</button>
                        <button class="btn btn-outline-danger btn-block mt-2" id="modal_autorizacion_fmu_btn_cancelar" onclick="cancelar_autorizacion_fmu();" ><i class="fa fa-lock mr-1"></i> Cerrar Autorización para ver FMU</button>
                    @else
                        <button class="btn btn-success btn-block" id="modal_autorizacion_fmu_btn_solicitar" onclick="solicitar_autorizacion_fmu();"><i class="fa fa-unlock-alt mr-1"></i> Solicitar Autorización para ver FMU</button>
                        <button class="btn btn-outline-danger btn-block mt-2" id="modal_autorizacion_fmu_btn_cancelar" onclick="cancelar_autorizacion_fmu();" disabled><i class="fa fa-lock mr-1"></i> Cerrar Autorización para ver FMU</button>
                    @endif
                </div>

                {{-- Estado: spinner mientras espera, check al autorizar, cruz si falla --}}
                <div class="proceso-estado d-none" id="modal_autorizacion_fmu_estado">
                    <div class="proceso-estado__icono">
                        <span class="proceso-spinner"></span>
                        <span class="proceso-check"><i class="fa fa-check"></i></span>
                        <span class="proceso-error"><i class="fa fa-times"></i></span>
                    </div>
                    {{-- contenedor heredado: el JS inyecta aqui los svg antiguos, se mantiene oculto --}}
                    <div id="modal_autorizacion_fmu_imagen" class="d-none"></div>
                    <div class="proceso-estado__mensaje" id="modal_autorizacion_fmu_mensaje">
                        {{--  --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div id="modal_tons_dental" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Registro de Tons" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_autorizacion_fmuLabel">TONS asociadas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_autorizacion_fmu();"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                @php
                    $tonsActivasModal = isset($tons_dental)
                        ? collect($tons_dental)->where('estado', 2)->values()
                        : collect();
                @endphp
                @if ($tonsActivasModal->count() === 1)
                    @php $tonsActivaModal = $tonsActivasModal->first(); @endphp
                    <div class="alert alert-info">
                        <strong>Asignación automática:</strong>
                        {{ $tonsActivaModal->nombre_tons }} {{ $tonsActivaModal->apellido_tons }}
                        <span class="d-block small">{{ $tonsActivaModal->nombre_lugar_atencion }}</span>
                    </div>
                @elseif ($tonsActivasModal->count() > 1)
                    <div class="form-group">
                        <label for="tons_relacion_activa" class="floating-label-activo-sm">TONS para la atención</label>
                        <select id="tons_relacion_activa" class="form-control form-control-sm">
                            @foreach ($tonsActivasModal as $tonsActivaModal)
                                <option value="{{ $tonsActivaModal->id }}">
                                    {{ $tonsActivaModal->nombre_tons }} {{ $tonsActivaModal->apellido_tons }} - {{ $tonsActivaModal->nombre_lugar_atencion }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <div class="alert alert-warning">
                        No tiene TONS activas asociadas.
                        <a href="{{ route('profesional.tons') }}">Administrar asociaciones</a>
                    </div>
                @endif
                <div class="form-row d-none">
                    <div class="col-12">
                        <div class="form-group fill">
                            <label for="rut_tons" class="floating-label-activo-sm">Rut de tons</label>
                            <input type="text" name="rut_tons" id="rut_tons" class="form-control form-control-sm" >
                        </div>
                    </div>

                </div>
                <button type="button" class="btn btn-outline-success btn-sm w-100 my-3 d-none" onclick="buscar_tons()"><i class="fas fa-search"></i> Buscar</button>
                <div class="form-row d-none" id="contenedor_tons">
                    <span class="badge badge-info" style="font-size: 15px;text-align: center;align-items: center;margin: 10px auto;">No se ha encontrado información. Si desea inscribirla valla al panel de configuración usando este <a href="{{ ROUTE('profesional.tons') }}" _target="blank">link</a>. </span>
                </div>
                <div class="form-row d-none" id="contenedor_datos_tons">
                    <input type="hidden" name="id_tons" id="id_tons" value="">
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

                                        <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>

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
                        <div class="form-group">
                            <label for="lugar_atencion_tons" class="floating-label-activo-sm">Lugar de atención</label>
                            <select  id="lugar_atencion_tons" name="lugar_atencion_tons" class="form-control form-control-sm" disabled>
                                @if(isset($lugares_atencion))
                                @foreach ($lugares_atencion as $lugar)
                                    @if (isset($lugar))
                                        <option value="{{ $lugar->id }}">{{ $lugar->nombre }} </option>
                                    @endif
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-outline-success btn-sm my-3 w-100" onclick="solicitar_tons_profesional()">Seleccionar</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table w-100" id="table_profesionales_tons">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Rut</th>
                                        <th scope="col">Teléfono</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Activar/Desactivar</th>
                                        <th scope="col">Estado</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_tons">
                                    @if(isset($tons_dental))
                                    @foreach ($tons_dental as $tons)
                                        <tr>
                                            <td>{{ $tons->nombre_tons }}</td>
                                            <td>{{ $tons->apellido_tons }}</td>
                                            <td>{{ $tons->rut_tons }}</td>
                                            <td>{{ $tons->telefono_tons }}</td>
                                            <td>{{ $tons->email_tons }}</td>
                                            <td class="d-flex justify-content-center">
                                                @if($tons->estado == 2)
                                                <button class="btn btn-outline-danger btn-sm btn-icon" onclick="desasociar_tons_profesional({{ $tons->id }})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                @else
                                                <button type="button" class="btn btn-outline-success btn-sm btn-icon" onclick="solicitar_tons_profesional({{ $tons->id }})">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                @endif
                                            </td>
                                            <td>
                                                @if($tons->estado == 2)
                                                    <span class="badge badge-success">Activo</span>
                                                @elseif($tons->estado == 1)
                                                    <span class="badge badge-danger">Inactivo</span>
                                                @else
                                                    <span class="badge badge-warning">Inactivo</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </


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

        /**
         * BLOQUE PORTABLE - acompaña al CSS .proceso-* de public/css/style.css.
         *
         * Alterna el cuerpo de cualquier modal con proceso: con 'idle' se ven
         * los botones; en cualquier otro estado se ocultan y se muestra el
         * panel con spinner / check / cruz.
         *
         * Los modales se cierran solo con la X del header, por eso no hay
         * ningun pie/footer que ocultar.
         *
         * Depende solo de la convencion de ids:
         *   {prefijo}_acciones  contenedor de botones
         *   {prefijo}_estado    panel de estado
         *   {prefijo}_mensaje   texto del estado
         *   {prefijo}_imagen    contenedor heredado (opcional)
         *
         * @param {string} prefijo p.ej. 'modal_autorizacion' o 'modal_autorizacion_fmu'
         * @param {string} estado  'idle' | 'cargando' | 'ok' | 'error'
         * @param {string} mensaje texto opcional a mostrar bajo el icono
         */
        function set_estado_proceso(prefijo, estado, mensaje)
        {
            var $acciones = $('#' + prefijo + '_acciones');
            var $panel    = $('#' + prefijo + '_estado');

            $panel.removeClass('is-cargando is-ok is-error');

            if (estado === 'idle')
            {
                $acciones.removeClass('d-none');
                $panel.addClass('d-none');
                $('#' + prefijo + '_imagen').html('');
                $('#' + prefijo + '_mensaje').html('');
                return;
            }

            $acciones.addClass('d-none');
            $panel.removeClass('d-none').addClass('is-' + estado);

            if (mensaje)
            {
                $('#' + prefijo + '_mensaje').html('<h3>' + mensaje + '</h3>');
            }
        }

        function abrir_tons(){
            $('#modal_tons_dental').modal('show');
        }

        function  abrir_autorizacion()
        {
            $('#modal_autorizacion').modal('show');
            set_estado_proceso('modal_autorizacion','idle');
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
            set_estado_proceso('modal_autorizacion','cargando', 'Enviando solicitud...');

            var id_lugar_atencion = $('#id_lugar_atencion').val();
            let url = "{{ route('profesional.licencia.solicitar') }}";
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    id_lugar_atencion : id_lugar_atencion,
                    id_ficha_atencion: $('#id_fc').val(),
                    id_paciente: $('#id_paciente').val()
                },
                success:function(data){
                    console.log('data', data);
                    if (data !== 'null')
                    {
                        console.log(data);
                        if(data.estado == 1)
                        {
                            set_estado_proceso('modal_autorizacion', 'cargando', 'En espera de Aprobación');

                            validar_autorizacion_licencia(data.log_users_devices.token);
                        }
                        else
                        {
                            set_estado_proceso('modal_autorizacion', 'error', 'Problema al solicitar Aprobación.');
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
                    console.log(data);
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
                        set_estado_proceso('modal_autorizacion', 'ok');

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
                        set_estado_proceso('modal_autorizacion', 'error');

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
                        set_estado_proceso('modal_autorizacion', 'error');

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
                        set_estado_proceso('modal_autorizacion', 'error');

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
            set_estado_proceso('modal_autorizacion', 'cargando', 'Cerrando talonarios...');

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
                            set_estado_proceso('modal_autorizacion', 'ok', 'Autorización Finalizada');
                            $('#modal_autorizacion_btn_solicitar').attr('disabled', false);
                            $('#modal_autorizacion_btn_cancelar').attr('disabled', true);

                            $('.btn-agenda-autorizacion').addClass('btn-danger');
                            $('.btn-agenda-autorizacion').removeClass('btn-info');

                            setTimeout(function(){
                                set_estado_proceso('modal_autorizacion', 'idle');
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
                            set_estado_proceso('modal_autorizacion', 'error', 'Problema al Finalizar Aprobación.');
                            $('#modal_autorizacion_btn_solicitar').attr('disabled', true);
                            $('#modal_autorizacion_btn_cancelar').attr('disabled', false);

                            setTimeout(function(){
                                set_estado_proceso('modal_autorizacion', 'idle');
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
            set_estado_proceso('modal_autorizacion_fmu', 'idle');
        }

        function  cerrar_autorizacion_fmu()
        {
            $('#modal_autorizacion_fmu').modal('hide');
        }

        function solicitar_autorizacion_fmu()
        {
            $('#modal_autorizacion_fmu_btn_solicitar').attr('disabled', true);
            $('#modal_autorizacion_fmu_btn_cancelar').attr('disabled', true);
            set_estado_proceso('modal_autorizacion_fmu', 'cargando', 'Enviando solicitud...');

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
                            set_estado_proceso('modal_autorizacion_fmu', 'cargando', 'En espera de Aprobación');

                            validar_autorizacion_fmu(data.log_users_devices.token);
                        }
                        else
                        {
                            set_estado_proceso('modal_autorizacion_fmu', 'error', 'Problema al solicitar Aprobación.');
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
                        set_estado_proceso('modal_autorizacion_fmu', 'ok');

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
                        set_estado_proceso('modal_autorizacion_fmu', 'error');

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
                        set_estado_proceso('modal_autorizacion_fmu', 'error');

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
                        set_estado_proceso('modal_autorizacion_fmu', 'error');

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
            set_estado_proceso('modal_autorizacion_fmu', 'cargando', 'Cerrando autorización...');

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
                            set_estado_proceso('modal_autorizacion_fmu', 'ok', 'Autorización Finalizada');
                            $('#modal_autorizacion_fmu_btn_solicitar').attr('disabled', false);
                            $('#modal_autorizacion_fmu_btn_cancelar').attr('disabled', true);

                            $('.btn-agenda-autorizacion-fmu').addClass('btn-danger');
                            $('.btn-agenda-autorizacion-fmu').removeClass('btn-info');

                            setTimeout(function(){
                                set_estado_proceso('modal_autorizacion_fmu', 'idle');
                            },5000);

                            $('#nav-fmu').html('<a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#" role="tab" aria-controls="fmu" aria-selected="false" onclick="abrir_autorizacion_fmu();">FMU</a>');

                            fmu_token = '';
                            fmu_estado = '';

                        }
                        else
                        {
                            set_estado_proceso('modal_autorizacion_fmu', 'error', 'Problema al Finalizar Aprobación.');
                            $('#modal_autorizacion_fmu_btn_solicitar').attr('disabled', true);
                            $('#modal_autorizacion_fmu_btn_cancelar').attr('disabled', false);

                            setTimeout(function(){
                                set_estado_proceso('modal_autorizacion_fmu', 'idle');
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

    function solicitar_tons_profesional(id_tons = null){
        if(id_tons == null){
            id_tons = $('#id_tons').val();
        }
        let data = {
            id_tons: id_tons,
            _token: CSRF_TOKEN
        }
        let url = "{{ ROUTE('profesional.solicitar_tons_atencion_dental') }}";
        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.estado == 1){
                    // $('#modal_tons_dental').modal('hide');
                    swal({
                        title:'info',
                        icon:'success',
                        text:'Solicitud enviada'
                    });
                    let tons = resp.tonss;
                    let table = $('#table_profesionales_tons').DataTable();
                    table.clear().draw();
                    tons.forEach(t => {
                        let botones_html = '';
                        let estado = '<span class="badge badge-danger">Inactivo</span>';
                        if(t.estado == 2){
                            botones_html = '<button class="btn btn-outline-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Ficha Médica Única" onclick="desasociar_tons_profesional('+t.id+')"><i class="fas fa-trash"></i></button>';
                            estado = '<span class="badge badge-success">Activo</span>';
                        }else{
                            botones_html = '<button class="btn btn-outline-success  btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Ficha Médica Única" onclick="solicitar_tons_profesional('+t.id+')"><i class="fas fa-check"> </i></button>';

                        }
                        let rowNode = table.row.add([
                            t.nombre_tons,
                            t.apellido_tons,
                            t.rut_tons,
                            t.telefono_tons,
                            t.email_tons,
                            botones_html,
                            estado
                        ]).draw(false).node();

                        // Agregar clases a la fila
                        $(rowNode).addClass('text-center align-middle');
                    });
                    actualizarEstadoSidebarTons(tons);
                    $('.btn-tons-autorizacion').removeClass('btn-danger').addClass('btn-info');
                }else{
                    $('#modal_tons_dental').modal('hide');
                    swal({
                        title:'info',
                        icon:'error',
                        text:resp.mensaje
                    });
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function desasociar_tons_profesional(id_tons){
        swal({
            title: "¿Está seguro?",
            text: "¿Desea desasociar el profesional?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                confirmar_desasociar_tons_profesional(id_tons);
            } else {
                swal("Cancelado");
            }
        });
    }

    function confirmar_desasociar_tons_profesional(id_tons){
        let data = {
            id_tons: id_tons,
            _token: CSRF_TOKEN
        }
        let url = "{{ ROUTE('profesional.desasociar_tons') }}";
        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.estado == 1){
                    // $('#modal_tons_dental').modal('hide');
                    let tons = resp.tonss;
                    swal({
                        title:'info',
                        icon:'success',
                        text:'Solicitud enviada'
                    });
                    let table = $('#table_profesionales_tons').DataTable();
                    table.clear().draw();
                    tons.forEach(t => {
                        let botones_html = '';
                        let estado = '<span class="badge badge-danger">Inactivo</span>';
                        if(t.estado == 2){
                            botones_html = '<button class="btn btn-outline-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Ficha Médica Única" onclick="desasociar_tons_profesional('+t.id+')"><i class="fas fa-trash"></i></button>';
                            estado = '<span class="badge badge-success">Activo</span>';
                        }else{
                            botones_html = '<button class="btn btn-outline-success  btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Ficha Médica Única" onclick="solicitar_tons_profesional('+t.id+')"><i class="fas fa-check"> </i></button>';
                        }
                        let rowNode = table.row.add([
                            t.nombre_tons,
                            t.apellido_tons,
                            t.rut_tons,
                            t.telefono_tons,
                            t.email_tons,
                            botones_html,
                            estado
                        ]).draw(false).node();

                        // Agregar clases a la fila
                        $(rowNode).addClass('text-center align-middle');

                        // eliminar todas las clases disabled del div con id card_sidebar_tons

                    });
                    actualizarEstadoSidebarTons(tons);

                }else{
                    $('#modal_tons_dental').modal('hide');
                    swal({
                        title:'info',
                        icon:'error',
                        text:'Error al enviar solicitud'
                    });
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }
    function actualizarEstadoSidebarTons(tons) {
        let algunoActivo = tons.some(t => t.estado == 2);
        let tons_activa = tons.filter(t => t.estado == 2);
        console.log(tons_activa);
        if (algunoActivo) {
            // Habilita botón del colapsable
            $('#heading_ayudante button').removeClass('disabled').prop('disabled', false);

            // Muestra el contenido colapsable
            // $('#collapse_ayudante').collapse('show');

            // Habilita todos los botones internos
            $('#collapse_ayudante .btn').removeClass('disabled').prop('disabled', false);
            $('#prot_tons_imp_man').val(tons_activa[0].nombre_tons+' '+tons_activa[0].apellido_tons);
        } else {
            // Desactiva botón principal (colapsable)
            $('#heading_ayudante button').addClass('disabled').prop('disabled', true);

            // Oculta el contenido si está abierto
            $('#collapse_ayudante').collapse('hide');

            // Desactiva botones internos
            $('#collapse_ayudante .btn').addClass('disabled').prop('disabled', true);
            $('#prot_tons_imp_man').val('');
        }
    }


    </script>


@endsection
