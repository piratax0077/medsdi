<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row bg-white shadow-sm rounded mx-3 mt-4">
            <div class="col-sm-12 col-md-12">
                @if(isset($titulo) && $titulo == 'NO')
                {{--  nada  --}}
                @else
                <div class="row">
                    <div class="col-md-12 mb-0 pt-3">
                        <h6 class="f-16 text-c-blue">Historial de Atenciones</h6>
                        <hr>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-sm-12 pb-4">
                        <table id="table_atenciones_profesional" class="display table table-striped table-hover dt-responsive nowrap pb-4"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">Fecha</th>
                                    <th class="text-center align-middle">Diagnóstico</th>
                                    <th class="text-center align-middle">Recetas</th>
                                    <th class="text-center align-middle">Exámenes</th>
                                    <th class="text-center align-middle">Archivos </th>
                                    <th class="text-center align-middle">Ficha</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (isset($fichas) && $fichas->count() > 0)
                                    @foreach ($fichas as $f)
                                        <tr>

                                            <td class="text-center align-middle">
                                                {{ \Carbon\Carbon::parse($f->created_at)->format('d/m/Y') }}
                                            </td>

                                            <td class="text-center align-middle">{{ $f->hipotesis_diagnostico }}</td>

                                            <td class="text-center align-middle">
                                                <!--<button type="button" class="badge badge-info btn-link"  data-toggle="tooltip" data-placement="top" title="ver Receta"  @if (isset($f->id)) onclick="buscar_receta({{ $f->id }});" @endif><i class="#">Ver</i></button>-->
                                                <a class="badge badge-light-warning"  @if (isset($f->id)) onclick="buscar_receta({{ $f->id }});" @endif><i class="feather icon-file-plus"></i> Ver</a>


                                            </td>

                                            <td class="text-center align-middle">
												<!-- <button type="button" class="btn btn-danger btn-sm btn-icon"  data-toggle="tooltip" data-placement="top" title="ver examenes" @if (isset($f->id)) onclick="buscar_examenes({{ $f->id }});" @endif><i class="feather icon-edit"></i></button>-->
												<a class="badge badge-light-success" @if (isset($f->id)) onclick="buscar_examenes({{ $f->id }});" @endif><i class="feather icon-activity"></i> Ver</a>
                                            </td>

                                            <td class="text-center align-middle">
												<!--<button type="button" class="btn btn-success btn-icon" data-toggle="tooltip" data-placement="top" title="ver archivos" @if (isset($f->id)) onclick="buscar_archivos({{ $f->id }});" @endif> <i class="feather icon-edit"></i> </button>-->
												<a class="badge badge-light-purple" @if (isset($f->id)) onclick="buscar_archivos({{ $f->id }});" @endif><i class="feather icon-folder"></i> Ver</a>

                                            </td>

                                            <form action="route()"></form>
                                            <td class="text-center align-middle">
                                                {{--  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#m_consultaant">  --}}
                                                <!--<button type="button" style="border-radius: 15px;" class="btn btn-info btn-sm"  @if (isset($f->id)) onclick="buscar_ficha_atencion({{ $f->id }});" @endif><i class="feather icon-file-text"></i> Ver</button>-->
												<a class="badge badge-light-info" @if (isset($f->id)) onclick="buscar_ficha_atencion({{ $f->id }});" @endif><i class="feather icon-file-text"></i> Ver</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <span style="text-align: center">
                                        <h5>no existen registros</h5>
                                    </span>
                                @endif

                            </tbody>
                        </table>
                        @include('general.secciones_ficha.modal_atencion_previa.hist_cons_receta')
                        @include('general.secciones_ficha.modal_atencion_previa.hist_cons_examen')
                        @include('general.secciones_ficha.modal_atencion_previa.hist_cons_archivo')
                        @include('general.secciones_ficha.modal_atencion_previa.hist_cons')

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#table_atenciones_profesional').DataTable({
           responsive: true,
       });
   });
</script>
