<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    // Declaro los campos que usaré de la tabla 'jugos'
    protected $fillable = [ 'name'];
}
