@extends('layouts.master')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Upload a Project</h4>
        </div>
        <div class="panel-body">
            <form method="POST" class=" col-sm-8 col-sm-offset-2" action="/projects" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('layouts.errors')
                
                <div class="form-group">
                    <label for="name">Project Name</label>
                    <input required type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp">
                    <small id="nameHelp" class="form-text text-muted">Name of your project.</small>
                </div>
                <div class="form-group">
                    <label for="desccription">Description</label>
                    <textarea required class="form-control" id="description" name="description" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="collaborators">Collaborators</label><br>
                    <select id="collaborators" name="collaborators[]" class="collaborators" multiple="multiple" style="width:100%;" >
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Tags</label><br>
                    <select id="tags" name="tags[]" class="tags" multiple="multiple" style="width:100%;" >
                        @foreach($tags as $tag)
                        <option value="{{$tag->name}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="course_code">Course Code</label>
                    <input required type="text" class="form-control" id="course_code" name="course_code" >
                </div>
                <div class="form-group">
                    <label for="year_completed">Year</label>
                    <input required type="number" class="form-control" id="year_completed" name="year_completed">
                </div>
                <div class="form-group">
                    <label for="github">Github</label>
                    <input required type="url" class="form-control" id="github" name="github" placeholder="link">
                </div>
                <div class="form-group">
                    <label for="files">Upload Files( Max 100MB )</label>
                    <input type="file" name="files[]" id="files" class="form-control" multiple />
                    <small class="form-text text-muted">You may upload more than 1 file</small>
                </div>

                <div class="form-group text-center">
                    <small id="submitHelp" >Project will be submitted for approval</small><br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
    
        </div>
    </div>

@endsection