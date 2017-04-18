<?php

namespace App;


class Comment extends Model
{
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
