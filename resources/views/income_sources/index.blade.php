@extends('layouts.app')

@section('content')
    <h3 class="page-title">Income Sources</h3>

    <p>
        <a href="{{ route('income_sources.create') }}" class="btn btn-success">Add new</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($income_sources) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Title</th>
                        <th>Fee percent</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($income_sources) > 0)
                        @foreach ($income_sources as $income_source)
                            <tr data-entry-id="{{ $income_source->id }}">
                                <td></td>
                                <td>{{ $income_source->title }}</td>
                                <td>{{ $income_source->fee_percent }}</td>
                                <td><a href="{{ route('income_sources.edit',[$income_source->id]) }}" class="btn btn-xs btn-info">Edit</a>{!! Form::open(array(
                'style' => 'display: inline-block;',
                'method' => 'DELETE',
                'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                'route' => ['income_sources.destroy', $income_source->id])) !!}
    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
    {!! Form::close() !!}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">No entries in table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('income_sources.mass_destroy') }}';
    </script>
@endsection