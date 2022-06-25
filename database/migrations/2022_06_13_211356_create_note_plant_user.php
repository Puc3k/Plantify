<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotePlantUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_plant_user', function (Blueprint $table) {
            $table->unsignedBigInteger('note_id')->index()->nullable();
            $table->unsignedBigInteger('plant_id')->index();
            $table->unsignedBigInteger('user_id')->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('note_plant_user');
    }
}
