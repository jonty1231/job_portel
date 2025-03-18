<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployerController extends Controller
{
   
    public function index()
    {
        return response()->json(Employer::all(), Response::HTTP_OK);
    }

   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'number_of_employees' => 'required|integer|min:1',
            'work_email' => 'nullable|email',
            'job_title' => 'required|string|max:255',
            'job_role' => 'required|string|max:255',
            'job_type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'work_location_type' => 'required|string|max:255',
            'pay_type' => 'required|string|max:255',
            'fixed_salary' => 'nullable|numeric|min:0',
            'additional_perks' => 'nullable|string',
            'minimum_education' => 'required|string|max:255',
            'total_experience' => 'nullable|integer|min:0',
            'skills_preference' => 'nullable|string',
            'english_level_required' => 'required|string|max:255',
            'job_description' => 'required|string',
            'walk_in_interview' => 'boolean',
            'walk_in_address' => 'nullable|string',
        ]);

        $employer = Employer::create($validatedData);

        return response()->json($employer, Response::HTTP_CREATED);
    }

    public function show(Employer $employer)
    {
        return response()->json($employer, Response::HTTP_OK);
    }

   
    public function update(Request $request, Employer $employer)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'company_name' => 'sometimes|required|string|max:255',
            'number_of_employees' => 'sometimes|required|integer|min:1',
            'work_email' => 'nullable|email',
            'job_title' => 'sometimes|required|string|max:255',
            'job_role' => 'sometimes|required|string|max:255',
            'job_type' => 'sometimes|required|string|max:255',
            'location' => 'sometimes|required|string|max:255',
            'work_location_type' => 'sometimes|required|string|max:255',
            'pay_type' => 'sometimes|required|string|max:255',
            'fixed_salary' => 'nullable|numeric|min:0',
            'additional_perks' => 'nullable|string',
            'minimum_education' => 'sometimes|required|string|max:255',
            'total_experience' => 'nullable|integer|min:0',
            'skills_preference' => 'nullable|string',
            'english_level_required' => 'sometimes|required|string|max:255',
            'job_description' => 'sometimes|required|string',
            'walk_in_interview' => 'boolean',
            'walk_in_address' => 'nullable|string',
        ]);

        $employer->update($validatedData);

        return response()->json($employer, Response::HTTP_OK);
    }

   
    public function destroy(Employer $employer)
    {
        $employer->delete();
        return response()->json(['message' => 'Employer deleted successfully'], Response::HTTP_OK);
    }
}
