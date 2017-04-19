<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;

class StudentsController extends Controller
{
    public function index(Student $student ){
        $projects = $student->projects;
        return view('projects.index', compact('projects'));
    }
}
