@extends('layouts.app')

@section('content')
    <h3 class="page-title">{{ $article->name }}</h3>

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
                            <td>{{ $article->name }}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $article->category->name }}</td>
                        </tr>
                        <tr>
                            <th>URL</th>
                            <td>
                                <a href="{{ $article->url }}" target="_blank">{{ $article->url }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $article->description ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('articles.index') }}" class="btn btn-default">
                Back to list
            </a>
            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">
                Edit
            </a>
        </div>
    </div>
@stop