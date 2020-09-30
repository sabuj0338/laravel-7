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
                            <h5>{{ __('Register') }}</h5>
                        </div>

                        <form method="POST" action="{{ route('admin.register') }}">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>

                                        <div class="">
                                            <input id="name" type="text" class="form-control form-control-lg rounded-pill @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="phone">{{ __('Phone Number') }}</label>

                                        <div class="">
                                            <input id="phone" type="text" class="form-control form-control-lg rounded-pill @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image" class="col-form-label text-md-right">{{ __('Profile Photo') }}</label>

                                <input id="image" type="file" class="form-control form-control-lg rounded-pill @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>

                                <div class="">
                                    <input id="email" type="email" class="form-control form-control-lg rounded-pill @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password">{{ __('Password') }}</label>

                                        <div class="">
                                            <input id="password" type="password" class="form-control form-control-lg rounded-pill @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="form-group">
                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>

                                        <div class="">
                                            <input id="password-confirm" type="password" class="form-control form-control-lg rounded-pill" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-block btn-lg rounded-pill btn-primary waves">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <div class="mt-2 text-center">
                                <a href="{{ route('login') }}">Login!</a>
                            </div>
                        </form>

                        <hr>

                        <div class="form-group">
                            <a href="login/facebook" type="submit" class="btn btn-block btn-lg rounded-pill btn-primary indigo darken-1 waves">
                                <i class="fa fa-facebook mr-3" aria-hidden="true"></i>{{ __('Login with Facebook') }}
                            </a>
                        </div>

                        <div class="form-group">
                            <a href="login/google" type="submit" class="btn btn-block btn-lg rounded-pill orange lighten-1 waves">
                                <i class="fa fa-google mr-3" aria-hidden="true"></i>{{ __('Login with Google') }}
                            </a>
                        </div>
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


