
<div class="panel panel-default">
    <h2 class="panel-heading" style="margin-top: 11px;"><a href="/projects/{{$project->id}}">{{$project->name}}</a><span class="badge badge-pill badge-default" style="float:right;">Published on {{$project->created_at->toFormattedDateString()}}</span></h2>
    <p> </p>
    <p class="panel-body">
        {{substr($project->description,0,50)}}

<div class="">
    <h2 class=""><a href="/projects/{{$project->id}}">{{$project->name}}</a></h2>
    <p class="blog-post-meta">Published on {{$project->created_at->toFormattedDateString()}} </p>
    <p>
        Description: {{substr($project->description,0,50)}}

        {{strlen($project->description)>50 ? "..." : ""}}
    </p>
</div>

