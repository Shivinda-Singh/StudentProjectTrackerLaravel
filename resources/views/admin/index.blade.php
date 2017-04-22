@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    
                    @if(count($pending_projects))
                         <h3 class="alert alert-warning">Pending Projects</h3> 
                        @foreach ($pending_projects as $project)
                                <div class="card card-inverse card-info mb-3 text-left">
                                    <div class="card-block">
                                        <blockquote class="card-blockquote">
                                            <div>
                                                <h2><a href="/admin/review/{{$project->id}}">{{$project->name}}</a></h2>
                                                <p>Published on {{$project->created_at->toFormattedDateString()}}</p>
                                                <p>{{$project->description}}</p>
                                            </div>
                                        </blockquote>
                                    </div>
                                </div>
                        @endforeach
                       
                    @else
                    
                        <h1>no pending projects</h1>
                    @endif
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
