@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white rounded-xl shadow-sm p-6">
        <p class="text-gray-500 text-sm">
            Total Users
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ $totalUsers }}
        </h2>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <p class="text-gray-500 text-sm">
            Verified Users
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ $verifiedUsers }}
        </h2>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <p class="text-gray-500 text-sm">
            Admin Users
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ $adminUsers }}
        </h2>
    </div>

</div>

<div class="mt-8 bg-white rounded-xl shadow-sm p-6">

    <h3 class="text-lg font-semibold mb-4">
        Recent Registrations
    </h3>

    <div class="space-y-3">

        @foreach($recentUsers as $user)
            <div
                class="flex justify-between items-center border-b pb-2"
            >
                <div>
                    <p class="font-medium">
                        {{ $user->name }}
                    </p>

                    <p class="text-sm text-gray-500">
                        {{ $user->email }}
                    </p>
                </div>

                <span class="text-sm text-gray-400">
                    {{ $user->created_at->diffForHumans() }}
                </span>
            </div>
        @endforeach

    </div>

</div>

@endsection