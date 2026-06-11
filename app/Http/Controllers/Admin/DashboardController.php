<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();

        $verifiedUsers = User::whereNotNull(
            'email_verified_at'
        )->count();

        $adminUsers = User::where(
            'role',
            'admin'
        )->count();

        $recentUsers = User::latest()
            ->take(5)
            ->get();

        return view(
            'admin.dashboard',
            compact(
                'totalUsers',
                'verifiedUsers',
                'adminUsers',
                'recentUsers'
            )
        );
    }
}