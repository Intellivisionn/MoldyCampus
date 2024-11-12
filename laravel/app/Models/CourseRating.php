<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRating extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['course_id', 'user_id', 'rating', 'review'];

    /**
     * Get the course that owns the rating.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
