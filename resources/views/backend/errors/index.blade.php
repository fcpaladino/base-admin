@extends('backend.layouts.master')

@section('content')
    <div class="error-page">
        <h2 class="headline text-{{$cor}}">{{$code}}</h2>
        <div class="error-content">
            <h3>{{$error_title}}</h3>
            <p>{{$error_msg}}</p>
        </div>
    </div>

@endsection
