<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
        	['name' => 'Men', 'slug' => 'men', 'created_at' => $now, 'updated_at' => $now],
        	['name' => 'Women', 'slug' => 'women', 'created_at' => $now, 'updated_at' => $now],
        	['name' => 'Children', 'slug' => 'children', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
