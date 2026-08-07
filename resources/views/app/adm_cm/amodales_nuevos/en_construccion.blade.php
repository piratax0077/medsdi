<div id="en_construccion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="en_construccion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
          
                    <div class="row">
                        <div class="col-sm-12 text-center">
                <h4 class="text-c-blue">Sección en construcción</h4>
                <h6>Estamos trabajando en este módulo. Pronto estará disponible.</h6>
            </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <img src="{{ asset('images/maintance/maintance.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary align-middle" onclick="cerrarModal()"; data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function en_construccion() {
        $('#en_construccion').modal('show');
    }
    function cerrarModal() {
        $('#en_construccion').modal('hide');
        }
</script>
