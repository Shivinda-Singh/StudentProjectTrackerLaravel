@extends('layouts.master') @section('content')

<!--Starts here-->

<div class="col-sm-8 blog-main">


    <div class="panel panel-info">
        <div class="panel-heading">
            <h2>{{$project->name}}</h2>
            <p class="blog-post-meta">{{$project->created_at}} by <a href="#">{{$user->name }}</a></p>
        </div>
        <div class="panel-body">
            <div class="row">
                <!--<div class="col-md-3 col-lg-3 " align="center">
                    <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive">
                </div>-->
                <div class=" col-md-12 col-lg-12 ">
                    <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <td>Description</td>
                                <td>{{$project->description}}</td>
                            </tr>
                            <tr>
                                <td>Course Code</td>
                                <td>{{$project->course_code}}</td>
                            </tr>
                            <tr>
                                <td>Year</td>
                                <td>{{$project->year_completed}}</td>
                            </tr>
                            <tr>
                                <td>Collaborators</td>
                                <td>
                                    @if(count($project->users))
                                    <ul>
                                        @foreach ($project->users as $student)
                                        <li>
                                            <a href="/projects/students/{{$student->name}}">{{$student->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Tags</td>
                                <td>
                                    @if(count($project->tagged))
                                    <ul>
                                        @foreach ($project->tagged as $tag)
                                        <li>
                                            <a href="/projects/tags/{{$tag->name}}">{{$tag->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Uploaded Files</td>
                                <td>
                                    @if(count($project->files))
                                    <ul>
                                        @foreach ($project->files as $file)
                                        <li>
                                            <a href="/uploads/{{$file->filename}}" download="/uploads/{{$file->filename}}">{{$file->filename}}</a>
                                            
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Github Link</td>
                                <td><a href="#">{{$project->github}}</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
                @else
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Login to Leave Comment</button>
                </div>
                @endif
            </form>
        </div>
    </div>
    <div class="comments">
        <list-group>
            @foreach($project->comments as $comment)
            <li class="list-group-item">
                <strong>{{$comment->user->name}}</strong>
                <br>
                <strong>{{ $comment->created_at->diffForHumans() }}: &nbsp </strong> {{ $comment->body }}
            </li>
            @endforeach
        </list-group>
    </div>
    @endif
</div>
@include('layouts.sidebar') @endsection
