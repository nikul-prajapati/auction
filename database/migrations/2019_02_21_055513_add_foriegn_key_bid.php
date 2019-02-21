<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForiegnKeyBid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bid', function (Blueprint $table) {
            $table->foreign('Team_id')->references('Team_id')->on('team')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('P_id')->references('P_id')->on('player_type')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bid', function (Blueprint $table) {
            $table->dropForeign('bid_Team_id_foreign');
            $table->dropForeign('bid_P_id_foreign');
        });
    }
}
