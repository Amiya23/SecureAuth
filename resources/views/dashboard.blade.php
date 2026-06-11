<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Account Information -->
                <div class="bg-white shadow-sm rounded-xl p-6">

                    <h3 class="text-sm text-gray-500 mb-2">
                        Account Information
                    </h3>

                    <p class="font-semibold">
                        {{ auth()->user()->name }}
                    </p>

                    <p class="text-sm text-gray-600">
                        {{ auth()->user()->email }}
                    </p>

                </div>

                <!-- Role -->
                <div class="bg-white shadow-sm rounded-xl p-6">

                    <h3 class="text-sm text-gray-500 mb-2">
                        Role
                    </h3>

                    <p class="font-semibold capitalize">
                        {{ auth()->user()->role }}
                    </p>

                </div>

                <!-- Email Verification -->
                <div class="bg-white shadow-sm rounded-xl p-6">

                    <h3 class="text-sm text-gray-500 mb-2">
                        Email Verification
                    </h3>

                    @if(auth()->user()->hasVerifiedEmail())
                        <span
                            class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm"
                        >
                            Verified
                        </span>
                    @else
                        <span
                            class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm"
                        >
                            Not Verified
                        </span>
                    @endif

                </div>

                <!-- Avatar Status -->
                <div class="bg-white shadow-sm rounded-xl p-6">

                    <h3 class="text-sm text-gray-500 mb-2">
                        Avatar Status
                    </h3>

                    @if(auth()->user()->avatar)
                        <span
                            class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm"
                        >
                            Uploaded
                        </span>
                    @else
                        <span
                            class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm"
                        >
                            Not Uploaded
                        </span>
                    @endif

                </div>

            </div>

            <!-- Security Status -->
            <div class="mt-8 bg-white shadow-sm rounded-xl p-6">

                <h3 class="text-lg font-semibold mb-4">
                    Security Status
                </h3>

                <div class="space-y-3">

                    <div class="flex justify-between">
                        <span>Email Verification</span>

                        <span class="text-green-600">
                            {{ auth()->user()->hasVerifiedEmail() ? 'Enabled' : 'Pending' }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span>Password</span>

                        <span class="text-green-600">
                            Configured
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span>Avatar</span>

                        <span class="text-green-600">
                            {{ auth()->user()->avatar ? 'Uploaded' : 'Not Uploaded' }}
                        </span>
                    </div>

                </div>

            </div>

        </div>

    </div>
</x-app-layout>