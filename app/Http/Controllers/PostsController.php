<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Log; 
use App\Http\Requests\PostsRequest;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewNotification;

class PostsController extends Controller
{
    public function store(PostsRequest $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'regex:/^[A-Z a-z 0-9 .,!?]+$/i', 'string', 'max:255'],
            'text' => ['required', 'regex:/^[A-Z a-z 0-9 .,!?]+$/i', 'string', 'max:255'],
        ]);

        $data = $request->validated();

        $user = auth()->user();

        $post = new Posts();
        $post->title = $data['title'];
        $post->text = $data['text'];

        // Associate the post with the authenticated user
        $user->posts()->save($post);
        return redirect()->route('posts.index')->with('success', 'Announce added successfully');


    }
    public function index(): View
    {
        $posts = Posts::latest()->get();

        return view('posts.index', compact('posts'));
    }
    public function show($id)
    {
        $post = Posts::findOrFail($id);

        return view('posts.show', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function destroy(string $id)
    {
        $post = Posts::findOrFail($id);
  
        $post->delete();
  
        return redirect()->route('posts.index')->with('success', 'announce deleted successfully');
    }

}