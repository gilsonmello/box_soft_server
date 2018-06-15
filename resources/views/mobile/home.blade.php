@section ('title', 'Home')

@extends('layouts.mobile')

@section('mobile.screen_name')
    <div class="navbar-brand" href="#">
        Home
    </div>
@endsection

@section('content')

    {{--<div class="block-header">
        <div class="body">
            <ol class="breadcrumb breadcrumb-col-pink">
                <li class="active">
                    <a href="{{route('mobile.home')}}"><i class="material-icons">home</i> Home</a>
                </li>
            </ol>
        </div>
        <h2>Caixas Abertos</h2>
    </div>--}}
    @include('mobile.includes.messages')
    @if(!$boxesOpen->isEmpty())
        @forelse($boxesOpen as $box)
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <span href="{{ route('mobile.boxes.participants', $box->id) }}">
                                    {!! $box->name !!}
                                </span>
                                <small>R${!! number_format($box->value_total, 2, ',', '.'); !!}</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                {{--<li>
                                    <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="timer">
                                        <i class="material-icons">loop</i>
                                    </a>
                                </li>--}}
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            @forelse($box->participants()->orderBy('id', 'desc')->get()->take(5) as $participant)
                                {{ $participant->name }},
                            @empty
                                Vazio
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        @empty
            Você não possui nenhum caixa com status fechado<br>
            <ol>
                <li>
                    Escolha um caixa
                </li>
                <li>
                    Clique sobre o ícone de configurações
                </li>
                <li>
                    Clique em gerar mensalidades
                </li>
                <li>
                    Clique no botão gerar mensalidades
                </li>
            </ol>
            <a href="{{ route('mobile.boxes.index') }}" class="btn btn-primary btn-xs">Clique aqui para ir até os caixas</a>
        @endforelse
    @endif

    @if($boxes->isEmpty() || $participants->isEmpty())
        <div class="row clearfix">
            @if($boxes->isEmpty())
                <a class="" href="{{route('mobile.boxes.create')}}">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-pink hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">create_new_folder</i>
                            </div>
                            <div class="content">
                                <div class="text"><h3>Caixa</h3></div>
                            </div>
                        </div>
                    </div>
                </a>
            @endif
            @if($participants->isEmpty())
                <a class="" href="{{route('mobile.participants.create')}}">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-pink hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">add_box</i>
                            </div>
                            <div class="content">
                                <div class="text"><h3>Participante</h3></div>
                            </div>
                        </div>
                    </div>
                </a>
            @endif
        </div>
    @endif


@endsection