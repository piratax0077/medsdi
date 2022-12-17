<!--Modal Asociar Profesional-->
<div id="asociar_profesional_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="asociar_profesional_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Asociar Profesional</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    {{--  DIV PARA BUSQUEDA DE PROFESIONAL  --}}
                    <div id="div_agregar_profesional_busqueda" style="display:;" class="col-sm-12 mb-3">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <h6 class="text-c-blue">Escriba rut y seleccione la sucursal</h6>
                            </div>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Rut</label>
                                    <input type="text" class="form-control form-control-sm" name="agregar_profesional_int_rut" id="agregar_profesional_int_rut">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <button type="button" class="btn btn-info btn-sm "  id="agregar_profesional_btn_buscar_rut" onclick="buscar_profesional();">Buscar Profesional</button>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    @if($institucion->sucursales == 0)
                                        <label class="floating-label-activo-sm">Casa Matriz</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $institucion->LugarAtencion()->first()->nombre }}" readonly>
                                        <input type="hidden" name="agregar_profesional_int_id_lugar_atencion" id="agregar_profesional_int_id_lugar_atencion" value="{{ $institucion->LugarAtencion()->first()->id }}">
                                    @else
                                        <label class="floating-label-activo-sm">Sucursal</label>
                                        <select class="form-control form-control-sm" name="agregar_profesional_int_id_lugar_atencion" id="agregar_profesional_int_id_lugar_atencion">
                                            <option>Seleccione una opción</option>
                                                <option value="">Sucursal</option>
                                                <option value="1">Sucursal Demo</option>
                                        </select>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--  DIV PARA MOSTRAR RESULTADO DE BUSQUEDA DE PROFESIONAL ENCONTRADO  --}}
                    <div id="div_agregar_profesional_ver_info_prof" style="display:none;" class="col-sm-12 mb-3">
                        <input type="hidden" name="agregar_profesional_ver_nombre_profesional" id=" agregar_profesional_ver_nombre_profesional">
                        <input type="hidden" name="agregar_profesional_ver_telefono" id="agregar_profesional_ver_telefono">
                        <input type="hidden" name="agregar_profesional_ver_email" id="agregar_profesional_ver_email">
                        <input type="hidden" name="agregar_profesional_id_profesional" id="agregar_profesional_id_profesional">
                        <div class="row">
                            <div class="col-sm-4"><strong>Nombre: </strong></div>
                            <div class="col-sm-6" name="agregar_profesional_texto_ver_nombre_profesional" id="agregar_profesional_texto_ver_nombre_profesional"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><strong>Telefono: </strong></div>
                            <div class="col-sm-6" name="agregar_profesional_texto_ver_telefono" id="agregar_profesional_texto_ver_telefono"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><strong>Email: </strong></div>
                            <div class="col-sm-6" name="agregar_profesional_texto_ver_email" id="agregar_profesional_texto_ver_email"></div>
                        </div>
                        <div class="row m-t-15">
                            <div class="col-sm-6 text-center">
                                <button type="button" class="btn btn-info" onclick="regresar_a_busqueda();">Regresar a Busqueda</button>
                            </div>
                            <div class="col-sm-6 text-center">
                                <button type="button" class="btn btn-success" onclick="asociar_profesional_existente();">Enviar invitación</button>
                            </div>
                        </div>
                    </div>

                    {{--  DIV PARA CARGAR PROFESIONAL NUEVO  --}}
                    <div id="div_agregar_profesional_formulario_nuevo_prof" style="display:none;" class="col-sm-12 mb-3">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo">Nombre</label>
                                    <input type="text" class="form-control form-control-sm" name="agregar_profesional_nuevo_nombre" id="agregar_profesional_nuevo_nombre">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo">Apellido Paterno</label>
                                    <input type="text" class="form-control form-control-sm" name="agregar_profesional_nuevo_apellido_p" id="agregar_profesional_nuevo_apellido_p">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo">Apellido Materno</label>
                                    <input type="text" class="form-control form-control-sm" name="agregar_profesional_nuevo_apellido_m" id="agregar_profesional_nuevo_apellido_m">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo">Telefono</label>
                                    <input type="text" class="form-control form-control-sm" name="agregar_profesional_nuevo_telefono" id="agregar_profesional_nuevo_telefono">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo">Email</label>
                                    <input type="text" class="form-control form-control-sm" name="agregar_profesional_nuevo_email" id="agregar_profesional_nuevo_email">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6 text-center">
                                <button type="button" class="btn btn-info" onclick="regresar_a_busqueda();">Regresar a Busqueda</button>
                            </div>
                            <div class="col-sm-6 text-center">
                                <button type="button" class="btn btn-success" onclick="asociar_nuevo_profesional();" >Enviar invitación</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
