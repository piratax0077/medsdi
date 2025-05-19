<div id="modal_certificado_reposo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_certificado_reposo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" data-backdrop="static" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Certificado de reposo</h5>
                <button type="button" class="close text-white"  data-bs-dismiss="modal"aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="form_certificado_reposo">
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Nombre</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}" name="" id="" readonly>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Rut</label>
                            <input type="person" class="form-control form-control-sm" value="{{ $paciente->rut }}" name="" id="" readonly>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Edad</label>
                            <input type="number" class="form-control form-control-sm" value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}" name="" id="" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 mb-1 mt-2">
                            <p class="text-c-blue">El Profesional que suscribe certifica que este paciente debe permanecer en reposo</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Desde</label>
                            <input type="date" class="form-control form-control-sm" name="fecha_inicio_certificado"
                                id="fecha_inicio_certificado">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Hasta</label>
                            <input type="date" class="form-control form-control-sm" name="fecha_termino_certificado"
                                id="fecha_termino_certificado">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Hipótesis Diagnóstica</label>
                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;"data-input_igual="lic_descripcion_hipotesis,descripcion_hipotesis" name="hipotesis_certificado" id="hipotesis_certificado" onChange="cargarIgual('hipotesis_certificado')"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Comentarios</label>
                            <textarea type="text" class="form-control form-control-sm" rows="2" name="comentarios_certificado"
                                id="comentarios_certificado"></textarea>
                        </div>
                    </div>
                    {{--  <div class="form-row">
                        <div class="col-sm-12 col-md-12 text-center">
                            <!--<p class="mb-2">Saluda atentamente</p>-->
                            <button type="button" class="btn btn-sm btn-primary"> <a
                                    href="{{ route('print') }}">PDF</a></button>
                        </div>
                    </div>  --}}

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="registrar_cetificado_reposo();" class="btn btn-info">Guardar</button>
            </div>
        </div>
    </div>
</div>
