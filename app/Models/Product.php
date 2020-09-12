<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\money_format;

class Product extends Model
{
    use HasFactory;

    public function presentPrice()
    {
    	// return money_format('₦%i', $this->price * 100 / 100);	
    	return $this->price;
    }
}
