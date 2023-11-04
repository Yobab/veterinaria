@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card auth-bg">
                    <div class="card-header auth-bg__accent text-light fw-bold">Detalles del Paciente</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label class="fw-bold text-light" for="name">Nombre</label>
                            <input type="text" class="form-control fw-bold" id="name" name="name"
                                placeholder="Ingrese el nombre" value="{{ $patient->name }}" readonly>
                        </div>

                        <div class="form-group mt-3">
                            <label class="fw-bold text-light" for="age">Edad</label>
                            <input type="number" class="form-control fw-bold" id="age" name="age"
                                placeholder="Ingrese la edad" value="{{ $patient->age }}" readonly>
                        </div>

                        <div class="form-group mt-3">
                            <label class="fw-bold text-light" for="race">Raza</label>
                            <input type="text" class="form-control fw-bold" id="race" name="race"
                                placeholder="Ingrese la raza" value="{{ $patient->race }}" readonly>
                        </div>

                        <div class="form-group mt-3">
                            <label class="fw-bold text-light" for="profile_image">Imagen</label>
                            <input type="file" class="form-control fw-bold" id="profile_image" name="profile_image">
                        </div>
                        @can('edit-patients')
                        <a href="{{ route('patients.edit', $patient->id) }}" class="btn fw-bold btn-primary mt-3">Editar</a>
                        @endcan
                        <a href="{{ route('patients.index') }}" class="btn fw-bold btn-danger mt-3">Regresar</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
