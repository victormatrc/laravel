<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_transfers', function (Blueprint $table) {
            $table->id();
            $table->float("value")->nullable(false);
            $table->foreignId('payee_id')->nullable(false);
            $table->foreign('payee_id')->references('id')->on('users');
            $table->foreignId('payer_id')->nullable(false);
            $table->foreign('payer_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pay_transfer');
    }
};
