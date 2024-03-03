<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function register(Request $request)
    {
        return $request->all();
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'email' => 'required|email|unique:student_info',
                'enrollment_number' => 'required|unique:student_info',
                'password' => 'required|min:6',
                'qualification' => 'required',
                'course' => 'required',
                'contact_number' => 'required',
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' =>"sdsd"], 422);
        }

        // Create a new student record
        $student = new StudentInfo();
        $student->email = $validatedData['email'];
        $student->enrollment_number = $validatedData['enrollment_number'];
        $student->password = Hash::make($validatedData['password']);
        $student->qualification = $validatedData['qualification'];
        $student->course = $validatedData['course'];
        $student->contact_number = $validatedData['contact_number'];
        
        // Save the student record
        $student->save();

        // Return a success response
        return response()->json(['message' => 'Registration successful'], 201);
    }
    public function login(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'enrollment_number' => 'required',
        'password' => 'required',
    ]);

    // Check if the provided enrollment number and password match a user in the database
    // Implement your logic here (use Laravel's built-in Auth facade or your custom logic)

    // If login is successful, return a success response
    return response()->json(['message' => 'Login successful'], 200);

    // If login fails, return an error response
    return response()->json(['error' => 'Invalid credentials'], 401);
}
public function getProfile()
{
    // Get the authenticated user
    $user = Auth::user();

    // Check if the user is authenticated
    if ($user) {
        // Return the user's profile information
        return response()->json(['user' => $user]);
    } else {
        // If the user is not authenticated, return an error response
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
public function updateProfile(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        // Include fields that the user can update
        'qualification' => 'required',
        'course' => 'required',
        'contact_number' => 'required',
    ]);

    // Update the user's profile in the database
    // Implement your logic here based on the authenticated user (use Laravel's Auth facade or your custom logic)

    // If the profile update is successful, return a success response
    return response()->json(['message' => 'Profile updated successfully'], 200);

    // If the profile update fails, return an error response
    return response()->json(['error' => 'Profile update failed'], 400);
}


}
