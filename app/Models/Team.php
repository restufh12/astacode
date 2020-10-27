<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
      Use SoftDeletes;

   	protected $fillable = [
   		'name', 'position', 'notes', 'photo', 'link_twitter', 'link_instagram', 'link_facebook', 'link_linkedin'
   	];

   	protected $hidden = [
   		
   	];

   	public function getPhotoAttribute($value)
   	{
   		return url('storage/'.$value);
   	}
}
