@extends('layouts.app')

@section('content')
<div class="container">
  
  @can('cria-lista')
  <div class="row">
    <form class="form" action="/home/lista/novo" method="post">
      {{csrf_field()}}
      <div class="col-12 col-md-8">
        <input class="form-control mr-sm-2" type="text" placeholder="Novo item" name="titulo">
      </div>
      <div class="col-6 col-md-4">
        <button class="btn btn-success" type="submit">Adicionar</button>
      </div>
    </form>
  </div>
  <br>
  @endcan

  @can('le-lista')
  <form class="form-inline" action="/home/lista/busca" method="POST">
    {{csrf_field()}}
    <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar" name="termo">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
  </form>
  <strong>{{$mensagem}}</strong>
  @endcan

  <ul class="list-group">
    @can('le-lista')
    @foreach ($lista as $item)
    <li class="list-group-item">
      <div class="row">
        <div class="col-sm-8">
          {{$item->titulo}}
        </div>
        <div class="col col-lg-2">
          @can('atualiza-lista')
          <a href="/home/lista/{{$item->id}}/atualizar" class="btn btn-primary" role="button">Editar</a>
          @endcan
        </div>
        <div class="col col-lg-2">
          @can('apaga-lista')
          <form action="/home/lista/apaga" method="post">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$item->id}}">
            <button class="btn btn-danger" type="submit">Apagar</button>
          </form>
          @endcan
        </div>
      </div>
    </li>
    @endforeach
    @endcan
  <ul>

</div>
@endsection
