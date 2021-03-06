@extends('layouts.app')

@section('title','Single Post Page')

@section('content')
    <div class="container">
        <div class="post_card p-2">
            <h2 class="post_title">{{$post->title}}</h2>
            <h5 class="category">
                <a href="{{route('categories.show', $post->category->slug)}}">Category: {{$post->category ? $post->category->name : 'Uncategorized'}}</a>
            </h5>
            <div class="tags">
                @forelse($post->tags as $tag)
                <span>{{$tag->name}}</span>
                @empty
                <span>Tags not assigned yet.</span>
                @endforelse
            </div>
            <img class="cover" src="{{asset('storage/' . $post->image)}}" width="300" alt="{{$post->title}}">
            <p class="post_body">{{$post->body}}</p>
            <h5 class="post_author">{{$post->author}}</h5>
        </div>
        <button class="btn btn-primary mt-3"><a class="text-white" href="{{route('posts.index')}}">Back to Posts</a></button>
    </div>
@endsection