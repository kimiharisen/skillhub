<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Participant;
use App\Models\Course;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Dummy Participants (fixed)
        $participantsData = [
            [
                'name'  => 'Alice Johnson',
                'email' => 'alice@example.com',
                'phone' => '0812-1111-1111',
            ],
            [
                'name'  => 'Bob Smith',
                'email' => 'bob@example.com',
                'phone' => '0812-2222-2222',
            ],
            [
                'name'  => 'Charlie Brown',
                'email' => 'charlie@example.com',
                'phone' => '0812-3333-3333',
            ],
            [
                'name'  => 'Diana Prince',
                'email' => 'diana@example.com',
                'phone' => '0812-4444-4444',
            ],
            [
                'name'  => 'Evan Lee',
                'email' => 'evan@example.com',
                'phone' => '0812-5555-5555',
            ],
        ];

        $participants = [];
        foreach ($participantsData as $data) {
            // Cari berdasarkan email, kalau belum ada baru buat
            $participants[$data['email']] = Participant::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name'  => $data['name'],
                    'phone' => $data['phone'],
                ]
            );
        }

        // 2. Dummy Courses (fixed)
        $coursesData = [
            [
                'title'       => 'Laravel Fundamentals',
                'description' => 'Basic introduction to Laravel framework, routing, controllers, and views.',
                'level'       => 'Beginner',
            ],
            [
                'title'       => 'Database Design',
                'description' => 'Relational database, ERD, normalization, and basic SQL.',
                'level'       => 'Intermediate',
            ],
            [
                'title'       => 'Web Frontend with Tailwind CSS',
                'description' => 'Building clean and responsive UI using Tailwind CSS and Blade.',
                'level'       => 'Beginner',
            ],
            [
                'title'       => 'RESTful API Basics',
                'description' => 'Concepts of REST API, HTTP methods, and JSON responses.',
                'level'       => 'Intermediate',
            ],
            [
                'title'       => 'Software Engineering Basics',
                'description' => 'Requirements, design, testing, and documentation in software projects.',
                'level'       => 'Beginner',
            ],
        ];

        $courses = [];
        foreach ($coursesData as $data) {
            // Cari berdasarkan title, kalau belum ada baru buat
            $courses[$data['title']] = Course::firstOrCreate(
                ['title' => $data['title']],
                [
                    'description' => $data['description'],
                    'level'       => $data['level'],
                ]
            );
        }

        // 3. Enrollments (fixed mapping)
        $enrollments = [
            'alice@example.com' => [
                'Laravel Fundamentals',
                'Database Design',
                'Web Frontend with Tailwind CSS',
            ],
            'bob@example.com' => [
                'Laravel Fundamentals',
                'RESTful API Basics',
            ],
            'charlie@example.com' => [
                'Database Design',
                'Software Engineering Basics',
            ],
            'diana@example.com' => [
                'Web Frontend with Tailwind CSS',
                'Software Engineering Basics',
            ],
            'evan@example.com' => [
                'Laravel Fundamentals',
                'RESTful API Basics',
                'Software Engineering Basics',
            ],
        ];

        foreach ($enrollments as $participantEmail => $courseTitles) {
            $participant = $participants[$participantEmail] ?? null;

            if (! $participant) {
                continue;
            }

            foreach ($courseTitles as $title) {
                $course = $courses[$title] ?? null;

                if (! $course) {
                    continue;
                }

                // Tidak akan membuat duplikat di pivot walaupun seeding berkali-kali
                $participant->courses()->syncWithoutDetaching([
                    $course->id => [
                        'enrolled_at' => now(),
                    ],
                ]);
            }
        }
    }
}
