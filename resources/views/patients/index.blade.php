@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card auth-bg">
                <div class="card-header auth-bg__accent text-light fw-bold">Pacientes</div>

                <div class="card-body">
                    @can('create-dates')
                    <a href="{{ route('patients.create') }}" class="btn fw-bold btn-primary mb-3">Agregar Nuevo
                        Paciente</a>
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
                                <th class="auth-bg__accent text-light fw-bold">Edad</th>
                                <th class="auth-bg__accent text-light fw-bold">Raza</th>
                                <th class="auth-bg__accent text-light fw-bold">Imagen</th>
                                <!-- Added a new table heading for the image -->
                                <th class="auth-bg__accent text-light fw-bold">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                            <tr>
                                <td class="auth-bg text-light fw-bold">{{ $patient->name }}</td>
                                <td class="auth-bg text-light fw-bold">{{ $patient->age }}</td>
                                <td class="auth-bg text-light fw-bold">{{ $patient->race }}</td>
                                <td class="auth-bg text-light fw-bold"><img class="img-thumbnail"
                                        style="width: 5rem; height: auto;"
                                        src="{{ 'profile_images/' . $patient->profile_image}}"
                                        alt="{{ $patient->name }}"></td>
                                <td class="auth-bg text-light fw-bold">
                                    @can('view-dates')
                                    <a href="{{ route('patients.show', $patient->id) }}"
                                        class="btn fw-bold btn-info">Ver</a>
                                    <a href="{{ route('patients.showPdf', $patient->id) }}"
                                        class="btn fw-bold btn-warning">PDF</a>
                                    @endcan
                                    @can('edit-dates')
                                    <a href="{{ route('patients.edit', $patient->id) }}"
                                        class="btn fw-bold btn-primary">Editar</a>
                                    @endcan
                                    @can('delete-dates')
                                    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn fw-bold btn-danger"
                                            onclick="return confirm('Estas seguro?')">Eliminar</button>
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
