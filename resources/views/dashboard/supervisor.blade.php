<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Supervisor</title>

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

        <a class="navbar-brand fs-3 fw-bold d-flex align-items-center" href="#">

         <img src="/imagen/icono_vortex.png"
        alt="Logo"
        width="50"
        height="50"
        class="me-2">

            Vortex 360°
        </a>

        <div class="d-flex align-items-center">

            <div class="text-white me-3 text-end">

    <div>

        {{ Auth::user()->nombre }}
        {{ Auth::user()->apellido }}

    </div>

    <small>

        {{ Auth::user()->rol }}

    </small>

</div>

            <form method="POST"
                action="{{ route('logout') }}">

                @csrf

                <button type="submit"
                    class="btn btn-danger btn-sm">

                    Cerrar Sesión

                </button>

            </form>

        </div>

    </div>

</nav>

    <div class="container my-5">

        <div class="mb-5">

            <h2>
                Bienvenido {{ Auth::user()->nombre }}
            </h2>

        </div>

        <div class="row g-4">

            <div class="col-md-6">

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

            <div class="col-md-6">

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

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>