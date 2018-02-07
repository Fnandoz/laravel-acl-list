@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-8 col-md-offset-2">
    <form action="/home/usuario/salva" method="POST">
      {{csrf_field()}}
      <div class="form-group">
        <label for="emailInput">Email address</label>
        <input type="email" class="form-control" id="emailInput" placeholder="Enter email" name="email">
      </div>

      <div class="form-group">
        <label for="pwdInput">Password</label>
        <input type="password" class="form-control" id="pwdInput" placeholder="Password" name="password">
      </div>

      <small class="form-text text-muted">Escolha as regras para o usuario</small>
      <div class="row">

        @foreach ($regras as $regra)
        <div class="col-6 col-md-4">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" name="regras[]" value="{{$regra->titulo}}">
            <label class="form-check-label" for="exampleCheck1">{{$regra->titulo}}</label>
          </div>
        </div>
        @endforeach

      </div>


      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="/home/usuario" class="btn btn-danger" role="button">Cancelar</a>
    </form>
  </div>
</div>
@endsection
