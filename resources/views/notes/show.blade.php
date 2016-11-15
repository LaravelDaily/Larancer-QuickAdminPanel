@extends('layouts.app')

@section('content')
    <h3 class="page-title">Notes</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>Project</th>
                    <td>{{ $note->project->title or '' }}</td></tr><tr><th>Note text</th>
                    <td>{!! $note->text !!}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('notes.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
@stop