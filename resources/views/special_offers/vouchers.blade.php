@extends('layouts.app')

@section('title', 'Vouchers')

@section('content')
    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Special Offers's Vouchers</h3>
                </div>
                <div class="panel-footer text-right">
                    <a href="{{route("special_offers.index")}}" class="btn btn-default">Back</a>
                </div>
                <div class="panel-body">
                    <div class="btn-group">
                        <a  href="{{ route('special_offers.vouchers.form', ['id' => $register->id]) }}" class="btn btn-primary">
                            <i class="fa fa-plus-circle"></i> Generate Vouchers
                        </a>
                    </div>
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
                                <td colspan="3">No registers found</td>
                            </tr>
                        @endif
                    </table>

                </div>
                <div class="panel-footer text-right">
                    <a href="{{route("special_offers.index")}}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>

@endsection
