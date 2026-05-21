@extends('layouts.app')

@section('content')

        <div class="mb-5">

            <h2 class="fw-bold mb-3">
    Bienvenido {{ Auth::user()->nombre }}
</h2>

        </div>

        <div class="row g-4">

            <div class="col-md-6">

                <div class="card shadow border-0 h-100">

                    <div class="card-body">

                        <h5 class="card-title">
                            Consulta Inventario
                        </h5>

                        <p class="card-text">
                            Consulta de equipos registrados en el sistema.
                        </p>

                        <a href="{{ route('equipos.index') }}"
                            class="btn btn-primary">

                            Ver Inventario

                        </a>

                    </div>

                </div>

            </div>

        </div>
@endsection