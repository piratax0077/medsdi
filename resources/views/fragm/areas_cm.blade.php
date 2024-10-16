<div class="row">
    <div class="col-sm-12 col-md-12">
        <div style="overflow-x:auto;">
            <div class="table-responsive">
                <table id="area_cm" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-wrap text-left align-middle">Área</th>
                            <th class="text-wrap text-left align-middle">Tipo</th>
                            <th class="text-wrap text-left align-middle">Responsable</th>
                            <th class="text-wrap text-left align-middle">Contacto</th>
                            <th class="text-wrap text-left align-middle">N° personal</th>
                            <th class="text-wrap text-left align-middle">Integrantes</th>
                            <th class="text-wrap text-left align-middle">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($areas_cm as $area)
                        <tr>
                            <td class="align-middle text-left">{{ $area->nombre }}</td>
                            <td class="align-middle text-left">{{ $area->tipo_area }}</td>
                            <td class="align-middle text-left">{{ $area->nombre . ' ' . $area->apellido_uno . ' ' . $area->apellido_dos }}</td>
                            <td class="align-middle text-left">{{ $area->email }}</td>
                            <td class="align-middle text-left">{{ $area->numero_personas }}</td>
                            <td class="align-middle text-left">
                                @if($area->profesionales)
                                @foreach ($area->profesionales as $profesional)
                                <span>{{ $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos }}</span><br>
                                @endforeach
                                @endif
                            </td>
                            <td class="align-middle text-left">
                                <button type="button" class="btn btn-outline-secondary btn-icon" data-toggle="tooltip" data-placement="top" title="Editar responsable {{ $area->tipo_area }}" onclick="asignar_profesionales_area({{ $area->id }})"><i class="feather icon-edit"></i></button>
                                <button type="button" class="btn btn-warning btn-icon" data-toggle="tooltip" data-placement="top" title="Editar responsable {{ $area->tipo_area }}" onclick="dame_area_cm({{ $area->id_responsable }},{{ $institucion->id_lugar_atencion }})"><i class="feather icon-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar area {{ $area->tipo_area }}" onclick="eliminar_area_cm({{ $area->id }});"><i class="feather icon-x"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
