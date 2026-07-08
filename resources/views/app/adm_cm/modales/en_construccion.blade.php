<div id="en_construccion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="en_construccion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-12">
                             <button type="button" class="close cerrar-modal" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="col-12 text-center">
                            <h3 class="text-c-blue">Sección en construcción</h3>
                        </div>
                        <div class="col-12 mb-3">
                            <img src="{{ asset('images/maintance/maintance.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </form>
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-danger align-middle" onclick="cerrarModal()"; data-dismiss="modal">Cerrar Modal</button>
            </div>-->
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
