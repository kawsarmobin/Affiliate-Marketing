@extends('layouts.public')

@section('content')
  <div class="container">

    @include('public.includes.slider')

    @if ($articles)
      @foreach ($articles as $article)
        <!-- Marketing Icons Section -->

        <h1 style="text-align:center; padding-top: 35px;">{{ $article->title }}</h1>

        <div class="col-md-12 text-justify">
          <p>{!! $article->des !!}</p>
        </div>
        <!-- /.row -->
      @endforeach
    @endif

    <div class="table-responsive">
      <table class="table table-striped">
        <thead class="bg-success" style="color:white">
          <th>Picture</th>
          <th>Name</th>
          <th>Price</th>
        </thead>
        <tbody>
          @if ($products)
            @foreach ($products as $product)
              <tr>
                <td>
                  <a href="{{ route('public.product.show', $product->slug) }}"><img src="{{ $product->picture }}" alt="No Picture" width="100px" height="70px">
                </td>
                <td><a target="_blank" style="text-decoration: none; color: black;" href="{{ route('public.product.show', $product->slug) }}">{{ $product->name }}</a></td>
                <td><a target="_blank" href="{{ $product->price }}" class="btn btn-primary btn_plus_infos">Price</a></td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>

    <!-- Features Section -->
    <div class="col-md-12">
      <h2 style="text-align: center; color: #EE360E">Modern Business Features</h2>
    </div>
    <div class="table-responsive">
      <table class="table">
          <tbody>
              @if ($features)
                  @php $i = 1; @endphp
                  @foreach ($features as $feature)
                      <tr>
                          <td style="padding-right: 0px">{{ $i }}</td>
                          <td><a style="text-decoration: none;" href="{{ route('public.product.show', $feature->slug) }}">{{ $feature->name }}</a></td>
                      </tr>
                      <?php $i++;?>
                  @endforeach
              @endif
          </tbody>
      </table>
    </div>
    <!-- /.row -->

    <!-- Portfolio Section -->
    <h2 style="text-align:center">Recommended Best Products for you</h2>
    <p style="text-align:center">I reviewed dozens of inflatable kayaks in the market and we discovered that these are the best of the bunch.</p>

    <div class="row">
      @if ($products)
        @foreach ($products as $product)
          <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
              <a href="{{ route('public.product.show', $product->slug) }}"><img class="card-img-top" src="{{ $product->picture }}" alt="No Picture"  width="400px" height="200px"></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a style="text-decoration: none;" href="{{ route('public.product.show', $product->slug) }}">{{ $product->name }}</a>
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
    <!-- /.row -->

  </div>
@endsection
