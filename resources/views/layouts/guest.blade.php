<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SecureAuth</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
        rel="stylesheet"
    />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-slate-100">

    <div class="min-h-screen flex items-center justify-center px-4">

        <div class="w-full max-w-md">

            <!-- Branding -->
            <div class="text-center mb-8">

                <a href="/">
                    <x-application-logo
                        class="w-16 h-16 mx-auto text-slate-700"
                    />
                </a>

                <h1 class="mt-4 text-3xl font-bold text-slate-900">
                    SecureAuth
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Secure Authentication & User Management System
                </p>

            </div>

            <!-- Card -->
            <div
                class="bg-white shadow-xl rounded-2xl p-8 border border-slate-200"
            >
                {{ $slot }}
            </div>

        </div>

    </div>

</body>
</html>