<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compras;
use App\Models\Responsable;
use App\Models\Bodega;
use App\Models\Producto;
use App\Models\ProductoBodega;
use App\Models\Proveedor;
use App\Models\Compras_detalle;
use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\DB;

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
        try {
            $responsables = Responsable::all();
            $bodegas = Bodega::where('id_institucion',1)->get(); // reemplazar el 1 por el id de la institucion del usuario logueado
            $pc = new ProductosController();
            $existencia = $pc->buscarProductosTipo(0);
            //return $existencia;
            return view('bodegas',['responsables'=>$responsables,'bodegas'=>$bodegas,'existencia'=>$existencia['productos']]);
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

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
                'id_lugar_atencion' => 19,
                'alias' => $request->alias,
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
            return redirect()->route('bodegas.index')->with('error','Error al crear la bodega '.$e->getMessage());
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

                $productos = Producto::select('productos.codigo_interno','productos.id', DB::raw('MAX(productos.nombre) as nombre_producto'), DB::raw('MAX(tipo_producto.nombre) as tipo_producto'), DB::raw('MAX(unidades_medidas.nombre) as unidad_medida'), DB::raw('MAX(marcas_productos.nombre) as marca'), DB::raw('SUM(compras_detalle.cantidad) as cantidad'),DB::raw('MAX(compras_detalle.precio_compra) as precio_unitario'), DB::raw('MAX(proveedores.nombre) as proveedor'),DB::raw('SUM(producto_bodega.stock) as stock_actual'))
                ->join('tipo_producto', 'productos.id_tipo_producto', 'tipo_producto.id')
                ->join('unidades_medidas', 'productos.id_unidad_medida', 'unidades_medidas.id')
                ->leftjoin('marcas_productos', 'productos.id_marca', 'marcas_productos.id')
                ->join('producto_bodega', 'productos.id', 'producto_bodega.id_producto')
                ->join('compras_detalle', 'productos.id', 'compras_detalle.id_producto')
                ->join('compras', 'compras_detalle.id_compra', 'compras.id')
                ->join('proveedores', 'compras.id_proveedor', 'proveedores.id')
                ->where('compras.id_institucion', 1) // debe cambiar por la institucion del usuario logueado
                ->where('producto_bodega.id_bodega',$request->bodega)
                ->groupBy('productos.codigo_interno','productos.id')
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

	public function dameBodegas($idinstitucion){
        try {
            $bodegas = Bodega::where('id_institucion',$idinstitucion)->get();
            return $bodegas;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function verProductoAlmacenado(Request $req){
        try {
            $producto = Producto::select('productos.codigo_interno','productos.id','productos.stock_actual','productos.nombre','productos.descripcion','unidades_medidas.nombre as unidad_medida','compras_detalle.fecha_compra','marcas_productos.nombre as marca','compras_detalle.id as id_compra')
                        ->join('unidades_medidas','productos.id_unidad_medida','unidades_medidas.id')
                        ->join('tipo_producto','productos.id_tipo_producto','tipo_producto.id')
                        ->join('bodega','productos.id_bodega','bodega.id')
                        ->join('compras_detalle','productos.id','compras_detalle.id_producto')
                        ->join('marcas_productos','productos.id_marca','marcas_productos.id')
                        ->where('productos.id',$req->id)
                        ->first();

            $compra = Compras::find($producto->id_compra);
            $proveedor = Proveedor::find($compra->id_proveedor);
            $producto->proveedor = $proveedor->nombre;
            $v = view('fragm.ver_producto_almacenado',['producto'=>$producto])->render();
            return $v;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

}
