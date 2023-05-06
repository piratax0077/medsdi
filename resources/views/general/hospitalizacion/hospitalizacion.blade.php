<!-- tab general -->
{{-- <div class="user-profile user-card pt-0">
    <div class="card-body py-0">
        <div class="user-about-block m-0">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link text-reset active" id="atender-tab" data-toggle="tab" href="#atender" role="tab" aria-controls="atender" aria-selected="true">Paciente Hospitalizado</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#licencia" role="tab" aria-controls="licencia" aria-selected="false">Licencia medica</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- tab general-->

<!--Contenido de tab-->
<div class="row">
    <div class="col-md-12">
        <div class="tab-content" id="at-dental-infantil">
            <!--Solicitud de pabellón-->
            <div class="tab-pane fade show active" id="atender" role="tabpanel" aria-labelledby="atender-tab">
                @include('general.hospitalizacion.secciones.solicitud_pabellon')
            </div>

            <!--Ingreso de paciente-->
            {{-- <div class="tab-pane fade" id="licencia" role="tabpanel" aria-labelledby="licencia-tab">
                @include('general.secciones_ficha.licencia')
            </div> --}}

            {{-- <!--Protocolo de cirugia-->
            <div class="tab-pane fade" id="protocolo" role="tabpanel" aria-labelledby="protocolo-tab">
                @include('general.hospitalizacion.secciones.protocolo')
            </div>

            <!--Recuperación-->
            <div class="tab-pane fade" id="recuperacion" role="tabpanel" aria-labelledby="recuperacion-tab">
                @include('general.hospitalizacion.secciones.recuperacion')
            </div>

            <!--Sala-->
            <div class="tab-pane fade" id="sala" role="tabpanel" aria-labelledby="sala-tab">
                @include('general.hospitalizacion.secciones.sala')
            </div>

            <!--Epicrisis y carnet de alta-->
            <div class="tab-pane fade" id="alta" role="tabpanel" aria-labelledby="alta-tab">
                @include('general.hospitalizacion.secciones.epicrisis_carnet')
            </div> --}}
        </div>
    </div>
</div>
<!--Contenido de tab-->
