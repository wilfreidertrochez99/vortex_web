@extends('layouts.app')

@section('content')

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-success text-white">
                        <h3 class="text-center my-4">
                            Registrar Equipo
                        </h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('equipos.store') }}">
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

                            <div class="form-floating mb-3">
                                <select class="form-select @error('categoria') is-invalid @enderror"
                                    id="categoria"
                                    name="categoria"
                                    required>

                                    <option value="">Seleccione una categoría</option>

                                    <option value="Portatil">Portatil</option>
                                    <option value="Monitor">Monitor</option>
                                    <option value="CPU">CPU</option>
                                    <option value="Tablet">Tablet</option>
                                    <option value="Radiofrecuencia">Radiofrecuencia</option>
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
                                            value="{{ old('marca') }}"
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
                                            value="{{ old('modelo') }}"
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
                                            value="{{ old('activo_fijo') }}"
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
                                            value="{{ old('serial') }}"
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

                                    <option value="Asignado">Asignado</option>
                                    <option value="Disponible">Disponible</option>
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
                                            value="{{ old('usuario_asignado') }}">
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
                                                {{ old('id_area') == $area->id_area ? 'selected' : '' }}>
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
                                        {{ old('id_proveedor') == $proveedor->id_proveedor ? 'selected' : '' }}>
                                        {{ $proveedor->nombre }}
                                    </option>
                                    @endforeach
                                </select>
                                <label for="id_proveedor">Proveedor</label>
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-success btn-lg" type="submit">
                                        Guardar Equipo
                                    </button>
                                    <a class="btn btn-secondary"
                                        href="{{ route('equipos.index') }}">
                                        Cancelar

                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>

function actualizarCustodia() {

    let estado = document.getElementById('estado').value;

    let usuario = document.getElementById('usuario_asignado');
    let area = document.getElementById('id_area');

    if (estado === 'Disponible') {

        // Usuario automático
        usuario.value = 'Custodia Soporte';
        usuario.readOnly = true;

        // Área automática
        area.value = '10';

        // Bloquear visualmente
        area.style.pointerEvents = 'none';

    } else {

        usuario.value = '';
        usuario.readOnly = false;

        area.value = '';

        area.style.pointerEvents = 'auto';

    }

}

document.getElementById('estado').addEventListener('change', actualizarCustodia);

// Ejecutar al cargar
actualizarCustodia();

</script>

        @endsection