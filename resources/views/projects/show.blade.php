@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title">{{$project->name}}</h2>
            <p class="blog-post-meta">{{$project->created_at}} by <a href="#">{{ $project->user->name }}</a></p>
            <p>{{$project->description}}</p>
            <p>{{$project->course_code}}</p>
            <p>{{$project->year_completed}}</p>
            <p>{{$project->github}}</p>
            <!--<p>{{$project->collaborators}}</p>-->
            @if(count($project->students))
                <ul>
                    @foreach ($project->students as $student)
                        <li>
                            <a href="/projects/students/{{$student->name}}">{{$student->name}}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        <!-- /.blog-post -->
        <div class="comments">
            <list-group>
                @foreach($project->comments as $comment)
                    
                    <li  class="list-group-item">
                        <strong>{{ $comment->created_at->diffForHumans() }}: &nbsp </strong>
                        {{ $comment->body }}
                    </li>
                @endforeach
            </list-group>
        </div>
        <div class="card">
            <div class="card-block">
                <form method="POST" action="/projects/{{$project->id}}/comments">
                    {{ csrf_field() }}
                    @include('layouts.errors')
                    <div class="form-group">
                        <textarea name="body" id="body" placeholder="Drop a comment" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
     @include('layouts.sidebar')

@endsection

