<div id="modal_mamas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_mamas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_mamas">Examen clínico de mamas</h5>
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
                                        <label class="floating-label-activo-sm">Seleccione lado</label>
                                        <select class="form-control form-control-sm" id="" name="">
                                            <option>Seleccione </option>
                                            <option>Mama derecha</option>
                                            <option>Mama izquierda</option>
                                            <option>Ambas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Descripción del examen</label>
                                        <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="des_ex_mamas" id="des_ex_mamas"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Seleccione lado</label>
                                        <select class="form-control form-control-sm" id="" name="">
                                            <option>Seleccione </option>
                                            <option>Mama derecha</option>
                                            <option>mama izquierda</option>
                                            <option>Ambas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Descripción del examen</label>
                                        <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="des_ex_mamas1" id="des_ex_mamas1"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Descripción general del examen</label>
                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="des_ex_mamasgen" id="des_ex_mamasgen"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 mt-2 mb-3">
                            <h6>Solicitar examen</h6>
                        </div>
                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="floating-label-activo-sm">Seleccione lado</label>
                            <select class="form-control form-control-sm" id="" name="">
                                <option>Seleccione </option>
                                <option>Mama derecha</option>
                                <option>mama izquierda</option>
                                <option>Ambas</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="floating-label-activo-sm">Tipo de examen</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione opción</option>
                                <option>Mamografía</option>
                                <option>Mamografía Digital con contraste</option>
                                <option>Mamografía Tridimensional</option>
                                <option>Ecografía mamaria</option>
                                <option>Resonancia Magnética de Mama</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="floating-label-activo-sm">Énfasis cuadrante o zona</label>
                            <select class="form-control form-control-sm" id="" name="">
                                <option>Seleccione</option>
                                <option>Cola</option>
                                <option>S. Interno</option>
                                <option>S. Externo</option>
                                <option>S. Interno</option>
                                <option>S. Externo</option>
                                <option>Areola</option>
                                <option>Pezón</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-12 mt-2 mb-3">
                            <h6>Sospecha Diagnóstica</h6>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm">Sospecha diagnóstica</label>
                            <select class="form-control form-control-sm" id="" name="">
                                <option>Seleccione </option>
                                <option>Examen de Rutina</option>
                                <option>Estudio de lesión</option>
                                <option>Seguimiento de lesión</option>
                                <option>Otra</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm">Solicitud especial</label>
                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="sol_ex_mamasgen" id="sol_ex_mamasgen"></textarea>
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
