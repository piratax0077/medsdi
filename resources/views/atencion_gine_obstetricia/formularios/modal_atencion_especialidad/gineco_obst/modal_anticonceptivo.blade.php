<div id="anticonceptivo_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="anticonceptivo_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_ciclo"> Antecedentes métodos anticonceptivos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="ant_4" onclick="abrir_div('formulario_4');" class="text-primary" style="cursor: pointer;">Añadir nuevo antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                    </div>
                </div>
                <div class="row py-2" id="formulario_4" style="display:none;">
                    <div class="col-md-12">
                        <form>
                            <h5> Hormonales</h5>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha_actual" id="fecha_actual">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Fármaco</label>
                                    <input type="text" class="form-control form-control-sm" name="farmaco" id="farmaco">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Tiempo</label>
                                    <input type="text" class="form-control form-control-sm" name="gr_tunner" id="gr_tunner">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                    <label class="floating-label-activo-sm">Comentarios</label>
                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="comentarios_menarquia" id="comentarios_menarquia"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <button type="button" class="btn btn-info btn-sm btn-block">Añadir</button>
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="col-md-12">
                        <form>
                            <h5> Mecánicos</h5>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Tipo</label>
                                    <input type="text" class="form-control form-control-sm" name="tipo" id="tipo">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Fecha instalación</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha_instalacion" id="fecha_instalacion">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                    <label class="floating-label-activo-sm">Comentarios</label>
                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="comentarios_ciclo" id="comentarios_ciclo"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <button type="button" class="btn btn-info btn-sm btn-block">Añadir</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                 <hr>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-pills mb-3" id="anticonceptivo" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-modal" id="hormonales_tab" data-toggle="pill" href="#hormonales" role="tab" aria-controls="hormonales" aria-selected="false">Hormonales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-modal" id="mecanico_tab" data-toggle="pill" href="#mecanico" role="tab" aria-controls="mecanico" aria-selected="false">Mecánicos</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="anticoncep">
                            <!--TAB 1-->
                            <div class="tab-pane fade show active" id="hormonales" role="tabpanel" aria-labelledby="hormonales_tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Hormonales</h5>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="hormonales" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Fecha Registro</th>
                                                        <th class="text-center align-middle">Fármaco</th>
                                                        <th class="text-center align-middle">Tiempo</th>
                                                        <th class="text-center align-middle">Comentarios</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle">12/05/2021</td>
                                                        <td class="text-center align-middle">anulet</td>
                                                        <td class="text-center align-middle">6 meses</td>
                                                        <td class="text-center align-middle">Control 6 meses</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--TAB 2  -->
                            <div class="tab-pane fade" id="mecanico" role="tabpanel" aria-labelledby="mecanico_tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                         <h5>Mecánicos</h5>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="menarquia" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Fecha Registro</th>
                                                        <th class="text-center align-middle">Tipo</th>
                                                        <th class="text-center align-middle">Fecha de Instalación</th>
                                                        <th class="text-center align-middle">Comentarios</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle">12/05/2021</td>
                                                        <td class="text-center align-middle">DIU</td>
                                                        <td class="text-center align-middle">28/3/2022</td>
                                                        <td class="text-center align-middle">Sangrado leve</td>
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
    function anticonc() {
        $('#anticonceptivo_modal').modal('show');
    }
</script>
