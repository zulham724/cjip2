<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoiInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loi_interests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id');
            $table->integer('user_id');
            $table->integer('kab_kota_id');
            $table->string('nilai_usd');
            $table->string('nilai_rp');
            $table->string('lokasi_investasi');
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
        Schema::dropIfExists('loi_interests');
    }
}
