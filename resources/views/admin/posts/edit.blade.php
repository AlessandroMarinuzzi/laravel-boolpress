@extends('layouts.admin')

@section('title','Boolpress|Edit Post')

@section('content')
<div class="container">
    <h1>Edit Post</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="add_post_form" action="{{route('admin.posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group d-flex flex-column">
            <label for="title">Title</label>
            <input name="title" id="title" placeholder="Insert Title" value="{{$post->title}}" required minlength="5" maxlength="255">
            <small id="helpId">Insert Title</small>
        </div>

        <div class="form-group d-flex flex-column">
            <!-- <label for="image">Image</label>
            <input name="image" id="image" placeholder="Insert image" value="{{$post->image}}" required></input>
            <small id="helpId">Insert Image</small> -->
            <label for="image">Image</label>
            <input type="file" name="image" id="image">
        </div>

        <div class="cover">
            <img src="{{asset('storage/' . $post->image)}}" width="300" alt="{{$post->title}}">
        </div>

        <div class="form-group d-flex flex-column">
            <label for="body">Body</label>
            <textarea name="body" id="body" rows="5" required>{{$post->title}}</textarea>
            <small id="helpId">Insert Post Body</small>
        </div>
        <div class="form-group d-flex flex-column">
            <label for="author">author</label>
            <input type="text" name="author" id="author" placeholder="Insert author Full Name" aria-describedby="author" value="{{$post->author}}" required>
            <small id="author">Type Author Name</small>
        </div>

        <div class="form-group">
            <label for="category_id">Categories</label>
            <select class="form-control" name="category_id" id="category_id">
                <option selected value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$category->id == old('category_id',$post->category_id)  ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tags">Tags:</label>
            <select multiple name="tags[]" id="tags" class="form-control">
                <option disabled value="">Select Tags</option>
                @if($tags)
                    @foreach($tags as $tag)
                        @if($errors->any())
                            <option value="{{$tag->id}}" {{in_array($tag->id, old('tags')) ? 'selected' : " "}}>{{$tag->name}}</option>
                        @else
                            <option value="{{$tag->id}}" {{$post->tags->contains($tag) ? 'selcted' : " "}}>{{$tag->name}}</option>
                        @endif
                    @endforeach
                @endif
            </select>
        </div>

        <button type="submit" class="btn btn-primary text-white">Generate</button>
    </form>
</div>
@endsection