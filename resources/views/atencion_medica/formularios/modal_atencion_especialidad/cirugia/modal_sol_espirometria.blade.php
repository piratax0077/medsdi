<div id="m_espiro" class="modal fade" role="dialog" aria-labelledby="m_espiro" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Solicitud Exámenes Funcionales</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal"  aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row mt-1">
                       
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="ex-func-bronco">Exámenes Funcionales</label>
                            <select class="js-example-basic-multiple select2" name="ex-func-bronco" id="ex-func-bronco" multiple="multiple">
                                <option value="1">17 07 001 &nbsp;  |  &nbsp; ESPIROMETRÍA BASAL </option>
                                <option value="2">17 07 002 &nbsp;  |  &nbsp;ESPIROMETRÍA BASAL Y CON BRONCODILATADOR</option>
                                <option value="3">17 07 003 &nbsp;  |  &nbsp;PRUEBA DE PROVOCACIÓN CON ALERGENO </option>
                                <option value="4">17 07 004 &nbsp;  |  &nbsp;TEST DE PROVOCACIÓN CON EJERCICIO </option>
                                <option value="5">17 07 005 &nbsp;  |  &nbsp;TEST DE PROVOCACIÓN CON METACOLINA</option>
                                <option value="6">17 07 051 &nbsp;  |  &nbsp;CURVA DOSIS RESPUESTA A BRONCODILATADORES</option>
                                <option value="7">17 07 007 &nbsp;  |  &nbsp;ANÁLISIS DE GAS ESPIRADO  </option>
                                <option value="8">17 07 008 &nbsp;  |  &nbsp;ESTUDIO DE CAPACIDAD DE DIFUSIÓN	</option>
                                <option value="9">17 07 009 &nbsp;  |  &nbsp;CAPACIDAD FÍSICA DEL TRABAJO 	</option>
                                <option value="11">17 07 011 &nbsp;  |  &nbsp;CURVA DE RELACIÓN FLUJO-VOLUMEN BASAL  </option>
                                <option value="10">17 07 010 &nbsp;  |  &nbsp;CURVA DE LAVADO DE NITRÓGENO 	</option>
                                <option value="12">17 07 012 &nbsp;  |  &nbsp;DISTENSIBILIDAD PULMONAR, (COMPLIANCE)	</option>
                                <option value="13">17 07 013 &nbsp;  |  &nbsp;MEDICIÓN DE PRESIÓN DE OCLUSIÓN </option>
                                <option value="14">17 07 014 &nbsp;  |  &nbsp;MEDICIÓN DE PRESIÓN INSPIRATORIA MÁXIMA	</option>
                                <option value="15">17 07 015 &nbsp;  |  &nbsp;MEDICIÓN DE PRESIÓN TRANS-DIAFRAGMÁTICA</option>
                                <option value="16">17 07 016 &nbsp;  |  &nbsp;REGISTRO FLUJOMÉTRICO	</option>
                                <option value="17">17 07 017 &nbsp;  |  &nbsp;RESPUESTA RESPIRATORIA AL CO2 	</option>
                                <option value="18">17 07 018 &nbsp;  |  &nbsp;TIEMPO DE TOLERANCIA A LA FATIGA RESPIRATORIA	</option>
                                <option value="19">17 07 019 &nbsp;  |  &nbsp; ESTUDIO DE VENTILACIÓN ALVEOLAR VOL.ESPACIO MUERTO Y CR	</option>
                                <option value="20">17 07 025 &nbsp;  |  &nbsp; GASOMETRÍA ARTERIAL EN REPOSO Y EJERCICIO</option>
                                <option value="21">17 07 038 &nbsp;  |  &nbsp; POLIGRAFÍA CARDIORRESPIRATORIA DEL SUEÑO 	</option>
                                <option value="22">17 07 052 &nbsp;  |  &nbsp; SATUROMETRÍA NOCTURNA DEL SUEÑO</option>	
                                <option value="23">17 07 053 &nbsp;  |  &nbsp; TITULACIÓN AUTOMÁTICA DE CPAP 	</option>
                                <option value="24">17 07 063 &nbsp;  |  &nbsp; POLIGRAFÍA CARDIORRESPIRATORIA DEL SUEÑO AMBULATORIA</option>
                                <option value="25">	17 07 054&nbsp;  |  &nbsp; SATURACIÓN DE O2 EN REPOSO Y/O EJERCICIO (CON OXÍMETRO) 	</option>
                                <option value="25">17 07 055 &nbsp;  |  &nbsp; ATURACIÓN DE O2 EN REPOSO Y EJERCICIO Y O2 100% (CON OXÍMETRO) 	</option>

                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm">Diagnóstico</label>
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="form-row d-none">
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label">Rut Paciente</label>
                                <input type="text" name="rut_pcte" id="rut_pcte" type="text" class="form-control form-control-sm"  value="{{ $paciente->rut }}" hidden>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label">Nombre</label>
                                <input type="text" name="zona" id="zona" type="text" class="form-control form-control-sm"  value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                            </div>
                        </div>
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label-activo-sm">Hipótesis Diagnóstica</label>
                            <textarea type="text" class="form-control form-control-sm" rows="2" name="hipotesis_certificado"
                                id="hipotesis_certificado"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="desinf">Tipo de antisepticos</label>
                            <select class="js-example-basic-multiple select2" name="desinf" id="desinf" multiple="multiple">
                                <option value="1">Solución fisiológica</option>
                                <option value="2">Bialcohol</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Observaciones</label>
                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ex-funcionales bronco" id="obs_ex-funcionales bronco"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right">
                            <i class="fa fa-plus"></i> Agregar examen</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 mt-3">
                            <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-xs">
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
                                        <tr>
                                            <td class="text-center align-middle"><span>03/12/20</span></td>
                                            <td class="text-center align-middle">Espirometría</td>
                                            <td class="text-center align-middle">EBOC</td>
                                            <td class="text-center align-middle">insuficiencia</td>

                                            <td class="text-center align-middle">
                                            <button class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                            <button class="btn btn-primary btn-sm ">PDF</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" onclick="cerrarsol_examen_espiro();" data-bs-dismiss="modal" >Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm"> Guardar</button>
            </div>
        </div>
    </div>
</div>
<style>
    .select2-dropdown{
        z-index: 9999 !important;
    }
</style>
<!-- select2 selectbonito css -->
<link rel="stylesheet" href="{{ asset('css/plugins/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/formularios.css') }}">


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script>
   
    function sol_examen_espirometria()
    {
        $('#m_espiro').modal('show');
    }
    function cerrarsol_examen_espiro() {
        $('#m_espiro').modal ('hide');
      }
     
</script>
{{--  <link rel="stylesheet"  href="{{ asset('css\plugins\select2.min.css') }}">

<link rel="stylesheet" href="{{ asset('css/plugins/select2.min.css') }}">
<!-- select2 Js -->
<script src="{{ asset('js/plugins/select2.full.min.js') }}"></script>
<!-- form-select-custom Js -->
<script src="{{ asset('js/pages/form-select-custom.js') }}"></script>
<!-- select2 css -->  --}}
