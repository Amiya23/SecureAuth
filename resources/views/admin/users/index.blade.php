@extends('layouts.admin')

@section('title', 'User Management')

@section('content')

@if(session('success'))
    <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-800 border border-green-200">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="mb-4 p-4 rounded-lg bg-red-100 text-red-800 border border-red-200">
        {{ session('error') }}
    </div>
@endif

<div class="bg-white rounded-xl shadow-sm overflow-hidden">

    <div class="p-6 border-b">
        <h2 class="text-lg font-semibold">
            Users
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Manage user accounts and roles
        </p>
    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-gray-50">
                <tr>

                    <th class="text-left px-6 py-4 font-semibold text-gray-700">
                        Name
                    </th>

                    <th class="text-left px-6 py-4 font-semibold text-gray-700">
                        Email
                    </th>

                    <th class="text-left px-6 py-4 font-semibold text-gray-700">
                        Role
                    </th>

                    <th class="text-left px-6 py-4 font-semibold text-gray-700">
                        Actions
                    </th>

                </tr>
            </thead>

            <tbody>

                @foreach ($users as $user)

                    <tr class="border-t">

                        <td class="px-6 py-4">

    <div class="flex items-center gap-3">

        @if($user->avatar)
            <img
                src="{{ asset('storage/' . $user->avatar) }}"
                alt="Avatar"
                class="w-10 h-10 rounded-full object-cover"
            >
        @else
            <div
                class="w-10 h-10 rounded-full bg-gray-200"
            ></div>
        @endif

        <span class="font-medium">
            {{ $user->name }}
        </span>

    </div>

</td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ $user->email }}
                        </td>

                        <td class="px-6 py-4">

                            @if($user->role === 'admin')
                                <span
                                    class="px-3 py-1 text-sm rounded-full bg-blue-100 text-blue-700"
                                >
                                    Admin
                                </span>
                            @else
                                <span
                                    class="px-3 py-1 text-sm rounded-full bg-gray-100 text-gray-700"
                                >
                                    User
                                </span>
                            @endif

                        </td>

                        <td class="px-6 py-4">

                            <form
                                action="{{ route('admin.users.role', $user) }}"
                                method="POST"
                                class="flex items-center gap-2"
                            >
                                @csrf
                                @method('PATCH')

                                <select
                                    name="role"
                                    class="border rounded-lg px-3 py-2"
                                >
                                    <option
                                        value="user"
                                        {{ $user->role === 'user' ? 'selected' : '' }}
                                    >
                                        User
                                    </option>

                                    <option
                                        value="admin"
                                        {{ $user->role === 'admin' ? 'selected' : '' }}
                                    >
                                        Admin
                                    </option>
                                </select>

                                <button
                                    type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
                                >
                                    Update
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

<div class="mt-6">
    {{ $users->links() }}
</div>

@endsection