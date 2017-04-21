@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{$student->name}}'s Profile
                    <div class="col-sm-3">
                        <img class="img-responsive" src="../public/uploads/{{$student->avatar}}" alt="Avatar">
                    </div>
                </div>

                <div class="panel-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
