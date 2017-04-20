<?php

namespace App;
use Carbon\Carbon;

class Project extends Model
{
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function addComment($body){
        
        $this->comments()->create(compact('body'));
        // Comment::create([
        //     'body' => $body,
        //     'project_id' => $this->id
        // ]);
    }

    public function scopeFilters($query, $filters){
        if($month = $filters['month']){
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year = $filters['year']){
            $query->whereYear('created_at', $year);

        }
    }

    public static function archives(){
        return static::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) as published')
        ->groupBy('year','month')
        ->orderByRaw('min(created_at)')
        ->where('approved',1)
        ->get()
        ->toArray();
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    
}
