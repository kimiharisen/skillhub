@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Add Participant</h1>

    <form action="{{ route('participants.store') }}" method="POST" class="bg-white shadow rounded-lg p-6 space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name"
                   value="{{ old('name') }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email"
                   value="{{ old('email') }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
        </div>

        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="text" name="phone" id="phone"
                   value="{{ old('phone') }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('participants.index') }}"
               class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50">
                Cancel
            </a>
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md bg-blue-600 text-white hover:bg-blue-700">
                Save
            </button>
        </div>
    </form>
@endsection
