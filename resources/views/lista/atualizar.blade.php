@extends('layouts.app')

@section('content')
<div class="container">
  @can('atualiza')
  <div class="row">
    <form class="form" action="/home/lista/atualizar" method="post">
      {{csrf_field()}}
      <div class="col-12 col-md-8">
        <input type="hidden" name="id" value="{{$item->id}}">
        <input class="form-control" type="text" placeholder="Atualizar título" name="titulo" value="{{$item->titulo}}">
      </div>
      <div class="col-6 col-md-4">
        <button class="btn btn-success" type="submit">Atualizar</button>
      </div>
    </form>
  </div>
  <br>
  @endcan
</div>
@endsection
