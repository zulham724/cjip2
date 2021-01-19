<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToUmkmNewLagi2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('umkm_new', function (Blueprint $table) {
            $table->string('jenis_perusahaan');
            $table->renameColumn('nama_perseroan', 'nama_perusahaan');
            $table->renameColumn('alamat_pendirian', 'alamat');
            $table->renameColumn('jumlah_tki', 'tenaga_kerja');
            $table->dropColumn('jumlah_tka');
            $table->dropColumn('nama_pendaftar');
            $table->dropColumn('total_modal');
            $table->dropColumn('nama_pemegang_saham');
            $table->dropColumn('negara_asal');

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
