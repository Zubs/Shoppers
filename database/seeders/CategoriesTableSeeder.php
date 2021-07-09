<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

// Import Model
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Shirts',
            'Watches',
            'Shoes',
            'Women Perfumes',
            'Camera',
            'Airpods'
        ];

        foreach ($categories as $category) {
        	Category::create([
	        	'name' => $category,
	        	'slug' => Str::slug($category),
	        ]);
        }
    }
}
