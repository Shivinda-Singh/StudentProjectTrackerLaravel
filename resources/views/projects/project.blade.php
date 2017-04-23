<div class="panel panel-default">
    <div class="panel-heading">
        <h2><a href="/projects/{{$project->id}}">{{$project->name}}</a></h2>
        <p class="" style="color:grey;">Published on {{$project->created_at->toFormattedDateString()}}</p>
    </div>
    

    <p class="panel-body">
    
        Description: {{substr($project->description,0,50)}}

        {{strlen($project->description)>50 ? "..." : ""}}
    </p>
    </div>