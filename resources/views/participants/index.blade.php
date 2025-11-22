@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Participants</h1>

        <a href="{{ route('participants.create') }}"
           class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
            + Add Participant
        </a>
    </div>

    @if ($participants->isEmpty())
        <p class="text-gray-600">No participants found.</p>
    @else
        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                        <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($participants as $participant)
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-900">
                                {{ $participant->name }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-900">
                                {{ $participant->email }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-900">
                                {{ $participant->phone ?? '-' }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-900 text-right space-x-2">
                                <a href="{{ route('participants.show', $participant) }}"
                                   class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-md border border-gray-300 hover:bg-gray-50">
                                    View
                                </a>
                                <a href="{{ route('participants.edit', $participant) }}"
                                   class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-md border border-blue-300 text-blue-700 hover:bg-blue-50">
                                    Edit
                                </a>
                                <form action="{{ route('participants.destroy', $participant) }}"
                                      method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('Are you sure you want to delete this participant?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-md border border-red-300 text-red-700 hover:bg-red-50">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $participants->links() }}
        </div>
    @endif
@endsection
