@extends('template.laboratorio.laboratorio_profesional.template')

@section('content')

    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold"></h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Carga de exámenes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <!--Tabla Carga de examentes-->
            <div class="row m-b-30">
                <div class="col-md-12">
                    <div class="card h-100 pb-0">
                        <div class="card-header text-center bg-c-info">
                            <div class="row">
                                <div class="col-sm-4 d-inline text-left">
                                    <h5 class="text-white my-2" style="font-size: 1.2rem;">Carga Exámenes</h5>
                                    <input type="hidden" name="lista_id_lugares" id="lista_id_lugares" value="{{ $array_lugares }}">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0 pt-4">
                            <div class="form-row pb-5">
                                <div class="form-group col-sm-12 col-md-3">
                                    <label class="floating-label-activo-sm">RUT Paciente</label>
                                    <input type="text" class="form-control form-control-sm" name="buscar_rut" id="buscar_rut" oninput="formatoRut(this)">
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <label class="floating-label-activo-sm">Nombre Paciente</label>
                                    <input type="text" class="form-control form-control-sm" name="buscar_nombre" id="buscar_nombre">
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <label class="floating-label-activo-sm">Apellido Paciente</label>
                                    <input type="text" class="form-control form-control-sm" name="buscar_apellido" id="buscar_apellido">
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <button type="button" class="btn btn-info btn-sm btn-block" onclick="buscar_pacientes();"><i class="feather icon-search"></i> Buscar</button>
                                </div>
                            </div>
                            <div class="dt-responsive table-responsive align-middle pb-0">
                                <table id="table_examenes_transcritos" class="table table-striped table-bordered nowrap table-xs" style="height: 100px">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">Fecha Atención</th>
                                            <th class="align-middle">Paciente</th>
                                            <th class="align-middle">Examen</th>
                                            <th class="align-middle">Acción</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                        @if (isset($horas_medicas))
                                            @foreach ($horas_medicas as $ex_t)
                                                @php
                                                    // Determinar qué tipo de ficha tiene
                                                    $ficha_id = null;
                                                    $ficha_paciente_id = null;
                                                    $ficha_profesional_id = null;
                                                    $tipo_ficha = null;

                                                    if ($ex_t->fichaotrosprofesionales) {
                                                        $ficha_id = $ex_t->fichaotrosprofesionales->id;
                                                        $ficha_paciente_id = $ex_t->fichaotrosprofesionales->id_paciente;
                                                        $ficha_profesional_id = $ex_t->fichaotrosprofesionales->id_profesional;
                                                        $tipo_ficha = 'otros_prof';
                                                    } elseif ($ex_t->fichaatencion) {
                                                        $ficha_id = $ex_t->fichaatencion->id;
                                                        $ficha_paciente_id = $ex_t->fichaatencion->id_paciente;
                                                        $ficha_profesional_id = $ex_t->fichaatencion->id_profesional;
                                                        $tipo_ficha = 'ficha_atencion';
                                                    } elseif ($ex_t->id_ficha_atencion) {
                                                        $ficha_id = $ex_t->id_ficha_atencion;
                                                        $ficha_paciente_id = $ex_t->id_paciente;
                                                        $ficha_profesional_id = $ex_t->id_profesional;
                                                        $tipo_ficha = 'ficha_atencion';
                                                    } elseif ($ex_t->id_ficha_otros_prof) {
                                                        $ficha_id = $ex_t->id_ficha_otros_prof;
                                                        $ficha_paciente_id = $ex_t->id_paciente;
                                                        $ficha_profesional_id = $ex_t->id_profesional;
                                                        $tipo_ficha = 'otros_prof';
                                                    }
                                                @endphp

                                                @if($ficha_id)
                                                <tr>
                                                    <td class="text-center align-left">
                                                        {{ date('d-m-Y', strtotime($ex_t->fecha_realizacion_consulta)) }}
                                                    </td>
                                                    <td class="text-center align-left">
                                                        {{ $ex_t->paciente->nombres.' '.$ex_t->paciente->apellido_uno }}<br/>
                                                        {{ $ex_t->paciente->rut }}
                                                    </td>
                                                    <td class="text-center align-left bg-estado-light-amarillo">
                                                        {{ $ex_t->procedimientocentro->nombre }}
                                                    </td>
                                                    <td class="text-center align-left bg-estado-light-amarillo">
                                                        <button type="button" class="btn btn-info-light-c btn-xxs" data-toggle="tooltip" data-placement="top" title="cargar archivo" onclick="abrir_subir_archivo('{{ $ex_t->id }}', '{{ $ficha_id }}', '{{ $ficha_paciente_id }}','{{ $ex_t->paciente->nombres.' '.$ex_t->paciente->apellido_uno }}', '{{ $ex_t->paciente->rut }}', '{{ $ficha_profesional_id }}', '{{ $ex_t->procedimientocentro->nombre }}', '{{ $tipo_ficha }}');"><i class="feather icon-upload"></i> Cargar archivo</button>
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->

    <div class="modal fade" id="m_subir_examen" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="m_subir_examen" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white mt-1">Transcribir Examen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_m_subir_examen();"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="m_subir_examen_id_hora" id="m_subir_examen_id_hora" value="">
                    <input type="hidden" name="m_subir_examen_id_ficha_otros_profesionales" id="m_subir_examen_id_ficha_otros_profesionales" value="">
                    <input type="hidden" name="m_subir_examen_id_paciente" id="m_subir_examen_id_paciente" value="">
                    <input type="hidden" name="m_subir_examen_id_profesional" id="m_subir_examen_id_profesional" value="">
                    <input type="hidden" name="m_subir_examen_tipo_ficha" id="m_subir_examen_tipo_ficha" value="">

                    <div id="m_subir_examen_contenido">
                        <div class="row ml-0 mr-0">
                            <div class="col-md-12">Nombre: <span id="m_subir_examen_paciente_nombre"></span></div>
                            <div class="col-md-12">RUT: <span id="m_subir_examen_paciente_rut"></span></div>
                            <div class="col-md-12">Examen: <span id="m_subir_examen_procedimiento"></span></div>
                        </div>
                        <div class="row ml-0 mr-0">
                            <input type="hidden" name="input_lista_archivo" id="input_lista_archivo" value="">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <!-- [ Main Content ] start -->
                                <div class="dropzone" id="mis-archivos" action="{{ route('profesional.archivo.carga') }}">
                                </div>
                                <!-- [ file-upload ] end -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger align-middle" onclick="cerrar_m_subir_examen()"; data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success align-middle" onclick="registrar_subir_examen()"; data-dismiss="modal">Guardar - Confirmar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        function abrir_subir_archivo(id_hora, id_ficha_otros_profesionales, id_paciente, paciente_nombre, paciente_rut, id_profesional, procedimiento, tipo_ficha)
        {
            $('#m_subir_examen_id_hora').val('');
            $('#m_subir_examen_id_ficha_otros_profesionales').val('');
            $('#m_subir_examen_id_paciente').val('');
            $('#m_subir_examen_id_profesional').val('');
            $('#m_subir_examen_tipo_ficha').val('');

            $('#m_subir_examen_paciente_nombre').html('');
            $('#m_subir_examen_paciente_rut').html('');
            $('#m_subir_examen_procedimiento').html('');

            myDropzone_Archivo.removeAllFiles(true);
            $('#input_lista_archivo').val('');


            $('#m_subir_examen_id_hora').val(id_hora);
            $('#m_subir_examen_id_ficha_otros_profesionales').val(id_ficha_otros_profesionales);
            $('#m_subir_examen_id_paciente').val(id_paciente);
            $('#m_subir_examen_id_profesional').val(id_profesional);
            $('#m_subir_examen_tipo_ficha').val(tipo_ficha || 'otros_prof'); // por defecto otros_prof para compatibilidad

            $('#m_subir_examen_paciente_nombre').html(paciente_nombre);
            $('#m_subir_examen_paciente_rut').html(paciente_rut);
            $('#m_subir_examen_procedimiento').html(procedimiento);

            $('#m_subir_examen').modal('show');
        }

        function registrar_subir_examen()
        {
            var _token = $('#_token').val();
            var id_hora = $('#m_subir_examen_id_hora').val();
            // NOTA: Este campo puede contener el ID de cualquier tipo de ficha (otros_prof o ficha_atencion)
            var id_ficha_otros_profesionales = $('#m_subir_examen_id_ficha_otros_profesionales').val();
            var id_paciente = $('#m_subir_examen_id_paciente').val();
            var id_profesional = $('#m_subir_examen_id_profesional').val();
            var tipo_ficha = $('#m_subir_examen_tipo_ficha').val();
            var lista_archivos = $('#input_lista_archivo').val();

            // Validar que se hayan seleccionado archivos
            if(!lista_archivos || lista_archivos === '[]' || lista_archivos === '') {
                swal({
                    title: "Advertencia",
                    text: "Debe seleccionar al menos un archivo para cargar",
                    icon: "warning",
                });
                return;
            }

            // Validar que exista el tipo de ficha
            if(!tipo_ficha) {
                console.error('❌ Error: tipo_ficha no definido');
                swal({
                    title: "Error",
                    text: "No se pudo determinar el tipo de ficha. Intente nuevamente.",
                    icon: "error",
                });
                return;
            }

            console.log('📤 Subiendo archivos para:', {
                tipo_ficha: tipo_ficha,
                id_ficha: id_ficha_otros_profesionales,
                id_paciente: id_paciente,
                cantidad_archivos: JSON.parse(lista_archivos).length
            });

            url = "{{ route('laboratorio.subir.examen') }}";
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token:_token,
                    id_hora:id_hora,
                    id_ficha_otros_profesionales:id_ficha_otros_profesionales, // Contiene el ID de la ficha (cualquier tipo)
                    id_paciente:id_paciente,
                    id_profesional:id_profesional,
                    tipo_ficha:tipo_ficha, // Indica el tipo: 'otros_prof' o 'ficha_atencion'
                    lista_archivos:lista_archivos,
                },
            })
            .done(function(data)
            {
                console.log('✅ Respuesta del servidor:', data);
                if(data.estado == 1)
                {
                    $('#m_subir_examen').modal('hide');

                    $('#m_subir_examen_id_hora').val('');
                    $('#m_subir_examen_id_ficha_otros_profesionales').val('');
                    $('#m_subir_examen_id_paciente').val('');
                    $('#m_subir_examen_id_profesional').val('');
                    $('#m_subir_examen_tipo_ficha').val('');

                    $('#m_subir_examen_paciente_nombre').html('');
                    $('#m_subir_examen_paciente_rut').html('');
                    $('#m_subir_examen_procedimiento').html('');

                    myDropzone_Archivo.removeAllFiles(true);
                    $('#input_lista_archivo').val('');

                    var rut = $('#buscar_rut').val();
                    var nombre = $('#buscar_nombre').val();
                    var apellido = $('#buscar_apellido').val();
                    cargar_tabla_examen(rut, nombre, apellido)

                    swal({
                        title: "Carga Archivo.",
                        text:"Carga Exitosa",
                        icon: "success",
                    });
                }
                else
                {
                    var mensaje = '';
                    if(data.error)
                    {
                        $.each(data.error, function (indexInArray, valueOfElement)
                        {
                            mensaje += valueOfElement+'\n';
                        });
                    }
                    else
                    {
                        mensaje += 'Intente nuevamente.';
                    }

                    swal({
                        title: "Carga Archivo.",
                        text: mensaje,
                        icon: "error",
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function cargar_tabla_examen(rut, nombre, apellido)
        {
            $('#table_examenes_transcritos tbody').html('');
            var lista_array = $('#lista_id_lugares').val();

            url = "{{ route('laboratorio.cargar.tabla.resultados') }}";
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    lista_array:lista_array,
                    rut:rut,
                    nombre:nombre,
                    apellido:apellido,
                },
            })
            .done(function(data)
            {
                console.log('-----------------------');
                console.log(data);
                console.log('-----------------------');
                if(data.estado == 1)
                {
                    $('#table_examenes_transcritos tbody').html('');
                    $.each(data.registros, function (index, value)
                    {
                        // Determinar si es ficha de otros profesionales o ficha de atención
                        var ficha_id, ficha_paciente_id, ficha_profesional_id, tipo_ficha;

                        // Verificar ficha de otros profesionales
                        if(value.ficha_otros_profesionales && value.ficha_otros_profesionales.id) {
                            // Es una ficha de otros profesionales (fonoaudiología, etc)
                            ficha_id = value.ficha_otros_profesionales.id;
                            ficha_paciente_id = value.ficha_otros_profesionales.id_paciente;
                            ficha_profesional_id = value.ficha_otros_profesionales.id_profesional;
                            tipo_ficha = 'otros_prof';
                        }
                        // Verificar ficha_atencion con relación cargada
                        else if(value.ficha_atencion && value.ficha_atencion.id) {
                            // Es una ficha de atención (laboratorio, rayos X, etc)
                            ficha_id = value.ficha_atencion.id;
                            ficha_paciente_id = value.ficha_atencion.id_paciente;
                            ficha_profesional_id = value.ficha_atencion.id_profesional;
                            tipo_ficha = 'ficha_atencion';
                        }
                        // Verificar si existe id_ficha_atencion aunque la relación no esté cargada
                        else if(value.id_ficha_atencion && value.id_ficha_atencion !== null) {
                            // Usar los IDs directamente de la hora médica
                            ficha_id = value.id_ficha_atencion;
                            ficha_paciente_id = value.id_paciente;
                            ficha_profesional_id = value.id_profesional;
                            tipo_ficha = 'ficha_atencion';
                            console.log('✅ Usando id_ficha_atencion directamente:', ficha_id);
                        }
                        // Verificar si existe id_ficha_otros_prof aunque la relación no esté cargada
                        else if(value.id_ficha_otros_prof && value.id_ficha_otros_prof !== null) {
                            // Usar los IDs directamente de la hora médica
                            ficha_id = value.id_ficha_otros_prof;
                            ficha_paciente_id = value.id_paciente;
                            ficha_profesional_id = value.id_profesional;
                            tipo_ficha = 'otros_prof';
                            console.log('✅ Usando id_ficha_otros_prof directamente:', ficha_id);
                        }
                        else {
                            // No hay ficha válida, saltar este registro
                            console.warn('⚠️ Registro sin ficha válida:', value);
                            return true; // continuar con el siguiente
                        }

                        var html = '';
                        html += '<tr>';
                        html += '    <td class="align-middle">';
                        html +=         value.fecha_realizacion_consulta;
                        html += '    </td>';
                        html += '    <td class="align-middle">';
                        html +=         value.paciente.nombres+' '+value.paciente.apellido_uno+'<br/>';
                        html +=         value.paciente.rut;
                        html += '    </td>';
                        html += '    <td class="align-middle bg-estado-light-amarillo">';
                        html +=         value.procedimiento_centro.nombre;
                        html += '    </td>';
                        html += '    <td class="text-center align-middle bg-estado-light-amarillo">';
                        html += '        <button type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="cargar archivo" onclick="abrir_subir_archivo(\''+value.id+'\', \''+ficha_id+'\', \''+ficha_paciente_id+'\',\''+value.paciente.nombres+' '+value.paciente.apellido_uno+'\', \''+value.paciente.rut+'\', \''+ficha_profesional_id+'\', \''+value.procedimiento_centro.nombre+'\', \''+tipo_ficha+'\');"><i class="feather icon-upload"></i> CARGAR ARCHIVO</button>';
                        html += '    </td>';
                        html += '</tr>';
                        $('#table_examenes_transcritos tbody').append(html);
                    });

                }
                else
                {
                    var mensaje = '';
                    if(data.error)
                    {
                        $.each(data.error, function (indexInArray, valueOfElement)
                        {
                            mensaje += valueOfElement+'\n';
                        });
                    }
                    else
                    {
                        mensaje += 'Intente nuevamente.';
                    }

                    swal({
                        title: "Carga tabla.",
                        text: mensaje,
                        icon: "error",
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function cerrar_m_subir_examen()
        {
            $('#m_subir_examen').modal('hide');
        }

        /************** ARCHIVO **************/
        var myDropzone_Archivo ;
        Dropzone.options.misArchivos = {
            init:function()
            {
                myDropzone_Archivo = this;
            },
            url: "{{ route('profesional.archivo.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
            },

            acceptedFiles: "application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*",
            maxFilesize: 4,
            maxFiles: 4,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre Archivo al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
            dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_archivo();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_archivo(myDropzone_Archivo,'');

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                // console.log('-------------error-----------------------');
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error)
                    {
                        message = message.error;
                    }
                    else
                    {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                // console.log('-------------removedfile-----------------------');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                cargar_lista_archivo(myDropzone_Archivo,'');
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_archivo(myDropzone_Archivo,'');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        var lista_archivo = {};
        function cargar_lista_archivo(obj_dropzone, alias_archivo)
        {
            // console.log('--------------cargar_lista_archivo----------------------');
            lista_archivo = [];
            $('#input_lista_archivo').val('');
            let temp  = obj_dropzone.getAcceptedFiles();
            $.each(temp, function( index, value )
            {
                if(value.status == "success")
                {
                    if(value.xhr !== undefined)
                    {
                        var archivo_temp = JSON.parse(value.xhr.response);
                        lista_archivo[index] = [
                            url = archivo_temp.archivo.url,
                            nombre_original = archivo_temp.archivo.original_file_name,
                            nombre_archivo = archivo_temp.archivo.nombre_archivo,
                            file_extension = archivo_temp.archivo.file_extension,
                        ];
                        $('#input_lista_archivo').val('');
                        $('#input_lista_archivo').val(JSON.stringify(lista_archivo));
                    }
                }
            });
        }
        /************** ARCHIVO **************/


        function buscar_pacientes()
        {
            var rut = $('#buscar_rut').val();
            var nombre = $('#buscar_nombre').val();
            var apellido = $('#buscar_apellido').val();

            cargar_tabla_examen(rut, nombre, apellido);
        }
    </script>
@endsection
