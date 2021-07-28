<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validateData = $request->validate([
            'title' => 'required | min:5 | max:255',
            'image' => 'nullable',
            'body' => 'required',
            'author' => 'required',
            'category_id' => 'nullable | exists:categories,id',
            'tags' => 'nullable | exists:tags,id'
        ]);
        // ddd($validateData);

            $file_path = Storage::put('post_images', $validateData['image']);
            $validateData['image'] = $file_path;
        

        $post = Post::create($validateData);
        $post -> tags()->attach($request->tags);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.posts.edit', compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validateData = $request->validate([
            'title' => 'required | max:255 | min:5',
            'image' => 'nullable',
            'body' => 'required',
            'author' => 'required',
            'category_id' => 'nullable | exists:categories,id'
        ]);

        

        
            $file_path = Storage::put('post_images', $validateData['image']);
            $validateData['image'] = $file_path;
        

        $post->update($validateData);
        $post->tags()->sync($request->tags);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {   
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
