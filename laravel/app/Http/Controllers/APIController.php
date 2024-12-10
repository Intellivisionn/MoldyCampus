<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseRating;
use App\Models\Professor;
use Illuminate\Http\Request;

class APIController extends Controller
{
    // Method to get all courses with their respective professors and ratings
    public function getCourses(Request $request)
    {
        $allCourses = [];
        $course = Course::all();
        foreach ($course as $c) {
            // Get the professor for the course
            $c->professor = Professor::find($c->professor_id);
            // Get the ratings for the course
            $c->ratings = CourseRating::find($c->id);
            $allCourses[] = [
                'course' => $c,
                'professor' => $c->professor,
                'ratings' => $c->ratings,
            ];
        }

        return response()->json($allCourses);
    }

    // Method to get all professors with their respective ratings
    public function getProfessors(Request $request)
    {
        $professor = Professor::all();
        foreach ($professor as $p) {
            // Get the ratings for the professor
            $p->ratings = CourseRating::find($p->professor_id);
        }

        return response()->json($professor);
    }

    // Method to get a specific course by ID with its ratings
    public function getIndividualCourse(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        // Find the course by ID
        $course = Course::find($request->id);
        // Get the ratings for the course
        $courseRatings = CourseRating::where('course_id', $request->id)->get();

        return response()->json(['course' => $course, 'ratings' => $courseRatings]);
    }

    // Method to get a specific professor by ID with their ratings
    public function getIndividualProfessor(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        // Find the professor by ID
        $professor = Professor::find($request->id);
        // Get the ratings for the professor
        $professorRatings = CourseRating::where('professor_id', $request->id)->get();

        return response()->json(['professor' => $professor, 'ratings' => $professorRatings]);
    }

    // Method to update user profile
    public function updateUserProfile(Request $request)
    {
        $request->validate([
            'userId' => 'required|integer',
        ]);

        // Add logic to update user profile here later
    }
}
