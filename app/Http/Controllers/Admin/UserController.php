<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ActivityLogService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function updateRole(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => 'required|in:user,admin',
        ]);

        if ($user->id === auth()->id()) {
            return back()->with(
                'error',
                'You cannot change your own role.'
            );
        }

        $user->update([
            'role' => $validated['role'],
        ]);

        ActivityLogService::log(
            auth()->user()->email.
            " changed role for {$user->email} to {$validated['role']}"
        );

        return back()->with(
            'success',
            'User role updated successfully.'
        );
    }
}
