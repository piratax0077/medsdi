<div id="ingreso_m_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ingreso_m_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine"> Solicitud de hospitalización</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <script>
                            var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                            var f=new Date();
                            document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                            </script>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="info-ingreso-hosp-tab" data-toggle="tab" href="#info-ingreso-hosp" role="tab" aria-controls="info-ingreso-hosp" aria-selected="true">Info. Ingreso</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="indicaciones-hosp-tab" data-toggle="tab" href="#indicaciones-hosp" role="tab" aria-controls="indicaciones-hosp" aria-selected="false">Indicaciones ingreso</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="archivos-hosp-pab-tab" data-toggle="tab" href="#archivos-hosp-pab" role="tab" aria-controls="archivos-hosp-pab" aria-selected="false">Archivos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="comentarios-hosp-pab-tab" data-toggle="tab" href="#comentarios-hosp-pab" role="tab" aria-controls="comentarios-hosp-pab" aria-selected="false">Comentarios</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="info-ingreso">
                                <!--INFO. INGRESO-->
                                <div class="tab-pane fade show active" id="info-ingreso-hosp" role="tabpanel" aria-labelledby="info-ingreso-hosp-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 mb-2">
                                            <h6 class="text-c-blue">INFORMACIÓN DE PACIENTE</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="label"><strong>Nombre: </strong></label>
                                            <label class="label">{{ $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos }}</label>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="label"><strong>FN: </strong></label>
                                            <label class="label">{{ $paciente->fecha_naciemiento }}</label>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="label"><strong>Prevision: </strong></label>
                                            <label class="label">{{ $paciente->Prevision->first()->nombre }}</label>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="label"><strong>Teléfono: </strong></label>
                                            <label class="label">{{ $paciente->telefono_uno }}</label>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="label"><strong>Email: </strong></label>
                                            <label class="label">{{ $paciente->email }}</label>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                           <label class="label"><strong>Enfermedades Cronicas: </strong></label>

                                                @php
                                                    $patalogias_cronicas = '';
                                                @endphp
                                                @foreach ($patoligias_cronicas as $patologia_cronica)
                                                    @php
                                                        $temp = json_decode($patologia_cronica->data);
                                                        echo $temp->nombre;
                                                        $patalogias_cronicas .= $temp->nombre;
                                                    @endphp
                                                    @if($patologia_cronica->comentario)
                                                        ,{{ $patologia_cronica->comentario }}
                                                        @php
                                                            $patalogias_cronicas .= ', '.$patologia_cronica->comentario;
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
                                            <label class="floating-label-activo-sm">Otros Antecedentes Medicos</label>
                                            <input type="text" class="form-control form-control-sm" name="ingreso_sol_pab_modal_otros_antecedentes" id="ingreso_sol_pab_modal_otros_antecedentes" value="">
                                            <input type="hidden" name="ingreso_sol_pab_modal_patalogias_cronicas" id="ingreso_sol_pab_modal_patalogias_cronicas" value="{{ $patalogias_cronicas }}">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 mb-2">
                                            <h6 class="text-c-blue">MÉDICO  TRATANTE</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <label class="label"><strong>Nombre: </strong></label>
                                            <label class="label">{{ $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos }}</label>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <label class="label"><strong>Especialidad: </strong></label>
                                            <label class="label">@if($profesional->SubTipoEspecialidad()->first()) {{ $profesional->SubTipoEspecialidad()->first()->nombre }} @else {{ $profesional->TipoEspecialidad()->first()->nombre }}  @endif </label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <label class="floating-label-activo-sm">Clínica - Hospital</label>
                                            <input type="text" class="form-control form-control-sm" id="hosp_en" name="hosp_en" value="">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <label class="floating-label-activo-sm">Diagnósticos </label>
                                            <textarea class="form-control caja-texto form-control-sm " rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="dg_ingreso" id="dg_ingreso" value=""> </textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Servicio</label>
                                                <input type="text" class="form-control form-control-sm" name="serv_hosp" id="serv_hosp" value="">
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="esp-3">
                                                    <label class="custom-control-label" for="esp-3">Preparar para Cirugía?</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <!--INDICACIONES INGRESO-->
                                <div class="tab-pane fade show" id="indicaciones-hosp" role="tabpanel" aria-labelledby="indicaciones-hosp-tab">
                                    <form>
                                        <div class="form-row mb-2">
                                            <div class="col-md-12 mb-2">
                                                <h6 class="text-c-blue">INDICACIONES DE INGRESO</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                <label class="floating-label-activo-sm">Indicaciones Médicas de ingreso<i> (Medicamentos)</i></label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ind_ingreso" id="ind_ingreso"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                <label class="floating-label-activo-sm">Indicaciones Exámenes de ingreso</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ind_ingreso" id="ind_ingreso"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                <label class="floating-label-activo-sm">Otras Indicaciones  de ingreso</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ind_ingreso" id="ind_ingreso"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--ARCHIVO-->
                                <div class="tab-pane fade show" id="archivos-hosp-pab" role="tabpanel" aria-labelledby="archivos-hosp-pab-tab">

                                    <form>
                                        <div class="form-row mb-2">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <h6 class="mb-2 text-c-blue">ARCHIVOS</h6>
                                                <input class="mb-2" size="80" name="archivo_up" id="archivo_up" type="file" onchange="javascript: submit();">
                                                <br>

                                                <div class="alert alert-warning alert-dismissible fade show pb-2" role="alert">
                                                    <i class="feather icon-file f-16"></i><a href="#" class="alert-link"> CONSENTIMIENTO</a>
                                                    <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="alert alert-warning alert-dismissible fade show pb-2" role="alert">
                                                    <i class="feather icon-file f-16"></i><a href="#" class="alert-link"> Eco -Doppler- Nombre paciente.pdf</a>
                                                    <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--COMENTARIOS-->
                                <div class="tab-pane fade show" id="comentarios-hosp-pab" role="tabpanel" aria-labelledby="comentarios-hosp-pab-tab">
                                    <form>
                                        <div class="form-row mb-2">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <h6 class="mb-3 text-c-blue">COMENTARIOS</h6>
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Comentarios</label>
                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="otros_hosp" id="otros_hosp"></textarea>
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

    function ingresohosp() {
        $('#ingreso_m_modal').modal('show');
    }
</script>
