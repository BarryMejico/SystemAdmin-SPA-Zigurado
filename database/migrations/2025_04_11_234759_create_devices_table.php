<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->string('DeviceCode');
            $table->primary('DeviceCode');
            $table->timestamps();
            $table->string('Ccode');
            $table->foreign('Ccode')->references('Ccode')->on('customers')->onDelete('cascade');
            $table->string('Name');
            $table->string('Details')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
