<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
   	Use SoftDeletes;

   	protected $fillable = [
   		'service_name', 'description', 'service_icon'
   	];

   	protected $hidden = [
   		
   	];
}
