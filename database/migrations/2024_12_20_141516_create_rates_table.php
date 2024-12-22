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
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('base_currency_id');
            $table->bigInteger('target_currency_id');
            $table->decimal('rate', 18, 6);
            $table->date('effective_date');
            $table->timestamps();

            $table->foreign('base_currency_id')->references('id')->on('currencies');
            $table->foreign('target_currency_id')->references('id')->on('currencies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};