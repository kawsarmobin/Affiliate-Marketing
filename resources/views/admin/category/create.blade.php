@extends('layouts.admin')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">
      Create Category
    </div>

    <div class="panel-body">

      @include('includes.errors')

      <form class="form-horizontal" action="{{ route('category.store') }}" method="post">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="name" class="col-md-2 control-label">Name</label>

          <div class="col-md-8">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            <div class="pull-right">
              <button type="submit" class="btn btn-xs btn-primary">
                Submit
              </button>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
@endsection
