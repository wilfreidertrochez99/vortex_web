<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>VORTEX 360°</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background-image: url('{{ asset('img/fondo.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            margin: 0;
        }

        .overlay{
            background-color: rgba(0,0,0,0.4);
            min-height: 100vh;
            padding: 90px 25px 25px 25px;
        }

        .card{
            border-radius: 15px;
        }

        .navbar{
            height: 70px;
        }

    </style>

</head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top">

        <div class="container-fluid px-4">

            {{-- LOGO + TITULO + INICIO --}}
            <div class="d-flex align-items-center">

                <img src="{{ asset('img/logo.png') }}"
                     alt="Logo"
                     width="45"
                     class="me-2">

                <span class="navbar-brand fw-bold fs-4 m-0 me-4">
                    VORTEX 360°
                </span>

                {{-- BOTON INICIO --}}
@if(Auth::check())

    @php

        $rutaInicio = match(Auth::user()->rol){

            'administrador' => route('dashboard.admin'),
            'supervisor' => route('dashboard.supervisor'),
            'tecnico' => route('dashboard.tecnico'),

            default => '#'

        };

    @endphp

    <a href="{{ $rutaInicio }}"
       class="btn btn-outline-light btn-sm">

        Inicio

    </a>

@endif

            </div>

            {{-- INFORMACION USUARIO --}}
            <div class="d-flex align-items-center gap-3">

                <div class="text-end">

                    <div class="text-white fw-bold">
                        {{ Auth::user()->nombre }}
                    </div>

                    <small class="text-light">
                        {{ ucfirst(Auth::user()->rol) }}
                    </small>

                </div>

                {{-- BOTON LOGOUT --}}
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

    {{-- CONTENIDO --}}
    <div class="overlay">

        @yield('content')

    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>