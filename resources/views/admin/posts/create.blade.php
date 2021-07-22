@extends('layouts.admin')

@section('title','Boolpress|New Post')

@section('content')
<div class="container">
    <h1>Add New Post</h1>
    <form class="add_post_form" action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        <div class="form-group d-flex flex-column">
            <label for="title">Title</label>
            <input name="title" id="title" placeholder="Insert Title" value="{{old('title')}}" required minlength="5" maxlength="255"></input>
            <small id="helpId">Insert Title</small>
        </div>
        <div class="form-group d-flex flex-column">
            <label for="body">Body</label>
            <textarea name="body" id="body" rows="5" required>{{old('body')}}</textarea>
            <small id="helpId">Insert Post Body</small>
        </div>
        <div class="form-group d-flex flex-column">
            <label for="author">Author</label>
            <input type="text" name="author" id="author" placeholder="Insert author Full Name" aria-describedby="author" value="{{old('author')}}" required>
            <small id="author">Type Author Name</small>
        </div>
        <button type="submit" class="btn btn-primary text-white">Generate</button>
        <button class="btn btn-primary"><a class="text-white" href="{{route('admin.posts.index')}}">Back to Posts</a></button>
    </form>
</div>
@endsection