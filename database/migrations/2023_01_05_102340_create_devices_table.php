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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->string('longitude');
            $table->string('latitude');
            $table->string('device_type');
            $table->string('manufacturer');
            $table->string('model');
            $table->date('install_date');
            $table->text('notes');
            $table->string('eui');
            $table->string('serial_number');       
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
        Schema::dropIfExists('devices');
    }
};
