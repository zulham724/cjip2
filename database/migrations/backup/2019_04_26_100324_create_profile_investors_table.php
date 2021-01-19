<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileInvestorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_investors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('investor_name');
            $table->string('jabatan');
            $table->string('phone');
            $table->string('nama_perusahaan');
            $table->string('bidang_usaha');
            $table->text('alamat');
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
        Schema::dropIfExists('profile_investors');
    }
}
