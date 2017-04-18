<?php

namespace App\Http\Controllers;

use App\Project;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Project $project){
        // dd(request('body'));
        $this->validate(request(), ['body'=>'required|min:2']);
        $project->addComment(request('body'));

        return back();
    }
}
