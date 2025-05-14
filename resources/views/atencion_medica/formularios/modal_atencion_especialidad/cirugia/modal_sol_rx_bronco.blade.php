<div id="m_rx_brpul" class="modal fade" role="dialog" aria-labelledby="m_rx_brpul" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Solicitud Estudio Radiológico</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal"  aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                   <div class="form-row mt-1">
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="ex-func-bronco">Exámenes Funcionales</label>
                            <select class="js-example-basic-multiple select2" name="ex-rx_bp" id="ex-rx_bp" multiple="multiple">
                                <option value="1">04 01 004 &nbsp;  |  &nbsp;  RADIOGRAFÍA DE TÓRAX, PROYECCIÓN COMPLEMENTARIA (OBLICUAS, SELECTIVAS U OTRAS)</option>
                                <option value="2">04 01 008  &nbsp;  |  &nbsp;RADIOGRAFÍA DE TÓRAX FRONTAL O LATERAL CON EQUIPO MÓVIL 	</option>
                                <option value="3">04 01 009  &nbsp;  |  &nbsp;RADIOGRAFÍA DE TÓRAX SIMPLE FRONTAL O LATERAL </option>
                                <option value="4">04 01 070 &nbsp;  |  &nbsp;RADIOGRAFÍA DE TÓRAX FRONTAL Y LATERAL  </option>
                                <option value="5">04 05 019  &nbsp;  |  &nbsp;RESONANCIA MAGNÉTICA ANGIOGRAFÍA DE TÓRAX</option>
                                <option value="6">04 05 009 &nbsp;  |  &nbsp; RESONANCIA MAGNÉTICA DE TÓRAX	</option>
                                <option value="7">05 01 122 &nbsp;  |  &nbsp;CINTIGRAFÍA PULMONAR PERFUSIÓN O VENTILACIÓN O DIFUSIÓN</option>
                                <option value="8">05 01 123 &nbsp;  |  &nbsp;CINTIGRAFÍA Y ESTUDIO ASPIRACIÓN PULMONAR	</option>
                                <option value="9">04 03 102 &nbsp;  |  &nbsp;CAPACIDAD FÍSICA DEL TRABAJO 	</option>
                                <option value="10">04 03 013 &nbsp;  |  &nbsp; TOMOGRAFÍA COMPUTARIZADA DE TÓRAX </option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm">Diagnóstico</label>
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="form-row d-none">
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label">Rut Paciente</label>
                                <input type="text" name="rut_pcte" id="rut_pcte" type="text" class="form-control form-control-sm"  value="{{ $paciente->rut }}" hidden>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label">Nombre</label>
                                <input type="text" name="zona" id="zona" type="text" class="form-control form-control-sm"  value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                            </div>
                        </div>
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label-activo-sm">Hipótesis Diagnóstica</label>
                            <textarea type="text" class="form-control form-control-sm" rows="2" name="hipotesis_certificado"
                                id="hipotesis_certificado"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="desinf">Tipo de antisepticos</label>
                            <select class="js-example-basic-multiple select2" name="desinf" id="desinf" multiple="multiple">
                                <option value="1">Solución fisiológica</option>
                                <option value="2">Bialcohol</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Observaciones</label>
                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_biopsia_orl" id="obs_biopsia_orl"></textarea>
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
                <button type="button" class="btn btn-danger btn-sm" onclick="sol_rx_bronco();" data-bs-dismiss="modal" >Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm"> Guardar</button>
            </div>
        </div>
    </div>
</div>
<style>
    .select2-dropdown{
        z-index: 9999 !important;
    }
</style>
<!-- select2 selectbonito css -->
<link rel="stylesheet" href="{{ asset('css/plugins/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/formularios.css') }}">


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script>

    function sol_rx_bronco()
    {
        $('#m_rx_brpul').modal('show');
    }
    function cerrarsol_rx_bronco() {
        $('#m_rx_brpul').modal ('hide');
      }

</script>
{{--  <link rel="stylesheet"  href="{{ asset('css\plugins\select2.min.css') }}">

<link rel="stylesheet" href="{{ asset('css/plugins/select2.min.css') }}">
<!-- select2 Js -->
<script src="{{ asset('js/plugins/select2.full.min.js') }}"></script>
<!-- form-select-custom Js -->
<script src="{{ asset('js/pages/form-select-custom.js') }}"></script>
<!-- select2 css -->  --}}
