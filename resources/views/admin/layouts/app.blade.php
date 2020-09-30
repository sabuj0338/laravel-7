<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/waves.css') }}" rel="stylesheet">
    <link href="{{ asset('css/color.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialize-table.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.category') }}">{{ __('Category') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.cost') }}">{{ __('CostMap') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.products.index') }}">{{ __('Products') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.orders.index') }}">{{ __('Orders') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.settings') }}">{{ __('Settings') }}</a>
                        </li> --}}
                        <!-- auth links -->
                        {{-- <li class="nav-item">
                            <div class="dropdown">
                                <a id="navbarDropdownUser" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Users') }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownUser">
                                    <a class="dropdown-item" href="{{ route('admin.users.all_users') }}">
                                        {{ __('All') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.users.farmers') }}">
                                        {{ __('Farmers') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.users.whole_sellers') }}">
                                        {{ __('Wholer Sellers') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.users.agents') }}">
                                        {{ __('Agents') }}
                                    </a>
                                </div>
                            </div>
                        </li> --}}
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="tooltip" data-placement="bottom" title="Reload">
                                    <i class="fa fa-spinner" style="font-size: 1.2rem" aria-hidden="true"></i>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="notificationDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-bell-o" style="font-size: 1.2rem" aria-hidden="true" title="Notifications"></i>
                                    <span class="bg-danger badge text-white rounded-circle" style="position: absolute;top: 3px;right:0px;" id="cart_length">0</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown" style="min-width: 15rem;">
                                    <span class="dropdown-item text-center">
                                        {{ __('Empty!') }}
                                    </span>
                                </div>
                            </li>

                            <!-- auth links -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link p-1 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img class="img-fluid" width="22" src="https://icon-library.com/images/bootstrap-icon-png/bootstrap-icon-png-28.jpg" alt="image">
                                    {{-- <i class="fa fa-user" aria-hidden="true"></i> --}}
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            <div class="container">@include('admin.layouts.alert')</div>
            @yield('content')
        </main>

    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/waves.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    @yield('js')
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 3000);

        // for tooltip
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
        $('.dropdown').hover(function () {
                $(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
            }, function () {
                $(this).find('.dropdown-menu').first().stop(true, true).slideUp(105)
            });
        });
        </script>
</body>
</html>
