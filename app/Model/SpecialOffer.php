<?php
/**
 * Created by PhpStorm.
 * User: Bruno Gregorio
 * Date: 16/12/2017
 * Time: 10:21
 */
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SpecialOffer extends Model
{
    //
    protected $fillable = ['name', 'discount'];

    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }
}
