<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Book;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('books')->insert([
        //     'title'       => 'Book ' . rand(0, 100000),
        //     'description' => Str::random(15),
        //     'price'       => rand(100, 10000),
        //     'create_at'   => Carbon::now()->format('Y-m-d H:i:s')
        // ]);
        Book::factory()->count(50)->create();
    }
}
