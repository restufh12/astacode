<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reason;
use App\Http\Requests\ReasonRequest;

class ReasonController extends Controller
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
        $reasons = Reason::all();

        return view('admin.pages.reasons.index')->with([
            'reasons' => $reasons
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.reasons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReasonRequest $request)
    {
        $data = $request->all();

        if(Reason::create($data)){
            $notification = array(
                'message' => 'Add reason successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Add reason failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('reasons.index')->with($notification);
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
        $reason = Reason::findOrFail($id);
        
        return view('admin.pages.reasons.edit')->with([
            'reason' => $reason
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReasonRequest $request, $id)
    {
        $data = $request->all();
        $reason  = Reason::findOrFail($id);
        
        if($reason->update($data)){
            $notification = array(
                'message' => 'Update reason successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Update reason failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('reasons.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reason = Reason::findOrFail($id);
        if($reason->delete()){
            $notification = array(
                'message' => 'Delete reason successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Delete reason failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('reasons.index')->with($notification);
    }
}
