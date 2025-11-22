@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Course</h1>

    <form action="{{ route('courses.update', $course) }}" method="POST" class="bg-white shadow rounded-lg p-6 space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title"
                   value="{{ old('title', $course->title) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4"
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">{{ old('description', $course->description) }}</textarea>
        </div>

        <div>
            <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
            <input type="text" name="level" id="level"
                   value="{{ old('level', $course->level) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('courses.index') }}"
               class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50">
                Cancel
            </a>
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md bg-blue-600 text-white hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
@endsection
