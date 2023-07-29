<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-1 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            </div>
        </div>
        <div class="row mx-1 mt-2">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0 pt-3 d-inline float-left">
                        <h6 class="f-20 text-c-blue float-left mb-3">Licencia médica</h6>
                         <button type="button" class="btn btn-xs btn-primary-light float-right"><i class="feather icon-printer"></i> Imprimir</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <form>
                            <!--SWITCH TIPO ENFERMEDAD-->
                            <div class="form-row mb-3">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="enf-com-1">
                                        <label class="custom-control-label" for="enf-com-1">Enfermedad común o maternal</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="lab-1">
                                        <label class="custom-control-label" for="lab-1">Laboral</label>
                                    </div>
                                </div>
                            </div>
                            <!--INFO. DEL TRABAJADOR-->
                            <div class="form-row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="info-trabajador">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#info-trabajador-c" aria-expanded="false" aria-controls="info-trabajador-c">
                                              Información del trabajador
                                            </button>
                                        </div>
                                        <div id="info-trabajador-c" class="collapse show" aria-labelledby="info-trabajador" data-parent="#info-trabajador">
                                            <div class="card-body-aten-a shadow-none">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Previsión</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{ $paciente->prevision->nombre }}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Rut</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut_paciente_fc" id="rut_paciente_fc" value="{{ $paciente->rut }}">

                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <button type="button" class="btn btn-sm btn-primary-light btn-block" onclick="l_autoriz_compin()";>Solicitar autorización</button>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <button type="button" class="btn btn-sm btn-info-light btn-block" onclick="l_info_empl()";>Verificar</button>
                                                            @include('general.secciones_ficha.modal.m_info_empleadores')
                                                            @include('general.secciones_ficha.modal.m_autor_compin')

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--REPOSO-->
                            <div class="form-row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="reposo">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#reposo-c" aria-expanded="false" aria-controls="reposo-c">
                                              Reposo
                                            </button>
                                        </div>
                                        <div id="reposo-c" class="collapse show" aria-labelledby="reposo" data-parent="#reposo">
                                            <div class="card-body-aten-a shadow-none">
                                                <div class="form-row">

                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label-activo-sm">Desde</label>
                                                        <input type="date" name="fecha" id="fecha" class="form-control form-control-sm" onchange="sumaFecha($('#num_dias_reposo').val(),$('#fecha').val());"/>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label-activo-sm">N° días</label>
                                                        <input type="text" name="num_dias_reposo" id="num_dias_reposo" class="form-control form-control-sm" onchange="sumaFecha($('#num_dias_reposo').val(),$('#fecha').val());"/>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label-activo-sm">Hasta</label>
                                                        <input type="text" name="hasta" id="hasta" class="form-control form-control-sm" value=""/>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label-activo-sm">
                                                        Tipo de reposo
                                                        </label>
                                                        <select class="form-control form-control-sm" name="tipo_reposo" id="tipo_reposo">
                                                            <option selected>Total</option>
                                                            <option>Mañana</option>
                                                            <option>Tarde</option>
                                                            <option>Otro</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--INFORMACION LICENCIA-->
                            <div class="form-row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="menor-edad">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#menor-edad-c" aria-expanded="false" aria-controls="menor-edad-c">
                                              Información de licencia
                                            </button>
                                        </div>
                                        <div id="menor-edad-c" class="collapse show" aria-labelledby="menor-edad" data-parent="#menor-edad">
                                            <div class="card-body-aten-a shadow-none">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label-activo-sm"> Tipo de licencia</label>
                                                            <select class="form-control d-inline form-control-sm" name="" id="">
                                                                <option>Seleccione una opción</option>
                                                                <option selected value= "1"> Tipo 1: enfermedad o accidente común.</option>
                                                                <option value= "2" >Tipo 2: medicina preventiva.</option>
                                                                <option value= "3" >Tipo 3: pre y postnatal.</option>
                                                                <option value= "4">Tipo 4: enfermedad grave del niño menor del año</option>
                                                                <option value= "5">Tipo 5: Patología del Embarazo</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="info_licencia_1">
                                                                <label class="custom-control-label" for="info_licencia_1">Recuperabilidad laboral</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="info_licencia_2">
                                                                <label class="custom-control-label" for="info_licencia_2">Inicio trámite de invalidez</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--DIAGNÓSTICO-->
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="diagnostico_lic">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico-_lic-c" aria-expanded="false" aria-controls="diagnostico-_lic-c">
                                                Diagnóstico
                                            </button>
                                        </div>
                                        <div id="diagnostico-_lic-c" class="collapse show" aria-labelledby="diagnostico_lic" data-parent="#diagnostico_lic">
                                            <div class="card-body-aten-a shadow-none">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        @if (isset($fichaAtencion) &&
                                                        $fichaAtencion->hipotesis_diagnostico != null)
                                                        <label class="floating-label-activo-sm">Hipótesis
                                                            Diagnóstica</label>
                                                        <input type="text" class="form-control form-control-sm"  data-input_igual="hip-diag_spec,descripcion_hipotesis" name="lic_descripcion_hipotesis" id="lic_descripcion_hipotesis" value="{{ $fichaAtencion->hipotesis_diagnostico }}" onchange="cargarIgual('lic_descripcion_hipotesis')">
                                                        @else
                                                        <label class="floating-label-activo-sm">Hipótesis
                                                            Diagnóstica</label>
                                                        <input type="text" class="form-control form-control-sm" data-input_igual="hip-diag_spec,descripcion_hipotesis"  name="lic_descripcion_hipotesis" id="lic_descripcion_hipotesis" value="{!! old('descripcion_hipotesis') !!}" onchange="cargarIgual('lic_descripcion_hipotesis')">
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        @if (isset($fichaAtencion) && $fichaAtencion->diagnostico_ce10
                                                        != null)
                                                        <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                        <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_cie,descripcion_cie_esp" name="lic_descripcion_cie" id="lic_descripcion_cie" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('lic_descripcion_cie')">
                                                        <input type="hidden" class="form-control form-control-sm" data-input_igual="id_descripcion_cie,id_descripcion_cie_esp" name="id_lic_descripcion_cie" id="id_lic_descripcion_cie" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('id_lic_descripcion_cie')">
                                                        @else
                                                        <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                        <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_cie,descripcion_cie_esp" name="lic_descripcion_cie" id="lic_descripcion_cie" value="{!! old('lic_descripcion_cie') !!}" onchange="cargarIgual('lic_descripcion_cie')">
                                                        <input type="hidden" class="form-control form-control-sm" data-input_igual="id_descripcion_cie,id_descripcion_cie_esp" name="id_lic_descripcion_cie" id="id_lic_descripcion_cie" value="{!! old('id_lic_descripcion_cie') !!}" onchange="cargarIgual('id_lic_descripcion_cie')">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--OTROS ANTECEDENTES-->
                            <div class="form-row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="ot-ant-lic">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#ot-ant-lic-c" aria-expanded="false" aria-controls="ot-ant-lic-c">
                                                Otros antecedentes
                                            </button>
                                        </div>
                                        <div id="ot-ant-lic-c" class="collapse show" aria-labelledby="ot-ant-lic" data-parent="#ot-ant-lic">
                                            <div class="card-body-aten-a shadow-none">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label class="floating-label">Descripción</label>
                                                        <textarea class="form-control form-control-sm"rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="otros_ant_desc" id="otros_ant_desc"></textarea>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--EXAMENES DE APOYO-->
                            <div class="form-row">
                                <div class="col-sm-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="exam-apoyo">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#exam-apoyo-c" aria-expanded="false" aria-controls="exam-apoyo-c">
                                              Exámenes de apoyo
                                            </button>
                                        </div>
                                        <div id="exam-apoyo-c" class="collapse show" aria-labelledby="exam-apoyo" data-parent="#exam-apoyo">
                                            <div class="card-body-aten-a shadow-none">
                                                <form>
                                                    <input type="file" class="form-control-file pb-3" id="exampleFormControlFile1">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--BOTONES ACCION-->
                            <div class="row pb-3">
                                <div class="col-md-3 text-center mb-3">
                                    <button type="button" class="btn btn-sm btn-info-light-c btn-block" onclick="l_autoriz_app()";><i class="feather icon-loader"></i> Solicitar autorización</button><!--profesional y paciente-->
                                    @include('general.secciones_ficha.modal.m_esperando_app')
                                </div>
                                <div class="col-md-3 text-center mb-3">
                                    <button type="button" class="btn btn-sm btn-primary-light-c btn-block"><i class="feather icon-file-text"></i> Ver PDF</button>
                                </div>
                                <div class="col-md-3 text-center mb-3">
                                    <button type="button" class="btn btn-sm btn-primary-light-c btn-block"><i class="feather icon-mail"></i> Enviar</button>
                                </div>
                                <div class="col-md-3 text-center mb-3">
                                    <button type="button" class="btn btn-sm btn-primary-light-c btn-block"><i class="feather icon-printer"></i> Imprimir</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function l_info_empl() {
        $('#m_lic_empleador').modal('show');
    }
    function l_autoriz_compin() {
        $('#m_lic_autor_compin').modal('show');
    }
    function l_autoriz_app() {
        $('#m_lic_autor_app').modal('show');
    }
</script>

<script>
//num_dias_reposo
//fecha
//hasta

        // Función que suma o resta días a la fecha indicada
        /*
        sumaFecha2 = function(d, fecha)
        {
        var Fecha = new Date();
        var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() +1) + "/" + Fecha.getFullYear());
        var sep = sFecha.indexOf('/') != -1 ? '/' : '-';
        var aFecha = sFecha.split(sep);
        var fecha = aFecha[2]+'/'+aFecha[1]+'/'+aFecha[0];
        fecha= new Date(fecha);
        fecha.setDate(fecha.getDate()+parseInt(d));
        var anno=fecha.getFullYear();
        var mes= fecha.getMonth()+1;
        var dia= fecha.getDate();
        mes = (mes < 10) ? ("0" + mes) : mes;
        dia = (dia < 10) ? ("0" + dia) : dia;
        var fechaFinal = dia+sep+mes+sep+anno;
        // return (fechaFinal);
        $('#hasta').val(fechaFinal);
        }
        */
        function sumaFecha(dias,fecha_eng )
        {
            dias = parseInt(dias);
            if(dias>0&&fecha_eng!='')
            {
            var result = new Date(fecha_eng);
            result.setDate(result.getDate() + (dias+1));
            var anno=result.getFullYear();
            var mes= result.getMonth()+1;
            var dia= result.getDate();
            mes = (mes < 10) ? ("0" + mes) : mes;
            dia = (dia < 10) ? ("0" + dia) : dia;
            $('#hasta').val(dia+'/'+mes+'/'+anno);
            //$('#hasta').val(anno+'-'+mes+'-'+dia);
            }
        }
</script>
