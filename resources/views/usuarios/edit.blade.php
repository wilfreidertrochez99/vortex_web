@extends('layouts.app')

@section('content')

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-lg">

                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center my-4">
                            Editar Usuario
                        </h3>
                    </div>

                    <div class="card-body">

                        <form method="POST"
                            action="{{ route('usuarios.update', $usuario->id_usuario) }}">

                            @csrf
                            @method('PUT')

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
                                            value="{{ old('nombre', $usuario->nombre) }}"
                                            required>
                                        <label for="nombre">
                                            Nombre
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('apellido') is-invalid @enderror"
                                            id="apellido"
                                            name="apellido"
                                            type="text"
                                            placeholder="Apellido"
                                            value="{{ old('apellido', $usuario->apellido) }}"
                                            required>
                                        <label for="apellido">
                                            Apellido
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('contacto') is-invalid @enderror"
                                            id="contacto"
                                            name="contacto"
                                            type="text"
                                            placeholder="Contacto"
                                            value="{{ old('contacto', $usuario->contacto) }}">

                                        <label for="contacto">
                                            Contacto
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('email') is-invalid @enderror"
                                            id="email"
                                            name="email"
                                            type="email"
                                            placeholder="Correo Electrónico"
                                            value="{{ old('email', $usuario->email) }}"
                                            required>
                                        <label for="email">
                                            Correo Electrónico
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <select class="form-select @error('rol') is-invalid @enderror"
                                            id="rol"
                                            name="rol"
                                            required>
                                            <option value="">
                                                Seleccione un Rol
                                            </option>
                                            <option value="Administrador"
                                                {{ $usuario->rol == 'Administrador' ? 'selected' : '' }}>
                                                Administrador
                                            </option>

                                            <option value="supervisor"
                                                {{ $usuario->rol == 'supervisor' ? 'selected' : '' }}>
                                                Supervisor
                                            </option>

                                            
                                            <option value="Tecnico"
                                                {{ $usuario->rol == 'Tecnico' ? 'selected' : '' }}>
                                                Técnico
                                            </option>

                                        </select>

                                        <label for="rol">
                                            Rol
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary btn-lg" type="submit">
                                        Actualizar Usuario
                                    </button>
                                    <a class="btn btn-secondary"
                                        href="{{ route('usuarios.index') }}">
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