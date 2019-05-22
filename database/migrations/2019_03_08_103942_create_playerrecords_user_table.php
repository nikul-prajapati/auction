<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerrecordsUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playerrecords_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned()->index('playerrecords_user_users_id_foreign');
            $table->integer('player_records_id')->unsigned()->index('playerrecords_user_player_records_id_foreign');
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
        Schema::dropIfExists('playerrecords_user');
    }
}
