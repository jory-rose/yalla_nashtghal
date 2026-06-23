<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
Schema::create('reports', function (Blueprint $table) {
    $table->id();
    $table->text('reason');
    $table->enum('status', ['pending', 'reviewed', 'dismissed'])->default('pending');

    // من رفع البلاغ — مستخدم أو شركة (واحد منهم فقط)
    $table->foreignId('user_id')
          ->nullable()
          ->constrained()
          ->cascadeOnDelete();
    $table->foreignId('company_id')
          ->nullable()
          ->constrained()
          ->cascadeOnDelete();

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
