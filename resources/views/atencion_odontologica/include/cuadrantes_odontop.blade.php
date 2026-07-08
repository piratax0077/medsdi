<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <ul class="nav nav-tabs-aten nav-fill mb-10" id="orl_adulto" role="tablist">
            <li class="nav-item">
                <a class="nav-link-aten text-reset active" id="grupo_5_tab" data-toggle="tab" href="#grupo_5" role="tab" aria-controls="grupo_5" aria-selected="true">CUADRANTE 5</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="grupo_6-tab" data-toggle="tab" href="#grupo_6" role="tab" aria-controls="grupo_6" aria-selected="true">CUADRANTE 6</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="grupo_7-tab" data-toggle="tab" href="#grupo_7" role="tab" aria-controls="grupo_7" aria-selected="true">CUADRANTE 7</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="grupo_8-tab" data-toggle="tab" href="#grupo_8" role="tab" aria-controls="grupo_8" aria-selected="true">CUADRANTE 8</a>
            </li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="tab-content" >
            <!--GRUPO 5-->
            <div class="tab-pane fade show active" id="grupo_5" role="tabpanel" aria-labelledby="grupo_5_tab">
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
                                                                            <img src="{{ asset('images/dientes/d53.png') }}"
                                                                                class="wid-40 py-1">
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
                                                                        <select class="form-control form-control-sm" id="diagnostico_{{ $loop->index + 1 }}_5"
                                                                            name="diagnostico_{{ $loop->index + 1 }}_5">
                                                                            <option value="0">Seleccione</option>
                                                                            @foreach($diagnosticos as $diagnostico)
                                                                                <option value="{{$diagnostico->id}}">{{$diagnostico->descripcion}} </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td class="px-2 py-2">
                                                                        <input type="text" class="form-control form-control-sm tratamiento-autocomplete" id="tratamiento_{{ $loop->index + 1 }}_5" />

                                                                        <input type="hidden" name="odontograma_{{ $loop->index + 1 }}_5" id="odontograma_{{ $loop->index + 1 }}_5" value="{{ $loop->index }}">
                                                                        <input type="hidden" name="caraM_check_{{ $loop->index + 1 }}_5" id="caraM_check_{{ $loop->index + 1 }}_5" value="0">
                                                                        <input type="hidden" name="caraO_check_{{ $loop->index + 1 }}_5" id="caraO_check_{{ $loop->index + 1 }}_5" value="0">
                                                                        <input type="hidden" name="caraD_check_{{ $loop->index + 1 }}_5" id="caraD_check_{{ $loop->index + 1 }}_5" value="0">
                                                                        <input type="hidden" name="caraV_check_{{ $loop->index + 1 }}_5" id="caraV_check_{{ $loop->index + 1 }}_5" value="0">
                                                                        <input type="hidden" name="caraP_check_{{ $loop->index + 1 }}_5" id="caraP_check_{{ $loop->index + 1 }}_5" value="0">
                                                                        <button type="button" class="btn btn-info btn-sm" onclick="registrar_odontograma_quinto_cuadrante({{ $loop->index + 1 }})">
                                                                            Registrar
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
            <div class="tab-pane fade show" id="grupo_6" role="tabpanel" aria-labelledby="grupo_6_tab">
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
                                                                        <img src="{{ asset('images/dientes/d53.png') }}"
                                                                            class="wid-40 py-1">
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
                                                                    <select class="form-control form-control-sm" id="diagnostico_{{ $loop->index + 1  }}_6"
                                                                        name="diagnostico_{{ $loop->index + 1  }}_6">
                                                                        <option value="0">Seleccione</option>
                                                                        @foreach($diagnosticos as $diagnostico)
                                                                            <option value="{{$diagnostico->id}}">{{$diagnostico->descripcion}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td class="px-1 py-1">
                                                                    <input type="text" name="tratamiento_{{ $loop->index + 1  }}_6" id="tratamiento_{{ $loop->index + 1  }}_6" class="form-control form-control-sm tratamiento-autocomplete" />

                                                                    <input type="hidden" name="odontograma{{ $loop->index + 1 }}_6" id="odontograma{{ $loop->index + 1 }}_6" value="1">
                                                                    <input type="hidden" name="caraM_check_{{ $loop->index + 1 }}_6" id="caraM_check_{{ $loop->index + 1 }}_6" value="0">
                                                                    <input type="hidden" name="caraO_check_{{ $loop->index + 1 }}_6" id="caraO_check_{{ $loop->index + 1 }}_6" value="0">
                                                                    <input type="hidden" name="caraD_check_{{ $loop->index + 1 }}_6" id="caraD_check_{{ $loop->index + 1 }}_6" value="0">
                                                                    <input type="hidden" name="caraV_check_{{ $loop->index + 1 }}_6" id="caraV_check_{{ $loop->index + 1 }}_6" value="0">
                                                                    <input type="hidden" name="caraP_check_{{ $loop->index + 1 }}_6" id="caraP_check_{{ $loop->index + 1 }}_6" value="0">
                                                                    <button type="button" class="btn btn-info btn-sm" onclick="registrar_odontograma_sexto_cuadrante({{ $loop->index + 1 }})">
                                                                        Registrar
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
            <div class="tab-pane fade show" id="grupo_7" role="tabpanel" aria-labelledby="grupo_7-tab">
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
                                                                        <img src="{{ asset('images/dientes/d53.png') }}"
                                                                            class="wid-40 py-1">
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
                                                                    <select class="form-control form-control-sm" id="diagnostico_{{ $loop->index + 1 }}_7"
                                                                        name="diagnostico_{{ $loop->index + 1 }}_7">
                                                                        <option value="0">Seleccione</option>
                                                                        @foreach($diagnosticos as $diagnostico)
                                                                            <option value="{{$diagnostico->id}}">{{$diagnostico->descripcion}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td class="px-1 py-1">
                                                                    <input type="text" name="tratamiento_{{ $loop->index + 1 }}_7" id="tratamiento_{{ $loop->index + 1 }}_7" class="form-control form-control-sm tratamiento-autocomplete" />

                                                                    <input type="hidden" name="odontograma{{ $loop->index + 1 }}_7" id="odontograma{{ $loop->index + 1 }}_7" value="1">
                                                                    <input type="hidden" name="caraM_check_{{ $loop->index + 1 }}_7" id="caraM_check_{{ $loop->index + 1 }}_7" value="0">
                                                                    <input type="hidden" name="caraO_check_{{ $loop->index + 1 }}_7" id="caraO_check_{{ $loop->index + 1 }}_7" value="0">
                                                                    <input type="hidden" name="caraD_check_{{ $loop->index + 1 }}_7" id="caraD_check_{{ $loop->index + 1 }}_7" value="0">
                                                                    <input type="hidden" name="caraV_check_{{ $loop->index + 1 }}_7" id="caraV_check_{{ $loop->index + 1 }}_7" value="0">
                                                                    <input type="hidden" name="caraP_check_{{ $loop->index + 1 }}_7" id="caraP_check_{{ $loop->index + 1 }}_7" value="0">
                                                                    <button type="button" class="btn btn-info btn-sm" onclick="registrar_odontograma_septimo_cuadrante({{ $loop->index + 1 }})">
                                                                        Registrar
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
            <div class="tab-pane fade show" id="grupo_8" role="tabpanel" aria-labelledby="grupo_8-tab">
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
                                                                        <img src="{{ asset('images/dientes/d53.png') }}"
                                                                            class="wid-40 py-1">
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
                                                                    <select class="form-control form-control-sm" id="diagnostico_{{ $loop->index + 1 }}_8"
                                                                        name="diagnostico_{{ $loop->index + 1 }}_8">
                                                                        <option value="0">Seleccione</option>
                                                                        @foreach($diagnosticos as $diagnostico)
                                                                            <option value="{{$diagnostico->id}}">{{$diagnostico->descripcion}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td class="px-1 py-1">
                                                                    <input type="text" name="tratamiento_{{ $loop->index + 1 }}_8" id="tratamiento_{{ $loop->index + 1 }}_8" class="form-control form-control-sm tratamiento-autocomplete" />

                                                                    <input type="hidden" name="odontograma{{ $loop->index + 1 }}_8" id="odontograma{{ $loop->index + 1 }}_8" value="1">
                                                                    <input type="hidden" name="caraM_check_{{ $loop->index + 1 }}_8" id="caraM_check_{{ $loop->index + 1 }}_8" value="0">
                                                                    <input type="hidden" name="caraO_check_{{ $loop->index + 1 }}_8" id="caraO_check_{{ $loop->index + 1 }}_8" value="0">
                                                                    <input type="hidden" name="caraD_check_{{ $loop->index + 1 }}_8" id="caraD_check_{{ $loop->index + 1 }}_8" value="0">
                                                                    <input type="hidden" name="caraV_check_{{ $loop->index + 1 }}_8" id="caraV_check_{{ $loop->index + 1 }}_8" value="0">
                                                                    <input type="hidden" name="caraP_check_{{ $loop->index + 1 }}_8" id="caraP_check_{{ $loop->index + 1 }}_8" value="0">
                                                                    <button type="button" class="btn btn-info btn-sm" onclick="registrar_odontograma_octavo_cuadrante({{ $loop->index + 1 }})">
                                                                        Registrar
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


<input type="hidden" name="url_tratamientos" id="url_tratamientos" value="{{ $url_tratamientos }}">

{{-- Script para inicializar el autocomplete --}}
<script>
    $(document).ready(function() {
        let url = $('#url_tratamientos').val();
        $('.tratamiento-autocomplete').each(function() {
            $(this).autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: url,
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            if (data.length == 0) {
                                $('.diagnostico_activo').hide();
                                $('.diagnostico_inactivo').show();
                            } else {
                                $('.diagnostico_activo').show();
                                $('.diagnostico_inactivo').hide();
                            }
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $(this).val(ui.item.label);
                    $(this).next('input[type="hidden"]').val(ui.item.value);
                    return false;
                }
            });
        });
    });
</script>