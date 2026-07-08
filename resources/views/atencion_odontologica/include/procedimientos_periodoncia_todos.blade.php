@foreach($examenes as $e)
<div class="card-informacion">
    <div class="card-body">
        <div class="form-row">
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                <div class="form-group">
                        <label for="numero_pieza_tto_period" class="floating-label-activo-sm">Pieza Nº</label>
                        <input type="text" name="numero_pieza_tto_period" id="numero_pieza_tto_period" value="{{ $e->numero_pieza }}" class="form-control form-control-sm" readonly>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Procedimiento</label>
                    <input type="text" name="tto_period" id="tto_period" class="form-control form-control-sm" value="{{ $e->tratamiento }}" readonly>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Membrana</label>
                    <input type="text" name="membrana_period" id="membrana_period" class="form-control form-control-sm" value="{{ $e->membrana }}" readonly>
                </div>

                <div class="form-group" id="div_membrana_period" style="display:none;">
                    <label class="floating-label-activo-sm">Otra membrana</label>
                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_membrana_period" id="obs_membrana_period"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Material Membrana</label>
                    <input type="text" name="mat_membrana_period" id="mat_membrana_period" class="form-control form-control-sm" value="{{ $e->material_membrana }}" readonly>
                </div>
                <div class="form-group" id="div_mat_membrana_period" style="display:none;">
                    <label class="floating-label-activo-sm">Otra membrana</label>
                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_mat_membrana_period" id="obs_mat_membrana_period"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Material de injerto óseo</label>
                    <input type="text" name="mat_inj_oseo" id="mat_inj_oseo" class="form-control form-control-sm" value="{{ $e->material_injerto_oseo }}" readonly>
                </div>
                <div class="form-group" id="div_mat_inj_oseo" style="display:none;">
                    <label class="floating-label-activo-sm">Otro tipo de injerto</label>
                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_mat_inj_oseo" id="obs_mat_inj_oseo"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Método de injerto óseo</label>
                    <input type="text" name="metodo_injerto_tto" id="metodo_injerto_tto" class="form-control form-control-sm">
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Cantidad superficie teñida</label>
                    <input type="text" name="cant_superficie_teñida" id="cant_superficie_teñida" class="form-control form-control-sm" value="{{ $e->cantidad_superficie_teñida }}" readonly>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Cantidad superficie total</label>
                    <input type="text" name="cant_superficie_total" id="cant_superficie_total" class="form-control form-control-sm" value="{{ $e->cantidad_superficie_total }}" readonly>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Indice o'leary</label>
                    <input type="text" name="indice_oleary" id="indice_oleary" class="form-control form-control-sm" value="{{ $e->indice_oleary }}" readonly>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Anestesia</label>
                    <input type="text" name="anestesia_period" id="anestesia_period" class="form-control form-control-sm" value="{{ $e->anestesia }}" readonly>
                </div>
                <div class="form-group" id="div_anestesia_period" style="display:none;">
                    <label class="floating-label-activo-sm">Otra anestesia</label>
                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anestesia_period" id="obs_anestesia_period"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-3">
                <div class="form-group">
                    <label for="" class="floating-label-activo-sm">Técnica de anestesia</label>
                    <input type="text" name="tec_anestesia_period" id="tec_anestesia_period" class="form-control form-control-sm" value="{{ $e->tecnica_anestesia }}" readonly>
                </div>
                <div class="form-group" id="div_tec_anestesia_period" style="display:none;">
                    <label class="floating-label-activo-sm">Otra anestesia</label>
                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tec_anestesia_period" id="obs_tec_anestesia_period"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-3">
                <div class="form-group">
                    <label for="" class="floating-label-activo-sm">Anestésico</label>
                    <input type="text" name="anestesico_dental_period" id="anestesico_dental_period" class="form-control form-control-sm" value="{{ $e->anestesico }}" readonly>
                </div>
                <div class="form-group" id="div_anestesico_period" style="display:none;">
                    <label class="floating-label-activo-sm">Otro anestésico</label>
                    <textarea class="form-control form-control-sm" data-titulo="anestisico_dental_title" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anestesico_period" id="obs_anestesico_period"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2 col-xxl-1">
                <div class="form-group">
                    <label for="" class="floating-label-activo-sm">N° de tubos</label>
                    <input type="text" class="form-control form-control-sm" name="numero_tubos_period" id="numero_tubos_period" value="{{ $e->numero_tubos }}" readonly>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-4 col-xxl-3">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Incidentes</label>
                    <input type="text" name="incid_col_period" id="incid_col_period" class="form-control form-control-sm" value="{{ $e->incidentes }}" readonly>
                </div>
                <div class="form-group" id="div_incid_col_period" style="display:none;">
                    <label class="floating-label-activo-sm">Observaciones</label>
                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_incid_col_period" id="obs_incid_col_period"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-4 col-xxl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Suturas</label>
                    <input type="text" name="suturas_period" id="suturas_period" class="form-control form-control-sm" value="{{ $e->suturas }}" readonly>
                </div>
                <div class="form-group" id="div_suturas" style="display:none;">
                    <label class="floating-label-activo-sm">Otro (Describir)</label>
                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_suturas" id="obs_suturas"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2 col-xxl-2" id="grosor_nylon">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Grosor</label>
                    <input type="text" name="grosor_nylon_input" id="grosor_nylon_input" class="form-control form-control-sm" value="{{ $e->grosor_nylon }}" readonly>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-4 col-xxl-2">
                <div class="form-group">
                    <label for="tiempo_quir_period" class="floating-label-activo-sm">Tpo. quirúrgico</label>
                    <input type="time" class="form-control form-control-sm" id="tiempo_quir_period" value="{{ $e->tiempo_quirurgico }}" readonly>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9 col-xl-8 col-xxl-6">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Observaciones</label>
                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_period" id="obs_period">{{ $e->observaciones }}</textarea>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card-footer">
        <h6 class="mb-0 font-weight-bold">
            <i class="fas fa-tooth mr-2"></i> Evaluación Pieza {{ $e->numero_pieza }}
        </h6>
        <div class="d-flex justify-content-between align-items-start">
            <small class="mr-3 opacity-75">
                <i class="far fa-calendar-alt mr-1"></i>{{ $e->created_at->format('d/m/Y H:i') }}
            </small>
            <div class="btn-group" role="group">

                <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_pieza_dental_tto_period({{ $e->id }},{{ $e->id_procedimiento }})" title="Eliminar evaluación">
                    X
                </button>
            </div>
        </div>
    </div>
</div>

@endforeach