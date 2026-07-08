<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SDI | Contabilidad</title>
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="SDI | Contabilidad" />

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- Estilos base -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?t={{ time() }}" />
    <link rel="stylesheet" href="{{ asset('css/escritorio_asistente.css') }}?t={{ time() }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav_azul_sm.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/formularios.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/pills_modals.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/estilos_atencion_medica.css') }}"/>

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('css/plugins/ekko-lightbox.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/plugins/lightbox.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/plugins/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/plugins/responsive.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/fancybox/fancybox.css') }}" />

    <!-- FullCalendar CSS -->
    <link rel='stylesheet' href='{{ asset('js/fullcalendar-5.10.1/lib/main.css') }}'/>

    @yield('page-styles')
    @yield('style')

    <style>
        #loading {
            display: none;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        #calendar {
            max-width: 900px;
            {{--  margin: 40px auto;  --}}
        }

        /* kill the scrollbars and allow natural height */
        .fc-scroller,
        .fc-day-grid-container,
        /* these divs might be assigned height, which we need to cleared */
        .fc-time-grid-container {
            /* */
            overflow-x: hidden;
            overflow-y: auto !important;
            height: auto !important;
        }

        /* kill the horizontal border/padding used to compensate for scrollbars */
        .fc-row {
            border: 0 !important;
            margin: 0 !important;
        }

        .fc .fc-timegrid-slot {
            height: 3.5em;
        }

        /* Ajustes para sidebar y header */
        .pcoded-header {
            position: fixed;
            top: 0;
            left: 250px;
            right: 0;
            z-index: 4;
            display: flex;
            align-items: center;
            padding: 0 20px;
            min-height: 70px;
        }

        .pcoded-header .m-header {
            display: none; /* Ocultar en desktop */
        }

        .pcoded-header .header-breadcrumb {
            flex: 1;
            padding: 0 20px;
        }

        .header-breadcrumb .page-header-title h5 {
            color: white;
            margin: 0 0 5px 0;
            font-size: 18px;
            font-weight: 600;
        }

        .header-breadcrumb .breadcrumb {
            background: transparent;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .header-breadcrumb .breadcrumb-item,
        .header-breadcrumb .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.85);
            font-size: 13px;
        }

        .header-breadcrumb .breadcrumb-item a:hover {
            color: white;
            text-decoration: none;
        }

        .header-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
            color: rgba(255, 255, 255, 0.5);
        }

        .pcoded-header .navbar-collapse {
            flex: 0 0 auto;
            display: flex !important; /* Forzar display en desktop */
        }

        /* Estilos para el logo en el sidebar */
        .sidebar .brand {
            text-align: center;
            padding: 15px 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 15px;
        }

        .sidebar .brand img {
            max-width: 90%;
            height: auto;
            filter: brightness(0) invert(1);
        }

        .sidebar .brand-text {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px 20px;
        }

        .sidebar .brand-text .brand-mark {
            width: 43px;
            height: 43px;
            border-radius: 13px;
            display: grid;
            place-items: center;
            font-weight: 800;
            background: #43b9ce;
            flex-shrink: 0;
        }

        .sidebar .brand-text strong,
        .sidebar .brand-text small {
            display: block;
        }

        .sidebar .brand-text small {
            color: #9cb5c5;
            margin-top: 3px;
        }

        /* Lugar actual header */
        .sidebar .lugar-actual-header {
            background: linear-gradient(135deg, rgba(67, 185, 206, 0.15) 0%, rgba(45, 95, 141, 0.1) 100%);
            border-left: 3px solid #43b9ce;
            padding: 12px 15px;
            margin: 0 10px 20px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar .lugar-actual-header .lugar-icon {
            width: 36px;
            height: 36px;
            background: #43b9ce;
            border-radius: 8px;
            display: grid;
            place-items: center;
            color: white;
            flex-shrink: 0;
        }

        .sidebar .lugar-actual-header .lugar-icon i {
            font-size: 18px;
        }

        .sidebar .lugar-actual-header .lugar-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
            overflow: hidden;
        }

        .sidebar .lugar-actual-header .lugar-info small {
            font-size: 10px;
            color: #43b9ce;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .sidebar .lugar-actual-header .lugar-info strong {
            font-size: 13px;
            color: #ffffff;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Main content con margen para el sidebar */
        main {
            margin-left: 0 !important;
        }

        .pcoded-main-container {
            margin-left: 250px !important;
        }

        .pcoded-content {
            padding-top: 20px;
        }

        .sidebar {
            z-index: 5;
        }

        body {
            padding-top: 70px; /* Altura del header */
        }

        @media (max-width: 991px) {
            .pcoded-header {
                left: 0;
            }

            .pcoded-header .m-header {
                display: block;
            }

            .pcoded-main-container {
                margin-left: 0 !important;
            }
        }
    </style>
</head>
<body>

    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill">
            </div>
        </div>
    </div>
    {{--  @include('template.asistente_cm.menu')  --}}
    @include('template.contabilidad.menu')
    @include('template.contabilidad.header')

    @yield('content')
    @yield('modales')

    {{--  <footer>  --}}
        {{--  @include('template.include.footer')  --}}
    {{--  </footer>  --}}

    @include('template.include.nocomplatible')

    <!-- ============================================ -->
    <!-- JAVASCRIPT - ORDEN CORRECTO DE CARGA -->
    <!-- ============================================ -->

    <!-- 1. jQuery PRIMERO (requerido por todos los demás) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- 2. jQuery UI (depende de jQuery) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- 3. Bootstrap y Popper (dependen de jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- 4. Vendor y plugins base -->
    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>

    <!-- 5. Moment.js (requerido por FullCalendar y otros) -->
    <script src="{{ asset('js/moment.min.js') }}"></script>

    <!-- 6. DataTables (depende de jQuery) -->
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/pages/data-basic-custom.js') }}"></script>

    <!-- 7. Select2 (depende de jQuery) -->
    <script src="{{ asset('js/plugins/select2.full.min.js') }}"></script>

    <!-- 8. Validación (depende de jQuery) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <!-- 9. SweetAlert (alertas) -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- 10. Lightbox y Fancybox -->
    <script src="{{ asset('js/plugins/ekko-lightbox.min.js') }}"></script>
    <script src="{{ asset('js/plugins/lightbox.min.js') }}"></script>
    <script src="{{ asset('js/pages/ac-lightbox.js') }}"></script>
    <script src="{{ asset('css/fancybox/fancybox.umd.js') }}"></script>

    <!-- 11. FullCalendar -->
    <script src='{{ asset('js/fullcalendar-5.10.1/lib/main.js') }}'></script>
    <script src='{{ asset('js/fullcalendar-5.10.1/lib/locales/es.js') }}'></script>

    <!-- 12. Utilidades -->
    <script src="{{ asset('js/rut.js') }}"></script>

    <!-- 13. Scripts personalizados -->
    <script src="{{ asset('js/toggle_asistentes.js') }}"></script>
    <script src="{{ asset('js/tablas_asistentes.js') }}"></script>
    <script src="{{ asset('js/tablas_admin_cm.js') }}"></script>


    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var info_profesional_seleccionado = [];

        $(document).ready(function()
        {
            $('.loader-bg').hide();

            {{--  Tablas rendir caja  --}}
            $('#tabla_rendir_caja').DataTable({
                responsive: true,
            });

            $(".cerrar_modal_info_profesional").click(function() {
                $("#info_profesional").modal('hide');
            });

        });
        {{--  VER DETALLE PROFESIONAL  --}}
        function info_profesional(id)
        {
            let id_profesional = id;

            let url = "{{ route('agenda.buscar_informacion_profesional') }}";

            $.ajax({
                url: url,
                type: "get",
                data: {
                    id_profesional: id_profesional,
                }
            })
            .done(function(data) {
                if (data.estado == 1)
                {

                    console.log(data);
                    var rut = '';
                    var lugares_atencion = '';
                    var telefono = '';
                    var email = '';

                    rut = data.profesional.rut;
                    telefono = data.profesional.telefono_uno;
                    email = data.profesional.email;

                    $.each(data.lugares_atencion, function( index, lugar_at ) {
                        lugares_atencion += '<li>';
                        lugares_atencion += '  <strong>'+lugar_at.nombre+':</strong> ' +lugar_at.direccion_texto +'<br>';
                        lugares_atencion += '  <strong>Tipo : </strong> ' +lugar_at.tipo_texto +'<br>';
                        lugares_atencion += '  <strong>Telefono:</strong> ' +lugar_at.telefono +'<br>';
                        lugares_atencion += '  <strong>Convenios:</strong> ' +lugar_at.convenios +'<br>';
                        lugares_atencion += '</li><hr>';
                    });

                    $('#info_profesional_rut').html(rut);
                    $('#info_profesional_lugares_atencion').html(lugares_atencion);
                    $('#info_profesional_telefono').html('<li>'+telefono+'</li>');
                    $('#info_profesional_email').html('<li>'+email+'</li>');
                    $('#info_profesional').modal('show');
                }
                else
                {
                    swal({
                        title: "Informacion del Profesional no encontrada",
                        icon: "error",
                        buttons: "Aceptar",
                        // DangerMode: true,
                    })
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
    </script>
    <script>
        /** METODO PARA ENVIO DE INDICACIONES MEDICAS PDF */
        function  envio_indicaciones_pdf(id_modal){
            let url = "{{ route('indicacion.medica.registro.envio') }}";
            var id_tipo_documento = 1;
            var id_paciente = $('#id_paciente_fc').val();
            var id_profesional = $('#id_profesional_fc').val();
            var id_ficha_atencion = $('#id_fc').val();
            var id_lugar_atencion = $('#id_lugar_atencion').val();
            var observacion = '';
            // var observacion = $('#observacion').val();
            var documento = '';
            var url_documento = '';
            var cuerpo = '';
            var otro = '';
            var token = CSRF_TOKEN;

            if(id_tipo_documento == 1)
            {
                documento = $('#'+id_modal+' embed').attr('data-documento');
                url_documento = $('#'+id_modal+' embed').attr('data-url');
            }
            else
            {
                // cuerpo = $('#cuerpo').val();
            }
            var datos = {};
            datos._token = token;
            datos.id_tipo_documento = id_tipo_documento;
            datos.id_paciente = id_paciente;
            datos.id_profesional = id_profesional;
            datos.id_ficha_atencion = id_ficha_atencion;
            datos.id_lugar_atencion = id_lugar_atencion;
            datos.observacion = observacion;
            datos.documento = documento;
            datos.url = url_documento;
            datos.cuerpo = cuerpo;
            datos.otro = otro;

            $.ajax({
                url: url,
                type: 'post',
                dataType: "json",
                data: datos,
                success: function(data) {
                    // console.log(data);
                    if(data.estado == 1)
                    {
                        var mensaje = '';
                        mensaje = 'Documento asignado al Paciente para visualizar en su escritorio.\n';
                        if(data.update_correo.estado == 1)
                            mensaje = 'Documento enviado por correo al Paciente.\n';
                        else
                            mensaje = 'Problema al enviar Documento por correo al Paciente.\n';

                        swal({
                            title: "Indicación Enviada al Paciente",
                            text: mensaje,
                            icon: "success",
                        });
                    }
                    else
                    {
                        var texto_error = '';

                        if(data.estado ==  0)
                        {
                            if('error' in data)
                            {
                                $.each(data.error, function (indexInArray, valueOfElement) {
                                    texto_error += indexInArray+': '+valueOfElement+'\n';
                                });
                            }
                        }
                        swal({
                            title: "Indicación Enviada al Paciente",
                            text: data.msj+'\n'+texto_error,
                            icon: "warning",
                        });
                    }
                }
            });
        }
        /** FIN METODO PARA ENVIO DE INDICACIONES MEDICAS PDF */
    </script>
    @yield('page-script')
</body>
</html>
