@extends('layouts.app')

@section('content')

<h1 class="fw-bold text-dark mb-4">
    Gestion Inventario TI
</h1>


        <div class="row mb-4">

    <div class="col-md-6">
        <div class="card text-bg-primary shadow">
            <div class="card-body p-1">
                <h6 class="card-title mb-0">Total Equipos</h6>
                <h5 class="mb-0">{{ $totalEquipos }}</h5>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card text-bg-success shadow">
            <div class="card-body p-1">
                <h6 class="card-title mb-0">Equipos Disponibles</h6>
                <h5 class="mb-0">{{ $disponibles }}</h5>
            </div>
        </div>
    </div>

</div>

<div class="row mb-4 align-items-center">

    <div class="col-md-6">

        <form action="{{ route('equipos.index') }}"
              method="GET">

            <div class="input-group">

                <input type="text"
                    name="buscar"
                    class="form-control"
                    placeholder="Buscar Activo Fijo"
                    pattern="[0-9]+"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">

                <button type="submit"
                        class="btn btn-primary">

                    Buscar

                </button>

            </div>

        </form>

    </div>

    <div class="col-md-6 text-md-end mt-3 mt-md-0">

        <a href="{{ route('equipos.create') }}"
            class="btn btn-success">

            Registrar Nuevo Equipo

        </a>

    </div>

</div>

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
                             @if(Auth::check() && Auth::user()->rol != 'tecnico')

                            <form action="{{ route('equipos.destroy', $equipo->codigo) }}"
                                method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-sm btn-danger btn-eliminar">

                                    Eliminar
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

            <script>

    document.querySelectorAll('.btn-eliminar').forEach(boton => {

        boton.addEventListener('click', function(e){

            e.preventDefault();

            let form = this.closest('form');

            Swal.fire({

                title: '¿Eliminar equipo?',
                text: 'Confirma si deseas eliminar este equipo.',
                icon: 'warning',

                showCancelButton: true,

                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',

                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d'

            }).then((result) => {

                if(result.isConfirmed){

                    form.submit();

                }

            });

        });

    });

</script>

        </div>

@endsection