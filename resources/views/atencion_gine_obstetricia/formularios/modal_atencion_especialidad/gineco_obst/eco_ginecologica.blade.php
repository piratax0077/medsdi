<div id="ecogine_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ecogine_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine"> Ecografía ginecológica</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="liq_profes_inst" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="sol_ecogine-tab" data-toggle="tab" href="#sol_ecogine" role="tab" aria-controls="sol_ecogine" aria-selected="true">Solicitar Examen</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="tomar_ecogine-tab" data-toggle="tab" href="#tomar_ecogine" role="tab" aria-controls="tomar_ecogine" aria-selected="false">Realizar Eco Ginecológica</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="sol_ecogine" role="tabpanel" aria-labelledby="sol_ecogine-tab">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-row">
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label" for="eco_sol">Solicitar</label>
                                            <select class="form-control form-control-sm" name="eco_sol" id="eco_sol">
                                                <option value="494">ECOGRAFÍA GINECOLÓGICA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm" for="sosp_dg">Sospecha Diagnóstica</label>
                                            <input type="text" class="form-control form-control-sm"name="sosp_dg">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label" for="prioridad">Prioridad</label>
                                            <select class="form-control form-control-sm" id="prioridad" name="prioridad">
                                                <option value="0">Seleccione</option>
                                                <option value="1">Baja</option>
                                                <option value="2" selected>Media</option>
                                                <option value="3">Alta</option>
                                                <option value="4">Urgente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="button" onclick="indicar_examen_cirugia();" id="agregar_examen_tabla" class="btn btn-success btn-sm float-right">
                                            <i lass="fa fa-plus"></i> Agregar Examen
                                        </button>
                                    </div>
                                    <div class="col-sm-12 mt-3">
                                        <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                                        <!--Tabla-->
                                        <div class="table-responsive">
                                            <table id="tabla_examen_cirugia" class="table table-bordered table-sm tabla_examenes_ficha">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle" style="display:none">id</th>
                                                        <th class="text-center align-middle" style="display:none">Nombre Examen</th>
                                                        <th class="text-center align-middle">Nombre Examen</th>
                                                        <th class="text-center align-middle">Prioridad</th>
                                                        <th class="text-center align-middle">Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                        <!--Cierre Tabla-->
                                        <button type="button" onclick="registro_examen_ficha();" data-dismiss="modal" class="btn btn-info">Generar Orden de Examen</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="tomar_ecogine" role="tabpanel" aria-labelledby="tomar_ecogine-tab">
                            <div class="col-sm-12 col-md-12">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <script>
                                                var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                                                var f=new Date();
                                                document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                            </script>
                                        </div>
                                        <div class="form-group col-md-2" id="">
                                            <label class="floating-label-activo-sm" for="tipo">Tipo de Eco</label>
                                            <div class="form-group fill">
                                                <select class="form-control form-control-sm" id="tipo" name="tipo">
                                                    <option>Seleccione</option>
                                                    <option>Trans-vaginal</option>
                                                    <option>Abdominal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm" for="sol_por">Derivada por:</label>
                                                <select name="sol_por" id="sol_por" class="form-control form-control-sm"   onchange="evaluar_para_carga_detalle('sol_por','div_sol_por','sol_por_obs',2)">
                                                    <option value="0">Seleccione</option>
                                                    <option value="1">Propia</option>
                                                    <option value="2">Dr/a</option>
                                                </select>
                                            </div>
                                            <div class="form-group"  id="div_sol_por" style="display:none">
                                                <label class="floating-label-activo-sm" for="sol_por_nom">Profesional solicitante <i>(Anote Nombre)</i> </label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"   onfocus="this.rows=3" onblur="this.rows=1;" name="sol_por_nom" id="sol_por_nom"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm" for="motivo">Motivo</label>
                                                <select class="form-control form-control-sm" id="mot_examen" name="mot_examen" class="form-control form-control-sm"  onchange="evaluar_para_carga_detalle('mot_examen','div_mot_examen','mot_examen',4)">>
                                                    <option value="0">Seleccione</option>
                                                    <option value="1">Examen de Rutina</option>
                                                    <option value="2">Control Embarazo Normal</option>
                                                    <option value="3">Control Embarazo Patológico</option>
                                                    <option value="4">Otro</option>
                                                </select>
                                            </div>
                                            <div class="form-group"  id="div_mot_examen" style="display:none">
                                                <label class="floating-label-activo-sm" for="mot_examen">Motivo Examen <i>(Anote Motivo)</i> </label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="mot_examen" id="mot_examen"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <h6 class="float-left d-inline">UTERO</h6>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="floating-label-activo-sm" for="ex_utero">En General</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_utero" id="ex_utero"></textarea>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="floating-label-activo-sm" for="endometrio">Endometrio</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="endometrio" id="endometrio"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <h6 class="float-left d-inline">OVARIOS</h6>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="floating-label-activo-sm" for="ovario_der">Ovario Derecho</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ovario_der" id="ovario_der"></textarea>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="floating-label-activo-sm" for="ovario_izq">Ovario Izquierdo</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ovario_izq" id="ovario_izq"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <h6 class="float-left d-inline">TROMPAS</h6>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="floating-label-activo-sm" for="trompa_der">Trompa Derecha</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="trompa_der" id="trompa_der"></textarea>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="floating-label-activo-sm" for="trompa_izq">Trompa Izquierda</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="trompa_izq" id="trompa_izq"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <h6 class="float-left d-inline">FONDO DE SACO</h6>
                                        </div>
                                        <div class="form-group col-md-10">
                                            <label class="floating-label-activo-sm" for="fondo_saco">Trompa Derecha</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="fondo_saco" id="fondo_saco"></textarea>
                                        </div>
                                        {{--  <div class="form-group col-md-5">
                                            <label class="floating-label-activo-sm" for="desc_motivo">Trompa Izquierda</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_mamas" id="ex_mamas"></textarea>
                                        </div>  --}}
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <h6 class="float-left d-inline">CONCLUSIÓN</h6>
                                        </div>
                                        <div class="form-group col-md-10">
                                            <label class="floating-label-activo-sm" for="dg_ecografico">Diagnóstico Ecográfico</label>
                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="dg_ecografico" id="dg_ecografico"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label class="floating-label-activo-sm" for="obs_eco">Observaciones</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_eco" id="obs_eco"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <p class="f-12 mb-0 font-weight-bold text-center">Imagenes</p>
                                            <div id="imagenes_eco_gine" class="collapse show" aria-labelledby="eco_gine" data-parent="#eco_gine">
                                                <div class="dropzone" id="mis-imagenes-eco_gine" action="{{ route('profesional.imagen.carga') }}"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-success has-ripple">Guardar<span class="ripple ripple-animate" style="height: 94.375px; width: 94.375px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -33.6875px; left: -14.3125px;"></span></button>
                                                <button class="btn btn-primary" align:center>Ver formulario PDF</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function eco_gine() {
        $('#ecogine_modal').modal('show');
    }
</script>
