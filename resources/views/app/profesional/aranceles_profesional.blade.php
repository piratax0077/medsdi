@extends('template.profesional.template')

@section('page-styles')
<style>
p {
    color: #59636d;
    word-wrap: break-word !important;
    font-size: 14px;
}
</style>
@endsection

@section('content')

<div class="pcoded-main-container">
	<div class="pcoded-content">
		<!--Header-->
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<h5 class="m-b-10">Configuracion trabajos y aranceles</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="{{ route('profesional.pacientes') }}" data-toggle="tooltip" data-placement="top" title="Volver a mis pacientes">Mis pacientes</a></li>
							<li class="breadcrumb-item"><a href="#">Configuracion trabajos y aranceles</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12 pb-4">
                                <div class="form-row m-2">
                                    <div class="col-md-6">
                                        <label class="form-control-active" for="valor_uco">UCO</label>
                                        <input type="number" name="valor_uco" id="valor_uco" class="form-control form-control-sm" placeholder="Ingrese el valor de la UCO">
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <button class="btn btn-outline-success btn-sm" type="button" onclick="recalcular_presupuestos()">Recalcular presupuestos</button>
                                    </div>

                                </div>
                                <table class="table-responsive" id="table_aranceles_dental" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Trabajo</th>
                                            <th>Arancel</th>
                                            <th>UCO</th>
                                            <th>Cantidad de bloques</th>
                                            <th>¿Tiene laboratorio?</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($trabajos as $t)
                                        <tr>
                                            <td>{{ $t->descripcion }}</td>
                                            <td>{{ number_format($t->valor, 0, ',', '.') }}</td>
                                            <td>{{ $t->uco }}</td>
                                            <td>{{ $t->cantidad_bloques }}</td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="{{ $t->id }}" id="existeLaboratorioDental{{ $t->id }}" onclick="guardarLaboratorioIndex({{ $t->id }})" @if($t->laboratorio == 1) checked @endif>
                                                    <label class="form-check-label" for="existeLaboratorioDental{{ $t->id }}">
                                                        ¿Laboratorio?
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-warning btn-sm" role="button" onclick="mostrar_prodecimiento({{ $t->id }})"><i class="fas fa-edit"></i> Editar</button>
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
							</div>
						</div>
                        <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalAgregarDiagnosticoDental" type="button">Agregar nuevo Diagnóstico/Trabajo</button>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalAgregarDiagnosticoDental" tabindex="-1" aria-labelledby="modalAgregarDiagnosticoDentalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAgregarDiagnosticoDentalLabel">Agregar nuevo procedimiento/trabajo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm" for="nombre_procedimiento_nuevo">Nombre del procedimiento</label>
                        <input type="text" name="nombre_procedimiento_nuevo" id="nombre_procedimiento_nuevo" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="floating-label-activo-sm" for="cantidad_uco">Cantidad UCO</label>
                        <input type="number" name="cantidad_uco" id="cantidad_uco" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="floating-label-activo-sm" for="cantidad_uco">Cantidad Bloques</label>
                        <input type="number" name="cantidad_bloques" id="cantidad_bloques" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="tiene_lab">
                            <label class="form-check-label" for="existeLaboratorioDental">
                                ¿Laboratorio?
                            </label>
                        </div>
                </div>
            </div>


            <button type="button" class="btn btn-success btn-sm w-100 my-3" onclick="agregar_otro_procedimiento()">Agregar otro diagnostico</button>
            <table class="table w-100" id="table_procedimientos_propios_dental">
                <thead>
                    <tr>
                        <th>Procedimiento</th>
                        <th>UCO</th>
                        <th>¿Laboratorio?</th>
                        <th>Bloques</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mis_trabajos_agregados as $mi_trabajo)
                        <tr>
                            <td>{{ $mi_trabajo->descripcion }}</td>
                            <td>{{ $mi_trabajo->uco }}</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $mi_trabajo->id }}" id="existeLaboratorioDental{{ $mi_trabajo->id }}" onclick="guardarLaboratorio({{ $mi_trabajo->id }})" @if($mi_trabajo->laboratorio == 1) checked @endif>
                                    <label class="form-check-label" for="existeLaboratorioDental{{ $mi_trabajo->id }}">
                                        ¿Laboratorio?
                                    </label>
                                </div>
                            </td>
                            <td>{{ $mi_trabajo->cantidad_bloques }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm" type="button" onclick="eliminar_procedimiento({{ $mi_trabajo->id }})">Eliminar</button>
                                <button class="btn btn-warning btn-sm" type="button" onclick="mostrar_prodecimiento({{ $mi_trabajo->id }})">Editar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('page-script')
    <script>
        function recalcular_presupuestos(){
            var valor_uco = $('#valor_uco').val();
            if(valor_uco == ''){
                swal({
                    title: 'Error',
                    text: 'Debe ingresar el valor de la UCO',
                    icon: 'error'
                });
                return;
            }


            // recorrer los checkbox y verificar cuales estan chequeados y cuales no
            var trabajos = [];
            var existeLaboratorio = [];
            $('#table_aranceles_dental tbody tr').each(function(){
                // multiplicar los valores de los trabajos por el valor de la UCO
                var trabajo = $(this).find('td').eq(0).text();
                var arancel = $(this).find('td').eq(1).text();

                var uco = $(this).find('td').eq(2).text();
                var nuevo_arancel = parseFloat(valor_uco) * parseFloat(uco);
                $(this).find('td').eq(1).text(parseFloat(nuevo_arancel * 1000).toLocaleString('es-CL'));
                var existeLaboratorioDental = $(this).find('input[type="checkbox"]').is(':checked');
                trabajos.push({
                    trabajo: trabajo,
                    arancel: arancel,
                    uco: uco
                });
                existeLaboratorio.push({
                    existeLaboratorioDental: existeLaboratorioDental
                });
            });


            console.log(trabajos);
            console.log(existeLaboratorio);
        }

        function agregar_otro_procedimiento() {
            var nombre_procedimiento_nuevo = $('#nombre_procedimiento_nuevo').val();
            var cantidad_uco = $('#cantidad_uco').val();
            var tiene_lab = $('#tiene_lab').is(':checked') ? 1 : 0;
            if (nombre_procedimiento_nuevo == '' || cantidad_uco == '') {
                swal({
                    title: 'Error',
                    text: 'Debe ingresar el nombre del procedimiento y la cantidad de UCO',
                    icon: 'error'
                });
                return;
            }

            let data = {
                nombre_procedimiento_nuevo: nombre_procedimiento_nuevo,
                cantidad_uco: cantidad_uco,
                tiene_lab: tiene_lab,
                _token: '{{ csrf_token() }}'
            }

            let url = "{{ route('profesional.agregar_procedimiento') }}";

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(response) {
                    console.log(response);

                    // Actualizar procedimientos propios
                    let procedimientos = response.procedimientos;
                    $('#table_procedimientos_propios_dental tbody').empty();
                    procedimientos.forEach(p => {
                        const isChecked_ = p.laboratorio === 1 ? 'checked' : '';
                        var html = '<tr>';
                        html += '<td>' + p.descripcion + '</td>';
                        html += '<td>' + p.uco + '</td>';
                        html += `<td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="${p.id}" id="existeLaboratorioDental${p.id}" onclick="guardarLaboratorio(${p.id})" onclick="guardarLaboratorio(${p.id})" ${isChecked_}>
                                        <label class="form-check-label" for="existeLaboratorioDental${p.id}">
                                            ¿Laboratorio?
                                        </label>
                                    </div>
                                </td>`;
                        html += '<td><button class="btn btn-danger btn-sm" type="button" onclick="eliminar_procedimiento(' + p.id + ')">Eliminar</button></td>';
                        html += '</tr>';
                        $('#table_procedimientos_propios_dental tbody').append(html);
                    });

                    // Actualizar la tabla DataTable
                    let trabajos = response.trabajos;
                    let table = $('#table_aranceles_dental').DataTable(); // Accede a la instancia de DataTable

                    // Limpia los datos de la tabla correctamente
                    table.clear();

                    // Agrega las nuevas filas
                    trabajos.forEach(trabajo => {
                        const isChecked = trabajo.laboratorio === 1 ? 'checked' : '';
                        table.row.add([
                            trabajo.descripcion,
                            trabajo.valor,
                            trabajo.uco,
                            `
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="existeLaboratorioDental${trabajo.id}" onclick="guardarLaboratorioIndex(${trabajo.id})" ${isChecked}>
                                <label class="form-check-label" for="existeLaboratorioDental${trabajo.id}" >
                                    ¿Laboratorio?
                                </label>
                            </div>
                            `
                        ]);
                    });

                    // Dibuja la tabla nuevamente
                    table.draw();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }


        function eliminar_procedimiento(id){
            swal({
                title:'Eliminar Procedimiento Dental',
                text:'¿Está seguro que desea eliminar el procedimiento dental?',
                icon:'warning',
                buttons:["Cancelar","Aceptar"],
                DangerMode: true,
            })
            .then((willDelete) => {
                if(willDelete){
                    confirmar_eliminar_procedimiento(id);
                }
            });
        }

        function confirmar_eliminar_procedimiento(id){
            console.log(id);
            let data = {
                id: id,
                _token: CSRF_TOKEN,
            }

            let url = '{{ ROUTE("profesional.eliminar_procedimiento") }}';

            $.ajax({
                type:'post',
                url: url,
                data: data,
                success: function(response){
                    console.log(response);

                    // Actualizar procedimientos propios
                    let procedimientos = response.procedimientos;
                    $('#table_procedimientos_propios_dental tbody').empty();
                    procedimientos.forEach(p => {
                        const isChecked_p = p.laboratorio == 1 ? 'checked' : '';
                        var html = '<tr>';
                        html += '<td>' + p.descripcion + '</td>';
                        html += '<td>' + p.uco + '</td>';
                        html += `<td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="${p.id}" id="existeLaboratorioDental${p.id}" onclick="guardarLaboratorio(${p.id})" ${isChecked_p}>
                                        <label class="form-check-label" for="existeLaboratorioDental${p.id}">
                                            ¿Laboratorio?
                                        </label>
                                    </div>
                                </td>`;
                        html += '<td><button class="btn btn-danger btn-sm" type="button" onclick="eliminar_procedimiento(' + p.id + ')">Eliminar</button></td>';
                        html += '</tr>';
                        $('#table_procedimientos_propios_dental tbody').append(html);
                    });

                    // Actualizar la tabla DataTable
                    let trabajos = response.trabajos;
                    let table = $('#table_aranceles_dental').DataTable(); // Accede a la instancia de DataTable

                    // Limpia los datos de la tabla correctamente
                    table.clear();

                    // Agrega las nuevas filas
                    trabajos.forEach(trabajo => {
                        const isChecked = trabajo.laboratorio === 1 ? 'checked' : '';
                        table.row.add([
                            trabajo.descripcion,
                            trabajo.valor,
                            trabajo.uco,
                            `
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="existeLaboratorioDental${trabajo.id}" onclick="guardarLaboratorioIndex(${trabajo.id})" ${isChecked}>
                                <label class="form-check-label" for="existeLaboratorioDental${trabajo.id}">
                                    ¿Laboratorio?
                                </label>
                            </div>
                            `
                        ]);
                    });

                    // Dibuja la tabla nuevamente
                    table.draw();
                },
                error: function(error){
                    console.log(error.responseText);
                }
            });
        }

        function mostrar_prodecimiento(id){
            console.log(id);
            let data = {
                id: id,
                _token: CSRF_TOKEN,
            }

            let url = '{{ ROUTE("profesional.mostrar_procedimiento") }}';

            $.ajax({
                type:'post',
                url: url,
                data: data,
                success: function(response){
                    console.log(response);
                    // abrir modal
                    $('#modalAgregarDiagnosticoDental').modal('show');
                    // llenar los campos del modal
                    $('#nombre_procedimiento_nuevo').val(response.procedimiento.descripcion);
                    $('#cantidad_uco').val(response.procedimiento.uco);
                    $('#cantidad_bloques').val(response.procedimiento.cantidad_bloques);
                    $('#tiene_lab').prop('checked', response.procedimiento.laboratorio == 1 ? true : false);

                },
                error: function(error){
                    console.log(error.responseText);
                }
            });
        }

        function guardarLaboratorio(trabajoId) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var existeLaboratorio = $('#existeLaboratorioDental' + trabajoId).is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('dental.guardarLaboratorio') }}", // Asegúrate de que esta ruta exista en tus rutas
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    trabajo_id: trabajoId,
                    existe_laboratorio: existeLaboratorio
                },
                success: function(response) {
                    console.log(response);
                    // Actualizar procedimientos propios
                    let procedimientos = response.procedimientos;
                    $('#table_procedimientos_propios_dental tbody').empty();
                    procedimientos.forEach(p => {
                        const isChecked_ = p.laboratorio === 1 ? 'checked' : '';
                        var html = '<tr>';
                        html += '<td>' + p.descripcion + '</td>';
                        html += '<td>' + p.uco + '</td>';
                        html += `<td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="${p.id}" id="existeLaboratorioDental${p.id}" onclick="guardarLaboratorio(${p.id})" ${isChecked_}>
                                        <label class="form-check-label" for="existeLaboratorioDental${p.id}">
                                            ¿Laboratorio?
                                        </label>
                                    </div>
                                </td>`;
                        html += '<td><button class="btn btn-danger btn-sm" type="button" onclick="eliminar_procedimiento(' + p.id + ')">Eliminar</button></td>';
                        html += '</tr>';
                        $('#table_procedimientos_propios_dental tbody').append(html);
                    });

                    // Actualizar la tabla DataTable
                    let trabajos = response.trabajos;
                    let table = $('#table_aranceles_dental').DataTable(); // Accede a la instancia de DataTable

                    // Limpia los datos de la tabla correctamente
                    table.clear();

                    // Agrega las nuevas filas
                    trabajos.forEach(trabajo => {
                        const isChecked = trabajo.laboratorio === 1 ? 'checked' : '';
                        table.row.add([
                            trabajo.descripcion,
                            trabajo.valor,
                            trabajo.uco,
                            `
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="existeLaboratorioDental${trabajo.id}" onclick="guardarLaboratorio(${trabajo.id})" ${isChecked}>
                                <label class="form-check-label" for="existeLaboratorioDental${trabajo.id}" >
                                    ¿Laboratorio?
                                </label>
                            </div>
                            `
                        ]);
                    });

                    // Dibuja la tabla nuevamente
                    table.draw();
                    // Maneja la respuesta del servidor aquí
                    alert('Estado del laboratorio guardado correctamente');
                },
                error: function(xhr, status, error) {
                    // Maneja los errores aquí
                    alert('Error al guardar el estado del laboratorio');
                }
            });
        }

        function guardarLaboratorioIndex(trabajoId){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var existeLaboratorio = $('#existeLaboratorioDental' + trabajoId).is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('dental.guardarLaboratorio') }}", // Asegúrate de que esta ruta exista en tus rutas
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    trabajo_id: trabajoId,
                    existe_laboratorio: existeLaboratorio
                },
                success: function(response) {
                    console.log(response);
                    // Actualizar procedimientos propios
                    let procedimientos = response.procedimientos;
                    $('#table_procedimientos_propios_dental tbody').empty();
                    procedimientos.forEach(p => {
                        const isChecked_ = p.laboratorio === 1 ? 'checked' : '';
                        var html = '<tr>';
                        html += '<td>' + p.descripcion + '</td>';
                        html += '<td>' + p.uco + '</td>';
                        html += `<td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="${p.id}" id="existeLaboratorioDental${p.id}" onclick="guardarLaboratorio(${p.id})" ${isChecked_}>
                                        <label class="form-check-label" for="existeLaboratorioDental${p.id}">
                                            ¿Laboratorio?
                                        </label>
                                    </div>
                                </td>`;
                        html += '<td><button class="btn btn-danger btn-sm" type="button" onclick="eliminar_procedimiento(' + p.id + ')">Eliminar</button></td>';
                        html += '</tr>';
                        $('#table_procedimientos_propios_dental tbody').append(html);
                    });
                    // Maneja la respuesta del servidor aquí
                    alert('Estado del laboratorio guardado correctamente');
                },
                error: function(xhr, status, error) {
                    // Maneja los errores aquí
                    alert('Error al guardar el estado del laboratorio');
                }
            });
        }
    </script>
@endsection
