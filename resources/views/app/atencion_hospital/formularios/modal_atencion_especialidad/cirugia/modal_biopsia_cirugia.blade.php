<div id="m_biopsia_cir" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_biopsia_cir" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Solicitud Examen de Biopsia</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="fecha_biopsia" id="fecha_biopsia">
                                </input>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label">Nº de orden</label>
                                <input type="number" type="text" class="form-control form-control-sm" name="numero_orden_biopsia" id="numero_orden_biopsia">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group fill">
                                <label class="label">Frasco uno</label>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label">Zona 1 de toma de muestra</label>
                                <input type="text" name="zona1" id="zona1" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
						<div class="col-sm-2">
                            <div class="form-group fill">
                                <label class="label">Frasco dos</label>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label">Zona 2 de toma de muestra</label>
                                <input type="text" name="zona2" id="zona2" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
						<div class="col-sm-2">
                            <div class="form-group">
                                <label class="label">Frasco tres</label>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label">Zona 3 de toma de muestra</label>
                                <input type="text" name="zona3" id="zona3" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
						<div class="col-sm-2">
                            <div class="form-group fill">
                                <label class="label">Frasco cuatro</label>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label">Zona 4 de toma de muestra</label>
                                <input type="text" name="zona4" id="zona4" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label">Patólogo o Laboratorio</label>
                                <input type="text" name="laboratorio_biopsia" id="laboratorio_biopsia" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label">Observaciones</label>
                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_biopsia_orl" id="obs_biopsia_orl"></textarea>
                            </div>
                        </div>
                        <strong><label class="switch-label ml-2">Examen de Biopsia Rápida</label></strong>
                        <div class="switch switch-success d-inline m-r-10">
                            <input type="checkbox" id="biopsia_check_rapida" name="biopsia_check_rapida" value="">
                            <label for="biopsia_check_rapida" class="cr"></label>
                        </div>

                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right" onclick="guardar_biopsia()">
                            <i class="fa fa-plus"></i> Agregar examen</button>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-xs">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Nº Orden</th>
                                            <th class="text-center align-middle">localización</th>
                                            <th class="text-center align-middle">Zona</th>
                                            <th class="text-center align-middle">Patólogo</th>
                                            <th class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle"><span>03/12/20</span></td>
                                            <td class="text-center align-middle">7217821</td>
                                            <td class="text-center align-middle">PROSTATA</td>
                                            <td class="text-center align-middle">LOBULO MEDIO</td>
                                            <td class="text-center align-middle">DR LOPEZ</td>
                                            <td class="text-center align-middle">
                                            <button class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                            </td>
                                        </tr>
                                        @foreach ($biopsias as $b)
                                            <tr>
                                                <td class="text-center align-middle"><span>{{ $b->fecha }}</span></td>
                                                <td class="text-center align-middle">{{ $b->numero_orden }}</td>
                                                <td class="text-center align-middle">{{ $b->organo_localizacion }}</td>
                                                <td class="text-center align-middle">{{ $b->informacion_adicional }}</td>
                                                <td class="text-center align-middle">{{ $b->nombre_profesional }} {{ $b->apellido_uno }} {{ $b->apellido_dos }}</td>
                                                <td class="text-center align-middle">
                                                    <button class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm"> Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function guardar_biopsia() {
        // Aquí se debe implementar el código para guardar la información de la biopsia
        console.log('Guardando biopsia...');
        let fecha = $('#fecha_biopsia').val();
        let numero = $('#numero_orden_biopsia').val();
        let frasco1 = $('#zona1').val();
        let frasco2 = $('#zona2').val();
        let frasco3 = $('#zona3').val();
        let frasco4 = $('#zona4').val();
        let laboratorio = $('#laboratorio_biopsia').val();
        let observaciones = $('#obs_biopsia_orl').val();
        let id_paciente = dame_id_paciente(); // Esta función debe devolver el ID del profesional logueado
        let id_profesional = $('#id_profesional_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_ficha_atencion = $('#id_fc').val();
        let biopsia_rapida;
        if ($('#biopsia_check_rapida').is(':checked')) {
            biopsia_rapida = 'on';
        } else {
            biopsia_rapida = 'off';
        }

        let valido = 1;
        let mensaje = '';

        if (fecha == '') {
            valido = 0;
            mensaje += 'Debe ingresar la fecha de la biopsia.\n';
        }
        if (numero == '') {
            valido = 0;
            mensaje += 'Debe ingresar el número de orden de la biopsia.\n';
        }
        if (frasco1 == '') {
            valido = 0;
            mensaje += 'Debe seleccionar el frasco 1.\n';
        }
        if (frasco2 == '') {
            valido = 0;
            mensaje += 'Debe seleccionar el frasco 2.\n';
        }
        if (frasco3 == '') {
            valido = 0;
            mensaje += 'Debe seleccionar el frasco 3.\n';
        }
        if (frasco4 == '') {
            valido = 0;
            mensaje += 'Debe seleccionar el frasco 4.\n';
        }
        if (laboratorio == '') {
            valido = 0;
            mensaje += 'Debe ingresar el nombre del laboratorio o patólogo.\n';
        }
        if (valido == 0) {
            swal({
                title: 'Error',
                text: mensaje,
                type: 'error',
                confirmButtonText: 'Aceptar'
            })
            return;
        }

        let url = "{{ ROUTE('dental.registrar_biopsia') }}";

        let data = {
            fecha_biopsia: fecha,
            numero_orden_biopsia: numero,
            frasco1: frasco1,
            frasco2: frasco2,
            frasco3: frasco3,
            frasco4: frasco4,
            laboratorio_patologia: laboratorio,
            obs_biopsia_orl: observaciones,
            biopsia_rapida: biopsia_rapida,
            id_paciente: id_paciente,
            id_profesional: id_profesional,
            id_lugar_atencion: id_lugar_atencion,
            id_ficha_atencion: id_ficha_atencion,
            _token: CSRF_TOKEN
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(response) {
                console.log(response);
                if(response.mensaje == 'OK'){
                    swal({
                        title: 'Exito',
                        text: 'La biopsia ha sido registrada correctamente.',
                        type:'success',
                        confirmButtonText: 'Aceptar'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Error al guardar la biopsia.');
            }
        })
    }

    // Aquí se debe implementar el código para cargar la información de la biopsia en la modal
    // Al cargar la modal, se debe mostrar la información que ya esté almacenada en la base de datos
</script>
