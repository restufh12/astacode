<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\PortfolioGallery;
use App\Models\Client;
use App\Http\Requests\PortfolioRequest;

class PortfolioController extends Controller
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
        $portfolios = Portfolio::with('client')->get();

        return view('admin.pages.portfolios.index')->with([
            'portfolios' => $portfolios
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $categories = Portfolio::distinct()->get(['category']);
        return view('admin.pages.portfolios.create')->with([
            'categories' => $categories,
            'clients' => $clients
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if(Portfolio::create($data)){
            $notification = array(
                'message' => 'Add Portfolio successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Add Portfolio failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('portfolios.index')->with($notification);
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
        $portfolio  = Portfolio::findOrFail($id);
        $clients    = Client::all();
        $categories = Portfolio::distinct()->get(['category']);
        
        return view('admin.pages.portfolios.edit')->with([
            'portfolio' => $portfolio,
            'categories' => $categories,
            'clients' => $clients
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
        $portfolio = Portfolio::findOrFail($id);
        
        if($portfolio->update($data)){
            $notification = array(
                'message' => 'Update portfolio successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Update portfolio failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('portfolios.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        if($portfolio->delete()){
            $notification = array(
                'message' => 'Delete portfolio successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Delete portfolio failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('portfolios.index')->with($notification);
    }

    public function gallery(Request $request, $id)
    {
        $portfolio           = Portfolio::findOrFail($id);
        $portfolio_galleries = PortfolioGallery::with('portfolio')->where('portfolio_id', $id)->get();

        return view('admin.pages.portfolios.gallery')->with([
            'portfolio' => $portfolio,
            'portfolio_galleries' => $portfolio_galleries
        ]);
    }
}
