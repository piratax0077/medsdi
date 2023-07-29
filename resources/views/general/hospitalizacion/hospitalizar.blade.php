@if(isset($seccion_tipo) && $seccion_tipo != '')
<div class="tab-pane fade show" id="in-hosp{{ '-'.$seccion_tipo }}" role="tabpanel" aria-labelledby="in-hosp{{ '-'.$seccion_tipo }}-tab">
    @else
<div class="tab-pane fade show" id="in-hosp" role="tabpanel" aria-labelledby="in-hosp-tab">
@endif
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h6 class="f-16 text-c-blue mb-3">Detalle hospitalización</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Hospitalizar En:</label>
                                <select name="hospen" id="hospen" data-titulo="Hospitalización" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('hospen','div_detalle_hospen','obs_hospen',3);">
                                    <option value="1" selected>Clínica</option>
                                    <option value="2">Hospital</option>
                                    <option value="3">Otro Describir</option>
                                </select>
                            </div>
                            <div class="col-md-12" id="div_detalle_hospen" style="display:none">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Otro Lugar Describir</label>
                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hospen" id="obs_hospen"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nombre de La institución</label>
                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Hospitalizar" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="nom_inst" id="nom_inst"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Servicio</label>
                                <select name="hosp_enserv" id="hosp_enserv" data-titulo="Es Urgencia Qx.?" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('hosp_enserv','div_detalle_hosp_enserv','obs_hosp_enserv',4);">
                                    <option value="1" selected>Servicio Urgencia</option>
                                    <option value="2">Sala</option>
                                    <option value="3">UTI</option>
                                    <option value="4">Otro</option>
                                </select>
                            </div>
                            <div class="col-md-12" id="div_detalle_hosp_enserv" style="display:none">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Otro Servicio Describir</label>
                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hosp_enserv" id="obs_hosp_enserv"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Motivo</label>
                                <select name="motivo_hosp" id="motivo_hosp" data-titulo="Otro Tratamiento" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('motivo_hosp','div_motivo_hosp','obs_motivo_hosp',5);">
                                    <option value="1" selected>Cirugía</option>
                                    <option value="2">Tratamiento Médico</option>
                                    <option value="3">Estudio Clínico</option>
                                    <option value="4">Observación</option>
                                    <option value="5">Otro</option>
                                </select>
                            </div>
                            <div class="col-md-12" id="div_motivo_hosp" style="display:none">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Otro Tratamiento Describir</label>
                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Otro Tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_motivo_hosp" id="obs_motivo_hosp"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Observaciones a la Hospitalización</label>
                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Hospitalizar" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_hospitalizar" id="obs_hospitalizar"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="ingresohosp();"><i class="feather icon-save"></i> Orden de Hospitalización </button>
                        </div>
                        <div class="form-group col-md-6">
                            <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="sol_pabellon();"><i class="feather icon-save"></i> Solicitar Pabellón</button>
                        </div><Footer></Footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
