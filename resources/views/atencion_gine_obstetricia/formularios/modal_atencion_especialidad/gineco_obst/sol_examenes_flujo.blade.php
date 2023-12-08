<div id="m_sol_ex_mat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_sol_ex_mat" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_adjuntar_examen">SOLICITUD EXAMENES ESPECIALES</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                            <div class="form-group">
                                <script>
                                    var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                                    var f=new Date();
                                    document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                </script>
                            </div>
                        </div>
                        {{--  <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="" id="">
                                </input>
                            </div>
                        </div>  --}}
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm" for="num_orden">Nº de Orden</label>
                                <input type="number" name="num_orden" id="num_orden" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm"  for="ex_flujo">Examen a Solicitar</label>
                                <select class="form-control form-control-sm" name="ex_flujo" id="ex_flujo">
                                    <option value="351">Examen de flujo vaginal</option>
                                    <option value="248">Examen de flujo Clamideas</option>
                                    <option value="221 ||236">Cultivo y antibiograma Secreciones</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm"  for="sosp_clin">Sospecha Clínica</label>
                                <select class="form-control form-control-sm" name="sosp_clin" id="sosp_clin">
                                    <option value="2">Examen de rutina</option>
                                    <option value="4">Infección Vaginal</option>
                                    <option value="7">Papilomatosis</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm" for="urgencia">Urgencia</label>
                                <select class="form-control form-control-sm" name="urgencia" id="urgencia">
                                    <option value="1">Urgente</option>
                                    <option value="2">Urgencia prioridad</option>
                                    <option value="3">Urgencia normal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm"  for="obs_ex_espec">Observaciones</label>
                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ex_espec" id="obs_ex_espec"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right">
                            <i class="fa fa-plus"></i> Agregar Examen</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 mt-3">
                        <!- -**** Al agregar un examen, se debe cargar la tabla *****- ->
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Nº Orden</th>
                                            <th class="text-center align-middle">Tipo</th>
                                            <th class="text-center align-middle">sospecha</th>
                                            <th class="text-center align-middle">Urgencia</th>
                                            <th class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle"><span>03/12/20</span></td>
                                            <td class="text-center align-middle">7217821</td>
                                            <td class="text-center align-middle">pap</td>
                                            <td class="text-center align-middle">Ca Cervico-uterino</td>
                                            <td class="text-center align-middle">Urgente</td>
                                            <td class="text-center align-middle">
                                            <button class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function gine_sol_examenes_flujo() {
        $('#m_sol_ex_mat').modal('show');
    }
</script>
