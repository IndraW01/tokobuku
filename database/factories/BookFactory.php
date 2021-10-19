<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => mt_rand(1, 3),
            'judul' => $this->faker->sentence(mt_rand(2, 4)),
            'slug' => $this->faker->unique()->slug(),
            'penulis' => $this->faker->name(),
            'penerbit' => $this->faker->sentence(mt_rand(1, 3)),
            'sinopsis' => collect($this->faker->paragraphs(1, 6))->map(function($value) {
                return "<p>$value</p>";
            })->implode(''),
            'stok' => mt_rand(1, 10),
        ];
    }
}
