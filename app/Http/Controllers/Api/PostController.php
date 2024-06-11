<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        // $posts = Post::all();
        $posts = Post::with('category', 'tags')->paginate(3);
        // dd($posts);

        return response()->json([
            'success' => true,
            'results' => $posts
        ]);
    }

    public function show($slug) {
        $post = Post::where('slug', '=', $slug)->with('category', 'tags')->first();
        
        if($post) {
            $data = [
                'success' => true,
                'post' => $post
            ];
        } else {
            $data = [
                'success' => false,
                'error' => 'No post found with this slug'
            ];
        }

        return response()->json($data);
    }
}
