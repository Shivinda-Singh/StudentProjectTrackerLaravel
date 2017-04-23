<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Tag;
use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $projects = Auth::user()->projects;
        $pending_projects = Auth::user()->pending_projects;
        $rejected_projects = Auth::user()->rejected_projects;
               
        return view('students.index', compact('projects','pending_projects','rejected_projects'));
    }

    public function showUploadForm(){
        $tags = Tag::all();
        $users = User::all()->where('id','!=',auth()->user()->id);
        return view('projects.create', compact('users','tags'));
    }

    public function uploadAvatar(Request $request){

        // $path = Storage::disk('uploads')->put('avatars', $request->file('avatar'));
        $path = Storage::disk('uploads')->putFileAs('avatars', $request->file('avatar'), auth()->user()->id . "-avatar");        
        $user = Auth::user();
        $user->avatar =  $path;
        $user->save();
        return redirect('/home');
    }

    
}
