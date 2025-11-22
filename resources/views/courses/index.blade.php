@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Courses</h1>

        <a href="{{ route('courses.create') }}"
           class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
            + Add Course
        </a>
    </div>

    @if ($courses->isEmpty())
        <p class="text-gray-600">No courses found.</p>
    @else
        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Level</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                        <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($courses as $course)
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-900">
                                {{ $course->title }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-900">
                                {{ $course->level ?? '-' }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-900">
                                {{ $course->created_at->format('Y-m-d') }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-900 text-right space-x-2">
                                <a href="{{ route('courses.show', $course) }}"
                                   class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-md border border-gray-300 hover:bg-gray-50">
                                    View
                                </a>
                                <a href="{{ route('courses.edit', $course) }}"
                                   class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-md border border-blue-300 text-blue-700 hover:bg-blue-50">
                                    Edit
                                </a>
                                <form action="{{ route('courses.destroy', $course) }}"
                                      method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('Are you sure you want to delete this course?');">
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
            {{ $courses->links() }}
        </div>
    @endif
@endsection
