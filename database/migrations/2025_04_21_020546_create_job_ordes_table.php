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
        Schema::create('job_ordes', function (Blueprint $table) {
            // $table->id();
            $table->timestamps();
            $table->string('JOCode');
            $table->primary('JOCode');
            $table->date('TransactionDate');
            $table->string('Ccode');
            $table->foreign('Ccode')->references('Ccode')->on('customers')->onDelete('cascade');
            $table->string('DeviceCode');
            $table->foreign('DeviceCode')->references('DeviceCode')->on('devices')->onDelete('cascade');
            $table->string('ProblemDescription');
            $table->string('Action')->nullable();
            $table->string('Status')->nullable();
            $table->string('RepairedBy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_ordes');
    }
};
