@extends('layouts.app')

@section('title', 'Create Recipient')

@section('content')

    <div class="panel">
        <div class="panel-footer text-right">
            <a href="{{route("recipients.index")}}" class="btn btn-default">Back</a>
        </div>

        <form action="{{route('recipients.store')}}" method="post">
            <div class="panel-body">
                @include("recipients._form")
            </div>

            <div class="panel-footer text-right">
                <input type="submit" value="Save" class="btn btn-primary">
                <a href="{{route("recipients.index")}}" class="btn btn-default">Back</a>
            </div>
        </form>
    </div>

@endsection
