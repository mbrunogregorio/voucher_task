<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use \Illuminate\Support\Facades\Artisan;

class VouchersTest extends Laravel\Lumen\Testing\TestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */

    use DatabaseTransactions;

    public function createApplication()
    {
        return require __DIR__ . '/../bootstrap/app.php';
    }


    public function testVouchersCreation()
    {

        $recipient = \App\Model\Recipient::create(['name' => 'Test Recipient', 'email' => str_random(6) . '@recipient.com']);
        $offer = \App\Model\SpecialOffer::create(['name' => 'Test Offer', 'discount' => 40]);

        $this->assertTrue($offer->id != '');
        $this->assertTrue($recipient->id != '');

        $offer_id = $offer->id;
        $recipient_id = $recipient->id;

        $data = [
            'expire_at' => \Carbon\Carbon::now(),
            'code_lenght' => str_random(10),
            'special_offer_id' => $offer_id,
            'recipient_id' => $recipient_id,
        ];

        if(\App\Model\Voucher::create($data)){
            $created = true;
        }
        $this->assertTrue($created);
        $this->seeInDatabase('vouchers', ['special_offer_id' => $offer_id, 'recipient_id' => $recipient_id]);
    }

}
