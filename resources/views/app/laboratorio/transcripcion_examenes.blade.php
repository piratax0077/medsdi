@extends('template.adm_cm.template')

@section('style')
@endsection

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
                            </div>
                            <ul class="breadcrumb mt-3">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('laboratorio.adm_general.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Exámenes Transcritos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->



            <!--Tabla Examenes transcritos-->
            <div class="row m-b-30">
                <div class="col-md-12">
                    <div class="card h-100 pb-0">
                        <div class="card-header text-center bg-c-info">
                            <div class="row">
                                <div class="col-sm-4 d-inline text-left">
                                    <h6 class="text-white my-2 f-20">Exámenes</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0 pt-4">
                            <div class="dt-responsive table-responsive align-middle pb-0">
                                <table id="table_examenes_transcritos" class="table table-striped table-bordered nowrap table-sm" style="height: 100px">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Fecha Examen</th>
                                            <th class="text-center">Paciente</th>
                                            <th class="text-center">Examen</th>
                                            <th class="text-center">Asistente</th>
                                            <th class="text-center">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($examenes_transcritos) && $examenes_transcritos->count() > 0)
                                            @foreach($examenes_transcritos as $ex_t)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ date('d-m-Y', strtotime($ex_t->horas_medicas_fecha_consulta)) }}
                                                    </td>
                                                    <td>
                                                        {{ $ex_t->paciente_nombres.' '.$ex_t->paciente_apellido_uno }}<br/>
                                                        <small class="text-muted">{{ $ex_t->paciente_rut }}</small>
                                                    </td>
                                                    <td class="text-center bg-estado-light-amarillo">
                                                        {{ $ex_t->examen_especialidad_nombre }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $ex_t->asistentes_nombres.' '.$ex_t->asistentes_apellido_uno }}<br/>
                                                        <small class="text-muted">{{ $ex_t->asistentes_rut }}</small>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-info btn-sm"
                                                            data-toggle="tooltip" data-placement="top" title="Ver examen"
                                                            onclick="abrir_transcripcion_examen('{{ $ex_t->horas_medicas_id }}')">
                                                            <i class="feather icon-eye"></i> VER
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center text-muted py-4">
                                                    No hay exámenes transcritos registrados.
                                                </td>
                                            </tr>
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

    @include('app.profesional.modales.transcribir_examen')

@endsection

@section('page-script')
<script>
    $(document).ready(function(){
        $('#table_examenes_transcritos').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
            },
            order: [[0, 'desc']],
            responsive: true
        });
    });

    // Detener dictado si el usuario abandona la página accidentalmente
    $(window).on('beforeunload', function () {
        if (typeof dictado_detener === 'function') dictado_detener();
    });

    // Override: usar ruta de laboratorio (sin filtro de profesional)
    function abrir_transcripcion_examen(id_hora_medica) {

        $('#m_transcripcion_examen_id_hora_medica').val(id_hora_medica);
        $('#m_transcripcion_examen_examen_especialidad_id').val('');
        $('#m_transcripcion_examen_id_ficha_atencion').val('');
        $('#m_transcripcion_examen_id_ficha_otorrino').val('');
        $('#m_transcripcion_examen_id_ficha_especialidad').val('');
        $('#m_transcripcion_examen_id_examen_tipo').val('');
        $('#m_transcripcion_examen_id_paciente').val('');
        $('#m_transcripcion_examen_id_profesional').val('');
        $('#m_transcripcion_examen_id_tipo').val('');
        $('#m_transcripcion_examen_alias').val('');
        $('#input_lista_imagenes').val('');

        myDropzone = 'null';
        myDropzone_eda = 'null';
        myDropzone_edb = 'null';
        lista_imagenes = {};

        if (id_hora_medica !== '') {
            let url = '{{ route('laboratorio.cargar.examen.transcripcion') }}';
            $.ajax({ url: url, type: 'GET', data: { id_hora_medica: id_hora_medica } })
            .done(function (data) {
                console.log(data);
                if (data != null) {
                    if (data.estado == 1) {
                        $('#m_transcripcion_examen').modal('show');
                        $('#m_transcripcion_examen_contenido').html(data.tipo_examen.formulario);

                        var info_ficha   = $.parseJSON(data.ficha_examen.cuerpo);
                        var alias_examen = data.tipo_examen.alias;
                        console.log(info_ficha);
                        $.each(info_ficha, function (key, value) {
                            $('#' + key + '_' + alias_examen).val(value);
                            $('#' + key).val(value);
                            if (key == 'motivo')   { $('#descripcion_examen_rfl').val(value); }
                            if (key == 'biopsia')  { $('#biopsia_check_' + alias_examen).prop('checked', value == 1); }
                            if (key == 'muestra_hp') {
                                $('#muestra_hp_check_' + alias_examen).prop('checked', value == 1);
                                muestra_hp_abrir_div(alias_examen);
                            }
                        });

                        if (lista_imagenes[alias_examen] == null) { lista_imagenes[alias_examen] = []; }
                        if (data.ficha_examen.examen_especialidad_img != null) {
                            $.each(data.ficha_examen.examen_especialidad_img, function (i, img) {
                                var ext = img.nombre.split('.');
                                lista_imagenes[alias_examen][i] = [img.url, img.nombre, img.nombre, ext[1]];
                                $('#input_lista_imagenes').val(JSON.stringify(lista_imagenes));
                            });
                        }
                        init_dropzone();

                        if (alias_examen == 'rfl') {
                            cargar_profesional($('#solicitado_rut_' + alias_examen), 'solicitado_por_' + alias_examen, 'solicitado_id_profesional_' + alias_examen, 'div_profesional_no_inscrito');
                        } else {
                            cargar_profesional($('#solicitado_por_rut_' + alias_examen), 'solicitado_por_' + alias_examen, 'solicitado_id_profesional_' + alias_examen, 'div_profesional_no_inscrito_' + alias_examen, 'solicitado_por_nombre_' + alias_examen, 'solicitado_por_apellido_' + alias_examen, 'solicitado_por_telefono_' + alias_examen, 'solicitado_por_email_' + alias_examen, 'div_mensaje_' + alias_examen, 'mensaje_solicitado_por_' + alias_examen);
                        }

                        $('#m_transcripcion_examen_examen_especialidad_id').val(data.ficha_examen.id);
                        $('#m_transcripcion_examen_id_ficha_atencion').val(data.ficha_examen.id_ficha_atencion);
                        $('#m_transcripcion_examen_id_ficha_especialidad').val(data.ficha_examen.id_ficha_especialidad);
                        $('#m_transcripcion_examen_id_examen_tipo').val(data.ficha_examen.id_examen_tipo);
                        $('#m_transcripcion_examen_id_paciente').val(data.ficha_examen.id_paciente);
                        $('#m_transcripcion_examen_id_profesional').val(data.ficha_examen.id_profesional);
                        $('#m_transcripcion_examen_id_tipo').val(data.ficha_examen.id_template);
                        $('#m_transcripcion_examen_alias').val(alias_examen);
                    } else {
                        swal({ title: 'Error', text: data.msj, icon: 'error', confirmButtonText: 'Aceptar' });
                    }
                } else {
                    swal({ title: 'Error', text: 'Falla en la carga del examen', icon: 'error', confirmButtonText: 'Aceptar' });
                }
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);
                swal({ title: 'Error', text: 'Error de conexión al cargar el examen', icon: 'error', confirmButtonText: 'Aceptar' });
            });
        }
    }
</script>
@endsection
