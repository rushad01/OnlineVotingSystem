@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container justify-content-center">
        <a href="/admin/candidates" class="btn btn-default">Candidate</a>
        <a href="/admin/citizens" class="btn btn-default">Citizens</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="card-text"><strong>Full Name:</strong>{{Auth::user()->name}}</p>
                    <hr>
                    <p class="card-text"><strong>Email: </strong> {{Auth::user()->email}}</p>
                    <hr>
                    <p class="card-text"><strong> Birthday:  </strong> {{Auth::user()->birthday->format('j F, Y')}}</p>
                    <hr>
                    <p class="card-text"><strong>Type:  </strong> {{Auth::user()->type}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
