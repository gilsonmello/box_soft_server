@section ('title', 'Criar Caixa')

@extends('layouts.mobile')

@section('mobile.screen_name')
    <a class="navbar-brand" href="#">Participantes</a>
@endsection

@section('content')
    {{--<div class="block-header">
        <div class="body">
            <ol class="breadcrumb breadcrumb-col-pink">
                <li><a href="{{route('mobile.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('mobile.participants.index')}}">Participantes</a></li>
                <li class="active">
                    Criar Participante
                </li>
            </ol>
        </div>
    </div>--}}

    @include('mobile.includes.messages')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    {!! Form::open(['route' => 'mobile.participants.store', 'class' => '', 'role' => 'form', 'method' => 'post']) !!}
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line {{ $errors->has('name') ? ' focused error' : '' }}">
                                        {!! Form::label('name', 'Nome*', ['class' => '']) !!}
                                        {!! Form::text('name', NULL, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line {{ $errors->has('email') ? 'focused error' : '' }}">
                                        {!! Form::label('email', 'E-mail*', ['class' => '']) !!}
                                        {!! Form::email('email', NULL, ['class' => 'form-control', 'placeholder' => 'exemplo@exemplo.com']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line {{ $errors->has('cpf') ? 'focused error' : '' }}">
                                        {!! Form::label('cpf', 'CPF', ['class' => '']) !!}
                                        {!! Form::text('cpf', NULL, ['class' => 'cpf form-control', 'placeholder' => '999.999.999-99']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line {{ $errors->has('rg') ? 'focused error' : '' }}">
                                        {!! Form::label('rg', 'RG', ['class' => '']) !!}
                                        {!! Form::text('rg', NULL, ['class' => 'rg form-control', 'placeholder' => '99.999.999-99']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line {{ $errors->has('birth_date') ? 'focused error' : '' }}">
                                        {!! Form::label('birth_date', 'Data de Nascimento', ['class' => '']) !!}
                                        {!! Form::text('birth_date', NULL, ['class' => 'birth_date form-control', 'placeholder' => '99/99/9999']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line {{ $errors->has('phone') ? 'focused error' : '' }}">
                                        {!! Form::label('phone', 'Telefone', ['class' => '']) !!}
                                        {!! Form::text('phone', NULL, ['class' => 'phone form-control', 'placeholder' => '(99) 9999-9999']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line {{ $errors->has('cell_phone') ? 'focused error' : '' }}">
                                        {!! Form::label('cell_phone', 'Celular', ['class' => '']) !!}
                                        {!! Form::text('cell_phone', NULL, ['class' => 'cell_phone form-control', 'placeholder' => '(99) 99999-9999']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line {{ $errors->has('zip') ? 'focused error' : '' }}">
                                        {!! Form::label('zip', 'CEP', ['class' => '']) !!}
                                        {!! Form::text('zip', NULL, ['class' => 'zip form-control', 'placeholder' => '99999-999']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line {{ $errors->has('number') ? 'focused error' : '' }}">
                                        {!! Form::label('number', 'Número', ['class' => '']) !!}
                                        {!! Form::text('number', NULL, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line {{ $errors->has('city') ? 'focused error' : '' }}">
                                        {!! Form::label('city', 'Cidade', ['class' => '']) !!}
                                        {!! Form::text('city', NULL, ['class' => 'form-control city', 'disabled', 'readonly']) !!}
                                        {!! Form::hidden('city', NULL, ['class' => 'form-control city']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line {{ $errors->has('city') ? 'focused error' : '' }}">
                                        {!! Form::label('district', 'Bairro', ['class' => '']) !!}
                                        {!! Form::text('district', NULL, ['class' => 'form-control district', 'disabled', 'readonly']) !!}
                                        {!! Form::hidden('district', NULL, ['class' => 'form-control district']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line {{ $errors->has('street') ? 'focused error' : '' }}">
                                        {!! Form::label('street', 'Rua', ['class' => '']) !!}
                                        {!! Form::text('street', NULL, ['class' => 'form-control street', 'disabled', 'readonly']) !!}
                                        {!! Form::hidden('street', NULL, ['class' => 'form-control street']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line {{ $errors->has('street') ? 'focused error' : '' }}">
                                        {!! Form::label('state', 'Estado', ['class' => '']) !!}
                                        {!! Form::text('state', NULL, ['class' => 'form-control state', 'disabled', 'readonly']) !!}
                                        {!! Form::hidden('state', NULL, ['class' => 'form-control state']) !!}
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
        </div>
    </div>

@endsection