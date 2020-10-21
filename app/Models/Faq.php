<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
	Use SoftDeletes;
    
    protected $fillable = [
   		'question', 'answer'
   	];

   	protected $hidden = [
   		
   	];
}
