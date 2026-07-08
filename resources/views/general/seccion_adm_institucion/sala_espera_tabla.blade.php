<!--sala de esperaa-->
<div class="card">
    <div class="card-header bg-info">
        <div class="row">
            <div class="col-md-12">
                <h6 class="f-18 d-inline mt-3 text-white ">Salas de Espera</h6>
                <div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                    <button type="button" class="btn btn-sm btn-light" onclick="abrir_agregar_sala_espera();"><i
                            class="feather icon-plus" aria-hidden="true"></i> Añadir</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="table-responsive">
                    <table id="tabla_sala_espera" class="display table table-striped table-xs dt-responsive nowrap"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-wrap align-middle">Nombre</th>
                                <th class="text-wrap align-middle">Descripción</th>
                                <th class="text-wrap align-middle">Piso</th>
                                <th class="text-wrap align-middle">Alias</th>
                                <th class="text-wrap align-middle">Token</th>

                                <th class="text-wrap align-middle">Televisor</th>
                                <th class="text-wrap align-middle">Box</th>
                                <th class="text-wrap align-middle">Activo</th>
                                <th class="text-wrap align-middle">Editar</th>
                                <th class="text-wrap align-middle">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($sala_espera) && $sala_espera->count() > 0)
                                @foreach ($sala_espera as $sala_e)
                                    <tr>

                                        <td class="align-middle">{{ $sala_e->nombre }}</td>
                                        <td class="align-middle">{{ $sala_e->descripcion }}</td>
                                        <td class="align-middle">{{ $sala_e->piso }}</td>
                                        <td class="align-middle">{{ $sala_e->alias }}</td>
                                        <td class="align-middle">{{ $sala_e->token }}</td>

                                        {{-- tv --}}
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn btn-primary btn-icon"
                                                onclick="abrir_modal_tv_sala({{ $sala_e->id }});"><i
                                                    class="feather icon-monitor"></i></button>
                                        </td>

                                        {{-- Boxs --}}
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn btn-purple btn-icon"
                                                onclick="abrir_modal_box_sala({{ $sala_e->id }});"><i
                                                    class="feather icon-home"></i></button>
                                        </td>

                                        {{-- estado --}}
                                        <td class="align-middle">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="esp-{{ $sala_e->id }}" onchange="checkSalaEsperaChanged(this)"
                                                    {{ $sala_e->estado == 1 ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="esp-{{ $sala_e->id }}"></label>
                                            </div>
                                        </td>

                                        {{-- editar --}}
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn btn-warning btn-icon"
                                                onclick="abrir_modificar_sala_espera({{ $sala_e->id }});"><i
                                                    class="feather icon-edit"></i></button>
                                        </td>

                                        {{-- eliminar --}}
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn btn-danger btn-icon"
                                                onclick="eliminar_sala_espera({{ $sala_e->id }})"><i
                                                    class="feather icon-x"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- MODAL AÑADIR SALA DE ESPERAr --}}
<div id="moda_agregar_sala_espera" class="modal fade " tabindex="-1" role="dialog"
    aria-labelledby="moda_agregar_sala_espera" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Añadir Sala Espera</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                    onclick="$('#moda_agregar_sala_espera').modal('hide');"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="moda_agregar_sala_espera_id_institucion"
                    id="moda_agregar_sala_espera_id_institucion" value="">

                @if ($institucion->sucursales == 1)
                    <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Sucursal</label>
                            <select class="form-control form-control-sm" name="moda_agregar_sala_espera_id_lugar_atencion" id="moda_agregar_sala_espera_id_lugar_atencion">
                                @foreach ($sucursales as $suc)
                                    <option value="{{ $suc->id_lugar_atencion }}" {{ $loop->first ? 'selected' : '' }}>{{ $suc->nombre }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" name="moda_agregar_sala_espera_id_lugar_atencion"
                                id="moda_agregar_sala_espera_id_lugar_atencion" class="form-control form-control-sm"> --}}
                        </div>
                    </div>
                @else
                    <input type="hidden" name="moda_agregar_sala_espera_id_lugar_atencion"
                        id="moda_agregar_sala_espera_id_lugar_atencion" value="">
                @endif

                <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Nombre</label>
                        <input type="text" name="moda_agregar_sala_espera_nombre"
                            id="moda_agregar_sala_espera_nombre" class="form-control form-control-sm"
                            onkeyup="generarAlias('moda_agregar_sala_espera_nombre', 'moda_agregar_sala_espera_alias')">
                    </div>
                </div>
                <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Alias</label>
                        <input type="text" name="moda_agregar_sala_espera_alias" id="moda_agregar_sala_espera_alias"
                            class="form-control form-control-sm" disabled>
                    </div>
                </div>
                <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Descripción</label>
                        <textarea class="form-control form-control-sm" name="moda_agregar_sala_espera_descripcion"
                            id="moda_agregar_sala_espera_descripcion" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Piso</label>
                        <input type="number" name="moda_agregar_sala_espera_piso" id="moda_agregar_sala_espera_piso"
                            class="form-control form-control-sm">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-success btn-sm btn-block"
                            onclick="agregar_sala_espera();">Guardar</button>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-danger btn-sm btn-block"
                            onclick="$('#moda_agregar_sala_espera').modal('hide');">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal editar --}}
<div id="moda_editar_sala_espera" class="modal fade " tabindex="-1" role="dialog"
    aria-labelledby="moda_editar_sala_espera" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Editar Sala Espera</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                    onclick="$('#moda_editar_sala_espera').modal('hide');"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="moda_editar_sala_espera_id" id="moda_editar_sala_espera_id"
                    value="">
                <input type="hidden" name="moda_editar_sala_espera_id_institucion"
                    id="moda_editar_sala_espera_id_institucion" value="">


                @if ($institucion->sucursales == 1)
                    <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Sucursal</label>
                            <select class="form-control form-control-sm" name="moda_editar_sala_espera_id_lugar_atencion" id="moda_editar_sala_espera_id_lugar_atencion">
                                @foreach ($sucursales as $suc)
                                    <option value="{{ $suc->id_lugar_atencion }}" {{ $loop->first ? 'selected' : '' }}>{{ $suc->nombre }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" name="moda_editar_sala_espera_id_lugar_atencion"
                                id="moda_editar_sala_espera_id_lugar_atencion" class="form-control form-control-sm"> --}}
                        </div>
                    </div>
                @else
                    <input type="hidden" name="moda_editar_sala_espera_id_lugar_atencion"
                        id="moda_editar_sala_espera_id_lugar_atencion" value="">
                @endif

                <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Nombre</label>
                        <input type="text" name="moda_editar_sala_espera_nombre"
                            id="moda_editar_sala_espera_nombre" class="form-control form-control-sm"
                            onkeyup="generarAlias('moda_editar_sala_espera_nombre', 'moda_editar_sala_espera_alias')">
                    </div>
                </div>
                <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Alias</label>
                        <input type="text" name="moda_editar_sala_espera_alias" id="moda_editar_sala_espera_alias"
                            class="form-control form-control-sm" disabled>
                    </div>
                </div>
                <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Descripción</label>
                        <textarea class="form-control form-control-sm" name="moda_editar_sala_espera_descripcion"
                            id="moda_editar_sala_espera_descripcion" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Piso</label>
                        <input type="number" name="moda_editar_sala_espera_piso" id="moda_editar_sala_espera_piso"
                            class="form-control form-control-sm">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-success btn-sm btn-block"
                            onclick="modificar_sala_espera();">Guardar</button>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-danger btn-sm btn-block"
                            onclick="$('#moda_editar_sala_espera').modal('hide');">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal TV --}}
<div id="moda_tv_sala_espera" class="modal fade " tabindex="-1" role="dialog"
    aria-labelledby="moda_tv_sala_espera" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">TV de Sala Espera</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                    onclick="$('#moda_tv_sala_espera').modal('hide');"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="moda_tv_sala_espera_id" id="moda_tv_sala_espera_id" value="">
                <input type="hidden" name="moda_tv_sala_espera_id_sala_espera"
                    id="moda_tv_sala_espera_id_sala_espera" value="">
                <input type="hidden" name="moda_tv_sala_espera_id_institucion"
                    id="moda_tv_sala_espera_id_institucion" value="">
                <input type="hidden" name="moda_tv_sala_espera_id_lugar_atencion"
                    id="moda_tv_sala_espera_id_lugar_atencion" value="">

                <!--televisor de sala de esperaa-->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Nombre</label>
                                    <input type="text" name="moda_tv_sala_espera_nombre"
                                        id="moda_tv_sala_espera_nombre" class="form-control form-control-sm"
                                        onkeyup="generarAlias('moda_tv_sala_espera_nombre', 'moda_tv_sala_espera_alias')">
                                </div>
                            </div>
                            <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Alias</label>
                                    <input type="text" name="moda_tv_sala_espera_alias"
                                        id="moda_tv_sala_espera_alias" class="form-control form-control-sm" disabled>
                                </div>
                            </div>
                            <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Descripción</label>
                                    <textarea class="form-control form-control-sm" name="moda_tv_sala_espera_descripcion"
                                        id="moda_tv_sala_espera_descripcion" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Cantidad</label>
                                    <input type="number" name="moda_tv_sala_espera_cantidad" min="6" max="20" step="1"
                                        id="moda_tv_sala_espera_cantidad" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                {{-- btn_agregar --}}
                                <button type="button" class="btn btn-success btn-sm btn-block btn_agregar"
                                    onclick="agregar_tv_sala();">Agregar</button>

                                {{-- btn modificar --}}
                                <button type="button" class="btn btn-success btn-sm btn-block btn_modificar"
                                    style="display: none;" onclick="modificar_tv_sala();">Guardar</button>

                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <button type="button" class="btn btn-danger btn-sm btn-block"
                                    onclick="limpiar_tv_sala();">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- tabla de tv's --}}
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="moda_tv_sala_espera_table_tv"
                                        class="display table table-striped table-xs dt-responsive nowrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-wrap align-middle">Nombre</th>
                                                <th class="text-wrap align-middle">Descripcion</th>
                                                <th class="text-wrap align-middle">Alias</th>
                                                <th class="text-wrap align-middle">Cantidad</th>
                                                <th class="text-wrap align-right">Estado</th>
                                                <th class="text-wrap align-right">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <button type="button" class="btn btn-danger btn-sm btn-block"
                                onclick="$('#moda_tv_sala_espera').modal('hide');">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- modal Box --}}
<div id="moda_box_sala_espera" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="moda_box_sala_espera" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Box de Sala Espera</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                    onclick="$('#moda_box_sala_espera').modal('hide');"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="moda_box_sala_espera_id" id="moda_box_sala_espera_id" value="">
                <input type="hidden" name="moda_box_sala_espera_id_sala_espera"
                    id="moda_box_sala_espera_id_sala_espera" value="">
                <input type="hidden" name="moda_box_sala_espera_id_institucion"
                    id="moda_box_sala_espera_id_institucion" value="">
                <input type="hidden" name="moda_box_sala_espera_id_lugar_atencion"
                    id="moda_box_sala_espera_id_lugar_atencion" value="">

                <!--Box de sala de espera-->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Box</label>
                                    <select class="form-control form-control-sm" name="moda_box_sala_espera_id_box"
                                        id="moda_box_sala_espera_id_box">
                                        <option value="">Seleccione un box</option>
                                        @if (isset($boxes_servicio) && $boxes_servicio->count() > 0)
                                            @foreach ($boxes_servicio as $box)
                                                <option value="{{ $box->id }}">BOX {{ $box->tipo_box }} - {{ $box->numero_box }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                {{-- btn_agregar --}}
                                <button type="button" class="btn btn-success btn-sm btn-block btn_agregar"
                                    onclick="agregar_box_sala();">Agregar</button>

                                {{-- btn modificar --}}
                                <button type="button" class="btn btn-success btn-sm btn-block btn_modificar"
                                    style="display: none;" onclick="modificar_box_sala();">Guardar</button>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <button type="button" class="btn btn-danger btn-sm btn-block"
                                    onclick="limpiar_box_sala();">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- tabla de box's --}}
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="moda_box_sala_espera_table_box"
                                        class="display table table-striped table-xs dt-responsive nowrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-wrap align-middle">Box</th>
                                                <th class="text-wrap align-middle">Estado</th>
                                                <th class="text-wrap align-right">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <button type="button" class="btn btn-danger btn-sm btn-block"
                            onclick="$('#moda_box_sala_espera').modal('hide');">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function generarAlias(id_input_nombre, id_input_alias) {
        $('#' + id_input_nombre).on('input', function() {
            let texto = $(this).val()
                .toLowerCase()
                .replace(/\s+/g, '_')
                .replace(/[^a-z0-9_]/g, '');
            $('#' + id_input_alias).val(texto);
        });
    }
    /** sala de espera */
    function abrir_agregar_sala_espera() {
        $('#moda_agregar_sala_espera').modal('show');
        $('#moda_agregar_sala_espera_id_institucion').val('{{ $institucion->id }}');
        $('#moda_agregar_sala_espera_id_lugar_atencion').val('{{ $institucion->id_lugar_atencion }}');
        $('#moda_agregar_sala_espera_nombre').val('');
        $('#moda_agregar_sala_espera_alias').val('');
        $('#moda_agregar_sala_espera_descripcion').val('');
        $('#moda_agregar_sala_espera_piso').val(1);
    }

    function agregar_sala_espera() {
        let valido = 1;
        let mensaje = '';

        var id_institucion = $('#moda_agregar_sala_espera_id_institucion').val();
        var id_lugar_atencion = $('#moda_agregar_sala_espera_id_lugar_atencion').val();
        var nombre = $('#moda_agregar_sala_espera_nombre').val();
        var alias = $('#moda_agregar_sala_espera_alias').val();
        var descripcion = $('#moda_agregar_sala_espera_descripcion').val();
        var piso = $('#moda_agregar_sala_espera_piso').val();

        // validar campos
        if (id_institucion == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Institución</li>';
        }
        if (id_lugar_atencion == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Lugar Atención</li>';
        }
        if (nombre == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Nombre</li>';
        }
        if (alias == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Alias</li>';
        }
        if (descripcion == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Descripción</li>';
        }
        if (piso == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Piso</li>';
        }

        if (valido == 1) {
            let data = {
                id_institucion: id_institucion,
                id_lugar_atencion: id_lugar_atencion,
                nombre: nombre,
                alias: alias,
                descripcion: descripcion,
                piso: piso,
                _token: CSRF_TOKEN,
            };

            let url = "{{ route('sala_espera.agregar') }}";

            $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                })
                .done(function(data) {
                    if (data && data.estado == 1) {
                        swal({
                            title: "Sala de Espera",
                            text: "Sala de Espera Ingresada Correctamente",
                            icon: "success",
                        });

                        // Resetear todos los campos del modal
                        $('#moda_agregar_sala_espera_nombre').val('');
                        $('#moda_agregar_sala_espera_alias').val('');
                        $('#moda_agregar_sala_espera_descripcion').val('');
                        $('#moda_agregar_sala_espera_piso').val('0');

                        $('#moda_agregar_sala_espera').modal('hide');

                    } else {
                        swal({
                            title: "Error",
                            text: "Error al ingresar sala de espera",
                            icon: "error",
                            buttons: "Aceptar",
                            dangerMode: true,
                        });
                    }
                })
                .fail(function() {
                    swal({
                        title: "Error",
                        text: "Error en la conexión al servidor",
                        icon: "error"
                    });
                });
        } else {
            swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error"
            });
        }
    }


    function checkSalaEsperaChanged(checkbox) {
        const id = checkbox.id.split('-')[1];
        const url = "{{ route('sala_espera.estado') }}";

        $.ajax({
                url: url,
                type: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
            })
            .done(function(data) {
                if (!data || data.estado != 1) {
                    checkbox.checked = !checkbox.checked;
                    swal({
                        title: "Error",
                        text: data ? data.msj : 'Error desconocido',
                        icon: "error"
                    });
                }
            })
            .fail(function() {
                checkbox.checked = !checkbox.checked;
                swal({
                    title: "Error",
                    text: "Error en la conexión al servidor",
                    icon: "error"
                });
            });
    }

    function abrir_modificar_sala_espera(id) {
        $('#moda_editar_sala_espera').modal('show');
        $('#moda_editar_sala_espera_id').val(id);
        $('#moda_editar_sala_espera_id_institucion').val('{{ $institucion->id }}');
        $('#moda_editar_sala_espera_id_lugar_atencion').val('{{ $institucion->id_lugar_atencion }}');
        $('#moda_editar_sala_espera_nombre').val('');
        $('#moda_editar_sala_espera_alias').val('');
        $('#moda_editar_sala_espera_descripcion').val('');
        $('#moda_editar_sala_espera_piso').val(1);

        let valido = 1;
        let mensaje = '';

        if (id == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Identificador de Sala de espera</li>';
        }

        if (valido == 1) {
            let data = {
                id: id,
            };

            let url = "{{ route('sala_espera.ver_registro') }}";

            $.ajax({
                    url: url,
                    type: "get",
                    data: data,
                })
                .done(function(data) {
                    if (data && data.estado == 1) {
                        // Resetear todos los campos del modal
                        $('#moda_editar_sala_espera_nombre').val(data.registros.nombre);
                        $('#moda_editar_sala_espera_alias').val(data.registros.alias);
                        $('#moda_editar_sala_espera_descripcion').val(data.registros.descripcion);
                        $('#moda_editar_sala_espera_piso').val(data.registros.piso);

                        $('#moda_editar_sala_espera').modal('hide');

                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar sala de espera",
                            icon: "error",
                            buttons: "Aceptar",
                            dangerMode: true,
                        });
                    }
                })
                .fail(function() {
                    swal({
                        title: "Error",
                        text: "Error en la conexión al servidor",
                        icon: "error"
                    });
                });
        } else {
            swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error"
            });
        }
    }

    function modificar_sala_espera() {
        let valido = 1;
        let mensaje = '';

        var id = $('#moda_editar_sala_espera_id').val();
        var id_institucion = $('#moda_editar_sala_espera_id_institucion').val();
        var id_lugar_atencion = $('#moda_editar_sala_espera_id_lugar_atencion').val();
        var nombre = $('#moda_editar_sala_espera_nombre').val();
        var alias = $('#moda_editar_sala_espera_alias').val();
        var descripcion = $('#moda_editar_sala_espera_descripcion').val();
        var piso = $('#moda_editar_sala_espera_piso').val();

        // validar campos
        if (id == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Identificador</li>';
        }
        if (id_institucion == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Institución</li>';
        }
        if (id_lugar_atencion == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Lugar Atención</li>';
        }
        if (nombre == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Nombre</li>';
        }
        if (alias == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Alias</li>';
        }
        if (descripcion == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Descripción</li>';
        }
        if (piso == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Piso</li>';
        }

        if (valido == 1) {
            let data = {
                id: id,
                id_institucion: id_institucion,
                id_lugar_atencion: id_lugar_atencion,
                nombre: nombre,
                alias: alias,
                descripcion: descripcion,
                piso: piso,
                _token: CSRF_TOKEN,
            };

            let url = "{{ route('sala_espera.modificar') }}";

            $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                })
                .done(function(data) {
                    if (data && data.estado == 1) {
                        swal({
                            title: "Sala de Espera",
                            text: "Sala de Espera Ingresada Correctamente",
                            icon: "success",
                        });

                        // Resetear todos los campos del modal
                        $('#moda_editar_sala_espera_nombre').val('');
                        $('#moda_editar_sala_espera_alias').val('');
                        $('#moda_editar_sala_espera_descripcion').val('');
                        $('#moda_editar_sala_espera_piso').val(0);

                        $('#moda_editar_sala_espera').modal('hide');

                    } else {
                        swal({
                            title: "Error",
                            text: "Error al modificar sala de espera",
                            icon: "error",
                            buttons: "Aceptar",
                            dangerMode: true,
                        });
                    }
                })
                .fail(function() {
                    swal({
                        title: "Error",
                        text: "Error en la conexión al servidor",
                        icon: "error"
                    });
                });
        } else {
            swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error"
            });
        }
    }


    // function eliminar_sala_espera() {

    // }

    function abrir_modal_tv_sala(id_sala) {
        limpiar_tv_sala();
        $('.btn_agregar').show();
        $('.btn_modificar').hide();
        $('#moda_tv_sala_espera_id').val(id_sala);
        $('#moda_tv_sala_espera').modal('show');
        cargar_tv_sala(id_sala);
    }

    function cargar_tv_sala(id_sala) {
        $('#moda_tv_sala_espera_table_tv tbody').html('');

        let data = {
            id_sala_espera: id_sala,
        };

        let url = "{{ route('television.ver_registros') }}";

        $.ajax({
                url: url,
                type: "get",
                data: data,
            })
            .done(function(data) {
                if (data && data.estado == 1) {
                    $(data.registros).each(function(i, v) {
                        var html = '';
                        html += '<tr>';
                        html += '    <td class="text-wrap align-middle">' + v.nombre + '</td>';
                        html += '    <td class="text-wrap align-middle">' + v.descripcion + '</td>';
                        html += '    <td class="text-wrap align-middle">' + v.alias + '</td>';
                        html += '    <td class="text-wrap align-middle">' + v.cantidad + '</td>';
                        html += '    <td class="text-wrap align-right">';
                        html += '       <div class="custom-control custom-switch">';
                        html += '           <input type="checkbox" class="custom-control-input" id="tv_esp-' + v.id + '" onchange="checkTvSalaChanged(this)"';
                        if (v.estado == 1)
                            html += 'checked';
                        html += '           >';
                        html += '           <label class="custom-control-label" for="tv_esp-' + v.id + '"></label>';
                        html += '       </div>';
                        html += '    </td>';
                        html += '    <td class="text-wrap align-right">';
                        html += '        <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_tv_sala(' + v.id + ',' + v.id_sala_espera + ')"><i class="feather icon-x"></i></button>';
                        html += '        <button type="button" class="btn btn-warning btn-icon" onclick="cargar_modificar_tv_sala(' +v.id + ')"><i class="feather icon-edit"></i></button>';
                        html += '        <button type="button" class="btn btn-warning btn-icon" onclick="cargar_url_tv_sala(\'' +v.token + '\')"><i class="feather icon-link"></i></button>';
                        html += '    </td>';
                        html += '</tr>';

                        $('#moda_tv_sala_espera_table_tv tbody').append(html);
                    });


                }
            })
            .fail(function() {
                swal({
                    title: "Error",
                    text: "Error en la conexión al servidor",
                    icon: "error"
                });
            });
    }

    function agregar_tv_sala() {
        let valido = 1;
        let mensaje = '';

        var id_sala_espera = $('#moda_tv_sala_espera_id').val();
        var id_institucion = $('#moda_tv_sala_espera_id_institucion').val();
        var id_lugar_atencion = $('#moda_tv_sala_espera_id_lugar_atencion').val();
        var nombre = $('#moda_tv_sala_espera_nombre').val();
        var alias = $('#moda_tv_sala_espera_alias').val();
        var descripcion = $('#moda_tv_sala_espera_descripcion').val();
        var cantidad = $('#moda_tv_sala_espera_cantidad').val();

        // validar campos
        if (id_institucion == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Institución</li>';
        }
        if (id_lugar_atencion == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Lugar Atención</li>';
        }
        if (nombre == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Nombre</li>';
        }
        if (alias == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Alias</li>';
        }
        if (descripcion == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Descripción</li>';
        }
        if (cantidad == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Cantidad</li>';
        }
        else if ( cantidad < 6 || cantidad > 20 )
        {
            valido = 0;
            mensaje += '<li>Campo debe estar entre 6 y 20</li>';
        }


        if (valido == 1) {
            let data = {
                id_sala_espera: id_sala_espera,
                id_institucion: id_institucion,
                id_lugar_atencion: id_lugar_atencion,
                nombre: nombre,
                alias: alias,
                descripcion: descripcion,
                cantidad: cantidad,
                _token: CSRF_TOKEN,
            };

            let url = "{{ route('television.agregar') }}";

            $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                })
                .done(function(data) {
                    if (data && data.estado == 1) {
                        swal({
                            title: "Televisor de Sala de Espera",
                            text: "Televisor en Sala de Espera Ingresada Correctamente",
                            icon: "success",
                        });

                        limpiar_tv_sala();

                        cargar_tv_sala(id_sala_espera);

                    } else {
                        swal({
                            title: "Error",
                            text: "Error al ingresar televisor en sala de espera",
                            icon: "error"
                        });
                    }
                })
                .fail(function() {
                    swal({
                        title: "Error",
                        text: "Error en la conexión al servidor",
                        icon: "error"
                    });
                });
        } else {
            swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error"
            });
        }

    }

    function cargar_modificar_tv_sala(id) {
        let data = {
            id: id,
            _token: CSRF_TOKEN,
        };

        let url = "{{ route('television.ver_registro') }}";

        $.ajax({
                url: url,
                type: "get",
                data: data,
            })
            .done(function(data) {
                if (data && data.estado == 1) {
                    $('#moda_tv_sala_espera_id').val(data.registros.id);
                    $('#moda_tv_sala_espera_id_institucion').val(data.registros.id_institucion);
                    $('#moda_tv_sala_espera_id_lugar_atencion').val(data.registros.id_lugar_atencion);
                    $('#moda_tv_sala_espera_id_sala_espera').val(data.registros.id_sala_espera);
                    $('#moda_tv_sala_espera_alias').val(data.registros.alias);
                    $('#moda_tv_sala_espera_nombre').val(data.registros.nombre);
                    $('#moda_tv_sala_espera_descripcion').val(data.registros.descripcion);
                    $('#moda_tv_sala_espera_cantidad').val(data.registros.cantidad);

                    $('.btn_agregar').hide();
                    $('.btn_modificar').show();

                } else {
                    swal({
                        title: "Error",
                        text: "Error al ingresar sala de espera",
                        icon: "error"
                    });
                }
            })
            .fail(function() {
                swal({
                    title: "Error",
                    text: "Error en la conexión al servidor",
                    icon: "error"
                });
            });
    }

    function modificar_tv_sala() {
        let valido = 1;
        let mensaje = '';

        var id = $('#moda_tv_sala_espera_id').val();
        var id_sala_espera = $('#moda_tv_sala_espera_id_sala_espera').val();
        var id_institucion = $('#moda_tv_sala_espera_id_institucion').val();
        var id_lugar_atencion = $('#moda_tv_sala_espera_id_lugar_atencion').val();
        var nombre = $('#moda_tv_sala_espera_nombre').val();
        var alias = $('#moda_tv_sala_espera_alias').val();
        var descripcion = $('#moda_tv_sala_espera_descripcion').val();
        var cantidad = $('#moda_tv_sala_espera_cantidad').val();

        // validar campos
        if (id_institucion == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Institución</li>';
        }
        if (id_lugar_atencion == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Lugar Atención</li>';
        }
        if (nombre == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Nombre</li>';
        }
        if (alias == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Alias</li>';
        }
        if (descripcion == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Descripción</li>';
        }
        if (cantidad == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Cantidad</li>';
        }
        else if ( cantidad < 6 || cantidad > 20 )
        {
            valido = 0;
            mensaje += '<li>Campo debe estar entre 6 y 20</li>';
        }


        if (valido == 1) {
            let data = {
                id: id,
                id_sala_espera: id_sala_espera,
                id_institucion: id_institucion,
                id_lugar_atencion: id_lugar_atencion,
                nombre: nombre,
                alias: alias,
                descripcion: descripcion,
                cantidad: cantidad,
                _token: CSRF_TOKEN,
            };

            let url = "{{ route('television.modificar') }}";

            $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                })
                .done(function(data) {
                    if (data && data.estado == 1) {
                        swal({
                            title: "Televisor de Sala de Espera",
                            text: "Televisor en Sala de Espera Ingresada Correctamente",
                            icon: "success",
                        });

                        // $('#moda_tv_sala_espera').modal('hide');
                        limpiar_tv_sala();

                        cargar_tv_sala(id_sala_espera);

                    } else {
                        swal({
                            title: "Error",
                            text: "Error al ingresar televisor en sala de espera",
                            icon: "error"
                        });
                    }
                })
                .fail(function() {
                    swal({
                        title: "Error",
                        text: "Error en la conexión al servidor",
                        icon: "error"
                    });
                });
        } else {
            swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error"
            });
        }
    }

    function eliminar_tv_sala(id, id_sala) {
        let data = {
            id: id,
            _token: CSRF_TOKEN,
        };

        let url = "{{ route('television.eliminar') }}";

        $.ajax({
                url: url,
                type: "post",
                data: data,
            })
            .done(function(data) {
                if (data && data.estado == 1) {
                    swal({
                        title: "Televisor de sala de espera",
                        text: "Televisor Eliminado",
                        icon: "success",
                    });

                    cargar_tv_sala(id_sala);
                } else {
                    swal({
                        title: "Error",
                        text: "Error al eliminar televisor de sala de espera",
                        icon: "error"
                    });
                }
            })
            .fail(function() {
                swal({
                    title: "Error",
                    text: "Error en la conexión al servidor",
                    icon: "error"
                });
            });
    }

    function limpiar_tv_sala() {
        $('.btn_agregar').show();
        $('.btn_modificar').hide();
        $('#moda_tv_sala_espera_id').val('');
        $('#moda_tv_sala_espera_id_sala_espera').val('');
        $('#moda_tv_sala_espera_id_institucion').val('{{ $institucion->id }}');
        $('#moda_tv_sala_espera_id_lugar_atencion').val('{{ $institucion->id_lugar_atencion }}');
        $('#moda_tv_sala_espera_nombre').val('');
        $('#moda_tv_sala_espera_alias').val('');
        $('#moda_tv_sala_espera_descripcion').val('');
        $('#moda_tv_sala_espera_cantidad').val('6');
    }

    function checkTvSalaChanged(checkbox) {
        const id = checkbox.id.split('-')[1];
        const url = "{{ route('television.estado') }}";

        $.ajax({
                url: url,
                type: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
            })
            .done(function(data) {
                if (!data || data.estado != 1) {
                    checkbox.checked = !checkbox.checked;
                    swal({
                        title: "Error",
                        text: data ? data.msj : 'Error desconocido',
                        icon: "error"
                    });
                }
            })
            .fail(function() {
                checkbox.checked = !checkbox.checked;
                swal({
                    title: "Error",
                    text: "Error en la conexión al servidor",
                    icon: "error"
                });
            });
    }

    async function cargar_url_tv_sala(token) { // Añade 'async' aquí
        const baseUrl = window.location.origin;
        const tvUrl = `${baseUrl}/pantalla/${token}`;

        // 1. Crear un textarea temporal
        const textareaTemp = document.createElement("textarea");
        textareaTemp.value = tvUrl;
        textareaTemp.style.position = "fixed";
        document.body.appendChild(textareaTemp);

        // 2. Seleccionar el texto
        textareaTemp.select();
        textareaTemp.setSelectionRange(0, 99999); // Para móviles

        try {
            // 3. Intentar con la API moderna (requiere HTTPS)
            if (navigator.clipboard) {
                await navigator.clipboard.writeText(tvUrl); // Ahora sí puede usarse 'await'
            } else {
                // Fallback para navegadores antiguos
                document.execCommand("copy");
            }
            // alert("✔ URL copiada: " + tvUrl);
            swal({
                title: "Televisor de sala de espera",
                text: "✔ URL copiada: " + tvUrl,
                icon: "success",
            });
        } catch (err) {
            console.error("Error al copiar:", err);
            // 4. Mostrar un prompt si falla todo
            prompt("⚠ Presiona Ctrl+C para copiar la URL:", tvUrl);
        } finally {
            // 5. Limpiar el textarea
            document.body.removeChild(textareaTemp);
        }
    }



    // BOX DE SALA DE ESPERA
    // Funciones para Box de Sala de Espera
    function abrir_modal_box_sala(id_sala) {
        limpiar_box_sala();
        $('.btn_agregar').show();
        $('.btn_modificar').hide();
        $('#moda_box_sala_espera_id_sala_espera').val(id_sala);
        $('#moda_box_sala_espera').modal('show');
        cargar_box_sala(id_sala);
    }

    function cargar_box_sala(id_sala) {
        $('#moda_box_sala_espera_table_box tbody').html('');

        let data = {
            id_sala_espera: id_sala,
        };

        let url = "{{ route('box_sala.ver_registros') }}";

        $.ajax({
                url: url,
                type: "get",
                data: data,
            })
            .done(function(data) {
                if (data && data.estado == 1) {
                    $(data.registros).each(function(i, v) {
                        var html = '';
                        html += '<tr>';
                        html += '    <td class="text-wrap align-middle">BOX ' + v.boxes_cm.tipo_box + ' - ' + v.boxes_cm.numero_box + '</td>';
                        html += '    <td class="text-wrap align-right">';
                        html += '       <div class="custom-control custom-switch">';
                        html += '           <input type="checkbox" class="custom-control-input" id="box_esp-' + v.id + '" onchange="checkBoxSalaChanged(this)"';
                        if (v.estado == 1)
                            html += 'checked';
                        html += '           >';
                        html += '           <label class="custom-control-label" for="box_esp-' + v.id + '"></label>';
                        html += '       </div>';
                        html += '    </td>';
                        html += '    <td class="text-wrap align-right">';
                        html += '        <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_box_sala(' + v.id + ',' + v.id_sala_espera + ')"><i class="feather icon-x"></i></button>';
                        html += '        <button type="button" class="btn btn-warning btn-icon" onclick="cargar_modificar_box_sala(' + v.id + ')"><i class="feather icon-edit"></i></button>';
                        html += '    </td>';
                        html += '</tr>';

                        $('#moda_box_sala_espera_table_box tbody').append(html);
                    });
                }
            })
            .fail(function() {
                swal({
                    title: "Error",
                    text: "Error en la conexión al servidor",
                    icon: "error"
                });
            });
    }

    function agregar_box_sala() {
        let valido = 1;
        let mensaje = '';

        var id_sala_espera = $('#moda_box_sala_espera_id_sala_espera').val();
        var id_box = $('#moda_box_sala_espera_id_box').val();


        // validar campos
        if (id_sala_espera == '') {
            valido = 0;
            mensaje += '<li>No se ha identificado la sala de espera</li>';
        }
        if (id_box == '') {
            valido = 0;
            mensaje += '<li>Debe seleccionar un box</li>';
        }

        if (valido == 1) {
            let data = {
                id_sala_espera: id_sala_espera,
                id_box: id_box,
                _token: CSRF_TOKEN,
            };

            let url = "{{ route('box_sala.agregar') }}";

            $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                })
                .done(function(data) {
                    if (data && data.estado == 1) {
                        swal({
                            title: "Box de Sala de Espera",
                            text: "Box asignado correctamente",
                            icon: "success",
                        });

                        limpiar_box_sala();
                        $('#moda_box_sala_espera_id_sala_espera').val(id_sala_espera);
                        cargar_box_sala(id_sala_espera);

                    } else {
                        swal({
                            title: "Error",
                            text: data ? data.msj : "Error al asignar box",
                            icon: "error"
                        });
                    }
                })
                .fail(function() {
                    swal({
                        title: "Error",
                        text: "Error en la conexión al servidor",
                        icon: "error"
                    });
                });
        } else {
            swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error"
            });
        }
    }

    function cargar_modificar_box_sala(id) {
        let data = {
            id: id,
            _token: CSRF_TOKEN,
        };

        let url = "{{ route('box_sala.ver_registro') }}";

        $.ajax({
                url: url,
                type: "get",
                data: data,
            })
            .done(function(data) {
                if (data && data.estado == 1) {
                    $('#moda_box_sala_espera_id').val(data.registros.id);
                    $('#moda_box_sala_espera_id_sala_espera').val(data.registros.id_sala_espera);
                    $('#moda_box_sala_espera_id_box').val(data.registros.id_box);

                    $('.btn_agregar').hide();
                    $('.btn_modificar').show();
                } else {
                    swal({
                        title: "Error",
                        text: "Error al cargar datos del box",
                        icon: "error"
                    });
                }
            })
            .fail(function() {
                swal({
                    title: "Error",
                    text: "Error en la conexión al servidor",
                    icon: "error"
                });
            });
    }

    function modificar_box_sala() {
        let valido = 1;
        let mensaje = '';

        var id = $('#moda_box_sala_espera_id').val();
        var id_sala_espera = $('#moda_box_sala_espera_id_sala_espera').val();
        var id_box = $('#moda_box_sala_espera_id_box').val();

        // validar campos
        if (id_sala_espera == '') {
            valido = 0;
            mensaje += '<li>No se ha identificado la sala de espera</li>';
        }
        if (id_box == '') {
            valido = 0;
            mensaje += '<li>Debe seleccionar un box</li>';
        }

        if (valido == 1) {
            let data = {
                id: id,
                id_sala_espera: id_sala_espera,
                id_box: id_box,
                _token: CSRF_TOKEN,
            };

            let url = "{{ route('box_sala.modificar') }}";

            $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                })
                .done(function(data) {
                    if (data && data.estado == 1) {
                        swal({
                            title: "Box de Sala de Espera",
                            text: "Box modificado correctamente",
                            icon: "success",
                        });

                        limpiar_box_sala();
                        $('#moda_box_sala_espera_id_sala_espera').val(id_sala_espera);
                        cargar_box_sala(id_sala_espera);

                    } else {
                        swal({
                            title: "Error",
                            text: data ? data.msj : "Error al modificar box",
                            icon: "error"
                        });
                    }
                })
                .fail(function() {
                    swal({
                        title: "Error",
                        text: "Error en la conexión al servidor",
                        icon: "error"
                    });
                });
        } else {
            swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error"
            });
        }
    }

    function eliminar_box_sala(id, id_sala) {
        let data = {
            id: id,
            _token: CSRF_TOKEN,
        };

        let url = "{{ route('box_sala.eliminar') }}";

        $.ajax({
                url: url,
                type: "post",
                data: data,
            })
            .done(function(data) {
                if (data && data.estado == 1) {
                    swal({
                        title: "Box de sala de espera",
                        text: "Box eliminado correctamente",
                        icon: "success",
                    });

                    $('#moda_box_sala_espera_id_sala_espera').val(id_sala);
                    cargar_box_sala(id_sala);
                } else {
                    swal({
                        title: "Error",
                        text: "Error al eliminar box de sala de espera",
                        icon: "error"
                    });
                }
            })
            .fail(function() {
                swal({
                    title: "Error",
                    text: "Error en la conexión al servidor",
                    icon: "error"
                });
            });
    }

    function limpiar_box_sala() {
        $('.btn_agregar').show();
        $('.btn_modificar').hide();
        $('#moda_box_sala_espera_id').val('');
        $('#moda_box_sala_espera_id_sala_espera').val('');
        $('#moda_box_sala_espera_id_institucion').val('{{ $institucion->id }}');
        $('#moda_box_sala_espera_id_lugar_atencion').val('{{ $institucion->id_lugar_atencion }}');
        $('#moda_box_sala_espera_id_box').val('');
    }

    function checkBoxSalaChanged(checkbox) {
        const id = checkbox.id.split('-')[1];
        const url = "{{ route('box_sala.estado') }}";

        $.ajax({
                url: url,
                type: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
            })
            .done(function(data) {
                if (!data || data.estado != 1) {
                    checkbox.checked = !checkbox.checked;
                    swal({
                        title: "Error",
                        text: data ? data.msj : 'Error desconocido',
                        icon: "error"
                    });
                }
            })
            .fail(function() {
                checkbox.checked = !checkbox.checked;
                swal({
                    title: "Error",
                    text: "Error en la conexión al servidor",
                    icon: "error"
                });
            });
    }
</script>
