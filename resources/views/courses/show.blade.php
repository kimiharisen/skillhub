@extends('layouts.app')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold">Course Detail</h1>

        <a href="{{ route('courses.index') }}"
           class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50">
            Back to list
        </a>
    </div>

    <div class="bg-white shadow rounded-lg p-6 space-y-4 mb-8">
        <div>
            <span class="text-sm font-medium text-gray-500">Title</span>
            <div class="text-sm text-gray-900">{{ $course->title }}</div>
        </div>

        <div>
            <span class="text-sm font-medium text-gray-500">Level</span>
            <div class="text-sm text-gray-900">{{ $course->level ?? '-' }}</div>
        </div>

        <div>
            <span class="text-sm font-medium text-gray-500">Description</span>
            <div class="text-sm text-gray-900 whitespace-pre-line">
                {{ $course->description ?? '-' }}
            </div>
        </div>
    </div>

    {{-- Participants enrolled in this course --}}
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Participants in this course</h2>

        @if ($course->participants->isEmpty())
            <p class="text-sm text-gray-600">No participants enrolled in this course yet.</p>
        @else
            <ul class="divide-y divide-gray-200">
                @foreach ($course->participants as $participant)
                    <li class="py-2 flex items-center justify-between">
                        <div>
                            <div class="text-sm font-medium text-gray-900">
                                {{ $participant->name }}
                            </div>
                            <div class="text-xs text-gray-500">
                                {{ $participant->email }}
                            </div>
                        </div>

                        <a href="{{ route('participants.show', $participant) }}"
                           class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-md border border-gray-300 hover:bg-gray-50">
                            View participant
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
