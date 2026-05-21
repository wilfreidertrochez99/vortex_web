@extends('layouts.app')

@section('content')

<h1 class="fw-bold text-dark mb-4">
    Gestión de Usuarios
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
                                    class="btn btn-sm btn-danger btn-eliminar">

                                    Eliminar
                                </button>
                            </form>
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

                title: '¿Eliminar usuario?',
                text: 'Confirma si deseas eliminar este usuario.',
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