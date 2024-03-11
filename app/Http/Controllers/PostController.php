<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::whereNull('deleted_at')->get();
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'creator' => 'required'
        ]);
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->created_by = $request->creator;
        $post->save();
        return $this->getResponse('success', __('Post created successfully'));
        // return to_route('index')->with('success', 'Post created successfully');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->update();
        return $this->getResponse('success', __('Post updated successfully'));
    }

    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->deleted_at = now();
        $post->update();
        // $post->delete();
        return $this->getResponse('success', __('Post deleted successfully'));
    }

    function getResponse(string $status, string|null $message = null, array|null $data = null, int|null $status_code = null): JsonResponse
    {
        return match ($status) {
            'json_success', 'success' => response()->json([
                'status' => 'success',
                'text' => $message,
                'msg_data' => $data,
            ], !empty($status_code) ? $status_code : 200),
            default => response()->json([
                'status' => 'error',
                'text' => $message,
                'msg_data' => $data,
            ], !empty($status_code) ? $status_code : 422),
        };
    }
}