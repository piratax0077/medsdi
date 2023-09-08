<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            @if(isset($titulo) && $titulo == 'NO')
            {{--  nada  --}}
            @else
      
            @endif
           <div style="overflow-x:auto;"></div>
                <div class="table-responsive">
                    <table id="table_atenciones_profesional" class="display table dt-responsive nowrap table-xs"
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

                                        <td class="align-middle">
                                            {{ \Carbon\Carbon::parse($f->created_at)->format('d/m/Y') }}
                                        </td>

                                        <td class="align-middle">{{ $f->hipotesis_diagnostico }}</td>

                                        <td class=" align-middle">
                                            <!--<button type="button" class="badge badge-info btn-link"  data-toggle="tooltip" data-placement="top" title="ver Receta"  @if (isset($f->id)) onclick="buscar_receta({{ $f->id }});" @endif><i class="#">Ver</i></button>-->
                                            <button type="button" class="btn btn-xs btn-info-light"  @if (isset($f->id)) onclick="buscar_receta({{ $f->id }});" @endif><i class="feather icon-file-plus"></i> Ver</button>

                                        </td>

                                        <td class="align-middle">
        									<!-- <button type="button" class="btn btn-danger btn-sm btn-icon"  data-toggle="tooltip" data-placement="top" title="ver examenes" @if (isset($f->id)) onclick="buscar_examenes({{ $f->id }});" @endif><i class="feather icon-edit"></i></button>-->
        									<button type="button" class="btn btn-xs btn-success-light" @if (isset($f->id)) onclick="buscar_examenes({{ $f->id }});" @endif><i class="feather icon-activity"></i> Ver</button>
                                        </td>

                                        <td class="align-middle">
        									<!--<button type="button" class="btn btn-success btn-icon" data-toggle="tooltip" data-placement="top" title="ver archivos" @if (isset($f->id)) onclick="buscar_archivos({{ $f->id }});" @endif> <i class="feather icon-edit"></i> </button>-->
        									<button type="button" class="btn btn-xs btn-purple-light" @if (isset($f->id)) onclick="buscar_archivos({{ $f->id }});" @endif><i class="feather icon-folder"></i> Ver</button>

                                        </td>

                                        <form action="route()"></form>
                                        <td class="align-middle">
                                            {{--  <button type="button" class="btn btn-xs btn-primary-light" data-toggle="modal" data-target="#m_consultaant">  --}}
                                            <!--<button type="button" style="border-radius: 15px;" class="btn btn-info btn-sm"  @if (isset($f->id)) onclick="buscar_ficha_atencion({{ $f->id }});" @endif><i class="feather icon-file-text"></i> Ver</button>-->
        									<button type="button" class="btn btn-xs btn-primary-light" @if (isset($f->id)) onclick="buscar_ficha_atencion({{ $f->id }});" @endif><i class="feather icon-file-text"></i> Ver</button>
                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <span>
                                    <h6>No existen registros</h6>
                                </span>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
            <div id="m_consultaant" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_consultaantLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title text-white" id="m_consultaantLabel" onclick="$('#m_consultaant').modal('hide'); ">Datos de consulta de: </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class=" form-group row">
                                    <h5 class="text-c-blue mt-5 mb-4">
                                        Datos Generales
                                    </h5>

                                    <div class="row col-md-12">
                                        <div class="row col-md-5">
                                            <label for="ExFísico">
                                                <h5><b>Motivo de Consulta: </b></h5>
                                            </label>
                                        </div>
                                        <div class="row col-md-7">
                                            <span>
                                                <h6 id="label_motivo"></h6>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="row col-md-12">
                                        <div class="row col-md-5">
                                            <label for="ExFísico">
                                                <h5><b>Examen Físico: </b></h5>
                                            </label>
                                        </div>
                                        <div class="row col-md-7">
                                            <span>
                                                <h6 id="label_examen_fisico"></h6>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="row col-md-12">
                                        <div class="row col-md-5">
                                            <label for="ExFísico">
                                                <h5><b>Antecedentes de Consulta: </b></h5>
                                            </label>
                                        </div>
                                        <div class="row col-md-7">
                                            <span>
                                                <h6 id="label_antecedentes"></h6>
                                            </span>
                                        </div>

                                    </div>

                                    <div class="row col-md-12">
                                        <div class="row col-md-5">
                                            <label for="ExFísico">
                                                <h5><b>Diagnostico de Consulta: </b></h5>
                                            </label>
                                        </div>
                                        <div class="row col-md-7">
                                            <span>
                                                <h6 id="label_diagnostico"></h6>
                                            </span>
                                        </div>

                                    </div>

                                </div>

                                <div class=" form-group row">

                                </div>

                            </div>
                            {{-- <form>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="form-group fill">
                                            <label class="floating-label" for="MotConsulta">Motivo
                                                de Consulta</label>
                                            <!--fin autollenado-->
                                            <input id="MotConsulta" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </form> --}}
                            {{-- <form>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="form-group fill">
                                            <label class="floating-label" for="AntConsulta">Antecedentes</label>
                                            <!--fin autollenado-->
                                            <input id="AntConsulta" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </form> --}}
                            {{-- <form>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="form-group fill">
                                            <label class="floating-label" for="ExFísico">Examen
                                                Físico</label>
                                            <!--fin autollenado-->
                                            <input id="ExFísico" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </form> --}}
                            {{-- <form>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="form-group fill">
                                            <label class="floating-label" for="Dignóstico">Dignóstico</label>
                                            <!--fin autollenado-->
                                            <input id="Dignóstico" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </form> --}}
                            {{-- <form>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="form-group fill">
                                            <label class="floating-label" for="Receta">Receta</label>
                                            <!--fin autollenado-->
                                            <input id="Receta" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="form-group fill">
                                            <label class="floating-label" for="Examenes">Examenes</label>
                                            <!--fin autollenado-->
                                            <input id="Examenes" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </form> --}}


                        </div>
                        <!--fin autollenado-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="$('#m_consultaant').modal('hide'); ">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="m_cons_ex" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_exLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title text-white" id="m_cons_exLabel">Examenes solicitados
                                el.... </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           <div style="overflow-x:auto;"></div>
                            <div class="table-responsive">
                                <table id="tabla-1"
                                    class="display table table-striped table-hover dt-responsive nowrap pb-4"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Tipo</th>
                                            <th class="text-center align-middle">Urgencia</th>
                                            <th class="text-center align-middle">Nombre</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle">27/07/2021</td>
                                            <td class="text-center align-middle">Sangre</td>
                                            <td class="text-center align-middle">Normal</td>
                                            <td class="text-center align-middle">Hemograma y vhs
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center align-middle">27/07/2021</td>
                                            <td class="text-center align-middle">
                                                Otorrinolaríngologico</td>
                                            <td class="text-center align-middle">Normal</td>
                                            <td class="text-center align-middle">Rinomanometría
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center align-middle">27/07/2021</td>
                                            <td class="text-center align-middle">Sangre</td>
                                            <td class="text-center align-middle">Urgente</td>
                                            <td class="text-center align-middle">Grupo Sanguíneo
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--fin autollenado-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- recetas --}}
            <div id="m_cons_receta" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="m_cons_recetaLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title text-white" id="id_ficha_receta"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#m_cons_receta').modal('hide'); ">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div style="overflow-x:auto;"></div>
                                <div class="table-responsive">
                                <table id="tabla_atenciones_previas_receta" class="display table table-striped  dt-responsive nowrap table-xs"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Medicamento</th>
                                            <th>Presentacion</th>
                                            <th>Posología</th>
                                            <th>Vía</th>
                                            <th>Periodo</th>
                                            <th>Uso Crónico</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--fin autollenado-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="$('#m_cons_receta').modal('hide');">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- examenes --}}
            <div id="m_cons_examen" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="m_cons_examenLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title text-white" id="id_ficha_examen"></h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#m_cons_examen').modal('hide'); ">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div style="overflow-x:auto;"></div>
                            <div class="table-responsive">
                                <table id="table_atecion_previa_tabla_examen_paciente" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Tipo</th>
                                            <th>Nombre</th>
                                            <th>Prioridad</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                         <!--fin autollenado-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="$('#m_cons_examen').modal('hide'); ">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- archivos --}}
            <div id="m_cons_archivos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_archivosLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title text-white" id="m_cons_archivosLabel">Documentos de esta consulta del paciente:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#m_cons_archivos').modal('hide');" >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div style="overflow-x:auto;"></div>
                            <div class="table-responsive">
                                <table id="table_atenciones_previas_archivos"class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Tipo</th>
                                            <th>Ver</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                         <!--fin autollenado-->
                            <div class="modal-footer">
                                <button type="button mt-5" class="btn btn-danger" data-dismiss="modal" onclick="$('#m_cons_archivos').modal('hide');">Cerrar</button>
                            </div>
                    </div>
                </div>
            </div>

             
        </div>
  

