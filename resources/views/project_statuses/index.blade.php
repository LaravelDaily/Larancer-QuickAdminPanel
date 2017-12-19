@extends('layouts.app')

@section('content')
    <h3 class="page-title">Project Statuses</h3>

    <p>
        <a href="{{ route('project_statuses.create') }}" class="btn btn-success">Add new</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            List 
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($project_statuses) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Title</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($project_statuses) > 0)
                        @foreach ($project_statuses as $project_status)
                            <tr data-entry-id="{{ $project_status->id }}">
                                <td></td>
                                <td>{{ $project_status->title }}</td>
                                <td><a href="{{ route('project_statuses.edit',[$project_status->id]) }}" class="btn btn-xs btn-info">Edit</a>{!! Form::open(array(
                'style' => 'display: inline-block;',
                'method' => 'DELETE',
                'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                'route' => ['project_statuses.destroy', $project_status->id])) !!}
    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
    {!! Form::close() !!}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">No entries in table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('project_statuses.mass_destroy') }}';
    </script>
@endsection