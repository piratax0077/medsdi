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
                                                @if($o->presupuesto == 1)
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
                                                <div class="form-group col-md-2 d-flex">


                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_maxilar_superior_gral_diagnosticos_presupuesto">
                                            @foreach ($maxilar_superior_gral_diagnosticos as $diagnostico)
                                                @if($diagnostico->presupuesto == 1)
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
                                                    <div class="form-group col-md-2 d-flex">


                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_maxilar_superior_gral_tratamientos_presupuesto">
                                            @foreach ($maxilar_superior_gral_tratamientos as $diagnostico)
                                            @if($diagnostico->presupuesto == 1)
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
                                                <div class="form-group col-md-2 d-flex">


                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_maxilar_superior_endo_tratamientos_presupuesto">
                                            @foreach ($maxilar_superior_gral_tratamientos_endo as $diagnostico)
                                            @if($diagnostico->presupuesto == 1)
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
                                                <div class="form-group col-md-2 d-flex">


                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_maxilar_superior_endo_diagnosticos_presupuesto">
                                            @foreach ($maxilar_superior_gral_diagnosticos_endo as $diagnostico)
                                            @if($diagnostico->presupuesto == 1)
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
                                                <div class="form-group col-md-2 d-flex">


                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_maxilar_inferior_gral_diagnosticos_presupuesto">
                                            @foreach ($maxilar_inferior_gral_diagnosticos as $diagnostico)
                                            @if($diagnostico->presupuesto == 1)
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
                                                <div class="form-group col-md-2 d-flex">


                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_maxilar_inferior_gral_tratamientos_presupuesto">
                                            @foreach ($maxilar_inferior_gral_tratamientos as $diagnostico)
                                            @if($diagnostico->presupuesto == 1)
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
                                                <div class="form-group col-md-2 d-flex">


                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_maxilar_inferior_endo_diagnosticos_presupuesto">
                                            @foreach ($maxilar_inferior_gral_diagnosticos_endo as $diagnostico)
                                            @if($diagnostico->presupuesto == 1)
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
                                                <div class="form-group col-md-2 d-flex">


                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_maxilar_inferior_endo_tratamientos_presupuesto">
                                            @foreach ($maxilar_inferior_gral_tratamientos_endo as $diagnostico)
                                            @if($diagnostico->presupuesto == 1)
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
                                                <div class="form-group col-md-2 d-flex">


                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_boca_completa_gral_tratamientos_presupuesto">
                                            @foreach ($boca_completa_gral_tratamientos as $diagnostico)
                                            @if($diagnostico->presupuesto == 1)
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
                                                <div class="form-group col-md-2 d-flex">


                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_boca_completa_gral_diagnosticos_presupuesto">
                                            @foreach ($boca_completa_gral_diagnosticos as $diagnostico)
                                            @if($diagnostico->presupuesto == 1)
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
                                                <div class="form-group col-md-2 d-flex">


                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_boca_completa_endo_tratamientos_presupuesto">
                                            @foreach ($boca_completa_gral_tratamiento_endo as $diagnostico)
                                            @if($diagnostico->presupuesto == 1)
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
                                                <div class="form-group col-md-2 d-flex">


                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="form-row" id="contenedor_boca_completa_endo_diagnosticos_presupuesto">
                                            @foreach ($boca_completa_gral_diagnostico_endo as $diagnostico)
                                            @if($diagnostico->presupuesto == 1)
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
                                                <div class="form-group col-md-2 d-flex">


                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="form row" id="contenedor_insumos">
                                            @foreach ($insumos_tratamientos as $diagnostico)
                                                @if($diagnostico->presupuesto == 1)
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Insumo</label>
                                                    <input type="text" class="form-control form-control-sm" name="insumo_pres" id="insumo_pres" value="{{ $diagnostico->insumos }}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Cantidad</label>
                                                    <input type="text" class="form-control form-control-sm" name="cantidad_pres" id="cantidad_pres" value="{{ $diagnostico->cantidad }}">
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
                                                <div class="form-group col-md-2 d-flex">


                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </form>
                                    <div id="valores">
                                         </br>

                                    </div>
                                    <div class="container mt-4">
                                        <div class="row bg-light border p-3 text-center">
                                            <!-- Total -->
                                            <div class="col-md-2">
                                                <h5>Total Grupo/Boca</h5>
                                                <p id="valores_examenes_presupuesto">$ {{ number_format($valores,0,',','.') }}</p>
                                            </div>

                                            <!-- Total Piezas -->
                                            <div class="col-md-2">
                                                <h5>Total Piezas</h5>
                                                <p id="valores_piezas_presupuesto">$ {{ number_format($valores_piezas,0,',','.') }}</p>
                                            </div>

                                            <!-- Descuentos -->
                                            <div class="col-md-2">
                                                <h5>Descuentos</h5>
                                                <p id="valores_descuentos_presupuesto">$0.00</p>
                                            </div>

                                            <!-- Insumos -->
                                            <div class="col-md-2">
                                                <h5>Insumos</h5>
                                                <p id="valores_insumos_presupuesto">$ {{ number_format($valores_insumos,0,',','.') }}</p>
                                            </div>

                                            <!-- Total Final -->
                                            <div class="col-md-4">
                                                <h5>Total Final</h5>
                                                <p id="valores_total_final_presupuesto">$ {{ number_format($valores + $valores_piezas + $valores_insumos,0,',','.') }}</p>
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
                                                        <a class="nav-link-aten text-reset" id="costo_presupuesto_trab-tab" data-toggle="tab" href="#costo_presupuesto_trab" role="tab" aria-controls="costo_presupuesto_trab" aria-selected="false">Costo/Presupuesto Lab</a>
                                                        <a class="nav-link-aten text-reset" id="od_lab_estadopago-tab" data-toggle="tab" href="#od_lab_estadopago" role="tab" aria-controls="od_lab_estadopago" aria-selected="false">Estados de Pago</a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-10 col-xl-10">
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        <div class="tab-pane fade show active" id="od_laboratorio_trab" role="tabpanel" aria-labelledby="od_laboratorio_trab-tab">
                                                            <div class="col-sm-12 col-md-12">

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
                                                                    <div class="form-group col-md-2 d-flex">


                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm">Observaciones </label>
                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_est_trab_lab" id="obs_est_trab_lab"></textarea>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo<span class="ripple ripple-animate" ></span></button>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade show" id="costo_presupuesto_trab" role="tabpanel" aria-labelledby="costo_presupuesto_trab-tab">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="form-row">
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
                                                                            {{-- <div class="form-group col-md-3">
                                                                                <button type="button" class="btn btn-info-light-c btn-block btn-xs mb-2"onclick="info_lab();"><i class="fa fa-plus"></i>  Ingresar abono</button><!--este boton hace el calculo del abono y lo anota-->
                                                                            </div> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div class="tab-pane fade show " id="od_lab_estadopago" role="tabpanel" aria-labelledby="od_lab_estadopago-tab">
                                                            <div class="col-sm-12 col-md-12">

                                                                <div class="form-row">
                                                                    <div class="form-group col-md-2">
                                                                        <label class="floating-label-activo-sm">N° de presupuesto</label>
                                                                        <select name="n_presupuesto" id="n_presupuesto" class="form-control form-control-sm">
                                                                            <option value="0">Seleccione</option>
                                                                            @if(isset($presupuesto))
                                                                            <option value="{{ $presupuesto->id }}">{{ $presupuesto->id }}</option>
                                                                            @endif
                                                                        </select>
                                                                    </div>
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
                                                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
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
                                                        <input type="text" class="form-control form-control-sm" name="subtotal_lab" id="subtotal_lab">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="descuento_lab" id="descuento_lab">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Total Laboratorio</label>
                                                        <input type="text" class="form-control form-control-sm" name="total_lab" id="total_lab">
                                                    </div>

                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Clínico</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="subtotal_clinico" id="subtotal_clinico" value="{{ number_format($valores + $valores_piezas,0,',','.') }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="descuento_clinico" id="   descuento_clinico" value="0">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Total Clínico</label>
                                                        <input type="text" class="form-control form-control-sm" name="total_clinico" id="total_clinico" value="{{ number_format($valores + $valores_piezas,0,',','.') }}">
                                                    </div>

                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Insumos no incluidos</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="subtotal_insumos" id="subtotal_insumos" value="{{ number_format($valores_insumos,0,',','.') }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="descuento_insumos" id="descuento_insumos" value="0">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Total Insumos</label>
                                                        <input type="text" class="form-control form-control-sm" name="total_insumos" id="total_insumos" value="{{ number_format($valores_insumos,0,',','.') }}">
                                                    </div>

                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Valor final</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Total presupuesto</label>
                                                        @php $suma = $valores + $valores_piezas + $valores_insumos; @endphp
                                                        <input type="text" class="form-control form-control-sm" name="total_presupuesto" id="total_presupuesto" value="{{ number_format($suma,0,',','.') }}">
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
                                                        <label class="floating-label-activo-sm">Presupuesto N°</label>
                                                        <input type="text" class="form-control form-control-sm" name="" id="" value="{{ $presupuesto ? $presupuesto->id : ''}}">
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
                                                        <label class="floating-label-activo-sm">Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Abonos</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <button type="button" class="btn btn-success btn-block btn-sm"
                                                        onclick="respon_pago_dent();"><i class="fa fa-plus"></i>Ingresar Abono</button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h2 style="font-size: 25px; text-align: center;">Presupuesto por pieza</h2>
                                                        <div class="dt-responsive table-responsive pb-4">
                                                            <table id="presup_estado_pago"
                                                                class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                                                style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center align-middle">Prestación</th>
                                                                        <th class="text-center align-middle">Pieza</th>
                                                                        <th class="text-center align-middle">Valor total</th>
                                                                        <th class="text-center align-middle">Descuento</th>
                                                                        <th class="text-center align-middle">Valor a pagar</th>
                                                                        <th class="text-center align-middle">Aprobado</th>
                                                                        <th class="text-center align-middle">Estado</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($odontograma as $o)
                                                                        @if($o->presupuesto == 1)
                                                                            @php
                                                                            if($o->estado == 0) {
                                                                                $estado = 'PENDIENTE';
                                                                            }elseif($o->estado == 1){
                                                                                $estado = 'TERMINADO';
                                                                                # code...
                                                                            }
                                                                            @endphp
                                                                            <tr>
                                                                                <td class="text-center align-middle">{{ $o->descripcion }}</td>
                                                                                <td class="text-center align-middle">{{ $o->pieza }}</td>
                                                                                <td class="text-center align-middle">{{ number_format($o->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle">0</td>
                                                                                <td class="text-center align-middle">{{ number_format($o->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle"></td>
                                                                                <td class="text-center align-middle">
                                                                                    {{ $estado }}
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <h2 style="font-size: 25px; text-align: center;">Presupuesto por grupos</h2>
                                                        <div class="dt-responsive table-responsive pb-4">
                                                            <table id="presup_estado_pago_gral" class="display table table-striped table-hover dt-responsive nowrap table-sm w-100">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center align-middle">Prestación</th>
                                                                        <th class="text-center align-middle">Grupo</th>
                                                                        <th class="text-center align-middle">Valor total</th>
                                                                        <th class="text-center align-middle">Descuento</th>
                                                                        <th class="text-center align-middle">Valor a pagar</th>
                                                                        <th class="text-center align-middle">Aprobado</th>
                                                                        <th class="text-center align-middle">Estado</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($maxilar_superior_gral_diagnosticos as $diagnostico)
                                                                        @if($diagnostico->presupuesto == 1)
                                                                            <tr>
                                                                                <td class="text-center align-middle">{{ $diagnostico->diagnostico_tratamiento }}</td>
                                                                                <td class="text-center align-middle">{{ $diagnostico->localizacion }}</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle">0</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle"></td>
                                                                                <td class="text-center align-middle">

                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                    @foreach ($maxilar_superior_gral_tratamientos as $diagnostico)
                                                                        @if($diagnostico->presupuesto == 1)
                                                                            <tr>
                                                                                <td class="text-center align-middle">{{ $diagnostico->diagnostico_tratamiento }}</td>
                                                                                <td class="text-center align-middle">{{ $diagnostico->localizacion }}</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle">0</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle"></td>
                                                                                <td class="text-center align-middle">

                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                    @foreach ($maxilar_superior_gral_tratamientos_endo as $diagnostico)
                                                                        @if($diagnostico->presupuesto == 1)
                                                                            <tr>
                                                                                <td class="text-center align-middle">{{ $diagnostico->diagnostico_tratamiento }}</td>
                                                                                <td class="text-center align-middle">{{ $diagnostico->localizacion }}</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle">0</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle"></td>
                                                                                <td class="text-center align-middle">

                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                    @foreach ($maxilar_superior_gral_diagnosticos_endo as $diagnostico)
                                                                        @if($diagnostico->presupuesto == 1)
                                                                            <tr>
                                                                                <td class="text-center align-middle">{{ $diagnostico->diagnostico_tratamiento }}</td>
                                                                                <td class="text-center align-middle">{{ $diagnostico->localizacion }}</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle">0</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle"></td>
                                                                                <td class="text-center align-middle">

                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                    @foreach ($maxilar_inferior_gral_diagnosticos as $diagnostico)
                                                                        @if($diagnostico->presupuesto == 1)
                                                                            <tr>
                                                                                <td class="text-center align-middle">{{ $diagnostico->diagnostico_tratamiento }}</td>
                                                                                <td class="text-center align-middle">{{ $diagnostico->localizacion }}</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle">0</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle"></td>
                                                                                <td class="text-center align-middle">

                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                    @foreach ($maxilar_inferior_gral_tratamientos as $diagnostico)
                                                                        @if($diagnostico->presupuesto == 1)
                                                                            <tr>
                                                                                <td class="text-center align-middle">{{ $diagnostico->diagnostico_tratamiento }}</td>
                                                                                <td class="text-center align-middle">{{ $diagnostico->localizacion }}</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle">0</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle"></td>
                                                                                <td class="text-center align-middle">

                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                    @foreach ($maxilar_inferior_gral_diagnosticos_endo as $diagnostico)
                                                                        @if($diagnostico->presupuesto == 1)
                                                                            <tr>
                                                                                <td class="text-center align-middle">{{ $diagnostico->diagnostico_tratamiento }}</td>
                                                                                <td class="text-center align-middle">{{ $diagnostico->localizacion }}</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle">0</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle"></td>
                                                                                <td class="text-center align-middle">

                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                    @foreach ($maxilar_inferior_gral_tratamientos_endo as $diagnostico)
                                                                        @if($diagnostico->presupuesto == 1)
                                                                            <tr>
                                                                                <td class="text-center align-middle">{{ $diagnostico->diagnostico_tratamiento }}</td>
                                                                                <td class="text-center align-middle">{{ $diagnostico->localizacion }}</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle">0</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle"></td>
                                                                                <td class="text-center align-middle">

                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                    @foreach ($boca_completa_gral_tratamientos as $diagnostico)
                                                                        @if($diagnostico->presupuesto == 1)
                                                                            <tr>
                                                                                <td class="text-center align-middle">{{ $diagnostico->diagnostico_tratamiento }}</td>
                                                                                <td class="text-center align-middle">{{ $diagnostico->localizacion }}</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle">0</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle"></td>
                                                                                <td class="text-center align-middle">

                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                    @foreach ($boca_completa_gral_diagnosticos as $diagnostico)
                                                                        @if($diagnostico->presupuesto == 1)
                                                                            <tr>
                                                                                <td class="text-center align-middle">{{ $diagnostico->diagnostico_tratamiento }}</td>
                                                                                <td class="text-center align-middle">{{ $diagnostico->localizacion }}</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle">0</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle"></td>
                                                                                <td class="text-center align-middle">

                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                    @foreach ($boca_completa_gral_tratamiento_endo as $diagnostico)
                                                                        @if($diagnostico->presupuesto == 1)
                                                                            <tr>
                                                                                <td class="text-center align-middle">{{ $diagnostico->diagnostico_tratamiento }}</td>
                                                                                <td class="text-center align-middle">{{ $diagnostico->localizacion }}</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle">0</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle"></td>
                                                                                <td class="text-center align-middle">

                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                    @foreach ($boca_completa_gral_diagnostico_endo as $diagnostico)
                                                                        @if($diagnostico->presupuesto == 1)
                                                                            <tr>
                                                                                <td class="text-center align-middle">{{ $diagnostico->diagnostico_tratamiento }}</td>
                                                                                <td class="text-center align-middle">{{ $diagnostico->localizacion }}</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle">0</td>
                                                                                <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                                                <td class="text-center align-middle"></td>
                                                                                <td class="text-center align-middle">

                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <h2 style="font-size: 25px; text-align: center;">Insumos y gastos generales</h2>
                                                        <table id="presup_insumos_pago" class="display table table-striped table-hover dt-responsive nowrap table-sm w-100">
                                                            <thead>
                                                                <tr>
                                                                    <td class="text-center align-middle">Insumo</td>
                                                                    <td class="text-center align-middle">Cantidad</td>
                                                                    <td class="text-center align-middle">Sub-total</td>
                                                                    <td class="text-center align-middle">Descuento</td>
                                                                    <td class="text-center align-middle">Total</td>
                                                                    <td class="text-center align-middle">Aprobado</td>
                                                                    <td class="text-center align-middle">Estado</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($insumos_tratamientos as $t)
                                                                    @if($t->presupuesto == 1)
                                                                    @php $total = $t->cantidad * $t->valor @endphp
                                                                    <tr>
                                                                        <td class="text-center align-middle">{{ $t->insumos }}</td>
                                                                        <td class="text-center align-middle">{{ $t->cantidad }}</td>
                                                                        <td class="text-center align-middle">{{ number_format($t->valor)  }}</td>
                                                                        <td class="text-center align-middle">0</td>
                                                                        <td class="text-center align-middle">{{ number_format($total)  }}</td>
                                                                        <td class="text-center align-middle"></td>
                                                                        <td class="text-center align-middle"></td>
                                                                    </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row mt-3 bg-light border p-3 text-center">
                                                    <!-- Total -->
                                                    <div class="col-md-2">
                                                        <h5>Total Grupo/Boca</h5>
                                                        <p id="valores_examenes_presupuesto_conf">$ {{ number_format($valores,0,',','.') }}</p>
                                                    </div>

                                                    <!-- Total Piezas -->
                                                    <div class="col-md-2">
                                                        <h5>Total Piezas</h5>
                                                        <p id="valores_piezas_presupuesto_conf">$ {{ number_format($valores_piezas,0,',','.') }}</p>
                                                    </div>

                                                    <!-- Descuentos -->
                                                    <div class="col-md-2">
                                                        <h5>Descuentos</h5>
                                                        <p id="valores_descuentos_presupuesto_conf">$0.00</p>
                                                    </div>

                                                    <!-- Insumos -->
                                                    <div class="col-md-2">
                                                        <h5>Insumos</h5>
                                                        <p id="valores_insumos_presupuesto_conf">$ {{ number_format($valores_insumos,0,',','.') }}</p>
                                                    </div>

                                                    <!-- Total Final -->
                                                    <div class="col-md-4 d-flex justify-content-between">
                                                        <div>
                                                            <h5>Total Final</h5>
                                                            <p id="valores_total_final_presupuesto_conf">$ {{ number_format($valores + $valores_piezas + $valores_insumos,0,',','.') }}</p>
                                                        </div>
                                                        <button type="button" class="btn btn-outline-success btn-sm">Pagar</button>
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

<!-- MODAL INSUMOS -->
<!-- Modal -->
<div class="modal fade" id="insumosModal" tabindex="-1" aria-labelledby="insumosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="insumosModalLabel">Insumos para el tratamiento</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Profesional</label>
                            <input type="text" name="" id="" class="form-control form-control-sm" value="{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Paciente</label>
                            <input type="text" name="" id="" class="form-control form-control-sm" value="{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">N° Pieza</label>
                            <input type="text" name="numero_pieza_tto_modal" id="numero_pieza_tto_modal" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Tratamiento</label>
                            <input type="text" name="tto_modal" id="tto_modal" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Insumos</label>
                            <input type="text" name="insumos_tto" id="insumos_tto" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Cantidad</label>
                            <input type="number" name="insumos_cantidad_tto" id="insumos_cantidad_tto" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Valor</label>
                            <input type="number" name="insumos_valor_tto" id="insumos_valor_tto" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Observaciones</label>
                            <textarea class="form-control caja-texto form-control-sm mb-9" name="insumos_obs_tto" id="insumos_obs_tto" cols="30" rows="1" onfocus="this.rows = 4" onblur="this.rows=1"></textarea>
                        </div>

                    </div>

                    <button type="button" class="btn btn-outline-success btn-sm w-100 my-2" onclick="agregar_insumos_tto()"><i class="fas fa-check"></i> + Agregar</button>
                </div>
                <table class="table table-bordered table-xs w-100" id="table_insumos_tto">
                    <thead>
                        <th>insumo</th>
                        <th>cantidad</th>
                        <th>valor</th>
                        <th>observaciones</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Solicitar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- DATOS DE VITAL IMPORTANCIA -->
  <input type="hidden" id="id_pieza_tto">
  <input type="hidden" id="tipo_tto">
<script>
    const verModalAgregar = (fun,tipo,id)=>{

        $('#agregar-antecedente').show();
        $('#modificar-antecedente').hide();

        var html = '';

        switch(tipo){
            case 1:
                html+=`
                    <table>
                        <tr>
                            <td>Procedimiento</td>
                            <td><input class="form-control" type="text" id="procedimiento"></td>
                        </tr>
                        <tr>
                            <td>Incidente</td>
                            <td><textarea class="form-control" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
            break;

            case 2:
                html+=`
                    <table>
                        <tr>
                            <td>Nombre</td>
                            <td><input class="form-control" type="text" id="nombre"></td>
                        </tr>
                        <tr>
                            <td>Comentario</td>
                            <td><textarea class="form-control" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
            break;

            case 3:
                html+=`
                    <table>
                        <tr>
                            <td>Fecha Cirugía</td>
                            <td><input class="form-control" type="date" id="fecha"></td>
                        </tr>
                        <tr>
                            <td>Procedimiento</td>
                            <td><input class="form-control" type="text" id="procedimiento"></td>
                        </tr>
                        <tr>
                            <td>Incidente</td>
                            <td><textarea class="form-control" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
            break;

            case 4:
                html+=`
                    <table>
                        <tr>
                            <td>Procedimiento</td>
                            <td><input class="form-control" type="text" id="procedimiento"></td>
                        </tr>
                        <tr>
                            <td>Detalle</td>
                            <td><textarea class="form-control" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
            break;


            case 5:

                html+=`
                    <table>
                        <tr>
                            <td>Nombre antecedente</td>
                            <td><input class="form-control form-control-sm" type="text" id="procedimiento"></td>
                        </tr>
                        <tr>
                            <td>Institución</td>
                            <td><textarea class="form-control form-control-sm" id="institucion"></textarea></td>
                        </tr>
                        <tr>
                            <td>Fecha Evento</td>
                            <td><input class="form-control" type="date" id="fecha"></td>
                        </tr>
                    </table>
                `;
            break;

            case 6:
                html+=`
                    <table>
                        <tr>
                            <td>Nombre alergia</td>
                            <td><input class="form-control form-control-sm" type="text" id="nombre"></td>
                        </tr>
                        <tr>
                            <td>Detalle</td>
                            <td><textarea class="form-control form-control-sm" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
            break;

            case 7:
                html+=`
                    <table>
                        <tr>
                            <td>Nombre Medicamento</td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control form-control-sm" type="text" id="nombre_medicamento_cronico">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Dosis</td>
                            <td><textarea class="form-control" id="dosis"></textarea></td>
                        </tr>

                    </table>
                `;
            break;
            case 8:
                html+=`
                    <table>
                        <tr>
                            <td>Tipo de Discapacidad</td>
                            <td>
                                <select class="form-control form-control-sm" name="discapacidad_tipo" id="discapacidad_tipo">
                                    <option value="Auditíva">Auditíva</option>
                                    <option value="Visual">Visual</option>
                                    <option value="Locomotora">Locomotora </option>
                                    <option value="Neurológica">Neurológica</option>
                                    <option value="Fonoarticulatoria">Fonoarticulatoria</option>
                                    <option value="Cognitiva">Cognitiva</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Grado</td>
                            <td>
                                <input class="form-control form-control-sm" type="text" id="discapacidad_grado">
                            </td>
                        </tr>
                        <tr>
                            <td>Permanente</td>
                            <td>
                                <select class="form-control form-control-sm" name="discapacidad_permanente" id="discapacidad_permanente">
                                    <option value="si">SI</option>
                                    <option value="no">NO</option>
                                </select>
                            </td>
                        </tr>

                    </table>
                `;
            break;
        }

        $('#body-modal-inputs').html(html);
        if( tipo == 7)
            activarMedicamentos('nombre_medicamento_cronico');
        $('#tipo-antecedente-m').val(tipo);
        $('#modal-ingreso').modal(fun);

        if(id!=0)
        {
            $('#agregar-antecedente').hide();
            $('#modificar-antecedente').show();
            $('#id-antecedente-m').val(id);
            cargarDatosAntecedente(id);
        }

    }
    function verModalAgregarInsumos(id_tto, objetivo, tto, tipo = null){
        dame_tratamientos_pieza(id_tto);
        limpiar_formulario_insumo();
        console.log(objetivo, tipo);
        $('#insumosModal').modal('show');
        $('#numero_pieza_tto_modal').val(objetivo);
        $('#tto_modal').val(tto);
        $('#id_pieza_tto').val(id_tto);
        $('#tipo_tto').val(tipo);
    }

    function dame_tratamientos_pieza(id){
        let url = '{{ ROUTE("dental.dame_insumos_tratamiento") }}';
        let data = {
            id: id,
            id_paciente: dame_id_paciente(),
            id_ficha_atencion: $('#id_fc').val(),
            _token: CSRF_TOKEN
        }

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                let insumos = resp.insumos;
                console.log(insumos);
                let table = $('#table_insumos_tto').DataTable();

                // Limpiar la tabla sin perder la configuración de DataTables
                table.clear();

                // Recorrer el array de insumos y agregarlos a la tabla
                insumos.forEach(insumo => {
                    table.row.add([
                        insumo.insumos,         // Nombre del insumo
                        insumo.cantidad,       // Cantidad utilizada
                        insumo.valor,         // Unidad de medida
                        insumo.observaciones     // Descripción u observaciones
                    ]);
                });

                // Dibujar la tabla nuevamente con los nuevos datos
                table.draw();
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function agregar_insumos_tto(){
        let insumos = $('#insumos_tto').val();
        let cantidad = $('#insumos_cantidad_tto').val();
        let valor = $('#insumos_valor_tto').val();
        let observaciones = $('#insumos_obs_tto').val();
        let id_tto = $('#id_pieza_tto').val();

        let valido = 1;
        let mensaje = '';

        if(insumos == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar insumos </li>';
        }

        if(cantidad == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar cantidad </li>';
        }

        if(valor == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar valor </li>';
        }

        if(valido == 1){
            let data = {
                insumos: insumos,
                cantidad: cantidad,
                valor: valor,
                id_tto: id_tto,
                id_paciente: dame_id_paciente(),
                id_ficha_atencion: $('#id_fc').val(),
                tipo: $('#tipo_tto').val(),
                _token: CSRF_TOKEN
            }

            console.log(data);

            let url = '{{ ROUTE("dental.agregar_insumos_tto") }}';
            $.ajax({
                url: url,
                type:'post',
                data: data,
                success: function(resp){
                    console.log(resp);
                    if(resp.mensaje == 'ok'){
                        swal({
                            icon:'success',
                            text:'Se a agregado los insumos correctamente',
                            title:'Exito'
                        });
                        limpiar_formulario_insumo();
                        let insumos = resp.insumos;
                        console.log(insumos);
                        let table = $('#table_insumos_tto').DataTable();

                        // Limpiar la tabla sin perder la configuración de DataTables
                        table.clear();

                        // Recorrer el array de insumos y agregarlos a la tabla
                        insumos.forEach(insumo => {
                            table.row.add([
                                insumo.insumos,         // Nombre del insumo
                                insumo.cantidad,       // Cantidad utilizada
                                insumo.valor,         // Unidad de medida
                                insumo.observaciones     // Descripción u observaciones
                            ]);
                        });

                        // Dibujar la tabla nuevamente con los nuevos datos
                        table.draw();
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        }else{
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

    function limpiar_formulario_insumo(){
       $('#insumos_tto').val('');
        $('#insumos_cantidad_tto').val('');
        $('#insumos_valor_tto').val('');
        $('#insumos_obs_tto').val('');
    //    $('#id_pieza_tto').val('');
    }
</script>
