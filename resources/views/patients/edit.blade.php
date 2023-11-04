@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card auth-bg">
                    <div class="card-header auth-bg__accent text-light fw-bold">Editar Paciente</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('patients.update', $patient->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="fw-bold text-light" for="name">Nombre</label>
                                <input type="text" class="form-control fw-bold" id="name" name="name"
                                    placeholder="Ingrese el nombre" value="{{ $patient->name }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label class="fw-bold text-light" for="age">Edad</label>
                                <input type="number" class="form-control fw-bold" id="age" name="age"
                                    placeholder="Ingrese la edad" value="{{ $patient->age }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label class="fw-bold text-light" for="race">Raza</label>
                                <input type="text" class="form-control fw-bold" id="race" name="race"
                                    placeholder="Ingrese la raza" value="{{ $patient->race }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label class="fw-bold text-light" for="profile_image">Imagen</label>
                                <input type="file" class="form-control fw-bold" id="profile_image" name="profile_image">
                            </div>

                            <button type="submit" class="btn fw-bold btn-primary mt-3">Guardar</button>
                            <a href="{{ route('patients.index') }}" class="btn fw-bold btn-danger mt-3">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
