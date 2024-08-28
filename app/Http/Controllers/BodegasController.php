<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compras;
use App\Models\Responsable;
use App\Models\Bodega;
use App\Models\Pedido;
use App\Models\PedidoDetalle;
use App\Models\Producto;
use App\Models\ProductoBodega;
use App\Models\Proveedor;
use App\Models\Compras_detalle;
use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\DB;
//Carbon
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use App\Models\Instituciones;
use App\Models\Servicios;
use App\Models\AdminInstServ;
use App\Models\ContratoDependiente;
use Illuminate\Support\Facades\Auth;

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
            $producto = Producto::select('productos.*','unidades_medidas.nombre as unidad_medida','compras_detalle.fecha_compra','marcas_productos.nombre as marca','compras_detalle.id as id_compra','tipo_producto.nombre as tipo_producto','bodega.nombre as bodega')
                        ->join('unidades_medidas','productos.id_unidad_medida','unidades_medidas.id')
                        ->join('tipo_producto','productos.id_tipo_producto','tipo_producto.id')
                        ->join('bodega','productos.id_bodega','bodega.id')
                        ->join('compras_detalle','productos.id','compras_detalle.id_producto')
                        ->join('marcas_productos','productos.id_marca','marcas_productos.id')
                        ->where('productos.id',$req->id)
                        ->first();

            $producto->image_path = asset($producto->image_path);

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

    public function historial_almacen(){
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;

        /** INFORMACION DE INSTITUCION Y RESPONSABLE */
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {

                            $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                    ->where('id_empleado', $responsable->id)
                                    ->whereIn('estado', [2,3])
                                    ->first();

                            if($result_contrato)
                            {
                                $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                if($registro)
                                {
                                    /** INSTITUCION */
                                    $institucion = $registro;
                                    $tipo_institucion = 'institucion';
                                }
                                else
                                {
                                    $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** SERVICIOS */
                                        $institucion = $registro;
                                        $tipo_institucion = 'servicio';
                                    }
                                    else
                                    {
                                        return back()->with('error','Institución no encontrada');
                                    }
                                }
                            }
                            else
                            {
                                return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                            }
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }

            }
        }

        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */
        $productos_solicitados = PedidoDetalle::select('pedido_detalle.*','productos.nombre as producto','productos.codigo_interno','productos.image_path','tipo_producto.nombre as tipo_producto','unidades_medidas.nombre as unidad_medida','marcas_productos.nombre as marca','pedido.estado','pedido.observacion as observaciones')
        ->join('pedido','pedido_detalle.id_pedido','pedido.id')
        ->join('productos','pedido_detalle.id_producto','productos.id')
        ->join('tipo_producto','productos.id_tipo_producto','tipo_producto.id')
        ->join('unidades_medidas','productos.id_unidad_medida','unidades_medidas.id')
        ->join('marcas_productos','productos.id_marca','marcas_productos.id')
        ->where('pedido.id_institucion',$institucion->id) // cambiar por la institucion del usuario logueado
        ->get();

        $productos_ingresados = Compras_detalle::select('compras_detalle.*','productos.nombre as producto','productos.codigo_interno','productos.image_path','tipo_producto.nombre as tipo_producto','unidades_medidas.nombre as unidad_medida','marcas_productos.nombre as marca','compras.estado','compras.observaciones')
        ->join('compras','compras_detalle.id_compra','compras.id')
        ->join('productos','compras_detalle.id_producto','productos.id')
        ->join('tipo_producto','productos.id_tipo_producto','tipo_producto.id')
        ->join('unidades_medidas','productos.id_unidad_medida','unidades_medidas.id')
        ->join('marcas_productos','productos.id_marca','marcas_productos.id')
        ->where('compras.id_institucion',$institucion->id) // cambiar por la institucion del usuario logueado
        ->get();

        foreach($productos_solicitados as $producto)
        {
            if($producto->image_path !== null)
            {
                $producto->image_path = asset($producto->image_path);
            }else{
                $producto->image_path = asset('img/default.png');
            }
        }

        foreach($productos_ingresados as $producto)
        {
            if($producto->image_path !== null)
            {
                $producto->image_path = asset($producto->image_path);
            }else{
                $producto->image_path = asset('img/default.png');
            }
        }

        return view('app.bodega.historial',[
            'pedidos' => $productos_solicitados,
            'ingresos' => $productos_ingresados,
        ]);
    }

    public function reportes(){
        return view('app.bodega.reportes');
    }

    public function reporteDiario(Request $req){

        $productos_solicitados = PedidoDetalle::select('pedido_detalle.*','productos.nombre as producto','productos.codigo_interno','productos.image_path','tipo_producto.nombre as tipo_producto','unidades_medidas.nombre as unidad_medida','marcas_productos.nombre as marca','pedido.estado','pedido.observacion as observaciones')
        ->join('pedido','pedido_detalle.id_pedido','pedido.id')
        ->join('productos','pedido_detalle.id_producto','productos.id')
        ->join('tipo_producto','productos.id_tipo_producto','tipo_producto.id')
        ->join('unidades_medidas','productos.id_unidad_medida','unidades_medidas.id')
        ->join('marcas_productos','productos.id_marca','marcas_productos.id')
        ->where('pedido.id_institucion',5) // cambiar por la institucion del usuario logueado
        ->where('pedido.fecha_emision',$req->fecha)
        ->get();

        foreach($productos_solicitados as $producto)
        {
            if($producto->image_path !== null)
            {
                $producto->image_path = asset($producto->image_path);
            }else{
                $producto->image_path = asset('img/default.png');
            }
        }

        $productos_ingresados = Compras_detalle::select('compras_detalle.*','productos.nombre as producto','productos.codigo_interno','productos.image_path','tipo_producto.nombre as tipo_producto','unidades_medidas.nombre as unidad_medida','marcas_productos.nombre as marca','compras.estado','compras.observaciones')
        ->join('compras','compras_detalle.id_compra','compras.id')
        ->join('productos','compras_detalle.id_producto','productos.id')
        ->join('tipo_producto','productos.id_tipo_producto','tipo_producto.id')
        ->join('unidades_medidas','productos.id_unidad_medida','unidades_medidas.id')
        ->join('marcas_productos','productos.id_marca','marcas_productos.id')
        ->where('compras.id_institucion',5) // cambiar por la institucion del usuario logueado
        ->where('compras.fecha_emision',$req->fecha)
        ->get();

        foreach($productos_ingresados as $producto)
        {
            if($producto->image_path !== null)
            {
                $producto->image_path = asset($producto->image_path);
            }else{
                $producto->image_path = asset('img/default.png');
            }
        }

        // parsear para ocupar con la libreria Carbon
        $fecha_formateada = Carbon::parse($req->fecha)->format('d-m-Y');

        $v = view('app.bodega.reporte_diario',[
            'pedidos' => $productos_solicitados,
            'ingresos' => $productos_ingresados,
            'fecha' => $fecha_formateada
        ])->render();

        return ['mensaje' => 'OK','vista' => $v];
    }

    public function reporteMensual(Request $req){

            $productos_solicitados = PedidoDetalle::select(
                'pedido_detalle.*',
                'productos.nombre as producto',
                'productos.codigo_interno',
                'productos.image_path',
                'tipo_producto.nombre as tipo_producto',
                'unidades_medidas.nombre as unidad_medida',
                'marcas_productos.nombre as marca',
                'pedido.estado',
                'pedido.observacion as observaciones'
            )
            ->join('pedido', 'pedido_detalle.id_pedido', 'pedido.id')
            ->join('productos', 'pedido_detalle.id_producto', 'productos.id')
            ->join('tipo_producto', 'productos.id_tipo_producto', 'tipo_producto.id')
            ->join('unidades_medidas', 'productos.id_unidad_medida', 'unidades_medidas.id')
            ->join('marcas_productos', 'productos.id_marca', 'marcas_productos.id')
            ->where('pedido.id_institucion', 5) // cambiar por la institucion del usuario logueado
            ->whereRaw('MONTH(pedido.fecha_emision) = ?', [$req->mes])
            ->whereRaw('YEAR(pedido.fecha_emision) = ?', [$req->year])
            ->get();

            foreach($productos_solicitados as $producto)
            {
                if($producto->image_path !== null)
                {
                    $producto->image_path = asset($producto->image_path);
                }else{
                    $producto->image_path = asset('img/default.png');
                }
            }

            $productos_ingresados = Compras_detalle::select(
                'compras_detalle.*',
                'productos.nombre as producto',
                'productos.codigo_interno',
                'productos.image_path',
                'tipo_producto.nombre as tipo_producto',
                'unidades_medidas.nombre as unidad_medida',
                'marcas_productos.nombre as marca',
                'compras.estado',
                'compras.observaciones'
            )
            ->join('compras', 'compras_detalle.id_compra', 'compras.id')
            ->join('productos', 'compras_detalle.id_producto', 'productos.id')
            ->join('tipo_producto', 'productos.id_tipo_producto', 'tipo_producto.id')
            ->join('unidades_medidas', 'productos.id_unidad_medida', 'unidades_medidas.id')
            ->join('marcas_productos', 'productos.id_marca', 'marcas_productos.id')
            ->where('compras.id_institucion', 5) // cambiar por la institucion del usuario logueado
            ->whereRaw('MONTH(compras.fecha_emision) = ?', [$req->mes])
            ->whereRaw('YEAR(compras.fecha_emision) = ?', [$req->year])
            ->get();

            foreach($productos_ingresados as $producto)
            {
                if($producto->image_path !== null)
                {
                    $producto->image_path = asset($producto->image_path);
                }else{
                    $producto->image_path = asset('img/default.png');
                }
            }


                // Convertir el valor numérico del mes en su nombre literal en español
            setlocale(LC_TIME, 'es_ES.UTF-8');
            $nombreMes = strftime('%B', mktime(0, 0, 0, $req->mes, 10));

            $v = view('app.bodega.reporte_mensual',[
                'pedidos' => $productos_solicitados,
                'ingresos' => $productos_ingresados,
                'mes' => $nombreMes,
                'anio' => $req->year
            ])->render();

            return ['mensaje' => 'OK','vista' => $v];
    }

    public function reporteAnual(Request $req){

            $productos_solicitados = PedidoDetalle::select(
                'pedido_detalle.*',
                'productos.nombre as producto',
                'productos.codigo_interno',
                'productos.image_path',
                'tipo_producto.nombre as tipo_producto',
                'unidades_medidas.nombre as unidad_medida',
                'marcas_productos.nombre as marca',
                'pedido.estado',
                'pedido.observacion as observaciones'
            )
            ->join('pedido', 'pedido_detalle.id_pedido', 'pedido.id')
            ->join('productos', 'pedido_detalle.id_producto', 'productos.id')
            ->join('tipo_producto', 'productos.id_tipo_producto', 'tipo_producto.id')
            ->join('unidades_medidas', 'productos.id_unidad_medida', 'unidades_medidas.id')
            ->join('marcas_productos', 'productos.id_marca', 'marcas_productos.id')
            ->where('pedido.id_institucion', 5) // cambiar por la institucion del usuario logueado
            ->whereRaw('YEAR(pedido.fecha_emision) = ?', [$req->anio])
            ->get();

            foreach($productos_solicitados as $producto)
            {
                if($producto->image_path !== null)
                {
                    $producto->image_path = asset($producto->image_path);
                }else{
                    $producto->image_path = asset('img/default.png');
                }
            }

            $productos_ingresados = Compras_detalle::select(
                'compras_detalle.*',
                'productos.nombre as producto',
                'productos.codigo_interno',
                'productos.image_path',
                'tipo_producto.nombre as tipo_producto',
                'unidades_medidas.nombre as unidad_medida',
                'marcas_productos.nombre as marca',
                'compras.estado',
                'compras.observaciones'
            )
            ->join('compras', 'compras_detalle.id_compra', 'compras.id')
            ->join('productos', 'compras_detalle.id_producto', 'productos.id')
            ->join('tipo_producto', 'productos.id_tipo_producto', 'tipo_producto.id')
            ->join('unidades_medidas', 'productos.id_unidad_medida', 'unidades_medidas.id')
            ->join('marcas_productos', 'productos.id_marca', 'marcas_productos.id')
            ->where('compras.id_institucion', 5) // cambiar por la institucion del usuario logueado
            ->whereRaw('YEAR(compras.fecha_emision) = ?', [$req->anio])
            ->get();

            foreach($productos_ingresados as $producto)
            {
                if($producto->image_path !== null)
                {
                    $producto->image_path = asset($producto->image_path);
                }else{
                    $producto->image_path = asset('img/default.png');
                }
            }

            $v = view('app.bodega.reporte_anual',[
                'pedidos' => $productos_solicitados,
                'ingresos' => $productos_ingresados,
                'anio' => $req->anio
            ])->render();

            return ['mensaje' => 'OK','vista' => $v];
    }


    public function generarReporte(Request $request)
    {
        try {
            if($request->input('tipo') == 'diario'){
                // Obtener la fecha del request
                $fecha = $request->input('fecha');
                // Obtener los datos necesarios para el reporte diario
                $reporteDiario = Compras_detalle::select(
                    'compras_detalle.*',
                    'productos.nombre as producto',
                    'productos.codigo_interno',
                    'productos.image_path',
                    'tipo_producto.nombre as tipo_producto',
                    'unidades_medidas.nombre as unidad_medida',
                    'marcas_productos.nombre as marca',
                    'compras.estado'
                )
                ->join('compras', 'compras_detalle.id_compra', 'compras.id')
                ->join('productos', 'compras_detalle.id_producto', 'productos.id')
                ->join('tipo_producto', 'productos.id_tipo_producto', 'tipo_producto.id')
                ->join('unidades_medidas', 'productos.id_unidad_medida', 'unidades_medidas.id')
                ->join('marcas_productos', 'productos.id_marca', 'marcas_productos.id')
                ->whereDate('compras.fecha_emision', $fecha)
                ->get();

                // Renderizar la vista del reporte diario
                $pdf = Pdf::loadView('app.bodega.reporte_diario_pdf', compact('reporteDiario', 'fecha'));

            // Guardar el PDF en la carpeta public
                $fileName = 'reporte_diario_' . $fecha . '.pdf';
                $filePath = public_path('reportes/' . $fileName);
                file_put_contents($filePath, $pdf->output());

                // Devolver la ruta accesible del archivo PDF
                return response()->json(['ruta' => asset('reportes/' . $fileName)]);
            }elseif($request->input('tipo') == 'mensual'){
                // Obtener el mes y el año del request
                $mes = $request->input('mes');
                $anio = $request->input('anio');
                // Obtener los datos necesarios para el reporte mensual
                $reporteMensual = Compras_detalle::select(
                    'compras_detalle.*',
                    'productos.nombre as producto',
                    'productos.codigo_interno',
                    'productos.image_path',
                    'tipo_producto.nombre as tipo_producto',
                    'unidades_medidas.nombre as unidad_medida',
                    'marcas_productos.nombre as marca',
                    'compras.estado',
                )
                ->join('compras', 'compras_detalle.id_compra', 'compras.id')
                ->join('productos', 'compras_detalle.id_producto', 'productos.id')
                ->join('tipo_producto', 'productos.id_tipo_producto', 'tipo_producto.id')
                ->join('unidades_medidas', 'productos.id_unidad_medida', 'unidades_medidas.id')
                ->join('marcas_productos', 'productos.id_marca', 'marcas_productos.id')
                ->whereMonth('compras.fecha_emision', $mes)
                ->whereYear('compras.fecha_emision', $anio)
                ->get();

                // Renderizar la vista del reporte mensual
                $pdf = Pdf::loadView('app.bodega.reporte_mensual_pdf', compact('reporteMensual', 'mes', 'anio'));

                // Guardar el PDF en la carpeta public
                $fileName = 'reporte_mensual_' . $mes . '_' . $anio . '.pdf';
                $filePath = public_path('reportes/' . $fileName);
                file_put_contents($filePath, $pdf->output());

                // Devolver la ruta accesible del archivo PDF
                return response()->json(['ruta' => asset('reportes/' . $fileName)]);
            }elseif($request->input('tipo') == 'anual'){
                // Obtener el año del request
                $anio = $request->input('anio');
                // Obtener los datos necesarios para el reporte anual
                $reporteAnual = Compras_detalle::select(
                    'compras_detalle.*',
                    'productos.nombre as producto',
                    'productos.codigo_interno',
                    'productos.image_path',
                    'tipo_producto.nombre as tipo_producto',
                    'unidades_medidas.nombre as unidad_medida',
                    'marcas_productos.nombre as marca',
                    'compras.estado',
                )
                ->join('compras', 'compras_detalle.id_compra', 'compras.id')
                ->join('productos', 'compras_detalle.id_producto', 'productos.id')
                ->join('tipo_producto', 'productos.id_tipo_producto', 'tipo_producto.id')
                ->join('unidades_medidas', 'productos.id_unidad_medida', 'unidades_medidas.id')
                ->join('marcas_productos', 'productos.id_marca', 'marcas_productos.id')
                ->whereYear('compras.fecha_emision', $anio)
                ->get();

                // Renderizar la vista del reporte anual
                $pdf = Pdf::loadView('app.bodega.reporte_anual_pdf', compact('reporteAnual', 'anio'));

                // Guardar el PDF en la carpeta public
                $fileName = 'reporte_anual_' . $anio . '.pdf';
                $filePath = public_path('reportes/' . $fileName);
                file_put_contents($filePath, $pdf->output());

                // Devolver la ruta accesible del archivo PDF
                return response()->json(['ruta' => asset('reportes/' . $fileName)]);
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function agregarProductoCarro(Request $req){
        try {
            // buscar el pedido solicitado en el detalle del pedido
            $pedido = PedidoDetalle::where('id',$req->id)->first();
            $pedido_original = Pedido::where('id',$pedido->id_pedido)->first();
            // buscar el producto solicitado
            $producto = Producto::where('id',$pedido->id_producto)->first();
            $cantidad_solicitada = intval($req->cantidad_entregada);

            // preguntar si existe el stock suficiente para la entrega
            if($cantidad_solicitada > $pedido->cantidad){
                return ['mensaje' => 'La cantidad solicitada es mayor al stock actual del producto'];
            }
            if($cantidad_solicitada <= 0){
                return ['mensaje' => 'La cantidad solicitada debe ser mayor a 0'];
            }

            // si existe el stock suficiente, se procede a agregar el producto al carro
            $producto->stock_actual -= $cantidad_solicitada;
            $producto->save();
            $pedido->cantidad -= $cantidad_solicitada;
            $pedido->cantidad_entregada += $cantidad_solicitada;
            if($pedido->cantidad == 0){
                $pedido->estado = 0;
            }
            $pedido_original->save();
            $pedido->observaciones = $req->observaciones;
            $pedido->save();
            $todos_entregados = $this->dameProductosEntregados($pedido->id_pedido);

            $productos_pedido = $todos_entregados['entregados'];
            $productos_pendientes = $todos_entregados['pendientes'];

            if($todos_entregados['pendientes']->count() == 0){
                $pedido_original->estado = 2; // pedido entregado
                $pedido_original->save();
            }

            foreach($productos_pedido as $producto)
            {
                if($producto->image_path !== null)
                {
                    $producto->image_path = asset($producto->image_path);
                }else{
                    $producto->image_path = asset('img/default.png');
                }
            }
            foreach($productos_pendientes as $producto)
            {
                if($producto->image_path !== null)
                {
                    $producto->image_path = asset($producto->image_path);
                }else{
                    $producto->image_path = asset('img/default.png');
                }
            }
            $v = view('app.bodega.solicitud',['productos_pedido'=>$productos_pedido,'productos_pendientes'=>$productos_pendientes])->render();
            return ['mensaje' => 'OK','vista' => $v];
        } catch (\Exception $e) {
            //throw $th;
            return ['error'=>$e->getMessage()];
        }

    }

    public function eliminarProductoCarro(Request $req){
        try {
            $pedido = PedidoDetalle::where('id',$req->id)->first();
            $pedido_original = Pedido::where('id',$pedido->id_pedido)->first();

            $producto = Producto::where('id',$pedido->id_producto)->first();

            // verificar que no se devuelva mas de lo entregado
            if($pedido->cantidad_entregada < $req->cantidad_devolver){
                return ['mensaje' => 'La cantidad a devolver es mayor a la cantidad entregada'];
            }

            $producto->stock_actual += $pedido->cantidad_entregada;
            $producto->save();
            $cantidad_devolver = intval($req->cantidad_devolver);
            $pedido->cantidad += $cantidad_devolver;
            $pedido->cantidad_entregada -= $cantidad_devolver;
            $pedido->estado = 1;
            $pedido_original->save();
            $pedido->save();
            $todos_entregados = $this->dameProductosEntregados($pedido->id_pedido);
            $productos_pedido = $todos_entregados['entregados'];
            $productos_pendientes = $todos_entregados['pendientes'];
            if($todos_entregados['pendientes']->count() > 0){
                $pedido_original->estado = 1; // pedido en proceso
                $pedido_original->save();
            }
            foreach($productos_pedido as $producto)
            {
                if($producto->image_path !== null)
                {
                    $producto->image_path = asset($producto->image_path);
                }else{
                    $producto->image_path = asset('img/default.png');
                }
            }
            foreach($productos_pendientes as $producto)
            {
                if($producto->image_path !== null)
                {
                    $producto->image_path = asset($producto->image_path);
                }else{
                    $producto->image_path = asset('img/default.png');
                }
            }
            $v = view('app.bodega.solicitud',['productos_pedido'=>$productos_pedido,'productos_pendientes'=>$productos_pendientes])->render();
            return ['mensaje' => 'OK','vista' => $v];
        } catch (\Exception $e) {
            //throw $th;
            return ['error'=>$e->getMessage()];
        }
    }

    public function dameProductosEntregados($id_pedido){
        $productos_pendientes = PedidoDetalle::select('pedido_detalle.*', 'productos.nombre as nombre_medicamento','productos.image_path', 'tipo_producto.nombre as tipo_producto','productos.codigo_interno as codigo','marcas_productos.nombre as marca')
                                            ->leftjoin('productos', 'pedido_detalle.id_producto', '=', 'productos.id')
                                            ->leftjoin('tipo_producto', 'productos.id_tipo_producto', '=', 'tipo_producto.id')
                                            ->leftjoin('marcas_productos', 'productos.id_marca', '=', 'marcas_productos.id')
                                            ->where('pedido_detalle.id_pedido', $id_pedido)
                                            ->where('pedido_detalle.estado', 1)
                                            ->get();
        $productos_entregados = PedidoDetalle::select('pedido_detalle.*', 'productos.nombre as nombre_medicamento','productos.image_path', 'tipo_producto.nombre as tipo_producto','productos.codigo_interno as codigo','marcas_productos.nombre as marca')
                                            ->leftjoin('productos', 'pedido_detalle.id_producto', '=', 'productos.id')
                                            ->leftjoin('tipo_producto', 'productos.id_tipo_producto', '=', 'tipo_producto.id')
                                            ->leftjoin('marcas_productos', 'productos.id_marca', '=', 'marcas_productos.id')
                                            ->where('pedido_detalle.id_pedido', $id_pedido)
                                            ->where('pedido_detalle.cantidad_entregada', '>', 0)
                                            ->get();
        return ['entregados'=>$productos_entregados,'pendientes'=>$productos_pendientes];
    }
}
