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
    Schema::create('applications', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->foreignId('job_post_id')->constrained()->cascadeOnDelete();
    $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
    $table->unsignedInteger('hours_per_day')->nullable(); // تفاصيل على العلاقة
    $table->enum('work_type', ['onsite', 'remote', 'hybrid'])->nullable();
    $table->text('cover_letter')->nullable();// رسالة التقديم
    $table->timestamp('applied_at')->useCurrent();
    $table->timestamps();

    $table->unique(['user_id', 'job_post_id']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_request_user');
    }
};
