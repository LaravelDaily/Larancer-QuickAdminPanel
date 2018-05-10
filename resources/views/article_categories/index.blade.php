@extends('layouts.app')

@section('styles')
    <style>
        .table th { text-align: center; vertical-align: middle; }
        .table td { text-align: center; vertical-align: middle; }
    </style>
@endsection

@section('content')
    <h3 class="page-title">Article Categories</h3>

    <p>
        <a href="{{ route('article-categories.create') }}" class="btn btn-success">Add new</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($articleCategories) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="width: 10px;"><input type="checkbox" id="select-all" /></th>
                        <th>Name</th>
                        <th>Description</th>
                        <th style="width: 150px">
                            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($articleCategories) > 0)
                        @foreach ($articleCategories as $articleCategory)
                            <tr data-entry-id="{{ $articleCategory->id }}">
                                <td></td>
                                <td>{{ $articleCategory->name }}</td>
                                <td title="{{ $articleCategory->description }}">{{ $articleCategory->description ?? '' }}</td>
                                <td>
                                    <a href="{{ route('article-categories.show',[$articleCategory->id]) }}" class="btn btn-xs btn-primary">View</a>
                                    <a href="{{ route('article-categories.edit',[$articleCategory->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                        'route' => ['article-categories.destroy', $articleCategory->id])) !!}
                                        {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
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
        window.route_mass_crud_entries_destroy = '{{ route('article-categories.mass_destroy') }}';
    </script>
@endsection
