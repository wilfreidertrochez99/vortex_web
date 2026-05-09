<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquiposController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('equipos', EquiposController::class);