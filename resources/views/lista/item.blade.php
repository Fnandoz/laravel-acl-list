@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-8">
      Título:  {{$item->titulo}}
    </div>
  </div>
  <div class="row">
    <div class="col col-lg-2 offset-md-4">
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

</div>
@endsection
