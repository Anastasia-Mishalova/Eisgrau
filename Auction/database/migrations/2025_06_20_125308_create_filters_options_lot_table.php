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
        Schema::create('filters_options_lot', function (Blueprint $table) {
            $table->foreignId('lot_id')->constrained('lots')->onDelete('cascade');
            $table->foreignId('filter_option_id')->constrained('filters_options')->onDelete('cascade');
            $table->primary(['lot_id', 'filter_option_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filters_options_lot');
    }
};
