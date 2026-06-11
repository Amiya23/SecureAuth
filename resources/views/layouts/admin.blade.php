<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100">

<div class="min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-900 text-white shadow-lg">

        <div class="p-6 border-b border-slate-800">
            <h1 class="text-2xl font-bold">
                SecureAuth
            </h1>

            <p class="text-slate-400 text-sm">
                Admin Panel
            </p>
        </div>

        <nav class="p-4 space-y-2">

            <a
                href="{{ route('admin.dashboard') }}"
                class="block px-4 py-3 rounded-lg transition
                {{ request()->routeIs('admin.dashboard')
                    ? 'bg-blue-600 text-white'
                    : 'hover:bg-slate-800' }}"
            >
                Dashboard
            </a>

            <a
                href="{{ route('admin.users.index') }}"
                class="block px-4 py-3 rounded-lg transition
                {{ request()->routeIs('admin.users.*')
                    ? 'bg-blue-600 text-white'
                    : 'hover:bg-slate-800' }}"
            >
                Users
            </a>

            <a
                href="{{ route('admin.activity-logs.index') }}"
                class="block px-4 py-3 rounded-lg transition
                {{ request()->routeIs('admin.activity-logs.*')
                    ? 'bg-blue-600 text-white'
                    : 'hover:bg-slate-800' }}"
            >
                Activity Logs
            </a>

            <a
                href="{{ route('profile.edit') }}"
                class="block px-4 py-3 rounded-lg hover:bg-slate-800 transition"
            >
                Profile
            </a>
            
            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button
                    type="submit"
                    class="w-full text-left px-4 py-3 rounded-lg hover:bg-slate-800 transition"
                >
                    Logout
                </button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">

        <div
            class="bg-white rounded-xl shadow-sm p-4 mb-8 flex justify-between items-center"
        >
            <div>
                <h2 class="text-lg font-semibold">
                    Welcome back, {{ auth()->user()->name }}
                </h2>

                <p class="text-sm text-gray-500">
                    Manage your application securely
                </p>
            </div>

            @if(auth()->user()->avatar)
                <img
                    src="{{ asset('storage/' . auth()->user()->avatar) }}"
                    alt="Avatar"
                    class="w-12 h-12 rounded-full object-cover border-2 border-slate-200"
                >
            @endif
        </div>

        <h1 class="text-3xl font-bold mb-6">
            @yield('title')
        </h1>

        @yield('content')

    </main>

</div>

</body>
</html>