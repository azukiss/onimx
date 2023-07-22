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
        Schema::create('plan_subscribers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('plan_id')->references('id')->on('plans')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('role_id')->references('id')->on('roles')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->dateTime('started_date');
            $table->dateTime('ended_date');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_subscribers');
    }
};
