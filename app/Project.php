<?php

namespace App;
use Carbon\Carbon;
use Auth;
use App\Tag;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    // protected $fillable = ['user_id','name','description','course_code','year_completed','github'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }

    public function files(){
        return $this->hasMany(ProjectFile::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function addComment($body){
        $user_id = auth()->id();
        $this->comments()->create(
            compact('body','user_id')
        );
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

    public function tagged(){
        return $this->belongsToMany(Tag::class);
    }

    
    public function addCollab($id){
        DB::table('project_user')->insert([
            ['user_id' => $id, 'project_id' => $this->id],
        ]);
    }

    public function addTag($name){
        $tag = Tag::create([
            'name' => $name,
        ]);

        DB::table('project_tag')->insert([
            ['tag_id' => $tag->id, 'project_id' => $this->id],
        ]);
    }

    
}
