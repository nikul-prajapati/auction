<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForiegnKeyPlayerDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('player_details', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('player_records_id')->references('id')->on('player_records')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('Team_id')->references('id')->on('teams')->onUpdate('RESTRICT')->onDelete('CASCADE');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('player_details', function (Blueprint $table) {
            $table->dropForeign('player_details_users_id_foreign');
            $table->dropForeign('player_details_player_records_id_foreign');
            $table->dropForeign('player_details_Team_id_foreign');
            
        }); 
    }
}
