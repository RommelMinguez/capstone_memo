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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('phone_number');
            $table->string('region');
            $table->string('province');
            $table->string('city_municipality');
            $table->string('barangay');
            $table->string('street_building');
            $table->string('unit_floor')->nullable();
            $table->timestamps();
        });



        // Schema::create('philippines_addresses', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('psgc')->nullable();
        //     $table->string('code')->nullable();
        //     $table->string('name')->nullable();
        //     $table->string('oldname')->nullable();
        //     $table->string('level')->nullable();
        //     $table->string('cityMunName')->nullable();
        //     $table->string('provName')->nullable();
        //     $table->string('regName')->nullable();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
