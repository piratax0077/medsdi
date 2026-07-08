<!DOCTYPE html>
<html lang="es">

<head>

    @yield('head')

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('css/style_index.css') }}?t={{ time() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Links del REG-->
    <link rel="stylesheet" href="{{ asset('css/card_estilo.css') }}?t={{ time() }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}?t={{ time() }}">

    <link rel="stylesheet" href="{{ asset('css/boton-flotante.css') }}?t={{ time() }}">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput-typeahead.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav_azul_sm.css') }}?t={{ time() }}">
    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/responsive.bootstrap4.min.css') }}">
    <!-- fileupload-custom css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dropzone.min.css') }}?t={{ time() }}">

    <!--Accordion-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/accordion.css') }}?t={{ time() }}">

    <!--Card Sidebar-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/card_sidebar.css') }}?t={{ time() }}">

    <!--Pills Modals-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pills_modals.css') }}?t={{ time() }}">

    <!--Tab wizard_formularios-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tab_wizard_formularios.css') }}?t=<?= time() ?>">

    <!--Bs-Canvas-->
    <link rel="stylesheet" href="{{ asset('css/bs_canvas.css') }}?t={{ time() }}">

    <!-- fancy box -->
    <link rel="stylesheet" href="{{ asset('css/fancybox/fancybox.css') }}" />

    <!--Estilo tab secciones -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs-secciones.css') }}">

    <!--formulario sm-->
    <link rel="stylesheet" href="{{ asset('css/formulario_sm.css') }}">

    <!-- SERLECT2-->
    <link rel="stylesheet" href="{{ asset('css/plugins/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/plugins/dropzone/dropzone.css?t=1769808491') }}">

    <link rel="stylesheet" href="{{ asset('css/escritorios.css') }}">


    @yield('style')
    @yield('css-btn-autorizacion')

</head>

<body>

    @yield('header')

    @yield('menu')
@yield('modals-med-exa')
    @yield('Content')


    <!-- Modal de la vista -->
    @yield('Modals')

    {{-- @yield('Modals-med-exa-esp')
    @yield('modal-ficha-general-espc') --}}

    <!-- Modal de la vista fin -->

    <!-- Required Js -->
    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>


    <!-- datatable Js -->
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <!--Accordion-->
    <script src="{{ asset('js/accordion.js') }}?upd={{ random_int(1111, 9999) }}"></script>

    <!-- fancybox -->
    <script src="{{ asset('css/fancybox/fancybox.umd.js') }}"></script>

    <!--Form wizard-->
    <script src="{{ asset('js/plugins/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('js/formularios_wizard.js') }}?upd={{ random_int(1111, 9999) }}"></script>

    <!-- datepicker js -->
    <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('js/plugins/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/pages/ac-datepicker.js') }}"></script>
    <script src="{{ asset('js/bs_canvas.js') }}"></script>

    <!-- BoxEnAlerta -->
    {{-- <script src="{{ asset('js/boxEnAlerta.js') }}"></script> --}}

    <!--Validate RUt -->
    <script src="{{ asset('js/documentos.js') }}"></script>

    <!-- Revisar estados box -->

    {{-- <script src="{{ asset('js/estadosBox.js') }}"></script> --}}


    <!-- Gráficos -->

    <script src="{{ asset('js/plugins/jquery.barrating.min.js') }}"></script>

    <script src="{{ asset('js/plugins/apexcharts.min.js') }}"></script>

    <script src="{{ asset('js/plugins/jquery.peity.min.js') }}"></script>

    <!-- modales Js -->
    <script src="{{ asset('js/modals_atencion_medica.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Dropzone JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>

    <!-- mensajes -->
    <script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>

    {{-- autocomplete --}}
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- select2 Js -->
    <script src="{{ asset('js/plugins/select2.full.min.js') }}"></script>

    <!-- form-select-custom Js -->
    <script src="{{ asset('js/pages/form-select-custom.js') }}"></script>

    <!--Botón cards-->
    <script src="{{ asset('js/btn-cards.js') }}?upd={{ random_int(1111, 9999) }}"></script>

    <script src="{{ asset('js/modals_sidebar_esp.js') }}"></script>

    <script> var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); </script>
    {{--  <script>
        window.onload = function(){
            damePedidosAceptados();
            $('#entregas_turno').DataTable({
                responsive: true,
            });
        }
        function damePedidosAceptados(){
            // solicitud ajax de tipo get para obtener los pedidos aceptados
            $.ajax({
                url: "{{ route('recepcion.pedidos_aceptados') }}",
                type: 'GET',
                success: function(pedidos){
                    console.log(pedidos);
                    $('#lista_pedidos_listos').empty();
                    if(pedidos.length > 0){
                        let html = `
                        <img src="{{ asset('images/iconos_urg/truck.png') }}" alt="" style="width: 40px; font-size:12px;">
                                   <a href="{{ route('recepcion.pedidos') }}">Hay novedades con sus pedidos.</a>
                        `;

                        $('#lista_pedidos_listos').append(html);
                    }else{
                        $('#lista_pedidos_listos').append(`
                            <a href="#" class="dropdown-item">
                                <img src="{{ asset('images/iconos_urg/truck.png') }}" alt="" style="width: 40px;">
                                Sin notificaciones
                            </a>
                        `);
                    }
                }
            });
        }
    </script>  --}}
   @yield('js_inferior')
    @yield('page-script')
     @yield('page-script-ficha-atencion')
     @yield('js-ficha-general-espc') {{-- seccion js fiche general especialidad --}}
    @yield('page-script-med-exa')
    @yield('page-script-med-exa-esp')
	@yield('js-profesionales')
    @yield('js-lic')
    @yield('page-script-btn-autorizacion')

</body>

</html>
