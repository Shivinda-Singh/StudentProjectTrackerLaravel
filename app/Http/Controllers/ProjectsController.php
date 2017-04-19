<?php

namespace App\Http\Controllers;

use  App\Project;

class ProjectsController extends Controller
{
    public function index(){
        $projects = Project::latest()->get();


        $projects = Project::latest()
        ->filters(request(['month','year']))
        ->get();

        
        

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project){
        //Laravel specific queries
        // $project = DB::table('projects')->find($id);
        
        //Eloquent queries
        // $project = Projects::find($id);
        
        return view('projects.show', compact('project'));
    }

    // public function create(){
    //     return view('projects.create');
    // }

    public function store(){

        //validate forms
        $this->validate(request(),[
            'name' => 'required',
            'description' => 'required',
            'collaborators' => 'required',
            'course_code' => 'required',
            'year_completed' => 'required',
            'github' => 'required'
        ]);


        // Project::create([
        //     'name'=> request('name'),
        //     'description' => request('description'),
        //     'collaborators'=> request('collaborators'),
        //     'course_code'=> request('course_code'),
        //     'year'=> request('year'),
        //     'github'=> request('github'),
        //     'user_id'=>auth()->id()
        // ]);

        auth()->user()->upload(
            new Project(request(['name','description','collaborators','course_code','year_completed','github']))
        );
        
        session()->flash('message', 'Your post has been published');

        return redirect('/');
    }
}
