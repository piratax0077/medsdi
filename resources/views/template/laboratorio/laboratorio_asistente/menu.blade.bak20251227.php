<nav class="pcoded-navbar menu-light">
	<div class="navbar-wrapper">
		<div class="navbar-content scroll-div">
			<div class="">
				<div class="main-menu-header">
					@if(isset($institucion) && $institucion[0]->foto_perfil)
					<img class="img-radius img-fluid wid-100" id="profile-image"
                                                        src="{{ $institucion[0]->foto_perfil ? asset('storage/' . $institucion[0]->foto_perfil) : asset('images/iconos/usuario_administrador.svg') }}"
                                                        alt="Imagen Usuario">
					<div class="user-details">
						<div id="more-details">{{ isset($institucion) ? $institucion[0]->nombre : 'Centro Médico' }} <i class="fa fa-caret-down"></i></div>
					</div>
					@elseif(isset($profesional))
					<img class="img-radius img-fluid wid-100" id="profile-image"
                                                        src="{{ $profesional->foto_perfil ? asset('storage/' . $profesional->foto_perfil) : asset('images/iconos/usuario_administrador.svg') }}"
                                                        alt="Imagen Usuario">
					<div class="user-details">
						<div id="more-details">{{ isset($profesional) ? $profesional->nombres : 'Centro Médico' }} <i class="fa fa-caret-down"></i></div>
					</div>
					@else
					<img class="img-radius img-fluid wid-100" id="profile-image"
														src="{{ asset('images/iconos/usuario_administrador.svg') }}"
														alt="Imagen Usuario">
					<div class="user-details">
						<div id="more-details">Centro Médico <i class="fa fa-caret-down"></i></div>
					</div>
					@endif
				</div>
				<div id="nav-user-link">
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="perfil_cm.php" data-toggle="tooltip" title="Mi perfil">
								<i class="feather icon-user"></i>
							</a>
						</li>
						<li class="list-inline-item"><a href="cerrar.php" data-toggle="tooltip" title="Cerrar sesión" class="text-danger"><i class="feather icon-power"></i></a></li>
					</ul>
				</div>
			</div>
			<ul class="nav pcoded-inner-navbar ">
				<li class="nav-item pcoded-menu-caption text-center">
				</li>
				<li class="nav-item pcoded-hasmenu">
					<a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext text-center">Mi Escritorio</span></a>
					<ul class="pcoded-submenu">
						@if(isset($profesional) && !isset($institucion))
						<li>
							<a href="{{ route('laboratorio.lab_profesional.escritorio_profesional_laboratorio') }}">Mi Escritorio</a>
						</li>
						@elseif(isset($institucion) && !isset($profesional) && $institucion->id_tipo_institucion == 3)
						<li>
							<a href="{{ route('laboratorio.adm_general.home') }}">Mi Escritorio</a>
						</li>
						@elseif(isset($profesional) && isset($institucion_agenda))
						<li>
							<a href="{{ route('laboratorio.lab_profesional.escritorio_profesional_laboratorio') }}">Mi Escritorio</a>
						</li>
						@else
						<li>
							<a href="{{ route('laboratorio.adm_general.home') }}">Mi Escritorio</a>
						</li>
						@endif
						
						
						<!-- <li>
							<a href="sucursales_cm.php">Sucursales Centro Médico</a>
						</li>
						<li>
							<a href="laboratorio_cm.php">Laboratorio Centro Médico</a>
						</li>
						<li>
							<a href="profesionales_cm.php">Personal</a>
						</li>
						<li>
							<a href="asistentes_cm.php">Asistentes</a>
						</li>
						<li>
							<a href="suscripcion_finanzas.php">Finanzas</a>
						</li>
						<li>
							<a href="asistentes_inventarios.php">Inventarios</a>
						</li>
						<li>
							<a href="suscripcion_estadisticas_cm.php">Estadísticas</a>
						</li>
						<li>
							<a href="suscripcion_soporte.php">Soporte</a>
						</li>
						<li>
							<a href="perfil_cm.php">Perfil Centro Médico</a>
						</li>
						<li>
							<a href="perfil_admin.php">Mi Perfil</a>
						</li>
						<li>
							<a href="suscripcion_pago_cm.php">Suscripciones y pagos</a>
						</li> -->
					</ul>
				</li>
				<li class="nav-item pcoded-hasmenu">
                        <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i  class="feather icon-settings"></i></span><span class="pcoded-mtext text-center">Configuraciones</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{ route('profesional.mi_perfil') }}">Editar Perfil</a></li>
                            <!--<li><a href="suscripcion.php">Pagos y Suscripción</a></li>-->
                        </ul>
                    </li>
			</ul>
		</div>
	</div>
</nav>