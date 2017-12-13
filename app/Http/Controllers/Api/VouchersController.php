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


    public function check(Request $request)
    {
        $data = $request->all();
        $voucher = Voucher::where('code', '1su6bgiITWnvqx31');


        return json_encode($voucher);
    }
}
