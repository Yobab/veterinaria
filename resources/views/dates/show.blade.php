@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card auth-bg">
                    <div class="card-header auth-bg__accent text-light fw-bold">Detalles de la Cita</div>

                    <div class="card-body">

                        <div class="form-group">
                            <label class="fw-bold text-light" for="title">Título</label>
                            <input type="text" class="form-control fw-bold" id="title" name="title"
                                value="{{ $date->title }}" readonly>
                        </div>

                        <div class="form-group mt-3">
                            <label class="fw-bold text-light" for="description">Descripción</label>
                            <input type="text" class="form-control fw-bold" id="description" name="description"
                                value="{{ $date->description }}" readonly>
                        </div>

                        <div class="form-group mt-3">
                            <label class="fw-bold text-light" for="datetime">Fecha y Hora</label>
                            <input type="datetime-local" class="form-control fw-bold" id="datetime" name="datetime"
                                value="{{ \Carbon\Carbon::parse($date->datetime)->format('Y-m-d\TH:i') }}" readonly>
                        </div>

                        <div class="form-group mt-3">
                            <label class="fw-bold text-light" for="patient_id">Paciente</label>
                            <select class="form-control fw-bold" id="patient_id" name="patient_id" readonly>
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}"
                                        {{ $patient->id == $date->patient_id ? 'selected' :  'disabled' }}>
                                        {{ $patient->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @can('edit-dates')
                        <a href="{{ route('dates.edit', $date->id) }}" class="btn btn-primary mt-3 fw-bold">Editar</a>
                        @endcan
                        <a href="{{ route('dates.index') }}" class="btn btn-danger mt-3 fw-bold">Regresar</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
