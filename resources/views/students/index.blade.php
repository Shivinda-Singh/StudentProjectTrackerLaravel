@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a data-toggle="tab" href="#home">Dashboard</a></li>
                    <li><a data-toggle="tab" href="#menu1">Published</a></li>
                    <li><a data-toggle="tab" href="#menu2">Pending</a></li>
                    <li><a data-toggle="tab" href="#menu3">Rejected</a></li>
                </ul>

                <ul class="nav nav-pills nav-justified">
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="panel panel-primary">
                                <div class=" panel-heading">
                                    {{auth()->user()->name}} Dashboard
                                </div>
                                <div class="panel-body" >
                                    <div class="col-sm-3">
                                        <img class="img-responsive" src="/uploads/{{auth()->user()->avatar}}" alt="Avatar">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group text-right">
                                                <input id="changeAvatar" name="changeAvatar" type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-on="Enabled" data-off="Disabled">
                                        </div>
                                        <form id="avatarForm" method="POST" action="/home" enctype="multipart/form-data" style="display:none;">
                                            
                                            {{ csrf_field() }} @include('layouts.errors')
                                            <div class="form-group">
                                                <label for="avatar">Upload Profile Picture</label>
                                                <input type="file" name="avatar" id="avatar" class="form-control" />
                                            </div>
                                            <div class="form-group text-right">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div id="menu1" class="tab-pane fade">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    Projects
                                </div>
                                <div class="panel-body">
                                    @foreach ($projects as $project)
                                        <div class="card card-inverse card-info mb-3 text-left">
                                            <div class="card-block">
                                                <blockquote class="card-blockquote">
                                                <p>@include('projects.project')</p>
                                                
                                                </blockquote>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div id="menu2" class="tab-pane fade">
                            <div class="panel panel-warning">   
                                <div class="panel-heading">
                                    Pending Projects
                                </div>

                                <div class="panel-body">
                                    @if(count($pending_projects))
                                        @foreach ($pending_projects as $project)
                                            <div class="card card-inverse card-info mb-3 text-left">
                                                <div class="card-block">
                                                    <blockquote class="card-blockquote">
                                                    <p>@include('projects.project')</p>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div>
                                            <div class="card card-inverse card-info mb-3 text-center">
                                                <div class="card-block">
                                                    <blockquote class="card-blockquote">
                                                    <p>No Pending Projects</p>
                                                    <a class="btn btn-success" href="/projects/create"><i class="glyphicon glyphicon-plus" style="color:white;"></i>&nbsp Upload New Project</a>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                
                            </div>  
                        </div>

                        <div id="menu3" class="tab-pane fade">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    Rejected Projects
                                </div>
                                <div class="panel-body">
                                    @foreach ($rejected_projects as $project)
                                            <div class="card card-inverse card-info mb-3 text-left">
                                                <div class="card-block">
                                                    <blockquote class="card-blockquote">
                                                    <p>@include('projects.project')</p>
                                                    <div class="alert alert-danger">
                                                        <strong>Reasons for Rejection:</strong><br>
                                                        <p>{{$project->rejection_reasons}}</p>
                                                    </div>
                                                    </blockquote>
                                                </div>
                                            </div>
                                    @endforeach
                                </div>    
                            </div>
                        </div>
                    </div>

                </ul>
            
            <!--<div class="panel panel-default">
                <div class="panel-heading"><h4>Student Dashboard</h4></div>
               
                
                <div class="panel-body">
                <div class="panel panel-primary">
                    <div class=" panel-heading">
                        {{auth()->user()->name}}
                    </div>
                    <div class="panel-body" >
                        <div class="col-sm-3">
                            <img class="img-responsive" src="/uploads/{{auth()->user()->avatar}}" alt="Avatar">
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group text-right">
                                    <input id="changeAvatar" name="changeAvatar" type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-on="Enabled" data-off="Disabled">
                            </div>
                            <form id="avatarForm" method="POST" action="/home" enctype="multipart/form-data" style="display:none;">
                                
                                {{ csrf_field() }} @include('layouts.errors')
                                <div class="form-group">
                                    <label for="avatar">Upload Profile Picture</label>
                                    <input type="file" name="avatar" id="avatar" class="form-control" />
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                         
                    </div>
                </div>


                <div class="col-sm-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Projects
                        </div>
                        <div class="panel-body">
                            @foreach ($projects as $project)
                                <div class="card card-inverse card-info mb-3 text-left">
                                    <div class="card-block">
                                        <blockquote class="card-blockquote">
                                        <p>@include('projects.project')</p>
                                        
                                        </blockquote>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                 </div>

                 <div class="col-sm-6">
                    <div class="panel panel-warning">   
                        <div class="panel-heading">
                            Pending Projects
                        </div>

                        <div class="panel-body">
                            @if(count($pending_projects))
                                @foreach ($pending_projects as $project)
                                    <div class="card card-inverse card-info mb-3 text-left">
                                        <div class="card-block">
                                            <blockquote class="card-blockquote">
                                            <p>@include('projects.project')</p>
                                            </blockquote>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div>
                                    <div class="card card-inverse card-info mb-3 text-center">
                                        <div class="card-block">
                                            <blockquote class="card-blockquote">
                                            <p>No Pending Projects</p>
                                            <a class="btn btn-success" href="/projects/create"><i class="glyphicon glyphicon-plus" style="color:white;"></i>&nbsp Upload New Project</a>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                    </div>  
                    
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            Rejected Projects
                        </div>
                        <div class="panel-body">
                            @foreach ($rejected_projects as $project)
                                    <div class="card card-inverse card-info mb-3 text-left">
                                        <div class="card-block">
                                            <blockquote class="card-blockquote">
                                            <p>@include('projects.project')</p>
                                            <div class="alert alert-danger">
                                                <strong>Reasons for Rejection:</strong><br>
                                                <p>{{$project->rejection_reasons}}</p>
                                            </div>
                                            </blockquote>
                                        </div>
                                    </div>
                            @endforeach
                        </div>    
                    </div>
                 </div>
                   
                </div>
            </div>-->
        </div>
    </div>
</div>
@endsection
