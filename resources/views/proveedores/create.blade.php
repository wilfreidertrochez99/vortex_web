@extends('layouts.app')

@section('content')

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center my-4">
                            Registrar Nuevo Proveedor
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('proveedores.store') }}">

                            @csrf

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control @error('nombre') is-invalid @enderror"
                                            id="nombre"
                                            name="nombre"
                                            type="text"
                                            placeholder="Nombre"
                                            value="{{ old('nombre') }}"
                                            required>
                                        <label for="nombre">
                                            Nombre
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('nit') is-invalid @enderror"
                                            id="nit"
                                            name="nit"
                                            type="text"
                                            placeholder="NIT"
                                            value="{{ old('nit') }}"
                                            required>
                                        <label for="nit">
                                            NIT
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('direccion') is-invalid @enderror"
                                            id="direccion"
                                            name="direccion"
                                            type="text"
                                            placeholder="Dirección"
                                            value="{{ old('direccion') }}"
                                            required>
                                        <label for="direccion">
                                            Dirección
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('ciudad') is-invalid @enderror"
                                            id="ciudad"
                                            name="ciudad"
                                            type="text"
                                            placeholder="Ciudad"
                                            value="{{ old('ciudad') }}"
                                            required>
                                        <label for="ciudad">
                                            Ciudad
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input class="form-control @error('telefono') is-invalid @enderror"
                                            id="telefono"
                                            name="telefono"
                                            type="text"
                                            placeholder="Teléfono"
                                            value="{{ old('telefono') }}"
                                            required>
                                        <label for="telefono">
                                            Teléfono
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary btn-lg"
                                        type="submit">
                                        Registrar Proveedor
                                    </button>
                                    <a class="btn btn-secondary"
                                        href="{{ route('proveedores.index') }}">
                                        Cancelar y Volver
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection