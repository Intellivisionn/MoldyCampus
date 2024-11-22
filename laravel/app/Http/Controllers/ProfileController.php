<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Update the authenticated user's profile information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the request
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'profile_picture' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
    
            // Delete the old profile picture if it exists
            if ($user->profile_picture) {
                \Storage::disk('public')->delete($user->profile_picture);
            }
    
            // Save the new profile picture path
            $validatedData['profile_picture'] = $profilePicturePath;
        }

        // Update user information
        $user->update($validatedData);

        return redirect()->back()->with('status', 'Profile updated successfully!');
    }
}
