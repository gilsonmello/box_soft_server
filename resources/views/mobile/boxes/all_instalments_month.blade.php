<div class="modal fade" id="modal-boxes">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    {{$box->name}}
                </h4>
            </div>
            <div class="modal-body table-responsive" style="padding-left: 0; padding-right: 0;">
                <table id="example2" cellspacing="0" class="table table-bordered table-hover" style="margin-bottom: 0">
                    <thead>
                        <tr>
                            <th>Participante</th>
                            <th>Valor</th>
                            <th>Data de Vencimento</th>
                            <th>Data de Pagamento</th>
                        </tr>
                    </thead>
                <tbody>
                @forelse($instalments as $value)
                    <tr>
                        <td>{{ $value->participant->name }}</td>
                        <td>R${!! number_format($value->value, 2, ',', '.') !!}</td>
                        <td>{!! format($value->date, 'd/m/Y') !!}</td>
                        <td>
                            @if($value->date_paid)
                                <span class="label label-success">
                                    {!! format($value->date_paid, 'd/m/Y H:i') !!}
                                </span>
                            @else
                                <span class="label label-warning">Pendente</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    Vazio
                @endforelse
                </tbody>
                    <tfoot>
                        <tr>
                            <th>Participante</th>
                            <th>Valor</th>
                            <th>Data de Vencimento</th>
                            <th>Data de Pagamento</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            {{--<div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>--}}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->