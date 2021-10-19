<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();


        Category::create([
            'nama' => 'Buku Sekolah',
            'slug' => 'buku-sekolah'
        ]);
        Category::create([
            'nama' => 'Komputer dan Internet',
            'slug' => 'komputer-dan-internet'
        ]);
        Category::create([
            'nama' => 'Sejarah dan Budaya',
            'slug' => 'sejarah-dan-budaya'
        ]);

        Book::factory(10)->create();
    }
}
