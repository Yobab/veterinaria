@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card auth-bg">
                    <div class="card-header auth-bg__accent text-light fw-bold">Editar Alergia</div>

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
                        <form method="POST" action="{{ route('allergies.update', $allergy->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="fw-bold text-light"  for="name">Nombre</label>
                                <input type="text" class="form-control fw-bold" id="name" name="name"
                                    value="{{ $allergy->name }}" placeholder="Ingrese el título" required>
                            </div>

                            <div class="form-group mt-3">
                                <label class="fw-bold text-light"  for="treatment_id">Tratamiento</label>
                                <select class="form-control fw-bold" id="treatment_id" name="treatment_id">
                                    <option value="" {{ !$allergy->treatment_id ? 'selected' : '' }}>No
                                        seleccionado</option>
                                    @foreach ($treatments as $treatment)

                                        <option value="{{ $treatment->id }}"
                                            {{ $treatment->id == $allergy->treatment_id ? 'selected' : '' }}>
                                            {{ $treatment->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label class="fw-bold text-light"  for="patient_id">Paciente</label>
                                <select class="form-control fw-bold" id="patient_id" name="patient_id" required>
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}"
                                            {{ $patient->id == $allergy->patient_id ? 'selected' : '' }}>
                                            {{ $patient->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn fw-bold btn-primary mt-3">Guardar</button>
                            <a href="{{ route('allergies.index') }}" class="btn fw-bold btn-danger mt-3">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
