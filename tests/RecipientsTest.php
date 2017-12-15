<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use \Illuminate\Support\Facades\Artisan;

class RecipientsTest extends Laravel\Lumen\Testing\TestCase
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


    public function testRecipientCreation()
    {
        $this->json('POST', '/recipients/store', ['name' => 'Lorem Ipsummm', 'email' => 'teste@hotmail.com']);
        #dd($result);
        $this->assertResponseStatus(302);
        $this->seeInDatabase('recipients', ['email' => str_random(4).'@hotmail.com']);
    }

    public function testRecipientList()
    {
        $recipients = \App\Model\Recipient::all();

        if(!is_null($recipients))
            $this->assertTrue(true);
    }

    //Todo TEST VALID VOUCHER'S LIST
}
