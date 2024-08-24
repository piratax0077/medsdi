<div class="row">
    <div class="col-md-4">
        <table class="table">
            <tr>
                <td><strong>Proveedor:</strong></td>
                <td>{{ $producto->proveedor }}</td>
            </tr>
            <tr>
                <td><strong>Codigo:</strong></td>
                <td>{{ $producto->codigo_interno }}</td>
            </tr>
            <tr>
                <td><strong>Nombre:</strong></td>
                <td>{{ $producto->nombre }}</td>
            </tr>
            <tr>
                <td><strong>Descripcion:</strong></td>
                <td>{{ $producto->descripcion }}</td>
            </tr>
            <tr>
                <td><strong>Stock:</strong></td>
                <td>{{ $producto->stock_actual }}</td>
            </tr>
            <tr>
                <td><strong>Temperatura:</strong></td>
                <td>
                    <input type="number" class="form-control form-control-sm" placeholder="Ingrese T°">
                </td>
            </tr>
            <tr>
                <td><strong>Observaciones:</strong></td>
                <td>
                    <textarea class="form-control form-control-sm" rows="3"></textarea>
                </td>
            </tr>
        </table>
        <button class="btn btn-outline-success btn-sm my-2 float-right"><i class="fas fa-save"></i> Guardar</button>
    </div>
    <div class="col-md-8">
        <table class="table table-striped" id="table_productos_almacenados">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Usuario</th>
                    <th>Stock</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($movimientos))
                @foreach($movimientos as $m)
                <tr>
                    <td>{{ $m->created_at }}</td>
                    <td>{{ $m->usuario }}</td>
                    <td>{{ $m->stock }}</td>
                    <td>{{ $m->descripcion }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#table_productos_almacenados').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            }
        });
    });
</script>
