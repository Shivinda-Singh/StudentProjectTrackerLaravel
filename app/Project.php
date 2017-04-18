<?php

namespace App;


class Project extends Model
{
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function addComment($body){
        
        $this->comments()->create(compact('body'));
        // Comment::create([
        //     'body' => $body,
        //     'project_id' => $this->id
        // ]);
    }
}
