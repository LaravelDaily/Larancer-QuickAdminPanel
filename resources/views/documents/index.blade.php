@extends('layouts.app')

@section('content')
    <h3 class="page-title">Documents</h3>

    <p>
        <a href="{{ route('documents.create') }}" class="btn btn-success">Add new</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($documents) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Project</th>
                        <th>Title</th>
                        <th>File</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($documents) > 0)
                        @foreach ($documents as $document)
                            <tr data-entry-id="{{ $document->id }}">
                                <td></td>
                                <td>{{ $document->project->title or '' }}</td>
                                <td>{{ $document->title }}</td>
                                <td>@if($document->file)<a href="{{ asset('uploads/'.$document->file) }}" target="_blank">Download file</a>@endif</td>
                                <td><a href="{{ route('documents.edit',[$document->id]) }}" class="btn btn-xs btn-info">Edit</a>{!! Form::open(array(
                'style' => 'display: inline-block;',
                'method' => 'DELETE',
                'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                'route' => ['documents.destroy', $document->id])) !!}
    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
    {!! Form::close() !!}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No entries in table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('documents.mass_destroy') }}';
    </script>
@endsection
