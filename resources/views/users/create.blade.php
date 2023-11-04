@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card auth-bg">
                <div class="card-header auth-bg__accent text-light fw-bold">Agregar Nuevo Tratamiento</div>

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

                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-light" for="name">Nombre</label>
                                    <input type="text" name="name" class="form-control fw-bold">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-light" for="email">Correo Electrónico</label>
                                    <input type="text" name="email" class="form-control fw-bold">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-light" for="password">Contraseña</label>
                                    <input type="password" name="password" class="form-control fw-bold">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-light" for="confirm-password">Confirmar
                                        Contraseña</label>
                                    <input type="password" name="password_confirmation" class="form-control fw-bold">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-light" for="">Roles</label>
                                    <select name="roles[]" class="form-control fw-bold">
                                        @foreach($roles as $role)
                                        <option value="{{ $role }}">{{ $role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn fw-bold btn-primary mt-3">Guardar</button>
                                <a href="{{ route('users.index') }}" class="btn fw-bold btn-danger mt-3">Cancelar</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
