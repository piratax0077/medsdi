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
                             <label class="floating-label">N° Orden</label>
                             <!--correlativo-->
                             <input type="text" class="form-control form-control-sm" name="nro_orden_trabajo_menor"
                                 id="nro_orden_trabajo_menor" value="{{ $correlativo_otm }}" disabled>
                         </div>

                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label">Clinica/Dr./Dra</label>
                             <input type="text" class="form-control form-control-sm" name="clinica_doctor"
                                 id="clinica_doctor" value="{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}">
                         </div>
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label">Rut Profesional</label>
                             <input type="text" class="form-control form-control-sm" name="rut_profesional_trabajo_menor"
                                 id="rut_profesional_trabajo_menor" value="{{ $profesional->rut }}">
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label">Nombre Paciente</label>
                             <!--correlativo-->
                             <input type="text" class="form-control form-control-sm" name="paciente_trabajo_menor_"
                                 id="paciente_trabajo_menor_"
                                 value="{{ $paciente->nombre }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}"
                                 disabled>
                         </div>
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label-activo-sm">Rut Paciente</label>
                             <input type="text" class="form-control form-control-sm" name="paciente_trabajo_mayor"
                                 id="paciente_trabajo_mayor" value="{{ $paciente->rut }}" disabled>
                         </div>
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label">Guia</label>
                             <input type="text" class="form-control form-control-sm" name="guia" id="guia">
                         </div>
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label">Color</label>
                             <input type="text" class="form-control form-control-sm" name="color" id="color">
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label">Urgencia</label>
                             <input type="text" class="form-control form-control-sm" name="urgencia" id="urgencia">
                         </div>
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label">Material</label>
                             <input type="text" class="form-control form-control-sm" name="material" id="material">
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label">Trabajo a realizar</label>
                             <input type="text" class="form-control form-control-sm" name="trabajo_realizar"
                                 id="trabajo_realizar">
                         </div>
                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label">Comentarios</label>
                             <input type="" class="form-control form-control-sm" name="comentarios_trabajo_menor"
                                 id="comentarios_trabajo_menor">
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="col-sm-12 col-md-12 text-center">
                             <!--<p class="mb-2">Saluda atentamente</p>-->
                             <button type="button" class="btn btn-sm btn-primary" onclick="generar_pdf_trabajo_menor_dental()">Ver documento en PDF</button>
                         </div>
                     </div>
                     <div class="modal-footer">
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
        let paciente_trabajo_menor = $('#paciente_trabajo_menor_').val();
        let paciente_trabajo_mayor = $('#paciente_trabajo_mayor').val();
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
        if(paciente_trabajo_menor == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el nombre del paciente</li>';
        }
        if(paciente_trabajo_mayor == ''){
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
                paciente_trabajo_menor: paciente_trabajo_menor,
                paciente_trabajo_mayor: paciente_trabajo_mayor,
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
                        let ordenes_trabajo = response.ordenes_trabajo;
                        $('#table_trabajos_menores_dental').DataTable();

                        $('#table_trabajos_menores_dental').DataTable().destroy();
                        $('#table_trabajos_menores_dental tbody').empty();
                        ordenes_trabajo.forEach(orden => {
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
        let paciente_trabajo_menor = $('#paciente_trabajo_menor_').val();
        let paciente_trabajo_mayor = $('#paciente_trabajo_mayor').val();
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
        if(paciente_trabajo_menor == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el nombre del paciente</li>';
        }
        if(paciente_trabajo_mayor == ''){
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
                paciente_trabajo_menor: paciente_trabajo_menor,
                paciente_trabajo_mayor: paciente_trabajo_mayor,
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
                    let ordenes_trabajo = response.ordenes_trabajo;
                    $('#table_trabajos_menores_dental').DataTable();

                    $('#table_trabajos_menores_dental').DataTable().destroy();
                    $('#table_trabajos_menores_dental tbody').empty();
                    ordenes_trabajo.forEach(orden => {
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
</script>
