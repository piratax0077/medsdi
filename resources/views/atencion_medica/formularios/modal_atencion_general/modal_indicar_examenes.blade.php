<div id="indicar_examenes" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_indicar_examen"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Indicar Examen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#indicar_examenes').modal('hide')"><span
                        aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-row">
                    <div class="col-sm-12 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label">Tipo Examen</label>

                            <select class="form-control form-control-sm" name="tipo_examen" id="tipo_examen">
                                <option value="0">Seleccione</option>


                                @foreach ($examenMedico as $exa)
                                    <option value="{{ $exa->cod_examen }}">
                                        {{ $exa->nombre_examen }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Sub-tipo de Examen</label>

                            <select class="form-control form-control-sm" name="sub_tipo_examen" id="sub_tipo_examen">
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Examen</label>
                            <select class="form-control form-control-sm" name="examen" id="examen">
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label">Prioridad</label>
                            <select class="form-control form-control-sm" id="prioridad" name="prioridad">
                                <option value="0">Seleccione</option>
                                <option value="1">Baja</option>
                                <option value="2">Media</option>
                                <option value="3">Alta</option>
                                <option value="4">Urgente</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="button" onclick="indicar_examen_ficha();" id="agregar_examen_tabla"
                            class="btn btn-success btn-sm float-right">
                            <i lass="fa fa-plus"></i>
                            Agregar Examen
                        </button>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                        <!--Tabla-->
                        <div class="table-responsive">
                            <p>Elementos en la Tabla:
                            <div id="adicionados"></div>
                            </p>
                            <table id="tabla_examen_ficha" class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Nombre
                                            Examen</th>
                                        <th class="text-center align-middle">Tipo</th>
                                        <th class="text-center align-middle">Sub-Tipo</th>

                                        <th class="text-center align-middle">Prioridad
                                        </th>
                                        <th class="text-center align-middle">Acción
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <!--Cierre Tabla-->
                    </div>
                </div>
                <button type="button" onclick="registro_examen_ficha();" data-dismiss="modal" class="btn btn-info">Generar Orden de Examen</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="$('#indicar_examenes').modal('hide')">Cancelar</button>
                <button type="button" data-dismiss="modal" class="btn btn-info" onclick="$('#indicar_examenes').modal('hide')">Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function() {
        dame_examenes();
    });

    function indicar_examen_ficha() {
        var id_tipo_examen = $("#tipo_examen").val();
        var tipo_examen = $("#tipo_examen option:selected").text();
        var id_sub_tipo_examen = $("#sub_tipo_examen").val();
        var sub_tipo_examen = $("#sub_tipo_examen option:selected").text();
        var id_examen = $('#examen').val();
        var examen = $("#examen option:selected").text();
        var id_prioridad = $("#prioridad").val();
        var prioridad = $("#prioridad option:selected").text();

        var valido = 1;
        var mensaje = '';

        if(id_tipo_examen == 0){
            valido = 0;
            mensaje += '<li>Tipo examen</li>';
        }

        if(id_sub_tipo_examen == 0){
            valido = 0;
            mensaje += '<li>Sub tipo examen</li>';
        }

            if(examen == 0){
            valido = 0;
            mensaje += '<li>Examen</li>';
        }

        if(id_prioridad == 0){
            valido = 0;
            mensaje += '<li>Prioridad</li>';
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

        var data = {
            tipo_examen: tipo_examen,
            sub_tipo_examen: sub_tipo_examen,
            examen: examen,
            prioridad: prioridad,
            id_paciente: $('#id_paciente_fc').val(),
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            _token: CSRF_TOKEN
        }

        var url = "{{ ROUTE('examen.indicar_examen_hosp') }}";

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                swal({
                    icon:'success',
                    title:'Exito',
                    text:'Se ha indicado examen correctamente',
                });
                let examenes = resp.examenes;
                let table = $('#tabla_examen_ficha').DataTable();
                // Limpiar la tabla
                table.clear();

                // Agregar cada fila
                examenes.forEach(examen => {
                    table.row.add([
                        examen.datos_examen.examen,
                        examen.datos_examen.tipo_examen,
                        examen.datos_examen.sub_tipo_examen,
                        examen.datos_examen.prioridad,
                        `<button type="button" onclick="eliminar_examen(${examen.id})" class="btn btn-danger btn-icon"><i class="feather icon-x"></i></button>`
                    ]);
                });

                // Dibujar la tabla con los nuevos datos
                table.draw();
            },
            error: function(error){
                console.log(error.responseText);
            }
        });
    }

    function dame_examenes(){
        let id_ficha_atencion = $('#id_fc').val();
        let url = "{{ ROUTE('examen.dame_examenes_hosp') }}";

        $.ajax({
            type:'get',
            url: url,
            data:{
                id_ficha_atencion: id_ficha_atencion,
                id_paciente: $('#id_paciente').val(),
            },
            success: function(examenes){
                console.log(examenes);
                    let table = $('#tabla_examen_ficha').DataTable();
            // Limpiar la tabla
            table.clear();

            // Agregar cada fila
            examenes.forEach(examen => {
                table.row.add([
                    examen.datos_examen.examen,
                    examen.datos_examen.tipo_examen,
                    examen.datos_examen.sub_tipo_examen,
                    examen.datos_examen.prioridad,
                    `<button type="button" onclick="eliminar_examen_ind(${examen.id})" class="btn btn-danger btn-icon"><i class="feather icon-x"></i></button>`
                ]);
            });

            // Dibujar la tabla con los nuevos datos
            table.draw();
            },
            error: function(error){
                console.log(error.responseText);
            }
        });
    }

    function eliminar_examen_ind(id_examen){
                swal({
                    title: "Eliminar Examen",
                    text: "¿Está seguro que desea eliminar el examen?",
                    icon: "warning",
                    buttons: ["Cancelar", "Aceptar"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        eliminar_examen_confirmar(id_examen);
                    }
                });
        }

        function eliminar_examen_confirmar(id_examen){
            console.log(id_examen);
            let url ="{{ ROUTE('examen.eliminar_examen_hosp') }}"
            $.ajax({
                type:'get',
                url: url,
                data:{
                    id: id_examen
                },
                success: function(resp){
                    console.log(resp);
                    if(resp.estado == 1){
                        swal({
                            icon:'success',
                            text: resp.mensaje,
                        });
                        dame_examenes();
                    }
                },
                error: function(error){
                    console.log(error.responseText);
                }
            });
        }

</script>
