@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card auth-bg">
                    <div class="card-header auth-bg__accent text-light fw-bold">Editar Cita</div>

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
                        <form method="POST" action="{{ route('dates.update', $date->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="fw-bold text-light" for="title">Título</label>
                                <input type="text" class="form-control fw-bold" id="title" name="title"
                                    value="{{ $date->title }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label class="fw-bold text-light" for="description">Descripción</label>
                                <input type="text" class="form-control fw-bold" id="description" name="description"
                                    value="{{ $date->description }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label class="fw-bold text-light" for="datetime">Fecha y Hora</label>
                                <input type="datetime-local" class="form-control fw-bold" id="datetime" name="datetime"
                                    value="{{ \Carbon\Carbon::parse($date->datetime)->format('Y-m-d\TH:i') }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label class="fw-bold text-light" for="patient_id">Paciente</label>
                                <select class="form-control fw-bold" id="patient_id" name="patient_id" required>
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}"
                                            {{ $patient->id == $date->patient_id ? 'selected' : '' }}>
                                            {{ $patient->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3 fw-bold">Guardar</button>
                            <a href="{{ route('dates.index') }}" class="btn btn-danger mt-3 fw-bold">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
