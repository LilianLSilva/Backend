<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('planet_id')->unique();
            $table->string('rotation_period');
            $table->string('diameter');
            $table->string('orbital_period');
            $table->string('gravity');
            $table->string('population');
            $table->string('climate');
            $table->string('terrain');
            $table->string('surface_water');
            $table->json('residents');
            $table->json('films');
            $table->string('url');
            $table->string('created');
            $table->string('edited');
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
        Schema::dropIfExists('planets');
    }
};
