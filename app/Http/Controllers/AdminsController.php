<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class AdminsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pending_projects = Project::latest()->where('pending',1)->get();
        return view('admin.index',compact('pending_projects'));
    }

    public function review(Project $project)
    {
        return view('admin.review', compact('project'));
    }

    public function update(Request $request, $id){

        $this->validate(request(),[
            'rejection_reasons' => 'max:255',
        ]);
        $project = Project::find($id);
        $project->pending = false;
        if($request->review=='on'){
            
            $project->approved = true;
        }else{
            $project->rejection_reasons = $request->rejection_reasons;
        }

        $project->save();
        
        // return $request->review;
        session()->flash('message', "Project has been reviewed");
        return redirect(route('admin.dashboard'));
    }
}
