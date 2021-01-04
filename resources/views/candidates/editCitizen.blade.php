@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(['action' => ['App\Http\Controllers\CandidateController@updateCitizen',$citizen->id],'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Full Name')}}
        {{Form::text('name',$citizen->name,['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('email', 'Email')}}
        {{Form::email('email',$citizen->email,['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('birthday', 'Bithday')}}
        {{Form::date('birthday',$citizen->birthday,['class' => 'form-control'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Update',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>

@endsection