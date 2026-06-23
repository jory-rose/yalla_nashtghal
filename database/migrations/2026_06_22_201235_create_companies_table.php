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
      Schema::create('companies', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('identity');
    $table->string('image')->nullable();
    $table->string('phone');
    $table->string('email')->unique();
    $table->string('commercial_record');
    $table->string('license');
    $table->string('password');
    $table->foreignId('region_id')->constrained()->cascadeOnDelete();
    $table->timestamp('joined_at')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
