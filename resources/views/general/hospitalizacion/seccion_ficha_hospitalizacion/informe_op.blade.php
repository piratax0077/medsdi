<!--INFORME OP-->
<div class="row mb-2">
    <div class="col-md-12">
        <h6 class="f-20 text-c-blue d-inline">Informe Terapia</h6>
        <div class=" d-inline float-right">
            <h6 class="text-c-blue">
             <script>
                var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                    "Octubre", "Noviembre", "Diciembre");

                var f = new Date();
                document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
            </script>
            <h6>
        </div>
    </div>
</div> 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                    <div class="row">
                        <!--Evoluciones-->
                        <div class="col-12">
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                    <label class="floating-label-activo-sm">Diagnóstico Clínico</label>
                                    <input type="text" class="form-control form-control-sm" name="info_hosp_op_dg_clinico" id="info_hosp_op_dg_clinico">
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                    <label class="floating-label-activo-sm">Diagnóstico Especialidad</label>
                                    <input type="text" class="form-control form-control-sm" name="info_hosp_op_dg_especialidad" id="info_hosp_op_dg_especialidad">
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                    <label class="floating-label-activo-sm">Sesiones</label>
                                    <input type="text" class="form-control form-control-sm" name="info_hosp_op_ses_real" id="info_hosp_op_ses_real">
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                    <label class="floating-label-activo-sm">Sesiones Pendientes</label>
                                    <input type="text" class="form-control form-control-sm" name="info_hosp_op_ses_pend" id="info_hosp_op_ses_pend">
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Tratamiento Realizado</label>
                                    <input type="text" class="form-control form-control-sm" name="info_hosp_op_tto_realizado" id="info_hosp_op_tto_realizado">
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label id="" name="" class="floating-label-activo-sm">Comentarios</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="info_hosp_op_comentario" id="info_hosp_op_comentario"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-8">
                                    <label class="floating-label-activo-sm">Nombre Profesional</label>
                                    <input type="text" class="form-control form-control-sm" name="info_hosp_op_nomb_prof" id="info_hosp_op_nomb_prof">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label class="floating-label-activo-sm">Próximo Control</label>
                                    <input type="date" class="form-control form-control-sm" name="info_hosp_op_prox_cont" id="info_hosp_op_prox_cont">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-info"><i class="feather icon-save"></i> Guardar Informe</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>


