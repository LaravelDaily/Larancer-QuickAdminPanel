@extends('layouts.app')

@section('content')
    <h3 class="page-title">Transactions</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>Project</th>
                    <td>{{ $transaction->project->title or '' }}</td></tr><tr><th>Transaction type</th>
                    <td>{{ $transaction->transaction_type->title or '' }}</td></tr><tr><th>Income source</th>
                    <td>{{ $transaction->income_source->title or '' }}</td></tr><tr><th>Title</th>
                    <td>{{ $transaction->title }}</td></tr><tr><th>Description</th>
                    <td>{!! $transaction->description !!}</td></tr><tr><th>Amount</th>
                    <td>{{ $transaction->amount }}</td></tr><tr><th>Currency</th>
                    <td>{{ $transaction->currency->title or '' }}</td></tr><tr><th>Transaction date</th>
                    <td>{{ $transaction->transaction_date }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('transactions.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
@stop