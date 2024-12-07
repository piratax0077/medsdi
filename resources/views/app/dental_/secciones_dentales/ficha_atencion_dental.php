<ul class="nav nav-tabs mb-3 mt-3" id="dental" role="tablist">
    <li class="nav-item">
        <a class="nav-atencion-medica active text-uppercase" id="ficha-dental-tab" data-toggle="tab" href="#ficha-dental" role="tab" aria-controls="ficha-dental" aria-selected="true">Atención dental</a>
    </li>
    <li class="nav-item">
        <a class="nav-atencion-medica text-uppercase" id="odonto-adulto-tab" data-toggle="tab" href="#odonto-adulto" role="tab" aria-controls="odonto-adulto" aria-selected="false">Odontograma</a>
    </li>
    <li class="nav-item">
        <a class="nav-atencion-medica text-uppercase" id="periodontograma-tab" data-toggle="tab" href="#periodontograma" role="tab" aria-controls="periodontograma" aria-selected="false">Periodontrograma</a>
    </li>
    <li class="nav-item">
        <a class="nav-atencion-medica text-uppercase" id="evaluacion-adulto-tab" data-toggle="tab" href="#evaluacion-adulto" role="tab" aria-controls="evaluacion-adulto" aria-selected="false">Evaluación</a>
    </li>
    <li class="nav-item">
        <a class="nav-atencion-medica text-uppercase" id="tratamiento-tab" data-toggle="tab" href="#tratamiento" role="tab" aria-controls="tratamiento" aria-selected="false">Tratamiento</a>
    </li>
</ul>
<div class="row">
    <div class="col-md-12">
        <div class="tab-content" id="dental-contenido">
            <div class="tab-pane fade show active" id="ficha-dental" role="tabpanel" aria-labelledby="ficha-dental-tab">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="text-c-blue mt-1 mb-1 f-16">Ficha de atención dental</h5>
                        <hr>
                    </div>
                    <hr>
                    <!--Formulario / Menor de edad-- y secargan la evaluacion infantil y el odontograma infantil-->
                    <!--Formulario / Menor de edad-->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h6>Paciente menor de edad</h6>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-row mb-1">
                                        <div class="col-md-12">
                                            <h6>Información del acompañente</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Rut</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Nombre y Apellidos</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                        </div>
                                        <div class="form-group col-md-4" id="form_0">
                                            <label class="floating-label">Relación</label>
                                            <input type="text" class="form-control form-control-sm" name="relacion_acompañante" id="relacion_acompañante">
                                        </div>
                                    </div>
                                    <div class="form-row mb-1">
                                        <div class="col-md-12">
                                            <h6>Información del responsable del pago</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3" id="form_0">
                                            <label class="floating-label">Rut</label>
                                            <input type="text" class="form-control form-control-sm" name="responsable_pago" id="responsable_pago">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Nombre y Apellidos</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Email</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                        </div>
                                        <div class="form-group col-md-3" id="form_0">
                                            <button type="button" class="btn btn-success btn-block btn-sm" onclick="respon_pago_dent();"><i class="fa fa-plus"></i> Aceptar Pago</button>
                                            <!--genera codigo de aceptación al teléfono del responsable del pago-->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Formulario / Menor de edad-->
                    <!--Formulario / Motivo consulta-->
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <h6>Motivo de la consulta</h6>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 mx-auto">
                                                    <label class="floating-label">Descripción</label>
                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" name="descripcion_antecedentes" id="descripcion_antecedentes"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Formulario / Motivo consulta-->
                    <!--Formulario / Antecedentes-->
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <h6>Antecedentes</h6>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 mx-auto">
                                                    <label class="floating-label">Descripción</label>
                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" name="descripcion_antecedentes" id="descripcion_antecedentes"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <h6>Antecedentes dentales</h6>
                                    </div>
                                    <div class="card-body pt-1 pb-1">
                                        <form>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" role="button" onclick="info_info1();" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                Problemas con la anestesia local
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" role="button" onclick="info_info2();" id="flexCheckDefault2">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                Hemorragias
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" role="button" onclick="info_info3();" id="flexCheckDefault3">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                Fracturas
                                                </label>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Formulario / Antecedentes-->
                    <!--Formulario / Signos vitales y otros-->
                        <div class="col-sm-12">
                            <div class="card mb-3">
                                <div class="card-header bg-info align-middle">
                                    <h6 class="float-left d-inline">Signos vitales y otros</h6>
                                    <i id="signos_vitales" class="float-right f-18 d-inline fas fa-angle-down  mb-0" style="cursor:pointer"></i>
                                </div>
                                <div class="card-body" id="form_3" style="display:none">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-1">
                                                <label class="floating-label">Tº</label>
                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label class="floating-label">Pulso</label>
                                                <input type="text" class="form-control form-control-sm" name="re" id="re">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label">Frec. Reposo</label>
                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label">Peso</label>
                                                <input type="text" class="form-control form-control-sm" name="re" id="re">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label">Talla</label>
                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label">IMC</label>
                                                <input type="text" class="form-control form-control-sm" name="re" id="re">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label">Estado Nutricional</label>
                                                <input type="text" class="form-control form-control-sm" name="re" id="re">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group mb-1">
                                                <label><strong>Presión Arterial</strong></label>
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="p_arterial">
                                                    <label for="p_arterial" class="cr"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row" id="form_1" style="display:none">
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">BI</label>
                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">BD</label>
                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">De pié</label>
                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">Sentado</label>
                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group mb-1">
                                                <label><strong>Comunicación y traslado</strong></label>
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="com_trasl">
                                                    <label for="com_trasl" class="cr"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row" id="form_2" style="display:none">
                                            <div class="form-group col-md-4">
                                                <label class="floating-label">Estado de conciencia</label>
                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="floating-label">Lenguaje</label>
                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="floating-label">Traslado</label>
                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!--Cierre: Formulario / Signos vitales y otros-->
                    <!--Formulario / Diagnóstico-->
                    <div class="col-sm-12 mt-3">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h6>Diagnóstico</h6>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Hipótesis diagnóstica</label>
                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Diagnóstico CIE-10</label>
                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-1">
                        <div class="row">
                            <div class="form-group col-md-6">
                                 <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_medicamento();"><i class="fa fa-plus"></i> Indicar medicamento</button>
                            </div>
                            <div class="form-group col-md-6">
                                <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_examen();"><i class="fa fa-plus"></i> Indicar examen</button>
                            </div>
                        </div>          
                    </div>
                    <!--Cierre: Formulario / Diagnóstico-->
                </div>
                <div class="row px-3 mt-3 mb-3">
                    <div class="col-md-6 mx-auto">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="enf_cronico" name="check_1" data-toggle="modal" data-target="#form_enfermo_cronico">
                                        <label for="enf_cronico" class="cr"></label>
                                    </div>
                                    <label>¿Es enfermo crónico?</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-warning" role="alert">
                                    <table class="table table-borderless mt-0 mb-0">
                                        <tbody>
                                            <tr>
                                                <td class="align-middle pb-1 pt-1">Obesidad</td>
                                                <td class="align-middle pb-1 pt-1"><button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar"><i class="feather icon-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle pb-1 pt-1">Diabetes</td>
                                                <td class="align-middle pb-1 pt-1"><button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar"><i class="feather icon-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle pb-1 pt-1">Hipertensión</td>
                                                <td class="align-middle pb-1 pt-1"><button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar"><i class="feather icon-x"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="modal_ges">
                                        <label for="modal_ges" class="cr" data-toggle="modal" data-target="#form_ges"></label>
                                    </div>
                                    <label>Ges</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-warning my-0" role="alert">
                                    <table class="table table-borderless mt-0 mb-0">
                                        <tbody>
                                            <tr>
                                                <td class="align-middle pb-1 pt-1">Paciente GES PS.02</td>
                                                <td class="align-middle pb-1 pt-1"><button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar"><i class="feather icon-x"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-info">Guardar ficha clínica</button>
                        <button type="button" class="btn btn-success">Imprimir</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="odonto-adulto" role="tabpanel" aria-labelledby="odonto-adulto-tab">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="text-c-blue mt-1 mb-1 f-16">Odontograma</h5>
                        <hr>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="dt-responsive table-responsive table-borderless">
                            <table id="odontograma_adulto" class="display table dt-responsive nowrap" style="width:100%">
                                <!-- ADULTO SUPERIOR -->
                                <tbody>
                                    <tr>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t18">
                                                <img src="i/dientes/d18.png" class="wid-40 img-fluid" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="18" class="nav-label-dent">1.8</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto px-0 py-0" id="t17">
                                                <img src="i/dientes/d17.png" class="wid-40 img-fluid" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="17" class="nav-label-dent">1.7</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t16">
                                                <img src="i/dientes/d16.png" class="wid-40 img-fluid" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="16" class="nav-label-dent">1.6</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t15">
                                                <img src="i/dientes/d15.png" class="wid-40 img-fluid" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="15" class="nav-label-dent">1.5</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t14">
                                                <img src="i/dientes/d14.png" class="wid-40 img-fluid" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="14" class="nav-label-dent">1.4</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t13">
                                                <img src="i/dientes/d13.png" class="wid-40 img-fluid" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="13" class="nav-label-dent">1.3</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t12">
                                                <img src="i/dientes/d12.png" class="wid-40 img-fluid" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="12" class="nav-label-dent">1.2</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t11">
                                                <img src="i/dientes/d11.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="11" class="nav-label-dent">1.1</label>
                                        </td>
                                        <!--nnnn-->
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t21">
                                                <img src="i/dientes/d21.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="21" class="nav-label-dent">2.1</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto px-1 py-1" id="t22">
                                            <img src="i/dientes/d22.png" class="wid-40" role="button" onclick="info_odontograma();">
                                        </div>
                                            <label data-ndiente="22" class="nav-label-dent">2.2</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t23">
                                                <img src="i/dientes/d23.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                        <label data-ndiente="23" class="nav-label-dent">2.3</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t24">
                                                <img src="i/dientes/d24.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="24" class="nav-label-dent">2.4</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t25">
                                                <img src="i/dientes/d25.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="25" class="nav-label-dent">2.5</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t26">
                                                <img src="i/dientes/d26.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="26" class="nav-label-dent">2.6</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t27">
                                                <img src="i/dientes/d27.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="27" class="nav-label-dent">2.7</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t28">
                                                <img src="i/dientes/d28.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="28" class="nav-label-dent">2.8</label>
                                        </td>
                                    </tr>
                                    <!-- ADULTO INFERIOR -->
                                    <tr>
                                        <td class="text-center px-0 py-0">
                                            <div class="#"  id="t48">
                                                <img src="i/dientes/d48.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndente="48" class="nav-label-dent">4.8</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="#" id="t47">
                                                <img src="i/dientes/d47.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="47" class="nav-label-dent">4.7</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t46">
                                                <img src="i/dientes/d46.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="46" class="nav-label-dent">4.6</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t45">
                                                <img src="i/dientes/d45.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="45" class="nav-label-dent">4.5</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t44">
                                                <img src="i/dientes/d44.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="44" class="nav-label-dent">4.4</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t43">
                                                <img src="i/dientes/d43.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="43" class="nav-label-dent">4.3</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t42">
                                                <img src="i/dientes/d42.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="42" class="nav-label-dent">4.2</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t41">
                                                    <img src="i/dientes/d41.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="41" class="nav-label-dent">4.1</label>
                                        </td>
                                        <!--nnnn-->
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t31">
                                                <img src="i/dientes/d31.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="31" class="nav-label-dent">3.1</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t32">
                                                <img src="i/dientes/d32.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                        <label data-ndiente="32" class="nav-label-dent">3.2</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t33">
                                                <img src="i/dientes/d33.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="33" class="nav-label-dent">3.3</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t34">
                                                <img src="i/dientes/d34.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="34" class="nav-label-dent">3.4</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t35">
                                                <img src="i/dientes/d35.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="35" class="nav-label-dent">3.5</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t36">
                                                <img src="i/dientes/d36.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="36" class="nav-label-dent">3.6</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t37">
                                                <img src="i/dientes/d37.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="37" class="nav-label-dent">3.7</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t38">
                                                <img src="i/dientes/d38.png" class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="38" class="nav-label-dent">3.8</label>
                                        </td>
                                    </tr>
                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="periodontograma" role="tabpanel" aria-labelledby="periodontograma-tab">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="text-c-blue mt-1 mb-1 f-16">Periodontograma</h5>
                        <hr>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="dt-responsive table-responsive pb-4">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <h5 class="text-center">GRUPO I</h5>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-xs">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle px-1 py-1">1.8</th>
                                                        <th class="text-center align-middle px-1 py-1">1.7</th>
                                                        <th class="text-center align-middle px-1 py-1">1.6</th>
                                                        <th class="text-center align-middle px-1 py-1">1.5</th>
                                                        <th class="text-center align-middle px-1 py-1">1.4</th>
                                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5 class="text-center">GRUPO II</h5>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-xs">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle px-1 py-1">1.3</th>
                                                        <th class="text-center align-middle px-1 py-1">1.2</th>
                                                        <th class="text-center align-middle px-1 py-1">1.1</th>
                                                        <th class="text-center align-middle px-1 py-1">2.1</th>
                                                        <th class="text-center align-middle px-1 py-1">2.2</th>
                                                        <th class="text-center align-middle px-1 py-1">2.3</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <h5 class="text-center">GRUPO IV</h5>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-xs">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle px-1 py-1">4.8</th>
                                                        <th class="text-center align-middle px-1 py-1">4.7</th>
                                                        <th class="text-center align-middle px-1 py-1">4.6</th>
                                                        <th class="text-center align-middle px-1 py-1">4.5</th>
                                                        <th class="text-center align-middle px-1 py-1">4.4</th>
                                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                    <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5 class="text-center">GRUPO III</h5>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-xs">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle px-1 py-1">2.4</th>
                                                        <th class="text-center align-middle px-1 py-1">2.5</th>
                                                        <th class="text-center align-middle px-1 py-1">2.6</th>
                                                        <th class="text-center align-middle px-1 py-1">2.7</th>
                                                        <th class="text-center align-middle px-1 py-1">2.8</th>
                                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                    <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <h5 class="text-center">GRUPO V</h5>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-xs">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle px-1 py-1">4.3</th>
                                                        <th class="text-center align-middle px-1 py-1">4.2</th>
                                                        <th class="text-center align-middle px-1 py-1">4.1</th>
                                                        <th class="text-center align-middle px-1 py-1">3.1</th>
                                                        <th class="text-center align-middle px-1 py-1">3.2</th>
                                                        <th class="text-center align-middle px-1 py-1">3.3</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5 class="text-center">GRUPO VI</h5>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-xs">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle px-1 py-1">3.4</th>
                                                        <th class="text-center align-middle px-1 py-1">3.5</th>
                                                        <th class="text-center align-middle px-1 py-1">3.6</th>
                                                        <th class="text-center align-middle px-1 py-1">3.7</th>
                                                        <th class="text-center align-middle px-1 py-1">3.8</th>
                                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                    <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center align-middle px-1 py-1">
                                                            <select class="form-control form-control-sm" id="" name="">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>1*</option>
                                                                <option>2*</option>
                                                                <option>3*</option>
                                                                <option>4*</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>                      
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label class="floating-label-activo-sm">PCR</label>
                                        <input type="text" class="form-control form-control-sm" name="pct_t" id="pcr_t">
                                    </div>
                                    <div class="form-group col-md-4"style="text-align:center" id="form_0">
                                        <a href="periodontograma/perio.php" target="_blank"><button type="button" class="btn btn-primary btn-sm btn-block"> Abrir periodontograma</button></a>
                                    </div>
                                    <div class="form-group col-md-4"style="text-align:center" id="form_derperi">
                                        <button type="button" class="btn btn-success btn-sm btn-block" onclick="d_periodoncista1();"><i class="feather icon-file-plus"></i> Derivar a Periodoncista</button>
                                    </div>
                                </div> 
                                <hr>
                                <div class="form-row">
                                    <div class="form-group col-md-12 text-center mx-auto">
                                        <button type="reset" class="btn btn-danger">Limpiar formulario</button>
                                        <button type="submit" class="btn btn-info">Guardar periodontograma</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="evaluacion-adulto" role="tabpanel" aria-labelledby="evaluacion-adulto-tab">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="text-c-blue mt-1 mb-1 f-16">Evaluación adulto</h5>
                        <hr>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="row mb-4">
                            <div class="col-md-4 px-1 py-1">
                                <button type="button" class="btn btn-secondary btn-sm btn-block" onclick="maxilar_inferior();"><i class="feather icon-file-plus"></i> Maxilar superior</button>
                            </div>
                            <div class="col-md-4 px-1 py-1">
                                <button type="button" class="btn btn-secondary btn-sm btn-block" onclick="maxilar_inferior();"><i class="feather icon-file-plus"></i> Maxilar inferior</button>
                            </div>
                            <div class="col-md-4 px-1 py-1">
                                <button type="button" class="btn btn-secondary btn-sm btn-block" onclick="boca_completa();"><i class="feather icon-file-plus"></i> Boca completa</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <h5 class="text-center text-c-blue">GRUPO I</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-xs"style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle px-1 py-1">Pieza</th>
                                                <th class="text-center align-middle px-1 py-1">Cara</th>
                                                <th class="text-center align-middle px-1 py-1">Diagnóstico</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <!-- <select class="form-control form-control-sm" id="" name="">-->
                                                    <script type = "text / javascript" > 
                                                        $ ( '#example-multiple-optgroups' ). multiselect ();
                                                    </script>
                                                    <select class="form-control form-control-sm"> 
                                                        <option value = "1-8"> 1-8 </option>  
                                                        <option value = "1-7"> 1-7 </option> 
                                                        <option value = "1-6"> 1-6 </option>  
                                                        <option value = "1-5"> 1-5 </option>
                                                        <option value = "1-4"> 1-4 </option>            
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">    
                                                    <select class="form-control form-control-sm"> 
                                                        <optgroup label = "cara" class = "cara"  >  
                                                            <option value = "1-1">Oclusal</option> 
                                                            <option value = "1-2">Vestibular</option>  
                                                            <option value = "1-3">Distal</option>
                                                            <option value = "1-2">Mesial</option>  
                                                            <option value = "1-3">Palatina</option> 
                                                        </optgroup>
                                                        <optgroup label = "Diente" class = "diente" >  
                                                            <option value = "2-1" > Total </option> 
                                                            <option value = "2-2" > Raiz </option> 
                                                            <option value = "2-3" > Encia </option>
                                                            <option value = "2-3" > Endodoncia </option> 
                                                        </optgroup>
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <select class="form-control form-control-sm" id="" name="">
                                                        <option>Diagnóstico</option>
                                                        <option>Carie profunda</option>
                                                        <option>Carie Blanca</option>
                                                        <option>Fractura</option>
                                                        <option>periodontopatia</option>
                                                        <option>Restos radiculares</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <div class="#" id="t18">
                                                    <img src="i/dientes/d18.png" class="wid-40">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <div class="#" id="t17">
                                                        <img src="../assets/img_dental/caras.png" class="wid-70">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <span>Diagnóstico</span>
                                                </td>     
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <h5 class="text-center text-c-blue">GRUPO II</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-xs"style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle px-1 py-1">Pieza</th>
                                                <th class="text-center align-middle px-1 py-1">Cara</th>
                                                <th class="text-center align-middle px-1 py-1">Diagnóstico</th>            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <script type = "text / javascript" > 
                                                        $ ( '#example-multiple-optgroups' ). multiselect ();
                                                    </script>
                                                    <select class="form-control form-control-sm"> 
                                                        <option value = "1-3"> 1-3</option>  
                                                        <option value = "1-2"> 1-2</option> 
                                                        <option value = "1-1"> 1-1</option>  
                                                        <option value = "2-1"> 2-1</option>
                                                        <option value = "2-2"> 2-2</option>
                                                        <option value = "2-3"> 2-3</option> 
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">    
                                                    <select class="form-control form-control-sm"> 
                                                        <optgroup label = "cara" class = "cara">  
                                                            <option value = "1-1">Oclusal</option> 
                                                            <option value = "1-2">Vestibular</option>  
                                                            <option value = "1-3">Distal</option>
                                                            <option value = "1-2">Mesial</option>  
                                                            <option value = "1-3">Palatina</option> 
                                                        </optgroup>
                                                        <optgroup label = "Diente" class = "diente" >  
                                                            <option value = "2-1" > Total </option> 
                                                            <option value = "2-2" > Raiz </option> 
                                                            <option value = "2-3" > Encia </option>
                                                            <option value = "2-3" > Endodoncia </option> 
                                                        </optgroup>
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <select class="form-control form-control-sm" id="aa" name="aa">
                                                        <option>Diagnóstico</option>
                                                        <option>Carie profunda</option>
                                                        <option>Carie Blanca</option>
                                                        <option>Fractura</option>
                                                        <option>periodontopatia</option>
                                                        <option>Restos radiculares</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <div class="#" id="t18">
                                                        <img src="i/dientes/d21.png" class="wid-40">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <div class="#" id="tcara">
                                                        <img src="../assets/img_dental/caras.png" class="wid-70">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <span>Diagnóstico</span>
                                                </td> 
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <h5 class="text-center text-c-blue">GRUPO III</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-xs"style="width:100% ;">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle px-1 py-1">Pieza</th>
                                                <th class="text-center align-middle px-1 py-1">Cara</th>
                                                <th class="text-center align-middle px-1 py-1">Diagnostico</th>            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <!-- <select class="form-control form-control-sm" id="" name="">-->
                                                    <script type = "text / javascript" > 
                                                        $ ( '#example-multiple-optgroups' ). multiselect ();
                                                    </script>
                                                    <select class="form-control form-control-sm"> 
                                                        <option value = "2-4"> 2-4 </option>  
                                                        <option value = "2-5"> 2-5 </option> 
                                                        <option value = "2-6"> 2-6 </option>  
                                                        <option value = "2-7"> 2-7 </option>
                                                        <option value = "2-8"> 2-8 </option>            
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">      
                                                    <select class="form-control form-control-sm"> 
                                                        <optgroup label = "cara" class = "cara"  >  
                                                            <option value = "1-1">Oclusal</option> 
                                                            <option value = "1-2">Vestibular</option>  
                                                            <option value = "1-3">Distal</option>
                                                            <option value = "1-2">Mesial</option>  
                                                            <option value = "1-3">Palatina</option> 
                                                        </optgroup>
                                                        <optgroup label = "Diente" class = "diente">  
                                                            <option value = "2-1" > Total </option> 
                                                            <option value = "2-2" > Raiz </option> 
                                                            <option value = "2-3" > Encia </option>
                                                            <option value = "2-3" > Endodoncia </option> 
                                                        </optgroup>
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <select class="form-control form-control-sm" id="" name="">
                                                        <option>Diagnóstico</option>
                                                        <option>Carie profunda</option>
                                                        <option>Carie Blanca</option>
                                                        <option>Fractura</option>
                                                        <option>periodontopatia</option>
                                                        <option>Restos radiculares</option>
                                                    </select>
                                                </td> 
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <div class="#" id="t26">
                                                        <img src="i/dientes/d26.png" class="wid-40">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <div class="#" id="t17">
                                                        <img src="../assets/img_dental/caras.png" class="wid-70">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <span>Diagnóstico</span>
                                                </td> 
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <h5 class="text-center text-c-blue">GRUPO IV</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-xs"style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle px-1 py-1">Pieza</th>
                                                <th class="text-center align-middle px-1 py-1">Cara</th>
                                                <th class="text-center align-middle px-1 py-1">Diagnostico</th>            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <!-- <select class="form-control form-control-sm" id="" name="">-->
                                                    <script type = "text / javascript" > 
                                                        $ ( '#example-multiple-optgroups' ). multiselect ();
                                                    </script>
                                                    <select class="form-control form-control-sm"> 
                                                            <option value = "4-8"> 4-8 </option>  
                                                            <option value = "4-7"> 4-7 </option> 
                                                            <option value = "4-7"> 4-7 </option>  
                                                            <option value = "4-5"> 4-5 </option>
                                                            <option value = "4-4"> 4-4</option>            
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">  
                                                    <select class="form-control form-control-sm"> 
                                                        <optgroup label = "cara" class = "cara"  >  
                                                            <option value = "1-1">oclusal</option> 
                                                            <option value = "1-2">Vestibular</option>  
                                                            <option value = "1-3">Distal</option>
                                                            <option value = "1-2">Mesial</option>  
                                                            <option value = "1-3">Palatina</option> 
                                                        </optgroup>
                                                        <optgroup label = "Diente" class = "diente" >  
                                                            <option value = "2-1" > Total </option> 
                                                            <option value = "2-2" > raiz </option> 
                                                            <option value = "2-3" > Encia </option>
                                                            <option value = "2-3" > Endodoncia </option> 
                                                        </optgroup>
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <select class="form-control form-control-sm" id="" name="">
                                                        <option>Diagnóstico</option>
                                                        <option>Carie profunda</option>
                                                        <option>Carie Blanca</option>
                                                        <option>Fractura</option>
                                                        <option>periodontopatia</option>
                                                        <option>Restos radiculares</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <div class="#" id="t47">
                                                        <img src="i/dientes/d47.png" class="wid-40">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <div class="#" id="tcara">
                                                        <img src="../assets/img_dental/caras.png" class="wid-70">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <span>Diagnostico</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <h5 class="text-center text-c-blue">GRUPO V</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-xs"style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle px-1 py-1">Pieza</th>
                                                <th class="text-center align-middle px-1 py-1">Cara</th>
                                                <th class="text-center align-middle px-1 py-1">Diagnostico</th>            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <!-- <select class="form-control form-control-sm" id="" name="">-->
                                                    <script type = "text / javascript" > 
                                                        $ ( '#example-multiple-optgroups' ). multiselect ();
                                                    </script>
                                                    <select class="form-control form-control-sm"> 
                                                            <option value = "4-3"> 4-3 </option>  
                                                            <option value = "4-2"> 4-2 </option> 
                                                            <option value = "4-1"> 4-1 </option>  
                                                            <option value = "3-1"> 3-1 </option>
                                                            <option value = "3-2"> 3-2 </option>
                                                            <option value = "3-3"> 3-3 </option> 
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">     
                                                    <select class="form-control form-control-sm"> 
                                                        <optgroup label = "cara" class = "cara"  >  
                                                            <option value = "1-1">oclusal</option> 
                                                            <option value = "1-2">Vestibular</option>  
                                                            <option value = "1-3">Distal</option>
                                                            <option value = "1-2">Mesial</option>  
                                                            <option value = "1-3">Palatina</option> 
                                                        </optgroup>
                                                        <optgroup label = "Diente" class = "diente">  
                                                            <option value = "2-1" > Total </option> 
                                                            <option value = "2-2" > raiz </option> 
                                                            <option value = "2-3" > Encia </option>
                                                            <option value = "2-3" > Endodoncia </option> 
                                                        </optgroup>
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <select class="form-control form-control-sm" id="" name="">
                                                        <option>Diagnostico</option>
                                                        <option>Carie profunda</option>
                                                        <option>Carie Blanca</option>
                                                        <option>Fractura</option>
                                                        <option>periodontopatia</option>
                                                        <option>Restos radiculares</option>
                                                    </select>
                                                </td> 
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <div class="#" id="t31">
                                                        <img src="i/dientes/d31.png" class="wid-40">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <div class="#" id="tcara">
                                                        <img src="../assets/img_dental/caras.png" class="wid-70">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <span>Diagnostico</span>
                                                </td>    
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <h5 class="text-center text-c-blue">GRUPO VI</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-xs"style="width:100% ;">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle py-1 py-1">Pieza</th>
                                                <th class="text-center align-middle py-1 py-1">Cara</th>
                                                <th class="text-center align-middle py-1 py-1">Diagnostico</th>            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <!-- <select class="form-control form-control-sm" id="" name="">-->
                                                    <script type = "text / javascript" > 
                                                        $ ( '#example-multiple-optgroups' ). multiselect ();
                                                    </script>
                                                    <select class="form-control form-control-sm"> 
                                                            <option value = "3-4"> 3-4 </option>  
                                                            <option value = "3-5"> 3-5 </option> 
                                                            <option value = "3-6"> 3-6 </option>  
                                                            <option value = "3-7"> 3-7 </option>
                                                            <option value = "3-8"> 3-8</option>            
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <select class="form-control form-control-sm"> 
                                                        <optgroup label = "cara" class = "cara"  >  
                                                            <option value = "1-1">oclusal</option> 
                                                            <option value = "1-2">Vestibular</option>  
                                                            <option value = "1-3">Distal</option>
                                                            <option value = "1-2">Mesial</option>  
                                                            <option value = "1-3">Palatina</option> 
                                                        </optgroup>
                                                        <optgroup label = "Diente" class = "diente">  
                                                            <option value = "2-1"> Total </option> 
                                                            <option value = "2-2"> Raiz </option> 
                                                            <option value = "2-3"> Encia </option>
                                                            <option value = "2-3"> Endodoncia </option> 
                                                        </optgroup>
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <select class="form-control form-control-sm" id="" name="">
                                                        <option>Diagnostico</option>
                                                        <option>Carie profunda</option>
                                                        <option>Carie Blanca</option>
                                                        <option>Fractura</option>
                                                        <option>Periodontopatia</option>
                                                        <option>Restos radiculares</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <div class="#" id="t38">
                                                        <img src="i/dientes/d38.png" class="wid-40">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <div class="#" id="tcara">
                                                        <img src="../assets/img_dental/caras.png" class="wid-70">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <span>Diagnóstico</span>
                                                </td>   
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> 
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-12 text-center mx-auto">
                                <button type="reset" class="btn btn-danger">Limpiar formulario</button>
                                <button type="submit" class="btn btn-info">Enviar a presupuesto</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <!--Simbología-->                        
                        <div class="card h-40" >
                            <div class="form-group col-md-12">
                                <div class="card-header text-center">
                                    <h6 class="text-center">SIMBOLOGIA ODONTOGRAMA</h6>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-xs">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle px-1 py-1">S</th>
                                                <th class="text-center align-middle px-0 py-1">Imagen</th>
                                                <th class="text-center align-middle px-0 py-1">Tipo</th>                           
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/sano.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <label class="lbl_od">Sáno</label>
                                                </td>               
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/ausente.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <label class="lbl_od">Ausente</label>
                                                </td>               
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/carie.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <label class="lbl_od">Carie</label>
                                                </td>                
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/composite.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <label class="lbl_od">Composite</label>
                                                </td>               
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/corona.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <label class="lbl_od">Corona</label>
                                                </td>           
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/endodoncia.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <label class="lbl_od">Endodoncia</label>
                                                </td>               
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/fractura.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <label class="lbl_od">Fractura</label>
                                                </td>                 
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/implante.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <label class="lbl_od">Implante</label>
                                                </td>               
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/incrustacion.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <label class="lbl_od">Incrustación</label>
                                                </td>               
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/l_cuello.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <label class="lbl_od">Les. Cuello</label>
                                                </td>                 
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/obturacion.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <label class="lbl_od">Obturacion</label>
                                                </td>               
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/sellante.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <label class="lbl_od">Sellante</label>
                                                </td>               
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle px-1 py-1">
                                                    <input type="checkbox" id="cbox1" value="">
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <div class="img_od" id="t18">
                                                        <img src="../assets/img_dental/surco.png" class="wid-30">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle px-0 py-1">
                                                    <label class="lbl_od">Surco</label>
                                                </td>               
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tratamiento" role="tabpanel" aria-labelledby="tratamiento-tab">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="text-c-blue mt-1 mb-1 f-16">Tratamiento según presupuesto</h5>
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        <div class="dt-responsive table-responsive pb-4">
                            <table id="tratamiento_presupuesto" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Nº Presupuesto</th>
                                        <th class="text-center align-middle">Aprobado</th>
                                        <th class="text-center align-middle">Pieza</th>
                                        <th class="text-center align-middle">Boca</th>
                                        <th class="text-center align-middle">Presupuesto</th>
                                        <th class="text-center align-middle">Estado</th>
                                        <th class="text-center align-middle">Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">23/05/2021</td>
                                        <td class="text-center align-middle">782638</td>
                                        <td class="text-center align-middle">Si</td>
                                        <td class="text-center align-middle">Sector I</td>
                                        <td class="text-center align-middle">no</td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-info btn-sm" onclick="presupuesto();">
                                                <i class="fa fa-plus"></i> Cargar Presupuesto
                                            </button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="form-group col-md-4">
                                            <div class="switch switch-success d-inline m-r-2">
                                                <input type="checkbox" id="info_finalizado" checked="">
                                                <label for="info_finalizado" class="cr"></label>
                                            </div>
                                                <label>Realizado?</label>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            20/05/2022
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("modals/modal_presupuesto.php");
?>
<!--Modals evaluación-->
<?php
include("modals/tratamiento_boca_completa.php");
include("modals/tratamiento_maxilar_inferior.php");
include("modals/tratamiento_maxilar_superior.php");
?>

