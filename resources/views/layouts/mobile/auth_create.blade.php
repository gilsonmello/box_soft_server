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
<body class="signup-page">

<div class="signup-box" style="background: #fff">
    <div class="logo">
        <a href="javascript:void(0);">Box<b>Soft</b></a>
        <small>Gerencie seus caixas com segurança</small>
    </div>
    <div class="card">
        <div class="body">
            @include('mobile.includes.messages')
            {!! Form::open(['route' => 'mobile.auth.store', 'class' => 'mobile-auth-create', 'role' => 'form', 'method' => 'post']) !!}
                <div class="msg">Cadastre-se</div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>
                    <div class="form-line {{ $errors->has('name') ? 'focused error' : '' }}">
                        {!! Form::text('name', old('name'), [
                            'class' => 'form-control',
                            'required',
                            'autofocus',
                            'placeholder' => trans('strings.name')
                        ]) !!}
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">email</i>
                    </span>
                    <div class="form-line {{ $errors->has('email') ? 'focused error' : '' }}">
                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'required', 'placeholder' => trans('strings.email')]) !!}
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line {{ $errors->has('password') ? 'focused errorr' : '' }}">
                        {!! Form::password('password', ['class' => 'form-control', 'minlength' => '6', 'required', 'placeholder' => trans('strings.password')]) !!}
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line {{ $errors->has('password_confirmation') ? 'focused error' : '' }}">
                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'minlength' => '6', 'required', 'placeholder' => trans('strings.confirm_password')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <input {{ old('terms') ? 'checked' : '' }} type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                    <label for="terms">Eu li e aceito os <a href="javascript:void(0);">termos de uso</a>.</label>
                </div>

                <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">
                    Salvar
                </button>

                <div class="m-t-25 m-b--5 align-center">
                    <a href="{{ route('mobile.auth.index') }}">Já está cadastrado?</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script src="{{ asset('applications/mobile/js/app.js') }}"></script>
<script src="{{ asset('applications/mobile/js/auth.js') }}"></script>

</body>
</html>
