@extends('layouts.public')

@section('content')
  <div class="container">
      <br>

      <ol class="breadcrumb">
          <li class="breadcrumb-item">
              <a href="{{ route('public.products') }}">Home</a>
          </li>
          <li class="breadcrumb-item active">{{ $category->name }}</li>
      </ol>

      <div class="row">
        @if ($products)
          @foreach ($products as $product)
            <div class="col-lg-4 col-sm-6 portfolio-item">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="{{ $product->picture }}" alt="No Picture"  width="400px" height="200px"></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a style="text-decoration: none;" href="#">{{ $product->name }}</a>
                  </h4>
                  <p class="card-text">{!! str_limit($product->about, '700') !!}</p>
                </div>
                <div class="card-footer">
                  <a href="{{ route('public.product.show', $product->slug) }}" class="btn btn-primary">Learn More</a>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>

  </div>
@endsection
