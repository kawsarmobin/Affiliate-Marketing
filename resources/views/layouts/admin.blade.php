<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('admin.name', 'Choose Product') }}</title>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    // Summernote css
    @yield('styles')

    <link rel="stylesheet" href="{{ asset('bootstrap335/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap335/css/bootstrap.css.map') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap335/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap335/css/bootstrap-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap335/css/bootstrap-theme.css.map') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap335/css/bootstrap-theme.min.css') }}">
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
                                    {{ ucwords(Auth::user()->name) }} <span class="caret"></span>
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

                    <li class="list-group-item"><a href="{{ route('setting') }}">Setting</a></li>

                    @if (Auth::user()->is_admin == 1)
                        <li class="list-group-item"><a href="{{ route('user.create') }}">Create User</a></li>
                        <li class="list-group-item"><a href="{{ route('user.index') }}">All User</a></li>

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
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap335/js/bootstrap.js') }}"></script>
    <script src="{{ asset('bootstrap335/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap335/js/npm.js') }}"></script>

    <script type="text/javascript" src="{{asset('js/toastr.min.js')}}"></script>
    <script type="text/javascript">
        @if (Session::has('success'))
            toastr.success("{{Session::get('success')}}")
        @endif
        @if (Session::has('info'))
            toastr.info("{{Session::get('info')}}")
        @endif
    </script>

    // Summernote js
    @yield('scripts')

</body>
</html>
