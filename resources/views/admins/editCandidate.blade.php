@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(['action' => ['App\Http\Controllers\AdminController@updateCandidate',$candidate->id],'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Full Name')}}
        {{Form::text('name',$candidate->name,['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('email', 'Email')}}
        {{Form::email('email',$candidate->email,['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('birthday', 'Bithday')}}
        {{Form::date('birthday',$candidate->birthday,['class' => 'form-control'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Update',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>

@endsection