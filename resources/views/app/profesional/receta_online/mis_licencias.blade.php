@extends('template.profesional.template')
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
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ ROUTE('profesional.home') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ ROUTE('profesional.index_receta_online') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a inicio de receta online">Receta Online</a></li>
                                <li class="breadcrumb-item"><a href="#">Mis licencias emitidas</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header-principal bg-white">
                            <h5 class=" f-20 d-inline mt-1 float-left"><i class="feather icon-file-plus icono-primary"></i> Mis licencias emitidas</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-12">
                                    <table id="tabla_recetas_paciente_ro"
                                        class="display table table-striped dt-responsive nowrap table-xs"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="align-middle">Fecha Registro</th>
                                                <th class="align-middle">Paciente</th>
                                                <th class="align-middle">F. Inicio</th>
                                                <th class="align-middle">F. Término</th>
                                                <th class="align-middle">Diagnóstico</th>
                                                <th class="align-middle">Lugar de Atención</th>
                                                <th class="align-middle">Ver documento</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($licencias))
                                                    {{-- @php
                                                    echo json_encode($licencias);
                                                    @endphp --}}
                                                @foreach ($licencias as $f)
                                                    <tr>
                                                        <td class="text-wrap align-middle"
    data-order="{{ \Carbon\Carbon::parse($f->created_at)->format('Y-m-d H:i:s') }}">
    {{ \Carbon\Carbon::parse($f->created_at)->format('d/m/Y') }}
</td>
                                                        <td class="align-middle">
                                                            {{ $f->paciente->nombres }} {{ $f->paciente->apellido_uno }} {{ $f->paciente->apellido_dos }}<br/>
                                                            {{ $f->paciente->rut }}
                                                        </td>
                                                        <td class="align-middle">{{ $f->fecha_inicio }}</td>
                                                        <td class="align-middle">{{ $f->fecha_termino }}</td>
                                                        <td class="align-middle">{{ $f->descripcion_hipotesis }}</td>
                                                        <td class="align-middle text-center">{{ $f->LugarAtencion->nombre }}</td>

                                                        <td class="text-center align-middle">
                                                            <button href="#!" class="btn btn-danger-light-c btn-xxs" onclick="ver_pdf_licencia({{ $f->id }});"><i class="feather icon-file-plus"></i> Ver </button>
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
        </div>
    </div>
    <!--Cierre: Container Completo-->
@endsection
@section('page-script')
    <script>
        $(document).ready(function() {
            $('#tabla_recetas_paciente_ro').DataTable({
                responsive: true,
                order: [[0, 'desc']], // 0 = columna "Fecha", orden descendente
            });
        });

        function ver_pdf_licencia(id)
        {
            Fancybox.show(
                [
                    {
                        src: "{{ route('paciente.licencia.pdf') }}?id_licencia="+id,
                        type: "iframe",
                        preload: false,
                    },
                ]
            );
        }
    </script>
@endsection
