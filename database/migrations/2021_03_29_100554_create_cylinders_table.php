<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCylindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cylinders', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number');
            $table->string('weight');
            $table->string('manufacture_date');
            $table->string('shelf_life');
            $table->string('country_of_origin');
            $table->string('source');
            $table->text('source_address');
            $table->text('current_location');
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
        Schema::dropIfExists('cylinders');
    }
}
