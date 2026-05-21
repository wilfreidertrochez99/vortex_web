<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquiposController;
use App\Models\Equipo;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProveedoresController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {

    if (auth()->user()->rol == 'administrador') {

        return redirect()->route('dashboard.admin');

    } elseif (auth()->user()->rol == 'supervisor') {

        return redirect()->route('dashboard.supervisor');

    } elseif (auth()->user()->rol == 'tecnico') {

        return redirect()->route('dashboard.tecnico');
    }

    return redirect('/');

})->middleware('auth')->name('dashboard');

//Route::get('/dashboard', function () {

//    $equipos = Equipo::all();
//    $totalEquipos = Equipo::count();
//    $disponibles = Equipo::where('estado', 'Disponible')->count();

//    return view('dashboard',compact('equipos','totalEquipos','disponibles'));
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

     Route::get('/dashboard-admin', function () {

    if(auth()->user()->rol != 'administrador'){

        abort(403);

    }

    $totalEquipos = Equipo::count();

    $disponibles = Equipo::where('estado', 'Disponible')->count();

    return view('dashboard.admin',
    compact('totalEquipos','disponibles'));

})->name('dashboard.admin');

     Route::get('/dashboard-supervisor', function () {

    if(auth()->user()->rol != 'supervisor'){

        abort(403);

    }

    return view('dashboard.supervisor');

})->name('dashboard.supervisor');


     Route::get('/dashboard-tecnico', function () {

    if(auth()->user()->rol != 'tecnico'){

        abort(403);

    }

    return view('dashboard.tecnico');

})->name('dashboard.tecnico');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('usuarios', UsuariosController::class);
    Route::resource('proveedores', ProveedoresController::class)
    ->parameters([
        'proveedores' => 'proveedor'
    ]);
    Route::resource('equipos', EquiposController::class);
});


require __DIR__.'/auth.php';
