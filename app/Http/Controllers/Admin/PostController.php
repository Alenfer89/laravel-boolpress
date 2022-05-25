<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('admin.posts.index' , ['posts'=> $posts]);
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
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $randomInt = rand(1, 100);
        $data['slug'] = Str::slug($data['title'], "-") ."-". ($randomInt);

        $newPost = new Post();
        $newPost->user_id = $data['user_id'];
        $newPost->title = $data['title'];
        $newPost->content = $data['content'];
        $newPost->image_url = $data['image_url'];
        $newPost->slug = $data['slug'];
        $newPost->save();

        return redirect()->route('admin.posts.index')->with('message', "$newPost->title post correctly");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $totalPosts = count(Post::pluck('id')->toArray());
        return view('admin.posts.show', ['post' => $post , 'totalPosts' => $totalPosts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
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
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $randomInt = rand(1, 100);
        $data['slug'] = Str::slug($data['title'], "-") ."-". ($randomInt);

        $post->user_id = $data['user_id'];
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->image_url = $data['image_url'];
        $post->slug = $data['slug'];
        $post->save();

        return redirect()->route('admin.posts.show', ['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //$post->user()->delete();
        $post->delete();

        return redirect()->route('admin.posts.index')->with('remove-message', 'Your post has been successfully removed');
    }
}
