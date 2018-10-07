@extends('layouts.admin')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">
      Update Category
    </div>

    <div class="panel-body">

      @include('includes.errors')

      <form class="form-horizontal" action="{{ route('category.update', $category->id) }}" method="post">
        {{ csrf_field() }} {{ method_field('put') }}

        <div class="form-group">
          <label for="name" class="col-md-2 control-label">Name</label>

          <div class="col-md-8">
            <input type="text" class="form-control" name="name" value="{{ ucwords($category->name) }}">
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            <div class="pull-right">
              <button type="submit" class="btn btn-xs btn-primary">
                Update
              </button>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
@endsection
