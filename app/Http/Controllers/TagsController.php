<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagsController extends Controller
{
    protected $fillable = [
        'name',
    ];
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Tag $tag){
        $projects = $tag->projects;
        return view('projects.index', compact('projects'));
    }

}
