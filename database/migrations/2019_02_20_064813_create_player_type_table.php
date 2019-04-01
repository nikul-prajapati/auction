<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_type', function (Blueprint $table) {
            $table->increments('P_id');
            $table->string('P_name',55);
            $table->integer('u_id')->unsigned()->index('player_type_u_id_foreign');
            //$table->integer('u_id');
                   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_type');
    }
}
