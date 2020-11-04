<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Header;
use App\Http\Requests\SettingRequest;
use App\Http\Requests\HeaderRequest;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
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
    	$setting = Setting::orderBy('id')->take(1)->first();

        return view('admin.pages.settings.company-setting')->with([
            'setting' => $setting
        ]);
    }

    public function update(SettingRequest $request, $id){
        $data = $request->all();
        $setting = Setting::findOrFail($id);

        if($request->file('company_logo') != ''){
            $data['company_logo'] = $request->file('company_logo')->store(
                'assets/setting', 'public'
            );
            Storage::delete('/public/'.$request->hidden_file);
        }
        
        if($setting->update($data)){
            $notification = array(
                'message' => 'Update setting successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Update setting failed', 
                'alert-type' => 'error'
            );
        }

        return back()->with($notification);
    }

    public function index_header(){
        $header = Header::orderBy('id')->take(1)->first();

        return view('admin.pages.settings.header-setting')->with([
            'header' => $header
        ]);
    }

    public function update_header(HeaderRequest $request, $id){
        $data   = $request->all();
        $header = Header::findOrFail($id);
        
        if($header->update($data)){
            $notification = array(
                'message' => 'Update header setting successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Update header setting failed', 
                'alert-type' => 'error'
            );
        }

        return back()->with($notification);
    }


}
