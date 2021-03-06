@extends('layouts.app')

@section('title', 'Edit')

@section('content')

    <div class="panel">
        <div class="panel-footer text-right">
            <a href="{{route("special_offers.index")}}" class="btn btn-default">Back</a>
        </div>

        <form action="{{route('special_offers.update', ['id'=> $register->id])}}" method="post">
            <div class="panel-body">
                @include("special_offers._form")
            </div>

            <div class="panel-footer text-right">
                <input type="submit" value="Save" class="btn btn-primary">
                <a href="{{route("special_offers.index")}}" class="btn btn-default">Back</a>
            </div>
        </form>
    </div>

@endsection
