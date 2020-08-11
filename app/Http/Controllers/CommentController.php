<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Comment;

class CommentController extends Controller
{
    /**
     * insert comment
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->fill($request->all())->save();

        return redirect()->back()->with('status', 'コメントを投稿しました');

    }
}
