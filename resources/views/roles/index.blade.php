@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card auth-bg">
                <div class="card-header auth-bg__accent text-light fw-bold">Roles</div>

                <div class="card-body">
                    @can('create-users')
                    <a href="{{ route('roles.create') }}" class="btn fw-bold btn-primary mb-3">Crear Rol</a>
                    @endcan
                    <table class="table table-striped mt-2">
                        <thead style="background-color: #003366">
                            <th class="auth-bg__accent text-light fw-bold">Rol</th>
                            <th class="auth-bg__accent text-light fw-bold">Acciones</th>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td class="auth-bg text-light fw-bold">{{ $role->name }}</td>
                                <td class="auth-bg text-light fw-bold">
                                    @can('edit-users')

                                    <a class="btn btn-info" href="{{ route('roles.edit', $role->id) }}">Editar</a>
                                    @endcan
                                    @can('delete-users')
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                    @endcan

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
