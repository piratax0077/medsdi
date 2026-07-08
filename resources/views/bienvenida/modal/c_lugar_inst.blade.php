<div id="c_lugar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="c_lugar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content" >
            <div class="modal-header-sdi bg-white">
                <h5 class="modal-title-sdi text-c-blue "><i class="feather icon-home icono-primary"></i> Registrar lugar de atención</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label-negro">Rut Empresa</label>
                            <input class="form-control" name="rut_lugar_atencion" id="rut_lugar_atencion" type="text" onkeyup="formatoRut(this);" placeholder="Rut de la Institución">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label-negro">Nombre</label>
                            <input class="form-control" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text" placeholder="Nombre de la Institución">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label-negro">Razon social</label>
                            <input class="form-control" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text" placeholder="Razón Social de la Institución">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label-negro">Nº de inscripción Superintendecia de salud</label>
                            <input class="form-control" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text" placeholder="Número">
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="floating-label-negro">Dirección</label>
                            <input class="form-control form-control-sm" name="direccion_lugar_atencion" id="direccion_lugar_atencion" type="text" placeholder="Dirección de la Institución">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-negro">Nº</label>
                            <input class="form-control" name="numero_lugar_atencion" id="numero_lugar_atencion" type="text" placeholder="Número">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-negro">Región</label>
                            <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar" class="form-control" required="">
                                <option value="">Seleccione Región</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-negro">Ciudad</label>
                            <select id="ciudad_agregar" name="ciudad_agregar" class="form-control form-control-sm" required="">
                                <option value="">Seleccione Ciudad</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-negro">Teléfono</label>
                            <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text" placeholder="Teléfono Fijo">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-negro">Celular (WhatsApp)</label>
                            <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text" placeholder="+569 123 456 78">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-negro">Sitio web</label>
                            <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text" placeholder="Sitio Web de la Institución">
                        </div>
                    </div>
                    <div class="col-sm-12 text-center">
                        <button type="button" class="btn btn-primary"><i class="feather icon-save"></i> Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function lugar() {
        $('#c_lugar').modal('show');
    }
</script>
