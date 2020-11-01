<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    Use SoftDeletes;
    
    protected $fillable = [
   		'name', 'notes', 'photo'
   	];

   	protected $hidden = [
   		
   	];

   	public function getPhotoAttribute($value)
   	{
   		return url('storage/'.$value);
   	}
}
