@extends('layouts.app')

@section('content')
    <h3 class="page-title">Projects</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>Title</th>
                    <td>{{ $project->title }}</td></tr><tr><th>Client</th>
                    <td>{{ $project->client->first_name or '' }}</td></tr><tr><th>Description</th>
                    <td>{!! $project->description !!}</td></tr><tr><th>Start date</th>
                    <td>{{ $project->start_date }}</td></tr><tr><th>Budget</th>
                    <td>{{ $project->budget }}</td></tr><tr><th>Project status</th>
                    <td>{{ $project->project_status->title or '' }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('projects.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
@stop