<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    Use SoftDeletes;
    
    protected $fillable = [
   		'name', 'description', 'price', 'UOM', 'activeYN', 'currency_code', 'best_priceYN'
   	];

   	protected $hidden = [
   		
   	];
}
