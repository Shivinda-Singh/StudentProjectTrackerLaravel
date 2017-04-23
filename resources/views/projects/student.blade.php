@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{$student->name}}'s Profile
                    
                </div>

                <div class="panel-body">
                    <div class="col-sm-3">
                        <img class="img-responsive" src="/uploads/{{$student->avatar}}" alt="Avatar">
                    </div>
                    <div class="col-sm-9">
                        <h3>Collaborated Projects</h3>
                        <!--<div class="panel panel-default">
                            <div class="panel-heading">Collaborated Projects</div>
                            <div class="panel-body">
                                @foreach ($student->projects as $project)
                                    @include('projects.project')
                                @endforeach
                            </div>
                        </div>-->
                        @foreach ($student->projects as $project)
                                    @include('projects.project')
                                @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
