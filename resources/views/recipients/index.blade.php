@extends('layouts.app')

@section('title', 'Recipients')

@section('content')
    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Listing</h3>
                </div>
                <div class="panel-body">
                    <div class="btn-group">
                        <a  href="{{ route('recipients.create') }}" class="btn btn-success">
                            <i class="fa fa-plus-circle"></i> New Recipient
                        </a>
                    </div>
                    <table class="table table-responsive table-stripped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th style="text-align: center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recipients as $model)
                            <tr>
                                <td>{{ $model->name }}</td>
                                <td>{{ $model->email }}</td>
                                <td>

                                    <div class="row text-center">
                                        <a href="{{ route('recipients.edit', ['id'=> $model->id]) }}" title="Edit this record">
                                            <span><i class="fa fa-fw fa-edit fa-lg"></i></span>
                                        </a>
                                        <a href="{{ route('recipients.vouchers', ['id'=> $model->id]) }}" title="Vouchers">
                                            <span><i class="fa fa-fw fa-eye fa-lg"></i></span>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @if (count($recipients) == 0)
                            <tr>
                                <td colspan="3">No results</td>
                            </tr>
                        @endif
                    </table>

                </div>
            </div>
        </div>

@endsection
