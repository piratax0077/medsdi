<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-4 shadow-none">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                <h6 class="f-20 text-c-blue d-inline">Sala de recuperación</h6>
                <div class=" d-inline float-md-right text-c-blue">
                    <h6 class="text-c-blue">
                         <script>
                            var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                "Octubre", "Noviembre", "Diciembre");

                            var f = new Date();
                            document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                        </script>
                    </h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card py-0">
                    <div class="card-body py-2">
                        <ul class="nav nav-tabs-aten nav-fill" id="evolucion-rec" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="info-ingreso-tab" data-toggle="tab" href="#info-ingreso" role="tab" aria-controls="info-ingreso"  aria-selected="true">Ingresar evolución</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="indicaciones-tab" data-toggle="tab" href="#indicaciones" role="tab" aria-controls="indicaciones" aria-selected="false">Resumen de evoluciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="cirugia-pab-tab" data-toggle="tab" href="#cirugia-pab" role="tab" aria-controls="cirugia-pab" aria-selected="false">Historia de evoluciones</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <h6 class="t-aten">Evoluciones</h6>
            </div>
            <div class="col-md-10 float-right">
                <div class="btn-toolbar d-flex justify-content-end" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group btn-group-sm" role="group" aria-label="First group">
                        <button type="button" class="btn btn-info-light-c btn-sm mb-2"><i class="feather icon-plus"></i>Nueva evolución</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="tab-content" id="evolucion-rec">
                            <!--INGRESAR EVOLUCION-->
                            <div class="tab-pane fade show active" id="info-ingreso" role="tabpanel"
                                aria-labelledby="info-ingreso-tab">
                                <form>
                                  <div class="form-row">
                                        <div class="col-md-2">
                                            <h6 class="text-secondary mb-2">00-00-0000 <br>00:00:00 hrs</h6>
                                        </div>
                                        <div class="form-group col-md-10">
                                            <label class="floating-label-activo-sm">Evolución</label>
                                            <textarea class="form-control form-control-sm" rows="2" onfocus="this.rows=10" onblur="this.rows=4;"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--RESUMEN DE EVOLUCIONES-->
                            <div class="tab-pane fade show" id="indicaciones" role="tabpanel"
                                aria-labelledby="indicaciones-tab">
                                <form>
                                 <div class="form-row">
                                <div class="form-group col-md-12">
                                    <textarea class="form-control form-control-sm" rows="3" onfocus="this.rows=10" onblur="this.rows=4;"></textarea>
                                </div>
                            </div>
                                </form>
                            </div>
                             <!--HISTORIA DE EVOLUCION-->
                            <div class="tab-pane fade show" id="indicaciones" role="tabpanel"
                                aria-labelledby="indicaciones-tab">
                                <form>
                                 
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

                <div class="row mb-3">
                    <div class="col-md-12 text-center">
                        @include('general.secciones_ficha.receta_examen.seccion_receta_examen_hosp')
                    </div>
                </div>
       
    </div>
</div>
