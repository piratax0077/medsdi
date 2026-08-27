
<style>
    #consulta .agenda-dental-progress-panel{margin-top:.65rem;padding:.9rem 1rem;border:1px solid #d9e3f0;border-radius:.65rem;background:#fff}
    #consulta .agenda-dental-layout{align-items:flex-start}
    #consulta .agenda-paciente-col,
    #consulta .agenda-dental-col{min-width:0}
    #consulta .agenda-paciente-card,
    #consulta .agenda-dental-card{height:100%}
    #consulta .agenda-paciente-card{padding:.25rem .75rem .5rem;border:1px solid #e4e9f0;border-radius:.65rem;background:#fff}
    #consulta .agenda-paciente-title{font-weight:700;color:#1649a8;padding:.7rem 0 .35rem;border-bottom:1px solid #edf0f5;margin-bottom:.2rem}
    #consulta .agenda-dental-col .alert{margin-bottom:0}
    #consulta .modal-agenda{margin-bottom:0;width:100%}
    #consulta .modal-agenda th{width:42%;white-space:nowrap;padding:.45rem .35rem}
    #consulta .modal-agenda td{padding:.45rem .35rem}
    @media(max-width:991.98px){
        #consulta .agenda-dental-col{margin-top:1rem}
    }
    #consulta .agenda-dental-progress-title{color:#1649a8;font-weight:700;margin-bottom:.75rem}
    #consulta .agenda-dental-progress-list{display:grid;grid-template-columns:1fr;gap:.75rem}
    #consulta .agenda-dental-progress-item{display:flex;align-items:center;gap:.85rem;padding:.75rem;border:1px solid #edf0f5;border-radius:.65rem;background:#fbfcfe;min-width:0}
    #consulta .agenda-dental-progress-wheel{--agenda-progress:0;--agenda-progress-color:#cbd5e1;width:72px;height:72px;border-radius:50%;flex:0 0 72px;display:grid;place-items:center;position:relative;background:conic-gradient(var(--agenda-progress-color) calc(var(--agenda-progress)*1%),#e8edf3 0)}
    #consulta .agenda-dental-progress-wheel:before{content:"";position:absolute;width:56px;height:56px;border-radius:50%;background:#fff}
    #consulta .agenda-dental-progress-value{position:relative;z-index:1;font-size:1rem;font-weight:800;color:#334155}
    #consulta .agenda-dental-progress-info{min-width:0;flex:1}
    #consulta .agenda-dental-progress-name{font-weight:700;color:#26364d;line-height:1.25;margin-bottom:.3rem}
    #consulta .agenda-dental-progress-badge{display:inline-block;padding:.17rem .45rem;border-radius:.3rem;font-size:.68rem;font-weight:800;text-transform:uppercase;margin-bottom:.25rem}
    #consulta .agenda-dental-progress-meta{color:#5f6b7a;font-size:.76rem;line-height:1.45}
    #consulta .agenda-progress-0{--agenda-progress-color:#94a3b8}
    #consulta .agenda-progress-25{--agenda-progress-color:#f4b323}
    #consulta .agenda-progress-50{--agenda-progress-color:#2bb7b3}
    #consulta .agenda-progress-75{--agenda-progress-color:#4285e8}
    #consulta .agenda-progress-100{--agenda-progress-color:#2fb75d}
    #consulta .agenda-status-pendiente{background:#eef2f6;color:#5f6b7a}
    #consulta .agenda-status-proceso{background:#e8f1ff;color:#2465c1}
    #consulta .agenda-status-finalizada{background:#e7f8ed;color:#258348}
    #consulta .agenda-dental-progress-legend{display:flex;flex-wrap:wrap;gap:.75rem;margin-top:.75rem;padding-top:.65rem;border-top:1px solid #edf0f5;font-size:.72rem;color:#5f6b7a}
    #consulta .agenda-dental-progress-legend span:before{content:"";display:inline-block;width:10px;height:10px;border-radius:3px;margin-right:.28rem;vertical-align:-1px;background:var(--legend-color)}
    @media(max-width:767.98px){#consulta .agenda-dental-progress-list{grid-template-columns:1fr}}
</style>

<!-- Modal consulta agenda profesional-->
<div id="consulta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="consulta" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
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
                    <div class="row agenda-dental-layout">
                        <div class="col-sm-12 col-lg-6 agenda-paciente-col">
                            <div class="agenda-paciente-card">
                                <div class="agenda-paciente-title"><i class="feather icon-user mr-1"></i> Datos del paciente</div>
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
                                            <strong>Teléfono</strong>
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
                        <div class="col-sm-12 col-lg-6 d-none agenda-dental-col" id="detalle_agenda_dental">
                            <div class="alert alert-primary">
                                <div class="media">
                                  <img src="{{ asset('images/iconos/diente.svg') }}" class="mr-2 wid-40 img-fluid" alt="...">
                                  <div class="media-body">
                                       <strong class="text-c-blue f-14">Detalle de la atención dental</strong>
                                        <span id="detalle_dental_estado_pago" class="badge"></span>
                                        <div class="text-dark" id="detalle_dental_resumen" class="mb-2"></div>
                                        <div class="text-dark" id="detalle_dental_prestaciones"></div>
                                        <div id="detalle_dental_avances" class="agenda-dental-progress-panel d-none">
                                            <div class="agenda-dental-progress-title">
                                                <i class="feather icon-activity mr-1"></i> Avances de trabajos programados
                                            </div>
                                            <div id="detalle_dental_avances_lista" class="agenda-dental-progress-list"></div>
                                            <div class="agenda-dental-progress-legend">
                                                <span style="--legend-color:#94a3b8">0% Pendiente</span>
                                                <span style="--legend-color:#f4b323">25%</span>
                                                <span style="--legend-color:#2bb7b3">50%</span>
                                                <span style="--legend-color:#4285e8">75%</span>
                                                <span style="--legend-color:#2fb75d">100% Finalizado</span>
                                            </div>
                                        </div>
                                  </div>
                                </div>
                            </div>
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
                                <select class="form-control" name="confirmar_hora_comentario_paso_anterior"
                                    id="confirmar_hora_comentario_paso_anterior">
                                    <option value="0" selected>Seleccione vía de confirmación</option>
                                    @if (isset($reg_confirmacion_hora))
                                        @foreach ($reg_confirmacion_hora as $reg)
                                            <option value="{{ $reg->nombre }}">
                                                {{ $reg->nombre }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <div id="contenedor_via_confirmacion">
                    <select class="form-control form-control-sm" name="confirmar_hora_comentario"
                        id="confirmar_hora_comentario">
                        <option value="0" selected>Seleccione vía de confirmación</option>
                        @if (isset($reg_confirmacion_hora))
                            @foreach ($reg_confirmacion_hora as $reg)
                                <option value="{{ $reg->nombre }}">{{ $reg->nombre }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div>
                    <button type="button" onclick="confirmar_hora()" id="hm_confirmar_hora" class="btn btn-success btn-sm"><i class="feather icon-check"></i> Confirmar
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
