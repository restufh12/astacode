<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Http\Requests\FaqRequest;

class FaqController extends Controller
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
        $faqs = Faq::all();

        return view('admin.pages.faqs.index')->with([
            'faqs' => $faqs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {
        $data = $request->all();

        if(Faq::create($data)){
            $notification = array(
                'message' => 'Add FAQ successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Add FAQ failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('faqs.index')->with($notification);
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
        $faq = Faq::findOrFail($id);
        
        return view('admin.pages.faqs.edit')->with([
            'faq' => $faq
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FaqRequest $request, $id)
    {
        $data = $request->all();
        $faq  = Faq::findOrFail($id);
        
        if($faq->update($data)){
            $notification = array(
                'message' => 'Update FAQ successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Update FAQ failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('faqs.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        if($faq->delete()){
            $notification = array(
                'message' => 'Delete FAQ successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Delete FAQ failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('faqs.index')->with($notification);
    }
}
