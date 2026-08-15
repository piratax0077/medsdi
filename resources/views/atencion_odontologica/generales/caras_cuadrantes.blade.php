{{-- Sección "Caras y cuadrantes" (evaluación pediátrica cuadrantes 5-8 + plan de tratamiento/presupuesto) --}}
{{-- Extraída de ficha_odontopediatria para poder reutilizarse también en ficha_od_general --}}
@php
    $cuadrantesPedConPiezas = [
        5 => collect($quinto_cuadrante_infantil ?? []),
        6 => collect($sexto_cuadrante_infantil ?? []),
        7 => collect($septimo_cuadrante_infantil ?? []),
        8 => collect($octavo_cuadrante_infantil ?? []),
    ];
    $cuadrantePedActivo = collect($cuadrantesPedConPiezas)->filter(function ($piezas) {
        return $piezas->isNotEmpty();
    })->keys()->first() ?? 5;
@endphp
    <div class="row bg-white shadow-sm rounded mx-1 dental-evaluation-panel dental-evaluation-pediatric">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 dental-evaluation-title">
                    <h6 class="f-16 text-c-blue">Evaluación Pediátrica</h6>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div id="contenedor_examenes_grupos_dentales_odontop">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-10 dental-group-tabs" id="od_inf_tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset {{ $cuadrantePedActivo === 5 ? 'active' : '' }}" id="od_inf_grupo_5_tab" data-toggle="tab" href="#od_inf_grupo_5" role="tab" aria-controls="od_inf_grupo_5" aria-selected="{{ $cuadrantePedActivo === 5 ? 'true' : 'false' }}">CUADRANTE 5</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset {{ $cuadrantePedActivo === 6 ? 'active' : '' }}" id="od_inf_grupo_6_tab" data-toggle="tab" href="#od_inf_grupo_6" role="tab" aria-controls="od_inf_grupo_6" aria-selected="{{ $cuadrantePedActivo === 6 ? 'true' : 'false' }}">CUADRANTE 6</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset {{ $cuadrantePedActivo === 7 ? 'active' : '' }}" id="od_inf_grupo_7_tab" data-toggle="tab" href="#od_inf_grupo_7" role="tab" aria-controls="od_inf_grupo_7" aria-selected="{{ $cuadrantePedActivo === 7 ? 'true' : 'false' }}">CUADRANTE 7</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset {{ $cuadrantePedActivo === 8 ? 'active' : '' }}" id="od_inf_grupo_8_tab" data-toggle="tab" href="#od_inf_grupo_8" role="tab" aria-controls="od_inf_grupo_8" aria-selected="{{ $cuadrantePedActivo === 8 ? 'true' : 'false' }}">CUADRANTE 8</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" >
                                <!--GRUPO 5-->
                                <div class="tab-pane fade {{ $cuadrantePedActivo === 5 ? 'show active' : '' }}" id="od_inf_grupo_5" role="tabpanel" aria-labelledby="od_inf_grupo_5_tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            <div class="col-md-12">
                                                                <h6 class="text-center text-c-blue mb-2">CUADRANTE 5</h6>
                                                                @if(isset($quinto_cuadrante_infantil))
                                                                    @foreach($quinto_cuadrante_infantil as $cuadrante)
                                                                        <div class="table-responsive">

                                                                                <input type="hidden" name="ficha_id_atencion_dental_odon1"
                                                                                    id="ficha_id_atencion_dental_odon1">
                                                                                    {{-- value=" @if ($ficha != null) {{ $ficha->id }} @endif">  --}}
                                                                                <input type="hidden" name="paciente_atencion_dental_odon1"
                                                                                    id="paciente_atencion_dental_odon1" value="{{ $paciente->id }}">


                                                                                <table class="table table-bordered table-xs" style="width:100%;">
                                                                                    <tr class="bg-encabezado">
                                                                                        <th class="text-center align-middle">PIEZA</th>
                                                                                        <th class="text-center align-middle">CARA</th>
                                                                                        <th class="text-center align-middle">CUADRANTE</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="px-1 py-1 text-center align-middle">
                                                                                            <select id="pieza_odontograma_{{ $loop->index + 1  }}_5" name="pieza_odontograma_{{ $loop->index + 1  }}_5"
                                                                                                class="form-control form-control-sm">
                                                                                                <option value="{{ $cuadrante->numero_pieza }}">{{ $cuadrante->numero_pieza }}</option>
                                                                                            </select>
                                                                                            <div id="t53">
                                                                                                <img src="{{ asset('images/dientes/d'.str_replace('.', '', $cuadrante->numero_pieza).'.png') }}"
                                                                                                    class="wid-40 py-1" alt="{{ $cuadrante->numero_pieza }}">
                                                                                            </div>
                                                                                        </td>
                                                                                        <td class="align-middle text-center">
                                                                                            <table class="table-borderless" style="align-content:center">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td class="padding-caras"></td>
                                                                                                        <td class="padding-caras">
                                                                                                            <div class="circulo-v" id="caraV{{ $loop->index + 1  }}5"
                                                                                                                onclick="cambiar_color({{ $loop->index + 1  }}, 5)">
                                                                                                                V
                                                                                                            </div>

                                                                                                        </td>
                                                                                                        <td class="padding-caras"></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="padding-caras">
                                                                                                            <div class="circulo-d" id="caraD{{ $loop->index + 1  }}5"
                                                                                                                onclick="cambiar_colorD({{ $loop->index + 1  }}, 5)">D</div>
                                                                                                        </td>
                                                                                                        <td class="padding-caras">
                                                                                                            <div class="circulo-o" id="caraO{{ $loop->index + 1  }}5"
                                                                                                                onclick="cambiar_colorO({{ $loop->index + 1  }}, 5)">O</div>

                                                                                                        </td>
                                                                                                        <td class="padding-caras">
                                                                                                            <div class="circulo-m" id="caraM{{ $loop->index + 1  }}5"
                                                                                                                onclick="cambiar_colorM({{ $loop->index + 1  }}, 5)">M</div>

                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="padding-caras"></td>
                                                                                                        <td class="padding-caras">
                                                                                                            <div class="circulo-p" id="caraP{{ $loop->index + 1  }}5"
                                                                                                                onclick="cambiar_colorP({{ $loop->index + 1  }}, 5)">P</div>

                                                                                                        </td>
                                                                                                        <td class="padding-caras"></td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                        <td class="text-center align-middle">
                                                                                            <div id="t53" style="width:100%;">
                                                                                                <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                                                                    class="wid-100">
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="px-1 py-1"><button type="button"
                                                                                                class="btn btn-block btn-sm btn-outline-primary" data-toggle="popover"
                                                                                                title="Historia" data-content="cargar historia del diente">Ver
                                                                                                historia</button></td>
                                                                                        <td class="px-1 py-1">
                                                                                            <select class="form-control form-control-sm bg-light plan-field-readonly" id="diagnostico_{{ $loop->index + 1 }}_5" tabindex="-1" aria-readonly="true"
                                                                                                name="diagnostico_{{ $loop->index + 1 }}_5">
                                                                                                <option value="0">Sin diagnóstico asociado</option>
                                                                                                @foreach($diagnosticos as $diagnostico)
                                                                                                    <option value="{{$diagnostico->id}}" {{ (string) ($pieza->diagnostico_plan ?? '') === (string) $diagnostico->id ? 'selected' : '' }}>{{$diagnostico->descripcion}} </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </td>
                                                                                        <td class="px-2 py-2">
                                                                                            <input type="text" class="form-control form-control-sm bg-light" id="tratamiento_{{ $loop->index + 1 }}_5" value="{{ $pieza->tratamiento_plan ?? '' }}" readonly />

                                                                                            <input type="hidden" name="odontograma_{{ $loop->index + 1 }}_5" id="odontograma_{{ $loop->index + 1 }}_5" value="{{ $loop->index }}">
                                                                                            <input type="hidden" name="caraM_check_{{ $loop->index + 1 }}_5" id="caraM_check_{{ $loop->index + 1 }}_5" value="0">
                                                                                            <input type="hidden" name="caraO_check_{{ $loop->index + 1 }}_5" id="caraO_check_{{ $loop->index + 1 }}_5" value="0">
                                                                                            <input type="hidden" name="caraD_check_{{ $loop->index + 1 }}_5" id="caraD_check_{{ $loop->index + 1 }}_5" value="0">
                                                                                            <input type="hidden" name="caraV_check_{{ $loop->index + 1 }}_5" id="caraV_check_{{ $loop->index + 1 }}_5" value="0">
                                                                                            <input type="hidden" name="caraP_check_{{ $loop->index + 1 }}_5" id="caraP_check_{{ $loop->index + 1 }}_5" value="0">
                                                                                            <button type="button" class="btn btn-info btn-sm d-none" onclick="registrar_odontograma_quinto_cuadrante({{ $loop->index + 1 }})">
                                                                                                Guardar caras
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                                @if($quinto_cuadrante_infantil->count() == 0)
                                                                    <div class="col-md-12">
                                                                        <h6 class="text-center text-c-blue mb-2">No hay piezas dentales registradas</h6>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--GRUPO 6-->
                                <div class="tab-pane fade {{ $cuadrantePedActivo === 6 ? 'show active' : '' }}" id="od_inf_grupo_6" role="tabpanel" aria-labelledby="od_inf_grupo_6_tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            <div class="col-md-12">
                                                                <h6 class="text-center text-c-blue mb-2">CUADRANTE 6</h6>
                                                                @if(isset($sexto_cuadrante_infantil))
                                                                    @foreach($sexto_cuadrante_infantil as $pieza)
                                                                    <div class="table-responsive">

                                                                            <input type="hidden" name="ficha_id_atencion_dental_odon2"
                                                                                id="ficha_id_atencion_dental_odon2">
                                                                                {{-- value=" @if ($ficha != null) {{ $ficha->id }} @endif">  --}}
                                                                            <input type="hidden" name="paciente_atencion_dental_odon2"
                                                                                id="paciente_atencion_dental_odon2" value="{{ $paciente->id }}">
                                                                            <table class="table table-bordered table-xs" style="width:100%;">
                                                                                <tr class="bg-encabezado">
                                                                                    <th class="text-center align-middle">PIEZA</th>
                                                                                    <th class="text-center align-middle">CARA</th>
                                                                                    <th class="text-center align-middle">CUADRANTE</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="px-1 py-1 text-center align-middle">
                                                                                        <select id="pieza_odontograma_{{ $loop->index + 1  }}_6" name="pieza_odontograma_{{ $loop->index + 1  }}_6"
                                                                                            class="form-control form-control-sm">
                                                                                            <option value="{{ $pieza->numero_pieza }}">{{ $pieza->numero_pieza }}</option>
                                                                                        </select>
                                                                                        <div id="t53">
                                                                                            <img src="{{ asset('images/dientes/d'.str_replace('.', '', $pieza->numero_pieza).'.png') }}"
                                                                                                class="wid-40 py-1" alt="{{ $pieza->numero_pieza }}">
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="align-middle text-center">
                                                                                        <table class="table-borderless" style="align-content:center">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td class="padding-caras"></td>
                                                                                                    <td class="padding-caras">
                                                                                                        <div class="circulo-v" id="caraV{{ $loop->index + 1 }}6"
                                                                                                            onclick="cambiar_color({{ $loop->index + 1 }},6)">V</div>
                                                                                                    </td>
                                                                                                    <td class="padding-caras"></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="padding-caras">
                                                                                                        <div class="circulo-d" id="caraD{{ $loop->index + 1 }}6"
                                                                                                            onclick="cambiar_colorD({{ $loop->index + 1 }},6)">D</div>
                                                                                                    </td>
                                                                                                    <td class="padding-caras">
                                                                                                        <div class="circulo-o" id="caraO{{ $loop->index + 1 }}6"
                                                                                                            onclick="cambiar_colorO({{ $loop->index + 1 }},6)">O</div>
                                                                                                    </td>
                                                                                                    <td class="padding-caras">
                                                                                                        <div class="circulo-m" id="caraM{{ $loop->index + 1 }}6"
                                                                                                            onclick="cambiar_colorM({{ $loop->index + 1 }},6)">M</div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="padding-caras"></td>
                                                                                                    <td class="padding-caras">
                                                                                                        <div class="circulo-p" id="caraP{{ $loop->index + 1 }}6"
                                                                                                            onclick="cambiar_colorP({{ $loop->index + 1 }},6)">P</div>
                                                                                                    </td>
                                                                                                    <td class="padding-caras"></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td class="text-center align-middle">
                                                                                        <div id="t53" style="width:100%;">
                                                                                            <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                                                                class="wid-100">
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="px-1 py-1"><button type="button"
                                                                                            class="btn btn-block btn-sm btn-outline-primary" data-toggle="popover"
                                                                                            title="Historia" data-content="cargar historia del diente">Ver
                                                                                            historia</button></td>
                                                                                    <td class="px-1 py-1">
                                                                                        <select class="form-control form-control-sm bg-light plan-field-readonly" id="diagnostico_{{ $loop->index + 1  }}_6" tabindex="-1" aria-readonly="true"
                                                                                            name="diagnostico_{{ $loop->index + 1  }}_6">
                                                                                            <option value="0">Sin diagnóstico asociado</option>
                                                                                            @foreach($diagnosticos as $diagnostico)
                                                                                                <option value="{{$diagnostico->id}}" {{ (string) ($pieza->diagnostico_plan ?? '') === (string) $diagnostico->id ? 'selected' : '' }}>{{$diagnostico->descripcion}} </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </td>
                                                                                    <td class="px-1 py-1">
                                                                                        <input type="text" name="tratamiento_{{ $loop->index + 1  }}_6" id="tratamiento_{{ $loop->index + 1  }}_6" class="form-control form-control-sm bg-light" value="{{ $pieza->tratamiento_plan ?? '' }}" readonly />

                                                                                        <input type="hidden" name="odontograma{{ $loop->index + 1 }}_6" id="odontograma{{ $loop->index + 1 }}_6" value="1">
                                                                                        <input type="hidden" name="caraM_check_{{ $loop->index + 1 }}_6" id="caraM_check_{{ $loop->index + 1 }}_6" value="0">
                                                                                        <input type="hidden" name="caraO_check_{{ $loop->index + 1 }}_6" id="caraO_check_{{ $loop->index + 1 }}_6" value="0">
                                                                                        <input type="hidden" name="caraD_check_{{ $loop->index + 1 }}_6" id="caraD_check_{{ $loop->index + 1 }}_6" value="0">
                                                                                        <input type="hidden" name="caraV_check_{{ $loop->index + 1 }}_6" id="caraV_check_{{ $loop->index + 1 }}_6" value="0">
                                                                                        <input type="hidden" name="caraP_check_{{ $loop->index + 1 }}_6" id="caraP_check_{{ $loop->index + 1 }}_6" value="0">
                                                                                        <button type="button" class="btn btn-info btn-sm d-none" onclick="registrar_odontograma_sexto_cuadrante({{ $loop->index + 1 }})">
                                                                                            Guardar caras
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                    </div>
                                                                    @endforeach
                                                                @endif
                                                                @if($sexto_cuadrante_infantil->count() == 0)
                                                                    <div class="col-md-12">
                                                                        <h6 class="text-center text-c-blue mb-2">No hay piezas dentales registradas</h6>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--GRUPO 7-->
                                <div class="tab-pane fade {{ $cuadrantePedActivo === 7 ? 'show active' : '' }}" id="od_inf_grupo_7" role="tabpanel" aria-labelledby="od_inf_grupo_7_tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            <div class="col-md-12">
                                                                <h6 class="text-center text-c-blue mb-2">CUADRANTE 7</h6>
                                                                @if(isset($septimo_cuadrante_infantil))
                                                                    @foreach($septimo_cuadrante_infantil as $cuadrante)
                                                                    <div class="table-responsive">

                                                                            <input type="hidden" name="ficha_id_atencion_dental_odon3"
                                                                                id="ficha_id_atencion_dental_odon3">
                                                                            <input type="hidden" name="paciente_atencion_dental_odon3"
                                                                                id="paciente_atencion_dental_odon3" value="{{ $paciente->id }}">

                                                                            <table class="table table-bordered table-xs" style="width:100%;">
                                                                                <tr class="bg-encabezado">
                                                                                    <th class="text-center align-middle">PIEZA</th>
                                                                                    <th class="text-center align-middle">CARA</th>
                                                                                    <th class="text-center align-middle">CUADRANTE</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="px-1 py-1 text-center align-middle">
                                                                                        <select id="pieza_odontograma_{{ $loop->index + 1 }}_7" name="pieza_odontograma_{{ $loop->index + 1 }}_7"
                                                                                            class="form-control form-control-sm">
                                                                                            <option value="{{ $cuadrante->numero_pieza }}">{{ $cuadrante->numero_pieza }}</option>
                                                                                        </select>
                                                                                        <div id="t53">
                                                                                            <img src="{{ asset('images/dientes/d'.str_replace('.', '', $cuadrante->numero_pieza).'.png') }}"
                                                                                                class="wid-40 py-1" alt="{{ $cuadrante->numero_pieza }}">
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="align-middle text-center">
                                                                                        <table class="table-borderless" style="align-content:center">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td class="padding-caras"></td>
                                                                                                    <td class="padding-caras">
                                                                                                        <div class="circulo-v" id="caraV{{ $loop->index + 1 }}7"
                                                                                                            onclick="cambiar_color({{ $loop->index + 1 }}, 7)">V</div>
                                                                                                    </td>
                                                                                                    <td class="padding-caras"></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="padding-caras">
                                                                                                        <div class="circulo-d" id="caraD{{ $loop->index + 1 }}7"
                                                                                                            onclick="cambiar_colorD({{ $loop->index + 1 }}, 7)">D</div>
                                                                                                    </td>
                                                                                                    <td class="padding-caras">
                                                                                                        <div class="circulo-o" id="caraO{{ $loop->index + 1 }}7"
                                                                                                            onclick="cambiar_colorO({{ $loop->index + 1 }}, 7)">O</div>
                                                                                                    </td>
                                                                                                    <td class="padding-caras">
                                                                                                        <div class="circulo-m" id="caraM{{ $loop->index + 1 }}7"
                                                                                                            onclick="cambiar_colorM({{ $loop->index + 1 }}, 7)">M</div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="padding-caras"></td>
                                                                                                    <td class="padding-caras">
                                                                                                        <div class="circulo-p" id="caraP{{ $loop->index + 1 }}7"
                                                                                                            onclick="cambiar_colorP({{ $loop->index + 1 }}, 7)">P</div>
                                                                                                    </td>
                                                                                                    <td class="padding-caras"></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td class="text-center align-middle">
                                                                                        <div id="t53" style="width:100%;">
                                                                                            <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                                                                class="wid-100">
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="px-1 py-1"><button type="button"
                                                                                            class="btn btn-block btn-sm btn-outline-primary" data-toggle="popover"
                                                                                            title="Historia" data-content="cargar historia del diente">Ver
                                                                                            historia</button></td>
                                                                                    <td class="px-1 py-1">
                                                                                        <select class="form-control form-control-sm bg-light plan-field-readonly" id="diagnostico_{{ $loop->index + 1 }}_7" tabindex="-1" aria-readonly="true"
                                                                                            name="diagnostico_{{ $loop->index + 1 }}_7">
                                                                                            <option value="0">Sin diagnóstico asociado</option>
                                                                                            @foreach($diagnosticos as $diagnostico)
                                                                                                <option value="{{$diagnostico->id}}" {{ (string) ($pieza->diagnostico_plan ?? '') === (string) $diagnostico->id ? 'selected' : '' }}>{{$diagnostico->descripcion}} </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </td>
                                                                                    <td class="px-1 py-1">
                                                                                        <input type="text" name="tratamiento_{{ $loop->index + 1 }}_7" id="tratamiento_{{ $loop->index + 1 }}_7" class="form-control form-control-sm bg-light" value="{{ $pieza->tratamiento_plan ?? '' }}" readonly />

                                                                                        <input type="hidden" name="odontograma{{ $loop->index + 1 }}_7" id="odontograma{{ $loop->index + 1 }}_7" value="1">
                                                                                        <input type="hidden" name="caraM_check_{{ $loop->index + 1 }}_7" id="caraM_check_{{ $loop->index + 1 }}_7" value="0">
                                                                                        <input type="hidden" name="caraO_check_{{ $loop->index + 1 }}_7" id="caraO_check_{{ $loop->index + 1 }}_7" value="0">
                                                                                        <input type="hidden" name="caraD_check_{{ $loop->index + 1 }}_7" id="caraD_check_{{ $loop->index + 1 }}_7" value="0">
                                                                                        <input type="hidden" name="caraV_check_{{ $loop->index + 1 }}_7" id="caraV_check_{{ $loop->index + 1 }}_7" value="0">
                                                                                        <input type="hidden" name="caraP_check_{{ $loop->index + 1 }}_7" id="caraP_check_{{ $loop->index + 1 }}_7" value="0">
                                                                                        <button type="button" class="btn btn-info btn-sm d-none" onclick="registrar_odontograma_septimo_cuadrante({{ $loop->index + 1 }})">
                                                                                            Guardar caras
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                    </div>
                                                                    @endforeach
                                                                @endif
                                                                @if($septimo_cuadrante_infantil->count() == 0)
                                                                    <div class="col-md-12">
                                                                        <h6 class="text-center text-c-blue mb-2">No hay piezas dentales registradas</h6>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--GRUPO 8-->
                                <div class="tab-pane fade {{ $cuadrantePedActivo === 8 ? 'show active' : '' }}" id="od_inf_grupo_8" role="tabpanel" aria-labelledby="od_inf_grupo_8_tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            <div class="col-md-12">
                                                                <h6 class="text-center text-c-blue mb-2">CUADRANTE 8</h6>
                                                                @if(isset($octavo_cuadrante_infantil))
                                                                    @foreach($octavo_cuadrante_infantil as $cuadrante)
                                                                    <div class="table-responsive">

                                                                            <input type="hidden" name="ficha_id_atencion_dental_odon4"
                                                                                id="ficha_id_atencion_dental_odon4">
                                                                            <input type="hidden" name="paciente_atencion_dental_odon4"
                                                                                id="paciente_atencion_dental_odon4" value="{{ $paciente->id }}">

                                                                            <table class="table table-bordered table-xs" style="width:100%;">
                                                                                <tr class="bg-encabezado">
                                                                                    <th class="text-center align-middle">PIEZA</th>
                                                                                    <th class="text-center align-middle">CARA</th>
                                                                                    <th class="text-center align-middle">CUADRANTE</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="px-1 py-1 text-center align-middle">
                                                                                        <select id="pieza_odontograma_{{ $loop->index + 1 }}_8" name="pieza_odontograma_{{ $loop->index + 1 }}_8"
                                                                                            class="form-control form-control-sm">
                                                                                            <option value="{{ $cuadrante->numero_pieza }}">{{ $cuadrante->numero_pieza }}</option>
                                                                                        </select>
                                                                                        <div id="t53">
                                                                                            <img src="{{ asset('images/dientes/d'.str_replace('.', '', $cuadrante->numero_pieza).'.png') }}"
                                                                                                class="wid-40 py-1" alt="{{ $cuadrante->numero_pieza }}">
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="align-middle text-center">
                                                                                        <table class="table-borderless" style="align-content:center">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td class="padding-caras"></td>
                                                                                                    <td class="padding-caras">
                                                                                                        <div class="circulo-v" id="caraV{{ $loop->index + 1 }}8"
                                                                                                            onclick="cambiar_color({{ $loop->index + 1 }}, 8)">V</div>
                                                                                                    </td>
                                                                                                    <td class="padding-caras"></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="padding-caras">
                                                                                                        <div class="circulo-d" id="caraD{{ $loop->index + 1 }}8"
                                                                                                            onclick="cambiar_colorD({{ $loop->index + 1 }}, 8)">D</div>
                                                                                                    </td>
                                                                                                    <td class="padding-caras">
                                                                                                        <div class="circulo-o" id="caraO{{ $loop->index + 1 }}8"
                                                                                                            onclick="cambiar_colorO({{ $loop->index + 1 }}, 8)">O</div>
                                                                                                    </td>
                                                                                                    <td class="padding-caras">
                                                                                                        <div class="circulo-m" id="caraM{{ $loop->index + 1 }}8"
                                                                                                            onclick="cambiar_colorM({{ $loop->index + 1 }}, 8)">M</div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="padding-caras"></td>
                                                                                                    <td class="padding-caras">
                                                                                                        <div class="circulo-p" id="caraP{{ $loop->index + 1 }}8"
                                                                                                            onclick="cambiar_colorP({{ $loop->index + 1 }}, 8)">P</div>
                                                                                                    </td>
                                                                                                    <td class="padding-caras"></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td class="text-center align-middle">
                                                                                        <div id="t53" style="width:100%;">
                                                                                            <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                                                                class="wid-100">
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="px-1 py-1"><button type="button"
                                                                                            class="btn btn-block btn-sm btn-outline-primary" data-toggle="popover"
                                                                                            title="Historia" data-content="cargar historia del diente">Ver
                                                                                            historia</button></td>
                                                                                    <td class="px-1 py-1">
                                                                                        <select class="form-control form-control-sm bg-light plan-field-readonly" id="diagnostico_{{ $loop->index + 1 }}_8" tabindex="-1" aria-readonly="true"
                                                                                            name="diagnostico_{{ $loop->index + 1 }}_8">
                                                                                            <option value="0">Sin diagnóstico asociado</option>
                                                                                            @foreach($diagnosticos as $diagnostico)
                                                                                                <option value="{{$diagnostico->id}}" {{ (string) ($pieza->diagnostico_plan ?? '') === (string) $diagnostico->id ? 'selected' : '' }}>{{$diagnostico->descripcion}} </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </td>
                                                                                    <td class="px-1 py-1">
                                                                                        <input type="text" name="tratamiento_{{ $loop->index + 1 }}_8" id="tratamiento_{{ $loop->index + 1 }}_8" class="form-control form-control-sm bg-light" value="{{ $pieza->tratamiento_plan ?? '' }}" readonly />

                                                                                        <input type="hidden" name="odontograma{{ $loop->index + 1 }}_8" id="odontograma{{ $loop->index + 1 }}_8" value="1">
                                                                                        <input type="hidden" name="caraM_check_{{ $loop->index + 1 }}_8" id="caraM_check_{{ $loop->index + 1 }}_8" value="0">
                                                                                        <input type="hidden" name="caraO_check_{{ $loop->index + 1 }}_8" id="caraO_check_{{ $loop->index + 1 }}_8" value="0">
                                                                                        <input type="hidden" name="caraD_check_{{ $loop->index + 1 }}_8" id="caraD_check_{{ $loop->index + 1 }}_8" value="0">
                                                                                        <input type="hidden" name="caraV_check_{{ $loop->index + 1 }}_8" id="caraV_check_{{ $loop->index + 1 }}_8" value="0">
                                                                                        <input type="hidden" name="caraP_check_{{ $loop->index + 1 }}_8" id="caraP_check_{{ $loop->index + 1 }}_8" value="0">
                                                                                        <button type="button" class="btn btn-info btn-sm d-none" onclick="registrar_odontograma_octavo_cuadrante({{ $loop->index + 1 }})">
                                                                                            Guardar caras
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                    </div>
                                                                    @endforeach
                                                                @endif
                                                                @if($octavo_cuadrante_infantil->count() == 0)
                                                                    <div class="col-md-12">
                                                                        <h6 class="text-center text-c-blue mb-2">No hay piezas dentales registradas</h6>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3 mb-0">
                    <h6 class="f-16 text-c-blue">Plan de tratamiento y presupuesto</h6>
                    <p class="text-muted mb-2">Tratamientos asociados a cada pieza. Active o desactive su inclusión en el presupuesto, actualice su progreso o seleccione registros para eliminarlos.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm odontograma-plan-card">
                        <div class="card-body p-3">
                            <div class="table-responsive">
                                    <table class="table table-xs" id="table_odontograma_infantil">
                                        <thead>
                                            <tr>
                                                <th>Fecha y hora</th>
                                                <th>Prestación</th>
                                                <th>Caras</th>
                                                <th>Pieza / Imagen</th>
                                                <th>Diagnóstico</th>
                                                <th>Valor</th>
                                                <th>Presupuesto</th>
                                                <th class="text-center">
                                                    Progreso / Seleccionar
                                                    <button
                                                        type="button"
                                                        class="btn btn-outline-danger btn-sm ml-2"
                                                        onclick="eliminar_seleccionados()"
                                                        title="Eliminar tratamientos seleccionados">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($odontograma))
                                        @foreach ($odontograma as $odonto)
                                        @if($odonto->urgencia == 0)
                                        <tr data-treatment-id="{{ $odonto->id }}" data-clinical-state="{{ (int) ($odonto->estado ?? 0) }}" data-progress="{{ (int) ($odonto->progreso ?? ((int) ($odonto->estado ?? 0) === 1 ? 100 : 0)) }}">
                                            <td>
                                                <div class="dental-table-datetime">
                                                    <strong>{{ \Carbon\Carbon::parse($odonto->fecha)->format('d-m-Y') }}</strong>
                                                    <small>{{ \Carbon\Carbon::parse($odonto->fecha)->format('H:i') }}</small>
                                                </div>
                                            </td>
                                            <td><span class="dental-treatment-name" title="{{ $odonto->tratamiento }}">{{ $odonto->tratamiento }}</span></td>
                                            <td>{{ $odonto->caras }}</td>
                                            <td>
                                                <div class="dental-table-tooth">
                                                    <img src="{{ asset('images/dental/dientes/d'.str_replace('.', '', (string) $odonto->pieza).'.png') }}"
                                                        alt="Pieza {{ $odonto->pieza }}">
                                                    <strong>{{ $odonto->pieza }}</strong>
                                                </div>
                                            </td>
                                            <td>{{ $odonto->diagnostico }}</td>
                                            <td>{{ number_format($odonto->valor,0,',','.') }}</td>
                                            {{-- <td>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_odontograma({{ $odonto->id }})"><i class="feather icon-x"></i>Eliminar</button>
                                                @if($odonto->presupuesto == 0)
                                                    <button type="button" class="btn btn-primary btn-sm" onclick="cargar_a_presupuesto({{ $odonto->id }})"><i class="fas fa-save"></i>Cargar a presupuesto</button>
                                                @else
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto({{ $odonto->id }})"><i class="fas fa-trash"></i>Sacar de presupuesto</button>
                                                @endif
                                            </td> --}}
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input
                                                        type="checkbox"
                                                        class="custom-control-input checkbox-presupuesto"
                                                        id="presupuestoCheckInf{{ $odonto->id }}"
                                                        value="{{ $odonto->id }}"
                                                        {{ $odonto->presupuesto == 1 ? 'checked' : '' }}
                                                        onchange="togglePresupuesto({{ $odonto->id }}, this.checked)">

                                                    <label class="custom-control-label" for="presupuestoCheckInf{{ $odonto->id }}"></label>
                                                </div>

                                            </td>

                                            <td>
                                                <div class="dental-table-state-control">
                                                    @php $progresoPiezaInfantil = (int) ($odonto->progreso ?? ((int) ($odonto->estado ?? 0) === 1 ? 100 : 0)); @endphp
                                                    <div class="dental-progress-wheel" style="--progress: {{ $progresoPiezaInfantil }}"
                                                        title="Progreso del tratamiento: {{ $progresoPiezaInfantil }}%">
                                                        <span class="dental-progress-wheel-value">{{ $progresoPiezaInfantil }}%</span>
                                                        <select class="dental-piece-progress"
                                                            aria-label="Progreso del tratamiento"
                                                            data-original-progress="{{ $progresoPiezaInfantil }}"
                                                            onchange="actualizarEstadoPiezaPlan(this, {{ $odonto->id }})">
                                                            @foreach ([0, 25, 50, 75, 100] as $porcentaje)
                                                                <option value="{{ $porcentaje }}" {{ $progresoPiezaInfantil === $porcentaje ? 'selected' : '' }}>{{ $porcentaje }}%</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                <div class="custom-control custom-switch">
                                                    <input
                                                        type="checkbox"
                                                        class="custom-control-input checkbox-seleccion"
                                                        id="seleccionCheckInf{{ $odonto->id }}"
                                                        value="{{ $odonto->id }}"
                                                        onchange="toggleSeleccion({{ $odonto->id }}, this.checked)">
                                                    <label class="custom-control-label" for="seleccionCheckInf{{ $odonto->id }}"></label>
                                                </div>
                                                </div>
                                            </td>

                                        </tr>
                                        @endif
                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .plan-field-readonly {
                    pointer-events: none;
                    color: #495057;
                }
                .odontograma-plan-card {
                    border-radius: 10px;
                    overflow: hidden;
                }
                #table_odontograma_infantil thead th {
                    background: #eef3f8;
                    color: #24415f;
                    border-bottom: 2px solid #d9e3ec;
                    font-size: .75rem;
                    letter-spacing: .02em;
                    text-transform: uppercase;
                    vertical-align: middle;
                    white-space: nowrap;
                }
                #table_odontograma_infantil tbody td {
                    vertical-align: middle;
                    padding-top: .65rem;
                    padding-bottom: .65rem;
                }
                #table_odontograma_infantil tbody tr:hover {
                    background-color: #f7fbff;
                }
                #table_odontograma_infantil .custom-switch {
                    display: flex;
                    justify-content: center;
                    padding-left: 2.25rem;
                }
            </style>
            <script>
                function nombreEstadoTratamientoDental(estado) {
                    const estados = {
                        0: 'PENDIENTE',
                        1: 'FINALIZADO',
                        2: 'EN PROCESO',
                        3: 'CITADO A CONTROL'
                    };

                    return estados[parseInt(estado, 10)] || 'SIN ESTADO';
                }

                function formatearCarasLectura(caras) {
                    const carasValidas = ['M', 'O', 'D', 'V', 'P'];
                    const seleccionadas = String(caras || '')
                        .split('|')
                        .map(function(cara) { return cara.trim().toUpperCase(); })
                        .filter(function(cara, indice, lista) {
                            return carasValidas.includes(cara) && lista.indexOf(cara) === indice;
                        });

                    return seleccionadas.length ? seleccionadas.join(', ') : 'Sin caras';
                }

                $(document).off('click.guardarCaraPediatrica', '#contenedor_examenes_grupos_dentales_odontop [id^="cara"]')
                    .on('click.guardarCaraPediatrica', '#contenedor_examenes_grupos_dentales_odontop [id^="cara"]', function () {
                        const coincidencia = String(this.id || '').match(/^cara[VDOMP](\d+)([5-8])$/);
                        if (!coincidencia) return;
                        const indice = Number(coincidencia[1]);
                        const cuadrante = Number(coincidencia[2]);
                        const guardar = {
                            5: window.registrar_odontograma_quinto_cuadrante,
                            6: window.registrar_odontograma_sexto_cuadrante,
                            7: window.registrar_odontograma_septimo_cuadrante,
                            8: window.registrar_odontograma_octavo_cuadrante
                        }[cuadrante];
                        if (typeof guardar === 'function') {
                            window.setTimeout(function () { guardar(indice); }, 0);
                        }
                    });
            </script>
        </div>
    </div>
