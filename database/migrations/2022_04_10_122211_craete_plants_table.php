<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CraetePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function(Blueprint $table){
            $table->id();
            $table->text('name');
            $table->text('latinName');
            $table->enum('position', ['Bezpośrednie światło','Światło jasne, rozproszone','Półcień i cień']);
            $table->string('soil', 40);
            $table->string('watering', 40);
            $table->string('humidity', 30);
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plants');
    }
}
