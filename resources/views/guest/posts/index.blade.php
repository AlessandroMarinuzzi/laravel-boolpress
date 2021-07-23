@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Read all posts</h1>
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-4">
                <div class="post_card p-2 border border-primary my-2" >
                    <img class="w-100" src="{{asset($post->image)}}" alt="{{$post->title}}">
                    <h2 class="post_title">{{$post->title}}</h2>
                    <p class="post_body">{{$post->body}}</p>
                    <h5 class="post_author">{{$post->author}}</h5>
                    <button class="btn btn-primary"><a href="{{route('posts.show', $post->id)}}" class="text-white">View Post</a></button>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection