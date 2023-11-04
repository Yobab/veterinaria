@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card auth-bg">
                <div class="card-header auth-bg__accent text-light fw-bold">Usuarios</div>

                <div class="card-body">
                    @can('create-users')
                    <a class="btn fw-bold btn-primary mb-3" href="{{ route('users.create') }}">Nuevo Usuario</a>
                    @endcan
                    <table class="table table-striped mt-2">
                        <thead style="background-color: #003366">
                            <th class="auth-bg__accent text-light fw-bold">ID</th>
                            <th class="auth-bg__accent text-light fw-bold">Nombre</th>
                            <th class="auth-bg__accent text-light fw-bold">Correo Electrónico</th>
                            <th class="auth-bg__accent text-light fw-bold">Rol</th>
                            <th class="auth-bg__accent text-light fw-bold">Acciones</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="auth-bg text-light fw-bold">{{ $user->id }}</td>
                                <td class="auth-bg text-light fw-bold">{{ $user->name }}</td>
                                <td class="auth-bg text-light fw-bold">{{ $user->email }}</td>
                                <td class="auth-bg text-light fw-bold">
                                    @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $rolName )
                                    <h5><span class="badge badge-dark">{{ $rolName}}</span></h5>
                                    @endforeach
                                    @endif
                                </td>
                                <td class="auth-bg text-light fw-bold">
                                    @can('edit-users')
                                    <a class="btn btn-info" href="{{ route('users.edit', $user->id) }}">Editar</a>
                                    @endcan
                                    @can('delete-users')
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
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
                    <div class="pagination justify-content-end">
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
