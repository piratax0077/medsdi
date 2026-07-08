<div id="modal_oral" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_oral" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Tratamiento oral</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <!-- Medicamento y Dosis -->
                        <div class="form-group col-sm-12 col-md-8">
                            <label class="floating-label-activo-sm">Medicamento</label>
                            <input class="form-control form-control-sm" name="medicamento_oral_cd" id="medicamento_oral_cd" onblur="getDosis_sdi();">
                        </div>
                        <div class="form-group col-sm-12 col-md-4">
                            <label class="floating-label-activo-sm">Cantidad x caja</label>
                            <select class="form-control form-control-sm" name="dosis_oral_cd" id="dosis_oral_cd" onchange="getFrecuencia_sdi();getCantComp_sdi();">
                                <option value="">-- Seleccionar --</option>
                            </select>
                        </div>

                        <!-- Frecuencia -->
                        <div class="form-group col-12">
                            <label class="floating-label-activo-sm">Frecuencia</label>
                            <select class="form-control form-control-sm" name="frecuencia_oral_cd" id="frecuencia_oral_cd">
                                <option value="">-- Seleccionar --</option>
                                <option value="1">1 vez al día</option>
                                <option value="2">2 veces al día</option>
                                <option value="3">3 veces al día</option>
                                <option value="4">4 veces al día</option>
                                <option value="5">5 veces al día</option>
                                <option value="6">6 veces al día</option>
                            </select>
                        </div>

                        <!-- Vía de Administración -->
                        <div class="form-group col-sm-12 col-md-6">
                            <label class="floating-label-activo-sm">Vía de Administración</label>
                            <select class="form-control form-control-sm" id="via_administracion_oral_cd" name="via_administracion_oral_cd" onchange="validar_via_administracion_sdi();">
                                <option value="0">Seleccione</option>
                                <option value="1">Vía Oral</option>
                                <option value="2">Vía Sublingual</option>
                                <option value="3">Vía Tópica</option>
                                <option value="4">Vía Oftalmológica</option>
                                <option value="5">Vía Ótica</option>
                                <option value="6">Vía Inhalatoria</option>
                                <option value="7">Vía Nasal</option>
                                <option value="8">Vía Rectal</option>
                                <option value="9">Vía Vaginal</option>
                                <option value="10">Vía parental</option>
                                <option value="11">Otra Vía</option>
                            </select>
                        </div>
                        <!-- Campo condicional: Otra vía -->
                        <div class="form-group col-sm-12 col-md-6" id="otra_via_div_oral_cd" style="display: none;">
                            <label class="floating-label-activo-sm">Especifique otra vía</label>
                            <input class="form-control form-control-sm" type="text" name="otra_via_oral_cd" id="otra_via_oral_cd" disabled>
                        </div>

                        <!-- Periodo -->
                        <div class="form-group col-sm-12 col-md-6">
                            <label class="floating-label-activo-sm">Periodo</label>
                            <select class="form-control form-control-sm" id="periodo_oral_cd" name="periodo_oral_cd" onchange="validar_periodo_sdi();">
                                <option value="0">Seleccione</option>
                                <option value="1">SOS</option>
                                <option value="2">Dosis única</option>
                                <option value="3">3 días</option>
                                <option value="4">5 días</option>
                                <option value="5">7 días</option>
                                <option value="6">10 días</option>
                                <option value="7">15 días</option>
                                <option value="8">30 días</option>
                                <option value="9">Permanente</option>
                                <option value="10">Vía parental</option>
                                <option value="11">Otro Periodo</option>
                            </select>
                        </div>
                        <!-- Campo condicional: Otro periodo -->
                        <div class="form-group col-sm-12 col-md-6" id="div_otro_periodo_oral_cd" style="display: none;">
                            <label class="floating-label-activo-sm">Especifique otro periodo</label>
                            <input type="text" id="otro_periodo_oral_cd" name="otro_periodo_oral_cd" class="form-control form-control-sm" disabled>
                        </div>

                        <!-- Cantidad a comprar -->
                        <div class="form-group col-sm-12 col-md-6">
                            <label class="floating-label-activo-sm">Cantidad a comprar</label>
                            <select class="form-control form-control-sm" name="cantidad_comprar_oral_cd" id="cantidad_comprar_oral_cd" onchange="validar_cantidad_comprar_sdi();">
                                <option value="">-- Seleccionar --</option>
                            </select>
                        </div>
                        <!-- Campo condicional: Otra cantidad -->
                        <div class="form-group col-sm-12 col-md-6" id="div_otra_cantidad_a_comprar" style="display: none;">
                            <label class="floating-label-activo-sm">Especifique otra cantidad</label>
                            <input type="text" id="otra_cantidad_a_comprar" name="otra_cantidad_a_comprar" class="form-control form-control-sm" disabled>
                        </div>

                        <!-- Observaciones -->
                        <div class="form-group col-12">
                            <label class="floating-label-activo-sm">Observaciones</label>
                            <textarea class="caja-texto form-control form-control-sm" rows="3" onfocus="this.rows=6" onblur="this.rows=3;" name="obs_oral_cd" id="obs_oral_cd"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-light-c btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>
                <button type="button" class="btn btn-info-light-c btn-sm" onclick="indicar_medicamento_sdi();"><i class="feather icon-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>

<input type="hidden" name="id_medicamento_oral_cd" id="id_medicamento_oral_cd">
