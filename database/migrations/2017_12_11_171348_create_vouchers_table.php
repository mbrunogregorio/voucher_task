<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique()->comment('A random string that is the identification code of a voucher');
            $table->boolean('status')->comment('Voucher\'s status');
            $table->dateTime('expire_at')->nullable();
            $table->dateTime('used_at')->nullable();

            $table->integer("recipient_id")->unsigned();
            $table->foreign("recipient_id")->references("id")->on("recipients");

            $table->integer("special_offer_id")->unsigned();
            $table->foreign("special_offer_id")->references("id")->on("special_offers");

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}
