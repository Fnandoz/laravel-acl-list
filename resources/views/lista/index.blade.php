@extends('layouts.app')

@section('content')
<div class="container">

  @can('create-list')
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

  <ul class="list-group">
    @can('read-list')
    @foreach ($lista as $item)
    <li class="list-group-item">
      <div class="row">
        <div class="col-sm-8">
          {{$item->titulo}}
        </div>
        <div class="col col-lg-2">
          @can('update-list')
          <a href="/home/lista/{{$item->id}}/atualizar" class="btn btn-primary" role="button">Editar</a>
          @endcan
        </div>
        <div class="col col-lg-2">
          @can('delete-list')
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
