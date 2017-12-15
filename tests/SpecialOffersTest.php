<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use \Illuminate\Support\Facades\Artisan;

class SpecialOffersTest extends Laravel\Lumen\Testing\TestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */

    use DatabaseTransactions;

    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }

    public function testSpecialOfferCreation()
    {
        $this->json('POST', '/special_offers/store', ['name' => 'Black Friday', 'discount' => 50]);
        $this->assertResponseStatus(302);
        $this->seeInDatabase('special_offers', ['name' => 'Black Friday', 'discount' => 50]);

    }

    public function testSpecialOfferList()
    {
        $offers = \App\Model\SpecialOffer::all();

        if(!is_null($offers))
            $this->assertTrue(true);
    }

    public function testVouchersCreation()
    {
        dd(route('special_offers.vouchers.generate', ['id' => 1]));
        $recipient = \App\Model\Recipient::create(['name' => 'Test Recipient', 'email' => str_random(6).'@recipient.com']);
        $offer = \App\Model\SpecialOffer::create(['name' => 'Test Offer', 'discount' => 40]);

        $this->assertTrue($offer->id!='');
        $this->assertTrue($recipient->id!='');

        $this->call('POST', 'http://localhost:8000/'.route('special_offers.vouchers.generate', ['id' => 1]),
            ['expire_at' => \Carbon\Carbon::now(),
                'code' => 'abcd1234',
                'special_offer_id' => $offer->id,
                'recipient_id' => $recipient->id,
                ]);
        #dd($result);
        $this->assertResponseStatus(302);
        $this->seeInDatabase('vouchers', ['special_offer_id' => $offer->id, 'recipient_id' => $recipient->id]);
    }
/*

    */
}
