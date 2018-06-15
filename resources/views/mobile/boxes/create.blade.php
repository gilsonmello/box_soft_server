@section ('title', 'Editar Caixa')

@extends('layouts.mobile')

@section('mobile.screen_name')
    <div class="navbar-brand" href="#">
        Criar Caixa
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
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                {!! Form::open(['route' => 'mobile.boxes.store', 'class' => 'body', 'role' => 'form', 'method' => 'post']) !!}
                @if($participants->count() == 0)
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Você não possui nenhum participante cadastrado <a href="{{route('mobile.participants.create')}}">
                            Clique aqui para cadastar novos participantes
                        </a>
                    </div>
                @elseif($participants->count() == 1)
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Você possui somente 1 participante cadastrado <a href="{{route('mobile.participants.create')}}">
                            Clique aqui para cadastar novos participantes
                        </a>
                    </div>
                @endif
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('participant_id') ? ' focused error' : '' }}" style="border: none">
                                {!! Form::label('participant_id_id[]', 'Participantes*', ['class' => '']) !!}
                                {!! Form::select('participant_id[]', $participants->pluck('name', 'id')->all(), old('participant_id'),
                                    [
                                        'style' => 'width: 100%;',
                                        'class' => 'select2',
                                        'multiple' => 'multiple',
                                        'empty' => 'Participantes'
                                    ])
                                !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('name') ? ' focused error' : '' }}">
                                {!! Form::label('name', 'Nome do Caixa*', ['class' => '']) !!}
                                {!! Form::text('name', NULL, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('value_total') ? ' focused error' : '' }}">
                                {!! Form::label('value_total', 'Valor total*', ['class' => '']) !!}
                                {!! Form::text('value_total', NULL, ['class' => 'form-control money-br']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('date_begin') ? ' focused error' : '' }}">
                                {!! Form::label('date_begin', 'Data de Inicio*', ['class' => '']) !!}
                                {!! Form::text('date_begin', null, ['autocomplete' => 'off', 'class' => 'form-control datepicker', 'placeholder' => 'Data de Inicio*']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('date_end') ? ' focused error' : '' }}">
                                {!! Form::label('date_end', 'Data Final*', ['class' => '']) !!}
                                {!! Form::text('date_end', null, ['autocomplete' => 'off','class' => 'form-control datepicker', 'placeholder' => 'Data Final*']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('method_payment') ? ' focused error' : '' }}">
                                {!! Form::label('method_payment', 'Método de Sorteio*', ['class' => '']) !!}
                                {!! Form::select('method_payment', [0 => 'Aleatório', 1 => 'Por ordem de chegada'], null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <input type="submit" class="btn btn-primary" value="{{ trans('strings.save_button') }}" />
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection