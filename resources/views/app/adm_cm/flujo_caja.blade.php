@extends('template.adm_cm.template')

@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Recepción Cierre Caja</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('adm_cm.area_comercial') }}" data-toggle="tooltip" data-placement="top" title="Volver a escritorio Comercial">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Flujo de Caja</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="tab-content" id="pills-tabContent">
                                        {{-- PESTAÑA RENDICION DE CAJA --}}
                                        <div class="tab-pane fade show active " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5 class="text-c-blue d-inline float-left f-18 pt-1">Recepción Cierre Caja {{ date('d-m-Y') }}</h5>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                {{-- <input type="hidden" name="lista_bonos" id="lista_bonos" value="{{ $lista_bonos }}"> --}}
                                                <div class="col-sm-6 col-md-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Número de Bonos</label>
                                                        {{-- <input type="number" class="form-control form-control-sm" id="numero_bonos" name="numero_bonos" value="{{ $total_bonos }}" readonly="readonly"> --}}
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Efectivo</label>
                                                        {{-- <input type="number" class="form-control form-control-sm" id="efectivo" name="efectivo" value="{{ $total_efectivo }}" readonly="readonly"> --}}
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Otros</label>
                                                        {{-- <input type="number" class="form-control form-control-sm" id="otros" name="otros" value="{{ $total_otros }}" readonly="readonly"> --}}
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Total Documentos</label>
                                                        {{-- <input type="number" class="form-control form-control-sm" id="total" name="total" value="{{ $total }}" readonly="readonly"> --}}
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Recibe Caja :</label>
                                                        {{-- <select name="id_asistente_receptor" id="id_asistente_receptor" class="form-control form-control-sm">
                                                            @if($listado_recibe)
                                                                @foreach ( $listado_recibe as $recibe )
                                                                    <option value="{{ $recibe->id }}">{{ strtoupper($recibe->nombres.' '.$recibe->apellido_uno.' '.$recibe->apellido_dos) }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select> --}}
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 text-center">
                                                    <button class="btn btn-block btn-sm btn-info" onclick="rendir_caja();" id="btn_rendicion_caja_diaria">Rendir Caja</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <table id="tabla_rendir_caja" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle">Tipo</th>
                                                            <th class="text-center align-middle">Bonos</th>
                                                            <th class="text-center align-middle">Asistente</th>
                                                            <th class="text-center align-middle">F.Rendición</th>
                                                            <th class="text-center align-middle">T.Doc</th>
                                                            <th class="text-center align-middle">T.Bono</th>
                                                            <th class="text-center align-middle">T.Efectivo</th>
                                                            <th class="text-center align-middle">T.Otro</th>
                                                            <th class="text-center align-middle">Asis.Receptor</th>
                                                            <th class="text-center align-middle">F.Recpción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if( isset($rendiciones_asistente) )
                                                            @foreach($rendiciones_asistente as $rendi_asis)
                                                                <tr >
                                                                    <td class="align-middle text-center">{{ $rendi_asis->TipoRendicion->nombre }}</td>
                                                                    <td class="align-middle text-center">{{ $rendi_asis->bonos }}</td>
                                                                    <td class="align-middle text-center">{{ mb_strtoupper($rendi_asis->Asistente->nombres.' '.$rendi_asis->Asistente->apellido_uno.' '.$rendi_asis->Asistente->apellido_dos) }}</td>
                                                                    <td class="align-middle text-center">{{ date('d-m-Y H:i', strtotime($rendi_asis->fecha_rendicion)) }}</td>
                                                                    <td class="align-middle text-center">{{ $rendi_asis->total_documentos }}</td>
                                                                    <td class="align-middle text-center">{{ $rendi_asis->total_bono }}</td>
                                                                    <td class="align-middle text-center">{{ $rendi_asis->total_efectivo }}</td>
                                                                    <td class="align-middle text-center">{{ $rendi_asis->total_otros }}</td>
                                                                    <td class="align-middle text-center">{{ mb_strtoupper($rendi_asis->AsistenteReceptor->nombres.' '.$rendi_asis->AsistenteReceptor->apellido_uno.' '.$rendi_asis->AsistenteReceptor->apellido_dos) }}</td>
                                                                    <td class="align-middle text-center">{{ (isset($rendi_asis->fecha_receptor))?date('d-m-Y H:i', strtotime($rendi_asis->fecha_receptor)):'' }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>

                                                </table>
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
<!--Cierre: Container Completo-->
@endsection

@section('page-script')
    <script>


    </script>

@endsection

