@extends('layouts.app')

@section('content')
    <h3 class="page-title">{{ $articleCategory->name }}</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Name</th>
                            <td>{{ $articleCategory->name }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $articleCategory->description }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('article-categories.index') }}" class="btn btn-default">
                Back to list
            </a>
            <a href="{{ route('article-categories.edit', $articleCategory->id) }}" class="btn btn-warning">
                Edit
            </a>
        </div>
    </div>
@stop