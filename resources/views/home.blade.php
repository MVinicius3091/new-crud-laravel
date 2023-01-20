@extends('index')

@section('content')

    <div class="container">
        <h1>Lista de Usuários</h1>

        @if (session('message'))
            <h4 class="alert alert-success">{{session('message')}}</h4>
        @endif
        
        <table class="table display"  id="table_id" >
            <thead>
                <tr class="text-center">
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sobrenome</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)

                <tr class="text-center">
                    <td>{{ $user->id }}</td>                    
                    <td>{{ $user->nome }}</td>                    
                    <td>{{ $user->sobrenome }}</td>                    
                    <td>@if ($user->status == 1)
                        {{ $user->status = 'Sim' }}
                    @else
                        {{ $user->status = 'Não' }}
                        
                    @endif</td>                    
                    <td>{{ $user->email }}</td>                    
                    <td>{{ $user->telefone }}</td>                    
                    <td class="d-flex justify-content-evenly">
                        <a href="{{ route('edit', $user->id) }}" class="btn btn-success">Editar</a>
                        <form action="{{ route('delete', $user->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
