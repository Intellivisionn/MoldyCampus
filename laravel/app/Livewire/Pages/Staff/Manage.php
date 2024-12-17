<?php

namespace App\Livewire\Pages\Staff;

use Livewire\Component;
use App\Models\Course;
use App\Models\Professor;
use Illuminate\Support\Facades\Storage;

class Manage extends Component
{
    public $search = ''; 
    public $professorSearch = ''; 

    public function deleteCourse($courseId)
    {
        // Delete course
        try {
            // Fetch and delete course image if exists
            $course = Course::findOrFail($courseId);

            if ($course->image_path && Storage::disk('public')->exists($course->image_path)) {
                Storage::disk('public')->delete($course->image_path);
            }
            
            // Detach professors
            $course->professors()->detach();
            $course->delete();

            session()->flash('message', 'Course deleted successfully.');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to delete course: ' . $e->getMessage());
        }
    }

    public function deleteProfessor($professorId)
    {
        // Delete professor
        try {
            $professor = Professor::findOrFail($professorId);
            $professor->courses()->detach();
            $professor->delete();
    
            session()->flash('message1', 'Professor deleted successfully.');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to delete professor: ' . $e->getMessage());
        }
    }
    

    public function render()
    {
        // Fetch courses and professors
        $allCourses = Course::with('professors')
            ->where('name', 'like', '%' . $this->search . '%')
            ->orderBy('name', 'asc')
            ->take(5)
            ->get();

        $allProfessors = Professor::where('name', 'like', '%' . $this->professorSearch . '%')
            ->orderBy('name', 'asc')
            ->take(5)
            ->get();

        return view('livewire.pages.staff.manage', compact('allCourses', 'allProfessors'));
    }
}
