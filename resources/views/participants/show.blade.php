@extends('layouts.app')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold">Participant Detail</h1>

        <a href="{{ route('participants.index') }}"
           class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50">
            Back to list
        </a>
    </div>

    {{-- Participant basic info --}}
    <div class="bg-white shadow rounded-lg p-6 space-y-2 mb-8">
        <div>
            <span class="text-sm font-medium text-gray-500">Name</span>
            <div class="text-sm text-gray-900">{{ $participant->name }}</div>
        </div>

        <div>
            <span class="text-sm font-medium text-gray-500">Email</span>
            <div class="text-sm text-gray-900">{{ $participant->email }}</div>
        </div>

        <div>
            <span class="text-sm font-medium text-gray-500">Phone</span>
            <div class="text-sm text-gray-900">{{ $participant->phone ?? '-' }}</div>
        </div>
    </div>

    {{-- Enrolled courses --}}
    <div class="bg-white shadow rounded-lg p-6 mb-8">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold">Enrolled Courses</h2>
        </div>

        @if ($participant->courses->isEmpty())
            <p class="text-sm text-gray-600">This participant is not enrolled in any course yet.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Level</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Enrolled At</th>
                            <th class="px-4 py-2 text-right font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($participant->courses as $course)
                            <tr>
                                <td class="px-4 py-2 text-gray-900">
                                    {{ $course->title }}
                                </td>
                                <td class="px-4 py-2 text-gray-900">
                                    {{ $course->level ?? '-' }}
                                </td>
                                <td class="px-4 py-2 text-gray-900">
                                    {{ $course->pivot->enrolled_at ?? '-' }}
                                </td>
                                <td class="px-4 py-2 text-gray-900 text-right space-x-2">
                                    <a href="{{ route('courses.show', $course) }}"
                                       class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-md border border-gray-300 hover:bg-gray-50">
                                        View course
                                    </a>

                                    <form action="{{ route('participants.enrollments.destroy', [$participant, $course]) }}"
                                          method="POST"
                                          class="inline-block"
                                          onsubmit="return confirm('Remove this course from participant?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-md border border-red-300 text-red-700 hover:bg-red-50">
                                            Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    {{-- Add course to participant --}}
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Enroll in a new course</h2>

        @if ($availableCourses->isEmpty())
            <p class="text-sm text-gray-600">There are no more available courses to enroll.</p>
        @else
            <form action="{{ route('participants.enrollments.store', $participant) }}" method="POST" class="flex flex-col sm:flex-row sm:items-center gap-3">
                @csrf

                <div class="flex-1">
                    <label for="course_id" class="block text-sm font-medium text-gray-700 mb-1">
                        Select course
                    </label>
                    <select name="course_id" id="course_id"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        <option value="">-- Choose a course --</option>
                        @foreach ($availableCourses as $course)
                            <option value="{{ $course->id }}">{{ $course->title }} @if($course->level) ({{ $course->level }}) @endif</option>
                        @endforeach
                    </select>
                </div>

                <div class="sm:mt-6">
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md bg-blue-600 text-white hover:bg-blue-700">
                        Enroll
                    </button>
                </div>
            </form>
        @endif
    </div>
@endsection
