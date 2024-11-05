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
        Schema::create('custom_orders', function (Blueprint $table) {
            $table->id();
            $table->text('image_src');
            $table->string('cake_name');
            $table->decimal('budget');
            $table->text('description');
            $table->integer('age');
            $table->string('candle_type');
            $table->text('dedication');
            $table->integer('quantity');
            $table->string('status');
            $table->dateTime('prefered_datetime')->nullable();
            $table->string('payment_method')->nullable();
            $table->decimal('given_price')->nullable();
            $table->text('given_note')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('address_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });

        Schema::create('custom_images', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('ai_name')->nullable();
            $table->text('path');
            $table->text('prompt')->nullable();
            $table->string('hash')->unique()->nullable();
            $table->foreignId('custom_order_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });

        Schema::create('custom_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('custom_order_id')->constrained()->onDelete('cascade');
            $table->foreignId('tag_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_orders');
    }
};
