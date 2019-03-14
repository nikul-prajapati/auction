<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSelectcaptainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selectcaptains', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('teams_id')->unsigned()->index('selectcaptains_teams_id_foreign');
             $table->integer('users_id')->unsigned()->index('selectcaptains_user_id_foreign');
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
        Schema::dropIfExists('selectcaptains');
    }
}
