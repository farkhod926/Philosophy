<?php

namespace App\Http\Controllers\Admin;

use App\Comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
	public function index()
	{
	$comments = Comments::all();
	
    return view('admin.comments.index',
    	['comments' => $comments]);
	}
	public function destroy($id)
	{
		Comments::find($id)->delete();
		return redirect()->route('comments.index');
	}
	public function toggle($id)
	{
		$comment = Comments::find($id);
		if(empty($comment))
			return abort(404);
		$comment->toggleStatus();
       return redirect()->back();
	}
}
