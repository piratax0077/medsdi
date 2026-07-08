<div id="form_ges" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="form_ges" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Constancia GES (Artículo 24 Ley 19.966)</h5>
                 <button type="button" class="close text-white" data-dismiss="modal" onclick="$('#form_ges').modal('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Seleccione Patología Ges</label>
                            <input type="text" class="form-control form-control-sm" name="nombre_ges" id="nombre_ges">
                            <input type="hidden" class="form-control form-control-sm" name="id_ges" id="id_ges">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                        <ul class="nav nav-tabs-aten nav-fill" id="form-ges" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="inf-prestador-tab" data-toggle="tab" href="#inf-prestador" role="tab" aria-controls="inf-prestador" aria-selected="true">Info. del prestador</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="inf-pcte-tab" data-toggle="tab" href="#inf-pcte" role="tab" aria-controls="inf-pcte" aria-selected="true">Info. del Paciente</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="inf-med-tab" data-toggle="tab" href="#inf-med" role="tab" aria-controls="info-med" aria-selected="true">Info. Médica</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="const-tab" data-toggle="tab" href="#const" role="tab" aria-controls="const" aria-selected="true">Constancia</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="form-ges">
                            <!--INFO PRESTADOR-->
                            <div class="tab-pane fade show active" id="inf-prestador" role="tabpanel" aria-labelledby="inf-prestador-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="t-aten-dos">Información del Prestador</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                		<div class="card-informacion">
                                			<div class="card-body">
                                				 <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0">
		                                            @if(isset($lugar_atencion))
		                                            <ul>
		                                                <li><strong>Nombre Institución:  </strong><span>{{ $lugar_atencion->nombre }}</span>
		                                                    <input type="hidden" name="nombre_institucion_ficha_ges" id="nombre_institucion_ficha_ges" value="{{ $lugar_atencion->nombre }}"></li>
		                                                <li><strong>Profesional:  </strong><span>{{ $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos }}</span></li>
		                                                <li><strong>Teléfono:  </strong><span>{{ $profesional->telefono_uno }}</span></li>
		                                                <li><strong>Dirección:  </strong>{{--  <span>{{ $profesional->Direccion()->first()->direccion .' ' .$profesional->Direccion()->first()->numero_dir .', Región de ' .$profesional->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre .' ' .$profesional->Direccion()->first()->Ciudad()->first()->nombre }}</span>  --}}
		                                                    <span>{{ $lugar_atencion->Direccion()->first()->direccion .' ' .$lugar_atencion->Direccion()->first()->numero_dir .', Región de ' .$lugar_atencion->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre .' ' .$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre }}</span>
		                                                    <input type="hidden" name="direccion_institucion_ficha_ges" id="direccion_institucion_ficha_ges" value="{{ $lugar_atencion->Direccion()->first()->direccion .' ' .$lugar_atencion->Direccion()->first()->numero_dir .', Región de ' .$lugar_atencion->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre .' ' .$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre }}">
		                                                </li>
		                                            </ul>
		                                            @endif
		                                        </div>
                                			</div>
                                		</div>
                                	</div>
                                </div>
                            </div>
                            <!--INFO PACIENTE-->
                            <div class="tab-pane fade show" id="inf-pcte" role="tabpanel" aria-labelledby="inf-pcte-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="t-aten-dos">Información del Paciente</h6>
                                    </div>
                                </div>
                                <div class="form-row">
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
										<div class="card-informacion">
											<div class="card-body">
												 <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0">
												 	<ul>
		                                                <li><strong>Nombre:  </strong><span>{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos  }}</span>
		                                                    <input type="hidden" name="nombre_paciente_ficha_ges" id="nombre_paciente_ficha_ges" value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}" >
		                                                </li>
		                                                <li>
		                                                    <strong>Rut:  </strong><span>{{ $paciente->rut }}</span>
		                                                    <input type="hidden" name="rut_paciente_ficha_ges" id="rut_paciente_ficha_ges" value="{{ $paciente->rut }}" >
		                                                </li>
		                                                <li>
		                                                    <strong>Previsión:  </strong>
		                                                    <span>
		                                                        @if(isset($prevision))
		                                                        @foreach ($prevision as $previ)
		                                                            @if ($previ->id == $paciente->Prevision()->first()->id)
		                                                                {{ $previ->nombre }}
		                                                                <input type="hidden" name="prevision_ficha_ges" id="prevision_ficha_ges" value="{{ $paciente->Prevision()->first()->id }}">
		                                                            @endif
		                                                        @endforeach
		                                                        @endif
		                                                    </span>
		                                                </li>
		                                                <li>
															<strong>Dirección:  </strong>
															@if( $paciente->id_direccion )
																<span>{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}</span>
																<input type="hidden" name="direccion_paciente" id="direccion_paciente" value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}" ></li>
															@else
																<span></span>
																<input type="hidden" name="direccion_paciente" id="direccion_paciente" value="" ></li>
															@endif
		                                                <li><strong>Correo electrónico:  </strong><span>{{ $paciente->email }}</span>
		                                                    <input type="hidden" name="email_paciente" value="{{ $paciente->email }}" id="email_paciente" >
		                                                </li>
		                                                <li><strong>Teléfono:  </strong><span>{{ $paciente->telefono_uno }}</span>
		                                                    <input type="hidden" name="telefono_paciente" value="{{ $paciente->telefono_uno }}" id="telefono_paciente" >
		                                                </li>
		                                            <ul>
												 </div>
											</div>
										</div>
									</div>
								</div>
                           </div>
                           <!--INFO MEDICA-->
                           <div class="tab-pane fade show" id="inf-med" role="tabpanel" aria-labelledby="inf-med-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="t-aten-dos">Información Médica</h6>
                                    </div>
                                </div>
                                <div class="form-row">
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
										<div class="card-informacion">
											<div class="card-body pb-0">
												<div class="form-row">
												 	<div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
				                                        <label class="floating-label-activo-sm">Confirmación diagnóstica GES</label>
				                                        <input type="text" class="form-control form-control-sm" name="confirmacion_diagnostica_ficha_ges" id="confirmacion_diagnostica_ficha_ges">
				                                    </div>
				                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
				                                        <label class="floating-label-activo-sm">¿Paciente con tratamiento?</label>
				                                        <input type="text" class="form-control form-control-sm" name="paciente_tratamiento_ficha_ges" id="paciente_tratamiento_ficha_ges">
				                                    </div>
												</div>
											</div>
										</div>
									</div>
								</div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="t-aten-dos">Fecha Notificación</h6>
                                    </div>
                                </div>
                            	<div class="form-row">
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
										<div class="card-informacion">
											<div class="card-body">
												 <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0">
			                                        <div class="badge badge-info pb-0">
			                                            <h5 class="mb-0 text-white">
			                                                {{ Carbon\Carbon::now()->timezone('America/Santiago')->format('d-m-Y H:i') }}
			                                            </h5>
			                                        </div>
			                                    </div>
											</div>
										</div>
									</div>
								</div>
                            </div>
                            <!--CONSTANCIA-->
                           <div class="tab-pane fade show" id="const" role="tabpanel" aria-labelledby="const-tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="text-c-blue t-aten-dos">Constancia</h6>
                                    </div>
                                </div>
                                <div class="form-row">
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
										<div class="card-informacion">
											<div class="card-body px-1 pt-2">
												 <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
												 	<h6 class="text-c-blue mb-1">
		                                                Si desea adjuntar un documento arrastre el archivo en el recuadro.
		                                              </h6>
		                                            <div class=" text-justify pt-3 pb-1" role="alert">
		                                                <input type="hidden" name="input_lista_archivo_ges" id="input_lista_archivo_ges" value="">
                                                <input type="hidden" id="id_ges_diagnostico_email" name="id_ges_diagnostico_email" value="">
                                                <div class="dropzone" id="mis-archivos-ges" action="{{ route('profesional.imagen.carga') }}"></div>
                                            </div>
												 </div>
												 <div class="col-sm-12 col-md-12 text-center">
		                                            <button type="button" class="btn btn-primary mt-2 mb-2" onclick="ver_pdf_constancia_ges();"><i class="feather icon-file"></i> Ver PDF</button>
		                                            <button type="button" class="btn btn-warning mt-2 mb-2" onclick="enviar_ges_email();"><i class="feather icon-mail"></i> Enviar PDF</button>
		                                               <button type="button" class="btn btn-info mt-2 mb-2" onclick="registrar_ges_ficha();"><i class="feather icon-save"></i> Guardar / Enviar Notificación</button>
		                                        </div>
											</div>
										</div>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    /** INICIALIZACIÓN DROPZONE PARA GES */
    var dropzone_ges = null;
    var lista_archivo_ges = {};

    function inicializar_dropzone_ges() {
        if (typeof Dropzone === 'undefined') {
            console.error("Dropzone no está definido, reintentando...");
            //setTimeout(inicializar_dropzone_ges, 500);
            return;
        }

        if (dropzone_ges) {
            dropzone_ges.destroy();
        }

        Dropzone.autoDiscover = false;

        dropzone_ges = new Dropzone("#mis-archivos-ges", {
            url: "{{ route('profesional.imagen.carga') }}",
            paramName: "file",
            maxFilesize: 10, // MB
            acceptedFiles: ".pdf,.doc,.docx,.jpg,.jpeg,.png,.xlsx,.xls,.csv",
            addRemoveLinks: true,
            removeLinks: true,
            autoProcessQueue: true,
            parallelUploads: 1,
            uploadMultiple: false,
            maxFiles: 5,
            dictDefaultMessage: "Arrastre archivos aquí o haga clic para seleccionar",
            dictFallbackMessage: "Tu navegador no soporta arrastrar y soltar archivos.",
            dictFallbackText: "Por favor usa el formulario para subir tus archivos.",
            dictFileTooBig: "El archivo es demasiado grande (MB máximo).",
            dictInvalidFileType: "No puedes subir archivos de este tipo.",
            dictResponseError: "El servidor respondió con el código ",
            dictCancelUpload: "Cancelar subida",
            dictUploadCanceled: "Subida cancelada.",
            dictCancelMultipleUpload: "Cancelar todas las subidas",
            dictCancelMultipleUploads: "Cancelar todas las subidas",
            dictRemoveFile: "Eliminar archivo",
            dictRemoveFileConfirmation: null,
            dictMaxFilesExceeded: "No puedes subir más archivos.",

            // Success callback
            success: function(file, response) {
                console.log("Archivo subido exitosamente:", response);
                cargar_lista_archivo_ges(dropzone_ges, 'ges_documento');
            },

            // Error callback
            error: function(file, errorMessage, xhr) {
                console.log("Error al subir archivo:", errorMessage);
                swal({
                    title: "Error en la subida",
                    text: errorMessage,
                    icon: "error",
                });
            },

            // Complete callback
            complete: function(file) {
                console.log("Archivo procesado:", file.name);
            },

            // Removed file callback
            removedfile: function(file) {
                file.previewElement.remove();
                cargar_lista_archivo_ges(dropzone_ges, 'ges_documento');
            }
        });
    }

    // Inicializar cuando el modal se abre
    if (typeof $ !== 'undefined') {
        $(document).on('show.bs.modal', '#form_ges', function() {
            setTimeout(inicializar_dropzone_ges, 100);
        });
    }

    // También intentar inicializar después de que cargue la página
    window.addEventListener('load', function() {
        setTimeout(inicializar_dropzone_ges, 500);
    });

    /** MANEJO DE IMAGENES GES */
    function cargar_lista_archivo_ges(obj_dropzone, alias_examen)
    {
        console.log('--------------cargar_lista_archivo_ges----------------------');
        lista_archivo_ges[alias_examen] = [];
        let temp  = obj_dropzone.getAcceptedFiles();

        $.each(temp, function( index, value )
        {
            if(value.status == "success")
            {
                if(value.xhr !== undefined && value.xhr.response)
                {
                    try {
                        var archivo_temp = JSON.parse(value.xhr.response);
                        console.log('Respuesta parseada del servidor:', archivo_temp);

                        // Guardar la respuesta completa tal como viene del servidor
                        lista_archivo_ges[alias_examen][index] = archivo_temp;

                        console.log('Archivo agregado (respuesta completa):', archivo_temp);

                        $('#input_lista_archivo_ges').val(JSON.stringify(lista_archivo_ges));
                        console.log('JSON actualizado en input:', JSON.stringify(lista_archivo_ges));

                    } catch(e) {
                        console.error('Error al parsear respuesta del archivo:', e);
                        console.error('Respuesta cruda:', value.xhr.response);

                        // Si no es JSON válido, guardar como está
                        lista_archivo_ges[alias_examen][index] = {
                            raw_response: value.xhr.response,
                            file_name: value.name
                        };
                        $('#input_lista_archivo_ges').val(JSON.stringify(lista_archivo_ges));
                    }
                }
            }
        });

        console.log('Lista final de archivos GES:', lista_archivo_ges);
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

        // lista_archivo_ges
        let lista_archivo_ges = $('#input_lista_archivo_ges').val();
        console.log('Archivos GES JSON:', lista_archivo_ges);
        console.log('Archivos GES parseados:', lista_archivo_ges ? JSON.parse(lista_archivo_ges) : null);

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

        // Validación de archivos
        if(!lista_archivo_ges || lista_archivo_ges.trim() == '' || lista_archivo_ges == '{}')
        {
            mensaje += ' Debe agregar al menos un archivo adjunto.\n' ;
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
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
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
                    codigo_verificacion : '',
                    lista_archivo_ges : lista_archivo_ges,
                },
                beforeSend: function() {
                    console.log('Enviando datos a servidor...');
                    console.log('Payload:', {
                        nombre_ges: nombre_ges,
                        id_ges: id_ges,
                        archivos: lista_archivo_ges,
                        id_paciente: id_paciente,
                    });
                }
            })
            .done(function(resp) {
                console.log('Respuesta del servidor:', resp);

                if (resp != '')
                {
                    if(resp.estado == 1)
                    {
                        console.log('Registro GES exitoso:', resp);
                            // ✅ Guardar el ID del diagnóstico GES registrado
                            if (resp['id_ges_diagnostico']) {
                                $('#id_ges_diagnostico_email').val(resp['id_ges_diagnostico']);
                            }
                        $('#rut_responsable_ficha_ges').val('');
                        $('#confirmacion_diagnostica_ficha_ges').val('');
                        $('#paciente_tratamiento_ficha_ges').val('');
                        $('#input_lista_archivo_ges').val('');
                        $('#codigo_validacion_informe_ges').val('');

                        // Limpiar Dropzone
                        if (dropzone_ges) {
                            dropzone_ges.removeAllFiles(true);
                            console.log('Dropzone limpiado');
                        }

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
                        console.error('Error en registro:', resp.mensaje || resp);
                        swal({
                            title: "Constancia GES (Artículo 24 Ley 19.966).",
                            text: 'Registro Fallido: ' + (resp.mensaje || 'Error desconocido'),
                            icon: "error",
                        });
                    }
                }
                else
                {
                    console.error('Respuesta vacía del servidor');
                    swal({
                        title: "Constancia GES (Artículo 24 Ley 19.966).",
                        text: 'Registro Fallido - Respuesta vacía',
                        icon: "error",
                    });
                }
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                console.error('Error en AJAX:', {
                    status: jqXHR.status,
                    statusText: textStatus,
                    error: errorThrown,
                    response: jqXHR.responseText
                });
                swal({
                    title: "Error al guardar GES",
                    text: 'Error: ' + textStatus + ' - ' + errorThrown,
                    icon: "error",
                });
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

    // ✅ NUEVA FUNCIÓN: Enviar Constancia GES por Email
    function enviar_ges_email()
    {
        let id_ges_diagnostico = $('#id_ges_diagnostico_email').val();

        if (!id_ges_diagnostico) {
            swal({
                title: "Información",
                text: "La constancia GES aún no ha sido registrada. Por favor, haga clic en 'Guardar / Enviar Notificación' primero.",
                icon: "info",
            });
            return;
        }

        let url = "{{ route('ficha_atencion.enviar_ges_email') }}";

        $.ajax({
            url: url,
            type: 'GET',
            data: {
                id_ges_diagnostico: id_ges_diagnostico
            },
        })
        .done(function(response) {
            if (response['estado'] == '1') {
                swal({
                    title: "Éxito",
                    text: response['msj'],
                    icon: "success",
                });
            } else {
                swal({
                    title: "Error",
                    text: response['msj'],
                    icon: "error",
                });
            }
        })
        .fail(function(e) {
            console.log("error");
            console.log(e);
            swal({
                title: "Error",
                text: "No se pudo enviar la constancia GES",
                icon: "error",
            });
        });
    }

</script>
