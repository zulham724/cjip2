<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_recipients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mail_campaign_id');
            $table->unsignedInteger('user_investor_id')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();

            $table->foreign('mail_campaign_id')->references('id')->on('mail_campaigns')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_investor_id')->references('id')->on('user_investors')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mail_recipients');
    }
}
