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
                                <h5 class="text-white d-inline f-16 mt-1"><strong>ATENCIÓN LABORATORIO RADIOLOGIA</strong></h5>
                                <h6 class="mt-0 mb-0 text-white float-md-right">
                                    @php
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        $fecha = \Carbon\Carbon::parse(now());
                                        $mes = $meses[($fecha->format('n')) - 1];
                                        $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                                    @endphp
                                    {{ $fecha }}
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
                                        <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false" onclick="dame_atenciones_previas_lab()">Exámenes Previos</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tab general-->
            <!--Contenido de tab-->
            <form action="{{ route('ficha.otro.prof.registrar_lab_rayos') }}" method="POST">
                <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                <input type="hidden" name="id_examen" value="{{ $id_ficha_atencion }}" id="id_examen">
                <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                <input type="hidden" id="id_ficha_atencion_historial" value="">
                @csrf
                <div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
                    <div class="col-md-12 py-0 px-1 mt-n3">
                        <div class="row mx-0">
                                    <div class="col-md-12">
                                        <div class="tab-content mt-3" id="at-tecn_orl">

                                            {{-- Atención General --}}
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
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-7 col-xl-7">
                                                                                {{-- <label class="floating-label-activo-sm">Derivado por:</label> --}}
                                                                                {{-- <input type="text" class="form-control form-control-sm" name="derivado_por" id="derivado_por" value=""> --}}
                                                                                {{-- <div class="row">
                                                                                    <div class="col-sm-6">
                                                                                        <input type="hidden" name="solicitado_id_profesional" id="solicitado_id_profesional" value="">
                                                                                        <label class="floating-label-activo-sm">Derivado por RUT:</label>
                                                                                        <input type="text" class="form-control form-control-sm" name="derivado_por_rut" id="derivado_por_rut" value=""
                                                                                            onblur="cargar_profesional(this,'derivado_por', 'solicitado_id_profesional', 'div_profesional_no_inscrito');"
                                                                                            onkeyup="cargar_profesional(this,'derivado_por', 'solicitado_id_profesional', 'div_profesional_no_inscrito');"
                                                                                            oninput="formatoRut(this);"
                                                                                        >

                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="floating-label-activo-sm">Nombre:</label>
                                                                                        <input type="text" class="form-control form-control-sm" name="derivado_por" id="derivado_por" value="">
                                                                                    </div>
                                                                                    <div class="form-group col-md-12" id="div_mensaje"  style="display: none;">
                                                                                        <span style="font-size: 10px;color: #ff0808;" id="mensaje_solicitado_por"></span>
                                                                                    </div>
                                                                                </div> --}}
                                                                                <div class="row mt-3" id="div_profesional_no_inscrito" style="display: none;">

                                                                                    <div class="form-group col-md-3">
                                                                                        <label class="floating-label-activo-sm">Nombre</label>
                                                                                        <input type="text" class="form-control form-control-sm"  name="solicitado_nombre" id="solicitado_nombre" onchange="actualizar_solicitado_por('derivado_por', 'solicitado_nombre', 'solicitado_apellido');">
                                                                                    </div>
                                                                                    <div class="form-group col-md-3">
                                                                                        <label class="floating-label-activo-sm">Apellido</label>
                                                                                        <input type="text" class="form-control form-control-sm"  name="solicitado_apellido" id="solicitado_apellido" onchange="actualizar_solicitado_por('derivado_por', 'solicitado_nombre', 'solicitado_apellido');">
                                                                                    </div>
                                                                                    <div class="form-group col-md-3">
                                                                                        <label class="floating-label-activo-sm">Telefono</label>
                                                                                        <input type="text" class="form-control form-control-sm"  name="solicitado_telefono" id="solicitado_telefono" >
                                                                                    </div>
                                                                                    <div class="form-group col-md-3">
                                                                                        <label class="floating-label-activo-sm">Email</label>
                                                                                        <input type="text" class="form-control form-control-sm"  name="solicitado_email" id="solicitado_email" >
                                                                                    </div>

                                                                                </div>
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
                                                                        INFORME RADIOLÓGICO
                                                                    </button>
                                                                </div>
                                                                <div class="card-body-aten-a">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <textarea class="form-control caja-texto form-control-sm mb-9"  rows="15"  onfocus="this.rows=15" onblur="this.rows=15;" name="informe_radio" id="informe_radio" placeholder="Informe de examen realizado"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="card-a">
                                                                <div class="card-header-a" id="sec_carga_archivo">
                                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#sec_carga_archivo_c" aria-expanded="false" aria-controls="sec_carga_archivo_c">
                                                                        CARGA DE ARCHIVOS
                                                                    </button>
                                                                </div>
                                                                <div id="sec_carga_archivo_c" class="collapse show" aria-labelledby="sec_carga_archivo" data-parent="#sec_carga_archivo">
                                                                    <div class="card-body-aten-a pb-3">
                                                                        <div class="row">
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- atenciones previas --}}
                                            {{-- <div class="tab-pane fade show " id="aten-previas" role="tabpanel" aria-labelledby="aten-previas-tab">
                                            </div> --}}
{{-- atenciones previas --}}
                                <div class="tab-pane fade show " id="aten-previas"  role="tabpanel" aria-labelledby="aten-previas-tab">
                                    <div class="row">
                                        <div class="col-12 pl-0">
                                            <h6 class="tit-gen mb-2 mt-3">Atenciones Previas</h6>
                                        </div>
                                        <div class="card-a">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        {{-- tabla --}}
                                                        <table class="table table-hover table-responsive" id="tabla_atenciones_previas_lab">
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



                <div class="row">
                    <!--GUARDAR O IMPRIMIR FICHA-->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <input type="submit" class="btn btn-purple mt-1" onclick="$('#cerrarsession').val('1');" value="Guardar y Finalizar su Consulta">
                                <input type="submit" class="btn btn-success mt-1" onclick="" value="Guardar e ir a su Agenda">
                            </div>
                        </div>
                    </div>
                </div>
                             </div>
                </div>

            </form>
        </div>
    </div>
    <!-- SIDE BAR FONO -->
    {{-- base de botones de sidebar --}}
    {{-- @include("atencion_otros_prof.modales") --}}
    {{-- modales y data de sidebar especialidad --}}
    {{-- @include("atencion_otros_prof.include.sidebar_derecho_fono") --}}
{{-- Modal para mostrar archivos adjuntos --}}
<div class="modal fade" id="modalArchivosAdjuntos" tabindex="-1" aria-labelledby="modalArchivosAdjuntosLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalArchivosAdjuntosLabel">
                    <i class="feather icon-paperclip"></i> Archivos Adjuntos
                </h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
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

{{-- Modal para mostrar informe radiológico --}}
<div class="modal fade" id="modalInformeRadiologico" tabindex="-1" aria-labelledby="modalInformeRadiologicoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalInformeRadiologicoLabel">
                    <i class="feather icon-file-text"></i> Informe Radiológico
                </h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="contenidoInformeRadiologico">
                    <!-- Contenido se llenará dinámicamente -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnDescargarInformePDF">
                    <i class="feather icon-download"></i> Descargar PDF
                </button>
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
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
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

        // Variable para controlar si ya se está ejecutando la función
        var cargando_atenciones_previas = false;

        $(document).ready(function () {
            $('#informe_radio').summernote();
        });

         // Función auxiliar para obtener estado de atención
        function obtener_estado_atencion(id_estado, finalizada) {
            const estados = {
                1: { texto: 'Agendada', clase: 'secondary' },
                2: { texto: 'Confirmada', clase: 'info' },
                3: { texto: 'Cancelada', clase: 'danger' },
                4: { texto: 'En Progreso', clase: 'warning' },
                5: { texto: 'Realizada', clase: 'success' },
                6: { texto: 'Finalizada', clase: 'primary' }
            };

            let estado_info = estados[id_estado] || { texto: `Estado ${id_estado}`, clase: 'light' };

            // Si está finalizada, darle prioridad
            if (finalizada == 1) {
                estado_info = { texto: 'Finalizada', clase: 'primary' };
            }

            return `<span class="badge badge-${estado_info.clase}">${estado_info.texto}</span>`;
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
                            let estado = obtener_estado_atencion(atencion.id_estado, atencion.finalizada);

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
                            if(atencion.informe_rayos && atencion.informe_rayos.informe && atencion.informe_rayos.informe.trim() !== '') {
                                // Codificar el informe para pasarlo de forma segura
                                let informeEncoded = encodeURIComponent(atencion.informe_rayos.informe);
                                boton_informe = `<button type="button" class="btn btn-sm btn-info"
                                    onclick="mostrarInformeRadiologico('${informeEncoded}', '${fecha}', '${profesional.replace(/'/g, "\\'")}', '${atencion.id}')" >
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


        function cargar_profesional(rut, input_nombre, input_id, div_solicitar)
        {
            rut = $(rut).val();

            // console.log('------------------------------------');
            // console.log(rut.length);
            // console.log(rut);
            // console.log('------------------------------------');

            if(rut.length>5)
            {
                url = "{{ route('profesional.buscar') }}";
                $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        rut : rut,
                    },
                })
                .done(function(data)
                {
                    // console.log('-----------------------');
                    // console.log(data);
                    // console.log('-----------------------');
                    if(data.estado == 1)
                    {

                        if(data.registros.length>0)
                        {
                            var nombre = data.registros[0].nombre+' '+data.registros[0].apellido_uno;
                            var id = data.registros[0].id;
                            // $('#'+input_nombre).attr('readonly', true);
                            $('#'+input_nombre).val(nombre);
                            $('#'+input_id).val(id);
                            $('#'+div_solicitar).hide();
                            mensaje = '';
                            $('#div_mensaje').hide();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_nombre').val('');
                            $('#solicitado_apellido').val('');
                            $('#solicitado_telefono').val('');
                            $('#solicitado_email').val('');
                        }
                        else
                        {
                            mensaje = 'Profesional no encontrato, debe ingresar datos.';
                            $('#'+input_nombre).val('');
                            $('#'+input_id).val('');
                            $('#'+div_solicitar).show();
                            $('#div_mensaje').show();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_nombre').val('');
                            $('#solicitado_apellido').val('');
                            $('#solicitado_telefono').val('');
                            $('#solicitado_email').val('');
                            $('#'+input_nombre).attr('readonly', true);
                        }
                    }
                    else
                    {
                        mensaje = 'Se presento un problema en la busqueda intente nuevamente';
                        $('#div_mensaje').show();
                        $('#mensaje_solicitado_por').html(mensaje);
                        $('#'+input_nombre).attr('readonly', false);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
            else if(rut.length==0)
            {
                $('#'+input_nombre).val('');
                // $('#'+input_nombre).attr('readonly', true);
                $('#'+input_id).val('');
                $('#'+div_solicitar).hide();
                $('#div_mensaje').hide();
                $('#mensaje_solicitado_por').html('');
            }
        }

        function mostrarArchivosAdjuntos(archivoDataEncoded, fecha, profesional) {
            try {
                // Decodificar los datos del archivo
                let archivoDataString = decodeURIComponent(archivoDataEncoded);
                let archivos = JSON.parse(archivoDataString);

                console.log('📎 Mostrando archivos adjuntos:', archivos);

                // Actualizar el título del modal
                $('#modalArchivosAdjuntosLabel').html(`
                    <i class="feather icon-paperclip"></i> Archivos Adjuntos
                    <small class="text-muted d-block" style="font-size: 0.8em;">
                        ${fecha} - ${profesional}
                    </small>
                `);

                // Limpiar el contenido previo
                $('#listaArchivosAdjuntos').empty();

                if (Array.isArray(archivos) && archivos.length > 0) {
                    // Generar HTML para cada archivo
                    archivos.forEach((archivo, index) => {
                        let extension = archivo.nombre ? archivo.nombre.split('.').pop().toLowerCase() : '';
                        let iconoArchivo = obtenerIconoArchivo(extension);
                        let esImagen = esArchivoImagen(extension);

                        // Crear botones según el tipo de archivo
                        let botonesHtml = '';
                        if (archivo.url) {
                            // Botón de visualización para imágenes
                            if (esImagen) {
                                botonesHtml += `
                                    <button type="button" class="btn btn-sm btn-outline-success mr-2"
                                        onclick="visualizarImagen('${archivo.url}', '${archivo.nombre || 'Imagen'}')"
                                        title="Visualizar imagen con zoom">
                                        <i class="feather icon-eye"></i> Ver
                                    </button>
                                `;
                            }
                            // Botón de descarga siempre disponible
                            botonesHtml += `
                                <a href="${archivo.url}" target="_blank" class="btn btn-sm btn-outline-primary" title="Descargar archivo">
                                    <i class="feather icon-download"></i> Descargar
                                </a>
                            `;
                        } else {
                            botonesHtml = '<span class="text-muted">No disponible</span>';
                        }

                        let archivoHtml = `
                            <div class="archivo-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="flex-grow-1">
                                        <div class="archivo-nombre">
                                            <i class="${iconoArchivo}"></i>
                                            ${archivo.nombre || 'Archivo sin nombre'}
                                            ${esImagen ? '<span class="badge badge-success ml-2">Imagen</span>' : ''}
                                        </div>
                                        <div class="archivo-url">
                                            ${archivo.url || 'URL no disponible'}
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 ml-3">
                                        ${botonesHtml}
                                    </div>
                                </div>
                            </div>
                        `;

                        $('#listaArchivosAdjuntos').append(archivoHtml);
                    });
                } else {
                    $('#listaArchivosAdjuntos').html(`
                        <div class="text-center text-muted py-4">
                            <i class="feather icon-file-text f-48 d-block mb-3" style="font-size: 3rem; opacity: 0.5;"></i>
                            <p>No hay archivos adjuntos disponibles</p>
                        </div>
                    `);
                }

                // Mostrar el modal usando Bootstrap 5
                const modalArchivos = new bootstrap.Modal(document.getElementById('modalArchivosAdjuntos'));
                modalArchivos.show();

            } catch (error) {
                console.error('❌ Error al procesar archivos adjuntos:', error);
                swal('Error', 'No se pudieron cargar los archivos adjuntos', 'error');
            }
        }

        // Función para detectar si un archivo es una imagen
        function esArchivoImagen(extension) {
            const imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'svg', 'tiff', 'tif', 'ico'];
            return imageExtensions.includes(extension.toLowerCase());
        }

        // Función para visualizar imagen con zoom
        function visualizarImagen(urlImagen, nombreImagen) {
            try {
                console.log('🖼️ Visualizando imagen:', urlImagen);

                // Actualizar título del modal
                $('#modalImagenZoomLabel').html(`
                    <i class="feather icon-image"></i> ${nombreImagen}
                `);

                // Establecer la imagen
                $('#imagenZoomeable').attr('src', urlImagen);
                $('#btnDescargarImagen').attr('href', urlImagen);
                $('#btnDescargarImagen').attr('download', nombreImagen);

                // Mostrar el modal usando Bootstrap 5
                const modalImagen = new bootstrap.Modal(document.getElementById('modalImagenZoom'));
                modalImagen.show();

            } catch (error) {
                console.error('❌ Error al visualizar imagen:', error);
                swal('Error', 'No se pudo cargar la imagen', 'error');
            }
        }

        function obtenerIconoArchivo(extension) {
            const iconos = {
                'pdf': 'feather icon-file-text text-danger',
                'doc': 'feather icon-file-text text-primary',
                'docx': 'feather icon-file-text text-primary',
                'xls': 'feather icon-file-text text-success',
                'xlsx': 'feather icon-file-text text-success',
                'jpg': 'feather icon-image text-warning',
                'jpeg': 'feather icon-image text-warning',
                'png': 'feather icon-image text-warning',
                'gif': 'feather icon-image text-warning',
                'zip': 'feather icon-archive text-secondary',
                'rar': 'feather icon-archive text-secondary',
                'txt': 'feather icon-file-text text-muted'
            };

            return iconos[extension] || 'feather icon-file text-info';
        }

        function mostrarInformeRadiologico(informeEncoded, fecha, profesional, id_ficha_atencion_historial) {
            try {
                // Decodificar el informe
                let informe = decodeURIComponent(informeEncoded);
                console.log('📄 Mostrando informe radiológico:', informe);
                console.log('🔑 ID Ficha Atención Historial:', id_ficha_atencion_historial);

                // Guardar el id de la ficha de atención del historial
                $('#id_ficha_atencion_historial').val(id_ficha_atencion_historial);

                // Actualizar el título del modal
                $('#modalInformeRadiologicoLabel').html(`
                    <i class="feather icon-file-text"></i> Informe Radiológico
                    <small class="text-muted d-block" style="font-size: 0.8em;">
                        ${fecha} - ${profesional}
                    </small>
                `);

                // Mostrar el informe directamente
                if(informe && informe.trim() !== '') {
                    $('#contenidoInformeRadiologico').html(`
                        <div class="informe-radiologico p-3" style="background-color: #f8f9fa; border-radius: 5px;">
                            ${informe}
                        </div>
                    `);
                } else {
                    $('#contenidoInformeRadiologico').html(`
                        <div class="text-center text-muted py-4">
                            <i class="feather icon-file-text f-48 d-block mb-3" style="font-size: 3rem; opacity: 0.5;"></i>
                            <p>No hay informe disponible para esta atención</p>
                        </div>
                    `);
                }

                // Configurar botón de descarga PDF
                $('#btnDescargarInformePDF').off('click').on('click', function() {
                    let id_ficha = $('#id_ficha_atencion_historial').val();
                    ver_pdf_informe_radiologico(id_ficha);
                });

                // Mostrar u ocultar el botón de descarga según si hay informe
                if(informe && informe.trim() !== '') {
                    $('#btnDescargarInformePDF').show();
                } else {
                    $('#btnDescargarInformePDF').hide();
                }

                // Mostrar el modal usando Bootstrap 5
                const modalInforme = new bootstrap.Modal(document.getElementById('modalInformeRadiologico'));
                modalInforme.show();

            } catch (error) {
                console.error('❌ Error al mostrar informe radiológico:', error);
                swal('Error', 'No se pudo cargar el informe radiológico', 'error');
            }
        }

        function descargarInformePDF(informeHTML, fecha, profesional) {
            try {
                console.log('📄 Generando PDF del informe...');

                // Obtener datos del paciente
                let pacienteNombre = '{{ $paciente->nombre ?? "" }} {{ $paciente->apellido_uno ?? "" }} {{ $paciente->apellido_dos ?? "" }}';
                let pacienteRut = '{{ $paciente->rut ?? "" }}';

                // Crear un contenedor temporal para renderizar el HTML con estilos
                let contenedorTemp = document.createElement('div');
                contenedorTemp.style.cssText = `
                    position: absolute;
                    left: -9999px;
                    top: 0;
                    width: 800px;
                    background: white;
                    padding: 40px;
                    font-family: Arial, sans-serif;
                `;

                // Crear el contenido completo del PDF con encabezado
                contenedorTemp.innerHTML = `
                    <div style="padding: 20px;">
                        <div style="text-align: center; margin-bottom: 30px; border-bottom: 3px solid #4CAF50; padding-bottom: 15px;">
                            <h1 style="color: #2c3e50; margin: 0; font-size: 28px; font-weight: bold;">INFORME RADIOLÓGICO</h1>
                        </div>

                        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 25px; border-left: 4px solid #4CAF50;">
                            <h3 style="color: #2c3e50; margin-top: 0; font-size: 18px; border-bottom: 2px solid #dee2e6; padding-bottom: 10px;">Datos del Paciente</h3>
                            <table style="width: 100%; margin-top: 15px;">
                                <tr>
                                    <td style="padding: 8px 0; font-weight: bold; color: #495057; width: 150px;">Nombre:</td>
                                    <td style="padding: 8px 0; color: #212529;">${pacienteNombre}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; font-weight: bold; color: #495057;">RUT:</td>
                                    <td style="padding: 8px 0; color: #212529;">${pacienteRut}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; font-weight: bold; color: #495057;">Fecha de atención:</td>
                                    <td style="padding: 8px 0; color: #212529;">${fecha}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; font-weight: bold; color: #495057;">Profesional:</td>
                                    <td style="padding: 8px 0; color: #212529;">${profesional}</td>
                                </tr>
                            </table>
                        </div>

                        <div style="margin-top: 25px;">
                            <h3 style="color: #2c3e50; font-size: 18px; border-bottom: 2px solid #dee2e6; padding-bottom: 10px; margin-bottom: 20px;">Contenido del Informe</h3>
                            <div style="background-color: white; padding: 20px; border: 1px solid #dee2e6; border-radius: 5px; min-height: 200px; line-height: 1.6;">
                                ${informeHTML}
                            </div>
                        </div>

                        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #dee2e6; text-align: center; color: #6c757d; font-size: 12px;">
                            <p style="margin: 5px 0;">Generado el ${new Date().toLocaleDateString('es-CL')} a las ${new Date().toLocaleTimeString('es-CL')}</p>
                        </div>
                    </div>
                `;

                document.body.appendChild(contenedorTemp);

                // Mostrar indicador de carga
                swal({
                    title: 'Generando PDF',
                    text: 'Por favor espere...',
                    icon: 'info',
                    buttons: false,
                    closeOnClickOutside: false,
                    closeOnEsc: false
                });

                // Usar html2canvas para capturar el HTML con estilos
                html2canvas(contenedorTemp, {
                    scale: 2, // Mejor calidad
                    useCORS: true,
                    logging: false,
                    backgroundColor: '#ffffff',
                    windowWidth: 800,
                    onclone: function(clonedDoc) {
                        // Asegurar que los estilos se apliquen correctamente
                        let clonedElement = clonedDoc.querySelector('div[style*="position: absolute"]');
                        if (clonedElement) {
                            clonedElement.style.left = '0';
                            clonedElement.style.position = 'relative';
                        }
                    }
                }).then(canvas => {
                    // Remover el contenedor temporal
                    document.body.removeChild(contenedorTemp);

                    // Crear el PDF
                    const { jsPDF } = window.jspdf;
                    const imgData = canvas.toDataURL('image/png');

                    // Calcular dimensiones
                    const imgWidth = 210; // A4 width in mm
                    const pageHeight = 297; // A4 height in mm
                    const imgHeight = (canvas.height * imgWidth) / canvas.width;

                    // Crear el documento PDF
                    const doc = new jsPDF('p', 'mm', 'a4');
                    let heightLeft = imgHeight;
                    let position = 0;

                    // Agregar la primera página
                    doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;

                    // Agregar páginas adicionales si es necesario
                    while (heightLeft > 0) {
                        position = heightLeft - imgHeight;
                        doc.addPage();
                        doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                        heightLeft -= pageHeight;
                    }

                    // Generar nombre del archivo
                    const nombreArchivo = `Informe_Radiologico_${pacienteRut.replace(/\./g, '').replace(/-/g, '')}_${fecha.replace(/\//g, '-')}.pdf`;

                    // Descargar el PDF
                    doc.save(nombreArchivo);

                    console.log('✅ PDF generado exitosamente:', nombreArchivo);

                    // Cerrar el indicador de carga y mostrar mensaje de éxito
                    swal.close();
                    swal('Éxito', 'El informe se ha descargado correctamente', 'success');

                }).catch(error => {
                    // Remover el contenedor temporal en caso de error
                    if (document.body.contains(contenedorTemp)) {
                        document.body.removeChild(contenedorTemp);
                    }

                    console.error('❌ Error al generar imagen del informe:', error);
                    swal.close();
                    swal('Error', 'No se pudo generar el PDF del informe', 'error');
                });

            } catch (error) {
                console.error('❌ Error al generar PDF:', error);
                swal('Error', 'No se pudo generar el PDF del informe', 'error');
            }
        }

        function actualizar_solicitado_por(input_solitado_por, input_nombre, input_apellido)
        {
            var nombre = $('#'+input_nombre).val();
            var apellido = $('#'+input_apellido).val();
            if(nombre != '' || apellido != '')
            {
                // $('#'+input_solitado_por).attr('readonly', true);
                $('#'+input_solitado_por).val($('#'+input_nombre).val()+' '+$('#'+input_apellido).val());
            }
            else
            {
                // $('#'+input_solitado_por).attr('readonly', false);
                $('#'+input_solitado_por).val();
            }
        }

        // Funcionalidad de zoom para imagen
        $(document).ready(function() {
            let zoomLevel = 1;
            let isDragging = false;
            let hasDragged = false;
            let startX, startY;
            let translateX = 0, translateY = 0;

            // Zoom con botones
            $('#btnZoomIn').on('click', function(e) {
                e.stopPropagation();
                zoomLevel += 0.25;
                if (zoomLevel > 5) zoomLevel = 5; // Máximo 500%
                aplicarZoom();
            });

            $('#btnZoomOut').on('click', function(e) {
                e.stopPropagation();
                zoomLevel -= 0.25;
                if (zoomLevel < 0.5) zoomLevel = 0.5; // Mínimo 50%
                aplicarZoom();
            });

            $('#btnZoomReset').on('click', function(e) {
                e.stopPropagation();
                zoomLevel = 1;
                translateX = 0;
                translateY = 0;
                aplicarZoom();
                $('#imagenZoomeable').removeClass('zoomed');
            });

            // Zoom con rueda del mouse
            $('#contenedorImagenZoom').on('wheel', function(e) {
                e.preventDefault();
                if (e.originalEvent.deltaY < 0) {
                    // Zoom in
                    zoomLevel += 0.1;
                    if (zoomLevel > 5) zoomLevel = 5;
                } else {
                    // Zoom out
                    zoomLevel -= 0.1;
                    if (zoomLevel < 0.5) zoomLevel = 0.5;
                }
                aplicarZoom();
            });

            // Arrastrar imagen cuando está en zoom
            $('#imagenZoomeable').on('mousedown', function(e) {
                if (zoomLevel > 1) {
                    isDragging = true;
                    hasDragged = false;
                    startX = e.clientX - translateX;
                    startY = e.clientY - translateY;
                    $(this).css('cursor', 'grabbing');
                    e.preventDefault();
                    e.stopPropagation();
                }
            });

            $(document).on('mousemove', function(e) {
                if (isDragging) {
                    hasDragged = true;
                    translateX = e.clientX - startX;
                    translateY = e.clientY - startY;
                    aplicarZoom();
                }
            });

            $(document).on('mouseup', function(e) {
                if (isDragging) {
                    isDragging = false;
                    $('#imagenZoomeable').css('cursor', zoomLevel > 1 ? 'grab' : 'zoom-in');
                    e.stopPropagation();
                }
            });

            // Click para zoom rápido (solo si no se arrastró)
            $('#imagenZoomeable').on('click', function(e) {
                // Solo hacer zoom si no se arrastró la imagen
                if (!hasDragged) {
                    if (zoomLevel === 1) {
                        zoomLevel = 2;
                        $(this).addClass('zoomed');
                        $(this).css('cursor', 'grab');
                    } else {
                        zoomLevel = 1;
                        translateX = 0;
                        translateY = 0;
                        $(this).removeClass('zoomed');
                        $(this).css('cursor', 'zoom-in');
                    }
                    aplicarZoom();
                }
                hasDragged = false;
            });

            function aplicarZoom() {
                $('#imagenZoomeable').css({
                    'transform': `translate(${translateX}px, ${translateY}px) scale(${zoomLevel})`,
                    'transition': isDragging ? 'none' : 'transform 0.2s ease'
                });
            }

            // Resetear zoom cuando se cierra el modal
            const modalImagenZoomElement = document.getElementById('modalImagenZoom');
            modalImagenZoomElement.addEventListener('hidden.bs.modal', function () {
                zoomLevel = 1;
                translateX = 0;
                translateY = 0;
                isDragging = false;
                hasDragged = false;
                aplicarZoom();
                $('#imagenZoomeable').removeClass('zoomed').css('cursor', 'zoom-in');
            });
        });

        /************** ARCHIVO **************/
        var myDropzone_Archivo ;
        Dropzone.options.misArchivos = {
            init:function()
            {
                myDropzone_Archivo = this;

                // Agregar funcionalidad para renombrar archivos
                this.on("addedfile", function(file) {
                    // Crear input editable en la vista previa
                    var filePreview = file.previewElement;
                    var nombreArchivo = filePreview.querySelector("[data-dz-name]");

                    if (nombreArchivo) {
                        // Guardar el nombre original
                        var nombreOriginal = file.name;

                        // Ocultar el nombre original para evitar duplicación
                        nombreArchivo.style.display = "none";

                        // Crear contenedor para el input
                        var contenedorInput = document.createElement("div");
                        contenedorInput.className = "mt-1 mb-1";
                        contenedorInput.style.width = "100%";
                        contenedorInput.style.maxWidth = "250px";

                        // Crear input de texto editable
                        var inputNombre = document.createElement("input");
                        inputNombre.type = "text";
                        inputNombre.value = nombreOriginal;
                        inputNombre.className = "form-control form-control-sm";
                        inputNombre.placeholder = "Nombre del archivo";
                        inputNombre.style.fontSize = "11px";
                        inputNombre.style.padding = "4px 6px";

                        // Prevenir que Enter envíe el formulario
                        inputNombre.addEventListener('keydown', function(e) {
                            if (e.key === 'Enter' || e.keyCode === 13) {
                                e.preventDefault();
                                e.stopPropagation();
                                this.blur(); // Quitar foco para activar el evento change
                                return false;
                            }
                        });

                        // Evento para actualizar el nombre cuando cambie
                        inputNombre.addEventListener('change', function() {
                            var nuevoNombre = this.value.trim();
                            if (nuevoNombre) {
                                file.upload.filename = nuevoNombre;
                            } else {
                                // Si está vacío, restaurar nombre original
                                this.value = nombreOriginal;
                                file.upload.filename = nombreOriginal;
                            }
                        });

                        // Evento blur para guardar cambios
                        inputNombre.addEventListener('blur', function() {
                            var nuevoNombre = this.value.trim();
                            if (nuevoNombre) {
                                file.upload.filename = nuevoNombre;
                            } else {
                                this.value = nombreOriginal;
                                file.upload.filename = nombreOriginal;
                            }
                        });

                        // Agregar el input al contenedor
                        contenedorInput.appendChild(inputNombre);

                        // Insertar el contenedor en una posición que no interfiera con los botones
                        var detalles = filePreview.querySelector(".dz-details");
                        if (detalles) {
                            detalles.appendChild(contenedorInput);
                        } else {
                            nombreArchivo.parentNode.insertBefore(contenedorInput, nombreArchivo.nextSibling);
                        }
                    }
                });
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
                cargar_lista_archivo(myDropzone_Archivo,'');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
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

        function ver_pdf_informe_radiologico(id_ficha_atencion)
        {

            let url = "{{ route('pdf.informe_radiologico') }}";
            Fancybox.show(
                [
                    {
                    src: '{{ route('pdf.informe_radiologico') }}?id_ficha_atencion='+id_ficha_atencion,
                    type: "iframe",
                    preload: false,
                    },
                ]
            );
        }
    </script>
@endsection

{{-- @include('app.profesional.modales.boton_flotante_agenda_autorizacion') --}}
