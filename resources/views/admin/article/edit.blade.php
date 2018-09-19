@extends('layouts.admin')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">
      Update Article
    </div>

    <div class="panel-body">

      @include('includes.errors')
      @include('includes.message')

      <form class="form-horizontal" action="{{ route('article.update', $article->id) }}" method="post">
        {{ csrf_field() }} {{ method_field('put') }}

        <div class="form-group">
          <label for="title" class="col-md-2 control-label">Title</label>

          <div class="col-md-8">
            <input type="text" class="form-control" name="title" value="{{ $article->title }}">
          </div>
        </div>

        <div class="form-group">
          <label for="des" class="col-md-2 control-label">Description</label>

          <div class="col-md-8">
            <textarea  class="form-control" id="summernote" name="des" rows="4" cols="80">{{ $article->des }}</textarea>
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
