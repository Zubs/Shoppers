<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

// Import Model
use App\Models\Products;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$products = [
    		[
    			'name' => 'Kui Ye Chen’s AirPods',
    			'details' => 'Original White Airpods',
    		],
    		[
    			'name' => 'Air Jordan 12 gym red',
    			'details' => 'Fine Red Shoes',
    		],
    		[
    			'name' => 'Cyan cotton t-shirt',
    			'details' => 'Light and heat resistant t-shirt',
    		],
    		[
    			'name' => 'Timex Unisex Originals',
    			'details' => 'Unisex Shirt',
    		],
    		[
    			'name' => 'Red digital smartwatch',
    			'details' => 'Some digital red watch',
    		],
    		[
    			'name' => 'Nike air max 95',
    			'details' => 'Really dope shoes',
    		],
    		[
    			'name' => 'Joemalone Women prefume',
    			'details' => 'This makes you always smell nice',
    		],
    		[
    			'name' => 'Apple Watch',
    			'details' => 'For the OGs',
    		],
    		[
    			'name' => 'Men silver Byron Watch',
    			'details' => 'Why do you not have this already?',
    		],
    		[
    			'name' => 'Ploaroid one step camera',
    			'details' => 'Wanna become a cameraman?',
    		],
    		[
    			'name' => 'Gray Nike running shoes',
    			'details' => 'Go out there with this and take the world by suprise',
    		],
    		[
    			'name' => 'Black DSLR lense',
    			'details' => 'Drip activator',
    		],
    	];

    	$i = 1;

        foreach ($products as $product) {
        	$price = range(1500, 100000, 500);
        	shuffle($price);
        	
        	Products::create([
	        	'name' => $product['name'],
	        	'slug' => Str::slug($product['name']),
	        	'details' => $product['details'],
	        	'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
	        	'price' => $price[0],
	        	'cover_image' => 'product-' . $i .'.jpg'
	        ]);

	        $i++;
        }
    }
}
