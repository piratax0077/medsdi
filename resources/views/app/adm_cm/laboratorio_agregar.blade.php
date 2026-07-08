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
                            <h5 class="m-b-10 font-weight-bold">Laboratorios del centro médico</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="escritorio_admin_general_cm.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather       icon-home"></i></a></li>
                            <!--<li class="breadcrumb-item"><a href="sucursales_cm.php">Sucursales del centro médico</a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <div class="col-md-12">
                        <div class="row">
                           <div class="col-md-6 d-inline">
                                <h4 class="text-white f-20 mt-2 mb-1">Mis Laboratorios</h4>
                            </div>
                            <div class="col-md-6 d-inline">
                                <div class="float-right">
                                    <div class="btn-group mr-2">
                                        <button type="button" class="btn  btn-sm btn-outline-light" onclick="ag_laboratorio();"><i class="fa fa-plus" aria-hidden="true"></i> Agregar nuevo Laboratorio</button>
                                        <button type="button" class="btn  btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="agregar_desasociar ();">Desasociar o Agregar Laboratorio existente</button>
                                        </div>
                                    </div>
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
                    <table id="sucursales_cm" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                        <thead>
                                                                            <tr>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Rut</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Laboratorio</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Ubicación</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Tipo Laboratorio</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Ciudad</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Dirección</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Acción</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if (isset($laboratorios))
                                                                                @foreach ($laboratorios as $laboratorio)
                                                                                    <tr>
                                                                                        <td
                                                                                            class="align-middle text-left">
                                                                                            {{ $laboratorio->rut }}</td>
                                                                                        <td
                                                                                            class="align-middle text-left">
                                                                                            {{ $laboratorio->nombre }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="align-middle text-left">
                                                                                            {{ $laboratorio->ubicacion == 1 ? 'Laboratorio Físico' : 'Solo toma de muestra' }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="align-middle text-left">
                                                                                            {{ $laboratorio->tipo_sucursal_nombre }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="align-middle text-left">
                                                                                            {{ $laboratorio->ciudad }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="align-middle text-left">
                                                                                            {{ $laboratorio->direccion }}
                                                                                            {{ $laboratorio->numero_dir }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="align-middle text-left">
                                                                                            <button type="button"
                                                                                                class="btn btn-warning btn-icon"
                                                                                                onclick="dame_laboratorio_cm({{ $laboratorio->id }})"><i
                                                                                                    class="feather icon-edit"></i></button>
                                                                                            <button type="button"
                                                                                                class="btn btn-danger btn-icon"
                                                                                                onclick="eliminar_laboratorio_cm({{ $laboratorio->id }});"><i
                                                                                                    class="feather icon-x"></i></button>
                                                                                            <button type="button" class="btn btn-primary btn-icon" onclick="horario_laboratorio_cm({{ $laboratorio->id }});"><i class="feather icon-clock"></i></button>
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
<!--Modal nueva sucursal-->
<div id="nuevo_laboratorio_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="nuevo_laboratorio_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Agregar nuevo Laboratorio</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Nombre</label>
                                <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Nombre o Rut del administrador</label>
                                <input class="form-control form-control-sm" name="rut_admin" id="rut_admin" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Dirección / Calle</label>
                                <input class="form-control form-control-sm" name="direccion" id="direccion_lugar_atencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Número</label>
                                <input class="form-control form-control-sm" name="numero" id="numero_lugar_atencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Comuna</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione una opción</option>
                                    <optgroup label="Valparaíso">
                                        <option value="AL">Viña del Mar</option>
                                        <option value="LA">La Calera</option>
                                        <option value="VA">Valparaíso</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Correo Electrónico</label>
                                <input class="form-control form-control-sm" name="email" id="email" type="email">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Teléfono</label>
                                <input class="form-control form-control-sm" name="telefono_1" id="telefono_1" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Teléfono (opcional)</label>
                                <input class="form-control form-control-sm" name="telefono_2" id="telefono_2" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="not_pacientes_1">
                                    <label for="not_pacientes_1" class="cr"></label>
                                    <label>Notificar a pacientes</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger mb-0" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info mb-0" >Agregar nueva sucursal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal editar laboratorio-->
<div id="editar_laboratorio_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_laboratorio_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">
                    Editar Laboratorio
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Nombre</label>
                                <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Nombre o Rut del administrador</label>
                                <input class="form-control form-control-sm" name="rut_admin" id="rut_admin" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Dirección / Calle</label>
                                <input class="form-control form-control-sm" name="direccion" id="direccion_lugar_atencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Número</label>
                                <input class="form-control form-control-sm" name="numero" id="numero_lugar_atencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Comuna</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione una opción</option>
                                    <optgroup label="Valparaíso">
                                        <option value="AL">Viña del Mar</option>
                                        <option value="LA">La Calera</option>
                                        <option value="VA">Valparaíso</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Correo Electrónico</label>
                                <input class="form-control form-control-sm" name="email" id="email" type="email">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Teléfono</label>
                                <input class="form-control form-control-sm" name="telefono_1" id="telefono_1" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Teléfono (opcional)</label>
                                <input class="form-control form-control-sm" name="telefono_2" id="telefono_2" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="not_pacientes_1">
                                    <label for="not_pacientes_1" class="cr"></label>
                                    <label>Notificar a pacientes</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info" >Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal agregar o desasociar laboratorio existente-->
<div id="agregar_laboratorio_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_agregar_desasociar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center" id="">Desasociar o Agregar Laboratorio existente</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <table id="config_sucursal" class="display table table-striped table-hover dt-responsive nowrap text-center align-middle table-sm" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">Desasociar /Agregar</th>
                                    <th class="text-center align-middle">Nombre</th>
                                    <th class="text-center align-middle">Dirección</th>
                                    <th class="text-center align-middle">Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center align-middle">
                                        <div class="switch switch-success d-inline m-r-10">
                                            <input type="checkbox" id="agregar-1">
                                            <label for="agregar-1" class="cr"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <span><strong>Nombre de centro médico</strong></span><br>
                                        <span>72.378.384-2</span>
                                    </td>
                                    <td class="text-center align-middle">Villanelo,123,Viña del Mar</td>
                                    <td class="text-center align-middle">Laboratorio Cínico</td>
                                </tr>
                                <tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="not_pacientes_4">
                                <label for="not_pacientes_4" class="cr"></label>
                                <label>Notificar a pacientes modificación</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer mb-0 pb-0">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info" >Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<!--Modal Confgurar asistentes-->
<div id="editar_asistentes_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_asistentes_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center" id="nuevo_horario_atencion_titulo">Configurar Asistentes</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <h6 class="text-c-blue">Escriba rut de el o la asistente que desea asociar al centro médico</h6>
                        </div>
                        <div class="col-sm-12 col-md-12 mb-3">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" placeholder="Rut" aria-label="Rut" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                <button class="btn btn-success" type="button" id="button-addon2">Asociar</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3 mt-2">
                            <table id="config_asistentes" class="display table table-striped table-hover dt-responsive nowrap text-center align-middle table-sm" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Deshabilitar o Agregar</th>
                                        <th>Rut</th>
                                        <th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="asistentes_editar-1" checked="">
                                                    <label for="asistentes_editar-1" class="cr"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>00.000.000-0</td>
                                        <td>Pepita Sanchez</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="asistentes_editar-2" checked="">
                                                    <label for="asistentes_editar-2" class="cr"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>00.000.000-0</td>
                                        <td>Pepita Sanchez</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        <div class="modal-footer pt-2 mb-0 pb-0">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-info" >Guardar Cambios</button>
        </div>
     </div>
</div>
</div>

<!--Modal Horario de Atención-->
<div id="horario_atencion_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_horario_atencion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center" id="nuevo_horario_atencion_titulo">Configurar horario de atención</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="">
                    <div class="row">
                        <div class="col-sm-12">
                            <h6 class="text-c-blue mb-3">Horario de Atención</h6>
                        </div>
                        <div class="col-sm-12 mb-2">
                            <div class="form-group fill">
                                <label class="floating-label">Día </label>
                                <select name="dia" id="dia" class=" form-control form-control-sm">
                                    <option>Seleccione día</option>
                                    <option>Lunes</option>
                                    <option>Martes</option>
                                    <option>Miércoles</option>
                                    <option>Jueves</option>
                                    <option>Viernes</option>
                                    <option>Sábado</option>
                                    <option>Domingo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-2">
                            <div class="form-group fill">
                                <label class="floating-label">Desde </label>
                                <select name="horario" id="horario" class="form-control form-control-sm">
                                    <option>Seleccione horario</option>
                                    <option>8:00 am</option>
                                    <option>8:30 am</option>
                                    <option>9:00 am</option>
                                    <option>9:30 am</option>
                                    <option>10:00 am</option>
                                    <option>10:30 am</option>
                                    <option>11:00 am</option>
                                    <option>11:30 am</option>
                                    <option>12:00 pm</option>
                                    <option>12:30 pm</option>
                                    <option>13:00 pm</option>
                                    <option>13:30 pm</option>
                                    <option>14:00 pm</option>
                                    <option>14:30 pm</option>
                                    <option>15:00 pm</option>
                                    <option>15:30 pm</option>
                                    <option>16:00 pm</option>
                                    <option>16:30 pm</option>
                                    <option>17:00 pm</option>
                                    <option>17:30 pm</option>
                                    <option>18:00 pm</option>
                                    <option>18:30 pm</option>
                                    <option>19:00 pm</option>
                                    <option>19:30 pm</option>
                                    <option>20:00 pm</option>
                                    <option>20:30 pm</option>
                                    <option>21:00 pm</option>
                                    <option>21:30 pm</option>
                                    <option>22:00 pm</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-2">
                            <div class="form-group fill">
                                <label class="floating-label">Hasta </label>
                                <select name="horario" id="horario" class=" form-control form-control-sm">
                                    <option>Seleccione horario</option>
                                    <option>8:00 am</option>
                                    <option>8:30 am</option>
                                    <option>9:00 am</option>
                                    <option>9:30 am</option>
                                    <option>10:00 am</option>
                                    <option>10:30 am</option>
                                    <option>11:00 am</option>
                                    <option>11:30 am</option>
                                    <option>12:00 pm</option>
                                    <option>12:30 pm</option>
                                    <option>13:00 pm</option>
                                    <option>13:30 pm</option>
                                    <option>14:00 pm</option>
                                    <option>14:30 pm</option>
                                    <option>15:00 pm</option>
                                    <option>15:30 pm</option>
                                    <option>16:00 pm</option>
                                    <option>16:30 pm</option>
                                    <option>17:00 pm</option>
                                    <option>17:30 pm</option>
                                    <option>18:00 pm</option>
                                    <option>18:30 pm</option>
                                    <option>19:00 pm</option>
                                    <option>19:30 pm</option>
                                    <option>20:00 pm</option>
                                    <option>20:30 pm</option>
                                    <option>21:00 pm</option>
                                    <option>21:30 pm</option>
                                    <option>22:00 pm</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-2 text-center">
                            <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Agregar horario de atención</button>
                            <button type="button" class="btn btn-danger btn-sm" >Cancelar</button>
                        </div>
                        <div class="col-sm-12 mt-2 mb-2">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Día</th>
                                        <th class="text-center align-middle">Desde</th>
                                        <th class="text-center align-middle">Hasta</th>
                                        <th class="text-center align-middle">Borrar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">Lunes</td>
                                        <td class="text-center align-middle">08:00 am</td>
                                        <td class="text-center align-middle">13:30 pm</td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-danger btn-icon"><i class="feather icon-x"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">Miércoles</td>
                                        <td class="text-center align-middle">15:00 am</td>
                                        <td class="text-center align-middle">19:00 pm</td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-danger btn-icon"><i class="feather icon-x"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-info" >Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal Convenios (previsión)-->
<div id="convenios_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_convenios" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center" id="nuevo_horario_atencion_titulo">Convenios</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <h6 class="text-c-blue mb-2">Convenios</h6>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_7">
                                <label class="custom-control-label" for="convenio_7">Particular</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_1">
                                <label class="custom-control-label" for="convenio_1">Fonasa</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_0">
                                <label class="custom-control-label" for="convenio_0">Todas las Isapres</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_2">
                                <label class="custom-control-label" for="convenio_2">Banmédica</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_3">
                                <label class="custom-control-label" for="convenio_3">Colmena</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_7">
                                <label class="custom-control-label" for="convenio_7">Nueva Masvida</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_4">
                                <label class="custom-control-label" for="convenio_4">Consalud</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_5">
                                <label class="custom-control-label" for="convenio_5">Cruz Blanca</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_6">
                                <label class="custom-control-label" for="convenio_6">Cruz del Norte</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_7">
                                <label class="custom-control-label" for="convenio_7">Vida Tres</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_7">
                                <label class="custom-control-label" for="convenio_7">Fundación </label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_7">
                                <label class="custom-control-label" for="convenio_7">Isalud</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mb-0 pb-0">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-info" >Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- MODAL LABORATORIOS --}}
    <div id="a_laboratorio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_laboratorio"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Laboratorios</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Nombre</label>
                                    <input type="text" name="nombre_laboratorio" id="nombre_laboratorio"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Rut</label>
                                    <input type="text" name="rut_laboratorio" id="rut_laboratorio"
                                        oninput="formatoRut(this)" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <!-- radio button -->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check form-check-input" type="radio" name="tipo_lab"
                                            id="tipo_lab" value="1">
                                        <label class="form-check form-check-label" for="tipo_lab">Laboratorio
                                            Físico</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check form-check-input" type="radio" name="tipo_lab"
                                            id="tipo_lab" value="2">
                                        <label class="form-check form-check-label" for="tipo_lab">Solo toma de
                                            muestra</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tipo Laboratorio</label>
                                    <select name="tipo_laboratorio" id="tipo_laboratorio"
                                        class="form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        @if (isset($tipos_laboratorio))
                                            @foreach ($tipos_laboratorio as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Email</label>
                                    <input type="email" name="email_laboratorio" id="email_laboratorio"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Teléfono</label>
                                    <input type="text" name="telefono_laboratorio" id="telefono_laboratorio"
                                        class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Región</label>
                                    <select name="region_laboratorio" id="region_laboratorio"
                                        class="form-control form-control-sm" onchange="buscar_ciudad_laboratorio();">
                                        <option value="0">Seleccione</option>
                                        @if ($regiones)
                                            @foreach ($regiones as $reg)
                                                <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ciudad</label>
                                    <select name="ciudad_laboratorio" id="ciudad_laboratorio"
                                        class="form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Dirección</label>
                                    <input type="text" name="direccion_laboratorio" id="direccion_laboratorio"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">N°</label>
                                    <input type="text" name="numero_laboratorio" id="numero_laboratorio"
                                        class="form-control form-control-sm">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto" onclick="agregar_laboratorio()"><i
                            class="fas fa-plus"></i> Añadir</button>
                </div>

            </div>
        </div>
    </div>

    {{-- MODAL EDITAR LABORATORIO --}}
    <div id="editar_laboratorio" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="editar_laboratorio" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Editar laboratorio</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Nombre</label>
                                    <input type="text" name="editar_nombre_laboratorio"
                                        id="editar_nombre_laboratorio" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Rut</label>
                                    <input type="text" name="editar_rut_laboratorio" id="editar_rut_laboratorio"
                                        oninput="formatoRut(this)" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <!-- radio button -->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check form-check-input" type="radio"
                                            name="editar_tipo_lab" id="editar_tipo_lab" value="1">
                                        <label class="form-check form-check-label" for="editar_tipo_lab">Laboratorio
                                            Físico</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check form-check-input" type="radio"
                                            name="editar_tipo_lab" id="editar_tipo_lab" value="2">
                                        <label class="form-check form-check-label" for="editar_tipo_lab">Solo toma de
                                            muestra</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tipo Laboratorio</label>
                                    <select name="editar_tipo_laboratorio" id="editar_tipo_laboratorio"
                                        class="form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        @if (isset($tipos_laboratorio))
                                            @foreach ($tipos_laboratorio as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Correo electrónico</label>
                                    <input type="email" name="editar_email_laboratorio"
                                        id="editar_email_laboratorio" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Teléfono</label>
                                    <input type="text" name="editar_telefono_laboratorio"
                                        id="editar_telefono_laboratorio" class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Región</label>
                                    <select name="editar_region_laboratorio" id="editar_region_laboratorio"
                                        class="form-control form-control-sm"
                                        onchange="buscar_ciudad_laboratorio_editar();">
                                        <option value="0">Seleccione</option>
                                        @if ($regiones)
                                            @foreach ($regiones as $reg)
                                                <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ciudad</label>
                                    <select name="editar_ciudad_laboratorio" id="editar_ciudad_laboratorio"
                                        class="form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Dirección</label>
                                    <input type="text" name="editar_direccion_laboratorio"
                                        id="editar_direccion_laboratorio" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">N°</label>
                                    <input type="text" name="editar_numero_laboratorio"
                                        id="editar_numero_laboratorio" class="form-control form-control-sm">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto" onclick="editar_laboratorio()"><i
                            class="feather icon-save"></i> Guardar cambios</button>
                </div>

            </div>
        </div>
    </div>

    <div id="modal_editar_horario_atencion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_horario_atencion" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" id="nuevo_horario_atencion_titulo">Configurar horario de atenci&oacute;n</h5>
                    <button type="button" id="cerrar_modal_editar_horario_atencion" class="close text-white" onclick="" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="">
                        <input type="hidden" name="mi_horario_id_lab" id="mi_horario_id_lab">
                        <div class="form-row">
                            <div class="col-sm-12">
                                <h6 class="t-aten">Tipo de agenda</h6>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Seleccione </label>
                                    <select name="tipo_agenda_medica" id="tipo_agenda_medica" class="form-control form-control-sm" onclick="validar_tipo_agenda();">

                                        @if(isset($profesional) && $profesional->id_especialidad == 2)
                                            <option value="2">Atención Dental</option>
                                        @else
                                            <option value="0">Seleccione</option>
                                            <option value="1">Atención General</option>
                                            <option value="3">Atención Telemedicina</option>
                                            <option value="4">Exámenes</option>
                                            <option value="5">Procedimiento</option>
                                        @endif

                                    </select>
                                </div>
                            </div>
                            {{-- <div class="col-sm-12">
                                <h6 class="text-c-blue mb-3">Duraci&oacute;n</h6>
                            </div> --}}

                            <div class="col-sm-12 mb-1">
                                <h6 class="t-aten">Horario de Atenci&oacute;n</h6>
                            </div>
                            {{-- <div class="col-sm-6 mb-2">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Tipo Agenda </label>
                                    <select name="tipo_agenda_medica" id="tipo_agenda_medica" class=" form-control" onclick="validar_tipo_agenda();">
                                        <option value="0">Seleccione tipo de agenda</option>
                                        <option value="1">Atención General</option>
                                        <option value="2">Atención Dental</option>
                                        <option value="3">Atención Telemedicina</option>
                                        <option value="4">Exámenes</option>
                                        <option value="5">Procedimiento</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Duraci&oacute;n de Consultas M&eacute;dicas </label>
                                    <select name="duracion_horario" id="duracion_horario" class=" form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        <option value="00:15:00">15 minutos</option>
                                        <option value="00:30:00">30 minutos</option>
                                        <option value="00:45:00">45 minutos</option>
                                        <option value="01:00:00">60 minutos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Día de atención</label>
                                    <select name="dia_horario" id="dia_horario" class=" form-control form-control-sm">
                                        <option value="0" selected>Seleccione</option>
                                        <option value="1">Lunes</option>
                                        <option value="2">Martes</option>
                                        <option value="3">Mi&eacute;rcoles</option>
                                        <option value="4">Jueves</option>
                                        <option value="5">Viernes</option>
                                        <option value="6">S&aacute;bado</option>
                                        <option value="7">Domingo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Desde </label>
                                    <select name="hora_inicio_horario" id="hora_inicio_horario" class=" form-control form-control-sm">
                                        <option value="0">Seleccione horario</option>
                                        <option value="08:00">08:00</option>
                                        <option value="08:30">08:30</option>
                                        <option value="09:00">09:00</option>
                                        <option value="09:30">09:30</option>
                                        <option value="10:00">10:00</option>
                                        <option value="10:30">10:30</option>
                                        <option value="11:00">11:00</option>
                                        <option value="11:30">11:30</option>
                                        <option value="12:00">12:00</option>
                                        <option value="12:30">12:30</option>
                                        <option value="13:00">13:00</option>
                                        <option value="13:30">13:30</option>
                                        <option value="14:00">14:00</option>
                                        <option value="14:30">14:30</option>
                                        <option value="15:00">15:00</option>
                                        <option value="15:30">15:30</option>
                                        <option value="16:00">16:00</option>
                                        <option value="16:30">16:30</option>
                                        <option value="17:00">17:00</option>
                                        <option value="17:30">17:30</option>
                                        <option value="18:00">18:00</option>
                                        <option value="18:30">18:30</option>
                                        <option value="19:00">19:00</option>
                                        <option value="19:30">19:30</option>
                                        <option value="20:00">20:00</option>
                                        <option value="20:30">20:30</option>
                                        <option value="21:00">21:00</option>
                                        <option value="21:30">21:30</option>
                                        <option value="22:00">22:00</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Hasta </label>
                                    <select name="hora_termino_horario" id="hora_termino_horario" class=" form-control form-control-sm">
                                        <option value="0">Seleccione horario</option>
                                        <option value="08:00">08:00</option>
                                        <option value="08:30">08:30</option>
                                        <option value="09:00">09:00</option>
                                        <option value="09:30">09:30</option>
                                        <option value="10:00">10:00</option>
                                        <option value="10:30">10:30</option>
                                        <option value="11:00">11:00</option>
                                        <option value="11:30">11:30</option>
                                        <option value="12:00">12:00</option>
                                        <option value="12:30">12:30</option>
                                        <option value="13:00">13:00</option>
                                        <option value="13:30">13:30</option>
                                        <option value="14:00">14:00</option>
                                        <option value="14:30">14:30</option>
                                        <option value="15:00">15:00</option>
                                        <option value="15:30">15:30</option>
                                        <option value="16:00">16:00</option>
                                        <option value="16:30">16:30</option>
                                        <option value="17:00">17:00</option>
                                        <option value="17:30">17:30</option>
                                        <option value="18:00">18:00</option>
                                        <option value="18:30">18:30</option>
                                        <option value="19:00">19:00</option>
                                        <option value="19:30">19:30</option>
                                        <option value="20:00">20:00</option>
                                        <option value="20:30">20:30</option>
                                        <option value="21:00">21:00</option>
                                        <option value="21:30">21:30</option>
                                        <option value="22:00">22:00</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-2">
                                <button type="button" onclick="mi_horario_agregar();" class="btn btn-info btn-sm float-md-right" data-dismiss="modal"><i class="fa fa-plus"></i> Agregar horario de atención</button>
                                {{-- <button type="button" id="cerrar_modal_horario2" class="btn btn-danger btn-sm">Cancelar</button> --}}
                            </div>
                            <div class="col-sm-12 mt-2 mb-2">
                                <table id="mi_horario_table" class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">Agenda</th>
                                            <th class="align-middle">Desde</th>
                                            <th class="align-middle">Hasta</th>
                                            <th class="align-middle">D&iacute;a</th>
                                            <th class="text-center align-middle">Acci&oacute;n</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
                <!--<div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="cerrar_modal_horario">Cancelar</button>
                    <button type="button" class="btn btn-info" id="cerrar_modal_horario1">Cerrar</button>
                </div>-->
            </div>
        </div>
    </div>
@endsection
@section('page-script')
<script type="text/javascript">
    function agregar_laboratorio() {
        let nombre_laboratorio = $('#nombre_laboratorio').val();
        let rut_laboratorio = $('#rut_laboratorio').val();
        let email_laboratorio = $('#email_laboratorio').val();
        let telefono_laboratorio = $('#telefono_laboratorio').val();
        let tipo_laboratorio = $('#tipo_laboratorio').val();
        let direccion_laboratorio = $('#direccion_laboratorio').val();
        let numero_laboratorio = $('#numero_laboratorio').val();
        let region = $('#region_laboratorio').val();
        let ciudad = $('#ciudad_laboratorio').val();
        // obtenemos el valor del radio button con id tipo_lab
        let ubicacion = $("input[name='tipo_lab']:checked").val();
        let id_institucion = $('#id_institucion').val();
        let id_responsable = $('#responsable_laboratorio').val();
        let id_lugar_atencion = $('#add_empleado_id_lugar_atencion').val();

        let valido = 1;
        let mensaje = '';
        // validar campos
        if (nombre_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Nombre</li>';
        }
        if (rut_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Rut</li>';
        }
        if (email_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Email</li>';
        }
        if (telefono_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Teléfono</li>';
        }
        if (tipo_laboratorio == '' || tipo_laboratorio == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido Tipo</li>';
        }
        if (direccion_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Dirección</li>';
        }
        if (region == '' || region == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido Región</li>';
        }
        if (ciudad == '' || ciudad == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido Ciudad</li>';
        }
        if (numero_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Número</li>';
        }
        if (ubicacion == '' || ubicacion == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido Ubicación</li>';
        }
        if (id_responsable == '' || id_responsable == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido Responsable</li>';
        }

        if (valido == 1) {
            let data = {
                nombre_laboratorio: nombre_laboratorio,
                rut_laboratorio: rut_laboratorio,
                email_laboratorio: email_laboratorio,
                telefono_laboratorio: telefono_laboratorio,
                tipo_laboratorio: tipo_laboratorio,
                direccion_laboratorio: direccion_laboratorio,
                numero_laboratorio: numero_laboratorio,
                region_laboratorio: region,
                ciudad_laboratorio: ciudad,
                ubicacion: ubicacion,
                id_institucion: id_institucion,
                id_responsable: id_responsable,
                id_lugar_atencion: id_lugar_atencion,
                _token: CSRF_TOKEN,
            }

            let url = "{{ route('laboratorio.agregar_laboratorio') }}";

            $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                })
                .done(function(data) {
                    console.log(data);
                    if (data != null) {
                        if (data.estado == 1) {
                            swal({
                                title: "Laboratorio",
                                text: "Laboratorio Ingresado Correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                            $('#tabla_laboratorios').empty();
                            $('#tabla_laboratorios').append(data.v);
                            // cerrar modal
                            $('#a_laboratorio').modal('hide');
                            limpiar_formulario_laboratorio();
                        } else {
                            swal({
                                title: "Error",
                                text: "Error al cargar ingresar laboratorio",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                        }
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar laboratorio",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                })
        } else {
            swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }

    }

    function limpiar_formulario_laboratorio() {
        $('#nombre_laboratorio').val('');
        $('#rut_laboratorio').val('');
        $('#email_laboratorio').val('');
        $('#telefono_laboratorio').val('');
        $('#tipo_laboratorio').val('');
        $('#direccion_laboratorio').val('');
        $('#numero_laboratorio').val('');
        $('#region_laboratorio').val('');
        $('#ciudad_laboratorio').val('');
        $('#ubicacion').val('');
        $('#responsable_laboratorio').val('');
    }

    function limpiar_formulario_laboratorio_editar() {
        $('#editar_nombre_laboratorio').val('');
        $('#editar_rut_laboratorio').val('');
        $('#editar_email_laboratorio').val('');
        $('#editar_telefono_laboratorio').val('');
        $('#editar_tipo_laboratorio').val('');
        $('#editar_direccion_laboratorio').val('');
        $('#editar_numero_laboratorio').val('');
        $('#editar_region_laboratorio').val('');
        $('#editar_ciudad_laboratorio').val('');
        $('#editar_ubicacion').val('');
        $('#editar_responsable_laboratorio').val('');
    }

    function buscar_ciudad_laboratorio(id_ciudad = 0) {

        let region = $('#region_laboratorio').val();
        let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    region: region,
                },
            }).done(function(data) {
                console.log(data);
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#ciudad_laboratorio');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="0">seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                    if (id_ciudad != 0)
                        ciudades.val(id_ciudad);

                } else {

                    swal({
                        title: "Error",
                        text: "Error al cargar las ciudades",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('No se pudo Cargar las ciudades');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });


    };

    function buscar_ciudad_laboratorio_editar(id_ciudad = 0) {

        let region = $('#editar_region_laboratorio').val();
        let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    region: region,
                },
            }).done(function(data) {
                console.log(data);
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#editar_ciudad_laboratorio');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="0">seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                    if (id_ciudad != 0)
                        ciudades.val(id_ciudad);

                } else {

                    swal({
                        title: "Error",
                        text: "Error al cargar las ciudades",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('No se pudo Cargar las ciudades');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });


    };

    function eliminar_laboratorio_cm(id) {
        swal({
                title: "Eliminar Laboratorio",
                text: "¿Está seguro que desea eliminar el laboratorio?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                DangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    confirmar_eliminar_laboratorio_cm(id);
                }
            });
    }

    function confirmar_eliminar_laboratorio_cm(id) {
        let data = {
            id: id,
            id_institucion: $('#id_institucion').val(),
            _token: CSRF_TOKEN,
        };
        let url = "{{ route('laboratorio.eliminar_laboratorio_cm') }}";
        $.ajax({
                url: url,
                type: "post",
                data: data,
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    if (data.estado == 1) {
                        $('#tabla_laboratorios').empty();
                        $('#tabla_laboratorios').append(data.v);
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar laboratorio",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                } else {
                    swal({
                        title: "Error",
                        text: "Error al cargar ingresar laboratorio",
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
    function dame_laboratorio_cm(id_laboratorio) {
        // Construye la URL con la id adjunta
        var url = "{{ url('Laboratorio/dame_laboratorio') }}/" + id_laboratorio;
        $.ajax({
                url: url,
                type: "get",
            })
            .done(function(data) {
                // abrir modal
                $('#editar_laboratorio').modal('show');
                console.log(data);
                if (data != null) {
                    $('#editar_nombre_laboratorio').val(data.nombre);
                    $('#editar_rut_laboratorio').val(data.rut);
                    $('#editar_email_laboratorio').val(data.email);
                    $('#editar_telefono_laboratorio').val(data.telefono);
                    $('#editar_tipo_laboratorio').val(data.tipo_sucursal);
                    // checkear radio button
                    $("input[name='editar_tipo_lab']:checked").prop('checked', false);
                    $("input[name='editar_tipo_lab'][value='" + data.ubicacion + "']").prop('checked', true);
                    $('#editar_direccion_laboratorio').val(data.direccion);
                    $('#editar_numero_laboratorio').val(data.numero_dir);
                    $('#editar_region_laboratorio').val(data.id_region);
                    buscar_ciudad_laboratorio_editar(data.id_ciudad);
                    $('#editar_ubicacion').val(data.ubicacion);
                    $('#editar_responsable_laboratorio option:selected').removeAttr('selected');
                    $('#editar_responsable_laboratorio option[value="' + data.id_responsable + '"]').attr(
                        'selected', 'selected');
                    $('#id_laboratorio').val(data.id);
                } else {
                    swal({
                        title: "Error",
                        text: "Error al cargar ingresar laboratorio",
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

    function horario_laboratorio_cm(id){
        $('#modal_editar_horario_atencion').modal('show');
        $('#mi_horario_id_lab').val(id);
        mi_horario_lab(id);
    }

    function mi_horario_lab(id) {
        let id_lab = id;
        let url = "{{ route('laboratorio.mi_horario_lab') }}";

        $('#mi_horario_table tbody').empty();
        $('#duracion_horario').val(0);
        $('#tipo_agenda_medica').val(0);
        $('#dia_horario').val(0);
        $('#hora_inicio_horario').val(0);
        $('#hora_termino_horario').val(0);

        $.ajax({
            url: url,
            type: "get",
            data: {
                //_token: _token,
                id_lab: id_lab,
            },
        })
        .done(function(data) {


            if (data != null) {

                data = JSON.parse(data);
                console.log(data);

                $('#modal_editar_horario_atencion').modal('show');
                $('#mi_horario_id_lugar_atencion').val(id);
                for (i = 0; i < data.length; i++) {

                    let id = data[i].id;
                    let hora_inicio = data[i].hora_inicio;
                    let hora_termino = data[i].hora_termino;
                    let id_lugar_atencion = data[i].id_lugar_atencion;
                    let dia = '';
                    dias = data[i].dia.split(',');
                    for (let i = 0; i < dias.length; i++) {
                        if (dias[i] == 1) {

                            dia += 'Lunes '
                        } else if (dias[i] == 2) {
                            dia += 'Martes '

                        } else if (dias[i] == 3) {

                            dia += 'Miercoles '
                        } else if (dias[i] == 4) {
                            dia += 'Jueves '

                        } else if (dias[i] == 5) {
                            dia += 'Viernes '

                        }else if(dias[i] == 6) {
                            dia += 'Sábado '
                        }
                    }

                    let j = 1; //contador para asignar id al boton que borrara la fila
                    let fila = '<tr class="tr_horario" id="row' + j +
                        '"><td class="text-center align-middle">PROCEDIMIENTOS</td> <td class="text-center align-middle">' +
                        hora_inicio + '</td><td class="text-center align-middle">' +
                        hora_termino + '</td><td class="text-center align-middle">' +
                        dia + '</td><td class="text-center align-middle">' +
                        '<input class="btn btn-danger btn-sm btn-icon" title="Eliminar día" type="button" id="btn_eliminar_dia" name="btn_eliminar_dia" onclick="eliminar_dia_horario(' +
                        id + ',' + id_lugar_atencion + ' );" value="X" > </td>' +
                        '</tr>'; //esto seria lo que contendria la fila

                    j++;

                    $('#mi_horario_table tbody').append(fila);

                }

            } else {
                alert('No se pudo Confirmar Reserva');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    };

    function eliminar_dia_horario(id, id_lugar_atencion) {

        let id_horario = id;
        let lugar_atencion = id_lugar_atencion;
        let token = CSRF_TOKEN;
        let tipo = "laboratorio";
        let url = "{{ route('profesional.eliminar_horario_agenda') }}";

        console.log(id_horario, lugar_atencion, token);

        $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: CSRF_TOKEN,
                    id_horario: id_horario,
                    id_lugar_atencion: lugar_atencion,
                    tipo: tipo
                },
            })
            .done(function(response) {
                console.log(response);
                if (response.success) {
                    swal({
                        title: "Horario Eliminado correctamente",
                        icon: "success",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })

                    $('#modal_editar_horario_atencion').modal('hide');
                    mi_horario_lugar_atencion(lugar_atencion);

                    // $('#table_alergias_paciente tbody').empty();
                    // for (i = 0; i < response.alergias.length; i++) {

                    //     // var fecha = formatDate(data[i].created_at);
                    //     //var salida = formato(fecha);
                    //     var nombre_alergia = response.alergias[i].nombre_alergia;
                    //     // var tipo = data[i].tipo_examen;
                    //     // var prioridad = data[i].id_prioridad;

                    //     var j = 1; //contador para asignar id al boton que borrara la fila
                    //     var fila = '<tr class="tr_alergias_paciente" id="row' + j + '"><td>' +
                    //         nombre_alergia + '</td><td>' +
                    //         'botones' +
                    //         '</td></tr>'; //esto seria lo que contendria la fila

                    //     j++;

                    //     $('#table_alergias_paciente tbody').append(fila);

                    // }


                    // $('#agregar_alergia_paciente').modal('hide');
                    // $('#alergia_paciente_' + paciente).append(response.alergia);
                } else {
                    swal({
                        title: "Error al agregar alergia",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                }

                return response;

                // $('#sub_tipo_examen').append(
                //     `<option value="0">Seleccione... </option>`);
                // for (var i = 0; i < response.length; i++) {
                //     $('#sub_tipo_examen').append(`<option value="${response[i].id}">
            //                 ${response[i].nombre}
            //             </option>`);
                // }
            })
            .fail(function() {
                console.log("error");
            })


    }

    function editar_laboratorio() {
        let nombre_laboratorio = $('#editar_nombre_laboratorio').val();
        let rut_laboratorio = $('#editar_rut_laboratorio').val();
        let email_laboratorio = $('#editar_email_laboratorio').val();
        let telefono_laboratorio = $('#editar_telefono_laboratorio').val();
        let tipo_laboratorio = $('#editar_tipo_laboratorio').val();
        let direccion_laboratorio = $('#editar_direccion_laboratorio').val();
        let numero_laboratorio = $('#editar_numero_laboratorio').val();
        let region = $('#editar_region_laboratorio').val();
        let ciudad = $('#editar_ciudad_laboratorio').val();
        // obtenemos el valor del radio button con id tipo_lab
        let ubicacion = $("input[name='editar_tipo_lab']:checked").val();
        let id_institucion = $('#id_institucion').val();
        let id_responsable = $('#editar_responsable_laboratorio').val();
        let id_lugar_atencion = $('#add_empleado_id_lugar_atencion').val();
        let id_laboratorio = $('#id_laboratorio').val();

        let valido = 1;
        let mensaje = '';
        // validar campos
        if (nombre_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Nombre</li>';
        }
        if (rut_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Rut</li>';
        }
        if (email_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Email</li>';
        }
        if (telefono_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Teléfono</li>';
        }
        if (tipo_laboratorio == '' || tipo_laboratorio == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido Tipo</li>';
        }
        if (direccion_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Dirección</li>';
        }
        if (region == '' || region == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido Región</li>';
        }
        if (ciudad == '' || ciudad == 0 || ciudad == null) {
            valido = 0;
            mensaje += '<li>Campo requerido Ciudad</li>';
        }
        if (numero_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Número</li>';
        }
        if (ubicacion == '' || ubicacion == 0 || ubicacion == null) {
            valido = 0;
            mensaje += '<li>Campo requerido Ubicación</li>';
        }
        if (id_responsable == '' || id_responsable == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido Responsable</li>';
        }

        if (valido == 1) {
            let data = {
                nombre_laboratorio: nombre_laboratorio,
                rut_laboratorio: rut_laboratorio,
                email_laboratorio: email_laboratorio,
                telefono_laboratorio: telefono_laboratorio,
                tipo_laboratorio: tipo_laboratorio,
                direccion_laboratorio: direccion_laboratorio,
                numero_laboratorio: numero_laboratorio,
                region_laboratorio: region,
                ciudad_laboratorio: ciudad,
                ubicacion: ubicacion,
                id_institucion: id_institucion,
                id_responsable: id_responsable,
                id_lugar_atencion: id_lugar_atencion,
                id_laboratorio: id_laboratorio,
                _token: CSRF_TOKEN,
            }

            console.log(data);

            let url = "{{ route('laboratorio.editar_laboratorio') }}";

            $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                })
                .done(function(data) {
                    console.log(data);
                    if (data != null) {
                        if (data.estado == 1) {
                            swal({
                                title: "Laboratorio",
                                text: "Laboratorio Actualizado Correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                            $('#tabla_laboratorios').empty();
                            $('#tabla_laboratorios').append(data.v);
                            // cerrar modal
                            $('#editar_laboratorio').modal('hide');
                            $('#tabla_laboratorios').empty();
                            $('#tabla_laboratorios').append(data.v);
                            limpiar_formulario_laboratorio_editar();
                        } else {
                            swal({
                                title: "Error",
                                text: "Error al cargar ingresar laboratorio",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                        }
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar laboratorio",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                })
        } else {
            swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }

    }

    function mi_horario_agregar() {

                let id_lab = $('#mi_horario_id_lab').val();
                let url = "{{ route('laboratorio.mi_horario_lab_agregar') }}";
                let duracion = $('#duracion_horario').val();
                let tipo = $('#tipo_agenda_medica').val();
                if (tipo == 0) {
                    $('#modal_editar_horario_atencion').modal('hide');
                    swal({
                        title: "Error",
                        text: "Debe ingresar un tipo de agenda",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    }).then(function(){
                        $('#modal_editar_horario_atencion').modal('show');
                    });


                    return;
                }
                if (duracion == 0) {
                    $('#modal_editar_horario_atencion').modal('hide');
                    swal({
                        title: "Error",
                        text: "Debe ingresar una duracion",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    }).then(function(){
                        $('#modal_editar_horario_atencion').modal('show');
                    });

                    return;
                }

                let dia = $('#dia_horario').val();
                if (dia == 0) {
                    $('#modal_editar_horario_atencion').modal('hide');
                    swal({
                        title: "Error",
                        text: "Debe ingresar un dia",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    }).then(function(){
                        $('#modal_editar_horario_atencion').modal('show');
                    });
                    // alert('no selecciono dia de consulta');
                    return;
                }
                let hora_inicio = $('#hora_inicio_horario').val();
                if (hora_inicio == 0) {
                    $('#modal_editar_horario_atencion').modal('hide');
                    swal({
                        title: "Error",
                        text: "Debe ingresar una hora de inicio",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    }).then(function(){
                        $('#modal_editar_horario_atencion').modal('show');
                    });
                    // alert('no selecciono hora de inicio de consulta');
                    return;
                }
                let hora_termino = $('#hora_termino_horario').val();
                if (hora_termino == 0) {
                     $('#modal_editar_horario_atencion').modal('hide');
                    swal({
                        title: "Error",
                        text: "Debe ingresar una hora de termino",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    }).then(function(){
                        $('#modal_editar_horario_atencion').modal('show');
                    });
                    // alert('no selecciono hora de termino de consulta');
                    return;
                }
                let tipo_agenda_medica = $('#tipo_agenda_medica').val();


                $.ajax({

                        url: url,
                        type: "get",
                        data: {
                            //_token: _token,
                            id_lab: id_lab,
                            duracion: duracion,
                            dia: dia,
                            hora_inicio: hora_inicio,
                            hora_termino: hora_termino,
                            tipo_agenda_medica: tipo_agenda_medica,
                        },
                    })
                    .done(function(data) {
                        console.log(data);
                        if (data == 'Failed') {
                            swal({
                                title: "Error",
                                text: "Error, horario ya se encuentra registrado",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                            // alert('Horario Topa con otro')
                        }

                        if (data != null) {
                            data = JSON.parse(data);
                            console.log(data);

                            $('#modal_editar_horario_atencion').modal('hide');
                            mi_horario_lab(id_lab);

                        } else {
                            swal({
                                title: "Error",
                                text: "No se pudo Confirmar Reserva",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                            // alert('No se pudo Confirmar Reserva');
                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
        };

             /** validar tipo agenda */
        function validar_tipo_agenda()
        {
            var valor = $('#tipo_agenda_medica').val();
            if(valor == 5 || valor == 2)
            {
                $('#duracion_horario').val('00:15:00');
                $('#duracion_horario').attr('disabled', true);
            }
            else
            {
                $('#duracion_horario').val('0');
                $('#duracion_horario').attr('disabled', false);
            }
        }

        function ag_laboratorio() {
            $('#a_laboratorio').modal('show');
        }

    function nueva_sucursal (){
        $('#nuevo_laboratorio_cm').modal('show');
    }

    function agregar_desasociar (){
        $('#agregar_laboratorio_cm').modal('show');
    }

    function editar_laboratorio (){
        $('#editar_laboratorio_cm').modal('show');
    }

    function editar_asistentes (){
        $('#editar_asistentes_cm').modal('show');
    }

    function horario_atencion (){
        $('#horario_atencion_cm').modal('show');
    }

    function convenios (){
        $('#convenios_cm').modal('show');
    }


    </script>

    <!--Tabla-->
    <script>
        $(document).ready(function() {
            $('#sucursales_cm').DataTable({
                responsive: true,
            });
        });
        $(document).ready(function() {
            $('#config_asistentes').DataTable({
                responsive: true,
            });
        });
        $(document).ready(function() {
            $('#config_sucursal').DataTable({
                responsive: true,
            });
        });
    </script>
@endsection
