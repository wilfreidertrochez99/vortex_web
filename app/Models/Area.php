<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Area extends Model
{
    use HasFactory;
    protected $table = 'areas';

    protected $primaryKey = 'id_area';
    public $timestamps=false;

    protected $fillable = ['nombre'];

}
