@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card auth-bg">
                <div class="card-header auth-bg__accent text-light fw-bold">Tratamientos</div>

                <div class="card-body">
                    @can('create-treatments')
                    <a href="{{ route('treatments.create') }}" class="btn fw-bold btn-primary mb-3">Agregar Nueva
                        Tratamiento</a>
                    @endcan
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="auth-bg__accent text-light fw-bold">Nombre</th>
                                <th class="auth-bg__accent text-light fw-bold">Descripción</th>
                                <th class="auth-bg__accent text-light fw-bold">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($treatments as $treatment)
                            <tr>
                                <td class="auth-bg text-light fw-bold">{{ $treatment->name }}</td>
                                <td class="auth-bg text-light fw-bold">{{ $treatment->description }}</td>
                                <td class="auth-bg text-light fw-bold">
                                    @can('create-treatments')
                                    <a href="{{ route('treatments.show', $treatment->id) }}"
                                        class="btn fw-bold btn-info">Ver</a>
                                    @endcan
                                    @can('edit-treatments')
                                    <a href="{{ route('treatments.edit', $treatment->id) }}"
                                        class="btn fw-bold btn-primary">Editar</a>
                                    @endcan
                                    @can('delete-treatments')
                                    <form action="{{ route('treatments.destroy', $treatment->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn fw-bold btn-danger"
                                            onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                    </form>
                                    @endcan

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
