@extends('layouts.app')

@section('content')
<div class="container">
  <a href="/home/" class="btn btn-primary" role="button">Voltar</a>
  <a href="/home/usuario/novo" class="btn btn-primary" role="button">Novo</a>
  <ul class="list-group">
      @foreach ($usuarios as $usuario)
      <li class="list-group-item">
        <div class="row">
          <div class="col-sm-8">
            {{$usuario->email}}
            <span class="badge badge-primary badge-pill">{{$usuario->regras->count()}}</span>
          </div>
          <div class="col col-lg-2">
            <a href="/home/usuario/{{$usuario->id}}/" class="btn btn-primary" role="button">Ver</a>
            <a href="/home/usuario/{{$usuario->id}}/atualizar" class="btn btn-primary" role="button">Editar</a>
          </div>
          <div class="col col-lg-2">
            <form action="/home/usuario/apaga" method="post">
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{$usuario->id}}">
              <button class="btn btn-danger" type="submit">Apagar</button>
            </form>
          </div>
        </div>
      </li>
      @endforeach
  <ul>
</div>
@endsection
