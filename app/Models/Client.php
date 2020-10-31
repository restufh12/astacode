<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    Use SoftDeletes;
    
    protected $fillable = [
   		'name', 'logo', 'description', 'url'
   	];

   	protected $hidden = [
   		
   	];

   	public function getLogoAttribute($value)
   	{
   		return url('storage/'.$value);
   	}

    public function client_portfolios(){
      return $this->hasMany(Portfolio::class, 'client_id');
    }
}
