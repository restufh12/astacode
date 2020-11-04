<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reason extends Model
{
    Use SoftDeletes;
    
    protected $fillable = [
   		'reason', 'description'
   	];

   	protected $hidden = [
   		
   	];
}
