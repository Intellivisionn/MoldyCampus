<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'title', 'image_path'];

    /**
     * The courses that the professor teaches.
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_professor');
    }

    public function assistedCourses()
    {
        return $this->belongsToMany(Course::class, 'course_student_assistant', 'student_assistant_id', 'course_id');
    }

    /**
     * The ratings for the professor.
     */
    public function ratings()
    {
        return $this->hasMany(CourseRating::class);
    }
}
