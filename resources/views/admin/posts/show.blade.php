@extends('layouts.admin')

@section('title','Single Post Page')

@section('content')
    <div class="container">
        <div class="post_card p-2">
            <h2 class="post_title">{{$post->title}}</h2>
            <p class="post_body">{{$post->body}}</p>
            <h5 class="post_author">{{$post->author}}</h5>
        </div>
        <button class="btn btn-primary mt-3"><a class="text-white" href="">Edit</a></button>
    </div>
@endsection