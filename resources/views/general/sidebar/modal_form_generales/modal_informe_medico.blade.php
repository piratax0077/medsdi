@once
    <link href="{{ asset('summernote/summernote-lite.min.css') }}" rel="stylesheet">
    <script src="{{ asset('summernote/summernote-lite.min.js') }}"></script>
@endonce

<div id="modal_inf_medico" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_inf_medico"
    aria-hidden="true">

    <div class="modal-dialog modal-xl modal-dialog-centered" data-backdrop="static" role="document">
        <div class="modal-content shadow-lg border-0">

            <div class="modal-header bg-info text-white">
                <div>
                    <h5 class="modal-title mb-0">
                        <i class="feather icon-file-text mr-1"></i> Informe Médico
                    </h5>
                    <small>Registro clínico del paciente</small>
                </div>

                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"
                    onclick="$('#modal_inf_medico').modal('hide')">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body bg-light">
                <input type="hidden" id="id_informe_medico_email" name="id_informe_medico_email">

                @php
                    $direccionPaciente = null;
                    $ciudadPaciente = null;
                    $regionPaciente = null;

                    if ($paciente->id_direccion && $paciente->Direccion()->first()) {
                        $direccionPaciente = $paciente->Direccion()->first();
                        $ciudadPaciente = $direccionPaciente->Ciudad()->first() ?? null;
                        $regionPaciente = $ciudadPaciente ? $ciudadPaciente->id_region : null;
                    }
                @endphp

                <form id="form_informe_medico">

                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-header bg-white border-bottom">
                            <h6 class="mb-0 text-info">
                                <i class="feather icon-user mr-1"></i> Datos del paciente
                            </h6>
                        </div>

                        <div class="card-body">
                            <div class="form-row">

                                <div class="form-group col-sm-12 col-md-6">
                                    <label class="small font-weight-bold text-muted">Nombre</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="nombre_paciente_informe_medico"
                                        id="nombre_paciente_informe_medico"
                                        value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                                </div>

                                <div class="form-group col-sm-12 col-md-3">
                                    <label class="small font-weight-bold text-muted">RUT</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="rut_paciente_informe_medico"
                                        id="rut_paciente_informe_medico"
                                        value="{{ $paciente->rut }}">
                                </div>

                                <div class="form-group col-sm-12 col-md-3">
                                    <label class="small font-weight-bold text-muted">Edad</label>
                                    <input type="number" class="form-control form-control-sm"
                                        name="edad_paciente_informe_medico"
                                        id="edad_paciente_informe_medico"
                                        value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}">
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label class="small font-weight-bold text-muted">Dirección</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="direccion_paciente_informe_medico"
                                        id="direccion_paciente_informe_medico"
                                        value="{{ $direccionPaciente ? $direccionPaciente->direccion . ' ' . $direccionPaciente->numero_dir : '' }}">
                                </div>

                                <div class="form-group col-sm-12 col-md-3">
                                    <label class="small font-weight-bold text-muted">Región</label>
                                    <select id="region_paciente_informe_medico"
                                        name="region_paciente_informe_medico"
                                        class="form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        @foreach ($regiones as $r)
                                            <option value="{{ $r->id }}"
                                                {{ $regionPaciente == $r->id ? 'selected' : '' }}>
                                                {{ $r->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-sm-12 col-md-3">
                                    <label class="small font-weight-bold text-muted">Ciudad</label>
                                    <select id="ciudad_paciente_informe_medico"
                                        name="ciudad_paciente_informe_medico"
                                        class="form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        @foreach ($ciudades as $c)
                                            <option value="{{ $c->id }}"
                                                {{ $ciudadPaciente && $ciudadPaciente->id == $c->id ? 'selected' : '' }}>
                                                {{ $c->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-info">
                                <i class="feather icon-edit-3 mr-1"></i> Contenido del informe
                            </h6>
                            <small class="text-muted">El profesional que suscribe informa que</small>
                        </div>

                        <div class="card-body">
                            <div class="form-group mb-0">
                                <label class="small font-weight-bold text-muted">Descripción clínica</label>
                                <textarea class="form-control form-control-sm"
                                    rows="8"
                                    name="comentarios_informe_medico"
                                    id="comentarios_informe_medico"></textarea>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal"
                    onclick="$('#modal_inf_medico').modal('hide')">
                    <i class="feather icon-x"></i> Cancelar
                </button>

                <button type="button" onclick="enviar_informe_medico_email();"
                    class="btn btn-warning btn-sm"
                    id="btn_enviar_informe_medico_email">
                    <i class="feather icon-send"></i> Enviar PDF
                </button>

                <button type="button" onclick="registrar_informe_medico();"
                    class="btn btn-info btn-sm">
                    <i class="feather icon-check"></i> Generar Informe
                </button>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        $('#modal_inf_medico').on('shown.bs.modal', function () {

            if (!$.fn.summernote) {
                console.error('Summernote no está cargado');
                return;
            }

            if (!$('#comentarios_informe_medico').next('.note-editor').length) {
                $('#comentarios_informe_medico').summernote({
                    height: 300,
                    placeholder: 'Escriba aquí el informe médico...',
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['fontsize']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['link']],
                        ['view', ['fullscreen', 'codeview']]
                    ]
                });
            }

        });

    });
</script>
