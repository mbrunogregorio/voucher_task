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
use Illuminate\Http\Request;

class Voucher extends Model
{
    //
    protected $fillable = ['code', 'recipient_id', 'special_offer_id', 'status', 'expire_at', 'used_at'];

    public function special_offer()
    {
        return $this->belongsTo(SpecialOffer::class);
    }

    public function recipient()
    {
        return $this->belongsTo(Recipient::class);
    }

    /**
     * Generate a random voucher code, the code's lenth depend on the $length param, if it's null the
     * value will be setted to 8
     *
     */
    public function generateCode($lenght = 8)
    {

        $code = $random = str_random($lenght);

        if (is_null($code))
            return false;
        return $code;
    }

    /**
     * Check if a voucher is valid, the status = available and the expiration date less then currently datetime
     */
    public function validate()
    {
        if($this->status === 0)
            if(Carbon::now() <= $this->expire_at)
                return true;
        return false;
    }

    /**
     * Check the e-mail address, makes the voucher's checkout, turning the status to used and setting the date of usage
     *
     */
    public function checkOut($email = '')
    {
        if($this->recipient->email === $email){
            $this->status = 1;
            $this->used_at = Carbon::now();

            if ($this->save())
                return response()->json(['discount' => $this->special_offer->discount]);
        }

        return response()->json(['error' => 'Invalid Email']);
    }

    /**
     * Turn the status atribute to readable value
     *
     */
    public function getStatusAttribute($value)
    {
        if (is_null($value)) {
            return $value;
        }
        $value = ($value == 1)? 'Used': 'Available';
        return $value;
    }


}
