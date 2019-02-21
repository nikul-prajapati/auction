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
            $table->increments('PD_id');
            $table->integer('P_age');
            $table->string('Is_captain',55);
            $table->integer('u_id')->unsigned()->index('player_details_u_id_foreign');
            $table->integer('Team_id')->unsigned()->index('player_details_Team_id_foreign');
            $table->integer('P_id')->unsigned()->index('player_details_P_id_foreign');
            $table->integer('PR_id')->unsigned()->index('player_details_PR_id_foreign');
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
