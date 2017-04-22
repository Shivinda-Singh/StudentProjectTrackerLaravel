@extends('layouts.master') @section('content')

<!--Starts here-->

<div class="col-sm-8">

    @include('projects.details')
    
    <!-- /.blog-post -->
    @if(!$project->pending)
    <div class="card">
        <div class="card-block">
            <form method="POST" action="/projects/{{$project->id}}">
                {{ csrf_field() }} @include('layouts.errors')
                <div class="form-group">
                    <textarea name="body" id="body" placeholder="Drop a comment" class="form-control"></textarea>
                </div>
                @if(auth()->id())
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
                @else
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Login to Leave Comment</button>
                </div>
                @endif
            </form>
        </div>
    </div>
    <div class="comments">
        <list-group>
            <label for="Comments">Comments</label>
            @foreach($project->comments as $comment)
            <li class="list-group-item">
                <div class="row">
                        <div class="col-sm-2">
                            <a href="/projects/students/{{$comment->user->name}}"> <img class="img-responsive" src="/uploads/{{$comment->user->avatar}}" alt="Avatar"></a>
                            
                    </div>
                    <div class="col-sm-10">
                        <a href="/projects/students/{{$comment->user->name}}">{{$comment->user->name}}</a><span class="badge pull-right">{{ $comment->created_at->diffForHumans() }}</span>
                        <br>
                        {{ $comment->body }}
                    </div>
                </div>
                
            </li>
            @endforeach
        </list-group>
    </div>
    @endif
</div>
@include('layouts.sidebar') @endsection
