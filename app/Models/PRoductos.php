<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PRoductos extends Model
{
    use HasFactory;
    protected $table='productos';
    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock'];
    public $timestamps = false;
    protected $primarykey = 'id';
}
