<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{

public function index()
{
    $posts = Post::all(); // Fetch all posts
    return view('posts.index', compact('posts')); // Return view with posts
}

public function create()
{
    return view('posts.create'); // Return form to create post
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'body' => 'required', // Use 'body' instead of 'content'
        'category_id' => 'required',
    ]);

    Post::create([
        'title' => $request->title,
        'body' => $request->body, // Use 'body' instead of 'content'
        'category_id' => $request->category_id,
    ]);

    return redirect()->route('posts.index')->with('status', 'Post created successfully!');
}


public function show(Post $post)
{
    $post = Post::findOrFail($id);
    return view('posts.show', compact('post')); // Return a single post
}

public function edit($id) {
    $post = Post::findOrFail($id); // Find the post to edit
    $categories = Category::all(); // Fetch all categories
    return view('posts.edit', compact('post', 'categories'));
}

public function update(Request $request, $id) {
    $request->validate([
        'title' => 'required',
        'body' => 'required',
        'category_id' => 'required',
    ]);

    $post = Post::findOrFail($id);
    $post->update($request->all()); // Update the post

    return redirect()->route('posts.index');
}


public function destroy(Post $post)
{
    $post->delete(); // Delete the post

    return redirect()->route('posts.index'); // Redirect to index page
}

}
