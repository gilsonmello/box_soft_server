@section ('title', 'Editar Caixa')

@extends('layouts.mobile')

@section('mobile.screen_name')
    <div class="navbar-brand" href="#">
        Editar caixa
    </div>
@endsection

@section('content')

   {{-- <div class="block-header">
        <div class="body">
            <ol class="breadcrumb breadcrumb-col-pink">
                <li><a href="{{route('mobile.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('mobile.boxes.index')}}">Caixas</a></li>
                <li class="active">
                    Editar caixa
                </li>
            </ol>
        </div>
    </div>--}}

    @include('mobile.includes.messages')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                {!! Form::model($box, ['route' => ['mobile.boxes.update', $box->id], 'class' => '', 'role' => 'form', 'method' => 'put']) !!}
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('participant_id') ? ' focused error' : '' }}" style="border: none">
                                    {!! Form::label('participant_id_id[]', 'Participantes*', ['class' => '']) !!}
                                    {!! Form::select('participant_id[]', $participants->pluck('name', 'id')->all(), $box->participants->pluck('id')->all(),
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
                                    {!! Form::text('value_total', format_money_br($box->value_total), ['class' => 'form-control money-br']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('date_begin') ? ' focused error' : '' }}">
                                    {!! Form::label('date_begin', 'Data de Inicio*', ['class' => '']) !!}
                                    {!! Form::text('date_begin', format($box->date_begin, 'd/m/Y'), ['autocomplete' => 'off', 'class' => 'form-control datepicker', 'placeholder' => 'Data de Inicio*']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('date_end') ? ' focused error' : '' }}">
                                    {!! Form::label('date_end', 'Data Final*', ['class' => '']) !!}
                                    {!! Form::text('date_end', format($box->date_end, 'd/m/Y'), ['autocomplete' => 'off','class' => 'form-control datepicker', 'placeholder' => 'Data Final*']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('method_payment') ? ' focused error' : '' }}">
                                    {!! Form::label('method_payment', 'Método de Sorteio*', ['class' => '']) !!}
                                    {!! Form::select('method_payment', [0 => 'Aleatório', 1 => 'Por ordem de chegada'], $box->method_payment, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                <input type="submit" class="btn btn-primary" value="{{ trans('strings.save_button') }}" />
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection