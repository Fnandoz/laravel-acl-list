@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <div class="row">
                      <div class="col-6 col-md-4">
                        @can('lista')
                        <a class="btn btn-primary" href="/home/lista" role="button">
                          Lista
                        </a>
                        @endcan
                        <a class="btn btn-primary" href="/home/usuario" role="button">
                          Usuário
                        </a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
