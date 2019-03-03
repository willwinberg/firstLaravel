@extends('layout')

@section('content')
<h1>Create new Project</h1>
<form method="POST" action="/projects">
    {{ csrf_field() }}
    <div>
        <input class="
               textarea
               {{ $errors->has('title') ? 'is-danger' : ''}}
            " value="{{ old('title') }}" type="text" name="title" placeholder="Project Title" required>
        <div>
            <textarea class="
                  textarea
                  {{ $errors->has('title') ? 'is-danger' : ''}}
               " type="text" name="description" placeholder="Project
               Description" required>{{ old('description') }}</textarea>
        </div>
        <div>
            <button type="submit">Press</button>
        </div>
        @include ('errors')
        <!-- @if ($errors->any())
        <div class="notification is-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif -->
</form>
@endsection 