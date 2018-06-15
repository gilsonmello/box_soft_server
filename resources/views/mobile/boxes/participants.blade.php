@section ('title', 'Participantes')

@extends('layouts.mobile')

@section('mobile.screen_name')
    <a class="navbar-brand" href="#">Participantes</a>
@endsection

@section('content')

   {{-- <div class="block-header">
        <div class="body">
            <ol class="breadcrumb breadcrumb-col-pink">
                <li><a href="{{route('mobile.boxes.index')}}">Caixas</a></li>
                <li class="active">
                    Mensalidades
                </li>
            </ol>
        </div>
    </div>--}}
    @include('mobile.includes.messages')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    {!! Form::model($box, ['route' => ['mobile.boxes.participants', $box->id], 'class' => '', 'role' => 'form', 'method' => 'post']) !!}
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('participant_id') ? ' focused error' : '' }}" style="border: none">
                                    {!! Form::label('name', 'Participantes', ['class' => '']) !!}
                                    {!! Form::select('participant_id[]', $participants->pluck('name', 'id')->all(), $box->participants->pluck('id')->all(),
                                        [
                                            'style' => 'width: 100%;',
                                            'disabled' => 'disabled',
                                            'class' => 'select2',
                                            'multiple' => 'multiple'
                                        ])
                                    !!}
                                    @foreach($box->participants->pluck('id')->all() as $participant)
                                        {!! Form::hidden('participant_id[]', $participant) !!}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('name') ? ' focused error' : '' }}">
                                    {!! Form::label('name', 'Caixa', ['class' => '']) !!}
                                    {!! Form::text('name', NULL, ['class' => 'form-control', 'readonly', 'disabled']) !!}
                                    {!! Form::hidden('name', $box->name) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('value_total') ? ' focused error' : '' }}">
                                    {!! Form::label('value_total', 'Valor total', ['class' => '']) !!}
                                    {!! Form::text('value_total', NULL, ['class' => 'form-control money-br', 'readonly', 'disabled', 'placeholder' => 'Valor Total']) !!}
                                    {!! Form::hidden('value_total', $box->value_total) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('date_begin') ? ' focused error' : '' }}">
                                    {!! Form::label('date_begin', 'Data de inicio', ['class' => '']) !!}
                                    {!! Form::text('date_begin', format($box->date_begin, 'd/m/Y'), ['readonly', 'disabled', 'autocomplete' => 'off', 'class' => 'form-control datepicker', 'placeholder' => 'Data de inicio']) !!}
                                    {!! Form::hidden('date_begin', format($box->date_begin, 'd/m/Y')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('date_end') ? ' focused error' : '' }}">
                                    {!! Form::label('date_end', 'Data final', ['class' => '']) !!}
                                    {!! Form::text('date_end', format($box->date_end, 'd/m/Y'), ['readonly', 'disabled', 'autocomplete' => 'off','class' => 'form-control datepicker', 'placeholder' => 'Data final']) !!}
                                    {!! Form::hidden('date_end', format($box->date_end, 'd/m/Y')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<a href="{{route('mobile.boxes.index')}}" class="btn btn-danger">{{ trans('strings.cancel_button') }}</a>--}}
                    @if(!$box->has_instalment)
                        <input type="submit" class="btn btn-primary" value="Gerar Mensalidades" />
                    @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    @if($box->has_instalment)
        @forelse($box->participants as $value)
            <div class="row clearfix">
                <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                    <div class="card" style="margin-bottom: 0;">
                        <div class="header">
                            <h2>
                                {!! $value->name !!}
                                <small>
                                    {!! $value->email !!}
                                </small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="{{route('mobile.participants.instalments', [$box->id, $value->id])}}" class="waves-effect waves-block">
                                                Verificar Mensalidades
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            Vazio
        @endforelse

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <h2>&nbsp;</h2>
            </div>
        </div>
    @endif
@endsection