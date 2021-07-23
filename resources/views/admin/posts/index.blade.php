@extends('layouts.admin')

@section('content')

<div class="container table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>TITLE</th>
                <th>BODY</th>
                <th>AUTHOR</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>
                    <img class="w-50" src="{{asset($post->image)}}" alt="{{$post->title}}">
                </td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->author}}</td>
                <td>
                    <a href="{{route('admin.posts.show', $post)}}">View</a> 
                    <a href="{{route('admin.posts.edit',$post->id)}}">Edit</a>
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method("DELETE")

                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <button class="btn btn-primary mt-3"><a class="text-white" href="{{route('admin.posts.create')}}">Add New Post</a></button>
</div>

@endsection