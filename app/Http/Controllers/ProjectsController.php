<?php

namespace App\Http\Controllers;



use  App\Project;
use App\User;
use App\Project_User;
use App\Tag;
use Auth;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{

    public function index(){
        $projects = Project::latest()->where('approved',1)->get();
        

        $projects = Project::latest()
        ->filters(request(['month','year']))
        ->where('approved',1)
        ->get();

        // return $projects;
        

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project){
        if($project->approved||Auth::check()){
            $user = User::find($project->user_id);

            return view('projects.show', compact('project','user'));
        }
        return redirect('/projects');
    }

    public function store(){
        //validate forms
        $this->validate(request(),[
            'name' => 'required',
            'description' => 'required',
            'course_code' => 'required',
            'year_completed' => 'required',
            'github' => 'required'
        ]);

        // auth()->user()->upload(
        //     new Project(request(['name','description','collaborators','course_code','year_completed','github']))
        // );

        $collaborators = request('collaborators');

        $tags = request('tags');

        $project = Project::create([
            'name' => request('name'),
            'description' => request('description'),
            'course_code' => request('course_code'),
            'year_completed' => request('year_completed'),
            'github' => request('github'),
            'user_id' => auth()->id()
        ]);

        //add attach tags to project

        //attach users to project

        // return $project->id;
        // Project_User::create([
        //     'user_id' => $project->user_id,
        //     'project_id' => $project->id
        // ]);

        
        if(count($tags)){
            foreach($tags as $tag){
                $project->addTag($tag);
            }
        }

        if(count($collaborators)){
            foreach($collaborators as $collaborator){
                $project->addCollab($collaborator);
            }
        }

        

        
        


        

        
        session()->flash('message', 'Your post has been published');

        return redirect('/home');
    }

    public function showStudent(User $student){

        return view('projects.student', compact('student'));
    }
}
