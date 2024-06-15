<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(),
            'company_id' => Company::factory(),
            'images' => $this->faker->imageUrl(),
            'price' => $this->faker->numberBetween(10,500),
            'description' => $this->faker->paragraph()

        ];
    }
}