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
    protected $fillable = ['code', 'recipient_id', 'special_offer_id', 'status', 'expire_at', 'used_at'];

    public function special_offer()
    {
        return $this->belongsTo(SpecialOffer::class);
    }

    public function recipient()
    {
        return $this->belongsTo(Recipient::class);
    }

    public function generateCode($lenght = 8)
    {

        $code = $random = str_random($lenght);

        if (is_null($code))
            return false;
        return $code;
    }

    public function checkOut()
    {

        $this->status = 1;
        $this->used_at = Carbon::now();

        if ($this->save())
            return true;

        return false;
    }

    public function getStatusAttribute($value)
    {
        if (is_null($value)) {
            return $value;
        }
        $value = ($value == 1)? 'Used': 'Available';
        return $value;
    }


}
