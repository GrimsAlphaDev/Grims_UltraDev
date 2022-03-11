<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'jurusan' => $this->faker->unique()->randomElement($array = array ('Teknik Mesin','Teknik Listrik','Fire Bending')),
            'slug' => $this->faker->unique()->slug()
        ];
    }
}
