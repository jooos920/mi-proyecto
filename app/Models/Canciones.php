<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canciones extends Model
{
    use HasFactory;
    protected $table='canciones';
    protected $fillable = ['nombre', 'artista', 'genero', 'album', 'anio'];
    public $timestamps = false;
    protected $primarykey = 'id';
}
