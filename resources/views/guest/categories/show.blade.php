extends('layouts.app')

@section('content')
<section class="posts-category container">
    <h1>Posts in {{$category->name}}</h1>

    @forelse($category->posts as $post)
    <div class="card">
        <img src="{{$post->image}}" alt="{{$post->title}}" class="card-img-top">
        <div class="card-body">
            <h4 class="card-title">{{$post->title}}</h4>
            <p class="card-text">{{$post->body}}</p>
        </div>
    </div>
    @empty
    <h3>Nothing to show</h3>
    @endforelse
</section>

@stop