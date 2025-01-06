<div class="card">
    <div class="card-body">
        <div id="form-presup_dent">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <ul class="nav nav-tabs-aten nav-fill mb-10" id="od_grl" role="tablist">
                        @if(!$paciente->es_adulto)
                        <li class="nav-item">
                            <a class="nav-link-aten text-reset active" id="od_pac_depend_tab" data-toggle="tab" href="#od_pac_depend" role="tab" aria-controls="od_pac_depend" aria-selected="true">Paciente Menor de edad y Dependientes</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link-aten text-reset" id="od_presup_clinico-tab" data-toggle="tab" href="#od_presup_clinico" role="tab" aria-controls="od_presup_clinico" aria-selected="true">Presupuesto Clinico</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-aten text-reset" id="od_laboratorio-tab" data-toggle="tab" href="#od_laboratorio" role="tab" aria-controls="od_laboratorio" aria-selected="true">Laboratorio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-aten text-reset" id="od__presup_gral-tab" data-toggle="tab" href="#od__presup_gral" role="tab" aria-controls="od__presup_gral" aria-selected="true">Presupuesto General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-aten text-reset" id="od_abonos_pres-tab" data-toggle="tab" href="#od_abonos_pres" role="tab" aria-control="od_abonos_pres" aria-selected="false">Abonos y Estados de Pago</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="tab-content" id="od_grl">
                        <!--DEPENDIENTES-->
                        <div class="tab-pane fade  {{ $paciente->es_adulto ? 'show active' : '' }}" id="od_pac_depend" role="tabpanel" aria-labelledby="od_pac_depend_tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                        <a class="nav-link-aten text-reset active " id="od_at_menor-tab" data-toggle="tab" href="#od_at_menor" role="tab" aria-controls="od_at_menor" aria-selected="false">Identificación </a>
                                                        <a class="nav-link-aten text-reset" id="od_at_acomp_a-tab" data-toggle="tab" href="#od_at_acomp_a" role="tab" aria-controls="od_at_acomp_a" aria-selected="true">Acompañantes Autorizados</a>
                                                        <a class="nav-link-aten text-reset" id="od_at_res_p-tab" data-toggle="tab" href="#od_at_res_p" role="tab" aria-controls="od_at_res_p" aria-selected="true">Responsable del Pago </a>
                                                        <a class="nav-link-aten text-reset" id="od_at_part-tab" data-toggle="tab" href="#od_at_part" role="tab" aria-controls="od_at_part" aria-selected="false">Particularidades</a>
                                                        <a class="nav-link-aten text-reset" id="od_at_perm-tab" data-toggle="tab" href="#od_at_perm" role="tab" aria-controls="od_at_perm" aria-selected="false">Solicitar Permisos</a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        <div class="tab-pane fade show active" id="od_at_menor" role="tabpanel" aria-labelledby="od_at_menor-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-4">
                                                                        <label class="floating-label-activo-sm">Rut</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_pte_rut"id="od_id_pte_rut" value="{{ $paciente->rut }}">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label class="floating-label-activo-sm">Nombre y Apellidos</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_pte_nomb"id="od_id_pte_nomb" value="{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}">
                                                                    </div>
                                                                    <div class="form-group col-md-2" id="form_0">
                                                                        <label class="floating-label-activo-sm">FN</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_pte_fn"id="od_id_pte_fn">
                                                                    </div>
                                                                    <div class="form-group col-md-2" id="form_0">
                                                                        <label class="floating-label-activo-sm">Edad</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_pte_edad"id="od_id_pte_edad" value="{{ $paciente->edad }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">Observaciones </label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" data-seccion="Oídos Audición" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade show" id="od_at_acomp_a" role="tabpanel" aria-labelledby="od_at_acomp_a-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label-activo-sm">Rut</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_aca_rut"id="od_id_aca_rut">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label class="floating-label-activo-sm">Nombre y Apellidos</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_aca_nomb"id="od_id_aca_nomb">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label-activo-sm">Parentezco</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_aca_rut"id="od_id_aca_rut">
                                                                    </div>
                                                                    <div class="form-group col-md-2" id="form_0">
                                                                        <label class="floating-label-activo-sm">Teléfono</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_aca_tel"id="od_id_aca_tel">
                                                                    </div>
                                                                    <div class="form-group col-md-2" id="form_0">
                                                                        <label class="floating-label-activo-sm">Email</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_aca_email"id="od_id_aca_email">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">Observaciones </label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" data-seccion="Oídos Audición" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade show" id="od_at_res_p" role="tabpanel" aria-labelledby="od_at_res_p-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-4">
                                                                        <label class="floating-label-activo-sm">Rut</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_aca_rut"id="od_id_aca_rut">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label class="floating-label-activo-sm">Nombre y Apellidos</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_aca_nomb"id="od_id_aca_nomb">
                                                                    </div>
                                                                    <div class="form-group col-md-2" id="form_0">
                                                                        <label class="floating-label-activo-sm">Teléfono</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_aca_tel"id="od_id_aca_tel">
                                                                    </div>
                                                                    <div class="form-group col-md-2" id="form_0">
                                                                        <label class="floating-label-activo-sm">Email</label>
                                                                        <input type="text" class="form-control form-control-sm" name="od_id_aca_email"id="od_id_aca_email">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="form-group">
                                                                            <button type="button" class="btn btn-outline-primary btn-block btn-sm" onclick="abrir_modal_guardar_aceptar_pago(' ');"><i class="fas fa-save"></i> Aceptar Presupuesto y pago</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="od_at_part" role="tabpanel" aria-labelledby="od_at_part-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm">Observaciones Acerca del tipo de Paciente</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Biomicroscópico" data-seccion="Oídos Audición" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_biom" id="obs_ex_biom"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="od_at_perm" role="tabpanel" aria-labelledby="od_at_perm-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">Autorización Vigente</label>
                                                                            <input type="text" class="form-control form-control-sm" name="od_est_aut_v"id="od_est_aut_venc">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">Autorización Vencida</label>
                                                                            <input type="text" class="form-control form-control-sm" name="od_est_aut_venc"id="od_est_aut_venc">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                        <div class="form-group">
                                                                            <button type="button" class="btn btn-outline-primary btn-block btn-sm" onclick="abrir_modal_guardar_aceptar_pago(' ');"><i class="fas fa-save"></i> Solicitar o Renovar autorización</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm">Observaciones</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Biomicroscópico" data-seccion="Oídos Audición" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_biom" id="obs_ex_biom"></textarea>
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
                        <!--TRABAJOS-->
                        <div class="tab-pane fade show" id="od_presup_clinico" role="tabpanel" aria-labelledby="od_presup_clinico_tab">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <div class="form-row" id="contenedor_piezas_dentales_presupuesto">
                                            @foreach ($odontograma as $o)

                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Pieza</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ $o->pieza }}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="{{ $o->descripcion }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${{ number_format($o->valor,0,',','.') }}" >
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Total prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${{ number_format($o->valor,0,',','.') }}" >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                                </div>

                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_maxilar_superior_gral_diagnosticos_presupuesto">
                                            @foreach ($maxilar_superior_gral_diagnosticos as $diagnostico)
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">{{ $diagnostico->localizacion }}</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="{{ $diagnostico->diagnostico_tratamiento }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Total prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_maxilar_superior_gral_tratamientos_presupuesto">
                                            @foreach ($maxilar_superior_gral_tratamientos as $diagnostico)

                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">{{ $diagnostico->localizacion }}</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="{{ $diagnostico->diagnostico_tratamiento }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Total prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                                </div>

                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_maxilar_superior_endo_tratamientos_presupuesto">
                                            @foreach ($maxilar_superior_gral_tratamientos_endo as $diagnostico)

                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">{{ $diagnostico->localizacion }}</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="{{ $diagnostico->diagnostico_tratamiento }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Total prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                                </div>

                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_maxilar_superior_endo_diagnosticos_presupuesto">
                                            @foreach ($maxilar_superior_gral_diagnosticos_endo as $diagnostico)

                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">{{ $diagnostico->localizacion }}</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="{{ $diagnostico->diagnostico_tratamiento }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Total prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                                </div>

                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_maxilar_inferior_gral_diagnosticos_presupuesto">
                                            @foreach ($maxilar_inferior_gral_diagnosticos as $diagnostico)

                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">{{ $diagnostico->localizacion }}</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="{{ $diagnostico->diagnostico_tratamiento }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Total prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                                </div>

                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_maxilar_inferior_gral_tratamientos_presupuesto">
                                            @foreach ($maxilar_inferior_gral_tratamientos as $diagnostico)

                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">{{ $diagnostico->localizacion }}</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="{{ $diagnostico->diagnostico_tratamiento }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Total prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                                </div>

                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_maxilar_inferior_endo_diagnosticos_presupuesto">
                                            @foreach ($maxilar_inferior_gral_diagnosticos_endo as $diagnostico)

                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">{{ $diagnostico->localizacion }}</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="{{ $diagnostico->diagnostico_tratamiento }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Total prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                                </div>

                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_maxilar_inferior_endo_tratamientos_presupuesto">
                                            @foreach ($maxilar_inferior_gral_tratamientos_endo as $diagnostico)

                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">{{ $diagnostico->localizacion }}</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="{{ $diagnostico->diagnostico_tratamiento }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Total prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                                </div>

                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_boca_completa_gral_tratamientos_presupuesto">
                                            @foreach ($boca_completa_gral_tratamientos as $diagnostico)
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">{{ $diagnostico->localizacion }}</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="{{ $diagnostico->diagnostico_tratamiento }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Total prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_boca_completa_gral_diagnosticos_presupuesto">
                                            @foreach ($boca_completa_gral_diagnosticos as $diagnostico)
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">{{ $diagnostico->localizacion }}</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="{{ $diagnostico->diagnostico_tratamiento }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Total prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_boca_completa_endo_tratamientos_presupuesto">
                                            @foreach ($boca_completa_gral_tratamiento_endo as $diagnostico)

                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">{{ $diagnostico->localizacion }}</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="{{ $diagnostico->diagnostico_tratamiento }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Total prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                                </div>

                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_boca_completa_endo_diagnosticos_presupuesto">
                                            @foreach ($boca_completa_gral_diagnostico_endo as $diagnostico)
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">{{ $diagnostico->localizacion }}</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ $diagnostico->localizacion }}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="{{ $diagnostico->diagnostico_tratamiento }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ $diagnostico->descuento }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Total Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="{{ number_format($diagnostico->valor,0,',','.') }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)"> Ver Estado Trabajo</button>
                                                </div>
                                            @endforeach
                                        </div>

                                    </form>
                                    <div id="valores">
                                         </br>

                                    </div>
                                    <div class="container mt-4">
                                        <div class="row bg-light border p-3 text-center">
                                            <!-- Total -->
                                            <div class="col-md-3">
                                                <h5>Total</h5>
                                                <p id="valores_examenes_presupuesto">$ {{ number_format($valores,0,',','.') }}</p>
                                            </div>

                                            <!-- Total Piezas -->
                                            <div class="col-md-3">
                                                <h5>Total Piezas</h5>
                                                <p id="valores_piezas_presupuesto">$ {{ number_format($valores_piezas,0,',','.') }}</p>
                                            </div>

                                            <!-- Descuentos -->
                                            <div class="col-md-3">
                                                <h5>Descuentos</h5>
                                                <p id="valores_descuentos_presupuesto">$0.00</p>
                                            </div>

                                            <!-- Total Final -->
                                            <div class="col-md-3">
                                                <h5>Total Final</h5>
                                                <p id="valores_total_final_presupuesto">$ {{ number_format($valores + $valores_piezas,0,',','.') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm my-2" onclick="pedir_autorizacion_presupuesto_dental()">Pedir autorización de presupuesto</button>
                                    <button type="button" class="btn btn-primary btn-sm" onclick="generar_pdf()">
                                        <i class="fa fa-file"></i> PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!--LABORATORIO-->
                        <div class="tab-pane fade show" id="od_laboratorio" role="tabpanel" aria-labelledby="od_laboratorio-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                        <a class="nav-link-aten text-reset" id="od_laboratorio_trab-tab" data-toggle="tab" href="#od_laboratorio_trab" role="tab" aria-controls="od_laboratorio_trab" aria-selected="false">Estados Trabajos</a>
                                                        <a class="nav-link-aten text-reset" id="od_lab_estadopago-tab" data-toggle="tab" href="#od_lab_estadopago" role="tab" aria-controls="od_lab_estadopago" aria-selected="false">Estados de Pago</a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-10 col-xl-10">
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        <div class="tab-pane fade show active" id="od_laboratorio_trab" role="tabpanel" aria-labelledby="od_laboratorio_trab-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">ESTADO TRABAJOS</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label-activo-sm">Nombre Laboratorio</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_nom" id="lab_nom">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label-activo-sm">Trabajo Requerido</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_ord_trab" id="lab_ord_trab">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label-activo-sm">F.envío</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_fenv" id="lab_fenv">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label-activo-sm">F.entrega</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_fent" id="lab_fent">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label-activo-sm">Estado</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_est" id="lab_est">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label-activo-sm">N° Identificación</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_id_trab" id="lab_id_trab">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label-activo-sm"> Valor Total</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_cost_tot" id="lab_cost_tot">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label-activo-sm"> Abonos</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_abon" id="lab_abon">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label-activo-sm"> Valor Pendiente</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_val_pend" id="lab_val_pend">
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2"onclick="info_lab();"><i class="fa fa-plus"></i>  Info Laboratorio</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2"onclick="info_lab();"><i class="fa fa-plus"></i>  Ingresar abono</button><!--este boton hace el calculo del abono y lo anota-->
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm">Observaciones </label>
                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_est_trab_lab" id="obs_est_trab_lab"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade show " id="od_lab_estadopago" role="tabpanel" aria-labelledby="od_lab_estadopago-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">ESTADOS DE PAGOS A LABORATORIO</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label-activo-sm">Nombre Laboratorio</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_nom" id="lab_nom">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label-activo-sm">N° Identificación</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_id_trab" id="lab_id_trab">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label-activo-sm">F.pago</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_fenv" id="lab_fenv">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label-activo-sm">Cantidad</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_fent" id="lab_fent">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label-activo-sm"> Valor Total</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_cost_tot" id="lab_cost_tot">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label-activo-sm"> Valor Pendiente</label>
                                                                        <input type="text" class="form-control form-control-sm" name="lab_cost_tot" id="lab_cost_tot">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm">Observaciones</label>
                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_est_trab_lab" id="obs_est_trab_lab"></textarea>
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
                        <!--EXAMEN CUELLO-->
                        <div class="tab-pane fade show" id="od__presup_gral" role="tabpanel" aria-labelledby="od__presup_gral-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Laboratorio</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Total Laboratorio</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>

                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Clínico</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="   pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Total Clínico</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>

                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Valor final</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Total presupuesto</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="od_abonos_pres" role="tabpanel" aria-labelledby="od_abonos_pres-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Laboratorio</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Total Laboratorio</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <button type="button" class="btn btn-success btn-block btn-sm"
                                                        onclick="respon_pago_dent();"><i class="fa fa-plus"></i>Boton 1</button>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Clínico</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="   pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Total Clínico</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <button type="button" class="btn btn-success btn-block btn-sm" onclick="respon_pago_dent();"><i class="fa fa-plus"></i>Boton 2</button>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Valor final</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Total presupuesto</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                </div>
                                            </form>
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
