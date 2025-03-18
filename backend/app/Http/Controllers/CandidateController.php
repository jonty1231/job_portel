<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
   
 

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:candidates',
            'mobile' => 'required|string|unique:candidates',
            'gender' => 'required|in:male,female,other',
            'dob' => 'required|date',
            'city' => 'required|string',

            // Education
            'on_education' => 'required|boolean',
            'highest_level_education' => 'required|string',
            'degree_name' => 'required|string',
            'passing_year' => 'required|integer',
            'college_name' => 'required|string',
            'medium' => 'required|string',

            // Work Experience
            'work_experience' => 'required|boolean',
            'total_experience' => 'nullable|integer',
            'job_title' => 'nullable|string',
            'job_role' => 'nullable|string',
            'company_name' => 'nullable|string',
            'current_salary' => 'nullable|numeric',

            // Preferences
            'preferred_language' => 'required|string',
            'preferred_shifts' => 'required|string',

            // Resume File
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->except('resume');

        // Handle Resume Upload
        if ($request->hasFile('resume')) {
            $filePath = $request->file('resume')->store('resumes', 'public');
            $data['resume'] = $filePath;
        }

        $candidate = Candidate::create($data);

        return response()->json(['message' => 'Candidate created successfully', 'candidate' => $candidate], 201);
    }

   
    public function show($id)
    {
        $candidate = Candidate::find($id);
        if (!$candidate) {
            return response()->json(['message' => 'Candidate not found'], 404);
        }

        return response()->json($candidate);
    }

   
    public function update(Request $request, $id)
    {
        $candidate = Candidate::find($id);
        if (!$candidate) {
            return response()->json(['message' => 'Candidate not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:candidates,email,' . $id,
            'mobile' => 'sometimes|required|string|unique:candidates,mobile,' . $id,
            'gender' => 'sometimes|required|in:male,female,other',
            'dob' => 'sometimes|required|date',
            'city' => 'sometimes|required|string',

           
            'on_education' => 'sometimes|required|boolean',
            'highest_level_education' => 'sometimes|required|string',
            'degree_name' => 'sometimes|required|string',
            'passing_year' => 'sometimes|required|integer',
            'college_name' => 'sometimes|required|string',
            'medium' => 'sometimes|required|string',

          
            'work_experience' => 'sometimes|required|boolean',
            'total_experience' => 'nullable|integer',
            'job_title' => 'nullable|string',
            'job_role' => 'nullable|string',
            'company_name' => 'nullable|string',
            'current_salary' => 'nullable|numeric',

           
            'preferred_language' => 'sometimes|required|string',
            'preferred_shifts' => 'sometimes|required|string',

            // 'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->except('resume');

        // Handle Resume Upload
        if ($request->hasFile('resume')) {
            if ($candidate->resume) {
                Storage::disk('public')->delete($candidate->resume);
            }
            $filePath = $request->file('resume')->store('resumes', 'public');
            $data['resume'] = $filePath;
        }

        $candidate->update($data);

        return response()->json(['message' => 'Candidate updated successfully', 'candidate' => $candidate]);
    }

   
    public function destroy($id)
    {
        $candidate = Candidate::find($id);
        if (!$candidate) {
            return response()->json(['message' => 'Candidate not found'], 404);
        }

        if ($candidate->resume) {
            Storage::disk('public')->delete($candidate->resume);
        }

        $candidate->delete();

        return response()->json(['message' => 'Candidate deleted successfully']);
    }
}
