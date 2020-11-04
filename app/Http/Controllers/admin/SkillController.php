<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Http\Requests\SkillRequest;

class SkillController extends Controller
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
        $skills = Skill::all();

        return view('admin.pages.skills.index')->with([
            'skills' => $skills
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkillRequest $request)
    {
        $data = $request->all();

        if(Skill::create($data)){
            $notification = array(
                'message' => 'Add skill successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Add skill failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('skills.index')->with($notification);
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
        $skill = Skill::findOrFail($id);
        
        return view('admin.pages.skills.edit')->with([
            'skill' => $skill
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SkillRequest $request, $id)
    {
        $data = $request->all();
        $skill  = Skill::findOrFail($id);
        
        if($skill->update($data)){
            $notification = array(
                'message' => 'Update skill successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Update skill failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('skills.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        if($skill->delete()){
            $notification = array(
                'message' => 'Delete skill successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Delete skill failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('skills.index')->with($notification);
    }
}
