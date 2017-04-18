@extends('layouts.master')

@section('content')

    <!--Starts here-->

    <div class="container">
      <div class="row">
      <!--<div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           <A href="edit.html" >Edit Profile</A>

        <A href="edit.html" >Logout</A>
       <br>
<p class=" text-info">May 05,2014,03:00 pm </p>
      </div>-->
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2 toppad" >

          <div class="panel panel-info">
            <div class="panel-heading">
              <h2>{{$project->name}}</h2>
               <p class="blog-post-meta">{{$project->created_at}} by <a href="#">{{ Auth::user()->name }}</a></p>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Description</td>
                        <td>{{$project->description}}</td>
                      </tr>
                      <tr>
                        <td>Course Code</td>
                        <td>{{$project->course_code}}</td>
                      </tr>
                      <tr>
                        <td>Year</td>
                        <td>{{$project->year}}</td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Collaborators</td>
                        <td>{{$project->collaborators}}</td>
                      </tr>
                        <tr>
                        <td>Github Link</td>
                        <td><a href="#">{{$project->github}}</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="panel-footer">
                <!--<a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                <span class="pull-right">
                    <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                    <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                </span>-->
            </div>
            <!-- /.blog-post -->
            <div class="card">
                <div class="card-block">
                    <form method="POST" action="/projects/{{$project->id}}/comments">
                        {{ csrf_field() }}
                        @include('layouts.errors')
                        <div class="form-group">
                            <textarea name="body" id="body" placeholder="Drop a comment" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Comment</button>
                        </div>
                    </form>
                </div>
                <div class="comments">
                <list-group>
                    @foreach($project->comments as $comment)
                        
                        <li  class="list-group-item">
                            <strong>{{ $comment->created_at->diffForHumans() }}: &nbsp </strong>
                            {{ $comment->body }}
                        </li>
                    @endforeach
                </list-group>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
