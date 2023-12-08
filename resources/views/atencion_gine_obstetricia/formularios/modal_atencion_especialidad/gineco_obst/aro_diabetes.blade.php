<div id="modal_aro_glicemia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_aro_glicemia" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Control De Patología del Metabolismo de la glucosa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-pills mb-3" id="ciclo_menstrual" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-modal" id="grafica_diab_tab" data-toggle="pill" href="#grafica_diab" role="tab" aria-controls="grafica_diab" aria-selected="false">Grafica</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="c_hip">
                            <div class="tab-pane fade show" id="grafica_diab" role="tabpanel" aria-labelledby="grafica_diab_tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h5>Evolución Glicemia Peso Tamaño Fetal</h5>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <img src="{{ asset('images\grafico.png') }}" style="width:100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="ant_8" onclick="abrir_div('formulario_11');" class="text-primary" style="cursor: pointer;">Añadir nuevo antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                    </div>
                </div>
                <div class="row py-2" id="formulario_11" style="display:none;">
                    <div class="col-md-12">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                    <p class="font-italic mt-0 mb-0 text-black">
                                        @php
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        $fecha = \Carbon\Carbon::parse(now());
                                        $mes = $meses[($fecha->format('n')) - 1];
                                        $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                                        @endphp
                                        {{ $fecha }}
                                    </p>
                                </div>
                                <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                    <label class="floating-label-activo-sm" for="peso">Peso</label>
                                    <input type="text" class="form-control form-control-sm" name="peso" id="peso">
                                </div>
                                <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2" id="form_0">
                                    <label class="floating-label-activo-sm" for="glicemia">Glicemia</label>
                                    <input type="text" class="form-control form-control-sm" name="glicemia" id="glicemia">
                                </div>

                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <label class="floating-label-activo-sm" for="hg_glicosilada">Hg Glicosilada</label>
                                    <input type="text" class="form-control form-control-sm" name="hg_glicosilada" id="hg_glicosilada">
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <label class="floating-label-activo-sm" for="tam_fetal">Tamaño Fetal</label>
                                    <input type="text" class="form-control form-control-sm" name="tam_fetal" id="tam_fetal">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="c_hip">
                            <!--TAB 1-->
                            <div class="tab-pane fade show active" id="ant_prog" role="tabpanel" aria-labelledby="ant_prog_tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5> Controles anteriores</h5>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="table-responsive">
                                            <table id="riesgo_Embarazos_ant" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Fecha</th>
                                                        <th class="text-center align-middle">Control<i>(Hora)</i></th>
                                                        <th class="text-center align-middle">Peso</th>
                                                        <th class="text-center align-middle">Glicemia</th>
                                                        <th class="text-center align-middle">HbA1c</th>
                                                        <th class="text-center align-middle">Tamaño Fetal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle">00/00/0000</td>
                                                        <td class="text-center align-middle">1.00 AM</td>
                                                        <td class="text-center align-middle">85</td>
                                                        <td class="text-center align-middle">140</td>
                                                        <td class="text-center align-middle">100</td>
                                                        <td class="text-center align-middle">grande</td>
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
    function Aro_glucosa() {
        $('#modal_aro_glicemia').modal('show');
    }

</script>
