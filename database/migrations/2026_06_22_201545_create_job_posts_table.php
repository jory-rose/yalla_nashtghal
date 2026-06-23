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
   Schema::create('job_posts', function (Blueprint $table) {
    $table->id();
    $table->foreignId('company_id')->constrained()->cascadeOnDelete();
    $table->foreignId('category_id')->constrained()->cascadeOnDelete();
    $table->string('title');
    $table->text('description');
    $table->unsignedInteger('hours_per_day');
    $table->string('location');
    $table->enum('gender', ['male', 'female', 'both']);
    $table->enum('certificate', ['none', 'diploma', 'bachelor', 'master', 'phd']);
    $table->enum('work_type', ['onsite', 'remote', 'hybrid']);
    $table->enum('status', ['open', 'closed', 'paused'])->default('open');
    $table->date('start_date');
    $table->date('end_date');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
