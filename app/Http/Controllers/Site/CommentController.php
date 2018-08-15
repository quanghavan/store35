<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private function checkLogIn()
    {
    	return Auth::check();
    }

    public function store(Request $request)
    {
    	if ($this->checkLogIn()) {
    		$comment = new Comment;
	        $comment->content = $request->message;
	        $comment->parent_id = 0;
	        $comment->user()->associate($request->user());
	        $product = Product::findOrFail($request->product_id);
	        $product->comments()->save($comment);
	        $result = array(
	            'comment_id' => $comment->id,
	            'name' => Auth::user()->name,
	            'message' => $request->message,
	            'product_id' => $request->product_id,
	            'date' => $comment->created_at->diffForHumans(),
	        );

	        return response()->json($result);
    	}

    	return response()->json(null);
    }

    public function replyStore(Request $request)
    {
    	if ($this->checkLogIn()) {
	        $reply = new Comment();
	        $reply->content = $request->message;
	        $reply->user()->associate($request->user());
	        $reply->parent_id = $request->comment_id;
	        $product = Product::findOrFail($request->product_id);
	        $product->comments()->save($reply);
	        $result = array(
	            'name' => Auth::user()->name, 
	            'message' => $reply->content,
	            'date' => $reply->created_at->diffForHumans(),
	        );

	        return response()->json($result);
    	}

    	return response()->json(null);
    }
}
