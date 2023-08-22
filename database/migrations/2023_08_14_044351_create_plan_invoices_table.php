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
        Schema::create('plan_invoices', function (Blueprint $table) {
            $table->id();

            $table->string('code')->unique();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->json('customer');
            $table->foreignId('plan_id')->references('id')->on('plans');
            $table->json('item');
            $table->foreignId('payment_id')->references('id')->on('plan_payments');
            $table->json('payment');
            $table->string('status');

            $table->timestamp('due_at')->nullable();
            $table->timestamp('paid_at')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_invoices');
    }
};
