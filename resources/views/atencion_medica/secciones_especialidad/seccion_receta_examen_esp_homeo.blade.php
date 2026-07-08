<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <!--INDICACIONES-->
    {{-- <div class="row">
        <div class="col-sm-12 col-md-12 text-center">
            <p class="my-0">Completar diagnóstico para activar botones</p>
        </div>
    </div> --}}
    <div class="row">
        @if(!empty(session('lic_token')) && session('lic_estado') == 1)
            @if (isset($fichaAtencion) && $fichaAtencion->hipotesis_diagnostico != null)
                <div class="col-sm-12 col-md-6 text-center">
                    <div class="btn-group btn-group-sm w-100" data-toggle="buttons">
                        <button type="button" id="btn_agregar_medicamento" class=" btn_agregar_medicamento btn btn-info btn-sm mt-1 wid-80" onclick="i_medicamento_homeo();"><i class="feather icon-plus"></i> Indicar medicamento Homeopatía</button>
                        <button type="button" onclick="ver_pdf_receta($('#id_fc').val());" class=" btn_medicamento_pdf btn btn-primary  btn-sm mt-1 wid-20" id="btn_medicamento_pdf"><i class="feather icon-file"></i> Ver PDF</button>
                        {{-- <button type="button" onclick="ver_pdf_receta_retenido($('#id_fc').val());" class="btn btn-warning-light btn-sm mt-1" id=""><i class="feather icon-file"></i> Ver PDF</button> --}}
                    </div>
                </div>
                {{-- <div class="col-sm-12 col-md-6">
                    <div class="btn-group btn-group-sm w-100" data-toggle="buttons">
                        <button type="button" id="btn_agregar_examen" class="btn_agregar_examen btn btn-info btn-sm mt-1 wid-80" onclick="mostrar_modal_examen_cirguria();"><i class="feather icon-plus"></i> Indicar examen</button>
                        <button type="button" onclick="ver_pdf_orden_examenes($('#id_fc').val());" class=" btn_examenes_pdf btn btn-primary  btn-sm mt-1 wid-20" id="btn_examenes_pdf"><i class="feather icon-file"></i> Ver PDF</button>
                    </div>
                </div> --}}
            @else
                <div class="col-sm-12 col-md-6 text-center">
                    <div class="btn-group btn-group-sm w-100" data-toggle="buttons">
                        <button type="button" disabled="disabled" id="btn_agregar_medicamento" class=" btn_agregar_medicamento btn btn-info btn-sm mt-1 wid-80" onclick="i_medicamento_homeo();"><i class="feather icon-plus"></i> Indicar medicamento Homeopatía</button>
                        <button type="button" disabled="disabled" onclick="ver_pdf_receta($('#id_fc').val());" class=" btn_medicamento_pdf btn btn-primary  btn-sm mt-1 wid-20" id="btn_medicamento_pdf"><i class="feather icon-file"></i> Ver PDF</button>
                        {{-- <button type="button" disabled="disabled" onclick="ver_pdf_receta_retenido($('#id_fc').val());" class="btn_medicamento_pdf btn btn-warning-light btn-sm mt-1" id="btn_medicamento_retenida_pdf"><i class="feather icon-file"></i> Ver PDF</button> --}}
                    </div>
                </div>
                {{-- <div class="col-sm-12 col-md-6">
                    <div class="btn-group btn-group-sm w-100" data-toggle="buttons">
                        <button type="button" disabled="disabled" id="btn_agregar_examen" class=" btn_agregar_examen btn btn-info btn-sm mt-1 wid-80" onclick="mostrar_modal_examen_cirguria();"><i class="feather icon-plus"></i> Indicar examen</button>
                        <button type="button" disabled="disabled" onclick="ver_pdf_orden_examenes($('#id_fc').val());" class=" btn_examenes_pdf btn btn-primary btn-sm mt-1 wid-20" id="btn_examenes_pdf"><i class="feather icon-file"></i> Ver PDF</button>
                    </div>
                </div> --}}
            @endif
        @else
            <div class="col-sm-12 col-md-6 text-center">
                <div class="btn-group btn-group-sm w-100" data-toggle="buttons">
                    <button type="button" disabled="disabled" id="btn_agregar_medicamento" class=" btn_agregar_medicamento btn btn-info btn-sm mt-1 wid-80" onclick="i_medicamento_homeo();"><i class="feather icon-plus"></i> Indicar medicamento Homeopatía</button>
                    <button type="button" disabled="disabled" onclick="ver_pdf_receta($('#id_fc').val());" class=" btn_medicamento_pdf btn btn-primary  btn-sm mt-1 wid-20" id="btn_medicamento_pdf"><i class="feather icon-file"></i> Ver PDF</button>
                    {{-- <button type="button" disabled="disabled" onclick="ver_pdf_receta_retenido($('#id_fc').val());" class="btn_medicamento_pdf btn btn-warning-light btn-sm mt-1" id="btn_medicamento_retenida_pdf"><i class="feather icon-file"></i> PDF PDF</button> --}}
                </div>
            </div>
            {{-- <div class="col-sm-12 col-md-6">
                <div class="btn-group btn-group-sm w-100" data-toggle="buttons">
                    <button type="button" disabled="disabled" id="btn_agregar_examen" class=" btn_agregar_examen btn btn-info btn-sm mt-1 wid-80" onclick="mostrar_modal_examen_cirguria();"><i class="feather icon-plus"></i> Indicar examen</button>
                    <button type="button" disabled="disabled" onclick="ver_pdf_orden_examenes($('#id_fc').val());" class=" btn_examenes_pdf btn btn-primary  btn-sm mt-1 wid-20" id="btn_examenes_pdf"><i class="feather icon-file"></i> Ver PDF</button>
                </div>
            </div> --}}
        @endif

    </div>
</div>



