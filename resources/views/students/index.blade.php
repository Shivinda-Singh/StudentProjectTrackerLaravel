@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" href="/projects/create">Upload New Project</a>
            
            <div class="panel panel-default">
                <div class="panel-heading">Student Dashboard</div>

                <div class="panel-body">
                    <h1>Published Projects</h1> 
                    @foreach ($projects as $project)
                        @include('projects.project')
                    @endforeach
                    <h1>Pending</h1>
                    @foreach ($pending_projects as $project)
                        @include('projects.project')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
