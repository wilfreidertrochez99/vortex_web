@extends('layouts.app')

@section('content')

        <h1 class="fw-bold text-dark mb-4">
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

                title: '¿Eliminar Proveedor?',
                text: 'Confirma si deseas eliminar este proveedor.',
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