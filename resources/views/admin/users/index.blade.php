@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Users
                    <a href="{{ route('users.create') }} " class="btn btn-success btn-xs">Novo Usuário</a>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td width="1%" nowrap>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-xs">Editar</a>
                                        <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger btn-xs">Excluir</a>
                                    </td>
                                </tr>
                            @empty
                            <p>Nenhuma Permissão cadastrada.</p>
                            @endforelse
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection