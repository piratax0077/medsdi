<div id="modal_interconsulta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_interconsulta" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Interconsulta</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body mb-0">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Nombre</label>
                        <label class="form-control form-control-sm" name="nombre_paciente_interconsulta" id="nombre_paciente_interconsulta">{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}</label>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Rut</label>
                        <label class="form-control form-control-sm"  name="rut_paciente_interconsulta" id="rut_paciente_interconsulta">{{ $paciente->rut }}</label>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Edad</label>
                        <label class="form-control form-control-sm" name="edad_paciente_interconsulta" id="edad_paciente_interconsulta" >{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}</label>
                    </div>

                </div>

                {{--  PESTAÑA DE SOLICITUD  --}}
                <div>
                    <form id="inter-especialidad">
                        <div class="form-row">
                            {{--  CARGA DE INTERCONSULT  --}}
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label-activo-sm">Profesion</label>
                                <select class="form-control form-control-sm" id="profesion" name="profesion" onchange="buscar_tipo_especialidad();buscar_profesional();">
                                    <option selected value="0">Seleccione</option>
                                    @if (isset($especialidad))
                                        @foreach ($especialidad as $esp)
                                            @if($esp->id != 8 && $esp->id != 10 && $esp->id != 11 && $esp->id != 12 )
                                            <option value="{{ $esp->id }}">{{ $esp->nombre }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label class="floating-label">Especialidad</label>
                                <select class="form-control form-control-sm" id="especialidad" name="especialidad" onchange="buscar_sub_tipo_especialidad();buscar_profesional();">
                                    <option selected value="0">Seleccione</option>
                                    <option>-</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label class="floating-label">Tipo Especialidad</label>
                                <select class="form-control form-control-sm" id="sub_tipo_especialidad" name="sub_tipo_especialidad" onchange="buscar_profesional();">
                                    <option selected value="0">Seleccione</option>
                                    <option>-</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label class="floating-label">Profesional</label>
                                <select class="form-control form-control-sm" id="profesional_inter" name="profesional_inter">
                                    <option selected value="0">Seleccione</option>
                                    <option>-</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 nombre_profesional_inter" style="display: none;">
                                <label class="floating-label-activo-sm">Profesional Nombre</label>
                                <input type="text" class="form-control form-control-sm" name="nombre_profesional_inter" id="nombre_profesional_inter">
                            </div>

                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                <input type="text" class="form-control form-control-sm" name="hipotesis_interconsulta" id="hipotesis_interconsulta">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label-activo-sm">Se desea saber</label>
                                <textarea type="text" class="form-control form-control-sm" rows="2" name="comentarios_interconsulta" id="comentarios_interconsulta"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer pt-2 pb-0">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="button" onclick="registrar_interconsulta();" class="btn btn-info">Guardar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
