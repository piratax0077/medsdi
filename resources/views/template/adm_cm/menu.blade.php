<nav class="pcoded-navbar menu-light navbar-collapsed">
	<div class="navbar-wrapper">
		<div class="navbar-content scroll-div">
			<div class="">
				<div class="main-menu-header">
					<img class="img-radius img-fluid wid-100" id="profile-image_menu"
                                                        src="{{ isset($institucion) && is_object($institucion) && $institucion->foto_perfil ? asset('storage/' . $institucion->foto_perfil) : asset('images/iconos/cm-perfiles.png') }}"
                                                        alt="User image">
					<div class="user-details">
						<div id="more-details">{{ isset($institucion) && is_object($institucion) ? $institucion->nombre : '' }} <i class="fa fa-caret-down"></i></div>
					</div>
				</div>
				<div id="nav-user-link">
					<ul class="list-inline">
						<li class="list-inline-item">
							@if( isset($institucion) && is_object($institucion) && $institucion->id_tipo_institucion==3)
								<a href="{{ ROUTE('laboratorio.configuracion') }}" data-toggle="tooltip" title="Mi Perfil Centro Médico">
									<i class="feather icon-user"></i>
								</a>
							@else
								<a href="{{ ROUTE('adm_cm.configuracion') }}" data-toggle="tooltip" title="Mi Perfil Centro Médico">
									<i class="feather icon-user"></i>
								</a>
							@endif
						</li>
						<li class="list-inline-item"><a href="{{ ROUTE('logout') }}" data-toggle="tooltip" title="Cerrar sesión" class="text-danger"><i class="feather icon-power"></i></a></li>
					</ul>
				</div>
			</div>
			<ul class="nav pcoded-inner-navbar ">
				<li class="nav-item pcoded-menu-caption text-center">
				</li>
				<li class="nav-item pcoded-hasmenu">
					<a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext text-center">Mi Escritorio</span></a>
					<ul class="pcoded-submenu">
						@if(isset($institucion))
							{{-- Solo institucion --}}
							<li>
								<a href="{{ url('/') }}"><i class="feather icon-briefcase mr-2"></i>Mi Escritorio</a>
							</li>
						@else
							{{-- Centro Médico --}}
							<li>
								<a href="{{ url('/') }}">Mi Escritorio</a>
							</li>
							<li>
								<a href="{{ ROUTE('adm_cm.adm_medico') }}">Administrador Médico</a>
							</li><!--
							<li>
								<a href="admin_cm.php">Administradores</a>
							</li>
							<li>
								<a href="sucursales_cm.php">Sucursales Centro Médico</a>
							</li>-->
							<li>
								<a href="{{ ROUTE('app.adm_cm.liquidacion_profesionales') }}">Liquidación Profesionales</a>
							</li>
							<li>
								<a href="{{ ROUTE('adm_cm.profesionales') }}">Profesionales</a>
							</li>
							<li>
								<a href="{{ ROUTE('adm_cm.personal') }}">Personal</a>
							</li>
							<li>
								<a href="{{ ROUTE('adm_cm.pacientes') }}">Pacientes</a>
							</li>
							<li>
								<a href="{{ ROUTE('adm_cm.administracion_cm') }}">Admininistración Comercial</a>
							</li>
							<li>
								<a href="{{ ROUTE('adm_cm.laboratorio') }}">Laboratorio</a>
							</li><!--
							<li>
								<a href="suscripcion_estadisticas_cm.php">Estadísticas</a>
							</li>
							<li>
								<a href="suscripcion_soporte.php">Soporte</a>
							</li>
							<li>
								<a href="{{ ROUTE('adm_cm.configuracion') }}">Perfil Centro Médico</a>
							</li>-->

							<li>
								<a href="{{ ROUTE('adm_cm.pagos') }}">Suscripciones y pagos</a>
							</li>
						@endif

					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
