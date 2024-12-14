<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseRating;
use App\Models\Professor;
use Illuminate\Http\Request;

class APIController
{
    // Method to get all courses with their respective professors and ratings
    public function getCourses(Request $request)
    {
        // Log the attempt to get courses
        error_log('Fetching all courses with their respective professors and ratings');

        try {
            $courses = Course::with('professors', 'reviews')->get();
            $allCourses = $courses->map(function ($course) {
                // Get the ratings for the course
                $ratings = $course->reviews;

                return [
                    'courseinfo' => [
                        'id' => $course->id,
                        'name' => $course->name,
                        'description' => $course->description,
                        'credits' => $course->credits,
                    ],
                    'professors' => $course->professors->map(function ($professor) {
                        return [
                            'id' => $professor->id,
                            'name' => $professor->name,
                            'department' => $professor->department,
                        ];
                    }),
                    'ratings' => $ratings->map(fn ($rating) => [
                        'id' => $rating->id,
                        'rating' => $rating->rating,
                        'comment' => $rating->comment,
                        'user_id' => $rating->user_id,
                    ]),
                ];
            });

            // Log the successful retrieval
            error_log('Courses fetched successfully');

            return response()->json($allCourses);
        } catch (\Exception $e) {
            // Log any exceptions
            error_log('Error fetching courses: '.$e->getMessage());

            return response()->json(['error' => 'Failed to fetch courses', 'message' => $e->getMessage()], 500);
        }
    }

    // Method to get all professors with their respective ratings
    public function getProfessors(Request $request)
    {
        // Log the attempt to get professors
        error_log('Fetching all professors with their respective ratings');

        try {
            $professors = Professor::all();
            $allProfessors = [];
            foreach ($professors as $professor) {
                // Initialize an empty collection for ratings
                $professor->ratings = collect();
                $professor->courses = $professor->courses ?? collect();

                // Loop through the courses associated with the professor
                foreach ($professor->courses as $course) {
                    // Get the ratings for the course
                    $courseRatings = CourseRating::where('course_id', $course->id)->get();

                    // Merge the course ratings into the professor's ratings collection
                    $professor->ratings = $professor->ratings->merge($courseRatings);
                }

                $allProfessors[] = [
                    'professor' => [
                        'id' => $professor->id,
                        'name' => $professor->name,
                        'department' => $professor->department,
                    ],
                    'courses' => $professor->courses->map(fn ($course) => [
                        'id' => $course->id,
                        'name' => $course->name,
                        'description' => $course->description,
                        'credits' => $course->credits,
                    ]),
                    'ratings' => $professor->ratings->map(fn ($rating) => [
                        'id' => $rating->id,
                        'rating' => $rating->rating,
                        'comment' => $rating->comment,
                        'user_id' => $rating->user_id,
                    ]),
                ];
            }

            // Log the successful retrieval
            error_log('Professors fetched successfully');

            return response()->json($allProfessors);
        } catch (\Exception $e) {
            // Log any exceptions
            error_log('Error fetching professors: '.$e->getMessage());

            return response()->json(['error' => 'Failed to fetch professors', 'message' => $e->getMessage()], 500);
        }
    }

    // Method to get a specific course by ID with its ratings
    public function getIndividualCourse(Request $request)
    {
        // Log the attempt to get a specific course
        error_log('Fetching course with ID: '.$request->input('id'));

        try {
            $request->validate([
                'id' => 'required|integer',
            ]);

            // Find the course by ID
            $course = Course::find($request->id);

            // Check if the course exists
            if (! $course) {
                error_log('Course not found with ID: '.$request->input('id'));

                return response()->json(['error' => 'Course not found'], 404);
            }

            // Get the ratings for the course
            $courseRatings = CourseRating::where('course_id', $request->id)->get();

            // Log the successful retrieval
            error_log('Course fetched successfully with ID: '.$request->input('id'));

            return response()->json(['course' => $course, 'ratings' => $courseRatings]);
        } catch (\Exception $e) {
            // Log any exceptions
            error_log('Error fetching course with ID: '.$request->input('id').' - '.$e->getMessage());

            return response()->json(['error' => 'Failed to fetch course', 'message' => $e->getMessage()], 500);
        }
    }

    // Method to get a specific professor by ID with their ratings
    public function getIndividualProfessor(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'id' => 'required|integer',
            ]);

            // Log the request data
            error_log('Fetching professor with ID: '.$request->id);

            // Find the professor by ID
            $professor = Professor::find($request->id);
            if (! $professor) {
                throw new \Exception('Professor not found');
            }

            // Initialize variables to calculate the average rating
            $totalRating = 0;
            $ratingCount = 0;

            // Loop through the courses associated with the professor
            foreach ($professor->courses as $course) {
                // Get the ratings for the course
                $courseRatings = CourseRating::where('course_id', $course->id)->get();

                // Sum the ratings and count the number of ratings
                foreach ($courseRatings as $rating) {
                    $totalRating += $rating->rating;
                    $ratingCount++;
                }
            }

            // Calculate the average rating
            $averageRating = $ratingCount > 0 ? $totalRating / $ratingCount : 0;

            // Log the successful retrieval
            error_log('Professor and ratings fetched successfully');

            return response()->json(['professor' => $professor, 'average_rating' => $averageRating]);
        } catch (\Exception $e) {
            // Log any exceptions
            error_log('Error fetching professor: '.$e->getMessage());

            return response()->json(['error' => 'Failed to fetch professor', 'message' => $e->getMessage()], 500);
        }
    }

    // Method to update user profile
    public function updateUserProfile(Request $request)
    {
        // Log the attempt to update user profile
        error_log('Updating user profile: '.json_encode($request->all()));

        try {
            // Validate the request
            $request->validate([
                'name' => 'sometimes|string|max:255',
                'email' => 'sometimes|email|max:255',
                'password' => 'sometimes|string|min:8|confirmed',
            ]);

            // Log after validation
            error_log('User profile validated');

            // Get the authenticated user
            $user = $request->user();
            if (! $user) {
                throw new \Exception('Authenticated user not found');
            }

            // Update user details
            if ($request->has('name')) {
                $user->name = $request->input('name');
            }
            if ($request->has('email')) {
                $user->email = $request->input('email');
            }
            if ($request->has('password')) {
                $user->password = bcrypt($request->input('password'));
            }

            // Save the updated user
            $user->save();
            error_log('User profile updated successfully: '.json_encode(['userId' => $user->id]));

            return response()->json(['message' => 'User profile updated successfully']);
        } catch (\Exception $e) {
            // Log any exceptions
            error_log('Error updating user profile: '.$e->getMessage());

            return response()->json(['error' => 'Failed to update user profile', 'message' => $e->getMessage()], 500);
        }
    }

    // Method to retrieve all reviews for a course
    public function getReviews(Request $request)
    {
        // Log the attempt to get reviews
        error_log('Fetching reviews: '.json_encode($request->all()));

        try {
            // Validate the request
            $request->validate([
                'course_id' => 'required|integer|exists:courses,id',
            ]);

            // Log after validation
            error_log('Reviews request validated');

            // Get the reviews for the course
            $reviews = CourseRating::where('course_id', $request->input('course_id'))->get();

            // Log the successful review retrieval
            error_log('Reviews fetched successfully: '.json_encode(['courseId' => $request->input('course_id')]));

            return response()->json($reviews);
        } catch (\Exception $e) {
            // Log any exceptions
            error_log('Error fetching reviews: '.$e->getMessage());

            return response()->json(['error' => 'Failed to fetch reviews', 'message' => $e->getMessage()], 500);
        }
    }

    // Method to create a review for a course
    public function createAReview(Request $request)
    {
        // Log the attempt to create a review
        error_log('Creating a review: '.json_encode($request->all()));

        try {
            // Validate the request
            $request->validate([
                'course_id' => 'required|integer|exists:courses,id',
                'rating' => 'required|integer|between:1,5',
                'comment' => 'sometimes|string|max:255',
            ]);

            // Log after validation
            error_log('Review validated');

            // Get the authenticated user
            $user = $request->user();
            if (! $user) {
                return response()->json(['error' => 'Authenticated user not found'], 401);
            }

            // Create the review
            $review = CourseRating::create([
                'user_id' => $user->id,
                'course_id' => $request->input('course_id'),
                'rating' => $request->input('rating'),
                'review' => $request->input('review'),
            ]);

            // Log the successful review creation
            error_log('Review created successfully: '.json_encode(['reviewId' => $review->id]));

            return response()->json(['message' => 'Review created successfully']);
        } catch (\Exception $e) {
            // Log any exceptions
            error_log('Error creating review: '.$e->getMessage());

            return response()->json(['error' => 'Failed to create review', 'message' => $e->getMessage()], 500);
        }
    }

    // Method to delete a review for a course
    public function deleteAReview(Request $request)
    {
        // Log the attempt to delete a review\
        error_log('Deleting a review: '.json_encode($request->all()));

        try {
            // Validate the request
            $request->validate([
                'review_id' => 'required|integer|exists:course_ratings,id',
            ]);

            // Log after validation
            error_log('Review deletion request validated');

            // Get the authenticated user
            $user = $request->user();
            if (! $user) {
                throw new \Exception('Authenticated user not found');
            }

            // Find the review by ID
            $review = CourseRating::find($request->input('review_id'));
            if (! $review) {
                throw new \Exception('Review not found');
            }

            // Check if the user is the owner of the review
            if ($review->user_id !== $user->id) {
                throw new \Exception('User is not the owner of the review');
            }

            // Delete the review
            $review->delete();

            // Log the successful review deletion
            error_log('Review deleted successfully: '.json_encode(['reviewId' => $request->input('review_id')]));

            return response()->json(['message' => 'Review deleted successfully']);
        } catch (\Exception $e) {
            // Log any exceptions
            error_log('Error deleting review: '.$e->getMessage());

            return response()->json(['error' => 'Failed to delete review', 'message' => $e->getMessage()], 500);
        }
    }
}
