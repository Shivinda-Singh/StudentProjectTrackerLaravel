@extends('layouts.master') 
@section('content')


<div class="col-sm-8 blog-main">
    <div class="blog-header">
        <div class="container">
        <h1 class="blog-title">Projects</h1>
        <p class="lead blog-description">A directory for student of projects</p>
        </div>
    </div>
    @foreach ($projects as $project)
        @include('projects.project')
    @endforeach
    

    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>

</div>
 @include('layouts.sidebar')

@endsection

