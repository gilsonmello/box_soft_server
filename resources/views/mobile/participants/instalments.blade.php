@section ('title', 'Mensalidades')

@extends('layouts.mobile')

@section('content')
    {{--<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Filtro
                    </h2>
                    <div class="header-dropdown m-r--5">
                        <button type="button" class="btn btn-xs" data-toggle="collapse" href="#filtro"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                {!! Form::open(array('route' => array('mobile.participants.index'), 'id' => 'mobile.participants.index', 'class' => '', 'method' => 'get'))  !!}
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
    </div>--}}

    <h4>Mensalidades <small>Clique no menu de configurações para alterar o status.</small></h4>
    @forelse($instalments as $value)
        <div class="row clearfix">
            <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                <div class="card" style="margin-bottom: 0;">
                    <div class="header">
                        <h2>
                            {{format_money_br($value->value)}}
                            <small>
                                @if($value->is_paid == 1)
                                    Pagamento em {!! format($value->date_paid, 'd/m/Y') !!}<br>
                                @else
                                    Vencimento {!! format($value->date, 'd/m/Y') !!}<br>
                                @endif
                                Status @if($value->is_paid == 1)
                                    <span class="label label-success">Paga</span>
                                @else
                                    <span class="label label-warning">Pendente</span>
                                @endif
                            </small>
                        </h2>
                        @if(!$value->is_paid)
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="{{route('mobile.instalments.pay', $value->id) }}" data-message="Confirma o pagamento?" data-alert="pay" data-method="post" class="waves-effect waves-block">
                                            Pagar
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    @empty
        Vazio
    @endforelse

    <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                &nsbp;
            </div>
        </div>
@endsection