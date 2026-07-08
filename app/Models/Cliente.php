<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'rol_id',
        'nombre',
        'rut',
        'primer_apellido',
        'segundo_apellido',
        'fecha_nacimiento',
        'sexo',
        'prevision_id',
        'profesion',
        'especialidad',
        'sub_tipo_especialidad',
        'direccion',
        'numero_dir',
        'region_id',
        'ciudad_id',
        'telefono',
        'celular',
        'correo',
        'email',
        'tipo_producto',
        'productos',
        'activo',
        // Institución
        'inst_rut',
        'nombre_institucion',
        'tipo_institucion',
        'inst_direccion',
        'inst_numero_dir',
        'inst_region_id',
        'inst_ciudad_id',
        'inst_telefono',
        // Responsable
        'responsable_rut',
        'responsable_nombre',
        'responsable_apellido_uno',
        'responsable_apellido_dos',
        'responsable_celular',
        'responsable_telefono',
        // Servicio
        'serv_rut',
        'nombre_servicio',
        'tipo_servicio',
        'serv_direccion',
        'serv_numero_dir',
        'serv_region_id',
        'serv_ciudad_id',
        'serv_telefono',
        // Referencias a otros modelos
        'id_usuario',
        // 'id_direccion',
        // 'correo_inst',
    ];

    protected $dates = ['fecha_nacimiento'];

    // Relaciones
    public function rol()
    {
        return $this->belongsTo('App\Models\Roles', 'rol_id');
    }

    public function prevision()
    {
        return $this->belongsTo('App\Models\Prevision', 'prevision_id');
    }

    public function region()
    {
        return $this->belongsTo('App\Models\Region', 'region_id');
    }

    public function carritoCompras()
    {
        return $this->hasMany('App\Models\CarritoCompra', 'id_cliente');
    }

    // Relación many-to-many con FormasPago
    public function formasPago()
    {
        return $this->belongsToMany('App\Models\FormasPago', 'cliente_forma_pago', 'id_cliente', 'id_forma_pago')
                    ->withPivot('predeterminada', 'activo')
                    ->withTimestamps();
    }

    // Relación one-to-many con Pagos
    public function pagos()
    {
        return $this->hasMany('App\Models\Pago', 'id_cliente');
    }

    // Accesor para obtener los nombres de productos traducidos
    public function getProductosNombresAttribute()
    {
        $productos_map = [
            1 => 'AUDÍFONOS',
            2 => 'ACCESORIOS',
            3 => 'ARTICULOS ORL',
            4 => 'OTROS'
        ];

        if (!$this->productos) {
            return 'N/A';
        }

        try {
            $productos = json_decode($this->productos, true);
            if (!is_array($productos) || empty($productos)) {
                return 'N/A';
            }

            $nombres = [];
            foreach ($productos as $id) {
                if (isset($productos_map[$id])) {
                    $nombres[] = $productos_map[$id];
                }
            }

            return !empty($nombres) ? implode(', ', $nombres) : 'N/A';
        } catch (\Exception $e) {
            return 'N/A';
        }
    }
}

