<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="row">
        <div class="col-md-6">
            <!--IMAGENES-->
            <div class="form-row" id="contenedor_piezas_ex_oral">
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12">
                                <h6 style="text-align: center;color:blue;bold">Subir imagen radiológica</h6>
                            </div>
                        </div>

                            <div class="card-body-aten-a">
                                <!-- [ Main Content ] start -->
                                <div class="dropzone" id="mis-imagenes-imagenes-rx-dental" action="{{ route('profesional.imagen.carga') }}"></div>
                                <!-- [ file-upload ] end -->
                            </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-row">
                <div class="col-sm-12 col-md-12 col-lg-2 col-xl-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Piezas N°</label>
                        <select class="form-control form-control-sm select2" name="rx_numero_pieza{{ $counter }}[]" id="rx_numero_pieza{{ $counter }}" multiple>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <!-- Agrega todas las piezas necesarias -->
                        </select>

                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Espacio Periodontal Apical</label>
                        <select name="rx_esp_peri_apical{{ $counter }}" id="rx_esp_peri_apical{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('rx_esp_peri_apical{{ $counter }}','div_detalle_rx_esp_peri_apical{{ $counter }}','det_rx_esp_peri_apical{{ $counter }}',4)">
                            <option value="0">Seleccione</option>
                            <option value="1">Normal</option>
                            <option value="2">Engrosado</option>
                            <option value="3">Ausente</option>
                            <option value="4">Otro</option>
                        </select>
                    </div>
                    <div class="form-group"   id="div_detalle_rx_esp_peri_apical{{ $counter }}" style="display:none">
                        <label class="floating-label-activo-sm">Espacio Periodontal Apical<i>(describir)</i></label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_rx_esp_peri_apical{{ $counter }}" id="det_rx_esp_peri_apical{{ $counter }}"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Hueso Alveolar Apical</label>
                        <select name="h_apical{{ $counter }}" id="h_apical{{ $counter }}"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('h_apical{{ $counter }}','div_detalle_h_apical{{ $counter }}','aprec_h_apical{{ $counter }}',5)">
                            <option value="0">Seleccione</option>
                            <option value="1">Normal</option>
                            <option value="2">Zona apical Difusa</option>
                            <option value="3">Zona apical Corticalizada</option>
                            <option value="4">Osteítis Condensante</option>
                            <option value="5">Otro<i>(describir)</i></option>
                        </select>
                    </div>
                    <div class="form-group"  id="div_detalle_h_apical{{ $counter }}" style="display:none">
                        <label class="floating-label-activo-sm">Hueso Alveolar Apical<i>(describir)</i></label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_h_apical{{ $counter }}" id="aprec_h_apical{{ $counter }}"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="form-group">
                <label class="floating-label-activo-sm">Informe del radiólogo</label>
                <textarea class="form-control caja-texto form-control-sm" rows="1"  data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="inf_rad{{ $counter }}" id="inf_rad{{ $counter }}"></textarea>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="form-group">
                <label class="floating-label-activo-sm">Observaciones al estudio radiológico</label>
                <textarea class="form-control caja-texto form-control-sm" rows="1"  data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_rad{{ $counter }}" id="obs_rad{{ $counter }}"></textarea>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-outline-primary btn-sm" onclick="guardar_nueva_pieza_ex_radio({{ $counter }})"><i class="fas fa-save"></i>Guardar</button>
    <button class="btn btn-icon btn-danger-light-c" onclick="ocultar_nueva_pieza_dental_rx()">X</button>
    <hr>

</div>

<input type="hidden" name="counter_" id="counter_" value="{{ $counter }}">

<script>
if (typeof dropzone === 'undefined') {
    var dropzone;
    var dropzone_rx;
}
$(document).ready(function(){
    $('.select2').select2({
        width: '100%',
        placeholder: 'Seleccionar pieza(s)',
        allowClear: true
    });
    // Configuración de Dropzone
    initDropzone();


    $('#rx_numero_pieza'+counter).select2();
});

function initDropzone() {
    if (dropzone) {
        dropzone.destroy();
        dropzone = null;
    }

    dropzone = new Dropzone("#mis-imagenes-imagenes-rx-dental", {
        url: "{{ route('profesional.imagenes.guardar_rx_dental') }}",
        method: 'post',
        autoProcessQueue: false,  // No procesar automáticamente
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        paramName: "file[]",  // Enviar los archivos como un array
        acceptedFiles: "image/*",
        maxFilesize: 4,  // Tamaño máximo en MB
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
                // Agregar parámetros adicionales a formData
                const idPaciente = dame_id_paciente(); // Suponiendo que tienes esta función definida
                const idLugarAtencion = document.querySelector("#id_lugar_atencion").value;
                const idEspecialidad = document.querySelector("#id_especialidad").value;
                const idProfesional = document.querySelector('#id_profesional_fc').value;
                const idExamenRx = document.querySelector('#id_examen_oral_rx').value;

                formData.append("id_paciente", idPaciente);
                formData.append("id_lugar_atencion", idLugarAtencion);
                formData.append("id_especialidad", idEspecialidad);
                formData.append("id_profesional", idProfesional);
                formData.append("id_examen", idExamenRx);

                console.log("Datos adicionales enviados:", {
                    id_paciente: idPaciente,
                    id_lugar_atencion: idLugarAtencion,
                    id_especialidad: idEspecialidad,
                    id_profesional: idProfesional,
                    id_examen: idExamenRx
                });
            } else {
                console.error("formData no está disponible");
            }
        }
    });

    dropzone_rx = new Dropzone("#nuevas-imagenes-dental-oral-paciente", {
        url: "{{ route('profesional.imagenes.guardar_rx_dental') }}",
        method: 'post',
        autoProcessQueue: false,  // No procesar automáticamente
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        paramName: "file[]",  // Enviar los archivos como un array
        acceptedFiles: "image/*",
        maxFilesize: 4,  // Tamaño máximo en MB
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
                // Agregar parámetros adicionales a formData
                const idPaciente = dame_id_paciente(); // Suponiendo que tienes esta función definida
                const idLugarAtencion = document.querySelector("#id_lugar_atencion").value;
                const idEspecialidad = document.querySelector("#id_especialidad").value;
                const idProfesional = document.querySelector('#id_profesional_fc').value;
                const idExamenRx = document.querySelector('#id_examen_oral_rx').value;

                formData.append("id_paciente", idPaciente);
                formData.append("id_lugar_atencion", idLugarAtencion);
                formData.append("id_especialidad", idEspecialidad);
                formData.append("id_profesional", idProfesional);
                formData.append("id_examen", idExamenRx);

                console.log("Datos adicionales enviados:", {
                    id_paciente: idPaciente,
                    id_lugar_atencion: idLugarAtencion,
                    id_especialidad: idEspecialidad,
                    id_profesional: idProfesional,
                    id_examen: idExamenRx
                });
            } else {
                console.error("formData no está disponible");
            }
        }
    });
}

function guardar_nueva_pieza_ex_radio(counter){
    console.log('hola');
    // Verifica los datos antes de procesar la cola de imágenes
    let numero_pieza = $('#rx_numero_pieza'+counter).val();
    let espacio_periodontal_aplical = $('#rx_esp_peri_apical'+counter).val();
    let hueso_alveolar_apical = $('#h_apical'+counter).val();
    let obs = $('#obs_ex_oral'+counter).val();
    let id_paciente = dame_id_paciente();
    let id_lugar_atencion = $('#id_lugar_atencion').val();
    let id_especialidad = $('#id_especialidad').val();
    let id_profesional = $('#id_profesional_fc').val();
    let id_ficha_atencion = $('#id_fc').val();
    let informe_radiologo = $('#inf_rad'+counter).val();
    let observaciones_radiologo = $('#obs_rad'+counter).val();

    let valido = 1;
    let mensaje = '';

    // Realiza la validación de los campos requeridos
    if(numero_pieza == ''){
        valido = 0;
        mensaje += '<li>numero de pieza </li>';
    }
    if(espacio_periodontal_aplical == 0){
        valido = 0;
        mensaje += '<li>Espacio periodontal </li>';
    }
    if(hueso_alveolar_apical == 0){
        valido = 0;
        mensaje += '<li>Hueso alveolar </li>';
    }

    // Si hay algún campo vacío o inválido, muestra un mensaje de error y no procesa las imágenes
    if(valido == 0){
        swal({
            title: "Campos requeridos",
            content:{
                element: "div",
                attributes:{
                    innerHTML: mensaje,
                },
            },
            icon: "error",
            buttons: "Aceptar",
            DangerMode: true,
        });
        return false;  // Detiene el proceso si la validación falla
    }

    // Si la validación es exitosa, realizamos el envío de los datos a través de AJAX
    let data = {
        _token: CSRF_TOKEN,
        numero_pieza: numero_pieza,
        espacio_periodontal_aplical: espacio_periodontal_aplical,
        hueso_alveolar_apical: hueso_alveolar_apical,
        obs: obs,
        id_paciente: id_paciente,
        id_lugar_atencion: id_lugar_atencion,
        id_especialidad: id_especialidad,
        id_profesional: id_profesional,
        informe_radiologo: informe_radiologo,
        observaciones_radiologo: observaciones_radiologo,
        id_fc: id_ficha_atencion
    };

    let url = "{{ ROUTE('profesional.guardar_pieza_dental_examen_oral_rx') }}";

    $.ajax({
        type: 'post',
        data: data,
        url: url,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#pieza_dentalrx').empty();
                $('#pieza_dentalrx').append(resp.v);
                swal({
                    icon:'success',
                    title:'Exito',
                    text:'Pieza agregada correctamente'
                });
                // Mostrar las imágenes subidas
                if (resp.rx && resp.rx.decoded_imagenes) {
                    resp.rx.decoded_imagenes.forEach(function(imagen) {
                        imagen.paths_imagenes.forEach(function(path) {
                            $('#contenedor_examenes_oral_rx').append(`
                                <div class="col-md-4">
                                    <img src="${path}" class="img-fluid" alt="Imagen subida">
                                </div>
                            `);
                        });
                    });
                }
            } else {
                $('#pieza_dentalrx').empty();
                $('#pieza_dentalrx').append(resp.mensaje);
            }
            $('#contenedor_examenes_oral_rx').empty();

            $('#id_examen_oral_rx').val(resp.rx.id);

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

                    // Mostrar las imágenes subidas
                    if (resp.urls && resp.urls.length > 0) {
                        resp.urls.forEach(function(url) {
                            $('#contenedor_piezas_ex_oral').append(`
                                <div class="col-md-4">
                                    <img src="${url}" class="img-fluid" alt="Imagen subida">
                                </div>
                            `);
                        });
                    }
                });
            } else {
                console.log("No hay imágenes para cargar.");
                alert("No has seleccionado imágenes para subir.");

                // Si el Dropzone no está funcionando correctamente, puedes destruirlo y volver a inicializarlo
                if (dropzone) {
                    // Destruir la instancia actual de Dropzone
                    dropzone.destroy();
                }

                // Re-inicializar el Dropzone nuevamente
                initDropzone();  // Asegúrate de que la función initDropzone esté disponible
            }
        },
        error: function(error){
            console.log(error);
        }
    });
}




function ocultar_nueva_pieza_dental_rx(){
    $('#contenedor_examenes_oral_rx').empty();
}

</script>
