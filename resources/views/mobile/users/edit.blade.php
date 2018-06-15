@section ('title', 'Perfil')

@extends('layouts.mobile')

@section('mobile.screen_name')
    <div class="navbar-brand" href="#">
        Perfil
    </div>
@endsection

@section('content')

    {{--<div class="block-header">
        <div class="body">
            <ol class="breadcrumb breadcrumb-col-pink">
                <li><a href="{{route('mobile.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('mobile.boxes.index')}}">Caixas</a></li>
                <li class="active">
                    Criar caixa
                </li>
            </ol>
        </div>
    </div>--}}

    @include('mobile.includes.messages')

    <div class="card">
        <div class="body">
            {!! Form::open(['route' => ['mobile.users.update', auth()->user()->id], 'class' => '', 'role' => 'form', 'method' => 'put']) !!}
                {{ Form::hidden('id', $user->id) }}
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('name') ? 'focused error' : '' }}">
                                {!! Form::label('name', 'Nome*', ['class' => '']) !!}
                                {!! Form::text('name', $user->name, [
                                    'class' => 'form-control',
                                    'required',
                                    'autofocus',
                                    'disabled',
                                    'readonly',
                                    'placeholder' => trans('strings.name')
                                ]) !!}
                                {{ Form::hidden('name', $user->name, ['id' => '']) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('email') ? 'focused error' : '' }}">
                                {!! Form::label('email', 'E-mail*', ['class' => '']) !!}
                                {!! Form::email('email', $user->email, [
                                    'class' => 'form-control',
                                    'required',
                                    'disabled',
                                    'readonly',
                                    'placeholder' => trans('strings.email')
                                ]) !!}
                                {{ Form::hidden('email', $user->email, ['id' => '']) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('old_password') ? 'focused error' : '' }}">
                                {!! Form::label('old_password', 'Senha Antiga', ['class' => '']) !!}
                                {!! Form::password('old_password', [
                                    'class' => 'form-control',
                                    'placeholder' => trans('strings.password')
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('password') ? 'focused error' : '' }}">
                                {!! Form::label('password', 'Senha', ['class' => '']) !!}
                                {!! Form::password('password', [
                                    'class' => 'form-control',
                                    'placeholder' => trans('strings.password')
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('confirm_password') ? 'focused error' : '' }}">
                                {!! Form::label('confirm_password', 'Confirme a senha', ['class' => '']) !!}
                                {!! Form::password('confirm_password', [
                                    'class' => 'form-control',
                                    'placeholder' => 'Confirme a senha'
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-xs-12">
                        <input type="submit" class="btn btn-primary" value="{{ trans('strings.save_button') }}" />
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection