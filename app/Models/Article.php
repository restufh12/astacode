<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    Use SoftDeletes;

    protected $fillable = [
   		'title', 'd_ate', 'description', 'photo'
   	];

   	protected $hidden = [
   		
   	];

   	public function getPhotoAttribute($value)
   	{
   		return url('storage/'.$value);
   	}
}
