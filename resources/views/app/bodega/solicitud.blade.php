@if(isset($productos_pedido))
@if(count($productos_pedido) == 0)
<div class="alert alert-warning" role="alert">
    No hay productos en la solicitud
</div>
@else
<div class="alert alert-info" role="alert">
    <strong>Productos solicitados: {{ count($productos_pedido) }}</strong>
</div>
@endif
@endif
<table id="detalle_solicitud_pendiente" class="display table table-striped table-xs dt-responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th class="align-middle">Código</th>
            <th class="align-middle">Tipo Producto</th>
            <th class="align-middle">Producto</th>
            <th class="align-middle">Cantidad</th>
            <th class="align-middle">Marca</th>
            <th class="align-middle"></th>
        </tr>
    </thead>
    <tbody>
        @if(isset($productos_pedido))
            @foreach($productos_pedido as $det)
            <tr>
                <td class="align-middle">{{ $det->codigo }}</td>
                <td class="align-middle">{{ $det->tipo_producto }}</td>
                <td class="align-middle">{{ $det->nombre_medicamento }}</td>
                <td class="align-middle">{{ $det->cantidad }}</td>
                <td class="align-middle">{{ $det->marca }}</td>
                <td class="align-middle">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkbox_{{ $det->id }}" onclick="cambiar_estado({{ $det->id }})">
                        <label class="form-check-label" for="checkbox_{{ $det->id }}"></label>
                    </div>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>


