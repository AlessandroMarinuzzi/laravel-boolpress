@extends('layouts.admin')

@section('title','Single Post Page')

@section('content')
    <div class="container">
        <div class="post_card p-2">
            <h2 class="post_title">{{$post->title}}</h2>
            <img src="{{asset($post->image)}}" alt="{{$post->title}}">
            <p class="post_body">{{$post->body}}</p>
            <h5 class="post_author">{{$post->author}}</h5>
        </div>
        <button class="btn btn-primary mt-3"><a class="text-white" href="{{route('admin.posts.edit',$post->id)}}">Edit</a></button>
        <button class="btn btn-primary mt-3"><a class="text-white" href="{{route('admin.posts.index')}}">Back to Posts</a></button>
            <form class="mt-4" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method("DELETE")

                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
    </div>
@endsection