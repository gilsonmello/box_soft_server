@section ('title', 'Caixas')

@extends('layouts.mobile')

@section('mobile.screen_name')
    <div class="navbar-brand" href="#">
        Vencedor do mês
    </div>
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
            <div class="card" style="margin-bottom: 0;">
                <div class="header">
                    <h2>
                        {!! $last_award->participant->name !!}
                        <small>
                            {{$last_award->participant->email}}<br>
                            Valor {!! format_money_br($last_award->value) !!}
                        </small>
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection