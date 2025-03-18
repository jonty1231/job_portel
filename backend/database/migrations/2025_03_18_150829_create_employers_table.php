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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company_name')->nullable(); 
            $table->integer('number_of_employees')->nullable(); 
            $table->string('work_email')->nullable(); 
            $table->string('job_title')->nullable(); 
            $table->string('job_role')->nullable(); 
            $table->string('job_type')->nullable(); 
            $table->string('location')->nullable(); 
            $table->string('work_location_type')->nullable(); 
            $table->string('pay_type')->nullable(); 
            $table->decimal('fixed_salary', 10, 2)->nullable();
            $table->text('additional_perks')->nullable()->nullable(); 
            $table->string('minimum_education')->nullable(); 
            $table->integer('total_experience')->nullable(); 
            $table->text('skills_preference')->nullable();
            $table->string('english_level_required')->nullable(); 
            $table->text('job_description')->nullable(); 
            $table->boolean('walk_in_interview')->default(false);
            $table->text('walk_in_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
