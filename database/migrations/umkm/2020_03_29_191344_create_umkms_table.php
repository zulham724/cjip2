<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUmkmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umkm_new', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nib');
            $table->string('nama_perseroan');
            $table->string('alamat_pendirian');
            $table->string('nama_pendaftar');
            $table->string('kab_kota_id');
            $table->string('jumlah_tki');
            $table->string('jumlah_tka');
            $table->string('kbli');
            $table->string('total_modal');
            $table->string('jumlah_investasi');
            $table->date('tgl_terbit_oss');
            $table->string('status_pm');
            $table->string('nama_pemegang_saham');
            $table->string('negara_asal');
            $table->date('masa_berlaku');
            $table->string('lat');
            $table->string('lng');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('tahun');
            $table->bigInteger('tambahan');
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
        Schema::dropIfExists('umkm-new');
    }
}
