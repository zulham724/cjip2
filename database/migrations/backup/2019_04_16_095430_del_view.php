<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DelView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perikanans', function (Blueprint $table) {
            $table->dropColumn(['page_view_type', 'page_view_id', 'like_count']);
        });
        Schema::table('pariwisatas', function (Blueprint $table) {
            $table->dropColumn(['page_view_type', 'page_view_id', 'like_count']);
        });
        Schema::table('pertanians', function (Blueprint $table) {
            $table->dropColumn(['page_view_type', 'page_view_id', 'like_count']);
        });
        Schema::table('perkebunans', function (Blueprint $table) {
            $table->dropColumn(['page_view_type', 'page_view_id', 'like_count']);
        });
        Schema::table('peternakans', function (Blueprint $table) {
            $table->dropColumn(['page_view_type', 'page_view_id', 'like_count']);
        });


        Schema::table('bandaras', function (Blueprint $table) {
            $table->dropColumn(['page_view_type', 'page_view_id', 'like_count']);
        });
        Schema::table('pelabuhans', function (Blueprint $table) {
            $table->dropColumn(['page_view_type', 'page_view_id', 'like_count']);
        });
        Schema::table('keretas', function (Blueprint $table) {
            $table->dropColumn(['page_view_type', 'page_view_id', 'like_count']);
        });
        Schema::table('listriks', function (Blueprint $table) {
            $table->dropColumn(['page_view_type', 'page_view_id', 'like_count']);
        });
        Schema::table('kawasan_industris', function (Blueprint $table) {
            $table->dropColumn(['page_view_type', 'page_view_id', 'like_count']);
        });
        Schema::table('tols', function (Blueprint $table) {
            $table->dropColumn(['page_view_type', 'page_view_id', 'like_count']);
        });
        Schema::table('jalur_gas', function (Blueprint $table) {
            $table->dropColumn(['page_view_type', 'page_view_id', 'like_count']);
        });
        Schema::table('waduks', function (Blueprint $table) {
            $table->dropColumn(['page_view_type', 'page_view_id', 'like_count']);
        });
        Schema::table('banks', function (Blueprint $table) {
            $table->dropColumn(['page_view_type', 'page_view_id', 'like_count']);
        });
        Schema::table('smks', function (Blueprint $table) {
            $table->dropColumn(['page_view_type', 'page_view_id', 'like_count']);
        });
        Schema::table('bpks', function (Blueprint $table) {
            $table->dropColumn(['page_view_type', 'page_view_id', 'like_count']);
        });
        Schema::table('lpks', function (Blueprint $table) {
            $table->dropColumn(['page_view_type', 'page_view_id', 'like_count']);
        });
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
