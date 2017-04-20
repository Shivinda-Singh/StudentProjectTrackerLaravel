<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
        return view('projects.create');
    }

    

    
}
