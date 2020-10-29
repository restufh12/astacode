<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Faq;
use App\Models\Team;
use App\Models\Client;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $services = Service::all();
        $faqs     = Faq::all();
        $teams    = Team::all();
        $clients  = Client::all();
        $products = Product::all();// if activeyn<>'0'

    	return view('index')->with([
            'services' => $services,
            'faqs' => $faqs,
            'teams' => $teams,
            'clients' => $clients,
            'products' => $products,
        ]);;
    }
}