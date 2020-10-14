<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
    	return view('admin.pages.dashboard');
    }

    public function companysetting(){
    	return view('admin.pages.setting.companysetting');
    }
}
