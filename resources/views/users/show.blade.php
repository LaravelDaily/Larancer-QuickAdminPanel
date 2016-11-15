@extends('layouts.app')

@section('content')
    <h3 class="page-title">Users</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>Name</th>
                    <td>{{ $user->name }}</td></tr><tr><th>Email</th>
                    <td>{{ $user->email }}</td></tr><tr><th>Password</th>
                    <td>---</td></tr><tr><th>Role</th>
                    <td>{{ $user->role->title or '' }}</td></tr><tr><th>Remember token</th>
                    <td>{{ $user->remember_token }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('users.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
@stop