@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card auth-bg">
                    <div class="card-header auth-bg__accent text-light fw-bold">Detalles de la Alergia</div>

                    <div class="card-body">

                        <div class="form-group">
                            <label class="fw-bold text-light"  for="name">Nombre</label>
                            <input type="text" class="form-control fw-bold" id="name" name="name"
                                value="{{ $allergy->name }}" placeholder="Ingrese el título" readonly>
                        </div>

                        <div class="form-group mt-3">
                            <label class="fw-bold text-light"  for="treatment_id">Tratamiento</label>
                            <select class="form-control fw-bold" id="treatment_id" name="treatment_id" readonly>
                                <option value="" {{ !$allergy->treatment_id ? 'selected' : 'disabled' }}>No
                                    seleccionado</option>
                                @foreach ($treatments as $treatment)
                                    <option value="{{ $treatment->id }}"
                                        {{ $treatment->id == $allergy->treatment_id ? 'selected' : 'disabled' }}>
                                        {{ $treatment->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label class="fw-bold text-light"  for="patient_id">Paciente</label>
                            <select class="form-control fw-bold" id="patient_id" name="patient_id" readonly>
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}"
                                        {{ $patient->id == $allergy->patient_id ? 'selected' : 'disabled' }}>
                                        {{ $patient->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @can('edit-allergies')
                        <a href="{{ route('allergies.edit', $allergy->id) }}" class="btn fw-bold btn-primary mt-3">Editar</a>
                        @endcan
                        <a href="{{ route('allergies.index') }}" class="btn fw-bold btn-danger mt-3">Regresar</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
