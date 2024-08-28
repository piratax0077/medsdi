<table class="table w-100 my-2" id="tabla_reporte_anual_entregas">
    <thead>
        <tr>
            <th scope="col">Imagen</th>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pedidos as $reporte)
            <tr>
                <td><img src="{{ $reporte->image_path }}" alt="prod" style="width: 100px"></td>
                <td>{{ $reporte->producto }}</td>
                <td>{{ $reporte->cantidad }}</td>
                <td>{{ $reporte->precio }}</td>
                <td>{{ $reporte->total }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<table class="table w-100 my-2" id="tabla_reporte_anual_ingresados">
    <thead>
        <tr>
            <th scope="col">Imagen</th>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ingresos as $reporte)
            <tr>
                <td><img src="{{ $reporte->image_path }}" alt="prod" style="width: 100px"></td>
                <td>{{ $reporte->producto }}</td>
                <td>{{ $reporte->cantidad }}</td>
                <td>$ {{ number_format($reporte->precio_compra,0,',','.') }}</td>
                <td>{{ number_format(intval($reporte->cantidad) * intval($reporte->precio_compra),0,',','.') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tabla_reporte_anual_entregas').DataTable();
        $('#tabla_reporte_anual_ingresados').DataTable();
    });
</script>
