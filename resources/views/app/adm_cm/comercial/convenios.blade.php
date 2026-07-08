@extends('template.adm_cm.template')
@section('content')
<!--****Container Completo****-->
<style>
    .select2-container--open{
        z-index: 9999999 !important;
    }
</style>
<!--Container Completo-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="font-weight-bolder">Mis Convenios</h5>
                        </div>
                        <ul class="breadcrumb mb-4">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Convenios</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h5 class="text-white font-weight-bolder">Convenios</h5>
                    <button class="btn btn-info btn-sm mx-2 has-ripple float-right" data-toggle="modal" data-target="#nuevoConvenioInstitucion"><i class="fa fa-plus" aria-hidden="true"></i>Registrar nuevo convenio</button>
                </div>
                <div class="card-body" id="card_body_convenios_institucion">
                    <table id="tabla_convenios_institucion" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-wrap text-center align-middle">Convenios</th>
                                <th class="text-center align-middle">Tipo Atención</th>
                                <th class="text-center align-middle">Porcentaje</th>
                                <th class="text-center align-middle">Valor</th>
                                <th class="text-center align-middle">Valor Garantía</th>
                                <th class="text-center align-middle">Copago Fonasa</th>
                                <th class="text-center align-middle">Bono Fonasa</th>
                                <th class="text-center align-middle">Lugar Atención</th>
                                <th class="text-center align-middle">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($convenios_institucion as $convenio)
                                <tr>
                                    <td class="align-middle text-center">
                                        @if(isset($convenio->convenios_array) && count($convenio->convenios_array) > 0)
                                            @foreach($convenio->convenios_array as $conv)
                                                <span class="badge badge-info mb-1">{{ $conv }}</span><br>
                                            @endforeach
                                        @else
                                            <span class="text-muted">Sin convenios</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">{{ $convenio->tipo_atencion }}</td>
                                    <td class="align-middle text-center">{{ $convenio->porcentaje }}%</td>
                                    <td class="align-middle text-center">${{ number_format($convenio->valor, 0, ',', '.') }}</td>
                                    <td class="align-middle text-center">
                                        @if($convenio->valor_garantia)
                                            ${{ number_format($convenio->valor_garantia, 0, ',', '.') }}
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        @if($convenio->valor_copago_fonasa)
                                            ${{ number_format($convenio->valor_copago_fonasa, 0, ',', '.') }}
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        @if($convenio->valor_bon_fonasa)
                                            ${{ number_format($convenio->valor_bon_fonasa, 0, ',', '.') }}
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        @if(isset($convenio->lugar_atencion_nombre))
                                            <span class="badge badge-success mb-1">{{ $convenio->lugar_atencion_nombre }}</span><br>
                                        @else
                                            <span class="text-muted">Sin lugares de atención</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <button class="btn btn-warning btn-sm has-ripple" onclick="dame_convenio({{ $convenio->id }})" data-toggle="modal" data-target="#editarConvenioInstitucion"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm has-ripple" onclick="eliminar_convenio({{ $convenio->id }})"><i class="fas fa-trash"></i> </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

    </div>
</div>
<!-- DATOS DE VITAL IMPORTANCIA -->
<input type="hidden" name="id_convenio_institucion" id="id_convenio_institucion" value="">
@endsection

@section('js-profesionales')
<script>
    $(document).ready(function() {
        $('#productos_convenio_').select2();
        $('#productos_convenio_edicion').select2();
        $('#productos_convenio_especial_editar').select2();
        $('#productos_convenio_especiales').select2();
    });

    function guardar_nuevo_convenio_institucion(){
        console.log('Guardar nuevo convenio especial');

        var nombre_convenio = $('#nombre_convenio_especiales').val();
        var tipo_convenio = $('#tipo_convenio_especiales').val();
        var porcentaje_dcto = $('#porcentaje_dcto_especiales').val();
        var tipo_convenio_institucion = $('#tipo_convenio_institucion_especiales').val();
        var fecha_inicial_pago_convenio = $('#fecha_inicial_pago_convenio_especiales').val();
        var fecha_final_pago_convenio = $('#fecha_final_pago_convenio_especiales').val();
        var productos_convenio = $('#productos_convenio_especiales').val();
        var observaciones_nuevo_convenio = $('#observaciones_nuevo_convenio_especiales').val();
        var id_lugar_atencion = "{{ $institucion->id_lugar_atencion }}"; // No se usa en especiales pero se envía para compatibilidad
        var id_empresa = $('#id_empresa').val() || 0;

        var valido = 1;
        var mensaje = '';

        if(nombre_convenio == ''){
            valido = 0;
            mensaje += '<li>Ingrese nombre de convenio</li>';
        }
        if(tipo_convenio == 0){
            valido = 0;
            mensaje += '<li>Seleccione tipo de convenio</li>';
        }
        if(porcentaje_dcto == ''){
            valido = 0;
            mensaje += '<li>Ingrese porcentaje de descuento</li>';
        }
        if(tipo_convenio_institucion == 0){
            valido = 0;
            mensaje += '<li>Seleccione tipo de convenio institución</li>';
        }
        if(fecha_inicial_pago_convenio == ''){
            valido = 0;
            mensaje += '<li>Seleccione fecha inicial</li>';
        }
        if(fecha_final_pago_convenio == ''){
            valido = 0;
            mensaje += '<li>Seleccione fecha final</li>';
        }
        if(productos_convenio == null){
            valido = 0;
            mensaje += '<li>Seleccione productos a convenir</li>';
        }

        if(valido == 0){
            swal({
                title: 'Error',
                content: {
                    element: 'div',
                    attributes: {
                        innerHTML: mensaje
                    }
                },
                icon: 'error'
            });
            return false;
        }

        // Preparar datos en el mismo formato que guardar_tipo_convenio_ffa
        var data = {
            nombre_convenio: nombre_convenio,
            tipo_convenio: tipo_convenio,
            id_lugar_atencion: id_lugar_atencion,
            porcentaje: porcentaje_dcto,
            fecha_inicio: fecha_inicial_pago_convenio,
            fecha_termino: fecha_final_pago_convenio,
            observaciones: observaciones_nuevo_convenio,
            convenios: 'Especial', // Identificador para convenios especiales
            conveniosSeleccionados: [],
            id_empresa: id_empresa,
            productos_convenio: productos_convenio,
            tipo_convenio_institucion: tipo_convenio_institucion,
            _token: "{{ csrf_token() }}"
        };

        console.log(data);

        $.ajax({
            url: "{{ ROUTE('profesional.guardar_tipo_convenio') }}",
            type: 'POST',
            data: data,
            success: function(response){
                console.log(response);
                if(response.estado == 1){
                    swal({
                        title: 'Convenio registrado',
                        text: response.mensaje,
                        icon: 'success'
                    });
                    $('#nuevoConvenioInstitucion').modal('hide');
                    location.reload();
                }else{
                    swal({
                        title: 'Error',
                        text: response.mensaje || 'Error al registrar convenio',
                        icon: 'error'
                    });
                }
            },
            error: function(xhr, status, error){
                console.error('Error:', error);
                swal({
                    title: 'Error',
                    text: 'Error al procesar la solicitud',
                    icon: 'error'
                });
            }
        });
    }

    function limpiar_formulario(){
        $('#nombre_convenio').val('');
        $('#tipo_convenio').val(0);
        $('#porcentaje_dcto').val('');
        $('#tipo_convenio_institucion').val(0);
        $('#fecha_inicial_pago_convenio').val('');
        $('#fecha_final_pago_convenio').val('');
        $('#rut_representante_convenio').val('');
        $('#nombre_representante_convenio').val('');
        $('#telefono_representante_convenio').val('');
        $('#email_representante_convenio').val('');
        $('#direccion_representante_convenio').val('');
        $('#observaciones_nuevo_convenio').val('');
        $('#productos_convenio_').val(null).trigger('change');
    }

    function formatoRut(rut)
    {
        var valor = rut.value.replace('.','');
        valor = valor.replace(/\-/g,'');

        cuerpo = valor.slice(0,-1);
        dv = valor.slice(-1).toUpperCase();
        rut.value = cuerpo + '-'+ dv

        if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

        suma = 0;
        multiplo = 2;

        for(i=1;i<=cuerpo.length;i++)
        {
            index = multiplo * valor.charAt(cuerpo.length - i);
            suma = suma + index;
            if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
        }

        dvEsperado = 11 - (suma % 11);
        dv = (dv == 'K')?10:dv;
        dv = (dv == 0)?11:dv;

        if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

        rut.setCustomValidity('');
    }

    function eliminar_convenio(id){
        swal({
            title: 'Eliminar convenio',
            text: '¿Está seguro de eliminar este convenio?',
            icon: 'warning',
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if(willDelete){
                confirmar_eliminar_convenio(id);
            }
        })
    }

    function confirmar_eliminar_convenio(id){
        $.ajax({
            url: "{{ ROUTE('adm_cm.eliminar_convenio') }}",
            type: 'POST',
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function(response){
                console.log(response);
                if(response.estado == 1){
                    swal({
                        title: 'Convenio eliminado',
                        text: response.msj,
                        icon: 'success'
                    })
                    .then(() => {
                        location.reload();
                    });
                    // $('#card_body_convenios_institucion').empty();
                    // $('#card_body_convenios_institucion').html(response.v);
                }else{
                    alert('Error al eliminar convenio');
                }
            }
        });
    }

    function dame_convenio(id){
        $.ajax({
            url: "{{ ROUTE('adm_cm.dame_convenio') }}",
            type: 'POST',
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function(response){
                $('#id_convenio_institucion').val(id);
                console.log(response);
                if(response.estado == 1){
                    // Mapeo de convenios institucionales a IDs de checkboxes
                    const convenioMap = {
                        'Particular': 1,
                        'Fonasa': 2,
                        'Todas las Isapres': 3,
                        'Banmédica': 4,
                        'Colmena': 5,
                        'Nueva Masvida': 6,
                        'Consalud': 7,
                        'Cruz Blanca': 8,
                        'Cruz del Norte': 9,
                        'Vida Tres': 10,
                        'Fundación': 11,
                        'Isalud': 12
                    };

                    // Mapeo de convenios FFAA a IDs de checkboxes
                    const convenioFFAAMap = {
                        'Ejército': 1,
                        'Armada': 2,
                        'Bomberos': 3,
                        'Fuerza Aérea': 4,
                        'Carabineros': 5,
                        'PDI': 6,
                        'Caja Los Andes': 7,
                        'Caja La Araucana': 8,
                        'Caja 18 de Septiembre': 9,
                        'Caja Los Héroes': 10
                    };

                    // Limpiar todos los checkboxes primero (Institucionales)
                    for (let i = 1; i <= 12; i++) {
                        $('#convenio_editar_' + i).prop('checked', false);
                    }

                    // Limpiar todos los checkboxes de FFAA
                    for (let i = 1; i <= 10; i++) {
                        $('#convenio_editar_ffa' + i).prop('checked', false);
                    }

                    // Llenar los campos de edición (Instituciones)
                    $('#tipo_atencion_editar').val(response.convenio.tipo_atencion || '');
                    $('#fecha_inicial_inst_edicion').val(response.convenio.fecha_inicio || '');
                    $('#fecha_final_inst_edicion').val(response.convenio.fecha_fin || '');
                    // Manejar el checkbox de convenio infinito para institucionales
                    if (response.convenio.fecha_fin) {
                        $('#convenio_infinito_inst_edicion').prop('checked', false);
                        $('#fecha_final_inst_edicion').prop('disabled', false);
                    } else {
                        $('#convenio_infinito_inst_edicion').prop('checked', true);
                        $('#fecha_final_inst_edicion').prop('disabled', true);
                    }
                    $('#valor_editar').val(response.convenio.valor || '');
                    $('#valor_garantia_editar').val(response.convenio.valor_garantia || '');
                    $('#porcentaje_editar').val(response.convenio.porcentaje || '');
                    $('#copago_fonasa_editar').val(response.convenio.valor_copago_fonasa || '');
                    $('#bono_fonasa_editar').val(response.convenio.valor_bon_fonasa || '');
                    $('#lugar_atencion_inst_edicion').val(response.convenio.id_lugar_atencion || '');
                    $('#nivel_fonasa_editar').val(response.convenio.nivel_fonasa || '');
                    $('#tpo_espera_editar').val(response.convenio.tpo_espera || '');
                    // Mostrar/ocultar campos Fonasa según si Fonasa está entre los convenios
                    var conveniosStr = (response.convenio.convenios || '').toLowerCase();
                    var esFonasa = conveniosStr.indexOf('fonasa') !== -1;
                    if (esFonasa) {
                        $('#col_nivel_fonasa_editar, #col_copago_fonasa_editar, #col_bono_fonasa_editar, #col_tpo_espera_fonasa_editar').removeClass('d-none');
                    } else {
                        $('#col_nivel_fonasa_editar, #col_copago_fonasa_editar, #col_bono_fonasa_editar, #col_tpo_espera_fonasa_editar').addClass('d-none');
                    }

                    // Llenar los campos de edición (FFAA) - mismos valores
                    $('#tipo_atencion_ffa_editar').val(response.convenio.tipo_atencion || '');
                    $('#valor_ffa_editar').val(response.convenio.valor || '');
                    $('#valor_garantia_ffa_editar').val(response.convenio.valor_garantia || '');
                    $('#fecha_inicial_ffa_edicion').val(response.convenio.fecha_inicio || '');
                    $('#fecha_final_ffa_edicion').val(response.convenio.fecha_fin || '');
                    // Manejar el checkbox de convenio infinito para FFAA
                    if (response.convenio.fecha_fin) {
                        $('#convenio_infinito_ffa_edicion').prop('checked', false);
                        $('#fecha_final_ffa_edicion').prop('disabled', false);
                    } else {
                        $('#convenio_infinito_ffa_edicion').prop('checked', true);
                        $('#fecha_final_ffa_edicion').prop('disabled', true);
                    }
                    $('#porcentaje_ffa_editar').val(response.convenio.porcentaje || '');
                    $('#copago_fonasa_ffa_editar').val(response.convenio.valor_copago_fonasa || '');
                    $('#bono_fonasa_ffa_editar').val(response.convenio.valor_bon_fonasa || '');
                    $('#lugar_atencion_ffa_edicion').val(response.convenio.id_lugar_atencion || '');

                    // Verificar si es un convenio especial
                    var esConvenioEspecial = false;
                    if (response.convenio.convenios) {
                        const conveniosTrimmed = response.convenio.convenios.trim().replace(/,/g, '').toLowerCase();
                        if (conveniosTrimmed === 'especial' || conveniosTrimmed === 'especialidad') {
                            esConvenioEspecial = true;
                        }
                    }

                    if (esConvenioEspecial) {
                        // Llenar campos de convenio especial
                        $('#nombre_convenio_especial_editar').val(response.convenio.nombre_convenio || response.convenio.tipo_atencion || '');
                        $('#tipo_convenio_especial_edicion').val(response.convenio.tipo_convenio || '0');
                        $('#porcentaje_dcto_especial_edicion').val(response.convenio.porcentaje || '');
                        $('#tipo_convenio_institucion_especial_edicion').val(response.convenio.tipo_convenio_institucion || '0');
                        $('#fecha_inicial_especial_edicion').val(response.convenio.fecha_inicio || '');
                        $('#fecha_final_especial_edicion').val(response.convenio.fecha_fin || '');
                        $('#observaciones_especial_edicion').val(response.convenio.observaciones || '');

                        // Manejar el checkbox de convenio infinito
                        if (response.convenio.fecha_fin) {
                            $('#convenio_infinito_especial_edicion').prop('checked', false);
                            $('#fecha_final_especial_edicion').prop('disabled', false);
                        } else {
                            $('#convenio_infinito_especial_edicion').prop('checked', true);
                            $('#fecha_final_especial_edicion').prop('disabled', true);
                        }

                        // Manejar productos si están disponibles
                        if (response.convenio.productos_convenio) {
                            let productos = [];
                            if (typeof response.convenio.productos_convenio === 'string') {
                                try {
                                    productos = JSON.parse(response.convenio.productos_convenio);
                                } catch(e) {
                                    productos = response.convenio.productos_convenio.split(',').map(p => p.trim());
                                }
                            } else if (Array.isArray(response.convenio.productos_convenio)) {
                                productos = response.convenio.productos_convenio;
                            }
                            $('#productos_convenio_especial_editar').val(productos).trigger('change');
                        }

                        // Cambiar a la pestaña de Especiales
                        $('#pills-especiales-edicion-tab').tab('show');
                    } else {
                        // Procesar convenios institucionales o FFAA
                        if (response.convenio.convenios) {
                            console.log('Convenios string original:', response.convenio.convenios);

                            // Dividir convenios por coma y limpiar saltos de línea, espacios y caracteres especiales
                            const conveniosArray = response.convenio.convenios.split(',')
                                .map(c => c.replace(/\n/g, ' ')           // Reemplazar saltos de línea por espacios
                                           .replace(/\s+/g, ' ')          // Reemplazar múltiples espacios por uno solo
                                           .trim())                       // Eliminar espacios al inicio y final
                                .filter(c => c.length > 0);               // Filtrar strings vacíos

                            console.log('Convenios array limpio:', conveniosArray);

                            let tieneConveniosInst = false;
                            let tieneConveniosFFAA = false;

                            // Marcar checkboxes correspondientes
                            conveniosArray.forEach(convenio => {
                                // Intentar primero con convenios institucionales
                                const convenioId = convenioMap[convenio];
                                if (convenioId) {
                                    console.log('Marcando convenio institucional:', convenio, 'ID:', convenioId);
                                    $('#convenio_editar_' + convenioId).prop('checked', true);
                                    tieneConveniosInst = true;
                                } else {
                                    // Si no es institucional, intentar con FFAA
                                    const convenioFFAAId = convenioFFAAMap[convenio];
                                    if (convenioFFAAId) {
                                        console.log('Marcando convenio FFAA:', convenio, 'ID:', convenioFFAAId);
                                        $('#convenio_editar_ffa' + convenioFFAAId).prop('checked', true);
                                        tieneConveniosFFAA = true;
                                    } else {
                                        console.log('Convenio no encontrado en mapas:', convenio);
                                    }
                                }
                            });

                            // Cambiar a la pestaña correspondiente según el tipo de convenios
                            if (tieneConveniosFFAA) {
                                $('#pills-ffaa-edicion-tab').tab('show');
                            } else if (tieneConveniosInst) {
                                $('#pills-instituciones-edicion-tab').tab('show');
                            }
                        }
                    }
                }else{
                    alert('Error al cargar convenio');
                }
            }
        });
    }
</script>
@endsection

@section('modales')
    @include('app.adm_cm.modal_adm.convenio_usuario')
    @include('app.adm_cm.modal_adm.convenio_institucion_nuevo')
    @include('app.adm_cm.modal_adm.convenio_nuevo')
    @include('app.adm_cm.modal_adm.convenio_editar')
@endsection
