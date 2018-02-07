@extends('layouts.app')

@section('content')
<div class="container">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <form action="/home/usuario/atualizar" method="post">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$usuario->id}}">
        <div class="form-group">
          <label for="nomeInput">Nome</label>
          <input type="text" class="form-control" id="nomeInput" placeholder="nome" name="nome" value="{{$usuario->name}}">
        </div>
        <div class="form-group">

          <label for="emailInput">Email address</label>
          <input type="email" class="form-control" id="emailInput" placeholder="Enter email" name="email" value="{{$usuario->email}}">
        </div>

        <div class="form-group">
          <label for="pwdInput">Password</label>
          <input type="password" class="form-control" id="pwdInput" placeholder="Password" name="password" value="password">
        </div>

        <small class="form-text text-muted">Escolha as regras para o usuario</small>
        <div class="row">


          @foreach ($regras as $regra)
          <div class="col-6 col-md-4">
            <div class="form-check">
              @if ($usuario->regras->contains($regra))
              <input type="checkbox" class="form-check-input" name="regras[]" value="{{$regra->id}}" checked>
              @else
              <input type="checkbox" class="form-check-input" name="regras[]" value="{{$regra->id}}">
              @endif
              <label class="form-check-label" for="exampleCheck1">{{$regra->titulo}}</label>
            </div>
          </div>
          @endforeach

        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="/home/usuario" class="btn btn-danger" role="button">Cancelar</a>
      </form>
    </div>
  </div>
</div>
@endsection
