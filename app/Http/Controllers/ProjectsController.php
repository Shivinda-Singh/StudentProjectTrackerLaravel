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

        $collaborators = $request->collaborators;
        $tags = $request->tags;
        $project = Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'course_code' => $request->course_code,
            'github' => $request->github,
            'year_completed' => $request->year_completed,
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
        
        if(count($tags)){
            foreach($tags as $tag){
                if($tag[0]=='#'){
                    $tag=substr($tag,1);
                }
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
