<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
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
        $clients = Client::all();

        return view('admin.pages.clients.index')->with([
            'clients' => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $data = $request->all();
        $data['logo'] = $request->file('logo')->store(
            'assets/client', 'public'
        );

        if(Client::create($data)){
            $notification = array(
                'message' => 'Add client successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Add client failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('clients.index')->with($notification);
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
        $client = Client::findOrFail($id);
        
        return view('admin.pages.clients.edit')->with([
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        $data = $request->all();
        $client = Client::findOrFail($id);

        if($request->file('logo') != ''){
            $data['logo'] = $request->file('logo')->store(
                'assets/client', 'public'
            );
            Storage::delete('/public/'.$request->hidden_file);
        } 
        
        if($client->update($data)){
            $notification = array(
                'message' => 'Update client successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Update client failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('clients.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        if($client->delete()){
            $notification = array(
                'message' => 'Delete client successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Delete client failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('clients.index')->with($notification);
    }
}
