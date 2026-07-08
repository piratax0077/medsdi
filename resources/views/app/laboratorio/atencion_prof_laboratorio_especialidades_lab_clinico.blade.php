@extends('template.laboratorio.laboratorio_profesional.template')
@section('page-script')
<!-- Summernote JS -->
<script src="{{ asset('summernote/summernote-lite.min.js') }}"></script>
<script src="{{ asset('summernote/lang/summernote-es-ES.js') }}"></script>
<script>
    Dropzone.autoDiscover = false;


    $(document).ready(function() {
        console.log('Vista de Laboratorio Clínico - Toma de Muestras cargada');
        $('#informe_clinico').summernote();
        inicializarDropzones();
        inicializarDatepickers();
        setFechaHoraActual();
        generarNumeroMuestra();
    });

    function setFechaHoraActual() {
        var now = new Date();
        var fecha = now.toISOString().split('T')[0];
        var hora = now.toTimeString().split(' ')[0].substring(0, 5);

        $('#fecha_toma').val(fecha);
        $('#hora_toma').val(hora);
        $('#fecha_envio').val(fecha);
        $('#hora_envio').val(hora);
    }

    function generarPDF(){
            let informe_html = $('#informe_clinico').val();
            let id_ficha_atencion = $('#id_fc').val();

            console.log('📄 Generando PDF con el siguiente informe HTML:', informe_html);
            let url = "{{ route('pdf.informe_clinico_personal') }}";

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    informe_html: informe_html,
                    id_ficha_atencion: id_ficha_atencion,
                    _token: CSRF_TOKEN
                },
                success: function(response) {
                    console.log('✅ PDF generado exitosamente:', response);
                    if(response.estado == 1){
                        window.open(response.url_pdf, '_blank');
                    }else {
                        swal('Error', 'No se pudo generar el PDF', 'error');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('❌ Error al generar PDF:', error);
                    swal('Error', 'No se pudo generar el PDF', 'error');
                }
            })
        }

    function generarNumeroMuestra() {
        var fecha = new Date();
        var numeroMuestra = 'LAB-' + fecha.getFullYear() +
                          ('0' + (fecha.getMonth() + 1)).slice(-2) +
                          ('0' + fecha.getDate()).slice(-2) + '-' +
                          Math.floor(Math.random() + 10000).toString().padStart(4, '0');
        $('#numero_muestra').val(numeroMuestra);
    }

    function inicializarDropzones() {
        if ($("#misArchivosOrden").length > 0 && !$("#misArchivosOrden").hasClass('dz-clickable')) {
            new Dropzone("#misArchivosOrden", {
                url: "{{ route('profesional.archivo.carga') }}",
                paramName: "file",
                maxFilesize: 10,
                maxFiles: 5,
                acceptedFiles: "image/*,application/pdf",
                addRemoveLinks: true,
                dictDefaultMessage: "Arrastra la orden médica aquí",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }

        if ($("#misArchivosEvidencia").length > 0 && !$("#misArchivosEvidencia").hasClass('dz-clickable')) {
            new Dropzone("#misArchivosEvidencia", {
                url: "{{ route('profesional.archivo.carga') }}",
                paramName: "file",
                maxFilesize: 10,
                maxFiles: 10,
                acceptedFiles: "image/*",
                addRemoveLinks: true,
                dictDefaultMessage: "Fotos de tubos, etiquetas, evidencias",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
    }

    function inicializarDatepickers() {
        if ($('.datepicker').length > 0) {
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true,
                language: 'es'
            });
        }
    }

    function guardarTomaMuestra() {
        var tubosSeleccionados = [];
        $('input[name="tubos[]"]:checked').each(function() {
            tubosSeleccionados.push($(this).val());
        });

        var formData = {
            id_ficha_atencion: '{{ $id_ficha_atencion ?? "" }}',
            numero_muestra: $('#numero_muestra').val(),
            fecha_toma: $('#fecha_toma').val(),
            hora_toma: $('#hora_toma').val(),
            tipo_examen: $('#tipo_examen').val(),
            tipo_muestra: $('#tipo_muestra').val(),
            sitio_toma: $('#sitio_toma').val(),
            tecnico_toma: $('#tecnico_toma').val(),
            ayuno: $('input[name="ayuno"]:checked').val(),
            tiempo_ayuno: $('#tiempo_ayuno').val(),
            condiciones_paciente: $('#condiciones_paciente').val(),
            observaciones_toma: $('#observaciones_toma').val(),
            tubos: tubosSeleccionados,
            _token: $('input[name="_token"]').val()
        };

        $.ajax({
            url: '{{ route("ficha.otro.prof.registrar_lab_general") }}',
            type: 'POST',
            data: formData,
            success: function(response) {
                swal({
                    icon: 'success',
                    title: 'Guardado exitoso',
                    text: 'La toma de muestra ha sido registrada',
                    timer: 2000
                });
            },
            error: function(xhr) {
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo guardar la toma de muestra'
                });
            }
        });
    }

    function registrarEnvio() {
        var formData = {
            id_ficha_atencion: '{{ $id_ficha_atencion ?? "" }}',
            numero_muestra: $('#numero_muestra').val(),
            fecha_envio: $('#fecha_envio').val(),
            hora_envio: $('#hora_envio').val(),
            laboratorio_destino: $('#laboratorio_destino').val(),
            responsable_envio: $('#responsable_envio').val(),
            temperatura_transporte: $('#temperatura_transporte').val(),
            observaciones_envio: $('#observaciones_envio').val(),
            _token: $('input[name="_token"]').val()
        };

        $.ajax({
            url: '{{ route("ficha.otro.prof.registrar_lab_general") }}',
            type: 'POST',
            data: formData,
            success: function(response) {
                swal({
                    icon: 'success',
                    title: 'Envío registrado',
                    timer: 2000
                });
            },
            error: function() {
                swal({
                    icon: 'error',
                    title: 'Error al registrar envío'
                });
            }
        });
    }

    function imprimirEtiqueta() {
        window.print();
    }
</script>
@endsection

@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Laboratorio Clínico - Toma de Muestras</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"  style=" color: white;">Atención</li>
                            <li class="breadcrumb-item"  style=" color: white;">Toma de Muestras</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- Información del Paciente -->
                {{-- <div class="card">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">Información del Paciente</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <p><strong>Nombre:</strong> {{ $paciente->nombres ?? '' }} {{ $paciente->apellido_uno ?? '' }}</p>
                            </div>
                            <div class="col-md-2">
                                <p><strong>RUT:</strong> {{ $paciente->rut ?? '' }}</p>
                            </div>
                            <div class="col-md-2">
                                <p><strong>Edad:</strong> {{ $paciente->edad ?? '' }} años</p>
                            </div>
                            <div class="col-md-2">
                                <p><strong>Sexo:</strong> {{ $paciente->sexo ?? '' }}</p>
                            </div>
                            <div class="col-md-3">
                                <p><strong>Ficha N°:</strong> {{ $id_ficha_atencion ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <!-- Tabs de Navegación -->
                <div class="card">
                    <input type="hidden" name="id_fc" id="id_fc" value="{{ $id_ficha_atencion ?? '' }}">
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item mr-5">
                                <a class="nav-link active" data-toggle="tab" href="#toma-muestra" role="tab">
                                    <i class="fa fa-syringe"></i> Toma de Muestra
                                </a>
                            </li>
                            <li class="nav-item mr-5">
                                <a class="nav-link" data-toggle="tab" href="#envio" role="tab">
                                    <i class="fa fa-shipping-fast"></i> Almacenamiento para envio
                                </a>
                            </li>
                            <li class="nav-item mr-5">
                                <a class="nav-link" data-toggle="tab" href="#subir-informar" role="tab">
                                    <i class="fa fa-upload"></i> Subir e informar examenes
                                </a>
                            </li>
                            <li class="nav-item mr-5">
                                <a class="nav-link" data-toggle="tab" href="#historial" role="tab">
                                    <i class="fa fa-history"></i> Historial
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content mt-3">
                            <!-- Tab: Toma de Muestra -->
                            <div class="tab-pane fade show active" id="toma-muestra" role="tabpanel">
                                @csrf
                                <div class="row">
                                    <!-- Card: Datos de la Toma de Muestra -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header bg-info">
                                                <h6 class="text-white mb-0"><i class="fa fa-info-circle"></i> Datos de la Toma de Muestra</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Número de Muestra</label>
                                                            <input type="number" class="form-control form-control-sm" id="numero_muestra" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                          <label class="floating-label-activo-sm">Fecha de Toma</label>
                                                            <input type="date" class="form-control form-control-sm" id="fecha_toma">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Hora de Toma</label>
                                                            <input type="time" class="form-control form-control-sm" id="hora_toma">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Tipo de Examen</label>
                                                            <select class="form-control form-control-sm" id="tipo_examen">
                                                                <option value="">Seleccione...</option>
                                                                <option value="hemograma">Hemograma</option>
                                                                <option value="perfil_bioquimico">Perfil Bioquímico</option>
                                                                <option value="perfil_lipidico">Perfil Lipídico</option>
                                                                <option value="perfil_hepatico">Perfil Hepático</option>
                                                                <option value="perfil_renal">Perfil Renal</option>
                                                                <option value="perfil_tiroideo">Perfil Tiroideo</option>
                                                                <option value="glucosa">Glucosa</option>
                                                                <option value="hba1c">HbA1c</option>
                                                                <option value="orina_completa">Orina Completa</option>
                                                                <option value="urocultivo">Urocultivo</option>
                                                                <option value="coprocultivo">Coprocultivo</option>
                                                                <option value="electrolitos">Electrolitos</option>
                                                                <option value="coagulacion">Coagulación</option>
                                                                <option value="serologia">Serología</option>
                                                                <option value="marcadores_tumorales">Marcadores Tumorales</option>
                                                                <option value="otro">Otro</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Tipo de Muestra</label>
                                                            <select class="form-control form-control-sm" id="tipo_muestra">
                                                                <option value="">Seleccione...</option>
                                                                <option value="sangre_venosa">Sangre Venosa</option>
                                                                <option value="sangre_capilar">Sangre Capilar</option>
                                                                <option value="sangre_arterial">Sangre Arterial</option>
                                                                <option value="orina">Orina</option>
                                                                <option value="heces">Heces</option>
                                                                <option value="esputo">Esputo</option>
                                                                <option value="liquido_cefalorraquideo">Líquido Cefalorraquídeo</option>
                                                                <option value="liquido_sinovial">Líquido Sinovial</option>
                                                                <option value="exudado">Exudado/Cultivo</option>
                                                                <option value="otro">Otro</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Sitio de Toma</label>
                                                            <input type="text" class="form-control form-control-sm" id="sitio_toma" placeholder="Ej: Fosa antecubital derecha">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Técnico que Toma la Muestra</label>
                                                            <input type="number" class="form-control form-control-sm" id="tecnico_toma" value="{{ $profesional->nombre ?? '' }} {{ $profesional->apellido_uno ?? '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card: Condiciones del Paciente -->
                                    <div class="col-4">
                                        <div class="card">
                                            <div class="card-header bg-warning">
                                                <h6 class="text-white mb-0"><i class="fa fa-clock"></i> Condiciones del Paciente</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Ayuno</label><br>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="ayuno_si" name="ayuno" class="custom-control-input" value="si">
                                                                <label class="custom-control-label" for="ayuno_si">Sí</label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="ayuno_no" name="ayuno" class="custom-control-input" value="no" checked>
                                                                <label class="custom-control-label" for="ayuno_no">No</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Ayuno (horas)</label>
                                                            <input type="number" class="form-control form-control-sm" id="tiempo_ayuno" placeholder="Ej: 8">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Condiciones Especiales</label>
                                                            
                                                             <textarea class="form-control form-control-sm" rows="5" onfocus="this.rows=5" onblur="this.rows=7;" id="condiciones_paciente" placeholder="Medicación, dieta, "></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card: Tubos Utilizados -->
                                    <div class="col-8">
                                        <div class="card">
                                            <div class="card-header bg-success">
                                                <h6 class="text-white mb-0"><i class="fa fa-vial"></i> Tubos Utilizados</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="tubos[]" id="tubo_lila" value="tubo_lila">
                                                            <label class="custom-control-label" for="tubo_lila">
                                                                <span class="badge badge-pill" style="background: #8B008B; color: white;">Tubo Lila (EDTA)</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Cantidad/Tubos</label>
                                                            <input type="number" class="form-control form-control-sm" id="cant_t1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="tubos[]" id="tubo_rojo" value="tubo_rojo">
                                                            <label class="custom-control-label" for="tubo_rojo">
                                                                <span class="badge badge-pill" style="background: #DC143C; color: white;">Tubo Rojo (Suero)</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Cantidad/Tubos</label>
                                                            <input type="number" class="form-control form-control-sm" id="cant_t1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="tubos[]" id="tubo_verde" value="tubo_verde">
                                                            <label class="custom-control-label" for="tubo_verde">
                                                                <span class="badge badge-pill badge-success">Tubo Verde (Heparina)</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Cantidad/Tubos</label>
                                                            <input type="number" class="form-control form-control-sm" id="cant_t1">
                                                        </div>
                                                    </div>

                                                </div>
                                                 <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="tubos[]" id="tubo_gris" value="tubo_gris">
                                                            <label class="custom-control-label" for="tubo_gris">
                                                                <span class="badge badge-pill badge-secondary">Tubo Gris (Fluoruro)</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Cantidad/Tubos</label>
                                                            <input type="number" class="form-control form-control-sm" id="cant_t1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 mt-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="tubos[]" id="tubo_amarillo" value="tubo_amarillo">
                                                            <label class="custom-control-label" for="tubo_amarillo">
                                                                <span class="badge badge-pill badge-warning">Tubo Amarillo (Gel)</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Cantidad/Tubos</label>
                                                            <input type="number" class="form-control form-control-sm" id="cant_t1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 mt-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="tubos[]" id="tubo_negro" value="tubo_negro">
                                                            <label class="custom-control-label" for="tubo_negro">
                                                                <span class="badge badge-pill badge-dark">Tubo Negro (VSG)</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Cantidad/Tubos</label>
                                                            <input type="number" class="form-control form-control-sm" id="cant_t1">
                                                        </div>
                                                    </div>
                                                 
                                                </div>
                                                 <div class="row">
                                                    <div class="col-md-2">
                                                         <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="tubos[]" id="tubo_azul" value="tubo_azul">
                                                            <label class="custom-control-label" for="tubo_azul">
                                                                <span class="badge badge-pill badge-primary">Tubo Azul (Citrato)</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Cantidad/Tubos</label>
                                                            <input type="number" class="form-control form-control-sm" id="cant_t1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="tubos[]" id="tubo_rojo" value="tubo_rojo">
                                                            <label class="custom-control-label" for="tubo_rojo">
                                                                <span class="badge badge-pill" style="background: #e77b91; color: white;">Envase propio orina</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Cantidad/Tubos</label>
                                                            <input type="number" class="form-control form-control-sm" id="cant_t1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="tubos[]" id="tubo_verde" value="tubo_verde">
                                                            <label class="custom-control-label" for="tubo_verde">
                                                                <span class="badge badge-pill"  style="background: #5c5153; color: rgb(225, 215, 215);">Tubo para otra muestra</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Cantidad/Tubos</label>
                                                            <input type="number" class="form-control form-control-sm" id="cant_t1">
                                                        </div>
                                                    </div>                                               
                                                </div>
                                                 <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Cantidad total/Tubos</label>
                                                            <input type="number" class="form-control form-control-sm" id="cant_t1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="float-right">
                                                            <button type="button" class="btn btn-secondary btn-sm" onclick="imprimirEtiqueta()">
                                                                <i class="fa fa-print"></i> Imprimir Etiquetas</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card: Observaciones -->
                                    <div class="col-4">
                                        <div class="card">
                                            <div class="card-header bg-secondary">
                                                <h6 class="text-white mb-0"><i class="fa fa-comment"></i> Observaciones</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group mb-0">
                                                    <label class="floating-label-activo-sm">Observaciones de la Toma</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="observaciones_toma" placeholder="Dificultades, incidencias, observaciones..."></textarea>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary btn-sm" onclick="guardarTomaMuestra()">
                                                        <i class="fa fa-save"></i> Guardar Toma de Muestra
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Card: Orden Médica -->
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header bg-primary">
                                                <h6 class="text-white mb-0"><i class="fa fa-file-medical"></i> Orden Médica</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="dropzone" id="misArchivosOrden"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card: Evidencias -->
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header bg-primary">
                                                <h6 class="text-white mb-0"><i class="fa fa-camera"></i> Evidencias</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="dropzone" id="misArchivosEvidencia"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Tab: Envío a Laboratorio -->
                            <div class="tab-pane fade" id="envio" role="tabpanel">
                                <div class="row">
                                    <!-- Card: Datos de Envío -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header bg-info">
                                                <h6 class="text-white mb-0"><i class="fa fa-shipping-fast"></i> Registro de Envío</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Fecha de Envío</label>
                                                            <input type="date" class="form-control form-control-sm" id="fecha_envio">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Hora de Envío</label>
                                                            <input type="time" class="form-control form-control-sm" id="hora_envio">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Laboratorio Destino</label>
                                                            <select class="form-control form-control-sm" id="laboratorio_destino">
                                                                <option value="">Seleccione...</option>
                                                                <option value="lab_central">Laboratorio Central</option>
                                                                <option value="lab_externo">Laboratorio Externo</option>
                                                                <option value="otro">Otro</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Responsable del Envío</label>
                                                            <input type="number" class="form-control form-control-sm" id="responsable_envio">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card: Condiciones de Transporte -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header bg-warning">
                                                <h6 class="text-white mb-0"><i class="fa fa-thermometer-half"></i> Condiciones de Almacenamiento</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Temperatura de Transporte</label>
                                                            <select class="form-control form-control-sm" id="temperatura_transporte">
                                                                <option value="">Seleccione...</option>
                                                                <option value="ambiente">Temperatura Ambiente (15-25°C)</option>
                                                                <option value="refrigerada">Refrigerada (2-8°C)</option>
                                                                <option value="congelada">Congelada (-20°C o menos)</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-10">
                                                        <div class="form-group mb-0">
                                                            <label class="floating-label-activo-sm">Observaciones de la muestra</label>
                                                            <textarea class="form-control form-control-sm" rows="3" id="observaciones_envio" placeholder="Detalles del transporte, condiciones especiales..."></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Botones de Acción -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="float-left">
                                                            <button type="button" class="btn btn-secondary btn-sm" onclick="imprimirEtiqueta()">
                                                                <i class="fa fa-print"></i> Imprimir Etiqueta de contenedor</button>
                                                        </div>
                                                <div class="float-right">
                                                    <button type="button" class="btn btn-success btn-sm" onclick="registrarEnvio()">
                                                        <i class="fa fa-check"></i> Registrar Envío
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab: Subir e Informar Examenes -->

                            <div class="tab-pane fade" id="subir-informar" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card-a">
                                                        <div class="card-header-a" id="sec_carga_archivo">
                                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#sec_carga_archivo_c" aria-expanded="false" aria-controls="sec_carga_archivo_c">
                                                                INFORME (SI LO DESEA)
                                                            </button>
                                                        </div>
                                                        <div class="card-body-aten-a">
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <textarea class="form-control caja-texto form-control-sm mb-9"  rows="15"  onfocus="this.rows=15" onblur="this.rows=15;" name="informe_clinico" id="informe_clinico" placeholder="Informe de examen realizado"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer-aten-a">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <button type="button" class="btn btn-info btn-sm" id="btn_generar_pdf" onclick="generarPDF()"> GenerarPDF</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card-a">
                                                        <div class="card-header-a" id="sec_carga_archivo">
                                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#sec_carga_archivo_c" aria-expanded="false" aria-controls="sec_carga_archivo_c">
                                                                CARGAR EXÁMENES Y ADJUNTAR INFORME SI ESTA LLENO EL CAMPO DE INFORME
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

                            <!-- Tab: Historial -->
                            <div class="tab-pane fade" id="historial" role="tabpanel">
                                <div class="row">
                                    <!-- Card: Historial de Muestras -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header bg-primary">
                                                <h6 class="text-white mb-0"><i class="fa fa-history"></i> Historial de Exámenes del Paciente</h6>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-hover table-sm mb-0">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>N° Muestra</th>
                                                            <th>Fecha</th>
                                                            <th>Tipo Examen</th>
                                                            <th>Tipo Muestra</th>
                                                            <th>Técnico</th>
                                                            <th>Estado</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="historial-muestras-body">
                                                        <tr>
                                                            <td colspan="7" class="text-center">No hay registros previos</td>
                                                        </tr>
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
@endsection
