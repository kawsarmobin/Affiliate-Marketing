@extends('layouts.admin')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif

      <h3 class="text-center">Welcome {{Auth::user()->name}}</h3>

    </div>
  </div>
@endsection
