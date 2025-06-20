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
        Schema::create('filters_lot', function (Blueprint $table) {
            $table->foreignId('lot_id')->constrained('lots')->onDelete('cascade');
            $table->foreignId('filter_id')->constrained('filters')->onDelete('cascade');
            $table->primary(['lot_id', 'filter_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filters_lot');
    }
};
