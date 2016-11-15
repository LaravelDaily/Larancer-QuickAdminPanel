@extends('layouts.app')

@section('content')
    <h3 class="page-title">Income Sources</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>Title</th>
                    <td>{{ $income_source->title }}</td></tr><tr><th>Fee percent</th>
                    <td>{{ $income_source->fee_percent }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('income_sources.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
@stop