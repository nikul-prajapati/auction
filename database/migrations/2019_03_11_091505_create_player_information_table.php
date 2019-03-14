<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_information', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('played_match');
            $table->integer('total_runs');
            $table->integer('total_wickets');
            $table->string('speciality',55);
            $table->string('batsman_type',55);
            $table->string('bowler_type',55);
            $table->integer('age');
            $table->string('Is_captain',55);
            $table->integer('users_id')->unsigned()->index('player_records_user_id_foreign');
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
        Schema::dropIfExists('player_information');
    }
}
