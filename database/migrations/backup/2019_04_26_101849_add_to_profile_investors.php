<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToUmkmNew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('umkm_new', function (Blueprint $table) {
            $table->string('status_nib')->nullable();
            $table->longText('uraian_usaha')->nullable();
            $table->boolean('is_kawasan_industri')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('umkm_new', function (Blueprint $table) {
            //
        });
    }
}
