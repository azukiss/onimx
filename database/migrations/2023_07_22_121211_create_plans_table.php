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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();

            $table->string('code')->unique();
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->bigInteger('price');
            $table->string('currency');
            $table->string('currency_code');
            $table->bigInteger('stock')->unsigned()->default(0);
            $table->bigInteger('length')->unsigned();
            $table->mediumInteger('order')->unsigned()->default(1);
            $table->boolean('is_active');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};