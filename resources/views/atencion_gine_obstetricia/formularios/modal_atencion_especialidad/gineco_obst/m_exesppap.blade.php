<div id="m_exesppap" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_exesppap" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_adjuntar_examen">
                EXAMEN P-A-P</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <script>
                                    var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                                    var f=new Date();
                                    document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                </script>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nº de Orden</label>
                                <input type="number" name="num_orden" id="num_orden" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Examen de PAP</label>
                                <select class="form-control form-control-sm" name="ex_pap" id="ex_pap">
                                    <option value="649">Examen de PAP</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm t-red" for="sosp_clinica">Sospecha clínica</label>
                                <select name="sosp_clinica" data-titulo="Sospecha clínica"  data-seccion="ex PAP" id="sosp_clinica" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sosp_clinica','div_sosp_clinica','obs_sosp_clinica',6);">
                                    <option   value="0">Seleccione</option>
                                    <option value="1">Examen de rutina</option>
                                    <option value="2">Lesión Cervical Pequeña</option>
                                    <option value="3">Lesión Cervical grande</option>
                                    <option value="4">Papilomatosis</option>
                                    <option value="5">Ca Cervico-Uterino</option>
                                    <option value="6">Otro</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_sosp_clinica" style="display:none;">
                                <label class="floating-label-activo-sm t-red" for="obs_sosp_clinica">Sospecha clínica <i>(describir)</i></label>
                                <textarea class="form-control form-control-sm" data-titulo="Obs. Sospecha clínica" data-seccion="ex PAP" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_sosp_clinica" id="obs_sosp_clinica"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Urgencia</label>
                                <select class="form-control form-control-sm" name="urgencia" id="urgencia">
                                    <option>Urgente</option>
                                    <option>Urgencia prioridad</option>
                                    <option>Urgencia normal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Observaciones</label>
                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_pap" id="obs_pap"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <button type="button" class="btn btn-info btn-sm float-right">
                            <i class="fa fa-plus"></i> Agregar examen</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 mt-3">
                        <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-xs">
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
                            <!--Cierre Tabla-->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm">Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function sol_pap() {
        $('#m_exesppap').modal('show');
    }
</script>
