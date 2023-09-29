<div id="form_ges" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="form_ges" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Constancia GES (Artículo 24 Ley 19.966)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Seleccione Patología Ges</label>
                            <input type="text" class="form-control form-control-sm" name="nombre_ges" id="nombre_ges">
                            <input type="hidden" class="form-control form-control-sm" name="id_ges" id="id_ges">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="bt-wizard" id="wizard_constancia_ges_2">
                            <ul class="nav nav-pills">
                                <li class="tab-wizard-formularios">
                                    <a href="#datos_prestador_ges_2" class="nav-link-wizard rounded-0" data-toggle="tab">
                                        Datos del prestador
                                    </a>
                                </li>
                                <li class="tab-wizard-formularios">
                                    <a href="#datos_paciente_ges_2" class="nav-link-wizard rounded-0" data-toggle="tab">
                                        Datos del paciente
                                    </a>
                                </li>
                                <li class="tab-wizard-formularios">
                                    <a href="#informacion_medica_ges_2" class="nav-link-wizard rounded-0" data-toggle="tab">
                                        Información médica
                                    </a>
                                </li>
                                <li class="tab-wizard-formularios">
                                    <a href="#constancia_ges_2" class="nav-link-wizard rounded-0" data-toggle="tab">
                                        Constancia
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane pt-4 active show" id="datos_prestador_ges_2">
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <h6 class="text-c-blue">Datos del Prestador</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label><strong>Nombre Institución: </strong></label>
                                            <span>{{ $lugar_atencion->nombre }}</span>
                                            <input type="hidden" name="nombre_institucion_ficha_ges" id="nombre_institucion_ficha_ges" value="{{ $lugar_atencion->nombre }}">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label><strong>Profesional: </strong></label>
                                            <span>{{ $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos }}</span>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label><strong>Teléfono: </strong></label>
                                            <span>{{ $profesional->telefono_uno }}</span>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label><strong>Dirección: </strong></label>
                                            {{--  <span>{{ $profesional->Direccion()->first()->direccion .' ' .$profesional->Direccion()->first()->numero_dir .', Región de ' .$profesional->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre .' ' .$profesional->Direccion()->first()->Ciudad()->first()->nombre }}</span>  --}}
                                            <span>{{ $lugar_atencion->Direccion()->first()->direccion .' ' .$lugar_atencion->Direccion()->first()->numero_dir .', Región de ' .$lugar_atencion->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre .' ' .$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre }}</span>
                                            <input type="hidden" name="direccion_institucion_ficha_ges" id="direccion_institucion_ficha_ges" value="{{ $lugar_atencion->Direccion()->first()->direccion .' ' .$lugar_atencion->Direccion()->first()->numero_dir .', Región de ' .$lugar_atencion->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre .' ' .$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre }}">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label-activo-sm">Nombre del responsable</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_responsable_ficha_ges" id="nombre_responsable_ficha_ges" value="">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label-activo-sm">Rut del responsable</label>
                                            <input type="person" class="form-control form-control-sm" name="rut_responsable_ficha_ges" id="rut_responsable_ficha_ges" value="">
                                        </div>
                                    </div>
                                    <div class="row justify-content-between mx-0 btn-page">
                                        <div class="col-sm-6 pl-0">
                                            <a href="#!" class="btn btn-success btn-sm button-previous disabled">Anterior</a>
                                        </div>
                                        <div class="col-sm-6 text-md-right pr-0">
                                            <a href="#!" class="btn btn-success btn-sm button-next">Siguente</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane pt-4" id="datos_paciente_ges_2">
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <h6 class="text-c-blue">Datos del Paciente</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label><strong>Nombre: </strong></label>
                                            <span>{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos  }}</span>
                                            <input type="hidden" name="nombre_paciente_ficha_ges" id="nombre_paciente_ficha_ges" value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}" >
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label><strong>Rut: </strong></label>
                                            <span>{{ $paciente->rut }}</span>
                                            <input type="hidden" name="rut_paciente_ficha_ges" id="rut_paciente_ficha_ges" value="{{ $paciente->rut }}" >
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label><strong>Previsión: </strong></label>
                                            <span>
                                                @foreach ($prevision as $previ)
                                                    @if ($previ->id == $paciente->Prevision()->first()->id)
                                                        {{ $previ->nombre }}
                                                        <input type="hidden" name="prevision_ficha_ges" id="prevision_ficha_ges" value="{{ $paciente->Prevision()->first()->id }}">
                                                    @endif
                                                @endforeach
                                            </span>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label><strong>Dirección: </strong></label>
                                            <span>{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}</span>
                                            <input type="hidden" name="direccion_paciente" id="direccion_paciente" value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}" >
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label><strong>Correo electrónico: </strong></label>
                                            <span>{{ $paciente->email }}</span>
                                            <input type="hidden" name="email_paciente" value="{{ $paciente->email }}" id="email_paciente" >
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label><strong>Teléfono: </strong></label>
                                            <span>{{ $paciente->telefono_uno }}</span>
                                            <input type="hidden" name="telefono_paciente" value="{{ $paciente->telefono_uno }}" id="telefono_paciente" >
                                        </div>
                                    </div>
                                    <div class="row justify-content-between mx-0 btn-page">
                                        <div class="col-sm-6 pl-0">
                                            <a href="#!" class="btn btn-success btn-sm button-previous">Anterior</a>
                                        </div>
                                        <div class="col-sm-6 text-md-right pr-0">
                                            <a href="#!" class="btn btn-success btn-sm button-next">Siguente</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane pt-4" id="informacion_medica_ges_2">
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <h6 class="text-c-blue">Información Médica</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label-activo-sm">Confirmación diagnóstica GES</label>
                                            <input type="text" class="form-control form-control-sm" name="confirmacion_diagnostica_ficha_ges" id="confirmacion_diagnostica_ficha_ges">
                                        </div>

                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label-activo-sm">¿Paciente con tratamiento?</label>
                                            <input type="text" class="form-control form-control-sm" name="paciente_tratamiento_ficha_ges" id="paciente_tratamiento_ficha_ges">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <h6 class="text-c-blue">Fecha Notificación</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">

                                            <span>
                                                <h5 class="text-c-blue">
                                                    {{ Carbon\Carbon::now()->timezone('America/Santiago')->format('d-m-Y H:i') }}
                                                </h5>
                                            </span>

                                        </div>

                                    </div>
                                    <div class="row justify-content-between mx-0 btn-page">
                                        <div class="col-sm-6 pl-0">
                                            <a href="#!" class="btn btn-success btn-sm button-previous">Anterior</a>
                                        </div>
                                        <div class="col-sm-6 text-md-right pr-0">
                                            <a href="#!" class="btn btn-success btn-sm button-next">Siguente</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane pt-4" id="constancia_ges_2">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <h6 class="text-c-blue mb-2 text-center">Constancia</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="alert alert-success text-justify pt-3 pb-1" role="alert">
                                                <p>Desea adjuntar algún documento</p>
                                                <input type="hidden" name="input_lista_archivo" id="input_lista_archivo" value="">
                                                <!-- [ Main Content ] start -->
                                                {{-- <div class="dropzone" id="mis-archivos-ges" action="{{ route('profesional.archivo.carga') }}"> --}}
                                                <div class="dropzone" id="mis-archivos-ges">
                                                {{-- <div class="dropzone" id="mis-archivos-ges" action=""> --}}
                                                </div>
                                                <!-- [ file-upload ] end -->
                                            </div>
                                        </div>
                                    </div>


                                     <div class="row">
                                        <div class="col-sm-6 col-md-6 text-center">
                                            <button type="button" class="btn btn-sm btn-danger-light mt-2 mb-4" onclick="ver_pdf_constancia_ges();">PDF</button>
                                        </div>
                                         <div class="col-sm-6 col-md-6 text-center">
                                             <button type="button" class="btn btn-sm btn-primary-light mt-2 mb-4" onclick="registrar_ges_ficha();">Guardar / Enviar Notificación</button>
                                         </div>
                                     </div>

                                    <div class="row justify-content-between mx-0 btn-page">
                                        <div class="col-sm-6 pl-0">
                                            <a href="#!" class="btn btn-success btn-sm button-previous">Anterior</a>
                                        </div>
                                        <div class="col-sm-6 text-md-right pr-0">
                                            <a href="#!" class="btn btn-success btn-sm button-next ">Siguente</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    /** MANEJO DE ARCHIVO */

    // $(document).ready(function () {
    //     // var myDropzone_ges ;
    //     // Dropzone.options.misArchivosGes = {
    //     //     init:function()
    //     //     {
    //     //         myDropzone_ges = this;
    //     //     },
    //     //     url: "{{ route('profesional.archivo.carga') }}",
    //     //     method: 'post',
    //     //     createImageThumbnails: true,
    //     //     addRemoveLinks: true,
    //     //     headers:{
    //     //         'X-CSRF-TOKEN' : CSRF_TOKEN,
    //     //     },

    //     //     acceptedFiles: "application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*",
    //     //     maxFilesize: 4,
    //     //     maxFiles: 4,
    //     //     /** El texto utilizado antes de que se eliminen los archivos. */
    //     //     dictDefaultMessage: "Arrastre Archivo al recuadro para subirlo.",

    //     //     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
    //     //     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

    //     //     /**
    //     //      * El texto que se agregará antes del formulario alternativo.
    //     //      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
    //     //      * ser ignorado.
    //     //      */
    //     //     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

    //     //     /**
    //     //      * Si el tamaño del archivo es demasiado grande.
    //     //      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
    //     //      */
    //     //     dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

    //     //     /** Si el archivo no coincide con el tipo de archivo. */
    //     //     dictInvalidFileType: "No puedes subir archivos de este tipo.",

    //     //     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
    //     //     dictCancelUpload: "Cancelar carga",

    //     //     /** El texto que se muestra si una carga se canceló manualmente */
    //     //     dictUploadCanceled: "Subida cancelada.",

    //     //     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
    //     //     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

    //     //     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
    //     //     dictRemoveFile: "Eliminar archivo",

    //     //     /**
    //     //      * Se muestra si `maxFiles` es st y se excede.
    //     //      */
    //     //     dictMaxFilesExceeded: "No puede cargar más archivos.",

    //     //     // accept(file, done) {
    //     //     //     console.log('-------------accept-----------------------');
    //     //     //     cargar_lista_archivo();
    //     //     //     return done();
    //     //     // },
    //     //     success: function(file, response){
    //     //         // console.log('-------------success-----------------------');
    //     //         cargar_lista_archivo(myDropzone_ges,'ges');

    //     //         if (file.previewElement) {
    //     //             return file.previewElement.classList.add("dz-success");
    //     //         }
    //     //     },
    //     //     error(file, message) {
    //     //         // console.log('-------------error-----------------------');
    //     //         if (file.previewElement) {
    //     //             file.previewElement.classList.add("dz-error");
    //     //             if (typeof message !== "string" && message.error)
    //     //             {
    //     //                 message = message.error;
    //     //             }
    //     //             else
    //     //             {
    //     //                 message = message.message;
    //     //             }
    //     //             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
    //     //                 node.textContent = message;
    //     //             }
    //     //         }
    //     //     },
    //     //     removedfile(file) {
    //     //         // console.log('-------------removedfile-----------------------');
    //     //         cargar_lista_archivo(myDropzone_ges,'ges');
    //     //         if (file.previewElement != null && file.previewElement.parentNode != null) {
    //     //             file.previewElement.parentNode.removeChild(file.previewElement);
    //     //         }
    //     //         return this._updateMaxFilesReachedClass();
    //     //     },
    //     //     canceled: function canceled(file) {
    //     //         cargar_lista_archivo(myDropzone_ges,'ges');
    //     //         return this.emit("error", file, this.options.dictUploadCanceled);
    //     //     },
    //     // };
    // });

    var lista_archivo = {};
    function cargar_lista_archivo(obj_dropzone, alias_examen)
    {
        // console.log('--------------cargar_lista_archivo----------------------');
        lista_archivo[alias_examen] = [];
        let temp  = obj_dropzone.getAcceptedFiles();
        $.each(temp, function( index, value )
        {
            if(value.status == "success")
            {
                if(value.xhr !== undefined)
                {
                    var archivo_temp = JSON.parse(value.xhr.response);
                    lista_archivo[alias_examen][index] = [
                        url=archivo_temp.archivo.url,
                        nombre_origian= archivo_temp.archivo.original_file_name,
                        nombre_archivo = archivo_temp.archivo.nombre_archivo,
                        file_extension = archivo_temp.archivo.file_extension,
                    ];
                    $('#input_lista_archivo').val('');
                    $('#input_lista_archivo').val(JSON.stringify(lista_archivo));
                }
            }
        });


    }
    /** CIERRE MANEJO DE IMAGENES */

    function registrar_ges_ficha()
    {
        var validar = 0;
        var mensaje ='';

        let nombre_ges = $('#nombre_ges').val();
        let id_ges = $('#id_ges').val();

        let nombre_institucion_ficha_ges = $('#nombre_institucion_ficha_ges').val();
        let direccion_institucion_ficha_ges = $('#direccion_institucion_ficha_ges').val();
        let id_profesional = $('#id_profesional').val();
        let nombre_responsable_ficha_ges = $('#nombre_responsable_ficha_ges').val();
        let rut_responsable_ficha_ges = $('#rut_responsable_ficha_ges').val();

        let id_paciente = $('#id_paciente_fc').val();

        let confirmacion_diagnostica_ficha_ges = $('#confirmacion_diagnostica_ficha_ges').val();
        let paciente_tratamiento_ficha_ges = $('#paciente_tratamiento_ficha_ges').val();

        // lista_archivo
        let lista_archivo = $('#input_lista_archivo').val();

        let id_ficha_atencion = $('#id_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let hora_medica = $('#hora_medica').val();
        // let codigo_validacion_informe_ges = $('#codigo_validacion_informe_ges').val();


        // if(nombre_institucion_ficha_ges == '')
        // {
        //     $('#nombre_institucion_ficha_ges').focus();
        //     validar = 1;

        // }
        // if(direccion_institucion_ficha_ges == '')
        // {
        //     $('#direccion_institucion_ficha_ges').focus();
        //     validar = 1;

        // }

        // if(nombre_responsable_ficha_ges == '')
        // {
        //     $('#nombre_responsable_ficha_ges').focus();
        //     validar = 1;

        // }
        // if(rut_responsable_ficha_ges == '')
        // {
        //     $('#rut_responsable_ficha_ges').focus();
        //     validar = 1;

        // }

        if(confirmacion_diagnostica_ficha_ges == '')
        {
            $('#confirmacion_diagnostica_ficha_ges').focus();
            mensaje += ' Debe ingresar Confirmación diagnóstica GES.\n' ;
            validar = 1;

        }
        if(paciente_tratamiento_ficha_ges == '')
        {
            $('#paciente_tratamiento_ficha_ges').focus();
            mensaje += ' Debe Confimar si el paciente se encuentra en tratamiento.\n' ;
            validar = 1;

        }
        if(nombre_ges == '')
        {
            $('#nombre_ges').focus();
            mensaje += ' Debe ingresar el Diagnóstico GES.\n' ;
            validar = 1;
        }
        // if(id_paciente == '')
        // {
        //     $('#id_paciente').focus();
        //     validar = 1;
        // }
        // if(id_profesional == '')
        // {
        //     $('#id_profesional').focus();
        //     validar = 1;
        // }
        // if(id_ficha_atencion == '')
        // {
        //     $('#id_ficha_atencion').focus();
        //     validar = 1;
        // }
        // if(id_lugar_atencion == '')
        // {
        //     $('#id_lugar_atencion').focus();
        //     validar = 1;
        // }
        // if(hora_medica == '')
        // {
        //     $('#hora_medica').focus();
        //     validar = 1;
        // }

        if(validar == 1)
        {
            swal({
                title: "Debe ingresar todos los datos requeridos." ,
                text: mensaje,
                icon: "error",
            })
            return false;
        }
        else
        {

            $.ajax({
                url: "{{ route('ficha_atencion.registrar_diagnostico_ges') }}",
                type: 'GET',
                dataType: 'json',
                data: {
                    nombre_institucion_ficha_ges : nombre_institucion_ficha_ges,
                    direccion_institucion_ficha_ges : direccion_institucion_ficha_ges,
                    nombre_responsable_ficha_ges : nombre_responsable_ficha_ges,
                    rut_responsable_ficha_ges : rut_responsable_ficha_ges,
                    confirmacion_diagnostica_ficha_ges : confirmacion_diagnostica_ficha_ges,
                    paciente_tratamiento_ficha_ges : paciente_tratamiento_ficha_ges,
                    id_ges : id_ges,
                    nombre_ges : nombre_ges,
                    id_paciente : id_paciente,
                    id_profesional : id_profesional,
                    id_ficha_atencion : id_ficha_atencion,
                    id_lugar_atencion : id_lugar_atencion,
                    hora_medica : hora_medica,
                    // codigo_verificacion : codigo_validacion_informe_ges,
                    codigo_verificacion : '',
                    lista_archivo : lista_archivo,
                },
            })
            .done(function(resp) {
                console.log(resp);

                if (resp != '')
                {
                    if(resp.estado == 1)
                    {
                        console.log(resp);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#nombre_ges').val('');
                        $('#id_ges').val('');

                        $('#nombre_responsable_ficha_ges').val('');
                        $('#rut_responsable_ficha_ges').val('');
                        $('#confirmacion_diagnostica_ficha_ges').val('');
                        $('#paciente_tratamiento_ficha_ges').val('');
                        $('#input_lista_archivo').val('');
                        $('#codigo_validacion_informe_ges').val('');

                        $('#mensaje').text('Se ha creado Diagnostico GES de forma correcta');
                        $('#mensaje').show();
                        $('#form_ges').modal('hide');

                        swal({
                            title: "Constancia GES (Artículo 24 Ley 19.966).",
                            text: 'Registro Exitoso.\n El paciente ha sido Notificado\n La constancia puede ser recuperada desde su escritorio (Documentos).',
                            icon: "success",
                        });
                    }
                    else
                    {
                        swal({
                            title: "Constancia GES (Artículo 24 Ley 19.966).",
                            text: 'Registro Fallido.',
                            icon: "error",
                        });
                    }
                }
                else
                {
                    swal({
                        title: "Constancia GES (Artículo 24 Ley 19.966).",
                        text: 'Registro Fallido.',
                        icon: "error",
                    });
                }
            })
            .fail(function(e) {
                console.log("error");
                console.log(e);
            })
        }
    };

    function ver_pdf_constancia_ges(id_ficha_atencion)
    {

        var variables = '';
        variables += '?id_ficha_atencion='+$('#id_fc').val();
        variables += '&nombre_institucion_ficha_ges='+$('#nombre_institucion_ficha_ges').val();
        variables += '&direccion_institucion_ficha_ges='+$('#direccion_institucion_ficha_ges').val();
        variables += '&nombre_responsable_ficha_ges='+$('#nombre_responsable_ficha_ges').val();
        variables += '&rut_responsable_ficha_ges='+$('#rut_responsable_ficha_ges').val();
        variables += '&confirmacion_diagnostica_ficha_ges='+$('#confirmacion_diagnostica_ficha_ges').val();
        variables += '&paciente_tratamiento_ficha_ges='+$('#paciente_tratamiento_ficha_ges').val();
        variables += '&fecha_ficha_ges='+$('#fecha_ficha_ges').val();
        variables += '&hora_ficha_ges='+$('#hora_ficha_ges').val();
        variables += '&id_ges_diagnostico='+$('#id_ges_diagnostico').val();
        variables += '&nombre_ges='+$('#nombre_ges').val();
        variables += '&funcionalidad='+$('#funcionalidad').val();

        Fancybox.show(
            [
                {
                src: '{{ route("ficha_atencion.vista.previa.pdf.ges") }}'+variables,
                type: "iframe",
                preload: false,
                },
            ]
        );
    }

</script>
