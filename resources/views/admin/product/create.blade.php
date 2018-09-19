@extends('layouts.admin')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">
      Create Product
    </div>

    <div class="panel-body">

      @include('includes.errors')
      @include('includes.message')

      <form class="form-horizontal" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="picture" class="col-md-2 control-label">Picture</label>

          <div class="col-md-8">
            <input type="file" class="form-control" name="picture">
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-2 control-label">Name</label>

          <div class="col-md-8">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-2 control-label">Category</label>

          <div class="col-md-8">
            <select class="form-control" name="category">
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="product_dimensions" class="col-md-2 control-label">Product Dimensions</label>

          <div class="col-md-8">
            <input type="text" class="form-control" name="product_dimensions" value="{{ old('product_dimensions') }}">
          </div>
        </div>

        <div class="form-group">
          <label for="about" class="col-md-2 control-label">About</label>

          <div class="col-md-8">
            <textarea id="summernote" class="form-control" name="about" rows="8" cols="40">{{ old('about') }}</textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="price" class="col-md-2 control-label">Price</label>

          <div class="col-md-8">
            <input type="text" class="form-control" name="price" value="{{ old('price') }}">
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
