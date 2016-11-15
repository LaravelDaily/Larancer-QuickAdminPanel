@extends('layouts.app')

@section('content')
    <h3 class="page-title">Clients</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>First name</th>
                    <td>{{ $client->first_name }}</td></tr><tr><th>Last name</th>
                    <td>{{ $client->last_name }}</td></tr><tr><th>Company name</th>
                    <td>{{ $client->company_name }}</td></tr><tr><th>Email</th>
                    <td>{{ $client->email }}</td></tr><tr><th>Phone</th>
                    <td>{{ $client->phone }}</td></tr><tr><th>Website</th>
                    <td>{{ $client->website }}</td></tr><tr><th>Skype</th>
                    <td>{{ $client->skype }}</td></tr><tr><th>Country</th>
                    <td>{{ $client->country }}</td></tr><tr><th>Client status</th>
                    <td>{{ $client->client_status->title or '' }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('clients.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
@stop