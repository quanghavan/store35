<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    public function index()
    {
    	$comment = Comment::all();

    	return view('admin.comment.index', compact('comment'));
    }

    public function checkChild(Request $request)
    {
        try {
        	$id = intval($request->id);
        	$comment = Comment::findOrFail($id);
    		$count = Comment::getReply($id)->count();
    		if ($count > 0) {
    			return response()->json(1); 
    		}

    		return response()->json(0);
        } catch (ModelNotFoundException $e) {
            return response()->json('fail');
        }
    }

    public function delete(Request $request)
    {
        try {
            $id = intval($request->id);
            if ($request->data == 0) {
                $comment = Comment::findOrFail($id);
                $comment->delete();

                return response()->json(1);
            }else {
                $listId = Comment::getReplyId($id)->toArray();
                $listId[] = $id;
                ///dd($listId);
                foreach ($listId as $key => $value) {
                    $comment = Comment::findOrFail($value);
                    $comment->delete();
                }
                return response()->json($listId);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json(0);
        }
    }
}
