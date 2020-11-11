<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Portfolio;
use App\Models\Product;
use App\Models\Subscriber;

class DashboardController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $total_client     = Client::all()->count();
        $total_portfolio  = Portfolio::all()->count();
        $total_product    = Product::all()->count();
        $total_subscriber = Subscriber::all()->count();
        return view('admin.pages.dashboard')->with([
            'total_client' => $total_client,
            'total_portfolio' => $total_portfolio,
            'total_product' => $total_product,
            'total_subscriber' => $total_subscriber,
            'successMsg' => 'Welcome '.Auth::user()->name
        ]);
    }

    public function companysetting(){
    	return view('admin.pages.setting.companysetting');
    }
}
