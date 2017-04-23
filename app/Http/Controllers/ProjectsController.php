<?php

namespace App\Http\Controllers;



use  App\Project;
use App\User;
use App\Project_User;
use App\Tag;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UploadRequest;
use App\ProjectFile;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{

    public function index(){
        $projects = Project::latest()->where('approved',1)->get();
        

        $projects = Project::latest()
        // ->filters(request(['month','year']))
        ->filters(request(['year']))
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

    public function store(UploadRequest $request){
        //validate forms
        // $this->validate(request(),[
        //     'name' => 'required',
        //     'description' => 'required',
        //     'course_code' => 'required',
        //     'year_completed' => 'required',
        //     'github' => 'required',

        // ]);

        // auth()->user()->upload(
        //     new Project(request(['name','description','collaborators','course_code','year_completed','github']))
        // );

        $collaborators = $request->collaborators;
        // return $collaborators;
        $tags = $request->tags;
        // return $tags;
        $project = Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'course_code' => $request->course_code,
            'year_completed' => $request->year_completed,
            'github' => $request->github,
            'user_id' => auth()->id()
        ]);

        $files = $request->file('files');
        if(!empty($files)){
            foreach ($files as $fileno => $file) {
                // $filename = $file->store('public');
                $filename = $file->getClientOriginalName();
                $path = Storage::disk('uploads')->putFileAs('files/'.auth()->user()->id,$file,$filename );
                ProjectFile::create([
                    'project_id' => $project->id,
                    'path' => $path,
                    'name' => $filename
                ]);
            
            }
        }
        

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

        $project->addCollab(auth()->id());

        if(count($collaborators)){
            foreach($collaborators as $collaborator){
                if($collaborator!=auth()->id()){
                    $project->addCollab($collaborator);
                }
                
            }
        }



        session()->flash('message', 'Your post has been published');

        return redirect('/home');
    }

    public function showStudent(User $student){

        return view('projects.student', compact('student'));
    }

}
