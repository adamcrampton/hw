<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('number')->nullable();
            $table->text('name');
            $table->text('colour')->nullable();
            $table->text('image')->nullable();
            $table->unsignedInteger('year')->nullable();
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('series_id');
            $table->unsignedInteger('series_number')->nullable();
            $table->unsignedTinyInteger('treasure_hunt')->default(0);
            $table->unsignedTinyInteger('super_treasure_hunt')->default(0);
            $table->unsignedTinyInteger('owned')->default(0);
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('cars');
    }
}
