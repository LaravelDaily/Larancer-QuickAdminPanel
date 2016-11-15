@extends('layouts.app')

@section('content')
    <h3 class="page-title">Transaction Types</h3>

    <p>
        <a href="{{ route('transaction_types.create') }}" class="btn btn-success">Add new</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($transaction_types) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Title</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($transaction_types) > 0)
                        @foreach ($transaction_types as $transaction_type)
                            <tr data-entry-id="{{ $transaction_type->id }}">
                                <td></td>
                                <td>{{ $transaction_type->title }}</td>
                                <td><a href="{{ route('transaction_types.edit',[$transaction_type->id]) }}" class="btn btn-xs btn-info">Edit</a>{!! Form::open(array(
                'style' => 'display: inline-block;',
                'method' => 'DELETE',
                'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                'route' => ['transaction_types.destroy', $transaction_type->id])) !!}
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
        window.route_mass_crud_entries_destroy = '{{ route('transaction_types.mass_destroy') }}';
    </script>
@endsection