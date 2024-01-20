<div id="m_eval_espasmof" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_eval_espasmof" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Evaluación de la Espasmofemia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="tede" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="ant-gen-eves-tab" data-toggle="tab" href="#ant-gen-eves" role="tab" aria-controls="ant-gen-eves" aria-selected="true">Antecedentes generales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="eval-eves-tab" data-toggle="tab" href="#eval-eves" role="tab" aria-controls="eval-eves" aria-selected="false">Evaluaciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="hab-eves-tab" data-toggle="tab" href="#hab-eves" role="tab" aria-controls="hab-eves" aria-selected="false">Habla</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="habesp-eves-tab" data-toggle="tab" href="#habesp-eves" role="tab" aria-controls="habesp-eves" aria-selected="false">Habla espontanea</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="lect-sin-eves-tab" data-toggle="tab" href="#lect-sin-eves" role="tab" aria-controls="lect-sin-eves" aria-selected="false">Lectura sin ritmo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="lect-con-eves-tab" data-toggle="tab" href="#lect-con-eves" role="tab" aria-controls="lect-con-eves" aria-selected="false">Lectura con ritmo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="rep-palora-eves-tab" data-toggle="tab" href="#rep-palora-eves" role="tab" aria-controls="rep-palora-eves" aria-selected="false">Rep. de palabras y oraciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="rep-autom-eves-tab" data-toggle="tab" href="#rep-autom-eves" role="tab" aria-controls="rep-autom-eves" aria-selected="false">Rep. de series automáticas</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="tede_info">
                            <!--ANTECEDENTES GENERALES-->
                            <div class="tab-pane fade show active" id="ant-gen-eves" role="tabpanel" aria-labelledby="ant-gen-eves-tab">
                                <div id="espasmofemia" class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="tit-gen">ANTECEDENTES GENERALES</h6>
                                    </div>
                                </div>     
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Comienzo</label>
                                        <select class="form-control form-control-sm" name="modo_resp" id="modo_resp">
                                            <option value="NO">Espontáneo</option>
                                            <option value="NA">Provocado</option>
                                            <option value="BU">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-8 col-xl-8">
                                        <label class="floating-label-activo-sm">Condiciones de aparición</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cond_aparicion" id="cond_aparicion"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-lg-6">
                                        <label class="floating-label-activo-sm">Evolución</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="evol" id="evol"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-lg-6">
                                        <label class="floating-label-activo-sm">Tratamientos anteriores</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="trat_ant" id="trat_ant"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-lg-6">
                                        <label class="floating-label-activo-sm">Personalidad</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="perso" id="perso"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-lg-6">
                                        <label class="floating-label-activo-sm">Conciencia del Problema</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="con_prob" id="con_prob"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Fenómenos Emocionales</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="fen_em" id="fen_em"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Factor Hereditario</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="fact_her" id="fact_her"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Relación Familiar</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="rel_fam" id="rel_fam"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--EVALUACIONES-->
                            <div class="tab-pane fade show" id="eval-eves" role="tabpanel" aria-labelledby="eval-eves-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="tit-gen">Evaluaciones</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Evaluación OFA</label>
                                            <select class="form-control form-control-sm" name="modo_resp" id="modo_resp">
                                                <option value="NO">Normal</option>
                                                <option value="NA">Nasal</option>
                                                <option value="BU">Bucal</option>
                                                <option value="MI">Mixta</option>
                                            </select>
                                        </div>
                                    <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                        <label class="floating-label-activo-sm">Observaciones</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_ofa" id="obs_ofa"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Praxias</label>
                                        <select class="form-control form-control-sm" name="modo_resp" id="modo_resp">
                                            <option value="NO">Normal</option>
                                            <option value="NA">Nasal</option>
                                            <option value="BU">Bucal</option>
                                            <option value="MI">Mixta</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                        <label class="floating-label-activo-sm">Observaciones</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_praxias" id="obs_praxias"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Respiración</label>
                                        <select class="form-control form-control-sm" name="modo_resp" id="modo_resp">
                                            <option value="NO">Normal</option>
                                            <option value="NA">Nasal</option>
                                            <option value="BU">Bucal</option>
                                            <option value="MI">Mixta</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                        <label class="floating-label-activo-sm">Observaciones</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_resp" id="obs_resp"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Musculatura</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_musc" id="obs_musc"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Comentario y Observaciones</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_coment" id="obs_coment"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--HABLA-->
                            <div class="tab-pane fade show" id="hab-eves" role="tabpanel" aria-labelledby="hab-eves-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="tit-gen">HABLA</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Fluidez</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="habla_fluidez" id="habla_fluidez"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Ritmo</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="habla_ritmo" id="habla_ritmo"></textarea>
                                    </div>
                                   <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Prosódia</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="habla_prosodia" id="habla_prosodia"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--HABLA ESPONTANEA-->
                            <div class="tab-pane fade show" id="habesp-eves" role="tabpanel" aria-labelledby="habesp-eves-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="tit-gen">HABLA ESPONTÁNEA</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Conducta Verbal</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="haesp_cond_verb" id="haesp_cond_verb"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Conducta Motora Asociada</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="haesp_condmot" id="haesp_condmot"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Caractéres de Enunciados</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="haesp_enunc" id="haesp_enunc"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label  class="floating-label-activo-sm">Fenómenos Emocionales Asociados</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="haesp_emocional" id="haesp_emocional"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--LECTURA SIN RITMO-->
                            <div class="tab-pane fade show" id="lect-sin-eves" role="tabpanel" aria-labelledby="lect-sin-eves-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="tit-gen">Lectura sin ritmo</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Conducta Verbal</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lectsin_verb" id="lectsin_verb"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Conducta Motora Asociada</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lectsin_mot" id="lectsin_mot"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Caractéres de Enunciados</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lectsin_enun" id="lectsin_enun"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Fenómenos Emocionales Asociados</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lectsin_emoc" id="lectsin_emoc"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--LECTURA CON RITMO-->
                            <div class="tab-pane fade show" id="lect-con-eves" role="tabpanel" aria-labelledby="lect-con-eves-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="tit-gen">Lectura con ritmo</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Conducta Verbal</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lectcon_verb" id="lectcon_verb"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Conducta Motora Asociada</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lectcon_mot" id="lectcon_mot"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Caractéres de Enunciados</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lectcon_enun" id="lectcon_enun"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Fenómenos Emocionales Asociados</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lectcon_emoc" id="lectcon_emoc"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--REP. DE PALABRAS Y ORACIONES-->
                            <div class="tab-pane fade show" id="rep-palora-eves" role="tabpanel" aria-labelledby="rep-palora-eves-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="tit-gen">Repetición de palabras y oraciones</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Conducta Verbal</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_resp" id="obs_resp"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Conducta Motora Asociada</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_resp" id="obs_resp"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Caractéres de Enunciados</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_resp" id="obs_resp"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Fenómenos Emocionales Asociados</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_resp" id="obs_resp"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--REP. DE SERIES AUTOMATICAS-->
                            <div class="tab-pane fade show" id="rep-autom-eves" role="tabpanel" aria-labelledby="rep-autom-eves-tab">
                                <div class="form-row">
                                     <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="tit-gen">Repetición de series automáticas</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Conducta Verbal</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_resp" id="obs_resp"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Conducta Motora Asociada</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_resp" id="obs_resp"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Caractéres de Enunciados</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_resp" id="obs_resp"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Fenómenos Emocionales Asociados</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_resp" id="obs_resp"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-lg-6">
                                        <label class="floating-label-activo-sm">Diagnóstico</label>
                                        <div class="form-group">
                                            <select class="form-control form-control-sm" name="dg_espasmp" id="dg_espasm">
                                                <option value="NO">Espasmofémia Tónica</option>
                                                <option value="NA">Espasmofémia Clónica</option>
                                                <option value="BU">Espasmofémia Mixta</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-lg-6">
                                        <label class="floating-label-activo-sm">Gravedad</label>
                                        <div class="form-group">
                                            <select class="form-control form-control-sm" name="grav_espasm" id="grav_espasm">
                                                <option value="NO">Ligera</option>
                                                <option value="NA">Moderada</option>
                                                <option value="BU">Grave</option>
                                                <option value="MI">Severa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-light-c btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                <button type="submit" class="btn btn-info-light-c btn-sm"><i class="feather icon-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function e_espasmo() {
        $('#m_eval_espasmof').modal('show');
    }
</script>
	
		
	
	


	
