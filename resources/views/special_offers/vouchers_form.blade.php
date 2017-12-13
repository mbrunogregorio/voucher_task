@extends('layouts.app')

@section('title', 'Vouchers Creation')

@section('content')

    <div class="panel">
        <div class="panel-footer text-right">
            <a href="{{route("special_offers.vouchers")}}" class="btn btn-default">Back</a>
        </div>

        <form action="{{ route('special_offers.vouchers.generate', ['id' => $register->id]) }}" method="post">
            <div class="panel-body">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="expire_at" class="control-label">Expiration date:</label>
                            <input class="form-control" placeholder="12-25-2017" name="expire_at" type="date" id="expire_at">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="code_lenght" class="control-label">Lenght:</label>
                            <input class="form-control" placeholder="Voucher's code lenght" name="code_lenght" type="text" id="code_lenght">
                        </div>
                    </div>
                </div>


            </div>

            <div class="panel-footer text-right">
                <input type="submit" value="Save" class="btn btn-primary">
                <a href="{{route("special_offers.vouchers")}}" class="btn btn-default">Back</a>
            </div>
        </form>
    </div>

@endsection
