<?php

namespace Database\Seeders;

use App\Models\Producto;
use App\Models\TipoProducto;
use App\Models\Unidades_medidas;
use App\Models\MarcasImplantes;
use App\Models\MaterialesImplantologia;
use Illuminate\Database\Seeder;

class InsumosDentalesSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = collect([
            'Anestesia dental', 'Cirugía oral', 'Endodoncia', 'Periodoncia',
            'Restauración dental', 'Bioseguridad y descartables', 'Profilaxis',
        ])->mapWithKeys(function ($nombre) {
            $categoria = TipoProducto::firstOrCreate(['nombre' => $nombre]);
            return [$nombre => $categoria->id];
        });

        $unidades = collect([
            'Unidad', 'Caja', 'Paquete', 'Frasco', 'Jeringa', 'Cartucho', 'Rollo', 'Kit',
        ])->mapWithKeys(function ($nombre) {
            $unidad = Unidades_medidas::firstOrCreate(
                ['nombre' => $nombre],
                ['descripcion' => 'Unidad utilizada en inventario odontológico']
            );
            return [$nombre => $unidad->id];
        });

        $productos = [
            ['DENT-ANE-001', 'Cartucho de lidocaína 2% con epinefrina', 'Anestesia dental', 'Cartucho', 100, 20, 35, 900, 1500],
            ['DENT-ANE-002', 'Aguja dental corta 30G', 'Anestesia dental', 'Caja', 10, 2, 4, 8500, 12000],
            ['DENT-ANE-003', 'Aguja dental larga 27G', 'Anestesia dental', 'Caja', 10, 2, 4, 9000, 12500],
            ['DENT-RES-001', 'Resina fotopolimerizable universal', 'Restauración dental', 'Jeringa', 12, 3, 5, 18000, 26000],
            ['DENT-RES-002', 'Ácido ortofosfórico 37%', 'Restauración dental', 'Jeringa', 20, 4, 7, 2800, 4500],
            ['DENT-RES-003', 'Adhesivo dental universal', 'Restauración dental', 'Frasco', 8, 2, 3, 22000, 32000],
            ['DENT-RES-004', 'Ionómero de vidrio restaurador', 'Restauración dental', 'Kit', 6, 1, 2, 28000, 39000],
            ['DENT-END-001', 'Conos de gutapercha surtidos', 'Endodoncia', 'Caja', 12, 3, 5, 6500, 9500],
            ['DENT-END-002', 'Puntas de papel absorbente surtidas', 'Endodoncia', 'Caja', 12, 3, 5, 6000, 9000],
            ['DENT-END-003', 'Hipoclorito de sodio uso endodóntico', 'Endodoncia', 'Frasco', 10, 2, 4, 3500, 5500],
            ['DENT-END-004', 'Limas endodónticas manuales K', 'Endodoncia', 'Caja', 10, 2, 4, 8500, 12500],
            ['DENT-END-005', 'Cemento sellador endodóntico', 'Endodoncia', 'Kit', 5, 1, 2, 26000, 36000],
            ['DENT-PER-001', 'Sutura nylon 4-0', 'Periodoncia', 'Unidad', 30, 8, 12, 1800, 3000],
            ['DENT-PER-002', 'Membrana de colágeno reabsorbible', 'Periodoncia', 'Unidad', 5, 1, 2, 65000, 85000],
            ['DENT-PER-003', 'Injerto óseo sintético 0,5 g', 'Periodoncia', 'Frasco', 5, 1, 2, 55000, 75000],
            ['DENT-CIR-001', 'Hoja de bisturí N°15', 'Cirugía oral', 'Caja', 8, 2, 3, 9500, 14000],
            ['DENT-CIR-002', 'Esponja hemostática de gelatina', 'Cirugía oral', 'Caja', 8, 2, 3, 15000, 22000],
            ['DENT-CIR-003', 'Sutura seda 3-0', 'Cirugía oral', 'Unidad', 30, 8, 12, 1600, 2800],
            ['DENT-BIO-001', 'Guantes de nitrilo talla M', 'Bioseguridad y descartables', 'Caja', 20, 5, 8, 6500, 9500],
            ['DENT-BIO-002', 'Mascarilla quirúrgica triple pliegue', 'Bioseguridad y descartables', 'Caja', 20, 5, 8, 3500, 5500],
            ['DENT-BIO-003', 'Vasos desechables odontológicos', 'Bioseguridad y descartables', 'Paquete', 15, 4, 6, 2500, 4000],
            ['DENT-BIO-004', 'Rollos de algodón dental', 'Bioseguridad y descartables', 'Paquete', 20, 5, 8, 2200, 3500],
            ['DENT-BIO-005', 'Eyector de saliva desechable', 'Bioseguridad y descartables', 'Paquete', 20, 5, 8, 3000, 4800],
            ['DENT-PRO-001', 'Pasta profiláctica', 'Profilaxis', 'Frasco', 10, 2, 4, 6500, 9500],
            ['DENT-PRO-002', 'Cepillo de profilaxis', 'Profilaxis', 'Unidad', 30, 8, 12, 700, 1200],
        ];

        foreach ($productos as [$codigo, $nombre, $categoria, $unidad, $stock, $seguridad, $minimo, $costo, $venta]) {
            Producto::updateOrCreate(
                ['codigo_interno' => $codigo],
                [
                    'id_profesional' => null,
                    'nombre' => $nombre,
                    'stock_actual' => $stock,
                    'stock_seguridad' => $seguridad,
                    'stock_minimo' => $minimo,
                    'stock_maximo' => max($stock, $minimo * 3),
                    'precio_compra' => $costo,
                    'precio_venta' => $venta,
                    'imagen' => '',
                    'descripcion' => 'Insumo dental de catálogo base para asociar a tratamientos.',
                    'id_tipo_producto' => $categorias[$categoria],
                    'id_unidad_medida' => $unidades[$unidad],
                    'id_marca' => 0,
                    'ubicacion' => 'Catálogo base',
                    'estado' => 1,
                ]
            );
        }

        $categoriaImplantologia = TipoProducto::firstOrCreate(['nombre' => 'Implantología']);
        $marcas = MarcasImplantes::where('estado', 1)->orderBy('id')->take(4)->get();
        foreach ($marcas as $indice => $marca) {
            $producto = Producto::updateOrCreate(
                ['codigo_interno' => 'DENT-IMP-' . str_pad((string) ($indice + 1), 3, '0', STR_PAD_LEFT)],
                [
                    'id_profesional' => null,
                    'nombre' => 'Implante dental titanio - ' . $marca->descripcion,
                    'stock_actual' => 10,
                    'stock_seguridad' => 2,
                    'stock_minimo' => 3,
                    'stock_maximo' => 20,
                    'precio_compra' => 65000,
                    'precio_venta' => 95000,
                    'imagen' => '',
                    'descripcion' => 'Implante de ejemplo vinculado al catálogo de Implantología.',
                    'id_tipo_producto' => $categoriaImplantologia->id,
                    'id_unidad_medida' => $unidades['Unidad'],
                    'id_marca' => 0,
                    'ubicacion' => 'Implantología',
                    'estado' => 1,
                    'es_implante' => 1,
                    'id_marca_implante' => $marca->id,
                    'id_tipo_insumo_implantologia' => 1,
                ]
            );
            MaterialesImplantologia::updateOrCreate(
                ['id_producto' => $producto->id],
                ['id_tipo_insumo' => 1, 'descripcion' => $producto->nombre, 'valor' => $producto->precio_venta, 'estado' => 1, 'observaciones' => $producto->descripcion]
            );
        }

        $materiales = [
            ['DENT-IMP-101', 'Injerto óseo sintético implantológico 0,5 g', 5, 'Frasco', 5, 55000, 75000],
            ['DENT-IMP-102', 'Membrana de colágeno implantológica', 6, 'Unidad', 5, 65000, 85000],
            ['DENT-IMP-103', 'Tornillo de fijación para membrana', 7, 'Unidad', 20, 4500, 7500],
            ['DENT-IMP-104', 'Pilar de cicatrización', 8, 'Unidad', 10, 18000, 28000],
        ];
        foreach ($materiales as [$codigo, $nombre, $tipo, $unidad, $stock, $costo, $venta]) {
            $producto = Producto::updateOrCreate(['codigo_interno' => $codigo], [
                'id_profesional' => null, 'nombre' => $nombre, 'stock_actual' => $stock,
                'stock_seguridad' => 1, 'stock_minimo' => 2, 'stock_maximo' => max(10, $stock),
                'precio_compra' => $costo, 'precio_venta' => $venta, 'imagen' => '',
                'descripcion' => 'Material implantológico de ejemplo para asociar a tratamientos.',
                'id_tipo_producto' => $categoriaImplantologia->id, 'id_unidad_medida' => $unidades[$unidad],
                'id_marca' => 0, 'ubicacion' => 'Implantología', 'estado' => 1,
                'es_implante' => 1, 'id_marca_implante' => null, 'id_tipo_insumo_implantologia' => $tipo,
            ]);
            MaterialesImplantologia::updateOrCreate(
                ['id_producto' => $producto->id],
                ['id_tipo_insumo' => $tipo, 'descripcion' => $producto->nombre, 'valor' => $producto->precio_venta, 'estado' => 1, 'observaciones' => $producto->descripcion]
            );
        }
    }
}
