<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignableTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaignable_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mail_campaign_id');
            $table->unsignedBigInteger('mail_template_id');
            $table->timestamps();

            $table->foreign('mail_campaign_id')->references('id')->on('mail_campaigns')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('mail_template_id')->references('id')->on('mail_templates')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaignable_templates');
    }
}
