<?php

namespace Database\Seeders;

use App\Models\BookCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Fiction', 'Non-Fiction', 'Science Fiction', 'Mystery', 'Biography'];

        foreach ($categories as $category) {
            BookCategory::create(['name' => $category]);
    }
    }
}
