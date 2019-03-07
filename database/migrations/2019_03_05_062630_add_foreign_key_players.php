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
            $table->foreign('PR_id')->references('id')->on('player_record')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('PD_id')->references('id')->on('player_details')->onUpdate('RESTRICT')->onDelete('CASCADE');
        
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
            $table->dropForeign('players_PR_id_foreign');
            $table->dropForeign('players_PD_id_foreign');
            
        });    }
}
