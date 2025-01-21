
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            @if(isset($titulo) && $titulo == 'NO')
                {{--  nada  --}}
            @else
                </div>

             @endif
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                 <h4 class="text-c-blue mt-3 f-20">Historial de atenciones</h4>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="dt-responsive table-responsive">
                                    <table id="table_atenciones_profesional" class="display table table-striped dt-responsive nowrap align-middle table-xs"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Diagnóstico</th>
                                                <th>Ficha clínica</th>
                                                <th>Exámenes</th>
                                                <th>Recetas</th>
                                                <th>Documentos </th>
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
                                                            <button type="button" class="btn btn-xxs btn-info-light-c" @if (isset($f->id)) onclick="buscar_ficha_atencion_atencion_previa({{ $f->id }});" @endif><i class="feather icon-file-text"></i> Ver</button>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-xxs btn-success-light-c" @if (isset($f->id)) onclick="buscar_examenes({{ $f->id }});" @endif><i class="feather icon-activity"></i> Ver</button>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-xxs btn-warning-light-c"  @if (isset($f->id)) onclick="buscar_receta({{ $f->id }});" @endif><i class="feather icon-file-plus"></i> Ver</button>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-xxs btn-purple-light-c" @if (isset($f->id)) onclick="buscar_archivos({{ $f->id }});" @endif><i class="feather icon-folder"></i> Ver</button>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            @else
                                                <span style="text-align: center">
                                                    <h5>No existen registros</h5>
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
