@extends('layouts.master')

@section('content')

    <div class="col-sm-8 panel panel-default">
        <div class="panel-body">
            <div class="row">
            <h2 class="panel-heading">{{$project->name}}</h2>
            <p class="badge badge-pill badge-primary">Published on {{$project->created_at}}</p>
            </div>
            <p>{{$project->description}}</p>
            <p>{{$project->course_code}}</p>
            <p>{{$project->year_completed}}</p>
            <p>{{$project->github}}</p>
            <p>Collaborators</p>
            @if(count($project->users))
                <ul>
                    @foreach ($project->users as $student)
                        <li>
                            <a href="/projects/students/{{$student->name}}">{{$student->name}}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
            <!--<p>{{$project->collaborators}}</p>-->
            <p>Tags</p>
            @if(count($project->tags))
                <ul>
                    @foreach ($project->tags as $tag)
                        <li>
                            <a href="/projects/tags/{{$tag->name}}">{{$tag->name}}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
       
<div class="panel panel-default">
            <form method="POST" action="/admin/update/{{$project->id}}">
            {{ csrf_field() }}

            <div class="form-group">
                <input id="review" name="review" type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-on="Enabled" data-off="Disabled">
            </div>

            <div class="form-group" id="reject_reasons" style="display: none;">
                <label for="rejection_reasons">Reasons for Rejection</label>
                <textarea class="form-control" id="rejection_reasons" name="rejection_reasons" rows="3"></textarea>
            </div>

            <div class="form-group">
                 <button type="submit" class="btn btn-primary">Submit</button><br>
                <small id="submitHelp" class="form-text text-muted">Use the toggle above to approve or reject this project submission</small>
            </div>

            <!--<input id="project_id" name="project_id" value="{{$project->id}}"type="text" style="display: none;">-->
        </form>
    </div>

    </div>

    
     @include('layouts.sidebar')

@endsection

