@extends('layouts.admin')

@section('title','Boolpress|New Post')

@section('content')
<div class="container">
    <h1>Add New Post</h1>
    <form class="add_post_form" action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" id="title" placeholder="Insert Title"></input>
            <small id="helpId">Insert Title</small>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" rows="5"></textarea>
            <small id="helpId">Insert Post Body</small>
        </div>
        <div class="form-group">
            <label for="author">author</label>
            <input type="text" name="author" id="author" placeholder="Insert author Full Name" aria-describedby="author">
            <small id="author">Type Author Name</small>
        </div>
        <button type="submit" class="btn btn-primary text-white">Generate</button>
    </form>
</div>
@endsection