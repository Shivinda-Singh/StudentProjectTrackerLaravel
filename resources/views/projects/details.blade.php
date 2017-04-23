<div class="panel panel-info">
        <div class="panel-heading">
            <h2>{{$project->name}}</h2>
            <p class="blog-post-meta">{{$project->created_at}} by <a href="#">{{$user->name }}</a></p>
        </div>
        <div class="panel-body">
            <div class="row">
                <dl class="dl-horizontal">

                    <dt>Description</dt>
                            <dd>{{$project->description}}</dd><br>

                            <dt>Course Code</dt>
                            <dd>{{$project->course_code}}</dd><br>

                            <dt>Year</dt>
                            <dd>{{$project->year_completed}}</dd><br>

                            <dt>Collaborators</dt>
                            <dd>
                                @if(count($project->users))
                                <ul>
                                    @foreach ($project->users as $student)
                                    <li style="list-style-type:none;">
                                        <div class="col-md-2 col-sm-4 row">

                                            <div class="pull-left">
                                                <a href="/projects/students/{{$student->name}}"><img src="/uploads/{{$student->avatar}}" class="img-thumbnail" style="height:50px;width:50px;"></a>
                                            </div>

                                            <div class="label label-info">
                                                <a href="/projects/students/{{$student->name}}" style="color:#ffffff;">{{$student->name}}</a>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </dd><br>

                            <dt>Tags</dt>
                            <dd> @if(count($project->tagged))
                                <ul>
                                    @foreach ($project->tagged as $tag)
                                    <li class="label label-info">
                                        <a href="/projects/tags/{{$tag->name}}" style="color:#ffffff;">{{$tag->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif</dd><br>

                            <dt>Uploaded Files</dt>
                            <dd>
                                @if(count($project->files))
                                <ul>
                                    @foreach ($project->files as $file)
                                    <li>
                                        <a href="/uploads/{{$file->path}}" download="/uploads/{{$file->path}}">{{$file->name}}</a>

                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </dd><br>

                            <dt>Github Link</dt>
                            <dd><a href="{{$project->github}}" target="_blank">{{$project->github}}</a></dd><br>

                </dl>

            </div>
        </div>
    </div>