<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedores';

    protected $primaryKey = 'id_proveedor';
    public $timestamps=false;

    protected $fillable = ['nombre','nit','direccion','ciudad','telefono'];

}
 
