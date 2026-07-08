<!-- BASE -->
@extends('layouts.base')

@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2">
                        <div class="col-md-12">
                            <div class="page-header-title">
                            </div>
                            <ul class="breadcrumb float-right">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio" style="font-size: 14px!important;"><i class="feather icon-home"></i> Volver a mi escritorio</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @include('general.secciones_ficha.fmu')
    </div>
@endsection
