@extends('layouts.app')

@section('title', 'Create Recipient')

@section('content')

    <div class="panel">

        <div class="panel-footer text-right">
            <a href="{{route("recipients.index")}}" class="btn btn-default">Back</a>
        </div>

        {!! Form::open(['route'=>"recipients.store"]) !!}

        <div class="panel-body">

            @include("recipients._form")

        </div>
        <div class="panel-footer text-right">
            {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
            <a href="{{route("recipients.index")}}" class="btn btn-default">Back</a>
        </div>

        {!! Form::close() !!}
    </div>

@endsection
