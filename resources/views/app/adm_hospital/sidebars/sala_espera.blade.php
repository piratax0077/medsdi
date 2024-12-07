<div id="side_sala_espera" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg"
    data-width="370px" data-offset="true">
    <header class="bs-canvas-header p-3 bg-info overflow-auto">
        <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true"
                class="text-light">&times;</span></button>
        <h5 class="d-inline-block text-light mb-0 float-right mt-1">SALA ESPERA</h5>
    </header>
    <div class="bs-canvas-content">
     

       
        <div class="accordion" id="accordion_side_bar">
            @if($pacientes_esperando->count() > 0)
            @foreach($pacientes_esperando as $pe)
            <div class="card">
                <div class="card-header" id="heading{{$pe->id}}">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapse{{$pe->id}}" aria-expanded="true" aria-controls="collapse{{$pe->id}}">
                            <span class="text-primary">{{$pe->nombres . ' ' . $pe->apellido_uno . ' ' . $pe->apellido_dos}}</span>
                            <span class="text-secondary">{{ $pe->edad }} años</span>
                        </button>
                    </h2>
                </div>

                <div id="collapse{{$pe->id}}" class="collapse" aria-labelledby="heading{{$pe->id}}"
                    data-parent="#accordion_side_bar">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-secondary">Rut: {{$pe->rut}}</p>
                            </div>
                            <div class="col-12">
                                <p class="text-secondary">Fecha de Nacimiento: {{$pe->fecha_nac}}</p>
                            </div>
                            <div class="col-12">
                                <p class="text-secondary">Hora de llegada: {{$pe->hora_llegada}}</p>
                            </div>
                            <div class="col-12">
                                <p class="text-secondary">Hora de atención: {{$pe->hora_atencion}}</p>
                            </div>
                            <div class="col-12">
                                <p class="text-secondary">Hora de salida: {{$pe->hora_salida}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            No hay pacientes en espera
                        </button>
                    </h2>
                </div>
            </div>
            @endif
        </div>
    </div>

</div>