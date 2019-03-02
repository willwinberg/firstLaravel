@extends('layout')

@section('content')
<h1 class="title">Edit Project</h1>

<form method="POST" action="/projects/{{ $project->id }}">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}

    <div class="field">
        <label class="label" for="title">Title</label>
        <div class="control">
            <input type="text" class="input" name="title" placeholder="Project Title" value={{ $project->title }}>
        </div>
    </div>
    <div class="field">
        <label class="label" for="description">Description</label>
        <div class="control">
            <textarea type="text" class="textarea" name="description" placeholder="Project Description">{{ $project->description }}</textarea>
        </div>
    </div>
    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link">Update</button>
        </div>
    </div>
</form>
<form method="POST" action="/projects/{{ $project->id }}">
    {{ method_field('DELETE') }}
    <!-- @method('DELETE') -->
    {{ csrf_field() }}
    <!-- @csrf -->

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link">Delete</button>
        </div>
    </div>
</form>
@endsection 