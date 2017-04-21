@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            
            <div class="panel panel-default">
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
                <div class="col-sm-12 text-right">
                        <a class="btn btn-success" href="/projects/create"><i class="glyphicon glyphicon-plus" style="color:white;"></i>&nbsp Upload New Project</a>
                </div>
                <div class="col-sm-6 panel panel-default">
                    <h3 class="alert alert-success">Published Projects</h3> 
                    @foreach ($projects as $project)
                        <div class="card card-inverse card-info mb-3 text-left">
                            <div class="card-block">
                                <blockquote class="card-blockquote">
                                <p>@include('projects.project')</p>
                                <!--<footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>-->
                                </blockquote>
                            </div>
                        </div>
                    @endforeach
                 </div>
                 <div class="col-sm-6 panel panel-default">   
                    <h3 class="alert alert-warning">Pending Projects</h3> 
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
                            <h3><u>No Pending Projects</u></h3>
                        </div>
                    @endif
                </div>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
