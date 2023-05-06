<div id="ingreso_m_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ingreso_m_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine"> Orden de ingreso hospitalización Para Tratamiento Médico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <script>
                            var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                            var f=new Date();
                            document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                            </script>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="info-ingreso-tab" data-toggle="tab" href="#info-ingreso" role="tab" aria-controls="info-ingreso" aria-selected="true">Info. Ingreso</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="indicaciones-tab" data-toggle="tab" href="#indicaciones" role="tab" aria-controls="indicaciones" aria-selected="false">Indicaciones ingreso</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="archivos-pab-tab" data-toggle="tab" href="#archivos-pab" role="tab" aria-controls="archivos-pab" aria-selected="false">Archivos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="comentarios-pab-tab" data-toggle="tab" href="#comentarios-pab" role="tab" aria-controls="comentarios-pab" aria-selected="false">Comentarios</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="ev-nutricional">
                                <!--INFO. INGRESO-->
                                <div class="tab-pane fade show active" id="info-ingreso" role="tabpanel" aria-labelledby="info-ingreso-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-2">
                                                <h6 class="text-c-blue">INFORMACIÓN DE INGRESO</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                <label class="floating-label-activo-sm">Médico tratante</label>
                                                <input type="text" class="form-control form-control-sm" name="med_tratante" id="med_tratante">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                <label class="floating-label-activo-sm">Clínica - Hospital</label>
                                                <input type="text" class="form-control form-control-sm" id="hosp_en" name="hosp_en">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                <label class="floating-label-activo-sm">Diagnósticos </label>
                                                <textarea class="form-control caja-texto form-control-sm " rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="dg_ingreso" id="dg_ingreso"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Servicio</label>
                                                    <input type="text" class="form-control form-control-sm" name="serv_hosp" id="serv_hosp">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                 <!--INDICACIONES INGRESO-->
                                <div class="tab-pane fade show" id="indicaciones" role="tabpanel" aria-labelledby="indicaciones-tab">
                                    <form>
                                        <div class="form-row mb-2">
                                            <div class="col-md-12 mb-2">
                                                <h6 class="text-c-blue">INDICACIONES DE INGRESO</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                <label class="floating-label-activo-sm">Indicaciones de ingreso</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ind_ingreso" id="ind_ingreso"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--ARCHIVO-->
                                <div class="tab-pane fade show" id="archivos-pab" role="tabpanel" aria-labelledby="archivos-pab-tab">
                                    <form>
                                        <div class="form-row mb-2">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                            <h6 class="mb-2 text-c-blue">ARCHIVOS</h6>
                                            <input class="mb-2" size="80" name="archivo_up" id="archivo_up" type="file" onchange="javascript: submit();">
                                            <br>
                                            <!--IDEA DEL ARCHIVO ADJUNTO
                                            <div class="alert alert-warning alert-dismissible fade show pb-2" role="alert">
                                                <i class="feather icon-file f-16"></i><a href="#" class="alert-link"> Nombre del archivo</a>
                                                <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="alert alert-warning alert-dismissible fade show pb-2" role="alert">
                                                <i class="feather icon-file f-16"></i><a href="#" class="alert-link"> Eco -Doppler- Nombre paciente.pdf</a>
                                                <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>-->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--COMENTARIOS-->
                                <div class="tab-pane fade show" id="comentarios-pab" role="tabpanel" aria-labelledby="comentarios-pab-tab">
                                    <form>
                                        <div class="form-row mb-2">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <h6 class="mb-3 text-c-blue">COMENTARIOS</h6>
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Comentarios</label>
                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="otros_hosp" id="otros_hosp"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info">Guardar y enviar</button>
                <button type="button" class="btn btn-primary">Ver formulario (PDF)</button>
                </form>
            </div>
        </div>
    </div>
</div>
