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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('email')->unique()->nullable();;
            $table->string('mobile')->unique()->nullable();;
            $table->enum('gender', ['male', 'female', 'other'])->nullable();;
            $table->date('dob')->nullable();;
            $table->string('city')->nullable();;

            // Education Details
            $table->boolean('on_education')->default(false)->nullable();;
            $table->string('highest_level_education')->nullable();;
            $table->string('degree_name')->nullable();;
            $table->year('passing_year')->nullable();;
            $table->string('college_name')->nullable();;
            $table->string('medium')->nullable();;

            // Work Experience
            $table->boolean('work_experience')->default(false)->nullable();;
            $table->integer('total_experience')->nullable()->nullable();; // In years
            $table->string('job_title')->nullable()->nullable();;
            $table->string('job_role')->nullable()->nullable();;
            $table->string('company_name')->nullable()->nullable();;
            $table->decimal('current_salary', 10, 2)->nullable(); // Salary with decimal

            // Preferences
            $table->string('preferred_language')->nullable();;
            $table->string('preferred_shifts')->nullable();;

            // Resume File
            $table->string('resume')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
