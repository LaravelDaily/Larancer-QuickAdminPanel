@extends('layouts.app')

@section('content')
    <h3 class="page-title">Currencies</h3>

    <p>
        <a href="{{ route('currencies.create') }}" class="btn btn-success">Add new</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($currencies) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Title</th>
                        <th>Code</th>
                        <th>Main currency</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($currencies) > 0)
                        @foreach ($currencies as $currency)
                            <tr data-entry-id="{{ $currency->id }}">
                                <td></td>
                                <td>{{ $currency->title }}</td>
                                <td>{{ $currency->code }}</td>
                                <td>{{ $currency->main_currency == 1 ? 'Yes' : 'No' }}</td>
                                <td><a href="{{ route('currencies.edit',[$currency->id]) }}" class="btn btn-xs btn-info">Edit</a>{!! Form::open(array(
                'style' => 'display: inline-block;',
                'method' => 'DELETE',
                'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                'route' => ['currencies.destroy', $currency->id])) !!}
    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
    {!! Form::close() !!}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">No entries in table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('currencies.mass_destroy') }}';
    </script>
@endsection