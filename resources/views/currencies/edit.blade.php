@extends('layouts.app')

@section('content')
    <h3 class="page-title">Currencies</h3>
    
    {!! Form::model($currency, ['method' => 'PUT', 'route' => ['currencies.update', $currency->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('code', 'Code*', ['class' => 'control-label']) !!}
                    {!! Form::text('code', old('code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('code'))
                        <p class="help-block">
                            {{ $errors->first('code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('main_currency', 'Main currency', ['class' => 'control-label']) !!}
                    {!! Form::hidden('main_currency_old', $currency->main_currency) !!}
                    {!! Form::checkbox('main_currency', 1, old('main_currency', $currency->main_currency), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('main_currency'))
                        <p class="help-block">
                            {{ $errors->first('main_currency') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

