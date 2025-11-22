<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SkillHub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Vite: load Tailwind & JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    {{-- Navbar --}}
    <nav class="bg-white shadow">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <a href="{{ route('participants.index') }}" class="text-xl font-bold">
                    SkillHub
                </a>

                <div class="flex space-x-4">
                    <a href="{{ route('participants.index') }}"
                       class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-100
                       {{ request()->is('participants*') ? 'text-blue-600' : 'text-gray-700' }}">
                        Participants
                    </a>

                    <a href="{{ route('courses.index') }}"
                       class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-100
                       {{ request()->is('courses*') ? 'text-blue-600' : 'text-gray-700' }}">
                        Courses
                    </a>
                </div>
            </div>
        </div>
    </nav>

    {{-- Main content --}}
    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">

        {{-- Flash message --}}
        @if (session('success'))
            <div class="mb-4 rounded-md bg-green-50 border border-green-200 px-4 py-3 text-sm text-green-800">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation errors (global) --}}
        @if ($errors->any())
            <div class="mb-4 rounded-md bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-800">
                <div class="font-semibold mb-1">There were some problems with your input:</div>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>
