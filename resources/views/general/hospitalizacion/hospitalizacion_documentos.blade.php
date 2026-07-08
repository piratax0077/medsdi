<div class="user-profile user-card mt-0 w-100"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
               <ul class="nav nav-tabs-secciones mb-3" id="pediatria_general" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="ingreso-tab" data-toggle="tab" href="#ingreso"role="tab" aria-controls="ingreso" aria-selected="false">Ingreso a cirugía</a>
                    </li>
                    {{-- <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="protocolo-tab" data-toggle="tab" href="#protocolo" role="tab" aria-controls="protocolo" aria-selected="false">Protocolo operatorio</a>
                    </li> --}}
                    {{-- <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="recuperacion-tab" data-toggle="tab" href="#recuperacion" role="tab" aria-controls="recuperacion"  aria-selected="false">Recuperación</a>
                    </li> --}}
                     <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="defuncion-tab" data-toggle="tab" href="#defuncion" role="tab" aria-controls="defuncion" aria-selected="false">Carne Defunción</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="alta-tab" data-toggle="tab" href="#alta" role="tab" aria-controls="alta" aria-selected="false">Epicrisis y carne de alta</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="tab-content" id="at-hosp">
                    <!--Ingreso de paciente-->
                    <div class="tab-pane fade show active" id="ingreso" role="tabpanel"
                        aria-labelledby="ingreso-tab">

                        @include('general.hospitalizacion.seccion_ficha_hospitalizacion.ingreso_hosp_ambulatorio')

                    </div>

                    <!--Protocolo de cirugia-->
                    <div class="tab-pane fade" id="protocolo" role="tabpanel" aria-labelledby="protocolo-tab">
                        @include('general.hospitalizacion.seccion_ficha_hospitalizacion.protocolo')
                    </div>

                    <!--Recuperación-->
                    {{-- <div class="tab-pane fade" id="recuperacion" role="tabpanel"
                        aria-labelledby="recuperacion-tab">
                      @include('general.hospitalizacion.seccion_ficha_hospitalizacion.recuperacion')
                    </div> --}}

                    <!--Defunción-->
                     <div class="tab-pane fade" id="defuncion" role="tabpanel" aria-labelledby="defuncion-tab">
                         @include('general.hospitalizacion.seccion_ficha_hospitalizacion.defuncion')
                    </div>

                    <!--Epicrisis y carnet de alta-->
                    <div class="tab-pane fade" id="alta" role="tabpanel" aria-labelledby="alta-tab">
                        @include('general.hospitalizacion.seccion_ficha_hospitalizacion.epicrisis_alta_medica')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
