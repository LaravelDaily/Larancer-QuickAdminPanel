@extends('layouts.app')

@section('content')
    <h3 class="page-title">Transactions</h3>

    <p>
        <a href="{{ route('transactions.create') }}" class="btn btn-success">Add new</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($transactions) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Project</th>
                        <th>Transaction type</th>
                        <th>Income source</th>
                        <th>Amount</th>
                        <th>Currency</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($transactions) > 0)
                        @foreach ($transactions as $transaction)
                            <tr data-entry-id="{{ $transaction->id }}">
                                <td></td>
                                <td>{{ $transaction->project->title or '' }}</td>
                                <td>{{ $transaction->transaction_type->title or '' }}</td>
                                <td>{{ $transaction->income_source->title or '' }}</td>
                                <td>{{ $transaction->amount }}</td>
                                <td>{{ $transaction->currency->title or '' }}</td>
                                <td>
                                    <a href="{{ route('transactions.show',[$transaction->id]) }}" class="btn btn-xs btn-primary">View</a>
                                    <a href="{{ route('transactions.edit',[$transaction->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                        'route' => ['transactions.destroy', $transaction->id])) !!}
                                    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">No entries in table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('transactions.mass_destroy') }}';
    </script>
@endsection
