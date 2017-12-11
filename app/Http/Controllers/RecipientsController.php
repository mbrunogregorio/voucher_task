<?php
/**
 * Created by PhpStorm.
 * User: DI
 * Date: 11/12/2017
 * Time: 15:01
 */

namespace App\Http\Controllers;

use App\Model\Recipient;

class RecipientsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(){
        $recipients = Recipient::all();

        return view('recipients/index', compact('recipients'));
    }
}
