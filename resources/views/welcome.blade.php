<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link rel="icon"
     type="image/png"
      href="{{ asset('img/logo.png') }}">

    <title>Vortex 360°</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            margin:0;
            padding:0;
            height:100vh;

            background-image:url('{{ asset('img/welcome.jpg') }}');
            background-size:cover;
            background-position:center;

            display:flex;
            justify-content:center;
            align-items:center;
        }

        .contenedor{

            width:900px;
            background:rgba(0,0,0,0.90);

            border-radius:20px;

            overflow:hidden;

            display:flex;

            box-shadow:0px 0px 30px rgba(255, 255, 255, 0.5);
        }

        .lado-izquierdo{

            width:50%;
            padding:60px;

            color:white;

            display:flex;
            flex-direction:column;
            justify-content:center;
        }

        .lado-derecho{

            width:50%;

            background-image:url('{{ asset('img/logo.png') }}');
            background-repeat:no-repeat;
            background-position:center;
            background-size:250px;

            background-color:rgba(255,255,255,0.05);
        }

        .titulo{

            font-size:55px;
            font-weight:bold;
        }

        .descripcion{

            margin-top:20px;

            color:#d1d1d1;

            font-size:18px;
        }

        .btn-ingresar{

            margin-top:30px;

            width:180px;

            font-size:20px;
            border-radius:12px;
        }

    </style>

</head>

<body>

    <div class="contenedor">

        <div class="lado-izquierdo">

            <h1 class="titulo">
                VORTEX 360°
            </h1>

            <p class="descripcion">

                Sistema inteligente de gestión e inventario tecnológico.

            </p>

            <a href="{{ route('login') }}"
               class="btn btn-primary btn-ingresar">

                Ingresar

            </a>

        </div>

        <div class="lado-derecho">

        </div>

    </div>

</body>
</html>
