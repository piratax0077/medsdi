<div class="tab-pane fade" id="otras-prestaciones" role="tabpanel" aria-labelledby="otras-prestaciones-tab">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header-principal">
                    <div class="row">
                        <div class="col-md-12 align-botton">
                            <h5 class="text-white d-inline"><i class="feather icon-activity icono-primary"></i>Catálogo de otras prestaciones</h5>
                            <button type="button" class="btn btn-sm btn-info float-right" onclick="ag_procedimiento();"><i class="fa fa-plus"></i> Agregar prestación</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="lista_otras_prestaciones" class="display table table-striped dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Prestación</th>
                                    <th>Tipo de prestación</th>
                                    <th>Descripción</th>
                                    <th>Cantidad de bloques</th>
                                    <th>Estado</th>
                                    <th>Valor</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($otras_prestaciones as $prestacion)
                                    <tr>
                                        <td>{{ $prestacion->cod_examen }}</td>
                                        <td class="wrap-column">{{ $prestacion->nombre }}</td>
                                        <td>{{ optional($prestacion->tipoPrestacion)->nombre ?? 'Sin clasificar' }}</td>
                                        <td class="wrap-column">{{ $prestacion->descripcion }}</td>
                                        <td>{{ $prestacion->cantidad_bloques }}</td>
                                        <td><span class="badge badge-{{ $prestacion->estado == 1 ? 'success' : 'secondary' }}">{{ $prestacion->estado == 1 ? 'Activo' : 'Inactivo' }}</span></td>
                                        <td>${{ number_format($prestacion->valor, 0, ',', '.') }}</td>
                                        <td>
                                            <button class="btn btn-info btn-icon btn-sm" type="button" onclick="ver_examen({{ $prestacion->id }})" title="Ver detalles"><i class="feather icon-eye"></i></button>
                                            <button class="btn btn-warning btn-icon btn-sm" type="button" onclick="mostrar_procedimiento({{ $prestacion->id }})" title="Editar"><i class="feather icon-edit"></i></button>
                                            <button class="btn btn-success btn-icon btn-sm" type="button" onclick="asignar_procedimiento({{ $prestacion->id }})" title="Asignar"><i class="feather icon-user"></i></button>
                                            <button class="btn btn-danger btn-icon btn-sm" type="button" onclick="eliminar_procedimiento({{ $prestacion->id }})" title="Eliminar"><i class="feather icon-x"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
