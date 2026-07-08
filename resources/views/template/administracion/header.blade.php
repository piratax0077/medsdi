<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
	<div class="m-header">
			<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
			<a href="#!" class="b-brand">
				<img src="{{ asset('images/logo_pais.png') }}" alt="" class="logo" height="45px">
			</a>
			<a href="#!" class="mob-toggler">
				<i class="feather icon-more-vertical"></i>
			</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="navbar-nav ml-auto">
                <li>
                    <a href="{{ route('profesional.mensaje') }}" class="nav-link" title="Solicitudes de Soporte" data-placement="button">
                        <i class="feather icon-life-buoy" style="font-size: 1.2rem!important;"></i>
                        @if(isset($solicitudes_pendientes) && count($solicitudes_pendientes) > 0)
                            <span class="badge badge-warning badge-pill">{{ count($solicitudes_pendientes) }}</span>
                        @endif
                    </a>
			    </li>
			<li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user "></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <span>{{  @Auth::user()->name  }}</span>
                        </div>
                        {{--  <ul></ul>  --}}
                        <ul class="pro-body">
                            <li>
                                <form action="{{ ROUTE('logout') }}" method="post" id="closeSession">
                                    @csrf
                                    <a data-toggle="tooltip" title="Cerrar sesión" class="text-danger" href="javascript:{}" onclick="document.getElementById('closeSession').submit();">
                                        <i class="feather icon-power"></i> Cerrar sesión
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
		</ul>
	</div>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/7066bc9f2e.js" crossorigin="anonymous"></script>
</header>
