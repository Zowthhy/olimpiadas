<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entrega extends Model
{
    protected $fillable = ['id','id_pedido'];
    public function pedido(){
        return $this->belongsTo(Pedido::class, 'id_pedido', 'id'); 
    }
    use HasFactory;
}
