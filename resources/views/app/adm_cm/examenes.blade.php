@extends('template.adm_cm.template')
@section('content')
    <!--****Container Completo****-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Gestión de Exámenes del Centro Médico</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="escritorio_admin_general_laboratorio.php"
                                        data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Exámenes Médicos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="row">
                            <div class="col-md-12 align-botton">
                                <h4 class="text-white f-20 d-inline ml-4 mt-3">Catálogo de Exámenes</h4>
                                <div class="btn-group mr-2 float-right mt- mb-">
                                    <button type="button" class="btn btn-sm btn-outline-light" onclick="ag_procedimiento();"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Examen</button>
                                    <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item" type="button" class="btn  btn-primary" >Exámenes Activos</button>
                                        <button class="dropdown-item" type="button" class="btn  btn-primary">Exámenes Inactivos</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                            </div>
                        </div>
                        <table id="lista_examenes_laboratorio"
                            class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre del Examen</th>
                                    <th>Descripcion</th>
                                    <th>Cantidad de bloques</th>
                                    <th>Estado</th>
                                    <th>Valor</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($examenes))
                                @foreach ($examenes as $examen)
                                    <tr>
                                        <td>{{ $examen->cod_examen }}</td>
                                        <td>{{ $examen->nombre }}</td>
                                        <td>{{ $examen->descripcion }}</td>
                                        <td>{{ $examen->cantidad_bloques }}</td>
                                        <td>${{ number_format($examen->valor,0,',','.') }}</td>
                                        <td>
                                            <span class="badge badge-{{ $examen->estado == 1 ? 'success' : 'secondary' }}">
                                                {{ $examen->estado == 1 ? 'Activo' : 'Inactivo' }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-info btn-icon btn-sm" type="button" onclick="ver_examen({{ $examen->id }})" title="Ver detalles"><i class="feather icon-eye"></i></button>
                                            <button class="btn btn-warning btn-icon btn-sm" type="button" onclick="mostrar_procedimiento({{ $examen->id }})" title="Editar"><i class="feather icon-edit"></i></button>
                                            <button class="btn btn-success btn-icon btn-sm" type="button" onclick="asignar_procedimiento({{ $examen->id }})" title="Asignar"><i class="fas fa-user"></i> </button>
                                            <button class="btn btn-danger btn-icon btn-sm" type="button" onclick="eliminar_procedimiento({{ $examen->id }})" title="Eliminar"><i class="feather icon-x"></i></button>
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

    <!--Modal agregar examen-->
    <div id="agregar_examen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_agregar_examen"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">
                        Agregar Nuevo Examen Médico
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label">Código del examen</label>
                                    <input class="form-control form-control-sm" name="direccion"
                                        id="direccion_lugar_atencion" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Nombre del examen</label>
                                    <input class="form-control form-control-sm" name="nombre_examen" id="nombre_examen"
                                        type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label">Plazo de entrega</label>
                                    <input class="form-control form-control-sm" name="numero" id="numero_lugar_atencion"
                                        type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="text-c-blue">Instructivo para la preparación del paciente</h6>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Preparación del examen</label>
                                    <textarea class="form-control form-control-sm" id="preparacion_examen" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label for="subir_instructivo">Instructivo de preparación en formato de archivo</label>
                                    <input type="file" class="form-control-file" id="subir_instructivo">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <h6 class="text-c-blue">Lugar para tomar muestra</h6>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="sucursal_01">
                                        <label class="custom-control-label" for="sucursal_01">Nombre de sucursal</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="sucursal_02">
                                        <label class="custom-control-label" for="sucursal_02">Nombre de sucursal</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="sucursal_03">
                                        <label class="custom-control-label" for="sucursal_03">Nombre de sucursal</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <h6 class="text-c-blue">Lugar para análisis de examen</h6>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="sucursal_04">
                                        <label class="custom-control-label" for="sucursal_04">Nombre de sucursal</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="sucursal_05">
                                        <label class="custom-control-label" for="sucursal_05">Nombre de sucursal</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="sucursal_06">
                                        <label class="custom-control-label" for="sucursal_06">Nombre de sucursal</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mb-0 pb-0">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-info">Agregar examen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Editar examen-->
    <div id="editar_examen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_editar_examen"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">
                        Editar Examen Médico
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="form_editar_examen">
                        <input type="hidden" name="e_examen_id" id="e_examen_id" value="">
                        <div class="row">
                            <!-- Código del Examen -->
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label">Código del Examen</label>
                                    <input class="form-control form-control-sm" type="text" name="e_examen_codigo" id="e_examen_codigo" placeholder="EJ: HEM-001">
                                </div>
                            </div>

                            <!-- Tipo de Examen -->
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label">Tipo de Examen</label>
                                    <select class="form-control form-control-sm" name="e_examen_tipo" id="e_examen_tipo">
                                        <option value="">Seleccionar...</option>
                                        <option value="Laboratorio">Laboratorio</option>
                                        <option value="Imagenología">Imagenología</option>
                                        <option value="Cardiología">Cardiología</option>
                                        <option value="Otros">Otros</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Nombre del Examen -->
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Nombre del Examen</label>
                                    <input class="form-control form-control-sm" type="text" name="e_examen_nombre" id="e_examen_nombre" placeholder="Ej: Hemograma Completo">
                                </div>
                            </div>

                            <!-- Descripción -->
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Descripción</label>
                                    <textarea class="form-control form-control-sm" name="e_examen_descripcion" id="e_examen_descripcion" rows="2" placeholder="Descripción breve del examen"></textarea>
                                </div>
                            </div>

                            <!-- Cantidad de Bloques -->
                            <div class="col-sm-4">
                                <div class="form-group fill">
                                    <label class="floating-label">Cantidad de Bloques</label>
                                    <input class="form-control form-control-sm" type="number" name="e_examen_cantidad_bloques" id="e_examen_cantidad_bloques" step="1" min="1" max="24" value="1">
                                </div>
                            </div>

                            <!-- Plazo de Entrega -->
                            <div class="col-sm-4">
                                <div class="form-group fill">
                                    <label class="floating-label">Plazo de Entrega (días)</label>
                                    <input class="form-control form-control-sm" type="number" name="e_examen_plazo" id="e_examen_plazo" step="1" min="0" value="1">
                                </div>
                            </div>

                            <!-- Valor -->
                            <div class="col-sm-4">
                                <div class="form-group fill">
                                    <label class="floating-label">Valor $</label>
                                    <input class="form-control form-control-sm" type="number" name="e_examen_valor" id="e_examen_valor" step="100" value="0">
                                </div>
                            </div>

                            <!-- Estado -->
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Estado</label>
                                    <select class="form-control form-control-sm" name="e_examen_estado" id="e_examen_estado">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Separador -->
                            <div class="col-sm-12 mt-2">
                                <hr>
                                <h6 class="text-c-blue font-weight-bold">Instructivo para la Preparación del Paciente</h6>
                            </div>

                            <!-- Instructivo de Preparación -->
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Indicaciones de Preparación</label>
                                    <textarea class="form-control form-control-sm" name="e_examen_instructivo" id="e_examen_instructivo" rows="4" placeholder="Ej: Ayuno de 8 horas, traer orden médica, etc."></textarea>
                                </div>
                            </div>

                            <!-- Archivo Instructivo -->
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label for="e_subir_instructivo">Instructivo de preparación (archivo PDF)</label>
                                    <input type="file" class="form-control-file" name="e_subir_instructivo" id="e_subir_instructivo" accept=".pdf">
                                    <small class="form-text text-muted" id="e_archivo_actual"></small>
                                </div>
                            </div>

                            <!-- Separador -->
                            <div class="col-sm-12 mt-3">
                                <hr>
                                <h6 class="text-c-blue font-weight-bold">Lugares de Atención</h6>
                            </div>

                            <!-- Lugares para Tomar Muestra -->
                            <div class="col-sm-12 mt-2">
                                <label class="font-weight-bold text-dark">Lugares para Tomar Muestra:</label>
                                <div class="form-group" id="e_lugares_toma_muestra">
                                    <!-- Los checkboxes se llenarán dinámicamente -->
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="e_toma_muestra[]" id="e_toma_muestra_1" value="1">
                                        <label class="custom-control-label" for="e_toma_muestra_1">Sucursal Principal</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="e_toma_muestra[]" id="e_toma_muestra_2" value="2">
                                        <label class="custom-control-label" for="e_toma_muestra_2">Sucursal Centro</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="e_toma_muestra[]" id="e_toma_muestra_3" value="3">
                                        <label class="custom-control-label" for="e_toma_muestra_3">Sucursal Oriente</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Lugares para Análisis -->
                            <div class="col-sm-12 mt-3">
                                <label class="font-weight-bold text-dark">Lugares para Análisis de Muestra:</label>
                                <div class="form-group" id="e_lugares_analisis">
                                    <!-- Los checkboxes se llenarán dinámicamente -->
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="e_analisis[]" id="e_analisis_1" value="1">
                                        <label class="custom-control-label" for="e_analisis_1">Laboratorio Principal</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="e_analisis[]" id="e_analisis_2" value="2">
                                        <label class="custom-control-label" for="e_analisis_2">Laboratorio Centro</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="e_analisis[]" id="e_analisis_3" value="3">
                                        <label class="custom-control-label" for="e_analisis_3">Laboratorio Oriente</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-info" onclick="actualizar_examen()">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal sucursales toma de muestras-->
    <div id="sucursal_toma_muestras" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="sucursal_toma_muestras" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Lugares para toma de muestras</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Activar /<br>desactivar</th>
                                <th class="text-center align-middle">Sucursal</th>
                                <th class="text-center align-middle">Dirección</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center align-middle">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="sucursal_1">
                                        <label class="custom-control-label" for="sucursal_1"></label>
                                    </div>
                                </td>
                                <td class="text-center align-middle">Nombre sucursal</td>
                                <td class="text-center align-middle">
                                    <span>Arlegui, 23</span><br>
                                    <span>Viña del Mar</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center align-middle">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="sucursal_2">
                                        <label class="custom-control-label" for="sucursal_2"></label>
                                    </div>
                                </td>
                                <td class="text-center align-middle">Nombre sucursal</td>
                                <td class="text-center align-middle">
                                    <span>Arlegui, 23</span><br>
                                    <span>Viña del Mar</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-info" data-dismiss="modal">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--Modal sucursales analisis muestras-->
    <div id="sucursal_analisis_muestra" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="sucursal_analisis_muestra" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Lugares para analizar muestra</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Activar /<br>desactivar</th>
                                <th class="text-center align-middle">Sucursal</th>
                                <th class="text-center align-middle">Dirección</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center align-middle">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="sucursal_1">
                                        <label class="custom-control-label" for="sucursal_1"></label>
                                    </div>
                                </td>
                                <td class="text-center align-middle">Nombre sucursal</td>
                                <td class="text-center align-middle">
                                    <span>Arlegui, 23</span><br>
                                    <span>Viña del Mar</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center align-middle">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="sucursal_2">
                                        <label class="custom-control-label" for="sucursal_2"></label>
                                    </div>
                                </td>
                                <td class="text-center align-middle">Nombre sucursal</td>
                                <td class="text-center align-middle">
                                    <span>Arlegui, 23</span><br>
                                    <span>Viña del Mar</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-info" data-dismiss="modal">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
     {{--  MODAL EXAMEN RÁPIDO  --}}
    <div id="a_procedimiento" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_procedimiento" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Añadir Procedimiento</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Nombre</label>
                                    <div class="d-flex justify-content-between">
                                        <input class="form-control form-control-sm" type="text" name="a_procedimeinto_nombre" id="a_procedimeinto_nombre" value="">
                                    </div>
                                </div>

                                <div class="form-group fill">
                                    <label class="floating-label">Descripción</label>
                                    <div class="d-flex justify-content-between">
                                        <input class="form-control form-control-sm" type="text" name="a_procedimeinto_descripcion" id="a_procedimeinto_descripcion" value="">
                                    </div>
                                </div>

                                <div class="form-group fill">
                                    <label class="floating-label">Cantidad Bloques</label>
                                    <div class="d-flex justify-content-between">
                                        <input class="form-control form-control-sm" type="number" name="a_procedimeinto_cantidad_bloques" id="a_procedimeinto_cantidad_bloques" step="1" max="24" value="">
                                    </div>
                                </div>

                                <div class="form-group fill">
                                    <label class="floating-label">Valor $</label>
                                    <div class="d-flex justify-content-between">
                                        <input class="form-control form-control-sm" type="number" name="a_procedimeinto_valor" id="a_procedimeinto_valor" step="1"  value="0">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto" onclick="guardar_procedimiento()">Añadir</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Asignar Procedimiento-->
    <div id="asignar_procedimiento_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_asignar_procedimiento" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white text-center">Asignar Procedimiento a Profesional</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="form_asignar_procedimiento">
                        <input type="hidden" name="asignar_id_procedimiento" id="asignar_id_procedimiento" value="">

                        <!-- Procedimiento -->
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Procedimiento</label>
                            <input class="form-control form-control-sm" type="text" id="asignar_procedimiento_nombre" value="" disabled>
                        </div>

                        <!-- Lugar de Atención -->
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Lugar de Atención</label>
                            <select class="form-control form-control-sm" name="asignar_id_lugar_atencion" id="asignar_id_lugar_atencion" required>
                                <option value="">Seleccionar...</option>
                                <option value="{{ $institucion->id_lugar_atencion }}" selected>{{ $institucion->nombre }}</option>
                            </select>
                        </div>

                        <!-- Profesional -->
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Profesional</label>
                            <select class="form-control form-control-sm" name="asignar_id_profesional" id="asignar_id_profesional" required>
                                <option value="">Seleccionar...</option>
                                @if(isset($profesionales_lugar_atencion))
                                    @foreach($profesionales_lugar_atencion as $prof)
                                        <option value="{{ $prof->id }}">{{ $prof->nombre }} {{ $prof->apellido_uno }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" onclick="guardar_asignacion_procedimiento()">Asignar</button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL VER EXAMEN --}}
    <div id="ver_examen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ver_examen" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Detalles del Examen Médico</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Código del Examen</label>
                                    <input class="form-control form-control-sm" type="text" name="v_examen_codigo" id="v_examen_codigo" value="" disabled>
                                </div>
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Nombre del Examen</label>
                                    <input class="form-control form-control-sm" type="text" name="v_examen_nombre" id="v_examen_nombre" value="" disabled>
                                </div>
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Cantidad de bloques</label>
                                    <input class="form-control form-control-sm" type="text" name="v_examen_cantidad_bloques" id="v_examen_cantidad_bloques" value="" disabled>
                                </div>
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Instructivo para la preparación del paciente</label>
                                    <textarea class="form-control form-control-sm" id="v_examen_instructivo_preparacion" rows="3" disabled></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalMostrarPrestacion" tabindex="-1" aria-labelledby="modalMostrarPrestacionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalMostrarPrestacionLabel">Editar prestacion</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_prestacion_editar" name="id_prestacion_editar" value="">
            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm" for="nombre_prestacion">Nombre del procedimiento</label>
                        <input type="text" name="nombre_prestacion" id="nombre_prestacion" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="floating-label-activo-sm" for="cantidad_bloques_prestacion">Cantidad Bloques</label>
                        <input type="number" name="cantidad_bloques_prestacion" id="cantidad_bloques_prestacion" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="floating-label-activo-sm" for="valor_prestacion">Valor</label>
                        <input type="number" name="valor_prestacion" id="valor_prestacion" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm" for="indicaciones_prestacion">Indicaciones del procedimiento para el paciente</label>
                        <textarea name="indicaciones_prestacion" id="indicaciones_prestacion" class="form-control form-control-sm" rows="4" placeholder="Ingrese las indicaciones que el paciente debe seguir para este procedimiento..."></textarea>
                    </div>
                </div>
            </div>


            <button type="button" class="btn btn-info btn-sm float-right" id="btn_guardar_procedimiento" onclick="editar_prestacion()"><i class="fas fa-plus"></i>  Agregar otro diagnostico</button>
            {{-- <table class="table w-100" id="table_procedimientos_propios_dental">
                <thead>
                    <tr>
                        <th>Procedimiento</th>
                        <th>UCO</th>
                        <th>¿Laboratorio?</th>
                        <th>Bloques</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mis_trabajos_profesional as $mi_trabajo)
                        <tr>
                            <td>{{ $mi_trabajo->descripcion }}</td>
                            <td>{{ $mi_trabajo->uco }}</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $mi_trabajo->id }}" id="existeLaboratorioDental{{ $mi_trabajo->id }}" onclick="guardarLaboratorio({{ $mi_trabajo->id }})" @if($mi_trabajo->laboratorio == 1) checked @endif>
                                    <label class="form-check-label" for="existeLaboratorioDental{{ $mi_trabajo->id }}">
                                        ¿Laboratorio?
                                    </label>
                                </div>
                            </td>
                            <td>{{ $mi_trabajo->cantidad_bloques }}</td>
                            <td>
                                <button class="btn btn-danger btn-icon" type="button" onclick="eliminar_procedimiento({{ $mi_trabajo->id }})"><i class="feather icon-x"></i></button>
                                <button class="btn btn-warning btn-icon" type="button" onclick="mostrar_procedimiento({{ $mi_trabajo->id }})"><i class="feather icon-edit"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
        </div>
        <!--<div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>-->
        </div>
    </div>
</div>
@endsection
@section('page-script')
    <script>
        $(document).ready(function() {
            $('#lista_examenes_laboratorio').DataTable({
                responsive: true,
            });
        });

    function guardar_procedimiento(){
        let nombre = $('#a_procedimeinto_nombre').val();
        let descripcion = $('#a_procedimeinto_descripcion').val();
        let cantidad_bloques = $('#a_procedimeinto_cantidad_bloques').val();
        let valor = $('#a_procedimeinto_valor').val();
        let valido = 1;
        let mensaje = '';
        // validar campos
        if(nombre == 0)
        {
            valido = 0;
            mensaje += 'Campo requerido nombre\n';
        }
        // if(descripcion == 0)
        // {
        //     valido = 0;
        //     mensaje += 'Campo requerido descripcion\n';
        // }
        if(cantidad_bloques == 0)
        {
            valido = 0;
            mensaje += 'Campo requerido cantidad bloques\n';
        }


        if(valido == 1)
        {
            let data = {
                id_lugar_atencion : '{{ $institucion->id_lugar_atencion }}',
                nombre : nombre,
                descripcion : descripcion,
                minutos_bloque : 15,
                cantidad_bloques : cantidad_bloques,
                valor : valor,
                otros : '',
                _token: CSRF_TOKEN,
            }

            let url = "{{ route('adm_cm.procedimiento.registrar') }}";

            $.ajax({
                url: url,
                type: "post",
                data: data,
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    if(data.estado == 1)
                    {
                        // cerrar modal
                        $('#a_procedimiento').modal('hide');
                        let registros = data.registros;
                        $('#lista_examenes_laboratorio tbody').empty();
                        $(registros).each(function(i, v) { // indice, valor
                            $('#lista_examenes_laboratorio tbody').append(`
                            <tr>
                                <td class="align-items-left text-left">${v.nombre}s</td>
                                <td class="align-items-left text-left">${v.descripcion}</td>
                                <td class="align-items-left text-left">${v.cantidad_bloques}</td>
                                <td class="align-items-left text-left">${v.valor}</td>
                                <td class="align-items-left text-left">
                                    <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_procedimiento_cm(${v.id})"><i class="feather icon-trash"></i></button>
                                </td>
                            </tr>
                            `);
                        });
                    }
                    else
                    {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar Procedimiento",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                }
                else
                {
                    swal({
                        title: "Error",
                        text: "Error al cargar ingresar Procedimiento",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            })

        }
        else
        {
            swal({
                title: "Campos requeridos",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }
    }

    function eliminar_procedimiento_cm(id){
        swal({
            title: "Eliminar procedimiento",
            text: "¿Está seguro que desea eliminar el procedimiento?",
            icon: "warning",
            buttons: ["Cancelar", "Aceptar"],
            DangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                confirmar_eliminar_procedimiento(id);
            }
        });
    }

    function confirmar_eliminar_procedimiento(id){
        let data = {
            id : id,
            estado : '0',
            _token: CSRF_TOKEN,
        };
        let url = "{{ route('adm_cm.procedimiento.modificar') }}";
        $.ajax({
            url: url,
            type: "post",
            data: data,
        })
        .done(function(data) {
            console.log(data);
            if (data != null) {
                if(data.estado == 1)
                {
                    let registros = data.registros;

                    // Destruir el DataTable existente si existe
                    if ($.fn.DataTable.isDataTable('#lista_examenes_laboratorio')) {
                        $('#lista_examenes_laboratorio').DataTable().destroy();
                    }

                    // Vaciar el tbody de la tabla
                    $('#lista_examenes_laboratorio tbody').empty();

                    // Agregar los registros actualizados
                    $(registros).each(function(i, v) { // indice, valor
                        // Determinar el estado badge
                        let estadoBadge = v.estado == 1 ?
                            '<span class="badge badge-success">Activo</span>' :
                            '<span class="badge badge-secondary">Inactivo</span>';

                        $('#lista_examenes_laboratorio tbody').append(`
                        <tr>
                            <td>${v.cod_examen || ''}</td>
                            <td>${v.nombre}</td>
                            <td>${v.descripcion}</td>
                            <td>${v.cantidad_bloques}</td>
                            <td>$${new Intl.NumberFormat('es-CL').format(v.valor)}</td>
                            <td>${estadoBadge}</td>
                            <td>
                                <button class="btn btn-info btn-icon btn-sm" type="button" onclick="ver_examen(${v.id})" title="Ver detalles"><i class="feather icon-eye"></i></button>
                                <button class="btn btn-warning btn-icon btn-sm" type="button" onclick="editar_examen(${v.id})" title="Editar"><i class="feather icon-edit"></i></button>
                                <button class="btn btn-danger btn-icon btn-sm" type="button" onclick="eliminar_examen(${v.id})" title="Eliminar"><i class="feather icon-x"></i></button>
                            </td>
                        </tr>
                        `);
                    });

                    // Reinicializar el DataTable
                    $('#lista_examenes_laboratorio').DataTable({
                        responsive: true,
                        language: {
                            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
                        }
                    });

                    // Mostrar mensaje de éxito
                    swal({
                        title: "Éxito",
                        text: "Examen eliminado correctamente",
                        icon: "success",
                        buttons: "Aceptar",
                    });
                }
                else
                {
                    swal({
                        title: "Error",
                        text: "Error al eliminar el examen",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            }
            else
            {
                swal({
                    title: "Error",
                    text: "Error al eliminar el examen",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function ag_procedimiento(){
        $('#a_procedimiento').modal('show');
    }

    function ver_examen(id){
        // Función para ver detalles del examen
        console.log('Ver examen:', id);
        var url = "{{ route('adm_cm.examen.detalle') }}";
        $.ajax({
            url: url,
            type: "get",
            data:{
                id: id
            },
            success: function(data) {
                console.log(data);
                if(data.estado == 1){
                    let examen = data.examen;
                    // abrimos modal y mostramos datos
                    $('#ver_examen').modal('show');
                    $('#v_examen_codigo').val(examen.cod_examen);
                    $('#v_examen_nombre').val(examen.descripcion);
                    $('#v_examen_cantidad_bloques').val(examen.cantidad_bloques);
                    $('#v_examen_instructivo_preparacion').val(examen.indicaciones);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener los detalles del examen:', error);
            }
        })
    }

        function editar_examen(id){
            // Función para editar examen - cargar datos
            var url = "{{ route('adm_cm.examen.detalle') }}";
            $.ajax({
                url: url,
                type: "get",
                data:{
                    id: id
                },
                success: function(data) {
                    console.log(data);
                    if(data.estado == 1){
                        let examen = data.examen;
                        // Cargar datos en el modal de edición
                        $('#editar_examen').modal('show');
                        $('#e_examen_id').val(examen.id);
                        $('#e_examen_codigo').val(examen.cod_examen);
                        $('#e_examen_nombre').val(examen.nombre);
                        $('#e_examen_descripcion').val(examen.descripcion);
                        $('#e_examen_cantidad_bloques').val(examen.cantidad_bloques);
                        $('#e_examen_plazo').val(examen.plazo_entrega || 1);
                        $('#e_examen_valor').val(examen.valor);
                        $('#e_examen_estado').val(examen.estado);
                        $('#e_examen_instructivo').val(examen.indicaciones);
                        $('#e_examen_tipo').val(examen.tipo || '');

                        // Mostrar archivo actual si existe
                        if(examen.archivo_instructivo){
                            $('#e_archivo_actual').html('Archivo actual: <a href="' + examen.archivo_instructivo + '" target="_blank">Ver archivo</a>');
                        } else {
                            $('#e_archivo_actual').html('');
                        }

                        // Aquí se cargarían los checkboxes de lugares si vienen en data.lugares_toma_muestra y data.lugares_analisis
                        // Por ahora dejamos los checkboxes estáticos
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error al obtener los detalles del examen:', error);
                    swal({
                        title: "Error",
                        text: "No se pudieron cargar los datos del examen",
                        icon: "error",
                        buttons: "Aceptar",
                    });
                }
            });
        }

        function actualizar_examen(){
            // Función para actualizar el examen
            let id = $('#e_examen_id').val();
            let codigo = $('#e_examen_codigo').val();
            let nombre = $('#e_examen_nombre').val();
            let descripcion = $('#e_examen_descripcion').val();
            let cantidad_bloques = $('#e_examen_cantidad_bloques').val();
            let plazo = $('#e_examen_plazo').val();
            let valor = $('#e_examen_valor').val();
            let estado = $('#e_examen_estado').val();
            let instructivo = $('#e_examen_instructivo').val();
            let tipo = $('#e_examen_tipo').val();

            // Validaciones básicas
            if(!codigo || !nombre || !cantidad_bloques){
                swal({
                    title: "Campos requeridos",
                    text: "Por favor complete todos los campos obligatorios",
                    icon: "warning",
                    buttons: "Aceptar",
                });
                return;
            }

            // Obtener lugares seleccionados
            let lugares_toma_muestra = [];
            $('input[name="e_toma_muestra[]"]:checked').each(function(){
                lugares_toma_muestra.push($(this).val());
            });

            let lugares_analisis = [];
            $('input[name="e_analisis[]"]:checked').each(function(){
                lugares_analisis.push($(this).val());
            });

            let formData = new FormData();
            formData.append('id', id);
            formData.append('cod_examen', codigo);
            formData.append('nombre', nombre);
            formData.append('descripcion', descripcion);
            formData.append('cantidad_bloques', cantidad_bloques);
            formData.append('plazo_entrega', plazo);
            formData.append('valor', valor);
            formData.append('estado', estado);
            formData.append('indicaciones', instructivo);
            formData.append('tipo', tipo);
            formData.append('lugares_toma_muestra', JSON.stringify(lugares_toma_muestra));
            formData.append('lugares_analisis', JSON.stringify(lugares_analisis));
            formData.append('_token', CSRF_TOKEN);

            // Agregar archivo si existe
            let archivo = $('#e_subir_instructivo')[0].files[0];
            if(archivo){
                formData.append('archivo_instructivo', archivo);
            }

            let url = "#";

            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log(data);
                    if(data.estado == 1){
                        $('#editar_examen').modal('hide');
                        swal({
                            title: "Éxito",
                            text: "Examen actualizado correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        swal({
                            title: "Error",
                            text: data.mensaje || "Error al actualizar el examen",
                            icon: "error",
                            buttons: "Aceptar",
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    swal({
                        title: "Error",
                        text: "Error al actualizar el examen",
                        icon: "error",
                        buttons: "Aceptar",
                    });
                }
            });
        }

        function mostrar_procedimiento(id){
            console.log(id);
            let data = {
                id: id,
                _token: CSRF_TOKEN,
            }

            let url = '{{ ROUTE("profesional.mostrar_prestacion_lab") }}';

            $.ajax({
                type:'post',
                url: url,
                data: data,
                success: function(response){
                    console.log(response);
                    if(response.status == "ok"){
                        // Abrir modal
                        $('#modalMostrarPrestacion').modal('show');
                        // Guardar el ID de la prestación
                        $('#id_prestacion_editar').val(id);
                        // Llenar los campos del modal
                        $('#nombre_prestacion').val(response.procedimiento.nombre);
                        $('#cantidad_uco').val(response.procedimiento.cantidad_uco);
                        $('#cantidad_bloques_prestacion').val(response.procedimiento.cantidad_bloques);
                        $('#valor_prestacion').val(response.procedimiento.valor);
                        // Cargar indicaciones en Summernote
                        $('#indicaciones_prestacion').summernote('code', response.procedimiento.indicaciones || '');

                    }


                },
                error: function(error){
                    console.log(error.responseText);
                }
            });
        }

        function eliminar_examen(id){
            // Función para eliminar examen
            if(confirm('¿Está seguro de eliminar este examen?')){
                console.log('Eliminar examen:', id);
            }
        }

        function eliminar_procedimiento(id){
            swal({
                title:'Eliminar Procedimiento',
                text:'¿Está seguro que desea eliminar el procedimiento?',
                icon:'warning',
                buttons:["Cancelar","Aceptar"],
                DangerMode: true,
            })
            .then((willDelete) => {
                if(willDelete){
                    confirmar_eliminar_procedimiento(id);
                }
            });
        }

        function confirmar_eliminar_procedimiento(id){
            console.log(id);
            let data = {
                id: id,
                _token: CSRF_TOKEN,
            }

            let url = '{{ ROUTE("adm_cm.examen.eliminar") }}';

            $.ajax({
                type:'post',
                url: url,
                data: data,
                success: function(response){
                    console.log(response);
                    // Actualizar procedimientos propios
                    let procedimientos = response.procedimientos;
                    var table_procedimientos_propios = $('#table_procedimientos_propios_dental').DataTable();

                    // Limpia los datos de la tabla
                    table_procedimientos_propios.clear();

                    // Agrega las nuevas filas
                    procedimientos.forEach(p => {
                        p.valor = parseFloat(p.valor).toLocaleString('es-CL', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
                        const isChecked_p = p.laboratorio == 1 ? 'checked' : '';
                        table_procedimientos_propios.row.add([
                            p.descripcion,
                            p.cantidad_uco,
                            '$'+p.valor,
                            `
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="${p.id}" id="existeLaboratorioDental${p.id}" onclick="guardarLaboratorio(${p.id})" ${isChecked_p}>
                                <label class="form-check-label" for="existeLaboratorioDental${p.id}">
                                    ¿Laboratorio?
                                </label>
                            </div>
                            `,
                            p.cantidad_bloques,
                            `<button class="btn btn-danger btn-icon" type="button" onclick="eliminar_procedimiento(${p.id})"><i class="feather icon-x"></i></button>
                            <button class="btn btn-warning btn-icon" type="button" onclick="mostrar_procedimiento(${p.id})"><i class="feather icon-edit"></i></button>`
                        ]);
                    });

                    // Redibuja la tabla
                    table_procedimientos_propios.draw();

                    // Actualizar la tabla DataTable
                    let trabajos = response.trabajos;
                    let table = $('#table_aranceles_dental').DataTable(); // Accede a la instancia de DataTable

                    // Limpia los datos de la tabla correctamente
                    table.clear();

                    // Agrega las nuevas filas
                    trabajos.forEach(trabajo => {
                        const isChecked = trabajo.laboratorio === 1 ? 'checked' : '';
                        table.row.add([
                            trabajo.descripcion,
                            trabajo.valor,
                            trabajo.uco,
                            `
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="existeLaboratorioDental${trabajo.id}" onclick="guardarLaboratorioIndex(${trabajo.id})" ${isChecked}>
                                <label class="form-check-label" for="existeLaboratorioDental${trabajo.id}">
                                    ¿Laboratorio?
                                </label>
                            </div>
                            `,
                            `<button class="btn btn-warning btn-icon" role="button" onclick="mostrar_procedimiento(${trabajo.id})"><i class="feather icon-edit"></i> Editar</button>`
                        ]);
                    });

                    // Dibuja la tabla nuevamente
                    table.draw();
                },
                error: function(error){
                    console.log(error.responseText);
                }
            });
        }

        function guardar_examen(){
            // Función para guardar nuevo examen
            console.log('Guardar examen');
        }

        function editar_prestacion(){
        let id = $('#id_prestacion_editar').val();
        let nombre = $('#nombre_prestacion').val();
        let cantidad_bloques = $('#cantidad_bloques_prestacion').val();
        let valor = $('#valor_prestacion').val();
        let indicaciones = $('#indicaciones_prestacion').summernote('code');

        // Validaciones
        if(!id || id == ''){
            swal({
                title: 'Error',
                text: 'No se ha seleccionado una prestación para editar',
                icon: 'error'
            });
            return;
        }

        if(!nombre || nombre.trim() == ''){
            swal({
                title: 'Error',
                text: 'El nombre del procedimiento es requerido',
                icon: 'error'
            });
            return;
        }

        if(!cantidad_bloques || cantidad_bloques == ''){
            swal({
                title: 'Error',
                text: 'La cantidad de bloques es requerida',
                icon: 'error'
            });
            return;
        }

        if(!valor || valor == ''){
            swal({
                title: 'Error',
                text: 'El valor es requerido',
                icon: 'error'
            });
            return;
        }

        let data = {
            id: id,
            nombre: nombre,
            cantidad_bloques: cantidad_bloques,
            valor: valor,
            indicaciones: indicaciones,
            _token: CSRF_TOKEN,
        }

        let url = '{{ route("profesional.actualizar_prestacion_lab") }}';

        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function(response){
                console.log(response);
                if(response.status == "ok"){
                    swal({
                        title: 'Éxito',
                        text: 'La prestación ha sido actualizada correctamente',
                        icon: 'success'
                    }).then(() => {
                        // Cerrar modal
                        $('#modalMostrarPrestacion').modal('hide');
                        // Recargar la página para ver los cambios
                        location.reload();
                    });
                } else {
                    swal({
                        title: 'Error',
                        text: response.message || 'No se pudo actualizar la prestación',
                        icon: 'error'
                    });
                }
            },
            error: function(error){
                console.log(error.responseText);
                swal({
                    title: 'Error',
                    text: 'Ocurrió un error al actualizar la prestación',
                    icon: 'error'
                });
            }
        });

    }

    function asignar_procedimiento(id){
        // Obtener datos del procedimiento
        let data = {
            id: id,
            _token: CSRF_TOKEN,
        }

        let url = '{{ route("adm_cm.examen.detalle") }}';

        $.ajax({
            type: 'get',
            url: url,
            data: data,
            success: function(response){
                console.log(response);
                if(response.estado == 1){
                    // Limpiar el formulario
                    $('#form_asignar_procedimiento')[0].reset();

                    // Guardar el ID del procedimiento
                    $('#asignar_id_procedimiento').val(id);

                    // Cargar nombre del procedimiento
                    $('#asignar_procedimiento_nombre').val(response.examen.nombre);

                    // Abrir modal
                    $('#asignar_procedimiento_modal').modal('show');
                } else {
                    swal({
                        title: 'Error',
                        text: 'No se pudieron cargar los datos del procedimiento',
                        icon: 'error',
                        buttons: 'Aceptar'
                    });
                }
            },
            error: function(error){
                console.log(error.responseText);
                swal({
                    title: 'Error',
                    text: 'Error al cargar el procedimiento',
                    icon: 'error',
                    buttons: 'Aceptar'
                });
            }
        });
    }

    function guardar_asignacion_procedimiento(){
        let id_procedimiento = $('#asignar_id_procedimiento').val();
        let id_lugar_atencion = $('#asignar_id_lugar_atencion').val();
        let id_profesional = $('#asignar_id_profesional').val();

        // Validaciones
        if(!id_procedimiento){
            swal({
                title: 'Error',
                text: 'No hay procedimiento seleccionado',
                icon: 'error',
                buttons: 'Aceptar'
            });
            return;
        }

        if(!id_lugar_atencion){
            swal({
                title: 'Error',
                text: 'Debe seleccionar un lugar de atención',
                icon: 'error',
                buttons: 'Aceptar'
            });
            return;
        }

        if(!id_profesional){
            swal({
                title: 'Error',
                text: 'Debe seleccionar un profesional',
                icon: 'error',
                buttons: 'Aceptar'
            });
            return;
        }

        let data = {
            id_procedimiento: id_procedimiento,
            id_lugar_atencion: id_lugar_atencion,
            id_profesional: id_profesional,
            _token: CSRF_TOKEN,
        };

        let url = '{{ route("adm_cm.procedimiento.asignar") }}';

        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function(response){
                console.log(response);
                if(response.estado == 1){
                    swal({
                        title: 'Éxito',
                        text: response.mensaje || 'Procedimiento asignado correctamente',
                        icon: 'success',
                        buttons: 'Aceptar'
                    }).then(() => {
                        // Cerrar modal
                        $('#asignar_procedimiento_modal').modal('hide');
                        // Recargar página si es necesario
                        // location.reload();
                    });
                } else {
                    swal({
                        title: 'Error',
                        text: response.mensaje || 'Error al asignar el procedimiento',
                        icon: 'error',
                        buttons: 'Aceptar'
                    });
                }
            },
            error: function(error){
                console.log(error.responseText);
                swal({
                    title: 'Error',
                    text: 'Error en la solicitud',
                    icon: 'error',
                    buttons: 'Aceptar'
                });
            }
        });
    }


        function editar_datos() {
            $('#editar_examen').modal('show');
        }

        function toma_muestras() {
            $('#sucursal_toma_muestras').modal('show');
        }

        function analisis_muestra() {
            $('#sucursal_analisis_muestra').modal('show');
        }
    </script>
@endsection
