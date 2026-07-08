<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <ul class="nav nav-tabs-aten nav-fill mb-10" id="orl_adulto" role="tablist">
            <li class="nav-item">
                <a class="nav-link-aten text-reset active" id="medico_tab" data-toggle="tab" href="#medico" role="tab" aria-controls="medico" aria-selected="true">Médico o Matrón/a</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="reg_civil-tab" data-toggle="tab" href="#reg_civil" role="tab" aria-controls="reg_civil" aria-selected="true">Registro Civil o adm de cementerios</a>
            </li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="tab-content" id="orl_adulto">
            <!--MÉDICO O MATRÓN/A-->
            <div class="tab-pane fade show active" id="medico" role="tabpanel" aria-labelledby="medico_tab">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="certif_defuncion" id="certif_defuncion" value="2">
                        <div class="row mt-2">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="alert alert-warning" role="alert">
                                Uso exclusivo del médico o matrona en el caso de defunción fetal
                                </div>
                            </div>
                        </div>
                        <div class="card-informacion">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten">1. Identidad del fallecido</h6>
                                        </div>
                                    </div>
                                    <div class="form-row mt-2">
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3 mt-10">
                                            <label class="floating-label-activo-sm">Nombre fallecido/a</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_fallecido" id="nombre_fallecido" value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}" readonly>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                            <label class="floating-label-activo-sm">Rut</label>
                                            <input type="person" class="form-control form-control-sm" name="rut_fallecido" id="rut_fallecido" value="{{ $paciente->rut }}" readonly>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl">
                                            <label class="floating-label-activo-sm">Sexo</label>
                                            <select id="sexo_fallecido" class="form-control form-control-sm">
                                                <option value="0">Seleccione</option>
                                                <option value="1">Masculino</option>
                                                <option value="2">Femenino</option>
                                                <option value="3">Indeterminado</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl">
                                            <label class="floating-label-activo-sm">Nacimiento</label>
                                            <input type="date" class="form-control form-control-sm" name="fn_fallecido" id="fn_fallecido" value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}" readonly>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-1">
                                            <label class="floating-label-activo-sm">Edad</label>
                                            <input type="number" class="form-control form-control-sm" name="edad_fallecido" id="edad_fallecido" value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}" readonly>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl">
                                            <label class="floating-label-activo-sm">Fecha y hora</label>
                                            <input type="datetime-local" class="form-control form-control-sm" name="mdm_menunano" id="mdm_menunano">
                                            <small class="text-danger">Solo si es menor de 1 año</small>
                                        </div>
                                    </div>
                                    <div class="form-row mt-0">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <p>Testigos que certifican la identidad del difunto/a (Cuando no tiene Cédula de Identidad)</p>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <label class="floating-label-activo-sm">Nombre </label>
                                            <input type="text" placeholder="Testigo 1" class="form-control form-control-sm" name="nombre_test_uno" id="nombre_test_uno" value="">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <label class="floating-label-activo-sm">Rut</label>
                                            <input type="text" placeholder="Testigo 1" class="form-control form-control-sm" name="rut_test_uno" id="rut_test_uno" value="">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <label class="floating-label-activo-sm">Firma</label>
                                            {{--  <small>Firma testigo 1</small>  --}}
                                            <input type="text" class="form-control form-control-sm" placeholder="Testigo 1" name="verif_test_dos" id="verif_test_dos" value="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <label class="floating-label-activo-sm">Nombre </label>
                                            <input type="text" placeholder="Testigo 2" class="form-control form-control-sm" name="nombre_test_dos" id="nombre_test_dos" value="">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <label class="floating-label-activo-sm">Rut</label>
                                            <input type="text" placeholder="Testigo 2" class="form-control form-control-sm" name="rut_test_dos" id="rut_test_dos" value="">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <label class="floating-label-activo-sm">Firma</label>
                                            {{--  <small>Firma testigo 2</small>  --}}
                                            <input type="text" placeholder="Testigo 2" class="form-control form-control-sm" name="verif_tes_dos" id="verif_tes_dos" value="">
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="card-informacion">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                        <h6 class="t-aten">2. Formulario de defunción</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm">Fecha</label>
                                        <input type="date" class="form-control form-control-sm" name="f_fallecimiento" id="f_fallecimiento">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm">Hora</label>
                                        <input type="time" class="form-control form-control-sm" name="hora_fallecimiento" id="hora_fallecimiento">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                            <label class="custom-control-label" for="customSwitch1">Activar formulario para fallecidos < de 1 año o defunción fetal</label>
                                        </div>
                                    </div><!--PARA QUE ACTIVE EL FORMULARIO DE ABAJO-->
                                </div>
                                <div class="form-row"><!--PARA QUE ACTIVE EL FORMULARIO DE ABAJO-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <p><i>Formulario  para fallecidos < de 1 año o defunción fetal</i><span class="text-danger">*</span> </p>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-3">
                                        <label class="floating-label-activo-sm">Peso al nacer</label>
                                        <input type="text" class="form-control form-control-sm" name="peso_nac_men_fallecido" id="peso_nac_men_fallecido">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-3">
                                        <label class="floating-label-activo-sm">Semanas gestación</label>
                                    <input type="text" class="form-control form-control-sm" name="sem_gestmen_fallecido" id="sem_gestmen_fallecido">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                        <label class="floating-label-activo-sm">Estado nutricional previo a enfermedad</label>
                                        <select class="form-control form-control-sm" name="en_men_fallecido" id="en_men_fallecido">
                                            <option value="0">Seleccione</option>
                                            <option value="1">Eutrófico</option>
                                            <option value="2">Desnutrición G-I</option>
                                            <option value="3">Desnutrición G-II</option>
                                            <option value="4">Desnutrición G-III</option>
                                            <option value="5">Ignorado</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-2">
                                        <label class="floating-label-activo-sm">Lugar de defunción</label>
                                        <select id="lug_fall_men_fallecido" class="form-control form-control-sm">
                                            <option value="0">Seleccione</option>
                                            <option value="1">Hospital o Clínica</option>
                                            <option value="2">Casa Habitación</option>
                                            <option value="3">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                        <label class="floating-label-activo-sm">Establecimiento o dirección</label>
                                        <input type="text" class="form-control form-control-sm" name="estab_lug_fallec" id="estab_lug_fallec" value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}" readonly>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-3">
                                        <label class="floating-label-activo-sm">Región</label>
                                        <select class="form-control form-control-sm">
                                            <option value="0">Seleccione</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-3">
                                        <label class="floating-label-activo-sm">Comuna</label>
                                        <select class="form-control form-control-sm">
                                            <option value="0">Seleccione</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-informacion">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                        <h6 class="t-aten">3. Causa de la muerte (En caso de defunción fetal, especifique causa, NO ANOTE mortinato)</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-xl-4">
                                        <label class="floating-label-activo-sm">Causa inmediata</label>
                                        <textarea class="form-control form-control-sm" placeholder="Enfermedad o condición que produjo directamente la muerte" rows="2" onfocus="this.rows=5" onblur="this.rows=2;" id="causa_inmed" name="causa_inmed"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-xl-4">
                                        <label class="floating-label-activo-sm">Causas originarias</label>
                                        <textarea class="form-control form-control-sm" placeholder="Enfermedades,lesiones y tipo de accidente, suicidio u homicidio que ocasionó la causa inmediata" rows="2" onfocus="this.rows=5" onblur="this.rows=2;" id="causas_origin" name="causas_origin"></textarea>
                                    </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                        <label class="floating-label-activo-sm">Estados morbosos concomitantes</label>
                                        <textarea class="form-control form-control-sm" placeholder="Contribuyentes a la defunción pero fuera de la cadena causal" rows="2" onfocus="this.rows=5" onblur="this.rows=2;" id="est_morbosos_conc" name="est_morbosos_conc"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-informacion">
                            <div class="card-body">
                                <div class="form-row">
                                    <h6 class="t-aten">4. Fundamento causa de  muerte </h6>
                                </div>
                                <div class="form-row mt-2">
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                        <label class="floating-label-activo-sm">Fundamento causa de muerte</label>
                                        <select id="fund_causa_muerte" class="form-control form-control-sm">
                                            <option value="0">Seleccione</option>
                                            <option value="1">Autópsia</option>
                                            <option value="2">Biópsia</option>
                                            <option value="3">Operación</option>
                                            <option value="4">Exámenes de laboratorio</option>
                                            <option value="5">Cuadro clínico</option>
                                            <option value="6">Información de testigos</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-8">
                                        <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                        <label class="custom-control-label" for="customSwitch2">Activar si fue muerte violenta o accidente</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mb-0">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0">
                                        <p class="mb-2"><i>Completar en caso de muerte violenta o accidente<span class="text-danger">*</span></i></p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Lugar de ocurrencia</label>
                                        <select id="lugar_ocurr_muerte" class="form-control form-control-sm">
                                            <option value="0">Seleccione</option>
                                            <option value="1">Casa </option>
                                            <option value="2">Vía pública</option>
                                            <option value="3">Trabajo</option>
                                            <option value="4">Otra</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Circunstancias</label>
                                        <select id="circunst_muerte" class="form-control form-control-sm">
                                            <option value="0">Seleccione</option>
                                            <option value="1">Peatón</option>
                                            <option value="2">Conductor</option>
                                            <option value="3">Pasajero</option>
                                            <option value="4">Otra</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Tipo</label>
                                        <select id="t_muerte" class="form-control form-control-sm">
                                            <option value="0">Seleccione</option>
                                            <option value="1">Accidente</option>
                                            <option value="2">Suicidio</option>
                                            <option value="3">Homicidio</option>
                                            <option value="4">Otra</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-informacion">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="t-aten">5. Atención médica </h6>
                                    </div>
                                </div>
                                <div class="form-row mt-2">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                        <label class="floating-label-activo-sm">Atención medica última enfermedad</label>
                                        <select id="at_medica_enf" class="form-control form-control-sm">
                                            <option value="0">Seleccione</option>
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                            <option value="3">Ignorado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-informacion">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                        <h6 class="t-aten">6. Calidad de quién certifica</h6>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <label class="floating-label-activo-sm">Médico</label>
                                            <select id="cal_firmante" class="form-control form-control-sm">
                                                <option value="0">Seleccione</option>
                                                <option value="1">Médico tratante</option>
                                                <option value="2">Médico legísta</option>
                                                <option value="3">Patólogo</option>
                                                <option value="4">Otro</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <label class="floating-label-activo-sm">Otros</label>
                                            <select id="ot_firmantes" class="form-control form-control-sm">
                                                <option value="0">Seleccione</option>
                                                <option value="1">Matrón/a</option>
                                                <option value="2">Testigo</option>
                                                <option value="3">Ignorado</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="alert alert-primary py-1" role="alert">
                                                <p id="f_cert" class="d-inline text-c-blue"><strong>Fecha Certificado:</strong></p>
                                                <p class="d-inline text-c-blue">
                                                    <script>
                                                        var f = new Date();
                                                        document.write(  + f.getDate() + "/" + (f.getMonth()+1) + "/" + f.getFullYear() + " -" + f.getHours()+ ":" + f.getMinutes() +" min " );
                                                    </script>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Nombre médico</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_med" id="nombre_med" value="">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                            <label class="floating-label-activo-sm">RUT</label>
                                            <input type="text" class="form-control form-control-sm" name="rut_med" id="rut_med" value="">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                            <label class="floating-label-activo-sm">Teléfono</label>
                                            <input type="text" class="form-control form-control-sm" name="tel_med" id="tel_med" value="">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                            <label class="floating-label-activo-sm">Domicilio</label>
                                            <input type="text" class="form-control form-control-sm" name="dom_med" id="dom_med" value="">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                            <label class="floating-label-activo-sm">Firma</label>
                                            <input type="text" class="form-control form-control-sm" name="firma_med" id="firma_med" value="">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                            <label class="floating-label-activo-sm">Autificación documento</label>
                                            <input type="text" class="form-control form-control-sm" name="autent_med" id="autent_med" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="reg_civil" role="tabpanel" aria-labelledby="reg_civil-tab">
                <div class="row mt-3">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card-informacion">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-sm-4 col-md-4">
                                    <label class="floating-label-activo-sm">Dirección</label>
                                    <input type="address" class="form-control form-control-sm" name="resid_fallecido" id="resid_fallecido" value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}" readonly>
                                </div>
                                <div class="form-group col-sm-2 col-md-2">
                                    <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                    <select id="reg_fallecido" name="reg_fallecido" class="form-control form-control-sm" readonly>
                                        <option value="0">Seleccione</option>
                                        {{--  @foreach ($regiones as $r)
                                            @if ($r->id == $paciente->Direccion()->first()->Ciudad()->first()->id_region)
                                                <option id="{{ $r->id }}" selected> {{ $r->nombre }} </option>
                                            @endif
                                            <option id="{{ $r->id }}"> {{ $r->nombre }} </option>
                                        @endforeach  --}}
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-md-2">
                                    <label class="floating-label-activo-sm">Ciudad</label>
                                    <select id="ciud_fallecido" name="ciud_fallecido" class="form-control form-control-sm" readonly>
                                        <option value="0">Seleccione</option>
                                        {{--  @foreach ($ciudades as $c)
                                            @if ($c->id == $paciente->Direccion()->first()->Ciudad()->first()->id)
                                                <option id="{{ $c->id }}" selected> {{ $c->nombre }} </option>
                                            @endif
                                            <option id="{{ $c->id }}"> {{ $c->nombre }} </option>
                                        @endforeach  --}}
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-md-4">
                                    <label class="floating-label-activo-sm">Uso INE</label>
                                    <input type="address" class="form-control form-control-sm" name="uso_ine_dir_fallecido" id="uso_ine_dir_fallecido" value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-2 col-md-2">
                                    <label class="floating-label">INSTRUCCIÓN</label>
                                </div>
                                <div class="form-group col-sm-2 col-md-2">
                                    <label class="floating-label-activo-sm">Ocupación</label>
                                    <input type="address" class="form-control form-control-sm" name="ocup_fallecido" id="ocup_fallecido" value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}" readonly>
                                </div>
                                <div class="form-group col-sm-2 col-md-2 col-lg-2 col-xl">
                                    <label class="floating-label-activo-sm">Nivel</label>
                                    <select id="niv_educ_fall" class="form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Superior</option>
                                        <option value="2">Medio Secundario</option>
                                        <option value="3">Básico o primario</option>
                                        <option value="3">Ninguno</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-md-2">
                                    <label class="floating-label-activo-sm">Últ curso</label>
                                    <input type="address" class="form-control form-control-sm" name="ult_cur" id="ult_cur" value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}" readonly>
                                </div>
                                <div class="form-group col-sm-3 col-md-3">
                                    <label class="floating-label-activo-sm">Uso INE</label>
                                    <input type="address" class="form-control form-control-sm" name="uso_ine_ocu_madre" id="uso_ine_ocu_madre" value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}" readonly>
                                </div>
                                <div class="form-group col-sm-3 col-md-3 col-lg-3 col-xl">
                                    <label class="floating-label-activo-sm">Nivel Ocupacional</label>
                                    <select id="niv_educ_madre" class="form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Patróm/a</option>
                                        <option value="2">Empleado/a</option>
                                        <option value="3">Obrero</option>
                                        <option value="3">Trabajador por cuenta propia</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card-informacion">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <h6 class="t-aten">5. Solo para fallecido/a menor de un año o defunción fetal </h6>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Tipo</label>
                                    <select id="tpo_men_ano" class="form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        <option value="1">1.- Menor de un año</option>
                                        <option value="2">2.- Defunción fetal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12 col-lg-8 col-lg-8">
                                    <label class="floating-label-activo-sm">Nombre de la persona gestante / madre / progenitora</label>
                                    <input type="address" class="form-control form-control-sm" name="nomb_gestante" id="nomb_gestante" value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}" readonly>
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Estado Civil</label>
                                    <select id="ecivil_madre" class="form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Soltera</option>
                                        <option value="2">Casada</option>
                                        <option value="3">Viuda</option>
                                        <option value="4">Divorciada</option>
                                        <option value="5">Conviviente Civil</option>
                                        <option value="6">Separada Judicialmente</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <h6 class="t-aten">Hijos/as (incluye actual inscrito)</h6>
                                </div>
                                <div class="form-group col">
                                    <label class="floating-label-activo-sm">Vivos</label>
                                    <input type="number" class="form-control form-control-sm" name="n_hijos_nac_vivos" id="n_hijos_nac_vivos" value="">
                                </div>
                                <div class="form-group col">
                                    <label class="floating-label-activo-sm">Fallecidos</label>
                                    <input type="number" class="form-control form-control-sm" name="n_hijos_fall" id="n_hijos_fall" value="">
                                </div>
                                <div class="form-group col">
                                    <label class="floating-label-activo-sm">Mortinatos</label>
                                    <input type="number" class="form-control form-control-sm" name="n_hijos_mortinatos" id="n_hijos_mortinatos" value="">
                                </div>
                                <div class="form-group col">
                                    <label class="floating-label-activo-sm">Total</label>
                                    <input type="number" class="form-control form-control-sm" name="n_hijos_tot" id="n_hijos_tot" value="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <h6 class="t-aten">Fecha parto/aborto anterior al presente hijo</h6>
                                </div>
                                <div class="form-group col">
                                    <label class="floating-label-activo-sm">Tipo</label>
                                    <select id="tpo_men_ano" class="form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Parto</option>
                                        <option value="2">Aborto</option>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label class="floating-label-activo-sm">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" name="fech_parto_menun" id="fech_parto_menun" value="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Nombre del Padre o progenitor</label>
                                    <input type="address" class="form-control form-control-sm" name="nomb_padre" id="nomb_padre" value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-2">
                                    <label class="floating-label-activo-sm">Edad</label>
                                    <input type="number" class="form-control form-control-sm" name="edad_padre" id="edad_padre" value="">
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-2">
                                    <label class="floating-label-activo-sm">Último Curso</label>
                                    <input type="number" class="form-control form-control-sm" name="ult_curs_padre" id="ult_curs_padre" value="">
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-2">
                                    <label class="floating-label-activo-sm">Instrucción</label>
                                    <select id="niv_inst_padre" class="form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Superior</option>
                                        <option value="2">Medio Secundario</option>
                                        <option value="3">Básico o primario</option>
                                        <option value="3">Ninguno</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-2">
                                    <label class="floating-label-activo-sm">Ocupación</label>
                                    <input type="address" class="form-control form-control-sm" name="ocup_padre" id="ocup_padre" value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}" readonly>
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-2">
                                    <label class="floating-label-activo-sm">Uso INE</label>
                                    <input type="address" class="form-control form-control-sm" name="uso_ine_ocup_padre" id="uso_ine_ocup_padre" value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}" readonly>
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-2">
                                    <label class="floating-label-activo-sm">Nivel Ocupacional</label>
                                    <select id="niv_ocup_padre" class="form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Patróm/a</option>
                                        <option value="2">Empleado/a</option>
                                        <option value="3">Obrero</option>
                                        <option value="3">Trabajador por cuenta propia</option>
                                    </select>
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
<div class="row">
    <div class="col-12">
        <div id="mensaje_defuncion" class="alert" role="alert" style="display:none;"></div>
    </div>
</div>
<div class="row">
    <div class="col-12 text-right">
        <button type="button" onclick="confirmar_registrar_certificado_defuncion();" class="btn btn-info"><i class="feather icon-check"></i> Generar Certificado de Defunción</button>
    </div>
</div>

<script>

    function confirmar_registrar_certificado_defuncion()
    {
        swal({
            title: "¿Está seguro de registrar el certificado de defunción?",
            text: "Una vez registrado, no podrá modificar la información.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willRegister) => {
            if (willRegister) {
                registrar_certificado_defuncion();
            }
        });
    }

    function registrar_certificado_defuncion()
    {
        // Validar campos obligatorios
        if (!$('#f_fallecimiento').val() || !$('#hora_fallecimiento').val()) {
            swal({
                title: "Campos requeridos",
                text: "Debe ingresar la fecha y hora de fallecimiento",
                icon: "warning",
            });
            return;
        }

        // Recopilar datos del formulario de defunción
        let datos_defuncion = {
            // Tipo de certificado
            certif_defuncion: $('#certif_defuncion').val(),

            // 1. Identidad del fallecido
            nombre_fallecido: $('#nombre_fallecido').val(),
            rut_fallecido: $('#rut_fallecido').val(),
            sexo_fallecido: $('#sexo_fallecido').val(),
            fn_fallecido: $('#fn_fallecido').val(),
            edad_fallecido: $('#edad_fallecido').val(),
            mdm_menunano: $('#mdm_menunano').val(),

            // Testigos
            nombre_test_uno: $('#nombre_test_uno').val(),
            rut_test_uno: $('#rut_test_uno').val(),
            verif_test_uno: $('#verif_test_dos').val(),
            nombre_test_dos: $('#nombre_test_dos').val(),
            rut_test_dos: $('#rut_test_dos').val(),
            verif_test_dos: $('#verif_tes_dos').val(),

            // 2. Formulario de defunción
            f_fallecimiento: $('#f_fallecimiento').val(),
            hora_fallecimiento: $('#hora_fallecimiento').val(),
            peso_nac_men_fallecido: $('#peso_nac_men_fallecido').val(),
            sem_gestmen_fallecido: $('#sem_gestmen_fallecido').val(),
            en_men_fallecido: $('#en_men_fallecido').val(),
            lug_fall_men_fallecido: $('#lug_fall_men_fallecido').val(),
            estab_lug_fallec: $('#estab_lug_fallec').val(),

            // 3. Causa de muerte
            causa_inmed: $('#causa_inmed').val(),
            causas_origin: $('#causas_origin').val(),
            est_morbosos_conc: $('#est_morbosos_conc').val(),

            // 4. Fundamento causa de muerte
            fund_causa_muerte: $('#fund_causa_muerte').val(),
            lugar_ocurr_muerte: $('#lugar_ocurr_muerte').val(),
            circunst_muerte: $('#circunst_muerte').val(),
            t_muerte: $('#t_muerte').val(),

            // 5. Atención médica
            at_medica_enf: $('#at_medica_enf').val(),

            // 6. Calidad de quien certifica
            cal_firmante: $('#cal_firmante').val(),
            ot_firmantes: $('#ot_firmantes').val(),
            nombre_med: $('#nombre_med').val(),
            rut_med: $('#rut_med').val(),
            tel_med: $('#tel_med').val(),
            dom_med: $('#dom_med').val(),
            firma_med: $('#firma_med').val(),
            autent_med: $('#autent_med').val(),

            // Registro Civil (si aplica)
            resid_fallecido: $('#resid_fallecido').val(),
            reg_fallecido: $('#reg_fallecido').val(),
            ciud_fallecido: $('#ciud_fallecido').val(),
            ocup_fallecido: $('#ocup_fallecido').val(),
            niv_educ_fall: $('#niv_educ_fall').val(),

            // Datos menores de 1 año
            tpo_men_ano: $('#tpo_men_ano').val(),
            nomb_gestante: $('#nomb_gestante').val(),
            ecivil_madre: $('#ecivil_madre').val(),
            n_hijos_nac_vivos: $('#n_hijos_nac_vivos').val(),
            n_hijos_fall: $('#n_hijos_fall').val(),
            n_hijos_mortinatos: $('#n_hijos_mortinatos').val(),
            n_hijos_tot: $('#n_hijos_tot').val(),
            nomb_padre: $('#nomb_padre').val(),
            edad_padre: $('#edad_padre').val(),

            // Contexto
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_paciente: '{{ $paciente->id ?? "" }}'
        };

        // Cambiar a POST ya que es más apropiado para crear registros
        let url = "{{ route('ficha_medica.registrar_certificado_defuncion') }}";

        // Mostrar loading
        swal({
            title: "Procesando...",
            text: "Generando certificado de defunción",
            icon: "info",
            buttons: false,
            closeOnClickOutside: false,
        });

        $.ajax({
            url: url,
            type: 'POST',
            data: datos_defuncion,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        })
        .done(function(response) {
            swal.close();

            if (response != '') {
                console.log(response);

                $('#mensaje_defuncion').removeClass('alert-success alert-danger').hide();

                if(response['estado'] == '1')
                {
                    $('#mensaje_defuncion')
                        .addClass('alert-success')
                        .html('Certificado de Defunción registrado exitosamente. <i class="fas fa-check"></i>')
                        .show();

                    // Mostrar PDF si existe
                    if (response['id_certificado']) {
                        ver_pdf_certificado_defuncion(response['id_certificado']);
                    }

                    // Scroll al mensaje
                    $('html, body').animate({
                        scrollTop: $("#mensaje_defuncion").offset().top - 100
                    }, 500);
                }
                else
                {
                    swal({
                        title: "Error al registrar",
                        text: response['msj'] || "No se pudo registrar el certificado de defunción",
                        icon: "error",
                    });
                }
            }
        })
        .fail(function(xhr, status, error) {
            swal.close();
            console.log("Error:", xhr.responseText);

            let mensaje_error = "Error al procesar la solicitud";
            if (xhr.responseJSON && xhr.responseJSON.message) {
                mensaje_error = xhr.responseJSON.message;
            }

            swal({
                title: "Error",
                text: mensaje_error,
                icon: "error",
            });
        });
    }

    function ver_pdf_certificado_defuncion(id_certificado)
    {
        let url = "{{ route('pdf.certificado_defuncion') }}?id_certificado=" + id_certificado;

        Fancybox.show([
            {
                src: url,
                type: "iframe",
                preload: false,
            }
        ]);
    }
</script>

