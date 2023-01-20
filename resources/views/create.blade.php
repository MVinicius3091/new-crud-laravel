@extends('index')

@section('content')

    <div class="container">
        <h1>Cadastrar Novo Aluno</h1>   

        @if (session('message'))
            <h4 class="alert alert-success">{{session('message')}}</h4>
        @endif
        
        <form action="{{route('create.user')}}" method="POST" class="g-3">
            @csrf
            
            <div class="col-sm-3">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" class="form-control" name="nome" value="{{ old('nome') }}">
            </div>
            <p class="text-danger"> {{ $errors->first('nome') }} </p>
            
            <div class="col-sm-3">
              <label for="sobrenome" class="form-label">Sobrenome</label>
              <input type="text" class="form-control" name="sobrenome" value="{{ old('sobrenome') }}">
            </div>
            <p class="text-danger"> {{ $errors->first('sobrenome') }} </p>
            
            <div class="col-sm-3">
              <label class="form-label" for="status">Admin?</label>
              <input type="checkbox" class="form-input" name="status" value="1">
            </div>

            <div class="col-sm-3">
              <label class="form-label" for="email">Email</label>
              <input type="text" class="form-control" name="email" value="{{ old('email') }}">
            </div>
            <p class="text-danger"> {{ $errors->first('email') }} </p>
            
            <div class="col-sm-3">
              <label class="form-label" for="telefone">Telefone</label>
              <input type="text" class="form-control" name="telefone" value="{{ old('telefone') }}">
            </div>
            <p class="text-danger"> {{ $errors->first('telefone') }} </p>

            <div>
              <button type="submit" class="btn btn-primary mt-2">Cadastrar</button>
              <a href="{{ route('home') }}" class="btn btn-info mt-2">Voltar</a>
            </div>

          </form>
    </div>

@endsection