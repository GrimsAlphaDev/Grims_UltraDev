<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
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
            'nim' => $this->faker->unique()->numberBetween($min = 101001, $max = 101100),
            'nama' => $this->faker->name(),
            'kelas' => $this->faker->randomElement($array = array ('10','11','12')),
            'status' => $this->faker->randomElement($array = array ('online','offline')),
            'img' => $this->faker->randomElement($array = array ('patoriku.jpg','lesti.png','bambang.png')),
            'category_id' => mt_rand(1,3),
            'user_id' => mt_rand(1,3)
            

        ];
    }
}
