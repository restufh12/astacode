<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PortfolioGallery;
use App\Models\Portfolio;
use App\Http\Requests\PortfolioGalleryRequest;
use Illuminate\Support\Facades\Storage;

class PortfolioGalleryController extends Controller
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
        $portfolio_galleries = PortfolioGallery::with('portfolio')->get();

        return view('admin.pages.portfolio-galleries.index')->with([
            'portfolio_galleries' => $portfolio_galleries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $portfolios = Portfolio::all();
        return view('admin.pages.portfolio-galleries.create')->with([
            'portfolios' => $portfolios
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioGalleryRequest $request)
    {
        $data = $request->all();


        $data['photo'] = $request->file('photo')->store(
            'assets/portfolio', 'public'
        );

        $portfolio_gallery = PortfolioGallery::create($data);
        if($portfolio_gallery){
            // UPDATE DEFAULT PHOTO
            $id           = $portfolio_gallery->id;
            $portfolio_id = $portfolio_gallery->portfolio_id;

            if($data['defaultYN']=="1"){
                PortfolioGallery::where('portfolio_id', $portfolio_id)->where('id', '!=' , $id)->update(['defaultYN' => '0']);
            }

            $notification = array(
                'message' => 'Add portfolio gallery successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Add portfolio gallery failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('portfolio-galleries.index')->with($notification);
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
		$portfolio_gallery = PortfolioGallery::findOrFail($id);
		$portfolios        = Portfolio::all();
        
        return view('admin.pages.portfolio-galleries.edit')->with([
            'portfolio_gallery' => $portfolio_gallery,
            'portfolios' => $portfolios
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PortfolioGalleryRequest $request, $id)
    {
        $data = $request->all();
        $portfolio_gallery = PortfolioGallery::findOrFail($id);

        if($request->file('photo') != ''){
            $data['photo'] = $request->file('photo')->store(
	            'assets/portfolio', 'public'
	        );
            Storage::delete('/public/'.$request->hidden_file);
        } 
        
        if($portfolio_gallery->update($data)){

            // UPDATE DEFAULT PHOTO
            $id           = $portfolio_gallery->id;
            $portfolio_id = $portfolio_gallery->portfolio_id;

            if($data['defaultYN']=="1"){
                PortfolioGallery::where('portfolio_id', $portfolio_id)->where('id', '!=' , $id)->update(['defaultYN' => '0']);
            }

            $notification = array(
                'message' => 'Update portfolio gallery successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Update portfolio gallery failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('portfolio-galleries.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio_gallery = PortfolioGallery::findOrFail($id);
        if($portfolio_gallery->delete()){
            $notification = array(
                'message' => 'Delete portfolio gallery successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Delete portfolio gallery failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('portfolio-galleries.index')->with($notification);
    }
}
