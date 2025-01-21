<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Import Request class
use App\Models\User; // Import User model
use Illuminate\Support\Facades\Hash; // Import Hash facade for password hashing

class PasswordResetController extends Controller
{
    public function resetPassword(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_name' => 'required|string|exists:users,user_name', // Ensure username exists in the database
            'new_password' => 'required|string|min:8', // Password strength validation
        ]);

        // Find the user by username
        $user = User::where('user_name', $request->user_name)->first();

        if (!$user) {
            return back()->withErrors(['user_name' => 'Username not found.']);
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Redirect to login with a success message
        return redirect()->route('login')->with('status', 'Password reset successfully. You can now log in.');
    }
}
