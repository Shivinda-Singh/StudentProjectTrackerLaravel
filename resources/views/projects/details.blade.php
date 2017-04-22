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
                                            <a href="/uploads/{{$file->path}}" download="/uploads/{{$file->path}}">{{$file->name}}</a>
                                            
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Github Link</td>
                                <td><a href="{{$project->github}}" target="_blank">{{$project->github}}</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>