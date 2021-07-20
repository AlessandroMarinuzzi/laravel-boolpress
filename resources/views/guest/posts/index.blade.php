@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-4">
                <div class="post_card p-2">
                    <h2 class="post_title">{{$post->title}}</h2>
                    <p class="post_body">{{$post->body}}</p>
                    <h5 class="post_author">{{$post->author}}</h5>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection