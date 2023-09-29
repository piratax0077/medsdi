
<div class="row">
    <div class="col-md-6">
        <!--Card Contraseña-->
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                <h5 class="mb-0 text-white">Actualizar Contraseña</h5>
                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".pass_personal" aria-expanded="false" aria-controls="pass_personal_1 pass_personal_2">
                    <i class="feather icon-edit"></i>
                </button>
            </div>
            <!--Contraseña-->
            {{--  <div class="card-body border-top pass_personal collapse show" id="pass_personal_1">
                <form>
                    <div class="form-group row">
                        <div class="col-sm-12 pt-2 ml-2 font-weight-bolder">
                            {{ Auth::user()->password }}
                            <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".pass_personal" aria-expanded="false" aria-controls="pass_personal_1 pass_personal_2">
                                <i class="feather icon-edit"></i> Actualizar Contraseña
                            </button>
                        </div>
                    </div>
                </form>
            </div>  --}}
            <!--Cierre: Contraseña-->
            <!--(Editar)Contraseña-->
            <div class="card-body border-top pass_personal collapse" id="pass_personal_2">
                <form method="get" action="{{ route('perfil.cambio_contrasena')}}" id="form_cambio_contrasena_perfil" name="form_cambio_contrasena_perfil">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bolder">Contraseña Actual</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" placeholder="Contraseña Actual" id="contrasena_actual" name="contrasena_actual">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bolder">Nueva Contraseña</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" placeholder="Nueva Contraseña" id="password_registro" name="password_registro">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bolder">Repita su Contraseña</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" placeholder="Repita la Contraseña" id="password_confirmacion_registro" name="password_confirmacion_registro">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label"></label>
                        <div class="col-sm-12 d-flex justify-content-end">
                            <div class="btn btn-danger mr-2">Cancelar</div>
                            <button type="submit" class="btn btn-info">Guardar Cambios</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--Cierre: (Editar)Contraseña-->
        </div>
        <!--Cierre: Card Contraseña-->
    </div>
</div>
