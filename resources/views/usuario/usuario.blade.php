@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-8 col-md-offset-2">
    <div class="row">
      <div class="col-4 col-md-4">
        <a class="btn btn-primary" href="/home/usuario/" role="button">
          Voltar
        </a>
        <a class="btn btn-primary" href="/home/usuario/{{$usuario->id}}/atualizar" role="button">
          Editar
        </a>
      </div>
      <form action="/home/usuario/apaga" method="post">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$usuario->id}}">
        <button class="btn btn-danger" type="submit">Apagar</button>
      </form>
    </div>
    <ul class="list-group">
      <li class="list-group-item">{{$usuario->name}}</li>
      <li class="list-group-item">{{$usuario->email}}</li>
      @foreach ($usuario->regras as $regra)
      <li class="list-group-item">{{$regra->titulo}}</li>
      @endforeach

    </ul>


  </div>
</div>
@endsection
