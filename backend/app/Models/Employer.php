<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'company_name', 'number_of_employees', 'work_email',
        'job_title', 'job_role', 'job_type', 'location', 'work_location_type',
        'pay_type', 'fixed_salary', 'additional_perks', 'minimum_education',
        'total_experience', 'skills_preference', 'english_level_required',
        'job_description', 'walk_in_interview', 'walk_in_address'
    ];
}
