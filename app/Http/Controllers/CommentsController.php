<?php

namespace App\Http\Controllers;

use App\Project;
use App\Comment;
use Auth;


class CommentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Project $project){
            $this->validate(request(), ['body'=>'required|min:3']);
            $project->addComment(request('body'));
            

        return back();
        
    }

}
