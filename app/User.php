<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Project;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function upload(Project $project){
        $this->projects()->save($project);
    }

    public function projects(){
        return $this->belongsToMany(Project::class)->latest()->where('approved',1);
    }

    public function pending_projects(){
        return $this->belongsToMany(Project::class)->latest()->where('pending',1);
    }

     public function rejected_projects(){
        return $this->belongsToMany(Project::class)->latest()
        ->where([
            ['approved',0],
            ['pending', 0]
        ]);
    }

    public function getRouteKeyName(){
        return 'name';
    }

}
