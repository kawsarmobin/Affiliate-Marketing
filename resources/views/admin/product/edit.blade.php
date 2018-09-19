@extends('layouts.admin')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">
      Update Product
    </div>

    <div class="panel-body">

      @include('includes.errors')
      @include('includes.message')

      <form class="form-horizontal" action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }} {{ method_field('put') }}

        <div class="form-group">
          <label for="picture" class="col-md-2 control-label">Old Picture</label>

          <div class="col-md-8">
            <img src="{{ $product->picture }}" alt="No Picture" width="400px" height="200px">
          </div>
        </div>

        <div class="form-group">
          <label for="picture" class="col-md-2 control-label">New Picture</label>

          <div class="col-md-8">
            <input type="file" class="form-control" name="picture">
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-2 control-label">Name</label>

          <div class="col-md-8">
            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-2 control-label">Category</label>

          <div class="col-md-8">
            <select class="form-control" name="category">
                @foreach ($categories as $cat)
                    <option {{ $product->category_id == $cat->id ? 'selected' : '' }} value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="product_dimensions" class="col-md-2 control-label">Product Dimensions</label>

          <div class="col-md-8">
            <input type="text" class="form-control" name="product_dimensions" value="{{ $product->product_dimensions }}">
          </div>
        </div>

        <div class="form-group">
          <label for="about" class="col-md-2 control-label">About</label>

          <div class="col-md-8">
            <textarea id="summernote" class="form-control" name="about" rows="8" cols="40">{{ $product->about }}</textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="price" class="col-md-2 control-label">Price</label>

          <div class="col-md-8">
            <input type="text" class="form-control" name="price" value="{{ $product->price }}">
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
