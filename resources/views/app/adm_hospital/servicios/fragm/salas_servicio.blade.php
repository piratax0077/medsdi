{{-- <div class="row">
    @for ($i = 1; $i <= $servicio->numero_salas; $i++)
        @php
            $id_sala_servicio = $servicio->id.'-'.$i;
            // Verificamos si la sala correspondiente ya tiene información en $servicio->salas
            $salaInfo = $servicio->salas->where('id_sala_servicio', $id_sala_servicio)->first();
        @endphp
        <div class="col-md-4" >
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between bg-info">Sala {{ $i }}</div>
                <div class="card-body {{ $salaInfo && $salaInfo->alerta == 1 ? 'boxEnAlerta white-background' : '' }}">
                    @if($salaInfo)
                        <p>Cantidad de camas: {{ $salaInfo->cantidad_camas }}</p>
                        <div class="camas-container d-flex flex-wrap">
                            @for ($j = 1; $j <= $salaInfo->cantidad_camas; $j++)

                                <div class="cama-cubo m-1 ">
                                    @foreach ($servicio->pacientes as $p)
                                        @if($p->id_cama == $j && $salaInfo->id == $p->id_sala)


                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <img src="{{ asset('images/paciente.png') }}" alt="image" class="image_paciente">
                                                <a href="javascript:void(0)" onclick="abrir_atencion_paciente({{ $p->id_paciente }},{{ $p->id_paciente_triage }})">
                                                    <p>{{ $p->nombres }} {{ $p->apellido_uno_paciente }} {{ $p->apellido_dos_paciente }}</p>
                                                    <p class="{{ $p->clase_html }} text-center rounded">{{ $p->urgencia }}</p>
                                                </a>
                                             </div>

                                             <div class="d-flex justify-content-between">
                                                <p>{{ $p->nombre }} {{ $p->apellido_uno }} {{ $p->apellido_dos }}</p>
                                                <button class="btn btn-outline-danger btn-sm" onclick="sacar_paciente_cama({{ $p->id }})"><i class="fas fa-trash"></i></button>
                                             </div>


                                        @if(Auth::user()->id == $p->id_profesional)
                                            <p>Paciente Propio</p>
                                        @endif

                                        @endif
                                    @endforeach
                                </div>

                            @endfor

                            <div class="col-md-12 text-center">
                                <a href="javascript:void(0)" onclick="clave1({{ $salaInfo->id }},'2 - Adulto')"><img src="https://urgencias.med-sdi.cl/images/iconos_urg/em.png" alt="" style="width: 40px;" class="pulsate-fwd"></a>
                            </div>
                        </div>
                    @else
                        <p>No hay información disponible para esta sala.</p>
                    @endif
                </div>
            </div>
        </div>
    @endfor
</div> --}}
<!--TAB-->
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <ul class="nav nav-tabs-aten nav-fill mb-2" id="orl_adulto" role="tablist">
            @for ($i = 1; $i <= $servicio->numero_salas; $i++)
            <li class="nav-item">
                <a class="nav-link-aten text-reset {{ $i == 1 ? 'active' : '' }}" id="sala_{{ $i }}_tab" data-toggle="tab" href="#sala_{{ $i }}" role="tab" aria-controls="sala_{{ $i }}" aria-selected="true">Sala {{ $i }}</a>
            </li>
            @endfor
        </ul>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="tab-content" id="orl_adulto">
            @for ($i = 1; $i <= $servicio->numero_salas; $i++)
            <!--Sala-->
            <div class="tab-pane fade show {{ $i == 1 ? 'active' : '' }}" id="sala_{{ $i }}" role="tabpanel" aria-labelledby="sala_{{ $i }}_tab">


                            @php
                                $id_sala_servicio = $servicio->id.'-'.$i;
                                // Verificamos si la sala correspondiente ya tiene información en $servicio->salas
                                $salaInfo = $servicio->salas->where('id_sala_servicio', $id_sala_servicio)->first();

                            @endphp
                        <!--RECUARDO SUPERRIOR BLANCO INFO SALA-->
                        @if($salaInfo)
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-header bg-primary">
                                            <h4 class="f-20 text-white">Sala: {{  $salaInfo->nombre_sala }}</h4>
                                        </div>
                                        <div class="card-body pb-1 pt-2">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                                    <h5 class="text-c-blue">Total camas: <span class="text-dark">{{ $salaInfo->cantidad_camas }}</span></h5>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                                    <h5 class="text-c-blue">Camas ocupadas: <span class="text-dark">-</span></h5>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                                    <h5 class="text-c-blue">Camas disponibles: <span class="text-dark">-</span></h5>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                                    <!--dejar alarma de alerta y cuando se presione ese cambio de color que solo ocurra en esta card de información-->

                                                    <a href="javascript:void(0)" onclick="clave1({{ $salaInfo->id }},'2 - Adulto')"><img src="https://urgencias.med-sdi.cl/images/iconos_urg/em.png" alt="" style="width: 40px;" class="pulsate-fwd"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!--INFO CAMAS POR SALA-->
                        <div class="row row-cols-1 row-cols-md-2">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12"><!--CUANDO TODO ESTO ESTE SEPARADO POR TABS, SOLO SE DEJA LA CLASE "COL" SIN NUMEROS NI GUIÓN-->
                                    <!--<div class="card-header d-flex align-items-center justify-content-between bg-info">Sala {{ $i }}</div>-->
                                    <div class=" {{ $salaInfo && $salaInfo->alerta == 1 ? 'boxEnAlerta white-background' : '' }}">
                                        @if($salaInfo)
                                            <p>Cantidad de camas: {{ $salaInfo->cantidad_camas }}</p>

                                                @for ($j = 1; $j <= $salaInfo->cantidad_camas; $j++)
                                                    <div class="card">
                                                    <div class="card-body pb-1 {{ $salaInfo && $salaInfo->alerta == 1 ? 'boxEnAlerta white-background' : '' }}">
                                                        @foreach ($servicio->pacientes as $p)
                                                            @if($p->id_cama == $j && $salaInfo->id == $p->id_sala)
                                                                <div class="media">
                                                                    <img src="{{ asset('images/paciente.png') }}" alt="image" class="image_paciente">
                                                                    <div class="media-body">
                                                                        <h5 class="mt-0 text-capitalize mb-0">{{ $p->nombres }} {{ $p->apellido_uno_paciente }} {{ $p->apellido_dos_paciente }}</h5>
                                                                        <p class="mt-0">18.382.693-K</p>
                                                                        <a  href="javascript:void(0)" onclick="abrir_atencion_paciente({{ $p->id_paciente }},{{ $p->id_paciente_triage }})">
                                                                        <!--<p>{{ $p->nombres }} {{ $p->apellido_uno_paciente }} {{ $p->apellido_dos_paciente }}</p>-->
                                                                        <p class="{{ $p->clase_html }} text-center font-weight-bold rounded" style="width:10rem;">{{ $p->urgencia }}</p>
                                                                        </a>
                                                                        <div class="d-flex justify-content-between mt-2">
                                                                            <p class="text-capitalize">{{ $p->nombre }} {{ $p->apellido_uno }} {{ $p->apellido_dos }}</p>
                                                                            <!--<button class="btn btn-outline-danger btn-sm" onclick="sacar_paciente_cama({{ $p->id }})"><i class="feather icon-x"></i></button>-->
                                                                        </div>
                                                                        @if(Auth::user()->id == $p->id_profesional)
                                                                            <p>(Paciente propio)</p>
                                                                        @endif


                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach


                                                    </div>
                                                    <div class="card-footer">
                                                        <button class="btn btn-danger btn-icon" onclick="sacar_paciente_cama({{ $p->id }})"><i class="feather icon-x"></i></button>
                                                    </div>
                                                    </div>

                                                @endfor



                                        @else
                                            <h5>No hay información disponible para esta sala.</h5>
                                        @endif
                                    </div>


                            </div>
                        </div>
            </div>
            @endfor
        </div>
    </div>
</div>
