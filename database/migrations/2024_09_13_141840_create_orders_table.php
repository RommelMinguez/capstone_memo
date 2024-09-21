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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            //$table->string('status');
            $table->decimal('total');
            $table->date('prefered_date');
            $table->time('prefered_time');
            $table->string('address');
            $table->string('payment_method');
            $table->dateTime('date_delivered')->nullable();
            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->foreignId('cake_id');
            $table->string('status');
            $table->smallInteger('quantity');
            $table->smallInteger('age');
            $table->string('candle_type');
            $table->text('dedication');
            $table->decimal('price');
            $table->decimal('sub_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_items');
    }
};
