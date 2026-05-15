<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>

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
    Gestion de Usuarios
</h1>

        <a href="{{ route('usuarios.create') }}"
            class="btn btn-primary mb-3">

            Registrar Nuevo Usuario
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
                        <th>Apellido</th>
                        <th>Contacto</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th class="text-center">
                            Acciones
                        </th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($usuarios as $usuario)

                    <tr>
                        <td>{{ $usuario->id_usuario }}</td>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->apellido }}</td>
                        <td>{{ $usuario->contacto }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->rol }}</td>
                        <td class="text-center">
                            <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}"
                                class="btn btn-sm btn-warning me-2">

                                Editar
                            </a>

                            <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}"
                                method="POST"
                                style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Eliminar usuario {{ $usuario->nombre }}?')">

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