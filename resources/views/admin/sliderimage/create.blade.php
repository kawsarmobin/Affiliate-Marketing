@extends('layouts.admin')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">
      Slider Image
    </div>

    <div class="panel-body">

      @include('includes.errors')

      <form class="form-horizontal" action="{{ route('sliderimage.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="image" class="col-md-4 control-label">Image</label>

          <div class="col-md-6">
            <input type="file" class="form-control" name="image">
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            <div class="pull-right">
              <button type="submit" class="btn btn-xs btn-primary">
                Upload
              </button>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
@endsection
