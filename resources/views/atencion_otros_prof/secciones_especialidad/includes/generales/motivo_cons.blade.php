<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="mot_consulta">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#mot_consulta_c" aria-expanded="true" aria-controls="mot_consulta_c">
                Motivo Consulta
            </button>
        </div>
        <div id="mot_consulta_c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
            <div class="card-body-aten-a p-10">
                <div class="form-row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm" for="tipo_consulta">Tipo de Consulta</label>
                            <select name="tipo_consulta_d" id="tipo_consulta_d" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_consulta_d','div_tipo_consulta_d','tipo_consulta_der_d',2);">
                                <option selected  value="1">Espontánea</option>
                                <option value="2">Derivada</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_tipo_consulta_d" style="display:none;">
                            <label class="floating-label-activo-sm" for="der_por">Derivada por:</label>
                            <input type="text" class="form-control form-control-sm"name="der_por" id="der_por">
                        </div>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-4">
                        <label class="floating-label-activo-sm" for="cond_fis_ingreso">Condiciones físicas de ingreso</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=5" onblur="this.rows=1;" name="cond_fis_ingreso" id="cond_fis_ingreso"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-4">
                        <label class="floating-label-activo-sm" for="num_sesiones">N° Sesiones</label>
                        <input type="number" class="form-control form-control-sm" name="num_sesiones" id="num_sesiones">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-4">
                        <label class="floating-label-activo-sm" for="dg_ingreso">Diagnóstico de ingreso</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=5" onblur="this.rows=1;" name="dg_ingreso" id="dg_ingreso"></textarea>                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-4">
                        <label class="floating-label-activo-sm" for="solicitud_prof">Solicitud del Profesional </label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=5" onblur="this.rows=1;" name="solicitud_prof" id="solicitud_prof"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-4">
                        <label class="floating-label-activo-sm" for="espect_pcte"> Espectativas del paciente</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=5" onblur="this.rows=1;" name="espect_pcte" id="espect_pcte"></textarea>
                    </div>
                </div>
                <div class="form-row mb-2">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                        <label class="floating-label-activo-sm" for="evol_indicaciones">Resumen de historia</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1" data-input_igual="historia_ingreso_sico" onchange="cargarIgual('evol_indicaciones')"  onfocus="this.rows=10" onblur="this.rows=1;" name="evol_indicaciones" id="evol_indicaciones" placeholder="ANOTE ITEMS IMPORTANTES O HISTORIA RESUMIDA"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-outline-primary btn-sm mt-1" id="btnGrabarvozIndex">
                            🎤 Dictar historia
                        </button>
                        <span id="estado_voz_index" class="text-muted ml-2"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

