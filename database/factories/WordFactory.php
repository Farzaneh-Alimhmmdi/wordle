<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class WordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
			'title' => substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 5),
        ];
    }
}
