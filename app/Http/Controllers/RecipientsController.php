<?php
/**
 * Created by PhpStorm.
 * User: DI
 * Date: 11/12/2017
 * Time: 15:01
 */

namespace App\Http\Controllers;

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

        return view('recipients.index', compact('recipients'));
    }

    public function view($id = null)
    {
        $register = Recipient::find($id);

        return view("recipients.edit", compact('register'));
    }

    public function create()
    {
        return view("recipients.create");
    }

    public function store(Request $request)
    {
        $dados = $request->all();

        //validate the fields

        Recipient::create($dados);
        return redirect()->route("recipients.index");
    }

    public function edit($id = null)
    {
        $register = Recipient::find($id);

        return view("recipients.edit", compact('register'));
    }

    public function update(Request $request, $id = null)
    {
        //validate the fields

        $dados = $request->all();

        $register = Recipient::find($id);
        $register->update($dados);

        return redirect()->route("recipients.index");
    }

    public function destroy($id)
    {
        $register = Recipient::find($id);
        $register->delete();

        return redirect()->route("recipient.index");
    }

    public function vouchers($id = null){
        $register = Recipient::find($id);
        return view("recipients.vouchers", compact('register'));
    }
}
