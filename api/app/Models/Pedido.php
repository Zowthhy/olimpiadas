<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'id';
    protected $fillable = ['id','id_c', 'id_e', 'id_p'];
    public $timestamps = true;
    protected $guarded = [];

    public function cliente(){
        return $this->belongsTo(User::class, 'cliente'); 
    }
    
    use HasFactory;
}
