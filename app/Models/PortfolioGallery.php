<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PortfolioGallery extends Model
{
	Use SoftDeletes;

    protected $fillable = [
   		'portfolio_id', 'photo', 'defaultYN'
   	];

   	protected $hidden = [
   		
   	];

   	public function portfolio(){
      return $this->belongsTo(Portfolio::class, 'portfolio_id', 'id');
    }

    public function getPhotoAttribute($value)
    {
      return url('storage/'.$value);
    }
}
