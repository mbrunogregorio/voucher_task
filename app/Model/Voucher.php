<?php
/**
 * Created by PhpStorm.
 * User: DI
 * Date: 11/12/2017
 * Time: 10:23
 */
namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    //
    protected $fillable = ['code', 'recipient_id', 'specialoffer_id', 'status', 'expire_at', 'used_at'];


    public function generateCode($lenght = 8){

        $this->code = $random = str_random($lenght);

        if(is_null($this->code))
            return false;
        return true;
    }

    public function checkOut(){
        $this->status = 'off';
        $this->used_at = Carbon::now();

        if($this->save())
            return true;

        return false;
    }

}
