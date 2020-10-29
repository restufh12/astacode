<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        return view('admin.pages.services.index')->with([
            'services' => $services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $data = $request->all();

        if(Service::create($data)){
            $notification = array(
                'message' => 'Add service successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Add service failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('services.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        
        return view('admin.pages.services.edit')->with([
            'service' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, $id)
    {
        $data    = $request->all();
        $service = Service::findOrFail($id);
        
        if($service->update($data)){
            $notification = array(
                'message' => 'Update service successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Update service failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('services.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        if($service->delete()){
            $notification = array(
                'message' => 'Delete service successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Delete service failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('services.index')->with($notification);
    }
}
