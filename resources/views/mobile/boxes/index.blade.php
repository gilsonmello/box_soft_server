@section ('title', 'Caixas')

@extends('layouts.mobile')

@section('mobile.screen_name')
    <div class="navbar-brand" href="#">
        Caixas
        <a href="{{ route('mobile.boxes.create') }}" class="btn btn-xs pull-right btn-default">
            <i class="fa fa-plus"></i>
        </a>
    </div>

@endsection

@section('content')
    {{--<div class="block-header">
        <div class="body">
            <ol class="breadcrumb breadcrumb-col-pink">
                <li><a href="{{route('mobile.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">
                    Caixas
                </li>
            </ol>
        </div>
        <div class="pull-right">
            <a href="{{ route('mobile.boxes.create') }}" class="btn btn-primary btn-xs">
                Criar Caixa
            </a>
        </div>
        <h2>Participantes</h2>
    </div>--}}

    @include('mobile.includes.messages')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Filtro
                        <a href="{{ route('mobile.boxes.create') }}" style="margin-right: 40px" class="btn btn-xs pull-right btn-primary">
                            Cadastrar Novo Caixa
                        </a>
                    </h2>
                    <div class="header-dropdown m-r--5">
                        <button type="button" class="btn btn-xs" data-toggle="collapse" href="#filtro"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                {!! Form::open(array('route' => array('mobile.boxes.index'), 'class' => 'body collapse', 'id' => 'filtro', 'method' => 'get'))  !!}
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                {!! Form::label('name', trans('strings.name'), ['class' => 'form-label']) !!}
                                {!! Form::text('name', null, ['class' => 'form-control']  ) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                {!! Form::label('email', trans('strings.email'), ['class' => 'form-label']) !!}
                                {!! Form::email('email', null, ['class' => 'form-control']  ) !!}
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::submit( trans('strings.search'), ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>


    @forelse($boxes as $value)
        <div class="row clearfix">
            <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                <div class="card" style="margin-bottom: 0;">
                    <div class="header">
                        <h2>
                            <span href="{{ route('mobile.boxes.participants', $value->id) }}">{!! $value->name !!} - {!! format_money_br($value->value_total) !!}</span>
                            <small>
                                Total de {!! $value->months !!} meses<br>
                                Status {!! $value->has_instalment == 1 ? 'fechado' : 'aberto' !!}, Criado em {!! format_datebr($value->created_at) !!}<br>
                                Data de inicio {!! format_datebr($value->date_begin) !!}, Data final {!! format_datebr($value->date_end) !!}
                            </small>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="{{ route('mobile.boxes.participants', $value->id) }}" class="waves-effect waves-block">
                                            Participantes
                                        </a>
                                    </li>
                                    @if(($value->has_instalment == 1 && $value->last_award == null) || differenceInMonths($value->last_award, date('Y-m-d')) >= 1)
                                    <li>
                                        <a href="{{ route('mobile.boxes.awards', $value->id) }}" data-alert="award" data-method="post" data-message="Deseja realmente premiar?" class="waves-effect waves-block">
                                            Premiar participante do mês
                                        </a>
                                    </li>
                                    @endif
                                    @if($value->has_instalment == 1 && $value->last_award != null)
                                        <li>
                                            <a href="{{route('mobile.boxes.winner_of_month', $value->id)}}" class="waves-effect waves-block">
                                                Vencedor do mês
                                            </a>
                                        </li>
                                    @endif
                                    @if($value->has_instalment != 1)
                                    <li>
                                        <a href="{{ route('mobile.boxes.edit', $value->id) }}" class=" waves-effect waves-block">
                                            Editar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('mobile.boxes.destroy', $value->id) }}" data-method="delete" class="waves-effect waves-block">
                                            Deletar
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    @empty
        Você não possui nenhum caixa cadastrado, clique no botão acima para cadastrar
    @endforelse

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <div class="pull-left">
                <br>
                <label>Total {!! $boxes->total() !!}</label>
            </div>
            <div class="pull-right">
                {!! $boxes->render() !!}
            </div>
        </div>
    </div>

@endsection