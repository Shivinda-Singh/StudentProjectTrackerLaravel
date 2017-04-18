<?php

namespace App\Http\Controllers;

use  App\Project;

class ProjectsController extends Controller
{
    public function index(){
        $projects = Project::latest()->get();
        return view('projects.index', compact('projects'));
    }

    public function show(Project $project){
        //Laravel specific queries
        // $project = DB::table('projects')->find($id);
        
        //Eloquent queries
        // $project = Projects::find($id);
        
        return view('projects.show', compact('project'));
    }

    public function create(){
        return view('projects.create');
    }

    public function store(){
        //validate forms
        $this->validate(request(),[
            'name' => 'required',
            'description' => 'required',
            'collaborators' => 'required',
            'course_code' => 'required',
            'year' => 'required',
            'github' => 'required'
        ]);


        //create project
        // $project = new Project;
        // $project->name = request('name');
        // $project->description = request('description');
        // $project->collaborators = request('collaborators');
        // $project->course_code = request('course_code');
        // $project->year = request('year');
        // $project->github = request('github');
        // $project->save();

        Project::create([
            'name'=> request('name'),
            'description' => request('description'),
            'collaborators'=> request('collaborators'),
            'course_code'=> request('course_code'),
            'year'=> request('year'),
            'github'=> request('github')
        ]);

        return redirect('/');
    }
}
