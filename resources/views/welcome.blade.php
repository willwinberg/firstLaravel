@extends("layout")

@section("title", "Home")

@section("content")
    <h1>WELCOME {{$foo}}</h1>
    @foreach($tasks as $task)
    <li>{{$task}}</li>
    @endforeach
@endsection