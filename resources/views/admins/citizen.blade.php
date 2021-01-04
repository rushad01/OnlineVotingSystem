@extends('layouts.app')

@section('content')
<div class="container" role="alert">
    @if ('success')
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Citizen Information Updated!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
  </div>
<div class="container">
    @if (count($citizens) == 0)
    <div class="alert alert-danger" role="alert">
        There is no candidate in Database.
    </div>
    @else
    <div class="alert alert-dark" role="alert">
        Citizens Details
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
            @foreach ($citizens as $citizen)
            <tr>
                <td></td>
                <td>{{$citizen->name}}</td>
                <td>{{$citizen->email}}</td>
                <td>{{$citizen->birthday->format('j F, Y')}}</td>
                <td><a href="/admin/citizens/{{$citizen->id}}/editCitizen" class="btn btn-secondary btn-sm">Edit</a>
                    {!!Form::open() !!}<a href="#" class="btn btn-danger btn-sm ml-1">Delete</a>
                    {!!Form::close() !!}</td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
    @endif
</div>   
@endsection