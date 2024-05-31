<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => 'required|min:5|max:150|unique:posts,title',
                'content' => 'nullable|min:10'
            ]
        );

        $formData = $request->all();
        // $formData['slug'] = Str::slug($formData['title'], '-');
        // dd($formData);

        $newPost = new Post();
        $newPost->fill($formData);
        $newPost->slug = Str::slug($newPost->title, '-');
        $newPost->save();

        return redirect()->route('admin.posts.show', ['post' => $newPost->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate(
            [
                'title' => [
                    'required',
                    'min:5',
                    'max:150',
                    // 'unique:posts,title'
                    Rule::unique('posts')->ignore($post)
                ],
                'content' => 'nullable|min:10'
            ]
        );

        // Utilizzo ancora il validator

        $formData = $request->all();
        // $formData['slug'] = Str::slug($formData['title'], '-');
        $post->slug = Str::slug($formData['title'], '-');
        $post->update($formData);

        return redirect()->route('admin.posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
