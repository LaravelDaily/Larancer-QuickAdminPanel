@extends('layouts.app')

@section('content')
    <h3 class="page-title">Documents</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>Project</th>
                    <td>{{ $document->project->title or '' }}</td></tr><tr><th>Title</th>
                    <td>{{ $document->title }}</td></tr><tr><th>Description</th>
                    <td>{!! $document->description !!}</td></tr><tr><th>File</th>
                    <td>@if($document->file)<a href="{{ asset('uploads/'.$document->file) }}" target="_blank">Download file</a>@endif</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('documents.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
@stop