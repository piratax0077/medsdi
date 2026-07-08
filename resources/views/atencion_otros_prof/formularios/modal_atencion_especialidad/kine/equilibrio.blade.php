
<div id="equilibrio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="equilibrio" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Evaluación equilibrio</h5>
                <button type="button" class="close text-white" data-dismiss="modal" onclick="$('#equilibrio').modal('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                            <p class="fecha-sm"><strong>Fecha del examen</strong>
                                <script>
                                    var f = new Date();
                                    document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                 </script>
                             </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <!--Equilibrio estático-->

                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                            <h6 class="t-aten">Equilibrio estático</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-activo-sm">Prueba de Romberg</label>
                                            <input type="text" class="form-control form-control-sm" name="romberg" id="romberg">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-activo-sm">Prueba de Romberg Sensibilizada</label>
                                            <input type="text" class="form-control form-control-sm" name="romberg_sens" id="romberg_sens">
                                        </div>
                                    </div>

                            <!--Equilibrio cinético-->

                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                            <h6 class="t-aten">Equilibrio Cinético</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">Marcha con ojos abiertos</label>
                                            <input type="text" class="form-control form-control-sm" name="marcha_ojo_ab" id="marcha_ojo_ab">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">Prueba de Babinsky-weil </label>
                                            <input type="text" class="form-control form-control-sm" name="babinsky" id="babinsky">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">Prueba de Romberg Barre</label>
                                            <input type="text" class="form-control form-control-sm" name="romberg_barre" id="romberg_barre">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">Prueba de Untenberg-Fakuda</label>
                                            <input type="text" class="form-control form-control-sm" name="untenberg_fak" id="untenberg_fak">
                                        </div>
                                    </div>

                            <!--Equilibrio segmentario-->

                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                            <h6 class="t-aten">Equilibrio Segmentário</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label class="floating-label-activo-sm">Prueba de la Indicación</label>
                                            <input type="text" class="form-control form-control-sm" name="indicacion" id="indicacion">
                                        </div>
                                    </div>

                            <!--Equilibrio cerebelo-->

                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                            <h6 class="t-aten">Cerebelo</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo-sm">Temblor intencional</label>
                                            <input type="text" class="form-control form-control-sm" name="temblor" id="temblor">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo-sm">Dismetría</label>
                                            <input type="text" class="form-control form-control-sm" name="dismetria" id="dismetria">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo-sm">Disinergia</label>
                                            <input type="text" class="form-control form-control-sm" name="discinergia" id="discinergia">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo-sm">Disdiadococinesia</label>
                                            <input type="text" class="form-control form-control-sm" name="disdiadoco" id="disdiadoco">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo-sm">Hipotonía</label>
                                            <input type="text" class="form-control form-control-sm" name="hipotonia" id="hipotonia">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo-sm">Otras pruebas</label>
                                            <input type="text" class="form-control form-control-sm" name="otras_pruebas" id="otras_pruebas">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                            <label class="floating-label-activo-sm">Observaciones a las pruebas de equilibrio</label>
                                            <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="observaciones_equilibrio" id="observaciones_equilibrio" placeholder="OBSERVACIONES GENERALES, SINTOMATOLOGIA REACCIONES, ETC."></textarea>
                                        </div>
                                    </div>

                            <!--Nistagmo espontáneo-->

                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                            <h6 class="t-aten">Nistagmo espontáneo</h6>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-3 mb-3">
                                            <table class="rounded" style="border: 1px solid #ced4da; width:100%; padding-bottom: 10px;">
                                                <th class="text_center x-100">Sin Fijación Ocular

                                                </th>
                                                <tr>
                                                    <td></td>
                                                    <td class="text_center">
                                                        <select id="ng_1" class="ng_esp" size="1" name="ng_1">
                                                            <option value="1"> p</option>
                                                            <option value="2"> g</option>
                                                            <option value="3"> f</option>
                                                            <option value="4"> i</option>
                                                            <option value="5"> h</option>
                                                            <option value="6"> j</option>
                                                            <option value="7"> k</option>
                                                            <option value="8"> m</option>
                                                            <option value="9"> l</option>
                                                            <option value="10"> n</option>
                                                        </select>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select id="ng_2" class="ng_esp" size="1" name="ng_2">
                                                            <option value="1"> t</option>
                                                            <option value="2"> g</option>
                                                            <option value="3"> f</option>
                                                            <option value="4"> i</option>
                                                            <option value="5"> h</option>
                                                            <option value="6"> j</option>
                                                            <option value="7"> k</option>
                                                            <option value="8"> m</option>
                                                            <option value="9"> l</option>
                                                            <option value="10"> n</option>
                                                        </select>
                                                    </td>
                                                    <td class="text_center">
                                                        <select id="ng_3" class="ng_esp" size="1" name="ng_3">
                                                            <option value="1"> </option>
                                                            <option value="2"> g</option>
                                                            <option value="3"> f</option>
                                                            <option value="4"> i</option>
                                                            <option value="5"> h</option>
                                                            <option value="6"> j</option>
                                                            <option value="7"> k</option>
                                                            <option value="8"> m</option>
                                                            <option value="9"> l</option>
                                                            <option value="10"> n</option>
                                                        </select>
                                                    </td>
                                                    <td class="text_left">
                                                        <select id="ng_4" class="ng_esp" size="1" name="ng_4">
                                                            <option value="1"> u</option>
                                                            <option value="2"> g</option>
                                                            <option value="3"> f</option>
                                                            <option value="4"> i</option>
                                                            <option value="5"> h</option>
                                                            <option value="6"> j</option>
                                                            <option value="7"> k</option>
                                                            <option value="8"> m</option>
                                                            <option value="9"> l</option>
                                                            <option value="10"> n</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td class="text_center">
                                                        <select id="ng_5" class="ng_esp" size="1" name="ng_5">
                                                            <option value="1"> q</option>
                                                            <option value="2"> g</option>
                                                            <option value="3"> f</option>
                                                            <option value="4"> i</option>
                                                            <option value="5"> h</option>
                                                            <option value="6">j</option>
                                                            <option value="7"> k</option>
                                                            <option value="8"> m</option>
                                                            <option value="9"> l</option>
                                                            <option value="10"> n</option>
                                                        </select>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-3 mb-3">
                                            <table class="pb-2 rounded" style="border: 1px solid  #ced4da; width:100%">
                                                <tr>
                                                    <td class="text_center" colspan="3">Con fijación Ocular</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="text_center">
                                                        <select id="ng_6" class="ng_esp" size="1" name="ng_6">
                                                            <option value="1"> p</option>
                                                            <option value="2"> g</option>
                                                            <option value="3"> f</option>
                                                            <option value="4"> i</option>
                                                            <option value="5"> h</option>
                                                            <option value="6"> j</option>
                                                            <option value="7"> k</option>
                                                            <option value="8"> m</option>
                                                            <option value="9">l</option>
                                                            <option value="10"> n</option>
                                                        </select>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select id="ng_7" class="ng_esp" size="1" name="ng_7">
                                                            <option value="1">t</option>
                                                            <option value="2"> g</option>
                                                            <option value="3"> f</option>
                                                            <option value="4"> i</option>
                                                            <option value="5"> h</option>
                                                            <option value="6"> j</option>
                                                            <option value="7"> k</option>
                                                            <option value="8"> m</option>
                                                            <option value="9"> l</option>
                                                            <option value="10"> n</option>
                                                        </select>
                                                    </td>
                                                    <td class="text_center">
                                                        <select id="ng_8" class="ng_esp" size="1" name="ng_8">
                                                            <option value="1"> </option>
                                                            <option value="2"> g</option>
                                                            <option value="3"> f</option>
                                                            <option value="4">i</option>
                                                            <option value="5"> h</option>
                                                            <option value="6"> j</option>
                                                            <option value="7"> k</option>
                                                            <option value="8"> m</option>
                                                            <option value="9"> l</option>
                                                            <option value="10"> n</option>
                                                        </select>
                                                    </td>
                                                    <td class="tib_left">
                                                        <select id="ng_9" class="ng_esp" size="1" name="ng_9">
                                                            <option value="1"> u</option>
                                                            <option value="2"> g</option>
                                                            <option value="3"> f</option>
                                                            <option value="4"> i</option>
                                                            <option value="5"> h</option>
                                                            <option value="6"> j</option>
                                                            <option value="7"> k</option>
                                                            <option value="8"> m</option>
                                                            <option value="9"> l</option>
                                                            <option value="10"> n</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td class="text_center">
                                                        <select id="ng_10" class="ng_esp" size="1" name="ng_10">
                                                            <option value="1"> q</option>
                                                            <option value="2"> g</option>
                                                            <option value="3"> f</option>
                                                            <option value="4"> i</option>
                                                            <option value="5"> h</option>
                                                            <option value="6"> j</option>
                                                            <option value="7"> k</option>
                                                            <option value="8"> m</option>
                                                            <option value="9"> l</option>
                                                            <option value="10"> n</option>
                                                        </select>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-3 mb-3">
                                            <label class="floating-label-activo-sm">Mov. oculares involuntarios y persecución</label>
                                            <textarea class="form-control caja-texto form-control-sm"  rows="6"  name="mov_oculares" id="mov_oculares" placeholder="Obs. generales, sintomatologia reacciones, etc."></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-3 mb-3">
                                            <label class="floating-label-activo-sm">Dismetría Ocular</label>
                                            <textarea class="form-control caja-texto form-control-sm"  rows="6"  name="dismetria_ocular" id="dismetria_ocular" placeholder="Obs. generales, sintomatologia reacciones, etc."></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                            <label class="floating-label-activo-sm">Comentarios</label>
                                            <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_comentarios" id="obs_comentarios" placeholder="Obs. generales, sintomatologia reacciones, etc."></textarea>
                                        </div>
                                    </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-danger btn-sm" onclick="$('#equilibrio').modal('hide')" data-bs-dismiss="modal"> <i class="feather icon-x"></i> Cerrar</button>
                <button type="button" class="btn btn-info-light-c btn-sm"><i class="feather icon-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .ng_esp {
        /* Common */
    font : 13px 'Wingdings 3';
        color : #0000ff;
        width: 60px; background-color: #f6faf9; color: #FF0000;text-align:center; font-weight: bold; font-size: x-large;
        background-color: #f6faf9;
        text-align:center;
        font-weight: bold;
        display: block;
        width: 100%;
        padding: 0.4rem 0.5rem 0.3rem 0.5rem!important;
        font-size: 1.0rem;
        font-weight: 400;
        line-height: 1.5;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 3px;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    @font-face {
        font-family: 'Wingdings 3';
    }
</style>

<script>
    function equilibrio() {
        $('#equilibrio').modal('show');
    }
</script>


