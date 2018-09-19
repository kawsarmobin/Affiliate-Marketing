<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Choose Product</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/modern-business.css') }}" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('public.products') }}">
                <h1>Choose Product</h1>
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li  class="nav-item"><h5><a style="color: #c63939" class="nav-link" href="{{ route('public.products') }}">Home</a></h5></li>
                    @if ($categories)
                        @foreach ($categories as $category)
                            <li class="nav-item">
                                <h5><a style="color: #c63939" class="nav-link" href="{{ route('public.product.categoryWise', $category->slug) }}">{{ $category->name }}</a></h5>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    <div style="padding-top: 27px;" class="col-md-12">
        @yield('content')
    </div>


        {{-- <p class="m-0 text-center text-white">
            @include('public.includes.copyright')
        </p> --}}

    <!-- Footer -->
    <footer class="py-4 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright @include('public.includes.copyright') choseproduct.com</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
