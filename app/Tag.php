<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Tag extends BaseModel
{
    protected $fillable = ['name'];
    
    public function projects(){
        return $this->belongsToMany(Project::class)->latest()->where('approved',1);
    }

    public function getRouteKeyName(){
        return 'name';
    }
    
}
