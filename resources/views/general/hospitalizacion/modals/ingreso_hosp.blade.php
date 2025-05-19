<div id="ingreso_m_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ingreso_m_modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine"> Solicitud de hospitalización </h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close" onclick="cerrarihosp();"><span aria-hidden="true">×</span></button>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <script>
                                var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                    "Octubre", "Noviembre", "Diciembre");

                                var f = new Date();
                                document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                            </script>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="info_hospitalizacion-tab" data-toggle="tab"
                                        href="#info_hospitalizacion" role="tab" aria-controls="info_hospitalizacion"
                                        aria-selected="true">Info. Hospitalización</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="info-ingreso-hosp-tab"
                                        data-toggle="tab" href="#info-ingreso-hosp" role="tab"
                                        aria-controls="info-ingreso-hosp" aria-selected="true">Info. Ingreso</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="indicaciones-hosp-tab" data-toggle="tab"
                                        href="#indicaciones-hosp" role="tab" aria-controls="indicaciones-hosp"
                                        aria-selected="false">Indicaciones ingreso</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="archivos-hosp-pab-tab" data-toggle="tab"
                                        href="#archivos-hosp-pab" role="tab" aria-controls="archivos-hosp-pab"
                                        aria-selected="false">Archivos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="comentarios-hosp-pab-tab" data-toggle="tab"
                                        href="#comentarios-hosp-pab" role="tab" aria-controls="comentarios-hosp-pab"
                                        aria-selected="false">Comentarios</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="info-ingreso">
                                <!--INFO HOSPITALIZACIÓN-->
                                <div class="tab-pane fade show" id="info_hospitalizacion" role="tabpanel"
                                    aria-labelledby="info_hospitalizacion-tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten">Detalle hospitalización</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Hospitalizar en:</label>
                                                <select name="hospen" id="hospen" data-titulo="Hospitalización"
                                                    class="form-control form-control-sm"
                                                    onchange="evaluar_para_carga_detalle('hospen','div_detalle_hospen','obs_hospen',3);">
                                                    <option value="1" selected>Clínica</option>
                                                    <option value="2">Hospital</option>
                                                    <option value="3">Otro (Describir)</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_detalle_hospen" style="display:none">
                                                <label class="floating-label-activo-sm">Otro lugar (Describir)</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"
                                                    onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hospen" id="obs_hospen"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Nombre de la
                                                    Institución</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Hospitalizar" rows="1"
                                                    onfocus="this.rows=2" onblur="this.rows=1;" name="nom_inst" id="nom_inst"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Servicio</label>
                                                <select name="hosp_enserv" id="hosp_enserv"
                                                    data-titulo="Es Urgencia Qx.?"
                                                    class="form-control form-control-sm"
                                                    onchange="evaluar_para_carga_detalle('hosp_enserv','div_detalle_hosp_enserv','obs_hosp_enserv',4);">
                                                    <option value="1" selected>Servicio Urgencia</option>
                                                    <option value="2">Sala</option>
                                                    <option value="3">UTI</option>
                                                    <option value="4">Otro</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_detalle_hosp_enserv" style="display:none">
                                                <label class="floating-label-activo-sm">Otro Servicio
                                                    (Describir)</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"
                                                    onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hosp_enserv" id="obs_hosp_enserv"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Motivo</label>
                                                <select name="motivo_hosp" id="motivo_hosp"
                                                    data-titulo="Otro Tratamiento"
                                                    class="form-control form-control-sm"
                                                    onchange="evaluar_para_carga_detalle('motivo_hosp','div_motivo_hosp','obs_motivo_hosp',5);">
                                                    <option value="1" selected>Cirugía</option>
                                                    <option value="2">Tratamiento Médico</option>
                                                    <option value="3">Estudio Clínico</option>
                                                    <option value="4">Observación</option>
                                                    <option value="5">Otro</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_motivo_hosp" style="display:none">
                                                <label class="floating-label-activo-sm">Otro tratamiento
                                                    (Describir)</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Otro Tratamiento" rows="1"
                                                    onfocus="this.rows=3" onblur="this.rows=1;" name="obs_motivo_hosp" id="obs_motivo_hosp"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Obs. a la
                                                    Hospitalización</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Hospitalizar" rows="1"
                                                    onfocus="this.rows=4" onblur="this.rows=1;" name="obs_hospitalizar" id="obs_hospitalizar"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--INFO. INGRESO-->
                                <div class="tab-pane fade show active" id="info-ingreso-hosp" role="tabpanel"
                                    aria-labelledby="info-ingreso-hosp-tab">
                                    <div class="card-informacion">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 mb-2">
                                                    <h6 class="t-aten">INFORMACIÓN DE PACIENTE</h6>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12 col-lg-9 col-xl-4">
                                                    <label class="font-weight-bold ml-0"><strong>Nombre: </strong></label>
                                                    <label class="ml-0">{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}</label>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-2">
                                                    <label class="font-weight-bold ml-0"><strong>FN: </strong></label>
                                                    <label class="ml-0">{{ $paciente->fecha_naciemiento }}</label>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                                    <label class="font-weight-bold ml-0"><strong>Previsión: </strong></label>
                                                    <label class="ml-0">{{ $paciente->Prevision->first()->nombre }}</label>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-2">
                                                    <label class="font-weight-bold ml-0"><strong>Teléfono: </strong></label>
                                                    <label class="ml-0">{{ $paciente->telefono_uno }}</label>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                                    <label class="font-weight-bold ml-0"><strong>Email: </strong></label>
                                                    <label class="ml-0">{{ $paciente->email }}</label>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                    <label class="font-weight-bold ml-0 text-danger">Enfermedades Crónicas:</label>
                                                    <label class="ml-0">
                                                    @php
                                                        $patalogias_cronicas = '';
                                                    @endphp
                                                    @foreach ($patoligias_cronicas as $patologia_cronica)
                                                        @php
                                                            $temp = json_decode($patologia_cronica->data);
                                                            echo $temp->nombre;
                                                            $patalogias_cronicas .= $temp->nombre;
                                                        @endphp
                                                        @if ($patologia_cronica->comentario)
                                                            ,{{ $patologia_cronica->comentario }}
                                                            @php
                                                                $patalogias_cronicas .= ', ' . $patologia_cronica->comentario;
                                                            @endphp
                                                        @endif
                                                        ;
                                                        @php
                                                            $patalogias_cronicas .= ';';
                                                        @endphp
                                                    @endforeach
                                                    </label>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                    <label class="floating-label-activo-sm">Otros antecedentes médicos</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="ingreso_sol_pab_modal_otros_antecedentes"
                                                        id="ingreso_sol_pab_modal_otros_antecedentes" value="">
                                                    <input type="hidden" name="ingreso_sol_pab_modal_patalogias_cronicas"
                                                        id="ingreso_sol_pab_modal_patalogias_cronicas"
                                                        value="{{ $patalogias_cronicas }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-informacion">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 mb-2">
                                                    <h6 class="t-aten">MÉDICO TRATANTE</h6>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                    <label class="font-weight-bold ml-0">Nombre:</label>
                                                    <label
                                                        class="ml-0">{{ $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos }}</label>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                    <label class="font-weight-bold ml-0">Especialidad:</label>
                                                    <label class="ml-0">
                                                        @if ($profesional->SubTipoEspecialidad()->first())
                                                            {{ $profesional->SubTipoEspecialidad()->first()->nombre }}
                                                        @else
                                                            {{ $profesional->TipoEspecialidad()->first()->nombre }}
                                                        @endif
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                    <label class="floating-label-activo-sm">Clínica - Hospital</label>
                                                    <input type="text" class="form-control form-control-sm" id="hosp_en"
                                                        name="hosp_en" value="">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                    <label class="floating-label-activo-sm">Diagnósticos </label>
                                                    <textarea class="form-control caja-texto form-control-sm " rows="1" onfocus="this.rows=8"
                                                        onblur="this.rows=1;" name="dg_ingreso" id="dg_ingreso" value=""> </textarea>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Servicio</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="serv_hosp" id="serv_hosp" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="esp-3">
                                                            <label class="custom-control-label" for="esp-3">¿Preparar para
                                                                Cirugía?</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--INDICACIONES INGRESO-->
                                <div class="tab-pane fade show" id="indicaciones-hosp" role="tabpanel"
                                    aria-labelledby="indicaciones-hosp-tab">
                                    <div id="evol_med_urgencia" class="open" aria-labelledby="med_urgen"
                                        data-parent="#med_urgen">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <h6 class="t-aten">Indicaciones de ingreso</h6>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card-informacion">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <ul class="nav nav-tabs nav-fill  mb-10" id="med_urgen"
                                                                        role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link f-16 text-reset active"
                                                                                id="urg_ex_ingreso_tab" data-toggle="tab"
                                                                                href="#urg_ex_ingreso" role="tab"
                                                                                aria-controls="urg_ex_ingreso"
                                                                                aria-selected="true">Evolución</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link text-reset"
                                                                                id="receta_urg-tab" data-toggle="tab"
                                                                                href="#receta_urg" role="tab"
                                                                                aria-controls="receta_urg"
                                                                                aria-selected="true">Receta e Indicaciones</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link text-reset"
                                                                                id="sol_examenes_urg-tab" data-toggle="tab"
                                                                                href="#sol_examenes_urg" role="tab"
                                                                                aria-controls="sol_examenes_urg"
                                                                                aria-selected="true">Sol. Exámenes</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link text-reset"
                                                                                id="urg_dest_ind-tab" data-toggle="tab"
                                                                                href="#urg_dest_ind" role="tab"
                                                                                aria-controls="urg_dest_ind"
                                                                                aria-selected="true">Otras indicaciones y cuidados</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card-informacion">
                                                            <div class="card-body">
                                                            <div id="form-servicios">


                                                                <div class="tab-content" id="med_urgen">
                                                                    <!--INGRESO-->
                                                                    <div class="tab-pane fade show active" id="urg_ex_ingreso"
                                                                        role="tabpanel" aria-labelledby="urg_ex_ingreso_tab">
                                                                        <div class="row">
                                                                            <!--Evoluciones-->
                                                                            <div class="col-md-12">
                                                                                <form id="form_ingreso_paciente"
                                                                                    action="{{ ROUTE('cirugia.registrar_hospitalizacion_cirugia') }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    <input type="hidden"
                                                                                        name="medicamentos_cirugia"
                                                                                        id="medicamentos_cirugia">
                                                                                    <input type="hidden"
                                                                                        name="examenes_cirugia"
                                                                                        id="examenes_cirugia">
                                                                                    <input type="hidden"
                                                                                        name="interconsultas_cirugia"
                                                                                        id="interconsultas_cirugia">

                                                                                    <input type="hidden" name="tipo_cirugia"
                                                                                        id="tipo_cirugia" value="quirurgica">
                                                                                    @if (isset($sala_hospitalizacion))
                                                                                        <input type="hidden"
                                                                                            name="id_sala_hospitalizacion"
                                                                                            id="id_sala_hospitalizacion"
                                                                                            value="{{ $sala_hospitalizacion->id }}">
                                                                                    @endif


                                                                                    <div class="form-row">
                                                                                        <!--Evoluciones-->
                                                                                        <div class="col-sm-12 mt-3 ">
                                                                                            @if (isset($sala_hospitalizaciones))
                                                                                                {{-- {{ dd($recuperacion) }} --}}
                                                                                                @foreach ($sala_hospitalizaciones as $sala_hosp)
                                                                                                    <div class="form-row">
                                                                                                        <div
                                                                                                            class="form-group col-md-2">
                                                                                                            <h6
                                                                                                                class="text-secondary">
                                                                                                            </h6>
                                                                                                            <h6
                                                                                                                class="text-secondary">
                                                                                                                {{ $sala_hosp->created_at }}
                                                                                                            </h6>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="form-group col-md-10">
                                                                                                            <label
                                                                                                                class="floating-label-activo-sm">Evolución</label>
                                                                                                            <input
                                                                                                                class="form-control form-control-sm"
                                                                                                                name="evolucion1{{ $sala_hosp->id }}"
                                                                                                                id="evolucion1"
                                                                                                                value="{{ $sala_hosp->evolucion }}"
                                                                                                                disabled>
                                                                                                        </div>

                                                                                                        @if (isset($sala_hosp->medicamentos) &&
                                                                                                                $sala_hosp->medicamentos != null &&
                                                                                                                $sala_hosp->medicamentos != '' &&
                                                                                                                $sala_hosp->medicamentos != '[]')
                                                                                                            <div
                                                                                                                class="form-group col-md-6">

                                                                                                                <div
                                                                                                                    class="card">
                                                                                                                    <div
                                                                                                                        class="card-header bg-info align-middle">
                                                                                                                        <h6
                                                                                                                            class="float-left d-inline">
                                                                                                                            Medicamentos
                                                                                                                        </h6>
                                                                                                                    </div>
                                                                                                                    @foreach ($sala_hosp->medicamentos as $medicamento)
                                                                                                                        <div
                                                                                                                            class="card-body shadow-none">
                                                                                                                            <div
                                                                                                                                class="col-md-12">
                                                                                                                                <span>{{ $medicamento->producto }}</span>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    @endforeach
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        @else
                                                                                                        @endif
                                                                                                        @if (isset($sala_hosp->examenes) &&
                                                                                                                $sala_hosp->examenes != null &&
                                                                                                                $sala_hosp->examenes != '' &&
                                                                                                                $sala_hosp->examenes != '[]')
                                                                                                            <div
                                                                                                                class="form-group col-md-6">
                                                                                                                <div
                                                                                                                    class="card">
                                                                                                                    <div
                                                                                                                        class="card-header bg-info align-middle">
                                                                                                                        <h6
                                                                                                                            class="float-left d-inline">
                                                                                                                            Examenes
                                                                                                                        </h6>
                                                                                                                    </div>
                                                                                                                    @foreach ($sala_hosp->examenes as $examen)
                                                                                                                        <div
                                                                                                                            class="card-body shadow-none">
                                                                                                                            <div
                                                                                                                                class="col-md-12">
                                                                                                                                <span>
                                                                                                                                    {{ $examen->tipo_examen . ' - ' . $examen->examen }}
                                                                                                                                </span>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    @endforeach
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        @else
                                                                                                        @endif

                                                                                                        @if (isset($sala_hosp->interconsultas) &&
                                                                                                                $sala_hosp->interconsultas != null &&
                                                                                                                $sala_hosp->interconsultas != '' &&
                                                                                                                $sala_hosp->interconsultas != '[]')
                                                                                                            <div
                                                                                                                class="form-group col-md-6">

                                                                                                                <div
                                                                                                                    class="card">
                                                                                                                    <div
                                                                                                                        class="card-header bg-info align-middle">
                                                                                                                        <h6
                                                                                                                            class="float-left d-inline">
                                                                                                                            Interconsulta/s
                                                                                                                        </h6>
                                                                                                                    </div>
                                                                                                                    @foreach ($sala_hosp->interconsultas as $interconsulta)
                                                                                                                        <div
                                                                                                                            class="card-body shadow-none">
                                                                                                                            <div
                                                                                                                                class="col-md-12">
                                                                                                                                <span>
                                                                                                                                    {{ $interconsulta->nombre_esp . ' - ' . $interconsulta->hipotesis }}
                                                                                                                                </span>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    @endforeach
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        @else
                                                                                                        @endif

                                                                                                    </div>
                                                                                                @endforeach
                                                                                                <div class="form-row">
                                                                                                    <div
                                                                                                        class="form-group col-md-2">

                                                                                                        <script>
                                                                                                            var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                                                                                                "Octubre", "Noviembre", "Diciembre");
                                                                                                            var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                                                                                            var f = new Date();

                                                                                                            document.write("<b> " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                                                                                                .getFullYear() + "</b>");
                                                                                                        </script>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="form-group col-md-10">
                                                                                                        <label
                                                                                                            class="floating-label">Evolución</label>
                                                                                                        <textarea class="form-control form-control-sm" name="evolucion1" id="evolucion1" rows="2"
                                                                                                            onfocus="this.rows=4" onblur="this.rows=3;"></textarea>
                                                                                                    </div>

                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div
                                                                                                        class="form-group col-md-12">
                                                                                                        <h6
                                                                                                            class="text-c-blue">
                                                                                                            Resumen de
                                                                                                            evoluciones</h6>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div
                                                                                                        class="form-group col-md-12">
                                                                                                        <textarea class="form-control form-control-sm" name="resumen_evolucion" id="resumen_evolucion" rows="3"
                                                                                                            onfocus="this.rows=5" onblur="this.rows=4;"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            @else

                                                                                                <div id="contenedor_evoluciones_paciente">
                                                                                                    @foreach ($controles_ciclo as $cc)
                                                                                                    <div class="form-row">
                                                                                                        <div class="form-group col-md-2">
                                                                                                            <p class="pt-3 d-inline">
                                                                                                                {{ $cc->created_at->format('d/m/Y H:i') }} {{ $cc->nombre }}
                                                                                                            </p>
                                                                                                        </div>
                                                                                                        <div class="form-group col-md-10">
                                                                                                            <div class="form-row">

                                                                                                                <div class="form-group col-md-12">
                                                                                                                    <label class="floating-label">Evolución</label>
                                                                                                                    <textarea class="form-control form-control-sm" name="evolucion1" id="evolucion1" rows="2" onfocus="this.rows=4" onblur="this.rows=3;">{{ $cc->evolucion }}</textarea>
                                                                                                                </div>
                                                                                                                <hr>

                                                                                                            </div>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="form-group col-md-12">
                                                                                                            <div class="form-row">
                                                                                                                <div class="form-group col-md-12">
                                                                                                                    <h6 class="text-c-blue">
                                                                                                                        Resumen de
                                                                                                                        evoluciones e
                                                                                                                        interconsultas</h6>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="form-row">
                                                                                                                <div class="form-group col-md-12">
                                                                                                                    <textarea class="form-control form-control-sm" name="resumen_evolucion" id="resumen_evolucion" rows="3" onfocus="this.rows=5" onblur="this.rows=4;">{{ $cc->resumen }}</textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="form-row">
                                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-end">
                                                                                                                    <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminarEvolucionPaciente()"><i class="feather icon-x"></i> </button>
                                                                                                                    <button type="button" class="btn btn-icon btn-success-light-c" onclick="agregarEvolucionPaciente()"><i class="feather icon-save"></i> </button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    @endforeach

                                                                                                </div>

                                                                                                    <h6>Evoluciones</h6>
                                                                                                    <div
                                                                                                        id="contenedor_nueva_evolucion">
                                                                                                    </div>
                                                                                                    <button type="button"
                                                                                                        class="btn btn-info-light-c btn-xxs d-inline float-right"
                                                                                                        onclick="mostrarNuevaEvolucionPaciente({{ $contador_div_evaluaciones }})"><i
                                                                                                            class="feather icon-plus"></i>
                                                                                                        Nueva evolución</button>

                                                                                            @endif


                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--RECETARIO-->
                                                                    <div class="tab-pane fade show " id="receta_urg"
                                                                        role="tabpanel" aria-labelledby="receta_urg_tab">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                                                                                <h6 class="t-aten">Recetas e Indicaciones</h6>
                                                                            </div>
                                                                            <div class="col-md-12 ">
                                                                                <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
                                                                                    @foreach ($tipos_receta as $tipo_receta)
                                                                                        <li class="nav-item">
                                                                                            <a class="nav-link-wizard {{ $loop->first ? 'active' : '' }}"
                                                                                                onclick="mostrarFormularioReceta({{ $tipo_receta->id }})"
                                                                                                id="rec_t{{ $tipo_receta->id }}"
                                                                                                data-toggle="pill"
                                                                                                href="#rec_{{ $tipo_receta->id }}"
                                                                                                role="tab"
                                                                                                aria-controls="rec_{{ $tipo_receta->id }}"
                                                                                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                                                                                Receta
                                                                                                {{ $tipo_receta->descripcion }}
                                                                                            </a>
                                                                                        </li>
                                                                                    @endforeach

                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link-wizard"
                                                                                            onclick="mostrarFormularioReceta(3)"
                                                                                            id="procedimiento_div_tab"
                                                                                            data-toggle="pill"
                                                                                            href="#procedimiento_div"
                                                                                            role="tab"
                                                                                            aria-controls="procedimiento_div"
                                                                                            aria-selected="true"
                                                                                            toogle="true">Procedimientos</a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link-wizard"
                                                                                            onclick="mostrarFormularioReceta(4)"
                                                                                            id="curaciones_div_tab"
                                                                                            data-toggle="pill"
                                                                                            href="#curaciones_div"
                                                                                            role="tab"
                                                                                            aria-controls="procedimiento_div"
                                                                                            aria-selected="true"
                                                                                            toogle="true">Curaciones</a>
                                                                                    </li>
                                                                                    {{-- <li class="nav-item">
                                                                                        <a class="nav-link-wizard" onclick="mostrarFormularioReceta(4)" id="indicaciones_tab" data-toggle="pill" href="#indicaciones" role="tab" aria-controls="indicaciones" aria-selected="true" toogle="true">Otras Indicaciones</a>
                                                                                    </li> --}}
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="tab-content"
                                                                                    id="pills-tablas_examenes">
                                                                                    <!--TAB 1-->
                                                                                    <div class="tab-pane fade show active"
                                                                                        id="rec_1" role="tabpanel"
                                                                                        aria-labelledby="rec_1">

                                                                                    </div>


                                                                                    <!--TAB 2-->
                                                                                    <div class="tab-pane fade show"
                                                                                        id="rec_2" role="tabpanel"
                                                                                        aria-labelledby="rec_2">

                                                                                    </div>

                                                                                    <!--TAB 3-->
                                                                                    <div class="tab-pane fade show"
                                                                                        id="procedimiento_div"
                                                                                        role="tabpanel"
                                                                                        aria-labelledby="procedimiento_div_tab">
                                                                                        <div class="form-row">



                                                                                        </div>

                                                                                    </div>

                                                                                    <!--TAB 4-->
                                                                                    <div class="tab-pane fade show"
                                                                                        id="curaciones_div" role="tabpanel"
                                                                                        aria-labelledby="curaciones_div_tab">
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12">
                                                                                                <div class="table-responsive">
                                                                                                    <table
                                                                                                        id="tabla_curaciones_procedimientos"
                                                                                                        class="table table-bordered table-xs">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <td class="text-center align-middle text-wrap hidden"
                                                                                                                    hidden="hidden">
                                                                                                                    id_procedimiento
                                                                                                                </td>
                                                                                                                <td
                                                                                                                    class="text-center align-middle text-wrap">
                                                                                                                    Procedimiento
                                                                                                                </td>
                                                                                                                <td
                                                                                                                    class="text-center align-middle text-wrap">
                                                                                                                    Vigilar
                                                                                                                    Signos de
                                                                                                                    Alerta</td>
                                                                                                                <th
                                                                                                                    class="text-center align-middle">
                                                                                                                    Eliminar
                                                                                                                </th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                            @foreach ($curaciones as $c)
                                                                                                                <tr>
                                                                                                                    <td class="text-center align-middle text-wrap hidden"
                                                                                                                        hidden="hidden">
                                                                                                                        {{ $c->id }}
                                                                                                                    </td>
                                                                                                                    <td
                                                                                                                        class="text-center align-middle text-wrap">
                                                                                                                        {{ $c->datos_curacion->nombre_procedimiento }}
                                                                                                                    </td>
                                                                                                                    <td
                                                                                                                        class="text-center align-middle text-wrap">
                                                                                                                        <input
                                                                                                                            type="text"
                                                                                                                            id="ind_vig_sig{{ $c->id }}"
                                                                                                                            name="ind_vig_sig{{ $c->id }}"
                                                                                                                            class="form-control form-control-sm">
                                                                                                                    </td>
                                                                                                                    <td
                                                                                                                        class="text-center align-middle">
                                                                                                                        <button
                                                                                                                            type="button"
                                                                                                                            class="btn btn-danger btn-sm"
                                                                                                                            onclick="eliminarCuracion({{ $c->id }})"><i
                                                                                                                                class="fa fa-trash"></i></button>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                </tr>
                                                                                                            @endforeach
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!--DIV DE TABLA -->


                                                                                    <!--Cierre: Tabla-->
                                                                                    <!-- DIV MEDICAMENTO FALTANTE-->
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="col-sm-12 mt-3 mb-2">
                                                                                                <div
                                                                                                    class="custom-control custom-switch">
                                                                                                    <input type="checkbox"
                                                                                                        class="custom-control-input"
                                                                                                        id="ranking_recetas_switch">
                                                                                                    <label
                                                                                                        class="custom-control-label text-primary"
                                                                                                        for="ranking_recetas_switch"><strong><u>Ranking
                                                                                                                de
                                                                                                                recetas
                                                                                                                controladas del
                                                                                                                paciente</u></strong></label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row"
                                                                                                id="ranking_recetas"
                                                                                                style="display:none">
                                                                                                <div
                                                                                                    class="col-sm-12 col-md-12">
                                                                                                    <h6
                                                                                                        class="text-c-blue mb-3">
                                                                                                        Recetas propias</h6>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-sm-6 col-md-6">
                                                                                                    <div
                                                                                                        class="form-group fill">
                                                                                                        <label
                                                                                                            class="floating-label">Tipo
                                                                                                            de control</label>
                                                                                                        <select
                                                                                                            class="form-control form-control-sm"
                                                                                                            id=""
                                                                                                            name="">
                                                                                                            <option>Seleccione
                                                                                                                una opción
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="S"
                                                                                                                data-select2-id="0">
                                                                                                                Seleccione una
                                                                                                                opción</option>
                                                                                                            <option
                                                                                                                value="1">
                                                                                                                Control
                                                                                                                Psicotrópicos
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="2">
                                                                                                                Control
                                                                                                                Estupefacientes
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="3">
                                                                                                                Receta cheque
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="4">
                                                                                                                Receta Retenida
                                                                                                                Simple
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="5">
                                                                                                                Receta Retenida
                                                                                                                C/Codeína
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-sm-6 col-md-6">
                                                                                                    <input
                                                                                                        class="form-control form-control-sm"
                                                                                                        type="text"
                                                                                                        placeholder="Nº de recetas">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-sm-12 col-md-12">
                                                                                                    <h6
                                                                                                        class="text-c-blue mb-3">
                                                                                                        Recetas totales</h6>
                                                                                                </div>
                                                                                                <div class="col-sm-6">
                                                                                                    <div
                                                                                                        class="form-group fill">
                                                                                                        <label
                                                                                                            class="floating-label">Tipo
                                                                                                            de control</label>
                                                                                                        <select
                                                                                                            class="form-control form-control-sm"
                                                                                                            id=""
                                                                                                            name="">
                                                                                                            <option
                                                                                                                value="S"
                                                                                                                data-select2-id="0">
                                                                                                                Seleccione una
                                                                                                                opción</option>
                                                                                                            <option
                                                                                                                value="1">
                                                                                                                Control
                                                                                                                Psicotrópicos
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="2">
                                                                                                                Control
                                                                                                                Estupefacientes
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="3">
                                                                                                                Receta cheque
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="4">
                                                                                                                Receta Retenida
                                                                                                                Simple
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="5">
                                                                                                                Receta Retenida
                                                                                                                C/Codeína
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-sm-6 col-md-6">
                                                                                                    <input
                                                                                                        class="form-control form-control-sm"
                                                                                                        type="text"
                                                                                                        placeholder="Nº de recetas">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--SOL EXÁMENES-->
                                                                    <div class="tab-pane fade show" id="sol_examenes_urg"
                                                                        role="tabpanel"
                                                                        aria-labelledby="sol_examenes_urg-tab">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                                                                <h6 class="t-aten">Solicitud de exámenes</h6>
                                                                            </div>
                                                                            <div class="col-sm-12 mt-2">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Tipo
                                                                                        Examen</label>
                                                                                    <select
                                                                                        class="form-control form-control-sm"
                                                                                        name="tipo_examen"
                                                                                        id="tipo_examen"
                                                                                        onchange="">
                                                                                        <option
                                                                                            value="0">
                                                                                            Seleccione</option>
                                                                                        @foreach ($examenMedico as $exa)
                                                                                            <option
                                                                                                value="{{ $exa->cod_examen }}">
                                                                                                {{ $exa->nombre_examen }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 mt-2">
                                                                                <div class="form-group fill">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Sub-tipo
                                                                                        de
                                                                                        Examen</label>

                                                                                    <select
                                                                                        class="form-control form-control-sm"
                                                                                        name="sub_tipo_examen"
                                                                                        id="sub_tipo_examen">
                                                                                        <option
                                                                                            value="">
                                                                                            Seleccione</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 mt-2">
                                                                                <div class="form-group fill">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Examen</label>
                                                                                    <select
                                                                                        class="form-control form-control-sm"
                                                                                        name="examen"
                                                                                        id="examen">
                                                                                        <option
                                                                                            value="">
                                                                                            Seleccione</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6 mt-2">
                                                                                <div class="form-group fill">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Lado</label>
                                                                                    <select
                                                                                        class="form-control form-control-sm"
                                                                                        id="lado"
                                                                                        name="lado">
                                                                                        <option
                                                                                            value="0">
                                                                                            Seleccione</option>
                                                                                        <option
                                                                                            value="Derecho">
                                                                                            Derecho</option>
                                                                                        <option
                                                                                            value="Izquierdo">
                                                                                            Izquierdo</option>
                                                                                        <option
                                                                                            value="Bilateral">
                                                                                            Bilateral</option>
                                                                                        <option value="N/C"
                                                                                            selected>No
                                                                                            corresponde</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6 mt-2">
                                                                                <div class="form-group fill">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Prioridad</label>
                                                                                    <select
                                                                                        class="form-control form-control-sm"
                                                                                        id="prioridad"
                                                                                        name="prioridad">
                                                                                        <option
                                                                                            value="0">
                                                                                            Seleccione</option>
                                                                                        <option
                                                                                            value="1">
                                                                                            Baja</option>
                                                                                        <option value="2"
                                                                                            selected>Media
                                                                                        </option>
                                                                                        <option
                                                                                            value="3">
                                                                                            Alta</option>
                                                                                        <option
                                                                                            value="4">
                                                                                            Urgente</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>


                                                                            <div class="col-sm-12 mt-3">
                                                                                <div class="form-group mb-1">
                                                                                    <label><strong>Con
                                                                                            Contraste</strong></label>
                                                                                    <div
                                                                                        class="switch switch-success d-inline m-r-10">
                                                                                        <input type="checkbox"
                                                                                            id="imagenologia_con_contraste"
                                                                                            disabled='disabled'>
                                                                                        <label
                                                                                            for="imagenologia_con_contraste"
                                                                                            class="cr"></label>
                                                                                    </div>
                                                                                    <div  class="p-2 rounded alert-primary font-weight-bold alert-primary"
                                                                                        id="mensaje_imagenologia_con_contraste"
                                                                                        style="display:none;">
                                                                                        Acaba de seleccionar
                                                                                        Imagen con
                                                                                        Constraste. El examen de
                                                                                        Creatinina fue adjuntado
                                                                                        correctamente.</div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <button type="button"
                                                                                    onclick="indicar_examen_cirugia();"
                                                                                    id="agregar_examen_tabla"
                                                                                    class="btn btn-success btn-sm float-right">
                                                                                    <i lass="feather icon-plus"></i>
                                                                                    Añadir examen
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-sm-12 mt-3">
                                                                                <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                                                                                <!--Tabla-->
                                                                                <div class="table-responsive">
                                                                                    <table
                                                                                        id="tabla_examen_cirugia"
                                                                                        class="table table-bordered table-xs tabla_examenes_ficha">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th class="text-center align-middle"
                                                                                                    style="display:none">
                                                                                                    id</th>
                                                                                                <th class="text-center align-middle"
                                                                                                    style="display:none">
                                                                                                    Nombre
                                                                                                    Examen</th>
                                                                                                <th
                                                                                                    class="text-center align-middle">
                                                                                                    Nombre
                                                                                                    Examen</th>
                                                                                                <th
                                                                                                    class="text-center align-middle">
                                                                                                    Lado</th>
                                                                                                <th
                                                                                                    class="text-center align-middle">
                                                                                                    Tipo</th>
                                                                                                {{--  <th class="text-center align-middle">Sub-Tipo</th>  --}}
                                                                                                <th
                                                                                                    class="text-center align-middle">
                                                                                                    Prioridad
                                                                                                </th>
                                                                                                <th
                                                                                                    class="text-center align-middle">
                                                                                                    Con
                                                                                                    Contraste
                                                                                                </th>
                                                                                                <th
                                                                                                    class="text-center align-middle">
                                                                                                    Acción
                                                                                                </th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @foreach ($examenes_solicitados as $examen)
                                                                                                <tr>
                                                                                                    <td class="text-center align-middle"
                                                                                                        style="display:none">
                                                                                                        {{ $examen->id }}
                                                                                                    </td>
                                                                                                    <td class="text-center align-middle"
                                                                                                        style="display:none">
                                                                                                        {{ $examen->datos_examen->examen }}
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center align-middle">
                                                                                                        {{ $examen->datos_examen->examen }}
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center align-middle">
                                                                                                        {{ $examen->datos_examen->lado }}
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center align-middle">
                                                                                                        {{ $examen->datos_examen->tipo_examen }}
                                                                                                    </td>
                                                                                                    {{--  <td class="text-center align-middle">{{ $examen->sub_tipo }}</td>  --}}
                                                                                                    <td
                                                                                                        class="text-center align-middle">
                                                                                                        {{ $examen->datos_examen->prioridad }}
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center align-middle">
                                                                                                        {{ $examen->datos_examen->imagenologia_con_contraste }}
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center align-middle">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn btn-danger btn-icon"
                                                                                                            onclick="eliminar_examen_cirugia({{ $examen->id }})"><i
                                                                                                                class="feather icon-x"></i></button>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <!--Cierre Tabla-->
                                                                            </div>

                                                                        </div>
                                                                        <hr>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                                                                <button type="button"
                                                                                    onclick="registro_examen_ficha();"
                                                                                    data-dismiss="modal"
                                                                                    class="btn btn-info text-center"><i class="feather icon-check"></i> Generar orden
                                                                                    de
                                                                                    examen
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--INDICACIONES Y DESTINO-->
                                                                    <div class="tab-pane fade show" id="urg_dest_ind"
                                                                        role="tabpanel" aria-labelledby="urg_dest_ind-tab">
                                                                        <div class="form-row my-3">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="form-group">
                                                                                    <label for="otras_ind" class="floating-label-activo-sm">Otras indicaciones y cuidados</label>
                                                                                    <textarea class="form-control form-control-sm" name="otras_ind" id="otras_ind" cols="30" rows="10"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                                                                <button type="button" class="btn btn-info" onclick="registrar_salida_paciente()"> <i class="feather icon-save"></i> Guardar</button>
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
                                <!--ARCHIVO-->
                                <div class="tab-pane fade show" id="archivos-hosp-pab" role="tabpanel"
                                    aria-labelledby="archivos-hosp-pab-tab">
                                    <form>
                                        <div class="form-row mb-2">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <h6 class="mb-2 text-c-blue">ARCHIVOS</h6>
                                                <div class="dropzone dz-clickable" id="" action="">
                                                <div class="dz-default dz-message"><button class="dz-button" type="button">Arrastre los archivos al recuadro para subirlos</button></div></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--COMENTARIOS-->
                                <div class="tab-pane fade show" id="comentarios-hosp-pab" role="tabpanel"
                                    aria-labelledby="comentarios-hosp-pab-tab">
                                    <form>
                                        <div class="form-row mb-2">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <h6 class="mb-3 text-c-blue">COMENTARIOS</h6>
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Comentarios</label>
                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3"
                                                        onblur="this.rows=1;" name="otros_hosp" id="otros_hosp"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info">Guardar y enviar</button>
                <button type="button" class="btn btn-primary">Ver formulario (PDF)</button>

            </div>
        </div>
    </div>
</div>


<script>
    /*CERRAR MODAL*/
    function cerrarihosp()
    {
        $('#ingreso_m_modal').modal('show');
    }
    function cerrarihosp() {
        $('#ingreso_m_modal').modal ('hide');
      }

    /* Definimos una variable global para los IDs */
    var idCounter = 2;

    function ingresohosp(seccion) {

        console.log($('#in_hosp_nom_inst' + seccion).val());

        if ($('#in_hosp_hospen' + seccion).length > 0)
            $('#hospen').val($('#in_hosp_hospen' + seccion).val());

        if ($('#in_hosp_obs_hospen' + seccion).length > 0)
            $('#obs_hospen').val($('#in_hosp_obs_hospen' + seccion).val());

        if ($('#in_hosp_nom_inst' + seccion).length > 0)
            $('#nom_inst').val($('#in_hosp_nom_inst' + seccion).val());

        if ($('#in_hosp_hosp_enserv' + seccion).length > 0)
            $('#hosp_enserv').val($('#in_hosp_hosp_enserv' + seccion).val());

        if ($('#in_hosp_obs_hosp_enserv' + seccion).length > 0)
            $('#obs_hosp_enserv').val($('#in_hosp_obs_hosp_enserv' + seccion).val());

        if ($('#in_hosp_motivo_hosp' + seccion).length > 0)
            $('#motivo_hosp').val($('#in_hosp_motivo_hosp' + seccion).val());

        if ($('#in_hosp_obs_motivo_hosp' + seccion).length > 0)
            $('#obs_motivo_hosp').val($('#in_hosp_obs_motivo_hosp' + seccion).val());

        if ($('#in_hosp_obs_hospitalizar' + seccion).length > 0)
            $('#obs_hospitalizar').val($('#in_hosp_obs_hospitalizar' + seccion).val());


        evaluar_para_carga_detalle('hospen', 'div_detalle_hospen', 'obs_hospen', 3);
        evaluar_para_carga_detalle('hosp_enserv', 'div_detalle_hosp_enserv', 'obs_hosp_enserv', 4);
        evaluar_para_carga_detalle('motivo_hosp', 'div_motivo_hosp', 'obs_motivo_hosp', 5);

        $('#ingreso_m_modal').modal('show');

    }

    function indicar_procedimiento_sdi() {
        var ind_med = $('#ind_med').val();
        var ind_cur = $('#ind_cur').val();
        var ind_proc = $('#ind_proc').val();
        var ind_inmmed = $('#ind_inmmed').val();
        var ind_cc = $('#ind_cv_inmmed_urg').val();
        var ind_pp = $('#ind_pp').val();
        var ind_vig_sig = $('#ind_vig_sig').val();

        var obs_ind_med = $('#obs_ind_med_servicio').val();
        var obs_detalle_ind_med = $('#obs_detalle_ind_med').val();

        var params = new URLSearchParams(location.search);
        var id_paciente = $('#id_paciente').val();

        var valido = 0;
        var mensaje = '';

        // if ($.trim(ind_med) == '' || ind_med == 0 || $.trim(ind_med) == 'Seleccione') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Vias y Cateter.\n';
        // }

        // if ($.trim(ind_cur) == '' || ind_cur == 0 || $.trim(ind_cur) == 'Seleccione') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Curaciones.\n';
        // }

        // if ($.trim(ind_proc) == '' || ind_proc == 0 || $.trim(ind_proc) == 'Seleccione') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Sondas y procedimientos.\n';
        // }

        // if ($.trim(ind_inmmed) == '' || ind_inmmed == 0 || $.trim(ind_inmmed) == 'Seleccione') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Inmovilizacion.\n';
        // }

        // if ($.trim(ind_cc) == '' || ind_cc == 0 || $.trim(ind_cc) == 'Seleccione') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Control de ciclo.\n';
        // }

        // if ($.trim(ind_pp) == '' || ind_pp == 0 || $.trim(ind_pp) == 'Seleccione') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Preparar para.\n';
        // }

        // if ($.trim(ind_vig_sig) == '') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Vigilar signos de alerta.\n';
        // }

        // if ($.trim(obs_ind_med) == '') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Observaciones.\n';
        // }

        // if ($.trim(obs_detalle_ind_med) == '') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Detalle de Observaciones.\n';
        // }


        if (valido == 0) {
            let data = {
                ind_med: ind_med,
                ind_cur: ind_cur,
                ind_proc: ind_proc,
                ind_inmmed: ind_inmmed,
                ind_cc: ind_cc,
                ind_pp: ind_pp,
                ind_vig_sig: ind_vig_sig,
                id_paciente: id_paciente,
                obs_ind_med: obs_ind_med,
                obs_detalle_ind_med: obs_detalle_ind_med,
                _token: "{{ csrf_token() }}"
            };

            console.log(data);
            var url = "{{ route('indicar_procedimiento_sdi') }}";
            $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                    dataType: "json",
                })
                .done(function(data) {
                    if (data.status == 1) {
                        let procedimientos = data.procedimientos;
                        let curaciones = data.curaciones;

                        $('#tabla_procedimientos_servicio tbody').empty();
                        $('#tabla_procedimientos_servicio_enfermera tbody').empty();
                        $('#tabla_curaciones_servicio tbody').empty();
                        $('#tabla_curaciones_procedimientos tbody').empty();
                        procedimientos.forEach(function(procedimiento) {
                            console.log(procedimiento.id);
                            let datos = JSON.parse(procedimiento.datos_procedimiento);
                            // Ahora puedes trabajar con datos como un objeto JSON

                            $('#tabla_procedimientos_servicio tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                    <td class="text-center align-middle text-wrap"><button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})"><i class="fas fa-trash"></i></button></td>
                                </tr>
                            `);

                            $('#tabla_procedimientos_servicio_enfermera tbody').append(`
                            <tr>
                                                <td>${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">
                                                    ${procedimiento.id}</td>
                                                <td class="text-center align-middle text-wrap">
                                                    ${datos.nombre_procedimiento}
                                                </td>
                                                <td class="text-center align-middle text-wrap">
                                                    <input type="text" id="ind_vig_sig${procedimiento.id}"
                                                        name="ind_vig_sig${procedimiento.id}"
                                                        class="form-control form-control-sm">
                                                </td>
                                                <td class="text-center align-middle text-wrap">
                                                    <input type="text" id="obs${procedimiento.id}" name="obs${procedimiento.id}""
                                                        class="form-control form-control-sm">
                                                </td>
                                                <td>
                                                    <div class="switch switch-success d-inline">
                                                        <input type="checkbox" id="procedimiento_servicio_listo${procedimiento.id}" checked="">
                                                        <label for="procedimiento_servicio_listo${procedimiento.id}" class="cr"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="button" class="btn btn-outline-success btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#modalAgregarInsumos">Insumos</button>
                                                </td>
                                            </tr>
                            `);
                        });
                        if (curaciones.length > 0) {
                            curaciones.forEach(function(curacion) {
                                let datos = curacion.datos_curacion;
                                // Ahora puedes trabajar con datos como un objeto JSON
                                console.log(curacion);
                                $('#tabla_curaciones_servicio tbody').append(`
                                    <tr>
                                        <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                        <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                        <td class="text-center align-middle">
                                            <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline">
                                                <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                                <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                                Insumos
                                            </button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-outline-warning btn-sm" >
                                                <i class="fas fa-edit"></i>

                                            </button>
                                        </td>
                                    </tr>
                                `);

                                $('#tabla_curaciones_procedimientos tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                    <td class="text-center align-middle text-wrap"><button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(${curacion.id})"><i class="fas fa-trash"></i></button></td>
                                </tr>
                                `);
                            });
                        }

                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "success",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    } else {
                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "error",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        } else {
            swal({
                title: "Indicación de Procedimiento.",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                //SuccessMode: true,
            });
        }
    }

    function eliminar_procedimiento_sdi(id) {
        swal({
            title: "Eliminar Procedimiento.",
            text: 'Al "Aceptar" Elimina el procedimiento.\n',
            icon: "warning",
            buttons: ["Cancelar", 'Aceptar'],
        }).then((result) => {
            console.log(result);
            if (result == true) {
                eliminar_procedimiento_sdi_ajax(id);
            } else {
                console.log('regresar');
            }
        });
    }

    function suspender_procedimiento_sdi(id) {
        var url = "{{ route('suspender_procedimiento_sdi') }}";
        var id_paciente = $('#id_paciente').val();
        if(id_paciente == '' || id_paciente == null){
            id_paciente = dame_id_paciente();
        }
        $.ajax({
                url: url,
                type: "post",
                data: {
                    id: id,
                    id_paciente: id_paciente,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 'success') {
                    let procedimientos = data.procedimientos;
                    let curaciones = data.curaciones;
                    console.log(curaciones);
                    $('#tabla_procedimientos_servicio tbody').empty();
                    $('#tabla_procedimientos_servicio_enfermera tbody').empty();
                    $('#tabla_curaciones_servicio tbody').empty();
                    procedimientos.forEach(function(procedimiento) {
                        if (procedimiento.estado == 0) {
                            var html = '<span class="badge badge-warning">Suspendido </span>';
                        } else {
                            var html = '';
                        }
                        let datos = JSON.parse(procedimiento.datos_procedimiento);
                        // Ahora puedes trabajar con datos como un objeto JSON
                        console.log(datos);
                        $('#tabla_procedimientos_servicio tbody').append(`
                            <tr>
                                <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                <td class="text-center align-middle text-wrap">
                                    <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                </td>
                                <td class="text-center align-middle text-wrap">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                        <i class="fas fa-trash"></i>Eliminar
                                    </button>
                                    <button type="button"
                                        class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                        onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                        <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                        ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                    </button>
                                </td>
                            </tr>
                        `);


                        $('#tabla_procedimientos_servicio_enfermera tbody').append(`
                            <tr>
                                                <td>${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">
                                                    ${procedimiento.id}</td>
                                                <td class="text-center align-middle text-wrap">
                                                    ${datos.nombre_procedimiento}
                                                </td>
                                                <td class="text-center align-middle text-wrap">
                                                    <input type="text" id="ind_vig_sig${procedimiento.id}"
                                                        name="ind_vig_sig${procedimiento.id}"
                                                        class="form-control form-control-sm">
                                                </td>
                                                <td class="text-center align-middle text-wrap">
                                                    <input type="text" id="obs${procedimiento.id}" name="obs${procedimiento.id}""
                                                        class="form-control form-control-sm">
                                                </td>
                                                <td>
                                                    <div class="switch switch-success d-inline">
                                                        <input type="checkbox" id="procedimiento_servicio_listo${procedimiento.id}" checked="">
                                                        <label for="procedimiento_servicio_listo${procedimiento.id}" class="cr"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="button" class="btn btn-outline-success btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#modalAgregarInsumos">Insumos</button>
                                                </td>
                                            </tr>
                            `);
                    });

                    curaciones.forEach(function(curacion) {
                        let datos = curacion.datos_curacion;
                        // Ahora puedes trabajar con datos como un objeto JSON
                        console.log(curacion);
                        $('#tabla_curaciones_servicio tbody').append(`
                            <tr>
                                <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                <td class="text-center align-middle">
                                    <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                </td>
                                <td class="text-center align-middle">
                                    <div class="switch switch-success d-inline">
                                        <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                        <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                        Insumos
                                    </button>
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-outline-warning btn-sm" >
                                        <i class="fas fa-edit"></i>

                                    </button>
                                </td>
                            </tr>
                        `);
                    });

                    swal({
                        title: "Indicación de Procedimiento.",
                        text: data.mensaje,
                        icon: "success",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                } else {
                    swal({
                        title: "Indicación de Procedimiento.",
                        text: data.mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }

    function eliminar_procedimiento_sdi_ajax(id) {
        var url = "{{ route('eliminar_procedimiento_sdi') }}";
        var id_paciente = $('#id_paciente').val();
        $.ajax({
                url: url,
                type: "post",
                data: {
                    id: id,
                    id_paciente: id_paciente,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 'success') {
                    let procedimientos = data.procedimientos;
                    let curaciones = data.curaciones;
                    console.log(curaciones);
                    $('#tabla_procedimientos_servicio tbody').empty();
                    $('#tabla_procedimientos_servicio_enfermera tbody').empty();
                    $('#tabla_curaciones_servicio tbody').empty();
                    procedimientos.forEach(function(procedimiento) {
                        let datos = JSON.parse(procedimiento.datos_procedimiento);
                        // Ahora puedes trabajar con datos como un objeto JSON
                        console.log(datos);
                        $('#tabla_procedimientos_servicio tbody').append(`
                            <tr>
                                <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                                <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                <td class="text-center align-middle text-wrap">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})"><i class="fas fa-trash"></i></button>
                                    <button type="button" class="btn btn-warning btn-sm" onclick="suspender_procedimiento_sdi(${procedimiento.id})"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        `);

                        $('#tabla_procedimientos_servicio_enfermera tbody').append(`
                            <tr>
                                                <td>${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">
                                                    ${procedimiento.id}</td>
                                                <td class="text-center align-middle text-wrap">
                                                    ${datos.nombre_procedimiento}
                                                </td>
                                                <td class="text-center align-middle text-wrap">
                                                    <input type="text" id="ind_vig_sig${procedimiento.id}"
                                                        name="ind_vig_sig${procedimiento.id}"
                                                        class="form-control form-control-sm">
                                                </td>
                                                <td class="text-center align-middle text-wrap">
                                                    <input type="text" id="obs${procedimiento.id}" name="obs${procedimiento.id}""
                                                        class="form-control form-control-sm">
                                                </td>
                                                <td>
                                                    <div class="switch switch-success d-inline">
                                                        <input type="checkbox" id="procedimiento_servicio_listo${procedimiento.id}" checked="">
                                                        <label for="procedimiento_servicio_listo${procedimiento.id}" class="cr"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="button" class="btn btn-outline-success btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#modalAgregarInsumos">Insumos</button>
                                                </td>
                                            </tr>
                            `);
                    });

                    curaciones.forEach(function(curacion) {
                        let datos = curacion.datos_curacion;
                        // Ahora puedes trabajar con datos como un objeto JSON
                        console.log(curacion);
                        $('#tabla_curaciones_servicio tbody').append(`
                            <tr>
                                <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                <td class="text-center align-middle">
                                    <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                </td>
                                <td class="text-center align-middle">
                                    <div class="switch switch-success d-inline">
                                        <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                        <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                        Insumos
                                    </button>
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-outline-warning btn-sm" >
                                        <i class="fas fa-edit"></i>

                                    </button>
                                </td>
                            </tr>
                        `);
                    });

                    swal({
                        title: "Indicación de Procedimiento.",
                        text: data.mensaje,
                        icon: "success",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                } else {
                    swal({
                        title: "Indicación de Procedimiento.",
                        text: data.mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

    }

    function eliminarCuracion(id) {
        swal({
                title: "¿Estás seguro?",
                text: "Una vez eliminado, no podrás recuperar este registro!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{ route('eliminar_curacion') }}",
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id,
                            "id_paciente": $('#id_paciente').val()
                        },
                        success: function(data) {

                            // convertir json a objeto
                            var obj = JSON.parse(data);
                            var curaciones = obj.curaciones;
                            $('#tabla_curaciones_servicio tbody').empty();
                            $('#tabla_curaciones_procedimientos tbody').empty();
                            curaciones.forEach(curacion => {
                                let datos = curacion.datos_curacion;
                                $('#tabla_curaciones_servicio tbody').append(`
                                <tr>
                                    <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                    <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle">
                                        <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="switch switch-success d-inline">
                                            <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                            <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                            Insumos
                                        </button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminarCuracion(${curacion.id})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            `);
                                $('#tabla_curaciones_procedimientos tbody').append(`
                            <tr>
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">1</td>
                                <td class="text-center align-middle text-wrap">Retiro de puntos</td>
                                <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig1" name="ind_vig_sig1" class="form-control form-control-sm"></td>
                                                                            <td class="text-center align-middle">
                                                                                <button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(1)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                                            </td>
                                                                        </tr>
                            `);
                            });

                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                }
            });

    }

    function mostrarNuevaEvolucionPaciente(counter) {
        let url = "{{ route('profesional.mostrar_nueva_evolucion_paciente_hosp') }}";
        $.ajax({
            url: url,
            type: 'post',
            data: {
                counter: counter,
                _token: '{{ csrf_token() }}'
            },
            success: function(resp) {
                console.log(resp);
                $('#contenedor_nueva_evolucion').html(resp);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function eliminarEvolucionPaciente(id) {
        let idEvolucion = $('#evolucion' + id).val();
        console.log(idEvolucion);
        // Elimina el elemento con el ID proporcionado
        $('#contenedor_evolucion_' + id).remove();
    }

    function calcularPAM(idEvolucion = null) {
        var id = idEvolucion ? idEvolucion : '';
        var pas = $('#pas' + id).val();
        if (pas == '') {
            pas = 0;
        }
        var pad = $('#pad' + id).val();
        // if(pad == ''){
        //     pad = 0;
        // }
        // var pam = ((parseInt(pas) * 2) + parseInt(pad)) / 3;
        // $('#pam' + id).val(pam.toFixed(2));

        var resultado = ((parseInt(pad) * 2) + parseInt(pas));
        $('#pam' + id).val((parseInt(resultado) / 3).toFixed(2));
    }

    function calcularIMC(idEvolucion = null) {
        var id = idEvolucion ? idEvolucion : '';
        var talla = $('#talla' + id).val();
        var peso = $('#peso' + id).val();
        console.log(talla);
        console.log(peso);
        if (talla == '' || peso == '') {
            return;
        }
        var height = talla / 100;
        var imc = peso / (height ** 2);
        $('#imc' + id).val(imc.toFixed(2));
    }

    function eliminarEvolucionAgregada(id) {
        swal({
            title: 'Advertencia',
            text: '¿Está seguro de eliminar esta evolución?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            dangerMode: true
        }).then((aceptar) => {
            if (aceptar) {
                confirmarEliminarEvolucionAgregada(id);
            }
        })
    }

    function confirmarEliminarEvolucionAgregada(id) {
        let url = "{{ route('enfermeria.eliminar_evolucion_agregada') }}";
        var urlParams = new URLSearchParams(window.location.search);
        var idPaciente = urlParams.get('id_paciente');
        $.ajax({
            url: url,
            type: 'post',
            data: {
                id: id,
                id_paciente: idPaciente,
                _token: '{{ csrf_token() }}'
            },
            success: function(resp) {
                console.log(resp);
                let mensaje = resp.mensaje;
                let vista = resp.vista;
                if (mensaje == 'OK') {
                    swal({
                        title: 'Éxito',
                        text: 'Evolución eliminada correctamente',
                        icon: 'success',
                        button: 'Aceptar'
                    });
                    $('#contenedor_evoluciones_paciente').empty();
                    $('#contenedor_evoluciones_paciente').append(vista);
                } else {
                    swal({
                        title: 'Error',
                        text: mensaje,
                        icon: 'error',
                        button: 'Aceptar'
                    })
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function mostrarDatosRespiracion(e, idEvolucion = null) {
        console.log(e);
        let id = idEvolucion ? idEvolucion : '';
        let value = e.target.value;
        console.log(value);
        if (value == 0) {
            $('#select_info_respiracion_servicio' + id).addClass('d-none');
        } else {
            $('#select_info_respiracion_servicio' + id).removeClass('d-none');
        }

    }

    // function agregarEvolucionPaciente(idEvolucion = null) {
    //     var id = idEvolucion ? idEvolucion : '';
    //     var fecha = $('#fecha' + id).val();
    //     var hora = $('#hora' + id).val();
    //     var temperatura = $('#temperatura' + id).val();
    //     var pulso = $('#pulso' + id).val();
    //     var pas = $('#pas' + id).val();
    //     var pad = $('#pad' + id).val();
    //     var pam = $('#pam' + id).val();
    //     var frec_resp = $('#fr' + id).val();
    //     var peso = $('#peso' + id).val();
    //     var talla = $('#talla' + id).val();
    //     var imc = $('#imc' + id).val();
    //     var tipo_respiracion_servicio = $('#tipo_respiracion_servicio' + id).val();
    //     var sat_fio2 = $('#saturacion_fio2' + id).val();
    //     var sat_o2 = $('#saturacion_oxigeno' + id).val();
    //     var dispositivo_servicio = $('#dispositivo_servicio' + id).val();
    //     var hemoglucotest = $('#hemoglucotest' + id).val();
    //     var glasgow = $('#glasgow' + id).val();
    //     var c_eva = $('#c_eva' + id).val();
    //     var otras_pruebas = $('#otras_pruebas' + id).val();
    //     var gravedad_e_conc = $('#gravedad_e_conc' + id).val();

    //     var idPaciente = $('#id_paciente').val();

    //     var valido = 1;
    //     var mensaje = '';

    //     if (temperatura == '') {
    //         valido = 0;
    //         mensaje += 'Campo requerido Temperatura\n';
    //     }
    //     if (pulso == '') {
    //         valido = 0;
    //         mensaje += 'Campo requerido Pulso\n';
    //     }
    //     if (imc == '') {
    //         valido = 0;
    //         mensaje += 'Campo requerido IMC\n';
    //     }


    //     var data = {
    //         id_paciente: idPaciente,
    //         fecha: fecha,
    //         hora: hora,
    //         temperatura: temperatura,
    //         pulso: pulso,
    //         pas: pas,
    //         pad: pad,
    //         pam: pam,
    //         frec_resp: frec_resp,
    //         peso: peso,
    //         talla: talla,
    //         imc: imc,
    //         tipo_respiracion_servicio: tipo_respiracion_servicio,
    //         sat_fio2: sat_fio2,
    //         sat_o2: sat_o2,
    //         dispositivo_servicio: dispositivo_servicio,
    //         hemoglucotest: hemoglucotest,
    //         glasgow: glasgow,
    //         c_eva: c_eva,
    //         otras_pruebas: otras_pruebas,
    //         gravedad_e_conc: gravedad_e_conc,
    //         idCounter: idCounter,
    //         idEvolucion: idEvolucion,
    //         _token: '{{ csrf_token() }}'
    //     }

    //     console.log(data);

    //     let url = "{{ route('profesional.agregar_evolucion_paciente_hosp') }}";
    //     $.ajax({
    //         url: url,
    //         type: 'POST',
    //         data: data,
    //         success: function(resp) {
    //             console.log(resp);
    //             let mensaje = resp.mensaje;
    //             let vista = resp.vista;
    //             if (mensaje == 'OK') {
    //                 swal({
    //                     title: 'Éxito',
    //                     text: 'Evolución agregada correctamente',
    //                     icon: 'success',
    //                     button: 'Aceptar'
    //                 });
    //                 $('#contenedor_evoluciones_paciente').empty();
    //                 $('#contenedor_evoluciones_paciente').html(vista);
    //                 $('#contenedor_nueva_evolucion').empty();
    //                 idCounter++;
    //             } else {
    //                 swal({
    //                     title: 'Error',
    //                     text: mensaje,
    //                     icon: 'error',
    //                     button: 'Aceptar'
    //                 })
    //             }

    //         },
    //         error: function(error) {
    //             console.log(error);
    //         }
    //     });
    // }

    function agregarEvolucionPacienteHospital(idEvolucion = null) {
        var id = idEvolucion ? idEvolucion : '';
        var evolucion = $('#evolucion' + id).val();
        var resumen = $('#resumen_evolucion' + id).val();

        var idPaciente = $('#id_paciente').val();

        var valido = 1;
        var mensaje = '';

        if (evolucion == '') {
            valido = 0;
            mensaje += 'Campo requerido Evolucion\n';
        }
        if (resumen == '') {
            valido = 0;
            mensaje += 'Campo requerido Resumen\n';
        }

        if(valido == 0){
            swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }

        var data = {
            id_paciente: idPaciente,
            evolucion: evolucion,
            resumen: resumen,
            _token: '{{ csrf_token() }}'
        }

        console.log(data);

        let url = "{{ route('profesional.agregar_evolucion_paciente_hosp') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(resp) {
                console.log(resp);
                let mensaje = resp.mensaje;
                let vista = resp.vista;
                if (mensaje == 'OK') {
                    swal({
                        title: 'Éxito',
                        text: 'Evolución agregada correctamente',
                        icon: 'success',
                        button: 'Aceptar'
                    });
                    $('#contenedor_evoluciones_paciente').empty();
                    $('#contenedor_evoluciones_paciente').html(vista);
                    $('#contenedor_nueva_evolucion').empty();
                    idCounter++;
                } else {
                    swal({
                        title: 'Error',
                        text: mensaje,
                        icon: 'error',
                        button: 'Aceptar'
                    })
                }

            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function eliminarEvolucionPacienteHospital(id) {
        let idEvolucion = $('#evolucion' + id).val();
        console.log(idEvolucion);
        // Elimina el elemento con el ID proporcionado
        $('#contenedor_evolucion_' + id).remove();
    }

    function registrar_salida_paciente(){
        var destino = $('#dest').val();
        var medio_traslado = $('#trasl_en').val();
        var condiciones = $('#cond_alt').val();
        var indicaciones_medicas = $('#obs_hospitalizar').val();
        var resultado_examenes = $('#fl_resultado_ex').val();

        var valido = 1;
        var mensaje = '';

        if(destino == 0){
            valido = 0;
            mensaje += 'Campo requerido Destino\n';
        }
        if(medio_traslado == 0){
            valido = 0;
            mensaje += 'Campo requerido Medio de traslado\n';
        }
        if(condiciones == 0){
            valido = 0;
            mensaje += 'Campo requerido Condiciones\n';
        }
        if(indicaciones_medicas == ''){
            valido = 0;
            mensaje += 'Campo requerido Indicaciones médicas\n';
        }

        if(valido == 0){
            swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }
    }

    function guardar_evolucion_hospital(){
        let evolucion = $('#evolucion1').val();
        let resumen = $('#resumen_evolucion').val();
        let id_paciente = $('#id_paciente').val();

        let valido = 1;
        let mensaje = '';

        if(evolucion == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Evolucion</li>';
        }
        if(resumen == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Resumen</li>';
        }

        if(valido == 0){
           return swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }

        let data = {
            evolucion: evolucion,
            resumen: resumen,
            id_paciente: id_paciente,
            _token: CSRF_TOKEN
        }

        let url = '{{ ROUTE("adm_hospital.registrar_evolucion_paciente_hosp") }}';
        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
            },
            error: function(error){
                console.log(error.responseText);
            }
        });

    }
</script>
