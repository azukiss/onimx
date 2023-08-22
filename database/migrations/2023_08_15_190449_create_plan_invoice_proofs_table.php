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
        Schema::create('plan_invoice_proofs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('invoice_id')->references('id')->on('plan_invoices');
            $table->json('upload');
            $table->mediumText('other')->nullable();
            $table->boolean('is_checked')->default(false);
            $table->boolean('is_valid')->nullable();

            $table->timestamp('checked_at')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_invoice_proofs');
    }
};
