<?php
/**
 * Created by PhpStorm.
 * User: DI
 * Date: 11/12/2017
 * Time: 15:01
 */

namespace App\Http\Controllers;

use App\Model\Recipient;
use App\Model\SpecialOffer;
use App\Model\Voucher;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SpecialOffersController extends Controller
{
    public function index()
    {
        $special_offers = SpecialOffer::all();

        return view('special_offers.index', compact('special_offers'));
    }

    public function view($id = null)
    {
        $register = SpecialOffer::find($id);

        return view("special_offers.edit", compact('register'));
    }

    public function create()
    {
        return view("special_offers.create");
    }

    public function store(Request $request)
    {
        $dados = $request->all();

        //validate the fields

        SpecialOffer::create($dados);
        return redirect()->route("special_offers.index");
    }

    public function edit($id = null)
    {
        $register = SpecialOffer::find($id);

        return view("special_offers.edit", compact('register'));
    }

    public function update(Request $request, $id = null)
    {
        //validate the fields

        $dados = $request->all();

        $register = SpecialOffer::find($id);
        $register->update($dados);

        return redirect()->route("special_offers.index");
    }

    public function destroy($id)
    {
        $register = SpecialOffer::find($id);
        $register->delete();

        return redirect()->route("recipient.index");
    }

    public function vouchers($id = null)
    {
        $register = SpecialOffer::find($id);
        return view("special_offers.vouchers", compact('register'));
    }

    public function vouchers_form($id = null)
    {
        $register = SpecialOffer::find($id);
        return view("special_offers.vouchers_form", compact('register'));
    }


    /**
     * Receives a request with the expiration date and generates a voucher for each recipient
     *
     */
    public function vouchers_generate(Request $request, $id = null)
    {

        if (!is_null($id)) {
            //Take the offer that owns the vouchers to be created
            $offer = SpecialOffer::find($id);

            //List of all recipients
            $recipients = Recipient::all();

            $voucher = new Voucher();

            $data = $request->only('expire_at');
            $code_lenght = $request->input('code_lenght');
            $data['special_offer_id'] = $offer->id;

            foreach($recipients as $recipient){
                $data['recipient_id'] = $recipient->id;
                $data['code'] = $voucher->generateCode($code_lenght);

                //A validator with the validation rules to be applied in the $data array
                $validator = Validator::make($data, [
                    'expire_at' => 'required',
                    'code' => 'required|unique:vouchers|max:32|min:8',
                    'special_offer_id' => 'required',
                    'recipient_id' => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect("/special_offers/{{$id}}/vouchers/form")
                        ->withErrors($validator)
                        ->withInput();
                }

                Voucher::create($data);

                return redirect()->route('special_offers.vouchers', ['id' => $id]);
            }

        }


    }
}
