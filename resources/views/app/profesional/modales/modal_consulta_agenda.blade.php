<!-- Modal consulta agenda profesional-->
<div id="consulta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="consulta" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <input type="hidden" name="estado_id_profesional" id="estado_id_profesional" value="">
            <input type="hidden" name="estado_id_paciente" id="estado_id_paciente" value="">
            <input type="hidden" name="id_hora_medica" id="id_hora_medica" value="">
            <div class="modal-header pt-3">
                <h5 id="cabecera_hora_medica" class="text-white f-20 mb-0 mt-0"><i class="feather icon-user icono-agenda"></i> Información del paciente</h5>
                 <button type="button" onclick="editar_info_paciente_asistente();" class="btn btn-sm btn-info-light-c float-right d-inline paciente_view_asistente">
                                <i class="feather icon-edit"></i> Editar datos
                            <span class="ripple ripple-animate"></span></button>
            </div>
            <div class="modal-body">
                <form id="datos_hora_medica">
                    <div class="row">
                        <div class="col-12">
                            <!--<button type="button" onclick="editar_info_paciente_asistente();" class="btn btn-sm btn-info-light-c float-right d-inline paciente_view_asistente has-ripple" style="">
                                <i class="feather icon-edit"></i> Editar
                            <span class="ripple ripple-animate"></span></button>-->
                        </div>
                        <input type="hidden" name="modificando_paciente_asistente" id="modificando_paciente_asistente" value="0">
                    </div>
                    <div class="row">
                         <div class="col-sm-6 col-md-6" id="seccion_examenes">
                        </div>

                        <div class="col-sm-12 col-md-12">
                            <table class="table table-borderless table-xs text-break table-responsive modal-agenda">
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <strong>Rut</strong>
                                        <td>
                                            <span id="datos_consulta_rut"></span>
                                        </td>


                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Nombre</strong>
                                        <td>
                                            <div class="paciente_view_asistente">
                                                <span id="datos_consulta_nombre"></span>
                                            </div>

                                            <div class="paciente_edit_asistente" style="display:none">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-4">
                                                        <input type="text" class="form-control form-control-sm" id="input_reserva_hora_nombre_asistente" value="">
                                                    </div>
                                                        <div class="col-sm-12 col-md-4">
                                                            <input type="text" class="form-control form-control-sm" id="input_reserva_hora_apellido_uno_asistente" value="">
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <input type="text" class="form-control form-control-sm" id="input_reserva_hora_apellido_dos_asistente" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Fecha Nacimiento</strong>
                                        <td>
                                            <div class="paciente_view_asistente">
                                                <span id="datos_consulta_edad"></span>
                                            </div>
                                            <div class="paciente_edit_asistente" style="display:none">
                                                <input type="text" class="mask_date form-control form-control-sm"
                                                    name="input_reserva_fecha_nacimiento_asistente" id="input_reserva_fecha_nacimiento_asistente"
                                                    onchange="evaluar_edad();"
                                                    maxlength="10" placeholder="dd/mm/aaaa"
                                                    autocomplete="off"
                                                    data-mask="00/00/0000"
                                                />
                                            </div>

                                        </td>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Sexo</strong>
                                        <td>
                                            <div class="paciente_view_asistente">
                                                <span id="datos_consulta_sexo"></span>
                                            </div>
                                            <div class="paciente_edit_asistente" style="display:none">
                                                <select id="input_reserva_sexo_asistente" class="form-control form-control-sm">
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Femenino</option>
                                                </select>
                                            </div>

                                        </td>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Email</strong>
                                        <td>

                                            <div class="paciente_view_asistente">
                                                <span id="datos_consulta_email"></span>
                                            </div>
                                            <div class="paciente_edit_asistente" style="display:none">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <input type="text" class="form-control form-control-sm" id="input_reserva_hora_email_asistente" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Telefono</strong>
                                        <td>

                                            <div class="paciente_view_asistente">
                                                <span id="datos_consulta_telefono"></span>
                                            </div>
                                            <div class="paciente_edit_asistente" style="display:none">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <input type="text" class="form-control form-control-sm" id="input_reserva_hora_telefono_asistente" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        </th>
                                    </tr>
                                    {{-- direccion --}}
                                    <tr>
                                        <th scope="row">
                                            <strong>Dirección</strong>
                                        <td>

                                            <div class="paciente_view_asistente">
                                                <span id="datos_consulta_direcion"></span>
                                            </div>
                                            <div class="paciente_edit_asistente" style="display:none">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="input_reserva_hora_direccion_asistente" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Número</strong>
                                        <td>

                                            <div class="paciente_view_asistente">
                                                <span id="datos_consulta_numero"></span>
                                            </div>
                                            <div class="paciente_edit_asistente" style="display:none">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="input_reserva_hora_numero_asistente" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Región</strong>
                                        <td>

                                            <div class="paciente_view_asistente">
                                                <span id="datos_consulta_region"></span>
                                            </div>
                                            <div class="paciente_edit_asistente" style="display:none">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <select name="input_reserva_hora_region_asistente" id="input_reserva_hora_region_asistente" class="form-control" onchange="buscar_ciudad_general('input_reserva_hora_region_asistente', 'input_reserva_hora_ciudad_asistente', 0);">
                                                            <option value="0">Seleccione región</option>
                                                            @foreach ($region as $reg)
                                                                <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Ciudad</strong>
                                        <td>

                                            <div class="paciente_view_asistente">
                                                <span id="datos_consulta_ciudad"></span>
                                            </div>
                                            <div class="paciente_edit_asistente" style="display:none">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <select name="input_reserva_hora_ciudad_asistente" id="input_reserva_hora_ciudad_asistente" class="form-control">
                                                            <option value="0">Seleccione comuna</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        </th>
                                    </tr>
                                    <tr class="paciente_edit_asistente" style="display:none">

                                        <td>
                                            <button type="button" id="cancelar_modifcar_paciente" onclick="cancelar_modificacion_paciente_asistente();" class="btn btn-sm btn-danger has-ripple">
                                                <i class="feather icon-x"></i> Cancelar actualización
                                            <span class="ripple ripple-animate" style="height: 181.038px; width: 181.038px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -74.4315px; left: 20.481px;"></span></button>
                                        </td>
                                        <td>
                                            <button type="button" id="actualizar_modificar_paciente" onclick="actualizar_paciente_asistente();" class="btn btn-sm btn-info">
                                                <i class="feather icon-check"></i> Actualizar paciente
                                            </button>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Observaciones</strong>
                                        <td>
                                            <span id="datos_consulta_observaciones"></span>
                                        </td>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Fecha última atención</strong>
                                        <td>
                                            <span id="datos_consulta_fecha_ultima"></span>
                                        </td>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>

                <form id="cancelacion_hora_medica">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">

                            <div class="form-group ">
                                <label class="floating-label">Comentarios</label>
                                <input type="text" class="form-control" id="cancelar_hora_comentario" name="cancelar_hora_comentario">
                            </div>

                        </div>
                    </div>
                </form>

                <form id="confirmacion_hora_medica">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group ">
                                <label class="floating-label-activo-sm">Vía de Confirmación</label>
                                {{--  <input type="text" class="form-control" id="confirmar_hora_comentario" name="confirmar_hora_comentario">  --}}
                                <select class="form-control" name="confirmar_hora_comentario" id="confirmar_hora_comentario">
                                    @if (isset($reg_confirmacion_hora))
                                        @foreach ($reg_confirmacion_hora as $reg)
                                            <option value="{{ $reg->nombre }}">
                                                {{ $reg->nombre }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="0">Seleccione</option>
                                    @endif
                                </select>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">

               
                 <!--<div>
                    <select class="form-control form-control-sm">
                        <option>Seleccione vía de confirmación</option>
                    </select>
                </div>-->
                <div>
                    <button type="submit" onclick="opcion_confirmar_hora()" id="hm_confirmar_hora" class="btn btn-success btn-sm"><i class="feather icon-check"></i> Confirmar
                        Hora
                    </button>
                </div>
                 <div>
                    <button type="button" onclick="opcion_cancelar_hora();" id="hm_anular_hora"
                        class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i>  Anular
                        Hora
                    </button>
                </div>
                <div>
                    <button type="submit" id="hm_ver_hora" class="btn btn-info btn-sm"><i class="feather icon-file"></i> Ver Atención</button>
                </div>

                <div>

                    <form method="get" action="@if(isset($institucion) && $institucion && is_object($institucion) && isset($institucion->id_tipo_institucion) && ($institucion->id_tipo_institucion == 2 || $institucion->id_tipo_institucion == 4))
                                {{ route('profesional.realizar_consulta_hospital_amb') }}
                            @elseif(isset($institucion) && $institucion && is_object($institucion) && isset($institucion->id_tipo_institucion) && $institucion->id_tipo_institucion == 7)
                                {{ route('profesional.realizar_consulta_sdi') }}
                            @else
                                {{ route('profesional.realizar_consulta') }}
                            @endif">
                        @csrf
                        <input type="hidden" name="id_hora_realizar" id="id_hora_realizar" val="">
                        <input type="hidden" name="lugar_atencion_id" id="lugar_atencion_id" value="{{ $lugar_atencion }}">
                        <input type="hidden" name="id_paciente" id="id_paciente" value="">

                        <button type="submit" id="hm_atender_hora" class="btn btn-info btn-sm"><i class="feather icon-check"></i> Atender</button>
                    </form>
                </div>


                @if ($institucion)
                    @if($institucion->sala_espera == 1)
                        <div>
                            <button type="button" style="display: none" id="hm_llamar_paciente" class="btn btn-success btn-sm" onclick=""><i class="feather icon-user-plus"></i> Llamar Paciente</button>
                        </div>
                    @endif
                @endif
                <div>
                    <form method="get" action="#">
                        @csrf
                        <input type="hidden" name="id_hora_realizar" id="id_hora_realizar" val="">

                        <button type="submit" id="hm_espera_paciente_hora" class="btn btn-info btn-sm"
                            onclick="paciente_esperando();">Esperando</button>
                    </form>
                </div>

                <div>
                    <button type="submit" onclick="opcion_revisar_ficha()" id="hm_revisar_ficha" class="btn btn-success btn-sm"><i class="feather icon-check"></i> Revisar ficha
                        Hora
                    </button>
                    <button type="button" id="cerrarModal" class="btn btn-secondary btn-sm" data-dismiss="modal"> <i class="feather icon-x"></i> Cerrar
                    </button>

                </div>
                <div>
                    <button type="button" id="confirmar_anulacion_hora" onclick="cancelar_hora();"
                        class="btn btn-danger btn-sm"><i class="feather icon-x"></i> Anular
                        Hora
                    </button>
                </div>
                <div>
                    <button type="button" id="confirmacion_hora" onclick="confirmar_hora();"
                        class="btn btn-success btn-sm"><i class="feather icon-check"></i> Confirmar
                        Hora
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function opcion_revisar_ficha() {
        let id_hora_medica = $('#id_hora_medica').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let csrfToken = $('meta[name="csrf-token"]').attr('content'); // Obtener el token CSRF

        // Elegir la ruta correcta según el lugar de atención
        let basePath = (parseInt(id_lugar_atencion) === 87)
            ? '/Profesional/Paciente/Ficha_consulta/sdi'
            : '/Profesional/Paciente/Ficha_consulta';

        // Construir la URL con los parámetros
        let url = `${basePath}?_token=${csrfToken}&id_hora_realizar=${id_hora_medica}&lugar_atencion_id=${id_lugar_atencion}`;

        // Redirigir a la URL
        window.location.href = url;
    }

</script>
