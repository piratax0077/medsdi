@extends('template.profesional.template')
@section('content')

<div class="pcoded-main-container">
	<div class="pcoded-content">
		<!--Header-->
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<h5 class="m-b-10">Atenciones Realizadas</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="{{ route('profesional.pacientes') }}" data-toggle="tooltip" data-placement="top" title="Volver a mis pacientes">Mis pacientes</a></li>
							<li class="breadcrumb-item"><a href="#">Atenciones Realizadas</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--Cierre: Header-->
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12 pb-4">
								<!-- inculde -->
								<?php $fade = 'in'; $titulo = 'NO'; ?>
								@include(  '../../../atencion_medica.formularios.atenciones_previas_form' );

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{{--
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Atenciones Previas</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('profesional.pacientes') }}"
                                        data-toggle="tooltip" data-placement="top" title="Volver a mis pacientes">Mis
                                        pacientes</a></li>
                                <li class="breadcrumb-item"><a href="#">Atenciones previas</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <h4 class="text-c-blue f-20 d-inline ml-4 my-1 py-1">Atenciones previas
                                    </h4>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 pb-4">
                                    <table id="tabla-1"
                                        class="display table table-striped table-hover dt-responsive nowrap pb-4"
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

                                            @if (isset($fichas) && count($fichas) > 0)
                                                @foreach ($fichas as $f)
                                                    <tr>

                                                        <td class="text-center align-middle">
                                                            {{ \Carbon\Carbon::parse($f->created_at)->format('d/m/Y') }}
                                                        </td>

                                                        <td class="text-center align-middle">
                                                            {{ $f->hipotesis_diagnostico }}</td>

                                                        <td class="text-center align-middle">
                                                            <button href="#!" class="btn btn-danger btn-sm"
                                                                @if (isset($f->id)) onclick="buscar_receta({{ $f->id }});" @endif>
                                                                <i class="feather icon-file-plus"></i>Ver Receta
                                                            </button>
                                                        </td>

                                                        <td class="text-center align-middle">
                                                            <button href="#!" class="btn btn-secondary btn-sm"
                                                                @if (isset($f->id)) onclick="buscar_examenes({{ $f->id }});" @endif>
                                                                <i class="feather icon-file-plus"></i>Ver Exámenes
                                                            </button>
                                                        </td>

                                                        <td class="text-center align-middle">
                                                            <button href="#!" class="btn btn-success btn-sm"
                                                                data-toggle="modal" data-target="#m_cons_archivos"><i
                                                                    class="feather icon-folder"></i>Ver
                                                                Archivos</button>
                                                        </td>

                                                        <form></form>
                                                        <td class="text-center align-middle">
                                                            <button type="button" class="btn btn-info btn-sm"
                                                                data-toggle="modal"
                                                                onclick="ver_ficha_atencion({{ $f->id }});"><i
                                                                    class="feather icon-file-text"></i>Ver
                                                                Ficha</button>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            @else
                                                <span>
                                                    <h5>no existen registros</h5>
                                                </span>
                                            @endif

                                        </tbody>
                                    </table>

                                    <div id="m_consultaant" class="modal fade" tabindex="-1" role="dialog"
                                        aria-labelledby="m_consultaantLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-info">
                                                    <h5 class="modal-title text-white" id="m_consultaantLabel"
                                                        style="font-size: 1.3rem; color: #3366CC;">Registro de Consulta N°
                                                        <span id="num_consulta"></span>
                                                    </h5>

                                                    <button type="button" class="close"
                                                        onclick="cerrar_modal_ver_ficha();" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">

                                                        <div class=" form-group row">
                                                            <h5 class="text-c-blue mt-5 mb-4" style="font-size: 1.1rem;">
                                                                Datos Generales
                                                            </h5>
                                                            <div class="row col-md-12">
                                                                <div class="row col-md-5">
                                                                    <label for="ExFísico">
                                                                        <h5><b>Examen Físico: </b></h5>
                                                                    </label>
                                                                </div>
                                                                <div class="row col-md-7">

                                                                    <span id="ver_examen_fisico">
                                                                        <h5></h5>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="row col-md-12">
                                                                <div class="row col-md-5">
                                                                    <label for="ExFísico">
                                                                        <h5><b>Motivo de Consulta: </b></h5>
                                                                    </label>
                                                                </div>
                                                                <div class="row col-md-7">

                                                                    <span id="ver_motivo">
                                                                        <h5> </h5>
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
                                                                    <span id="ver_antecedentes">
                                                                        <h5></h5>
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
                                                                    <span id="ver_diagnostico">
                                                                        <h5></h5>
                                                                    </span>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class=" form-group row">

                                                        </div>

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="cerrar_modal_ver_ficha();">Cerrar</button>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="m_cons_ex" class="modal fade" tabindex="-1" role="dialog"
                                        aria-labelledby="m_cons_exLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-info">
                                                    <h5 class="modal-title text-white" id="m_cons_exLabel"
                                                        style="font-size: 1.3rem; color: #3366CC;">Examenes Solicitados
                                                        el.... </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
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
                                                    </form>
                                                    <!--fin autollenado-->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="m_cons_receta" class="modal fade" tabindex="-1" role="dialog"
                                        aria-labelledby="m_cons_recetaLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-info">
                                                    <h5 class="modal-title text-white" id="id_ficha_receta"
                                                        style="font-size: 1.3rem; color: #3366CC;"> </h5>

                                                    <button type="button" onclick="cerrar_modal_receta();"
                                                        class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <table id="tabla_receta"
                                                            class="display table table-striped table-hover dt-responsive nowrap pb-4"
                                                            style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center align-middle">Fecha</th>
                                                                    <th class="text-center align-middle">Medicamento</th>
                                                                    <th class="text-center align-middle">Dosis</th>
                                                                    <th class="text-center align-middle">Frecuencia</th>
                                                                    <th class="text-center align-middle">Uso</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </form>
                                                    <!--fin autollenado-->
                                                    <div class="modal-footer">
                                                        <button type="button" onclick="cerrar_modal_receta();"
                                                            class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="m_cons_examen" class="modal fade" tabindex="-1" role="dialog"
                                        aria-labelledby="m_cons_examenLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-info">
                                                    <h5 class="modal-title text-white" id="id_ficha_examen"
                                                        style="font-size: 1.3rem; color: #3366CC;"> </h5>

                                                    <button type="button" onclick="cerrar_modal_examen()"
                                                        class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <table id="tabla_examen_paciente"
                                                            class="display table table-striped table-hover dt-responsive nowrap pb-4"
                                                            style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center align-middle">Fecha</th>
                                                                    <th class="text-center align-middle">Tipo</th>
                                                                    <th class="text-center align-middle">Nombre</th>
                                                                    <th class="text-center align-middle">Prioridad</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>

                                                        </table>
                                                    </form>
                                                    <!--fin autollenado-->
                                                    <div class="modal-footer">
                                                        <button type="button" onclick="cerrar_modal_examen()"
                                                            class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 --}}
@endsection
