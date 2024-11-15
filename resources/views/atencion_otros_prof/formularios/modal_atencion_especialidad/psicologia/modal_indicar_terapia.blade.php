<div id="indicar_terapia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_terapia"aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Plan de tratamiento terapia sicológica</h5>
                <input type="hidden" id="id_profesional" value="{{ @Auth::user()->id }}">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span  aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="tablas_examenes" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten active " id="rec_auto_1_tab" data-toggle="pill" href="#rec_auto_1" role="tab" aria-controls="rec_auto_1" aria-selected="true">Terapia 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten" id="rec_auto_2_tab" data-toggle="pill" href="#rec_auto_2" role="tab" aria-controls="rec_auto_2" aria-selected="true">Terapia 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten" id="rec_auto_3_tab" data-toggle="pill" href="#rec_auto_3" role="tab" aria-controls="rec_auto_3" aria-selected="true">Terapia 3</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="pills-tablas_examenes">
                            <!--TAB 1-->
                            <div class="tab-pane fade show active" id="rec_auto_1" role="tabpanel" aria-labelledby="rec_auto_1_tab">
                                {{-- <form id="form_indicar_terapia"> --}}
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="tab-content" id="venereas">
                                                <!--SINTOMAS GENERALES-->
                                                <div class="tab-pane fade show active" id="uro_ven_sint" role="tabpanel" aria-labelledby="uro_ven_sint_tab">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label form="select_1_psi_vidadiaria_1" class="floating-label-activo-sm">Vida diaria</label>
                                                            <select class="form-control form-control-sm" name="select_1_psi_vidadiaria_1" id="select_1_psi_vidadiaria_1" multiple="multiple">
                                                                <option value="1">Control de temperamento</option>
                                                                <option value="2">Meditar</option>
                                                                <option value="3">Trabajar en las relaciones familiares</option>
                                                                <option value="4">Otro</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Conducta y hábitos sexuales</label>
                                                            <select class="form-control form-control-sm" name="select_2_psi_ant_cond_1" id="select_2_psi_ant_cond_1" multiple="multiple">
                                                                <option value="1">Pareja única</option>
                                                                <option value="2">mas de una pareja</option>
                                                                <option value="3">Comercio Sexual</option>
                                                                <option value="4">Conversar con la pareja</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Vida Laboral</label>
                                                            <select class="form-control form-control-sm" name="select_3_psi_laboral_1" id="select_3_psi_laboral_1" multiple="multiple">
                                                                <option value="HP">Llegar temprano</option>
                                                                <option value="HP">Conversar con compañeros</option>
                                                                <option value="DI">Compartir en las comidas</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Autoestima</label>
                                                            <select class="form-control form-control-sm" name="select_4_psi_autoestima_1" id="select_4_psi_autoestima_1" multiple="multiple">
                                                                <option value="HP">Reconocer logros personales</option>
                                                                <option value="HP">Explorar los limites</option>
                                                                <option value="DI">Encontrarse bonita</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <label class="floating-label-activo-sm">Obs. al plan de trabajo</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="obs_ind_terapia_psi_1" id="obs_ind_terapia_psi_1"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {{-- </form> --}}
                            </div>

                            <!--TAB 2-->
                            <div class="tab-pane fade" id="rec_auto_2" role="tabpanel" aria-labelledby="rec_auto_2_tab">
                                {{-- <form id="form_indicar_terapia"> --}}
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="tab-content" id="venereas">
                                                <!--SINTOMAS GENERALES-->
                                                <div class="tab-pane fade show active" id="uro_ven_sint" role="tabpanel" aria-labelledby="uro_ven_sint_tab">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label form="select_1_psi_vidadiaria_2" class="floating-label-activo-sm">Vida diaria</label>
                                                            <select class="form-control form-control-sm" name="select_1_psi_vidadiaria_2" id="select_1_psi_vidadiaria_2" multiple="multiple">
                                                                <option value="1">Control de temperamento</option>
                                                                <option value="2">Meditar</option>
                                                                <option value="3">Trabajar en las relaciones familiares</option>
                                                                <option value="4">Otro</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Conducta y hábitos sexuales</label>
                                                            <select class="form-control form-control-sm" name="select_2_psi_ant_cond_2" id="select_2_psi_ant_cond_2" multiple="multiple">
                                                                <option value="1">Pareja única</option>
                                                                <option value="2">mas de una pareja</option>
                                                                <option value="3">Comercio Sexual</option>
                                                                <option value="4">Conversar con la pareja</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Vida Laboral</label>
                                                            <select class="form-control form-control-sm" name="select_3_psi_laboral_2" id="select_3_psi_laboral_2" multiple="multiple">
                                                                <option value="HP">Llegar temprano</option>
                                                                <option value="HP">Conversar con compañeros</option>
                                                                <option value="DI">Compartir en las comidas</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Autoestima</label>
                                                            <select class="form-control form-control-sm" name="select_4_psi_autoestima_2" id="select_4_psi_autoestima_2" multiple="multiple">
                                                                <option value="HP">Reconocer logros personales</option>
                                                                <option value="HP">Explorar los limites</option>
                                                                <option value="DI">Encontrarse bonita</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <label class="floating-label-activo-sm">Obs. al plan de trabajo</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="obs_ind_terapia_psi_2" id="obs_ind_terapia_psi_2"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {{-- </form> --}}
                            </div>

                            <!--TAB 3-->
                            <div class="tab-pane fade" id="rec_auto_3" role="tabpanel" aria-labelledby="rec_auto_3_tab">
                                {{-- <form id="form_indicar_terapia"> --}}
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="tab-content" id="venereas">
                                                <!--SINTOMAS GENERALES-->
                                                <div class="tab-pane fade show active" id="uro_ven_sint" role="tabpanel" aria-labelledby="uro_ven_sint_tab">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label form="select_1_psi_vidadiaria_3" class="floating-label-activo-sm">Vida diaria</label>
                                                            <select class="form-control form-control-sm" name="select_1_psi_vidadiaria_3" id="select_1_psi_vidadiaria_3" multiple="multiple">
                                                                <option value="1">Control de temperamento</option>
                                                                <option value="2">Meditar</option>
                                                                <option value="3">Trabajar en las relaciones familiares</option>
                                                                <option value="4">Otro</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Conducta y hábitos sexuales</label>
                                                            <select class="form-control form-control-sm" name="select_2_psi_ant_cond_3" id="select_2_psi_ant_cond_3" multiple="multiple">
                                                                <option value="1">Pareja única</option>
                                                                <option value="2">mas de una pareja</option>
                                                                <option value="3">Comercio Sexual</option>
                                                                <option value="4">Conversar con la pareja</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Vida Laboral</label>
                                                            <select class="form-control form-control-sm" name="select_3_psi_laboral_3" id="select_3_psi_laboral_3" multiple="multiple">
                                                                <option value="HP">Llegar temprano</option>
                                                                <option value="HP">Conversar con compañeros</option>
                                                                <option value="DI">Compartir en las comidas</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Autoestima</label>
                                                            <select class="form-control form-control-sm" name="select_4_psi_autoestima_3" id="select_4_psi_autoestima_3" multiple="multiple">
                                                                <option value="HP">Reconocer logros personales</option>
                                                                <option value="HP">Explorar los limites</option>
                                                                <option value="DI">Encontrarse bonita</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <label class="floating-label-activo-sm">Obs. al plan de trabajo</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="obs_ind_terapia_psi_3" id="obs_ind_terapia_psi_3"></textarea>
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
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <button type="button" class="btn btn-danger mt-1 has-ripple" onclick="$('#indicar_terapia').modal('hide');limpiar_ind_terapia();">Cancelar</button>
                            </div>
                            <div class="col-md-6 text-center">
                                <button type="button" class="btn btn-success mt-1 has-ripple" onclick="registrar_ind_terapia();">Guardar</button>
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
        limpiar_ind_terapia();
        $('#indicar_terapia').modal('show');
    }
    $(document).ready(function() {
        $('#select_1_psi_vidadiaria_1').select2();
        $('#select_2_psi_ant_cond_1').select2();
        $('#select_3_psi_laboral_1').select2();
        $('#select_4_psi_autoestima_1').select2();

        $('#select_1_psi_vidadiaria_2').select2();
        $('#select_2_psi_ant_cond_2').select2();
        $('#select_3_psi_laboral_2').select2();
        $('#select_4_psi_autoestima_2').select2();

        $('#select_1_psi_vidadiaria_3').select2();
        $('#select_2_psi_ant_cond_3').select2();
        $('#select_3_psi_laboral_3').select2();
        $('#select_4_psi_autoestima_3').select2();
    });

    function registrar_ind_terapia()
    {

        var id_ficha_atencion = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var id_profesional = $('#id_profesional_fc').val();

        var psi_vidadiaria_1 = $('#select_1_psi_vidadiaria_1').val();
        var psi_ant_cond_1 = $('#select_2_psi_ant_cond_1').val();
        var psi_laboral_1 = $('#select_3_psi_laboral_1').val();
        var psi_autoestima_1 = $('#select_4_psi_autoestima_1').val();
        var obs_ind_terapia_psi_1 = $('#obs_ind_terapia_psi_1').val();

        var psi_vidadiaria_2 = $('#select_1_psi_vidadiaria_2').val();
        var psi_ant_cond_2 = $('#select_2_psi_ant_cond_2').val();
        var psi_laboral_2 = $('#select_3_psi_laboral_2').val();
        var psi_autoestima_2 = $('#select_4_psi_autoestima_2').val();
        var obs_ind_terapia_psi_2 = $('#obs_ind_terapia_psi_2').val();

        var psi_vidadiaria_3 = $('#select_1_psi_vidadiaria_3').val();
        var psi_ant_cond_3 = $('#select_2_psi_ant_cond_3').val();
        var psi_laboral_3 = $('#select_3_psi_laboral_3').val();
        var psi_autoestima_3 = $('#select_4_psi_autoestima_3').val();
        var obs_ind_terapia_psi_3 = $('#obs_ind_terapia_psi_3').val();

        var mensaje_registros = '';
        var error_en_proceso = 0;

        var url = '{{ route("ficha.otro.prof.plan_tratamiento.registro") }}';

        var token = CSRF_TOKEN;

        if( psi_vidadiaria_1 != '' || psi_ant_cond_1 != '' || psi_laboral_1 != '' || psi_autoestima_1 != '' || obs_ind_terapia_psi_1 != ''
            || psi_vidadiaria_2 != '' || psi_ant_cond_2 != '' || psi_laboral_2 != '' || psi_autoestima_2 != '' || obs_ind_terapia_psi_2 != ''
            || psi_vidadiaria_3 != '' || psi_ant_cond_3 != '' || psi_laboral_3 != '' || psi_autoestima_3 != '' || obs_ind_terapia_psi_3 != ''
        )
        {
            if( psi_vidadiaria_1 != '' || psi_ant_cond_1 != '' || psi_laboral_1 != '' || psi_autoestima_1 != '' || obs_ind_terapia_psi_1 != '' )
            {
                /** terapia 1 */
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token:token,
                        id_ficha_otros_prof:id_ficha_atencion,
                        id_paciente:id_paciente,
                        id_profesional:id_profesional,
                        terapia:1,
                        psi_vidadiaria:psi_vidadiaria_1.join(", "),
                        psi_ant_cond:psi_ant_cond_1.join(", "),
                        psi_laboral:psi_laboral_1.join(", "),
                        psi_autoestima:psi_autoestima_1.join(", "),
                        obs_ind_terapia_psi:obs_ind_terapia_psi_1,
                    },
                })
                .done(function(response) {

                    if (response.estado == 1)
                    {
                        $('#select_1_psi_vidadiaria_1').val('').select2();
                        $('#select_2_psi_ant_cond_1').val('').select2();
                        $('#select_3_psi_laboral_1').val('').select2();
                        $('#select_4_psi_autoestima_1').val('');
                        $('#obs_ind_terapia_psi_1').val('');

                        mensaje_registros += 'Plan de tratamiento terapia sicológica 1, registrado con exito. \n';
                    }
                    else
                    {
                        mensaje_registros += 'Plan de tratamiento terapia sicológica 1, registrado con falla. \n';
                        error_en_proceso++;
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                });
            }
            else
            {
                // mensaje_registros += 'Tratamiento 1 sin valores.\n';
            }

            if( psi_vidadiaria_2 != '' || psi_ant_cond_2 != '' || psi_laboral_2 != '' || psi_autoestima_2 != '' || obs_ind_terapia_psi_2 != '' )
            {
                /** terapia 2 */
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token:token,
                        id_ficha_otros_prof:id_ficha_atencion,
                        id_paciente:id_paciente,
                        id_profesional:id_profesional,
                        terapia:2,
                        psi_vidadiaria:psi_vidadiaria_2.join(", "),
                        psi_ant_cond:psi_ant_cond_2.join(", "),
                        psi_laboral:psi_laboral_2.join(", "),
                        psi_autoestima:psi_autoestima_2.join(", "),
                        obs_ind_terapia_psi:obs_ind_terapia_psi_2,
                    },
                })
                .done(function(response) {

                    if (response.estado == 1) {

                        $('#select_1_psi_vidadiaria_2').val('').select2();
                        $('#select_2_psi_ant_cond_2').val('').select2();
                        $('#select_3_psi_laboral_2').val('').select2();
                        $('#select_4_psi_autoestima_2').val('');
                        $('#obs_ind_terapia_psi_2').val('');

                        mensaje_registros += 'Plan de tratamiento terapia sicológica 2, registrado con exito. \n';
                    }
                    else
                    {
                        mensaje_registros += 'Plan de tratamiento terapia sicológica 2, registrado con falla. \n';
                        error_en_proceso++;
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                });
            }
            else
            {
                // mensaje_registros += 'Tratamiento 2 sin valores.\n';
            }

            if( psi_vidadiaria_3 != '' || psi_ant_cond_3 != '' || psi_laboral_3 != '' || psi_autoestima_3 != '' || obs_ind_terapia_psi_3 != '' )
            {
                /** terapia 3 */
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token:token,
                        id_ficha_otros_prof:id_ficha_atencion,
                        id_paciente:id_paciente,
                        id_profesional:id_profesional,
                        terapia:3,
                        psi_vidadiaria:psi_vidadiaria_3.join(", "),
                        psi_ant_cond:psi_ant_cond_3.join(", "),
                        psi_laboral:psi_laboral_3.join(", "),
                        psi_autoestima:psi_autoestima_3.join(", "),
                        obs_ind_terapia_psi:obs_ind_terapia_psi_3,
                    },
                })
                .done(function(response) {

                    if (response.estado == 1) {

                        $('#select_1_psi_vidadiaria_3').val('').select2();
                        $('#select_2_psi_ant_cond_3').val('').select2();
                        $('#select_3_psi_laboral_3').val('').select2();
                        $('#select_4_psi_autoestima_3').val('');
                        $('#obs_ind_terapia_psi_3').val('');

                        mensaje_registros += 'Plan de tratamiento terapia sicológica 3, registrado con exito. \n';
                    }
                    else
                    {
                        mensaje_registros += 'Plan de tratamiento terapia sicológica 3, registrado con falla. \n';
                        error_en_proceso++;
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                });
            }
            else
            {
                // mensaje_registros += 'Tratamiento 3 sin valores.\n';
            }
        }
        else
        {
            mensaje_registros = 'Debe ingresar valores a registrar. ';
            error_en_proceso++
        }


        swal({
            title: "Registro de Plan de tratamiento terapia sicológica",
            text: mensaje_registros,
            icon: "info",
        });

        if(error_en_proceso == 0)
        {
            $('#indicar_terapia').modal('hide');
        }
    }

    function limpiar_ind_terapia()
    {
        $('#rec_auto_1_tab').trigger('click')
        $('#select_1_psi_vidadiaria_1').val('').select2();
        $('#select_2_psi_ant_cond_1').val('').select2();
        $('#select_3_psi_laboral_1').val('').select2();
        $('#select_4_psi_autoestima_1').val('').select2();
        $('#obs_ind_terapia_psi_1').val('');

        $('#select_1_psi_vidadiaria_2').val('').select2();
        $('#select_2_psi_ant_cond_2').val('').select2();
        $('#select_3_psi_laboral_2').val('').select2();
        $('#select_4_psi_autoestima_2').val('').select2();
        $('#obs_ind_terapia_psi_2').val('');

        $('#select_1_psi_vidadiaria_3').val('').select2();
        $('#select_2_psi_ant_cond_3').val('').select2();
        $('#select_3_psi_laboral_3').val('').select2();
        $('#select_4_psi_autoestima_3').val('').select2();
        $('#obs_ind_terapia_psi_3').val('');
    }
</script>

