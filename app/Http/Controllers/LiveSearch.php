<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class LiveSearch extends Controller
{
    public function index(Request $Request)
    {
     	$s = $Request->s;
     	$posts = Post::where('title','like','%'. $s . '%')->get();
     	
     	return view('main.live_search',[
     		'posts' => $posts
     	]);
    }
}
