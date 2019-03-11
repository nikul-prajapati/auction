<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_details', function (Blueprint $table) {
            $table->increments('id');
           
            $table->integer('users_id')->unsigned()->index('player_details_user_id_foreign');
            $table->integer('Team_id')->unsigned()->index('player_details_Team_id_foreign');
            
            $table->integer('player_records_id')->unsigned()->index('player_details_player_records_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_details');
    }
}
