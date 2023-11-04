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


                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-light" for="name">Nombre del Rol</label>
                                    <input type="text" name="name" class="form-control fw-bold"
                                        value="{{ $role->name }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-light" for="name">Permisos del Rol</label>
                                    <br>
                                    @foreach ($permission as $value)
                                    <label class="fw-bold text-light" class="form-control fw-bold">
                                        <input type="checkbox" name="permission[]" value="{{ $value->name }}" {{
                                            in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                                        {{ $value->name }}
                                    </label>
                                    <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary fw-bold mt-3">Guardar</button>
                                <a href="{{ route('roles.index') }}" class="btn fw-bold btn-danger mt-3">Cancelar</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
