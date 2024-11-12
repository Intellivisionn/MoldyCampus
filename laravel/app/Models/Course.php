<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'image_path'];

    /**
     * The professors that teach the course.
     */
    public function professors()
    {
        return $this->belongsToMany(Professor::class, 'course_professor');
    }

    public function studentAssistants()
    {
        return $this->belongsToMany(Professor::class, 'course_student_assistant', 'course_id', 'student_assistant_id');
    }

    /**
     * The reviews for the course.
     */
    public function reviews()
    {
        return $this->hasMany(CourseRating::class);
    }
}
