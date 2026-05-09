<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Area;
use App\Models\Proveedor;

class Equipo extends Model
{
    use HasFactory;
     //1.especificar el nombre de la tabla
    protected $table = 'equipos';
 
    //2. Especificar la clave primaria
    protected $primaryKey = 'codigo';
    public $timestamps=false;
 
    //3. Definir las columnas o campos que sse pueden asignar masivamente (CRUD)
    protected $fillable = [ 'categoria','marca','modelo','activo_fijo','serial',
        'estado','usuario_asignado','id_area','id_proveedor'];

    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }
 
}
