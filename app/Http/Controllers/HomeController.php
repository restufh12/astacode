<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Faq;
use App\Models\Team;

class HomeController extends Controller
{
    public function index(){
		$services = Service::all();
		$faqs     = Faq::all();
		$teams    = Team::all();

    	return view('index')->with([
            'services' => $services,
            'faqs' => $faqs,
            'teams' => $teams,
        ]);;
    }
}