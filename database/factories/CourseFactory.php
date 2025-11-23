<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'title'       => $this->faker->sentence(3), // contoh: "Basic Web Development"
            'description' => $this->faker->optional()->paragraph(),
            'level'       => $this->faker->randomElement(['Beginner', 'Intermediate', 'Advanced']),
        ];
    }
}