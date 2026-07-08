<div class="table-responsive w-100">
    <table class="table table-hover align-middle mb-0" id="tabla_administradores_cm" style="width: 100%;">
        <thead class="bg-light">
            <tr>
                <th class="border-0 pl-4">Administrador</th>
                <th class="border-0">Cargo</th>
                <th class="border-0">Contacto</th>
                <th class="border-0">Dirección</th>
                <th class="border-0 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($administradores_cm) && $administradores_cm->count() > 0)
                @foreach ($administradores_cm as $adm_inst)
                    @php
                        $prof = $adm_inst->profesional ?? null;
                        $tipo_nombre = $adm_inst->tipo->nombres ?? 'Administrador';
                        $tipo_id = $adm_inst->id_tipo_administrador;
                        $cls = 'info_adm_' . $tipo_id;
                        $dir = $prof ? $prof->Direccion()->first() : null;
                        $ciudad_dir = $dir ? $dir->Ciudad()->first() : null;
                        $region_dir = $ciudad_dir ? $ciudad_dir->Region()->first() : null;
                    @endphp
                    <tr>
                        <td class="pl-4">
                            @if ($prof)
                                {{ $prof->nombre . ' ' . $prof->apellido_uno . ' ' . $prof->apellido_dos }}
                            @else
                                <span class="text-muted">Sin profesional asociado</span>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $tipo_nombre }}</strong>
                        </td>
                        <td>
                            @if ($prof)
                                {{ $prof->email }}<br>
                                {{ $prof->telefono_uno }}
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            @if ($prof && $dir)
                                {{ $dir->direccion }} {{ $dir->numero_dir }}<br>
                                {{ $ciudad_dir ? $ciudad_dir->nombre : '-' }}, {{ $region_dir ? $region_dir->nombre : '-' }}
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group">
                                @if ($prof)
                                    <button type="button" class="btn btn-warning btn-icon" data-toggle="collapse"
                                        data-target=".{{ $cls }}" aria-expanded="false" title="Editar">
                                        <i class="feather icon-edit"></i>
                                    </button>
                                @endif
                                <button type="button" class="btn btn-danger btn-icon"
                                    onclick="eliminar_admin_cm({{ $tipo_id }}, {{ $institucion->id }})" title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @if ($prof)
                        <tr>
                            <td colspan="5" class="p-0 border-0">
                                <div class="collapse {{ $cls }}">
                                    <div class="p-3 border-top bg-white">
                                        <form>
                                            <input type="hidden" id="id_prof_adm_{{ $tipo_id }}" value="{{ $prof->id }}">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-12 mb-3">
                                                            <p class="font-weight-bolder">DATOS PERSONALES</p>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6">
                                                            <label class="floating-label-activo-sm">Rut</label>
                                                            <input type="text" class="form-control form-control-sm" id="perfil_rut_adm_{{ $tipo_id }}" value="{{ $prof->rut }}" disabled>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6">
                                                            <label class="floating-label-activo-sm">Nombre</label>
                                                            <input type="text" class="form-control form-control-sm" id="perfil_nombre_adm_{{ $tipo_id }}" value="{{ $prof->nombre }}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6">
                                                            <label class="floating-label-activo-sm">Primer Apellido</label>
                                                            <input type="text" class="form-control form-control-sm" id="perfil_apellido_uno_adm_{{ $tipo_id }}" value="{{ $prof->apellido_uno }}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6">
                                                            <label class="floating-label-activo-sm">Segundo Apellido</label>
                                                            <input type="text" class="form-control form-control-sm" id="perfil_apellido_dos_adm_{{ $tipo_id }}" value="{{ $prof->apellido_dos }}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-12">
                                                            <label class="floating-label-activo-sm">Sexo</label>
                                                            <div class="form-check form-check-inline mt-2">
                                                                <input class="form-check-input" type="radio" name="perfil_sexo_adm_{{ $tipo_id }}" value="F" @if($prof->sexo=='F') checked @endif>
                                                                <label class="form-check-label">Mujer</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="perfil_sexo_adm_{{ $tipo_id }}" value="M" @if($prof->sexo=='M') checked @endif>
                                                                <label class="form-check-label">Hombre</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6">
                                                            <label class="floating-label-activo-sm">Nacimiento</label>
                                                            <input type="date" class="form-control form-control-sm" id="perfil_nac_adm_{{ $tipo_id }}" value="{{ $prof->fecha_nac }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mt-4">
                                                        <div class="form-group col-sm-12 col-md-12 mb-3">
                                                            <p class="font-weight-bolder">CONTACTO</p>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6">
                                                            <label class="floating-label-activo-sm">Correo electrónico</label>
                                                            <input type="text" class="form-control form-control-sm" id="perfil_email_adm_{{ $tipo_id }}" value="{{ $prof->email }}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6">
                                                            <label class="floating-label-activo-sm">Celular</label>
                                                            <input type="text" class="form-control form-control-sm" id="perfil_fono_adm_{{ $tipo_id }}" value="{{ $prof->telefono_uno }}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6">
                                                            <label class="floating-label-activo-sm">Teléfono</label>
                                                            <input type="text" class="form-control form-control-sm" id="perfil_fono_dos_adm_{{ $tipo_id }}" value="{{ $prof->telefono_dos }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-12 mb-3">
                                                            <p class="font-weight-bolder">RESIDENCIA</p>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-12">
                                                            <label class="floating-label-activo-sm">Región</label>
                                                            <select class="form-control form-control-sm" id="perfil_region_adm_{{ $tipo_id }}" onchange="buscar_ciudad_adm_{{ $tipo_id }}()">
                                                                <option value="">Seleccione una Región</option>
                                                                @if (isset($regiones))
                                                                    @foreach ($regiones as $region)
                                                                        <option value="{{ $region->id }}" @if($region_dir && $region->id == $region_dir->id) selected @endif>
                                                                            {{ $region->nombre }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-12">
                                                            <label class="floating-label-activo-sm">Comuna</label>
                                                            <select class="form-control form-control-sm" id="perfil_ciudad_adm_{{ $tipo_id }}">
                                                                <option value="">Seleccione su comuna</option>
                                                                @if (isset($ciudades))
                                                                    @foreach ($ciudades as $ciudad)
                                                                        <option value="{{ $ciudad->id }}" @if($dir && $dir->id_ciudad == $ciudad->id) selected @endif>
                                                                            {{ $ciudad->nombre }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-9">
                                                            <label class="floating-label-activo-sm">Dirección</label>
                                                            <input type="text" class="form-control form-control-sm" id="perfil_dire_adm_{{ $tipo_id }}" value="{{ $dir ? $dir->direccion : '' }}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-3">
                                                            <label class="floating-label-activo-sm">N°</label>
                                                            <input type="text" class="form-control form-control-sm" id="perfil_numero_dir_adm_{{ $tipo_id }}" value="{{ $dir ? $dir->numero_dir : '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3 mb-0">
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="button" class="btn btn-danger btn-sm mr-2" data-toggle="collapse" data-target=".{{ $cls }}">
                                                        <i class="feather icon-x"></i> Cancelar
                                                    </button>
                                                    <button type="button" onclick="guardar_perfil_admin_cm({{ $tipo_id }});" class="btn btn-info btn-sm">
                                                        <i class="feather icon-save"></i> Guardar cambios
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-muted py-3">No hay administradores asignados a esta institución.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
