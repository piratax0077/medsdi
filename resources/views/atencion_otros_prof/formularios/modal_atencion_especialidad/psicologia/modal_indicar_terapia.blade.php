<div id="indicar_terapia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_terapia"aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Plan de Tratamiento Terápia sicológica</h5>
                <input type="hidden" id="id_profesional" value="{{ @Auth::user()->id }}">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span  aria-hidden="true">×</span> </button>


            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-wizard active " id="rec_auto_tab" data-toggle="pill" href="#rec_auto" role="tab" aria-controls="rec_auto" aria-selected="true">Terapia 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-wizard  " id="rec_auto_tab" data-toggle="pill" href="#rec_auto" role="tab" aria-controls="rec_auto" aria-selected="true">Terapia 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-wizard " id="rec_auto_tab" data-toggle="pill" href="#rec_auto" role="tab" aria-controls="rec_auto" aria-selected="true">Terapia 3</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="pills-tablas_examenes">
                            <!--TAB 1-->
                            <div class="tab-pane fade show active" id="rec_auto" role="tabpanel" aria-labelledby="rec_auto_tab">
                                {{-- <form id="form_indicar_terapia"> --}}
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="tab-content" id="venereas">
                                                <!--SINTOMAS GENERALES-->
                                                <div class="tab-pane fade show active" id="uro_ven_sint" role="tabpanel" aria-labelledby="uro_ven_sint_tab">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Vida diaria</label>
                                                            <select class="form-control form-control-sm" name="select_1_psi_vidadiaria" id="select_1_psi_vidadiaria" multiple="multiple">
                                                                <option value="1">Control de temperamento</option>
                                                                <option value="2">Meditar</option>
                                                                <option value="3">Trabajar en las relaciones familiares</option>
                                                                <option value="4">Otro</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Conducta y hábitos sexuales</label>
                                                            <select class="form-control form-control-sm" name="select_2_psi_ant_cond" id="select_2_psi_ant_cond" multiple="multiple">
                                                                <option value="1">Pareja única</option>
                                                                <option value="2">mas de una pareja</option>
                                                                <option value="3">Comercio Sexual</option>
                                                                <option value="4">Conversar con la pareja</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Vida Laboral</label>
                                                            <select class="form-control form-control-sm" name="select_3_psi_laboral" id="select_3_psi_laboral" multiple="multiple">
                                                                <option value="HP">Llegar temprano</option>
                                                                <option value="HP">Conversar con compañeros</option>
                                                                <option value="DI">Compartir en las comidas</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Autoestima</label>
                                                            <select class="form-control form-control-sm" name="select_4_psi_autoestima" id="select_4_psi_autoestima" multiple="multiple">
                                                                <option value="HP">Reconocer logros personales</option>
                                                                <option value="HP">Explorar los limites</option>
                                                                <option value="DI">Encontrarse bonita</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label-activo-sm">Observaciones al plan de trabajo</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="obs_ind_terapia_psi" id="obs_ind_terapia_psi"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function ind_terapia() {
        $('#indicar_terapia').modal('show');
    }
    $(document).ready(function() {
        $('#select_1_psi_vidadiaria').select2();
        $('#select_2_psi_ant_cond').select2();
        $('#select_3_psi_laboral').select2();
        $('#select_4_psi_autoestima').select2();
        $('#select_5_psi_ssfam').select2();
        $('#select_6_psi_gen').select2();
        $('#select_7_psi_ant_cond').select2();
        $('#select_8_psi_prot').select2();
        $('#select_9_psi_cont_sos').select2();
    });
</script>

