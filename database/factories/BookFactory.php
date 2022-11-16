<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

class BookFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'       => 'Book ' . rand(0, 100000),
            'description' => Str::random(15),
            'price'       => rand(100, 10000),
            'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
        ];
    }
}
