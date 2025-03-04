@foreach ($examenes as $e)
<div class="card">
    <div class="card-body mb-2">
        <div class="row">
            <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                <div class="form-row">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Pieza N°</label>
                            <input type="text" class="form-control form-control-sm" name="historia_pza" id="historia_pza" value="{{ $e->numero_pieza }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Pérdida de la pieza</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $e->perdida }}">
                        </div>
                        <div class="form-group" id="div_perdida" style="display:none;">
                            <label class="floating-label-activo-sm">Otro motivo</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_perdida" id="obs_perdida"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Años</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $e->tiempo }}">
                        </div>
                        <div class="form-group" id="div_anos_perd" style="display:none;">
                            <label class="floating-label-activo-sm">Años</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anos_perd" id="obs_anos_perd"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Observaciones Pérdida</label>
                            <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Oral" data-seccion="Examen Oral" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oral" id="obs_ex_oral">{{ $e->observaciones }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group fill">

                    <div class="switch switch-success d-inline m-r-10">
                        <input type="checkbox" onchange="biopsia_check_implantologia({{ $e->id }})" id="biopsia_check_implantologia{{ $e->id }}" name="biopsia_check_implantologia{{ $e->id }}" value="" @if($e->biopsia == 1) checked @endif>
                        <label for="biopsia_check_implantologia({{ $e->id }})" class="cr"></label>
                    </div>
                    <label>biopsia</label>
                    <hr>
                    <div class="form-group fill">
                        <label id="" name="" class="floating-label-activo-sm">Zona y Motivo</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="im_biop_zona{{ $e->id }}" id="im_biop_zona{{ $e->id }}"></textarea>
                    </div>
                    <div class="form-group fill">
                        <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="im_obs_result_biopsia{{ $e->id }}" id="im_obs_result_biopsia{{ $e->id }}"></textarea>
                    </div>
                    <div class="form-group fill m-50">
                        <button type="button" class="btn btn-outline-success btn-sm " onclick="solicitar_ic_periodoncia()">SOLICITAR INTERCONSULTA PERIODÓNCIA</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endforeach
