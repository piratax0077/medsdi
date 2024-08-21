<div id="registrar_contratoasistentes" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="registrar_contratoasistentes" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar Contrato Nuevo/a Asistente</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Rut</label>
                                <input type="text" oninput="formatoRut(this)" class="form-control form-control-sm"
                                    name="rut_asistente" id="rut_asistente">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nombre</label>
                                <input class="form-control form-control-sm" name="nombre_asistente"
                                    id="nombre_asistente" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Apellidos</label>
                                <input class="form-control form-control-sm" name="apellido_asistente"
                                    id="apellido_asistente" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Correo Electrónico</label>
                                <input class="form-control form-control-sm" name="email_asistente" id="email_asistente"
                                    type="email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Teléfono</label>
                                <input class="form-control form-control-sm" name="telefono_asistente"
                                    id="telefono_asistente" type="number">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Región</label>
                                <select class="form-control form-control-sm" name="region_asistente"
                                    id="region_asistente" onchange="buscar_ciudad_asistente();">
                                    <option>Seleccione una opción</option>
                                    @foreach ($regiones as $region)
                                        <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Comuna</label>
                                <select class="form-control form-control-sm" name="ciudad_asistente"
                                    name="ciudad_asistente">
                                    <option>Seleccione una opción</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Dirección / Calle</label>
                                <input class="form-control form-control-sm" name="direccion" id="direccion"
                                    type="text">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Número / Dpto.</label>
                                <input class="form-control form-control-sm" name="numero" id="numero"
                                    type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Profesión</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione opción</option>
                                        <option value="AL">Secretaria</option>
                                        <option value="LA">Secretaria Comercial</option>
                                        <option value="VA">Secretaria Asistente Dental</option>
                                        <option value="VA">Personal Administrativo</option>
                                        <option value="VA">Otra</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Función Asignada</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione opción</option>
                                    <option value="AL">Secretaria Recepción</option>
                                    <option value="LA">Secretaria Administración</option>
                                    <option value="LA">Secretaria Caja</option>
                                    <option value="VA">Asistente Dental</option>
                                    <option value="VA">Otra</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm"> Otra Función</label>
                                <input class="form-control form-control-sm" name="ot_func" id="ot_func"
                                    type="text">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <h5>Tipo Contrato</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Horas contratadas</label>
                                <input type="number" class="form-control form-control-sm" name="rut"
                                    id="rut">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Remuneración</label>
                                <input class="form-control form-control-sm" name="nombre" id="nombre"
                                    type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Función</label>
                                <input class="form-control form-control-sm" name="apellido" id="apellido"
                                    type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <h5>Datos Bancarios Para Dep&oacute;sito</h5>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Banco</label>
                                <select name="banco_asistente" id="banco_asistente" class="form-control">
                                    <option value="0">Seleccione</option>
                                    @foreach ($bancos as $banco)
                                        <option value="{{ $banco->id }}">{{ $banco->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">N&deg; Cuenta</label>
                                <input class="form-control form-control-sm" name="n_cta" id="n_cta"
                                    type="number">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Sucursal</label>
                                <input class="form-control form-control-sm" name="sucursal" id="sucursal"
                                    type="text">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Registrar asistente</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function buscar_ciudad_profesional(id_ciudad = 0) {

        let region = $('#region_asistente').val();
        let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    region: region,
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#ciudad_asistente');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="0">seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                    if (id_ciudad != 0)
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
</script>
