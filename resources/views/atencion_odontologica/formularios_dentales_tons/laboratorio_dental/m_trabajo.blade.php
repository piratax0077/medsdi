 <div id="modal_orden_trabajo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_orden_trabajo"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header bg-info">
                 <h5 class="modal-title text-white text-center">Orden de trabajo menor</h5>
                 <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                         aria-hidden="true">×</span></button>
             </div>
             <div class="modal-body">
                 <form id="form_orden_trabajo_menor" action=""
                     method="post">

                     @csrf
                     <input type="hidden" name="ficha_id_trabajo_menor" id="ficha_id_trabajo_menor"
                         value="{{--   @if ($ficha != null) {{ $ficha->id }}@endif"--}}">
                     <input type="hidden" name="paciente_trabajo_menor" id="paciente_trabajo_menor"
                         value="">

                     <div class="form-row">

                         <div class="form-group col-sm-6 col-md-6">
                             <script>
                                 var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                     "Octubre", "Noviembre", "Diciembre");
                                 var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                 var f = new Date();
                                 document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                     .getFullYear());
                             </script>
                         </div>

                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label-activo-sm">N° Orden</label>
                             <!--correlativo-->
                             <input type="text" class="form-control form-control-sm" name="nro_orden_trabajo_menor"
                                 id="nro_orden_trabajo_menor" value="{{ $correlativo_otm }}" disabled>
                         </div>

                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label-activo-sm">Clinica/Dr./Dra</label>
                             <input type="text" class="form-control form-control-sm" name="clinica_doctor"
                                 id="clinica_doctor" value="{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}">
                         </div>
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label-activo-sm">Rut Profesional</label>
                             <input type="text" class="form-control form-control-sm" name="rut_profesional_trabajo_menor"
                                 id="rut_profesional_trabajo_menor" value="{{ $profesional->rut }}">
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label-activo-sm">Nombre Paciente</label>
                             <!--correlativo-->
                             <input type="text" class="form-control form-control-sm" name="nombre_paciente_trabajo_menor"
                                 id="nombre_paciente_trabajo_menor"
                                 value="{{ $paciente->nombre }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}"
                                 disabled>
                         </div>
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label-activo-sm">Rut Paciente</label>
                             <input type="text" class="form-control form-control-sm" name="rut_paciente_trabajo_menor"
                                 id="rut_paciente_trabajo_menor" value="{{ $paciente->rut }}" disabled>
                         </div>
                         <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Laboratorios</label>
                            <select name="lab_trabajo_menor" id="lab_trabajo_menor" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                @if(isset($laboratorios))
                                    @foreach ($laboratorios as $lab)
                                        <option value="{{ $lab->id }}">{{ $lab->nombre }}</option>
                                    @endforeach
                                @else
                                    <option value="1">Laboratorio1</option>
                                    <option value="2">Laboratorio2</option>
                                    <option value="3">Laboratorio3</option>
                                    <option value="4">Laboratorio4</option>
                                @endif

                            </select>
                        </div>
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label-activo-sm">Guia</label>
                             <input type="text" class="form-control form-control-sm" name="guia" id="guia">
                         </div>
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label-activo-sm">Color</label>
                             <input type="text" class="form-control form-control-sm" name="color" id="color">
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label-activo-sm">Urgencia</label>
                             <input type="text" class="form-control form-control-sm" name="urgencia" id="urgencia">
                         </div>
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label-activo-sm">Material</label>
                             <input type="text" class="form-control form-control-sm" name="material" id="material">
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label-activo-sm">Trabajo a realizar</label>
                             <input type="text" class="form-control form-control-sm" name="trabajo_realizar"
                                 id="trabajo_realizar">
                         </div>
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label-activo-sm">Comentarios</label>
                             <input type="" class="form-control form-control-sm" name="comentarios_trabajo_menor"
                                 id="comentarios_trabajo_menor">
                         </div>
                     </div>

                     <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" onclick="generar_pdf_trabajo_menor_dental()">Ver documento en PDF</button>
                         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                         <button type="button" class="btn btn-info" onclick="guardar_trabajo_menor_dental()">Guardar</button>
                     </div>
                 </form>
                 <table class="table table-responsive w-100" id="table_trabajos_menores_dental">
                    <thead>
                        <tr>
                            <th>N° Orden</th>
                            <th>Apellido</th>
                            <th>Guia</th>
                            <th>Color</th>
                            <th>Urgencia</th>
                            <th>Material</th>
                            <th>Trabajo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($ordenes_tm as $orden)
                             <tr>
                                <td>{{ $orden->nro_orden }}</td>
                                <td>{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}</td>
                                <td>{{ $orden->guia }}</td>
                                <td>{{ $orden->color }}</td>
                                <td>{{ $orden->urgencia }}</td>
                                <td>{{ $orden->material }}</td>
                                <td>{{ $orden->trabajo_realizar }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" onclick="solicitar_permisos()"><i class="fas fa-user"></i>Solicitar permisos</button>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="generar_pdf_trabajo_menor_dental()">Ver PDF</button>
                                    <button type="button" class="btn btn-sm btn-danger btn-icon" onclick="eliminar_trabajo_menor_dental({{ $orden->id }})"><i class="fas fa-trash"></i></button>
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
    function lab_dent_menor()
    {
        $('#modal_orden_trabajo').modal('show');
    }

    function guardar_trabajo_menor_dental(){

        let nro_orden_trabajo_menor = $('#nro_orden_trabajo_menor').val();
        let clinica_doctor = $('#clinica_doctor').val();
        let rut_profesional = $('#rut_profesional_trabajo_menor').val();
        let rut_paciente = $('#rut_paciente_trabajo_menor').val();
        let laboratorio = $('#lab_trabajo_menor').val();
        let nombre_paciente = $('#nombre_paciente_trabajo_menor').val();
        let guia = $('#guia').val();
        let color = $('#color').val();
        let urgencia = $('#urgencia').val();
        let material = $('#material').val();
        let trabajo_realizar = $('#trabajo_realizar').val();
        let comentarios_trabajo_menor = $('#comentarios_trabajo_menor').val();

        let valido = 1;
        let mensaje = '';

        if(nro_orden_trabajo_menor == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el número de orden de trabajo menor</li>';
        }
        if(clinica_doctor == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la clínica o el doctor</li>';
        }
        if(rut_profesional == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el rut del profesional</li>';
        }
        if(nombre_paciente == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el nombre del paciente</li>';
        }
        if(rut_paciente == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el rut del paciente</li>';
        }
        if(laboratorio == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar el laboratorio</li>';
        }
        if(guia == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la guía</li>';
        }
        if(color == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el color</li>';
        }
        if(urgencia == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la urgencia</li>';
        }
        if(material == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el material</li>';
        }
        if(trabajo_realizar == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el trabajo a realizar</li>';
        }
        if(comentarios_trabajo_menor == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar los comentarios</li>';
        }

        if(valido == 0){
            swal({
                title:'Error',
                content:{
                    element:'ul',
                    attributes:{
                        innerHTML:mensaje
                    }
                },
                icon:'error',

            });
            return false;
        }else{
            let data = {
                nro_orden_trabajo_menor: nro_orden_trabajo_menor,
                clinica_doctor: clinica_doctor,
                rut_profesional: rut_profesional,
                nombre_paciente: nombre_paciente,
                rut_paciente: rut_paciente,
                guia: guia,
                color: color,
                urgencia: urgencia,
                material: material,
                trabajo_realizar: trabajo_realizar,
                comentarios_trabajo_menor: comentarios_trabajo_menor,
                id_paciente: dame_id_paciente(),
                laboratorio: laboratorio,
                _token: CSRF_TOKEN
            }

            console.log(data);

            let url = "{{ route('dental.registrar_orden_trabajo_menor') }}";
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(response){
                    console.log(response);
                    if(response.mensaje == 'OK'){
                        swal({
                            title:'Orden de trabajo menor',
                            text:response.msj,
                            icon:'success'
                        });
                        $('#modal_orden_trabajo').modal('hide');
                        let ordenes_trabajo_menor = response.ordenes_trabajo_menor;
                        $('#table_trabajos_menores_dental').DataTable();

                        $('#table_trabajos_menores_dental').DataTable().destroy();
                        $('#table_trabajos_menores_dental tbody').empty();
                        ordenes_trabajo_menor.forEach(orden => {
                            $('#table_trabajos_menores_dental tbody').append(`
                                <tr>
                                    <td>${orden.nro_orden}</td>
                                    <td>${orden.paciente}</td>
                                    <td>${orden.guia}</td>
                                    <td>${orden.color}</td>
                                    <td>${orden.urgencia}</td>
                                    <td>${orden.material}</td>
                                    <td>${orden.trabajo_realizar}</td>
                                    <td>
                                                                            <button type="button" class="btn btn-sm btn-success" onclick="solicitar_permisos(${orden.id})"><i class="fas fa-user"></i>Solicitar permisos</button>
                                        <button type="button" class="btn btn-sm btn-primary" onclick="generar_pdf_trabajo_menor_dental()">Ver PDF</button>
                                        <button type="button" class="btn btn-sm btn-danger btn-icon" onclick="eliminar_trabajo_menor_dental(${orden.id})"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            `);
                        });
                        $('#table_trabajos_menores_dental').DataTable();
                        $('#contenedor_ordenes_trabajos_menores_dental').empty();
                        ordenes_trabajo_menor.forEach(orden => {
                            $('#contenedor_ordenes_trabajos_menores_dental').append(`
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-row">

                                            <div class="form-group col-md-2 fill">
                                                <label class="floating-label-activo-sm">Nombre Laboratorio</label>
                                                <input type="text" class="form-control form-control-sm" name="lab_nom" id="lab_nom" value="${orden.nombre_lab}">
                                            </div>
                                            <div class="form-group col-md-2 fill">
                                                <label class="floating-label-activo-sm">Trabajo Requerido</label>
                                                <input type="text" class="form-control form-control-sm" name="lab_ord_trab" id="lab_ord_trab" value="${orden.trabajo_realizar}">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label-activo-sm">F.envío</label>
                                                <input type="text" class="form-control form-control-sm" name="lab_fenv" id="lab_fenv" value="${orden.fecha_envio}">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label-activo-sm">F.entrega</label>
                                                <input type="text" class="form-control form-control-sm" name="lab_fent" id="lab_fent" value="${orden.fecha_entrega}">
                                            </div>
                                            <div class="form-group col-md-2 fill">
                                                <label class="floating-label-activo-sm">Estado</label>
                                                <input type="text" class="form-control form-control-sm" name="lab_est" id="lab_est" value="Pendiente">
                                            </div>
                                            <div class="form-group col-md-2 fill">
                                                <label class="floating-label-activo-sm">N° Identificación</label>
                                                <input type="text" class="form-control form-control-sm" name="lab_id_trab" id="lab_id_trab" value="${orden.nro_orden}">
                                            </div>
                                            <div class="form-group col-md-2 d-flex">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `);
                        });
                    }else{
                        swal({
                            title:'Error',
                            text:response.msj,
                            icon:'error'
                        });
                    }
                }
            })
        }


    }

    function generar_pdf_trabajo_menor_dental(){
        let nro_orden_trabajo_menor = $('#nro_orden_trabajo_menor').val();
        let clinica_doctor = $('#clinica_doctor').val();
        let rut_profesional = $('#rut_profesional_trabajo_menor').val();
        let nombre_paciente = $('#nombre_paciente_trabajo_menor_').val();
        let rut_paciente = $('#rut_paciente_trabajo_menor').val();
        let guia = $('#guia').val();
        let color = $('#color').val();
        let urgencia = $('#urgencia').val();
        let material = $('#material').val();
        let trabajo_realizar = $('#trabajo_realizar').val();
        let comentarios_trabajo_menor = $('#comentarios_trabajo_menor').val();

        let valido = 1;
        let mensaje = '';

        if(nro_orden_trabajo_menor == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el número de orden de trabajo menor</li>';
        }
        if(clinica_doctor == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la clínica o el doctor</li>';
        }
        if(rut_profesional == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el rut del profesional</li>';
        }
        if(nombre_paciente == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el nombre del paciente</li>';
        }
        if(rut_paciente == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el rut del paciente</li>';
        }
        if(guia == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la guía</li>';
        }
        if(color == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el color</li>';
        }
        if(urgencia == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la urgencia</li>';
        }
        if(material == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el material</li>';
        }
        if(trabajo_realizar == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el trabajo a realizar</li>';
        }
        if(comentarios_trabajo_menor == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar los comentarios</li>';
        }

        if(valido == 0){
            swal({
                title:'Error',
                content:{
                    element:'ul',
                    attributes:{
                        innerHTML:mensaje
                    }
                },
                icon:'error',

            });
            return false;
        }else{
            let data = {
                nro_orden_trabajo_menor: nro_orden_trabajo_menor,
                clinica_doctor: clinica_doctor,
                rut_profesional: rut_profesional,
                nombre_paciente: nombre_paciente,
                rut_paciente: rut_paciente,
                guia: guia,
                color: color,
                urgencia: urgencia,
                material: material,
                trabajo_realizar: trabajo_realizar,
                comentarios_trabajo_menor: comentarios_trabajo_menor,
                id_paciente: dame_id_paciente(),
                _token: CSRF_TOKEN
            }

            console.log(data);

            let url = "{{ route('dental.generar_pdf_trabajo_menor') }}";
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(data){
                    console.log(data);
                    if(data == 'error'){
                        swal({
                            title:'Error',
                            text:'Primero debe generar la liquidación.',
                            icon:'error',
                            button:"Aceptar"
                        });
                        return false;
                    }
                    if(data.ruta){
                        swal({
                            title: "Reporte generado",
                            text: "El reporte se ha generado correctamente",
                            icon: "success",
                            button: "Aceptar"
                        }).then(() => {
                            // Abrir el PDF en una ventana emergente
                            var width = 800;
                            var height = 600;
                            var left = (screen.width - width) / 2;
                            var top = (screen.height - height) / 2;
                            window.open(data.ruta, 'Presupuesto dental', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);
                        });
                    }else{
                        swal({
                            title: "Error",
                            text: "Ha ocurrido un error al generar el reporte",
                            icon: "error",
                            button: "Aceptar"
                        });
                    }
                }
            })
        }
    }

    function eliminar_trabajo_menor_dental(id){
        swal({
            title: "¿Está seguro de eliminar la orden de trabajo menor?",
            text: "Una vez eliminada no podrá recuperarla",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                confirmar_eliminar_trabajo_menor_dental(id);
            }
        })
    }

    function confirmar_eliminar_trabajo_menor_dental(id){
        let data = {
            id: id,
            id_paciente: dame_id_paciente(),
            _token: CSRF_TOKEN
        }
        let url = "{{ route('dental.eliminar_trabajo_menor') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(response){
                console.log(response);
                if(response.mensaje == 'OK'){
                    swal({
                        title:'Orden de trabajo menor',
                        text:response.msj,
                        icon:'success'
                    });
                    let ordenes_trabajo_menor = response.ordenes_trabajo_menor;
                    $('#table_trabajos_menores_dental').DataTable();

                    $('#table_trabajos_menores_dental').DataTable().destroy();
                    $('#table_trabajos_menores_dental tbody').empty();
                    ordenes_trabajo_menor.forEach(orden => {
                        $('#table_trabajos_menores_dental tbody').append(`
                            <tr>
                                <td>${orden.nro_orden}</td>
                                <td>${orden.paciente}</td>
                                <td>${orden.guia}</td>
                                <td>${orden.color}</td>
                                <td>${orden.urgencia}</td>
                                <td>${orden.material}</td>
                                <td>${orden.trabajo_realizar}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" onclick="solicitar_permisos()"><i class="fas fa-user"></i>Solicitar permisos</button>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="generar_pdf_trabajo_menor_dental()">Ver PDF</button>

                                    <button type="button" class="btn btn-sm btn-danger btn-icon" onclick="eliminar_trabajo_menor_dental(${orden.id})"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        `);
                    });
                    $('#table_trabajos_menores_dental').DataTable();
                    $('#contenedor_ordenes_trabajos_menores_dental').empty();
                        ordenes_trabajo_menor.forEach(orden => {
                            $('#contenedor_ordenes_trabajos_menores_dental').append(`
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-row">

                                            <div class="form-group col-md-2 fill">
                                                <label class="floating-label-activo-sm">Nombre Laboratorio</label>
                                                <input type="text" class="form-control form-control-sm" name="lab_nom" id="lab_nom" value="${orden.nombre_lab}">
                                            </div>
                                            <div class="form-group col-md-2 fill">
                                                <label class="floating-label-activo-sm">Trabajo Requerido</label>
                                                <input type="text" class="form-control form-control-sm" name="lab_ord_trab" id="lab_ord_trab" value="${orden.trabajo_realizar}">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label-activo-sm">F.envío</label>
                                                <input type="text" class="form-control form-control-sm" name="lab_fenv" id="lab_fenv" value="${orden.fecha_envio}">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label-activo-sm">F.entrega</label>
                                                <input type="text" class="form-control form-control-sm" name="lab_fent" id="lab_fent" value="${orden.fecha_entrega}">
                                            </div>
                                            <div class="form-group col-md-2 fill">
                                                <label class="floating-label-activo-sm">Estado</label>
                                                <input type="text" class="form-control form-control-sm" name="lab_est" id="lab_est" value="Pendiente">
                                            </div>
                                            <div class="form-group col-md-2 fill">
                                                <label class="floating-label-activo-sm">N° Identificación</label>
                                                <input type="text" class="form-control form-control-sm" name="lab_id_trab" id="lab_id_trab" value="${orden.nro_orden}">
                                            </div>
                                            <div class="form-group col-md-2 d-flex">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `);
                        });
                }else{
                    swal({
                        title:'Error',
                        text:response.msj,
                        icon:'error'
                    });
                }
            }
        })
    }

    function eliminar_trabajo_mayor_dental(id){
        swal({
            title: "¿Está seguro de eliminar la orden de trabajo mayor?",
            text: "Una vez eliminada no podrá recuperarla",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                confirmar_eliminar_trabajo_mayor_dental(id);
            }
        })
    }

    function confirmar_eliminar_trabajo_mayor_dental(id){
        let data = {
            id: id,
            id_paciente: dame_id_paciente(),
            _token: CSRF_TOKEN
        }
        let url = "{{ route('dental.eliminar_trabajo_mayor') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(response){
                console.log(response);
                if(response.mensaje == 'OK'){
                    swal({
                        title:'Orden de trabajo mayor',
                        text:response.msj,
                        icon:'success'
                    });
                    let ordenes_trabajo_mayor = response.ordenes_trabajo_mayor;
                    $('#table_trabajos_mayores_dental').DataTable();

                    $('#table_trabajos_mayores_dental').DataTable().destroy();
                    $('#table_trabajos_mayores_dental tbody').empty();
                    ordenes_trabajo_mayor.forEach(orden => {
                        $('#table_trabajos_mayores_dental tbody').append(`
                            <tr>
                                <td>${orden.nro_orden}</td>
                                <td>${orden.paciente}</td>
                                <td>${orden.guia}</td>
                                <td>${orden.color}</td>
                                <td>${orden.urgencia}</td>
                                <td>${orden.material}</td>
                                <td>${orden.trabajo_realizar}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" onclick="solicitar_permisos()"><i class="fas fa-user"></i>Solicitar permisos</button>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="generar_pdf_trabajo_menor_dental()">Ver PDF</button>

                                    <button type="button" class="btn btn-sm btn-danger btn-icon" onclick="eliminar_trabajo_menor_dental(${orden.id})"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        `);
                    });
                    $('#table_trabajos_mayores_dental').DataTable();
                    $('#contenedor_ordenes_trabajos_mayores_dental').empty();
                        ordenes_trabajo_mayor.forEach(orden => {
                            $('#contenedor_ordenes_trabajos_menores_dental').append(`
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-row">

                                            <div class="form-group col-md-2 fill">
                                                <label class="floating-label-activo-sm">Nombre Laboratorio</label>
                                                <input type="text" class="form-control form-control-sm" name="lab_nom" id="lab_nom" value="${orden.nombre_lab}">
                                            </div>
                                            <div class="form-group col-md-2 fill">
                                                <label class="floating-label-activo-sm">Trabajo Requerido</label>
                                                <input type="text" class="form-control form-control-sm" name="lab_ord_trab" id="lab_ord_trab" value="${orden.trabajo_realizar}">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label-activo-sm">F.envío</label>
                                                <input type="text" class="form-control form-control-sm" name="lab_fenv" id="lab_fenv" value="${orden.fecha_envio}">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label-activo-sm">F.entrega</label>
                                                <input type="text" class="form-control form-control-sm" name="lab_fent" id="lab_fent" value="${orden.fecha_entrega}">
                                            </div>
                                            <div class="form-group col-md-2 fill">
                                                <label class="floating-label-activo-sm">Estado</label>
                                                <input type="text" class="form-control form-control-sm" name="lab_est" id="lab_est" value="Pendiente">
                                            </div>
                                            <div class="form-group col-md-2 fill">
                                                <label class="floating-label-activo-sm">N° Identificación</label>
                                                <input type="text" class="form-control form-control-sm" name="lab_id_trab" id="lab_id_trab" value="${orden.nro_orden}">
                                            </div>
                                            <div class="form-group col-md-2 d-flex">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `);
                        });
                }else{
                    swal({
                        title:'Error',
                        text:response.msj,
                        icon:'error'
                    });
                }
            }
        })
    }

    function guardar_trabajo_mayor_dental(){
        let campos = [
        { id: '#nro_orden_trabajo_mayor', nombre: 'N° orden' },
        { id: '#id_profesional_fc', nombre: 'ID Profesional' },
        { id: '#id_paciente', nombre: 'ID Paciente' },
        { id: '#guia_trabajo_mayor', nombre: 'Guía' },
        { id: '#color_trabajo_mayor', nombre: 'Color' },
        { id: '#urgencia_trabajo_mayor', nombre: 'Urgencia' },
        { id: '#material_trabajo_mayor', nombre: 'Material' },
        { id: '#lab_trabajo_mayor', nombre: 'Laboratorio'},
        { id: '#trabajo_realizar_trabajo_mayor', nombre: 'Trabajo a realizar' },
        { id: '#comentarios_trabajo_mayor', nombre: 'Comentarios' },
        { id: '#marca_implante_trabajo_mayor', nombre: 'Marca implante' },
        { id: '#medida_implante_trabajo_mayor', nombre: 'Medida implante' },
        { id: '#nro_replicas_trabajo_mayor', nombre: 'N° Réplicas' },
        { id: '#nro_tornillos_trabajo_mayor', nombre: 'N° Tornillos' },
        { id: '#otros_trabajo_mayor', nombre: 'Otros' },
        { id: '#cubetas_trabajo_mayor', nombre: 'Cubetas' },
        { id: '#p_articulacion_trabajo_mayor', nombre: 'Prueba articulación' },
        { id: '#p_dientes_trabajo_mayor', nombre: 'Prueba dientes' },
        { id: '#p_metal_trabajo_mayor', nombre: 'Prueba metal' },
        { id: '#bizcocho_trabajo_mayor', nombre: 'Bizcocho' },
        { id: '#terminacion_trabajo_mayor', nombre: 'Terminación' },
        { id: '#compostura_trabajo_mayor', nombre: 'Compostura' }
    ];

    let valido = 1;
    let mensaje = '';
    let data = {};

    campos.forEach(campo => {
        let valor = $(campo.id).val().trim();
        if (valor === '') {
            valido = 0;
            mensaje += `<li>${campo.nombre}</li>`;
        } else {
            data[campo.clave] = valor;
        }
    });

    if (!valido) {
        swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
    } else {
        let data = {
            nro_orden_trabajo_mayor: $('#nro_orden_trabajo_mayor').val(),
            clinica_doctor_trabajo_mayor: $('#clinica_doctor_trabajo_mayor').val(),
            rut_profesional_trabajo_mayor: $('#rut_profesional_trabajo_mayor').val(),
            id_profesional: $('#id_profesional_fc').val(),
            paciente_trabajo_mayor: $('#id_paciente').val(),
            guia_trabajo_mayor: $('#guia_trabajo_mayor').val(),
            color_trabajo_mayor: $('#color_trabajo_mayor').val(),
            urgencia_trabajo_mayor: $('#urgencia_trabajo_mayor').val(),
            material_trabajo_mayor: $('#material_trabajo_mayor').val(),
            trabajo_realizar_trabajo_mayor: $('#trabajo_realizar_trabajo_mayor').val(),
            comentarios_trabajo_mayor: $('#comentarios_trabajo_mayor').val(),
            marca_implante_trabajo_mayor: $('#marca_implante_trabajo_mayor').val(),
            _medida_implantetrabajo_mayor: $('#medida_implante_trabajo_mayor').val(),
            nro_replicas_trabajo_mayor: $('#nro_replicas_trabajo_mayor').val(),
            nro_tornillos_trabajo_mayor: $('#nro_tornillos_trabajo_mayor').val(),
            otros_trabajo_mayor: $('#otros_trabajo_mayor').val(),
            cubetas_trabajo_mayor: $('#cubetas_trabajo_mayor').val(),
            p_articulacion_trabajo_mayor: $('#p_articulacion_trabajo_mayor').val(),
            p_dientes_trabajo_mayor: $('#p_dientes_trabajo_mayor').val(),
            p_metal_trabajo_mayor: $('#p_metal_trabajo_mayor').val(),
            bizcocho_trabajo_mayor: $('#bizcocho_trabajo_mayor').val(),
            terminacion_trabajo_mayor: $('#terminacion_trabajo_mayor').val(),
            compostura_trabajo_mayor: $('#compostura_trabajo_mayor').val(),
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_paciente: dame_id_paciente(),
            laboratorio: $('#lab_trabajo_mayor').val(),
            _token: CSRF_TOKEN
        }
       let url = "{{ ROUTE('dental.registrar_orden_trabajo_mayor') }}";
       $.ajax({
        type:'post',
        data: data,
        url: url,
        success: function(resp){
            console.log(resp);
            if(resp.estado == 1){
                swal({
                    title:'Exito',
                    text:resp.mensaje,
                    icon:'success'
                });
                let ordenes_trabajo_mayor = resp.ordenes_trabajo_mayor;
                $('#table_trabajos_mayores_dental').DataTable();

                $('#table_trabajos_mayores_dental').DataTable().destroy();
                $('#table_trabajos_mayores_dental tbody').empty();
                ordenes_trabajo_mayor.forEach(orden => {
                    $('#table_trabajos_mayores_dental tbody').append(`
                        <tr>
                            <td>${orden.nro_orden}</td>
                            <td>${orden.paciente}</td>
                            <td>${orden.guia}</td>
                            <td>${orden.color}</td>
                            <td>${orden.urgencia}</td>
                            <td>${orden.material}</td>
                            <td>${orden.trabajo_realizar}</td>
                            <td>
                                                                    <button type="button" class="btn btn-sm btn-success" onclick="solicitar_permisos(${orden.id})"><i class="fas fa-user"></i>Solicitar permisos</button>
                                <button type="button" class="btn btn-sm btn-primary" onclick="generar_pdf_trabajo_menor_dental()">Ver PDF</button>
                                <button type="button" class="btn btn-sm btn-danger btn-icon" onclick="eliminar_trabajo_menor_dental(${orden.id})"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    `);
                });
                $('#contenedor_ordenes_trabajos_mayores_dental').empty();
                ordenes_trabajo_mayor.forEach(orden => {
                    $('#contenedor_ordenes_trabajos_mayores_dental').append(`
                        <div class="card">
                            <div class="card-body">
                                <div class="form-row">

                                    <div class="form-group col-md-2 fill">
                                        <label class="floating-label-activo-sm">Nombre Laboratorio</label>
                                        <input type="text" class="form-control form-control-sm" name="lab_nom" id="lab_nom" value="${orden.nombre_lab}">
                                    </div>
                                    <div class="form-group col-md-2 fill">
                                        <label class="floating-label-activo-sm">Trabajo Requerido</label>
                                        <input type="text" class="form-control form-control-sm" name="lab_ord_trab" id="lab_ord_trab" value="${orden.trabajo_realizar}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">F.envío</label>
                                        <input type="text" class="form-control form-control-sm" name="lab_fenv" id="lab_fenv" value="${orden.fecha_envio}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">F.entrega</label>
                                        <input type="text" class="form-control form-control-sm" name="lab_fent" id="lab_fent" value="${orden.fecha_entrega}">
                                    </div>
                                    <div class="form-group col-md-2 fill">
                                        <label class="floating-label-activo-sm">Estado</label>
                                        <input type="text" class="form-control form-control-sm" name="lab_est" id="lab_est" value="Pendiente">
                                    </div>
                                    <div class="form-group col-md-2 fill">
                                        <label class="floating-label-activo-sm">N° Identificación</label>
                                        <input type="text" class="form-control form-control-sm" name="lab_id_trab" id="lab_id_trab" value="${orden.nro_orden}">
                                    </div>
                                    <div class="form-group col-md-2 d-flex">


                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                });
            }
        },
        error: function(error){
            console.log(error.responseText);
        }
       });
    }

    }
</script>
