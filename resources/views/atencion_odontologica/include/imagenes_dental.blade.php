<div class="row mb-1">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card-informacion">
            <div class="card-body">
                <div class="form-row">
                     <div class="col-sm-4">
                         <div class="card-informacion p-2">
                            <div class="text-center" id="img">
                                <h6 class="sub-aten">Imagenes Pre</h6>
                                <div class="dropzone" id="mis-imagenes-dentales" action="{{ route('profesional.imagen.carga') }}"></div>
                            </div>
                            <div class="form-group fill mt-3">
                                <label for="" class="floating-label-activo-sm">Identificación de imagen</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_result_biopsia4" id="obs_result_biopsia4"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card-informacion p-2">
                            <div class="text-center" id="img">
                                <h6 class="sub-aten">Imagenes Post</h6>
                                <div class="dropzone" id="mis-imagenes-dentales-post" action="{{ route('profesional.imagen.carga') }}"></div>
                            </div>
                            <div>
                                <div class="form-group fill mt-3">
                                    <label for="" class="floating-label-activo-sm">Identificación de imagen</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_result_biopsia4" id="obs_result_biopsia4"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mt-2">
                        <div class="form-group fill">
                            <input type="hidden" name="biopsia_odont{{ $counter }}" id="biopsia_odont{{ $counter }}" value="">

                            <div class="form-group fill">
                                <label id="" name="" class="floating-label-activo-sm">Observaciones/Comentarios</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_result_biopsia{{ $counter }}" id="obs_result_biopsia{{ $counter }}"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="form-row">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-icon btn-primary-light-c" onclick="guardar_pieza_imagenes_rx({{ $counter }})" ><i class="feather icon-save"></i></button>
                        <button type="button" class="btn btn-icon btn-danger-light-c" onclick="ocultar_pieza_imagenes_rx()"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    if (typeof dropzone === 'undefined') {
        var dropzone;
    }
    if(typeof dropzone_post == 'undefined'){
        var dropzone_post;
    }

    $(document).ready(function(){
        // Configuración de Dropzone
        init_dropzone_imagenes();
    });

    function init_dropzone_imagenes()
    {
        // Inicializa Dropzone sobre el nuevo elemento
        dropzone = new Dropzone("#mis-imagenes-dentales", {
            url: "{{ ROUTE('profesional.imagenes.guardar_dental')  }}",
            method: 'post',
            autoProcessQueue: false, // Desactiva el procesamiento automático
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            paramName: "file[]",
            acceptedFiles: "image/*",
            maxFilesize: 4, // Tamaño máximo en MB
            maxFiles: 12,
            addRemoveLinks: true,
            dictDefaultMessage: "Arrastra una imagen aquí o haz clic para subirla.",
            dictRemoveFile: "Eliminar archivo",
            success: function (file, response) {
                console.log("Imagen subida con éxito:", response);
            },
            error: function (file, message) {
                console.error("Error al subir imagen:", message);
            },
            sending: function (file, xhr, formData) {
                // Verifica si formData es válido antes de agregar los datos
                if (formData) {
                    const idExamenRx = document.querySelector('#id_imagenes_dental').value;
                    const detalle = "Pre";
                    formData.append("id_examen", idExamenRx);
                    formData.append("detalle", detalle);

                    console.log("Datos adicionales enviados:", {
                        id_examen: idExamenRx,
                        detalle: detalle
                    });
                } else {
                    console.error("formData no está disponible");
                }
            },
            init: function () {
                console.log("Dropzone configurado para procesar la cola manualmente.");
            }
        });

        dropzone_post = new Dropzone("#mis-imagenes-dentales-post", {
            url: "{{ ROUTE('profesional.imagenes.guardar_dental')  }}",
            method: 'post',
            autoProcessQueue: false, // Desactiva el procesamiento automático
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            paramName: "file[]",
            acceptedFiles: "image/*",
            maxFilesize: 4, // Tamaño máximo en MB
            maxFiles: 12,
            addRemoveLinks: true,
            dictDefaultMessage: "Arrastra una imagen aquí o haz clic para subirla.",
            dictRemoveFile: "Eliminar archivo",
            success: function (file, response) {
                console.log("Imagen subida con éxito:", response);
            },
            error: function (file, message) {
                console.error("Error al subir imagen:", message);
            },
            sending: function (file, xhr, formData) {
                // Verifica si formData es válido antes de agregar los datos
                if (formData) {
                    const idExamenRx = document.querySelector('#id_imagenes_dental').value;
                    const detalle = "Post";
                    formData.append("id_examen", idExamenRx);
                    formData.append("detalle", detalle);

                    console.log("Datos adicionales enviados:", {
                        id_examen: idExamenRx,
                        detalle: detalle
                    });
                } else {
                    console.error("formData no está disponible");
                }
            },
            init: function () {
                console.log("Dropzone inicializado dinámicamente");
            }
        });
    }


    function guardar_pieza_imagenes_rx(counter){
        let biopsia = $('#biopsia_check_odont'+counter).is(':checked');
        let zona_motivo = $('#od_biop_zona'+counter).val();
        let observaciones = $('#obs_result_biopsia'+counter).val();
        let id_paciente = dame_id_paciente();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_profesional = $('#id_profesional').val();
        let id_especialidad = $('#id_especialidad').val();
        let id_ficha_atencion = $('#id_fc').val();
        let seccion = 'gral';

        let data = {
            _token: CSRF_TOKEN,
            biopsia: biopsia,
            zona_motivo: zona_motivo,
            observaciones:observaciones,
            id_paciente: id_paciente,
            id_lugar_atencion: id_lugar_atencion,
            id_profesional: id_profesional,
            id_especialidad: id_especialidad,
            id_ficha_atencion: id_ficha_atencion,
            seccion: seccion
        }

        let url = "{{ ROUTE('profesional.guardar_imagenes_dental_paciente') }}";

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'OK'){
                    $('#contenedor_imagenes_dent').empty();
                    $('#contenedor_imagenes_dent').append(resp.v);
                    $('#contenedor_nueva_imagen_dent').empty();
                    $('#id_imagenes_dental').val(resp.rx.id);

                    // Una vez que el envío de datos ha sido exitoso, procesamos la cola de imágenes
                    if (dropzone.getQueuedFiles().length > 0) {
                        console.log("Iniciando carga de imágenes...");
                        // Desvinculamos el evento "queuecomplete" antes de procesar la cola
                        dropzone.off("queuecomplete");

                        // Procesar la cola de imágenes
                        dropzone.processQueue();  // Esto procesará la cola y subirá las imágenes

                        // Usamos un evento para esperar a que se complete la carga de imágenes
                        dropzone.on("queuecomplete", function() {
                            // Una vez que la cola esté completa, podemos realizar más acciones si es necesario
                            console.log("Carga de imágenes completada.");
                        });
                    } else {
                        console.log("No hay imágenes para cargar.");
                        alert("No has seleccionado imágenes para subir.");

                        // Si el Dropzone no está funcionando correctamente, puedes destruirlo y volver a inicializarlo
                        if (dropzone) {
                            // Destruir la instancia actual de Dropzone
                            dropzone.destroy();
                        }
                    }
                    // Una vez que el envío de datos ha sido exitoso, procesamos la cola de imágenes
                    if (dropzone_post.getQueuedFiles().length > 0) {
                        console.log("Iniciando carga de imágenes...");
                        // Desvinculamos el evento "queuecomplete" antes de procesar la cola
                        dropzone_post.off("queuecomplete");

                        // Procesar la cola de imágenes
                        dropzone_post.processQueue();  // Esto procesará la cola y subirá las imágenes

                        // Usamos un evento para esperar a que se complete la carga de imágenes
                        dropzone_post.on("queuecomplete", function() {
                            // Una vez que la cola esté completa, podemos realizar más acciones si es necesario
                            console.log("Carga de imágenes completada.");
                        });
                    } else {
                        console.log("No hay imágenes para cargar.");
                        alert("No has seleccionado imágenes para subir.");

                        // Si el Dropzone no está funcionando correctamente, puedes destruirlo y volver a inicializarlo
                        if (dropzone_post) {
                            // Destruir la instancia actual de Dropzone
                            dropzone_post.destroy();
                        }
                    }

                    // Re-inicializar el Dropzone nuevamente
                    //init_dropzone_imagenes();  // Asegúrate de que la función initDropzone esté disponible
                }
            },
            error: function(error){
                console.log(error);
            }
        })


    }

    function biopsia(alias_examen, counter)
    {

        console.log(alias_examen);
        if($('#biopsia_check_'+alias_examen+''+counter).prop('checked'))
        {
            $('#m_biopsia_cir').modal('show');
            $('#biopsia_'+alias_examen+''+counter).val(1);
        }
        else
        {
            $('#biopsia_'+alias_examen+''+counter).val(0);
            $('#m_biopsia_cir').modal('hide');
        }
    }
</script>
