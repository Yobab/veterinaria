@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card auth-bg">
                    <div class="card-header auth-bg__accent text-light fw-bold">Detalles del Tratamiento</div>

                    <div class="card-body">

                        <div class="form-group">
                            <label class="fw-bold text-light" for="name">Nombre</label>
                            <input type="text" class="form-control fw-bold" id="name" name="name"
                                value="{{ $treatment->name }}" placeholder="Ingrese el título" readonly>
                        </div>

                        <div class="form-group">
                            <label class="fw-bold text-light" for="description">Descripción</label>
                            <input type="text" class="form-control fw-bold" id="description" name="description"
                                placeholder="Ingrese el descripción" value="{{ $treatment->description }}" readonly>
                        </div>
                        @can('edit-treatments')
                        <a href="{{ route('treatments.edit', $treatment->id) }}" class="btn fw-bold btn-primary mt-3">Editar</a>
                        @endcan
                        <a href="{{ route('treatments.index') }}" class="btn fw-bold btn-danger mt-3">Regresar</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
