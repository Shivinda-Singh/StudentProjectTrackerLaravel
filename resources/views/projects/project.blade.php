<div class="blog-post">
    <h2 class="blog-post-title"><a href="/projects/{{$project->id}}">{{$project->name}}</a></h2>
    <p class="blog-post-meta">{{$project->created_at->toFormattedDateString()}} by <a href="#">user_name</a></p>
    <p>{{$project->description}}</p>
</div>