<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
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

        return view('students.index', compact('projects','pending_projects'));
    }

    public function showUploadForm(){
        $users = User::all();
        return view('projects.create', compact('users'));
    }

    public function uploadAvatar(Request $request){
        // $path = $request->file('avatar')->store('avatars');
        // $user = Auth::user();
        // $user->avatar =  $path;
        // $user->save();
        // return redirect('/home');
        // $file = $request->avatar;
        // Storage::disk('uploads')->put('avatars', $file);
        $path = Storage::disk('uploads')->put('avatars', $request->file('avatar'));
        // $path = Storage::url($file);
        $user = Auth::user();
        $user->avatar =  $path;
        $user->save();
        return redirect('/home');
    }

    
}
