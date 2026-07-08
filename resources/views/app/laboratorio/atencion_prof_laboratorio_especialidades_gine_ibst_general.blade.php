{{-- @extends('template.otros_profesionales.template_fono') --}}
@extends('template.laboratorio.laboratorio_asistente.template')

@section('page-style')
    <style type="text/css">
        .ng_esp {
            /* Common */
        font : 13px 'Wingdings 3';
            color : #0000ff;
            width: 60px; background-color: #f6faf9; color: #FF0000;text-align:center; font-weight: bold; font-size: x-large;
            background-color: #f6faf9;
            text-align:center;
            font-weight: bold;
            display: block;
            width: 100%;
            padding: 0.4rem 0.5rem 0.3rem 0.5rem!important;
            font-size: 1.0rem;
            font-weight: 400;
            line-height: 1.5;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 3px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        @font-face {
            font-family: 'Wingdings 3';
        }

        /* Estilos para Dropzone */
        .dz-container {
            border: 2px dashed #007bff !important;
            border-radius: 5px !important;
            padding: 40px !important;
            text-align: center !important;
            background-color: #f8f9fa !important;
            cursor: pointer !important;
            transition: all 0.3s ease !important;
            min-height: 200px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .dz-container:hover {
            border-color: #0056b3 !important;
            background-color: #e7f1ff !important;
        }

        .dz-container.dz-drag-hover {
            border-color: #0056b3 !important;
            background-color: #e7f1ff !important;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.3) !important;
        }

        .dz-message {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            font-size: 18px !important;
            color: #495057 !important;
            font-weight: 500 !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .dz-preview {
            display: none;
        }

        /* Estilos para archivos adjuntos */
        .archivo-item {
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            background-color: #f8f9fa;
            transition: all 0.3s ease;
        }

        .archivo-item:hover {
            background-color: #e9ecef;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .archivo-nombre {
            font-weight: 600;
            color: #495057;
            margin-bottom: 5px;
        }

        .archivo-nombre i {
            margin-right: 8px;
        }

        .archivo-url {
            font-size: 0.85em;
            color: #6c757d;
            word-break: break-all;
        }

        /* Estilos para modal de imagen con zoom */
        #modalImagenZoom .modal-dialog {
            max-width: 90vw;
            margin: 1.75rem auto;
        }

        #contenedorImagenZoom {
            position: relative;
            overflow: hidden;
            background-color: #000;
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #imagenZoomeable {
            max-width: 100%;
            height: auto;
            cursor: zoom-in;
            transition: transform 0.3s ease;
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }

        #imagenZoomeable.zoomed {
            cursor: grab;
        }

        #imagenZoomeable.zoomed:active {
            cursor: grabbing;
        }

        .zoom-controls {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 10px;
            border-radius: 5px;
            z-index: 10;
        }

        .zoom-controls button {
            margin: 0 5px;
        }
    </style>
@endsection

@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="text-white d-inline f-16 mt-1"><strong>ATENCIÓN ECOTOMOGRAFÍAS</strong></h5>
                                <h6 class="mt-0 mb-0 text-white float-md-right">
                                  @php
                                    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                                    $fechaActual = \Carbon\Carbon::now();

                                    $mes = $meses[($fechaActual->format('n')) - 1];

                                    $fecha = $fechaActual->format('d') . ' de ' . $mes . ' de ' . $fechaActual->format('Y');

                                    $hora = $fechaActual->format('h:i A');

                                    $fechaCompleta = $fecha . ' - ' . strtolower($hora);
                                @endphp
                                {{ $fechaCompleta }}
                                </h6>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!-- TAB ATENCIÓN -->
            <div class="user-profile user-card pt-0 mb-3">
                <div class="card-body py-0">
                    <div class="user-about-block m-0">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link text-reset active" id="ficha_atenc_gral-tab" data-toggle="tab" href="#ficha_atenc_gral" role="tab" aria-controls="ficha_atenc_gral" aria-selected="true">Atención General</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" onclick="dame_atenciones_previas_lab()" role="tab" aria-controls="aten-previas" aria-selected="false" onclick="dame_atenciones_previas_lab()">Exámenes Previos</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tab general-->
            <!--Contenido de tab-->
            <form id="form_ficha_eco" action="{{ route('ficha.otro.prof.registrar_lab_eco') }}" method="POST">
                <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                <input type="hidden" name="id_examen" value="{{ $id_ficha_atencion }}" id="id_examen">
                <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                <input type="hidden" id="id_ficha_atencion_historial" value="">
                <input type="hidden" id="id_ficha_eco" value="{{ $hora_medica->id_ficha_otros_prof ?? '' }}">
                @csrf
                <div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
                    <div class="col-md-12 py-0 px-1 mt-n3">
                        <div class="row mx-0">
                            <div class="col-md-12">
                                <div class="tab-content mt-3" id="at-tecn_orl">

                                    {{-- ATENCIÓN GENERAL --}}
                                    <div class="tab-pane fade show active" id="ficha_atenc_gral" role="tabpanel" aria-labelledby="ficha_atenc_gral-tab">

                                        <div class="tab-content" id="tecn-orl-contenido">
                                            <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card-a">
                                                        <div class="card-header-a" id="sec_carga_archivo">
                                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#sec_carga_archivo_c" aria-expanded="false" aria-controls="sec_carga_archivo_c">
                                                                DERIVADO POR
                                                            </button>
                                                        </div>
                                                        <div id="sec_carga_archivo_c" class="collapse show" aria-labelledby="sec_carga_archivo" data-parent="#sec_carga_archivo">
                                                            <div class="card-body-aten-a">
                                                                {{-- derivado  por --}}
                                                                <div class="form-row" style="display: ;">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                        <label class="floating-label-activo-sm">Fecha de examen</label>
                                                                        <input type="date" class="form-control form-control-sm" name="fecha_ex" id="fecha_ex" value="{{ date('Y-m-d') }}" readonly>
                                                                    </div>
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                        <label class="floating-label-activo-sm">Examinador</label>
                                                                        <input type="text" class="form-control form-control-sm" name="profesional" id="profesional" value="Dr. {{ $profesional->apellido_uno }}" readonly>
                                                                    </div>
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                        <label class="floating-label-activo-sm">Nombre paciente</label>
                                                                        <input type="text" class="form-control form-control-sm" name="nombre_pcte" id="nombre_pcte" value="{{ $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos }}">
                                                                    </div>
                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                        <label class="floating-label-activo-sm">Edad</label>
                                                                        <input type="text" class="form-control form-control-sm" name="edad" id="edad" value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->age }}" readonly>
                                                                    </div>
                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                        <label class="floating-label-activo-sm">Rut</label>
                                                                        <input type="text" class="form-control form-control-sm" name="rut" id="rut" value="{{ $paciente->rut }}">
                                                                    </div>
                                                                    <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                        <label class="floating-label-activo-sm">Dirección</label>
                                                                        <input type="text" class="form-control form-control-sm" name="direccion" id="direccion"
                                                                        @if (isset($paciente))
                                                                            @if ($paciente->Direccion()->first() != null)
                                                                                value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}"
                                                                            @else
                                                                                value="NO HA REGISTRADO DIRECCIÓN !"
                                                                            @endif
                                                                        @else
                                                                            value="NO HA REGISTRADO DIRECCIÓN !"
                                                                        @endif
                                                                        readonly>
                                                                    </div>
                                                                    <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                        <label class="floating-label-activo-sm">Email</label>
                                                                        <input type="text" class="form-control form-control-sm" name="email" id="email" value="{{ $paciente->email }}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card-a">
                                                        <div class="card-header-a" id="sec_carga_archivo">
                                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#sec_carga_archivo_c" aria-expanded="false" aria-controls="sec_carga_archivo_c">
                                                                CARGAR IMAGENES Y/O ARCHIVOS (INFORME)
                                                            </button>
                                                        </div>
                                                        <div id="sec_carga_archivo_c" class="collapse show" aria-labelledby="sec_carga_archivo" data-parent="#sec_carga_archivo">
                                                            <div class="card-body-aten-a pb-3">
                                                                <div class="row">
                                                                    <input type="hidden" name="input_lista_archivo" id="input_lista_archivo" value="">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <!-- [ Main Content ] start -->
                                                                        <div class="dropzone" id="mis-archivos">
                                                                        </div>
                                                                        <!-- [ file-upload ] end -->
                                                                        <!-- Contenedor para mostrar archivos subidos -->
                                                                        <div id="contenedor-archivos-subidos" class="mt-3">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card-a">
                                                        <div class="card-header-a" id="sec_carga_archivo">
                                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#sec_carga_archivo_c" aria-expanded="false" aria-controls="sec_carga_archivo_c">
                                                                INFORME
                                                            </button>
                                                        </div>
                                                        <div class="card-body-aten-a">
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <textarea class="form-control caja-texto form-control-sm mb-9"  rows="15"  onfocus="this.rows=15" onblur="this.rows=15;" name="informe_radio" id="informe_radio" placeholder="Informe ginecológico IBST realizado"></textarea>
                                                                </div>                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-1">
                                                                        <div class="d-flex align-items-center">
                                                                            <button type="button" id="btn_dict_iniciar" class="btn btn-sm btn-success mr-1" onclick="dictado_iniciar()">
                                                                                <i class="feather icon-mic"></i> Iniciar Dictado
                                                                            </button>
                                                                            <button type="button" id="btn_dict_detener" class="btn btn-sm btn-danger mr-2" onclick="dictado_detener()" disabled>
                                                                                <i class="feather icon-mic-off"></i> Detener
                                                                            </button>
                                                                            <span id="dictado_estado_badge" class="badge badge-light">⏸ Detenido</span>
                                                                        </div>
                                                                        {{-- <button type="button" class="btn btn-sm btn-outline-warning" onclick="enviar_pdf_eco()">
                                                                            <i class="feather icon-send"></i> Enviar PDF a email
                                                                        </button> --}}
                                                                        <button type="button" id="btn-generar-pdf-eco" class="btn btn-sm btn-outline-primary" onclick="enviar_pdf_eco()">
                                                                            <i class="feather icon-file-text"></i> Generar PDF
                                                                        </button>
                                                                    </div>
                                                                    <div id="dictado_interim_preview" class="mt-1 text-muted small font-italic" style="display:none;"></div>
                                                                </div>                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    {{-- ATENCIONES PREVIAS --}}
                                    <div class="tab-pane fade show " id="aten-previas"  role="tabpanel" aria-labelledby="aten-previas-tab">
                                        <div class="row">
                                            <div class="col-12">
                                                <h6 class="f-20 text-c-blue mb-2 mt-3">Atenciones Previas</h6>
                                            </div>
                                            <div class="col-12">
                                                <div class="card-a">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                {{-- tabla --}}
                                                                <div class="table-responsive">
                                                                <table class="table table-hover" id="tabla_atenciones_previas_lab">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Fecha</th>
                                                                            <th>Hora</th>
                                                                            <th>Profesional</th>
                                                                            <th>Procedimientos</th>
                                                                            <th>Lugar de Atención</th>
                                                                            <th>Estado</th>
                                                                            <th>Informe</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="atenciones-previas-body">
                                                                        <!-- Contenido se llenará dinámicamente -->
                                                                    </tbody>
                                                                </table>
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

                <div class="row">
                    <!--GUARDAR O IMPRIMIR FICHA-->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-purple mt-1" onclick="guardar_ficha_eco(1)">
                                    <i class="feather icon-save"></i> Guardar y Finalizar Consulta
                                </button>
                                <button type="button" class="btn btn-success mt-1" onclick="guardar_ficha_eco(0)">
                                    <i class="feather icon-save"></i> Guardar e ir a su Agenda
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </form>
    </div>
</div>


{{-- Modal para visualizar PDF --}}
<div class="modal fade" id="modalPdfEco" tabindex="-1" aria-labelledby="modalPdfEcoLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="max-width: 90vw;">
        <div class="modal-content" style="height: 90vh;">
            <div class="modal-header py-2">
                <h5 class="modal-title" id="modalPdfEcoLabel">
                    <i class="feather icon-file-text"></i> Informe Ecotomografía
                </h5>
                <button type="button" class="btn-close" data-dismiss="modal" onclick="$('#modalPdfEco').modal('hide'); $('#iframePdfEco').attr('src', '');" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body p-0" style="height: calc(90vh - 56px);">
                <iframe id="iframePdfEco" src="" style="width: 100%; height: 100%; border: none;"></iframe>
            </div>
        </div>
    </div>
</div>

{{-- Modal para mostrar archivos adjuntos --}}
<div class="modal fade" id="modalArchivosAdjuntos" tabindex="-1" aria-labelledby="modalArchivosAdjuntosLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalArchivosAdjuntosLabel">
                    <i class="feather icon-paperclip"></i> Archivos Adjuntos
                </h5>
                <button type="button" class="btn-close" data-dismiss="modal" onclick="$('#modalArchivosAdjuntos').modal('hide'); $('#listaArchivosAdjuntos').empty();" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div id="listaArchivosAdjuntos">
                    <!-- Contenido se llenará dinámicamente -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal para visualizar imagen con zoom --}}
<div class="modal fade" id="modalImagenZoom" tabindex="-1" aria-labelledby="modalImagenZoomLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalImagenZoomLabel">
                    <i class="feather icon-image"></i> Visualizar Imagen
                </h5>
                <button type="button" class="btn-close" data-dismiss="modal" onclick="$('#modalImagenZoom').modal('hide'); $('#imagenZoomeable').attr('src', '');" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body p-0">
                <div id="contenedorImagenZoom">
                    <img id="imagenZoomeable" src="" alt="Imagen" />
                    <div class="zoom-controls">
                        <button type="button" class="btn btn-sm btn-light" id="btnZoomOut" title="Alejar">
                            <i class="feather icon-minus"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light" id="btnZoomReset" title="Restablecer">
                            <i class="feather icon-maximize"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light" id="btnZoomIn" title="Acercar">
                            <i class="feather icon-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a id="btnDescargarImagen" href="" download class="btn btn-primary">
                    <i class="feather icon-download"></i> Descargar
                </a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
    <script>
        // El template ya carga dropzone.js - solo deshabilitamos auto-discovery
        Dropzone.autoDiscover = false;

        // Limpiar iframe al cerrar modal PDF
        $('#modalPdfEco').on('hidden.bs.modal', function () {
            $('#iframePdfEco').attr('src', '');
        });

        // Variable para controlar si ya se está ejecutando la función
        var cargando_atenciones_previas = false;
        var dropzoneInstance = null;
        var archivosSubidos = [];

        $(document).ready(function () {
            $('#informe_radio').summernote();
            inicializar_dropzone();
        });

        // Inicializar Dropzone
        function inicializar_dropzone() {
            // Si ya existe una instancia, destruirla primero
            if (dropzoneInstance) {
                dropzoneInstance.destroy();
                dropzoneInstance = null;
            }

            // Configuración de Dropzone
            var config = {
                url: "{{ route('profesional.archivo.carga') }}",
                paramName: "file",
                maxFilesize: 50, // MB
                acceptedFiles: "image/*,application/pdf,.doc,.docx,.xls,.xlsx,.txt",
                addRemoveLinks: true,
                dictDefaultMessage: "📁 Haz clic o arrastra archivos aquí para subir",
                dictFallbackMessage: "Tu navegador no soporta drag and drop",
                dictInvalidFileType: "Tipo de archivo no permitido",
                dictCancelUpload: "Cancelar carga",
                dictRemoveFile: "Remover archivo",
                dictMaxFilesExceeded: "No puedes subir más archivos",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                init: function() {
                    dropzoneInstance = this;

                    this.on("success", function(file, response) {
                        console.log('Archivo cargado:', response);
                        if (response.status === 'success') {
                            archivosSubidos.push(response.data);
                            $('#input_lista_archivo').val(JSON.stringify(archivosSubidos));
                            // Mostrar archivo subido
                            mostrar_archivo_subido(response.data);
                        }
                    });

                    this.on("error", function(file, errorMessage) {
                        console.log('Error al cargar archivo:', errorMessage);
                        let mensajeError = 'Error al cargar el archivo';
                        if (typeof errorMessage === 'object' && errorMessage.errors) {
                            mensajeError = JSON.stringify(errorMessage.errors);
                        }
                        alert('Error: ' + mensajeError);
                    });

                    this.on("removedfile", function(file) {
                        console.log('Archivo eliminado:', file.name);
                        // Remover del array de archivos
                        archivosSubidos = archivosSubidos.filter(f => f.nombre !== file.name);
                        $('#input_lista_archivo').val(JSON.stringify(archivosSubidos));
                    });
                }
            };

            // Inicializar el Dropzone
            try {
                new Dropzone("#mis-archivos", config);
            } catch(e) {
                console.error('Error al inicializar Dropzone:', e);
            }
        }

        // Mostrar archivo subido
        function mostrar_archivo_subido(archivo) {
            const tipoArchivo = obtener_icono_archivo(archivo.nombre);
            const html = `
                <div class="archivo-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="feather icon-${tipoArchivo} mr-2 f-16"></i>
                        <div>
                            <div class="archivo-nombre">${archivo.nombre}</div>
                            <div class="archivo-url text-truncate" style="max-width: 300px;" title="${archivo.ruta}">
                                ${archivo.ruta}
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-sm btn-info mr-2" onclick="previsualizar_archivo('${archivo.ruta}')">
                            <i class="feather icon-eye"></i> Ver
                        </button>
                        <button type="button" class="btn btn-sm btn-danger" onclick="remover_archivo('${archivo.nombre}')">
                            <i class="feather icon-trash-2"></i> Remover
                        </button>
                    </div>
                </div>
            `;

            // Agregar al contenedor específico para archivos subidos
            let contenedor = document.querySelector('#contenedor-archivos-subidos');
            if (contenedor) {
                let div = document.createElement('div');
                div.innerHTML = html;
                contenedor.appendChild(div.firstElementChild);
            }
        }


        // Obtener icono según tipo de archivo
        function obtener_icono_archivo(nombre) {
            const extension = nombre.split('.').pop().toLowerCase();
            const iconos = {
                'pdf': 'file-text',
                'doc': 'file-text',
                'docx': 'file-text',
                'xls': 'file-text',
                'xlsx': 'file-text',
                'txt': 'file-text',
                'jpg': 'image',
                'jpeg': 'image',
                'png': 'image',
                'gif': 'image'
            };
            return iconos[extension] || 'file';
        }

        // Previsualizar archivo
        function previsualizar_archivo(ruta) {
            const extension = ruta.split('.').pop().toLowerCase();

            if (['jpg', 'jpeg', 'png', 'gif'].includes(extension)) {
                // Mostrar imagen en modal
                $('#imagenZoomeable').attr('src', ruta);
                $('#btnDescargarImagen').attr('href', ruta);
                $('#modalImagenZoom').modal('show');
            } else if (extension === 'pdf') {
                // Abrir PDF en nueva ventana
                window.open(ruta, '_blank');
            } else {
                // Descargar otros archivos
                window.location.href = ruta;
            }
        }

        // Remover archivo
        function remover_archivo(nombre) {
            if (confirm('¿Deseas remover este archivo?')) {
                archivosSubidos = archivosSubidos.filter(f => f.nombre !== nombre);
                $('#input_lista_archivo').val(JSON.stringify(archivosSubidos));
                // Remover del DOM
                document.querySelectorAll('.archivo-item').forEach(item => {
                    if (item.querySelector('.archivo-nombre').textContent === nombre) {
                        item.remove();
                    }
                });
            }
        }

         // Función auxiliar para obtener estado de atención
        function obtener_estado_atencion(id_estado) {
            const estados = {
                1: { texto: 'Agendada',    clase: 'secondary' },
                2: { texto: 'Confirmada',  clase: 'info' },
                3: { texto: 'Cancelada',   clase: 'danger' },
                4: { texto: 'En Progreso', clase: 'warning' },
                5: { texto: 'Realizada',   clase: 'success' },
                6: { texto: 'Finalizada',  clase: 'primary' }
            };

            let info = estados[id_estado] || { texto: 'Estado ' + id_estado, clase: 'light' };
            return `<span class="badge badge-${info.clase}">${info.texto}</span>`;
        }

        function dame_atenciones_previas_lab() {
            console.log('Cargando atenciones previas...');
        }

        function mostrar_informe(informe) {
            document.getElementById('contenidoInformeRadiologico').innerHTML = informe;
            $('#modalInformeRadiologico').modal('show');
        }

        // Zoom de imagen en modal
        let zoomLevel = 1;
        $('#imagenZoomeable').on('wheel', function(e) {
            e.preventDefault();
            if (e.originalEvent.deltaY < 0) {
                zoomLevel += 0.1;
            } else {
                zoomLevel = Math.max(1, zoomLevel - 0.1);
            }
            $(this).css('transform', `scale(${zoomLevel})`);
        });

        $('#btnZoomIn').click(function() {
            zoomLevel = Math.min(3, zoomLevel + 0.2);
            $('#imagenZoomeable').css('transform', `scale(${zoomLevel})`);
        });

        $('#btnZoomOut').click(function() {
            zoomLevel = Math.max(1, zoomLevel - 0.2);
            $('#imagenZoomeable').css('transform', `scale(${zoomLevel})`);
        });

        $('#btnZoomReset').click(function() {
            zoomLevel = 1;
            $('#imagenZoomeable').css('transform', `scale(1)`);
        });

        // =====================================================================
        // DICTADO POR VOZ
        // =====================================================================
        var _reconocimiento = null;
        var _dictando       = false;

        function dictado_iniciar() {
            var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
            if (!SpeechRecognition) {
                $('#dictado_estado_badge').removeClass('badge-light badge-success badge-danger')
                    .addClass('badge-danger').text('❌ No compatible');
                alert('Tu navegador no soporta dictado por voz. Usa Chrome o Edge.');
                return;
            }

            _reconocimiento = new SpeechRecognition();
            _reconocimiento.lang           = 'es-CL';
            _reconocimiento.continuous     = true;
            _reconocimiento.interimResults = true;

            _reconocimiento.onstart = function () {
                _dictando = true;
                $('#btn_dict_iniciar').prop('disabled', true);
                $('#btn_dict_detener').prop('disabled', false);
                $('#dictado_estado_badge').removeClass('badge-light badge-danger')
                    .addClass('badge-success').html('🎙️ Escuchando…');
                $('#dictado_interim_preview').show();
            };

            _reconocimiento.onresult = function (event) {
                var textoFinal   = '';
                var textoInterim = '';
                for (var i = event.resultIndex; i < event.results.length; i++) {
                    if (event.results[i].isFinal) {
                        textoFinal += event.results[i][0].transcript;
                    } else {
                        textoInterim += event.results[i][0].transcript;
                    }
                }
                $('#dictado_interim_preview').text(textoInterim ? '💬 ' + textoInterim : '');
                if (textoFinal) {
                    // Insertar texto en Summernote
                    var contenidoActual = $('#informe_radio').summernote('code');
                    if (contenidoActual === '<p><br></p>' || contenidoActual === '') {
                        $('#informe_radio').summernote('code', '<p>' + textoFinal + '</p>');
                    } else {
                        // Agregar al final del contenido existente
                        var contenidoLimpio = contenidoActual.replace(/<\/p>$/, '');
                        $('#informe_radio').summernote('code', contenidoLimpio + ' ' + textoFinal + '</p>');
                    }
                    $('#dictado_interim_preview').text('');
                }
            };

            _reconocimiento.onend = function () {
                if (_dictando) {
                    try { _reconocimiento.start(); } catch(e) {}
                } else {
                    $('#dictado_estado_badge').removeClass('badge-success badge-danger')
                        .addClass('badge-light').text('⏸ Detenido');
                    $('#dictado_interim_preview').hide().text('');
                    $('#btn_dict_iniciar').prop('disabled', false);
                    $('#btn_dict_detener').prop('disabled', true);
                }
            };

            _reconocimiento.onerror = function (event) {
                if (event.error === 'no-speech') return;
                $('#dictado_estado_badge').removeClass('badge-success badge-light')
                    .addClass('badge-danger').text('❌ Error: ' + event.error);
                _dictando = false;
                $('#btn_dict_iniciar').prop('disabled', false);
                $('#btn_dict_detener').prop('disabled', true);
            };

            _reconocimiento.start();
        }

        function dictado_detener() {
            _dictando = false;
            if (_reconocimiento) {
                try { _reconocimiento.stop(); } catch(e) {}
            }
        }

        // Guardar ficha de ecotomografía
        function guardar_ficha_eco(cerrar) {
            var $form = $('#form_ficha_eco');

            // Obtener informe desde Summernote o textarea
            var informe = '';
            if ($('#informe_radio').data('summernote')) {
                informe = $('#informe_radio').summernote('code');
            } else {
                informe = $('#informe_radio').val();
            }

            if (!informe || informe.trim() === '' || informe === '<p><br></p>') {
                alert('Por favor ingrese el informe antes de guardar.');
                return;
            }

            $('#cerrarsession').val(cerrar);

            var formData = $form.serializeArray();
            // Reemplazar el valor de informe_radio con el contenido del editor
            formData = formData.filter(function(f){ return f.name !== 'informe_radio'; });
            formData.push({ name: 'informe_radio', value: informe });

            var btn = cerrar == 1
                ? $('button.btn-purple')
                : $('button.btn-success');
            btn.prop('disabled', true).prepend('<i class="feather icon-loader"></i> ');

            $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: $.param(formData),
                success: function(response) {
                    console.log('Respuesta guardar ficha eco:', response);
                    btn.prop('disabled', false);
                    if (response.estado == 1 && response.redirect) {
                        var redirectUrl = response.redirect;
                        var mensaje = response.msj
                            ? response.msj.replace(/\\n/g, '\n')
                            : 'Ficha guardada correctamente.';
                        swal({
                            title: '¡Guardado!',
                            text: mensaje,
                            type: 'success',
                            timer: 2500,
                            showConfirmButton: false
                        });
                        setTimeout(function() {
                            window.location.href = redirectUrl;
                        }, 2600);
                    } else {
                        alert('Error: ' + (response.msj || 'Error desconocido'));
                    }
                },
                error: function(xhr) {
                    console.log('Error al guardar ficha eco:', xhr.responseText);
                    btn.prop('disabled', false);
                    alert('Error al guardar la ficha. Intente nuevamente.');
                    console.error('Error guardar ficha eco:', xhr.responseText);
                }
            });
        }

        // Generar PDF del informe de ecotomografía
        function generar_pdf_gine_historial(id_ficha, btn) {
            if (!id_ficha) {
                alert('No se encontró el ID de la ficha.');
                return;
            }

            var $btn = $(btn);
            $btn.prop('disabled', true).html('<i class="feather icon-loader"></i>');

            $.ajax({
                url: '{{ route("ficha.otro.prof.pdf_lab_eco") }}',
                type: 'POST',
                data: {
                    id_ficha: id_ficha,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Respuesta PDF gine historial:', response);
                    $btn.prop('disabled', false).html('<i class="feather icon-file-text"></i>');
                    if (response.estado == 1 && response.pdf_url) {
                        $('#iframePdfEco').attr('src', response.pdf_url);
                        $('#modalPdfEco').modal('show');
                    } else {
                        alert('Error al generar el PDF: ' + (response.msj || 'Error desconocido'));
                    }
                },
                error: function(xhr) {
                    $btn.prop('disabled', false).html('<i class="feather icon-file-text"></i>');
                    alert('Error al generar el PDF. Por favor intente nuevamente.');
                    console.error('Error PDF gine historial:', xhr.responseText);
                }
            });
        }

        function generar_pdf_eco() {
            var id_ficha = $('#id_ficha_eco').val();
            if (!id_ficha) {
                alert('No se encontró el ID de la ficha. Por favor recargue la página.');
                return;
            }

            // Obtener el contenido del editor Summernote o del textarea directamente
            var informe_texto = '';
            if ($('#informe_radio').data('summernote')) {
                informe_texto = $('#informe_radio').summernote('code');
            } else {
                informe_texto = $('#informe_radio').val();
            }

            if (!informe_texto || informe_texto.trim() === '' || informe_texto === '<p><br></p>') {
                alert('Por favor ingrese el informe antes de generar el PDF.');
                return;
            }

            var btn = $('#btn-generar-pdf-eco');
            btn.prop('disabled', true).html('<i class="feather icon-loader"></i> Generando...');

            $.ajax({
                url: '{{ route("ficha.otro.prof.pdf_lab_eco") }}',
                type: 'POST',
                data: {
                    id_ficha: id_ficha,
                    informe_texto: informe_texto,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Respuesta PDF eco:', response);
                    btn.prop('disabled', false).html('<i class="feather icon-file-text"></i> Generar PDF');
                    if (response.estado == 1 && response.pdf_url) {
                        $('#iframePdfEco').attr('src', response.pdf_url);
                        $('#modalPdfEco').modal('show');
                    } else {
                        alert('Error al generar el PDF: ' + (response.msj || 'Error desconocido'));
                    }
                },
                error: function(xhr) {
                    btn.prop('disabled', false).html('<i class="feather icon-file-text"></i> Generar PDF');
                    alert('Error al generar el PDF. Por favor intente nuevamente.');
                    console.error('Error PDF eco:', xhr.responseText);
                }
            });
        }

        // Enviar PDF de ecotomografía por email al paciente
        function enviar_pdf_eco() {
            var id_ficha = $('#id_ficha_eco').val();

            if (!id_ficha) {
                swal({
                    title: "Información",
                    text: "El informe de ecotomografía aún no ha sido registrado. Por favor, haga clic en 'Generar PDF' primero.",
                    icon: "info",
                });
                return;
            }

            // Obtener el contenido del editor Summernote o del textarea directamente
            var informe_texto = '';
            if ($('#informe_radio').data('summernote')) {
                informe_texto = $('#informe_radio').summernote('code');
            } else {
                informe_texto = $('#informe_radio').val();
            }

            if (!informe_texto || informe_texto.trim() === '' || informe_texto === '<p><br></p>') {
                swal({
                    title: "Información",
                    text: "Por favor ingrese el informe antes de enviar el PDF por email.",
                    icon: "info",
                });
                return;
            }

            let url = "{{ route('ficha.otro.prof.enviar_pdf_eco') }}";

            // Mostrar indicador de carga
            let btn = $('button:contains("Enviar PDF")');
            btn.prop('disabled', true).prepend('<i class="feather icon-loader"></i> ');

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    id_ficha: id_ficha,
                    informe_texto: informe_texto,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
            })
            .done(function(response) {
                console.log('Respuesta enviar PDF eco:', response);
                btn.prop('disabled', false).find('i').remove();

                if (response['estado'] == 1) {
                    let mensaje = response['msj'] || 'PDF generado y enviado correctamente al paciente.';
                    swal({
                        title: "Éxito",
                        text: mensaje,
                        icon: "success",
                    });
                    // Mostrar el PDF en el modal
                    if (response['pdf_url']) {
                        $('#iframePdfEco').attr('src', response['pdf_url']);
                        $('#modalPdfEco').modal('show');
                    }
                } else {
                    swal({
                        title: "Error",
                        text: response['msj'] || 'No se pudo enviar el PDF por email',
                        icon: "error",
                    });
                }
            })
            .fail(function(e) {
                console.log("Error al enviar PDF eco:");
                console.log(e);
                btn.prop('disabled', false).find('i').remove();
                swal({
                    title: "Error",
                    text: "No se pudo enviar el PDF por email. Por favor intente nuevamente.",
                    icon: "error",
                });
            });
        }

        function dame_atenciones_previas_lab(){
            // Evitar múltiples ejecuciones simultáneas
            if (cargando_atenciones_previas) {
                console.log('⏳ Ya se están cargando las atenciones previas...');
                return;
            }

            cargando_atenciones_previas = true;

            let id_profesional = $('#id_profesional_fc').val();
            let id_paciente = $('#id_paciente_fc').val();
            let id_hora = $('#hora_medica').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let id_ficha_atencion = $('#id_fc').val();
            let url = "{{ route('laboratorio.profesional.dame_atenciones_previas_lab')}}";
            let data = {
                id_profesional: id_profesional,
                id_paciente: id_paciente,
                id_hora: id_hora,
                id_lugar_atencion: id_lugar_atencion,
                id_ficha_atencion: id_ficha_atencion,
                _token: CSRF_TOKEN
            };

            console.log('📋 Buscando atenciones previas...');

            // LIMPIEZA COMPLETA ANTES DE EMPEZAR
            // Destruir DataTable si ya existe
            if ($.fn.DataTable.isDataTable('#tabla_atenciones_previas_lab')) {
                $('#tabla_atenciones_previas_lab').DataTable().destroy();
                console.log('🗑️ DataTable anterior destruido');
            }

            // Limpiar completamente el tbody
            $('#atenciones-previas-body').empty();
            console.log('🧹 Tbody limpiado');

            $.ajax({
                url: url,
                type: "GET",
                data: data,
            })
            .done(function(response) {
                console.log('✅ Respuesta atenciones previas:', response);

                if(response.estado === 1){
                    let atenciones = response.atenciones || [];

                    // Asegurar que el tbody esté vacío
                    $('#atenciones-previas-body').empty();

                    let tabla;

                    if(atenciones.length > 0) {
                        // Hay datos - crear filas HTML primero
                        atenciones.forEach(function(atencion){
                            // Formatear fecha con mejor legibilidad
                            let fechaPartes = atencion.fecha_consulta.split('-');
                            let fechaObj = new Date(fechaPartes[0], fechaPartes[1] - 1, fechaPartes[2]); // Año, Mes-1, Día
                            let fecha = fechaObj.toLocaleDateString('es-CL', {
                                day: '2-digit',
                                month: '2-digit',
                                year: 'numeric'
                            });

                            // Formatear hora con rango
                            let hora_inicio = atencion.hora_inicio ? atencion.hora_inicio.substring(0, 5) : '';
                            let hora_termino = atencion.hora_termino ? atencion.hora_termino.substring(0, 5) : '';
                            let hora = hora_inicio;
                            if (hora_termino && hora_termino !== hora_inicio) {
                                hora += ` - ${hora_termino}`;
                            }
                            if (!hora) hora = 'N/A';

                            // Profesional con información adicional
                            let profesional = atencion.profesional ?
                                `${atencion.profesional.nombre} ${atencion.profesional.apellido_uno}` :
                                `Profesional ${atencion.id_profesional}`;

                            let lugar_atencion = atencion.lugar_atencion.nombre || `Lugar ${atencion.id_lugar_atencion}`;

                            // Obtener estado usando la función auxiliar
                            let estado = obtener_estado_atencion(atencion.id_estado);

                            // Información adicional en tooltips
                            let info_adicional = [];
                            if(atencion.motivo) {
                                info_adicional.push(`Motivo: ${atencion.motivo}`);
                            }

                            // Usar los procedimientos que vienen del backend
                            if(atencion.procedimientos && atencion.procedimientos.length > 0) {
                                let procedimientos_nombres = atencion.procedimientos.map(proc => proc.descripcion).join(', ');
                                info_adicional.push(`Procedimientos: ${procedimientos_nombres}`);
                            } else if(atencion.procedimientos_texto && atencion.procedimientos_texto.trim() !== '') {
                                info_adicional.push(`Procedimientos: ${atencion.procedimientos_texto}`);
                            } else if(atencion.id_procedimiento) {
                                // Fallback al mapeo manual si no vienen los procedimientos del backend
                                let procedimientos = mapear_procedimientos(atencion.id_procedimiento);
                                info_adicional.push(`Procedimientos: ${procedimientos}`);
                            }

                            if(atencion.hipotesis_diagnostico) {
                                info_adicional.push(`Diagnóstico: ${atencion.hipotesis_diagnostico}`);
                            }

                            let tooltip = info_adicional.length > 0 ?
                                `title="${info_adicional.join(' | ')}"` : '';

                            // Icono de archivo si existe
                            let archivo_icono = '';
                            if(atencion.archivo && atencion.archivo !== 'null') {
                                // Codificar los datos del archivo para pasarlos al modal
                                let archivoData = encodeURIComponent(atencion.archivo);
                                archivo_icono = ` <i class="feather icon-paperclip text-info cursor-pointer"
                                    title="Ver archivos adjuntos"
                                    onclick="mostrarArchivosAdjuntos('${archivoData}', '${fecha}', '${profesional.replace(/'/g, "\\'")}')"></i>`;
                            }

                            // Preparar texto de procedimientos para mostrar en la tabla
                            let procedimientos_tabla = '';
                            if(atencion.procedimientos && atencion.procedimientos.length > 0) {
                                // Mostrar hasta 2 procedimientos en la tabla, si hay más agregar indicador
                                let procs_mostrar = atencion.procedimientos.slice(0, 2);
                                procedimientos_tabla = procs_mostrar.map(proc =>
                                    `<span class="badge badge-light" title="${proc.descripcion || proc.nombre}${proc.nombre && proc.descripcion ? ` (${proc.nombre})` : ''}">${proc.descripcion || proc.nombre}</span>`
                                ).join(' ');
                                if(atencion.procedimientos.length > 2) {
                                    let restantes = atencion.procedimientos.length - 2;
                                    procedimientos_tabla += ` <small class="text-muted">+${restantes} más</small>`;
                                }
                            } else if(atencion.procedimientos_texto && atencion.procedimientos_texto.trim() !== '') {
                                // Fallback si no hay array de procedimientos pero sí texto
                                let texto = atencion.procedimientos_texto.length > 30
                                    ? atencion.procedimientos_texto.substring(0, 30) + '...'
                                    : atencion.procedimientos_texto;
                                procedimientos_tabla = `<span class="badge badge-secondary" title="${atencion.procedimientos_texto}">${texto}</span>`;
                            } else {
                                procedimientos_tabla = '<span class="text-muted">N/A</span>';
                            }

                            // Preparar botón de informe
                            let boton_informe = '';
                            let id_ficha_gine = atencion.id_ficha_otros_prof;
                            let hipotesis = atencion.hipotesis_diagnostico;
                            if(id_ficha_gine && hipotesis && hipotesis.replace(/<[^>]*>/g,'').trim() !== '') {
                                boton_informe = `<button type="button" class="btn btn-sm btn-info"
                                    onclick="generar_pdf_gine_historial('${id_ficha_gine}', this)"
                                    title="Generar PDF del informe">
                                        <i class="feather icon-file-text"></i>
                                </button>`;
                            } else {
                                boton_informe = '<span class="text-muted"><small>Sin informe</small></span>';
                            }

                            // Crear fila HTML directamente
                            let filaHtml = `
                                <tr>
                                    <td><span ${tooltip}>${fecha}</span></td>
                                    <td>${hora}</td>
                                    <td>${profesional}${archivo_icono}</td>
                                    <td>${procedimientos_tabla}</td>
                                    <td>${lugar_atencion}</td>
                                    <td>${estado}</td>
                                    <td>${boton_informe}</td>
                                </tr>
                            `;
                            $('#atenciones-previas-body').append(filaHtml);
                        });

                        // Inicializar DataTable después de agregar todas las filas
                        tabla = $('#tabla_atenciones_previas_lab').DataTable({
                            language: {
                                url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
                            },
                            responsive: true,
                            pageLength: 10,
                            order: [[0, 'desc']] // Ordenar por fecha descendente
                        });

                        console.log(`✅ Se cargaron ${atenciones.length} atenciones previas`);
                    } else {
                        // No hay datos - mostrar mensaje sin DataTable
                        $('#atenciones-previas-body').html(`
                            <tr>
                                <td colspan="6" class="text-center text-muted py-3">
                                    <i class="feather icon-calendar f-18 d-block mb-2"></i>
                                    No hay atenciones previas registradas
                                </td>
                            </tr>
                        `);
                        console.log('ℹ️ No hay atenciones previas');
                    }
                } else {
                    console.error('❌ Error en la respuesta:', response.mensaje);
                    swal('Error', response.mensaje || 'No se pudieron obtener las atenciones previas', 'error');

                    // Mostrar mensaje de error en la tabla
                    $('#atenciones-previas-body').html(`
                        <tr>
                            <td colspan="6" class="text-center text-warning py-3">
                                <i class="feather icon-alert-circle f-18 d-block mb-2"></i>
                                ${response.mensaje || 'Error al obtener las atenciones previas'}
                            </td>
                        </tr>
                    `);
                }

                // Restablecer variable de control
                cargando_atenciones_previas = false;
            })
            .fail(function(jqXHR) {
                console.error('❌ Error al obtener atenciones previas:', jqXHR);
                swal('Error', 'No se pudo comunicar con el servidor para obtener las atenciones previas', 'error');

                // Limpiar DataTable si existe
                if ($.fn.DataTable.isDataTable('#tabla_atenciones_previas_lab')) {
                    $('#tabla_atenciones_previas_lab').DataTable().destroy();
                }

                // Mostrar mensaje de error en la tabla
                $('#atenciones-previas-body').html(`
                    <tr>
                        <td colspan="6" class="text-center text-danger py-3">
                            <i class="feather icon-alert-triangle f-18 d-block mb-2"></i>
                            Error al cargar atenciones previas
                        </td>
                    </tr>
                `);

                // Restablecer variable de control
                cargando_atenciones_previas = false;
            });
        }
    </script>
@endsection
