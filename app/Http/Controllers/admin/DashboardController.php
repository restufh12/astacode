<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    	return view('admin.pages.dashboard')->with('successMsg', 'Welcome '.Auth::user()->name);
    }

    public function companysetting(){
    	return view('admin.pages.setting.companysetting');
    }
}
