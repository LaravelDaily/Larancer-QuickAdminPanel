@extends('layouts.app')

@section('content')
    <h3 class="page-title">Project Statuses</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>Title</th>
                    <td>{{ $project_status->title }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('project_statuses.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
@stop