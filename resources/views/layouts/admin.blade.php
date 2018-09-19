<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('admin.name', 'Choose Product') }}</title>

    {{-- <title>Choose Product</title> --}}


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('admin.name', 'Choose Product') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="col-md-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                  Menu
                </div>

                <div class="panel-body">
                  <ul class="list-group">
                    <li class="list-group-item"><a href="{{ route('home') }}">Dashboard</a></li>

                    @if (Auth::user()->is_admin == 1)
                      <li class="list-group-item"><a href="{{ route('category.create') }}">Create Category</a></li>
                      <li class="list-group-item"><a href="{{ route('category.index') }}">All Category</a></li>

                      <li class="list-group-item"><a href="{{ route('sliderimage.create') }}">Upload Slider Image</a></li>
                      <li class="list-group-item"><a href="{{ route('sliderimage.index') }}">All Slider Image</a></li>

                      <li class="list-group-item"><a href="{{ route('article.create') }}">Create Article</a></li>
                      <li class="list-group-item"><a href="{{ route('article.index') }}">All Article</a></li>
                    @endif

                    <li class="list-group-item"><a href="{{ route('product.create') }}">Create Product</a></li>
                    <li class="list-group-item"><a href="{{ route('product.index') }}">All Product</a></li>
                  </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
          @yield('content')
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script><!-- include libraries(jQuery, bootstrap) -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <!-- include summernote css/js -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
</body>
</html>
