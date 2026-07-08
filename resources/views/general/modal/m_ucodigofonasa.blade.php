<div id="modal_codfonasa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_codfonasa" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Buscador de código FONASA</h5>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close"  onclick="abrirModalFonasa();"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                        <ul class="nav nav-tabs-aten nav-fill mb-2" id="orl_adulto" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset show active" id="b-nombre-fonasa-tab" data-toggle="tab" href="#b-nombre-fonasa-" role="tab" aria-controls="b-nombre-fonasa" aria-selected="true">Búsqueda por código</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset show" id="b-codigo-fonasa-tab" data-toggle="tab" href="#b-codigo-fonasa-" role="tab" aria-controls="b-codigo-fonasa-" aria-selected="true">Búsqueda por nombre</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="orl_adulto">
                            <!--BÚSQUEDA POR CÓDIGO-->
                            <div class="tab-pane fade show active" id="b-nombre-fonasa-" role="tabpanel" aria-labelledby="b-nombre-fonasa-tab">
                                <form>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 mb-2">
                                            <h5 class="tit-gen">Búsqueda por código</h5>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-12">
                                            <div class="card-informacion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="input-group col-sm-12 col-md-12 mb-3">
                                                            <input type="number" class="form-control form-control-sm" placeholder="Ingresar código" name="modal_codfonasa_codigo" id="modal_codfonasa_codigo">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary btn-sm" type="button" id="button-addon2" onclick="buscar_por_codigo();"><i class="feather icon-search"></i> Buscar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 mb-2 mt-3">
                                            <h6 class="tit-gen">Resultado de la búsqueda</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12">
                                            <div class="card-informacion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12" name="modal_codfonasa_mensaje_codigo" id="modal_codfonasa_mensaje_codigo">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--BÚSQUEDA POR NOMBRE-->
                            <div class="tab-pane fade show" id="b-codigo-fonasa-" role="tabpanel" aria-labelledby="b-codigo-fonasa-tab">
                                <form>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 mb-2">
                                            <h5 class="tit-gen">Búsqueda por nombre</h5>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12">
                                            <div class="card-informacion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="input-group col-sm-12 col-md-12 mb-3">
                                                            <input type="text" class="form-control form-control-sm" placeholder="Ingresar nombre" name="modal_codfonasa_nombre" id="modal_codfonasa_nombre">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary btn-sm" type="button" id="button-addon2" onclick="buscar_por_nombre();"><i class="feather icon-search"></i> Buscar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 mb-2 mt-3">
                                            <h6 class="tit-gen">Resultado de la búsqueda</h6>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-12">
                                            <div class="card-informacion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12" name="modal_codfonasa_mensaje_nombre" id="modal_codfonasa_mensaje_nombre">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="cerrarModalFonasa();">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
     function abrirModalFonasa() {
        $('#modal_codfonasa').modal('show');
    }

    function cerrarModalFonasa() {
        $('#modal_codfonasa').modal('hide');
    }


      /*CIERRE: CIERRE MODALS*/

    function ufonasa (){
        $('#modal_codfonasa').modal('show');
    }

    function buscar_por_codigo()
    {
        $('#modal_codfonasa_mensaje_codigo').html('');
        let url = "{{ route('fonasa.buscar.por.codigo') }}";
        var valor = $('#modal_codfonasa_codigo').val();
        if(valor != '')
        {
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    valor:valor
                },
                success: (resp)=>{
                    if(resp.estado==1)
                    {
                        var texto = '';
                        if(resp.cantidad>0)
                        {
                            $.each(resp.registros, function (key, value) {
                                texto += '<strong>'+value.codigo+'</strong> - '+value.nombre+'<br>';
                            });
                            $('#modal_codfonasa_mensaje_codigo').html('<div class="alert alert-primary text-c-blue" role="alert">'+texto+'</div>');
                        }
                        else
                        {
                            $('#modal_codfonasa_mensaje_codigo').html('<div class="alert alert-danger text-danger" role="alert">No se han encontrado resultados de tu búsqueda</div>');
                        }
                    }
                    else
                    {
                        $('#modal_codfonasa_mensaje_codigo').html('<div class="alert alert-danger" role="alert">No se han encontrado resultados de tu búsqueda</div>');
                    }
                },
                error: (resp)=>{
                    console.warn(resp);
                }
            });
        }
        else
        {
            $('#modal_codfonasa_mensaje_codigo').html('<div class="alert alert-danger" role="alert">No ha ingresado valor para realizar la busqueda, intente nuevamente</div>');
        }
    }

    function buscar_por_nombre()
    {
        $('#modal_codfonasa_mensaje_nombre').html('');
        let url = "{{ route('fonasa.buscar.por.nombre') }}";
        var valor = $('#modal_codfonasa_nombre').val();
        if(valor != '')
        {
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    valor:valor
                },
                success: (resp)=>{
                    if(resp.estado==1)
                    {
                        var texto = '';
                        if(resp.cantidad>0)
                        {
                            $.each(resp.registros, function (key, value) {
                                texto += '<strong>'+value.codigo+'</strong> - '+value.nombre+'<br>';
                            });
                            $('#modal_codfonasa_mensaje_nombre').html('<div class="alert alert-primary text-c-blue" role="alert">'+texto+'</div>');
                        }
                        else
                        {
                            $('#modal_codfonasa_mensaje_nombre').html('<div class="alert alert-danger text-danger" role="alert">No se han encontrado resultados de tu búsqueda</div>');
                        }
                    }
                    else
                    {
                        $('#modal_codfonasa_mensaje_nombre').html('<div class="alert alert-danger" role="alert">No se han encontrado resultados de tu búsqueda</div>');
                    }
                },
                error: (resp)=>{
                    console.warn(resp);
                }
            });
        }
        else
        {
            $('#modal_codfonasa_mensaje_nombre').html('<div class="alert alert-danger" role="alert">No ha ingresado valor para realizar la busqueda, intente nuevamente</div>');
        }
    }
</script>
