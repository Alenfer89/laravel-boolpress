<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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
        $posts = Post::orderBy('id', 'desc')->paginate(20);
        foreach ($posts as $post) {
            $post->funnyDate = null;
            $funnyDate = Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->locale('en')->isoFormat('dddd, Do MMMM YYYY');
            $post->funnyDate = $funnyDate;
        }
        $totalPosts = count(Post::pluck('id')->toArray());

        return view('admin.posts.index' , ['posts'=> $posts, 'totalPosts' => $totalPosts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required|min:20',
                'category' => 'required'
            ],
            [
                'required' => ':attribute is required',
                'min' => ':attribute should have at least :min characters'
            ]
        );

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $randomInt = rand(1, 100);
        $data['slug'] = Str::slug($data['title'], "-") ."-". ($randomInt);

        $newPost = new Post();
        $newPost->user_id = $data['user_id'];
        $newPost->title = $data['title'];
        $newPost->content = $data['content'];
        $newPost->image_url = Storage::put('uploads', $data['image']);
        $newPost->slug = $data['slug'];
        $newPost->save();
        
        $newPost->categories()->attach($data['category']);
        

        return redirect()->route('admin.posts.index')->with('message', "$newPost->title post correctly");

    }

    /**
     * Display the specified resource.
     *
     * @param  Post(Model) $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $totalPosts = count(Post::pluck('id')->toArray());
        $postDay = Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->locale('en')->isoFormat('dddd, Do MMMM YYYY');
        $postTime = Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('H:i');
        return view('admin.posts.show', ['post' => $post , 'totalPosts' => $totalPosts, 'postDay' => $postDay, 'postTime' => $postTime]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post(Model) $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post(Model) $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required|min:20',
                'category' => 'required'
            ],
            [
                'required' => ':attribute is required',
                'min' => ':attribute should have at least :min characters'
            ]
        );

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
        $post->categories()->sync($data['category']);

        return redirect()->route('admin.posts.show', ['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post(Model) $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //$post->user()->delete();
        //$deletedPost = $post;
        $post->delete();
        //$posts = Post::orderBy('id', 'desc')->paginate(10);

        return redirect()->route('admin.posts.index')->with('remove-message', 'Your post has been successfully removed');
    }
}
