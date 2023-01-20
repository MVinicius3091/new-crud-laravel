@extends('index')

@section('content')

    <div class="container">
        <h1>Editar Aluno</h1>   

        @if (session('message'))
            <h4 class="alert alert-success">{{session('message')}}</h4>
        @endif  
        
        <form action="{{route('update', $val->id)}}" method="POST" class="g-3">
            @csrf
            
            <div class="col-sm-3">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" class="form-control" name="nome" value="{{ $val->nome }}">
            </div>
            {{ $errors->first('nome') }}
            
            <div class="col-sm-3">
              <label for="sobrenome" class="form-label">Sobrenome</label>
              <input type="text" class="form-control" name="sobrenome" value="{{ $val->sobrenome }}">
            </div>
            {{ $errors->first('sobrenome') }}
            
            <div class="col-sm-3">
              <label class="form-label" for="status">Admin?</label>
              <input type="checkbox" class="form-input" name="status" @if ($val->status == 1) @checked(true) @endif>
            </div>

            <div class="col-sm-3">
              <label class="form-label" for="email">Email</label>
              <input type="text" class="form-control" name="email" value="{{ $val->email }}">
            </div>
            {{ $errors->first('email') }}
            
            <div class="col-sm-3">
              <label class="form-label" for="telefone">Telefone</label>
              <input type="text" class="form-control" name="telefone" value="{{ $val->telefone }}">
            </div>
            {{ $errors->first('telefone') }}

            <div>
              <button type="submit" class="btn btn-primary mt-2">Editar</button>
              <a href="{{ route('home') }}" class="btn btn-info mt-2">Voltar</a>
            </div>

          </form>
    </div>

@endsection