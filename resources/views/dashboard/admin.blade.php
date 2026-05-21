@extends('layouts.app')

@section('content')
        <div class="mb-5">

            <h2 class="fw-bold mb-3">
    Bienvenido {{ Auth::user()->nombre }}
</h2>

        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow border-0 h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            Gestión Usuarios
                        </h5>

                        <p class="card-text">
                            Administración completa de usuarios y roles.
                        </p>

                        <a href="{{ route('usuarios.index') }}"
                            class="btn btn-primary">

                            Ir a Usuarios

                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow border-0 h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            Gestión Equipos
                        </h5>

                        <p class="card-text">
                            Administración del inventario TI.
                        </p>

                        <a href="{{ route('equipos.index') }}"
                            class="btn btn-success">

                            Ir a Equipos
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow border-0 h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            Gestión Proveedores
                        </h5>

                        <p class="card-text">
                            Administración de proveedores.
                        </p>

                        <a href="{{ route('proveedores.index') }}"
                            class="btn btn-dark">

                            Ir a Proveedores
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endsection