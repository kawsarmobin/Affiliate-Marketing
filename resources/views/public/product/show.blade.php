@extends('layouts.public')

@section('content')

    <div class="container">

        <br>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('public.products') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Product</li>
        </ol>

        <!-- Image Header -->
        <div class="text-center">
            <img class="img-fluid rounded mb-4" src="{{ $product->picture }}" alt="">
        </div>

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="card h-100">
                    <div class="card-header">
                        <h4 class="">{{ $product->name }}</h4>
                        Category: <a href="{{ route('public.product.categoryWise', $product->category->slug) }}">{{ $product->category->name }}</a>
                    </div>

                    <div class="card-body text-justify">
                        <p class="card-text">{!! $product->about !!}</p>
                        @if ($product->product_dimensions)
                            <hr>
                            <div class="text-justify">
                                <h5>Product Dimensions</h5>
                                <p class="card-text">{!! $product->product_dimensions !!}</p>
                            </div>
                        @endif

                    </div>
                    <div class="card-footer text-center">
                        <a target="_blank" href="{{ $product->price }}" class="btn btn-primary">Check Latest Price</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div> <br>

@endsection
