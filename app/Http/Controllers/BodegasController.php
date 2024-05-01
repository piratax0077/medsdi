<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responsable;
use App\Models\Bodega;
use App\Models\Producto;
use App\Models\ProductoBodega;
use App\Http\Controllers\ProductosController;

class BodegasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $responsables = Responsable::all();
        $bodegas = Bodega::all();
        $pc = new ProductosController();
        $existencia = $pc->buscarProductosTipo(0);
        return view('bodegas',['responsables'=>$responsables,'bodegas'=>$bodegas,'existencia'=>$existencia['productos']]);
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
        try {
            //code...
            Bodega::create([
                'id_institucion' => 1,
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'id_responsable' => $request->responsable
            ]);
    
            return redirect()->route('bodegas.index')->with('success','Bodega creada exitosamente');
        } catch (\Exception $e) {
            //throw $th;
            return redirect()->route('bodegas.index')->with('error','Error al crear la bodega');
        }
        
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

    public function buscarProductosBodega(Request $request){
        try {
            if($request->bodega == 0){
                $pc = new ProductosController();
                $productos_ = $pc->buscarProductosTipo(0);
                $productos = $productos_['productos'];
                
                return [$productos,0];
            }else{
                $productos = ProductoBodega::select('producto_bodega.id','productos.nombre as nombre_producto','productos.codigo_interno','responsables.nombre as responsable','marcas_productos.nombre as marca','producto_bodega.stock as stock_actual')
                ->join('productos', 'producto_bodega.id_producto', 'productos.id')
                ->join('responsables', 'producto_bodega.id_responsable', 'responsables.id')
                ->join('marcas_productos', 'productos.id_marca', 'marcas_productos.id')
                ->where('id_bodega',$request->bodega)
                ->get();

                $bodega = Bodega::select('bodega.*','responsables.nombre as responsable')
                ->join('responsables', 'bodega.id_responsable', 'responsables.id')
                ->where('bodega.id',$request->bodega)
                ->first();

                return [$productos,1,$bodega];
            }

            
            
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
        
    }

    public function guardarAsignacion(Request $req){
        try {
            $asignacion = new ProductoBodega();
            $asignacion->id_bodega = $req->bodega;
            $asignacion->id_producto = $req->producto;
            $asignacion->id_responsable = $req->responsable;
            // validamos que la cantidad solicitada no sea mayor al stock actual del producto
            $producto = Producto::where('id',$req->producto)->first();
            if($producto->stock_actual < $req->cantidad){
                return 'La cantidad solicitada es mayor al stock actual del producto';
            }
            $asignacion->stock = $req->cantidad;
            $asignacion->save();

            // actualizamos el stock actual del producto
            $producto->stock_actual -= $req->cantidad;
            $producto->save();
            return 'OK';
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }
    
}
