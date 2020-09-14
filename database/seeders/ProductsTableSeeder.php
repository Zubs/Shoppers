<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$price_range = range(1500, 25000, 500);
        Product::create([
        	'name' => 'Tank Top',
        	'slug' => 'cloth_1',
        	'details' => 'Finding Perfect Products 1',
        	'price' => shuffle($price_range) ? $price_range[0] : 500,
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, vitae, explicabo? Incidunt facere, natus soluta dolores iusto! Molestiae expedita veritatis nesciunt doloremque sint asperiores fuga voluptas, distinctio, aperiam, ratione dolore.

				Ex numquam veritatis debitis minima quo error quam eos dolorum quidem perferendis. Quos repellat dignissimos minus, eveniet nam voluptatibus molestias omnis reiciendis perspiciatis illum hic magni iste, velit aperiam quis.',
            'category_id' => 1,
        ]);

        Product::create([
        	'name' => 'Polo Shirt',
        	'slug' => 'cloth_2',
        	'details' => 'Finding Perfect Products 2',
        	'price' => shuffle($price_range) ? $price_range[0] : 500,
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, vitae, explicabo? Incidunt facere, natus soluta dolores iusto! Molestiae expedita veritatis nesciunt doloremque sint asperiores fuga voluptas, distinctio, aperiam, ratione dolore.

				Ex numquam veritatis debitis minima quo error quam eos dolorum quidem perferendis. Quos repellat dignissimos minus, eveniet nam voluptatibus molestias omnis reiciendis perspiciatis illum hic magni iste, velit aperiam quis.',
            'category_id' => 1,
        ]);

        Product::create([
        	'name' => 'T-Shirt Mockup',
        	'slug' => 'cloth_3',
        	'details' => 'Finding Perfect Products 3',
        	'price' => shuffle($price_range) ? $price_range[0] : 500,
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, vitae, explicabo? Incidunt facere, natus soluta dolores iusto! Molestiae expedita veritatis nesciunt doloremque sint asperiores fuga voluptas, distinctio, aperiam, ratione dolore.

				Ex numquam veritatis debitis minima quo error quam eos dolorum quidem perferendis. Quos repellat dignissimos minus, eveniet nam voluptatibus molestias omnis reiciendis perspiciatis illum hic magni iste, velit aperiam quis.',
            'category_id' => 1,
        ]);

        Product::create([
        	'name' => 'Corater',
        	'slug' => 'shoe_1',
        	'details' => 'Finding Perfect Products 4',
        	'price' => shuffle($price_range) ? $price_range[0] : 500,
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, vitae, explicabo? Incidunt facere, natus soluta dolores iusto! Molestiae expedita veritatis nesciunt doloremque sint asperiores fuga voluptas, distinctio, aperiam, ratione dolore.

				Ex numquam veritatis debitis minima quo error quam eos dolorum quidem perferendis. Quos repellat dignissimos minus, eveniet nam voluptatibus molestias omnis reiciendis perspiciatis illum hic magni iste, velit aperiam quis.',
            'category_id' => 1,
        ]);
    }
}
