<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'codigo';
    public $timestamps = true;
    use HasFactory;
    protected $fillable = ['codigo','descripcion', 'stock', 'precio'];
    protected $guarded = [];
}
