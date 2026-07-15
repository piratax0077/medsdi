<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <!--CARD CONTRASEÑA PERSONAL-->
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between bg-primary">
                <h5 class="mb-0 text-white">Contraseña personal</h5>
                <button type="button" class="btn btn-light btn-icon m-0 float-right" data-toggle="collapse" data-target=".pass_personal" aria-expanded="false" aria-controls="pass_personal_1 pass_personal_2">
                    <i class="feather icon-edit"></i>
                </button>
            </div>
            <!--CONTRASEÑA PERSONAL-->
            <div class="card-body pass_personal collapse show" id="pass_personal_1">
                <form>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="font-weight-bolder ml-0 mb-0">Contraseña actual</label>
                            <div> •••••••• </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--CIERRE: CONTRASEÑA PERSONAL-->
            <!--(EDITAR)CONTRASEÑA PERSONAL-->
            <div class="card-body border-top pass_personal collapse" id="pass_personal_2">
                <form method="get" action="{{ route('perfil.cambio_contrasena')}}" id="form_cambio_contrasena_perfil" name="form_cambio_contrasena_perfil">
                    @csrf
                    <input type="hidden" name="contrasena_mail" id="contrasena_mail" value="{{ Auth::user()->email }}">
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo">Contraseña actual</label>
                            <div class="input-group input-group-sm">
                                <input type="password" class="form-control" id="contrasena_actual" name="contrasena_actual">
                                <div class="input-group-append">
                                    <button type="button"
                                        class="btn btn-outline-secondary btn-toggle-password"
                                        data-target="contrasena_actual"
                                        aria-label="Mostrar contraseña"
                                        title="Mostrar contraseña">
                                        <i class="feather icon-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo">Nueva contraseña</label>
                            <div class="input-group input-group-sm">
                                <input type="password" class="form-control" id="password_registro" name="password_registro">
                                <div class="input-group-append">
                                    <button type="button"
                                        class="btn btn-outline-secondary btn-toggle-password"
                                        data-target="password_registro"
                                        aria-label="Mostrar contraseña"
                                        title="Mostrar contraseña">
                                        <i class="feather icon-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo">Repita nueva contraseña</label>
                            <div class="input-group input-group-sm">
                                <input type="password" class="form-control" id="password_confirmacion_registro" name="password_confirmacion_registro">
                                <div class="input-group-append">
                                    <button type="button"
                                        class="btn btn-outline-secondary btn-toggle-password"
                                        data-target="password_confirmacion_registro"
                                        aria-label="Mostrar contraseña"
                                        title="Mostrar contraseña">
                                        <i class="feather icon-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-sm btn-danger mr-2"><i class="feather icon-x"></i> Cancelar</button>
                            <button type="submit" class="btn btn-sm btn-info"><i class="feather icon-save"></i> Guardar cambios</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--CIERRE: (EDITAR)CONTRASEÑA PERSONAL-->
        </div>
        <!--CIERRE: CARD CONTRASEÑA PERSONAL-->
    </div>
</div>


<script>
    (function () {
        function alternarVisibilidadPassword(boton) {
            var idInput = boton.getAttribute('data-target');
            var input = document.getElementById(idInput);
            var icono = boton.querySelector('i');

            if (!input) {
                return;
            }

            var mostrar = input.type === 'password';
            input.type = mostrar ? 'text' : 'password';

            if (icono) {
                icono.classList.toggle('icon-eye', !mostrar);
                icono.classList.toggle('icon-eye-off', mostrar);
            }

            boton.setAttribute(
                'aria-label',
                mostrar ? 'Ocultar contraseña' : 'Mostrar contraseña'
            );

            boton.setAttribute(
                'title',
                mostrar ? 'Ocultar contraseña' : 'Mostrar contraseña'
            );
        }

        document.addEventListener('click', function (event) {
            var boton = event.target.closest('.btn-toggle-password');

            if (!boton) {
                return;
            }

            event.preventDefault();
            alternarVisibilidadPassword(boton);
        });
    })();
</script>
