@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    <h1>Submissions Pending Approval</h1>
                    @foreach ($pending_projects as $project)
                        <div class="blog-post">
                            <h2 class="blog-post-title"><a href="/admin/review/{{$project->id}}">{{$project->name}}</a></h2>
                            <p class="blog-post-meta">Published on {{$project->created_at->toFormattedDateString()}}</p>
                            <p>{{$project->description}}</p>
                        </div>
                    @endforeach
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
