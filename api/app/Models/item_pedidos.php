<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_pedidos extends Model
{
    public $timestamps = false;
    protected $table = 'item_pedido';
    protected $fillable = ['id','cantidad', 'id_pedido', 'id_producto','precio_parcial'];

    public function pedido(){
        return $this->belongsTo(Pedido::class, 'id_pedido', 'id');
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'codigo');
    }

    use HasFactory;
}
