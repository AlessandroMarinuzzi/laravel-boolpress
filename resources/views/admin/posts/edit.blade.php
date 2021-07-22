@extends('layouts.admin')

@section('title','Boolpress|Edit Post')

@section('content')
<div class="container">
    <h1>Edit Post</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="add_post_form" action="{{route('admin.posts.update', $post->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group d-flex flex-column">
            <label for="title">Title</label>
            <input name="title" id="title" placeholder="Insert Title" value="{{$post->title}}" required minlength="5" maxlength="255"></input>
            <small id="helpId">Insert Title</small>
        </div>
        <div class="form-group d-flex flex-column">
            <label for="body">Body</label>
            <textarea name="body" id="body" rows="5" required>{{$post->title}}</textarea>
            <small id="helpId">Insert Post Body</small>
        </div>
        <div class="form-group d-flex flex-column">
            <label for="author">author</label>
            <input type="text" name="author" id="author" placeholder="Insert author Full Name" aria-describedby="author" value="{{$post->author}}" required>
            <small id="author">Type Author Name</small>
        </div>
        <button type="submit" class="btn btn-primary text-white">Generate</button>
    </form>
</div>
@endsection