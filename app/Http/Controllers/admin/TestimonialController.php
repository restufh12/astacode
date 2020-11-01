<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Http\Requests\TestimonialRequest;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
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
        $testimonials = Testimonial::all();

        return view('admin.pages.testimonials.index')->with([
            'testimonials' => $testimonials
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store(
            'assets/testimonial', 'public'
        );

        if(Testimonial::create($data)){
            $notification = array(
                'message' => 'Add testimonial successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Add testimonial failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('testimonials.index')->with($notification);
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
        $testimonial = Testimonial::findOrFail($id);
        
        return view('admin.pages.testimonials.edit')->with([
            'testimonial' => $testimonial
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $testimonial = Testimonial::findOrFail($id);

        if($request->file('photo') != ''){
            $data['photo'] = $request->file('photo')->store(
                'assets/testimonial', 'public'
            );
            Storage::delete('/public/'.$request->hidden_file);
        } 
        
        if($testimonial->update($data)){
            $notification = array(
                'message' => 'Update testimonial successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Update testimonial failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('testimonials.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if($testimonial->delete()){
            $notification = array(
                'message' => 'Delete testimonial successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Delete testimonial failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('testimonials.index')->with($notification);
    }
}
