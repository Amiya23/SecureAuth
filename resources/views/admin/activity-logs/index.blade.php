@extends('layouts.admin')

@section('title', 'Activity Logs')

@section('content')

<div class="bg-white rounded-xl shadow-sm overflow-hidden">

    <div class="p-6 border-b">
        <h2 class="text-lg font-semibold">
            Activity Logs
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Monitor user activities and system events
        </p>
    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-gray-50">
                <tr>

                    <th class="text-left px-6 py-4 font-semibold text-gray-700">
                        User
                    </th>

                    <th class="text-left px-6 py-4 font-semibold text-gray-700">
                        Action
                    </th>

                    <th class="text-left px-6 py-4 font-semibold text-gray-700">
                        IP Address
                    </th>

                    <th class="text-left px-6 py-4 font-semibold text-gray-700">
                        Date
                    </th>

                </tr>
            </thead>

            <tbody>

                @forelse ($logs as $log)

                    <tr class="border-t">

                        <td class="px-6 py-4 font-medium">
                            {{ $log->user?->name ?? 'Deleted User' }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $log->action }}
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ $log->ip_address }}
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ $log->created_at->format('d M Y H:i') }}
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td
                            colspan="4"
                            class="px-6 py-8 text-center text-gray-500"
                        >
                            No activity logs found.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<div class="mt-6">
    {{ $logs->links() }}
</div>

@endsection