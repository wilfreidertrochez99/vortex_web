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

<style>

    body{

        background-image: url('/fondos/fondoweb.jpg');

        background-size: cover;

        background-position: center;

        background-repeat: no-repeat;

        background-attachment: fixed;

        min-height: 100vh;
    }

    .card{

        background: rgba(255,255,255,0.95);

        border-radius: 15px;
    }

</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <div class="d-flex align-items-center">
            <a class="navbar-brand fs-3 fw-bold d-flex align-items-center mb-0"
                href="#">
                <img src="/imagen/icono_vortex.png"
                    alt="Logo"
                    width="50"
                    height="50"
                    class="me-2">
                Vortex 360°
            </a>
        </div>
    </div>
</nav>

    <div class="container my-5">

        <h1 style="margin-top:-30px;">
    Proveedores
</h1>

        <a href="{{ route('proveedores.create') }}"
            class="btn btn-primary mb-3">
            Registrar Nuevo Proveedor
        </a>

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show"
            role="alert">

            {{ session('success') }}

            <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>NIT</th>
                        <th>Dirección</th>
                        <th>Ciudad</th>
                        <th>Teléfono</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->id_proveedor }}</td>
                        <td>{{ $proveedor->nombre }}</td>
                        <td>{{ $proveedor->nit }}</td>
                        <td>{{ $proveedor->direccion }}</td>
                        <td>{{ $proveedor->ciudad }}</td>
                        <td>{{ $proveedor->telefono }}</td>
                        <td class="text-center">
                            <a href="{{ route('proveedores.edit', $proveedor->id_proveedor) }}"
                                class="btn btn-sm btn-warning me-2">
                                Editar
                            </a>
                            <form action="{{ route('proveedores.destroy', $proveedor->id_proveedor) }}"
                                method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Eliminar proveedor {{ $proveedor->nombre }}?')">
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