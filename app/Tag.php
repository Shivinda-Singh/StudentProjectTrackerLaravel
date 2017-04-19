<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function Projects(){
        return $this->belongsToMany(Project::class);
    }

    public function getRouteKeyName(){
        return 'name';
    }
}
