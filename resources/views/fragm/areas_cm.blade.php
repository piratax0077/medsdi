<div class="row">
    <div class="col-sm-12 col-md-12">
        <div style="overflow-x:auto;">
            <div class="table-responsive">
                <table id="area_cm" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                    <thead>
                        <tr>
                            <th>Tipo Área</th>
                            <th>Responsable</th>
                            <th>Ubicación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($areas_cm as $area)
                            <tr>
                                <td class="align-middle text-left">
                                    {{ $area->tipo_area }}</td>
                                <td class="align-middle text-left">
                                    {{ $area->nombre . ' ' . $area->apellido_uno . ' ' . $area->apellido_dos }}
                                </td>
                                <td class="align-middle text-left">
                                    {{ $area->ubicacion }}</td>
                                <td class="align-middle text-left">
                                    <button type="button"
                                        class="btn btn-outline-secondary btn-icon"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Editar responsable {{ $area->tipo_area }}"
                                        onclick="asignar_profesionales_area({{ $area->id }})"><i
                                            class="feather icon-edit"></i></button>
                                    <button type="button"
                                        class="btn btn-outline-danger btn-icon"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Eliminar área {{ $area->tipo_area }}"
                                        onclick="eliminar_area_cm({{ $area->id }})"><i
                                            class="feather icon-trash-2"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#area_cm').DataTable();
    });
</script>
