@extends('layouts.admin')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">
      Create Article
    </div>

    <div class="panel-body">

      @include('includes.errors')

      <form class="form-horizontal" action="{{ route('article.store') }}" method="post">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="title" class="col-md-2 control-label">Title</label>

          <div class="col-md-8">
            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
          </div>
        </div>

        <div class="form-group">
          <label for="des" class="col-md-2 control-label">Description</label>

          <div class="col-md-8">
            <textarea  class="form-control" id="summernote" name="des" rows="4" cols="80">{{ old('des') }}</textarea>
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

@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection
