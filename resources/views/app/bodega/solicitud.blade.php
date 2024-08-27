<div id="contenedor_solicitudes_bodega">
@if(isset($productos_pendientes))
@if(count($productos_pendientes) == 0)
<div class="alert alert-warning" role="alert">
    No hay productos en la solicitud
</div>
@else
<div class="alert alert-info" role="alert">
    <strong>Productos solicitados: {{ count($productos_pendientes) }}</strong>
</div>
@endif
@endif

    <table id="detalle_solicitud_pendiente" class="display table table-striped table-xs dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th class="align-middle">Imagen</th>
                <th class="align-middle">Código</th>
                <th class="align-middle">Tipo Producto</th>
                <th class="align-middle">Producto</th>
                <th class="align-middle">Cantidad</th>
                <th class="align-middle">Marca</th>
                <th class="align-middle">Cantidad Entregada</th>
                <th class="align-middle">Observaciones</th>
                <th class="align-middle"></th>
            </tr>
        </thead>
        <tbody>
            @if(isset($productos_pendientes))
                @foreach($productos_pendientes as $det)
                <tr>
                    <td><img src="https://placehold.co/100x100" alt=""></td>
                    <td class="align-middle">{{ $det->codigo }}</td>
                    <td class="align-middle">{{ $det->tipo_producto }}</td>
                    <td class="align-middle">{{ $det->nombre_medicamento }}</td>
                    <td class="align-middle">{{ $det->cantidad }}</td>
                    <td class="align-middle">{{ $det->marca }}</td>
                    <td class="align-middle">
                        <input type="number" class="form-control form-control-sm" name="cantidad_entregada" id="cantidad_entregada">
                    </td>
                    <td class="align-middle">
                        <textarea class="form-control form-control-sm" name="observaciones" id="observaciones"></textarea>
                    </td>
                    <td class="align-middle">
                        <button class="btn btn-outline-success btn-sm w-100" onclick="agregar_producto_carro({{ $det->id }})">Agregar</button>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <table id="detalle_productos_entregados" class="display table table-striped table-xs dt-responsive nowrap w-100 my-2">
        <thead>
            <tr>
                <th class="align-middle">Imagen</th>
                <th class="align-middle">Código</th>
                <th class="align-middle">Tipo Producto</th>
                <th class="align-middle">Producto</th>
                <th class="align-middle">Cantidad</th>
                <th class="align-middle">Marca</th>
                <th class="align-middle">Cantidad Entregada</th>
                <th class="align-middle">Observaciones</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($productos_pedido))
                @foreach($productos_pedido as $det)
                <tr>
                    <td><img src="https://placehold.co/100x100" alt=""></td>
                    <td class="align-middle">{{ $det->codigo }}</td>
                    <td class="align-middle">{{ $det->tipo_producto }}</td>
                    <td class="align-middle">{{ $det->nombre_medicamento }}</td>
                    <td class="align-middle">{{ $det->cantidad }}</td>
                    <td class="align-middle">{{ $det->marca }}</td>
                    <td class="align-middle">{{ $det->cantidad_entregada }}</td>
                    <td class="align-middle">{{ $det->observaciones }}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#detalle_solicitud_pendiente').DataTable();
            $('#detalle_productos_entregados').DataTable();
        });

        function agregar_producto_carro(id) {
            var cantidad_entregada = $('#cantidad_entregada').val();
            var observaciones = $('#observaciones').val();

            var valido = 1;
            var mensaje = '';

            if (cantidad_entregada == '') {
                valido = 0;
                mensaje += '<li>Debe ingresar la cantidad entregada</li>';
            }
            if(observaciones == ''){
                valido = 0;
                mensaje += '<li>Debe ingresar las observaciones</li>';
            }

            if(valido == 0){
                swal({
                    title: 'Error',
                    icon: 'error',
                    content:{
                        element: 'div',
                        attributes:{
                            innerHTML: mensaje
                        }
                    }
                });
                return false;
            }

            $.ajax({
                url: "{{ route('bodegas.agregar_producto_carro') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                    "cantidad_entregada": cantidad_entregada,
                    "observaciones": observaciones
                },
                success: function(response) {
                     console.log(response);
                    $('#contenedor_solicitudes_bodega').html(response);
                }
            });
        }

    </script>
</div>



