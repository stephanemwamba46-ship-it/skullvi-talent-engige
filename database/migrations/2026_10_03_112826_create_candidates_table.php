<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email', 150)->unique();
            $table->string('phone', 30);
            $table->string('city', 100);
            $table->string('education_level', 100);
            $table->string('field_of_study', 150)->nullable();
            $table->unsignedTinyInteger('experience_years')->default(0);
            $table->text('skills');
            $table->text('motivation');
            $table->boolean('available')->default(true);
            $table->string('cv_path')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};