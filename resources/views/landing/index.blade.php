@extends('landing.layouts.default')
@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h2 class="mb-3">Start using the app</h2>
        <div>
            <a href="/login" class="btn btn-primary btn-block mb-3">Log in</a>
            <p>Not a user? <a href="/register">Register here</a></p>
        </div>
    </div>
@stop
