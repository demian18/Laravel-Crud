<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'body'=>'required',
            'post_id'=>'required',
        ]);
        $postId = $request->post_id;
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->body = $request->body;
        $comment->post_id = $postId;
        $comment->save();

        return redirect('/posts/' . $postId)->with('success', 'Комментарий успешно создан!');
    }
}
