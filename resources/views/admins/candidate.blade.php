@extends('layouts.app')

@section('content')
<div class="container" role="alert">
    @if ('success')
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Candidate Information Updated!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
  </div>
<div class="container">
    @if (count($candidates) == 0)
    <div class="alert alert-danger" role="alert">
        There is no candidate in Database.
    </div>
    @else
    <div class="alert alert-dark" role="alert">
        Candidate Details
      </div>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        
        <tbody>
            @foreach ($candidates as $candidate)
            <tr>
                <td></td>
                <td>{{$candidate->name}}</td>
                <td>{{$candidate->email}}</td>
                <td>{{$candidate->birthday->format('j F, Y')}}</td>
                <td><a href="/admin/candidates/{{$candidate->id}}/editCandidate" class="btn btn-secondary btn-sm">Edit</a><a href="#" class="btn btn-danger btn-sm ml-1">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
    @endif
</div>   
@endsection