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
use Illuminate\Http\Request;

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

    public function vouchers($id = null){
        $register = Recipient::find($id);
        return json_encode($register->vouchers);
    }
}
