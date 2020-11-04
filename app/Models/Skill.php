<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    Use SoftDeletes;

   	protected $fillable = [
   		'skill_name', 'skill_score'
   	];

   	protected $hidden = [
   		
   	];
}
