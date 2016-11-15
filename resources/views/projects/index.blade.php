@extends('layouts.app')

@section('content')
    <h3 class="page-title">Projects</h3>

    <p>
        <a href="{{ route('projects.create') }}" class="btn btn-success">Add new</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($projects) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Title</th>
                        <th>Client</th>
                        <th>Start date</th>
                        <th>Budget</th>
                        <th>Project status</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($projects) > 0)
                        @foreach ($projects as $project)
                            <tr data-entry-id="{{ $project->id }}">
                                <td></td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->client->first_name or '' }}</td>
                                <td>{{ $project->start_date }}</td>
                                <td>{{ $project->budget }}</td>
                                <td>{{ $project->project_status->title or '' }}</td>
                                <td>
                                <a href="{{ route('documents.index',['project' => $project->id]) }}" class="btn btn-xs btn-default">Documents</a>
                                <a href="{{ route('transactions.index',['project' => $project->id]) }}" class="btn btn-xs btn-default">Transactions</a>
                                <a href="{{ route('notes.index',['project' => $project->id]) }}" class="btn btn-xs btn-default">Notes</a><br>
                                <a href="{{ route('projects.show',[$project->id]) }}" class="btn btn-xs btn-primary">View</a>
                                <a href="{{ route('projects.edit',[$project->id]) }}" class="btn btn-xs btn-info">Edit</a>{!! Form::open(array(
                'style' => 'display: inline-block;',
                'method' => 'DELETE',
                'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                'route' => ['projects.destroy', $project->id])) !!}
    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
    {!! Form::close() !!}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">No entries in table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('projects.mass_destroy') }}';
    </script>
@endsection
