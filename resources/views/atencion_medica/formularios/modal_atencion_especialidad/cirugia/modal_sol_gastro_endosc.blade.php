<div id="m_gastroenterologia_end" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="#m_gastroenterologia_end" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Solicitud Exámenes Endoscópicos</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                <div class="form-row mt-1">

                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm" for="examenes_endoscopico">Seleccione Examen</label>
                        <select class="js-example-basic-multiple select2" name="examenes_endoscopico" id="examenes_endoscopico" multiple="multiple">
                            <option value="1"> 18 01 001 3  &nbsp; | &nbsp;  GASTRODUODENOSCOPÍA</option>
                            <option value="2"> 18 01 037  &nbsp; | &nbsp; TEST DE UREASA </option>
                            <option value="3"> 18 01 002 3 &nbsp; | &nbsp;  ESOFAGOSCOPIA 	</option>
                            <option value="4"> 18 01 003 3  &nbsp; | &nbsp; ENTEROSCOPÍA</option>
                            <option value="5"> 18 01 004 2 &nbsp; | &nbsp;  ANO-RECTO-SIGMOIDOSCOPIA EN ADULTOS</option>
                            <option value="6"> 18 01 005 2  &nbsp; | &nbsp;  ANO-RECTO-SIGMOIDOSCOPÍA EN NIÑOS</option>
                            <option value="7"> 18 01 006 3  &nbsp; | &nbsp;  COLONOSCOPÍA LARGA 	 </option>
                            <option value="8"> 18 01 007 3  &nbsp; | &nbsp; SIGMOIDOSCOPÍA Y COLONOSCOPÍA IZQUIERDA CON TUBO FLEXIBLE   </option>
                            <option value="9"> 18 01 008 &nbsp; | &nbsp;  COLEDOCOSCOPIA INTRAOPERATORIA C/S EXTRACCIÓN DE CÁLCULOS  </option>
                            <option value="10">18 01 009 4  &nbsp; | &nbsp; PERITONEOSCOPIA TRANSPARIETAL	 </option>
                            <option value="11">18 01 011  &nbsp; | &nbsp; 	MANOMETRÍA ESOFÁGICA CONVENCIONAL  </option>
                            <option value="12">18 01 012&nbsp; | &nbsp; TEST DE REFLUJO ÁCIDO, TEST DE (GROSSMAN O SIMILAR) O REFLUJO ALCALINO  </option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm">Diagnóstico</label>
                        <input class="form-control" type="text" id="diagnostico_endoscopico">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Observaciones</label>
                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1" onfocus="this.rows=3"
                                onblur="this.rows=1;" name="observaciones_endoscopias" id="observaciones_endoscopias"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-success btn-sm float-right"  onclick="guardar_examenes(3)">
                            <i class="fa fa-plus"></i> Agregar examen</button>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 mt-3">
                        <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                        <!--Tabla-->
                        <div class="table-responsive">
                            <table class="table table-bordered table-xs" id="table_examen_3">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Examen</th>
                                        <th class="text-center align-middle">Diagnóstico</th>
                                        <th class="text-center align-middle">Observaciones</th>
                                        <th class="text-center align-middle">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($examenes_plan_tratamiento_broncoscopia) && $examenes_plan_tratamiento_broncoscopia->count() > 0)
                                        @foreach ($examenes_plan_tratamiento_broncoscopia as $e)
                                            @foreach (json_decode($e->examenes, true) as $examen_nombre)
                                                <tr>
                                                    {{-- Fecha --}}
                                                    <td class="text-center align-middle">
                                                        {{ \Carbon\Carbon::parse($e->created_at)->format('d-m-Y H:i') }}
                                                    </td>

                                                    {{-- Examen --}}
                                                    <td class="text-left align-middle">
                                                        • {{ $examen_nombre }}
                                                    </td>

                                                    {{-- Diagnóstico --}}
                                                    <td class="text-left align-middle">
                                                        {{ $e->diagnostico }}
                                                    </td>

                                                    {{-- Observaciones --}}
                                                    <td class="text-left align-middle">
                                                        {{ $e->observaciones }}
                                                    </td>

                                                    {{-- Acciones --}}
                                                    <td class="text-center align-middle">
                                                        <button type="button" class="btn btn-danger btn-sm mb-1"
                                                            onclick="eliminarExamen('{{ $e->id }}',3, '{{ $examen_nombre }}')"><i
                                                                class="fas fa-trash"></i></button>

                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            onclick="generarPDF({{ $e->id }}, '{{ $examen_nombre }}')">PDF</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">No hay exámenes registrados.</td>
                                        </tr>
                                    @endif
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" onclick="cerrarsol_examen_endoscopia();"
                    data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info btn-sm"> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function sol_examen_endoscopia() {

        $('#m_gastroenterologia_end').modal('show');
    }

    function cerrarsol_examen_endoscopia() {
        $('#m_gastroenterologia_end').modal('hide');
    }
</script>

