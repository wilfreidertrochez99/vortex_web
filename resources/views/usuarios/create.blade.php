@extends('layouts.app')

@section('content')

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center my-4">Registrar Usuario</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('usuarios.store') }}">

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
                                        <label for="nombre">Nombre</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('apellido') is-invalid @enderror"
                                            id="apellido"
                                            name="apellido"
                                            type="text"
                                            placeholder="Apellido"
                                            value="{{ old('apellido') }}"
                                            required>
                                        <label for="apellido">Apellido</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control @error('contacto') is-invalid @enderror"
                                            id="contacto"
                                            name="contacto"
                                            type="text"
                                            placeholder="Contacto"
                                            value="{{ old('contacto') }}">
                                        <label for="contacto">Contacto</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('email') is-invalid @enderror"
                                            id="email"
                                            name="email"
                                            type="email"
                                            placeholder="Email"
                                            value="{{ old('email') }}"
                                            required>
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control @error('password') is-invalid @enderror"
                                            id="password"
                                            name="password"
                                            type="password"
                                            placeholder="Contraseña"
                                            required>
                                        <label for="password">Contraseña</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select @error('rol') is-invalid @enderror"
                                            id="rol"
                                            name="rol"
                                            required>
                                            <option value="">Seleccione Rol</option>
                                            <option value="administrador"
                                                {{ old('rol') == 'administrador' ? 'selected' : '' }}>
                                                Administrador
                                            </option>

                                            <option value="supervisor"
                                                {{ old('rol') == 'supervisor' ? 'selected' : '' }}>
                                                Supervisor
                                            </option>

                                            <option value="tecnico"
                                                {{ old('rol') == 'tecnico' ? 'selected' : '' }}>
                                                Técnico
                                            </option>
                                        </select>
                                        <label for="rol">Rol</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-success btn-lg"
                                        type="submit">
                                        Guardar Usuario
                                    </button>

                                    <a class="btn btn-secondary"
                                        href="{{ route('usuarios.index') }}">
                                        Cancelar
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection
    