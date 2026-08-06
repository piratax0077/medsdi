<div id="indicar_examenes" class="modal fade sdi-modal-examen" tabindex="-1" role="dialog" aria-labelledby="modal_indicar_examen"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"  data-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" role="document">
        <div class="modal-content">
            <div class="modal-header py-3">
                <h5 class="modal-title" id="modal_indicar_examen"> <i class="icono-agenda feather icon-activity"></i>Indicar Examen</h5>
                <button type="button" class="close " aria-label="Close"  onclick="cerrarModalExamenesFicha();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="sdi-examen-form">
                    <div class="form-row">
                        <div class="col-sm-12">
                            <div class="sdi-campo">
                                <label class="floating-label-activo-sm">Tipo de Examen</label>
                                <select class="form-control form-control-sm" name="tipo_examen_d" id="tipo_examen_d">
                                    <option value="0">Seleccione</option>
                                    @foreach ($examenMedico as $exa)
                                        <option value="{{ $exa->cod_examen }}">
                                            {{ $exa->nombre_examen }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="sdi-campo">
                                <label class="floating-label-activo-sm">Sub-tipo de Examen</label>
                                <select class="form-control form-control-sm" name="sub_tipo_examen_d" id="sub_tipo_examen_d">
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="sdi-campo">
                                <label class="floating-label-activo-sm">Examen</label>
                                <select class="form-control form-control-sm" name="examen_d" id="examen_d">
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="sdi-campo">
                                <label class="floating-label-activo-sm">Lado</label>
                                <select class="form-control form-control-sm" id="lado_d" name="lado_d">
                                    <option value="0" selected>No corresponde</option>
                                    <option value="Derecho">Derecho</option>
                                    <option value="Izquierdo">Izquierdo</option>
                                    <option value="Bilateral">Bilateral</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="sdi-campo">
                                <label class="floating-label-activo-sm">Prioridad</label>
                                <select class="form-control form-control-sm" id="prioridad_d" name="prioridad_d">
                                    {{--  <option value="0">Seleccione</option>  --}}
                                    <option value="1">Baja</option>
                                    <option value="2" selected>Media</option>
                                    <option value="3">Alta</option>
                                    <option value="4">Urgente</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="sdi-examen-contraste">
                        <div class="sdi-examen-contraste-texto">
                            <strong>Con Contraste</strong>
                            <small>Solo disponible en exámenes de imagenología</small>
                        </div>
                        <div class="switch switch-success d-inline m-r-10">
                            <input type="checkbox" id="imagenologia_con_contraste_d" disabled='disabled' >
                            <label for="imagenologia_con_contraste_d" class="cr"></label>
                        </div>
                    </div>
                    <div class="alert alert-primary mt-2" id="mensaje_imagenologia_con_contraste_d" style="display:none;">Acaba de seleccionar Imagen con Constraste, El examen de Creatinina fue adjuntado correctamente.</div>
                   
                    <div class="sdi-examen-agregar mb-4">
                        <button type="button" onclick="indicar_examen_cirugia_d();" id="agregar_examen_tabla" class="btn btn-success">
                            <i class="fa fa-plus"></i> Agregar Examen
                        </button>
                    </div>


                    <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                    <!--Tabla-->
                    <div class="tabla-sdi-responsive">
                        <table id="tabla_examen_cirugia_d" class="table table-bordered tabla-sdi-sm  tabla_examenes_ficha">
                            <thead>
                                <tr>
                                    <!-- <th class="text-center align-middle" style="display:none">ID Examen</th> -->
                                    <th>Fecha y Hora</th>
                                    <th>Nombre Examen</th>
                                    <th>Lado</th>
                                    <th>Tipo</th>
                                    {{--  <th>Sub-Tipo</th>  --}}
                                    <th>Prioridad</th>
                                    <th>Con Contraste</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($examenes_solicitados))
                                    @foreach($examenes_solicitados as $examen)
                                        <tr>
                                            <!-- <td class="text-center align-middle" style="display:none">{{ $examen->id }}</td> -->
                                            <td>{{ $examen->fecha }} {{ $examen->hora }} <br> {{ $examen->responsable }}</td>
                                            <td>{{ $examen->datos_examen->examen }}</td>
                                            <td>{{ $examen->datos_examen->lado }}</td>
                                            <td>{{ $examen->datos_examen->tipo_examen }}</td>
                                            <td>{{ $examen->datos_examen->prioridad }}</td>
                                            <td>{{ $examen->datos_examen->imagenologia_con_contraste ? $examen->datos_examen->imagenologia_con_contraste : 'N/C' }}</td>
                                            <td>
                                                <div class="btn btn-danger btn_remove btn-icon" onclick="eliminar_examen_cirugia_d({{ $examen->id }});"><i class="fas fa-trash"></i></div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!--Cierre Tabla-->

                </div>
            </div>
            <div class="modal-footer p-2">
                {{--  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>  --}}
                {{--  <button type="button" data-dismiss="modal" class="btn btn-info">Guardar</button>  --}}
                {{--  <button type="button" onclick="alerta_registro_examen();" data-dismiss="modal" class="btn btn-info">Generar Orden de Examen</button>  --}}
                <button type="button" onclick="registro_examen_ficha();" data-dismiss="modal" class="btn btn-info">
                    <i class="feather icon-file-text"></i> Generar Orden de Examen
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    /** DISEÑO MODAL INDICAR EXAMEN  **/
    #indicar_examenes .modal-content {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 24px 60px rgba(30, 40, 80, .22);
    }



    /* Cuerpo */
    #indicar_examenes .modal-body {
        padding: 22px;
    }
    #indicar_examenes .sdi-campo {
        margin-bottom: 19px;
    }
   
    

    /* Con contraste */
    #indicar_examenes .sdi-examen-contraste {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-top: 4px;
        padding: 12px 16px;
        background-color: #fff;
        border: 1px solid #e6eaf1;
        border-radius: 12px;
    }
    #indicar_examenes .sdi-examen-contraste-texto {
        display: flex;
        flex-direction: column;
        line-height: 1.3;
    }
    #indicar_examenes .sdi-examen-contraste-texto strong {
        color: #2b2f3a;
        font-size: .9rem;
    }
    #indicar_examenes .sdi-examen-contraste-texto small {
        color: #8b93a7;
        font-size: .74rem;
    }
    #indicar_examenes .sdi-examen-aviso {
        margin-top: 10px;
        padding: 10px 14px;
        border-radius: 10px;
        font-size: .82rem;
    }

    /* Boton agregar */
    #indicar_examenes .sdi-examen-agregar {
        display: flex;
        justify-content: flex-end;
        margin-top: 16px;
    }
  
   

 
 
 
    @media (max-width: 575.98px) {
        #indicar_examenes .modal-body { padding: 16px; }
        #indicar_examenes .sdi-examen-contraste { flex-wrap: wrap; }
        #indicar_examenes .sdi-examen-generar { width: 100%; }
    }
</style>

<script>
    function indicar_examen_cirugia_d() {

        var tipo_examen = $("#tipo_examen_d option:selected").text();
        var id_tipo_examen = $("#tipo_examen_d").val();
        var sub_tipo_examen = $("#sub_tipo_examen_d option:selected").text();
        var id_sub_tipo_examen = $("#sub_tipo_examen_d").val();
        var examen = $("#examen_d option:selected").text();
        var id_examen = $("#examen_d").val();
        var prioridad = $("#prioridad_d option:selected").text();
        var lado = $("#lado_d option:selected").text();
        var id_paciente = $('#id_paciente').val();
        var id_ficha_atencion = $('#id_fc').val();

        var imagenologia_con_contraste_d = 'N/C';
        if($('#imagenologia_con_contraste_d').is(':checked'))
            imagenologia_con_contraste_d = 'Con Contraste';

        var valido = 0;
        var mensaje = '';

        if ($.trim(tipo_examen) == '' || $.trim(tipo_examen) == 'Seleccione...' || $.trim(tipo_examen) == 'Seleccione') {
            valido = 1;
            mensaje += ' Debe seleccionar Tipo Examen\n';
        }
        if( $.trim(sub_tipo_examen) == '' || $.trim(sub_tipo_examen) == 'Seleccione...' || $.trim(sub_tipo_examen) == 'Seleccione' ){
            valido = 1;
            mensaje += ' Debe seleccionar Sub Tipo Examen\n';
        }
        if ($.trim(examen) == '' || $.trim(examen) == 'Seleccione...' || $.trim(examen) == 'Seleccione') {
            valido = 1;
            mensaje += ' Debe seleccionar Examen\n';
        }
        if ($.trim(prioridad) == '' || $.trim(prioridad) == 'Seleccione...' || $.trim(prioridad) == 'Seleccione') {
            valido = 1;
            mensaje += ' Debe seleccionar Prioridad\n';
        }


        if (valido == 0) {
            let data = {
                tipo_examen: tipo_examen,
                id_tipo_examen: id_tipo_examen,
                sub_tipo_examen: sub_tipo_examen,
                id_sub_tipo_examen: id_sub_tipo_examen,
                examen: examen,
                id_examen: id_examen,
                prioridad: prioridad,
                lado: lado,
                id_paciente: id_paciente,
                id_ficha_atencion: id_ficha_atencion,
                imagenologia_con_contraste_d: imagenologia_con_contraste_d,
                _token: "{{ csrf_token() }}"
            }

            var url = "{{ route('examen.indicar_examen_cirugia') }}";
            $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                    dataType: "json",
                })
                .done(function(data) {
                    console.log(data);
                    if (data.estado == 'success') {
                        let examenes = data.examenes;
                        // Obtén la instancia de DataTables
                        var table = $('#tabla_examen_cirugia_d').DataTable();

                        // Limpia los datos de la tabla
                        table.clear();

                        // Agrega las nuevas filas
                        examenes.forEach(function(resp) {
                            let examen = resp.datos_examen;
                            table.row.add([
                                `${resp.fecha} ${resp.hora} <br> ${resp.responsable}`,
                                examen.examen,
                                examen.lado,
                                examen.tipo_examen,
                                examen.prioridad,
                                examen.imagenologia_con_contraste_d ? examen.imagenologia_con_contraste_d : 'N/C',
                                `<div class="btn btn-danger btn_remove btn-icon" onclick="eliminar_examen_cirugia_d(${resp.id});"><i class="fas fa-trash"></i></div>`
                            ]).draw(false); // Redibuja la tabla sin reiniciar la paginación
                        });
                    } else {
                        swal({
                            title: "Ingreso de examen(es).",
                            text: data.mensaje,
                            icon: "error",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }else{
            swal({
                title: "Ingreso de examen(es).",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                //SuccessMode: true,
            });
        }

        // $('.examenes_sin_registros').remove();


        // if ($('#imagenologia_con_contraste_d').prop('checked')) {
        //     $('#tabla_examen_cirugia tr').each(function(key, value) {
        //         $(value).find('td').each(function(key_td, value_td) {
        //             if (key_td == 0) {
        //                 if ($(value_td).text() == 'CREATININA EN SANGRE') {
        //                     creatinina = 1;
        //                 }
        //             }
        //         });
        //     });
        //     if (creatinina == 0) {
        //         fila = '';
        //         fila += '<tr class="tr_examen_cirugia" id="row' + i + '">';
        //         fila += '<td class="text-center align-middle text-wrap">CREATININA EN SANGRE</td>';
        //         fila += '<td class="text-center align-middle text-wrap">SANGRE</td>';
        //         //fila =     '<td>' + sub_tipo_examen + '</td>';
        //         fila += '<td class="text-center align-middle text-wrap">Media</td>';
        //         fila += '<td class="text-center align-middle text-wrap">N/C</td>';
        //         fila += '<td class="text-center align-middle"><div name="remove" id="' + i +
        //             '" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_examen_contraste(\'row' + i +
        //             '\');"><i class="fas fa-trash"></i></div></td>';
        //         fila += '</tr>';
        //         $('#tabla_examen_cirugia tr:first').after(fila);
        //         i++;
        //         creatinina = 1;
        //     }
        // }




        $("#tipo_examen_d").val('');
        $("#sub_tipo_examen_d").val('');
        $("#examen_d").val('');
        $("#prioridad_d").val(2);
        $('#imagenologia_con_contraste_d').prop('checked', false);
        $('#mensaje_imagenologia_con_contraste_d').hide();
        $("#lado_d").val(0);
    }

    function eliminar_examen_cirugia_d(id){
        swal({
            title: "Eliminar Examen.",
            text: 'Al "Aceptar" Elimina el examen.\n',
            icon: "warning",
            buttons: ["Cancelar", 'Aceptar'],
        }).then((result) => {
            if (result == true) {
                eliminar_examen_cirugia_ajax_d(id);
            } else {
                console.log('regresar');
            }
        })


    }

    function eliminar_examen_cirugia_ajax_d(id){
        var url = "{{ route('examen.eliminar_examen_cirugia') }}";
        var id_paciente = $('#id_paciente').val();
        var id_ficha_atencion = $('#id_fc').val();
        $.ajax({
                url: url,
                type: "post",
                data: {
                    id: id,
                    id_paciente: id_paciente,
                    id_ficha_atencion: id_ficha_atencion,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 'success') {
                    let examenes = data.examenes;
                    var table = $('#tabla_examen_cirugia_d').DataTable();


                    // Limpia los datos de la tabla
                    table.clear().draw();
                    console.log(examenes.length);
                    // Agrega las nuevas filas
                    examenes.forEach(function(resp) {
                        let examen = resp.datos_examen;
                        table.row.add([
                            `${resp.fecha} ${resp.hora} <br> ${resp.responsable}`,
                            examen.examen,
                            examen.lado,
                            examen.tipo_examen,
                            examen.prioridad,
                            examen.imagenologia_con_contraste_d ? examen.imagenologia_con_contraste_d : 'N/C',
                            `<div class="btn btn-danger btn_remove btn-icon btn_sm" onclick="eliminar_examen_cirugia_d(${resp.id});"><i class="fas fa-trash"></i></div>`
                        ]).draw(false); // Redibuja la tabla sin reiniciar la paginación
                    });
                    swal({
                        title: "Ingreso de examen(es).",
                        text: data.mensaje,
                        icon: "success",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                } else {
                    swal({
                        title: "Ingreso de examen(es).",
                        text: data.mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }
</script>
