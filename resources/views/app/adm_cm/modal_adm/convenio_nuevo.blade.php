<!--datos convenio-->
<div id="nuevoConvenioInstitucion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="nuevoConvenioInstitucion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Convenio Usuario</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Nombre Convenio</label>
                            <input type="text" class="form-control" id="nombre_convenio" name="nombre_convenio">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Tipo Convenio</label>
                            <select name="tipo_convenio" id="tipo_convenio" class="form-control">
                                <option value="0">Seleccione</option>
                                @foreach($tipos_convenio as $key_tc => $value_tc)
                                    <option value="{{ $value_tc->id }}">{{ $value_tc->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Porcentaje</label>
                            <input type="text" class="form-control" name="porcentaje_dcto" id="porcentaje_dcto">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Tipo Convenio Inst</label>
                            <select name="tipo_convenio_institucion" id="tipo_convenio_institucion" class="form-control">
                                <option value="0">Seleccione</option>
                                @foreach($tipos_convenio_institucion as $key_tc => $value_tc)
                                    <option value="{{ $value_tc->id }}">{{ $value_tc->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Fecha Inicial</label>
                            <input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" id="fecha_inicial_pago_convenio" name="fecha_inicial_pago_convenio">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Fecha Final</label>
                            <input type="date" class="form-control" value="" id="fecha_final_pago_convenio" name="fecha_final_pago_convenio">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group ">
                            <label class="floating-label-activo-sm" for="productos_convenio_">Productos a Convenir</label>
                            <select class="form-control form-control-sm" name="productos_convenio_" id="productos_convenio_" multiple="multiple">
                                @foreach($tipoproducto_convenios as $tp)
                                    <option value="{{ $tp->id }}">{{ $tp->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Rut representante</label>
                            <input type="text" class="form-control" oninput="formatoRut(this)" id="rut_representante_convenio" name="rut_representante_convenio">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Nombre representante</label>
                            <input type="text" class="form-control" id="nombre_representante_convenio" name="nombre_representante_convenio">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Telefono</label>
                            <input type="text" class="form-control" id="telefono_representante_convenio" name="telefono_representante_convenio">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Email</label>
                            <input type="text" class="form-control" id="email_representante_convenio" name="email_representante_convenio">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Direccion</label>
                            <input type="text" class="form-control" id="direccion_representante_convenio" name="direccion_representante_convenio">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Observaciones</label>
                            <textarea name="observaciones_nuevo_convenio" id="observaciones_nuevo_convenio" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <button class="btn btn-outline-success btn-sm float-right" onclick="guardar_nuevo_convenio_institucion()"><i class="fas fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
function guardar_nuevo_convenio_institucion(){
        console.log('Guardar nuevo convenio especial');

        var nombre_convenio = $('#nombre_convenio_especiales').val();
        var tipo_convenio = $('#tipo_convenio_especiales').val();
        var porcentaje_dcto = $('#porcentaje_dcto_especiales').val();
        var tipo_convenio_institucion = $('#tipo_convenio_institucion_especiales').val();
        var fecha_inicial_pago_convenio = $('#fecha_inicial_pago_convenio_especiales').val();
        var fecha_final_pago_convenio = $('#fecha_final_pago_convenio_especiales').val();
        var productos_convenio = $('#productos_convenio_especiales').val();
        var observaciones_nuevo_convenio = $('#observaciones_nuevo_convenio_especiales').val();
        var id_lugar_atencion = "{{ $institucion->id_lugar_atencion }}"; // No se usa en especiales pero se envía para compatibilidad
        var id_empresa = $('#id_empresa').val() || 0;

        var valido = 1;
        var mensaje = '';

        if(nombre_convenio == ''){
            valido = 0;
            mensaje += '<li>Ingrese nombre de convenio</li>';
        }
        if(tipo_convenio == 0){
            valido = 0;
            mensaje += '<li>Seleccione tipo de convenio</li>';
        }
        if(porcentaje_dcto == ''){
            valido = 0;
            mensaje += '<li>Ingrese porcentaje de descuento</li>';
        }
        if(tipo_convenio_institucion == 0){
            valido = 0;
            mensaje += '<li>Seleccione tipo de convenio institución</li>';
        }
        if(fecha_inicial_pago_convenio == ''){
            valido = 0;
            mensaje += '<li>Seleccione fecha inicial</li>';
        }
        if(fecha_final_pago_convenio == ''){
            valido = 0;
            mensaje += '<li>Seleccione fecha final</li>';
        }
        if(productos_convenio == null){
            valido = 0;
            mensaje += '<li>Seleccione productos a convenir</li>';
        }

        if(valido == 0){
            swal({
                title: 'Error',
                content: {
                    element: 'div',
                    attributes: {
                        innerHTML: mensaje
                    }
                },
                icon: 'error'
            });
            return false;
        }

        // Preparar datos en el mismo formato que guardar_tipo_convenio_ffa
        var data = {
            nombre_convenio: nombre_convenio,
            tipo_convenio: tipo_convenio,
            id_lugar_atencion: id_lugar_atencion,
            porcentaje: porcentaje_dcto,
            fecha_inicio: fecha_inicial_pago_convenio,
            fecha_termino: fecha_final_pago_convenio,
            observaciones: observaciones_nuevo_convenio,
            convenios: 'Especial', // Identificador para convenios especiales
            conveniosSeleccionados: [],
            id_empresa: id_empresa,
            productos_convenio: productos_convenio,
            tipo_convenio_institucion: tipo_convenio_institucion,
            _token: "{{ csrf_token() }}"
        };

        console.log(data);

        $.ajax({
            url: "{{ ROUTE('profesional.guardar_tipo_convenio') }}",
            type: 'POST',
            data: data,
            success: function(response){
                console.log(response);
                if(response.estado == 1){
                    swal({
                        title: 'Convenio registrado',
                        text: response.mensaje,
                        icon: 'success'
                    });
                    $('#nuevoConvenioInstitucion').modal('hide');
                    location.reload();
                }else{
                    swal({
                        title: 'Error',
                        text: response.mensaje || 'Error al registrar convenio',
                        icon: 'error'
                    });
                }
            },
            error: function(xhr, status, error){
                console.error('Error:', error);
                swal({
                    title: 'Error',
                    text: 'Error al procesar la solicitud',
                    icon: 'error'
                });
            }
        });
    }

</script>
