<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquiposController;
use App\Models\Equipo;
use App\Http\Controllers\UsuariosController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    $equipos = Equipo::all();
    $totalEquipos = Equipo::count();
    $disponibles = Equipo::where('estado', 'Disponible')->count();

    return view('dashboard',compact('equipos','totalEquipos','disponibles'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('usuarios', UsuariosController::class);
});

Route::resource('equipos', EquiposController::class);

require __DIR__.'/auth.php';
