<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('vm_prov', 'vm_provs');
        Schema::rename('profil_kep_prov', 'profil_kep_provs');
        Schema::rename('aset_prov', 'aset_provs');
        Schema::rename('luas_prov', 'luas_provs');
        Schema::rename('batas_prov', 'batas_provs');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
