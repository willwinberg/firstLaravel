@extends("layout")

@section("title", "Home")

@section("content")
<h1>WELCOME PGE</h1>
@if (session('message'))
<p>{{session('message')}}</p>
@endif

@endsection 