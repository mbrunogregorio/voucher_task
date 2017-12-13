<?php
/**
 * Created by PhpStorm.
 * User: DI
 * Date: 11/12/2017
 * Time: 15:01
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\SpecialOffer;


class SpecialOffersController extends Controller
{
    public function index()
    {
        $special_offers = SpecialOffer::all();

        return json_encode($special_offers);
    }

    public function view($id = null)
    {
        $register = SpecialOffer::find($id);
        return json_encode($register);
    }

    public function vouchers($id = null)
    {
        $register = SpecialOffer::find($id);
        return json_encode($register->vouchers);
    }

}
