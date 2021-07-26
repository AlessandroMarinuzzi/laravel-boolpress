<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
</body>
</html>