<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Http\Requests\TeamRequest;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
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
        $teams = Team::all();

        return view('admin.pages.teams.index')->with([
            'teams' => $teams
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store(
            'assets/team', 'public'
        );

        if(Team::create($data)){
            $notification = array(
                'message' => 'Add team successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Add team failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('teams.index')->with($notification);
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
        $team = Team::findOrFail($id);
        
        return view('admin.pages.teams.edit')->with([
            'team' => $team
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, $id)
    {
        $data = $request->all();
        $team = Team::findOrFail($id);

        if($request->file('photo') != ''){
            $data['photo'] = $request->file('photo')->store(
                'assets/team', 'public'
            );
            Storage::delete('/public/'.$request->hidden_file);
        } 
        
        if($team->update($data)){
            $notification = array(
                'message' => 'Update team successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Update team failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('teams.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        if($team->delete()){
            $notification = array(
                'message' => 'Delete team successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Delete team failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('teams.index')->with($notification);
    }
}
