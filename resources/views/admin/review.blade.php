@extends('layouts.master')

@section('content')

    <div class="col-sm-12">
        @include('projects.details');
        <form method="POST" action="/admin/update/{{$project->id}}">
            {{ csrf_field() }}

            <div class="form-group">
                <input id="review" name="review" type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-on="Enabled" data-off="Disabled">
            </div>

            <div class="form-group" id="reject_reasons" style="display: none;">
                <label for="rejection_reasons">Reasons for Rejection</label>
                <textarea class="form-control" id="rejection_reasons" name="rejection_reasons" rows="3"></textarea>
            </div>

            <div class="form-group text-right">
                 <button type="submit" class="btn btn-primary">Submit</button><br>
                <small id="submitHelp" class="form-text text-muted">Use the toggle above to approve or reject this project submission</small>
            </div>

            <!--<input id="project_id" name="project_id" value="{{$project->id}}"type="text" style="display: none;">-->
        </form>
    </div>


@endsection

