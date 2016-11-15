@extends('layouts.app')

@section('content')
    <h3 class="page-title">Currencies</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>Title</th>
                    <td>{{ $currency->title }}</td></tr><tr><th>Code</th>
                    <td>{{ $currency->code }}</td></tr><tr><th>Main currency</th>
                    <td>{{ $currency->main_currency == 1 ? 'Yes' : 'No' }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('currencies.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
@stop