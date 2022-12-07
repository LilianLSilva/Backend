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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id')->unique();
            $table->string('name')->comment('The name of this vehicle. The common name, such as "Sand Crawler" or "Speeder bike".');
            $table->string('model');
            $table->string('vehicle_class');
            $table->string('manufacturer');
            $table->string('length');
            $table->string('cost_in_credits');
            $table->string('crew');
            $table->string('passengers');
            $table->string('max_atmosphering_speed');
            $table->string('cargo_capacity');
            $table->string('consumables');
            $table->json('films');
            $table->json('pilots');
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
        Schema::dropIfExists('vehicles');
    }
};
