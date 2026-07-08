<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="motivo">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                Motivo de la consulta y examen físico
            </button>
        </div>
        <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
            <div class="card-body-aten-a">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm" for="motivo">Motivo de consulta</label>
                        <input type="text" class="form-control form-control-sm" name="motivo" id="motivo_consulta" placeholder="{{ $placeholder_motivo_consulta }}" value="{{ old('motivo', $fichaAtencion->motivo ?? '') }}" autofocus>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm" for="antecedentes">Antecedentes Especialidad</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=5" onblur="this.rows=1;" class="form-control form-control-sm" name="antecedentes" id="antecedentes" placeholder="{{ $placeholder_antecedentes }}">{{ old('antecedentes', $fichaAtencion->antecedentes ?? '') }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo-sm" for="examen_fisico">Examen Físico</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=5" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico" placeholder="{{ $placeholder_examen_fisico }}">{{ old('examen_fisico', $fichaAtencion->examen_fisico ?? '') }}</textarea>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
        function enfocarMotivoConsulta() {
            var input = document.getElementById('motivo_consulta');
            if (!input || input.offsetParent === null) {
                return;
            }

            input.focus();

            // Deja el cursor al final si ya existe texto cargado.
            if (typeof input.setSelectionRange === 'function') {
                var largo = input.value ? input.value.length : 0;
                input.setSelectionRange(largo, largo);
            }
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function () {
                setTimeout(enfocarMotivoConsulta, 120);
            });
        } else {
            setTimeout(enfocarMotivoConsulta, 120);
        }

        document.addEventListener('shown.bs.tab', function (e) {
            if (e.target && e.target.id === 'atencion_orl-tab') {
                setTimeout(enfocarMotivoConsulta, 80);
            }
        });

        document.addEventListener('shown.bs.collapse', function (e) {
            if (e.target && e.target.id === 'motivo_c') {
                setTimeout(enfocarMotivoConsulta, 80);
            }
        });
    })();
</script>



