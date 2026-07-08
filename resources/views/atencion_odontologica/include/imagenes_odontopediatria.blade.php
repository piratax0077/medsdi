<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="form-row">
            <div class="col-sm-6 col-md-6">
                <div class="card-a">
                    <div class="card-header-a" id="img">
                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#imagenes_uro_pre-c" aria-expanded="false" aria-controls="imagenes_uro_pre-c">
                            Imagenes Pre tratamiento
                        </button>
                    </div>
                    <div id="imagenes_uro_pre-c" class="collapse show" aria-labelledby="imagenes_uro_pre" data-parent="#imagenes_uro_pre">
                        <div class="card-body-aten shadow-none">
                            <!-- [ Main Content ] start -->
                            <div class="dropzone" id="mis-imagenes-odontop-pre" action="{{ route('profesional.imagen.carga') }}"></div>
                            <!-- [ file-upload ] end -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="card-a">
                    <div class="card-header-a" id="img">
                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#imagenes_uro_post-c" aria-expanded="false" aria-controls="imagenes_uro_post-c">
                            Imagenes Post Tratamiento
                        </button>
                    </div>
                    <div id="imagenes_uro_post-c" class="collapse show" aria-labelledby="imagenes_uro_post" data-parent="#imagenes_uro_post">
                        <div class="card-body-aten shadow-none">
                            <!-- [ Main Content ] start -->
                            <div class="dropzone" id="mis-imagenes-odontop-post" action="{{ route('profesional.imagen.carga') }}"></div>
                            <!-- [ file-upload ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-12 col-md-11 col-lg-11 col-xl-11 mb-10 pb-10">
                <label class="floating-label-activo-sm">Comentarios Fotos</label>
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Fotos" data-seccion=" Fotos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_fotos_ven" id="obs_fotos_ven"></textarea>
            </div>
            <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 mb-10 pb-10">
                <div class="d-flex">
                    <button type="button" class="btn btn-success btn-icon" onclick="guardarFoto('mis-imagenes-odontop-post')"><i class="fas fa-save"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Variables globales para los Dropzones
var myDropzonePre;
var myDropzonePost;
var lista_imagenes = [];

// Función para cargar lista de imágenes
function cargar_lista_imagenes() {
    console.log('--------------cargar_lista_imagenes----------------------');
    lista_imagenes = [];

    // 🔍 Verificar cuál dropzone tiene archivos
    let tempPre = myDropzonePre ? myDropzonePre.getAcceptedFiles() : [];
    let tempPost = myDropzonePost ? myDropzonePost.getAcceptedFiles() : [];
    let temp = myDropzone ? myDropzone.getAcceptedFiles() : [];

    console.log('myDropzonePre files:', tempPre.length);
    console.log('myDropzonePost files:', tempPost.length);
    console.log('myDropzone files (current):', temp.length);

    // Usar los archivos del dropzone actual o combinar ambos
    let allFiles = temp;
    if (tempPre.length > 0 && tempPost.length > 0) {
        allFiles = [...tempPre, ...tempPost];
        console.log('🔄 Combinando archivos de PRE y POST:', allFiles.length);
    } else if (tempPre.length > 0) {
        allFiles = tempPre;
        console.log('📷 Usando archivos de PRE:', allFiles.length);
    } else if (tempPost.length > 0) {
        allFiles = tempPost;
        console.log('📷 Usando archivos de POST:', allFiles.length);
    }

    console.log('Total archivos a procesar:', allFiles.length);

    $.each(allFiles, function(index, value) {
        console.log(`Archivo ${index}:`, {
            name: value.name,
            status: value.status,
            xhr: value.xhr !== undefined,
            size: value.size
        });

        if(value.status == "success") {
            console.log('✅ Archivo exitoso encontrado');
            if(value.xhr !== undefined) {
                try {
                    var img_temp = JSON.parse(value.xhr.response);
                    console.log('✅ Respuesta del servidor:', img_temp);

                    lista_imagenes[index] = {
                        url: img_temp.img.url,
                        nombre_original: img_temp.img.original_file_name,
                        nombre_img: img_temp.img.nombre_img,
                        file_extension: img_temp.img.file_extension
                    };
                } catch(e) {
                    console.error('❌ Error parsing JSON:', e);
                    console.log('Raw response:', value.xhr.response);
                }
            } else {
                console.log('⚠️ xhr es undefined para archivo exitoso');
            }
        } else {
            console.log(`❌ Archivo con estado: "${value.status}" (esperado: "success")`);
        }
    });

    console.log('📋 Lista final de imágenes:', lista_imagenes);
    $('#input_lista_imagenes').val(JSON.stringify(lista_imagenes));
    console.log('💾 Valor guardado en input:', $('#input_lista_imagenes').val());
}

// *** IMPORTANTE: NO usar $(document).ready para vistas cargadas dinámicamente ***
// En su lugar, configurar las opciones de Dropzone directamente

console.log("🚀 Configurando Dropzones para vista dinámica (sin document.ready)...");

// Configuración para PRE-tratamiento
Dropzone.options.misImagenesOdontopPre = {
    init: function() {
        console.log("✅ Inicializando Dropzone PRE-tratamiento...");
        myDropzonePre = this; // ✅ Variable específica para PRE
        myDropzone = this;    // Mantener compatibilidad
    },
    url: "{{ route('profesional.imagen.carga') }}",
    method: 'post',
    createImageThumbnails: true,
    addRemoveLinks: true,
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    acceptedFiles: "image/*",
    maxFilesize: 4,
    maxFiles: 12,
    dictDefaultMessage: "📷 Arrastre las imágenes PRE-tratamiento aquí o haz clic para seleccionar<br><small>Máximo 12 archivos, 4MB cada uno</small>",
    dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",
    dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",
    dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",
    dictInvalidFileType: "No puedes subir archivos de este tipo.",
    dictCancelUpload: "Cancelar carga",
    dictUploadCanceled: "Subida cancelada.",
    dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",
    dictRemoveFile: "Eliminar archivo",
    dictMaxFilesExceeded: "No puede cargar más archivos.",

    success: function(file, response) {
        console.log('✅ SUCCESS PRE-tratamiento:', response);
        cargar_lista_imagenes();
        if (file.previewElement) {
            return file.previewElement.classList.add("dz-success");
        }
    },

    error: function(file, message) {
        console.error('❌ ERROR PRE-tratamiento:', message);
        if (file.previewElement) {
            file.previewElement.classList.add("dz-error");
            if (typeof message !== "string" && message.error) {
                message = message.error;
            } else {
                message = message.message;
            }
            for (let node of file.previewElement.querySelectorAll("[data-dz-errormessage]")) {
                node.textContent = message;
            }
        }
    },

    removedfile: function(file) {
        cargar_lista_imagenes();
        if (file.previewElement != null && file.previewElement.parentNode != null) {
            file.previewElement.parentNode.removeChild(file.previewElement);
        }
        return this._updateMaxFilesReachedClass();
    },

    canceled: function(file) {
        cargar_lista_imagenes();
        return this.emit("error", file, this.options.dictUploadCanceled);
    }
};

// Configuración para POST-tratamiento
Dropzone.options.misImagenesOdontopPost = {
    init: function() {
        console.log("✅ Inicializando Dropzone POST-tratamiento...");
        myDropzonePost = this; // ✅ Variable específica para POST
        myDropzone = this;     // Mantener compatibilidad
    },
    url: "{{ route('profesional.imagen.carga') }}",
    method: 'post',
    createImageThumbnails: true,
    addRemoveLinks: true,
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    acceptedFiles: "image/*",
    maxFilesize: 4,
    maxFiles: 12,
    dictDefaultMessage: "📷 Arrastre las imágenes POST-tratamiento aquí o haz clic para seleccionar<br><small>Máximo 12 archivos, 4MB cada uno</small>",
    dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",
    dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",
    dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",
    dictInvalidFileType: "No puedes subir archivos de este tipo.",
    dictCancelUpload: "Cancelar carga",
    dictUploadCanceled: "Subida cancelada.",
    dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",
    dictRemoveFile: "Eliminar archivo",
    dictMaxFilesExceeded: "No puede cargar más archivos.",

    success: function(file, response) {
        console.log('✅ SUCCESS POST-tratamiento:', response);
        cargar_lista_imagenes();
        if (file.previewElement) {
            return file.previewElement.classList.add("dz-success");
        }
    },

    error: function(file, message) {
        console.error('❌ ERROR POST-tratamiento:', message);
        if (file.previewElement) {
            file.previewElement.classList.add("dz-error");
            if (typeof message !== "string" && message.error) {
                message = message.error;
            } else {
                message = message.message;
            }
            for (let node of file.previewElement.querySelectorAll("[data-dz-errormessage]")) {
                node.textContent = message;
            }
        }
    },

    removedfile: function(file) {
        cargar_lista_imagenes();
        if (file.previewElement != null && file.previewElement.parentNode != null) {
            file.previewElement.parentNode.removeChild(file.previewElement);
        }
        return this._updateMaxFilesReachedClass();
    },

    canceled: function(file) {
        cargar_lista_imagenes();
        return this.emit("error", file, this.options.dictUploadCanceled);
    }
};

console.log("🎯 Configuraciones de Dropzone establecidas para vista dinámica");
</script>
