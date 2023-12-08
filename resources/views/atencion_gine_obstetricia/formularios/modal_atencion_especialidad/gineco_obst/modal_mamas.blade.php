<div id="modal_mamas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_mamas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_mamas">Examen clínico de mamas Solicitud Examen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-4 mt-2">
                            <div class="form-group fill">
                                <img src="{{ asset('images/gineco_obst/ex.mamas.png') }}" style="width:80%">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-8 mt-2">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm" for="lado_1">Seleccione lado</label>
                                        <select class="form-control form-control-sm" id="lado_1" name="lado_1">
                                            <option value="0">Seleccione </option>
                                            <option value="1">Mama derecha</option>
                                            <option value="2">Mama izquierda</option>
                                            <option value="3">Ambas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm" for="des_ex_mamas_1">Descripción del examen</label>
                                        <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="des_ex_mamas_1" id="des_ex_mamas_1"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm" for="lado_2">Seleccione lado</label>
                                        <select class="form-control form-control-sm" id="lado_2" name="lado_2">
                                            <option value="0">Seleccione </option>
                                            <option value="1">Mama derecha</option>
                                            <option value="2">mama izquierda</option>
                                            <option value="3">Ambas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm" for="des_ex_mamas_2">Descripción del examen</label>
                                        <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="des_ex_mamas_2" id="des_ex_mamas_2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="des_ex_mamasgen">Descripción general del examen</label>
                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="des_ex_mamasgen" id="des_ex_mamasgen"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 mt-2 mb-3">
                            <h6>Solicitar examen</h6>
                        </div>
                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="floating-label-activo-sm" for="sol_ex_lado">Seleccione lado</label>
                            <select class="form-control form-control-sm" id="sol_ex_lado" name="sol_ex_lado">
                                <option value="0">Seleccione </option>
                                <option value="1">Mama derecha</option>
                                <option value="2">mama izquierda</option>
                                <option value="3">Ambas</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="floating-label-activo-sm" for="sol_ex_tipo">Tipo de examen</label>
                            <select class="form-control form-control-sm" id="sol_ex_tipo" name="sol_ex_tipo">
                                <option value="0">Seleccione opción</option>
                                <option value="1">Mamografía</option>
                                <option value="2">Mamografía Digital con contraste</option>
                                <option value="3">Mamografía Tridimensional</option>
                                <option value="4">Ecografía mamaria</option>
                                <option value="5">Resonancia Magnética de Mama</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="floating-label-activo-sm" for="enf_cuadrante">Énfasis cuadrante o zona</label>
                            <select class="form-control form-control-sm" id="enf_cuadrante" name="enf_cuadrante">
                                <option value="0">Seleccione </option>
                                <option value="1">Cola</option>
                                <option value="2">S. Interno</option>
                                <option value="3">S. Externo</option>
                                <option value="4">S. Interno</option>
                                <option value="5">S. Externo</option>
                                <option value="6">Areola</option>
                                <option value="7">Pezón</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-12 mt-2 mb-3">
                            <h6>Sospecha Diagnóstica</h6>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="sosp_dg">Sospecha diagnóstica</label>
                            <select class="form-control form-control-sm" id="sosp_dg" name="sosp_dg">
                                <option VALUE="0">Seleccione </option>
                                <option VALUE="1">Examen de Rutina</option>
                                <option VALUE="2">Estudio de lesión</option>
                                <option VALUE="3">Seguimiento de lesión</option>
                                <option VALUE="4">Otra</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="sol_ex_mamas_esp">Solicitud especial</label>
                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="sol_ex_mamas_esp" id="sol_ex_mamas_esp"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm"> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function ex_mamas() {
        $('#modal_mamas').modal('show');
    }
</script>
