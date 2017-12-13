@extends('layouts.app')

@section('title', 'Vouchers')

@section('content')
    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Recipient's Vouchers</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-stripped">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Expiration date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($register->vouchers as $voucher)
                            <tr>
                                <td>{{ $voucher->code }}</td>
                                <td>{{ $voucher->status }}</td>
                                <td>{{ $voucher->expire_at }}</td>
                            </tr>
                        @endforeach
                        @if (count($register->vouchers) == 0)
                            <tr>
                                <td colspan="3">No results</td>
                            </tr>
                        @endif
                    </table>

                </div>
            </div>
        </div>

@endsection
