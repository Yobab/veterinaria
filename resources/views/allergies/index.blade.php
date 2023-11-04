@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card auth-bg">
                <div class="card-header auth-bg__accent text-light fw-bold">Alergias</div>

                <div class="card-body">
                    @can('create-allergies')
                    <a href="{{ route('allergies.create') }}" class="btn fw-bold btn-primary mb-3">Agregar Nueva
                        Alergia</a>
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
                                <th class="auth-bg__accent text-light fw-bold">Tratamiento</th>
                                <th class="auth-bg__accent text-light fw-bold">Paciente</th>
                                <th class="auth-bg__accent text-light fw-bold">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allergies as $allergy)
                            <tr>
                                <td class="auth-bg text-light fw-bold">{{ $allergy->name }}</td>
                                <td class="auth-bg text-light fw-bold">{{ $allergy->treatment->name ?? 'No Seleccionado'
                                    }}</td>
                                <td class="auth-bg text-light fw-bold">{{ $allergy->patient->name }}</td>
                                <td class="auth-bg text-light fw-bold">
                                    @can('view-allergies')
                                    <a href="{{ route('allergies.show', $allergy->id) }}"
                                        class="btn fw-bold btn-info">Ver</a>
                                    @endcan
                                    @can('edit-allergies')

                                    <a href="{{ route('allergies.edit', $allergy->id) }}"
                                        class="btn fw-bold btn-primary">Editar</a>
                                    @endcan
                                    @can('delete-allergies')
                                    <form action="{{ route('allergies.destroy', $allergy->id) }}" method="POST"
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
