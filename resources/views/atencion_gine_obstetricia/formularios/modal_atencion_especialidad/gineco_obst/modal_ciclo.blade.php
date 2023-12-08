<div id="ciclo_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ciclo_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_ciclo"> Antecedentes ciclo menstrual</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="ant_1" class="text-primary" style="cursor: pointer;" onclick="abrir_div('formulario_1')">Añadir nuevo antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                    </div>
                </div>
                <div class="row py-2" id="formulario_1" style="display:none;">
                    <div class="col-md-12">
                        <form>
                            <h5> Menarquia</h5>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <label class="floating-label-activo-sm"for="fecha_actual" >Fecha</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha_actual" id="fecha_actual">
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <label class="floating-label-activo-sm"for="edad_menarquia" >Edad</label>
                                    <input type="text" class="form-control form-control-sm" name="edad_menarquia" id="edad_menarquia">
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <label class="floating-label-activo-sm" for="gr_tunner">Grado de Tunner</label>
                                    <input type="text" class="form-control form-control-sm" name="gr_tunner" id="gr_tunner">
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <label class="floating-label-activo-sm" for="fecha_comienzo">Año de comienzo</label>
                                    <input type="text" class="form-control form-control-sm" name="fecha_comienzo" id="fecha_comienzo">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                    <label class="floating-label-activo-sm" for="comentarios_menarquia">Comentarios</label>
                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="comentarios_menarquia" id="comentarios_menarquia"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <button type="button" class="btn btn-info btn-sm btn-block">Añadir</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <form>
                            <h5> Ciclo Menstrual</h5>
                            <div class="form-row">
                                <div class="form-group col-sm-3">
                                    <label class="floating-label-activo-sm" for="fur">FUR</label>
                                    <input type="date" class="form-control form-control-sm" name="fur" id="fur">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label class="floating-label-activo-sm" for="tipo_ciclo">Tipo</label>
                                    <input type="text" class="form-control form-control-sm" name="tipo_ciclo" id="tipo_ciclo">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label class="floating-label-activo-sm" for="frecuencia_ciclo">Frecuencia</label>
                                    <input type="text" class="form-control form-control-sm" name="frecuencia_ciclo" id="frecuencia_ciclo">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label class="floating-label-activo-sm" for="sintomas_ciclo">Síntomas asociados</label>
                                    <input type="text" class="form-control form-control-sm" name="sintomas_ciclo" id="sintomas_ciclo">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-8">
                                    <label class="floating-label-activo-sm" for="comentarios_ciclo">Comentarios</label>
                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="comentarios_ciclo" id="comentarios_ciclo"></textarea>
                                </div>
                                <div class="form-group col-sm-4">
                                    <button type="button" class="btn btn-info btn-sm btn-block">Añadir</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-pills mb-3" id="ciclo_menstrual" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-modal" id="menarquia_tab" data-toggle="pill" href="#menarquia" role="tab" aria-controls="menarquia" aria-selected="false">Menarquia</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-modal" id="ciclo_m_tab" data-toggle="pill" href="#ciclo_m" role="tab" aria-controls="ciclo_m" aria-selected="false">Ciclo</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="c_menstrual">
                            <!--TAB 1-->
                            <div class="tab-pane fade show active" id="menarquia" role="tabpanel" aria-labelledby="menarquia_tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5> Menarquia</h5>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="menarquia" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Fecha Registro</th>
                                                        <th class="text-center align-middle">Edad</th>
                                                        <th class="text-center align-middle">G de tunner</th>
                                                        <th class="text-center align-middle">Fecha</th>
                                                        <th class="text-center align-middle">Comentarios</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle">12/05/2021</td>
                                                        <td class="text-center align-middle">12 Años</td>
                                                        <td class="text-center align-middle">gIII</td>
                                                        <td class="text-center align-middle">12/05/2000</td>
                                                        <td class="text-center align-middle">Evolución Normal</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--TAB 2  -->
                            <div class="tab-pane fade" id="ciclo_m" role="tabpanel" aria-labelledby="ciclo_m_tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                         <h5> Ciclo</h5>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="table-responsive">
                                            <table id="menarquia" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Fecha Registro</th>
                                                        <th class="text-center align-middle">Tipo</th>
                                                        <th class="text-center align-middle">Frecuencia</th>
                                                        <th class="text-center align-middle">Sintomas Asociados</th>
                                                        <th class="text-center align-middle">Comentarios</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle">12/05/2021</td>
                                                        <td class="text-center align-middle">Irregular</td>
                                                        <td class="text-center align-middle">28/3</td>
                                                        <td class="text-center align-middle">Cefalea Irritabilidad</td>
                                                        <td class="text-center align-middle">Se inicia tratamiento</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function ex_ciclo() {
        $('#ciclo_modal').modal('show');
    }
</script>
