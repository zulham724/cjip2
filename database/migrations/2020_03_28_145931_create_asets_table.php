<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAsetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('asets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('kab_kota_id')->nullable();
			$table->string('alamat')->nullable();
			$table->string('luas_tanah')->nullable();
			$table->string('status')->nullable();
			$table->string('pemakai')->nullable();
			$table->string('sumber_data')->nullable();
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
		Schema::drop('asets');
	}

}
