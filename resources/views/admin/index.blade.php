@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Admin Dashboard</h4></div>

                <div class="panel-body">
                    @if(count($pending_projects))
                    <h2 class="text-center" style="margin-bottom:22px;">Submissions Pending Approval</h2>
                    @foreach ($pending_projects as $project)
                        <div class="panel panel-default">
                        
                            <h2 class="panel-heading" style="margin-top: 11px;"><a href="/admin/review/{{$project->id}}">{{$project->name}}</a>
                            <span class="badge badge-pill badge-default" style="float:right;">Published on {{$project->created_at->toFormattedDateString()}}</span></h2>

                            <p class="panel-body">{{$project->description}}</p>
                            <!--<p class="panel-footer" style="margin:auto 0;">Published on {{$project->created_at->toFormattedDateString()}}</p>-->
                        </div>
                    @endforeach
                    @else
                    <h2 class="text-center" style="margin-bottom:22px;">No Pending Projects</h2>
                    @endif

                </div>

            </div>
        </div>
    </div>
</div>
@endsection