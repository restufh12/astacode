<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
   		'company_name', 'company_logo', 'company_address', 'company_email', 'company_tel', 'longitude', 'latitude', 
   		'link_twitter', 'link_instagram', 'link_facebook', 'link_linkedin', 'link_skype',
   		'slogan', 'sub_slogan', 'video_url', 'about_us', 'company_wa', 'google_maps_iframe'
   	];

   	protected $hidden = [
   		
   	];

   	public function getCompanylogoAttribute($value)
   	{
   		return url('storage/'.$value);
   	}
}
