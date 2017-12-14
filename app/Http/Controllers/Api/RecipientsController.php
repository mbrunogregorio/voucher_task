<?php
/**
 * Created by PhpStorm.
 * User: DI
 * Date: 11/12/2017
 * Time: 15:01
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Recipient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecipientsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(){
        $recipients = Recipient::all();

        return json_encode($recipients);
    }

    public function view($id = null)
    {
        $register = Recipient::find($id);

        return json_encode($register);
    }

    /**
     * Receive a request with an e-mail address and returns a list with all it's valid vouchers
     *
     */
    public function vouchers(Request $request){
        //Look for the recipient record
        $recipient = Recipient::where('email', $request->input('email'))->get()->first();

        //Find the records on Database
        $vouchers = DB::table('vouchers')
            ->join('special_offers', 'special_offers.id', '=', 'vouchers.special_offer_id')
            ->select('vouchers.code', 'special_offers.name')
            ->where('vouchers.recipient_id', $recipient->id)
            ->where('status', 0)
            ->where('expire_at', '>=', Carbon::now())
            ->get();


        return json_encode($vouchers);
    }
}
