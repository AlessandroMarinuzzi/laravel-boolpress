@extends('layouts.app')

@section('content')
<h1>bella</h1>
<div class="container d-flex flex-wrap">
    <div class="card text-left col-md-3 m-1" v-for="post in posts">
        <img class="card-img-top" width="100" :src="'storage/' + post.image" alt="">
        <div class="card-body">
            <h2 class="card-title">@{{post.title}}</h2>
            <p class="card-text">@{{post.body}}</p>
            <h5 class="post_author">@{{post.author}}</h5>
            <h5 class="post_category">@{{post.category.name}}</h5>
        </div>
    </div>
</div>
@endsection
