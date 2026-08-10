@php
    /*
     * Componente común para cualquier especialidad odontológica.
     * Si la ficha no cargó la configuración común, conserva todo visible.
     */
    $subseccionVisibleDentalDisponible =
        isset($subseccionVisibleFichaDental)
        && is_callable($subseccionVisibleFichaDental);

    // Evita Undefined variable en fichas odontológicas que aún no cargan el helper.
    if (!$subseccionVisibleDentalDisponible) {
        $subseccionVisibleFichaDental = null;
    }

    $resolverSubseccionMotivo = static function (
        array $aliasSubseccion,
        bool $predeterminado = true
    ) use (
        $subseccionVisibleDentalDisponible,
        $subseccionVisibleFichaDental
    ) {
        if (!$subseccionVisibleDentalDisponible) {
            return $predeterminado;
        }

        return $subseccionVisibleFichaDental(
            [
                'motivo_consulta',
                'motivo de la consulta y examen fisico general',
            ],
            $aliasSubseccion,
            $predeterminado
        );
    };

    $mostrarMotivoConsultaCampo = $resolverSubseccionMotivo([
        'motivo',
        'motivo_consulta',
        'motivo de consulta',
    ]);

    $mostrarAntecedentesEspecialidad = $resolverSubseccionMotivo([
        'antecedentes_especialidad',
        'antecedentes de la especialidad',
    ]);

    $mostrarObservacionesExamen = $resolverSubseccionMotivo([
        'observaciones_examen',
        'observaciones al examen de la especialidad',
        'examen_fisico',
    ]);

    $mostrarAnestesiaLocal = $resolverSubseccionMotivo([
        'anestesia_local',
        'anestesia local',
    ]);

    $mostrarHemorragias = $resolverSubseccionMotivo([
        'hemorragias',
        'hemorragia',
    ]);

    $mostrarFracturas = $resolverSubseccionMotivo([
        'fracturas',
        'fractura',
    ]);
@endphp


<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
    <div class="card-a">
        <div class="card-header-a" id="motivodd">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed"
                type="button"
                data-toggle="collapse"
                data-target="#motivo_c"
                aria-expanded="false"
                aria-controls="motivo_c">
                Motivo de la consulta y Examen físico general
            </button>
        </div>

        <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
            <div class="card-body-aten-a">

                @if($mostrarMotivoConsultaCampo || $mostrarAntecedentesEspecialidad)
                    <div class="form-row">
                        @if($mostrarMotivoConsultaCampo)
                            <div class="form-group col-sm-12 {{ $mostrarAntecedentesEspecialidad ? 'col-md-12 col-lg-6 col-xl-6 col-xxl-6' : 'col-md-12 col-lg-12 col-xl-12 col-xxl-12' }}">
                                <label class="floating-label-activo-sm">Motivo de consulta</label>
                                <input type="text"
                                    class="form-control form-control-sm"
                                    name="motivo"
                                    id="motivo"
                                    value="{{ isset($fichaAtencion) && !empty($fichaAtencion->motivo) ? $fichaAtencion->motivo : old('motivo') }}"
                                    placeholder="{{ $placeholder_motivo_consulta ?? '' }}">
                            </div>
                        @endif

                        @if($mostrarAntecedentesEspecialidad)
                            <div class="form-group col-sm-12 {{ $mostrarMotivoConsultaCampo ? 'col-md-12 col-lg-6 col-xl-6 col-xxl-6' : 'col-md-12 col-lg-12 col-xl-12 col-xxl-12' }}">
                                <label class="floating-label-activo-sm">Antecedentes Especialidad</label>
                                <input type="text"
                                    class="form-control form-control-sm"
                                    name="antecedentes"
                                    id="antecedentes"
                                    value="{{ isset($fichaAtencion) && !empty($fichaAtencion->antecedentes) ? $fichaAtencion->antecedentes : old('antecedentes') }}"
                                    placeholder="{{ $placeholder_antecedentes ?? '' }}">
                            </div>
                        @endif
                    </div>
                @endif

                @if($mostrarObservacionesExamen)
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">
                                Observaciones al Examen de la Especialidad
                            </label>
                            <textarea
                                class="form-control caja-texto form-control-sm mb-9"
                                rows="1"
                                onfocus="this.rows=4"
                                onblur="this.rows=1;"
                                name="examen_fisico"
                                id="examen_fisico"
                                placeholder="{{ $placeholder_examen_fisico ?? 'OBSERVACIONES DE LA CONSULTA Y EXAMEN FISICO RELEVANTE' }}">{{ isset($fichaAtencion) && !empty($fichaAtencion->examen_fisico) ? $fichaAtencion->examen_fisico : old('examen_fisico') }}</textarea>
                        </div>
                    </div>
                @endif

                @if($mostrarAnestesiaLocal || $mostrarHemorragias || $mostrarFracturas)
                    @php
                        $cantidadBotonesMotivo = collect([
                            $mostrarAnestesiaLocal,
                            $mostrarHemorragias,
                            $mostrarFracturas,
                        ])->filter()->count();

                        $claseBotonMotivo = $cantidadBotonesMotivo === 1
                            ? 'col-lg-12 col-xl-12 col-xxl-12'
                            : ($cantidadBotonesMotivo === 2
                                ? 'col-lg-6 col-xl-6 col-xxl-6'
                                : 'col-lg-4 col-xl-4 col-xxl-4');
                    @endphp

                    <div class="form-row mb-2">
                        @if($mostrarAnestesiaLocal)
                            <div class="form-group col-sm-12 col-md-12 {{ $claseBotonMotivo }}">
                                <button type="button"
                                    class="btn btn-outline-primary btn-sm btn-block"
                                    onclick="anestesia_local_dental();">
                                    <i class="fas fa-plus"></i> Anestesia local
                                </button>
                            </div>
                        @endif

                        @if($mostrarHemorragias)
                            <div class="form-group col-sm-12 col-md-12 {{ $claseBotonMotivo }}">
                                <button type="button"
                                    class="btn btn-outline-primary btn-sm btn-block"
                                    onclick="hemorragia_dental();">
                                    <i class="fas fa-plus"></i> Hemorragias
                                </button>
                            </div>
                        @endif

                        @if($mostrarFracturas)
                            <div class="form-group col-sm-12 col-md-12 {{ $claseBotonMotivo }}">
                                <button type="button"
                                    class="btn btn-outline-primary btn-sm btn-block"
                                    onclick="fractura_dental();">
                                    <i class="fas fa-plus"></i> Fracturas
                                </button>
                            </div>
                        @endif
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
