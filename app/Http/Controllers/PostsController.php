<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\post_tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $posts = Post::with(["tags", "category"])->paginate(6);
        return  view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $tags = Tag::get();
        return view('posts.create', compact('categories', 'tags') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        

        $request -> validate([
            'title' => ["required"],
            'category_id' => ["required", "integer", "exists:categories,id"],
            'content' => ["required"],
            "img_path" => ["required", "image"]
        ]);
        $imgPath = $request->img_path->store("posts");
        
        $post = Post::create([
            "title" => $request->title,
            "slug" => Str::slug($request->title),
            "category_id" => $request->category_id,
            "content" => $request->content,
            "img_path" => $imgPath,
        ]);
        $post->tags()->sync($request->tags);
        return redirect() -> route('posts.index') -> with('success', 'Post created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
      
        $tags = Tag::get();
        $categories = Category::get();
         $posts_tags = post_tag::get();

            return view('posts.edit', compact('post', 'tags', 'categories', 'posts_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        

        $request -> validate([
            'title' => 'required',
            'slug' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'img_path' => 'required'
            ]);

            $imgPath = $request->img_path->store("posts");

            $post-> title = $request->title;
            $post-> slug = Str::slug($request->title);
            $post->category_id = $request->category_id;
            $post->content = $request->content;
            $post-> img_path  = $imgPath;

            $post->save();

        $post->tags()->sync($request->tags);

        dd($post);

        return redirect()-> route('posts.index') -> with('sucess', 'Post updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        $post->delete();
        return redirect()->route('posts.index')
            ->with('success','Product deleted successfully');
    }
}
