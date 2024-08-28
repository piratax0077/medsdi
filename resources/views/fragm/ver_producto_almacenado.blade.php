<div class="row">
    <div class="col-md-4">
        <table class="table">
            <tr>
                <td><strong>Imagen:</strong></td>
                <td>
                    <img src="{{ '/storage'.'/'.$producto->image_path }}" alt="" class="w-100">
                </td>
            </tr>
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
                <td><strong>Tipo Producto:</strong></td>
                <td>{{ $producto->tipo_producto }}</td>
            </tr>
            <tr>
                <td><strong>Ubicacion:</strong></td>
                <td>{{ $producto->bodega }}</td>
            </tr>
            <tr>
                <td><strong>Stock:</strong></td>
                <td>{{ $producto->stock_actual }}</td>
            </tr>
            <tr>
                <td><strong>Temperatura:</strong></td>
                <td>
                    <input type="number" id="temperatura_producto" class="form-control form-control-sm" placeholder="{{ $producto->temperatura }}">
                </td>
            </tr>

            <tr>
                <td><strong>Observaciones:</strong></td>
                <td>
                    <textarea class="form-control form-control-sm" id="observaciones_producto" rows="3"></textarea>
                </td>
            </tr>
        </table>
        <button class="btn btn-outline-success btn-sm my-2 w-100" onclick="editar_repuesto_almacenado({{ $producto->id }})"><i class="fas fa-save"></i> Guardar</button>
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

    function editar_repuesto_almacenado(id){
        var temperatura = $('#temperatura_producto').val();
        var observaciones = $('#observaciones_producto').val();

        var valido = 1;
        var mensaje = '';

        if(temperatura == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la temperatura del producto</li>';
        }
        if(observaciones == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar las observaciones del producto</li>';
        }

        if(valido == 0){
            swal({
                title: 'Error',
                content:{
                    element: 'div',
                    attributes:{
                        innerHTML: mensaje
                    }
                },
                icon: 'error'
            });
            return false;
        }

        $.ajax({
            url: "{{ ROUTE('bodegas.editar_repuesto_almacenado') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "temperatura": temperatura,
                "observaciones": observaciones
            },
            success: function(response){
                return console.log(response);
                if(response == 1){
                    alert('Producto actualizado correctamente');
                }else{
                    alert('Error al actualizar el producto');
                }
            }
        });
    }
</script>
