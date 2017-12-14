<?php
/**
 * Created by PhpStorm.
 * User: DI
 * Date: 11/12/2017
 * Time: 15:01
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Voucher;
use Illuminate\Http\Request;

class VouchersController extends Controller
{

    /**
     * This action is responsable to receive the request with e-mail and voucher's code, find the record, if it does exist
     * then validate the voucher and checkout it, returning the percentage of discount
     **/
    public function check(Request $request)
    {
        $data = $request->all();

        //Look for the voucher record
        $voucher = Voucher::where('code', $request->input('code'))->get()->first();

        //Check if the voucher exists and validate it
        if (!empty($voucher) && $voucher->validate()) {

            //Check email and set voucher to used
            $response = $voucher->checkOut($data['email']);
            return $response;
        }
        return response()->json(['error' => 'Invalid voucher code']);
    }

}
