<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $fillable = ['nombre','apellido','contacto','email','password',
        'fecha_registro','rol'];

    protected $hidden = ['password',];
}
