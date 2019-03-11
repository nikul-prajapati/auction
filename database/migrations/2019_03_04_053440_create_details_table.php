<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('p_match');
            $table->integer('p_run');
            $table->integer('p_wickets');
            $table->string('type',55);
            $table->string('batsman',55);
            $table->string('bowler',55);
            $table->timestamps();
            // $table->integer('u_id')->unsigned()->index('player_record_u_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}
