@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card auth-bg">
                    <div class="card-header auth-bg__accent text-light fw-bold">Editar Tratamiento</div>

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
                        <form method="POST" action="{{ route('treatments.update', $treatment->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="fw-bold text-light" for="name">Nombre</label>
                                <input type="text" class="form-control fw-bold" id="name" name="name"
                                    value="{{ $treatment->name }}" placeholder="Ingrese el título" required>
                            </div>
                            <div class="form-group">
                                <label class="fw-bold text-light" for="description">Descripción</label>
                                <input type="text" class="form-control fw-bold" id="description" name="description"
                                    placeholder="Ingrese el descripción" value="{{ $treatment->description }}"  required>
                            </div>

                            <button type="submit" class="btn fw-bold btn-primary mt-3">Guardar</button>
                            <a href="{{ route('treatments.index') }}" class="btn fw-bold btn-danger mt-3">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
