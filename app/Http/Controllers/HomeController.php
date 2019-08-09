<?php

namespace App\Http\Controllers;

use Auth;
use App\Tag;
use App\Post;
use App\Email;
use App\About;
use App\Comments;
use App\Category;
use Illuminate\Http\Request;


class HomeController extends Controller
{
 
    // public function __construct()
    // {
    //   $this->middleware('auth');
    // }

   
    public function index()
    {
        $posts = Post::orderBy('date','desc')->paginate(4);
        return view('main.index',[
            'posts' => $posts
        ]);    
    }
    public function about()
    {   
        $abouts = About::all();
        return view('main.about',[  
            'abouts' => $abouts,
        ]);
    }
    public function single($slug)
    {
        $post = Post::where('slug',$slug)->firstOrFail();
        return view('main.single', compact('post'));
    }
    public function store(Request $request)
    {
        $comment = new Comments;
        $comment->post_id = $request->get('post_id');
        $comment->text = $request->get('text');
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->save();

        return redirect()->back();
    }
    public function email(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email'
        ]);

        $email = new Email;
        $email->email = $request->email;
        $email->save();
        return redirect()->back()->with('status','Your email send!');

    }
    public function category($slug)
    {
       
        $category = Category::where('slug', $slug)->firstorFail();
        //$posts = \App\Post::where('category_id', $category->id)->orderBy
       
        $posts = $category->posts()->paginate(2);

        return view('main.list',[
            'posts' => $posts,
            'slug' =>$slug, 
            'category'=> $category
        ]);
    }
     public function tag($slug)
    {
        
        $tag = Tag::where('slug', $slug)->firstorFail();
        $posts = $tag->posts()->paginate(3);

        return view('main.list',[
            'posts' => $posts,
            'slug'  => $slug,
                  
        ]);
    }
}
