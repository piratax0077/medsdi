<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConvenioInstitucion;
use App\Models\TipoConvenio;
use App\Models\TipoConvenioInstitucion;
use App\Models\TipoProducto;
use App\Models\Responsable;
use App\Models\TipoPago;
use App\Models\Convenio;

class ConveniosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipos_convenio = TipoConvenio::all();
        $tipos_producto = TipoProducto::all();
        $responsables = Responsable::all();
        $tipos_pago = TipoPago::all();
        $convenios = Convenio::all();
        $tipos_convenio_institucion = TipoConvenioInstitucion::all();
        return view ('app.adm_cm.comercial.convenios',[
            'tipos_convenio' => $tipos_convenio,
            'tipos_producto' => $tipos_producto,
            'responsables' => $responsables,
            'tipos_pago' => $tipos_pago,
            'convenios' => $convenios,
            'tipos_convenio_institucion' => $tipos_convenio_institucion
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dameInfoConvenio($id){
        $tipo_convenio = TipoConvenio::find($id);
        return $tipo_convenio;
    }

    public function guardarTipoConvenio(Request $req){
        $tipo_convenio = new TipoConvenio();
        $tipo_convenio->nombre = $req->nombre;
        $tipo_convenio->descripcion = $req->descripcion;
        $tipo_convenio->save();
        return 'OK';
    }

    public function dameTiposConvenio(){
        $tipos_convenio = TipoConvenio::all();
        return $tipos_convenio;
    }

    public function guardarNuevoConvenio(Request $req){
        try {
            $nuevo_convenio = new ConvenioInstitucion();
            $nuevo_convenio->nombre_representante_convenio = $req->nombre_representante_convenio;
            $nuevo_convenio->id_tipo_convenio = $req->id_tipo_convenio;
            return $nuevo_convenio;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }
}
