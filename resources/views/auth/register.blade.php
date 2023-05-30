<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{url('fonts')}}/icomoon/style.css">

    <link rel="stylesheet" href="{{url('css')}}/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('css')}}/bootstrap/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="{{url('css')}}/login.css">

    <title>Login #8</title>
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Sign Up</h3>
                                <img src="{{url('images')}}/logo.svg" alt="..." width="250" height="80">
                            </div>
                            <form action="{{route('register')}}" method="post">
                                @csrf
                                @method('post')

                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" name="name" class="form-control" id="username">
                                </div>

                                <div class="form-group ">
                                    <label for="username">email</label>
                                    <input type="text" name="email" class="form-control" id="email">
                                </div>

                                <div class="form-group ">
                                    <label for="username">NIK</label>
                                    <input type="number" name="NIK" class="form-control" id="email">
                                </div>

                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>

                                <div class="form-group last mb-4">
                                    <label for="password">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <input type="submit" value="Register" class="btn text-white btn-block btn-primary btn-info">
                                <div class="signup_link">
                                    Already Have Account? <a href="{{route('login')}}">Sign in</a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="{{url('vendors')}}/jquery/jquery-3.4.1.min.js"></script>
    <script src="{{url('vendors')}}/popper.min.js"></script>
    <script src="{{url('vendors')}}/bootstrap/bootstrap.min.js"></script>
    <script src="{{url('js')}}/login.js"></script>
</body>

</html>



{{--<div class="card-body">--}}
{{--    <form method="POST" action="{{ route('register') }}">--}}
{{--        @csrf--}}

{{--        <div class="row mb-3">--}}
{{--            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>--}}

{{--            <div class="col-md-6">--}}
{{--                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                @error('name')--}}
{{--                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="row mb-3">--}}
{{--            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

{{--            <div class="col-md-6">--}}
{{--                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                @error('email')--}}
{{--                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="row mb-3">--}}
{{--            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

{{--            <div class="col-md-6">--}}
{{--                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                @error('password')--}}
{{--                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="row mb-3">--}}
{{--            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>--}}

{{--            <div class="col-md-6">--}}
{{--                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="row mb-0">--}}
{{--            <div class="col-md-6 offset-md-4">--}}
{{--                <button type="submit" class="btn btn-primary">--}}
{{--                    {{ __('Register') }}--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</div>--}}
