<!-- control post qx -->
<div class="col-sm-12 col-md-12" style="background-color: #ecf0f5!important;">
    <div class="card-a">
        <div class="card-header-a" id="Control_cirugia">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#cirugia_general_pc" aria-expanded="false" aria-controls="cirugia_general_pc">
                Control Post Quirúrgico
            </button>
        </div>
        <div id="cirugia_general_pc" class="collapse" aria-labelledby="cirugia_general" data-parent="#Control_cirugia">
            <div class="card-body-aten-a">
                <div id="form-cir_digest">
                    <div class="form-row mb-2">
                        <div class="col-md-12">
                            <h5 style="text-align:center;">Control</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <!-- Estado General -->
                        <div class="col-md-6">
                            <div class="form-group" >
                                <label class="floating-label-activo-sm">Estado General</label>
                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Estado General" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="eg_cpq_cg" id="eg_cpq_cg"></textarea>
                            </div>
                        </div>
                        <!-- Herida Operatoria Curación -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Herida Operatoria Curación</label>
                                <textarea class="form-control caja-texto form-control-sm" data-titulo="ceg_cda" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="hoc_cpa_cg" id="hoc_cpa_cg"></textarea>
                            </div>
                        </div>
                        <!-- Masas Palpables -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Masas Palpables</label>
                                <textarea class="form-control caja-texto form-control-sm" data-titulo="masas_cda" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="masas_cpq_cg" id="masas_cpq_cg"></textarea>
                            </div>
                        </div>
                        <!-- botones modal -->
                        <div class="col-md-3">
                            <div class="form-group">
                               <button type="button" class="btn btn-outline-primary btn-sm btn-block mb-2" onclick="no_disponible();"></i> Ver Protocólo Cirugía</button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                               <button type="button" class="btn btn-outline-primary btn-sm btn-block mb-2" onclick="no_disponible();"></i> Ver Epicrisis</button>
                            </div>
                        </div>
                    </div>
                    <!-- Observaciones Estado General Paciente -->
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="floating-label-activo-sm">Observaciones Estado General Paciente</label>
                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Estado general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_egp_cpq_cg" id="obs_egp_cpq_cg"></textarea>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cierre control post qx -->
