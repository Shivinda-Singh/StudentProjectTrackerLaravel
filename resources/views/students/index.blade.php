@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" href="/projects/create">Upload New Project</a>
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Student Dashboard</h4></div>

                <div class="panel-body">
                <div class="col-md-6 panel panel-default">
                    <h1>Published Projects</h1> 
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
                 <div class="col-md-6 panel panel-default">   
                    <h1>Pending Projects</h1>
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
