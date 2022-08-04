<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>JEA - | Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/login/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/login/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/login/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/login/css/style.css') }}">
    <style>
        .LogClass{
            font-size: 15px !important;
        }
    </style>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('admin/login/images/undraw_remotely_2j6y.svg') }}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <center>
                                    <h3> User Login</h3>
                                    <p class="mb-4" style="font-size:15px;padding-top:10px;">
                                        Joypurhat Engineer's Association
                                    </p>
                                </center>

                            </div>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                {{-- <input type="hidden" name="_token" value="15Er8f5wd50oq8c8Prva47rag9GhX8X4wr8MsWdH"> --}}
                                <div class="form-group first mb-2">
                                    <label for="username">First Name</label>
                                    <input id="name" type="text" name="name" :value="old('name')" class="form-control LogClass">
                                </div>
                                <div class="form-group  mb-2">
                                    <label for="username">Last Name</label>
                                    <input id="last_name" type="text" name="last_name" :value="old('last_name')" class="form-control LogClass">
                                </div>
                                <div class="form-group  mb-2">
                                    <label for="username">Email</label>
                                    <input id="email" type="text" name="email"  class="form-control LogClass" >
                                </div>

                                <div class="form-group  mb-2">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control LogClass" name="password" autocomplete="new-password" >
                                </div>

                                <div class="form-group last mb-4">
                                    <label for="password">Confirm Password</label>
                                    <input id="password_confirmation" type="password" class="form-control LogClass" name="password_confirmation" required>
                                </div>

                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                        <input type="checkbox" name="remember" id="remember" checked="checked" />

                                        <div class="control__indicator"></div>

                                    </label>
                                    <span class="ml-auto"><a href="/" class="forgot-pass"><i class="fa fa-home" aria-hidden="true"></i></a></span>
                                </div>
                                {{-- <button  {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-block btn-primary']) }}>
                                    {{ __('Log in') }}
                                </button> --}}

                                <input type="submit" value="{{ __('Log in') }}" class="btn btn-block btn-primary">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="{{ asset('admin/login/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('admin/login/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/login/js/main.js') }}"></script>

</body>

</html>
