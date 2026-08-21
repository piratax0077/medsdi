<nav class="pcoded-navbar menu-light navbar-collapsed">
	<div class="navbar-wrapper">
		<div class="navbar-content scroll-div">
			<div class="">
				<div class="main-menu-header">
					<img class="img-radius img-fluid wid-100" id="profile-image"
                                                        src="{{ !empty($paciente?->foto_perfil) ? asset('storage/' . $paciente->foto_perfil) : asset('images/iconos/usuario.svg') }}"
                                                        alt="User image">
					<div class="user-details">
						<div id="more-details"><h6 class="text-uppercase f-13 font-weight-bold">{{ @Auth::user()->name }}</h6></div>
					</div>
				</div>
				<div id="nav-user-link">
					<ul class="list-inline">
						@if(\Illuminate\Support\Facades\Route::has('paciente.perfil'))
						<li class="list-inline-item">
							<a href="{{ route('paciente.perfil') }}" data-toggle="tooltip" title="Mi perfil">
								<i class="feather icon-user"></i>
							</a>
						</li>
						@endif
						<li class="list-inline-item">
							<form id="close" action="{{ ROUTE('logout') }}" method="POST">
								@csrf
								<a  href="javascript:{}" onclick="document.getElementById('close').submit();" data-toggle="tooltip" title="Cerrar sesión" class="text-danger" >
									<i class="feather icon-power"></i>
								</a>
							</form>
						</li>
					</ul>
				</div>
			</div>
			<ul class="nav pcoded-inner-navbar ">
				<li class="nav-item pcoded-menu-caption text-center">
				</li>
				<li class="nav-item pcoded-hasmenu">
					<a href="javascript:void(0)" class="nav-link">
						<span class="pcoded-micon">
							<i class="feather icon-home"></i>
						</span>
						<span class="pcoded-mtext text-center">Mi Escritorio</span>
					</a>
					<ul class="pcoded-submenu">
						<li><a href="{{ route('paciente.home') }}">Mi Escritorio Paciente</a></li>

						@if(\Illuminate\Support\Facades\Route::has('paciente.agendar_hora'))
							<li><a href="{{ route('paciente.agendar_hora') }}">Reservar Hora Médica</a></li>
						@endif

						@if(\Illuminate\Support\Facades\Route::has('paciente.mis_profesionales'))
							<li><a href="{{ route('paciente.mis_profesionales') }}">Mis Médicos</a></li>
						@endif

						@if(\Illuminate\Support\Facades\Route::has('check_sdi'))
							<li><a href="{{ route('check_sdi') }}?urla=Inicio&urln=Mi_Ficha_Medica">Mi Ficha Médica Única</a></li>
						@endif

						@if(\Illuminate\Support\Facades\Route::has('paciente.receta'))
							<li><a href="{{ route('paciente.receta') }}">Receta Online</a></li>
						@endif

						@if(\Illuminate\Support\Facades\Route::has('paciente.receta.examen'))
							<li><a href="{{ route('paciente.receta.examen') }}">Mis Exámenes</a></li>
						@endif

						@if(
							\Illuminate\Support\Facades\Route::has('paciente.dependientes.infante.definitiva')
							|| \Illuminate\Support\Facades\Route::has('paciente.dependientes.adulto.definitiva')
						)
							<li>
								<a href="javascript:void(0)" class="nav-link"><span class="pcoded-mtext text-center">Dependencia Definitiva</span></a>
								<ul class="pcoded-submenu">
									@if(\Illuminate\Support\Facades\Route::has('paciente.dependientes.infante.definitiva'))
										<li><a href="{{ route('paciente.dependientes.infante.definitiva', ['tipo_dependencia' => '1,5']) }}">Infantes</a></li>
									@endif
									@if(\Illuminate\Support\Facades\Route::has('paciente.dependientes.adulto.definitiva'))
										<li><a href="{{ route('paciente.dependientes.adulto.definitiva', ['tipo_dependencia' => 3]) }}">Adultos</a></li>
									@endif
								</ul>
							</li>
						@endif

						@if(
							\Illuminate\Support\Facades\Route::has('paciente.dependientes.infante.temporal')
							|| \Illuminate\Support\Facades\Route::has('paciente.dependientes.adulto.temporal')
						)
							<li>
								<a href="javascript:void(0)" class="nav-link"><span class="pcoded-mtext text-center">Dependencia Temporal</span></a>
								<ul class="pcoded-submenu">
									@if(\Illuminate\Support\Facades\Route::has('paciente.dependientes.infante.temporal'))
										<li><a href="{{ route('paciente.dependientes.infante.temporal', ['tipo_dependencia' => 2]) }}">Infante</a></li>
									@endif
									@if(\Illuminate\Support\Facades\Route::has('paciente.dependientes.adulto.temporal'))
										<li><a href="{{ route('paciente.dependientes.adulto.temporal', ['tipo_dependencia' => 4]) }}">Adultos</a></li>
									@endif
								</ul>
							</li>
						@endif

						@if(\Illuminate\Support\Facades\Route::has('paciente.mis_controles'))
							<li><a href="{{ route('paciente.mis_controles') }}">Mis Controles</a></li>
						@endif
					</ul>
				</li>
				<li class="nav-item pcoded-hasmenu">
					<a href="javascript:void(0)" class="nav-link">
						<span class="pcoded-micon">
							<i class="feather icon-settings"></i>
						</span>
						<span class="pcoded-mtext text-center">Configuraciones</span></a>
					<ul class="pcoded-submenu">
						@if(\Illuminate\Support\Facades\Route::has('paciente.perfil'))
							<li><a href="{{ route('paciente.perfil') }}"><i class="feather icon-user mr-2"></i>Editar Perfil</a></li>
						@endif

						@if(\Illuminate\Support\Facades\Route::has('paciente.facturacion'))
							<li><a href="{{ route('paciente.facturacion') }}"><i class="feather icon-file-text mr-2"></i>Suscripciones y Facturación</a></li>
						@endif
					</ul>
				</li>

			</ul>
		</div>
	</div>
</nav>
