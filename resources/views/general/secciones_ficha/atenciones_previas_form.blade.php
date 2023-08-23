<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            @if(isset($titulo) && $titulo == 'NO')
            {{--  nada  --}}
            @else       
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h4 class="text-c-blue mt-4 f-20">Historial de atenciones</h4>
            </div>
             @endif
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="table_atenciones_profesional" class="display table table-striped dt-responsive nowrap align-middle table-sm"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Diagnóstico</th>
                                        <th>Recetas</th>
                                        <th>Exámenes</th>
                                        <th>Archivos </th>
                                        <th>Ficha</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (isset($fichas) && $fichas->count() > 0)
                                        @foreach ($fichas as $f)
                                            <tr>

                                                <td>
                                                    {{ \Carbon\Carbon::parse($f->created_at)->format('d/m/Y') }}
                                                </td>

                                                <td>{{ $f->hipotesis_diagnostico }}</td>

                                                <td>
                                                    <!--<button type="button" class="badge badge-info btn-link"  data-toggle="tooltip" data-placement="top" title="ver Receta"  @if (isset($f->id)) onclick="buscar_receta({{ $f->id }});" @endif><i class="#">Ver</i></button>-->
                                                    <button type="button" class="btn btn-xs btn-warning-light"  @if (isset($f->id)) onclick="buscar_receta({{ $f->id }});" @endif><i class="feather icon-file-plus"></i> Ver</button>
                                                </td>

                                                <td>
                                                    <!-- <button type="button" class="btn btn-danger btn-sm btn-icon"  data-toggle="tooltip" data-placement="top" title="ver examenes" @if (isset($f->id)) onclick="buscar_examenes({{ $f->id }});" @endif><i class="feather icon-edit"></i></button>-->
                                                    <button type="button" class="btn btn-xs btn-success-light" @if (isset($f->id)) onclick="buscar_examenes({{ $f->id }});" @endif><i class="feather icon-activity"></i> Ver</button>
                                                </td>

                                                <td>
                                                    <!--<button type="button" class="btn btn-success btn-icon" data-toggle="tooltip" data-placement="top" title="ver archivos" @if (isset($f->id)) onclick="buscar_archivos({{ $f->id }});" @endif> <i class="feather icon-edit"></i> </button>-->
                                                    <button type="button" class="btn btn-xs btn-purple-light" @if (isset($f->id)) onclick="buscar_archivos({{ $f->id }});" @endif><i class="feather icon-folder"></i> Ver</button>
                                                </td>

                                                <form action="route()"></form>
                                                <td>
                                                    {{--  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#m_consultaant">  --}}
                                                    <!--<button type="button" style="border-radius: 15px;" class="btn btn-info btn-sm"  @if (isset($f->id)) onclick="buscar_ficha_atencion({{ $f->id }});" @endif><i class="feather icon-file-text"></i> Ver</button>-->
                                                    <button type="button" class="btn btn-xs btn-info-light" @if (isset($f->id)) onclick="buscar_ficha_atencion({{ $f->id }});" @endif><i class="feather icon-file-text"></i> Ver</button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--MODALS-->
@include('general.secciones_ficha.modal_atencion_previa.hist_cons_receta')
@include('general.secciones_ficha.modal_atencion_previa.hist_cons_examen')
@include('general.secciones_ficha.modal_atencion_previa.hist_cons_archivo')
@include('general.secciones_ficha.modal_atencion_previa.hist_cons') 
<script>
    $(document).ready(function() {
        $('#table_atenciones_profesional').DataTable({
           responsive: true,
       });
   });
</script>
