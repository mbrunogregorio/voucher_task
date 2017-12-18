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

    public function testVouchersGenerate()
    {
        $offer = \App\Model\SpecialOffer::create(['name' => 'Test Offer', 'discount' => 40]);
        $this->assertTrue($offer->id!='');
        $offer_id = $offer->id;

        $this->call('POST', url("http://localhost:8000/special_offers/{$offer->id}/vouchers/generate"),
            [
                'expire_at' => \Carbon\Carbon::now(),
                'code_lenght' => '10',
                'special_offer_id' => $offer_id,
                ]);

        $this->assertResponseStatus(302);
        $this->seeInDatabase('vouchers', ['special_offer_id' => $offer_id]);
    }

}
