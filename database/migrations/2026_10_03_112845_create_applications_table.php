<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->unsignedTinyInteger('score')->default(0);
            $table->unsignedTinyInteger('education_score')->default(0);
            $table->unsignedTinyInteger('experience_score')->default(0);
            $table->unsignedTinyInteger('skills_score')->default(0);
            $table->unsignedTinyInteger('availability_score')->default(0);
            $table->unsignedTinyInteger('motivation_score')->default(0);
            $table->enum('priority', [
                'high',
                'medium',
                'low',
            ])->default('low');
            $table->enum('status', [
                'new',
                'reviewing',
                'shortlisted',
                'rejected',
            ])->default('new');
            $table->timestamps();
            $table->unique('candidate_id');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};