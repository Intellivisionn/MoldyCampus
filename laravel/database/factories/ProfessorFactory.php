<?php

namespace Database\Factories;

use App\Models\Professor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfessorFactory extends Factory
{
    protected $model = Professor::class;

    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'name' => $this->faker->name,
            'title' => $this->faker->jobTitle,
            'image_path' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
