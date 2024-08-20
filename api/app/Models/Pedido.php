<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'id';
    protected $fillable = ['id','cliente', 'id_e', 'id_p','precio_total'];
    public $timestamps = true;
    protected $guarded = [];

    public function clientes(){
        return $this->belongsTo(User::class, 'cliente', 'id'); 
    }
    public function items()
{
    return $this->hasMany(Item_pedidos::class, 'id_pedido', 'id');
}

    
    use HasFactory;
}
