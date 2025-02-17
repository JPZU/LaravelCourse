@extends('layouts.app')

@section('title', $title)
@section('subtitle', $subtitle)

@section('content')

<div class="container">

    <ul class="list-group text-center">
        <li class="list-group">{{$email}}</li>
        <li class="list-group">{{$address}}</li>
        <li class="list-group">{{$phone}}</li>
        <li class="list-group">{{$author}}</li>
    </ul>

</div>

@endsection