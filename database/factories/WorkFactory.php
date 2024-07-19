<?php

namespace Database\Factories;

use App\Models\Work;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Work>
 */
class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'title'=>fake()->jobTitle(),
           'description'=>fake()->paragraph(3,true),
           'salary'=>fake()->numberBetween(5000,25000),
           'location'=>fake()->city(),
           'category'=>fake()->randomElement(Work::$category),
           'experience'=>fake()->randomElement(Work::$experience),
        ];
    }
}
