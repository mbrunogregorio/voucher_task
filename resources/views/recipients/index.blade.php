@extends('layouts.app')

@section('title', 'Recipient')

@section('content')
    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">List</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-stripped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recipients as $model)
                            <tr>
                                <td>{{ $model->name }}</td>
                                <td>{{ $model->email }}</td>
                                <td>

                                    <div class="row text-center">
                                        <a href="{{ route('recipients.edit', ['id'=> $model->id]) }}">
                                            <span><i class="fa fa-fw fa-edit fa-lg"></i></span>
                                        </a>


                                    </div>

                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>

@endsection
