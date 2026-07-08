

<div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-4 shadow-none">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                <h6 class="f-20 text-c-blue d-inline">Epicrisis</h6>
                <div class=" d-inline float-md-right text-c-blue">
                    <h6 class="text-c-blue">
                         <script>
                            var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                "Octubre", "Noviembre", "Diciembre");

                            var f = new Date();
                            document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                        </script>
                    </h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-body">
                    <form>
                        <input type="hidden" name="id_solicitud_pabellon" id="id_solicitud_pabellon" value="{{ $id_solicitud_pabellon ?? '' }}">
                        <input type="hidden" name="id_epicrisis_alta_medica" id="id_epicrisis_alta_medica" value="{{ $epicrisis_alta_medica->id ?? '' }}">
                        <div class="form-row">
                            <h6 class="mb-3">I.- Datos de hospitalización</h6>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="floating-label-activo-sm">Clínica / Hospital</label>
                                <input type="text" class="form-control form-control-sm" name="clinica_hospital" id="clinica_hospital" value="{{ $lugar_atencion->nombre }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label-activo-sm">Servicio</label>
                                <input type="text" class="form-control form-control-sm" name="servicio" id="servicio">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label-activo-sm">Rut paciente</label>
                                <input type="text" class="form-control form-control-sm" name="rut" id="rut" value="{{ $paciente->rut }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="floating-label-activo-sm">Desde</label>
                                {{-- <span>{{ \Carbon\Carbon::parse($epicrisis_alta_medica->inicio_hospitalizacion)->format('Y-m-d') }}</span>--}}
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label-activo-sm">Hasta</label>
                                {{-- <span>{{ \Carbon\Carbon::parse($epicrisis_alta_medica->fin_hospitalizacion)->format('Y-m-d') }}</span>--}}

                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label-activo-sm">Total de días</label>
                                {{-- <span>{{ \Carbon\Carbon::parse($epicrisis_alta_medica->fin_hospitalizacion)->diff(\Carbon\Carbon::parse($epicrisis_alta_medica->inicio_hospitalizacion))->format('%d') }}</span>--}}
                            </div>
                        </div>
                        <div class="form-row">
                            <h6 class="my-3">II.- Dignósticos</h6>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Diagnósticos de ingreso</label>
                                <input class="form-control form-control-sm" name="diagnostico_ingreso" id="diagnostico_ingreso" value="{{ $fichaAtencion->hipotesis_diagnostico }}">
                                {{--  value="{{ $epicrisis_alta_medica->diagnostico_ingreso }}">  --}}
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Diagnósticos de alta</label>
                                <input class="form-control form-control-sm" name="diagnostico_alta" id="diagnostico_alta" value="">
                                {{--  value="{{ $epicrisis_alta_medica->diagnostico_alta }}">  --}}
                            </div>
                        </div>
                        <div class="form-row">
                            <h6 class="my-3">III.- Tratamientos y cirugías realizadas</h6>
                        </div>
                        @php
                            $tratamientos_meds = collect($recetas ?? [])->filter(function ($r) {
                                return empty($r->id_enfermera);
                            })->map(function ($r) {
                                $partes = [];
                                if (!empty($r->nombre_medicamento)) {
                                    $partes[] = $r->nombre_medicamento;
                                }
                                if (!empty($r->via_administracion)) {
                                    $partes[] = 'Vía: ' . $r->via_administracion;
                                }
                                if (!empty($r->frecuencia)) {
                                    $partes[] = 'Frecuencia: ' . $r->frecuencia;
                                }
                                return implode(' | ', $partes);
                            })->filter()->implode(' ; ');

                            $tratamientos_curaciones = collect($curaciones ?? [])->map(function ($c) {
                                $partes = [];
                                $procedimiento = $c->datos_curacion->nombre_procedimiento ?? null;
                                if (!empty($procedimiento)) {
                                    $partes[] = 'Curación: ' . $procedimiento;
                                }
                                if (!empty($c->fecha) || !empty($c->hora)) {
                                    $partes[] = trim(($c->fecha ?? '') . ' ' . ($c->hora ?? ''));
                                }
                                if (!empty($c->responsable)) {
                                    $partes[] = $c->responsable;
                                }
                                return implode(' | ', array_filter($partes));
                            })->filter()->implode(' ; ');

                            $tratamientos_texto = collect([$tratamientos_meds, $tratamientos_curaciones])
                                ->filter()
                                ->implode(' ; ');

                            $cirugias_texto = collect($solicitudes_pabellon ?? [])->map(function ($c) {
                                $partes = [];
                                $fecha = data_get($c, 'fecha_hora_operacion');
                                $operacion = data_get($c, 'operacion');
                                $codigo = data_get($c, 'codigo_cirugia');
                                $tipo = data_get($c, 'tipo_cirugia');
                                $anestesia = data_get($c, 'anestesia');
                                $especialidad1 = data_get($c, 'especialidad_1');
                                $especialidad2 = data_get($c, 'especialidad_2');
                                $diagnostico = data_get($c, 'diagnostico_preoperatorio');
                                $comentarios = data_get($c, 'comentarios');

                                if (!empty($fecha)) {
                                    $partes[] = trim($fecha);
                                }
                                if (!empty($operacion)) {
                                    $partes[] = $operacion;
                                } elseif (!empty($codigo)) {
                                    $partes[] = 'Código: ' . $codigo;
                                }
                                if (!empty($tipo)) {
                                    $partes[] = 'Tipo: ' . $tipo;
                                }
                                if (!empty($anestesia)) {
                                    $partes[] = 'Anestesia: ' . $anestesia;
                                }
                                $especialidad = collect([$especialidad1, $especialidad2])->filter()->implode(' / ');
                                if (!empty($especialidad)) {
                                    $partes[] = 'Especialidad: ' . $especialidad;
                                }
                                if (!empty($diagnostico)) {
                                    $partes[] = 'Dx preop: ' . $diagnostico;
                                }
                                if (!empty($comentarios)) {
                                    $partes[] = 'Comentarios: ' . $comentarios;
                                }

                                return implode(' | ', $partes);
                            })->filter()->implode(' ; ');
                        @endphp
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="floating-label-activo-sm">Tratamientos</label>
                                <textarea class="form-control form-control-sm" name="tratamientos" id="tratamientos" rows="1" onfocus="this.rows=3" onblur="this.rows=1;">{{ $tratamientos_texto }}</textarea>
                                {{--  value="{{ $epicrisis_alta_medica->tratamientos_cirugias }}">  --}}
                            </div>
                            <div class="form-group col-md-12">
                                <label class="floating-label-activo-sm">Procedimientos quirúrgicos</label>
                                <textarea class="form-control form-control-sm" name="procedimientos_quirurgicos" id="procedimientos_quirurgicos" rows="1" onfocus="this.rows=3" onblur="this.rows=1;">{{ $cirugias_texto }}</textarea>
                                {{--  value="{{ $epicrisis_alta_medica->procedimientos_quirurgicos_cirugia }}">  --}}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="floating-label-activo-sm">Otros procedimientos y/o tratamientos</label>
                                <textarea class="form-control form-control-sm" name="otros_tratamientos" id="otros_tratamientos" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                {{--  value="{{ $epicrisis_alta_medica->otros_tratamientos_procedimientos }}">  --}}
                            </div>
                        </div>
                        <div class="form-row">
                            <h6 class="my-3">IV.- Controles y evolución intrahospitalaria</h6>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Tratamientos</label>
                                <textarea class="form-control form-control-sm" name="tratamientos_controles" id="tratamientos_controles" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                    {{--  value="{{ $epicrisis_alta_medica->tratamientos_controles }}">  --}}
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Procedimientos quirúrgicos</label>
                                <input class="form-control form-control-sm" name="procedimientos_quirurgicos_controles" id="procedimientos_quirurgicos_controles" value="">
                                    {{--  value="{{ $epicri sis_alta_medica->procedimientos_quirurgicos_controles }}">  --}}
                            </div>
                        </div>
                        <div class="form-row">
                            <h6 class="my-3">V.- Controles e indicaciones al alta</h6>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="fecha" id="fecha" value="<?php echo Date('d-m-Y') ?>" disabled>
                                    {{--  value="{{ \Carbon\Carbon::parse($e picrisis_alta_medica->fecha_control)->format('d-m-Y') }} " disabled>  --}}
                            </div>
                            <div class="form-group col-md-8">
                                <label class="floating-label-activo-sm">Indicaciones</label>
                                <input class="form-control form-control-sm" name="indicaciones_alta" id="indicaciones_alta" value="">
                                {{--  value="{{ $epicrisis_alta_medica->indicaciones_alta  }}">  --}}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="floating-label-activo-sm">Rut</label>
                                <input type="text" class="form-control form-control-sm" name="rut_profesional" id="rut_profesional"  value="{{ $profesional->rut }}">
                                {{--  value="{{ $profesional->rut }}">  --}}
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label-activo-sm">Nombre y Apellidos</label>
                                <input type="text" class="form-control form-control-sm" name="nombre_profesional" id="nombre_profesional" value="{{ $profesional->nombre }} {{ $profesional->apellido_uno }}">
                                {{--  value="{{ $profesional->nombre.''.$profesional->apellido_uno }}">  --}}
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label-activo-sm">Email</label>
                                <input type="text" class="form-control form-control-sm" name="email_profesional" id="email_profesional"value="{{ $profesional->email }}">
                                {{--  id="email_profesional"value="{{ $profesional->email }} ">  --}}
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-info btn-sm" onclick="guardarAltaMedica()" @if(isset($enfermera)) disabled @endif>Guardar</button>
                </div>
            </div>
            </div>

        </div>

    </div>
</div>
<script>
    function carnet_alta(){
        var modal = $('#carne_alta');
        if (!modal.parent().is('body')) {
            modal.appendTo('body');
        }
        modal.modal('show');
    }

    function guardarAltaMedica() {
        let id_solicitud_pabellon = $('#id_solicitud_pabellon').val();
        let id_epicrisis_alta_medica = $('#id_epicrisis_alta_medica').val();

        let data = {
            id_solicitud_pabellon: id_solicitud_pabellon,
            inicio_hospitalizacion: $('#inicio_hospitalizacion').val(),
            fin_hospitalizacion: $('#fin_hospitalizacion').val(),
            diagnostico_ingreso_epicrisis_alta_medica: $('#diagnostico_ingreso').val(),
            diagnostico_alta_epicrisis_alta_medica: $('#diagnostico_alta').val(),
            tratamiento_cirugia_epicrisis_alta_medica: $('#tratamientos').val(),
            procedimiento_quirurgico_cirugia_epicrisis_alta_medica: $('#procedimientos_quirurgicos').val(),
            otro_procedimiento_tratamiento_cirugia_epicrisis_alta_medica: $('#otros_tratamientos').val(),
            tratamiento_control_cirugia_epicrisis_alta_medica: $('#tratamientos_controles').val(),
            procedimiento_control_cirugia_epicrisis_alta_medica: $('#procedimientos_quirurgicos_controles').val(),
            fecha_control: $('#fecha').val(),
            indicaciones_alta_epicrisis_alta_medica: $('#indicaciones_alta').val(),
            id_paciente : $('#id_paciente').val(),
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            _token: CSRF_TOKEN
        };

        let url = '{{ route("cirugia.registrar_epicrisis_alta_medica") }}';
        if (id_epicrisis_alta_medica) {
            url = '{{ route("cirugia.actualizar_epicrisis_alta_medica") }}';
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (resp) {
                console.log(resp);
                swal({
                    title: "Guardado",
                    text: "La epicrisis se guardó correctamente.",
                    icon: "success",
                    buttons: "Aceptar"
                });
                generar_epicrisis_alta_medica(resp.epicrisis_id);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                swal({
                    title: "Error",
                    text: "Ocurrió un error inesperado al guardar.",
                    icon: "error",
                    buttons: "Aceptar"
                });
            }
        });
    }

    function generar_epicrisis_alta_medica(id_epicrisis_alta_medica){
        var url = '{{ route("cirugia.generar_epicrisis_alta_medica", ":id_epicrisis_alta_medica") }}';
        url = url.replace(':id_epicrisis_alta_medica', id_epicrisis_alta_medica);
        window.open(url, '_blank');
    }

</script>


