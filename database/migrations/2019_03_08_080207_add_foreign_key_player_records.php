<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyPlayerRecords extends Migration
{
    public function up()
    {
            Schema::table('player_records', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('player_records', function (Blueprint $table) {
            $table->dropForeign('player_records_users_id_foreign');
        });    }
}
