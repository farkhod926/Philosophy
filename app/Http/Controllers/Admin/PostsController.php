<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        // $count = Post::get('count');
        return view('admin.posts.index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id')->all();
        $tags = Tag::pluck('title','id')->all();
        return view('admin.posts.create', compact(
            'categories',
            'tags'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public  function store(Request $request)
    {
        $this->validate($request,[
          'title'=>'required',
          'content'=>'required',
          'image'=>'nullable|image',
          'date'=>'required'
        ]);
        $post = Post::add($request->all());
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $filename = str_random(60).'.'. $file->extension();
        //     $file->move(public_path('uploads/images'), $filename);        
        //     $post->image = $filename;
        // }
        $post->uploadImage($request->file('image'));
        $post->uploadPicture($request->file('picture'));
        $post->uploadFile($request->file('file'));
        $post->setCategory($request->get('category_id'));
        $post->setTags($request->get('tags'));
        $post->toggleStatus($request->get('status'));
        $post->toggleFeatured($request->get('is_featured'));

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::pluck('name','id')->all();
        $tags = Tag::pluck('title','id')->all();
        $selectedTags = $post->tags->pluck('id')->all();
        return view('admin.posts.edit', compact(
             'categories',
             'tags',
             'post',
             'selectedTags'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
          'title'=>'required',
          'content'=>'required',
          'image'=>'nullable|image',
          'date'=>'required'
        ]);
        $post = Post::find($id);
        $post->edit($request->all());
        $post->uploadImage($request->file('image'));
        $post->uploadPicture($request->file('picture'));
        $post->setCategory($request->get('category_id'));
        $post->setTags($request->get('tags'));
        $post->toggleStatus($request->get('status'));
        $post->toggleFeatured($request->get('is_featured'));

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->route('posts.index');
    }
}
