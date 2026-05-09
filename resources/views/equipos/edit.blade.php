<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vortex 360°</title>

    <link rel="icon" type="image/png" href="/icono_vortex.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        crossorigin="anonymous">

</head>
<body>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center my-4">
                            Editar Equipo
                        </h3>
                    </div>
                    <div class="card-body">

                        <form method="POST"
                            action="{{ route('equipos.update', $equipo->codigo) }}">
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

                            <!-- CATEGORIA -->
                            <div class="form-floating mb-3">

                                <select class="form-select @error('categoria') is-invalid @enderror"
                                    id="categoria"
                                    name="categoria"
                                    required>

                                    <option value="">Seleccione una categoría</option>

                                    <option value="Portatil"
                                        {{ $equipo->categoria == 'Portatil' ? 'selected' : '' }}>
                                        Portatil
                                    </option>

                                    <option value="Monitor"
                                        {{ $equipo->categoria == 'Monitor' ? 'selected' : '' }}>
                                        Monitor
                                    </option>

                                    <option value="CPU"
                                        {{ $equipo->categoria == 'CPU' ? 'selected' : '' }}>
                                        CPU
                                    </option>

                                    <option value="Tablet"
                                        {{ $equipo->categoria == 'Tablet' ? 'selected' : '' }}>
                                        Tablet
                                    </option>

                                    <option value="Radiofrecuencia"
                                        {{ $equipo->categoria == 'Radiofrecuencia' ? 'selected' : '' }}>
                                        Radiofrecuencia
                                    </option>
                                </select>
                                <label for="categoria">Categoría</label>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control @error('marca') is-invalid @enderror"
                                            id="marca"
                                            name="marca"
                                            type="text"
                                            placeholder="Marca"
                                            value="{{ old('marca', $equipo->marca) }}"
                                            required>
                                        <label for="marca">Marca</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('modelo') is-invalid @enderror"
                                            id="modelo"
                                            name="modelo"
                                            type="text"
                                            placeholder="Modelo"
                                            value="{{ old('modelo', $equipo->modelo) }}"
                                            required>
                                        <label for="modelo">Modelo</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('activo_fijo') is-invalid @enderror"
                                            id="activo_fijo"
                                            name="activo_fijo"
                                            type="text"
                                            placeholder="Activo fijo"
                                            value="{{ old('activo_fijo', $equipo->activo_fijo) }}"
                                            required>
                                        <label for="activo_fijo">Activo Fijo</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control @error('serial') is-invalid @enderror"
                                            id="serial"
                                            name="serial"
                                            type="text"
                                            placeholder="Serial"
                                            value="{{ old('serial', $equipo->serial) }}"
                                            required>
                                        <label for="serial">Serial</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <select class="form-select @error('estado') is-invalid @enderror"
                                    id="estado"
                                    name="estado"
                                    required>
                                    <option value="">Seleccione un estado</option>

                                    <option value="Asignado"
                                        {{ $equipo->estado == 'Asignado' ? 'selected' : '' }}>
                                        Asignado
                                    </option>

                                    <option value="Disponible"
                                        {{ $equipo->estado == 'Disponible' ? 'selected' : '' }}>
                                        Disponible
                                    </option>

                                    <option value="En reparación"
                                        {{ $equipo->estado == 'En reparación' ? 'selected' : '' }}>
                                        En reparación
                                    </option>
                                </select>
                                <label for="estado">Estado</label>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control @error('usuario_asignado') is-invalid @enderror"
                                            id="usuario_asignado"
                                            name="usuario_asignado"
                                            type="text"
                                            placeholder="Usuario asignado"
                                            value="{{ old('usuario_asignado', $equipo->usuario_asignado) }}">
                                        <label for="usuario_asignado">
                                            Usuario Asignado
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select @error('id_area') is-invalid @enderror"
                                            id="id_area"
                                            name="id_area"
                                            required>
                                            <option value="">Seleccione un área</option>
                                            @foreach ($areas as $area)
                                            <option value="{{ $area->id_area }}"
                                                {{
                                                (old('id_area') == $area->id_area) ||
                                                ($equipo->id_area == $area->id_area && old('id_area') == null)
                                                ? 'selected' : ''
                                                }}>
                                                {{ $area->nombre }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="id_area">Área</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-floating mb-4">
                                <select class="form-select @error('id_proveedor') is-invalid @enderror"
                                    id="id_proveedor"
                                    name="id_proveedor"
                                    required>
                                    <option value="">
                                        Seleccione un proveedor
                                    </option>
                                    @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id_proveedor }}"
                                        {{
                                        (old('id_proveedor') == $proveedor->id_proveedor) ||
                                        ($equipo->id_proveedor == $proveedor->id_proveedor && old('id_proveedor') == null)
                                        ? 'selected' : ''
                                        }}>
                                        {{ $proveedor->nombre }}
                                    </option>
                                    @endforeach
                                </select>
                                <label for="id_proveedor">Proveedor</label>
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary btn-lg" type="submit">
                                        Actualizar Equipo

                                    </button>
                                    <a class="btn btn-secondary"
                                        href="{{ route('equipos.index') }}">
                                        Cancelar y Volver

                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```
