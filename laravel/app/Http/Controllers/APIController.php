<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseRating;
use App\Models\Professor;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getCourses(request $request)
    {
        $allCourses = [];
        $course = Course::all();
        foreach ($course as $c) {

            $c->professor = Professor::find($c->professor_id);
            $c->ratings = CourseRating::find($c->id);
            $allCourses[] = [
                'course' => $c,
                'professor' => $c->professor,
                'ratings' => $c->ratings,
            ];
        }

        return response()->json($allCourses);
    }

    public function getProfessors(request $request)
    {
        $professor = Professor::all();
        foreach ($professor as $p) {
            $p->ratings = CourseRating::find($p->professor_id);
        }

        return response()->json($professor);
    }

    public function getIndividualCourse(request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        $course = Course::find($id);
        $courseRatings = CourseRating::where('course_id', $id)->get();

        return response()->json(['course' => $course, 'ratings' => $courseRatings]);
    }

    public function getIndividualProfessor(request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        $professor = Professor::find($id);
        $professorRatings = ProfessorRating::where('professor_id', $id)->get();

        return response()->json(['professor' => $professor, 'ratings' => $professorRatings]);
    }

    public function updateUserProfile(request $request)
    {
        $request->validate([
            'userId' => 'required|integer',
        ]);

    }
}
