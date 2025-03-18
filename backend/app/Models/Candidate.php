<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'mobile', 'gender', 'dob', 'city',
        'on_education', 'highest_level_education', 'degree_name', 
        'passing_year', 'college_name', 'medium', 'work_experience',
        'total_experience', 'job_title', 'job_role', 'company_name',
        'current_salary', 'preferred_language', 'preferred_shifts', 'resume'
    ];
}
