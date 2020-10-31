<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    Use SoftDeletes;
    
    protected $fillable = [
   		'project_name', 'category', 'client_id', 'project_date', 'project_url', 'project_desc'
   	];

   	protected $hidden = [
   		
   	];

   	public function client(){
      return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function galleries(){
      return $this->hasMany(PortfolioGallery::class, 'portfolio_id');
    }
}
