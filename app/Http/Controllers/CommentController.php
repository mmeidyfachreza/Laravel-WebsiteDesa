<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Postingan;

class CommentController extends Controller
{

	public function store(Request $request)
    {
        if (Auth::check()) {
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->user()->associate($request->user());
        $post = Postingan::find($request->get('post_id'));
        $post->comments()->save($comment);
            return back();
        }
            $comment = new Comment;
            $comment->body = $request->get('comment_body');
            $comment->guest = $request->get('nama');
            $comment->email = $request->get('email');
            $post = Postingan::find($request->get('post_id'));
            $post->comments()->save($comment);
        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = Postingan::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back();

    }
}
