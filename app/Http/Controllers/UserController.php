<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // edit, shows page
    public function edit()
    {
        return view('user.edit');
    }

    // update, updates the database
    public function update(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|max:40',
            'email' => 'required|email'
        ]);

        $user = User::findOrFail(Auth::id());
        $user->name = $validated['username'];
        $user->email = $validated['email'];

        if ($user->save())
        {
            // Log out user
            Auth::logout();

            // Invalidate user session and regenerate CSRF token
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Redirect to login page with status to notify user, changes were successful
            return redirect()->route('login')
                ->with('status', 'Changes were successful, please login with your new credentials.');
        }
        return redirect()->route('edit-user')->with('status', 'Something went wrong, try again later.');
    }
}
