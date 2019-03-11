<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyPlayerrecordsUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('playerrecords_user', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('player_records_id')->references('id')->on('player_records')->onUpdate('RESTRICT')->onDelete('CASCADE');
            
            
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
            $table->dropForeign('playerrecords_user_users_id_foreign');
            $table->dropForeign('playerrecords_user_player_records_id_foreign');
           
        }); 
    }
}
