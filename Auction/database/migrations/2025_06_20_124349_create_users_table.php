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
         Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->decimal('rating', 3, 2)->default(0.00);
            $table->date('birth_date')->nullable();
            $table->string('city', 30)->nullable();
            $table->string('bio', 1000)->nullable();
            $table->string('email', 100)->unique();
            $table->string('password_hash');
            $table->string('avatar_url')->nullable();
            $table->boolean('is_baned')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
