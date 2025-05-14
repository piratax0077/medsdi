<div id="m_bronco" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_bronco" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Solicitud Exámenes Endoscópicos</h5>
                <button type="button" class="close text-white"  data-bs-dismiss="modal" ><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row d-none">
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="" id="">
                                </input>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label">Nº de orden</label>
                                <input type="number" type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="form-row d-none">
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label">Rut Paciente</label>
                                <input type="text" name="rut_pcte" id="rut_pcte" type="text" class="form-control form-control-sm"  value="{{ $paciente->rut }}">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label">Nombre</label>
                                <input type="text" name="zona" id="zona" type="text" class="form-control form-control-sm"  value="{{ $paciente->nombre . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                            </div>
                        </div>
                        {{--  <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label-activo-sm">Hipótesis Diagnóstica</label>
                            <textarea type="text" class="form-control form-control-sm" rows="2" name="hipotesis_certificado"
                                id="hipotesis_certificado"></textarea>
                        </div>  --}}
                    </div>
                    <div class="form-row mt-1">
                       
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="ex-endosc-bronco">Exámenes Funcionales</label>
                            <select class="js-example-basic-multiple select2" name="ex-endosc-bronco" id="ex-endosc-bronco" multiple="multiple">	
                                <option value="1">17 07 021 &nbsp;  |  &nbsp;  LARINGOTRAQUEOBRONCOSCOPÍA CON FIBROSCOPIA</option>	
                                <option value="2">17 07 022 &nbsp;  |  &nbsp;  LARIGOTRAQUEOSCOPÍA CON TUBO RÍGIDO</option>	
                                <option value="3">17 07 023  &nbsp;  |  &nbsp; MEDIASTINOSCOPIA C/S BIOPSIA </option>	
                                <option value="4">17 07 024 &nbsp;  |  &nbsp;  PLEUROSCOPIA (TORACOSCOPIA) C/S BIOPSIA	</option>
                                <option value="5">17 07 056 &nbsp;  |  &nbsp;  ENDOSONOGRAFÍA BRONQUIAL (EBUS) 	</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm">Diagnóstico</label>
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Observaciones</label>
                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ex-funcionales bronco" id="obs_ex-funcionales bronco"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right">
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
                                            <th class="text-center align-middle">Examen</th>
                                            <th class="text-center align-middle">Diagnóstico</th>
                                            <th class="text-center align-middle">Observaciones</th>
                                            <th class="text-center align-middle">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle"><span>03/12/20</span></td>
                                            <td class="text-center align-middle">Espirometría</td>
                                            <td class="text-center align-middle">EBOC</td>
                                            <td class="text-center align-middle">insuficiencia</td>

                                            <td class="text-center align-middle">
                                            <button class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                            <button class="btn btn-primary btn-sm ">PDF</button>
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
                <button type="button" class="btn btn-danger btn-sm" onclick="cerrarsol_examen_broncoscopia();" data-bs-dismiss="modal" >Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm"> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>

    function sol_examen_broncoscopia()
    {
        $('#m_bronco').modal('show');
    }
    function cerrarsol_examen_broncoscopia() {
        $('#m_bronco').modal ('hide');
      }

</script>
