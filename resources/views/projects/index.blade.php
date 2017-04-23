@extends('layouts.master') 
@section('content')


<div class="col-sm-8">
    <h2>Projects</h2>
    @foreach ($projects as $project)
        @include('projects.project')
    @endforeach
    

</div>
 @include('layouts.sidebar')

@endsection

