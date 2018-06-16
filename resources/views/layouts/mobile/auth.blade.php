<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Pace Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('applications/mobile/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('applications/mobile/css/plugins.css') }}">
</head>
<body class="login-page" style="background-color: white">
    <div class="login-box">
        <div class="logo">
            <a style="color: #000" href="javascript:void(0);">Box<b>Soft</b></a>
            <small style="color: #000">Login</small>
        </div>
        <div class="card">
            <div class="body">
                @include('mobile.includes.messages')
                <form method="POST" class="mobile-auth" action="{{ route('mobile.auth.login') }}" role="form">

                    {{ csrf_field() }}
                    <div class="input-group form-float">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line {{ $errors->has('email') ? ' focused error' : '' }}">
                            <input type="email" value="{{old('email')}}" class="form-control" name="email" placeholder="E-mail" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" name="password" placeholder="Senha" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button class="btn btn-block btn-md btn-primary waves-effect" type="submit">Login</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a style="color: #000" href="{{route('mobile.auth.create')}}">Cadastre-se</a>
                        </div>
                        {{-- <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('applications/mobile/js/app.js') }}"></script>
    <script src="{{ asset('applications/mobile/js/auth.js') }}"></script>

</body>
</html>
