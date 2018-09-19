@extends('layouts.admin')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">
      {{ $product->name }}
    </div>

    <div class="panel-body">

      <div class="col-md-12">
        <div class="form-group">
          <label for="picture" class="col-md-3 control-label">Picture</label>

          <div class="col-md-9">
            <img src="{{ $product->picture }}" alt="No Picture" width="400px" height="200px">
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top:  30px;">
        <div class="form-group">
          <label for="name" class="col-md-3 control-label">Name</label>

          <div class="col-md-9">
            {{ $product->name }}
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top:  30px;">
        <div class="form-group">
          <label for="name" class="col-md-3 control-label">Category</label>

          <div class="col-md-9">
            {{ $product->category->name }}
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top:  20px;">
        <div class="form-group">
          <label for="product_dimensions" class="col-md-3 control-label">Product Dimensions</label>

          <div class="col-md-9">
            {{ $product->product_dimensions }}
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top:  20px;">
        <div class="form-group">
          <label for="about" class="col-md-3 control-label">About</label>

          <div class="col-md-9">
            {!! $product->about !!}
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top:  20px;">
        <div class="form-group">
          <label for="price" class="col-md-3 control-label">Price</label>

          <div class="col-md-9">
            {{ $product->price }}
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
