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
</head>
<body class="blue darken-4">
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="text-center">
                            <h5>{{ __('Admin Login') }}</h5>
                        </div>

                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>

                                <div class="">
                                    <input id="email" type="email" class="form-control form-control-lg rounded-pill @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>

                                <div class="">
                                    <input id="password" type="password" class="form-control form-control-lg rounded-pill @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="custom-control-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-lg rounded-pill btn-primary waves">
                                    {{ __('Login') }}
                                </button>
                            </div>

                            <div class="mt-2 text-center">
                                @if (Route::has('password.request'))
                                    <a class="text-muted" href="{{ route('password.request') }}">
                                        <i class="fa fa-lock mr-2" aria-hidden="true"></i>{{ __('Forgot Your Password? Or') }}
                                    </a>
                                @endif
                            </div>
                            <div class="mt-2 text-center">
                                <a href="{{ route('register') }}">Create an Account!</a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/waves.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</body>
</html>

