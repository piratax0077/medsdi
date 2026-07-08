@extends('template.paciente.template')
@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Mis recetas</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.receta') }}" data-toggle="tooltip" data-placement="top" title="Volver a inicio de receta online">Receta Online</a></li>
                                <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.receta.receta') }}">Mis recetas</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-c-blue f-20 d-inline ml-4 my-1 py-1">Mis recetas</h4>
                        </div>
                        <div class="card-body">
                            <table id="tabla_recetas_paciente_ro" class="display table table-striped  dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Profesional</th>
                                        <th>Receta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($recetas))
                                        @foreach ($recetas as $receta)
                                            <tr>
                                                <td class="text-wrap align-middle" data-sort=" {{ date('Y-m-d', strtotime($receta['created_at'])) }}">
                                                    {{ date('d-m-Y', strtotime($receta['created_at'])) }}
                                                </td>
                                                <td class="align-middle">
                                                    @if($receta['profesional'])
                                                        <strong>{{ $receta['profesional']['nombre'] }} {{ $receta['profesional']['apellido_uno'] }} {{ $receta['profesional']['apellido_dos'] }} </strong>
                                                        <br>
                                                        <span style="font-size:9px;">
                                                            {{ $receta['profesional']['TipoEspecialidad'] ? $receta['profesional']['TipoEspecialidad']['nombre'] : '' }}
                                                            @if($receta['profesional']['SubTipoEspecialidad'] && $receta['profesional']['SubTipoEspecialidad']['nombre'])
                                                                - {{ $receta['profesional']['SubTipoEspecialidad']['nombre'] }}
                                                            @endif
                                                        </span>
                                                    @else
                                                        <span class="text-muted">Profesional no disponible</span>
                                                    @endif
                                                </td>
                                                <td class="text-center align-middle">
                                                    <div onclick="ver_pdf_receta_retenido({{ $receta['id_ficha_atencion'] }}, {{ $receta['id'] }})" class="btn btn-warning-light-c btn-xxs"><i class="feather icon-activity"></i> Ver Receta</div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->
@endsection
@section('page-script')
    <script>
        $(document).ready(function() {
            $('#tabla_recetas_paciente_ro').DataTable({
                responsive: true,
                order: [[0, "desc"]]
            });
        });

        function ver_pdf_receta_retenido(id_ficha_atencion, id_receta)
        {
            const pdfUrl = "{{ route('pdf.receta_medicamentos') }}?id_ficha_atencion=" + id_ficha_atencion + '&id_receta=' + id_receta;

            Fancybox.show(
                [{ src: pdfUrl, type: "iframe", preload: false }],
                {
                    Toolbar: {
                        display: [
                            { id: "prev",     position: "center" },
                            { id: "title",    position: "center" },
                            { id: "next",     position: "center" },
                            { id: "imprimir", position: "right"  },
                            { id: "close",    position: "right"  },
                        ],
                        items: {
                            imprimir: {
                                tpl: '<button class="carousel__button" title="Imprimir receta" style="width:auto;padding:0 14px;font-size:12px;gap:6px;display:flex;align-items:center;">'
                                   + '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" style="flex-shrink:0"><path fill="currentColor" d="M18 3H6v4H5a3 3 0 0 0-3 3v6h4v4h12v-4h4V10a3 3 0 0 0-3-3h-1V3zm-2 2v2H8V5h8zm-8 14v-4h8v4H8zm10-6H6v-2h12v2zm1-3a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>'
                                   + '<span>Imprimir</span></button>',
                                click: function() {
                                    const win = window.open(pdfUrl, '_blank');
                                    if (win) {
                                        setTimeout(function() {
                                            try { win.print(); } catch(e) {}
                                        }, 1500);
                                    }
                                }
                            }
                        }
                    }
                }
            );
        }
    </script>
@endsection
