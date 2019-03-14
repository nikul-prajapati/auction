<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyPlayers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::table('players', function (Blueprint $table) {
            $table->foreign('player_information_id')->references('id')->on('player_information')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('player_details_id')->references('id')->on('player_details')->onUpdate('RESTRICT')->onDelete('CASCADE');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('players', function (Blueprint $table) {
            $table->dropForeign('players_player_information_id_foreign');
            $table->dropForeign('players_users_id_foreign');
            $table->dropForeign('players_player_details_id_foreign');
            
        });    }
}
