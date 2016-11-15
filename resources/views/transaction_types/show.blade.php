@extends('layouts.app')

@section('content')
    <h3 class="page-title">Transaction Types</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>Title</th>
                    <td>{{ $transaction_type->title }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('transaction_types.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
@stop