<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vortex 360°</title>

    <link rel="icon" type="image/png" href="/icono_vortex.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>
<body>

    <div class="container my-5">
        <h1 class="mb-4">
            Gestion Inventario TI
        </h1>

        <a href="{{ route('equipos.create') }}"
            class="btn btn-primary mb-3">
            Registrar Nuevo Equipo
        </a>

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show"
            role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>

                        <th>Código</th>
                        <th>Categoría</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Activo Fijo</th>
                        <th>Serial</th>
                        <th>Estado</th>
                        <th>Usuario</th>
                        <th>Área</th>
                        <th>Proveedor</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($equipos as $equipo)
                    <tr>

                        <td>{{ $equipo->codigo }}</td>
                        <td>{{ $equipo->categoria }}</td>
                        <td>{{ $equipo->marca }}</td>
                        <td>{{ $equipo->modelo }}</td>
                        <td>{{ $equipo->activo_fijo }}</td>
                        <td>{{ $equipo->serial }}</td>
                        <td>{{ $equipo->estado }}</td>
                        <td>{{ $equipo->usuario_asignado }}</td>

                        <td>{{ $equipo->area->nombre ?? 'Sin área' }}</td>

                        <td>{{ $equipo->proveedor->nombre ?? 'Sin proveedor' }}</td>

                        <td class="text-center">
                            <a href="{{ route('equipos.edit', $equipo->codigo) }}"
                                class="btn btn-sm btn-warning me-2">

                                Editar
                            </a>

                            <form action="{{ route('equipos.destroy', $equipo->codigo) }}"
                                method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Eliminar Equipo {{ $equipo->marca }} {{ $equipo->modelo }}?')">

                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>