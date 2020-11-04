<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $fillable = [
   		'about_us', 'why_us', 'skills', 'services', 'call_to_action', 'portfolios', 'teams', 
   		'pricing', 'faqs', 'testimonials', 'articles', 'contact',
   		'join_our_newsletter', 'our_social_network'
   	];

   	protected $hidden = [
   		
   	];
}
