<div class="form-row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4">
            <h6 class="t-aten d-inline"> Estudio Radiológico</h6>
            <button type="button" class="btn btn-info btn-sm  d-inline float-md-right mt-n2 mb-2"><i class="fas fa-plus"></i> Cargar nueva imagen</button>
        </div>
    <div class="col-sm-8 mt-2">
        <div class="card-informacion" id="img">
            <div class="card-body">
            <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h6 class="sub-aten">Imagen</h6>
                    </div>
                </div>
                <div class="form-row" id="contenedor_piezas_ex_oral">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
                        <div id="img">
               
                        </div>
                        <div class="aten-a">
                            <div class="dropzone" id="mis-imagenes-dentales-preimplante" action="{{ route('profesional.imagen.carga') }}"></div>
                        </div>
                    </div>
                    @if($opt == 'preimplante')
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                        <div class="form-group">
                            <label for="numero_pieza_ex_impl{{ $count }}" class="floating-label-activo-sm">N° Pieza</label>
                            <input type="text" class="form-control form-control-sm" id="numero_pieza_ex_impl{{ $count }}">
                        </div>
                        <div class="form-group">
                            <label for="observaciones_ex_impl" class="floating-label-activo-sm">Observaciones</label>
                            <textarea class="form-control caja-texto form-control-sm" id="observaciones_ex_impl{{ $count }}" name="observaciones_ex_impl{{ $count }}" onfocus="this.rows=4" onblur="this.rows=1;"></textarea>
                        </div>
                    </div>
                    @else
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                        <div class="form-group">
                            <label for="numero_pieza_ex_period" class="floating-label-activo-sm">N° Pieza</label>
                            <input type="text" class="form-control form-control-sm" id="numero_pieza_ex_period{{ $count }}">
                        </div>
                        <div class="form-group">
                            <label for="observaciones_ex_period" class="floating-label-activo-sm">Observaciones</label>
                            <textarea class="form-control caja-texto form-control-sm" name="observaciones_ex_period{{ $count }}" onfocus="this.rows=4" onblur="this.rows=1;"></textarea>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
    @if($opt == 'preimplante' )

    <div class="col-sm-4" >
        <div class="card-informacion">
            <div class="card-body">
                <div class="form-group">
                    @if($opt == 'preimplante')
                        <div class="switch switch-success d-inline m-r-10">
                            <input type="checkbox" onchange="biopsia_check_implantologia({{ $count }})" id="biopsia_check_implantologia{{ $count }}" name="biopsia_check_implantologia{{ $count }}" value=""  >
                            <label for="biopsia_check_implantologia{{ $count }}" class="cr"></label>
                        </div>
                    @else
                        <div class="switch switch-success d-inline m-r-10">
                            <input type="checkbox" onchange="biopsia_check_period({{ $count }})" id="biopsia_check_period{{ $count }}" name="biopsia_check_period{{ $count }}" value="" >
                            <label for="biopsia_check_period{{ $count }}" class="cr"></label>
                        </div>
                    @endif
                    <label>Biopsia</label>
                    @if($opt == 'preimplante')
                        <div class="form-group mt-3">
                            <label id="" name="" class="floating-label-activo-sm">Zona y Motivo</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="im_biop_zona{{ $count }}" id="im_biop_zona{{ $count }}" disabled></textarea>
                        </div>
                    @else
                        <div class="form-group fill">
                            <label id="" name="" class="floating-label-activo-sm">Zona y Motivo</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="period_biop_zona{{ $count }}" id="period_biop_zona{{ $count }}" disabled></textarea>
                        </div>
                    @endif
                    @if($opt == 'preimplante')
                        <div class="form-group fill">
                            <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="im_obs_result_biopsia{{ $count }}" id="im_obs_result_biopsia{{ $count }}" disabled></textarea>
                        </div>
                    @else
                    <div class="form-group fill">
                        <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="period_obs_result_biopsia{{ $count }}" id="period_obs_result_biopsia{{ $count }}" disabled></textarea>
                    </div>
                    @endif
                    <hr>
                        <h6 style="subt-aten">Estado general del periodonto</h6>
                    <hr>
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="solicitar_ic_periodoncia()"><i class="feather icon-check"></i> Solicitar Interconsulta Peridóncia</button>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    @endif
</div>


<div class="form-row">
    <div class="col-sm-12 mt-2">
        @if($opt == 'preimplante')
                <button type="button" class="btn btn-icon btn-primary-light-c" onclick="guardar_pieza_imagen_implantologia({{ $count }})"><i class="fas fa-save" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-icon btn-danger-light-c" onclick="ocultar_pieza_imagen_implantologia()">X</button>
        @elseif($opt == 'periodoncica')
                <button type="button" class="btn btn-icon btn-primary-light-c" onclick="guardar_pieza_imagenes_periodoncica({{ $count }})"><i class="fas fa-save" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-icon btn-danger-light-c" onclick="ocultar_pieza_imagen_periodoncica()">X</button>
        @endif

    </div>
</div>

<input type="hidden" name="">

<script>
    if (typeof dropzone === 'undefined') {
        var dropzone;
    }
    if(typeof dropzone_post == 'undefined'){
        var dropzone_post;
    }

    $(document).ready(function(){
        // Configuración de Dropzone
        init_dropzone_imagenes_preimplante();
    });

    function init_dropzone_imagenes_preimplante()
    {
        // Inicializa Dropzone sobre el nuevo elemento
        dropzone_preimpl = new Dropzone("#mis-imagenes-dentales-preimplante", {
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
    function ocultar_pieza_imagen_implantologia(){
        $('#contenedor_nueva_imagen_dent_estudio').empty();
    }

    function ocultar_pieza_imagen_periodoncica(){
        $('#contenedor_nueva_imagen_dent_period').empty();
    }



    function guardar_pieza_imagen_implantologia(counter){

        let biopsia = $('#biopsia_check_implantologia'+counter).is(':checked');
        let zona_motivo = $('#im_biop_zona'+counter).val();
        let observaciones = $('#im_obs_result_biopsia'+counter).val();
        let numero_pieza = $('#numero_pieza_ex_impl'+counter).val();
        let observaciones_ex = $('#observaciones_ex_impl'+counter).val();
        let id_paciente = dame_id_paciente();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_profesional = $('#id_profesional').val();
        let id_especialidad = $('#id_especialidad').val();
        let id_ficha_atencion = $('#id_fc').val();
        let seccion = 'implantologia';

        let data = {
            _token: CSRF_TOKEN,
            numero_pieza: numero_pieza,
            observaciones_ex: observaciones_ex,
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
                    $('#contenedor_imagenes_dent_estudio').empty();
                    $('#contenedor_imagenes_dent_estudio').append(resp.v);
                    $('#contenedor_nueva_imagen_dent_estudio').empty();
                    $('#id_imagenes_dental').val(resp.rx.id);

                    // Una vez que el envío de datos ha sido exitoso, procesamos la cola de imágenes
                    if (dropzone_preimpl.getQueuedFiles().length > 0) {
                        console.log("Iniciando carga de imágenes...");
                        // Desvinculamos el evento "queuecomplete" antes de procesar la cola
                        dropzone_preimpl.off("queuecomplete");

                        // Procesar la cola de imágenes
                        dropzone_preimpl.processQueue();  // Esto procesará la cola y subirá las imágenes

                        // Usamos un evento para esperar a que se complete la carga de imágenes
                        dropzone_preimpl.on("queuecomplete", function() {
                            // Una vez que la cola esté completa, podemos realizar más acciones si es necesario
                            console.log("Carga de imágenes completada.");
                        });
                    } else {
                        console.log("No hay imágenes para cargar.");
                        alert("No has seleccionado imágenes para subir.");

                        // Si el dropzone_preimpl no está funcionando correctamente, puedes destruirlo y volver a inicializarlo
                        if (dropzone_preimpl) {
                            // Destruir la instancia actual de dropzone_preimpl
                            dropzone_preimpl.destroy();
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

    function guardar_pieza_imagenes_periodoncica(counter){

        let biopsia = $('#biopsia_check_period'+counter).is(':checked');
        let zona_motivo = $('#period_biop_zona'+counter).val();
        let observaciones = $('#period_obs_result_biopsia'+counter).val();
        let numero_pieza = $('#numero_pieza_ex_period'+counter).val();
        let observaciones_ex = $('#observaciones_ex_period'+counter).val();
        let id_paciente = dame_id_paciente();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_profesional = $('#id_profesional').val();
        let id_especialidad = $('#id_especialidad').val();
        let id_ficha_atencion = $('#id_fc').val();
        let seccion = 'periodoncica';

        let data = {
            _token: CSRF_TOKEN,
            numero_pieza: numero_pieza,
            observaciones_ex: observaciones_ex,
            biopsia: biopsia,
            zona_motivo: zona_motivo,
            observaciones:observaciones,
            id_paciente: id_paciente,
            id_lugar_atencion: id_lugar_atencion,
            id_profesional: id_profesional,
            id_especialidad: id_especialidad,
            id_ficha_atencion: id_ficha_atencion,
            counter: counter,
            seccion: seccion
        }

        console.log(data);

        let url = "{{ ROUTE('profesional.guardar_imagenes_dental_paciente') }}";

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'OK'){
                    $('#contenedor_imagenes_dent_period').empty();
                    $('#contenedor_imagenes_dent_period').append(resp.v);
                    $('#contenedor_nueva_imagen_dent_period').empty();
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
</script>

